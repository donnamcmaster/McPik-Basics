<?php
/*
Title: Default Images
Setting: mcw_common_content
Tab Order: 20
*/

piklist( 'field', array(
	'type' => 'file',
	'field' => 'default_page_header',
	'label' => __( 'Default header image for secondary pages', 'mcpik'),
	'description' => __( 'The image must be at least 1186px wide and 230px high. It will be cropped to an approximately 5:1 ratio.', 'mcpik' ),
	'help' => __( 'Upload a file or select an image from the media library.', 'mcpik' ),
	'options' => array(
		'modal_title' => __( 'Add or Select Image', 'mcpik' ),
		'button' => __( 'Add or Select Image', 'mcpik' ),
	),
));

piklist( 'field', array(
	'type' => 'file',
	'field' => 'default_post_thumb',
	'label' => __( 'Default thumbnail image for news posts', 'mcpik' ),
	'description' => __( 'The image must be at least 160px wide and 120px high. It will be cropped to a 4:3 ratio.', 'mcpik' ),
	'help' => __( 'Upload a file or select an image from the media library.', 'mcpik' ),
	'options' => array(
		'modal_title' => __( 'Add or Select Image', 'mcpik' ),
		'button' => __( 'Add or Select Image', 'mcpik' ),
	),
));