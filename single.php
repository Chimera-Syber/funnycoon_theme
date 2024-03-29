<?php 


?>

<?php get_header(); ?>

<main class="funnycoon_main">
    <div class="funnycoon_main_wrapper">
        <div class="single_wrapper">
            <div class="single_post_wrp">
            <?php 
            
            while ( have_posts() ) :
                the_post();

                ?>

                <div class="single_preview_wrp">
                    <div class="single_preview_gradient"></div>
                    <?php
                        echo funnycoon_get_thumbnail(get_post_thumbnail_id(), $post, 'funnycoon_single_image_preview', 'single_preview_img');
                    ?>
                </div>
                <div class="single_info">
                    <div class="single_breadcrumbs">
                        <?php echo funnycoon_custom_breacrumds(); ?>
                        
                    </div>
                    <div class="single_title">
                        <h1 class="single_post_title"><?php the_title(); ?></h1>
                    </div>
                    <div class="single_author_wrp">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 50, '', get_the_author_meta( 'user_nicename' ), array(
                            'class' => 'single_author_avatar',
                        ) ); 
                        
                        ?>
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="single_author_nickname"><?php echo get_the_author_meta( 'display_name' ); ?></a>
                        &nbsp;&mdash;&nbsp;
                        <?php echo the_date('d.m.Y'); ?>
                    </div>
                </div>
                <div class="single_post_content">

                    <?php the_content(); ?>

                    <div class="single_tags">
                        <span class="single_tag_title">Теги:</span>
                        <div class="single_tags_wrp">
                            <?php the_tags('<div class="single_tag">','</div><div class="single_tag">','</div>') ?>
                        </div>        
                    </div>
                    <div class="single_adv_wrp">
                        <div id="adv-desktop" class="single_adv_desktop">
                            <?php
                                printf(get_theme_mod('funnycoon_fourth_banner'));
                            ?>
                        </div>
                        <div id="adv-mobile" class="single_adv_mobile">
                            <?php
                                printf(get_theme_mod('funnycoon_mobile_banner'));
                            ?>
                        </div>
                    </div>
                    <div class="single_prev_next_post_wrp">
                            <?php 
                                $link = get_previous_post_link('%link');
                                if(!empty($link)) {
                            ?>
                            <div class="prev_post_wrp">
                                <span class="prev_post_title">Предыдущий пост</span>
                                <div class="prev_post_link">
                                    <div class="prev_next_post_figure"></div>
                                    <?php echo $link; ?>
                                </div>
                            </div>
                            <?php }
                                $link = get_next_post_link('%link');
                                if(!empty($link)) {
                            ?>
                            <div class="next_post_wrp">
                                <span class="next_post_title">Следующий пост</span>
                                <div class="next_post_link">
                                    <div class="prev_next_post_figure"></div>
                                    <?php echo $link; ?>
                                </div>
                            </div>
                            <?php } ?>
                    </div>
                    <?php 
                        if ( comments_open() || get_comments_number() ) {
		                    comments_template();
	                    } 
                    ?>

                <?php endwhile; ?>
                </div>
            </div>
            <div class="single_sidebar">
                <div class="social_links_block_container">
                    <div class="social_links_block">
                        <div class="social_links_block_image_container">
                            <div class="social_links_block_header">
                                <div class="social_links_block_site_logo"></div>
                                <div class="social_links_block_title">Подписаться на наши социальные сети</div>
                            </div>
                            <div class="social_links_block_gradient"></div>
                        </div>
                        <div class="social_links_block_links_container">
                            <?php echo funnycoon_get_social_links_block_items(); ?>
                        </div>
                    </div>
                </div>
                <div class="main_posts_sidebar_title_wrp">
                    <span class="main_posts_sidebar_title">Популярные материалы</span>
                </div>
                <div class="main_posts_sidebar_popular_posts">
                    <?php popular_posts_query(); ?>
                    <div class="main_posts_sidebar_adv_wrp">
                        <div id="adv-desktop" class="main_posts_adv_desktop">
                            <?php
                                printf(get_theme_mod('funnycoon_second_banner'));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tops_sidebar_title">
                    <span class="title">Самое обсуждаемое</span>
                </div>
                <div class="tops_posts_wrp">
                    <?php top_comments_posts_query(); ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>