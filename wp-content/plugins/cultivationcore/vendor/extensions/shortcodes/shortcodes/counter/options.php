<?php if (!defined('FW')) die('Forbidden');

$options = array(
       'counter_style' => array(
                'type'  => 'select',
                'label' => esc_html__('Select Counter Style','cultivation'),
                'value' => esc_html__('style_one', 'cultivation'),
                    'choices' => array(
                        'style_one' => esc_html__('Style One', 'cultivation'),
                        'style_two' => esc_html__('Style Two', 'cultivation'),
                       ),
                ),
        'counter_heading' => array(
    		   'label' => esc_html__('Heading', 'cultivation'),
    	       'type' => 'text',
	          ),
	   'counter_descreption' => array(
    		   'label' => esc_html__('Descreption', 'cultivation'),
    	       'type' => 'textarea',
	          ), 
	    'counter_imageicon' => array(
              'label' => esc_html__('Upload Icon', 'cultivation'),
              'type' => 'upload',
            ),
            
        'cultivation_counter' =>array( 
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
    			'counter_number' => array(
    				'label' => esc_html__('Enter Number', 'cultivation'),
    				'type' => 'text',
    			 ),
    			'counter_number_unit' => array(
    				'label' => esc_html__('Enter Number Unit', 'cultivation'),
    				'type' => 'text',
    			 ),
    			'counter_title' => array(
    				'label' => esc_html__('Enter Title', 'cultivation'),
    				'type' => 'text',
    			 ),
    			'counterin_imageicon' => array(
                      'label' => esc_html__('Upload Icon', 'cultivation'),
                      'type' => 'upload',
                    ),
    			), 
             ),  
             
            
        );