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