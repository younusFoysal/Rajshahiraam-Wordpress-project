<?php if (!defined('FW')) die('Forbidden');
$options = array(
    'cultivation_servicepickers' => array(
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
                        'style_three' => esc_html__('Style Three', 'cultivation'),
                        'style_four' => esc_html__('Style four', 'cultivation'),
                        'style_five' => esc_html__('Style five', 'cultivation'),
                        'style_six' => esc_html__('Style six', 'cultivation'),
                        'style_seven' => esc_html__('Style Seven', 'cultivation'),
                        'style_eighth' => esc_html__('Style Eighth', 'cultivation'),
                        ), 
                    ),
            ),
    'choices' => array(
            'style_one' => array(
                'services_oneimages' => array(
                    'label' => esc_html__('Services Images', 'cultivation'),
                    'type' => 'upload',
                   ),  
                ),
            'style_two' => array(
                'services_oneimages' => array(
                    'label' => esc_html__('Services Images', 'cultivation'),
                    'type' => 'upload',
                   ), 
                ),  
            'style_four' => array(
                'services_contact' => array(
                    'label' => esc_html__('Contact Number', 'cultivation'),
                	'type' => 'text',
                    )
                ), 
            'style_five' => array(
                'services_subheading' => array(
                    'label' => esc_html__('Sub Heading', 'cultivation'),
                	'type' => 'text',
                    ),
                'services_button_url' => array(
                    'label' => esc_html__('BUtton Url', 'cultivation'),
                	'type' => 'text',
                    ),
                'services_button_text' => array(
                    'label' => esc_html__('BUtton Text', 'cultivation'),
                	'type' => 'text',
                    ), 
                'services_five_heading' => array(
            	 	  'label' => esc_html__('Heading List', 'cultivation'),
            	      'type' => 'text',
        	        ), 
        	     'services_five_subheading' => array(
            	 	  'label' => esc_html__('Sub Heading List', 'cultivation'),
            	      'type' => 'text',
        	        ),    
                ),
            'style_six' => array(
                'services_admargincalss' => array(
                    'label' => esc_html__('Margin Class', 'cultivation'),
                     'value' => false, 
                	'type' => 'checkbox',
                    ),
                ),
            'style_eighth' => array(
                
                'cv_service' =>array( 
                		'type' => 'addable-popup',
                		'value' => array(
                			array(
                				'partners_title' => '',
                			  ),
                		),
        		'label' => esc_html__('Add Service', 'cultivation'),
        		'template' => '',
        		'popup-title' => null,
        		'size' => 'small', // small, medium, large
        		'limit' => 0, // limit the number of popup`s that can be added
        		'add-button-text' => esc_html__('Add', 'cultivation'), 
        		'sortable' => true,
        		'popup-options' => array(
        		       'service_image' => array(
        				    'type'  => 'upload',
        				    'label' => esc_html__( 'Service Image', 'cultivation' ),
        				    'desc'  => esc_html__('Either upload a new, or choose an existing image from your media library', 'cultivation' )
        			        ),
        			    ), 
        	        ),
                 ),  
                
             ),        
        ),      
    'services_heading' => array(
    	 	 'label' => esc_html__('Heading', 'cultivation'),
    	     'type' => 'text',
	        ),
    'services_shownumber' => array(
    	     'label' => esc_html__('Show of number services', 'cultivation'),
    	     'type' => 'text',
	       ),
	'services_descreption' => array(
    	   'label' => esc_html__('Descreption', 'cultivation'),
    	   'type' => 'wp-editor',
	      ), 
	'services_imageicon' => array(
            'label' => esc_html__('Upload Icon', 'cultivation'),
            'type' => 'upload',
           ), 
            
);