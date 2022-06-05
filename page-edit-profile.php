<?php 

    check_page_security();

    require_once('inc/funnycoon-update-profile.php');


get_header(); ?>

<main class="funnycoon_main">
    <div class="funnycoon_main_wrapper">
        <div class="profile_edit_page_wrp">
            <div class="profile_edit_sidebar">
                Avatar
            </div>
            <div class="profile_edit_section">
                <?php $current_user = wp_get_current_user(); ?>

                <div class="profile_form">
                    <span class="profile_section_title">Аватар</span>
                    <?php echo do_shortcode('[user_profile_avatar_upload]'); ?>
                </div>

                <form class="profile_form" method="post" id="adduser" action="<?php the_permalink(); ?>">
                    <span class="profile_section_title">Профиль</span>
                    <div class="profile_info">
                        <div class="profile_info_item">
                            <label class="profile_label" for="first-name">Имя</label>
                            <input class="profile_input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>"/>
                        </div>
                        <div class="profile_info_item">
                            <label class="profile_label" for="last-name">Фамилия</label>
                            <input class="profile_input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>"/>
                        </div>
                    </div>
                    <span class="profile_section_title">Контактная информация</span>
                    <div class="profile_info">
                        <?php 

                            foreach( user_social_info() as $key => $value ) {
                                
                                echo '<div class="profile_info_item">
                                <label class="profile_label" for="' . $key .  '">' . $value . '</label>
                                <input class="profile_input" name="' . $key . '" type="text" id="' . $key . '" value="' . get_the_author_meta( $key, $current_user->ID ) . '"/></div>';

                            }

                        ?>
                    </div>
                    <span class="profile_section_title">О себе</span>
                    <div class="profile_about_author">
                        <label for="description" class="profile_label">Биография</label>
                        <?php
                        wp_editor( get_the_author_meta( 'description', $current_user->ID ), 'description', array(
                            'textarea_name' 	=> 'description',
                            'drag_drop_upload' 	=> false,
                            'media_buttons' 	=> false,
                            'textarea_rows' 	=> 10,
                            'teeny' 			=> true,
                            'quicktags' 		=> false
                        ));
                        ?>
                    </div>
                    <div class="profile_submit_wrp">
                        <input name="updateuser" type="submit" id="updateuser" class="profile_submit_button" value="Редактировать данные аккаунта" />
                        <?php wp_nonce_field( 'update-user'); ?>
                        <input name="funnycoonpot" value="" type="hidden" />
                        <input name="action" type="hidden" id="action" value="update-user" />
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