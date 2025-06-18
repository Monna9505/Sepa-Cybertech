<?php

/**
 * This document adds ACF-specific definitions.
 */

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    // Header subpage in Theme Settings
    acf_add_options_sub_page(
        array(
            'page_title' 	=> 'Theme Header',
            'menu_title'	=> 'Header Settings',
            'parent_slug'	=> 'theme-general-settings',
        )
    );
    
    //Footer in Theme Settings
    acf_add_options_sub_page(
        array(
            'page_title' 	=> 'Theme Footer',
            'menu_title'	=> 'Footer Settings',
            'parent_slug'	=> 'theme-general-settings',
        )
    );
}