<?php
/**
 * Template: Single Listing Details
 */
global $listing; ?>

<div class="wpsight-listing-section wpsight-listing-section-details">
	
	<?php do_action( 'wpsight_listing_single_details_before', $listing->ID ); ?>

    <?php wpsight_listing_summary( $listing->ID, array( 'details_1', 'details_2', 'details_3', 'details_4' ) ) ?>
	
	<?php do_action( 'wpsight_listing_single_details_after', $listing->ID ); ?>

</div><!-- .wpsight-listing-section-details -->