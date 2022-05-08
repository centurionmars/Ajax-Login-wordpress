<?php
function wp_auth_do_login(){
	$user_email= sanitize_text_field($_POST['user_email']);
	$user_password= sanitize_text_field($_POST['user_password']);
	$validation_result = wp_auth_validate_email_and_password($user_email, $user_password);
	if (!$validation_result['is_valid']) {
		wp_send_json([
			'success' => false,
			'message' => $validation_result['message'],
		], 403);
	}
	$user = wp_authenticate_email_password(null,$user_email, $user_password);
	if (is_wp_error($user)){
		wp_send_json([
			'success' => false,
			'message'=> 'کاربری با این مشخصات پیدا نشد',
		],403);
	}
	$loginResult = wp_signon([
		'user_login' => $user->user_login,
		'user_password' => $user_password,
		'remember' => false
	]);
	if (is_wp_error($loginResult)) {
		wp_send_json([
			'success' => false,
			'message' => 'در حال حاضر امکان ورود به سایت وجود ندارد ! لطفا بعدا دوباره امتحان کنید',
		],403);
	}
	wp_send_json([
		'success' => true,
		'message' => 'ورود موفق بود ، در حال انتقال . . .',
	],200);
	wp_die();
}
function wp_auth_validate_email_and_password ($email, $password): array {
	$result = [
		'is_valid' => true,
		'message' => "",
	];
	if(is_null($email) || empty($email))
	{
		$result['is_valid'] = false;
		$result['message'] = 'ایمیل نمیتواند خالی باشد';
		return $result;
	}
	if(is_null($password) || empty($password))
	{
		$result['is_valid'] = false;
		$result['message'] = 'کلمه عبور نمیتواند خالی باشد';
		return $result;
	}
	if(!is_email($email))
	{
		$result['is_valid'] = false;
		$result['message'] = 'ایمیل وارد شده معتبر نمی باشد';
		return $result;
	}
	return $result;
}
add_action('wp_ajax_nopriv_wp_auth_login', 'wp_auth_do_login');