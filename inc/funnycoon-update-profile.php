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
    wp_redirect( get_permalink() . '?user_updated=true' );
    exit;
}

/**
 * For change password page (page-change-email.php)
 */

if( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['action'] ) && $_POST['action'] == 'change-email' ) {

    $current_user = wp_get_current_user();

    // Check nonce first to see if this is a legit request 

    if( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce( $_POST['_wpnonce'], 'change-email' ) ) {
        wp_redirect( get_permalink() . '?validation=unknown');
        exit;
    }

    // Check funnycoonpot for automated requests 

    if( !empty( $_POST['funnycoonpot'] ) ) {
        wp_redirect( get_permalink() . '?validation=unknown' );
        exit;
    }

    // Check email

    if( !empty( $_POST['email'] ) ) {

        $posted_email = esc_attr( $_POST['email'] );

        if( !is_email( $posted_email ) ) {
            wp_redirect( get_permalink() . '?validation=emailnotvalid' );
            exit;
        } elseif( email_exists( $posted_email ) && ( email_exists( $posted_email ) != $current_user->ID ) ) {
            wp_redirect( get_permalink() . '?validation=emailexists' );
            exit;
        } else {

            if( !empty( $_POST['pass'] ) ) {

                $password = $_POST['pass'];
                $hash = $current_user->data->user_pass;

                if( wp_check_password( $password, $hash ) ) {
                    wp_update_user( array( 'ID' => $current_user->ID, 'user_email' => $posted_email ) );
                    send_confirmation_on_profile_email();
                } else {
                    wp_redirect( get_permalink() . '?validation=password' );
                    exit;
                }

            }
        }
    }


     // Let plugins hook in, like ACF which is handling the profile picture all by itself.

     do_action( 'edit_user_profile_update', $current_user->ID );

     // We got here, assuming everything went OK 
     wp_redirect( get_permalink() . '?email_updated=true' );
     exit;
}

/**
 * Errors to frontend
 */

 function change_email_messages() {

    if( isset($_GET['user_updated']) ) {

        if( $_GET['user_updated'] == 'true' ) {
            return '<span class="custom_pages_messages">Информация обновлена</span>';
        }
    }

    if( isset($_GET['email_updated']) ) {

        if( $_GET['email_updated'] == 'true' ) {
            return '<span class="custom_pages_messages">Ваша почта обновлена</span>';
        }
    }

    if( isset($_GET['validation']) ) {

        if( $_GET['validation'] == 'unknown' ) {
            return '<span class="custom_pages_messages">Неизвестная ошибка</span>';
        }

        if( $_GET['validation'] == 'emailnotvalid' ) {
            return '<span class="custom_pages_messages">Введите корректный email</span>';
        }

        if( $_GET['validation'] == 'emailexists' ) {
            return '<span class="custom_pages_messages">Данный email уже используется</span>';
        }

        if( $_GET['validation'] == 'password')  {
            return '<span class="custom_pages_messages">Неверный пароль</span>';
        }


    }

 }