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
		'posts_per_page' => 6,
        'ignore_sticky_posts' => true, // ignore sticky posts
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
        'ignore_sticky_posts' => true, // ignore sticky posts
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
        'order' => 'DESC',
		'orderby' => 'comment_count',
		'posts_per_page' => 10,
        'ignore_sticky_posts' => true, // ignore sticky posts
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

/**
 * 
 *  Socials on author page
 * 
 * @return $output string
 */

function get_socials_author_page() {

    $author_id = get_the_author_meta('ID');

    $output = '';

    foreach( user_social_info() as $key => $value ) {

        $current_social = get_the_author_meta( $key, $author_id );

        if( !empty($current_social) ) {
            switch ($key) {
                case 'pinterest': 
                    $output .= '<a target="_blank" href="https://www.pinterest.ru/' . $current_social . '"><span style="color: white;"><i class="fa-brands fa-pinterest fa-2xl"></i></span></a>';
                    break;
                case 'reddit': 
                    $output .= '<a target="_blank" href="https://www.reddit.com/user/' . $current_social . '"><span style="color: white;"><i class="fa-brands fa-reddit fa-2xl"></i></span></a>';
                    break;
                case 'youtube': 
                    $output .= '<a target="_blank" href="https://www.youtube.com/channel/' . $current_social . '"><span style="color: white;"><i class="fa-brands fa-youtube fa-2xl"></i></span></a>';
                    break;
                case 'twitch': 
                    $output .= '<a target="_blank" href="https://www.twitch.tv/' . $current_social . '"><span style="color: white;"><i class="fa-brands fa-twitch fa-2xl"></i></span></a>';
                    break;
                case 'vk': 
                    $output .= '<a target="_blank" href="https://vk.com/' . $current_social . '"><span style="color: white;"><i class="fa-brands fa-vk fa-2xl"></i></span></a>';
                    break;
                case 'url': 
                    $output .= '<a target="_blank" href="' . esc_url($current_social) . '"><span style="color: white;"><i class="fa-solid fa-globe fa-2xl"></i></span></a>';
                    break;
            }

        }

    }

    return $output;

}

/**
 * 
 * Social links in header and footer
 * You get string with link to all social links, which is add in setting menu
 * 
 * @return string
 * 
 */

function funnycoon_get_social_links( $place ) {

    if( $place === 'header' ) {
        $setting_name = 'funnycoon_social_icons_header_';
    } elseif ( $place === 'footer' ) {
        $setting_name = 'funnycoon_social_icons_footer_';
    } elseif ( $place === 'mobile' ) {
        $setting_name = 'funnycoon_social_icons_mobile_';
    }

    foreach( social_icons() as $key => $name ) {

        $setting_full_name = $setting_name . $key;
        $setting_value = get_theme_mod( $setting_full_name );

        
        if( $place === 'header' and $setting_value ) {

            printf(
                '<a href="%s" class="funnycoon_header_icons %s" target="_blank"></a>',
                $setting_value,
                $key
            );      

        } elseif ( $place === 'footer' and $setting_value ) {

            printf(
                '<a href="%s" class="funnycoon_footer_icons %s" target="_blank"></a>',
                $setting_value,
                $key
            );

        }  elseif ( $place === 'mobile' and $setting_value ) {

            printf(
                '<a href="%s" class="funnycoon_mobile_menu_icons %s-bl" target="_blank"></a>',
                $setting_value,
                $key
            );

        }  

    }

}

/**
 * 
 * Metrica code for site (in header)
 * 
 * @return string
 */

function funnycoon_get_metrica_code() {

    foreach( metrica_fields() as $metrica_field) {

        $field = get_theme_mod($metrica_field);
        
        printf($field);

    }

}

/**
 * 
 * Site Rating code for site (in header)
 * 
 * @return array
 */

function funnycoon_get_rating_code() {

    foreach( site_rating_counters() as $rating_field) {

        $field = get_theme_mod($rating_field);

        printf($field);

    }

}