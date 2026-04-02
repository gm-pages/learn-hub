<?php
// Learn Hub API: Returns cart count and login state
// Called by Learn Hub pages via JavaScript fetch()

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

header('Content-Type: application/json');
header('Cache-Control: no-cache, no-store, must-revalidate');

$response = array(
    'logged_in' => is_user_logged_in(),
    'cart_count' => 0,
    'username' => ''
);

if (is_user_logged_in()) {
    $user = wp_get_current_user();
    $response['username'] = $user->display_name;

    // Get cart from usermeta
    $cart_raw = get_user_meta($user->ID, '_cart_details_', true);
    if ($cart_raw) {
        // The value is double-serialized with base64 inside
        // Unwrap serialized layers to get to the base64 string
        $decoded = $cart_raw;
        $max_attempts = 5;
        $attempt = 0;
        while (is_serialized($decoded) && $attempt < $max_attempts) {
            $decoded = maybe_unserialize($decoded);
            $attempt++;
        }

        // Now try base64 decode
        if (is_string($decoded)) {
            $b64 = base64_decode($decoded, true);
            if ($b64 !== false) {
                $cart_array = maybe_unserialize($b64);
                if (is_array($cart_array)) {
                    // Count top-level cart items
                    $response['cart_count'] = count($cart_array);
                }
            }
        }
        // If decoded is already an array (no base64 layer)
        if (is_array($decoded)) {
            $response['cart_count'] = count($decoded);
        }
    }
}

echo json_encode($response);
exit;
