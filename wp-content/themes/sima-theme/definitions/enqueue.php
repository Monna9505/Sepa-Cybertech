<?php
/**
 * Enqueuing styles & scripts of the theme
 */
function sima_custom_assets_enqueue() {
    wp_enqueue_style( 'sima-default-theme-styles', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'sima-main-theme-styles', get_stylesheet_directory_uri() . '/assets/public/css/styles.css', array(), null);
    wp_enqueue_style( 'slick-slider-styles', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css", array(), null);

    wp_enqueue_script( 'jquery-validator', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js', array( 'jquery' ), '', true);
    wp_enqueue_script( 'slick-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'sima-font-awesome-kit', 'https://kit.fontawesome.com/c281fe38c2.js' );
    wp_enqueue_script( 'sima-theme-scripts', get_stylesheet_directory_uri() . '/assets/public/js/scripts.js', array( 'jquery' ), null, true );
}

add_action( 'wp_enqueue_scripts', 'sima_custom_assets_enqueue' );