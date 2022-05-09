<?php 
/**
 * 
 * Customizer core function
 * 
 * @author : Martti Syber
 * 
 * 
 */


/**
 * 
 * Main Slider Customizer
 * 
 */

function funnycoon_main_slider($wp_customizer) {
        
    $wp_customizer->add_section('funnycoon_main_slider', array(
        'title'      => 'Main Slider',
        //'priority'   => 30,
    ) );

    $wp_customizer->add_setting('funnycoon_slide_1', array(
        'default' => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_slide_1', array(
        'type' => 'number',
        'label' => 'Post 1 ID',
        'section' => 'funnycoon_main_slider',
    ) );

    $wp_customizer->add_setting('funnycoon_slide_2', array(
        'default' => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_slide_2', array(
        'type' => 'number',
        'label' => 'Post 2 ID',
        'section' => 'funnycoon_main_slider',
    ) );

};

 add_action('customize_register', 'funnycoon_main_slider');