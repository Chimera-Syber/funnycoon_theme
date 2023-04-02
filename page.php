<?php get_header(); 


?>

<main class="funnycoon_main">
    <div class="funnycoon_main_wrapper">
        <div class="page_wrapper">
            <div class="page_content">
                <h1 class="page_title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
            <div class="page_sidebar">
                <div class="main_posts_sidebar_wrp">
                    <div class="social_links_block_container">
                        <div class="social_links_block">
                            <div class="social_links_block_image_constainer">
                                <div class="social_links_block_header">
                                    <div class="social_links_block_site_logo"></div>
                                    <div class="social_links_block_title">Подписаться на наши социальные сети</div>
                                </div>
                                <div class="social_links_block_gradient"></div>
                                <div class="social_links_block_image"></div>
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
                            <div class="main_posts_sidebar_adv">
                                <?php
                                    printf(get_theme_mod('funnycoon_second_banner'));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>