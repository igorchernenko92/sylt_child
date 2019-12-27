<?php if( isset( $fields[$field]['data'] ) && is_array( $fields[$field]['data'] ) ) : ?>
    <div data-select-all="true" class="listings-search-field listings-search-field-<?php echo esc_attr( $fields[$field]['type'] ); ?> listings-search-field-<?php echo esc_attr( $field ); ?> <?php echo esc_attr( $class ); ?>">
        <?php
            $terms = get_terms( ['taxonomy' => $field, 'hide_empty' => false ] );
            $output = get_terms_hierarchical($terms);
        ?>
        <select class="multiselect" name="<?php echo $field ?>[]" placeholder="<?php echo $fields[$field]['data']['show_option_none'] ?>" multiple="multiple">
            <?php echo $output; ?>
        </select>
    </div><!-- .listings-search-field-<?php echo esc_attr( $field ); ?> -->
<?php endif; ?>

