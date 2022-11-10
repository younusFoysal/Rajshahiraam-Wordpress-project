<?php if (!defined('FW')) die('Forbidden');

$options = array(
    
   'support_heading' => array(
		   'label' => esc_html__('Heading', 'cultivation'),
	       'type' => 'text',
          ),
    
    'support_imageicon' => array(
          'label' => esc_html__('Upload Icon', 'cultivation'),
          'type' => 'upload',
        ),
    'support_counter' =>array( 
    		'type' => 'addable-popup',
    		'value' => array(
    			array(
    				'counter_title' => '',
    			   ),
    		),
        'label' => esc_html__('Add Counter', 'cultivation'),
        'template' => '',
        'popup-title' => null,
        'size' => 'small',
        'limit' => 0, 
        'add-button-text' => esc_html__('Add', 'cultivation'), 
        'sortable' => true,
        'popup-options' => array(
            'counter_text' => array(
				'label' => esc_html__('Enter Text', 'cultivation'),
				'type' => 'text',
			    ),
			'counterin_imageicon' => array(
                'label' => esc_html__('Upload Icon', 'cultivation'),
                'type' => 'upload',
                ),
            ), 
         ),  
);