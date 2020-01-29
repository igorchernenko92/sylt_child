<?php
/**
 *	wpsight_sylt_meta_boxes_home_nf()
 *
 *	@uses	wpsight_sylt_child_checkbox_default()
 *	@return	array	$meta_box	Array of meta box
 *
 *	@since 1.0.0
 */
function wpsight_sylt_meta_boxes_home_nf() {
    $fields = array(
        'display' => array(
            'name'      => '',
            'id'        => '_nf_display',
            'type'      => 'checkbox',
            'label_cb'  => __( 'Display', 'wpcasa-sylt' ),
            'desc'      => __( 'Display custom content on the front page', 'wpcasa-sylt' ),
            'default'	=> wpsight_sylt_child_checkbox_default( true ),
            'priority'  => 10
        ),
        'nf_title' => array(
            'name'		=> __( 'Home custom Content Heading', 'wpcasa-sylt-child' ),
            'id'		=> '_nf_title',
            'type'		=> 'text',
        ),
        'nf_form_field' => array(
            'name'		=> __( 'Home custom Content form shortcode field', 'wpcasa-sylt-child' ),
            'id'		=> '_nf_form_field',
            'type'		=> 'textarea',
        ),
        'nf_description'	=> array(
            'name'      => __( 'Home custom Content text', 'wpcasa-sylt-child' ),
            'id'        => '_nf_description',
            'type'      => 'textarea',
        ),
    );

    $meta_box = array(
        'id'			=> 'home_nf',
        'title'			=> __( 'WPCasa Sylt :: Home Custom content', 'wpcasa-sylt-child' ),
        'object_types'	=> array( 'page' ),
        'show_on'		=> array( 'key' => 'page-template', 'value' => 'page-tpl-home.php' ),
        'context'		=> 'normal',
        'priority'		=> 'high',
        'fields'		=> $fields
    );

    return apply_filters( 'wpsight_sylt_meta_boxes_home_nf', $meta_box );
}


/**
 *	wpsight_sylt_meta_boxes_home_intro()
 *
 *	Set up home intro meta box.
 *
 *	@uses	wpsight_sort_array_by_priority()
 *	@return	array	$meta_box	Array of meta box
 *
 *	@since 1.0.0
 */
function wpsight_sylt_meta_boxes_home_intro() {
    $fields = array(
        'display' => array(
            'name'      => '',
            'id'        => '_intro_display',
            'type'      => 'checkbox',
            'label_cb'  => __( 'Display', 'wpcasa-sylt' ),
            'desc'      => __( 'Display intro on the front page', 'wpcasa-sylt' ),
            'default'	=> wpsight_sylt_child_checkbox_default( true ),
            'priority'  => 5
        ),
        'title' => array(
            'name'		=> __( 'Intro heading', 'wpcasa-sylt-child' ),
            'id'		=> '_intro_title',
            'type'		=> 'text',
            'priority'  => 10
        ),
        'description'	=> array(
            'name'      => __( 'Intro text', 'wpcasa-sylt-child' ),
            'id'        => '_intro_description',
            'type'      => 'textarea',
            'priority'  => 20
        ),
    );

    // Apply filter and order fields by priority
    $fields = wpsight_sort_array_by_priority( apply_filters( 'wpsight_sylt_meta_boxes_home_intro_fields', $fields ) );

    // Set meta box

    $meta_box = array(
        'id'			=> 'home_intro',
        'title'			=> __( 'WPCasa Sylt :: Home Intro', 'wpcasa-sylt-child' ),
        'object_types'	=> array( 'page' ),
        'show_on'		=> array( 'key' => 'page-template', 'value' => 'page-tpl-home.php' ),
        'context'		=> 'normal',
        'priority'		=> 'high',
        'fields'		=> $fields
    );

    return apply_filters( 'wpsight_sylt_meta_boxes_home_services', $meta_box );

}


/**
 *	wpsight_sylt_meta_boxes_home_search()
 *
 *	Set up home search meta box.
 *
 *	@uses	wpsight_sort_array_by_priority()
 *	@return	array	$meta_box	Array of meta box
 *
 *	@since 1.0.0
 */
function wpsight_sylt_meta_boxes_home_search() {
    $fields = array(
        'display' => array(
            'name'      => '',
            'id'        => '_search_display',
            'type'      => 'checkbox',
            'label_cb'  => __( 'Display', 'wpcasa-sylt' ),
            'desc'      => __( 'Display search on the front page', 'wpcasa-sylt' ),
            'default'	=> wpsight_sylt_child_checkbox_default( true ),
            'priority'  => 10
        ),
        'search_back_image' => array(
            'name'      => __( 'Background image', 'wpcasa-sylt-child' ),
            'id'        => '_search_back_image',
            'type'      => 'file',
            'desc'      => __( 'Add search background image', 'wpcasa-sylt-child' ),
            'priority'  => 20
        ),
    );

    // Apply filter and order fields by priority
    $fields = wpsight_sort_array_by_priority( apply_filters( 'wpsight_sylt_meta_boxes_home_services_fields', $fields ) );

    // Set meta box

    $meta_box = array(
        'id'			=> 'home_search',
        'title'			=> __( 'WPCasa Sylt :: Home Search', 'wpcasa-sylt-child' ),
        'object_types'	=> array( 'page' ),
        'show_on'		=> array( 'key' => 'page-template', 'value' => 'page-tpl-home.php' ),
        'context'		=> 'normal',
        'priority'		=> 'high',
        'fields'		=> $fields
    );

    return apply_filters( 'wpsight_sylt_meta_boxes_home_search', $meta_box );
}


/**
 *	wpsight_sylt_meta_boxes_home_boxes()
 *
 *	Set up home boxes meta box.
 *
 *	@uses	wpsight_sort_array_by_priority()
 *	@return	array	$meta_box	Array of meta box
 *
 *	@since 1.0.0
 */
function wpsight_sylt_meta_boxes_home_boxes() {
    $fields = array(
        'display' => array(
            'name'      => '',
            'id'        => '_boxes_display',
            'type'      => 'checkbox',
            'label_cb'  => __( 'Display', 'wpcasa-sylt' ),
            'desc'      => __( 'Display boxes on the front page', 'wpcasa-sylt' ),
            'default'	=> wpsight_sylt_child_checkbox_default( true ),
            'priority'  => 10
        ),
        'boxes' => array(
            'name'      	=> __( 'Home Infoboxes #1', 'wpcasa-sylt-child' ),
            'id'        	=> '_boxes',
            'type'      	=> 'group',
            'group_fields'	=> array(
                'label' => array(
                    'name'		=> __( 'Heading', 'wpcasa-sylt-child' ),
                    'id'		=> '_title',
                    'type'		=> 'text',
                ),
                'description'	=> array(
                    'name'      => __( 'Text', 'wpcasa-sylt-child' ),
                    'id'        => '_description',
                    'type'      => 'textarea_small',
                    'priority'  => 30
                ),
                'image' => array(
                    'name'      => __( 'Image', 'wpcasa-sylt-child' ),
                    'id'        => '_image',
                    'type'      => 'file',
                    'desc'      => __( 'Add an image', 'wpcasa-sylt-child' ),
                    'priority'  => 20
                ),
                'url' => array(
                    'name'      => __( 'URL', 'wpcasa-sylt-child' ),
                    'id'        => '_url',
                    'type'      => 'text_url',
                ),
                'button' => array(
                    'name'      => __( 'Button', 'wpcasa-sylt-child' ),
                    'id'        => '_button',
                    'type'      => 'text',
                ),
            ),
            'description' 	=> __( '', 'wpcasa-sylt-child' ),
            'repeatable'  	=> true,
            'options'     	=> array(
                'group_title'   => __( 'Box {#}', 'wpcasa-sylt-child' ),
                'add_button'    => __( 'Add Infoboxes #1', 'wpcasa-sylt-child' ),
                'remove_button' => __( 'Remove', 'wpcasa-sylt-child' ),
                'sortable'      => true,
                'closed'		=> true
            ),
            'priority'	=> 20
        ),
    );

    // Apply filter and order fields by priority
    $fields = wpsight_sort_array_by_priority( apply_filters( 'wpsight_sylt_meta_boxes_home_boxes_fields', $fields ) );

    // Set meta box

    $meta_box = array(
        'id'			=> 'home_boxes',
        'title'			=> __( 'WPCasa Sylt :: Home Infoboxes #1', 'wpcasa-sylt-child' ),
        'object_types'	=> array( 'page' ),
        'show_on'		=> array( 'key' => 'page-template', 'value' => 'page-tpl-home.php' ),
        'context'		=> 'normal',
        'priority'		=> 'high',
        'fields'		=> $fields
    );

    return apply_filters( 'wpsight_sylt_meta_boxes_home_boxes', $meta_box );
}

/**
 *	wpsight_sylt_meta_boxes_home_boxes2()
 *
 *	Set up home boxes meta box.
 *
 *	@uses	wpsight_sort_array_by_priority()
 *	@return	array	$meta_box	Array of meta box
 *
 *	@since 1.0.0
 */
function wpsight_sylt_meta_boxes_home_boxes2() {
    $fields = array(
        'display' => array(
            'name'      => '',
            'id'        => '_boxes2_display',
            'type'      => 'checkbox',
            'label_cb'  => __( 'Display', 'wpcasa-sylt' ),
            'desc'      => __( 'Display boxes2 on the front page', 'wpcasa-sylt' ),
            'default'	=> wpsight_sylt_child_checkbox_default( true ),
            'priority'  => 10
        ),
        'boxes2' => array(
            'name'      	=> __( 'Home Infoboxes #2', 'wpcasa-sylt-child' ),
            'id'        	=> '_boxes2',
            'type'      	=> 'group',
            'group_fields'	=> array(
                'label' => array(
                    'name'		=> __( 'Heading', 'wpcasa-sylt-child' ),
                    'id'		=> '_title',
                    'type'		=> 'text',
                ),
                'description'	=> array(
                    'name'      => __( 'Text', 'wpcasa-sylt-child' ),
                    'id'        => '_description',
                    'type'      => 'textarea_small',
                    'priority'  => 30
                ),
                'image' => array(
                    'name'      => __( 'Image', 'wpcasa-sylt-child' ),
                    'id'        => '_image',
                    'type'      => 'file',
                    'desc'      => __( 'Add an image', 'wpcasa-sylt-child' ),
                    'priority'  => 20
                ),
                'url' => array(
                    'name'      => __( 'URL', 'wpcasa-sylt-child' ),
                    'id'        => '_url',
                    'type'      => 'text_url',
                ),
                'button' => array(
                    'name'      => __( 'Button', 'wpcasa-sylt-child' ),
                    'id'        => '_button',
                    'type'      => 'text',
                ),
            ),
            'description' 	=> __( '', 'wpcasa-sylt-child' ),
            'repeatable'  	=> true,
            'options'     	=> array(
                'group_title'   => __( 'Box {#}', 'wpcasa-sylt-child' ),
                'add_button'    => __( 'Add Infoboxes #2', 'wpcasa-sylt-child' ),
                'remove_button' => __( 'Remove', 'wpcasa-sylt-child' ),
                'sortable'      => true,
                'closed'		=> true
            ),
            'priority'	=> 20
        ),
    );

    // Apply filter and order fields by priority
    $fields = wpsight_sort_array_by_priority( apply_filters( 'wpsight_sylt_meta_boxes_home_boxes2_fields', $fields ) );

    // Set meta box

    $meta_box = array(
        'id'			=> 'home_boxes2',
        'title'			=> __( 'WPCasa Sylt :: Home Infoboxes #2', 'wpcasa-sylt-child' ),
        'object_types'	=> array( 'page' ),
        'show_on'		=> array( 'key' => 'page-template', 'value' => 'page-tpl-home.php' ),
        'context'		=> 'normal',
        'priority'		=> 'high',
        'fields'		=> $fields
    );

    return apply_filters( 'wpsight_sylt_meta_boxes_home_boxes2', $meta_box );
}


/**
 *	wpsight_sylt_meta_boxes_home_boxes3()
 *
 *	Set up home boxes3 meta box.
 *
 *	@uses	wpsight_sort_array_by_priority()
 *	@return	array	$meta_box	Array of meta box
 *
 *	@since 1.0.0
 */
function wpsight_sylt_meta_boxes_home_boxes3() {
    $fields = array(
        'display' => array(
            'name'      => '',
            'id'        => '_boxes3_display',
            'type'      => 'checkbox',
            'label_cb'  => __( 'Display', 'wpcasa-sylt' ),
            'desc'      => __( 'Display boxes3 on the front page', 'wpcasa-sylt' ),
            'default'	=> wpsight_sylt_child_checkbox_default( true ),
            'priority'  => 10
        ),
        'boxes3' => array(
            'name'      	=> __( 'Home Infoboxes #3', 'wpcasa-sylt-child' ),
            'id'        	=> '_boxes3',
            'type'      	=> 'group',
            'group_fields'	=> array(
                'label' => array(
                    'name'		=> __( 'Heading', 'wpcasa-sylt-child' ),
                    'id'		=> '_title',
                    'type'		=> 'text',
                ),
                'url' => array(
                    'name'      => __( 'URL', 'wpcasa-sylt-child' ),
                    'id'        => '_url',
                    'type'      => 'text_url',
                ),
                'description'	=> array(
                    'name'      => __( 'Text', 'wpcasa-sylt-child' ),
                    'id'        => '_description',
                    'type'      => 'textarea_small',
                    'priority'  => 30
                ),
                'image' => array(
                    'name'      => __( 'Image', 'wpcasa-sylt-child' ),
                    'id'        => '_image',
                    'type'      => 'file',
                    'desc'      => __( 'Add an image', 'wpcasa-sylt-child' ),
                    'priority'  => 40
                ),

            ),
            'description' 	=> __( '', 'wpcasa-sylt-child' ),
            'repeatable'  	=> true,
            'options'     	=> array(
                'group_title'   => __( 'Box {#}', 'wpcasa-sylt-child' ),
                'add_button'    => __( 'Add Infoboxes #3', 'wpcasa-sylt-child' ),
                'remove_button' => __( 'Remove', 'wpcasa-sylt-child' ),
                'sortable'      => true,
                'closed'		=> true
            ),
            'priority'	=> 40
        ),
    );

    // Apply filter and order fields by priority
    $fields = wpsight_sort_array_by_priority( apply_filters( 'wpsight_sylt_meta_boxes_home_boxes3_fields', $fields ) );

    // Set meta box

    $meta_box = array(
        'id'			=> 'home_boxes3',
        'title'			=> __( 'WPCasa Sylt :: Home Infoboxes #3', 'wpcasa-sylt-child' ),
        'object_types'	=> array( 'page' ),
        'show_on'		=> array( 'key' => 'page-template', 'value' => 'page-tpl-home.php' ),
        'context'		=> 'normal',
        'priority'		=> 'high',
        'fields'		=> $fields
    );

    return apply_filters( 'wpsight_sylt_meta_boxes_home_boxes2', $meta_box );
}

/**
 *	wpsight_sylt_meta_boxes()
 *
 * add metaboxes
 */

function wpsight_sylt_meta_boxes( $meta_boxes ) {
    $meta_boxes['home_services']	= wpsight_sylt_meta_boxes_home_intro();
    $meta_boxes['home_search']	= wpsight_sylt_meta_boxes_home_search();
    $meta_boxes['home_nf']	= wpsight_sylt_meta_boxes_home_nf();
    $meta_boxes['home_boxes']	= wpsight_sylt_meta_boxes_home_boxes();
    $meta_boxes['home_boxes2']	= wpsight_sylt_meta_boxes_home_boxes2();
    $meta_boxes['home_boxes3']	= wpsight_sylt_meta_boxes_home_boxes3();
//    unset($meta_boxes['home_icon_links']);

    return $meta_boxes;
}
add_filter( 'wpsight_meta_boxes', 'wpsight_sylt_meta_boxes', 20 );

/**
 *	wpsight_sylt_checkbox_default()
 *
 *	Helper function to set check box defaults.
 *	Only return default value if we don't
 *	have a post ID (in the 'post' query variable).
 *
 *	@param	bool	$default On/Off (true/false)
 *	@return	mixed	Returns true or '', the blank default
 */
function wpsight_sylt_child_checkbox_default( $default ) {
    return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}