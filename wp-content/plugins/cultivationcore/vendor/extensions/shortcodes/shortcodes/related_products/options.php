<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'unique_id' => array(
		'type' => 'unique'
	),
	'limit'     => array(
		'label' => __( 'Limit', 'cultivation' ),
		'desc'  => __( 'Enter the limit', 'cultivation' ),
		'type'  => 'short-text',
		'value' => '12',
	),
	'columns'   => array(
		'label'   => __( 'Columns', 'cultivation' ),
		'desc'    => __( 'Enter the columns', 'cultivation' ),
		'type'    => 'short-select',
		'value'   => '4',
		'choices' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
		)
	),
	'orderby'   => array(
		'label'   => __( 'Order by', 'cultivation' ),
		'desc'    => __( 'Select the order by', 'cultivation' ),
		'type'    => 'short-select',
		'value'   => 'title',
		'choices' => array(
			'title'      => __( 'Title', 'cultivation' ),
			'date'       => __( 'Date', 'cultivation' ),
			'id'         => __( 'Id', 'cultivation' ),
			'menu_order' => __( 'Menu Order', 'cultivation' ),
			'popularity' => __( 'Popularity', 'cultivation' ),
			'rand'       => __( 'Randomly', 'cultivation' ),
			'rating'     => __( 'Rating', 'cultivation' ),
		)
	),
	'class'     => array(
		'label' => __( 'Custom Class', 'cultivation' ),
		'desc'  => __( 'Enter custom CSS class', 'cultivation' ),
		'type'  => 'text',
		'value' => '',
	),
); 