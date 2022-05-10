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
        'title'      => 'Слайдер на главной странице',
    ) );

    for ($i = 1; $i <= 5; $i++) {

        $settingId = 'funnycoon_slide_' . $i;
        $label = 'Post ' . $i . ' ID';

        $wp_customizer->add_setting($settingId, array(
            'default' => '',
            'transport' => 'refresh',
        ) );
    
        $wp_customizer->add_control($settingId, array(
            'type' => 'number',
            'label' => $label,
            'description' => 'Вставьте в поле ID поста',
            'section' => 'funnycoon_main_slider',
        ) );
    };

};

 add_action('customize_register', 'funnycoon_main_slider');