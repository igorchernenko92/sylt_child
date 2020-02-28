<?php
/**
 * Listings Query widget
 *
 * @package WPCasa London
 */

/**
 * Register widget
 */
 
add_action( 'widgets_init', 'wpsight_register_widget_listing_related' );
 
function wpsight_register_widget_listing_related() {
	register_widget( 'WPSight_Listing_Related' );
}

/**
 * Listings query widget class
 *
 * @since 1.0.0
 */

class WPSight_Listing_Related extends WP_Widget {

	public function __construct() {

		$widget_ops = array(
			'classname'   => 'widget_listings_query',
			'description' => _x( 'Display a certain listings query.', 'listing wigdet', 'wpcasa-london' )
		);

		parent::__construct( 'wpsight_Listing_related', '&rsaquo; ' . _x( 'Listing Related', 'listing widget', 'wpcasa' ), $widget_ops );

	}

	public function widget( $args, $instance ) {
        $title 				= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $nr 				= absint( $instance['nr'] );

//		$offer_filter		= isset( $instance['offer_filter'] ) ? strip_tags( $instance['offer_filter'] ) : false;
        $taxonomy_filters	= array();


        foreach( get_object_taxonomies( wpsight_post_type(), 'objects' ) as $key => $taxonomy ) {
            if ($key == 'listing-category') continue;
            $taxonomy_filters[ $key ] = isset( $instance[ 'taxonomy_filter_' . $key ] ) ? esc_sql( $instance[ 'taxonomy_filter_' . $key ] ) : false;
        }

//        if no widget tax options selected
		if ( !array_filter($taxonomy_filters) ) {
            $taxonomy_filters[ 'location' ] = array_column( get_the_terms(get_the_ID(), 'location'), 'slug');
            $taxonomy_filters[ 'listing-type' ] = array_column( get_the_terms(get_the_ID(), 'listing-type'), 'slug');
            $taxonomy_filters[ 'feature' ] = array_column( get_the_terms(get_the_ID(), 'feature'), 'slug');
        };

        $defaults = array(
            'nr'		=> 3,
            'teasers'	=> false
        );

        $instance = wp_parse_args( (array) $instance, $defaults );

        $teasers = isset( $instance['teasers'] ) ? (bool) $instance['teasers'] : false;

        // Set up args for listing query

        $listings_args = array(
            'nr'				=> $nr,
//			'offer'				=> $offer_filter,
            'meta_query'		=> array(
                array(
                    'key'		=> '_thumbnail_id',
                    'compare'	=> 'EXISTS'
                )
            ),
            'show_panel'		=> false,
            'show_paging'		=> false,
            'context'			=> $args['id']
        );

        // Merge taxonomy filters into args and apply filter hook
        $listings_args = apply_filters( 'wpsight_widget_listing_relate_query_args', array_merge( $listings_args, $taxonomy_filters ), $instance, $this->id );

        // Finally get listings
        $listings = wpsight_get_listings( $listings_args );

        // When no listings, don't any produce output

        if( ! $listings )
            return;

        // Echo before_widget
        echo $args['before_widget'];

        if ( $title )
            echo $args['before_title'] . $title . $args['after_title'];

        if( ! $teasers ) {

            // Echo listings query
            wpsight_listings( $listings_args );

        } else {

            // Echo listings query
            wpsight_listing_teasers( $listings_args );

        }

        // Echo after_widget
        echo $args['after_widget'];

    }

	public function update( $new_instance, $old_instance ) {
	    $instance = $old_instance;
	    
	    $instance['title'] 			= strip_tags( $new_instance['title'] );
	    $instance['nr'] 			= absint( $new_instance['nr'] );
//	    $instance['offer_filter'] 	= strip_tags( $new_instance['offer_filter'] );
	    
	    foreach( get_object_taxonomies( wpsight_post_type(), 'objects' ) as $key => $taxonomy ) {
            if ($key == 'listing-category') continue;
            $instance[ 'taxonomy_filter_' . $key ] = esc_sql( $new_instance[ 'taxonomy_filter_' . $key ] );
        }

		$instance['teasers']		= ! empty( $new_instance['teasers'] ) ? 1 : 0;

        return $instance;

    }

	public function form( $instance ) {

		$defaults = array(
			'title'	=> '',
			'nr'   	=> 3
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title 				= strip_tags( $instance['title'] );
		$nr 				= absint( $instance['nr'] );
//		$offer_filter		= isset( $instance['offer_filter'] ) ? strip_tags( $instance['offer_filter'] ) : false;

		$taxonomy_filters	= array();

		foreach( get_object_taxonomies( wpsight_post_type(), 'objects' ) as $key => $taxonomy )
			$taxonomy_filters[ $key ] = isset( $instance[ 'taxonomy_filter_' . $key ] ) ? esc_sql( $instance[ 'taxonomy_filter_' . $key ] ) : false;

		$teasers			= isset( $instance['teasers'] ) ? (bool) $instance['teasers'] : false;

		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'wpcasa-london' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id( 'nr' ); ?>"><?php _e( 'Listings', 'wpcasa-london' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id( 'nr' ); ?>" name="<?php echo $this->get_field_name( 'nr' ); ?>" type="text" value="<?php echo esc_attr( $nr ); ?>" /></label><br />
			<span class="description"><?php _e( 'Please enter the number of listings', 'wpcasa-london' ); ?></span></p>

		<p><label><?php _e( 'Filters', 'wpcasa-london' ); ?>:</label></p>

		<?php foreach( get_object_taxonomies( wpsight_post_type(), 'objects' ) as $key => $taxonomy ) : ?>
        <?php if ( $key == 'listing-category' ) continue; ?>

			<p><select multiple="multiple" class="widefat wpsight_related_multiselect" id="<?php echo $this->get_field_id( 'taxonomy_filter_' . $key ); ?>" name="<?php echo $this->get_field_name( 'taxonomy_filter_' . $key ); ?>[]">
				<?php
			    	// Add taxonomy term options
			    	$terms = get_terms( array( $key ), array( 'hide_empty' => 0 ) );
			    	foreach( $terms as $term ) {
			    	    $selected =  in_array($term->slug, $taxonomy_filters[ $key ]) ? 'selected' : '';
			    	   echo '<option  value="' . esc_attr( $term->slug ) . '"' . $selected . '>' . esc_attr( $term->name ) . '</option>';
			    	}
			    ?>
				</select></p>

		<?php endforeach; ?>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'teasers' ); ?>" name="<?php echo $this->get_field_name( 'teasers' ); ?>"<?php checked( $teasers ); ?> />
				<label for="<?php echo $this->get_field_id( 'teasers' ); ?>"><?php _e( 'Display smaller listing teasers', 'wpcasa-london' ); ?></label></p>
        <script>
            jQuery(document).ready(function($) {
                $('#widgets-right select.wpsight_related_multiselect').each(function( index ) {
                    if ( !$(this).hasClass( "ms-offscreen" ) ) {
                        $(this).multipleSelect();
                    }
                });

                $(document).on('widget-added widget-updated widget-synced', function(event, widget) {
                    $(widget).find('select.wpsight_related_multiselect').each(function( index ) {
                        if ( !$(this).hasClass( "ms-offscreen" ) ) {
                            $(this).multipleSelect();
                        }
                    });
                });
            });
        </script>
		<?php
        wp_enqueue_script( 'chld_thm_multiselect_js', trailingslashit( get_stylesheet_directory_uri() ) . 'vendor/multiple-select/multiple-select.min.js' );
        wp_enqueue_style( 'chld_thm_multiselect_css', trailingslashit( get_stylesheet_directory_uri() ) . 'vendor/multiple-select/multiple-select.min.css');

//        wp_enqueue_script( 'chld_thm_common_script', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/js/common.js', array(''), '123455', true);
//        wp_localize_script( 'chld_thm_common_script', 'child_string', array(
//            'select_all' => __( 'Select / Unselect all', 'ccc' ),
//            'price_label' => __( 'Please, select offer to see price ranges', 'ccc' ),
//
//        ) );
	}
}

add_action( 'init', 'check_widget' );


//$new_instance = array_map('strip_tags', $new_instance);