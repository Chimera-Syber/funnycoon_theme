<?php 

if ( empty( get_the_ID() ) ) {
    return null;
}

$post_permalink = get_the_permalink();
$post_title = get_the_title();

// Human time
$time = human_time_diff(get_post_time('U'), current_time('timestamp')) . " " . __('назад');

?>
    <div class="reviews_slide cards_animation">
    <a href="<?php echo $post_permalink; ?>" class="reviews_slide_link">
        <div class="reviews_slide_info">
            <span class="reviews_slide_title"><?php echo $post_title; ?></span>
            <span class="reviews_slide_time_comments"><?php echo esc_html($time); ?> <span class="reviews_slide_comments"><?php echo get_comments_number(); ?></span>
        </div>
        <div class="reviews_slide_gradient"></div>
    </a>
    <?php
        echo funnycoon_get_thumbnail(get_post_thumbnail_id(), $post, 'funnycoon_review_slider_card_2', 'reviews_slide_img');
    ?>
</div>
