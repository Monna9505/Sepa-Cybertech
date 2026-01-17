<?php

/**
 * Adding menu support
 */
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
        'main-menu'     => __( 'Main Menu' )
        )
    );
}

/**
 * generate_modules( array $modules )
 *
 * Used to generate a set of modules set in the WP Admin.
 * Uses ACF flexible content field. Goes through each entry of a $modules array
 * and includes the structure of the modules from "/components/modules/"
 *
 * @param array $modules
 *
 * @return Includes all modules that were added from ACF
 */

function generate_modules($modules)
{
    /**
     * Checking if the $modules argument is set and not empty
     */
    if (isset($modules) && !empty($modules)) {
        /**
         * Goes through each module in the set
         */
        foreach ($modules as $module) {
            /**
             * Checks if it has assigned layout
             */
            if (isset($module['acf_fc_layout'])) {
                /**
                 * Preseting filename and file path
                 */
                $file_name = "module_" . str_replace('_', '-', $module['acf_fc_layout']) . ".php";
                $file_path = get_template_directory() . "/components/modules/" . $file_name;

                /**
                 * Checking if the file exists in the corresponding directory
                 */
                if (file_exists($file_path)) {
                    /**
                     * Includes the file on the frontend
                     */
                    include($file_path);
                }
            }
        }
    }
}

/**
 * Adding SVG support
 */
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');


/**
 * Adding Featured Image support to the theme
 */
add_theme_support( 'post-thumbnails' );

/**
 * Enable dynamic title tag support
 */
add_theme_support('title-tag');