<?php
/**
 * Plugin Name: GM Language Cookie Sync
 * Description: Bidirectional language sync between WPML (WordPress) and Learn Hub (static HTML) via shared gm_lang cookie on .geneticmatrix.com.
 * Version: 1.0
 * Author: Genetic Matrix
 *
 * INSTALLATION (Joseph):
 *   1. Upload this file to: /wp-content/mu-plugins/gm-lang-cookie.php
 *      (If mu-plugins folder doesn't exist, create it. mu = must-use, auto-loaded, no activation needed.)
 *   2. No activation, no configuration. Works on page load.
 *   3. Test: switch language on WordPress, check browser cookies for gm_lang.
 *   4. Test: switch language on Learn Hub, reload a WordPress page, should follow.
 *
 * STAGING: change '.geneticmatrix.com' below to '.staginggm.com' for the staging install only.
 */

if (!defined('ABSPATH')) exit;

// Change this ONE constant for staging vs live.
define('GM_LANG_COOKIE_DOMAIN', '.geneticmatrix.com');

// Supported languages (must match Learn Hub master-nav.html SUPPORTED array)
function gm_lang_supported() {
    return ['en','de','es','fr','it','nl','pt'];
}

// Normalize WPML language code to our short code
function gm_lang_normalize($lang) {
    if ($lang === 'pt-pt' || $lang === 'pt-br') return 'pt';
    return $lang;
}

// Toggle debug logging (writes to PHP error log)
define('GM_LANG_DEBUG', true);
function gm_lang_log($msg) {
    if (defined('GM_LANG_DEBUG') && GM_LANG_DEBUG) {
        error_log('[GM_LANG] ' . $msg);
    }
}

/**
 * Decide whether the current request is a real WPML-controlled WordPress page
 * where we should trust WPML's reported language.
 *
 * Returns true only if URL path is "/" (English home) or starts with a
 * supported language segment like /de/, /fr/, etc.
 *
 * This prevents WordPress-handled non-WPML URLs (celebrity category pages,
 * theme asset requests, 404s) from writing cookie=en and wiping the user's
 * language preference.
 */
function gm_lang_is_wpml_page() {
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    // Strip query string
    $q = strpos($uri, '?');
    if ($q !== false) $uri = substr($uri, 0, $q);
    // Normalize trailing slash for the root check
    if ($uri === '' || $uri === '/') return true;
    // Explicit language segment: /de/, /de, /fr/..., etc.
    foreach (['de','es','fr','it','nl','pt'] as $code) {
        if ($uri === '/' . $code || strpos($uri, '/' . $code . '/') === 0) {
            return true;
        }
    }
    return false;
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

    $existing = isset($_COOKIE['gm_lang']) ? $_COOKIE['gm_lang'] : null;
    if ($existing === $lang) { gm_lang_log("Part1 noop: cookie already $lang"); return; }

    // ASYMMETRIC PROTECTION for non-default languages.
    // English is the default: hitting / reports wpml=en even for background
    // requests. Protect existing non-en cookies UNLESS the referer indicates
    // the user deliberately navigated from their current language to English.
    if ($lang === 'en' && !empty($existing) && $existing !== 'en') {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $referer_path = $referer ? parse_url($referer, PHP_URL_PATH) : '';
        $referer_host = $referer ? parse_url($referer, PHP_URL_HOST) : '';
        $current_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';

        // Deliberate switch = same host, referer path starts with /{existing}/
        $deliberate = false;
        if ($referer_host === $current_host && $referer_path) {
            if ($referer_path === '/' . $existing || strpos($referer_path, '/' . $existing . '/') === 0) {
                $deliberate = true;
            }
        }

        if (!$deliberate) {
            gm_lang_log("Part1 protect: WPML en but cookie=$existing (non-default), referer=$referer not deliberate, preserving");
            return;
        }
        gm_lang_log("Part1 allow: deliberate EN switch from $existing (referer=$referer)");
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
