<div class="auth-wrapper">
    <div class="alert" style="display: none;"></div>
    <div class="register-wrapper">
	    <?php if ( isset( $wp_auth_options['register_form_title'] ) ): ?>
            <h2><?php echo $wp_auth_options['register_form_title']; ?></h2>
	    <?php endif; ?>
<!--        --><?php //var_dump($wp_auth_options['register_form_title']); ?>
        <form action="" method="post" id="registerForm">
            <div class="form-row">
                <label for="f_name"></label>
                <input type="text" placeholder="نام" class="textInput" name="f_name" id="f_name">
            </div>
            <div class="form-row">
                <label for="l_name" class="textLabel"></label>
                <input type="text" placeholder="نام خانوادگی" class="textInput" name="l_name" id="l_name">
            </div>
            <div class="form-row">
                <label for="user_email_register" class="textLabel"></label>
                <input type="email" placeholder="ایمیل" class="textInput" name="user_email_register" id="user_email_register">
            </div>
            <div class="form-row">
                <label for="user_password_register" class="textLabel"></label>
                <input type="password" placeholder="کلمه عبور" class="textInput" name="user_password_register" id="user_password_register">
            </div>
            <div class="form-row">
                <button name="submitLogin" class="loginButton">ثبت نام</button>
            </div>
        </form>
    </div>
</div>