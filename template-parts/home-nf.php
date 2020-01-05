<?php
/**
 * Home boxes2 template
 *
 * @package WPCasa Sylt Child
 */

$title = get_post_meta(get_the_id(), '_nf_title', true);
$desc = get_post_meta(get_the_id(), '_nf_description', true);
$form_field = get_post_meta(get_the_id(), '_nf_form_field', true);
$display = get_post_meta( get_the_id(), '_nf_display', true );

if( $display ) : ?>


    <div class="site-cta site-section home-section section-overlay">

      <div class="container">

        <div class="content 12u$">

          <div class="cta-title">
            <h2><?php echo $title; ?></h2>
          </div>


          <div class="cta-description">
            <p><?php echo $desc; ?></p>
          </div>

        <div class="cta-description">
            <p><?php echo $form_field; ?></p>
        </div>

        </div>

      </div><!-- .container -->

    </div>

<?php endif; ?>