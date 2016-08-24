<?php
/*  
Title: WYSIWYG Editor
Class: 
Width: 600
*/

use McPik\Basics\Utils;

	echo $before_widget;
	if ( Utils\first_leaf( $settings['show_title'] ) && !empty( $settings['title'] ) ) {
		echo $before_title;
		echo wptexturize( $settings['title'] );
		echo $after_title;
	}
	if ( !empty( $settings['content'] ) ) {
		echo wptexturize( wpautop( $settings['content'] ) );
	}
	echo $after_widget;
?>
