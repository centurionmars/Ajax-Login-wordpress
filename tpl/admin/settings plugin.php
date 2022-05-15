<div class="wrap">
    <?php $wp_auth_options = get_option('wp_auth_options', []); ?>
    <h1>اتنظیمات فرم ورود و ثبت نام</h1>
    <form method="post">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">فعال بودن فرم ورود</th>
                <td>
                    <input class="is_login_active" type="checkbox" name="is_login_active"
                        <?php echo $wp_auth_options['is_login_active'] ?'checked' : ''; ?>/>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">فعال بودن فرم ثبت نام</th>
                <td>
                    <input class="is_register_active" type="checkbox" name="is_register_active"
                        <?php echo $wp_auth_options['is_register_active'] ?'checked' : ''; ?>/>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">عنوان فرم ورود</th>
                <td>
                    <input class="login_form_title" type="text" name="login_form_title"
	                    value="<?php echo isset($wp_auth_options['login_form_title']) ? $wp_auth_options['login_form_title'] : ''; ?>" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">عنوان فرم ثبت نام</th>
                <td>
                    <input class="register_form_title" type="text" name="register_form_title"
	                    value="<?php echo isset($wp_auth_options['register_form_title']) ? $wp_auth_options['register_form_title'] : ''; ?>" />
                </td>
            </tr>

            <tr valign="top">
                <td><input type="submit" name="saveSettingsPlugin" class="button" id="butSave" value="ذخیره سازی "/>
                    <br>
					<?php if (isset($_POST['saveSettingsPlugin'])) {
						echo "داده با موفقیت ذخیره شد!";
					} ?></td>
            </tr>
        </table>
    </form>
</div>
