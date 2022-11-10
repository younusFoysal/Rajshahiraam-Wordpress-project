<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'blog_style' => array(
            'type'  => 'select',
            'label' => esc_html__('Select Blog Style','cultivation'),
            'value' => esc_html__('style_one', 'cultivation'),
                'choices' => array(
                    'style_one' => esc_html__('Style One', 'cultivation'),
                    'style_two' => esc_html__('Style Two', 'cultivation'),
                    'style_three' => esc_html__('Style Three', 'cultivation'),
                  ),
        ),  
    'blog_heading' => array(
    		'label' => esc_html__('Heading', 'cultivation'),
    	    'type' => 'text', 
	         ),
	'blog_shownumber' => array(
    	   'label' => esc_html__('Show of number Blog', 'cultivation'),
    	   'type' => 'text',
	       ),
	'blog_descreption' => array(
    	  'label' => esc_html__('Descreption', 'cultivation'),
    	  'type' => 'textarea',
	      ), 
	'blog_imageicon' => array(
            'label' => esc_html__('Upload Icon', 'cultivation'),
            'type' => 'upload',
           ),                
                
        );