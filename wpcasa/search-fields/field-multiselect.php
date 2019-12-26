<?php if( isset( $fields[$field]['data'] ) && is_array( $fields[$field]['data'] ) ) : ?>

    <div data-select-all="true" class="listings-search-field listings-search-field-<?php echo esc_attr( $fields[$field]['type'] ); ?> listings-search-field-<?php echo esc_attr( $field ); ?> <?php echo esc_attr( $class ); ?>">





        <select class="multiselect" placeholder="Multiselect" multiple="multiple">

            <?php
                $taxonomyName = $field;
                $parent_terms = get_terms( $taxonomyName, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) );
                //        var_dump(get_term_children($parent_terms[0]->term_id, $field ));
                //        var_dump($parent_terms);
                foreach ( $parent_terms as $pterm ) {
                    echo '<optgroup label="' . $pterm->name . '">';
                    $terms = get_terms( $taxonomyName, array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
                    foreach ( $terms as $term ) {
                        echo '<option value="1">' . $term->name . '</option>';
                    }
                    echo '</optgroup>';
                }

            ?>


<!--            <optgroup label="Group 1">-->
<!--                <option value="1">Example item 1</option>-->
<!--                <option value="2">Example item 2</option>-->
<!--                <option value="3">Example item 3</option>-->
<!--                <option value="4">Example item 4</option>-->
<!--                <option value="5">Example item 5</option>-->
<!--            </optgroup>-->

<!--            <optgroup label="Group 2">-->
<!--                <option value="6">Example item 6</option>-->
<!--                <option value="7">Example item 7</option>-->
<!--                <option value="8">Example item 8</option>-->
<!--                <option value="9">Example item 9</option>-->
<!--                <option value="10">Example item 10</option>-->
<!--            </optgroup>-->
<!---->
<!--            <optgroup label="Group 3">-->
<!--                <option value="11">Example item 11</option>-->
<!--                <option value="12">Example item 12</option>-->
<!--                <option value="13">Example item 13</option>-->
<!--                <option value="14">Example item 14</option>-->
<!--                <option value="15">Example item 15</option>-->
<!--            </optgroup>-->

        </select>


        <?php
        $dropdown_defaults = array(
            'echo'				=> 1,
            'name'				=> $field,
            'class'           	=> 'listing-search-' . $field . ' select',
//            'selected'			=> $field_value,
            'value_field'       => 'slug',
            'hide_if_empty'   	=> false,
            'cache'				=> true
        );

        // Merge with form field $fields[$field]['data']
        $dropdown_args = wp_parse_args( $fields[$field]['data'], $dropdown_defaults );
        ?>

<!--        --><?php //wp_dropdown_categories( $dropdown_args ); ?>

    </div><!-- .listings-search-field-<?php echo esc_attr( $field ); ?> -->

<?php endif; ?>

