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
				'year' => date( 'Y' ),
				'monthnum' => date( 'n' ),
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
          	get_template_part( 'template-parts/content/content-main-posts-popular-posts-card');
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
			get_template_part('template-parts/content/content-main-primary-posts-card');
		endwhile;
	else: 

		echo 'Постов нет';

	endif;

	wp_reset_postdata();

}