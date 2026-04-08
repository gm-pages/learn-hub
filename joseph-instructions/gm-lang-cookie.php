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

/**
 * PART 1: Sync WordPress -> Learn Hub
 * On every frontend page load, write current WPML language to gm_lang cookie.
 * Hooked to template_redirect (priority 5) so WPML is fully initialized before
 * we read apply_filters('wpml_current_language') and BEFORE Part 2 runs.
 */
add_action('template_redirect', 'gm_lang_write_cookie', 5);
function gm_lang_write_cookie() {
    if (is_admin()) return;
    if (defined('DOING_AJAX') && DOING_AJAX) return;
    if (defined('DOING_CRON') && DOING_CRON) return;
    if (defined('REST_REQUEST') && REST_REQUEST) return;
    if (headers_sent()) return;
    if (!function_exists('apply_filters')) return;

    $lang = apply_filters('wpml_current_language', null);
    if (!$lang) return;
    $lang = gm_lang_normalize($lang);

    if (!in_array($lang, gm_lang_supported(), true)) return;

    $existing = isset($_COOKIE['gm_lang']) ? $_COOKIE['gm_lang'] : null;
    if ($existing === $lang) return;

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

    if (empty($_COOKIE['gm_lang'])) return;
    $cookie_lang = gm_lang_normalize($_COOKIE['gm_lang']);
    if (!in_array($cookie_lang, gm_lang_supported(), true)) return;

    $wpml_lang = apply_filters('wpml_current_language', null);
    if (!$wpml_lang) return;
    $wpml_lang = gm_lang_normalize($wpml_lang);

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
