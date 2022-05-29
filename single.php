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

                <?php the_content();
            endwhile;
        
            ?>
                </div>
            </div>
            <div class="single_sidebar">123</div>
        </div>
    </div>
</main>

<?php get_footer(); ?>