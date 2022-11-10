<?php if (!defined('FW')) die('Forbidden');

$options = array(
    
    'partner_style' => array(
        'type'  => 'select',
        'label' => esc_html__('Select Partner Style','cultivation'),
        'value' => esc_html__('style_one', 'cultivation'),
            'choices' => array(
                'style_one' => esc_html__('Style One', 'cultivation'),
                'style_two' => esc_html__('Style Two', 'cultivation'),
                ),
           ),
    
    'cv_partners' =>array( 
		'type' => 'addable-popup',
		'value' => array(
			array(
				'partners_title' => '',
			  ),
		),
		'label' => esc_html__('Add Partners Logo', 'cultivation'),
		'template' => '',
		'popup-title' => null,
		'size' => 'small', // small, medium, large
		'limit' => 0, // limit the number of popup`s that can be added
		'add-button-text' => esc_html__('Add', 'cultivation'), 
		'sortable' => true,
		'popup-options' => array(
		       'partners_image' => array(
				   'type'  => 'upload',
				   'label' => esc_html__( 'Partners Image', 'cultivation' ),
				   'desc'  => esc_html__('Either upload a new, or choose an existing image from your media library', 'cultivation' )
			      ),
			   'partners_svgicon' => array(
        		      'label' => esc_html__('Svg Icone', 'cultivation'),
        	          'type' => 'textarea',
    	             ),     
			   'website_url' => array(
		           'label' => esc_html__('Web site url', 'cultivation'),
		           'type' => 'text',
	             ),
			 ), 
	      ),
    
    );