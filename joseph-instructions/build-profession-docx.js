// Builds profession-migration-joseph.docx from the spec content.
// Run: node build-profession-docx.js

const fs = require("fs");
const path = require("path");
const {
  Document, Packer, Paragraph, TextRun, Table, TableRow, TableCell,
  AlignmentType, LevelFormat, HeadingLevel, BorderStyle, WidthType,
  ShadingType, PageOrientation,
} = require("docx");

const OUT = path.join(__dirname, "profession-migration-joseph.docx");

// ---- Helpers ----
const MONO_FONT = "Consolas";
const CODE_FILL = "F2F2F2";

function p(text, opts = {}) {
  return new Paragraph({
    spacing: { after: 120 },
    ...opts,
    children: (Array.isArray(text) ? text : [new TextRun({ text, ...(opts.run || {}) })]),
  });
}
function h1(text) {
  return new Paragraph({ heading: HeadingLevel.HEADING_1, spacing: { before: 360, after: 180 },
    children: [new TextRun({ text, bold: true, size: 32 })] });
}
function h2(text) {
  return new Paragraph({ heading: HeadingLevel.HEADING_2, spacing: { before: 300, after: 150 },
    children: [new TextRun({ text, bold: true, size: 28 })] });
}
function h3(text) {
  return new Paragraph({ heading: HeadingLevel.HEADING_3, spacing: { before: 240, after: 120 },
    children: [new TextRun({ text, bold: true, size: 24 })] });
}
function bullet(text) {
  return new Paragraph({
    numbering: { reference: "bullets", level: 0 },
    spacing: { after: 80 },
    children: Array.isArray(text) ? text : [new TextRun(text)],
  });
}
function codeBlock(text) {
  const lines = text.split("\n");
  return lines.map((line, i) => new Paragraph({
    spacing: { after: i === lines.length - 1 ? 180 : 0, line: 240 },
    shading: { type: ShadingType.CLEAR, fill: CODE_FILL },
    children: [new TextRun({ text: line || " ", font: MONO_FONT, size: 18 })],
  }));
}
function bold(text) { return new TextRun({ text, bold: true }); }
function run(text) { return new TextRun({ text }); }

const border = { style: BorderStyle.SINGLE, size: 1, color: "CCCCCC" };
const borders = { top: border, bottom: border, left: border, right: border };

function cell(content, widthDxa, opts = {}) {
  const children = Array.isArray(content) ? content : [new Paragraph({ children: [new TextRun({ text: content, ...(opts.run || {}) })] })];
  return new TableCell({
    borders,
    width: { size: widthDxa, type: WidthType.DXA },
    margins: { top: 80, bottom: 80, left: 120, right: 120 },
    shading: opts.header ? { type: ShadingType.CLEAR, fill: "E7E6E6" } : undefined,
    children,
  });
}

// ---- CSV Export table ----
const csvCols = [1800, 900, 2200, 4460];
const csvTable = new Table({
  width: { size: 9360, type: WidthType.DXA },
  columnWidths: csvCols,
  rows: [
    new TableRow({ children: [
      cell("column", csvCols[0], { header: true, run: { bold: true } }),
      cell("required", csvCols[1], { header: true, run: { bold: true } }),
      cell("field", csvCols[2], { header: true, run: { bold: true } }),
      cell("notes", csvCols[3], { header: true, run: { bold: true } }),
    ]}),
    new TableRow({ children: [ cell("id", csvCols[0]), cell("yes", csvCols[1]), cell("integer", csvCols[2]), cell("primary key", csvCols[3]) ]}),
    new TableRow({ children: [ cell("name", csvCols[0]), cell("yes", csvCols[1]), cell("string", csvCols[2]), cell("full name as stored", csvCols[3]) ]}),
    new TableRow({ children: [ cell("birth_year", csvCols[0]), cell("yes", csvCols[1]), cell("year or date", csvCols[2]), cell("critical for Wikidata disambiguation — full date preferred", csvCols[3]) ]}),
    new TableRow({ children: [ cell("country", csvCols[0]), cell("recommended", csvCols[1]), cell("string", csvCols[2]), cell("second disambiguator", csvCols[3]) ]}),
    new TableRow({ children: [ cell("gender", csvCols[0]), cell("optional", csvCols[1]), cell("string", csvCols[2]), cell("minor help for disambiguation", csvCols[3]) ]}),
    new TableRow({ children: [ cell("current_profession", csvCols[0]), cell("yes", csvCols[1]), cell("string", csvCols[2]), cell("the dirty string to replace", csvCols[3]) ]}),
    new TableRow({ children: [ cell("wikipedia_url", csvCols[0]), cell("if stored", csvCols[1]), cell("url", csvCols[2]), cell("gold, skips Wikidata search", csvCols[3]) ]}),
    new TableRow({ children: [ cell("wikidata_qid", csvCols[0]), cell("if stored", csvCols[1]), cell("string e.g. Q42", csvCols[2]), cell("even better, skips lookup entirely", csvCols[3]) ]}),
  ],
});

// ---- Confidence tiers table ----
const confCols = [1400, 4500, 3460];
const confTable = new Table({
  width: { size: 9360, type: WidthType.DXA },
  columnWidths: confCols,
  rows: [
    new TableRow({ children: [
      cell("tier", confCols[0], { header: true, run: { bold: true } }),
      cell("condition", confCols[1], { header: true, run: { bold: true } }),
      cell("action", confCols[2], { header: true, run: { bold: true } }),
    ]}),
    new TableRow({ children: [
      cell("HIGH", confCols[0], { run: { bold: true } }),
      cell("Exact name + birth year matches one Wikidata entity", confCols[1]),
      cell("Auto-apply canonical professions", confCols[2]),
    ]}),
    new TableRow({ children: [
      cell("MEDIUM", confCols[0], { run: { bold: true } }),
      cell("Multiple Wikidata matches after birth-year filter, OR fuzzy name match (diacritics, transliteration, nicknames)", confCols[1]),
      cell("Flag for manual review", confCols[2]),
    ]}),
    new TableRow({ children: [
      cell("LOW", confCols[0], { run: { bold: true } }),
      cell("No Wikidata match at all", confCols[1]),
      cell("Skip; celeb won't appear on /profession/ pages", confCols[2]),
    ]}),
  ],
});

// ---- SQL seed (the big 100-row insert, exact from md) ----
const seedSql = `INSERT INTO professions (slug, display_name, wikidata_qid, category, is_umbrella, sort_order) VALUES
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
('socialite',         'Socialite',          'Q638995',   'Other',         FALSE, 165);`;

// ---- Build content ----
const children = [];

// Title
children.push(new Paragraph({
  alignment: AlignmentType.LEFT,
  spacing: { after: 120 },
  children: [new TextRun({ text: "Profession Database Migration", bold: true, size: 40 })],
}));
children.push(new Paragraph({
  spacing: { after: 240 },
  children: [new TextRun({ text: "Joseph's Runbook", bold: true, size: 28, color: "666666" })],
}));

children.push(p([bold("Companion to: "), run("profession-taxonomy-spec.md (design doc, read that first for context)")]));
children.push(p([bold("Role: "), run("Joseph handles all DB schema changes, seeding, bulk imports, index management, and rollback. Shafik exports data and updates PHP queries on celeb pages. Claude runs the Wikidata cleanup pass.")]));
children.push(p([bold("Database: "), run("Production celeb DB on gmtxdev.com / staginggm.com / live (confirm connection string with John before starting)")]));

// Migration Overview
children.push(h1("Migration Overview"));
children.push(...codeBlock(
`1. Schema          →   2. Seed              →   3. Import            →   4. Switch queries
   (Joseph)             professions table         cleaned data             (Shafik)
                        (Joseph)                  (Joseph)
                                                                                 ↓
                                                                          5. Monitor
                                                                             1 week, then
                                                                             drop old col`));

// PRE-FLIGHT
children.push(h1("PRE-FLIGHT — Do this first"));

children.push(h3("0.1  Confirm you have:"));
children.push(bullet("Read-write access to the celeb DB on staging (do not touch live yet)"));
children.push(bullet("Shafik's CSV export of current celeb data (format below)"));
children.push(bullet("The cleaned profession mapping CSV from Claude's Wikidata pass (produced after step 2)"));
children.push(bullet("Explicit go-ahead from John before the LIVE migration"));

children.push(h3("0.2  Full DB backup (non-negotiable)"));
children.push(...codeBlock(
`mysqldump --single-transaction \\
          --routines \\
          --triggers \\
          -u <user> -p \\
          <db_name> > celeb_db_backup_YYYYMMDD_preProfessionMigration.sql`));
children.push(p("Store in the same offsite location as your other DB backups. Verify with ls -lh — if the file is under 10MB something is wrong, stop and investigate."));

children.push(h3("0.3  Record baseline metrics"));
children.push(p("Capture before-state for sanity checking later:"));
children.push(...codeBlock(
`SELECT COUNT(*) AS total_celebs FROM celebs;
SELECT COUNT(DISTINCT profession) AS distinct_profession_strings FROM celebs;
SELECT profession, COUNT(*) AS n
  FROM celebs
  GROUP BY profession
  ORDER BY n DESC
  LIMIT 20;`));
children.push(p("Save the output. You'll compare against post-migration counts to confirm no celebs were lost."));

// STEP 1
children.push(h1("STEP 1 — Create new tables (staging first)"));
children.push(p("Run on staging before anything touches live."));
children.push(...codeBlock(
`-- 1a. Lookup table: the canonical 100 professions
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;`));
children.push(p("Verify:"));
children.push(...codeBlock(
`SHOW TABLES LIKE 'profession%';
DESCRIBE professions;
DESCRIBE celeb_professions;`));
children.push(p("Both tables should show up, empty."));

// STEP 2
children.push(h1("STEP 2 — Seed the professions table (100 rows)"));
children.push(p("Run this exact SQL on staging. Do not modify slugs or Q-IDs — they must match what Claude's Wikidata cleanup pass expects."));
children.push(...codeBlock(seedSql));
children.push(p("Verify:"));
children.push(...codeBlock(
`SELECT COUNT(*) FROM professions;                         -- expect exactly 100
SELECT category, COUNT(*) FROM professions GROUP BY category ORDER BY MIN(sort_order);
SELECT COUNT(*) FROM professions WHERE is_umbrella = TRUE;   -- expect 5`));
children.push(p("(umbrellas: athlete, musician, scientist, writer, designer)"));

// STEP 3
children.push(h1("STEP 3 — Import the cleaned celeb_professions data"));
children.push(p("Claude provides a CSV after the Wikidata pass. Format:"));
children.push(...codeBlock(
`celeb_id,profession_slug,confidence
123,actor,HIGH
123,director,HIGH
456,physician,MEDIUM
789,painter,HIGH`));

children.push(h3("3.1  Load into a temporary staging table"));
children.push(...codeBlock(
`CREATE TEMPORARY TABLE staging_celeb_professions (
  celeb_id         INT,
  profession_slug  VARCHAR(50),
  confidence       ENUM('HIGH','MEDIUM','LOW')
);

LOAD DATA LOCAL INFILE '/path/to/celeb_professions_cleaned.csv'
  INTO TABLE staging_celeb_professions
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\\n'
  IGNORE 1 LINES;`));
children.push(p("Verify:"));
children.push(...codeBlock(
`SELECT COUNT(*) FROM staging_celeb_professions;
SELECT confidence, COUNT(*) FROM staging_celeb_professions GROUP BY confidence;`));
children.push(p("Expected distribution:"));
children.push(bullet("HIGH: ~60-70% of celebs × avg 2 professions each"));
children.push(bullet("MEDIUM: ~20-30% (need John/Maja review before promoting)"));
children.push(bullet("LOW: ~5-10%"));

children.push(h3("3.2  Sanity-check for orphans"));
children.push(p("Every profession_slug in the CSV must exist in the professions table:"));
children.push(...codeBlock(
`SELECT DISTINCT s.profession_slug
  FROM staging_celeb_professions s
  LEFT JOIN professions p ON p.slug = s.profession_slug
  WHERE p.id IS NULL;`));
children.push(p([bold("Expected: 0 rows. "), run("If any rows return, stop and notify Claude — taxonomy mismatch.")]));
children.push(p("Also check for orphan celeb IDs:"));
children.push(...codeBlock(
`SELECT COUNT(*) FROM staging_celeb_professions s
  LEFT JOIN celebs c ON c.id = s.celeb_id
  WHERE c.id IS NULL;`));
children.push(p("Expected: 0."));

children.push(h3("3.3  Insert HIGH confidence rows (auto-apply)"));
children.push(...codeBlock(
`INSERT INTO celeb_professions (celeb_id, profession_id, confidence, source)
SELECT s.celeb_id, p.id, s.confidence, 'wikidata'
  FROM staging_celeb_professions s
  JOIN professions p ON p.slug = s.profession_slug
  WHERE s.confidence = 'HIGH';`));
children.push(p("Verify:"));
children.push(...codeBlock(
`SELECT COUNT(*) FROM celeb_professions;
SELECT COUNT(DISTINCT celeb_id) FROM celeb_professions;    -- celebs with at least one profession`));

children.push(h3("3.4  Hold MEDIUM + LOW for review"));
children.push(p([run("Do "), bold("NOT"), run(" insert MEDIUM/LOW yet. Export them for John / Maja to review:")]));
children.push(...codeBlock(
`SELECT s.celeb_id, c.name, c.birth_year, s.profession_slug, s.confidence
  FROM staging_celeb_professions s
  JOIN celebs c ON c.id = s.celeb_id
  WHERE s.confidence IN ('MEDIUM','LOW')
  ORDER BY s.confidence, c.name
  INTO OUTFILE '/tmp/celeb_professions_review.csv'
  FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\\n';`));
children.push(p("Send to John. After review, load approved subset back in the same way as step 3.3 but with source = 'manual'."));

// STEP 4
children.push(h1("STEP 4 — Switch category page queries (Shafik)"));
children.push(p("This is Shafik's job but listed here so you know what's changing."));
children.push(p([bold("Old (string LIKE, slow, dirty):")]));
children.push(...codeBlock(`SELECT * FROM celebs WHERE profession LIKE '%actor%';`));
children.push(p([bold("New (indexed JOIN):")]));
children.push(...codeBlock(
`SELECT c.* FROM celebs c
  JOIN celeb_professions cp ON cp.celeb_id = c.id
  JOIN professions p ON p.id = cp.profession_id
  WHERE p.slug = 'actor'
  ORDER BY c.name;`));
children.push(p("Benchmark both with EXPLAIN — the new version should show Using index on idx_profession, no full table scan."));

// STEP 5
children.push(h1("STEP 5 — Monitor, then drop the old column"));
children.push(p([run("Keep "), new TextRun({ text: "celebs.profession", font: MONO_FONT }), run(" around for "), bold("7 days"), run(" after go-live. During that window:")]));
children.push(bullet("Daily check: SELECT COUNT(*) FROM celebs WHERE id NOT IN (SELECT celeb_id FROM celeb_professions) — confirms how many celebs have zero profession matches (should match the LOW bucket)"));
children.push(bullet("Watch error logs on celebrity category pages"));
children.push(bullet("Watch Google Search Console for sudden crawl errors on /profession/*/ URLs"));
children.push(p("After 7 days with no issues, drop:"));
children.push(...codeBlock(`ALTER TABLE celebs DROP COLUMN profession;`));

// Rollback Plan
children.push(h1("Rollback Plan"));

children.push(h3("If step 1-2 fails (tables/seed)"));
children.push(...codeBlock(`DROP TABLE celeb_professions;\nDROP TABLE professions;`));
children.push(p("No data loss. Try again."));

children.push(h3("If step 3 fails (bad import)"));
children.push(...codeBlock(`TRUNCATE celeb_professions;`));
children.push(p("Then re-run from 3.1. Seed data in professions is untouched."));

children.push(h3("If step 4 fails (PHP queries broken)"));
children.push(p("Old celebs.profession column is still there. Revert PHP to use the old LIKE queries. Investigate, fix, re-deploy."));

children.push(h3("Nuclear option (restore from backup)"));
children.push(...codeBlock(`mysql -u <user> -p <db_name> < celeb_db_backup_YYYYMMDD_preProfessionMigration.sql`));

// Staging → Live
children.push(h1("Staging → Live Flow"));
children.push(bullet("Do all of steps 1-3 on staging first"));
children.push(bullet("Shafik updates PHP on staging, tests"));
children.push(bullet("QA: visit /celebrities/profession/actor/, /politician/, /spiritual-teacher/ on staging — pages render, counts look right"));
children.push(bullet("John green-lights live migration"));
children.push(bullet("Repeat steps 1-3 on live, ideally during low-traffic window (3-5 AM UTC)"));
children.push(bullet("Shafik pushes PHP to live"));
children.push(bullet("Monitor for 1 hour actively, then daily for a week"));

// Checklist
children.push(h1("Checklist summary"));
const checklistItems = [
  "Full DB backup taken",
  "Baseline metrics captured",
  "Schema created on staging",
  "Professions table seeded (100 rows verified)",
  "Cleaned CSV loaded into staging table",
  "Orphan checks passed (0 orphan slugs, 0 orphan celeb IDs)",
  "HIGH confidence rows inserted",
  "MEDIUM/LOW exported for John's review",
  "Approved MEDIUM/LOW rows inserted",
  "Shafik's PHP queries swapped and tested on staging",
  "/profession/*/ pages render correctly on staging",
  "John approves live migration",
  "Live migration executed during low-traffic window",
  "1 hour active monitoring post-live",
  "7-day monitoring window before dropping celebs.profession",
];
for (const item of checklistItems) {
  children.push(new Paragraph({
    spacing: { after: 80 },
    children: [new TextRun({ text: "☐  " + item, font: "Arial", size: 22 })],
  }));
}

// ---- Build document ----
const doc = new Document({
  creator: "Genetic Matrix",
  title: "Profession Database Migration — Joseph's Runbook",
  styles: {
    default: { document: { run: { font: "Arial", size: 22 } } },
    paragraphStyles: [
      { id: "Heading1", name: "Heading 1", basedOn: "Normal", next: "Normal", quickFormat: true,
        run: { size: 32, bold: true, font: "Arial", color: "1F3864" },
        paragraph: { spacing: { before: 360, after: 180 }, outlineLevel: 0 } },
      { id: "Heading2", name: "Heading 2", basedOn: "Normal", next: "Normal", quickFormat: true,
        run: { size: 28, bold: true, font: "Arial", color: "2E75B6" },
        paragraph: { spacing: { before: 300, after: 150 }, outlineLevel: 1 } },
      { id: "Heading3", name: "Heading 3", basedOn: "Normal", next: "Normal", quickFormat: true,
        run: { size: 24, bold: true, font: "Arial", color: "444444" },
        paragraph: { spacing: { before: 240, after: 120 }, outlineLevel: 2 } },
    ],
  },
  numbering: {
    config: [
      { reference: "bullets", levels: [{ level: 0, format: LevelFormat.BULLET, text: "•",
        alignment: AlignmentType.LEFT, style: { paragraph: { indent: { left: 720, hanging: 360 } } } }] },
    ],
  },
  sections: [{
    properties: {
      page: {
        size: { width: 12240, height: 15840 },
        margin: { top: 1440, right: 1440, bottom: 1440, left: 1440 },
      },
    },
    children,
  }],
});

Packer.toBuffer(doc).then(buffer => {
  fs.writeFileSync(OUT, buffer);
  console.log("Wrote:", OUT, "(" + buffer.length + " bytes)");
});
