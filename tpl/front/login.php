<div class="auth-wrapper">
    <div class="alert" style="display: none;"></div>
    <div class="login-wrapper">
	    <?php if ( isset( $wp_auth_options['login_form_title'] ) ): ?>
            <h2><?php echo $wp_auth_options['login_form_title']; ?></h2>
	    <?php endif; ?>
        <form action="" method="post" id="loginForm">
            <div class="form-row">
                <label for="userEmail" class="textLabel" ></label>
                <input type="text" placeholder="ایمیل" class="textInput" name="userEmail" id="userEmail">
            </div>
            <div class="form-row">
                <label for="userPassword" class="textLabel"></label>
                <input type="password" placeholder="رمز عبور" class="textInput" name="userPassword" id="userPassword">
            </div>
            <div class="form-row">
                <button name="submitLogin"
                class="loginButton">ورود</button>
            </div>
        </form>
    </div>
</div>