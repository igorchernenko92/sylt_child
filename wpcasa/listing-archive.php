<?php $layout	= is_page_template( 'page-tpl-full.php' ) || is_front_page() ? '4u 6u$(medium) 12u$(small)' : '6u 12u$(small)'; ?>
<?php $equal	= is_page_template( 'page-tpl-full.php' ) || is_front_page() ? ' equal' : ''; ?>

<div class="listing-wrap <?php echo $layout; ?>">

	<div id="listing-<?php the_ID(); ?>" <?php wpsight_listing_class( 'wpsight-listing-archive' ); ?> itemscope itemtype="http://schema.org/Product">

		<meta itemprop="name" content="<?php echo esc_attr( $post->post_title ); ?>" />

		<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="clearfix">

			<?php do_action( 'wpsight_listing_archive_before', $post ); ?>

            <?php wpsight_get_template( 'listing-archive-image.php' ); ?>

			<div class="listing-top">

				<?php wpsight_get_template( 'listing-archive-title.php' ); ?>

			</div>

            <div class="wpsight-listing-price">

                <?php wpsight_get_template( 'listing-archive-info.php' ); ?>

                <?php //wpsight_get_template( 'listing-archive-description.php' ); ?>

                <?php wpsight_get_template( 'listing-archive-compare.php' ); ?>

            </div>

			<?php wpsight_get_template( 'listing-archive-summary.php' ); ?>

            <a href="<?php the_permalink() ?>" class="wpsight-listing-archive-btn"><?php __( 'View listing', 'ccc' ) ?></a>

			<?php do_action( 'wpsight_listing_archive_after', $post ); ?>

		</div>

	</div><!-- #listing-<?php the_ID(); ?> -->

</div><!-- .listing-wrap -->