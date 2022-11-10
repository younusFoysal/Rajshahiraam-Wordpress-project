<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'cultivation'),
		'type'         => 'switch',
	),
	'background_color' => array(
		'label' => __('Background Color', 'cultivation'),
		'desc'  => __('Please select the background color', 'cultivation'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'cultivation'),
		'desc'    => __('Please select the background image', 'cultivation'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'video' => array(
		'label' => __('Background Video', 'cultivation'),
		'desc'  => __('Insert Video URL to embed this video', 'cultivation'),
		'type'  => 'text',
	),
	
);
