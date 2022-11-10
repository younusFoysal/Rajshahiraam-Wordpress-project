<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'cultivation_information' =>array( 
        'type' => 'addable-popup',
        'value' => array(
    		array(
    			'counter_title' => '',
    		    ),
        ),
        'label' => esc_html__('Add Information', 'cultivation'),
        'template' => '',
        'popup-title' => null,
        'size' => 'small',
        'limit' => 0, 
        'add-button-text' => esc_html__('Add', 'cultivation'), 
        'sortable' => true,
        'popup-options' => array(
                
                'info_title' => array(
        			'label' => esc_html__('Enter Title', 'cultivation'),
        		    'type' => 'text',
        		 ),
        		'info_imageicon' => array(
                    'label' => esc_html__('Upload Icon', 'cultivation'),
                    'type' => 'upload',
                  ),
                'info_details' => array(
        			'label' => esc_html__('Enter Details', 'cultivation'),
        		    'type' => 'wp-editor',
        		 ), 
                
    		), 
         ),  
             
  );