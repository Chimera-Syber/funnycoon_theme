<?php 

/**
 * Custom max chars in excerpt
 * 
 * @param integer $charLenght max lenght (number of symbols) in excerpt
 * @return string
 */

 function the_excerpt_max_charlength( $charlength ){
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
};

/**
 * WP_Query for popular posts in main posts section
 * 
 * 
 * @example - current week
 * 			'date_query' => [
 * 				[
 * 					'year' => date( 'Y' );
 * 					'week' => date( 'W' );
 * 				]
 * 			],
 * @example - current month
 * 			'date_query' => [
 *			[
 *				'year' => date( 'Y' ),
 *				'monthnum' => date( 'n' ),
 *			],
 *		],
 * @return query posts
 */

function popular_posts_query() {

	$args = [
		'post_type' => 'post',
		'meta_query' => [
			[
				'key' => 'post_view',
				'compare' => 'EXISTS',
			],
		],
		'date_query' => [
			[
				'after' => date( 'Y-m-d', strtotime('-30 days') ),
			],
		],
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		'posts_per_page' => 5,
	];

	$query = new WP_Query( $args );

    if ( $query->have_posts()  ):
        // Loop Posts.
        while ( $query->have_posts() ): $query->the_post();
          	get_template_part( 'template-parts/main/popular-posts-card');
        endwhile;

    else: 

       echo 'Постов нет';


    endif;
    
    wp_reset_postdata();

} 

/**
 * WP_Query for primary posts
 * 
 * @param integer $tag_ID - tag ID
 * 
 */
function primary_post_query( $tag_id ) {

	$args = [
		'post_type' => 'post',
		'tag_id' => $tag_id,
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 5,
	];

	$query = new WP_Query( $args );

	if ( $query->have_posts() ):
		// Loop Posts
		while ( $query->have_posts() ): $query->the_post();
			get_template_part('template-parts/main/primary-posts-card');
		endwhile;
	else: 

		echo 'Постов нет';

	endif;

	wp_reset_postdata();

}

/**
 * WP_Query for top commented posts in main posts section
 * 
 * 
 * @example - current week
 * 			'date_query' => [
 * 				[
 * 					'year' => date( 'Y' );
 * 					'week' => date( 'W' );
 * 				]
 * 			],
 * @example - current month
 * 			'date_query' => [
 *			[
 *				'year' => date( 'Y' ),
 *				'monthnum' => date( 'n' ),
 *			],
 *		],
 * @return query posts
 */

function top_comments_posts_query() {

	$args = [
		'post_type' => 'post',
		'date_query' => [
			[
				'after' => date( 'Y-m-d', strtotime('-30 days') ),
			],
		],
		'orderby' => 'comment_count ',
		'order' => 'DESC',
		'posts_per_page' => 10,
	];

	$query = new WP_Query( $args );

    if ( $query->have_posts()  ):
        // Loop Posts.
        while ( $query->have_posts() ): $query->the_post();
          	get_template_part( 'template-parts/main/tops-review-sidebar-card');
        endwhile;

    else: 

       echo 'Постов нет';


    endif;
    
    wp_reset_postdata();

} 

function funnycoon_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('&laquo;') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('&raquo;') );
 
    echo '</ul></div>' . "\n";
 
}