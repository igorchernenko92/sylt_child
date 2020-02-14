<?php
/**
 * Template: Single Listing Carousel
 */
global $listing; ?>

<?php

$images = get_post_meta(absint(get_the_ID()), '_gallery', true);

if ( !$images  ) { return; }

$images_id = array_keys($images);
$image_array = [];
foreach ($images_id as $id) :
    $attachment = get_post( absint( $id ) );
    if ( !$attachment ) { continue; }
    $image_array[] = [
        'mid' => wp_get_attachment_image_src( $attachment->ID, 'medium' ),
        'full' => wp_get_attachment_image_src( $attachment->ID, 'full' ),
        'alt' => esc_attr( get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ) )
    ];
endforeach;
?>

<!--<meta itemprop="image" content="--><?php //echo esc_attr( wpsight_listing_thumbnail_url( $listing->ID, 'large' ) ); ?><!--" />-->

<div class="wpsight-listing-section wpsight-listing-section-image">

  <?php do_action( 'wpsight_listing_single_image_before' ); ?>

    <div class="wpsight-listing-gallery">
        <div class="gallery-main swiper-container">
            <div class="swiper-wrapper">
                <?php foreach( $image_array as $image ) : ?>
                    <a href="<?php echo $image['full'][0] ?>" class="swiper-slide">
                        <img src="<?php echo $image['full'][0] ?>" alt="<?php echo $image['alt'] ?>">
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="gallery-thumbnails swiper-container">
            <div class="swiper-wrapper">
               <?php foreach( $image_array as $image ) : ?>
                <div class="swiper-slide">
                    <img src="<?php echo $image['mid'][0] ?>" alt="<?php echo $image['alt'] ?>">
                </div>
            <?php endforeach; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

      <?php do_action( 'wpsight_listing_single_image_after' ); ?>
    </div><!-- .wpsight-listing-section -->


    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="pswp__bg"></div>

        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">


                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>
