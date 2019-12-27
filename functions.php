<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

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

function edit_listing_request($query_args, $args) {
    if ( isset($_GET['post_in']) ) {

        $id_args = array(
            'post_type'  => wpsight_post_type(),
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key'    => '_listing_id',
                    'value'   => esc_sql( $_GET['post_in'] ),
                    'compare' => 'LIKE'
                ),
            )
        );

        // Execute ID search query
        $id_query = new WP_Query( $id_args );

        $post_ids = wp_list_pluck( $id_query->posts, 'ID' );
        if ( empty( $post_ids ) ) {
            $query_args['post__in'] = ['issue'];
        } else {
            $query_args['post__in'] = $post_ids;
        }
    }

    return $query_args;
}

add_filter( 'wpsight_get_listings_query_args', 'edit_listing_request', 10 , 2 );


function edit_default_fields($fields_default) {
    $details = wpsight_details();

    $fields_default['range'] = [
        'label' 		=> __( 'Range', 'wpcasa' ),
        'key'			=> '_price_range',
        'type' 			=> 'range',
        'class'			=> '6u 12u$(medium)',
        'priority'		=> 10
    ];

    $fields_default['post_in'] = [
        'label' 		=> __( 'Listing ID', 'wpcasa' ) . '&hellip;',
        'type' 			=> 'text',
        'class'			=> '3u 12u$(medium)',
        'priority'		=> 1
    ];

//  width
    $fields_default['offer']['class'] = '3u 12u$(medium)';
    $fields_default['feature']['class'] = '9u 12u$(medium)';
    $fields_default[$details['details_1']['id']]['class'] = '3u 12u$(medium)';
    $fields_default[$details['details_2']['id']]['class'] = '3u 12u$(medium)';

//  priorities
    $fields_default['submit']['priority'] = 400;
    $fields_default['offer']['priority'] = 2;

//  type
    $fields_default['location']['type'] = 'multiselect';
    $fields_default['listing-type']['type'] = 'multiselect';
    $fields_default['feature']['type'] = 'select2';
//    $fields_default['min']['type'] ='hidden';
//    $fields_default['max']['type'] ='hidden';

//  unset
    unset($fields_default['keyword']);
    unset($fields_default['orderby']);
    unset($fields_default['order']);

    return wpsight_sort_array_by_priority( $fields_default );
}

add_filter( 'wpsight_get_search_fields', 'edit_default_fields', 20);


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



/**
 *	wpsight_sylt-child_meta_boxes_home_services()
 *
 *	Set up home services meta box.
 *
 *	@uses	wpsight_sort_array_by_priority()
 *	@return	array	$meta_box	Array of meta box
 *
 *	@since 1.0.0
 */
function wpsight_sylt_meta_boxes_home_services() {
    $fields = array(
        'display' => array(
            'name'      => '',
            'id'        => '_services_display',
            'type'      => 'checkbox',
            'label_cb'  => __( 'Display', 'wpcasa-sylt-child' ),
            'desc'      => __( 'Display services on the front page', 'wpcasa-sylt-child' ),
            'priority'  => 50
        ),
        'boxes' => array(
            'name'      	=> __( 'Boxes', 'wpcasa-sylt-child' ),
            'id'        	=> '_boxes',
            'type'      	=> 'group',
            'group_fields'	=> array(
                'label' => array(
                    'name'		=> __( 'Heading', 'wpcasa-sylt-child' ),
                    'id'		=> '_service_label',
                    'type'		=> 'text',
                ),
                'description'	=> array(
                    'name'      => __( 'Text', 'wpcasa-sylt-child' ),
                    'id'        => '_services_description',
                    'type'      => 'textarea_small',
                    'priority'  => 30
                ),
                'image' => array(
                    'name'      => __( 'Image', 'wpcasa-sylt-child' ),
                    'id'        => '_services_image',
                    'type'      => 'file',
                    'desc'      => __( 'Add an image', 'wpcasa-sylt-child' ),
                    'priority'  => 20
                ),
                'button' => array(
                    'name'      => __( 'Button', 'wpcasa-sylt-child' ),
                    'id'        => '_service_button',
                    'type'      => 'text',
                ),
            ),
            'description' 	=> __( 'Display different services you offer', 'wpcasa-sylt-child' ),
            'repeatable'  	=> true,
            'options'     	=> array(
                'group_title'   => __( 'Box {#}', 'wpcasa-sylt-child' ),
                'add_button'    => __( 'Add Boxes', 'wpcasa-sylt-child' ),
                'remove_button' => __( 'Remove', 'wpcasa-sylt-child' ),
                'sortable'      => true,
                'closed'		=> true
            ),
            'priority'	=> 20
        ),

        'boxes2' => array(
            'name'      	=> __( 'Boxes2', 'wpcasa-sylt-child' ),
            'id'        	=> '_boxes2',
            'type'      	=> 'group',
            'group_fields'	=> array(
                'label' => array(
                    'name'		=> __( 'Label', 'wpcasa-sylt-child' ),
                    'id'		=> '_service_label',
                    'type'		=> 'text',
                ),
                'image' => array(
                    'name'      => __( 'Image', 'wpcasa-sylt-child' ),
                    'id'        => '_services_image',
                    'type'      => 'file',
                    'desc'      => __( 'Add an image', 'wpcasa-sylt-child' ),
                    'priority'  => 40
                ),
            ),
            'description' 	=> __( 'Display different services you offer', 'wpcasa-sylt-child' ),
            'repeatable'  	=> true,
            'options'     	=> array(
                'group_title'   => __( 'Box {#}', 'wpcasa-sylt-child' ),
                'add_button'    => __( 'Add Boxes', 'wpcasa-sylt-child' ),
                'remove_button' => __( 'Remove', 'wpcasa-sylt-child' ),
                'sortable'      => true,
                'closed'		=> true
            ),
            'priority'	=> 30
        ),

        'boxes3' => array(
            'name'      	=> __( 'Boxes3', 'wpcasa-sylt-child' ),
            'id'        	=> '_boxes3',
            'type'      	=> 'group',
            'group_fields'	=> array(
                'label' => array(
                    'name'		=> __( 'Heading', 'wpcasa-sylt-child' ),
                    'id'		=> '_service_label',
                    'type'		=> 'text',
                ),
                'url' => array(
                    'name'      => __( 'URL', 'wpcasa-sylt-child' ),
                    'id'        => '_service_url',
                    'type'      => 'text_url',
                ),
                'image' => array(
                    'name'      => __( 'Image', 'wpcasa-sylt-child' ),
                    'id'        => '_services_image',
                    'type'      => 'file',
                    'desc'      => __( 'Add an image', 'wpcasa-sylt-child' ),
                    'priority'  => 40
                ),

            ),
            'description' 	=> __( 'Display different services you offer', 'wpcasa-sylt-child' ),
            'repeatable'  	=> true,
            'options'     	=> array(
                'group_title'   => __( 'Box {#}', 'wpcasa-sylt-child' ),
                'add_button'    => __( 'Add Boxes', 'wpcasa-sylt-child' ),
                'remove_button' => __( 'Remove', 'wpcasa-sylt-child' ),
                'sortable'      => true,
                'closed'		=> true
            ),
            'priority'	=> 40
        ),
        );

    // Apply filter and order fields by priority
    $fields = wpsight_sort_array_by_priority( apply_filters( 'wpsight_sylt_meta_boxes_home_services_fields', $fields ) );

    // Set meta box

    $meta_box = array(
        'id'			=> 'home_services',
        'title'			=> __( 'Home Services', 'wpcasa-sylt-child' ),
        'object_types'	=> array( 'page' ),
        'show_on'		=> array( 'key' => 'page-template', 'value' => 'page-tpl-home.php' ),
        'context'		=> 'normal',
        'priority'		=> 'high',
        'fields'		=> $fields
    );

    return apply_filters( 'wpsight_sylt_meta_boxes_home_services', $meta_box );

}


add_filter( 'wpsight_meta_boxes', 'wpsight_sylt_meta_boxes' );

function wpsight_sylt_meta_boxes( $meta_boxes ) {
    $meta_boxes['home_services']	= wpsight_sylt_meta_boxes_home_services();

    return $meta_boxes;
}