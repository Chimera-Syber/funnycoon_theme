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
        'priority' => 161,
    ) );

    global $post;

    $listOfPosts = array();
    
    $args = array( 
        'posts_per_page'   => 100,
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'suppress_filters' => false,
    );

    $posts = get_posts($args);

    foreach( $posts as $post ) {
         setup_postdata($post); 
         $listOfPosts[$post->ID] = $post->ID . ' - ' .get_the_title( $post );
    }

    for ($i = 1; $i <= 5; $i++) {

        $settingId = 'funnycoon_slide_' . $i;
        $label = 'Post ' . $i . ' ID';

        $wp_customizer->add_setting($settingId, array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
    
        $wp_customizer->add_control($settingId, array(
            'type'        => 'select',
            'label'       => $label,
            'description' => 'Вставьте в поле ID поста',
            'choices'     => $listOfPosts,
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

    $args = array(
        'taxonomy'   => 'post_tag',
        'orderby'    => 'name',
        'hide_empty' => false,
    );

    $terms = get_terms( $args );

    $listOfTags = array();

    foreach($terms as $term) {
        $listOfTags[$term->term_id] = $term->term_id . ' - ' . $term->name;  
    }

    $wp_customizer->add_section('funnycoon_primary_posts', array(
        'title' => 'Primary posts',
        'priority' => 162,
    ) );

    $wp_customizer->add_setting('funnycoon_primary_tag', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_primary_tag', array(
        'type'        => 'select',
        'choices'     => $listOfTags,
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

    $args = array(
        'taxonomy'   => 'post_tag',
        'orderby'    => 'name',
        'hide_empty' => false,
    );

    $terms = get_terms( $args );

    $listOfTags = array();

    foreach($terms as $term) {
        $listOfTags[$term->term_id] = $term->term_id . ' - ' . $term->name;  
    }

    $wp_customizer->add_section('funnycoon_reviews_tops', array(
        'title' => 'Reviews and Tops',
        'priority' => 163,
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
        'type'        => 'select',
        'choices'     => $listOfTags,
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
        'type'        => 'select',
        'choices'     => $listOfTags,
        'label'       => 'Tag ID for tops',
        'description' => 'Вставьте в поле ID тега',
        'section'     => 'funnycoon_reviews_tops',
    ) );
};

add_action('customize_register', 'funnycoon_reviews_tops_section');

/**
 * Social icons menu for header and footer
 */

function funnycoon_social_icons_header_footer_mobile($wp_customizer) {

    $wp_customizer->add_panel('funnycoon_social_icons', array(
        'title' => 'Social icons',
        'priority' => 164,
    ) );

    $wp_customizer->add_section('funnycoon_social_icons_header', array( 
        'title' => 'Header social icons',
        'panel' => 'funnycoon_social_icons',

    ) );

    // Section for header

    foreach( social_icons() as $key => $name) {

        $setting_name = 'funnycoon_social_icons_header_' . $key;

        $wp_customizer->add_setting( $setting_name, array(
            'default'   => '',
            'transport' => 'refresh',
        ) );

        $wp_customizer->add_control( $setting_name, array(
            'type' => 'string',
            'label' => $name,
            'description' => 'Добавить ' . $name,
            'section' => 'funnycoon_social_icons_header',
        ) );

    }

    // Section for footer

    $wp_customizer->add_section('funnycoon_social_icons_footer', array( 
        'title' => 'Footer social icons',
        'panel' => 'funnycoon_social_icons',
    ) );

    foreach( social_icons() as $key => $name ) {

        $setting_name = 'funnycoon_social_icons_footer_' . $key;

        $wp_customizer->add_setting( $setting_name, array( 
            'default' => '',
            'transport' => 'refresh',
        ) );
    
        $wp_customizer->add_control( $setting_name, array(
            'type' => 'string',
            'label' => $name,
            'description' => 'Добавить ' . $name,
            'section' => 'funnycoon_social_icons_footer',
        ) );

    }

     // Section for footer

     $wp_customizer->add_section('funnycoon_social_icons_mobile', array( 
        'title' => 'Mobile social icons',
        'panel' => 'funnycoon_social_icons',
    ) );

    foreach( social_icons() as $key => $name ) {

        $setting_name = 'funnycoon_social_icons_mobile_' . $key;

        $wp_customizer->add_setting( $setting_name, array( 
            'default' => '',
            'transport' => 'refresh',
        ) );
    
        $wp_customizer->add_control( $setting_name, array(
            'type' => 'string',
            'label' => $name,
            'description' => 'Добавить ' . $name,
            'section' => 'funnycoon_social_icons_mobile',
        ) );

    }

    

}

add_action('customize_register', 'funnycoon_social_icons_header_footer_mobile' );

/**
 * Advertisement setting
 */

 function funnycoon_adv_settings($wp_customizer) {

    $wp_customizer->add_panel('funnycoon_adv_panel', array(
        'title' => 'Advertisement',
        'priority' => 165,
    ) );

    $wp_customizer->add_section('funnycoon_adv_section', array(
        'title' => 'Banners',
        'panel' => 'funnycoon_adv_panel',
    ) );

    // First banner

    $wp_customizer->add_setting('funnycoon_first_banner', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_first_banner', array(
        'type'        => 'textarea',
        'label'       => 'First banner',
        'description' => 'Баннер 1000х120 на главной странице под основными поставки после кнопки "Загрузить еще"',
        'section'     => 'funnycoon_adv_section',
    ) );

    // Second banner

    $wp_customizer->add_setting('funnycoon_second_banner', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_second_banner', array(
        'type'        => 'textarea',
        'label'       => 'Second banner',
        'description' => 'Баннер 300x300 в сайдбаре',
        'section'     => 'funnycoon_adv_section',
    ) );

    // Third banner

    $wp_customizer->add_setting('funnycoon_third_banner', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_third_banner', array(
        'type'        => 'textarea',
        'label'       => 'Third banner',
        'description' => 'Баннер 1000x120 на главной странице под "Наши обзоры"',
        'section'     => 'funnycoon_adv_section',
    ) );

    // Fourth banner
    
    $wp_customizer->add_setting('funnycoon_fourth_banner', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_fourth_banner', array(
        'type'        => 'textarea',
        'label'       => 'Fourth banner',
        'description' => 'Баннер 750x300 на странице поста',
        'section'     => 'funnycoon_adv_section',
    ) );


 }

add_action('customize_register', 'funnycoon_adv_settings');

/**
 * 
 * SEO Settings
 * 
 */

function funnycoon_seo_settings($wp_customizer) {

   $wp_customizer->add_panel('funnycoon_seo_panel', array(
       'title' => 'SEO settings',
       'priority' => 166,
   ) );

   // Metrica section

   $wp_customizer->add_section('funnycoon_seo_metrica_section', array(
       'title' => 'Metrica',
       'panel' => 'funnycoon_seo_panel',
   ) );

   // Metrica fields
   // Yandex metrica

   $wp_customizer->add_setting('funnycoon_yandex_metrica_field', array(
       'default'   => '',
       'transport' => 'refresh',
   ) );

   $wp_customizer->add_control('funnycoon_yandex_metrica_field', array(
       'type'        => 'textarea',
       'label'       => 'Yandex metrica',
       'description' => 'Поле для кода Yandex метрики',
       'section'     => 'funnycoon_seo_metrica_section',
   ) );

   // Yandex RTB

   $wp_customizer->add_setting('funnycoon_yandex_rtb_field', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_yandex_rtb_field', array(
        'type'        => 'textarea',
        'label'       => 'Yandex RTB',
        'description' => 'Поле для кода Yandex.RTB',
        'section'     => 'funnycoon_seo_metrica_section',
    ) );

    // Yandex Webmaster

    $wp_customizer->add_setting('funnycoon_yandex_webmaster_field', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_yandex_webmaster_field', array(
        'type'        => 'textarea',
        'label'       => 'Yandex Webmaster',
        'description' => 'Поле для кода Yandex Webmaster',
        'section'     => 'funnycoon_seo_metrica_section',
    ) );

    // Google Analytics

    $wp_customizer->add_setting('funnycoon_google_analytics_field', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_google_analytics_field', array(
        'type'        => 'textarea',
        'label'       => 'Google Analytics',
        'description' => 'Поле для кода Google Analytics',
        'section'     => 'funnycoon_seo_metrica_section',
    ) );

    // Counters section

    $wp_customizer->add_section('funnycoon_seo_counters_section', array(
        'title' => 'SEO Counters',
        'description' => 'Настройки счетчиков',
        'panel' => 'funnycoon_seo_panel',
    ) );

    // First counter 

    $wp_customizer->add_setting('funnycoon_first_counter_field', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_first_counter_field', array(
        'type'        => 'textarea',
        'label'       => 'First counter',
        'description' => 'Первый счетчик',
        'section'     => 'funnycoon_seo_counters_section',
    ) );
    
    // Second counter 

    $wp_customizer->add_setting('funnycoon_second_counter_field', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_second_counter_field', array(
        'type'        => 'textarea',
        'label'       => 'Second counter',
        'description' => 'Второй счетчик',
        'section'     => 'funnycoon_seo_counters_section',
    ) );

    // Third counter 

    $wp_customizer->add_setting('funnycoon_third_counter_field', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customizer->add_control('funnycoon_third_counter_field', array(
        'type'        => 'textarea',
        'label'       => 'Third counter',
        'description' => 'Третий счетчик',
        'section'     => 'funnycoon_seo_counters_section',
    ) );
    

}

add_action('customize_register', 'funnycoon_seo_settings');

