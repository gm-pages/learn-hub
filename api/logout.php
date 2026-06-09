<?php
// Learn Hub API: Log the current user out and redirect to their language home.
//
// Called from the static sub-page nav's Log Out link. Static pages can't bake
// a per-session _wpnonce into a static <a href>, so without server help the
// only alternative is WP's "Are you sure?" confirmation page. This endpoint
// runs server-side, calls wp_logout() directly, and 302s to the requested
// language home — one click, no confirmation.
//
// Query param:
//   to   Language code OR a known language root path. Anything outside the
//        allowlist falls back to "/". Prevents open-redirect abuse.

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

// Allowlist of safe destinations (matches the language roots the nav links to).
$allowed = array(
    'en' => '/',
    'de' => '/de/',
    'es' => '/es/',
    'fr' => '/fr/',
    'it' => '/it/',
    'nl' => '/nl/',
    'pt' => '/pt-pt/',
);

$to_param = isset($_GET['to']) ? (string)$_GET['to'] : '';
$target = '/';
if (isset($allowed[$to_param])) {
    // Short code form: ?to=de
    $target = $allowed[$to_param];
} else {
    // Path form: ?to=/de/ — accept only if it matches a known root verbatim.
    foreach ($allowed as $code => $path) {
        if ($to_param === $path) {
            $target = $path;
            break;
        }
    }
}

if (is_user_logged_in()) {
    wp_logout();
}

// 302 to the language home. Header injection guarded by the allowlist above.
header('Location: ' . $target);
exit;
