<?php
/*
Plugin Name: McPik Basics: Disable Edit Lock
Plugin URI: https://www.donnamcmaster.com/
Description: Temporarily allow multiple admin access.
Version: 0.1.0
Author: Donna McMaster
Author URI: https://www.donnamcmaster.com/
*/

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_admin() ) {
	// soften post lock to post warning
	add_filter( 'show_post_locked_dialog', '__return_false' );
	add_filter( 'wp_check_post_lock_window', '__return_false' );
}