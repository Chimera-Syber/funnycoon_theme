<?php 
/**
 * 
 * Customizer core function
 * @author : Martti Syber
 * 
 */


/**
 * 
 * Main Slider Customizer
 * 
 * @param $wp_customizer
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
            'default'   => '',
            'transport' => 'refresh',
        ) );
    
        $wp_customizer->add_control($settingId, array(
            'type'        => 'number',
            'label'       => $label,
            'description' => 'Вставьте в поле ID поста',
            'section'     => 'funnycoon_main_slider',
        ) );
    };

};

 add_action('customize_register', 'funnycoon_main_slider');

 /**
  * 
  * Primary posts customizer
  *
  */

function funnycoon_primary_posts($wp_customizer) {

    $wp_customizer->add_section('funnycoon_primary_posts', array(
        'title' => 'Primary posts',
    ) );

    $wp_customizer->add_setting('funnycoon_primary_tag', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_primary_tag', array(
        'type'        => 'number',
        'label'       => 'Tag ID',
        'description' => 'Вставьте в поле ID тега',
        'section'     => 'funnycoon_primary_posts',
    ) );


    $wp_customizer->add_setting('funnycoon_primary_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_primary_title', array(
        'type'        => 'text',
        'label'       => 'Название',
        'description' => esc_html__( 'Вставьте в поле название для блока', 'funnycoon' ),
        'section'     => 'funnycoon_primary_posts',
    ) );
  
};

add_action('customize_register', 'funnycoon_primary_posts');

/**
 * 
 * Review and tops sections
 * 
 */

function funnycoon_reviews_tops_section($wp_customizer) {

    $wp_customizer->add_section('funnycoon_reviews_tops', array(
        'title' => 'Reviews and Tops',
    ) );

    // Title for reviews 
    
    $wp_customizer->add_setting('funnycoon_reviews_tops_reviews_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_reviews_tops_reviews_title', array(
        'type'        => 'text',
        'label'       => 'Title for Reviews',
        'description' => 'Название для слайдера с обзорами',
        'section'     => 'funnycoon_reviews_tops',
    ) );

    // Settings for reviews

    $wp_customizer->add_setting('funnycoon_reviews_tops_reviews', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_reviews_tops_reviews', array(
        'type'        => 'number',
        'label'       => 'Tag ID for reviews',
        'description' => 'Вставьте в поле ID тега',
        'section'     => 'funnycoon_reviews_tops',
    ) );

     // Title for tops 
    
     $wp_customizer->add_setting('funnycoon_reviews_tops_tops_title', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_reviews_tops_tops_title', array(
        'type'        => 'text',
        'label'       => 'Title for Tops',
        'description' => 'Название для слайдера с подборками',
        'section'     => 'funnycoon_reviews_tops',
    ) );

    // Title for tops

    $wp_customizer->add_setting('funnycoon_reviews_tops_tops', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_reviews_tops_tops', array(
        'type'        => 'number',
        'label'       => 'Tag ID for tops',
        'description' => 'Вставьте в поле ID тега',
        'section'     => 'funnycoon_reviews_tops',
    ) );
};

add_action('customize_register', 'funnycoon_reviews_tops_section');