<?php 

function ajax_auth_init() {
    wp_register_script('validate-script', get_template_directory_uri() . '/assets/js/jquery/jquery.validate.min.js', array('jquery'), false, true );
    wp_enqueue_script('validate-script');

    wp_register_script('ajax-auth-script', get_template_directory_uri() . '/assets/js/funnycoon-ajax-auth-script.min.js', array('jquery'), filemtime( get_theme_file_path('/assets/js/funnycoon-ajax-auth-script.min.js') ), true);
    wp_enqueue_script('ajax-auth-script');

    wp_localize_script('ajax-auth-script', 'ajax_auth_object', array(
        'ajaxurl'           => admin_url('admin-ajax.php'),
        'redirecturl'       => home_url(),
        'loadingmessage'    => __('Проверка...'),
    ));

    add_action('wp_ajax_nopriv_ajaxlogin', 'ajax_login');
    add_action('wp_ajax_nopriv_ajaxregister', 'ajax_register');
    add_action('wp_ajax_nopriv_ajaxforgotpassword', 'ajax_forgotpassword');
}

if (!is_user_logged_in()) {
   add_action('init', 'ajax_auth_init');
}


function ajax_login() {

    // First check the nonce, if it fails the function will break
    check_ajax_referer('ajax-login-nonce', 'security');

    // Nonce is checked, get the POST data and sign user on
  	// Call auth_user_login
    auth_user_login($_POST['username'], $_POST['password'], $_POST['remember'], 'Авторизация');

    die();
}

/**
 * @param POST $user_login username
 * @param POST $password password
 * @param POST $remember remember me state
 * @param OPTION $login option for Wordpress
 * 
 * @return void
 * Function for login user
 * 
 */
function auth_user_login($user_login, $password, $remember, $login) {

    $info = array();
    $info['user_login'] = $user_login;
    $info['user_password'] = $password;
    $info['remember'] = $remember;

    $user_signon = wp_signon($info); 
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Неверный логин или пароль')));
    } else {
        wp_set_current_user($user_signon->ID);
        echo json_encode(array('loggedin'=>true, 'message'=>__($login.' прошла успешно, перенаправление...')));
    }

    die();
}

function ajax_register(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-register-nonce', 'security' );

    $info = array();
    $info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = sanitize_user($_POST['username']);
    $info['user_pass'] = sanitize_text_field($_POST['password']);
    $info['user_email'] = sanitize_email($_POST['email']);

    // Register the user
    $user_register = wp_insert_user( $info );
    wp_new_user_notification($user_register, null, 'both');
    if ( is_wp_error($user_register) ) {
        $error = $user_register->get_error_codes();
        echo array_keys($error);
        if(in_array('empty_user_login', $error))
            echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('empty_user_login'))));
        elseif( in_array('existing_user_login', $error))
            echo json_encode(array('loggedin'=>false, 'message'=>__('This username is already registered. ')));
        elseif( in_array('existing_user_email', $error))
            echo json_encode(array('loggedin'=>false, 'message'=>__('This email address is already registered. ')));
    } else {
        auth_user_login($info['nickname'], $info['user_pass'], false, 'Registration');
    }

    die();

}

function ajax_forgotpassword() {

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-forgot-nonce', 'security' );

    global $wpdb;

    $account = $_POST['user_login'];

    if( empty( $account ) ) {
        $error = 'Введите имя пользователя или email.';
    } else {
        if(is_email( $account )) {
            if( email_exists($account) )
                $get_by = 'email';
            else 
                $error = 'Такого пользователя с таким email не зарегистрировано';
        }
        else if (validate_username( $account )) {
            if( username_exists( $account ) ) 
                $get_by = 'login';
            else
                $error = 'Такого пользователя с таким именем не зарегистрировано';
        }
        else 
            $error = 'Неверный email или имя пользователя';
    }

    if(empty ( $error )) {
        // Generate new password
        // Example with params
        // $random_password = wp_generate_password( 12, false);
        $random_password = wp_generate_password();

        // Get user data by field and data, fields are id, slug, email and login
        $user = get_user_by( $get_by, $account );

        $update_user = wp_update_user( array( 'ID' => $user->ID, 'user_pass' => $random_password ) );

        // If update_user return true, send user an email containing the new password
        if ( $update_user ) {

            $from = 'info@funnycoon.ru'; // Set email 

            if(!(isset($from) && is_email($from))) {
                $sitename = strtolower( $_SERVER['SERVER_NAME'] );
                if ( substr( $sitename, 0, 4 ) == 'www. ') {
                    $sitename = substr( $sitename, 4);
                }
                $from = 'admin@'.$sitename;
            }

            $to = $user->user_email;
            $subject = 'Ваш новый пароль';
            $sender = 'From: '.get_option('name ').' <'.$from.'>' . "\r\n";

            $message = 'Ваш новый пароль: '.$random_password;

            $headers[]= 'MIME-Version: 1.0' . "\r\n";
            $headers[]= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers[]= 'X-Mailer: PHP \r\n';
            $headers[]= $sender;

            $mail = wp_mail( $to, $subject, $message, $headers );
            if ( $mail )
                $success = 'Проверьте вашу почту. На нее должно придти письмо с новым паролем';
            else 
                $error = 'Система не смогла отправить на вашу почту новый пароль';
        } else {
            $error = 'Что-то пошло не так при обновлении вашего профиля';
        }
    }

    if( ! empty( $error ) )
        echo json_encode(array('loggedin'=>false, 'message'=>__($error)));
    
    if( ! empty( $success ) ) 
        echo json_encode(array('loggedin'=>false, 'message'=>__($success)));

    die();
}