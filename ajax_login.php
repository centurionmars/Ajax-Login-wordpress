<?php
/*
Plugin Name: Plugin  Ajax login
Plugin URI:https://cyclestart.ir
Description: Plugin to manage auth
Author: mars
Author URI: https://cyclestart.ir
Text Domain: wordpress-login
Domain Path: /languages/
Version: 1.0.0
*/

define('WP_AUTH_DIR' , plugin_dir_path(__FILE__));
define('WP_AUTH_URL' , plugin_dir_url(__FILE__));
const WP_AUTH_INC = WP_AUTH_DIR . "/include/";
const WP_AUTH_TPL = WP_AUTH_DIR . '/tpl/';

include WP_AUTH_INC. "functions.php";
include WP_AUTH_INC. "shortcodes.php";