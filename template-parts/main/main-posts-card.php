<?php 

if ( empty( get_the_ID() ) ) {
    return null;
}

// Human time
$time = human_time_diff(get_post_time('U'), current_time('timestamp')) . " " . __('назад');

$post_permalink = get_the_permalink();
$post_title = get_the_title();

?>


<div class="main_post cards_animation">
    
    <div class="main_post_gradient"></div>
    <a href="<?php echo esc_url( $post_permalink ); ?>" class="main_post_link">
        <div class="main_post_info_wrp">
            <span class="main_post_title"><?php echo esc_html( $post_title ); ?></span>
            <span class="main_post_desc"><?php echo esc_html(the_excerpt_max_charlength(140)); ?></span>
            <div class="main_post_date_com_wrp">
                <span class="main_post_date"><?php echo $time; ?></span>
                <span class="main_post_comments"><?php echo get_comments_number(); ?></span>
            </div>
        </div>
    </a>
    <img class="main_post_img" src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>">
</div>