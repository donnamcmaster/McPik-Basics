<?php
/*
Plugin Name: McPik Basics
Plugin URI: https://www.donnamcmaster.com/
Description: Some generally useful Piklist settings, widgets, and shortcodes. 
Version: 0.2.0
Author: Donna McMaster
Author URI: https://www.donnamcmaster.com/
Plugin Type: Piklist
License: GPLv3
*/

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *	Plugin depends on Piklist; make sure it's active
 */
add_action( 'init', function() {
	if ( is_admin() ) {
		include_once( 'includes/class-piklist-checker.php' );
		if ( !piklist_checker::check( __FILE__ ) ) {
			return;
		}
	}
	include_once( 'includes/utils.php' );
});

/**
 *	Dummy error log function for sites without mcw-debug-log plugin
 */
if ( !function_exists( 'mcw_log' ) ) {
	function mcw_log ( $s, $level='info' ) {
	}
}
