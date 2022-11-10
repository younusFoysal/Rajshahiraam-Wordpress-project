<?php if (!defined('FW')) die('Forbidden');

$team_style = '';
if(!empty($atts['team_style'])):
   $team_style = $atts['team_style'];
endif; 
$team_heading = '';
if(!empty($atts['team_heading'])):
   $team_heading = $atts['team_heading'];
endif;
$team_descreption = '';
if(!empty($atts['team_descreption'])):
   $team_descreption = $atts['team_descreption'];
endif;
$team_shownumber = '';
if(!empty($atts['team_shownumber'])):
   $team_shownumber = $atts['team_shownumber'];
endif;
$team_imageicon = '';
if(!empty($atts['team_imageicon']['url'])):
   $team_imageicon = $atts['team_imageicon']['url'];
endif;

switch ($team_style) {
case 'style_one':
?>
<!--team style one -->
<div class="clv_team_wrapper clv_section"> 
	<div class="container">
	    <?php if(!empty($team_heading) || !empty($team_imageicon) || !empty($team_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading ">
					    <?php if(!empty($team_heading)): ?>
					    <h3><?php echo esc_html($team_heading); ?></h3>
						<?php endif; 
						if(!empty($team_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($team_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($team_descreption)):
						?><?php echo esc_html($team_descreption); ?>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		<?php endif; ?> 
		<div class="row">
			<div class="col-md-12">
				<div class="team_section">
					<div class="row">
					    <?php
    				    $args = array(
                           'post_type' =>'team',
                           'order'   => 'ASC',
                           'posts_per_page' => $team_shownumber
                          );
    				    $cv_query = new WP_Query($args);
            		    if($cv_query->have_posts() ) :
                           while($cv_query->have_posts()): $cv_query->the_post();
                           
                            if(function_exists( 'fw_get_db_post_option' )):	
                               $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                            endif;
                            $designation = '';
                            if(!empty($testimonial_post_data['tm_designation'])):
                               $designation = $testimonial_post_data['tm_designation'];
                            endif;
                            $tm_emailaddress = '';
                            if(!empty($testimonial_post_data['tm_emailaddress'])):
                                $tm_emailaddress = $testimonial_post_data['tm_emailaddress'];
                            endif;
                            $tm_twitter = '';
                            if(!empty($testimonial_post_data['tm_twitter'])):
                                $tm_twitter = $testimonial_post_data['tm_twitter'];
                            endif;
                            $tm_facebook = '';
                            if(!empty($testimonial_post_data['tm_facebook'])):
                                $tm_facebook = $testimonial_post_data['tm_facebook'];
                            endif;
                            $tm_linkedin = '';
                            if(!empty($testimonial_post_data['tm_linkedin'])):
                                $tm_linkedin = $testimonial_post_data['tm_linkedin'];
                            endif;
                            $tm_youtube = '';
                            if(!empty($testimonial_post_data['tm_youtube'])):
                                $tm_youtube = $testimonial_post_data['tm_youtube'];
                            endif;
                            if(has_post_thumbnail(get_the_ID())):
                                 $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
            			         $thum_image = cultivation_aq_resize($attachment_url, 270, 304, true);
            			    endif;	
                		?> 
					    <div class="col-md-3">
							<div class="team_block">
								<div class="team_image">
								    <?php if(!empty($thum_image)): ?>
									   <img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
									<?php endif; 
									if(!empty($tm_facebook) || !empty($tm_twitter) || !empty($tm_linkedin) || !empty($tm_youtube) ):
									?>
									<div class="social_overlay">
										<p><?php echo esc_html('you can join us','cultivation'); ?></p>
										<ul>
										<?php if(!empty($tm_facebook)): ?>
										<li><a href="<?php echo esc_url($tm_facebook); ?>"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
									    <?php endif;
										if(!empty($tm_twitter)):
										?><li><a href="<?php echo esc_url($tm_twitter); ?>"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
										<?php endif; 
										 if(!empty($tm_linkedin)):
										 ?><li><a href="<?php echo esc_url($tm_linkedin); ?>"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
										 <?php endif; 
										 if(!empty($tm_youtube)):
										 ?><li><a href="<?php echo esc_url($tm_youtube); ?>"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
										 <?php endif; ?>
										</ul>
									</div>
									<?php endif; ?>
								</div>
								<div class="team_details">
									<div class="team_name">
										<h3><?php the_title(); ?></h3>
										<p><?php echo esc_html($designation); ?></p>
										<span class="divider"></span>
										<?php if(!empty($tm_emailaddress)): ?>
										   <a href="mailto:<?php echo esc_attr($tm_emailaddress); ?>"><?php echo esc_html($tm_emailaddress); ?></a>
										<?php endif; ?>
									</div>
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
</div> 
<!--team style one -->
<?php
break;
case 'style_two':
?>
<!--team style two -->
<div class="agri_team_wrapper clv_section">
	<div class="container">
		<div class="row">
		    <?php if(!empty($team_heading) || !empty($team_imageicon) || !empty($team_descreption)): ?>
			<div class="col-md-3 col-lg-3">
				<div class="agri_team_content">
					<?php if(!empty($team_heading)): ?>
					<h3><?php echo esc_html($team_heading); ?></h3>
					<?php endif; 
					if(!empty($team_imageicon)): ?>
					<span><img src="<?php echo esc_url($team_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></span>
					<?php
					endif;
					if(!empty($team_descreption)):
					?><?php echo esc_html($team_descreption); ?>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?> 
			<div class="col-md-9 col-lg-9">
				<div class="agri_team_section">
					<div class="row"> 
					   <?php
    				    $args = array(
                           'post_type' =>'team',
                           'order'   => 'ASC',
                           'posts_per_page' => $team_shownumber
                          );
    				    $cv_query = new WP_Query($args);
            		    if($cv_query->have_posts() ) :
                           while($cv_query->have_posts()): $cv_query->the_post();
                            if(function_exists( 'fw_get_db_post_option' )):	
                               $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                            endif;
                            $designation = '';
                            if(!empty($testimonial_post_data['tm_designation'])):
                               $designation = $testimonial_post_data['tm_designation'];
                            endif;
                            $tm_emailaddress = '';
                            if(!empty($testimonial_post_data['tm_emailaddress'])):
                                $tm_emailaddress = $testimonial_post_data['tm_emailaddress'];
                            endif;
                            $tm_twitter = '';
                            if(!empty($testimonial_post_data['tm_twitter'])):
                                $tm_twitter = $testimonial_post_data['tm_twitter'];
                            endif;
                            $tm_facebook = '';
                            if(!empty($testimonial_post_data['tm_facebook'])):
                                $tm_facebook = $testimonial_post_data['tm_facebook'];
                            endif;
                            $tm_linkedin = '';
                            if(!empty($testimonial_post_data['tm_linkedin'])):
                                $tm_linkedin = $testimonial_post_data['tm_linkedin'];
                            endif;
                            $tm_youtube = '';
                            if(!empty($testimonial_post_data['tm_youtube'])):
                                $tm_youtube = $testimonial_post_data['tm_youtube'];
                            endif;
                            if(has_post_thumbnail(get_the_ID())):
                                 $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
            			         $thum_image = cultivation_aq_resize($attachment_url, 270, 353, true);
            			    endif;	
                		?>   
						<div class="col-md-4">
							<div class="agri_team_block">
							    <?php if(!empty($thum_image)): ?>
    								<div class="agri_team_image">
    									<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    								</div>
								<?php endif; ?>
								<div class="agri_team_overlay">
									<h4><?php the_title(); ?></h4>
									<span><?php echo esc_html($designation); ?></span>
									<p><?php esc_html_e('you can join us','cultivation'); ?></p>
									<?php
									if(!empty($tm_facebook) || !empty($tm_twitter) || !empty($tm_linkedin) || !empty($tm_youtube) ):
									?>
									<ul>
									<?php if(!empty($tm_facebook)): ?>
									<li><a href="<?php echo esc_url($tm_facebook); ?>"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
									<?php endif;
									if(!empty($tm_twitter)):
									?><li><a href="<?php echo esc_url($tm_twitter); ?>"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
									<?php endif; 
								    if(!empty($tm_linkedin)):
								    ?><li><a href="<?php echo esc_url($tm_linkedin); ?>"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
								    <?php endif; 
									if(!empty($tm_youtube)):
								     ?><li><a href="<?php echo esc_url($tm_youtube); ?>"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
									<?php endif; ?>
									</ul>
									<?php 
									endif;
									?>
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
</div>
<!--team style two -->
<?php
break;
case 'style_three':
?>
<!--team style three -->
<div class="dairy_team_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($team_heading) || !empty($team_imageicon) || !empty($team_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading ">
					    <?php if(!empty($team_heading)): ?>
					    <h3><?php echo esc_html($team_heading); ?></h3>
						<?php endif; 
						if(!empty($team_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($team_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($team_descreption)):
						?><p><?php echo esc_html($team_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		<?php endif; ?> 
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="dairy_team_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						<?php
    				    $args = array(
                           'post_type' =>'team',
                           'order'   => 'ASC',
                           'posts_per_page' => $team_shownumber
                          );
    				    $cv_query = new WP_Query($args);
            		    if($cv_query->have_posts() ) :
                           while($cv_query->have_posts()): $cv_query->the_post();
                            if(function_exists( 'fw_get_db_post_option' )):	
                               $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                            endif;
                            $designation = '';
                            if(!empty($testimonial_post_data['tm_designation'])):
                               $designation = $testimonial_post_data['tm_designation'];
                            endif;
                            $tm_emailaddress = '';
                            if(!empty($testimonial_post_data['tm_emailaddress'])):
                                $tm_emailaddress = $testimonial_post_data['tm_emailaddress'];
                            endif;
                            $tm_twitter = '';
                            if(!empty($testimonial_post_data['tm_twitter'])):
                                $tm_twitter = $testimonial_post_data['tm_twitter'];
                            endif;
                            $tm_facebook = '';
                            if(!empty($testimonial_post_data['tm_facebook'])):
                                $tm_facebook = $testimonial_post_data['tm_facebook'];
                            endif;
                            $tm_linkedin = '';
                            if(!empty($testimonial_post_data['tm_linkedin'])):
                                $tm_linkedin = $testimonial_post_data['tm_linkedin'];
                            endif;
                            $tm_youtube = '';
                            if(!empty($testimonial_post_data['tm_youtube'])):
                                $tm_youtube = $testimonial_post_data['tm_youtube'];
                            endif;
                            if(has_post_thumbnail(get_the_ID())):
                                 $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
            			         $thum_image = cultivation_aq_resize($attachment_url, 270, 340, true);
            			    endif;	
                		    ?>       
							<div class="swiper-slide">
								<div class="team_slide">
								    <?php if(!empty($thum_image)): ?>
    									<div class="team_image">
    										<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" class="img-fluid" />
    									</div>
									<?php endif; ?>
									<div class="team_details">
										<div class="team_name_block">
											<div class="team_name">
												<h4><?php the_title(); ?></h4>
												<?php ?>
												<span><?php echo esc_html($designation); ?></span>
											</div>
											<?php
        									if(!empty($tm_facebook) || !empty($tm_twitter) || !empty($tm_linkedin) || !empty($tm_youtube) ):
        									?>
        									<div class="team_social">
            								   <ul>
            									<?php if(!empty($tm_facebook)): ?>
            									<li><a href="<?php echo esc_url($tm_facebook); ?>"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
            									<?php endif;
            									if(!empty($tm_twitter)):
            									?><li><a href="<?php echo esc_url($tm_twitter); ?>"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
            									<?php endif; 
            								    if(!empty($tm_linkedin)):
            								    ?><li><a href="<?php echo esc_url($tm_linkedin); ?>"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
            								    <?php endif; 
            									if(!empty($tm_youtube)):
            								     ?><li><a href="<?php echo esc_url($tm_youtube); ?>"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
            									<?php endif; ?>
            								  </ul>
        									</div>
        									<?php 
        									endif;
        									?>
										 </div>
										<div class="team_message">
										 <?php the_content(); ?>
										</div>
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
					<!-- Add Arrows -->
					<span class="slider_arrow team_left left_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="10px" height="20px">
						<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
						 d="M0.272,10.703 L8.434,19.703 C8.792,20.095 9.372,20.095 9.731,19.703 C10.089,19.308 10.089,18.668 9.731,18.274 L2.217,9.990 L9.730,1.706 C10.089,1.310 10.089,0.672 9.730,0.277 C9.372,-0.118 8.791,-0.118 8.433,0.277 L0.271,9.274 C-0.082,9.666 -0.082,10.315 0.272,10.703 Z"/>
						</svg>
					</span>
					<span class="slider_arrow team_right right_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="10px" height="20px">
						<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
						 d="M9.728,10.703 L1.566,19.703 C1.208,20.095 0.627,20.095 0.268,19.703 C-0.090,19.308 -0.090,18.668 0.268,18.274 L7.783,9.990 L0.269,1.706 C-0.089,1.310 -0.089,0.672 0.269,0.277 C0.627,-0.118 1.209,-0.118 1.567,0.277 L9.729,9.274 C10.081,9.666 10.081,10.315 9.728,10.703 Z"/>
						</svg>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!--team style three -->
<?php
break;
case 'style_four':
?>  
<!--team style four -->
<div class="garden_team_wrapper clv_section">
	<div class="container">
		<div class="row">
		<?php if(!empty($team_heading) || !empty($team_imageicon) || !empty($team_descreption)): ?>
			<div class="col-md-3 col-lg-3">
				<div class="team_heading">
					<?php if(!empty($team_heading)): ?>
					<h3><?php echo esc_html($team_heading); ?></h3>
					<?php endif; 
					if(!empty($team_imageicon)): ?>
					   <img src="<?php echo esc_url($team_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
					<?php endif;
					if(!empty($team_descreption)):
					?><p><?php echo esc_html($team_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; 	
		$args = array(
           'post_type' =>'team',
           'order'   => 'ASC',
           'posts_per_page' => $team_shownumber
          );
	    $cv_query = new WP_Query($args);
	    if($cv_query->have_posts() ) :
           while($cv_query->have_posts()): $cv_query->the_post();
            if(function_exists( 'fw_get_db_post_option' )):	
               $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
            endif;
            $designation = '';
            if(!empty($testimonial_post_data['tm_designation'])):
               $designation = $testimonial_post_data['tm_designation'];
            endif;
            $tm_emailaddress = '';
            if(!empty($testimonial_post_data['tm_emailaddress'])):
                $tm_emailaddress = $testimonial_post_data['tm_emailaddress'];
            endif;
            $tm_twitter = '';
            if(!empty($testimonial_post_data['tm_twitter'])):
                $tm_twitter = $testimonial_post_data['tm_twitter'];
            endif;
            $tm_facebook = '';
            if(!empty($testimonial_post_data['tm_facebook'])):
                $tm_facebook = $testimonial_post_data['tm_facebook'];
            endif;
            $tm_linkedin = '';
            if(!empty($testimonial_post_data['tm_linkedin'])):
                $tm_linkedin = $testimonial_post_data['tm_linkedin'];
            endif;
            $tm_youtube = '';
            if(!empty($testimonial_post_data['tm_youtube'])):
                $tm_youtube = $testimonial_post_data['tm_youtube'];
            endif;
            if(has_post_thumbnail(get_the_ID())):
                 $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
		         $thum_image = cultivation_aq_resize($attachment_url, 270, 340, true);
		    endif;	
		    ?>    
			<div class="col-md-3 col-lg-3">
				<div class="garden_team_block">
				    <?php if(!empty($thum_image)): ?>
					   <img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
					<?php endif; ?>
					<div class="garden_team_overlay">
						<h3><?php the_title(); ?></h3>
						<?php if(!empty($designation)): ?>
						  <h6><?php echo esc_html($designation); ?></h6>
						<?php endif; ?>
						<?php the_content(); ?> 
						<?php
						if(!empty($tm_facebook) || !empty($tm_twitter) || !empty($tm_linkedin) || !empty($tm_youtube) ):
						?>
						<ul>
						<?php if(!empty($tm_facebook)): ?>
						<li><a href="<?php echo esc_url($tm_facebook); ?>"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
						<?php endif;
						if(!empty($tm_twitter)):
						?><li><a href="<?php echo esc_url($tm_twitter); ?>"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
						<?php endif; 
						if(!empty($tm_linkedin)):
						?><li><a href="<?php echo esc_url($tm_linkedin); ?>"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
						<?php endif; 
						if(!empty($tm_youtube)):
						?><li><a href="<?php echo esc_url($tm_youtube); ?>"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
						<?php endif; ?>
						</ul>
						<?php endif; ?>
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
<!--team style four -->
<?php    
break;
case 'style_five':
?>
<!--team style five -->
<div class="org_team_wrapper clv_section">
	<div class="container">
		<?php if(!empty($team_heading) || !empty($team_imageicon) || !empty($team_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading ">
					    <?php if(!empty($team_heading)): ?>
					    <h3><?php echo esc_html($team_heading); ?></h3>
						<?php endif; 
						if(!empty($team_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($team_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($team_descreption)):
						?><?php echo esc_html($team_descreption); ?>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		<?php endif; ?>  
		<div class="org_team_section">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="dairy_team_slider org_team_slider">
						<div class="swiper-container">
							<div class="swiper-wrapper">
							<?php
							$args = array(
                                   'post_type' =>'team',
                                   'order'   => 'ASC',
                                   'posts_per_page' => $team_shownumber
                                  );
                    	    $cv_query = new WP_Query($args);
                    	    if($cv_query->have_posts() ) :
                               while($cv_query->have_posts()): $cv_query->the_post();
                                if(function_exists( 'fw_get_db_post_option' )):	
                                   $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                                endif;
                                $designation = '';
                                if(!empty($testimonial_post_data['tm_designation'])):
                                   $designation = $testimonial_post_data['tm_designation'];
                                endif;
                                $tm_emailaddress = '';
                                if(!empty($testimonial_post_data['tm_emailaddress'])):
                                    $tm_emailaddress = $testimonial_post_data['tm_emailaddress'];
                                endif;
                                $tm_twitter = '';
                                if(!empty($testimonial_post_data['tm_twitter'])):
                                    $tm_twitter = $testimonial_post_data['tm_twitter'];
                                endif;
                                $tm_facebook = '';
                                if(!empty($testimonial_post_data['tm_facebook'])):
                                    $tm_facebook = $testimonial_post_data['tm_facebook'];
                                endif;
                                $tm_linkedin = '';
                                if(!empty($testimonial_post_data['tm_linkedin'])):
                                    $tm_linkedin = $testimonial_post_data['tm_linkedin'];
                                endif;
                                $tm_youtube = '';
                                if(!empty($testimonial_post_data['tm_youtube'])):
                                    $tm_youtube = $testimonial_post_data['tm_youtube'];
                                endif;
                                if(has_post_thumbnail(get_the_ID())):
                                     $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    		         $thum_image = cultivation_aq_resize($attachment_url, 270, 285, true);
                    		    endif;	
                    		    ?>       
							    <div class="swiper-slide">
									<div class="org_team_slide">
									    <?php if(!empty($thum_image)): ?>
										<div class="org_team_image">
											<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
											<?php 
											if(!empty($tm_facebook) || !empty($tm_twitter) || !empty($tm_linkedin) || !empty($tm_youtube) ):
											?>
											<div class="org_team_overlay">
												<ul class="org_social_links">
												<?php if(!empty($tm_facebook)): ?>
                            					   <li><a href="<?php echo esc_url($tm_facebook); ?>"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                            					<?php endif;
                            					 if(!empty($tm_twitter)):
                            					?><li><a href="<?php echo esc_url($tm_twitter); ?>"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
                            					<?php endif; 
                            					 if(!empty($tm_linkedin)):
                            					 ?><li><a href="<?php echo esc_url($tm_linkedin); ?>"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
                            					 <?php endif; 
                            					 if(!empty($tm_youtube)):
                            					  ?><li><a href="<?php echo esc_url($tm_youtube); ?>"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
                            					  <?php endif; ?>
												</ul>
											</div>
											<?php endif; ?>
										</div>
										<?php endif; ?>
										<div class="org_team_name">
											<h4><?php the_title(); ?></h4>
											 <?php if(!empty($designation)): ?>
											   <p><?php echo esc_html($designation); ?></p>
											 <?php endif; ?>
                    						<div class="org_social">
    											<ul class="org_social_links">
        										     <?php if(!empty($tm_facebook)): ?>
        											 <li><a href="<?php echo esc_url($tm_facebook); ?>"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
        											 <?php endif;
                            					      if(!empty($tm_twitter)):
                            				         ?>
        											 <li><a href="<?php echo esc_url($tm_twitter); ?>"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
        											 <?php endif; 
                            					     if(!empty($tm_linkedin)):
                            				         ?>
        											  <li><a href="<?php echo esc_url($tm_linkedin); ?>"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
        											 <?php endif; 
                            				          if(!empty($tm_youtube)):
                            				         ?>
        											  <li><a href="<?php echo esc_url($tm_youtube); ?>"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
        										    <?php endif; ?> 
    											</ul>
    										    <?php the_content(); ?>
											</div>
                						  </div>
                					     </div>
                				        </div>
                						<?php  
                            			endwhile;
                            			 wp_reset_postdata();
                            			endif;
                                        ?>  		
						            </div>
					         	<!-- Add Pagination -->
						<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--team style five -->
<?php 
break; 
case 'style_six':
?> 
<!--team style six -->
<div class="dairy_team_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($team_heading) || !empty($team_imageicon) || !empty($team_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading white_heading"> 
					    <?php if(!empty($team_heading)): ?>
					    <h3><?php echo esc_html($team_heading); ?></h3>
						<?php endif; 
						if(!empty($team_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($team_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($team_descreption)):
						?><p><?php echo esc_html($team_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		<?php endif; ?>  
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="dairy_team_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						    <?php
							$args = array(
                                   'post_type' =>'team',
                                   'order'   => 'ASC',
                                   'posts_per_page' => $team_shownumber
                                  );
                    	    $cv_query = new WP_Query($args);
                    	    if($cv_query->have_posts() ) :
                               while($cv_query->have_posts()): $cv_query->the_post();
                                if(function_exists( 'fw_get_db_post_option' )):	
                                   $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                                endif;
                                $designation = '';
                                if(!empty($testimonial_post_data['tm_designation'])):
                                   $designation = $testimonial_post_data['tm_designation'];
                                endif;
                                $tm_emailaddress = '';
                                if(!empty($testimonial_post_data['tm_emailaddress'])):
                                    $tm_emailaddress = $testimonial_post_data['tm_emailaddress'];
                                endif;
                                $tm_twitter = '';
                                if(!empty($testimonial_post_data['tm_twitter'])):
                                    $tm_twitter = $testimonial_post_data['tm_twitter'];
                                endif;
                                $tm_facebook = '';
                                if(!empty($testimonial_post_data['tm_facebook'])):
                                    $tm_facebook = $testimonial_post_data['tm_facebook'];
                                endif;
                                $tm_linkedin = '';
                                if(!empty($testimonial_post_data['tm_linkedin'])):
                                    $tm_linkedin = $testimonial_post_data['tm_linkedin'];
                                endif;
                                $tm_youtube = '';
                                if(!empty($testimonial_post_data['tm_youtube'])):
                                    $tm_youtube = $testimonial_post_data['tm_youtube'];
                                endif;
                                if(has_post_thumbnail(get_the_ID())):
                                     $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    		         $thum_image = cultivation_aq_resize($attachment_url, 270, 360, true);
                    		    endif;	
                    		    ?>    
						        <div class="swiper-slide">
								   <div class="team_slide">
								    <?php if(!empty($thum_image)): ?>
									   <div class="team_image">
										  <img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" class="img-fluid" />
									   </div>
									<?php endif; ?> 
									<div class="coffee_team_details">
										<span class="call_icon">
											<!--?xml version="1.0" encoding="iso-8859-1"?-->
											<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 480.56 480.56" style="enable-background:new 0 0 480.56 480.56;" xml:space="preserve" width="20px" height="20px">
											<g>
											  <g>
											    <path style="fill:#222222;" d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8
														c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4
														c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8
														c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3
														c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9
														c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z"></path>
												<path style="fill:#222222;" d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1
														c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z"></path>
												<path style="fill:#222222;" d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5
														l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z"></path></g></g>
											</svg>
										</span>
										<h3><?php the_title(); ?></h3>
										<?php if(!empty($designation)): ?>
									 	   <?php echo esc_html($designation); ?>
									 	<?php endif; ?>
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
					<!-- Add Arrows -->
					<span class="slider_arrow team_left left_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="10px" height="20px">
						<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
						 d="M0.272,10.703 L8.434,19.703 C8.792,20.095 9.372,20.095 9.731,19.703 C10.089,19.308 10.089,18.668 9.731,18.274 L2.217,9.990 L9.730,1.706 C10.089,1.310 10.089,0.672 9.730,0.277 C9.372,-0.118 8.791,-0.118 8.433,0.277 L0.271,9.274 C-0.082,9.666 -0.082,10.315 0.272,10.703 Z"/>
						</svg>
					</span>
					<span class="slider_arrow team_right right_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="10px" height="20px">
						<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
						 d="M9.728,10.703 L1.566,19.703 C1.208,20.095 0.627,20.095 0.268,19.703 C-0.090,19.308 -0.090,18.668 0.268,18.274 L7.783,9.990 L0.269,1.706 C-0.089,1.310 -0.089,0.672 0.269,0.277 C0.627,-0.118 1.209,-0.118 1.567,0.277 L9.729,9.274 C10.081,9.666 10.081,10.315 9.728,10.703 Z"/>
						</svg>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!--team style six -->
<?php
break;
default:
?>
<!--team style one -->
<div class="clv_team_wrapper clv_section"> 
	<div class="container">
	    <?php if(!empty($team_heading) || !empty($team_imageicon) || !empty($team_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading ">
					    <?php if(!empty($team_heading)): ?>
					    <h3><?php echo esc_html($team_heading); ?></h3>
						<?php endif; 
						if(!empty($team_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($team_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($team_descreption)):
						?><p></p><?php echo esc_html($team_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>  
			</div> 
		<?php endif; ?> 
		<div class="row">
			<div class="col-md-12">
				<div class="team_section">
					<div class="row">
					    <?php
    				    $args = array(
                           'post_type' =>'team',
                           'order'   => 'ASC',
                           'posts_per_page' => $team_shownumber
                          );
    				    $cv_query = new WP_Query($args);
            		    if($cv_query->have_posts() ) :
                           while($cv_query->have_posts()): $cv_query->the_post();
                           
                            if(function_exists( 'fw_get_db_post_option' )):	
                               $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                            endif;
                            $designation = '';
                            if(!empty($testimonial_post_data['tm_designation'])):
                               $designation = $testimonial_post_data['tm_designation'];
                            endif;
                            $tm_emailaddress = '';
                            if(!empty($testimonial_post_data['tm_emailaddress'])):
                                $tm_emailaddress = $testimonial_post_data['tm_emailaddress'];
                            endif;
                            $tm_twitter = '';
                            if(!empty($testimonial_post_data['tm_twitter'])):
                                $tm_twitter = $testimonial_post_data['tm_twitter'];
                            endif;
                            $tm_facebook = '';
                            if(!empty($testimonial_post_data['tm_facebook'])):
                                $tm_facebook = $testimonial_post_data['tm_facebook'];
                            endif;
                            $tm_linkedin = '';
                            if(!empty($testimonial_post_data['tm_linkedin'])):
                                $tm_linkedin = $testimonial_post_data['tm_linkedin'];
                            endif;
                            $tm_youtube = '';
                            if(!empty($testimonial_post_data['tm_youtube'])):
                                $tm_youtube = $testimonial_post_data['tm_youtube'];
                            endif;
                            if(has_post_thumbnail(get_the_ID())):
                                 $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
            			         $thum_image = cultivation_aq_resize($attachment_url, 270, 304, true);
            			    endif;	
                		?> 
					    <div class="col-md-3">
							<div class="team_block">
								<div class="team_image">
								    <?php if(!empty($thum_image)): ?>
									   <img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
									<?php endif; 
									if(!empty($tm_facebook) || !empty($tm_twitter) || !empty($tm_linkedin) || !empty($tm_youtube) ):
									?>
									<div class="social_overlay">
										<p><?php echo esc_html('you can join us','cultivation'); ?></p>
										<ul>
										<?php if(!empty($tm_facebook)): ?>
										<li><a href="<?php echo esc_url($tm_facebook); ?>"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
									    <?php endif;
										if(!empty($tm_twitter)):
										?><li><a href="<?php echo esc_url($tm_twitter); ?>"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
										<?php endif; 
										 if(!empty($tm_linkedin)):
										 ?><li><a href="<?php echo esc_url($tm_linkedin); ?>"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
										 <?php endif; 
										 if(!empty($tm_youtube)):
										 ?><li><a href="<?php echo esc_url($tm_youtube); ?>"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
										 <?php endif; ?>
										</ul>
									</div>
									<?php endif; ?>
								</div>
								<div class="team_details">
									<div class="team_name">
										<h3><?php the_title(); ?></h3>
										<p><?php echo esc_html($designation); ?></p>
										<span class="divider"></span>
										<?php if(!empty($tm_emailaddress)): ?>
										   <a href="mailto:<?php echo esc_attr($tm_emailaddress); ?>"><?php echo esc_html($tm_emailaddress); ?></a>
										<?php endif; ?>
									</div>
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
</div>
<?php
}