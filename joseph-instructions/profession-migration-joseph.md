# Profession Database Migration — Joseph's Runbook

**Companion to:** `profession-taxonomy-spec.md` (design doc, read that first for context)
**Role:** Joseph handles all DB schema changes, seeding, bulk imports, index management, and rollback. Shafik exports data and updates PHP queries on celeb pages. Claude runs the Wikidata cleanup pass.

**Database:** Production celeb DB on gmtxdev.com / staginggm.com / live (confirm connection string with John before starting)

---

## Migration Overview

```
┌──────────────┐   ┌────────────────┐   ┌───────────────┐   ┌──────────────┐
│ 1. Schema    │ → │ 2. Seed        │ → │ 3. Import     │ → │ 4. Switch    │
│ (Joseph)     │   │ professions    │   │ cleaned data  │   │ queries      │
│              │   │ (Joseph)       │   │ (Joseph)      │   │ (Shafik)     │
└──────────────┘   └────────────────┘   └───────────────┘   └──────────────┘
                                                                    │
                                                                    ▼
                                                            ┌──────────────┐
                                                            │ 5. Monitor   │
                                                            │ 1 week, then │
                                                            │ drop old col │
                                                            └──────────────┘
```

---

## PRE-FLIGHT — Do this first

### 0.1 Confirm you have:
- [ ] Read-write access to the celeb DB on **staging** (do not touch live yet)
- [ ] Shafik's CSV export of current celeb data (section 4 of the spec for format)
- [ ] The cleaned profession mapping CSV from Claude's Wikidata pass (produced after step 2)
- [ ] Explicit go-ahead from John before the LIVE migration

### 0.2 Full DB backup (non-negotiable)

```bash
mysqldump --single-transaction \
          --routines \
          --triggers \
          -u <user> -p \
          <db_name> > celeb_db_backup_YYYYMMDD_preProfessionMigration.sql
```

Store in the same offsite location as your other DB backups. Verify with `ls -lh` — if the file is under 10MB something is wrong, stop and investigate.

### 0.3 Record baseline metrics

Capture before-state for sanity checking later:

```sql
SELECT COUNT(*) AS total_celebs FROM celebs;
SELECT COUNT(DISTINCT profession) AS distinct_profession_strings FROM celebs;
SELECT profession, COUNT(*) AS n
  FROM celebs
  GROUP BY profession
  ORDER BY n DESC
  LIMIT 20;
```

Save the output. You'll compare against post-migration counts to confirm no celebs were lost.

---

## STEP 1 — Create new tables (staging first)

Run on **staging** before anything touches live.

```sql
-- 1a. Lookup table: the canonical 100 professions
CREATE TABLE professions (
  id              INT PRIMARY KEY AUTO_INCREMENT,
  slug            VARCHAR(50) UNIQUE NOT NULL,
  display_name    VARCHAR(100) NOT NULL,
  wikidata_qid    VARCHAR(20) NOT NULL,
  category        VARCHAR(30),
  is_umbrella     BOOLEAN DEFAULT FALSE,
  sort_order      INT,
  INDEX idx_slug (slug),
  INDEX idx_qid (wikidata_qid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 1b. Join table: maps celebs → professions
CREATE TABLE celeb_professions (
  celeb_id        INT NOT NULL,
  profession_id   INT NOT NULL,
  confidence      ENUM('HIGH','MEDIUM','LOW') NOT NULL DEFAULT 'HIGH',
  source          VARCHAR(20) NOT NULL DEFAULT 'wikidata',
  created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (celeb_id, profession_id),
  FOREIGN KEY (celeb_id) REFERENCES celebs(id) ON DELETE CASCADE,
  FOREIGN KEY (profession_id) REFERENCES professions(id),
  INDEX idx_profession (profession_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

Verify:
```sql
SHOW TABLES LIKE 'profession%';
DESCRIBE professions;
DESCRIBE celeb_professions;
```

Both tables should show up, empty.

---

## STEP 2 — Seed the professions table (100 rows)

Run this exact SQL on staging. Do not modify slugs or Q-IDs — they must match what Claude's Wikidata cleanup pass expects.

```sql
INSERT INTO professions (slug, display_name, wikidata_qid, category, is_umbrella, sort_order) VALUES
-- Entertainment
('actor',             'Actor',              'Q33999',    'Entertainment', FALSE, 1),
('director',          'Director',           'Q2526255',  'Entertainment', FALSE, 2),
('producer',          'Producer',           'Q3282637',  'Entertainment', FALSE, 3),
('screenwriter',      'Screenwriter',       'Q28389',    'Entertainment', FALSE, 4),
('comedian',          'Comedian',           'Q245068',   'Entertainment', FALSE, 5),
('tv-host',           'TV Host',            'Q947873',   'Entertainment', FALSE, 6),
('voice-actor',       'Voice Actor',        'Q2405480',  'Entertainment', FALSE, 7),
('model',             'Model',              'Q4610556',  'Entertainment', FALSE, 8),
('dancer',            'Dancer',             'Q5716684',  'Entertainment', FALSE, 9),
('choreographer',     'Choreographer',      'Q10800557', 'Entertainment', FALSE, 10),
('stunt-performer',   'Stunt Performer',    'Q465501',   'Entertainment', FALSE, 11),
-- Music
('singer',            'Singer',             'Q177220',   'Music',         FALSE, 20),
('musician',          'Musician',           'Q639669',   'Music',         TRUE,  21),
('songwriter',        'Songwriter',         'Q753110',   'Music',         FALSE, 22),
('composer',          'Composer',           'Q36834',    'Music',         FALSE, 23),
('rapper',            'Rapper',             'Q2252262',  'Music',         FALSE, 24),
('dj',                'DJ',                 'Q130857',   'Music',         FALSE, 25),
('guitarist',         'Guitarist',          'Q855091',   'Music',         FALSE, 26),
('pianist',           'Pianist',            'Q486748',   'Music',         FALSE, 27),
('conductor',         'Conductor',          'Q158852',   'Music',         FALSE, 28),
('record-producer',   'Record Producer',    'Q183945',   'Music',         FALSE, 29),
-- Sports
('footballer',        'Footballer',         'Q937857',   'Sports',        FALSE, 40),
('basketball-player', 'Basketball Player',  'Q3665646',  'Sports',        FALSE, 41),
('american-football', 'American Football',  'Q19204627', 'Sports',        FALSE, 42),
('baseball-player',   'Baseball Player',    'Q10871364', 'Sports',        FALSE, 43),
('tennis-player',     'Tennis Player',      'Q10833314', 'Sports',        FALSE, 44),
('golfer',            'Golfer',             'Q11303721', 'Sports',        FALSE, 45),
('boxer',             'Boxer',              'Q11338576', 'Sports',        FALSE, 46),
('martial-artist',    'Martial Artist',     'Q4282400',  'Sports',        FALSE, 47),
('wrestler',          'Wrestler',           'Q13474373', 'Sports',        FALSE, 48),
('cricketer',         'Cricketer',          'Q12299841', 'Sports',        FALSE, 49),
('hockey-player',     'Hockey Player',      'Q11774891', 'Sports',        FALSE, 50),
('rugby-player',      'Rugby Player',       'Q12039558', 'Sports',        FALSE, 51),
('racing-driver',     'Racing Driver',      'Q10841764', 'Sports',        FALSE, 52),
('cyclist',           'Cyclist',            'Q2309784',  'Sports',        FALSE, 53),
('swimmer',           'Swimmer',            'Q10843402', 'Sports',        FALSE, 54),
('gymnast',           'Gymnast',            'Q13382519', 'Sports',        FALSE, 55),
('track-athlete',     'Track & Field',      'Q11513337', 'Sports',        FALSE, 56),
('skier',             'Skier',              'Q11774202', 'Sports',        FALSE, 57),
('skater',            'Skater',             'Q13381689', 'Sports',        FALSE, 58),
('coach',             'Coach',              'Q41583',    'Sports',        FALSE, 59),
('athlete',           'Athlete',            'Q2066131',  'Sports',        TRUE,  60),
-- Politics & Law
('politician',        'Politician',         'Q82955',    'Politics & Law',FALSE, 70),
('diplomat',          'Diplomat',           'Q193391',   'Politics & Law',FALSE, 71),
('monarch',           'Monarch / Royal',    'Q12097',    'Politics & Law',FALSE, 72),
('military-officer',  'Military Officer',   'Q189290',   'Politics & Law',FALSE, 73),
('judge',             'Judge',              'Q16533',    'Politics & Law',FALSE, 74),
('lawyer',            'Lawyer',             'Q40348',    'Politics & Law',FALSE, 75),
('activist',          'Activist',           'Q15253558', 'Politics & Law',FALSE, 76),
('revolutionary',     'Revolutionary',      'Q3242115',  'Politics & Law',FALSE, 77),
-- Business
('entrepreneur',      'Entrepreneur',       'Q131524',   'Business',      FALSE, 80),
('businessperson',    'Businessperson',     'Q43845',    'Business',      FALSE, 81),
('investor',          'Investor',           'Q80831',    'Business',      FALSE, 82),
('executive',         'Executive',          'Q978044',   'Business',      FALSE, 83),
-- Writing & Journalism
('writer',            'Writer',             'Q36180',    'Writing',       TRUE,  90),
('novelist',          'Novelist',           'Q6625963',  'Writing',       FALSE, 91),
('poet',              'Poet',               'Q49757',    'Writing',       FALSE, 92),
('journalist',        'Journalist',         'Q1930187',  'Writing',       FALSE, 93),
('playwright',        'Playwright',         'Q214917',   'Writing',       FALSE, 94),
('columnist',         'Columnist',          'Q1792450',  'Writing',       FALSE, 95),
('editor',            'Editor',             'Q1607826',  'Writing',       FALSE, 96),
-- Science & Academia
('scientist',         'Scientist',          'Q901',      'Science',       TRUE,  100),
('physicist',         'Physicist',          'Q169470',   'Science',       FALSE, 101),
('chemist',           'Chemist',            'Q593644',   'Science',       FALSE, 102),
('biologist',         'Biologist',          'Q864503',   'Science',       FALSE, 103),
('mathematician',     'Mathematician',      'Q170790',   'Science',       FALSE, 104),
('astronomer',        'Astronomer',         'Q11063',    'Science',       FALSE, 105),
('psychologist',      'Psychologist',       'Q212980',   'Science',       FALSE, 106),
('physician',         'Physician',          'Q39631',    'Science',       FALSE, 107),
('philosopher',       'Philosopher',        'Q4964182',  'Science',       FALSE, 108),
('historian',         'Historian',          'Q201788',   'Science',       FALSE, 109),
('economist',         'Economist',          'Q188094',   'Science',       FALSE, 110),
('professor',         'Professor',          'Q121594',   'Science',       FALSE, 111),
('engineer',          'Engineer',           'Q81096',    'Science',       FALSE, 112),
('inventor',          'Inventor',           'Q205375',   'Science',       FALSE, 113),
-- Visual Arts & Design
('painter',           'Painter',            'Q1028181',  'Visual Arts',   FALSE, 120),
('sculptor',          'Sculptor',           'Q1281618',  'Visual Arts',   FALSE, 121),
('photographer',      'Photographer',       'Q33231',    'Visual Arts',   FALSE, 122),
('illustrator',       'Illustrator',        'Q644687',   'Visual Arts',   FALSE, 123),
('architect',         'Architect',          'Q42973',    'Visual Arts',   FALSE, 124),
('fashion-designer',  'Fashion Designer',   'Q3501317',  'Visual Arts',   FALSE, 125),
('designer',          'Designer',           'Q5322166',  'Visual Arts',   TRUE,  126),
('cartoonist',        'Cartoonist',         'Q715301',   'Visual Arts',   FALSE, 127),
-- Digital & Media
('youtuber',          'YouTuber',           'Q17125263', 'Digital & Media', FALSE, 140),
('influencer',        'Influencer',         'Q21113737', 'Digital & Media', FALSE, 141),
('podcaster',         'Podcaster',          'Q19822580', 'Digital & Media', FALSE, 142),
('streamer',          'Streamer',           'Q66652339', 'Digital & Media', FALSE, 143),
-- Religion & Spirituality
('religious-leader',  'Religious Leader',   'Q1423891',  'Religion',      FALSE, 150),
('priest',            'Priest',             'Q42603',    'Religion',      FALSE, 151),
('spiritual-teacher', 'Spiritual Teacher',  'Q27099456', 'Religion',      FALSE, 152),
('astrologer',        'Astrologer',         'Q4825895',  'Religion',      FALSE, 153),
('theologian',        'Theologian',         'Q1234713',  'Religion',      FALSE, 154),
('mystic',            'Mystic',             'Q2389905',  'Religion',      FALSE, 155),
-- Other Notable
('chef',              'Chef',               'Q3499072',  'Other',         FALSE, 160),
('astronaut',         'Astronaut',          'Q11631',    'Other',         FALSE, 161),
('explorer',          'Explorer',           'Q918706',   'Other',         FALSE, 162),
('magician',          'Magician',           'Q16145676', 'Other',         FALSE, 163),
('criminal',          'Criminal',           'Q2159907',  'Other',         FALSE, 164),
('socialite',         'Socialite',          'Q638995',   'Other',         FALSE, 165);
```

Verify:
```sql
SELECT COUNT(*) FROM professions;                         -- expect exactly 100
SELECT category, COUNT(*) FROM professions GROUP BY category ORDER BY MIN(sort_order);
SELECT COUNT(*) FROM professions WHERE is_umbrella = TRUE;   -- expect 5 (athlete, musician, scientist, writer, designer)
```

---

## STEP 3 — Import the cleaned `celeb_professions` data

Claude provides a CSV after the Wikidata pass. Format:

```
celeb_id,profession_slug,confidence
123,actor,HIGH
123,director,HIGH
456,physician,MEDIUM
789,painter,HIGH
```

### 3.1 Load into a temporary staging table

```sql
CREATE TEMPORARY TABLE staging_celeb_professions (
  celeb_id         INT,
  profession_slug  VARCHAR(50),
  confidence       ENUM('HIGH','MEDIUM','LOW')
);

LOAD DATA LOCAL INFILE '/path/to/celeb_professions_cleaned.csv'
  INTO TABLE staging_celeb_professions
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES;
```

Verify:
```sql
SELECT COUNT(*) FROM staging_celeb_professions;
SELECT confidence, COUNT(*) FROM staging_celeb_professions GROUP BY confidence;
```

Expected distribution:
- HIGH: ~60-70% of celebs × avg 2 professions each
- MEDIUM: ~20-30% (these need John/Maja review before promoting)
- LOW: ~5-10%

### 3.2 Sanity-check for orphans

Make sure every `profession_slug` in the CSV exists in the `professions` table:

```sql
SELECT DISTINCT s.profession_slug
  FROM staging_celeb_professions s
  LEFT JOIN professions p ON p.slug = s.profession_slug
  WHERE p.id IS NULL;
```

Expected: **0 rows**. If any rows return, stop and notify Claude — taxonomy mismatch.

Also check for orphan celeb IDs:
```sql
SELECT COUNT(*) FROM staging_celeb_professions s
  LEFT JOIN celebs c ON c.id = s.celeb_id
  WHERE c.id IS NULL;
```

Expected: 0.

### 3.3 Insert HIGH confidence rows (auto-apply)

```sql
INSERT INTO celeb_professions (celeb_id, profession_id, confidence, source)
SELECT s.celeb_id, p.id, s.confidence, 'wikidata'
  FROM staging_celeb_professions s
  JOIN professions p ON p.slug = s.profession_slug
  WHERE s.confidence = 'HIGH';
```

Verify:
```sql
SELECT COUNT(*) FROM celeb_professions;
SELECT COUNT(DISTINCT celeb_id) FROM celeb_professions;    -- celebs with at least one profession
```

### 3.4 Hold MEDIUM + LOW for review

Do **NOT** insert MEDIUM/LOW yet. Export them for John / Maja to review:

```sql
SELECT s.celeb_id, c.name, c.birth_year, s.profession_slug, s.confidence
  FROM staging_celeb_professions s
  JOIN celebs c ON c.id = s.celeb_id
  WHERE s.confidence IN ('MEDIUM','LOW')
  ORDER BY s.confidence, c.name
  INTO OUTFILE '/tmp/celeb_professions_review.csv'
  FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n';
```

Send that file to John. After review, load the approved subset back in the same way as step 3.3 but with `source = 'manual'`.

---

## STEP 4 — Switch category page queries (Shafik)

This is Shafik's job but listed here so you know what's changing.

**Old (string LIKE, slow, dirty):**
```sql
SELECT * FROM celebs WHERE profession LIKE '%actor%';
```

**New (indexed JOIN):**
```sql
SELECT c.* FROM celebs c
  JOIN celeb_professions cp ON cp.celeb_id = c.id
  JOIN professions p ON p.id = cp.profession_id
  WHERE p.slug = 'actor'
  ORDER BY c.name;
```

Benchmark both with `EXPLAIN` — the new version should show `Using index` on `idx_profession`, no full table scan.

---

## STEP 5 — Monitor, then drop the old column

Keep `celebs.profession` around for **7 days** after go-live. During that window:

- Daily check: `SELECT COUNT(*) FROM celebs WHERE id NOT IN (SELECT celeb_id FROM celeb_professions)` — confirms how many celebs have zero profession matches (should match the LOW bucket)
- Watch error logs on celebrity category pages
- Watch Google Search Console for sudden crawl errors on `/profession/*/` URLs

After 7 days with no issues, drop:
```sql
ALTER TABLE celebs DROP COLUMN profession;
```

---

## Rollback Plan

### If step 1-2 fails (tables/seed)
```sql
DROP TABLE celeb_professions;
DROP TABLE professions;
```
No data loss. Try again.

### If step 3 fails (bad import)
```sql
TRUNCATE celeb_professions;
```
Then re-run from 3.1. Seed data in `professions` is untouched.

### If step 4 fails (PHP queries broken)
Old `celebs.profession` column is still there. Revert PHP to use the old `LIKE` queries. Investigate, fix, re-deploy.

### Nuclear option (restore from backup)
```bash
mysql -u <user> -p <db_name> < celeb_db_backup_YYYYMMDD_preProfessionMigration.sql
```

---

## Staging → Live Flow

1. Do all of steps 1-3 on **staging** first
2. Shafik updates PHP on staging, tests
3. QA check: visit `/celebrities/profession/actor/`, `/politician/`, `/spiritual-teacher/` on staging — pages render, counts look right
4. John green-lights live migration
5. Repeat steps 1-3 on **live**, ideally during low-traffic window (3-5 AM UTC)
6. Shafik pushes PHP to live
7. Monitor for 1 hour actively, then daily for a week

---

## Checklist summary

- [ ] Full DB backup taken
- [ ] Baseline metrics captured
- [ ] Schema created on staging
- [ ] Professions table seeded (100 rows verified)
- [ ] Cleaned CSV loaded into staging table
- [ ] Orphan checks passed (0 orphan slugs, 0 orphan celeb IDs)
- [ ] HIGH confidence rows inserted
- [ ] MEDIUM/LOW exported for John's review
- [ ] Approved MEDIUM/LOW rows inserted
- [ ] Shafik's PHP queries swapped and tested on staging
- [ ] `/profession/*/` pages render correctly on staging
- [ ] John approves live migration
- [ ] Live migration executed during low-traffic window
- [ ] 1 hour active monitoring post-live
- [ ] 7-day monitoring window before dropping `celebs.profession`
