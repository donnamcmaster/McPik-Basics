<?php
/*
 Title: Footer Settings
 Setting: mcw_common_content
 */

piklist( 'field', array(
	'type' => 'editor',
	'field' => 'footer_address',
	'label' => 'Address block',
	'options' => array (
		'media_buttons' => true,
		'textarea_rows' => 8,
		'teeny' => false,
		'quicktags' => true,
	),
));

$year = date( 'Y' );
piklist( 'field', array(
	'type' => 'text',
	'field' => 'copyright_year',
	'label' => 'Copyright initial year',
	'description' => "This will be used with the current year; e.g., copyright &copy;2010-$year.",
	'value' => $year,
	'attributes' => array(
		'class' => 'large-text',
	),
));

piklist( 'field', array(
	'type' => 'textarea',
	'field' => 'copyright_statement',
	'label' => 'Copyright statement',
	'description' => "Please enter the name of the copyright holder. 
		We will automatically substitute the correct year or range for &quot;[years]&quot;.",
	'value' => 'Copyright &copy;[years] '.get_bloginfo( 'name' ).'. All rights reserved.',
	'attributes' => array(
		'class' => 'large-text code',
	),
));

