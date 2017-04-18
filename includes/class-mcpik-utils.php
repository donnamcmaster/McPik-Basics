<?php
/**
 *	McPik_Utils: Utilities Class
 *	
 *	Package McPik_Basics
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if ( !defined( 'BR') ) {
	define( 'BR', '<br>' );
}

Class McPik_Utils {

/********************
 *
 *	PHP Utilities
 *
 ********************/

/**
 *	First Leaf
 *	Finds the first non-array element (singular or object)
 *	The key() function gives us the first key in the array
 */
public static function first_leaf ( $value ) {
	return !is_array( $value ) ? $value : first_leaf( $value[key($value)] );
}

/**
 *	Get Array Element
 *	- checks to see if requested array index is set
 *	- if so, returns element; otherwise returns $null_value
 */
public static function get_array_element ( $array, $key, $null_value=null ) {
	return array_key_exists( $key, $array ) ? $array[$key] : $null_value;
}


/********************
 *
 *	HTML Utilities
 *
 ********************/

public static function get_parm ( $name, $value ) {
	return $value ? ( ' ' . $name . '="' . $value . '"' ) : '';
}

public static function get_anchor ( $url, $text, $class='' ) {
	if ( $url ) {
		return '<a href="' . $url .'"'. self::get_parm( 'class', $class ) . '>' . $text . '</a>';
	} else {
		return null;
	}
}

public static function get_anchor_blank ( $url, $text, $class='' ) {
	if ( $url ) {
		return '<a href="' . $url .'"'. self::get_parm( 'class', $class ) . ' target="_blank">' . $text . '</a>';
	} else {
		return null;
	}
}


/********************
 *
 *	WordPress Utilities
 *
 ********************/

/**
 *	Function mcw_is_bloggish
 *	- checks to see if this page is some sort of blog page
 */
public static function is_bloggish () {
	global $post;
	if ( !$post ) {
		return false;
	} else {
		return is_home() || ( $post->post_type == 'post' ) || is_archive();
	}
}

/**
 *	Function mcw_is_family
 *	- checks to see if this page is $ancestor or a descendant of $ancestor
 *	- $ancestor must be page ID, not name
 */
public static function is_family ( $ancestor ) {
	global $post;

	$descendant = false;
	if ( is_page( $ancestor ) ) {
		$descendant = true;
	} elseif ( $post->ancestors ) {
		if ( in_array( $ancestor, $post->ancestors ) ) {
			$descendant = true;
		}
	}
	return $descendant;
}

/**
 *	Function mcw_get_top_cat_slug
 *	- in a hierarchical taxonomy, returns the slug for the highest cat in this post's taxonomy
 */
public static function get_top_cat_slug ( $taxonomy, $post_id=null ) {
	global $post;
	$post_id = $post_id ? $post_id : $post->ID;
	if ( $terms = wp_get_post_terms( $post_id, $taxonomy, array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
		$main_term = $terms[0];
		$ancestors = get_ancestors( $main_term->term_id, $taxonomy );
		$top_cat = get_term( $ancestors[count($ancestors)-1], $taxonomy );
		return $top_cat->slug;
	} else {
		return null;
	}
}

/**
 *	Get Post Meta Values
 */
// returns a simplified post custom array of singleton values and arrays
// make sure you check for array if the meta field may have multiple values
public static function get_simple_post_custom ( $post_id=null, $single=false ) {
	$fields = get_post_custom( $post_id );
	$simple = array();
	if ( $fields ) {
		foreach ( $fields as $key=>$values ) {
			if ( !$single && ( count( $values ) > 1 ) ) {
				$simple[$key] = $values;
			} elseif ( is_serialized( $values[0] ) ) {
				$simple[$key] = unserialize( $values[0] );
			} else {
				$simple[$key] = $values[0];
			}
		}
	}
	return $simple;
}

public static function get_custom_value ( $field, $custom_fields ) {
	if ( !is_array( $custom_fields ) || !array_key_exists( $field, $custom_fields ) ) {
		return null;
	} elseif ( count( $custom_fields[$field] ) > 1 ) {
		return $custom_fields[$field];
	} else {
		return $custom_fields[$field][0];
	}
}

} // class McPik_Utils
