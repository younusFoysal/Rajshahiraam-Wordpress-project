<?php if (!defined('FW')) die('Forbidden'); 

$service_style = '';
if(!empty($atts['cultivation_servicepickers']['service_style'])):
	$service_style = $atts['cultivation_servicepickers']['service_style'];
endif; 
$services_heading = ''; 
if(!empty($atts['services_heading'])):
	$services_heading = $atts['services_heading']; 
endif; 
$services_shownumber = '';
if(!empty($atts['services_shownumber'])):
	$services_shownumber = $atts['services_shownumber'];
endif; 
$services_descreption = '';
if(!empty($atts['services_descreption'])):
	$services_descreption = $atts['services_descreption'];
endif; 
$services_imageicon = '';
if(!empty($atts['services_imageicon']['url'])):
  $services_imageicon = $atts['services_imageicon']['url'];
endif; 
switch ($service_style) { 
case 'style_one':
$services_oneimages = '';
if(!empty($atts['cultivation_servicepickers']['style_one']['services_oneimages']['url'])):
$services_oneimages = $atts['cultivation_servicepickers']['style_one']['services_oneimages']['url'];
endif;  
?>
<!--Services-->
<div class="clv_service_wrapper clv_section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				    <?php if(!empty($services_heading)): ?>
					  <h3><?php echo __($services_heading); ?></h3>
					<?php endif;
					if(!empty($services_imageicon)):
					?><div class="clv_underline"><img src="<?php echo esc_url($services_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif; 
					if(!empty($services_descreption)):
					?><?php echo __($services_descreption); ?>
					<?php endif; ?>
				</div> 
			</div>
		</div>
		<div class="service_main_wrapper">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="row">
					<?php
    				$args = array(
                        'post_type' =>'service',
                        'order'   => 'ASC',
                        'posts_per_page' => $services_shownumber
                        );
    				$cv_query = new WP_Query($args);
    				if($cv_query->have_posts() ) :
                        while($cv_query->have_posts()): $cv_query->the_post();
                        if(function_exists( 'fw_get_db_post_option' )):	
                            $services_post_data = fw_get_db_post_option(get_the_ID()); 
                        endif;
                        $headingimage = '';
                        if(!empty($services_post_data['services_imageheading']['url'])):
                        $headingimage = $services_post_data['services_imageheading']['url'];
                        endif;
                        if(has_post_thumbnail(get_the_ID())):
                            $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                            if(function_exists('cultivation_aq_resize')):
            			      $thum_image = cultivation_aq_resize($attachment_url, 56, 56, true);
            			    else:
            			      $thum_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
            			    endif;
            			    
            			endif;	
            		?><div class="col-md-6">
						<div class="service_block">
						    <?php if(!empty($thum_image)): ?>
							<span></span>
							<div class="service_icon"><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
						    <?php endif; ?>
							<h4><?php the_title(); ?></h4>
							<?php if(!empty($headingimage)): ?>
							   <div class="clv_underline"><img src="<?php echo esc_url($headingimage); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
							<?php endif; ?>
							<?php the_content(); ?>
						</div>
					</div>
					<?php 
					endwhile;
					  wp_reset_postdata();
				 	endif;
		            ?>	
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
				    <?php if(!empty($services_oneimages)): ?>
					<div class="service_girl_img">
						<img src="<?php echo esc_url($services_oneimages); ?>" alt="<?php esc_attr__('image','cultivation'); ?>" />
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
break;
case 'style_two':
$services_oneimages = '';
if(!empty($atts['cultivation_servicepickers']['style_two']['services_oneimages']['url'])):
    $services_oneimages = $atts['cultivation_servicepickers']['style_two']['services_oneimages']['url'];
endif; 
?>
<div class="agri_service_wrapper clv_section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				     <?php if(!empty($services_heading)): ?>
					  <h3><?php echo esc_html($services_heading); ?></h3>
					 <?php endif; ?>
					 <div class="clv_underline"><img src="<?php echo esc_url($services_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					  <?php if(!empty($services_descreption)): ?>
					     <?php echo __($services_descreption); ?>
					 <?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-lg-6 col-md-6">
				<div class="agri_service_inner">
					<div class="row">
					<?php
    				$args = array(
                        'post_type' =>'service',
                        'order'   => 'ASC',
                        'posts_per_page' => $services_shownumber
                        );
    				$cv_query = new WP_Query($args);
    				if($cv_query->have_posts() ) :
                        while($cv_query->have_posts()): $cv_query->the_post();
                        if(function_exists( 'fw_get_db_post_option' )):	
                            $services_post_data = fw_get_db_post_option(get_the_ID()); 
                        endif;
                        $headingimage = '';
                        if(!empty($services_post_data['services_imageheading']['url'])):
                            $headingimage = $services_post_data['services_imageheading']['url'];
                        endif;
                        if(has_post_thumbnail(get_the_ID())):
                            $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                            if(function_exists('cultivation_aq_resize')):
            			       $thum_image = cultivation_aq_resize($attachment_url, 60, 60, false);
            			    else:
            			      $thum_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');  
            			    endif;
            			    
            			endif;	
            		?>    
					<div class="col-md-6">
						<div class="agri_service_section spacer">
							<div class="agri_service_block">
							    <?php if(!empty($thum_image)): ?>
								<div class="agrice_service_image">
									<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
								</div>
								<?php endif; ?>
								<h4><?php the_title(); ?></h4>
							</div>
						</div>
					</div>
					<?php 
					endwhile;
					  wp_reset_postdata();
				 	endif;
		            ?>		
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if(!empty($services_oneimages)): ?>
    	<div class="agri_boy_image">
    		<img src="<?php echo esc_url($services_oneimages); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    	</div>
	<?php endif; ?>
</div>
<?php
break;
case 'style_three':
?>
<div class="garden_service2_wrapper clv_section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
			     <?php if(!empty($services_heading)): ?>
				  <h3><?php echo __($services_heading); ?></h3>
				  <?php endif;
				  if(!empty($services_imageicon)):
			 	   ?><div class="clv_underline"><img src="<?php echo esc_url($services_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
				 <?php endif; 
				  if(!empty($services_descreption)):
				  ?><?php echo __($services_descreption); ?>
				 <?php endif;  ?>
			    </div>
		    </div>
		    </div>
		<div class="garden_service2_section">
			<div class="row">
			    <?php
				$args = array(
                    'post_type' =>'service',
                    'order'   => 'ASC',
                    'posts_per_page' => $services_shownumber
                    );
				$cv_query = new WP_Query($args);
				if($cv_query->have_posts() ) :
                    while($cv_query->have_posts()): $cv_query->the_post();
                    if(function_exists( 'fw_get_db_post_option' )):	
                        $services_post_data = fw_get_db_post_option(get_the_ID()); 
                    endif;
                    $headingimage = '';
                    if(!empty($services_post_data['services_backgroundimage']['url'])):
                        $headingimage = $services_post_data['services_backgroundimage']['url'];
                    endif;
                    if(has_post_thumbnail(get_the_ID())): 
                        $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                        
                        if(function_exists('cultivation_aq_resize')):
            			   $thum_image = cultivation_aq_resize($attachment_url, 60, 60, false);
            			else:
            			   $thum_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');  
            			endif;
        			endif;	
        			$backgroundimage = '';
        			if(!empty($headingimage)):
        			  $backgroundimage = 'style="background: url('.esc_url($headingimage).') no-repeat center;"';
        			endif;
            	?>    
			    <div class="col-md-4" >
					<div class="service2_block" <?php printf($backgroundimage); ?> > 
					    <?php if(!empty($thum_image)): ?>
						<div class="service2_image"><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
						<?php endif; ?>
						<div class="service2_content">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
						</div>
					</div>
				</div> 
			    <?php 
			    endwhile;
				 wp_reset_postdata();
			 	endif;
	            ?>	
			</div>
		</div>
	
</div>
</div>
<?php
break;
case 'style_four':
$services_contact = '';
if(!empty($atts['cultivation_servicepickers']['style_four']['services_contact'])):
   $services_contact = $atts['cultivation_servicepickers']['style_four']['services_contact'];
endif;   
?>
<div class="org_service_wrapper clv_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="org_left_service">
					<div class="service_description">
					    <?php if(!empty($services_heading)): ?>
					    <h3><?php echo __($services_heading); ?></h3>
						<?php endif;
						if(!empty($services_imageicon)):
						?><img src="<?php echo esc_url($services_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
						<?php endif;
						if(!empty($services_descreption)):
						?><p><?php echo __($services_descreption); ?></p>
						<?php endif; ?> 
					</div>
					<?php if(!empty($services_contact)): ?>
					<div class="service_contact">
					    <span>
						<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 480.56 480.56" style="enable-background:new 0 0 480.56 480.56;" xml:space="preserve"  width="32px" height="32px">
						    <g><g>
						    <path d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8
										c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4
										c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8
										c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3
										c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9
										c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z"/>
						    <path d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1
										c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z"/>
						    <path d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5
										l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z"/>
							</g></g>
						</svg>
						</span>
						<h4><?php echo esc_html($services_contact); ?></h4>
					</div>
					<?php endif; ?>
				</div>
			</div> 
			<div class="col-lg-8 col-md-8">
				<div class="org_right_service">
					<div class="row">
					<?php
    				$args = array(
                        'post_type' =>'service',
                        'order'   => 'ASC',
                        'posts_per_page' => $services_shownumber
                        );
    				$cv_query = new WP_Query($args);
    				if($cv_query->have_posts() ) :
                        while($cv_query->have_posts()): $cv_query->the_post();
                        if(function_exists( 'fw_get_db_post_option' )):	
                            $services_post_data = fw_get_db_post_option(get_the_ID()); 
                        endif;
                        $headingimage = '';
                        if(!empty($services_post_data['services_imageheading']['url'])):
                            $headingimage = $services_post_data['services_imageheading']['url'];
                        endif;
                        if(has_post_thumbnail(get_the_ID())):
                            $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                            
                            if(function_exists('cultivation_aq_resize')):
                			   $thum_image = cultivation_aq_resize($attachment_url, 60, 60, false);
                			else:
                			  $thum_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');  
                			endif; 
            			endif;	
            			?>       
					    <div class="col-md-4">
							 <div class="service_block">
    							<?php if(!empty($thum_image)): ?>
    							<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    							<?php endif; ?>
    							<h3><?php the_title(); ?></h3>
    							<?php the_content(); ?>
						     </div>
						</div>
						<?php 
        			    endwhile; 
        				 wp_reset_postdata();
        			 	endif;
        	            ?>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
break;
case 'style_five':
$services_subheading = '';
if(!empty($atts['cultivation_servicepickers']['style_five']['services_subheading'])):
   $services_subheading = $atts['cultivation_servicepickers']['style_five']['services_subheading'];
endif; 
$services_button_url = '';
if(!empty($atts['cultivation_servicepickers']['style_five']['services_button_url'])):
   $services_button_url = $atts['cultivation_servicepickers']['style_five']['services_button_url'];
endif;  
$services_button_text = '';
if(!empty($atts['cultivation_servicepickers']['style_five']['services_button_text'])):
   $services_button_text = $atts['cultivation_servicepickers']['style_five']['services_button_text'];
else:
   $services_button_text = esc_html__('read more','cultivation'); 
endif;  
$services_five_heading = '';
if(!empty($atts['cultivation_servicepickers']['style_five']['services_five_heading'])):
   $services_five_heading = $atts['cultivation_servicepickers']['style_five']['services_five_heading'];
endif; 
$services_five_subheading = '';
if(!empty($atts['cultivation_servicepickers']['style_five']['services_five_subheading'])):
   $services_five_subheading = $atts['cultivation_servicepickers']['style_five']['services_five_subheading'];
endif; 
?>
<div class="coffee_service_wrapper clv_section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="coffee_service_content">
				    <?php if(!empty($services_subheading)): ?>
					   <h6><?php echo esc_html($services_subheading); ?></h6>
					<?php endif; 
					if(!empty($services_heading)):
					?><h5><?php echo esc_html($services_heading); ?></h5>
					<?php 
					endif;
				    if(!empty($services_descreption)): 
				       echo __($services_descreption); 
				    endif; 
					if(!empty($services_button_url)): ?>
					   <a href="<?php echo esc_url($services_button_url); ?>"><?php echo esc_html($services_button_text); ?></a>
					<?php endif; ?>
					<div class="coffee_service_section">
					     <?php if(!empty($services_five_heading)): ?>
						  <h3><?php echo esc_html($services_five_heading); ?></h3>
						 <?php 
						 endif; 
						 if(!empty($services_five_subheading)): ?>
						  <h4><?php echo esc_html($services_five_subheading); ?></h4>
						    <?php endif; 
						    $args = array(
                                'post_type' =>'service',
                                'order'   => 'ASC',
                                'posts_per_page' => $services_shownumber
                                );
            			    $cv_query = new WP_Query($args);
            			    if($cv_query->have_posts() ) :
						    ?>
						   <div class="coffee_service_block">
						    <?php
                                while($cv_query->have_posts()): $cv_query->the_post();
                                if(function_exists( 'fw_get_db_post_option' )):	
                                    $services_post_data = fw_get_db_post_option(get_the_ID()); 
                                endif;
                                $headingimage = '';
                                if(!empty($services_post_data['services_imageheading']['url'])):
                                    $headingimage = $services_post_data['services_imageheading']['url'];
                                endif;
                                $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');  
                                $thum_image = '';
                                if(function_exists('cultivation_aq_resize')):
                			         $thum_image = cultivation_aq_resize($attachment_url, 60, 60, false);
                			    else:
                			         $thum_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');  
                			    endif; 	
                    		?>   
						    <div class="service_icon">
							   <span><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span>
							   <h3><?php the_title(); ?></h3>
							</div>
							<?php 
            			    endwhile; 
            				wp_reset_postdata();
            			    ?>	
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
			    <?php if(!empty($services_imageicon)): ?>
				<div class="coffee_service_image">
					<img src="<?php echo esc_url($services_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php
break;   
case 'style_six':
$services_margin = '';
if(!empty($atts['cultivation_servicepickers']['style_six']['services_admargincalss'])):
$services_margin = $atts['cultivation_servicepickers']['style_six']['services_admargincalss'];
endif;
$services_admargincalss = '';
if($services_margin == true):
 $services_admargincalss = esc_html__('services_admargincalss','cultivation');
endif;
?>
<div class="container">
     <div class="garden_service_wrapper <?php echo esc_attr($services_admargincalss); ?>">
    	<div class="row">
    	    <?php 
		    $args = array(
                'post_type' =>'service',
                'order'   => 'ASC',
                'posts_per_page' => $services_shownumber
                );
		    $cv_query = new WP_Query($args);
		    if($cv_query->have_posts() ) :
		     while($cv_query->have_posts()): $cv_query->the_post();  
    		    if(function_exists( 'fw_get_db_post_option' )):	
                    $services_post_data = fw_get_db_post_option(get_the_ID()); 
                endif;
                $headingimage = '';
                if(!empty($services_post_data['services_imageheading']['url'])):
                    $headingimage = $services_post_data['services_imageheading']['url'];
                endif;
                if(has_post_thumbnail(get_the_ID())):
                    $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    
                    if(function_exists('cultivation_aq_resize')):
                		$thum_image = cultivation_aq_resize($attachment_url, 64, 70, false);
                	else: 
                	    $thum_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');  
                	endif; 
    			    
    			endif;	
		      ?>
    		  <div class="col-lg-4 col-md-4">
    			<div class="garden_service_block">
    			    <?php if(!empty($thum_image)): ?>
        				<div class="service_image">
        					<span><img src="<?php echo esc_url($thum_image); ?>" alt="<?php the_title_attribute(); ?>" /></span>
        				</div>
        			<?php endif; ?>
    				<h3><?php the_title(); ?></h3>
    				<?php the_content(); ?>
    			</div>
    		</div>
    		 <?php 
		     endwhile; 
		 	  wp_reset_postdata();
			 endif;
		     ?>	
    	 </div>
     </div>
</div>
<?php
break; 
case 'style_seven':
?>
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-9">
		<div class="footer_service_wrapper">
			<div class="row">
			    <?php 
    		    $args = array(
                    'post_type' =>'service',
                    'order'   => 'ASC',
                    'posts_per_page' => $services_shownumber
                    );
    		    $cv_query = new WP_Query($args);
    		    if($cv_query->have_posts() ) :
    		     while($cv_query->have_posts()): $cv_query->the_post();  
        		    if(function_exists( 'fw_get_db_post_option' )):	
                        $services_post_data = fw_get_db_post_option(get_the_ID()); 
                    endif;
                    $headingimage = '';
                    if(!empty($services_post_data['services_imageheading']['url'])):
                        $headingimage = $services_post_data['services_imageheading']['url'];
                    endif;
                    if(has_post_thumbnail(get_the_ID())):
                        $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                        
                        if(function_exists('cultivation_aq_resize')):
                	  	   $thum_image = cultivation_aq_resize($attachment_url, 50, 50, false);
                    	else: 
                	        $thum_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');  
                	    endif;
        			    
        			endif;	
        		if(!empty($thum_image)):
    		    ?>
    		    <div class="col-md-4">
					<div class="footer_service_block">
					    <img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
						<h4><?php the_title(); ?></h4>
					</div>
				</div>
    			<?php 
    			endif;
    		    endwhile; 
    		 	 wp_reset_postdata();
    		    endif;
    		   ?>	
			</div>
		</div>
	</div>
  </div>
</div>
<?php
break; 
case 'style_eighth':
$services_images = '';
if(!empty($atts['cultivation_servicepickers']['style_eighth']['cv_service'])):
$services_images = $atts['cultivation_servicepickers']['style_eighth']['cv_service'];
endif;  
?>
<!--Dairy Service-->
<div class="dairy_service_wrapper clv_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="service_content">
					<div class="service_heading">
					    <?php if(!empty($services_heading)): ?>
						  <h3><?php echo esc_html($services_heading); ?></h3>
					    <?php endif;
					     if(!empty($services_imageicon)):
					    ?><div class="clv_underline">
					        <img src="<?php echo esc_url($services_imageicon); ?>" alt="<?php esc_attr__('image','cultivation'); ?>" /></div>
					    <?php endif;
					    if(!empty($services_images)):
					    ?>
						<!-- Add Arrows -->
						<div class="service_arrow_block">
						   <span class="dairy_service_arrow dairy_service_left">
							<svg 
								 xmlns="http://www.w3.org/2000/svg"
								 xmlns:xlink="http://www.w3.org/1999/xlink"
								 width="10px" height="15px">
								<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
								 d="M0.324,8.222 L7.117,14.685 C7.549,15.097 8.249,15.097 8.681,14.685 C9.113,14.273 9.113,13.608 8.681,13.197 L2.670,7.478 L8.681,1.760 C9.113,1.348 9.113,0.682 8.681,0.270 C8.249,-0.139 7.548,-0.139 7.116,0.270 L0.323,6.735 C0.107,6.940 -0.000,7.209 -0.000,7.478 C-0.000,7.747 0.108,8.017 0.324,8.222 Z"/>
							 </svg>
							</span>
							<span class="dairy_service_arrow dairy_service_right">
								<svg 
								 xmlns="http://www.w3.org/2000/svg"
								 xmlns:xlink="http://www.w3.org/1999/xlink"
								 width="19px" height="25px">
								<path fill-rule="evenodd" fill="rgb(226, 226, 226)"
								 d="M13.676,13.222 L6.883,19.685 C6.451,20.097 5.751,20.097 5.319,19.685 C4.887,19.273 4.887,18.608 5.319,18.197 L11.329,12.478 L5.319,6.760 C4.887,6.348 4.887,5.682 5.319,5.270 C5.751,4.861 6.451,4.861 6.884,5.270 L13.676,11.735 C13.892,11.940 14.000,12.209 14.000,12.478 C14.000,12.747 13.892,13.017 13.676,13.222 Z"/>
								</svg>
							</span>
						</div>
						<?php endif; ?>
					</div>
					<?php 
					if(!empty($services_descreption)): 
					  printf($services_descreption); 
					endif; 
					?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="dairy_service_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						    <?php if(!empty($services_images)): 
						     foreach($services_images as $imagesrc):
						         
						       if(!empty($imagesrc['service_image']['url'])): ?>
						      <div class="swiper-slide">
    							<div class="dairy_service_slide"><img src="<?php echo esc_url($imagesrc['service_image']['url']); ?>" alt="<?php echo esc_attr__('image','cultivation'); ?>" /></div>
    						 </div>
							<?php 
						    	endif;
							endforeach;
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Dairy Gallery-->
<?php
break;     
default;
$services_oneimages = '';
if(!empty($atts['cultivation_servicepickers']['style_one']['services_oneimages']['url'])):
    $services_oneimages = $atts['cultivation_servicepickers']['style_one']['services_oneimages']['url'];
endif;  
?> 
<!--Services-->
<div class="clv_service_wrapper clv_section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				<?php if(!empty($services_heading)): ?>
				<h3><?php echo __($services_heading); ?></h3>
				<?php endif;
				if(!empty($services_imageicon)):
				?><div class="clv_underline"><img src="<?php echo esc_url($services_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
				<?php endif; 
				if(!empty($services_descreption)):
				?><p><?php echo __($services_descreption); ?></p>
				<?php endif; ?>
				</div> 
			</div>
		</div>
		<div class="service_main_wrapper">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="row">
					<?php
    				$args = array(
                        'post_type' =>'service',
                        'order'   => 'ASC',
                        'posts_per_page' => $services_shownumber
                        );
    				$cv_query = new WP_Query($args);
    				if($cv_query->have_posts() ) :
                        while($cv_query->have_posts()): $cv_query->the_post();
                        if(function_exists( 'fw_get_db_post_option' )):	
                            $services_post_data = fw_get_db_post_option(get_the_ID()); 
                        endif;
                        $headingimage = '';
                        if(!empty($services_post_data['services_imageheading']['url'])):
                            $headingimage = $services_post_data['services_imageheading']['url'];
                        endif;
                        if(has_post_thumbnail(get_the_ID())):
                            $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                            
                        if(function_exists('cultivation_aq_resize')):
                	  	    $thum_image = cultivation_aq_resize($attachment_url, 60, 60, false);
                    	else: 
                	        $thum_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');  
                	    endif;
            			    
            			endif;	
            	 	?><div class="col-md-6">
						<div class="service_block">
						    <?php if(!empty($thum_image)): ?>
							<span></span>
							<div class="service_icon"><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
						    <?php endif; ?>
							<h4><?php the_title(); ?></h4>
							<?php if(!empty($headingimage)): ?>
							   <div class="clv_underline"><img src="<?php echo esc_url($headingimage); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
							<?php endif; ?>
							<?php the_content(); ?>
						</div>
					</div>
					<?php 
					endwhile;
					  wp_reset_postdata();
				 	endif;
		            ?>	
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
				    <?php if(!empty($services_oneimages)): ?>
					<div class="service_girl_img">
						<img src="<?php echo esc_url($services_oneimages); ?>" alt="<?php esc_attr__('image','cultivation'); ?>" />
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}