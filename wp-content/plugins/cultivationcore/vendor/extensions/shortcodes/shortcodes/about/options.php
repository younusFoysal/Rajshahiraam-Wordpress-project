<?php if (!defined('FW')) die('Forbidden');

$options = array( 
    'cultivation_pickers' => array(
        'type'  => 'multi-picker',
			'label' => false,
			'desc'  => false,       
			'picker' => array(
			    
			    'aboutus_style' => array(
                    'type'  => 'select',
                    'label' => esc_html__('Select About Style','cultivation'),
                    'value' => esc_html__('style_one', 'cultivation'),
                        'choices' => array(
                            'style_one' => esc_html__('Style One', 'cultivation'),
                            'style_two' => esc_html__('Style Two', 'cultivation'),
                            'style_three' => esc_html__('Style Three', 'cultivation'),
                            'style_four' => esc_html__('Style four', 'cultivation'),
                            'style_five' => esc_html__('Style five', 'cultivation'),
                            'style_six' => esc_html__('Style six', 'cultivation'),
                            'style_seven' => esc_html__('Style seven', 'cultivation'),
                            'style_eight' => esc_html__('Style eight', 'cultivation'),
                            'style_nine' => esc_html__('Style nine', 'cultivation'),
                         ),
                    ),
            ),
        'choices' => array(
            'style_one' => array(
                
                'about_video_url' => array(
    	    	    'type'  => 'text',
    	    	    'label' => esc_html__('About Video Url', 'cultivation'),
	             ),   
    	        'abouts_text' => array(
    		         'type'  => 'text',
    		         'label' => esc_html__('Button Text', 'cultivation'),
    	           ),            
                'abouts_link' => array(
        		     'type'  => 'text',
        		     'label' => esc_html__('Button Linke', 'cultivation'),
        	       ),    
             ),
            'style_two' => array(
                
                'cultivation_title'  => array(
    	              'type'  => 'text',
    	        	  'value' => '',
    	        	  'label' => __('Contact Title', 'cultivation'),
		             ),
		       'cultivation_number'  => array(
    	        	  'type'  => 'text',
    	        	  'value' => '',
    	        	  'label' => __('Contact Number', 'cultivation'),
		              ),  
		       'abouts_text' => array(
    		         'type'  => 'text',
    		         'label' => esc_html__('Button Text', 'cultivation'),
    	             ),            
               'abouts_link' => array(
        		     'type'  => 'text',
        		     'label' => esc_html__('Button Linke', 'cultivation'),
        	        ),          
		                
		        ),  
		   'style_three' => array(
		        'designation'  => array(
        	             'type'  => 'text', 
        	        	 'value' => '',
        	        	 'label' => __('Designation', 'cultivation'),
		                ),
		        'about_names'  => array(
    	        		'type'  => 'text',
    	        		'value' => '',
    	        		'label' => __('Enter Names', 'cultivation'),
		               ),  
		       'about_auth_sign' => array( 
            			 'type'  => 'upload',
            			 'label' => esc_html__( 'Auth Sign', 'cultivation' ),
            			 'desc'  => esc_html__( 'Either upload a new, or choose an   existing image from your media library', 'cultivation' ),
            		   ),        
		        ),
		        
		   'style_four' => array(
		       
		       'cultivation_title'  => array(
    	              'type'  => 'text',
    	        	  'value' => '',
    	        	  'label' => __('Contact Title', 'cultivation'),
		              ),
		       'cultivation_number'  => array(
    	        	  'type'  => 'text',
    	        	  'value' => '',
    	        	  'label' => __('Contact Number', 'cultivation'),
		             ),  
		       'about_video_url' => array(
    	    	    'type'  => 'text',
    	    	    'label' => esc_html__('About Video Url', 'cultivation'),
	               ),  
	           
            ),  
		  'style_five' => array(
	        'about_heading' => array(
            	'label' => esc_html__('About Heading', 'cultivation'),
            	'type' => 'text',
                ),
            'about_descreption' => array(
                'label' => esc_html__('Descreption', 'cultivation'),
                'type' => 'textarea',
	            ), 
	        'about_imageicon' => array(
                'label' => esc_html__('Upload Icon', 'cultivation'),
                'type' => 'upload',
                ),  
	        'abouts_text' => array(
    		         'type'  => 'text',
    		         'label' => esc_html__('Button Text', 'cultivation'),
    	             ),            
            'abouts_link' => array(
        		     'type'  => 'text',
        		     'label' => esc_html__('Button Linke', 'cultivation'),
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
             
             
	        ), 
	       'style_six' => array(
	           
	           'cultivation_title'  => array(
    	               'type'  => 'text',
    	        	   'value' => '',
    	        	   'label' => __('Contact Title', 'cultivation'),
		              ),
		       'cultivation_address' => array(
                        'label' => esc_html__('Enter Address', 'cultivation'),
                        'type' => 'textarea',
                        ),       
		       'cultivation_number'  => array(
    	        	   'type'  => 'text',
    	        	   'value' => '',
    	        	   'label' => __('Contact Number', 'cultivation'),
		             ),
		       'abouts_text' => array(
    		           'type'  => 'text',
    		           'label' => esc_html__('Button Text', 'cultivation'),
    	             ),            
               'abouts_link' => array(
        		       'type'  => 'text',
        		       'label' => esc_html__('Button Linke', 'cultivation'),
        	          ), 
        	    'cultivation_subcontent' =>array( 
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
                        
                            'heading' => array(
                    			  'label' => esc_html__('Enter Heading', 'cultivation'),
                    			  'type' => 'text',
                    			 ),
                    		'descreption' => array(
                    			  'label' => esc_html__('Enter Descreption', 'cultivation'),
                    			  'type' => 'textarea',
                    			 ),
                    		'imageicon' => array(
                                   'label' => esc_html__('Upload Icon', 'cultivation'),
                                   'type' => 'upload',
                                ),
                            
                            ), 
                        ),        
        	          
	                ), 
	           'style_seven' => array(
	                
	                'heading'  => array(
        	               'type'  => 'text',
        	        	   'value' => '',
        	        	   'label' => __('Contact Title', 'cultivation'),
		                   ),
    		       'descreption' => array(
                            'label' => esc_html__('Enter Descreption', 'cultivation'),
                            'type' => 'textarea',
                           ),  
                	'imageicon' => array(
                            'label' => esc_html__('Upload Icon', 'cultivation'),
                            'type' => 'upload',
                            ),
                            
	               ),
	            'style_eight' => array( 
	                
    	               'cultivation_title'  => array(
        	                  'type'  => 'text',
        	        	      'value' => '',
        	        	      'label' => __('Contact Title', 'cultivation'),
    		                 ),
    		           'counter_number' => array(
            				  'label' => esc_html__('Enter Number', 'cultivation'),
            			      'type' => 'text',
            			    ),
            		   'abouts_text' => array(
        		             'type'  => 'text',
        		             'label' => esc_html__('Button Text', 'cultivation'),
        	               ),            
                       'abouts_link' => array(
                		       'type'  => 'text',
                		       'label' => esc_html__('Button Linke', 'cultivation'),
                	          ), 
	                ),
	                
	           'style_nine' => array(
	                
	                'abouts_text' => array(
        		             'type'  => 'text',
        		             'label' => esc_html__('Button Text', 'cultivation'),
        	                ),             
                    'abouts_link' => array(
                		       'type'  => 'text',
                		       'label' => esc_html__('Button Linke', 'cultivation'),
                	          ), 
                    'about_imagenine' => array(
                        'label' => esc_html__('Upload Images', 'cultivation'),
                        'type' => 'upload',
                        ),	          
	               ),
	            ), 
            ),
    'abouts_title' => array(
		  'type'  => 'text',
		  'label' => esc_html__('Title', 'cultivation'),
	   ),  
	'abouts_sub_title' => array(
		  'type'  => 'text',
		  'label' => esc_html__('Sub Title', 'cultivation'),
	      ), 
	'about_heading_icone' => array(  
			'type'  => 'upload',
			'label' => esc_html__( 'Heading Icone', 'cultivation' ),
			'desc'  => esc_html__( 'Either upload a new, or choose an   existing image from your media library', 'cultivation' ),
		    ),      
    'about_image' => array( 
			'type'  => 'upload',
			'label' => esc_html__( 'Upload Image', 'cultivation' ),
			'desc'  => esc_html__( 'Either upload a new, or choose an   existing image from your media library', 'cultivation' ),
		    ),      
	'about_description' =>array(
             'type'  => 'wp-editor',
             'value' => '',
             'attr'  => array('class' => 'custom-class', 'data-foo' => 'bar' ),
             'label' => __('Description', 'cultivation'),
             'help'  => __('Help tip', 'cultivation'),
             ),	     
           
    ); 