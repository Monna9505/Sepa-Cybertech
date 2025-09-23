<?php
/**
 * Investors Custom post type - a place where all interested investors will be saved
 */

add_action('init', function() {

    $labels = array(
        'edit_item'     => _x( 'Edit Investor', 'Label name for editing Investor', 'sima-theme' ),
        'view_item'     => _x( 'View Investor', 'Label name for viewing Investor', 'sima-theme' ),
        'view_items'    => _x( 'View Investors', 'Label name for viewing Investors', 'sima-theme' ),
        'all_items'     => _x( 'All Investors', 'Label name for all Investors', 'sima-theme' ),
    );

    register_post_type('investor', [
        'labels' => [
            'name'          => __('Investors', 'sima-theme'),
            'singular_name' => __('Investor', 'sima-theme'),
        ],
        'labels'       => $labels,
        'public'       => false,
        'can_export'   => true,
        'show_ui'      => true,
        'show_in_rest' => true,
        'has_archive'  => true,
        'hierarchical' => true,
        'supports'     => ['title', 'custom-fields'],
        'menu_icon'    => 'dashicons-id-alt',
        'capability_type' => 'post',
    ]);
});

add_action('add_meta_boxes', function() {
    add_meta_box(
        'investor_details',
        __('Investor Details', 'sima-theme'),
        function($post) {
            echo '<p><strong>Email:</strong> ' . esc_html(get_post_meta($post->ID, 'email', true)) . '</p>';
            echo '<p><strong>Country:</strong> ' . esc_html(get_post_meta($post->ID, 'country', true)) . '</p>';
            echo '<p><strong>Product:</strong> ' . esc_html(get_post_meta($post->ID, 'product', true)) . '</p>';
        },
        'investor',
        'normal',
        'default'
    );
});