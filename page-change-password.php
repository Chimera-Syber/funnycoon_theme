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
                    <a href="<?php echo home_url() . '/change-email'; ?>" class="profile_change_email_link">Редактировать пароль</a>
                    <a href="<?php echo home_url() . '/change-password'; ?>" class="profile_change_password_link">Редактировать пароль</a>
                </div>
            </div>
            <div class="profile_edit_section">
                <?php $current_user = wp_get_current_user(); ?>

                <form class="profile_form" method="post" id="adduser" action="<?php the_permalink(); ?>">
                    <span class="profile_section_title">Редактировать пароль</span>
                    <div class="profile_info">
                        <div class="profile_info_item">
                            <label class="profile_label" for="pass">Старый пароль</label>
                            <input class="profile_input" name="pass" type="password" id="pass" placeholder="Введите старый пароль"/>
                            <label class="profile_label" for="newpass1">Новый пароль</label>
                            <input class="profile_input" name="newpass1" type="password" id="newpass1" placeholder="Введите новый пароль" />
                            <label class="profile_label" for="newpass2">Повторите новый пароль</label>
                            <input class="profile_input" name="newpass2" type="password" id="newpass2" placeholder="Введите новый пароль" />
                            <?php echo update_profile_messages(); ?>
                        </div>
                    </div>
                    <div class="profile_submit_wrp">
                        <input name="changepassword" type="submit" id="changepassword" class="profile_submit_button" value="Редактировать пароль" />
                        <?php wp_nonce_field( 'change-password'); ?>
                        <input name="funnycoonpot" value="" type="hidden" />
                        <input name="action" type="hidden" id="action" value="change-password" />
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