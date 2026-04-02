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

    // Get cart from usermeta (_cart_details_ key, serialized + base64 encoded)
    $cart_raw = get_user_meta($user->ID, '_cart_details_', true);
    if ($cart_raw) {
        // Unwrap serialized layers
        $decoded = $cart_raw;
        // May be double-serialized, unwrap until we get the base64 string
        while (is_serialized($decoded)) {
            $decoded = maybe_unserialize($decoded);
        }
        // Decode base64 if present
        $b64_decoded = base64_decode($decoded);
        if ($b64_decoded) {
            $cart_array = maybe_unserialize($b64_decoded);
            if (is_array($cart_array)) {
                $response['cart_count'] = count($cart_array);
            }
        }
    }
}

echo json_encode($response);
exit;
