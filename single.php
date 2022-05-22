<?php get_header(); ?>

<main class="funnycoon_main">
    <div class="funnycoon_main_wrapper">
        <?php 
        
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        
        ?>
    </div>
</main>

<?php get_footer(); ?>