<?php get_header(); ?>

<main class="funnycoon_main">
    <div class="funnycoon_main_wrapper">
        <?php get_template_part('/template-parts/content/content-main-slider'); ?>

        <?php get_template_part('/template-parts/content/content-main-hot'); ?>

        <?php get_template_part('/template-parts/content/content-main-posts'); ?>

        <?php get_template_part('/template-parts/content/content-main-primary-posts'); ?>
    </div>
</main>

<?php get_footer(); ?>