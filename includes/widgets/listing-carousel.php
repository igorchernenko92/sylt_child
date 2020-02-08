<?php
/**
 * Listing Carousel widget
 *
 * @package CCC Real Estate
 */

/**
 * Register widget
 */
 
add_action( 'widgets_init', 'wpsight_ccc_register_widget_listing_carousel' );
 
function wpsight_ccc_register_widget_listing_carousel() {
	register_widget( 'WPSight_CCC_Listing_Carousel' );
}

/**
 * Listing title widget class
 *
 * @since 1.0.0
 */

class WPSight_CCC_Listing_Carousel extends WP_Widget {

	public function __construct() {

		$widget_ops = array(
			'classname'   => 'widget_listing_carousel',
			'description' => _x( 'Display listing carousel on single listing pages.', 'listing wigdet', 'ccc' )
		);

		parent::__construct( 'wpsight_ccc_listing_carousel', '&rsaquo; ' . _x( 'Listing Carousel', 'listing widget', 'ccc' ), $widget_ops );

	}

	public function widget( $args, $instance ) {
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		// Echo before_widget
        echo $args['before_widget'];
        
        if ( $title )
			echo $args['before_title'] . $title . $args['after_title'];

        // Echo listing carousel
        wpsight_get_template( 'listing-single-carousel.php' );

		// Echo after_widget
		echo $args['after_widget'];

	}

	public function update( $new_instance, $old_instance ) {
	    
	    $instance = $old_instance;
	    
	    $instance['title'] = strip_tags( $new_instance['title'] );

        return $instance;

    }

	public function form( $instance ) {
		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title']; ?>
		
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'ccc' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>

		<p>
			<?php _e( 'This widget has no further settings. It automatically displays the listing carousel of the current single listing.', 'ccc' ); ?>
		</p><?php

	}

}