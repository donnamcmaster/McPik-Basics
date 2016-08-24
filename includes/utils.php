<?php
/**
 *	McPik Basics: Utilities
 *	
 *	Package McPik_Basics
 */

namespace McPik\Basics\Utils;

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *	First Leaf
 *	Finds the first non-array element (singular or object)
 *	The key() function gives us the first key in the array
 */
function first_leaf ( $value ) {
	return !is_array( $value ) ? $value : first_leaf( $value[key($value)] );
}
