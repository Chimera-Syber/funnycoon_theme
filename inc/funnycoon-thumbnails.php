<?php

/**
 * Implement custom thumbnail function with fly dynamic image resizer plugin
 *
 * @param int $post_thumbnail_id thumbnail id
 * @param WP_POST $post
 * @param string $size
 * @param string $class_name
 * @return string
 */
function funnycoon_get_thumbnail(int $post_thumbnail_id, WP_Post $post, string $size, string $class_name): string
{
    /**
     * Check plugin active
     * You need to install this plugin to active dynamic reziser
     * @link https://wordpress.org/plugins/fly-dynamic-image-resizer
     */
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    if(is_plugin_active('fly-dynamic-image-resizer/fly-dynamic-image-resizer.php')) {

        /**
         * Add thumbnails sizes
         */
        if ( function_exists( 'fly_add_image_size' ) ) {
            fly_add_image_size('funnycoon_main_slider', 700, 450, true);
            fly_add_image_size('funnycoon_main_post_card', 320, 280, true);
            fly_add_image_size('funnycoon_popular_post_card', 133, 100, array('center', 'top'));
            fly_add_image_size('funnycoon_primary_post_card', 718, 378, true);
            fly_add_image_size('funnycoon_review_slider_card_1', 673, 445, true);
            fly_add_image_size('funnycoon_review_slider_card_2', 332, 214, true);
            fly_add_image_size('funnycoon_tops_slider_card', 502, 332, true);
            fly_add_image_size('funnycoon_archive_post_card', 340, 220, true);
            fly_add_image_size('funnycoon_single_image_preview', 1035, 360, array('center', 'top'));
        }

        $alt = get_the_title($post);

        $imageFly = fly_get_attachment_image_src($post_thumbnail_id, $size);

        $image = '<img src="' . $imageFly['src'] . '" class="' . $class_name . '" alt="' . $alt . '" loading="lazy">';

    } else {
        $image = '<img class="' . $class_name . '" src="' . get_the_post_thumbnail_url($post, 'full') . '">';
    }

    return $image;
}
