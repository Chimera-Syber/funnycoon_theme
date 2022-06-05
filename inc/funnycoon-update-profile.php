<?php 

if( !is_user_logged_in() ) {
    wp_redirect( home_url() );
    exit;
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['action'] )  && $_POST['action'] == 'update-user' ) {

    $current_user = wp_get_current_user();

    // Check nonce first to see if this is a legit request 

    if( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce( $_POST['_wpnonce'], 'update-user' ) ) {
        wp_redirect( get_permalink() . '?validation=unknown');
        exit;
    }

    // Check funnycoonpot for automated requests 

    if( !empty( $_POST['funnycoonpot'] ) ) {
        wp_redirect( get_permalink() . '?validation=unknown' );
        exit;
    }

    if( !empty( $_POST['first-name'] ) ) {
        $display_name = esc_attr( $_POST['first-name'] );
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    }

    if( !empty( $_POST['last-name'] ) ) {
        $display_name = esc_attr( $_POST['last-name'] );
        update_user_meta( $current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    }

    foreach( user_social_info() as $key => $value ) {
        if ( !empty( $_POST[$key] ) ) {
            $display_item = esc_attr( $_POST[$key] );
            update_user_meta( $current_user->ID, $key, esc_attr( $_POST[$key] ) );
        } else {
            update_user_meta( $current_user->ID, $key, '');
        }
    }

    if( !empty( $_POST['description'] ) ) {
        $display_name = esc_attr( $_POST['description'] );
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
    } else {
        update_user_meta( $current_user->ID, 'description', '');
    }

    // Let plugins hook in, like ACF which is handling the profile picture all by itself.

    do_action( 'edit_user_profile_update', $current_user->ID );

    // We got here, assuming everything went OK 
    wp_redirect( get_permalink() . '?updated=true' );
    exit;
}