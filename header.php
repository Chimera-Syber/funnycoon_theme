<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Yandex.RTB -->
	<script>window.yaContextCb=window.yaContextCb||[]</script>
	<script src="https://yandex.ru/ads/system/context.js" async></script>

     <!-- Yandex.Metrika counter -->
     <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(88137850, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/88137850" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9NCZB6507L"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-9NCZB6507L');
    </script>

    <?php wp_head(); 
    if ( is_singular() && get_option( 'thread_comments' ) )
	    wp_enqueue_script( 'comment-reply' ); 
    ?>
</head>
<body class="body" id="body">
<?php get_template_part('header-menu'); ?>
    
