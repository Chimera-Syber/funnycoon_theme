<?php 

    $current_user = wp_get_current_user();
    $avatar_img = get_avatar( $current_user->user_email, 32, '', $current_user->user_login, array(
        'class' => 'profile_avatar',
    ));
    
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); 
    if ( is_singular() && get_option( 'thread_comments' ) )
	    wp_enqueue_script( 'comment-reply' ); 
    ?>
</head>
<body class="body" id="body">
    <header class="header lock_padding">
        <div class="container_header_1">
            <div class="header_1_wrapper">
                <div class="header_1_social">
                    <a href="#" class="funnycoon_header_icons telegram" target="_blank"></a>
                    <a href="#" class="funnycoon_header_icons vk" target="_blank"></a>
                </div>
                <div class="logo">
                    <a class="logo_link" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
                </div>
                <div class="header_1_login_search">
                    <a href="#" class="funnycoon_header_icons search" target="_blank"></a>
                    <?php if (is_user_logged_in()) { ?>
                        <div class="profile_info">
                            <a href="#" class="profile_wrp">
                                <?php echo $avatar_img; ?>
                                <span class="profile_nickname"><?php echo $current_user->user_login; ?></span>
                                <svg width="12" height="8" class="profile_arrow" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.9997 1.17C10.8123 0.983753 10.5589 0.879211 10.2947 0.879211C10.0305 0.879211 9.77707 0.983753 9.5897 1.17L5.9997 4.71L2.4597 1.17C2.27234 0.983753 2.01889 0.879211 1.7547 0.879211C1.49052 0.879211 1.23707 0.983753 1.0497 1.17C0.955976 1.26297 0.881582 1.37357 0.830813 1.49543C0.780044 1.61729 0.753906 1.74799 0.753906 1.88C0.753906 2.01202 0.780044 2.14272 0.830813 2.26458C0.881582 2.38644 0.955976 2.49704 1.0497 2.59L5.2897 6.83C5.38267 6.92373 5.49327 6.99813 5.61513 7.04889C5.73699 7.09966 5.86769 7.1258 5.9997 7.1258C6.13172 7.1258 6.26242 7.09966 6.38428 7.04889C6.50614 6.99813 6.61674 6.92373 6.7097 6.83L10.9997 2.59C11.0934 2.49704 11.1678 2.38644 11.2186 2.26458C11.2694 2.14272 11.2955 2.01202 11.2955 1.88C11.2955 1.74799 11.2694 1.61729 11.2186 1.49543C11.1678 1.37357 11.0934 1.26297 10.9997 1.17Z" fill="#717171"/></svg>
                            </a>
                            <div class="profile_menu">
                                <a href="<?php echo home_url() . '/edit-profile'; ?>" class="profile_menu_link">Мои настройки</a>
                                <a href="<?php echo wp_logout_url( home_url() ); ?>" class="profile_menu_link">Выйти</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <a href="#login" id="loginBtn" class="login_info popup-link">
                            <i class="funnycoon_header_icons login"></i>
                            Войти
                        </a>
                    <?php } ?>
                </div>
            </div>
           
        </div>
        <div class="container_header_2">
            <div class="header_2_wrapper">
                <?php wp_nav_menu( array(
                    'theme_location' => 'header_menu',
                    'container' => 'nav',
                    'container_class' => 'header_2_nav_menu',
                    'menu_class' => 'nav_menu',
                    'menu_id' => 'nav_menu',
                    'walker' => new Funnycoon_Menu, 
                ) ); ?>
            </div>
        </div>
    </header>

    
