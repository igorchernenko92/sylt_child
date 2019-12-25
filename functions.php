<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_multiselect_css', trailingslashit( get_stylesheet_directory_uri() ) . 'vendor/multiple-select/multiple-select.min.css');
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'skel-main','skel-grid' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

if ( !function_exists( 'chld_thm_cfg_parent_js' ) ):
    function chld_thm_cfg_parent_js() {
        wp_enqueue_script( 'chld_thm_multiselect_js', trailingslashit( get_stylesheet_directory_uri() ) . '/vendor/multiple-select/multiple-select.min.js' );
        wp_enqueue_script( 'chld_thm_common_script', trailingslashit( get_stylesheet_directory_uri() ) . '/assets/js/common.js');
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_js', 10 );


// END ENQUEUE PARENT ACTION


function edit_listing_request($query_args, $args) {

    $query_args['meta_query']['offer'] = array(
        'key'     => '_price_offer',
        'value'   =>  htmlspecialchars( $_GET['offer' ] ),
        'compare' => 'IN'
    );
    $result = new WP_Query( $query_args );

    return $query_args;
}

add_filter( 'wpsight_get_listings_query_args', 'edit_listing_request', 10 , 3 );


function edit_default_fields($fields_default) {
    $fields_default['location']['type'] = 'multiselect';
    $fields_default['listing-type']['type'] = 'multiselect';
//    $fields_default['feature']['type'] = 'select2';
//    $fields_default['min'] = array();

    return wpsight_sort_array_by_priority( $fields_default );
}

add_filter( 'wpsight_get_search_fields', 'edit_default_fields');

//function edit_advanced_fields($fields_default) {
//    $fields_default['location']['type'] = 'multiselect';
//    $fields_default['listing-type']['type'] = 'multiselect';
//    $fields_default['feature']['type'] = 'select2';
//
//    return wpsight_sort_array_by_priority( $fields_default );
//}
//
//add_filter( 'wpsight_get_search_fields', 'edit_default_fields');
