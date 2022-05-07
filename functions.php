<?php
/**
 * @author : Martti Syber
 */

/**
 * 
 * Add theme scripts and styles
 * 
 */

function funnycoon_scripts() {
    wp_enqueue_style('funnycoon-styles', get_template_directory_uri() . '/assets/css/styles.css');
    wp_enqueue_script('funnycoon-scripts', get_template_directory_uri() . '/assets/js/funnycoon_scripts.js', [], false, true);
};
add_action('wp_enqueue_scripts', 'funnycoon_scripts');