<?php
/**
 *	edit request for proper searching
 *
 *	@uses	wp_list_pluck()
 *	@return	array of terms
 *
 *	@since 1.0.0
 */
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


/**
 *	edit fields for search
 *
 *	@uses	wpsight_sort_array_by_priority()
 *	@return	array of terms
 *
 *	@since 1.0.0
 */

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
        'label' 		=> __( 'Object ID', 'ccc' ) . '&hellip;',
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

//  unset
    unset($fields_default['keyword']);
    unset($fields_default['orderby']);
    unset($fields_default['order']);

    return wpsight_sort_array_by_priority( $fields_default );
}

add_filter( 'wpsight_get_search_fields', 'edit_default_fields', 20);


/**
 *	get terms for multiselect
 *
 *	@uses	get_terms_hierarchical()
 *	@return	array of terms
 *
 *	@since 1.0.0
 */
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