<?php get_header(); ?>

<main class="funnycoon_main">
    <div class="funnycoon_main_wrapper">
        <?php get_template_part('/template-parts/main/main-slider'); ?>

        <?php get_template_part('/template-parts/main/hot'); ?>

        <?php get_template_part('/template-parts/main/main-posts'); ?>

        <?php get_template_part('/template-parts/main/primary-posts'); ?>

        <?php get_template_part('/template-parts/main/tops-review'); ?>
    </div>
</main>

<?php get_footer(); ?>