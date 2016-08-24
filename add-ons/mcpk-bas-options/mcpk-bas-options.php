<?php
/*
Plugin Name: McPik Basics: Site Settings
Plugin URI: https://www.donnamcmaster.com/
Description: General-purpose options and settings.
Version: 0.1.0
Author: Donna McMaster
Author URI: https://www.donnamcmaster.com/
*/

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'piklist_admin_pages', 'mcw_admin_pages' );
function mcw_admin_pages( $pages ) {
	$pages[] = array(
		'page_title' => __( 'Common Content Settings' ),
		'menu_title' => __( 'Common Content', 'piklist' ),
		'sub_menu' => 'themes.php', // under Appearance menu
		'capability' => 'manage_options',
		'menu_slug' => 'mcw_common_content',
		'setting' => 'mcw_common_content',
		'menu_icon' => 'dashicons-welcome-widgets-menus',
		'page_icon' => 'dashicons-welcome-widgets-menus',
		'single_line' => true,
		'default_tab' => 'Header &amp; Footer',
		'save_text' => 'Save Content Settings',
	);
	return $pages;
}

