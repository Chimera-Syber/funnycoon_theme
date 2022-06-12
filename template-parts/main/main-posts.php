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
            <div class="main_posts_adv">

            </div>
        </div>
    </div>
    <div class="main_posts_sidebar">
        <div class="main_posts_sidebar_wrp">
            <div class="main_posts_sidebar_title_wrp">
                <span class="main_posts_sidebar_title">Популярные материалы</span>
            </div>
            <div class="main_posts_sidebar_popular_posts">
                <?php popular_posts_query(); ?>
                <div class="main_posts_sidebar_adv_wrp">
                    <div class="main_posts_sidebar_adv">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>