<?php if (!defined('FW')) die('Forbidden');
$options = array(
    'product_style' => array(
        'type'  => 'select',
        'label' => esc_html__('Select Product Style','cultivation'),
        'value' => esc_html__('style_one', 'cultivation'),
            'choices' => array(
              'style_one' => esc_html__('Style One', 'cultivation'),
              'style_two' => esc_html__('Style Two', 'cultivation'),
             ),
        ), 
    'product_heading' => array(
    	  	 'label' => esc_html__('Heading', 'cultivation'),
    	     'type' => 'text',
	       ),
	'product_headingclass' => array(
    	  	 'label' => esc_html__('Heading Add Class', 'cultivation'),
    	     'type' => 'checkbox',
    	     'value' => false,
	        ),      
	'product_shownumber' => array(
    	    'label' => esc_html__('Show of number Product', 'cultivation'),
    	    'type' => 'text',
	       ),
	 'product_loadermore' => array(
    	    'label' => esc_html__('Show Loader More Product', 'cultivation'),
    	    'type' => 'text',
	       ), 
	'product_descreption' => array(
    	   'label' => esc_html__('Descreption', 'cultivation'),
    	   'type' => 'textarea',
	      ), 
	'product_imageicon' => array(
            'label' => esc_html__('Upload Icon', 'cultivation'),
            'type' => 'upload',
           ),    
   );