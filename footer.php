<footer class="footer">
    <div class="container_footer_1">
        <div class="footer_1_left">
           <!-- Top100 (Kraken) Widget -->
            <span id="top100_widget"></span>
            <!-- END Top100 (Kraken) Widget -->

            <!-- Top100 (Kraken) Counter -->
            <script>
                (function (w, d, c) {
                (w[c] = w[c] || []).push(function() {
                    var options = {
                        project: 7600636,
                        element: 'top100_widget',
                    };
                    try {
                        w.top100Counter = new top100(options);
                    } catch(e) { }
                });
                var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src =
                (d.location.protocol == "https:" ? "https:" : "http:") +
                "//st.top100.ru/top100/top100.js";

                if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
            })(window, document, "_top100q");
            </script>
            <noscript>
            <img src="//counter.rambler.ru/top100.cnt?pid=7600636" alt="Топ-100" />
            </noscript>
            <!-- END Top100 (Kraken) Counter -->

            <!-- Rating Mail.ru counter -->
            <script type="text/javascript">
            var _tmr = window._tmr || (window._tmr = []);
            _tmr.push({id: "3246588", type: "pageView", start: (new Date()).getTime()});
            (function (d, w, id) {
            if (d.getElementById(id)) return;
            var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
            ts.src = "https://top-fwz1.mail.ru/js/code.js";
            var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
            if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
            })(document, window, "topmailru-code");
            </script><noscript><div>
            <img src="https://top-fwz1.mail.ru/counter?id=3246588;js=na" style="border:0;position:absolute;left:-9999px;" alt="Top.Mail.Ru" />
            </div></noscript>
            <!-- //Rating Mail.ru counter -->
            <!-- Rating Mail.ru logo -->
            <a href="https://top.mail.ru/jump?from=3246588" target="_blank">
            <img src="https://top-fwz1.mail.ru/counter?id=3246588;t=581;l=1" style="border:0;" height="40" width="88" alt="Top.Mail.Ru" /></a>
            <!-- //Rating Mail.ru logo -->

            <!--LiveInternet counter--><a href="https://www.liveinternet.ru/click"
            target="_blank"><img id="licntA492" width="88" height="15" style="border:0" 
            title="LiveInternet: показано число посетителей за сегодня"
            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7"
            alt=""/></a><script>(function(d,s){d.getElementById("licntA492").src=
            "https://counter.yadro.ru/hit?t23.6;r"+escape(d.referrer)+
            ((typeof(s)=="undefined")?"":";s"+s.width+"*"+s.height+"*"+
            (s.colorDepth?s.colorDepth:s.pixelDepth))+";u"+escape(d.URL)+
            ";h"+escape(d.title.substring(0,150))+";"+Math.random()})
            (document,screen)</script><!--/LiveInternet-->

        </div>
        <div class="footer_1_right">
            <?php echo funnycoon_get_social_links('footer'); ?>
        </div>
    </div>
    <div class="container_footer_2">
        <?php wp_nav_menu( array(
                    'theme_location' => 'footer_menu',
                    'container' => 'div',
                    'container_class' => 'footer_2_left',
                    'menu_class' => 'nav_menu',
                    'walker' => new Funnycoon_Main_Menu, 
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
<?php get_template_part('/template-parts/mobile/mobile-menu'); ?>

<?php wp_footer(); ?>

</body>
</html>