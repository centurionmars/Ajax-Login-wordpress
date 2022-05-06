<?php
function wp_auth_login_handler($atts, $content = null)
{

}
function wp_auth_register_handler($atts, $content = null)
{

}
add_shortcode('wp_auth_login', 'wp_auth_login_handler');
add_shortcode('wp_auth_register', 'wp_auth_register_handler');