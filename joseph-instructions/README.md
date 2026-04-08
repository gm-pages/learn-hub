# Joseph Instructions: gm-lang-cookie.php Install

## What this does
Syncs language between WordPress (WPML) and Learn Hub static pages via a shared `gm_lang` cookie on `.geneticmatrix.com`. One language switcher anywhere, whole site follows.

## Install on STAGING first

1. Open `gm-lang-cookie.php` in a text editor.
2. Change line:
   ```php
   define('GM_LANG_COOKIE_DOMAIN', '.geneticmatrix.com');
   ```
   to:
   ```php
   define('GM_LANG_COOKIE_DOMAIN', '.staginggm.com');
   ```
3. Upload the edited file to the staging server at:
   ```
   /wp-content/mu-plugins/gm-lang-cookie.php
   ```
   - If `mu-plugins` folder does not exist, create it.
   - `mu` = must-use. Auto-loaded by WordPress. No activation needed.
4. No cache clear needed, but if a page cache is active, purge it.

## Test on STAGING

1. Open browser in incognito mode.
2. Go to `https://www.staginggm.com/`.
3. Open DevTools > Application > Cookies > `staginggm.com`.
4. Expected: `gm_lang=en` cookie present.
5. Switch language to German via the site language switcher.
6. Expected: cookie updates to `gm_lang=de`.
7. Click into Learn Hub (any link).
8. Expected: Learn Hub shows in German automatically.
9. On Learn Hub, click the language switcher, change to French.
10. Expected: cookie updates to `gm_lang=fr`, Learn Hub page reloads in French.
11. Click back to a WordPress page (any link outside Learn Hub).
12. Expected: WordPress redirects to the French version of that page.

## If tests pass, deploy to LIVE

1. Copy the ORIGINAL file (with `.geneticmatrix.com` line, NOT the `.staginggm.com` version).
2. Upload to live server at:
   ```
   /wp-content/mu-plugins/gm-lang-cookie.php
   ```
3. Purge any page cache on live.

## Rollback
Delete the file. That's it. No database changes, no settings to revert.

## Troubleshooting

- **Cookie not appearing:** check `.htaccess` doesn't strip `Set-Cookie` headers. Check HTTPS on staging.
- **Redirect loop:** should not happen (guard is in place). If it does, delete the file and report back.
- **Cookie appearing but Learn Hub doesn't react:** verify Learn Hub page has the `gm-lang-switcher` script in its source (view source, search "gm-lang-switcher").
- **WordPress ignores cookie:** confirm WPML is active and `apply_filters('wpml_current_language', null)` returns a language code.
