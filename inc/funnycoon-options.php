<?php 

/**
 * Options for main slider
 * For each slide - one option
 * Each option has Post ID
 * 
 * @return array 
 *       'funnycoon_slide_1',
 *       'funnycoon_slide_2',
 *       'funnycoon_slide_3',
 *       'funnycoon_slide_4',
 *       'funnycoon_slide_5',
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

/**
 * User profile Fields
 * @return array 'pinterest'  => 'Pinterest',
        'youtube'       => 'Youtube',
        'reddit'        => 'Reddit',
        'vk'            => 'Вконтакте',
        'twitch'        => 'Twitch',
        'user_url'      => 'Сайт',
 */

function user_social_info() {

    return array(
        'pinterest'  => 'Pinterest',
        'youtube'    => 'Youtube',
        'reddit'     => 'Reddit',
        'vk'         => 'Вконтакте',
        'twitch'     => 'Twitch',
        'user_url'   => 'Сайт',
    );

  }

/**
 * Social icons for header and footer
 * Name and style name
 * 
 * @return array 
 *     'pinterest'     => 'Pinterest',
 *     'youtube'       => 'Youtube',
 *     'reddit'        => 'Reddit',
 *     'vk'            => 'VK',
 *     'twitch'        => 'Twitch',
 *     'trovo'         => 'Trovo',
 *     'telegram'      => 'Telegram',
 *     'yandexzen'     => 'YandexZen',
 *     'instagram'     => 'Instagram',
 *     'tenchat'       => 'Tenchat',
 *     'discord'       => 'Discord',
 *     'rss'           => 'RSS',
 */

function social_icons() {

    return array(
        'pinterest'     => 'Pinterest',
        'youtube'       => 'Youtube',
        'reddit'        => 'Reddit',
        'vk'            => 'VK',
        'twitch'        => 'Twitch',
        'trovo'         => 'Trovo',
        'telegram'      => 'Telegram',
        'yandexzen'     => 'YandexZen',
        'instagram'     => 'Instagram',
        'discord'       => 'Discord',
        'rss'           => 'RSS',
    );

}

/**
 * Social links options for social links block
 * in sidebar
 * Item name and title
 *
 * @return array
 */
function social_links_block_items() {

    return array(
        'telegram' => 'Telegram',
        'vk'       => 'ВКонтакте',
        'boosty'   => 'Boosty',
        'dzen'     => 'Dzen'
    );

}

/**
 * 
 * Metricas fields names
 * 
 * @return array
 *      'funnycoon_yandex_metrica_field',
 *      'funnycoon_yandex_rtb_field',
 *      'funnycoon_yandex_webmaster_field',
 *      'funnycoon_google_analytics_field',  
*/

function metrica_fields() {

   return array(
       'funnycoon_yandex_metrica_field',
       'funnycoon_yandex_rtb_field',
       'funnycoon_yandex_webmaster_field',
       'funnycoon_google_analytics_field',
   );

}

/**
 * 
 * Site rating counters 
 *
 * @return array
 *      'funnycoon_first_counter_field',
 *      'funnycoon_second_counter_field',
 *      'funnycoon_third_counter_field',
 */

function site_rating_counters() {

    return array(
        'funnycoon_first_counter_field',
        'funnycoon_second_counter_field',
        'funnycoon_third_counter_field',
    );

}