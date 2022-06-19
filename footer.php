<footer class="footer">
    <div class="container_footer_1">
        <div class="footer_1_left">
            <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/test/rambler.png'; ?>"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/test/mailru.png'; ?>"></a>
        </div>
        <div class="footer_1_right">
            <a href="https://t.me/funnycoon"><img src="<?php echo get_template_directory_uri() . '/assets/img/icons/bottom-telegram.svg'; ?>"></a>
            <a href="https://vk.com/funny_coon"><img src="<?php echo get_template_directory_uri() . '/assets/img/icons/bottom-vk.svg'; ?>"></a>
            <a href="https://trovo.live/Funnycoon"><img src="<?php echo get_template_directory_uri() . '/assets/img/icons/bottom-trovo.svg'; ?>"></a>
        </div>
    </div>
    <div class="container_footer_2">
        <?php wp_nav_menu( array(
                    'theme_location' => 'footer_menu',
                    'container' => 'div',
                    'container_class' => 'footer_2_left',
                    'menu_class' => 'nav_menu',
                    'walker' => new Funnycoon_Menu, 
                    'fallback_cb' => '',
        ) ); ?>
        <div class="footer_2_right">
            <span class="rars">18+</span>
            <div class="footer_2_copyright">
                <span class="copyright">&copy; <?php echo date_i18n ('Y'); ?> FUNNYCOON.RU</span>
                <span class="copyright_text">Использование материалов сайта без согласования с администрацией запрещено</span>
            </div>
        </div>
    </div>
</footer>
<?php get_template_part('/template-parts/account/login-popups'); ?>

<?php wp_footer(); ?>

</body>
</html>