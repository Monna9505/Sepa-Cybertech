<?php

/**
 * Enqueuing styles & scripts of the theme
 */
function sima_custom_assets_enqueue() {
    wp_enqueue_style( 'sima-default-theme-styles', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'sima-main-theme-styles', get_stylesheet_directory_uri() . '/assets/public/css/styles.css', array(), null);

    wp_enqueue_script( 'sima-theme-scripts', get_stylesheet_directory_uri() . '/assets/public/js/scripts.js', array( 'jquery' ), null, true );
}

add_action( 'wp_enqueue_scripts', 'sima_custom_assets_enqueue' );