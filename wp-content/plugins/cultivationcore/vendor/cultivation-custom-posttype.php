<?php

/**
 * Register post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
add_action( 'init', 'cultivation_custompost_type' );

function cultivation_custompost_type(){
    
    /**
     * Testimonial Custom Post Type
     */ 
    $labels = array(
		'name'               => esc_html__( 'Testimonial', 'cultivation' ),
		'singular_name'      => esc_html__( 'Testimonial', 'cultivation' ),
		'menu_name'          => esc_html__( 'Testimonials', 'cultivation' ),
		'name_admin_bar'     => esc_html__( 'Testimonial', 'cultivation' ),
		'add_new'            => esc_html__( 'Add New', 'testimonial', 'cultivation' ),
		'add_new_item'       => esc_html__( 'Add New Testimonial', 'cultivation' ),
		'new_item'           => esc_html__( 'New Testimonial', 'cultivation' ),
		'edit_item'          => esc_html__( 'Edit Testimonial', 'cultivation' ),
		'view_item'          => esc_html__( 'View Testimonial', 'cultivation' ),
		'all_items'          => esc_html__( 'All Testimonials', 'cultivation' ),
		'search_items'       => esc_html__( 'Search Testimonial', 'cultivation' ),
		'parent_item_colon'  => esc_html__( 'Parent Testimonial:', 'cultivation' ),
		'not_found'          => esc_html__( 'No Testimonials found.', 'cultivation' ),
		'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash.', 'cultivation' )
	   );
 
	$args = array(
		'labels'             => $labels, 
        'description'        => esc_html__('Description.', 'cultivation' ),
		'menu_icon' 		 => 'dashicons-editor-quote', 
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'testimonial'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	   );
	register_post_type( 'testimonial', $args );
	
    /**
     * Team Custom Post Type
     */ 
    $labels = array(
		'name'               => esc_html__( 'Team', 'cultivation' ),
		'singular_name'      => esc_html__( 'Team', 'cultivation' ),
		'menu_name'          => esc_html__( 'Teams', 'cultivation' ),
		'name_admin_bar'     => esc_html__( 'Team', 'cultivation' ),
		'add_new'            => esc_html__( 'Add New', 'team', 'cultivation' ),
		'add_new_item'       => esc_html__( 'Add New Team', 'cultivation' ),
		'new_item'           => esc_html__( 'New Team', 'cultivation' ),
		'edit_item'          => esc_html__( 'Edit Team', 'cultivation' ),
		'view_item'          => esc_html__( 'View Team', 'cultivation' ),
		'all_items'          => esc_html__( 'All Teams', 'cultivation' ),
		'search_items'       => esc_html__( 'Search Team', 'cultivation' ),
		'parent_item_colon'  => esc_html__( 'Parent Team:', 'cultivation' ),
		'not_found'          => esc_html__( 'No Teams found.', 'cultivation' ),
		'not_found_in_trash' => esc_html__( 'No Teams found in Trash.', 'cultivation' )
	   );
 
	$args = array(
		'labels'             => $labels, 
        'description'        => esc_html__('Description.', 'cultivation' ),
		'menu_icon' 		 => 'dashicons-image-filter', 
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'team'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	   );
	register_post_type( 'team', $args );
	
	/**
     * Gallery Custom Post Type
     */ 
    $labels = array(
		'name'               => esc_html__( 'Gallery', 'cultivation' ),
		'singular_name'      => esc_html__( 'Gallery', 'cultivation' ),
		'menu_name'          => esc_html__( 'Galleries', 'cultivation' ),
		'name_admin_bar'     => esc_html__( 'Gallery', 'cultivation' ),
		'add_new'            => esc_html__( 'Add New', 'gallery', 'cultivation' ),
		'add_new_item'       => esc_html__( 'Add New Gallery', 'cultivation' ),
		'new_item'           => esc_html__( 'New Gallery', 'cultivation' ),
		'edit_item'          => esc_html__( 'Edit Gallery', 'cultivation' ),
		'view_item'          => esc_html__( 'View Gallery', 'cultivation' ),
		'all_items'          => esc_html__( 'All Galleries', 'cultivation' ),
		'search_items'       => esc_html__( 'Search Gallery', 'cultivation' ),
		'parent_item_colon'  => esc_html__( 'Parent Gallery:', 'cultivation' ),
		'not_found'          => esc_html__( 'No Gallery found.', 'cultivation' ),
		'not_found_in_trash' => esc_html__( 'No Gallery found in Trash.', 'cultivation' )
	   );
 
	$args = array(
		'labels'             => $labels, 
        'description'        => esc_html__('Description.', 'cultivation' ),
		'menu_icon' 		 => 'dashicons-format-gallery', 
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'gallery'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	   );
	register_post_type( 'gallery', $args );
    
    /**
     * Gallery taxonomy  
     */ 
    register_taxonomy ('gallery-category', 
		     array ('gallery'), 
    		      array (
    			  'hierarchical' => true,
    			  'label' =>esc_html__('Gallery Categories', 'cultivation'),
    			  'singular_label' =>esc_html__( 'Gallery Categories', 'cultivation' ),
    			  'rewrite' => true
    			  )
		       );	 
		     
	/**
	 * Price Plane Custom Post Type
	 */ 
	$labels = array(
		'name'               => esc_html__( 'Plane', 'cultivation' ),
		'singular_name'      => esc_html__( 'Plane', 'cultivation' ),
		'menu_name'          => esc_html__( 'Planes', 'cultivation' ),
		'name_admin_bar'     => esc_html__( 'Plane', 'cultivation' ),
		'add_new'            => esc_html__( 'Add New', 'Plane', 'cultivation' ),
		'add_new_item'       => esc_html__( 'Add New Plane', 'cultivation' ),
		'new_item'           => esc_html__( 'New Plane', 'cultivation' ),
		'edit_item'          => esc_html__( 'Edit Plane', 'cultivation' ),
		'view_item'          => esc_html__( 'View Plane', 'cultivation' ),
		'all_items'          => esc_html__( 'All Planes', 'cultivation' ),
		'search_items'       => esc_html__( 'Search Plane', 'cultivation' ),
		'parent_item_colon'  => esc_html__( 'Parent Plane:', 'cultivation' ),
		'not_found'          => esc_html__( 'No Plane found.', 'cultivation' ),
		'not_found_in_trash' => esc_html__( 'No Plane found in Trash.', 'cultivation' )
	   );
 
	$args = array(
		'labels'             => $labels, 
        'description'        => esc_html__('Description.', 'cultivation' ),
		'menu_icon' 		 => 'dashicons-editor-table', 
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'plane'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	   );
	register_post_type( 'plane', $args );
	
   /**
    * Plane taxonomy  
    */ 
    register_taxonomy ('plane-category', 
          array ('plane'), 
	       array (
			  'hierarchical' => true,
			  'label' =>esc_html__('Plane Categories', 'cultivation'),
			  'singular_label' =>esc_html__( 'Plane Categories', 'cultivation' ),
			  'rewrite' => true
		      )
        );
	
	/**
     * Service Custom Post Type
     */ 
	$labels = array(
		'name'               => esc_html__( 'Service', 'cultivation' ),
		'singular_name'      => esc_html__( 'Service', 'cultivation' ),
		'menu_name'          => esc_html__( 'Services', 'cultivation' ),
		'name_admin_bar'     => esc_html__( 'Plane', 'cultivation' ),
		'add_new'            => esc_html__( 'Add New', 'Service', 'cultivation' ),
		'add_new_item'       => esc_html__( 'Add New Service', 'cultivation' ),
		'new_item'           => esc_html__( 'New Service', 'cultivation' ),
		'edit_item'          => esc_html__( 'Edit Service', 'cultivation' ),
		'view_item'          => esc_html__( 'View Service', 'cultivation' ),
		'all_items'          => esc_html__( 'All Services', 'cultivation' ),
		'search_items'       => esc_html__( 'Search Service', 'cultivation' ),
		'parent_item_colon'  => esc_html__( 'Parent Service:', 'cultivation' ),
		'not_found'          => esc_html__( 'No Service found.', 'cultivation' ),
		'not_found_in_trash' => esc_html__( 'No Service found in Trash.', 'cultivation' )
	   );
 
	$args = array(
		'labels'             => $labels, 
        'description'        => esc_html__('Description.', 'cultivation' ),
		'menu_icon'   => 'dashicons-admin-generic', 
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'service'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	   );
	register_post_type( 'service', $args );
	
	/**
    * Plane taxonomy  
    */ 
    register_taxonomy ('service-category', 
          array ('service'), 
	       array (
			  'hierarchical' => true,
			  'label' =>esc_html__('Service Categories', 'cultivation'),
			  'singular_label' =>esc_html__( 'Service Categories', 'cultivation' ),
			  'rewrite' => true
		      )
        );
}