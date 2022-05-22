<?php 

/**
 * Load more script call back
 *
 * @param bool $initial_request Initial Request( non-ajax request to load initial post ).
 *
 */
function funnycoon_loadmore_ajax_handler( $initial_request = false ) {

    if ( ! $initial_request && ! check_ajax_referer( 'loadmore_post_nonce', 'ajax_nonce', false ) ) {
        wp_send_json( __('Invalid security token sent.', 'text-domain') );
        wp_die( '0', 400 );
    }

    // Check if it's an ajax call.
    $is_ajax_request = ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) &&
                        strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest';

    /**
     * 
     * Page number.
     * If get_query_var( 'paged' ) is 2 or more, its a number pagination query.
     * If $_POST['page'] has a value which means its a loadmore request, which will take precedence.
     */
    $page_no = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $page_no = ! empty( $_POST['page'] ) ? filter_var( $_POST['page'], FILTER_VALIDATE_INT ) + 1 : $page_no;

    // Default Argument.
    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 9, // Number of posts per page - default
        'paged'          => $page_no,
    ];

    $query = new WP_Query( $args );

    if ( $query->have_posts()  ):
        // Loop Posts.
        while ( $query->have_posts() ): $query->the_post();
            get_template_part( 'template-parts/main/main-posts-card');
        endwhile;

    else: 

        // Return response as zero, when no post found.
        wp_die( '0' );

    endif;
    
    wp_reset_postdata();

    /**
     * Check if its an ajax call, and not initial request
     *
     * @see https://wordpress.stackexchange.com/questions/116759/why-does-wordpress-add-0-zero-to-an-ajax-response
     */
    if ( $is_ajax_request && ! $initial_request ) {
        wp_die();
    }

}

add_action('wp_ajax_load_more', 'funnycoon_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_load_more', 'funnycoon_loadmore_ajax_handler');

/**
 * Load more script call back for review posts on main page
 *
 * @param bool $initial_request Initial Request( non-ajax request to load initial post ).
 *
 */
function funnycoon_review_loadmore_ajax_handler( $initial_request = false ) {

    if ( ! $initial_request && ! check_ajax_referer( 'review_loadmore_post_nonce', 'ajax_nonce', false ) ) {
        wp_send_json( __('Invalid security token sent.', 'text-domain') );
        wp_die( '0', 400 );
    }

    // Check if it's an ajax call.
    $is_ajax_request = ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) &&
                        strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest';

    /**
     * Page number.
     * If get_query_var( 'paged' ) is 2 or more, its a number pagination query.
     * If $_POST['page'] has a value which means its a loadmore request, which will take precedence.
     */
    $page_no = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $page_no = ! empty( $_POST['page'] ) ? filter_var( $_POST['page'], FILTER_VALIDATE_INT ) + 1 : $page_no;

    // Set tad id from theme options
    $tag_id = get_theme_mod('funnycoon_reviews_tops_reviews');

    // Default Argument.
    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'tag_id' => $tag_id,
        'orderby' => 'date',
		'order' => 'DESC',
        'posts_per_page' => 6, // Number of posts per page - default
        'paged'          => $page_no,
    ];

    $query = new WP_Query( $args );

    if ( $query->have_posts()  ):
        // Loop Posts.
        $count = 1;
		while ( $query->have_posts() ): $query->the_post();
			if ($count == 1): 
				get_template_part('template-parts/main/reviews-slider-card-1');
			else: 
				get_template_part('template-parts/main/reviews-slider-card-2');
			endif;
			$count++;
		endwhile;

    else: 

        // Return response as zero, when no post found.
        wp_die( '0' );

    endif;
    
    wp_reset_postdata();

    /**
     * Check if its an ajax call, and not initial request
     *
     * @see https://wordpress.stackexchange.com/questions/116759/why-does-wordpress-add-0-zero-to-an-ajax-response
     */
    if ( $is_ajax_request && ! $initial_request ) {
        wp_die();
    }

}

add_action('wp_ajax_review_load_more', 'funnycoon_review_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_review_load_more', 'funnycoon_review_loadmore_ajax_handler');


/**
 * Load more script call back for tops posts on main page
 *
 * @param bool $initial_request Initial Request( non-ajax request to load initial post ).
 *
 */
function funnycoon_tops_loadmore_ajax_handler( $initial_request = false ) {

    if ( ! $initial_request && ! check_ajax_referer( 'tops_loadmore_post_nonce', 'ajax_nonce', false ) ) {
        wp_send_json( __('Invalid security token sent.', 'text-domain') );
        wp_die( '0', 400 );
    }

    // Check if it's an ajax call.
    $is_ajax_request = ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) &&
                        strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest';

    /**
     * Page number.
     * If get_query_var( 'paged' ) is 2 or more, its a number pagination query.
     * If $_POST['page'] has a value which means its a loadmore request, which will take precedence.
     */
    $page_no = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $page_no = ! empty( $_POST['page'] ) ? filter_var( $_POST['page'], FILTER_VALIDATE_INT ) + 1 : $page_no;

    // Set tag id from theme options
    $tag_id = get_theme_mod('funnycoon_reviews_tops_tops');

    // Default Argument.
    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'tag_id' => $tag_id,
        'orderby' => 'date',
		'order' => 'DESC',
        'posts_per_page' => 4, // Number of posts per page - default
        'paged'          => $page_no,
    ];

    $query = new WP_Query( $args );

    if ( $query->have_posts()  ):
        // Loop Posts.
		while ( $query->have_posts() ): $query->the_post();
            get_template_part('template-parts/main/tops-slider-card');
		endwhile;

    else: 

        // Return response as zero, when no post found.
        wp_die( '0' );

    endif;
    
    wp_reset_postdata();

    /**
     * Check if its an ajax call, and not initial request
     *
     * @see https://wordpress.stackexchange.com/questions/116759/why-does-wordpress-add-0-zero-to-an-ajax-response
     */
    if ( $is_ajax_request && ! $initial_request ) {
        wp_die();
    }

}

add_action('wp_ajax_tops_load_more', 'funnycoon_tops_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_tops_load_more', 'funnycoon_tops_loadmore_ajax_handler');