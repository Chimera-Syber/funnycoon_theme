<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
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
                    <a href="#login" id="loginBtn" class="login_info">
                        <i class="funnycoon_header_icons login"></i>
                        Войти
                    </a>
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

    
