<div class="wpsight-listing-section wpsight-listing-section-info">
	
	<?php do_action( 'wpsight_listing_archive_info_before' ); ?>

	<div class="wpsight-listing-info clearfix">
	    <div class="alignleft">
	        <?php wpsight_listing_price(); ?>
	    </div>
	    <div class="alignright">
	        <div class="wpsight-listing-status">
	        	<?php $listing_offer = wpsight_get_listing_offer( get_the_id(), false ); ?>
                <span><?php echo wpsight_get_listing_id(); ?></span>
		    </div>
	    </div>
	</div>
	
	<?php do_action( 'wpsight_listing_archive_info_after' ); ?>

</div><!-- .wpsight-listing-section-info -->