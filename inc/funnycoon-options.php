<?php 

/**
 * Options for main slider
 * For each slide - one option
 * Each option has Post ID
 */

function funnycoon_get_main_slider_options() {
    $options = array(
        'funnycoon_slide_1',
        'funnycoon_slide_2',
        'funnycoon_slide_3',
        'funnycoon_slide_4',
        'funnycoon_slide_5',
    );

    return $options;
}