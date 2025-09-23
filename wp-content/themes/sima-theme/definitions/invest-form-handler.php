<?php
// Hook for AJAX
add_action('wp_ajax_submit_invest_form', 'handle_invest_form_submission');
add_action('wp_ajax_nopriv_submit_invest_form', 'handle_invest_form_submission');

function handle_invest_form_submission() {
    // Check nonce
    if (!isset($_POST['invest_nonce']) || !wp_verify_nonce($_POST['invest_nonce'], 'invest_form_nonce')) {
        wp_send_json_error(['message' => __('Invalid request.', 'sima-theme')]);
    }

    /**
     * sanitize_text_field() - This is a WordPress function for filtering that:
     * Removes HTML tags
     * Removes scripts
     * Trims unnecessary whitespace from the beginning and end
     * Converts invalid characters into safe ones
     */
    $name    = sanitize_text_field($_POST['full_name']);
    $email   = sanitize_email($_POST['email']);
    $country = sanitize_text_field($_POST['country']);
    $product = sanitize_text_field($_POST['product_name']);

    if (empty($name) || empty($email) || empty($country)) {
        wp_send_json_error(['message' => __('Please fill all fields.', 'sima-theme')]);
    }

    // Creating new CPT data
    $post_id = wp_insert_post([
        'post_type'   => 'investor',
        'post_status' => 'publish',
        'post_title'  => $name,
    ]);

    if (!empty($post_id)) {
        update_post_meta($post_id, 'email', $email);
        update_post_meta($post_id, 'country', $country);
        update_post_meta($post_id, 'product', $product);

        wp_send_json_success(['message' => __('Thank you for your interest, our partners will contact you soon!', 'sima-theme')]);
    } else {
        wp_send_json_error(['message' => __('Error saving data.', 'sima-theme')]);
    }
}