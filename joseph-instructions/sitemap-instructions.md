# Sitemap Setup Instructions

## Owner: Joseph Handel (Sys Admin)
## Deadline: Before Friday go-live

---

## Overview

We need XML sitemaps submitted to Google for Learn Hub, Dictionary, and Celebrities across 7 languages (EN, DE, ES, FR, IT, NL, PT). The total URL count is approximately **4.3 million pages**, requiring a sitemap index with ~105 child sitemaps.

### Google Sitemap Rules
- **Max 50,000 URLs** per sitemap file
- **Max 50MB uncompressed** per sitemap file (gzip recommended)
- **Sitemap index** file can reference unlimited child sitemaps
- All URLs must be absolute (full `https://www.geneticmatrix.com/...`)
- UTF-8 encoding required
- `<lastmod>` dates help Google prioritize recrawling

---

## Sitemap Structure

```
https://www.geneticmatrix.com/sitemaps/
├── sitemap-index.xml                        (master index, submitted to Google)
│
├── Learn Hub (7 sitemaps, ~67 URLs each)
│   ├── sitemap-learn-hub-en.xml
│   ├── sitemap-learn-hub-de.xml
│   ├── sitemap-learn-hub-es.xml
│   ├── sitemap-learn-hub-fr.xml
│   ├── sitemap-learn-hub-it.xml
│   ├── sitemap-learn-hub-nl.xml
│   └── sitemap-learn-hub-pt.xml
│
├── Celebrity Categories (7 sitemaps, ~300 URLs each)
│   ├── sitemap-categories-en.xml
│   ├── sitemap-categories-de.xml
│   ├── sitemap-categories-es.xml
│   ├── sitemap-categories-fr.xml
│   ├── sitemap-categories-it.xml
│   ├── sitemap-categories-nl.xml
│   └── sitemap-categories-pt.xml
│
└── Celebrity Individual Charts (91 sitemaps, 50,000 URLs each)
    ├── sitemap-celebrities-en-001.xml       (first 50K English celebrities)
    ├── sitemap-celebrities-en-002.xml
    ├── ...
    ├── sitemap-celebrities-en-013.xml       (remaining ~16K English)
    ├── sitemap-celebrities-de-001.xml       (first 50K German celebrities)
    ├── sitemap-celebrities-de-002.xml
    ├── ...
    └── sitemap-celebrities-pt-013.xml       (last Portuguese batch)
```

**Total: ~105 sitemap files + 1 index file**

---

## 1. Learn Hub Sitemaps (Static Pages)

These are generated from the learn-hub git repo file list. Each language has ~65 Learn Hub pages + 1 Dictionary page + 1 Celebrities landing = ~67 URLs.

### URL Format

**English:**
```
https://www.geneticmatrix.com/learn-hub/index.html
https://www.geneticmatrix.com/learn-hub/types/projector.html
https://www.geneticmatrix.com/learn-hub/centers/index.html
https://www.geneticmatrix.com/learn-hub/astrology/zodiac-signs.html
https://www.geneticmatrix.com/learn-hub/dictionary/dictionary.html
https://www.geneticmatrix.com/celebrities/
```

**Other languages (e.g. German):**
```
https://www.geneticmatrix.com/learn-hub/de/index.html
https://www.geneticmatrix.com/learn-hub/de/types/projector.html
https://www.geneticmatrix.com/learn-hub/de/centers/index.html
https://www.geneticmatrix.com/learn-hub/de/dictionary/dictionary.html
https://www.geneticmatrix.com/learn-hub/de/celebrities/index.html
```

### XML Format for Each Entry

```xml
<url>
  <loc>https://www.geneticmatrix.com/learn-hub/types/projector.html</loc>
  <lastmod>2026-04-09</lastmod>
  <changefreq>monthly</changefreq>
  <priority>0.8</priority>
  <xhtml:link rel="alternate" hreflang="en" href="https://www.geneticmatrix.com/learn-hub/types/projector.html"/>
  <xhtml:link rel="alternate" hreflang="de" href="https://www.geneticmatrix.com/learn-hub/de/types/projector.html"/>
  <xhtml:link rel="alternate" hreflang="es" href="https://www.geneticmatrix.com/learn-hub/es/types/projector.html"/>
  <xhtml:link rel="alternate" hreflang="fr" href="https://www.geneticmatrix.com/learn-hub/fr/types/projector.html"/>
  <xhtml:link rel="alternate" hreflang="it" href="https://www.geneticmatrix.com/learn-hub/it/types/projector.html"/>
  <xhtml:link rel="alternate" hreflang="nl" href="https://www.geneticmatrix.com/learn-hub/nl/types/projector.html"/>
  <xhtml:link rel="alternate" hreflang="pt" href="https://www.geneticmatrix.com/learn-hub/pt/types/projector.html"/>
  <xhtml:link rel="alternate" hreflang="x-default" href="https://www.geneticmatrix.com/learn-hub/types/projector.html"/>
</url>
```

**Important:** Include the `xhtml:link hreflang` entries inside each `<url>` block. This tells Google which language versions exist for each page. Only include hreflang for language versions that actually exist (the Learn Hub pages are all translated, so all 7 are included for every page).

### Generation Method

A script can walk the learn-hub repo and generate these. I have already placed hreflang tags in every HTML file's `<head>`, so the sitemap hreflang entries should match those exactly.

**Quick generation command (run from learn-hub repo root on the server):**
```bash
find . -name "*.html" -not -path "./.git/*" -not -path "./includes/*" \
  -not -path "./assets/*" -not -path "./joseph-instructions/*" \
  -not -path "./prompts/*" -not -path "./maja-spec/*" \
  -not -path "./api/*" -not -path "./data/*" \
  -not -name "*preview*" -not -name "template.html" \
  -not -name "generate-sitemaps.html" -not -name "test-*" \
  | sort
```
This gives you all the file paths. Prepend `https://www.geneticmatrix.com/learn-hub/` to each (stripping the leading `./`).

---

## 2. Celebrity Category Sitemaps (WordPress Pages)

Each language has approximately 300 category/filter URLs. Format:

```
https://www.geneticmatrix.com/celebrities/type/
https://www.geneticmatrix.com/celebrities/type/?type=generator
https://www.geneticmatrix.com/celebrities/type/?type=manifestor
https://www.geneticmatrix.com/celebrities/profile/
https://www.geneticmatrix.com/celebrities/profile/?profile=1-3
https://www.geneticmatrix.com/celebrities/sun-sign/
https://www.geneticmatrix.com/celebrities/sun-sign/?sun-sign=aries
... etc.
```

**For other languages (WPML):**
```
https://www.geneticmatrix.com/de/celebrities/type/
https://www.geneticmatrix.com/de/celebrities/type/?type=generator
```

### Categories to Include

| Category | Slug | Filter Values |
|---|---|---|
| Type | `/celebrities/type/` | generator, manifesting-generator, manifestor, projector, reflector (5) |
| Profile | `/celebrities/profile/` | 1-3, 1-4, 2-4, 2-5, 3-5, 3-6, 4-1, 4-6, 5-1, 5-2, 6-2, 6-3 (12) |
| Sun Sign | `/celebrities/sun-sign/` | aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn, aquarius, pisces (12) |
| Moon Sign | `/celebrities/moon-sign/` | same 12 signs |
| Ascendant | `/celebrities/ascendant/` | same 12 signs |
| Midheaven | `/celebrities/midheaven/` | same 12 signs |
| Descendant | `/celebrities/descendant/` | same 12 signs |
| Imum Coeli | `/celebrities/imum-coeli/` | same 12 signs |
| Authority | `/celebrities/authority/` | emotional, sacral, splenic, ego, self-projected, lunar (6) |
| Strategy | `/celebrities/strategy/` | to-respond, to-inform, wait-for-invitation, wait-lunar-cycle (4) |
| Definition | `/celebrities/definition/` | single, split-small, split-large, triple-split, quadruple-split, none (6) |
| Inc. Cross | `/celebrities/incarnation-cross/` | ~192 crosses (check DB for exact list) |

**Approx total per language:** ~300 URLs (well under 50K limit)
**One sitemap per language = 7 sitemaps**

### Generation Method

Query the WordPress database for all unique filter values per category, or export from the celebrity data tables. Each category page + each filter value = one URL.

---

## 3. Celebrity Individual Chart Sitemaps (Massive)

This is the big one: 88,000 celebrities × 7 calculation methods = **616,000 URLs per language**.

### URL Format

**English (default = Tropical):**
```
https://www.geneticmatrix.com/celebrity/elon-musk/
https://www.geneticmatrix.com/celebrity/elon-musk/sidereal/
https://www.geneticmatrix.com/celebrity/elon-musk/vedic/
https://www.geneticmatrix.com/celebrity/elon-musk/draconic/
https://www.geneticmatrix.com/celebrity/elon-musk/true-sidereal/
https://www.geneticmatrix.com/celebrity/elon-musk/13-sign/
https://www.geneticmatrix.com/celebrity/elon-musk/j2000/
```

**Other languages (WPML, e.g. German):**
```
https://www.geneticmatrix.com/de/celebrity/elon-musk/
https://www.geneticmatrix.com/de/celebrity/elon-musk/sidereal/
... etc.
```

### Splitting Into 50K Chunks

**Per language: 616,000 URLs / 50,000 = 13 sitemaps**

Split alphabetically by celebrity slug:
- `sitemap-celebrities-en-001.xml` — A celebrities (first 50K)
- `sitemap-celebrities-en-002.xml` — A-B celebrities (next 50K)
- ... etc. through 013

**Total across 7 languages: 13 × 7 = 91 sitemap files**

### XML Format

```xml
<url>
  <loc>https://www.geneticmatrix.com/celebrity/elon-musk/</loc>
  <lastmod>2026-04-09</lastmod>
  <changefreq>monthly</changefreq>
  <priority>0.6</priority>
</url>
<url>
  <loc>https://www.geneticmatrix.com/celebrity/elon-musk/sidereal/</loc>
  <lastmod>2026-04-09</lastmod>
  <changefreq>monthly</changefreq>
  <priority>0.5</priority>
</url>
```

**Note on hreflang in celebrity sitemaps:** Including hreflang for 4.3M URLs would make each sitemap entry ~8x larger and may exceed the 50MB limit. Two options:
1. **Skip hreflang in celebrity sitemaps** — rely on the hreflang tags already in each page's `<head>` HTML (if Shafik's templates include them)
2. **Include hreflang but reduce batch size to 10K per file** — results in ~450 sitemaps instead of 91

Recommendation: option 1 (simpler, relies on in-page hreflang).

### Generation Method

This MUST be generated from the celebrity database. The data source is the same one Shafik's category templates query.

**Approach:**
1. Query the `celebrities` table (or wherever slugs are stored) for all celebrity slugs
2. For each slug, generate 7 URLs (one per calc method)
3. Write 50,000 URLs per XML file
4. Repeat for each language (prepend `/{lang}/` to each URL)
5. A PHP or Python script on the server can do this as a cron job (run weekly to pick up new celebrities)

**Skeleton PHP script for generating celebrity sitemaps:**
```php
<?php
// Run via CLI: php generate-celebrity-sitemaps.php
// Output: /sitemaps/sitemap-celebrities-{lang}-{batch}.xml

$langs = ['en','de','es','fr','it','nl','pt'];
$methods = ['','sidereal/','vedic/','draconic/','true-sidereal/','13-sign/','j2000/'];
$base = 'https://www.geneticmatrix.com';
$outdir = '/home/staging/public_html/sitemaps/';
$batch_size = 50000;

// Connect to DB and get all celebrity slugs
$db = new PDO('mysql:host=localhost;dbname=YOUR_DB', 'user', 'pass');
$slugs = $db->query("SELECT slug FROM celebrities ORDER BY slug")->fetchAll(PDO::FETCH_COLUMN);

foreach ($langs as $lang) {
    $lang_prefix = ($lang === 'en') ? '' : '/' . $lang;
    $urls = [];
    foreach ($slugs as $slug) {
        foreach ($methods as $method) {
            $urls[] = $base . $lang_prefix . '/celebrity/' . $slug . '/' . $method;
        }
    }
    // Split into batches
    $batches = array_chunk($urls, $batch_size);
    foreach ($batches as $i => $batch) {
        $num = str_pad($i + 1, 3, '0', STR_PAD_LEFT);
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($batch as $url) {
            $xml .= "  <url><loc>" . htmlspecialchars($url) . "</loc>";
            $xml .= "<changefreq>monthly</changefreq><priority>0.5</priority></url>\n";
        }
        $xml .= "</urlset>\n";
        file_put_contents($outdir . "sitemap-celebrities-{$lang}-{$num}.xml", $xml);
    }
}
echo "Done.\n";
```

**Adapt this script:** replace the DB connection and table/column names with whatever Shafik's celebrity data schema uses.

---

## 4. Sitemap Index File

The master index references all child sitemaps. This is the ONE file you submit to Google.

### File: `/sitemaps/sitemap-index.xml`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  <!-- Learn Hub + Dictionary + Celebrities Landing (7 languages) -->
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-learn-hub-en.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-learn-hub-de.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-learn-hub-es.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-learn-hub-fr.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-learn-hub-it.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-learn-hub-nl.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-learn-hub-pt.xml</loc></sitemap>

  <!-- Celebrity Categories (7 languages) -->
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-categories-en.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-categories-de.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-categories-es.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-categories-fr.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-categories-it.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-categories-nl.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-categories-pt.xml</loc></sitemap>

  <!-- Celebrity Individual Charts (13 batches x 7 languages = 91 sitemaps) -->
  <!-- English -->
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-celebrities-en-001.xml</loc></sitemap>
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-celebrities-en-002.xml</loc></sitemap>
  <!-- ... through en-013 ... -->

  <!-- German -->
  <sitemap><loc>https://www.geneticmatrix.com/sitemaps/sitemap-celebrities-de-001.xml</loc></sitemap>
  <!-- ... etc for all languages ... -->

</sitemapindex>
```

**Tip:** The generation script should also auto-generate this index file so it stays in sync.

---

## 5. robots.txt

Add the sitemap index location to `/robots.txt` on the live server:

```
Sitemap: https://www.geneticmatrix.com/sitemaps/sitemap-index.xml
```

This goes at the END of the existing robots.txt file. Do NOT remove any existing content.

---

## 6. Google Search Console Submission

1. Open [Google Search Console](https://search.google.com/search-console) for `geneticmatrix.com`
2. Go to **Sitemaps** in the left sidebar
3. Enter: `https://www.geneticmatrix.com/sitemaps/sitemap-index.xml`
4. Click **Submit**
5. Google will discover all child sitemaps automatically from the index
6. Check back in 24-48 hours: the status should show "Success" with URL counts

**Do NOT submit individual child sitemaps separately.** Only submit the index file.

---

## 7. Ongoing Maintenance

### When to regenerate sitemaps:
- New celebrities added to the database
- New Learn Hub pages created
- New language translations added
- Pages removed or URLs changed

### Recommended schedule:
- **Learn Hub sitemaps:** regenerate on each deploy (or weekly)
- **Celebrity sitemaps:** regenerate weekly via cron job
- **Category sitemaps:** regenerate weekly (new filter combinations may appear)

### Cron example:
```bash
# Weekly sitemap regeneration, Sunday 3am
0 3 * * 0 php /home/staging/public_html/scripts/generate-sitemaps.php >> /var/log/sitemap-gen.log 2>&1
```

---

## 8. Verification Checklist (Before Go-Live)

- [ ] All sitemap XML files are valid (no parsing errors)
- [ ] `/sitemaps/sitemap-index.xml` is accessible via browser
- [ ] `robots.txt` contains `Sitemap:` directive
- [ ] Google Search Console shows "Success" after submission
- [ ] Spot-check: pick 5 random URLs from a celebrity sitemap, verify they return 200
- [ ] Spot-check: pick 5 random URLs from Learn Hub sitemap, verify they return 200
- [ ] `X-Robots-Tag: noindex` is NOT present on live celebrity pages
- [ ] Total URL count in Search Console matches expected (~4.3M)

---

## 9. File Sizes (Estimated)

| Sitemap Type | Per File | Files | Total |
|---|---|---|---|
| Learn Hub | ~10 KB | 7 | ~70 KB |
| Categories | ~30 KB | 7 | ~210 KB |
| Celebrity Charts | ~3 MB | 91 | ~270 MB |
| **Total** | | **105** | **~270 MB** |

Recommend gzip compression on celebrity sitemaps to reduce to ~30 MB total. Apache/LiteSpeed can serve `.xml.gz` files automatically:

```apache
# In .htaccess
AddEncoding gzip .gz
AddType application/xml .xml.gz
```

Or pre-compress:
```bash
cd /sitemaps/
for f in sitemap-celebrities-*.xml; do gzip -k "$f"; done
```

Then reference `.xml.gz` in the sitemap index instead of `.xml`.

---

## Summary for Joseph

1. Create `/sitemaps/` directory on the live server
2. Generate Learn Hub sitemaps from the repo file list (or use a script I can provide)
3. Generate category + celebrity sitemaps from the WordPress database (adapt the PHP skeleton above)
4. Create the sitemap index file
5. Add `Sitemap:` line to `robots.txt`
6. Submit sitemap index to Google Search Console
7. Set up weekly cron for regeneration
8. Verify everything with the checklist above
