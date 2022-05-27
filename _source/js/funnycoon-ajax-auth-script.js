jQuery(document).ready(function($){
    
    $('form#login, form#register').on('submit', function (e) {
        if (!$(this).valid()) return false;
        $('.form-message', this).show().text(ajax_auth_object.loadingmessage);

        action = 'ajaxlogin';
        username = $('form#login #username').val();
        password = $('form#login #password').val();
        email = '';
        security = $('form#login #security').val();
        if ($(this).attr('id') == 'register') {
            action = 'ajaxregister',
            username = $('form#register #signonname').val();
            password = $('form#register #signonpassword').val();
            email = $('form#register #signonemail').val();
            security = $('form#register #signonsecurity').val();
        }
        ctrl = $(this);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_auth_object.ajaxurl,
            data: {
                'action': action,
                'username': username,
                'password': password,
                'email': email,
                'security': security,
            },
            success: function (data) {
                $('.form-message', ctrl).text(data.message);
                $('.form-message', ctrl).css('opacity', 1);
                if (data.loggedin == true) {
                    document.location.href = ajax_auth_object.redirecturl;
                }
            },
        });

        e.preventDefault();
    });

    $.validator.messages.required = "Это поле необходимо для заполнения";

    $('form#register').validate({
        rules:{
            signonemail: {
                required: true,
                email: true,
            },
            signonpassword: {
                required: true,
                minlength: 5,
            },
            signonpassword2:{ 
                required: true,
                equalTo:'#signonpassword'
            }
        },
        messages: {
            signonemail: {
                required: 'Это поле необходимо для заполнения',
                email: 'Необходимо ввести корректный email',
                minlength: 'Пароль должен состоять минимум из 5 символов'
            },
            signonpassword2: {
                required: 'Это поле необходимо для заполнения',
                equalTo: 'Пароли должны совпадать',
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});