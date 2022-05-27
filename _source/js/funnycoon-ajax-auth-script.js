jQuery(document).ready(function($){
    
    function ajax_request(form) {
        $(form).on('submit', function (e) {
            if (!$(this).valid()) return false;
            $('.form-message', this).show().text(ajax_auth_object.loadingmessage);

            action = 'ajaxlogin';
            username = $('#username').val();
            password = $(' #password').val();
            email = '';
            security = $('#security').val();
            if ($(this).attr('id') == 'register') {
                action = 'ajaxregister',
                username = $('#signonname').val();
                password = $('#signonpassword').val();
                email = $('#signonemail').val();
                security = $('#signonsecurity').val();
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

    }

    $('form#login').validate({
        rules:{
            username: {
                required: true,
            },
            password: {
                required: true,
                minlength: 5,
            }
        },
        messages: {
            username: {
                required: 'Это поле необходимо для заполнения',
            },
            password: {
                required: 'Это поле необходимо для заполнения',
                minlength: 'Пароль должен состоять минимум из 5 символов',
            }
        },
        submitHandler: ajax_request('form#login'),
    }); 

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
                minlength: 5,
                equalTo:'#signonpassword'
            }
        },
        messages: {
            signonemail: {
                required: 'Это поле необходимо для заполнения',
                email: 'Необходимо ввести корректный email',
            },
            signonpassword: {
                required: 'Это поле необходимо для заполнения',
                minlength: 'Пароль должен состоять минимум из 5 символов',
            },
            signonpassword2: {
                required: 'Это поле необходимо для заполнения',
                minlength: 'Пароль должен состоять минимум из 5 символов',
                equalTo: 'Пароли должны совпадать',
            },
        },
        submitHandler: ajax_request('form#register'),
    });

});