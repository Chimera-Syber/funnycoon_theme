<?php 

    check_page_security();

    require_once('inc/funnycoon-update-profile.php');

    $current_user_profile_page = wp_get_current_user();
    $avatar_img_profile_page = get_avatar( $current_user_profile_page->user_email, 200, '', $current_user_profile_page->user_login, array(
        'class' => 'profile_page_avatar',
    ));


get_header(); ?>

<main class="funnycoon_main">
    <div class="funnycoon_main_wrapper">
        <div class="profile_edit_page_wrp">
            <div class="profile_edit_sidebar">
                <div class="profile_page_avatar_wrp">
                    <?php echo $avatar_img_profile_page; ?>
                    <span class="profile_page_nickname"><?php echo $current_user_profile_page->user_login; ?></span>
                    <a href="<?php echo home_url() . '/change-email'; ?>" class="profile_change_email_link">Редактировать почту</a>
                </div>
            </div>
            <div class="profile_edit_section">
                <?php $current_user = wp_get_current_user(); ?>

                <form class="profile_form" method="post" id="adduser" action="<?php the_permalink(); ?>">
                    <span class="profile_section_title">Редактировать Email</span>
                    <div class="profile_info">
                        <div class="profile_info_item">
                            <label class="profile_label" for="email">Email</label>
                            <input class="profile_input" name="email" type="email" id="email" placeholder="Введите новый Email"/>
                            <label class="profile_label" for="pass">Пароль</label>
                            <input class="profile_input" name="pass" type="password" id="pass" placeholder="Введите пароль" />
                            <?php echo change_email_messages(); ?>
                        </div>
                    </div>
                    <div class="profile_submit_wrp">
                        <input name="changeemail" type="submit" id="changeemail" class="profile_submit_button" value="Редактировать email" />
                        <?php wp_nonce_field( 'change-email'); ?>
                        <input name="funnycoonpot" value="" type="hidden" />
                        <input name="action" type="hidden" id="action" value="change-email" />
                    </div>
                </form>
            </div>
        </div>
        <div class="main_posts_adv_wrp">
            <div class="main_posts_adv">

            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>