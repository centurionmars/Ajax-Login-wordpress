<?php
function wp_auth_login_handler($atts, $content = null)
{
	$wp_auth_options = get_option('wp_auth_options', []);
	if (isset($wp_auth_options['is_login_active']) && !$wp_auth_options['is_login_active'])
	{
		return '<div><p>امکان ورود در حال حاضر وجود ندارد</P></div>';
	}
	include WP_AUTH_TPL."front/login.php";
}
function wp_auth_register_handler($atts, $content = null)
{
	$wp_auth_options = get_option('wp_auth_options', []);
	if (isset($wp_auth_options['is_register_active']) && !$wp_auth_options['is_register_active']){
		return '<div><p>امکان ثبت نام در حال حاضر وجود ندارد</P></div>';
	}
	include WP_AUTH_TPL."front/register.php";

}
add_shortcode('wp_auth_login', 'wp_auth_login_handler');
add_shortcode('wp_auth_register', 'wp_auth_register_handler');