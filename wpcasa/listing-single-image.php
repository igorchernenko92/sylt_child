<?php
/**
 * Template: Single Listing Image
 */
global $listing; ?>

<?php if( has_post_thumbnail( $listing->ID ) ) : ?>

<meta itemprop="image" content="<?php echo esc_attr( wpsight_listing_thumbnail_url( $listing->ID, 'large' ) ); ?>" />

<div class="wpsight-listing-section wpsight-listing-section-image">

  <?php do_action( 'wpsight_listing_single_image_before' ); ?>

    <!--		<div class="wpsight-listing-image">-->
    <!--			--><?php //wpsight_listing_thumbnail( $listing->ID, 'wpsight-large' ); ?>
    <!--		</div>-->

    <div class="wpsight-listing-gallery">
        <div class="gallery-main swiper-container">
            <div class="swiper-wrapper">
                <a data-width="1200" data-height="1200" href="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </a>

                <a data-width="1200" data-height="1200" href="https://images.unsplash.com/photo-1580373601876-0d9323fa37fc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1349&q=80" class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1580373601876-0d9323fa37fc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1349&q=80" alt="">
                </a>

                <a data-width="1200" data-height="1200" href="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </a>

                <a data-width="1200" data-height="1200" href="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </a>

                <a data-width="1200" data-height="1200" href="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </a>

                <a data-width="1200" data-height="1200" href="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </a>

                <a data-width="1200" data-height="1200" href="https://images.unsplash.com/photo-1562887245-9d941e87344e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1562887245-9d941e87344e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" alt="">
                </a>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="gallery-thumbnails swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1580373601876-0d9323fa37fc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1349&q=80" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="https://images.pexels.com/photos/3617467/pexels-photo-3617467.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
                </div>

                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1562887245-9d941e87344e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" alt="">
                    </a>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>


      <?php do_action( 'wpsight_listing_single_image_after' ); ?>

        <ul class="listing-single-row-details">
            <li class="listing-single-wrap-detail">
                <div class="listing-single-detail">
                    <svg class="icon" height="512pt" viewBox="0 0 512 512.001" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m497.355469 401.644531c19.496093 19.496094 19.496093 51.214844 0 70.710938-.027344.03125-.058594.058593-.089844.089843l-34.210937 33.785157c-3.898438 3.847656-8.976563 5.769531-14.050782 5.769531-5.164062 0-10.320312-1.984375-14.234375-5.945312-7.757812-7.859376-7.679687-20.523438.179688-28.285157l20.015625-19.769531h-320.964844c-44.113281 0-80-35.886719-80-80v-321.449219l-19.953125 19.6875c-7.863281 7.757813-20.527344 7.671875-28.285156-.191406-7.757813-7.863281-7.671875-20.527344.191406-28.285156l33.789063-33.332031c19.441406-19.179688 51.074218-19.179688 70.515624 0l33.789063 33.332031c7.863281 7.757812 7.949219 20.421875.191406 28.285156-3.914062 3.964844-9.074219 5.953125-14.238281 5.953125-5.074219 0-10.148438-1.917969-14.046875-5.761719l-21.953125-21.660156v323.421875c0 22.054688 17.945312 40 40 40h322.992188l-22.042969-21.769531c-7.859375-7.761719-7.941407-20.425781-.179688-28.285157 7.761719-7.855468 20.425781-7.9375 28.285157-.175781l34.210937 33.785157c.03125.03125.0625.058593.089844.089843zm-45.355469-401.644531h-259c-11.074219 0-20.039062 9-20 20.074219.042969 11.015625 8.984375 19.925781 20 19.925781h259c11.046875 0 20 8.953125 20 20v260c0 11.015625 8.910156 19.960938 19.925781 20 11.074219.039062 20.074219-8.925781 20.074219-20v-260c0-33.136719-26.863281-60-60-60zm-158 342.890625c11.046875 0 20-8.953125 20-20v-89.015625c0-30.328125-24.671875-55-55-55-13.285156 0-25.484375 4.734375-35 12.605469-9.515625-7.871094-21.714844-12.605469-35-12.605469-7.628906 0-14.902344 1.566406-21.511719 4.386719-3.558593-3.257813-8.285156-5.261719-13.488281-5.261719-11.046875 0-20 8.953125-20 20v125c0 11.046875 8.953125 20 20 20s20-8.953125 20-20v-89.125c0-8.269531 6.730469-15 15-15s15 6.730469 15 15v89.125c0 11.046875 8.953125 20 20 20s20-8.953125 20-20v-89.125c0-8.269531 6.730469-15 15-15s15 6.730469 15 15v89.015625c0 11.046875 8.953125 20 20 20zm90.75-234.890625c-.105469 0-.207031.015625-.3125.015625-.101562 0-.203125-.015625-.308594-.015625-25.433594 0-46.128906 20.71875-46.128906 46.183594 0 11.042968 8.953125 20 20 20s20-8.957032 20-20c0-3.351563 2.808594-6.183594 6.128906-6.183594.105469 0 .207032-.015625.3125-.015625.101563 0 .203125.015625.308594.015625 3.183594 0 5.894531 2.601562 6.113281 5.769531-.394531 1.464844-3.460937 10.523438-22.625 31.605469-11.886719 13.070312-23.566406 23.714844-23.679687 23.816406-6.121094 5.554688-8.191406 14.304688-5.214844 22.011719 2.976562 7.710937 10.390625 12.796875 18.65625 12.796875h54c11.046875 0 20-8.953125 20-20s-8.953125-20-20-20h-6.878906c17.757812-20.90625 25.757812-36.464844 25.757812-49.816406 0-25.464844-20.695312-46.183594-46.128906-46.183594zm0 0"/></svg>
                    <span class="text">12.000</span>
                </div>
            </li>

            <li class="listing-single-wrap-detail">
                <div class="listing-single-detail">
                    <svg class="icon" height="512pt" viewBox="0 0 512 512.001" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m497.355469 401.644531c19.496093 19.496094 19.496093 51.214844 0 70.710938-.027344.03125-.058594.058593-.089844.089843l-34.210937 33.785157c-3.898438 3.847656-8.976563 5.769531-14.050782 5.769531-5.164062 0-10.320312-1.984375-14.234375-5.945312-7.757812-7.859376-7.679687-20.523438.179688-28.285157l20.015625-19.769531h-320.964844c-44.113281 0-80-35.886719-80-80v-321.449219l-19.953125 19.6875c-7.863281 7.757813-20.527344 7.671875-28.285156-.191406-7.757813-7.863281-7.671875-20.527344.191406-28.285156l33.789063-33.332031c19.441406-19.179688 51.074218-19.179688 70.515624 0l33.789063 33.332031c7.863281 7.757812 7.949219 20.421875.191406 28.285156-3.914062 3.964844-9.074219 5.953125-14.238281 5.953125-5.074219 0-10.148438-1.917969-14.046875-5.761719l-21.953125-21.660156v323.421875c0 22.054688 17.945312 40 40 40h322.992188l-22.042969-21.769531c-7.859375-7.761719-7.941407-20.425781-.179688-28.285157 7.761719-7.855468 20.425781-7.9375 28.285157-.175781l34.210937 33.785157c.03125.03125.0625.058593.089844.089843zm-45.355469-401.644531h-259c-11.074219 0-20.039062 9-20 20.074219.042969 11.015625 8.984375 19.925781 20 19.925781h259c11.046875 0 20 8.953125 20 20v260c0 11.015625 8.910156 19.960938 19.925781 20 11.074219.039062 20.074219-8.925781 20.074219-20v-260c0-33.136719-26.863281-60-60-60zm-158 342.890625c11.046875 0 20-8.953125 20-20v-89.015625c0-30.328125-24.671875-55-55-55-13.285156 0-25.484375 4.734375-35 12.605469-9.515625-7.871094-21.714844-12.605469-35-12.605469-7.628906 0-14.902344 1.566406-21.511719 4.386719-3.558593-3.257813-8.285156-5.261719-13.488281-5.261719-11.046875 0-20 8.953125-20 20v125c0 11.046875 8.953125 20 20 20s20-8.953125 20-20v-89.125c0-8.269531 6.730469-15 15-15s15 6.730469 15 15v89.125c0 11.046875 8.953125 20 20 20s20-8.953125 20-20v-89.125c0-8.269531 6.730469-15 15-15s15 6.730469 15 15v89.015625c0 11.046875 8.953125 20 20 20zm90.75-234.890625c-.105469 0-.207031.015625-.3125.015625-.101562 0-.203125-.015625-.308594-.015625-25.433594 0-46.128906 20.71875-46.128906 46.183594 0 11.042968 8.953125 20 20 20s20-8.957032 20-20c0-3.351563 2.808594-6.183594 6.128906-6.183594.105469 0 .207032-.015625.3125-.015625.101563 0 .203125.015625.308594.015625 3.183594 0 5.894531 2.601562 6.113281 5.769531-.394531 1.464844-3.460937 10.523438-22.625 31.605469-11.886719 13.070312-23.566406 23.714844-23.679687 23.816406-6.121094 5.554688-8.191406 14.304688-5.214844 22.011719 2.976562 7.710937 10.390625 12.796875 18.65625 12.796875h54c11.046875 0 20-8.953125 20-20s-8.953125-20-20-20h-6.878906c17.757812-20.90625 25.757812-36.464844 25.757812-49.816406 0-25.464844-20.695312-46.183594-46.128906-46.183594zm0 0"/></svg>
                    <span class="text">600</span>
                </div>
            </li>

            <li class="listing-single-wrap-detail">
                <div class="listing-single-detail">
                    <svg class="icon" id="Capa_1" enable-background="new 0 0 510.291 510.291" height="512" viewBox="0 0 510.291 510.291" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m183.12 85.236c6.517-4.778 6.329-4.414 52.15-30.33.1-.05.19-.11.29-.16-24.03-33.81-63.26-54.6-105.79-54.6-71.55 0-129.77 58.22-129.77 129.77v375.23c0 2.76 2.24 5 5 5h50c2.76 0 5-2.24 5-5v-375.23c0-38.63 31.56-70.03 70.25-69.77 20.74.14 39.87 9.68 52.87 25.09z"/><path d="m282.222 351.743c8.171-1.363 13.691-9.092 12.329-17.263l-2.317-13.894c-1.362-8.171-9.091-13.69-17.263-12.329-8.171 1.363-13.691 9.092-12.329 17.263l2.317 13.894c1.362 8.171 9.09 13.691 17.263 12.329z"/><path d="m358.3 310.066c7.224-4.054 9.794-13.198 5.739-20.422l-6.485-11.555c-4.055-7.225-13.198-9.795-20.422-5.739-7.224 4.054-9.794 13.198-5.739 20.422l6.485 11.555c4.058 7.231 13.207 9.789 20.422 5.739z"/><path d="m433.506 266.837c5.42-6.265 4.735-15.738-1.53-21.158l-10.653-9.216c-6.266-5.419-15.737-4.734-21.158 1.53-5.42 6.265-4.735 15.738 1.53 21.158l10.653 9.216c6.267 5.42 15.738 4.734 21.158-1.53z"/><path d="m298.648 409.607c-1.195-8.197-8.808-13.872-17.007-12.68-8.198 1.195-13.875 8.809-12.68 17.007l2.1 14.408c1.197 8.207 8.819 13.874 17.007 12.68 8.198-1.195 13.875-8.809 12.68-17.007z"/><path d="m364.473 368.682c-3.105-7.681-11.848-11.39-19.528-8.286-7.681 3.104-11.39 11.848-8.286 19.528l5.135 12.704c3.106 7.684 11.851 11.389 19.528 8.286 7.681-3.104 11.39-11.848 8.286-19.528z"/><path d="m429.369 327.892c-4.939-6.651-14.334-8.039-20.985-3.1s-8.039 14.334-3.1 20.985l8.169 11.001c4.939 6.652 14.336 8.038 20.985 3.1 6.651-4.939 8.039-14.334 3.1-20.985z"/><path d="m504.871 297.122-11.204-9.298c-6.375-5.291-15.832-4.411-21.123 1.963-5.291 6.375-4.411 15.832 1.963 21.123l11.204 9.298c6.376 5.291 15.833 4.411 21.123-1.963 5.291-6.376 4.411-15.832-1.963-21.123z"/><path d="m185.78 211.116 167.01-94.47-4.77-8.44c-19.466-34.441-63.211-46.845-97.98-27.19-45.085 25.494-45.802 25.513-52.07 30.65-26.008 21.244-34.817 59.476-16.97 91z"/><path d="m412.64 150.066-6.62-11.7c-4.098-7.281-13.378-9.796-20.58-5.72-8.672 4.894-198.697 112.377-202.73 114.66-7.182 4.049-9.835 13.273-5.71 20.58l6.62 11.71c5.532 9.779 17.922 13.215 27.71 7.69l193.62-109.51c9.768-5.535 13.229-17.918 7.69-27.71z"/></g></svg>
                    <span class="text">3</span>
                </div>
            </li>

            <li class="listing-single-wrap-detail">
                <div class="listing-single-detail">
                    <svg class="icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 501.333 501.333" style="enable-background:new 0 0 501.333 501.333;" xml:space="preserve">
                                        <path d="M64.48,240h108.608c6.048,0,13.579,0,13.579-26.667c0-12.619-24.277-26.667-40.725-26.667H66.443 c-14.4,0-27.733,10.123-28.992,24.203C36,226.677,48.693,240,64.48,240z"/>
                        <path d="M490.667,250.667H32v-160C32,84.776,27.224,80,21.333,80H10.667C4.776,80,0,84.776,0,90.667v320 c0,5.891,4.776,10.667,10.667,10.667h10.667c5.891,0,10.667-4.776,10.667-10.667V336h437.333v74.667 c0,5.891,4.776,10.667,10.667,10.667h10.667c5.891,0,10.667-4.776,10.667-10.667V261.333 C501.333,255.442,496.558,250.667,490.667,250.667z"/>
                                    </svg>
                    <span class="text">4</span>
                </div>
            </li>
        </ul>

    </div><!-- .wpsight-listing-section -->

  <?php endif; ?>

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
             It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

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