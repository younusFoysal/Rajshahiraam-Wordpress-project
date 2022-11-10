<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'cultivation_servicepickerstwo' => array(
        'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,       
		'picker' => array(
		    'service_style' => array(
                    'type'  => 'select',
                    'label' => esc_html__('Select Service Style','cultivation'),
                    'value' => esc_html__('style_one', 'cultivation'),
                        'choices' => array(
                            'style_one' => esc_html__('Style One', 'cultivation'),
                            'style_two' => esc_html__('Style Two', 'cultivation'),
                            ), 
                        ),
        ),      
    'choices' => array(  
	    'style_one' => array(
			'cultivation_servicetwo' =>array( 
					'type' => 'addable-popup',
					'value' => array(
						array(
						  'service_title' => '',
						  ), 
					),
			'label' => esc_html__('Add Service', 'cultivation'),
			'template' => '',
			'popup-title' => null,
			'size' => 'small',
			'limit' => 0, 
			'add-button-text' => esc_html__('Add', 'cultivation'), 
			'sortable' => true,
			'popup-options' => array(
				'service_title' => array(
					'label' => esc_html__('Enter Title', 'cultivation'),
					'type' => 'text',
				 ),
			   'service_imageicon' => array(
					  'label' => esc_html__('Upload Icon', 'cultivation'),
					  'type' => 'upload',
					),
				), 
			   ), 
	   
            ),
		'style_two' => array(
		    'cultivation_servicetwo' =>array( 
					'type' => 'addable-popup',
					'value' => array(
						array(
						  'service_title' => '',
						  ), 
					),
			'label' => esc_html__('Add Service', 'cultivation'),
			'template' => '',
			'popup-title' => null,
			'size' => 'small',
			'limit' => 0, 
			'add-button-text' => esc_html__('Add', 'cultivation'), 
			'sortable' => true,
			'popup-options' => array(
				'service_title' => array(
					'label' => esc_html__('Enter Title', 'cultivation'),
					'type' => 'text',
				 ),
			    'service_imageicon' => array(
					  'label' => esc_html__('Upload Icon', 'cultivation'),
					  'type' => 'upload',
					  ),
				'service_description' => array(
					'label' => esc_html__('Enter Description', 'cultivation'),
					'type' => 'textarea',
				   ),	
				'service_buttontext' => array(
					'label' => esc_html__('Enter Button Text', 'cultivation'),
					'type' => 'text',
				 ), 
				'service_button_url' => array(
					'label' => esc_html__('Enter Button Url', 'cultivation'),
					'type' => 'text',
				 ), 
				 
				), 
		    ), 
		 ),	
	  ),
	
    ), 
);