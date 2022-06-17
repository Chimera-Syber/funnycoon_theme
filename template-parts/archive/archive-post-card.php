<?php 

$post_permalink = get_the_permalink();
$post_title = get_the_title();

// Human time
$time = human_time_diff(get_post_time('U'), current_time('timestamp')) . " " . __('назад');

?>

<div class="archive_post_wrp cards_animation">
    <div class="archive_post_preview_wrp">
        <a href="<?php echo $post_permalink; ?>"><img class="archive_post_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"></a>
    </div>
    <div class="archive_post_info">
        <div class="archive_post_title_wrp">
            <a href="<?php echo $post_permalink; ?>"><h3 class="archive_post_title"><?php echo $post_title; ?></h3></a>
            <span class="archive_post_author">от&nbsp;<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="archive_author_nickname"><?php echo get_the_author_meta( 'display_name' ); ?></a></span>
        </div>
        <span class="archive_post_description">
            <?php echo esc_html(the_excerpt_max_charlength(140)); ?>
        </span>
        <div class="archive_post_date_comment_wrp">
            <span class="archive_post_date"><?php echo $time; ?></span>
            <a href="<?php echo $post_permalink; ?>" class="archive_post_comment_count"><?php echo get_comments_number(); ?></a>
        </div>
    </div>
</div>