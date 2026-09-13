<?php
/**
 * Plugin Name: GM Language Cookie Sync
 * Description: Bidirectional language sync between WPML (WordPress) and Learn Hub (static HTML) via shared gm_lang cookie on .geneticmatrix.com.
 * Version: 1.2
 * Author: Genetic Matrix
 *
 * INSTALLATION (Joseph):
 *   1. Upload this file to: /wp-content/mu-plugins/gm-lang-cookie.php
 *      (If mu-plugins folder doesn't exist, create it. mu = must-use, auto-loaded, no activation needed.)
 *   2. No activation, no configuration. Works on page load.
 *   3. Test: switch language on WordPress, check browser cookies for gm_lang.
 *   4. Test: switch language on Learn Hub, reload a WordPress page, should follow.
 *   5. Test THE ENGLISH RULE (new in 1.1, and the reason for it):
 *        - clear cookies, visit /de/astro-calendar/  -> gm_lang becomes de
 *        - now visit /plans-features/
 *        - it MUST serve /plans-features/ in English and reset gm_lang to en.
 *          Landing on /de/plaene-merkmale/ means this file did not deploy.
 *
 * STAGING: nothing to change. The cookie domain follows the request host (1.2).
 *
 * CHANGELOG
 *   1.2  2026-09-13  Cookie domain derived from the request host, so one file deploys to staging
 *                    and live unedited. Behaviour otherwise identical to 1.1.
 *   1.1  2026-09-09  An English WordPress URL now always serves English. Previously a single click
 *                    on a non-English link locked a visitor into that language site-wide, because
 *                    the English URL could neither be served nor clear the cookie. Owner's rule:
 *                    "We dont want real english users goign to a foreign page EVER" /
 *                    "Yes serve english when in doubt".
 *
 *                    The two decisions are now deliberately asymmetric, via gm_lang_is_top_nav():
 *                      SERVING  is permissive - anything not positively a subresource gets
 *                               English, so absent or stripped Sec-Fetch headers fall towards
 *                               English rather than towards a foreign page.
 *                      WRITING  is strict, and strict in BOTH directions - only a positive
 *                               document+navigate, never a prefetch and never a background
 *                               request, may change a visitor's stored language, whatever the
 *                               languages involved. This keeps db379128 intact for clients that
 *                               send no Sec-Fetch headers, and it closes the reverse hole found
 *                               2026-09-09: three background fetch() calls to /de/ URLs, from a
 *                               page the visitor never left, silently switched the whole site to
 *                               German. An img, an XHR, a prefetch or a link-preview crawler
 *                               pointing at any /de/ URL was enough.
 *                    Speculative prefetch and prerender are excluded from both, via Sec-Purpose /
 *                    Purpose / X-Moz. WordPress 6.8 ships Speculative Loading on by default, so
 *                    without that check a page the member never opened would reset their language.
 *
 *                    KNOWN TRADE-OFF, accepted by the owner: switching language on the static
 *                    Learn Hub no longer drags WordPress along when the next click is an English
 *                    URL. Learn Hub links that point at /{lang}/ URLs are unaffected, because the
 *                    URL itself carries the language.
 *
 *                    NOT FIXED HERE, and it is the other half of the same fault: the 482 static
 *                    Learn Hub pages carry their OWN cookie router in a head script that does
 *                    window.location.replace() from an English URL into /learn-hub/{cookie}/.
 *                    /learn-hub/ is blacklisted below, so nothing in this file can reach it.
 *                    An English visitor with a stale non-en cookie is still redirected there,
 *                    and location.replace means Back cannot escape it. Separate job.
 *   1.0             Bidirectional sync via the shared cookie.
 */

if (!defined('ABSPATH')) exit;

// The cookie domain follows the host, so the SAME file deploys to staging and live with no
// hand edit (a hand edit per environment is how live and the repo drift apart). Two labels of
// the request host: www.staginggm.com -> .staginggm.com, www.geneticmatrix.com -> .geneticmatrix.com.
// Anything without a dot (localhost) gets no domain attribute, which is what a cookie on a
// bare host needs.
if (!defined('GM_LANG_COOKIE_DOMAIN')) {
    $gm_lang_host = isset($_SERVER['HTTP_HOST']) ? strtolower(preg_replace('/:\d+$/', '', (string) $_SERVER['HTTP_HOST'])) : '';
    $gm_lang_parts = explode('.', $gm_lang_host);
    define('GM_LANG_COOKIE_DOMAIN', count($gm_lang_parts) >= 2 ? '.' . implode('.', array_slice($gm_lang_parts, -2)) : '');
    unset($gm_lang_host, $gm_lang_parts);
}

// Supported languages (must match Learn Hub master-nav.html SUPPORTED array)
function gm_lang_supported() {
    return ['en','de','es','fr','it','nl','pt'];
}

// Normalize WPML language code to our short code
function gm_lang_normalize($lang) {
    if ($lang === 'pt-pt' || $lang === 'pt-br') return 'pt';
    return $lang;
}

/**
 * Is this request a real top-level page load - a click, or a typed URL - rather than a
 * subresource or a speculative prefetch?
 *
 * TWO ANSWERS, DELIBERATELY DIFFERENT, because the two decisions carry different risk:
 *
 *   $strict = true   used before OVERWRITING the visitor's stored language. Requires a positive
 *                    document+navigate signal. Getting this wrong destroys a real German
 *                    member's preference, so absence of evidence is not evidence of a click.
 *
 *   $strict = false  used before deciding what to SERVE. Treats anything that is not positively
 *                    a subresource as a page load. Getting this wrong sends an English speaker
 *                    to a foreign page, and John's rule is "serve english when in doubt", so
 *                    here the unknown case must fall towards English.
 *
 * Splitting them is what lets us satisfy the English rule without re-opening db379128 for
 * browsers that send no Sec-Fetch headers at all: they are served English, but their stored
 * language is not overwritten by a background request.
 */
function gm_lang_is_top_nav($strict) {
    $dest = isset($_SERVER['HTTP_SEC_FETCH_DEST']) ? $_SERVER['HTTP_SEC_FETCH_DEST'] : '';
    $mode = isset($_SERVER['HTTP_SEC_FETCH_MODE']) ? $_SERVER['HTTP_SEC_FETCH_MODE'] : '';

    // Speculative prefetch and prerender send dest=document + mode=navigate with the visitor's
    // cookies, but the visitor has not gone anywhere and may never do so. WordPress 6.8 ships
    // Speculative Loading on by default and Cloudflare Speed Brain prefetches on hover, so this
    // is ordinary traffic, not an edge case. Never count one as a click, in either mode.
    $purpose = '';
    foreach (array('HTTP_SEC_PURPOSE', 'HTTP_PURPOSE', 'HTTP_X_MOZ') as $h) {
        if (!empty($_SERVER[$h])) { $purpose = (string) $_SERVER[$h]; break; }
    }
    if ($purpose !== '' && (stripos($purpose, 'prefetch') !== false || stripos($purpose, 'prerender') !== false)) {
        return false;
    }

    if ($strict) {
        return ($dest === 'document' && $mode === 'navigate');
    }

    // Permissive. A subresource always names itself in Sec-Fetch-Dest, so anything NOT on this
    // list - including an absent header, a header stripped by a proxy, or a value we do not
    // recognise - is treated as a page load and gets English.
    $subresource = array(
        'empty', 'image', 'script', 'style', 'font', 'audio', 'video', 'track', 'manifest',
        'object', 'embed', 'worker', 'sharedworker', 'serviceworker', 'xslt', 'report',
        'paintworklet', 'audioworklet', 'webidentity', 'speculationrules',
    );
    return !in_array($dest, $subresource, true);
}

// Toggle debug logging (writes to PHP error log). Set to true only when troubleshooting.
define('GM_LANG_DEBUG', false);
function gm_lang_log($msg) {
    if (defined('GM_LANG_DEBUG') && GM_LANG_DEBUG) {
        error_log('[GM_LANG] ' . $msg);
    }
}

/**
 * Decide whether the current request is a real WPML-controlled WordPress page
 * where we should trust WPML's reported language.
 *
 * Returns true for normal WordPress pages (English or with /{lang}/ prefix).
 * Returns false for:
 *   - Static assets (.js, .css, .map, images, fonts)
 *   - wp-content, wp-admin, wp-includes paths
 *   - Non-WPML static sections (celebrities, celebrity, dictionary, learn-hub)
 *   - Bogus filesystem paths (/home/staging/...)
 */
function gm_lang_is_wpml_page() {
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    // Strip query string
    $q = strpos($uri, '?');
    if ($q !== false) $uri = substr($uri, 0, $q);

    // Empty or root = definitely WPML
    if ($uri === '' || $uri === '/') return true;

    // Blacklisted path prefixes (case insensitive on prefix match)
    $blacklist_prefixes = [
        '/wp-content/',
        '/wp-admin/',
        '/wp-includes/',
        '/wp-json/',
        '/xmlrpc.php',
        '/wp-login.php',
        '/home/',         // bogus filesystem paths leaking into URLs
        '/celebrities/',  // static celebrities section
        '/celebrity/',    // individual celebrity pages (static)
        '/dictionary/',   // static dictionary
        '/learn-hub/',    // static learn hub
    ];
    foreach ($blacklist_prefixes as $pref) {
        if (strpos($uri, $pref) === 0) return false;
    }

    // Blacklisted file extensions (static assets)
    $path_part = parse_url($uri, PHP_URL_PATH);
    if ($path_part) {
        $ext = strtolower(pathinfo($path_part, PATHINFO_EXTENSION));
        $asset_exts = ['js','css','map','png','jpg','jpeg','gif','svg','webp','ico','woff','woff2','ttf','eot','otf','mp4','webm','ogg','mp3','pdf','zip','json','xml','txt'];
        if (in_array($ext, $asset_exts, true)) return false;
    }

    // Otherwise assume it's a WordPress page under WPML control
    return true;
}

/**
 * PART 1: Sync WordPress -> Learn Hub
 * Hooked to `wp` action at priority 999 so every other plugin (including WPML)
 * has finished initializing the current language before we read it.
 */
add_action('wp', 'gm_lang_write_cookie', 999);
function gm_lang_write_cookie() {
    if (is_admin()) { gm_lang_log('Part1 skip: admin'); return; }
    if (defined('DOING_AJAX') && DOING_AJAX) { gm_lang_log('Part1 skip: ajax'); return; }
    if (defined('DOING_CRON') && DOING_CRON) { gm_lang_log('Part1 skip: cron'); return; }
    if (defined('REST_REQUEST') && REST_REQUEST) { gm_lang_log('Part1 skip: rest'); return; }
    if (headers_sent($file, $line)) { gm_lang_log("Part1 skip: headers_sent at $file:$line"); return; }
    if (!function_exists('apply_filters')) { gm_lang_log('Part1 skip: no apply_filters'); return; }

    $request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '?';
    $wpml_raw = apply_filters('wpml_current_language', null);
    $icl_const = defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'undef';
    $existing_cookie = isset($_COOKIE['gm_lang']) ? $_COOKIE['gm_lang'] : 'none';

    // Guard: only write cookie when the URL is actually WPML-controlled.
    // Otherwise celebrity/theme/404/asset requests will clobber user preference.
    if (!gm_lang_is_wpml_page()) {
        gm_lang_log("Part1 skip: URI=$request_uri not a WPML page (cookie=$existing_cookie preserved)");
        return;
    }

    gm_lang_log("Part1 URI=$request_uri wpml_filter=" . var_export($wpml_raw, true) . " ICL_LANGUAGE_CODE=$icl_const cookie=$existing_cookie");

    $lang = $wpml_raw;
    if (!$lang) { gm_lang_log('Part1 skip: wpml returned empty'); return; }
    $lang = gm_lang_normalize($lang);

    if (!in_array($lang, gm_lang_supported(), true)) { gm_lang_log("Part1 skip: lang $lang not supported"); return; }

    // Normalize BOTH sides. Part 2 already does; Part 1 did not, and line 219 below is now the
    // gate on the English guarantee, so a raw 'pt-pt' cookie comparing unequal to 'pt' there
    // would matter. Harmless today, load-bearing the moment gm_lang_normalize gains a mapping
    // that collapses to 'en'.
    $existing = isset($_COOKIE['gm_lang']) ? gm_lang_normalize($_COOKIE['gm_lang']) : null;
    if ($existing === $lang) { gm_lang_log("Part1 noop: cookie already $lang"); return; }

    // ASYMMETRIC PROTECTION for non-default languages.
    // English is the default: hitting / reports wpml=en even for background
    // requests (XHR/fetch/image/prefetch). Protect existing non-en cookies
    // UNLESS this is a real top-level document navigation.
    //
    // JOHN'S RULE, 2026-09-09: "We dont want real english users goign to a foreign
    // page EVER" and "Yes serve english when in doubt." A real page load of an
    // English URL MUST serve English and MUST reset the cookie. Anything else
    // traps an English speaker in a language they did not choose, because Part 2
    // below then redirects every English URL they try.
    //
    // The referer test that used to sit here (requirement B: referer must already
    // be inside the user's current language) is GONE, deliberately. It only ever
    // fired for visitors arriving from OUTSIDE the site - a Google result, a link
    // in a mass mail, or a typed URL with no referer at all - which is exactly the
    // population of real English users the rule protects. One click on a German
    // link locked them into German site-wide, with no way back but the switcher.
    //
    // Removing it restores nothing that db379128 fixed. That commit added the
    // Sec-Fetch test BECAUSE the referer test was not doing the job: background
    // XHR from /de/ to / carried referer=/de/ and passed requirement B. Sec-Fetch
    // is the guard that actually distinguishes a page load from a background
    // request, and it is kept in full.
    /*  ONLY A REAL PAGE LOAD MAY CHANGE A VISITOR'S STORED LANGUAGE. BOTH DIRECTIONS.
     *
     *  This guard used to apply only when WPML said 'en' and the cookie said something else -
     *  it protected a German reader from being reset to English, and left the reverse wide open.
     *  Found 2026-09-09 by accident: three background fetch() calls to /de/ URLs, from a page
     *  the visitor never left, silently set gm_lang AND wp-wpml_current_language to 'de'. No
     *  navigation, no click. An <img>, an XHR, a prefetch, a link-preview crawler or an embedded
     *  iframe pointing at any /de/ URL was enough to change what language the whole site served.
     *
     *  That is the same fault as the one this file was opened to fix, running the other way, and
     *  it is the more dangerous direction: it moves an English speaker INTO a foreign language,
     *  which is precisely what John's rule forbids.
     *
     *  So the test is now symmetric. Changing stored language is a deliberate act and requires a
     *  positive document+navigate signal, whatever the languages involved. A first visit still
     *  writes freely - there is nothing to protect yet - and re-affirming the same language is a
     *  no-op handled above.
     *
     *  Serving is untouched and stays permissive: Part 2 still hands out English whenever the
     *  signal is unclear. Strict about WRITING, generous about SERVING.                        */
    if (!empty($existing) && $existing !== $lang && !gm_lang_is_top_nav(true)) {
        gm_lang_log("Part1 protect: background request would change cookie $existing -> $lang, preserving");
        return;
    }
    if (!empty($existing) && $existing !== $lang) {
        gm_lang_log("Part1 allow: real page load, changing cookie $existing -> $lang");
    }

    gm_lang_log("Part1 WRITING cookie: " . ($existing ?: 'none') . " -> $lang");
    setcookie('gm_lang', $lang, [
        'expires'  => time() + 31536000, // 1 year
        'path'     => '/',
        'domain'   => GM_LANG_COOKIE_DOMAIN,
        'secure'   => is_ssl(),
        'httponly' => false, // MUST be false so Learn Hub JS can read it
        'samesite' => 'Lax',
    ]);
    $_COOKIE['gm_lang'] = $lang; // reflect immediately in current request
}

/**
 * PART 2: Sync Learn Hub -> WordPress
 * If gm_lang cookie says a language different from WPML's current one,
 * redirect to the WPML equivalent URL.
 *
 * Only acts on frontend page requests, not AJAX/REST/admin/cron.
 */
add_action('template_redirect', 'gm_lang_follow_cookie');
function gm_lang_follow_cookie() {
    if (is_admin()) return;
    if (defined('DOING_AJAX') && DOING_AJAX) return;
    if (defined('DOING_CRON') && DOING_CRON) return;
    if (defined('REST_REQUEST') && REST_REQUEST) return;
    if (!function_exists('apply_filters')) return;

    if (!gm_lang_is_wpml_page()) { gm_lang_log('Part2 skip: not a WPML page'); return; }

    if (empty($_COOKIE['gm_lang'])) { gm_lang_log('Part2 skip: no cookie'); return; }
    $cookie_lang = gm_lang_normalize($_COOKIE['gm_lang']);
    if (!in_array($cookie_lang, gm_lang_supported(), true)) { gm_lang_log("Part2 skip: bad cookie $cookie_lang"); return; }

    $wpml_lang = apply_filters('wpml_current_language', null);
    if (!$wpml_lang) { gm_lang_log('Part2 skip: wpml empty'); return; }
    $wpml_lang = gm_lang_normalize($wpml_lang);

    gm_lang_log("Part2 cookie=$cookie_lang wpml=$wpml_lang");
    if ($cookie_lang === $wpml_lang) return; // already in sync

    // JOHN'S RULE, 2026-09-09: "We dont want real english users goign to a foreign page EVER."
    // A real page load of an English URL is never redirected into another language, whatever the
    // cookie says. Part 1 normally resets the cookie before we get here, so this rarely fires -
    // it is the backstop for the cases where Part 1 returned early (headers already sent, for
    // one), which is precisely when the guarantee would otherwise quietly fail.
    // PERMISSIVE here, the opposite of Part 1. Every request that is not positively a
    // subresource gets English, including ones with absent or stripped Sec-Fetch headers and
    // ones carrying a header value we do not recognise. That is "serve english when in doubt"
    // written as code. This block only ever RETURNS - it writes no cookie and sends no header -
    // so being generous with it costs nothing and cannot damage a German member's preference.
    if ($wpml_lang === 'en' && gm_lang_is_top_nav(false)) {
        gm_lang_log("Part2 HOLD: english url, cookie=$cookie_lang, serving english");
        return;
    }

    // Get the current post's translated URL
    global $post;
    $target_url = null;

    if (is_singular() && !empty($post)) {
        $target_id = apply_filters('wpml_object_id', $post->ID, get_post_type($post->ID), false, $cookie_lang);
        if ($target_id) {
            $target_url = get_permalink($target_id);
        }
    }

    // Fallback: use home URL in target language
    if (!$target_url) {
        $target_url = apply_filters('wpml_home_url', home_url('/'), $cookie_lang);
    }

    if (!$target_url) return;

    // Prevent redirect loops: only redirect if target URL differs from current
    $current_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (rtrim($target_url, '/') === rtrim($current_url, '/')) return;

    wp_safe_redirect($target_url, 302);
    exit;
}
