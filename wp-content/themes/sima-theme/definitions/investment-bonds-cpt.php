<?php
// Investment bonds CPT - register CTP, taxonomies and post type functionality

add_action('init', 'investment_bonds_taxonomy', 0);

function investment_bonds_taxonomy() {

    // Defining the labels for investment bonds categories taxonomy
    $labels = array(
        'name'              => __( 'Investment Bonds Categories', 'sima-theme'),
        'singular_name'     => __( 'Investment Bond Category', 'sima-theme' ),
        'search_items'      => __( 'Investment Bonds Categories', 'sima-theme' ),
        'all_items'         => __( 'All Investment Bonds Categories', 'sima-theme' ),
    );

    // Registering the investment bonds category taxonomy
    register_taxonomy('investment_bond_category', array('investment_bond_category'), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' =>  _x('investment-bonds-categories', 'Investment Bonds Categories Slug', 'sima-theme')),
    ));
}

function register_country_taxonomy() {
    $labels = array(
        'name' => 'Country',
        'singular_name' => 'Country',
        'search_items' => 'Search Country',
        'all_items' => 'All Countries',
        'edit_item' => 'Edit Country',
        'add_new_item' => 'Add new Country',
        'menu_name' => 'Countries'
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy('country', array('investment_bonds_cpt'), $args);
}
add_action('init', 'register_country_taxonomy');

function investment_bonds_cpt() {

    // Defining the labels for the custom post type
    $labels = array(
        'name'             => _x( 'Investment Bonds', 'Label Name for Investment Bonds CPT', 'sima-theme' ),
        'singular_name'    => _x( 'Investment Bond Item', 'Name for Single Investment Bond Item', 'sima-theme' ),
        'add_new'          => _x( 'Add Investment Bond Item', 'Label Name for adding a new Investment Bond Item', 'sima-theme' ),
        'add_new_item'     => _x( 'Add Investment Bond Item', 'Label name for adding a new Investment Bond Item', 'sima-theme' ),
        'edit_item'        => _x( 'Edit Investment Bond Item', 'Label name for editing Investment Bond Item', 'sima-theme' ),
        'new_item'         => _x( 'New Investment Bond Item', 'Label name creating new Investment Bond Item', 'sima-theme' ),
        'view_item'        => _x( 'View Investment Bond Item', 'Label name for viewing Investment Bond Item', 'sima-theme' ),
        'view_items'       => _x( 'Investment Bonds Items', 'Label name for viewing Investment Bonds Items', 'sima-theme' ),
        'all_items'        => _x( 'All Investment Bonds Items', 'Label name for all Investment Bonds Items', 'sima-theme' ),
        'item_published'   => _x( 'Investment Bond Item published', 'Label name for publishing an Investment Bond Item', 'sima-theme' )
    );

    // Adding labels and functionality to custom post type
    $args = array(
        'label'                 => _x( 'Investment Bonds', 'Label For Investment Bonds CPT', 'sima-theme' ),
        'labels'                => $labels,
        'description'           => _x( 'Investment Bonds', 'Description fot Investment Bonds CPT', 'sima-theme' ),
        'hierarchical'          => true,
        'can_export'            => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'supports'              => array( 'title', 'custom-fields', 'thumbnail', 'revisions' ),
        'taxonomies'            => array( 'investment_bond_category', 'country' ),
        'show_in_admin_bar'     => true,
        'menu_position'         => 20,
        'show_in_rest'          => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-hammer'
    );

    // Registering the Investment Bonds custom post type
    register_post_type('investment_bonds_cpt', $args);
}

add_action('init', 'investment_bonds_cpt', 0);