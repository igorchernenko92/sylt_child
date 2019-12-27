<?php
/**
 * Home boxes2 template
 *
 * @package WPCasa Sylt Child
 */

//if( $display ) : ?>

<section class="listings-section-3 site-section">
  <div class="container">

    <div class="wpsight-listings wpsight-listings-custom">
      <div class="row row-flex">
        <?php $boxes = get_post_meta( get_the_id(), '_boxes3', true ); ?>

        <?php if( $boxes ) : ?>
          <?php foreach( $boxes as $key => $box ) : ?>

            <?php
              $title	= isset( $box['_title'] )  ? $box['_title'] : false;
              $url	= isset( $box['_url'] )  ? $box['_url'] : false;
              $img	= isset( $box['_image'] )  ? $box['_image'] : false;
              $description	= isset( $box['_description'] )  ? $box['_description'] : false;
            ?>

            <div class="listing-wrap listing-wrap-custom listing-wrap-custom-medium 4u 6u$(medium) 12u$(small)">
              <a href="<?php echo $url; ?>" class="listing wpsight-listing-archive">

                <div class="listing-top">
                  <span class="listing-top-title"><?php echo $title; ?></span>
                </div>

                <div class="listing-wrap-img">
                  <img src="<?php echo $img; ?>" alt="" class="listing-img">
                </div>

                <div class="wpsight-listing-description">
                  <p><?php echo $description; ?></p>
                </div>

              </a>
            </div>

          <?php endforeach; ?>
        <?php endif; ?>

        <?php //endif; ?>
      </div>
    </div>

  </div>
</section>

<?php //endif; ?>