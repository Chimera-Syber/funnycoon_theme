<?php get_header(); 

// Delete prefix
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

?>

<main class="funnycoon_main">
    <div class="funnycoon_main_wrapper">
        <div class="archive_wrapper">
            <div class="archive_posts">
                <div class="archive_header">
                    <div class="single_breadcrumbs">
                        <?php echo funnycoon_custom_breacrumds(); ?>
                    </div>
                    <h1 class="archive_title">Результаты поиска</h1>
                    <div class="archive_description">Результаты поиска по вашему запросу: <?php echo get_search_query(); ?></div>
                    <?php get_search_form(['aria_label' => 'search_page_search_form']); ?>
                </div>
                <div class="archive_posts_wrp">
                <?php 
                
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/archive/archive-post-card');
                    endwhile;
                endif;
                ?>
                </div>
                <?php
                    funnycoon_numeric_posts_nav();
                ?>

                <div class="main_posts_adv_wrp">
                    <div class="main_posts_adv">
                    <?php 
                        printf(get_theme_mod('funnycoon_first_banner'));
                    ?>
                    </div>
                </div>

            </div>
            <div class="archive_sidebar">
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
</main>

<?php get_footer(); ?>