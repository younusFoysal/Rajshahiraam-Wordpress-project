<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'unique_id' => array(
		'type' => 'unique'
	),
	'id' => array(
		'type'       => 'multi-select',
		'value'      => array(),
		'label'      => __( 'Select Product', 'cultivation' ),
		'desc'       => __( 'Select a product to display', 'cultivation' ),
		'population' => 'posts',
		'source'     => 'product',
		'limit'      => 1,
	),
	'class'     => array(
		'label' => __( 'Custom Class', 'cultivation' ),
		'desc'  => __( 'Enter custom CSS class', 'cultivation' ),
		'type'  => 'text',
		'value' => '',
	),
);