<?php if (!defined('FW')) die('Forbidden');
$options = array(

    'newsletter_style' => array(
            'type'  => 'select',
            'label' => esc_html__('Select Newsletter Style','cultivation'),
            'value' => esc_html__('style_one', 'cultivation'),
                'choices' => array(
                    'style_one' => esc_html__('Style One', 'cultivation'),
                    'style_two' => esc_html__('Style Two', 'cultivation'),
                   ),
            ),
    'newsletter_heading' => array(
    		 'label' => esc_html__('Heading', 'cultivation'),
    	     'type' => 'text',
	        ),
	 'newsletter_subheading' => array(
    		 'label' => esc_html__('Sub Heading', 'cultivation'),
    	     'type' => 'text',
	        ), 
	 'newsletter_second_heading' => array(
    		 'label' => esc_html__('Heading Left', 'cultivation'),
    	     'type' => 'text',
	        ),   
	 'newsletter_apikey' => array(
    		 'label' => esc_html__('Newsletter Apikey', 'cultivation'),
    	     'type' => 'text',
	        ), 
	 'newsletter_listid' => array(
    		 'label' => esc_html__('Newsletter List ID', 'cultivation'),
    	     'type' => 'text',
	        ),         
    );