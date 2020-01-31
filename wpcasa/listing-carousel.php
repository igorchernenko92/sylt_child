<div class="wpsight-listings listing-<?php the_ID(); ?>-carousel-wrap listing-carousel-wrap">

    <div class="listing-wrap">

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

                <a href="<?php the_permalink() ?>" class="wpsight-listing-archive-btn"><?php echo __( 'View listing', 'ccc' ) ?></a>

              <?php do_action( 'wpsight_listing_archive_after', $post ); ?>

            </div>

        </div><!-- #listing-<?php the_ID(); ?> -->

    </div><!-- #listing-<?php the_ID(); ?>-carousel -->

</div>