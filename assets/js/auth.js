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

             },
             error: function (error){
                 if (error)
                 {
                     notif.addClass('alert-error');
                     notif.append('<p>  خطایی رخ داد! ورود ناموفق بود</p>');
                     notif.css('display', 'block');
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
            url:        '/wp-admin/admin-ajax.php',
            type:       'post',
            dataType:   'json',
            data: {
                action: 'wp_auth_register',
                first_name_reg:    first_name,
                last_name_reg:     last_name,
                user_email_reg:    user_email,
                user_password_reg: user_password,
            },
            success: function (response){
                alert(123);
            },
            error: function (error){
                if (error)
                {
                    notif.addClass('alert-error');
                    notif.append('<p>  خطایی رخ داد! ورود ناموفق بود</p>');
                    notif.css('display', 'block');
                }
            }
        });
    });
});