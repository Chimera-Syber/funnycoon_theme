jQuery(document).ready((function(e){function s(s){e(s).on("submit",(function(s){if(!e(this).valid())return!1;e(".form-message",this).show().text(ajax_auth_object.loadingmessage),action="ajaxlogin",username=e("#username").val(),password=e(" #password").val(),email="",security=e("#security").val(),"register"==e(this).attr("id")&&(action="ajaxregister",username=e("#signonname").val(),password=e("#signonpassword").val(),email=e("#signonemail").val(),security=e("#signonsecurity").val()),ctrl=e(this),e.ajax({type:"POST",dataType:"json",url:ajax_auth_object.ajaxurl,data:{action:action,username:username,password:password,email:email,security:security},success:function(s){e(".form-message",ctrl).text(s.message),e(".form-message",ctrl).css("opacity",1),1==s.loggedin&&(document.location.href=ajax_auth_object.redirecturl)}}),s.preventDefault()}))}e("form#login").validate({rules:{username:{required:!0},password:{required:!0,minlength:5}},messages:{username:{required:"Это поле необходимо для заполнения"},password:{required:"Это поле необходимо для заполнения",minlength:"Пароль должен состоять минимум из 5 символов"}},submitHandler:s("form#login")}),e("form#register").validate({rules:{signonemail:{required:!0,email:!0},signonpassword:{required:!0,minlength:5},signonpassword2:{required:!0,minlength:5,equalTo:"#signonpassword"}},messages:{signonemail:{required:"Это поле необходимо для заполнения",email:"Необходимо ввести корректный email"},signonpassword:{required:"Это поле необходимо для заполнения",minlength:"Пароль должен состоять минимум из 5 символов"},signonpassword2:{required:"Это поле необходимо для заполнения",minlength:"Пароль должен состоять минимум из 5 символов",equalTo:"Пароли должны совпадать"}},submitHandler:s("form#register")})}));
//# sourceMappingURL=funnycoon-ajax-auth-script.js.map