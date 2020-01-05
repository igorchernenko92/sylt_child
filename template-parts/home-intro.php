<?php
/**
 * Home boxes template
 *
 * @package WPCasa Sylt Child
 */

$display = get_post_meta( get_the_id(), '_intro_display', true );
if( $display ) : ?>

<?php $title = get_post_meta( get_the_id(), '_intro_title', true ); ?>
<?php $description = get_post_meta( get_the_id(), '_intro_description', true ); ?>

<section class="listings-section site-section">
  <div class="container">

    <div class="listings-section-desc">
        <div class="listings-section-wrap-title">
            <h2 class="listings-section-title"><?php echo $title; ?></h2>
        </div>

        <p class="listings-section-subtext"><?php echo $description; ?></p>
    </div>

  </div>
</section>

<?php endif; ?>