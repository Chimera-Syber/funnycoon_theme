<?php ?>

<div id="mobileMenu"> <!-- class="popup" -->
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
        </div>
        <div class="mobile_sidebar">
            <span class="menu_close">X</span>
        </div>
    </div>
</div>