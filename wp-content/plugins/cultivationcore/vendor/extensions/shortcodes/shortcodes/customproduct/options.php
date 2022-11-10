<?php if (!defined('FW')) die('Forbidden');

    $options = array(
       
        'product_heading' => array(
    		   'label' => esc_html__('Heading', 'cultivation'),
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
            
        'cultivation_product' =>array( 
        		'type' => 'addable-popup',
        		'value' => array(
        			array(
        				'counter_title' => '',
        			  ),
        		),
            'label' => esc_html__('Add Product', 'cultivation'),
                'template' => '',
                'popup-title' => null,
                'size' => 'small',
                'limit' => 0, 
                'add-button-text' => esc_html__('Add', 'cultivation'), 
                'sortable' => true,
                'popup-options' => array(
        			'product_title' => array(
        				'label' => esc_html__('Enter Title', 'cultivation'),
        				'type' => 'text',
        			  ),
        			 'product_descreption' => array(
            		     'label' => esc_html__('Descreption', 'cultivation'),
            	         'type' => 'textarea',
	                     ), 
	                'product_imageicon' => array(
                          'label' => esc_html__('Product Image', 'cultivation'),
                          'type' => 'upload',
                         ),  
        			'product_bg_imageicon' => array(
                          'label' => esc_html__('Product Bg Image', 'cultivation'),
                          'type' => 'upload',
                         ),
                    'product_buttontext' => array(
        				 'label' => esc_html__('Enter Button Text', 'cultivation'),
        				 'type' => 'text',
        			    ),
        		    'product_buttonurl' => array(
        				'label' => esc_html__('Enter Button Url', 'cultivation'),
        				'type' => 'text',
        			   ),
        			 
        			), 
                 ),  
             
    );