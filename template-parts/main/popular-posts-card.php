<?php 

if ( empty( get_the_ID() ) ) {
    return null;
}

$post_permalink = get_the_permalink();
$post_title = get_the_title();

?>

<div class="mps_post_card cards_animation">
    <a href="<?php echo esc_url( $post_permalink ); ?>" class="mps_post_card_title"><?php echo esc_html( $post_title ); ?></a>
    <a href="<?php echo esc_url( $post_permalink ); ?>" class="mps_post_card_info">
        <?php
            echo funnycoon_get_thumbnail(get_post_thumbnail_id(), $post, 'funnycoon_popular_post_card', 'mps_post_card_img');
        ?>
        <span class="mps_post_card_desc"><?php echo esc_html(the_excerpt_max_charlength(140)); ?></span>
    </a>

</div>