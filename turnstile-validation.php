<?php
/**
 * Plugin Name: Turnstile Validation
 */

add_action('init', function () {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cf-turnstile-response'])) {
        if (!turnstile_verify_token($_POST['cf-turnstile-response'])) {
            wp_die('Turnstile verification failed.');
        }
    }
});

function turnstile_verify_token($token) {
    $secret = CLOUDFLARE_TURNSTILE_SECRET;

    $response = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
        'body' => [
            'secret'   => $secret,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ],
    ]);

    if (is_wp_error($response)) {
        return false;
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);
    return $body['success'] ?? false;
}