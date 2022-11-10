<?php if (!defined('FW')) die('Forbidden');

$options = array(
    
    'team_style' => array(
                'type'  => 'select',
                'label' => esc_html__('Select Team Style','cultivation'),
                'value' => esc_html__('style_one', 'cultivation'),
                    'choices' => array(
                        'style_one' => esc_html__('Style One', 'cultivation'),
                        'style_two' => esc_html__('Style Two', 'cultivation'),
                        'style_three' => esc_html__('Style Three', 'cultivation'),
                        'style_four' => esc_html__('Style four', 'cultivation'),
                        'style_five' => esc_html__('Style five', 'cultivation'),
                        'style_six' => esc_html__('Style six', 'cultivation'),
                     ),
                ),
                
    'team_heading' => array(
    		'label' => esc_html__('Heading', 'cultivation'),
    	    'type' => 'text',
	         ),
	'team_shownumber' => array(
    	   'label' => esc_html__('Show of number testimonial', 'cultivation'),
    	   'type' => 'text',
	       ),
	'team_descreption' => array(
    	  'label' => esc_html__('Descreption', 'cultivation'),
    	  'type' => 'textarea',
	      ), 
	'team_imageicon' => array(
            'label' => esc_html__('Upload Icon', 'cultivation'),
            'type' => 'upload',
           ),              
    );