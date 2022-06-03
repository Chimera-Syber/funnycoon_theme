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
            <span class="reviews_slide_time_comments"><?php echo esc_html($time); ?> | <?php comments_number('0 комментариев', '1 комментарий', '% коментариев'); ?></span>
        </div>
        <div class="reviews_slide_gradient"></div>
    </a>
    <img class="reviews_slide_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo $post_title; ?>">
</div>

