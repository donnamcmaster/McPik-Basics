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

/**
 *	Function get_request_var
 *	- pluck an element from $_GET, $_POST, or $_REQUEST array
 *	- does basic sanitization
 *	- test against null if empty string is a valid option
 */
public static function get_request_var ( $var_name, $var_set ) {
	if ( array_key_exists( $var_name, $var_set ) ) {
		return trim( $var_set[$var_name] );
	} else {
		return null;
	}
}

public static function array_to_list () {
}

/********************
 *
 *	HTML Utilities
 *
 ********************/

public static function get_parm ( $name, $value ) {
	return $value ? ( ' ' . $name . '="' . $value . '"' ) : '';
}

public static function get_anchor ( $url, $text, $class='', $title='' ) {
	if ( $url ) {
		return '<a href="' . $url .'"'. self::get_parm( 'class', $class ) . self::get_parm( 'title', $title ) . '>' . $text . '</a>';
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

public static function get_list_item ( $item, $class='' ) {
	$class = $class ? " class=\"$class\"" : '';
	return "<li$class>$item</li>";
}

public static function get_dl_entry ( $dterm, $ddefinition ) {
	if ( !trim( $ddefinition ) ) {
		return '';
	} else {
		return "
		<dt>$dterm:</dt>
		<dd>$ddefinition</dd>
		";
	}
}


/********************
 *
 *	WordPress Utilities
 *
 ********************/

public static function display_error_result ( $result ) {
	$error_string = $result->get_error_message();
?>
	<div id="message" class="error"><p><?= $error_string;?></p></div>
<?php
}


/**
 *	Function get_post_anchor
 *	- returns an <a> element linking to the post permalink
 */
public static function get_post_anchor ( $id ) {
	$p = get_post( $id );
	$url = get_permalink( $id );
	$name = wptexturize( $p->post_title );
	return mcw_get_anchor( $url, $name );
}

/**
 *	Function is_bloggish
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
 *	Function is_family
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
 *	Function get_top_cat_slug
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

/**
 *	Format content outside the loop
 *	- receives raw content (from post_content or meta table)
 *  - returns formatted content
 *	- applies filters from the_content() 
 *	- if $has_shortcodes, also expands them
 */
public static function format_content ( $content, $has_shortcodes ) {
	if ( !$content ) {
		return '';

	} elseif ( $has_shortcodes ) {
		$extra_junk = array(
			'<p>['    => '[',
			']</p>'   => ']',
			']<br />' => ']'
		);
		return do_shortcode( strtr( wpautop( wptexturize( $content ) ), $extra_junk ) );

	} else {
		return wpautop( wptexturize( $content ) );
	}
}


/********************
 *
 *	Data Formatting Utilities
 *
 ********************/

/**
 *	Format Publication Date
 *	- publication date format is yyyy-mm-dd for sort purposes
 *	- but sometimes dd=00 because there is no day, e.g., May 2008
 *	- PHP date functions barf on yyyy-mm-00 or yyyy-mm 
 *	- so this function works around it
 */
public static function format_pub_date ( $date, $month_only='F Y', $month_day='M j, Y' ) {
	if ( substr( $date, -2, 2 ) == '00' ) {
		$date = substr_replace( $date, '01', -2, 2 );
		$date_format = $month_only;
	} else {
		$date_format = $month_day;
	}
	return date( $date_format, strtotime( $date ) );
}

// converts a string '2018-02-30' or '2002-00-00' to something we can insert into WordPress
public static function normalize_pub_date ( $pub_date ) {
	$date_parts = explode( '-', $pub_date );
	if ( $date_parts[1] == '00' ) {
		$date_parts[1] = '01';
	}
	if ( $date_parts[2] == '00' ) {
		$date_parts[2] = '01';
	}
	$clean_date = implode( '-', $date_parts );
	return $clean_date . ' 00:00:00';
}


} // class McPik_Utils
