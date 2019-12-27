<?php
/**
 * Home boxes2 template
 *
 * @package WPCasa Sylt Child
 */

//if( $display ) : ?>

<section class="listings-section listings-section-2 site-section">
  <div class="container">

    <div class="wpsight-listings wpsight-listings-custom">
      <div class="row row-flex">
        <?php $boxes = get_post_meta( get_the_id(), '_boxes2', true ); ?>

        <?php if( $boxes ) : ?>
          <?php foreach( $boxes as $key => $box ) : ?>

            <?php
              $title = isset( $box['_title'] )  ? $box['_title'] : false;
              $img	= isset( $box['_image'] )  ? $box['_image'] : false;
              $url	= isset( $box['_url'] )  ? $box['_url'] : false;
            ?>

            <div class="listing-wrap listing-wrap-custom listing-wrap-custom-large 4u 6u$(medium) 12u$(small)">
              <a href="<?php echo $url; ?>" class="listing wpsight-listing-archive" style="background-image: url('<?php echo $img; ?>')">

                <div class="listing-top">
                  <span class="listing-top-title"><?php echo $title; ?></span>
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