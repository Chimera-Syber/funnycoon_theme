<?php 

if ( empty( get_the_ID() ) ) {
    return null;
}

$post_permalink = get_the_permalink();
$post_title = get_the_title();

// Human time
$time = human_time_diff(get_post_time('U'), current_time('timestamp')) . " " . __('назад');

?>

<div class="tops_posts_card">
    <a href="<?php echo esc_html($post_permalink); ?>" class="tops_posts_card_title"><?php echo $post_title; ?></a>
    <span class="tops_posts_card_desc"><?php echo esc_html(the_excerpt_max_charlength(140)); ?></span>
    <div class="tops_posts_card_info">
        <span class="tops_posts_card_time"><?php echo esc_html($time); ?></span>
        <span class="tops_posts_card_comments"><?php echo get_comments_number(); ?></span>
    </div>
</div>