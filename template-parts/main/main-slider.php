<?php 

    // Get options 
    $options = funnycoon_get_main_slider_options();
    $posts = [];

    // Get Posts ID from options
    foreach($options as $value) {
        $posts[] = intval(get_theme_mod($value));
    }
       
?>

<section class="main_slider">
    <?php foreach($posts as $key => $post) { 
        
        // Get categoty title
        $categories = get_the_category($post);
        $category = $categories[0]->name;   
        $category_link = get_category_link( $categories[0]->term_id ); 

        // Get human post time
        $time = human_time_diff(get_post_time('U'), current_time('timestamp')) . " " . __('назад');
               
    ?>
        
        <div class="slide">
            <div class="slider_post_info_wr">
                <div class="slide_post_category_wr">
                    <a href="<?php echo $category_link; ?>" class="slide_post_category"><?php echo $category; ?></a>
                </div>
                <a href="<?php echo get_permalink($post) ?>" class="slider_link"></a>
                <span class="slider_post_title"><?php echo get_the_title($post); ?></span>
                <span class="slider_post_info">
                    <?php 
                    echo $time; 
                    if ($key == 0) {
                        echo " | ";
                        comments_number('0 комментариев', '1 комментарий', '% коментариев');
                    } ?>
                </span>
            </div>
            <div class="slider_gradient"></div>
            <?php
                echo funnycoon_get_thumbnail(get_post_thumbnail_id(), $post, 'funnycoon_main_slider', 'slide-image');
            ?>
        </div>

   <?php } ?>
    
</section>