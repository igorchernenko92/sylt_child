<?php
/**
 * Home services template
 *
 * @package WPCasa Sylt Child
 */

//if( $display ) : ?>

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
    <?php endforeach; ?>
<?php endif; ?>

<?php //endif; ?>