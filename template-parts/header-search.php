<?php
/**
 * Home search template
 *
 * @package WPCasa Sylt
 */


$display = get_post_meta(get_the_id(), '_search_display', true);
if ($display) :

// Get search display option
    $search_display = get_option( 'wpsight_sylt_header_search_display', 'all' );
    $search_bg = get_post_meta(get_the_id(), '_search_back_image', true);
    // Set when to display search

    $display = false;

    // Display on all pages

    if( 'all' == $search_display )
        $display = true;

    // Display only on home page

    if( 'home' == $search_display && is_front_page() )
        $display = true;

    // Set antimate class
    $animate = is_front_page() ? ' animated fadeIn' : ''; ?>

    <?php if( $display ) : ?>

    <div id="home-search" class="site-section home-section<?php echo $animate; ?>"  style="background-image: url('<?php echo $search_bg; ?>');">

        <div class="container">

            <div class="content 12u$">

                <?php wpsight_search(); ?>

            </div>

        </div><!-- .container -->

    </div><!-- #home-search -->

    <?php endif; ?>

<?php endif; ?>
