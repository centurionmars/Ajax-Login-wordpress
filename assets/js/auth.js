jQuery (document).ready(function ($){
    $('#loginForm').on('submit', function (event){
         event.preventDefault();
         let user_email = $('#userEmail').val();
         let user_password = $('#userPassword').val();
         let notif = $('.alert');
         $.ajax({
             url: '/wp-admin/admin-ajax.php',
             type: 'post',
             dataType: 'json',
             data: {
                 action: 'wp_auth_login',
                 user_email: user_email,
                 user_password: user_password,
             },
             success: function (response){
                 if (response.success) {
                     notif.removeClass('alert_error').addClass('alert_success');
                     notif.html('<p>' + response.message + '</p>');
                     notif.css('display', 'block');
                     setTimeout(function (){
                         window.location.href = '/';
                     }, 1000);
                 }
             },
             error: function (error){
                 if (error)
                 {
                     let message = error.responseJSON.message;
                     notif.addClass('alert_error');
                     notif.html('<p>' + message + '</p>');
                     notif.css('display', 'block');
                     notif.delay(2000).hide(300);
                 }
             }
         });
     });
    $('#registerForm').on('submit', function (event){
        event.preventDefault();
        let first_name     = $('#f_name').val();
        let last_name      = $('#l_name').val();
        let user_email     = $('#user_email_register').val();
        let user_password  = $('#user_password_register').val();
        let notif          = $('.alert');
        $.ajax({
            url:        "/wp-admin/admin-ajax.php",
            type:       "post",
            dataType:   "json",
            data: {
                action: "wp_auth_register",
                first_name_reg:    first_name,
                last_name_reg:     last_name,
                user_email_reg:    user_email,
                user_password_reg: user_password,
            },
            success: function (response){
            },
            error: function (error){
                if (error)
                {
                    let message = error.responseJSON.message;
                    notif.addClass('alert_error');
                    notif.html('<p>+ message + </p>');
                    notif.css('display', 'block');
                    notif.delay(5000).hide(3000);

                }
            }
        });
    });
});