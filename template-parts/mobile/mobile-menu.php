<?php ?>

<div id="mobileMenu" class="mobileMenu"> <!-- class="popup" -->
    <div class="mobile_memu_wrp">
        <div class="menu_wrp">
            <?php wp_nav_menu( array(
                'theme_location' => 'mobile_menu',
                'container' => 'nav',
                'container_class' => 'mobile_nav_menu_container',
                'menu_class' => 'mobile_nav_menu_class',
                'menu_id' => 'mobile_nav_menu',
                'walker' => new Funnycoon_Mobile_Menu,
                'fallback_cb' => '',
            ) ); ?>
            <div class="popup_forget_ps_reg">
                <a href="#register" id="registerBtn" class="register_link_forget popup-link">Зарегистрироваться</a>
                <a href="#login" id="loginBtn2" class="login_link popup-link">Авторизоваться</a>
            </div>
        </div>
        <div class="mobile_sidebar">
            <span class="menu_close">X</span>
        </div>
    </div>
</div>