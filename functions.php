<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//

define ( 'THEME_PATH', get_stylesheet_directory_uri() );

if ( ! function_exists( 'chld_thm_cfg_locale_css' ) ):

    function chld_thm_cfg_locale_css( $uri )
    {
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
    add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

endif;

// Register Navigation Menus
if ( ! function_exists( 'ccc_init' ) ) :

	function ccc_init()
    {
		// add navigation menu
		$locations = array(
			'footer' => esc_html__( 'Footer Menu', 'ccc' ),
		);
		register_nav_menus( $locations );

		// set default images sizes to 0 to prevent creation
		add_image_size( 'medium', 0, 0, false );
		add_image_size( 'medium_large', 0, 0, false );
		add_image_size( 'large', 0, 0, false );
	}
	add_action( 'init', 'ccc_init' );

endif;

if ( ! function_exists('ccc_custom_menus') ):

    function ccc_custom_menus( $menus )
    {
        $menus['footer'] = __( 'Footer Menu', 'ccc' );
        return $menus;
    }
    add_filter('wpsight_sylt_menus', 'ccc_custom_menus');

endif;

if ( ! function_exists('ccc_theme_enqueue') ) :

	function ccc_theme_enqueue()
    {
		wp_enqueue_style( 'parent-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css' );
		wp_enqueue_style( 'child-style',
                          trailingslashit( get_stylesheet_directory_uri() ) . 'style.css',
			array('parent-style')
		);

		// enqueue CSS for front page
        wp_enqueue_style( 'chld_thm_ion_range_slider_css', trailingslashit( get_stylesheet_directory_uri() ) . 'vendor/ion-range-slider/ion-range-slider.min.css');
        wp_enqueue_style( 'chld_thm_multiselect_css', trailingslashit( get_stylesheet_directory_uri() ) . 'vendor/multiple-select/multiple-select.min.css');
        wp_enqueue_style( 'chld_thm_select2_css', trailingslashit( get_stylesheet_directory_uri() ) . 'vendor/select2/select2.min.css');
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'skel-main','skel-grid' ) );

        // enqueue JS for front page
        wp_enqueue_script( 'chld_thm_ion_range_slider_js', trailingslashit( get_stylesheet_directory_uri() ) . '/vendor/ion-range-slider/ion-range-slider.min.js' );
        wp_enqueue_script( 'chld_thm_multiselect_js', trailingslashit( get_stylesheet_directory_uri() ) . '/vendor/multiple-select/multiple-select.min.js' );
        wp_enqueue_script( 'chld_thm_select2_js', trailingslashit( get_stylesheet_directory_uri() ) . '/vendor/select2/select2.min.js' );
        wp_enqueue_script( 'chld_thm_common_script', trailingslashit( get_stylesheet_directory_uri() ) . '/assets/js/common.js');
        wp_localize_script( 'chld_thm_common_script', 'child_string', array(
            'select_all' => __( 'Select / Unselect all', 'ccc' )
        ) );
	}
	add_action('wp_enqueue_scripts', 'ccc_theme_enqueue');

endif;

if ( ! function_exists('ccc_theme_setup') ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ccc_theme_setup()
    {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		load_child_theme_textdomain( 'ccc', get_stylesheet_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
	}
	add_action('after_setup_theme', 'ccc_theme_setup');
endif;

if ( class_exists( 'WPSight_Advanced_Search') ):

	/**
	 * Show advanced search fields by default and remove
	 * unwanted orderby options
	 *
	 * Needs plugin WP Casa Advanced Search
	 * https://wordpress.org/plugins/wpcasa-advanced-search/
	 */
	function custom_get_advanced_search_fields( $fields )
    {
		$fields['min']['advanced']		= false;
		$fields['max']['advanced']		= false;
		$fields['orderby']['advanced']	= false;
		$fields['order']['advanced']	= false;
		$fields['feature']['advanced']	= false;

		unset ( $fields['orderby']['data']['title'] );
		unset ( $fields['orderby']['data']['date'] );

		// change label of search fields
		$fields['orderby']['label']	= esc_html__( 'Sort by', 'ccc' );
		$fields['order']['label']	= esc_html__( 'Order', 'ccc' );

		return $fields;
	}
	add_filter( 'wpsight_get_advanced_search_fields', 'custom_get_advanced_search_fields', 11 );

	function order_search_fields( $fields ) {

		$fields['offer']['priority']		= 10;
		$fields['location']['priority']		= 20;
		$fields['listing-type']['priority']	= 30;
		$fields['keyword']['priority']		= 130;
		$fields['submit']['priority']		= 140;
		$fields['feature']['priority']		= 150;
		return $fields;

	}
	add_filter( 'wpsight_get_search_fields', 'order_search_fields' );

	/**
	 * Change default search labels
	 *
	 * @param	array	$fields	Default search fields
	 * @uses	wpsight_details()
	 * @return	array
	 */
	function search_fields_labels( $fields ) {

		$fields['keyword']['label']	= esc_html__( 'Listing ID', 'ccc' ) . '&hellip;';

		return $fields;
	}
	add_filter( 'wpsight_get_search_fields', 'search_fields_labels' );

endif;

if ( ! function_exists('ccc_archive_title') ) :

    function ccc_archive_title( $title )
    {
        if (is_category()) {
            $title = single_cat_title('', false);
        } elseif (is_tag()) {
            $title = single_tag_title('', false);
        } elseif (is_author()) {
            $title = '<span class="vcard">' . get_the_author() . '</span>';
        }

        return $title;
    }
    add_filter('get_the_archive_title', 'ccc_archive_title');

endif;

if ( ! function_exists('ccc_extend_sidebars') ):

    function ccc_extend_sidebars ( $widget_areas )
    {
        $widget_areas['listing-bottom-cta'] = array(

            'name' 			=> esc_html__( 'Listing Single Bottom Call To Action', 'ccc' ),
            'description' 	=> esc_html__( 'Display full-width content below the bottom on single listing pages.', 'ccc' ),
            'id' 			=> 'listing-cta',
            'before_widget' => '<section id="section-%1$s" class="widget-section section-%2$s"><div id="%1$s" class="widget %2$s">',
            'after_widget' 	=> '</div></section>',
            'before_title' 	=> '<div class="cta-title"><h2>',
            'after_title' 	=> '</h2></div>',
            'priority'		=> 125

        );

        return $widget_areas;
    }
    add_filter('wpsight_sylt_widget_areas', 'ccc_extend_sidebars');

endif;

if ( ! function_exists('extend_slider_query_args') ):

    function extend_slider_query_args ( $listings_args ) {

        $listings_args['orderby'] = 'post_date';
        $listings_args['order'] = 'DESC';

        return $listings_args;
    }
    add_filter( 'wpsight_sylt_home_listings_slider_query_args', 'extend_slider_query_args' );

endif;

include ('includes/function-search.php');
include ('includes/function-meta-boxes-home.php');