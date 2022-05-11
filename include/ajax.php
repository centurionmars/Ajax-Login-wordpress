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
/*********** validation function for register ****************/
function wp_auth_do_register ()
{
	$user_first_name  = sanitize_text_field($_POST['first_name_reg']);
	$user_last_name   = sanitize_text_field($_POST['last_name_reg']);
	$user_email       = sanitize_text_field($_POST['user_email_reg']);
	$user_password    = sanitize_text_field($_POST['user_password_reg']);
	$validateResult   = validate_register_request($user_first_name, $user_last_name, $user_email, $user_password);
	if (!$validateResult['is_valid'])
	{
		wp_send_json(
			[
			'success' => false,
			'message' => $validateResult['message'],
			],422);
	}
	$userEmailPart = explode('@', $user_email);
	$new_user = wp_insert_user([
		'user_login'   => $userEmailPart[0]. rand(1000, 9999),
		'user_pass'    => $user_password,
		'user_email'   => $user_email,
		'first_name'   => $user_first_name,
		'last_name'    => $user_last_name,
		'display_name' => "$user_first_name $user_last_name",
	]);
	if (is_wp_error($new_user)) {
		wp_send_json(
			[
				'success' => false,
				'message' => 'خطایی در ثبت نام شما رخ داده است'
			],500);
	}
	wp_send_json(
		[
			'success' => true,
			'message' => 'ثبت نام شما با موفقیت انجام شد'
		],200);
}
function function_name($user_id, $userdata)
{
	$result = get_option('user_register',[]);
	$result[$user_id] = $userdata['user_login'];
	update_option('user_register',$result,);
}
function validate_register_request($first_name, $last_name, $email, $password): array {
	$result = [
		'is_valid' => true,
		'message' => "",
	];
	if (empty($first_name) || empty($last_name) || empty($email) || empty($password))
	{
		$result['is_valid'] = false;
		$result['message'] = 'تمامی فیلدها الزامی میباشد';
		return $result;
	}
	if (!is_email($email)){
		$result['is_valid'] = false;
		$result['message'] = 'ایمیل وارد شده معتبر نمیباشد';
		return $result;
	}
	if (email_exists($email)){
		$result['is_valid'] = false;
		$result['message'] = 'استفاده ازین ایمیل امکان پذیر نمیباشد';
		return $result;
	}
	return $result;
}
add_action('wp_ajax_nopriv_wp_auth_login', 'wp_auth_do_login');
add_action('wp_ajax_nopriv_wp_auth_register', 'wp_auth_do_register');
add_action( 'user_register','function_name');