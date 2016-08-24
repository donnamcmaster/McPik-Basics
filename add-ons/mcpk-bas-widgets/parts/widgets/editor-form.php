<?php
/*
	Width: 720
 */
piklist( 'field', array(
	'type' => 'text',
	'field' => 'title',
	'label' => 'Title',
	'columns' => 8,
));

piklist( 'field', array(
	'type' => 'radio',
	'field' => 'show_title',
	'label' => 'Display title?',
    'choices' => array(
		1 => 'yes',
		0 => 'no',
    ),
    'value' => 1,
));

piklist( 'field', array(
	'type' => 'editor',
	'field' => 'content',
	'label' => __( 'Content' ),
	'options' => array (
		'media_buttons' => true,
		'textarea_rows' => 8,
		'teeny' => false,
		'quicktags' => true,
	),
));