<?php
/**
 * Home boxes template
 *
 * @package WPCasa Sylt Child
 */

$display = get_post_meta( get_the_id(), '_boxes_display', true );
if( $display ) : ?>

<section class="listings-section site-section">
  <div class="container">
    <div class="wpsight-listings wpsight-listings-custom">
      <div class="row row-flex">
        <?php $boxes = get_post_meta( get_the_id(), '_boxes', true ); ?>

        <?php if( $boxes ) : ?>
          <?php foreach( $boxes as $key => $box ) : ?>

            <?php
              $title	= isset( $box['_title'] )  ? $box['_title'] : false;
              $description	= isset( $box['_description'] )  ? $box['_description'] : false;
              $url	= isset( $box['_url'] )  ? $box['_url'] : false;
              $button	= isset( $box['_button'] )  ? $box['_button'] : false;
              $img	= isset( $box['_image'] )  ? $box['_image'] : false;
            ?>

            <div class="listing-wrap listing-wrap-custom listing-wrap-custom-small 4u 6u$(medium) 12u$(small)">
              <div class="listing wpsight-listing-archive">

                <div class="listing-top">
                  <span class="listing-top-title"><?php echo $title; ?></span>
                </div>

                <div class="listing-wrap-img">
                    <img src="<?php echo $img; ?>" alt="" class="listing-img">
                </div>

                <div class="wpsight-listing-description">
                  <p><?php echo $description; ?></p>
                </div>

                <a href="<?php echo $url; ?>" class="button listing-button"><?php echo $button; ?></a>

              </div>
            </div>

          <?php endforeach; ?>
        <?php endif; ?>

      </div>
    </div>

  </div>
</section>

<?php endif; ?>