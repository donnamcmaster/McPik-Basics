<?php
/*
Name: Button
Description: Insert a linked button
Shortcode: mcpk-button
Icon: dashicons-marker
*/

piklist( 'field', array(
	'type' => 'text',
	'field' => 'title',
	'label' => __( 'Title' ),
));
piklist( 'field', array(
	'type' => 'text',
	'field' => 'link',
	'label' => __( 'Link' ),
	'attributes' => array(
		'class' => 'large-text',
	),
));
piklist( 'field', array(
	'type' => 'select',
	'field' => 'button_class',
	'label' => __( 'Button type' ),
	'choices' => array(
		'btn-primary' => 'Standard (blue)',
		'btn-success' => 'Success (green)',
		'btn-info' => 'Info (light brown)',
		'btn-warning' => 'Warning (orange)',
		'btn-danger' => 'Danger (red)',
		'btn-default' => 'Plain (white)',
	),
));
piklist( 'field', array(
	'type' => 'text',
	'field' => 'add_class',
	'label' => __( 'Additional class (optional)' ),
));
