<?php if (!defined('FW')) die('Forbidden');
$options = array(
   'breadcrumb_bgimage' => array(
        'label' => esc_html__('Bread crumb Background image', 'cultivation'),
        'type' => 'upload',
       ),
    'breadcrumb_padding' => array(
        'label' => esc_html__('Set BreadCrumb Padding','cultivation'),
        'type' => 'text',
        'desc'  => __('ex :- padding: 53px 0px 47px', 'cultivation'),
      ),   
 );