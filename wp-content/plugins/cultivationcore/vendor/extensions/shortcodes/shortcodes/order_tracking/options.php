<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'unique_id' => array(
		'type' => 'unique'
	),
	'class'     => array(
		'label' => __( 'Custom Class', 'cultivation' ),
		'desc'  => __( 'Enter custom CSS class', 'cultivation' ),
		'type'  => 'text',
		'value' => '',
	),
);