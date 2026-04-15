# Profession Taxonomy & Cleanup Spec

**Audience:** Shafik (database + WordPress celeb pages)
**Goal:** Replace the current dirty `profession` string field (e.g. "Doctor and Chess player", "Art : Fine art artist (Painter)", "Politics : Party Affiliation") with a controlled canonical taxonomy, using Wikidata as the cleanup source of truth. Unlocks Phase 1 SEO: `/celebrities/profession/politician/`, `/profession/actor/`, etc.

**Status:** Spec ready. Blocked on:
1. Shafik exports current celeb data as CSV (format below)
2. Cleanup pass runs against Wikidata
3. Schema migration applied
4. Category pages switch over

---

## 1. Canonical Taxonomy (99 professions)

Organized into 11 categories. Each row: `slug | display_name | wikidata_qid`.

URL pattern: `/celebrities/profession/{slug}/`

### Entertainment (11)
```
actor               Actor               Q33999
director            Director            Q2526255
producer            Producer            Q3282637
screenwriter        Screenwriter        Q28389
comedian            Comedian            Q245068
tv-host             TV Host             Q947873
voice-actor         Voice Actor         Q2405480
model               Model               Q4610556
dancer              Dancer              Q5716684
choreographer       Choreographer       Q10800557
stunt-performer     Stunt Performer     Q465501
```

### Music (10)
```
singer              Singer              Q177220
musician            Musician            Q639669   (umbrella)
songwriter          Songwriter          Q753110
composer            Composer            Q36834
rapper              Rapper              Q2252262
dj                  DJ                  Q130857
guitarist           Guitarist           Q855091
pianist             Pianist             Q486748
conductor           Conductor           Q158852
record-producer     Record Producer     Q183945
```

### Sports (21)
```
footballer          Footballer          Q937857   (soccer; see note #3 below)
basketball-player   Basketball Player   Q3665646
american-football   American Football   Q19204627
baseball-player     Baseball Player     Q10871364
tennis-player       Tennis Player       Q10833314
golfer              Golfer              Q11303721
boxer               Boxer               Q11338576
martial-artist      Martial Artist      Q4282400
wrestler            Wrestler            Q13474373
cricketer           Cricketer           Q12299841
hockey-player       Hockey Player       Q11774891
rugby-player        Rugby Player        Q12039558
racing-driver       Racing Driver       Q10841764
cyclist             Cyclist             Q2309784
swimmer             Swimmer             Q10843402
gymnast             Gymnast             Q13382519
track-athlete       Track & Field       Q11513337
skier               Skier               Q11774202
skater              Skater              Q13381689
coach               Coach               Q41583
athlete             Athlete             Q2066131  (umbrella)
```

### Politics & Law (8)
```
politician          Politician          Q82955
diplomat            Diplomat            Q193391
monarch             Monarch / Royal     Q12097
military-officer    Military Officer    Q189290
judge               Judge               Q16533
lawyer              Lawyer              Q40348
activist            Activist            Q15253558
revolutionary       Revolutionary       Q3242115
```

### Business (4)
```
entrepreneur        Entrepreneur        Q131524
businessperson      Businessperson      Q43845
investor            Investor            Q80831
executive           Executive           Q978044
```

### Writing & Journalism (7)
```
writer              Writer              Q36180   (umbrella)
novelist            Novelist            Q6625963
poet                Poet                Q49757
journalist          Journalist          Q1930187
playwright          Playwright          Q214917
columnist           Columnist           Q1792450
editor              Editor              Q1607826
```

### Science & Academia (14)
```
scientist           Scientist           Q901     (umbrella)
physicist           Physicist           Q169470
chemist             Chemist             Q593644
biologist           Biologist           Q864503
mathematician       Mathematician       Q170790
astronomer          Astronomer          Q11063
psychologist        Psychologist        Q212980
physician           Physician           Q39631
philosopher         Philosopher         Q4964182
historian           Historian           Q201788
economist           Economist           Q188094
professor           Professor           Q121594
engineer            Engineer            Q81096
inventor            Inventor            Q205375
```

### Visual Arts & Design (8)
```
painter             Painter             Q1028181
sculptor            Sculptor            Q1281618
photographer        Photographer        Q33231
illustrator         Illustrator         Q644687
architect           Architect           Q42973
fashion-designer    Fashion Designer    Q3501317
designer            Designer            Q5322166  (umbrella)
cartoonist          Cartoonist          Q715301
```

### Digital & Media (4)
```
youtuber            YouTuber            Q17125263
influencer          Influencer          Q21113737
podcaster           Podcaster           Q19822580
streamer            Streamer            Q66652339
```

### Religion & Spirituality (6) — on-brand for GM audience
```
religious-leader    Religious Leader    Q1423891
priest              Priest              Q42603
spiritual-teacher   Spiritual Teacher   Q27099456
astrologer          Astrologer          Q4825895
theologian          Theologian          Q1234713
mystic              Mystic              Q2389905
```

### Other Notable (7)
```
chef                Chef                Q3499072
astronaut           Astronaut           Q11631
explorer            Explorer            Q918706
magician            Magician            Q16145676
criminal            Criminal            Q2159907
socialite           Socialite           Q638995
```

**Total: 100 canonical professions.**

---

## 2. Database Schema Upgrade

Current state: single `profession` string column on the celebs table (dirty freeform data).

Target state: **many-to-many** via 2 new tables.

### New table: `professions` (lookup table, ~100 rows, seeded once)

```sql
CREATE TABLE professions (
  id              INT PRIMARY KEY AUTO_INCREMENT,
  slug            VARCHAR(50) UNIQUE NOT NULL,      -- e.g. "politician"
  display_name    VARCHAR(100) NOT NULL,            -- e.g. "Politician"
  wikidata_qid    VARCHAR(20) NOT NULL,             -- e.g. "Q82955"
  category        VARCHAR(30),                      -- e.g. "Politics & Law"
  is_umbrella     BOOLEAN DEFAULT FALSE,
  sort_order      INT,
  INDEX idx_slug (slug)
);
```

Seed with the 100 rows from section 1.

### New table: `celeb_professions` (join table)

```sql
CREATE TABLE celeb_professions (
  celeb_id        INT NOT NULL,
  profession_id   INT NOT NULL,
  confidence      ENUM('HIGH', 'MEDIUM', 'LOW') DEFAULT 'HIGH',
  source          VARCHAR(20) DEFAULT 'wikidata',   -- "wikidata" | "manual"
  created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (celeb_id, profession_id),
  FOREIGN KEY (celeb_id) REFERENCES celebs(id) ON DELETE CASCADE,
  FOREIGN KEY (profession_id) REFERENCES professions(id),
  INDEX idx_profession (profession_id)               -- for /profession/{slug}/ page queries
);
```

### Existing `celebs` table

Keep the old `profession` string column for **1 week** after migration as a safety net, then drop it.

---

## 3. Migration Flow

1. **Export current celeb data** → CSV (see section 4 for exact columns)
2. **Create and seed `professions` table** (100 rows)
3. **Create empty `celeb_professions` table**
4. **Run Wikidata cleanup pass** → produces a CSV of `(celeb_id, profession_slug, confidence)` rows (see section 5)
5. **Review MEDIUM-confidence rows** with John / Maja
6. **Bulk INSERT approved rows** into `celeb_professions`
7. **Switch category page queries** from:
   ```sql
   WHERE profession LIKE '%actor%'
   ```
   to:
   ```sql
   JOIN celeb_professions cp ON cp.celeb_id = c.id
   JOIN professions p ON p.id = cp.profession_id
   WHERE p.slug = 'actor'
   ```
8. **Monitor for 1 week**, then drop the old `profession` column.

---

## 4. CSV Export (what Shafik provides)

One row per celeb, all current data:

| column | required | notes |
|---|---|---|
| `id` | yes | primary key |
| `name` | yes | full name as stored |
| `birth_year` | yes | **critical for Wikidata disambiguation** — full date preferred |
| `country` | recommended | second disambiguator |
| `gender` | optional | minor help for disambiguation |
| `current_profession` | yes | the dirty string to replace |
| `wikipedia_url` | if stored | gold, skips Wikidata search |
| `wikidata_qid` | if stored | even better, skips lookup entirely |

Format: UTF-8 CSV, quoted strings, standard escaping.

Estimated size: ~88,600 rows.

---

## 5. Wikidata Lookup Approach

Using **name + birth_year** as the only reliable match key (GM does not currently store Wikidata IDs).

### Confidence tiers

| tier | condition | action |
|---|---|---|
| **HIGH** | Exact name + birth year matches exactly one Wikidata entity | Auto-apply canonical professions |
| **MEDIUM** | Multiple Wikidata matches after birth-year filter, OR fuzzy name match (diacritics, transliteration, nicknames) | Flag for manual review |
| **LOW** | No Wikidata match at all | Skip; celeb won't appear on `/profession/` pages |

Expected distribution at 88k celebs: ~60-70% HIGH, ~20-30% MEDIUM, ~5-10% LOW.

### Query pattern

For each celeb in the export CSV, run a Wikidata SPARQL query like:

```sparql
SELECT ?person ?occupationLabel WHERE {
  ?person wdt:P31 wd:Q5 ;                    # is a human
          rdfs:label "Celeb Name"@en ;       # name match
          wdt:P569 ?dob .                    # birth date
  FILTER (YEAR(?dob) = 1965)                 # birth year match
  ?person wdt:P106 ?occupation .             # P106 = occupation
  SERVICE wikibase:label {
    bd:serviceParam wikibase:language "en" .
  }
}
```

Extract all `?occupation` Q-IDs per match, then map each Q-ID → canonical slug via the `professions` table (by `wikidata_qid` column).

### Multi-profession handling (compounds)

Wikidata's P106 natively returns multiple occupations per person. Each maps to a separate row in `celeb_professions`. Example:

- Oprah Winfrey → Q117 (TV presenter), Q3282637 (producer), Q43845 (businessperson)
- Produces 3 rows: `(oprah_id, tv_host)`, `(oprah_id, producer)`, `(oprah_id, businessperson)`

### Output CSV (from cleanup pass)

```
celeb_id, profession_slug, confidence, source, wikidata_match_qid
123, actor, HIGH, wikidata, Q42
123, director, HIGH, wikidata, Q42
456, physician, MEDIUM, wikidata, Q12345
456, chess-player, MEDIUM, wikidata, Q12345   -- NOTE: chess-player NOT in taxonomy; flag as LOW or map to "athlete"
789, painter, HIGH, wikidata, Q67890
```

**Mapping rule for out-of-taxonomy Wikidata occupations:** if a Wikidata occupation has no matching slug in our 100-row taxonomy, the row is dropped (the celeb may still have other rows that match). If ALL of a celeb's Wikidata occupations are out-of-taxonomy, fall back to the closest umbrella (e.g. chess player → athlete).

---

## 6. URL & Page Structure

Routes:
```
/celebrities/profession/actor/
/celebrities/profession/politician/
/celebrities/profession/spiritual-teacher/
...
```

Page H1 patterns:
- Standard: "Famous {Plural Display Name}" → "Famous Actors"
- Gender-neutral boosting: "Famous Actors & Actresses" (captures "actress" search volume without URL split)
- Soccer special case: H1 = "Famous Footballers (Soccer Players)", URL = `/profession/footballer/`

Meta description: "Human Design and Astrology charts of famous {profession plural}. Birth times, aura colors, and full profiles for {count} celebrities."

**No `/profession/other/` catch-all page** — unmatched celebs keep individual pages but don't appear in profession listings. Garbage-bin pages hurt SEO.

---

## 7. Design Decisions (locked)

1. **Umbrellas kept** (athlete, musician, scientist, writer, designer) — real Wikidata entries often use only the general term
2. **No gender split** — "actor" covers all; SEO for "actress" captured via H1/alt/meta
3. **Soccer = `footballer`** — matches Wikidata slug, page title captures "soccer" variant
4. **No `/other/` catch-all page**
5. **Religion/spirituality deliberately wide** (6 entries including astrologer, mystic, spiritual-teacher) — long-tail SEO niche that most celeb sites don't cover; on-brand for GM

---

## 8. Phase 1 vs Phase 2

**Phase 1 (this spec):**
- 100 canonical professions
- Many-to-many schema
- Wikidata-driven cleanup, HIGH-confidence auto-applied
- `/celebrities/profession/{slug}/` pages

**Phase 2 (later):**
- Refine umbrellas (musician → guitarist/pianist/drummer where Wikidata specifies)
- Secondary tags (genre, era, nationality filters combined with profession)
- "Related professions" cross-links on profession pages
- Low-confidence celebs manually reviewed in batches

---

## Open questions for John

None currently. Ready to execute as soon as Shafik provides the export CSV.
