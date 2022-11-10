<?php if (!defined('FW')) die('Forbidden');
$options = array(
    'contactform_shortcode' => array(
        'label' => esc_html__('Enter Contact Form Shortcode', 'cultivation'),
    	'type' => 'text',
        ),
    'schedule_heading' => array(
        'label' => esc_html__('Enter schedule eading', 'cultivation'),
    	'type' => 'text',
        ), 
    'schedule_information' =>array( 
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
            
            'schedule_day' => array(
    			'label' => esc_html__('Enter Day', 'cultivation'),
    		    'type' => 'text',
    		 ),
    		'schedule_time' => array(
    			'label' => esc_html__('Enter Times', 'cultivation'),
    		    'type' => 'text',
    		 ), 
                
    		), 
         ),  
    'schedule_contacttitle' => array(
          'label' => esc_html__('Enter Contact Heading', 'cultivation'),
    	  'type' => 'text',
          ), 
    'schedule_contactnumber' => array(
          'label' => esc_html__('Enter Contact Number', 'cultivation'),
    	  'type' => 'text',
          ),       
    );