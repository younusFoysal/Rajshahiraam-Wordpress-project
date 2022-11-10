<?php if (!defined('FW')) die('Forbidden');
$testimonial_style = '';
if(!empty($atts['testimonial_style'])):
   $testimonial_style = $atts['testimonial_style'];
endif; 
$testimonial_heading = '';
if(!empty($atts['testimonial_heading'])):
   $testimonial_heading = $atts['testimonial_heading'];
endif;
$testimonial_descreption = '';
if(!empty($atts['testimonial_descreption'])):
   $testimonial_descreption = $atts['testimonial_descreption'];
endif;
$testimonial_shownumber = '';
if(!empty($atts['testimonial_shownumber'])):
   $testimonial_shownumber = $atts['testimonial_shownumber'];
endif;
$testimonial_imageicon = '';
if(!empty($atts['testimonial_imageicon']['url'])):
   $testimonial_imageicon = $atts['testimonial_imageicon']['url'];
endif;
$bg_quote = get_template_directory_uri().'/assets/images/bg_quote.png';
$quote = '';
if(!empty($atts['testimonial_quoteicon']['url'])):
   $quote = $atts['testimonial_quoteicon']['url'];
else:
   $quote = get_template_directory_uri().'/assets/images/quote.png';
endif;

$quote2 = get_template_directory_uri().'/assets/images/Quote-Icon.png';
$quoteleft4 = get_template_directory_uri().'/assets/images/test_left_quote.png';
$quoteright4 = get_template_directory_uri().'/assets/images/test_right_quote.png';
$bg_quote2 = get_template_directory_uri().'/assets/images/bg_quote2icon.png';
switch ($testimonial_style) {
  case 'style_one':
?> 
<!-- style one -->
<div class="clv_testimonial_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($testimonial_heading) || !empty($testimonial_imageicon) || !empty($testimonial_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading white_heading">
					    <?php if(!empty($testimonial_heading)): ?>
					    <h3><?php echo esc_html($testimonial_heading); ?></h3>
						<?php endif; 
						if(!empty($testimonial_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($testimonial_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($testimonial_descreption)):
						?><p><?php echo esc_html($testimonial_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		<?php endif; ?> 
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="testimonial_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						    <?php
        				    $args = array(
                               'post_type' =>'testimonial',
                               'order'   => 'ASC',
                               'posts_per_page' => $testimonial_shownumber
                              );
        				    $cv_query = new WP_Query($args);
                		    if($cv_query->have_posts() ) :
                               while($cv_query->have_posts()): $cv_query->the_post();
                               
                                if(function_exists( 'fw_get_db_post_option' )):	
                                   $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                                endif;
                                $designation = '';
                                if(!empty($testimonial_post_data['ts_designation'])):
                                   $designation = $testimonial_post_data['ts_designation'];
                                endif;
                                if(has_post_thumbnail(get_the_ID())):
                                     $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                			         $thum_image = cultivation_aq_resize($attachment_url, 150, 160, true);
                			    endif;	
                		    ?> 
							<div class="swiper-slide">
								<div class="testimonial_slide">
								    <?php if(!empty($quote)): ?>
								 	<span class="rounded_quote"><img src="<?php echo esc_url($quote); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span>
									<?php endif; 
									if(!empty($bg_quote)):
									?><span class="bg_quote"><img src="<?php echo esc_url($bg_quote); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span>
									<?php 
									endif;
									?>
									<?php if(!empty($thum_image)): ?>
									<div class="client_img">
									   <img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
								    </div>
									<?php endif; ?>
									<div class="client_message">
									<?php if(!empty(the_content())): ?>
										<p><?php the_content(); ?></p>
									<?php endif; ?>
									<h3><?php the_title(); ?><span><?php echo esc_html($designation); ?></span></h3>
									</div>
								</div>
							</div>
							<?php
        					endwhile;
        					  wp_reset_postdata();
        					endif;
			                ?>
						</div>
						<!-- Add Arrows -->
						<span class="slider_arrow testimonial_left left_arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
						<span class="slider_arrow testimonial_right right_arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- style one -->
<?php 
break;
case 'style_two':
?>
<!-- style two -->
<div class="agri_testimonial_wrapper clv_section">
	<div class="container">
		<div class="row">
			<?php if(!empty($testimonial_heading) || !empty($testimonial_imageicon) || !empty($testimonial_descreption)): ?>    
				<div class="col-md-4 col-lg-4">
					<div class="agri_testimonial_content">
					    <?php if(!empty($testimonial_heading)):  ?>
					       <h3><?php echo esc_html($testimonial_heading); ?><span><img src="<?php echo esc_url($testimonial_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span></h3>
						<?php
						endif;
						if(!empty($testimonial_descreption)): ?>
						   <p><?php echo esc_html($testimonial_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?> 	
				<div class="col-md-8 col-lg-8">
					<div class="agri_testimonial_slider">
						<!-- Swiper -->
						<div class="swiper-container">
							<div class="swiper-wrapper">
							    <?php
            				    $args = array(
                                   'post_type' =>'testimonial',
                                   'order'   => 'ASC',
                                   'posts_per_page' => $testimonial_shownumber
                                  );
            				    $cv_query = new WP_Query($args);
                    		    if($cv_query->have_posts() ) :
                                   while($cv_query->have_posts()): $cv_query->the_post();
                                   
                                    if(function_exists( 'fw_get_db_post_option' )):	
                                       $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                                    endif;
                                    $designation = '';
                                    if(!empty($testimonial_post_data['ts_designation'])):
                                       $designation = $testimonial_post_data['ts_designation'];
                                    endif;
                                    if(has_post_thumbnail(get_the_ID())):
                                         $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    			         $thum_image = cultivation_aq_resize($attachment_url, 188, 238, false);
                    			    endif;	
                		        ?> 
							    <div class="swiper-slide">
									<div class="agri_testimonial_slide">
									    <?php if(!empty($thum_image)): ?>
    										<div class="agri_testimonial_image">
    											<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    										</div>
										<?php 
										endif;
										?>
										<div class="agri_testimonial_message">
										   <?php if(!empty(the_content())): ?>
											  <p><?php the_content(); ?></p>
										   <?php endif; ?>
										   <h4><?php the_title(); ?><span><?php echo esc_html($designation); ?></span></h4>
										 </div>
										<?php if(!empty($quote2)): ?>
										<span class="agri_quate"><img src="<?php echo esc_url($quote2); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span>
										<?php endif; ?>
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
						<div class="agri_arrow agri_testimonial_left">
							<span>
								<svg 
								 xmlns="http://www.w3.org/2000/svg"
								 xmlns:xlink="http://www.w3.org/1999/xlink"
								 width="10px" height="15px">
								<path fill-rule="evenodd"  fill="rgb(222, 222, 222)"
								 d="M0.324,8.222 L7.117,14.685 C7.549,15.097 8.249,15.097 8.681,14.685 C9.113,14.273 9.113,13.608 8.681,13.197 L2.670,7.478 L8.681,1.760 C9.113,1.348 9.113,0.682 8.681,0.270 C8.249,-0.139 7.548,-0.139 7.116,0.270 L0.323,6.735 C0.107,6.940 -0.000,7.209 -0.000,7.478 C-0.000,7.747 0.108,8.017 0.324,8.222 Z"/>
								</svg>
							</span>
						</div>
						<div class="agri_arrow agri_testimonial_right">
							<span>
								<svg 
								 xmlns="http://www.w3.org/2000/svg"
								 xmlns:xlink="http://www.w3.org/1999/xlink"
								 width="19px" height="25px">
								<path fill-rule="evenodd" fill="rgb(222, 222, 222)"
								 d="M13.676,13.222 L6.883,19.685 C6.451,20.097 5.751,20.097 5.319,19.685 C4.887,19.273 4.887,18.608 5.319,18.197 L11.329,12.478 L5.319,6.760 C4.887,6.348 4.887,5.682 5.319,5.270 C5.751,4.861 6.451,4.861 6.884,5.270 L13.676,11.735 C13.892,11.940 14.000,12.209 14.000,12.478 C14.000,12.747 13.892,13.017 13.676,13.222 Z"/>
								</svg>
							</span>
						</div>
					</div>
				</div>
		 </div>
	</div>
</div>
<!-- style two -->
<?php
break;
case 'style_three':
?>
<!-- style three -->
<div class="dairy_testimonial_wrapper clv_section">
	<div class="container">
		<div class="row">
		    <?php if(!empty($testimonial_heading) || !empty($testimonial_imageicon) || !empty($testimonial_descreption)): ?>  
			<div class="col-lg-4 col-md-4">
				<div class="testimonial_content">
				<?php if(!empty($testimonial_heading)):  ?>
				<h3><?php echo esc_html($testimonial_heading); ?></h3>
				<?php endif;
				if(!empty($testimonial_imageicon)):
				?><img src="<?php echo esc_url($testimonial_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
				<?php 
				endif;
				if(!empty($testimonial_descreption)):
				?><p><?php echo esc_html($testimonial_descreption); ?></p>
				<?php
				endif;
				?>
				</div> 
			</div>
			<?php endif; ?> 	
			<div class="col-lg-8 col-md-8">
				<div class="dairy_testimonial_slider">
					<!-- Arrows -->
					<span class="dairy_arrow dairy_left">
						<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 31.494 31.494" style="enable-background:new 0 0 31.494 31.494;" xml:space="preserve" width="20" height="20">
						<path d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554
							c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587
							c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"/>
						</svg>
					</span>
					<span class="dairy_arrow dairy_right">
						<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve" width="20" height="20">
						<path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111
							C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587
							c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
						</svg>
					</span>
					<!-- Swiper -->
					<div class="swiper-container">
						<div class="swiper-wrapper">
						<?php
    				    $args = array(
                           'post_type' =>'testimonial',
                           'order'   => 'ASC',
                           'posts_per_page' => $testimonial_shownumber
                          );
    				    $cv_query = new WP_Query($args);
            		    if($cv_query->have_posts() ) :
                        while($cv_query->have_posts()): $cv_query->the_post();
                           
                            if(function_exists( 'fw_get_db_post_option' )):	
                               $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                            endif;
                            
                            $designation = '';
                            if(!empty($testimonial_post_data['ts_designation'])):
                               $designation = $testimonial_post_data['ts_designation'];
                            endif;
                            
                            if(has_post_thumbnail(get_the_ID())):
                                 $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
            			         $thum_image = cultivation_aq_resize($attachment_url, 92, 92, true);
            			    endif;	
                		?>     
						<div class="swiper-slide">
							<div class="dairy_testimonial_slide">
							    <?php if(!empty($thum_image)): ?>
								<div class="dairy_testimonial_image">
									<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
								</div>
								<?php endif; ?>
								<div class="dairy_testimonial_message">
								    <?php if(!empty(the_content())): ?>
									  <p><?php the_content(); ?></p>
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
	</div>
</div>
<!-- style three -->
<?php
break;
case 'style_four':
?>
<!-- style four -->
<div class="garden_testimonial_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($testimonial_heading) || !empty($testimonial_imageicon) || !empty($testimonial_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading white_heading">
					    <?php if(!empty($testimonial_heading)): ?>
					    <h3><?php echo esc_html($testimonial_heading); ?></h3>
						<?php endif; 
						if(!empty($testimonial_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($testimonial_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($testimonial_descreption)):
						?><p><?php echo esc_html($testimonial_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		<?php endif; ?> 
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="garden_testimonial_slider">
					<div class="thumb_slider">
						<div class="swiper-container">
							<div class="swiper-wrapper">
							    <?php
            				    $args = array(
                                   'post_type' =>'testimonial',
                                   'order'   => 'ASC',
                                   'posts_per_page' => $testimonial_shownumber
                                  );
            				    $cv_query = new WP_Query($args);
                    		    if($cv_query->have_posts() ) :
                                while($cv_query->have_posts()): $cv_query->the_post();
                                    
                                    if(function_exists( 'fw_get_db_post_option' )):	
                                       $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                                    endif;
                                    $designation = '';
                                    if(!empty($testimonial_post_data['ts_designation'])):
                                       $designation = $testimonial_post_data['ts_designation'];
                                    endif;
                                    if(has_post_thumbnail(get_the_ID())):
                                        $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    			        $thum_image = cultivation_aq_resize($attachment_url, 94, 94, true);
                    			    endif;	
                    			    if(!empty($thum_image)):
                    		        ?>         
    								<div class="swiper-slide">
    								   <div class="thumb_slide">
    									 <span><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span>
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
						<!-- Add Arrows -->
						<div class="test_arrow test_left_arrow">
							<span class="arrow">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129" width="20px" height="20px">
								  <g>
									<path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
								  </g>
								</svg>
							</span>
							<span class="hover_arrow">
								<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 31.494 31.494" style="enable-background:new 0 0 31.494 31.494;" xml:space="preserve" width="20px" height="20px">
								<path d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554
									c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587
									c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"/>
								</svg>
							</span>
						</div>
						<div class="test_arrow test_right_arrow">
							<span class="arrow">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129" width="20px" height="20px">
								  <g>
									<path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
								  </g>
								</svg>
							</span>
							<span class="hover_arrow">
								<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve" width="20px" height="20px">
								<path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111
									C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587
									c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
								</svg>
							</span>
						</div>
					</div>
					<div class="message_slider">
						<div class="swiper-container">
							<div class="swiper-wrapper">
							<?php
        				    $args = array(
                               'post_type' =>'testimonial',
                               'order'   => 'ASC',
                               'posts_per_page' => $testimonial_shownumber
                              );
        				    $cv_query = new WP_Query($args);
                		    if($cv_query->have_posts() ) :
                            while($cv_query->have_posts()): $cv_query->the_post();
                            ?>
							<div class="swiper-slide">
								<div class="message_slide">
								    <h3><?php the_title(); ?></h3>
									<?php
									if(!empty(the_content())):
									?><p><?php the_content(); ?></p>
								    <?php endif; ?>
								    <span class="msg_quote left_quote"><img src="<?php echo esc_url($quoteleft4); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span>
									<span class="msg_quote right_quote"><img src="<?php echo esc_url($quoteright4); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span>
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
	</div>
</div>
<!-- style four -->
<?php
break;
case 'style_five':
?>
<!-- style five -->
<div class="org_testimonial_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($testimonial_heading) || !empty($testimonial_imageicon) || !empty($testimonial_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading">
					    <?php if(!empty($testimonial_heading)): ?>
					    <h3><?php echo esc_html($testimonial_heading); ?></h3>
						<?php endif; 
						if(!empty($testimonial_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($testimonial_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($testimonial_descreption)):
						?><p><?php echo esc_html($testimonial_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		<?php endif; ?> 
		<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="org_testimonial_slider">
						<div class="swiper-container">
							<div class="swiper-wrapper">
							    <?php
            				    $args = array(
                                   'post_type' =>'testimonial',
                                   'order'   => 'ASC',
                                   'posts_per_page' => $testimonial_shownumber
                                  );
            				    $cv_query = new WP_Query($args);
                    		    if($cv_query->have_posts() ) :
                                while($cv_query->have_posts()): $cv_query->the_post();
                                    if(function_exists( 'fw_get_db_post_option' )):	
                                       $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                                    endif;
                                    $designation = '';
                                    if(!empty($testimonial_post_data['ts_designation'])):
                                       $designation = $testimonial_post_data['ts_designation'];
                                    endif;
                                    $ts_twitter = '';
                                    if(!empty($testimonial_post_data['ts_twitter'])):
                                       $ts_twitter = $testimonial_post_data['ts_twitter'];
                                    endif;
                                    $ts_linkedin = '';
                                    if(!empty($testimonial_post_data['ts_linkedin'])):
                                       $ts_linkedin = $testimonial_post_data['ts_linkedin'];
                                    endif;
                                    $ts_youtube = '';
                                    if(!empty($testimonial_post_data['ts_youtube'])):
                                       $ts_youtube = $testimonial_post_data['ts_youtube'];
                                    endif;
                                    if(has_post_thumbnail(get_the_ID())):
                                        $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    			        $thum_image = cultivation_aq_resize($attachment_url, 180, 220, true);
                    			    endif;	
							    ?>
							    <div class="swiper-slide">
									<div class="org_testimonial_slide">
										<div class="org_test_image">
										   <img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
										</div>
										<div class="org_testimonial_message">
										    <?php if(!empty($bg_quote2)): ?>
											<img src="<?php echo esc_url($bg_quote2); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
											<?php 
											endif;
											if(!empty(the_content())): ?>
											<p><?php the_content(); ?></p>
											<?php endif; ?>
											<h5><?php the_title(); ?><span>- <?php echo esc_html($designation); ?></span></h5>
										</div>
										<?php if(!empty($ts_twitter) || !empty($ts_linkedin) || !empty($ts_youtube)): ?>
										<ul class="test_social">
										    <?php if(!empty($ts_twitter)): ?>
											 <li><a href="<?php echo esc_url($ts_twitter); ?>"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
											<?php endif; 
											if(!empty($ts_linkedin)):
											?><li><a href="<?php echo esc_url($ts_linkedin); ?>"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
											<?php endif; 
											if(!empty($ts_youtube)):
											?><li><a href="<?php echo esc_url($ts_youtube); ?>"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
											<?php endif; ?>
										</ul>
									    <?php endif; ?>
									</div> 
								</div>
							    <?php
    							endwhile;
                				  wp_reset_postdata();
                			    endif;
            			        ?>
							</div>         
							<!-- Add Arrows -->
							<div class="org_test_btn org_left">
								<span class="arrow">
									
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129" width="15px" height="15px">
									  <g>
										<path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
									  </g>
									</svg>
								</span>
								<span class="hover_arrow">
									
									<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 31.494 31.494" style="enable-background:new 0 0 31.494 31.494;" xml:space="preserve" width="20px" height="20px">
									<path d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554
										c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587
										c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"/>
									</svg>
								</span>
							</div>
							<div class="org_test_btn org_right">
								<span class="arrow">
									
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129" width="15px" height="15px">
									  <g>
										<path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
									  </g>
									</svg>
								</span>
								<span class="hover_arrow">
									
									<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve" width="20px" height="20px">
									<path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111
										C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587
										c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
									</svg>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
	  </div>
</div>
<!-- style five -->
<?php
break;
case 'style_six':
?>
<!-- style six -->
<div class="coffee_testimonial_wrapper clv_section">
	<div class="container">
		<?php if(!empty($testimonial_heading) || !empty($testimonial_imageicon) || !empty($testimonial_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading">
					    <?php if(!empty($testimonial_heading)): ?>
					    <h3><?php echo esc_html($testimonial_heading); ?></h3>
						<?php endif; 
						if(!empty($testimonial_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($testimonial_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($testimonial_descreption)):
						?><p><?php echo esc_html($testimonial_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		<?php endif; ?> 
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="coffee_testimonial_slider">
					<!-- Swiper -->
					<div class="swiper-container coffee_name_slider">
						<div class="swiper-wrapper">
						    <?php
        				    $args = array(
                               'post_type' =>'testimonial',
                               'order'   => 'ASC',
                               'posts_per_page' => $testimonial_shownumber
                              );
        				    $cv_query = new WP_Query($args);
                		    if($cv_query->have_posts() ) :
                            while($cv_query->have_posts()): $cv_query->the_post();
                                if(function_exists( 'fw_get_db_post_option' )):	
                                   $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                                endif;
                                $designation = '';
                                if(!empty($testimonial_post_data['ts_designation'])):
                                   $designation = $testimonial_post_data['ts_designation'];
                                endif;
                                $ts_twitter = '';
                                if(!empty($testimonial_post_data['ts_twitter'])):
                                   $ts_twitter = $testimonial_post_data['ts_twitter'];
                                endif;
                                $ts_linkedin = '';
                                if(!empty($testimonial_post_data['ts_linkedin'])):
                                   $ts_linkedin = $testimonial_post_data['ts_linkedin'];
                                endif;
                                $ts_youtube = '';
                                if(!empty($testimonial_post_data['ts_youtube'])):
                                   $ts_youtube = $testimonial_post_data['ts_youtube'];
                                endif;
                                if(has_post_thumbnail(get_the_ID())):
                                    $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                			        $thum_image = cultivation_aq_resize($attachment_url, 118, 118, true);
                			    endif;	
							    ?>
    							<div class="swiper-slide">
    								<div class="coffee_test_slide">
    								   <?php if(!empty($thum_image)): ?>
    									   <div class="testimonial_client_image"><span><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span></div>
    								   <?php endif; 
    								   if(!empty(the_content())):
    								   ?><p><span><img src="images/test_quote.png" alt="image" /></span><?php the_content(); ?></p>
    								    <img class="test_quote_bg" src="images/coffee_quote.png" alt="image" />
    								   <?php endif; ?>
    								</div>
    							</div>
    						   <?php
    						   endwhile;
                			   wp_reset_postdata();
                			   endif;
            			       ?>
						 </div>
					</div>
					<div class="swiper-container coffee_thumb_slider">
						<div class="swiper-wrapper">
						    <?php
        				    $args = array(
                               'post_type' =>'testimonial',
                               'order'   => 'ASC',
                               'posts_per_page' => $testimonial_shownumber
                              );
        				    $cv_query = new WP_Query($args);
                		    if($cv_query->have_posts() ) :
                            while($cv_query->have_posts()): $cv_query->the_post();
						    ?>
							<div class="swiper-slide">
								<div class="coffee_thumb_slide">
								   <h3><?php the_title(); ?></h3>
								</div>
							</div>
							<?php 
							endwhile;
                			wp_reset_postdata();
                			endif;
							?>
						</div> 
						<!-- Add Arrows -->
						<div class="coffee_arrow_wrapper">
							<div class="coffee_test_left_arrow">
								<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 31.494 31.494" style="enable-background:new 0 0 31.494 31.494;" xml:space="preserve" width="20px" height="20px">
								<path style="fill:#b1b1b1;" d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554
									c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587
									c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"/>
								</svg>
							</div>
							<div class="coffee_test_right_arrow">
								<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve" width="20px" height="20px">
								<path style="fill:#b1b1b1;" d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111
									C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587
									c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- style six -->
<?php
break;   
default:
?>
<div class="clv_testimonial_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($testimonial_heading) || !empty($testimonial_imageicon) || !empty($testimonial_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading white_heading">
					    <?php if(!empty($testimonial_heading)): ?>
					    <h3><?php echo esc_html($testimonial_heading); ?></h3>
						<?php endif; 
						if(!empty($testimonial_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($testimonial_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($testimonial_descreption)):
						?><p><?php echo esc_html($testimonial_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>  
			</div>
		<?php endif; ?> 
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="testimonial_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						    <?php
        				    $args = array(
                               'post_type' =>'testimonial',
                               'order'   => 'ASC',
                               'posts_per_page' => $testimonial_shownumber
                              );
        				    $cv_query = new WP_Query($args);
                		    if($cv_query->have_posts() ) :
                               while($cv_query->have_posts()): $cv_query->the_post();
                               
                                if(function_exists( 'fw_get_db_post_option' )):	
                                   $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                                endif;
                                
                                $designation = '';
                                if(!empty($testimonial_post_data['ts_designation'])):
                                   $designation = $testimonial_post_data['ts_designation'];
                                endif;
                                if(has_post_thumbnail(get_the_ID())):
                                     $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                			         $thum_image = cultivation_aq_resize($attachment_url, 150, 160, true);
                			    endif;	
                		    ?> 
							<div class="swiper-slide">
								<div class="testimonial_slide">
								    <?php if(!empty($quote)): ?>
								 	   <span class="rounded_quote"><img src="<?php echo esc_url($quote); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span>
									<?php endif; 
									if(!empty($bg_quote)):
									?><span class="bg_quote"><img src="<?php echo esc_url($bg_quote); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></span>
									<?php endif; ?>
									<?php if(!empty($thum_image)): ?>
								    <div class="client_img">
									   <img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
							    	</div>
									<?php endif; ?>
									<div class="client_message">
    								    <?php if(!empty(the_content())): ?>
    									<p><?php the_content(); ?></p>
    									<?php endif; ?>
    									<h3><?php the_title(); ?><span><?php echo esc_html($designation); ?></span></h3>
    								</div>
								</div>
							</div>
							<?php
        					endwhile;
        					wp_reset_postdata();
        					endif;
			                ?>
						</div>
						<!-- Add Arrows -->
						<span class="slider_arrow testimonial_left left_arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
						<span class="slider_arrow testimonial_right right_arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
<?php
}