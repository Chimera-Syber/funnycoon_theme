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
            <div class="main_post_date_com_wrp">
                <span class="main_post_date"><?php echo $time; ?></span>
                <span class="main_post_comments"><?php echo get_comments_number(); ?></span>
            </div>
        </div>
    </a>
    <?php
        echo funnycoon_get_thumbnail(get_post_thumbnail_id(), $post, 'funnycoon_main_post_card', 'main_post_img');
    ?>
</div>