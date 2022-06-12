<?php 
   
    function list_tags_with_count() {

        $output = '';
        $tags = get_tags( array('orderby' => 'count', 'order' => 'DESC', 'number' => '10') );
        $output .= '<span class="hot_tags">';

        foreach ( $tags as $tag ) {
            $output .= '<a class="hot_tag" href="' . get_tag_link($tag->term_id) . '" rel="tag">#' . $tag->name .'</a> ';
        };

        $output .= '</span>';
        return $output;
    }
    


?>

<section class="main_hot">
    <span class="hot_title">Горячее:</span> <?php echo list_tags_with_count(); ?>
</section>
