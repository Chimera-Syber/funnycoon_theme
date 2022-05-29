<?php 
    $tag_id = get_theme_mod('funnycoon_primary_tag');
    $title = get_theme_mod('funnycoon_primary_title');
    $tag_link = get_tag_link($tag_id);

?>

<section class="primary_posts">
    <div class="primary_posts_title_wrp">
        <span class="primary_posts_title"><?php echo esc_html($title); ?></span>
    </div>
    <div class="primary_posts_wrp">
        <?php primary_post_query($tag_id); ?>
    </div>
    <a href="<?php echo $tag_link; ?>" class="primary_posts_button">
        Посмотреть еще
    </a>
</section>