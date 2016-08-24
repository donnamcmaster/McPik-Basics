<?php
/*
Plugin Name: McPik Basics: Rules
Plugin URI: https://www.donnamcmaster.com/
Description: General-purpose validation and sanitization rules.
Version: 0.1.0
Author: Donna McMaster
Author URI: https://www.donnamcmaster.com/
*/

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *	Piklist Custom Validation
 */
add_filter('piklist_validation_rules', 'mcpk_custom_validation', 11);
function mcpk_custom_validation ( $validation_rules ) {
	$validation_rules['number'] = array(
		'rule' => "/[-+]?[0-9]*[.,]?[0-9]+/",
		'message' => __( 'is not a number' ),
	);
	$validation_rules['integer'] = array(
		'rule' => "/[-+]?[0-9]*/",
		'message' => __( 'is not an integer' ),
	);
	$validation_rules['pos_integer'] = array(
		'rule' => "/[+]?[0-9]*/",
		'message' => __( 'is not a positive integer' ),
	);
	return $validation_rules;
}

add_filter( 'piklist_sanitization_rules', 'mcpk_add_sanitize_rule', 11 );
function mcpk_add_sanitize_rule ( $sanitization_rules ) {
	$sanitization_rules['mcpk_number'] = array(
		'callback' => 'mcpk_sanitize_number'
	);
	return $sanitization_rules;
}
 
function mcpk_sanitize_number ( $value, $field, $options ) {
	$number = str_replace( '$', '', $value);
	$number = (float)$number;
	if ( isset( $options['non_negative'] ) && $options['non_negative'] && ( $number < 0 ) ) {
		return '0';
	} else {
		return "$number";
	}
}
