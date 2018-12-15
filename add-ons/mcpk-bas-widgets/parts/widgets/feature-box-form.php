<?php

piklist('field', array(
	 'type' => 'text'
	 ,'field' => 'box_title'
	 ,'label' => 'Box Title'
	 ,'value' => 'Title'
	 ,'attributes' => array(
	 )
));

piklist('field', array(
	'type' => 'file',
	'field' => 'box_image',
	'label' => __('Add Image','piklist'),
	'options' => array(
	)
));
  
piklist('field', array(
	'type' => 'editor',
	'field' => 'box_text',
	'label' => 'Box Text',
	'description' => 'Write the content here',
	'columns' => '12',
	'options' => array (
		'media_buttons' => false,
		'textarea_rows' => 6,
		'teeny' => false,
		'quicktags' => true,
	),
));

piklist('field', array(
	'type' => 'text',
	'field' => 'box_link',
	'label' => 'Link',
	'description' => 'URL (address) of the page to link to',
	'attributes' => array(
		'placeholder' => 'http://',
	)
));

piklist('field', array(
	'type' => 'text',
	'field' => 'box_link_text',
	'label' => 'Link Text',
	'description' => 'Text to use for the link',
	'value' => 'Read more &raquo;',
	'attributes' => array(
	)
));
