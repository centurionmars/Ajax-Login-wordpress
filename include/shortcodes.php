<?php
function wp_auth_login_handler($atts, $content = null)
{
	$wp_auth_options = get_option('wp_auth_options', []);
	include WP_AUTH_TPL."front/login.php";
}
function wp_auth_register_handler($atts, $content = null)
{
	include WP_AUTH_TPL."front/register.php";

}
add_shortcode('wp_auth_login', 'wp_auth_login_handler');
add_shortcode('wp_auth_register', 'wp_auth_register_handler');