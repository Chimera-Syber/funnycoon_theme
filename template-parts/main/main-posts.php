<section class="main_posts">
    <div class="main_posts_wrp">
        <div class="main_posts_title_wrp">
            <span class="main_posts_title">Свежие новости</span>
        </div>
        <div class="main_posts_posts" id="load-more-content">
            <?php funnycoon_loadmore_ajax_handler( true ); ?>
        </div>
        <div class="main_posts_loadmore">
            <div class="main_posts_loadmore_button">
                <button class="funnycoon_loadmore" id="load-more" data-page="1">Загрузить еще</button>
            </div>
        </div>
        <div class="main_posts_adv_wrp">
            <div id="adv-desktop" class="main_posts_adv_desktop">
                <?php
                    printf(get_theme_mod('funnycoon_first_banner'));
                ?>
            </div>
            <div id="adv-mobile" class="main_posts_adv_mobile">
                <?php
                    printf(get_theme_mod('funnycoon_mobile_banner'));
                ?>
            </div>
        </div>
    </div>
    <div class="main_posts_sidebar">
        <div class="main_posts_sidebar_wrp">
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
                    <div class="main_posts_sidebar_adv">
                        <?php
                            printf(get_theme_mod('funnycoon_second_banner'));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>