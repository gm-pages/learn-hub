# Celebrity Profession Display Fix — Shafik

**Priority:** Blocks celebrities go-live. Ship before `/celebrities/` goes public.
**Scope:** Individual celebrity page only (e.g. `/celebrity/queen-victoria/`).
**Change type:** Template/display layer only. No database migration. Zero risk to the 61K good rows.

---

## The problem

Full audit of `wp_people_profile` (89,024 rows):

- **26,785 celebrities (30.1%)** show junk like `1926-births` as their profession subtitle (Wikipedia category leak from the original import)
- **803 celebrities (0.9%)** show `Notable-Famous-Royal-family` (Queen Victoria, King Charles III, Marie Antoinette, etc.)
- **1,573 rows** have leading/trailing whitespace on the profession field (`" Jazz saxophone player"`, `"Actress "`)

All of this is currently user-visible on individual celebrity pages as a subtitle under the name. Looks unprofessional.

Proper DB backfill (Wikidata) is Phase 2 work (see `profession-taxonomy-spec.md`). This spec is the **display-layer band-aid** so we can ship Phase 1 without waiting.

---

## The fix — one PHP helper

Add this helper wherever you render the celebrity profession subtitle. Drop-in replacement for `$celebrity->profession`.

```php
/**
 * Clean up a celebrity profession for display.
 * Strips Wikipedia category leakage from the original data import.
 *
 * @param string $profession  Raw profession from DB
 * @param string $country     Country from DB (fallback context)
 * @param string $dob         Raw DOB string from DB (e.g. "1923-01-16 12:40:00")
 * @return string             Safe, display-ready string
 */
function gm_display_profession($profession, $country = '', $dob = '') {
    $p = trim((string) $profession);

    // Empty: fall back to country only
    if ($p === '') {
        return esc_html($country);
    }

    // Birth-year tag ("1926-births"): show "Country, YYYY" instead
    if (preg_match('/^\d{4}-births?$/i', $p)) {
        $year = '';
        if ($dob) {
            $ts = strtotime($dob);
            if ($ts) {
                $year = date('Y', $ts);
            }
        }
        $parts = array_filter([$country, $year]);
        return esc_html(implode(', ', $parts));
    }

    // Royal family tag: "Royalty"
    if (stripos($p, 'notable-famous-royal') === 0) {
        return 'Royalty';
    }

    // Generic "notable-famous-*" tag (other Wikipedia category leaks)
    if (stripos($p, 'notable-famous') === 0) {
        return esc_html($country);
    }

    // Slug-form profession ("entertainment-actor-actress") → humanize
    if (strpos($p, '-') !== false && strpos($p, ' ') === false) {
        $p = ucwords(str_replace(['-', '_'], ' ', $p));
    }

    return esc_html($p);
}
```

### Where to call it

Replace any direct output of the profession field:

```php
// BEFORE
<p class="celeb-subtitle"><?php echo esc_html($celebrity->profession); ?></p>

// AFTER
<p class="celeb-subtitle"><?php echo gm_display_profession(
    $celebrity->profession,
    $celebrity->country,
    $celebrity->dob
); ?></p>
```

Grep for uses of `->profession` on the celebrity template and swap all of them.

---

## Test cases

After deploying, spot-check these URLs on staging:

| URL | DB profession | Expected display |
|---|---|---|
| `/celebrity/queen-victoria/` | `Notable-Famous-Royal-family` | `Royalty` |
| `/celebrity/king-charles-iii/` | `Notable-Famous-Royal-family` | `Royalty` |
| `/celebrity/samuel-colt/` | `1814-births` | `United States, 1814` |
| `/celebrity/louis-coblitz/` | `1814-births` | `Germany, 1814` |
| `/celebrity/ben-affleck/` | `Actor` | `Actor` |
| `/celebrity/cannonball-adderley/` | ` Jazz saxophone player` (leading space) | `Jazz saxophone player` |
| `/celebrity/paula-abdul/` | `Singer` | `Singer` |

---

## What this does NOT fix

- Underlying DB rows still have dirty data. That's Phase 2 (Wikidata backfill).
- Doesn't merge `actor` + `actress` into one profession (needed for category filters, but not blocking go-live).
- Doesn't fix duplicate spellings (`writer` vs `writers-fiction` vs `author`).

Those are Phase 2. See `profession-taxonomy-spec.md` for the full cleanup plan.

---

## Estimated effort

~30 minutes. One helper function + swap ~3-5 template calls.
