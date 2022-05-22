<?php 

if ( empty( get_the_ID() ) ) {
    return null;
}

$post_permalink = get_the_permalink();
$post_title = get_the_title();

?>

<div class="mps_post_card">
    <a href="<?php echo esc_url( $post_permalink ); ?>" class="mps_post_card_title"><?php echo esc_html( $post_title ); ?></a>
    <a href="<?php echo esc_url( $post_permalink ); ?>" class="mps_post_card_info">
        <img class="mps_post_card_img" src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>" alt="">
        <span class="mps_post_card_desc"><?php echo esc_html(the_excerpt_max_charlength(140)); ?></span>
    </a>

</div>