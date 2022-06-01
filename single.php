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
                    <img class="single_preview_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="">
                </div>
                <div class="single_info">
                    <div class="single_breadcrumbs">
                        <a href="#">Главная</a>&nbsp;/&nbsp; 
                        <?php echo get_the_category_list( '&nbsp;/&nbsp;'); ?>
                    </div>
                    <div class="single_title">
                        <h1 class="single_post_title"><?php the_title(); ?></h1>
                    </div>
                    <div class="single_author_wrp">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 50, '', get_the_author_meta( 'user_login' ), array(
                            'class' => 'single_author_avatar',
                        ) ); 
                        
                        ?>
                        &nbsp;от&nbsp;
                        <a href="#" class="single_author_nickname"><?php echo get_the_author_meta( 'user_login' ); ?></a>
                        &nbsp;&mdash;&nbsp;
                        <?php echo the_date('d.m.Y'); ?>
                        &nbsp;в&nbsp;
                        <?php echo get_the_category_list( ',&nbsp;'); ?>
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
                            <div class="single_adv">

                            </div>
                    </div>
                    <div class="single_prev_next_post_wrp">
                            <div class="prev_post_wrp">
                                <span class="prev_post_title">Предыдущий пост</span>
                                <div class="prev_post_link">
                                    <div class="prev_next_post_figure"></div>
                                    <?php previous_post_link('%link'); ?>
                                </div>
                            </div>
                            <div class="next_post_wrp">
                                <span class="next_post_title">Следующий пост</span>
                                <div class="next_post_link">
                                    <div class="prev_next_post_figure"></div>
                                    <?php next_post_link('%link'); ?>
                                </div>
                            </div>
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