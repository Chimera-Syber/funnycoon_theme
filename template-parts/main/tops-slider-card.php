<?php 

if ( empty( get_the_ID() ) ) {
    return null;
}

$post_permalink = get_the_permalink();
$post_title = get_the_title();

// Human time
$time = human_time_diff(get_post_time('U'), current_time('timestamp')) . " " . __('назад');

?>

<div class="tops_slide cards_animation">
    <a href="<?php echo esc_html($post_permalink); ?>" class="tops_slide_link">
        <div class="tops_slide_info">
            <span class="tops_slide_title"><?php echo $post_title; ?></span>
            <span class="tops_slide_time_comments"><?php echo esc_html($time); ?> | <?php                             comments_number('0 комментариев', '1 комментарий', '% коментариев'); ?></span>
        </div>
        <div class="tops_slide_gradient"></div>   
    </a>
    <?php
        echo funnycoon_get_thumbnail(get_post_thumbnail_id(), $post, 'funnycoon_tops_slider_card', 'tops_slide_img');
    ?>
</div>