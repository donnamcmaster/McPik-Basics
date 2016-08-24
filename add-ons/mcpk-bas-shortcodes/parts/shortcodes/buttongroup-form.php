<?php
/*
Name: Button Group
Description: Insert a group of 2-3 linked buttons
Shortcode: mcpk-button-group
Icon: dashicons-image-filter
*/

piklist( 'field', array(
	'type' => 'text',
	'field' => 'title1',
	'label' => __( 'Button 1 Title' ),
	'attributes' => array(
		'class' => 'large-text'
	)
));
piklist( 'field', array(
	'type' => 'text',
	'field' => 'link1',
	'label' => __( 'Button 1 Link' ),
	'attributes' => array(
		'class' => 'large-text',
	),
));

piklist( 'field', array(
	'type' => 'text',
	'field' => 'title2',
	'label' => __( 'Button 2 Title' ),
	'attributes' => array(
		'class' => 'large-text'
	)
));
piklist( 'field', array(
	'type' => 'text',
	'field' => 'link2',
	'label' => __( 'Button 2 Link' ),
	'attributes' => array(
		'class' => 'large-text',
	),
));

piklist( 'field', array(
	'type' => 'text',
	'field' => 'title3',
	'label' => __( 'Button 3 Title' ),
	'attributes' => array(
		'class' => 'large-text'
	)
));
piklist( 'field', array(
	'type' => 'text',
	'field' => 'link3',
	'label' => __( 'Button 3 Link' ),
	'attributes' => array(
		'class' => 'large-text',
	),
));