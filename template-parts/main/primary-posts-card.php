<?php 

if ( empty( get_the_ID() ) ) {
    return null;
}

$post_permalink = get_the_permalink();
$post_title = get_the_title();

// Get categoty title
$categories = get_the_category();
$category = $categories[0]->name;   
$category_link = get_category_link( $categories[0]->term_id ); 

?>

<div class="primary_posts_slide">
    <a href="<?php echo $post_permalink; ?>" class="pps_info">
        <div class="pps_category_wrp">
            <span class="pps_category"><?php echo esc_html($category); ?></span>
        </div>
        <div class="pps_title_wrp">
            <span class="pps_title"><?php echo esc_html($post_title); ?></span>
        </div>
    </a>
    <div class="pps_gradient"></div>
    <?php
        echo funnycoon_get_thumbnail(get_post_thumbnail_id(), $post, 'funnycoon_primary_post_card', 'pps_img');
    ?>
</div>