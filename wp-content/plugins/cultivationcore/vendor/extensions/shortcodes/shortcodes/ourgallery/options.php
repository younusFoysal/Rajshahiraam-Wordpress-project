<?php if (!defined('FW')) die('Forbidden');

$options = array(
   'gallery_style' => array(
            'type'  => 'select',
            'label' => esc_html__('Select Gallery Style','cultivation'),
            'value' => esc_html__('style_one', 'cultivation'),
                'choices' => array(
                    'style_one' => esc_html__('Style One', 'cultivation'),
                    'style_two' => esc_html__('Style Two', 'cultivation'),
                    'style_three' => esc_html__('Style Three', 'cultivation'),
                    'style_four' => esc_html__('Style four', 'cultivation'),
                   ),
            ),  
    'gallery_heading' => array(
    		  'label' => esc_html__('Heading', 'cultivation'),
    	      'type' => 'text',
	          ),
	 'gallery_load_more' => array(
    		  'label' => esc_html__('Show Number Of Gallery', 'cultivation'),
    	      'type' => 'text',
	          ),         
	'gallery_descreption' => array(
    		 'label' => esc_html__('Descreption', 'cultivation'),
    	     'type' => 'textarea',
	         ), 
	'gallery_imageicon' => array(
            'label' => esc_html__('Upload Icon', 'cultivation'),
            'type' => 'upload',
            ),   
    'gallery_category' =>array(
        'type' => 'addable-popup',
        'value' => array(
			array(
				'counter_title' => '',
			  ),
    	  ),
        'label' => esc_html__('Add Gallery Category', 'cultivation'),
        'template' => '',
        'popup-title' => null,
        'size' => 'small',
        'limit' => 0, 
        'add-button-text' => esc_html__('Add', 'cultivation'), 
        'sortable' => true, 
        'popup-options' => array( 
            'gallery_catname' => array(
				'label' => esc_html__('Select Gallery Categorys', 'cultivation'),
				'type' => 'multi-select',
				'population' => 'taxonomy',
                'source' => 'gallery-category',
                'prepopulate' => 9999,
                'limit' => 9999,
			   ),
			'gallery_number' => array(
    		    'label' => esc_html__('Show Number Of Gallery', 'cultivation'),
    	        'type' => 'text',
	          ),  
	          
		    ), 
        ),          
            
    
    );