<?php get_header(); 

// Delete prefix
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

$author_page_author_email = get_the_author_meta('user_email');
$author_page_author_user_login = get_the_author_meta('user_login');
$avatar_img_author_page = get_avatar( $author_page_author_email, 160, '', $author_page_author_user_login, array(
    'class' => 'author_page_avatar',
));

?>

<main class="funnycoon_main">
    <div class="funnycoon_main_wrapper">
        <div class="archive_wrapper">
            <div class="archive_posts">
                <div class="archive_header">
                    <div class="author_info_section">
                        <div class="author_info_avatar">
                            <?php echo $avatar_img_author_page; ?>
                        </div>
                        <div class="author_info_wrp">
                            <?php the_archive_title( '<h1 class="author_page_nickname">', '</h1>' ); ?>
                            <?php the_archive_description( '<div class="author_page_description">', '</div>' ); ?>
                            <div class="author_socials_list">
                                <?php echo get_socials_author_page(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="archive_posts_wrp">
                    <span class="archive_author_title">Все материалы автора</span>
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
                    <div class="main_posts_adv"></div>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>