<?php
function wp_auth_admin_settings(){
	add_menu_page(
		 'تنظیمات',
		'ورود و ثبت نام',
		 'manage_options',
		'wp_auth',
		  'wp_auth_settings',
		  'dashicons-admin-users',
		  '3',
	);
}
function wp_auth_settings()
{
	$wp_auth_options = get_option('wp_auth_options', []);
	if (isset($_POST['saveSettingsPlugin']))
	{
		$wp_auth_options['is_login_active']     = isset($_POST['is_login_active']);
		$wp_auth_options['is_register_active']  = isset($_POST['is_register_active']);
		$wp_auth_options['login_form_title']    = sanitize_text_field($_POST['login_form_title']);
		$wp_auth_options['register_form_title'] = sanitize_text_field($_POST['register_form_title']);
		update_option('wp_auth_options', $wp_auth_options);
	}
	$tabs =
		[
			'general'   => 'عمومی',
			'login'     => 'ورود',
			'register'  => 'ثبت نام',
		];
	$curent_tab = $_GET['tab'] ?? 'general';
	var_dump($curent_tab);

	if ($curent_tab == 'general')
	{
		include WP_AUTH_TPL.'/admin/options.php';
	}
	include WP_AUTH_TPL. "/admin/settings plugin.php";
}
add_action('admin_menu', 'wp_auth_admin_settings');