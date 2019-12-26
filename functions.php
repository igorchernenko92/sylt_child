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
        wp_enqueue_style( 'chld_thm_ion_range_slider_css', trailingslashit( get_stylesheet_directory_uri() ) . 'vendor/ion-range-slider/ion-range-slider.min.css');
        wp_enqueue_style( 'chld_thm_multiselect_css', trailingslashit( get_stylesheet_directory_uri() ) . 'vendor/multiple-select/multiple-select.min.css');
        wp_enqueue_style( 'chld_thm_select2_css', trailingslashit( get_stylesheet_directory_uri() ) . 'vendor/select2/select2.min.css');
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'skel-main','skel-grid' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

if ( !function_exists( 'chld_thm_cfg_parent_js' ) ):
    function chld_thm_cfg_parent_js() {
        wp_enqueue_script( 'chld_thm_ion_range_slider_js', trailingslashit( get_stylesheet_directory_uri() ) . '/vendor/ion-range-slider/ion-range-slider.min.js' );
        wp_enqueue_script( 'chld_thm_multiselect_js', trailingslashit( get_stylesheet_directory_uri() ) . '/vendor/multiple-select/multiple-select.min.js' );
        wp_enqueue_script( 'chld_thm_select2_js', trailingslashit( get_stylesheet_directory_uri() ) . '/vendor/select2/select2.min.js' );
        wp_enqueue_script( 'chld_thm_common_script', trailingslashit( get_stylesheet_directory_uri() ) . '/assets/js/common.js');
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_js', 10 );


// END ENQUEUE PARENT ACTION

function edit_listing_request($result, $query_args, $args) {
    global $wpdb;
//    $query_args['meta_query']['offer'] = array(
//        'key'     => '_price_offer',
//        'value'   =>  htmlspecialchars( $_GET['offer'] ),
//        'compare' => 'IN'
//    );

    if ( isset($_GET['keyword']) ) {
//        $keywords = array_map( 'trim', explode( ',',  $_GET['keyword'] ) );
//        $postmeta_keywords_sql = array();
//
//        foreach ( $keywords as $keyword ) {
//            $postmeta_keywords_sql[] = " meta_value LIKE '%" . esc_sql( $keyword ) . "%' ";
//        }
//
//        $post_ids = $wpdb->get_col( "
//            SELECT DISTINCT post_id FROM {$wpdb->postmeta}
//            WHERE " . implode( ' OR ', $postmeta_keywords_sql ) . "
//            AND meta_key = '_listing_id'
//        " );



        $id_args = array(
            'post_type'  => wpsight_post_type(),
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key'    => '_listing_id',
                    'value'   => esc_sql( $_GET['keyword'] ),
                    'compare' => 'LIKE'
                ),
            )
        );

        // Execute ID search query
        $id_query = new WP_Query( $id_args );

//        if ( ! empty( $id_query->posts ) )
            var_dump(  wp_list_pluck( $id_query->posts, 'ID' ));

//        if ( ! empty( $post_ids ) )
            $query_args['post__in'] = wp_list_pluck( $id_query->posts, 'ID' );

//        var_dump( $post_ids );
//        var_dump( $query_args['post__in'] );
    }

    $result = new WP_Query( $query_args );

//var_dump($query_args);
    return $result;
}

//add_filter( 'wpsight_get_listings', 'edit_listing_request', 10 , 3 );


function edit_default_fields($fields_default) {
    $fields_default['location']['type'] = 'multiselect';
    $fields_default['listing-type']['type'] = 'multiselect';
    $fields_default['feature']['type'] = 'select2';
    $fields_default['min']['type'] ='range';
    $fields_default['max']['type'] ='';

    return wpsight_sort_array_by_priority( $fields_default );
}

add_filter( 'wpsight_get_search_fields', 'edit_default_fields');


function get_terms_hierarchical($terms, $output = '', $parent_id = 0, $level = 0) {
$outputTemplate = '<option class="%CLASS%" value="%SLUG%">%NAME%</option>';

    foreach ($terms as $term) {
        if ($parent_id == $term->parent) {
            //Replacing the template variables
            $itemOutput = str_replace('%SLUG%', $term->slug, $outputTemplate);
            $itemOutput = str_replace('%CLASS%', 'listing-search-padding-' . $level, $itemOutput);
            $itemOutput = str_replace('%NAME%', $term->name, $itemOutput);

            $output .= $itemOutput;
            $output = get_terms_hierarchical($terms, $output, $term->term_id, $level + 1);
        }
    }
    return $output;
}

