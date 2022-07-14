<section class="tops_reviews">
    <div class="tops_reviews_wrp">
        <div class="reviews">
            <div class="title_and_buttons">
                <span class="title"><?php echo esc_html(get_theme_mod('funnycoon_reviews_tops_reviews_title'));?></span>
                <div class="buttons">
                    <button type="button" class="buttons_svg" data-page="0" id="reviews_button_left"><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.29 5.99995L6.83 2.45995C7.01626 2.27259 7.1208 2.01913 7.1208 1.75495C7.1208 1.49076 7.01626 1.23731 6.83 1.04995C6.73704 0.95622 6.62644 0.881826 6.50458 0.831057C6.38272 0.780288 6.25202 0.75415 6.12 0.75415C5.98799 0.75415 5.85729 0.780288 5.73543 0.831057C5.61357 0.881826 5.50297 0.95622 5.41 1.04995L1.17 5.28995C1.07628 5.38291 1.00188 5.49351 0.951114 5.61537C0.900345 5.73723 0.874207 5.86794 0.874207 5.99995C0.874207 6.13196 0.900345 6.26267 0.951114 6.38453C1.00188 6.50638 1.07628 6.61699 1.17 6.70995L5.41 10.9999C5.50344 11.0926 5.61426 11.166 5.7361 11.2157C5.85794 11.2655 5.9884 11.2907 6.12 11.2899C6.25161 11.2907 6.38207 11.2655 6.50391 11.2157C6.62575 11.166 6.73656 11.0926 6.83 10.9999C7.01626 10.8126 7.1208 10.5591 7.1208 10.2949C7.1208 10.0308 7.01626 9.77731 6.83 9.58995L3.29 5.99995Z" fill="white"/></svg></button>
                    <button type="button" class="buttons_svg" data-page="1" id="reviews_button_right"><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.83 5.28995L2.59 1.04995C2.49704 0.95622 2.38644 0.881826 2.26458 0.831057C2.14272 0.780288 2.01202 0.75415 1.88 0.75415C1.74799 0.75415 1.61729 0.780288 1.49543 0.831057C1.37357 0.881826 1.26297 0.95622 1.17 1.04995C0.983753 1.23731 0.879211 1.49076 0.879211 1.75495C0.879211 2.01913 0.983753 2.27259 1.17 2.45995L4.71 5.99995L1.17 9.53995C0.983753 9.72731 0.879211 9.98076 0.879211 10.2449C0.879211 10.5091 0.983753 10.7626 1.17 10.9499C1.26344 11.0426 1.37426 11.116 1.4961 11.1657C1.61794 11.2155 1.7484 11.2407 1.88 11.2399C2.01161 11.2407 2.14207 11.2155 2.26391 11.1657C2.38575 11.116 2.49656 11.0426 2.59 10.9499L6.83 6.70995C6.92373 6.61699 6.99813 6.50638 7.04889 6.38453C7.09966 6.26267 7.1258 6.13196 7.1258 5.99995C7.1258 5.86794 7.09966 5.73723 7.04889 5.61537C6.99813 5.49351 6.92373 5.38291 6.83 5.28995V5.28995Z" fill="white"/></svg></button>
                </div>
            </div>
            <div class="reviews_slider">
               <?php funnycoon_review_loadmore_ajax_handler( true ); ?>
            </div>
        </div>
        <div class="tops_reviews_adv_wrp">
            <div class="tops_reviews_adv">
            <?php 
                $thirdBannerCode = get_theme_mod('funnycoon_third_banner');
                printf($thirdBannerCode);
            ?>
            </div>
        </div>
        <div class="tops">
            <div class="title_and_buttons">
            <span class="title"><?php echo esc_html(get_theme_mod('funnycoon_reviews_tops_tops_title'));?></span>
                <div class="buttons">
                    <button type="button" class="buttons_svg" id="tops_button_left" data-page="0"><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.29 5.99995L6.83 2.45995C7.01626 2.27259 7.1208 2.01913 7.1208 1.75495C7.1208 1.49076 7.01626 1.23731 6.83 1.04995C6.73704 0.95622 6.62644 0.881826 6.50458 0.831057C6.38272 0.780288 6.25202 0.75415 6.12 0.75415C5.98799 0.75415 5.85729 0.780288 5.73543 0.831057C5.61357 0.881826 5.50297 0.95622 5.41 1.04995L1.17 5.28995C1.07628 5.38291 1.00188 5.49351 0.951114 5.61537C0.900345 5.73723 0.874207 5.86794 0.874207 5.99995C0.874207 6.13196 0.900345 6.26267 0.951114 6.38453C1.00188 6.50638 1.07628 6.61699 1.17 6.70995L5.41 10.9999C5.50344 11.0926 5.61426 11.166 5.7361 11.2157C5.85794 11.2655 5.9884 11.2907 6.12 11.2899C6.25161 11.2907 6.38207 11.2655 6.50391 11.2157C6.62575 11.166 6.73656 11.0926 6.83 10.9999C7.01626 10.8126 7.1208 10.5591 7.1208 10.2949C7.1208 10.0308 7.01626 9.77731 6.83 9.58995L3.29 5.99995Z" fill="white"/></svg></button>
                    <button type="button" class="buttons_svg" id="tops_button_right" data-page="1"><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.83 5.28995L2.59 1.04995C2.49704 0.95622 2.38644 0.881826 2.26458 0.831057C2.14272 0.780288 2.01202 0.75415 1.88 0.75415C1.74799 0.75415 1.61729 0.780288 1.49543 0.831057C1.37357 0.881826 1.26297 0.95622 1.17 1.04995C0.983753 1.23731 0.879211 1.49076 0.879211 1.75495C0.879211 2.01913 0.983753 2.27259 1.17 2.45995L4.71 5.99995L1.17 9.53995C0.983753 9.72731 0.879211 9.98076 0.879211 10.2449C0.879211 10.5091 0.983753 10.7626 1.17 10.9499C1.26344 11.0426 1.37426 11.116 1.4961 11.1657C1.61794 11.2155 1.7484 11.2407 1.88 11.2399C2.01161 11.2407 2.14207 11.2155 2.26391 11.1657C2.38575 11.116 2.49656 11.0426 2.59 10.9499L6.83 6.70995C6.92373 6.61699 6.99813 6.50638 7.04889 6.38453C7.09966 6.26267 7.1258 6.13196 7.1258 5.99995C7.1258 5.86794 7.09966 5.73723 7.04889 5.61537C6.99813 5.49351 6.92373 5.38291 6.83 5.28995V5.28995Z" fill="white"/></svg></button>
                </div>
            </div>
            <div class="tops_slider">
            <?php funnycoon_tops_loadmore_ajax_handler( true ); ?>
            </div>
        </div>
    </div>
    <div class="tops_sidebar">
        <div class="tops_sidebar_title">
            <span class="title">Самое обсуждаемое</span>
        </div>
        <div class="tops_posts_wrp">
            <?php top_comments_posts_query(); ?>
        </div>
    </div>
</section>