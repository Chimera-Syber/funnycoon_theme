<?php if (!is_user_logged_in()) { ?>
<div id="login" class="popup">
    <div class="popup_body">
        <div class="popup_content">
           <a href="" id="popup_close" class="popup_close close_popup"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.40994 7L12.7099 2.71C12.8982 2.5217 13.004 2.2663 13.004 2C13.004 1.7337 12.8982 1.47831 12.7099 1.29C12.5216 1.1017 12.2662 0.995911 11.9999 0.995911C11.7336 0.995911 11.4782 1.1017 11.2899 1.29L6.99994 5.59L2.70994 1.29C2.52164 1.1017 2.26624 0.995911 1.99994 0.995911C1.73364 0.995911 1.47824 1.1017 1.28994 1.29C1.10164 1.47831 0.995847 1.7337 0.995847 2C0.995847 2.2663 1.10164 2.5217 1.28994 2.71L5.58994 7L1.28994 11.29C1.19621 11.383 1.12182 11.4936 1.07105 11.6154C1.02028 11.7373 0.994141 11.868 0.994141 12C0.994141 12.132 1.02028 12.2627 1.07105 12.3846C1.12182 12.5064 1.19621 12.617 1.28994 12.71C1.3829 12.8037 1.4935 12.8781 1.61536 12.9289C1.73722 12.9797 1.86793 13.0058 1.99994 13.0058C2.13195 13.0058 2.26266 12.9797 2.38452 12.9289C2.50638 12.8781 2.61698 12.8037 2.70994 12.71L6.99994 8.41L11.2899 12.71C11.3829 12.8037 11.4935 12.8781 11.6154 12.9289C11.7372 12.9797 11.8679 13.0058 11.9999 13.0058C12.132 13.0058 12.2627 12.9797 12.3845 12.9289C12.5064 12.8781 12.617 12.8037 12.7099 12.71C12.8037 12.617 12.8781 12.5064 12.9288 12.3846C12.9796 12.2627 13.0057 12.132 13.0057 12C13.0057 11.868 12.9796 11.7373 12.9288 11.6154C12.8781 11.4936 12.8037 11.383 12.7099 11.29L8.40994 7Z" fill="black"/></svg></a>
           <div class="popup_wrapper">
                <div class="popup_title">Добро пожаловать!</div>
                <div class="popup_subtitle">Войти в аккаунт</div>
                <form id="login" action="login" method="post">
                        <!-- Form Messages -->
                        <div class="form-message"></div> 
                        <div class="input_field">
                            <?php wp_nonce_field('ajax-login-nonce', 'security'); ?> 
                            <input class="popup_input" type="text" id="username" name="username" placeholder="Имя пользователя" autocomplete="on">
                            <input class="popup_input" type="password" id="password" name="password" placeholder="Пароль" autocomplete="on">
                        </div>
                        <div class="input_field remember_me">
                            <input type="checkbox" id="remember_me" name="remember_me" value="true">
                            <label for="remember_me" class="remember_me_label">Запомнить</label>
                        </div>
                        <div class="input_field submit">
                            <input type="submit" name="login_button" class="button" value="Авторизоваться">
                        </div>
                </form>
                <div class="popup_forget_ps_reg">
                    <a href="#forgotpassword" id="forgotpassBtn" class="forget_password_link popup-link">Забыли пароль?</a>
                    <a href="#register" id="registerBtn" class="register_link popup-link">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="register" class="popup">
    <div class="popup_body">
        <div class="popup_content">
           <a href="" id="popup_close" class="popup_close close_popup"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.40994 7L12.7099 2.71C12.8982 2.5217 13.004 2.2663 13.004 2C13.004 1.7337 12.8982 1.47831 12.7099 1.29C12.5216 1.1017 12.2662 0.995911 11.9999 0.995911C11.7336 0.995911 11.4782 1.1017 11.2899 1.29L6.99994 5.59L2.70994 1.29C2.52164 1.1017 2.26624 0.995911 1.99994 0.995911C1.73364 0.995911 1.47824 1.1017 1.28994 1.29C1.10164 1.47831 0.995847 1.7337 0.995847 2C0.995847 2.2663 1.10164 2.5217 1.28994 2.71L5.58994 7L1.28994 11.29C1.19621 11.383 1.12182 11.4936 1.07105 11.6154C1.02028 11.7373 0.994141 11.868 0.994141 12C0.994141 12.132 1.02028 12.2627 1.07105 12.3846C1.12182 12.5064 1.19621 12.617 1.28994 12.71C1.3829 12.8037 1.4935 12.8781 1.61536 12.9289C1.73722 12.9797 1.86793 13.0058 1.99994 13.0058C2.13195 13.0058 2.26266 12.9797 2.38452 12.9289C2.50638 12.8781 2.61698 12.8037 2.70994 12.71L6.99994 8.41L11.2899 12.71C11.3829 12.8037 11.4935 12.8781 11.6154 12.9289C11.7372 12.9797 11.8679 13.0058 11.9999 13.0058C12.132 13.0058 12.2627 12.9797 12.3845 12.9289C12.5064 12.8781 12.617 12.8037 12.7099 12.71C12.8037 12.617 12.8781 12.5064 12.9288 12.3846C12.9796 12.2627 13.0057 12.132 13.0057 12C13.0057 11.868 12.9796 11.7373 12.9288 11.6154C12.8781 11.4936 12.8037 11.383 12.7099 11.29L8.40994 7Z" fill="black"/></svg></a>
           <div class="popup_wrapper">
                <div class="popup_title">Создать новый аккаунт</div>
                <div class="popup_subtitle">Заполните форму регистрации</div>
                <form action="register"  id="register" method="post">
                        <!-- Form Messages -->
                        <div class="form-message"></div>
                        <div class="input_field">
                            <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>   
                            <input class="popup_input" type="text" id="signonemail" name="signonemail" placeholder="Введите адрес электронной почты" required>
                            <input class="popup_input" type="text" id="signonname" name="signonname" placeholder="Имя пользователя" required>
                            <input class="popup_input" type="password" id="signonpassword" name="signonpassword" placeholder="Пароль" required>
                            <input class="popup_input" type="password" id="signonpassword2" name="signonpassword2" placeholder="Повторите пароль" required>
                        </div>
                        <div class="input_field submit">
                            <input type="submit" name="register_button" class="button" value="Зарегистрироваться">
                        </div>
                </form>
                <div class="popup_info">
                    <span class="popup_info_text">Все поля обязательны для заполнения</span>
                </div>
                <div class="popup_login">
                    <a href="#login" id="loginBtn2" class="login_link popup-link">Авторизоваться</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="forgotpassword" class="popup">
    <div class="popup_body">
        <div class="popup_content">
           <a href="" id="popup_close" class="popup_close close_popup"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.40994 7L12.7099 2.71C12.8982 2.5217 13.004 2.2663 13.004 2C13.004 1.7337 12.8982 1.47831 12.7099 1.29C12.5216 1.1017 12.2662 0.995911 11.9999 0.995911C11.7336 0.995911 11.4782 1.1017 11.2899 1.29L6.99994 5.59L2.70994 1.29C2.52164 1.1017 2.26624 0.995911 1.99994 0.995911C1.73364 0.995911 1.47824 1.1017 1.28994 1.29C1.10164 1.47831 0.995847 1.7337 0.995847 2C0.995847 2.2663 1.10164 2.5217 1.28994 2.71L5.58994 7L1.28994 11.29C1.19621 11.383 1.12182 11.4936 1.07105 11.6154C1.02028 11.7373 0.994141 11.868 0.994141 12C0.994141 12.132 1.02028 12.2627 1.07105 12.3846C1.12182 12.5064 1.19621 12.617 1.28994 12.71C1.3829 12.8037 1.4935 12.8781 1.61536 12.9289C1.73722 12.9797 1.86793 13.0058 1.99994 13.0058C2.13195 13.0058 2.26266 12.9797 2.38452 12.9289C2.50638 12.8781 2.61698 12.8037 2.70994 12.71L6.99994 8.41L11.2899 12.71C11.3829 12.8037 11.4935 12.8781 11.6154 12.9289C11.7372 12.9797 11.8679 13.0058 11.9999 13.0058C12.132 13.0058 12.2627 12.9797 12.3845 12.9289C12.5064 12.8781 12.617 12.8037 12.7099 12.71C12.8037 12.617 12.8781 12.5064 12.9288 12.3846C12.9796 12.2627 13.0057 12.132 13.0057 12C13.0057 11.868 12.9796 11.7373 12.9288 11.6154C12.8781 11.4936 12.8037 11.383 12.7099 11.29L8.40994 7Z" fill="black"/></svg></a>
           <div class="popup_wrapper">
                <div class="popup_title">Восстановление пароля</div>
                <div class="popup_subtitle">Введите имя пользователя или email</div>
                <form action="forgotpassword" id="forgotpassword" method="post">
                        <!-- Form Messages -->
                        <div class="form-message"></div>
                        <div class="input_field">
                            <?php wp_nonce_field('ajax-forgot-nonce', 'forgotsecurity'); ?>   
                            <input class="popup_input" type="text" id="user_login" name="user_login" placeholder="Введите имя пользователя или email" required>
                        </div>
                        <div class="input_field submit">
                            <input type="submit" name="register_button" class="button" value="Восстановить пароль">
                        </div>
                </form>
                <div class="popup_forget_ps_reg">
                    <a href="#register" id="registerBtn" class="register_link_forget popup-link">Зарегистрироваться</a>
                    <a href="#login" id="loginBtn2" class="login_link popup-link">Авторизоваться</a>
                </div>
                
            </div>
        </div>
    </div>
</div>


<?php } 