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
        </div>
    </div>
</main>

<?php get_footer(); ?>