<?php if (!defined('FW')) die('Forbidden'); 

$blog_style = '';
if(!empty($atts['blog_style'])):
  $blog_style = $atts['blog_style'];
endif; 
$blog_heading = '';
if(!empty($atts['blog_heading'])):
  $blog_heading = $atts['blog_heading'];
endif; 
$blog_shownumber = '';
if(!empty($atts['blog_shownumber'])):
  $blog_shownumber = $atts['blog_shownumber'];
endif; 
$blog_descreption = '';
if(!empty($atts['blog_descreption'])):
  $blog_descreption = $atts['blog_descreption'];
endif;
$blog_imageicon = '';
if(!empty($atts['blog_imageicon']['url'])):
  $blog_imageicon = $atts['blog_imageicon']['url'];
endif;
switch ($blog_style) {
case 'style_one':
?>
<!--Blog style one -->
<div class="clv_blog_wrapper clv_section">
	<div class="container">
		<div class="row justify-content-center"> 
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				    <?php if(!empty($blog_heading)): ?>
					  <h3><?php echo __($blog_heading)?></h3>
					<?php endif; ?>
					<?php if(!empty($blog_imageicon)): ?>
					  <div class="clv_underline"><img src="<?php echo esc_url($blog_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif;
					if(!empty($blog_descreption)):
					?><p><?php echo esc_html($blog_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="blog_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						    <?php
            				$args = array(
                                'post_type' =>'post',
                                'order'   => 'ASC',
                                'posts_per_page' => $blog_shownumber
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
                    			    $thum_image = cultivation_aq_resize($attachment_url, 370, 270, true);
                    			endif;	
            		        ?> 
							<div class="swiper-slide">
								<div class="blog_slide">
								    <?php if(!empty($thum_image)): ?>
									<div class="blog_image">
										<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" class="img-fluid" />
									</div>
									<?php endif; ?>
									<div class="blog_content">
										<h6 class="blog_date"><?php echo get_the_date(); ?></h6>
										<h4 class="blog_title"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h4>
										<div class="blog_user">
											<div class="user_name">
											   <?php echo get_avatar( get_the_author_meta('ID'), 60); ?>
											   <a href="<?php echo esc_url(get_author_posts_url(get_the_ID())); ?>"><span><?php the_author(); ?></span></a>
											</div>
											<div class="comment_block">
												<span><i class="fa fa-comments-o" aria-hidden="true"></i></span>
												<a href="<?php echo esc_url(get_comments_link(get_the_ID())); ?>">
												<?php echo get_comments_number(get_the_ID()); ?>
												</a>
											</div> 
										</div>
										<?php if(function_exists('cultivation_the_excerpt')): ?>
									  	   <p><?php cultivation_the_excerpt(150); ?></p>
										<?php endif; ?>
										<a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php esc_html_e('read more','cultivation'); ?> <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
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
					  <span class="slider_arrow blog_left left_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="10px" height="20px">
						<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
						 d="M0.272,10.703 L8.434,19.703 C8.792,20.095 9.372,20.095 9.731,19.703 C10.089,19.308 10.089,18.668 9.731,18.274 L2.217,9.990 L9.730,1.706 C10.089,1.310 10.089,0.672 9.730,0.277 C9.372,-0.118 8.791,-0.118 8.433,0.277 L0.271,9.274 C-0.082,9.666 -0.082,10.315 0.272,10.703 Z"/>
						</svg>
					</span>
					<span class="slider_arrow blog_right right_arrow">
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
<!-- blog style one -->
<?php
break;
case 'style_two':
?>
<!-- blog style two -->
<div class="agri_blog_wrapper clv_section">
		<div class="container">
			<div class="row justify-content-center"> 
    			<div class="col-lg-6 col-md-6">
    				<div class="clv_heading">
    				    <?php if(!empty($blog_heading)): ?>
    					  <h3><?php echo __($blog_heading)?></h3>
    					<?php endif; ?>
    					<?php if(!empty($blog_imageicon)): ?>
    					  <div class="clv_underline"><img src="<?php echo esc_url($blog_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
    					<?php endif;
    					if(!empty($blog_descreption)):
    					?><p><?php echo esc_html($blog_descreption); ?></p>
    					<?php endif; ?>
    				</div>
    			</div>
		    </div>
			<div class="agri_blog_inner">
				<div class="row">
				    <?php
    				$args = array(
                        'post_type' =>'post',
                        'order'   => 'ASC',
                        'posts_per_page' =>1
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
            			    $thum_image = cultivation_aq_resize($attachment_url, 570, 370, true);
            			endif;	
            		  ?> 
					  <div class="col-lg-6 col-md-12">
						<div class="blog_section">
						    <?php if(!empty($thum_image)): ?>
							<div class="agri_blog_image">
								<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
								<span class="agri_blog_date"><?php echo get_the_date(); ?></span>
							</div>
							<?php endif; ?>
							<div class="agri_blog_content">
								<h3><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3>
								<div class="blog_user">
									<div class="user_name">
										<?php echo get_avatar( get_the_author_meta('ID'), 60); ?>
										<a href="<?php echo esc_url(get_author_posts_url(get_the_ID())); ?>"><span><?php the_author(); ?></span></a>
									</div>
									<div class="comment_block">
										<span><i class="fa fa-comments-o" aria-hidden="true"></i></span>
										<a href="<?php echo esc_url(get_comments_link(get_the_ID())); ?>"><?php echo get_comments_number(get_the_ID()); ?></a>
									</div>
								</div>
								<?php if(function_exists('cultivation_the_excerpt')): ?>
								   <p><?php cultivation_the_excerpt(200)?></p>
								<?php endif; ?>
								<a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php esc_html_e('read more','cultivation'); ?> <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
							</div>
						</div>
					</div>
					<?php 
					endwhile;
					  wp_reset_postdata();
				 	endif;
                    ?>	
                    <div class="col-lg-6 col-md-12">
                    	<div class="right_blog_section">
                    	    <?php
            				$args = array(
                                'post_type' =>'post',
                                'order'   => 'ASC',
                                'posts_per_page' =>3
                                );
                            $numbercount = 1;
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
                                
                    		  if($numbercount > 1):
                    		      if(has_post_thumbnail(get_the_ID())):
                                    $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    			    $thum_image = cultivation_aq_resize($attachment_url, 230, 351, true);
                    			endif;	
                    		  ?> 
                              <div class="right_blog_block">
                                  <?php if(!empty($thum_image)): ?>
                            		  <div class="right_blog_image">
                            			<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
                            		  </div>
                        		  <?php endif; ?>
                        		  <div class="right_blog_content">
                        				<span class="agri_blog_date">jan 06, 2019</span>
                        				<h3><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3>
                        				<div class="blog_user">
                        					<div class="user_name">
                        						<?php echo get_avatar( get_the_author_meta('ID'), 60); ?>
                        						<a href="<?php echo esc_url(get_author_posts_url(get_the_ID())); ?>"><span><?php the_author(); ?></span></a>
                        					</div>
                        					<div class="comment_block">
                        						<span><i class="fa fa-comments-o" aria-hidden="true"></i></span>
                        						<a href="<?php echo esc_url(get_comments_link(get_the_ID())); ?>"><?php echo get_comments_number(get_the_ID()); ?></a>
                        					</div>
                        				</div>
                        				<?php if(function_exists('cultivation_the_excerpt')): ?>
                        				  <p><?php cultivation_the_excerpt(230)?></p>
                        				<?php endif; ?>
                        				<a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php esc_html_e('read more','cultivation'); ?><span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                        			</div>
                            	</div>
                    	  	   <?php 
                    	  	   endif;
                    	  	   $numbercount++;
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
<!-- blog style two -->
<?php
break;
case 'style_three':
?>
<!-- blog style three -->
<div class="dairy_blog_wrapper clv_section">
	<div class="container">
		<div class="row justify-content-center"> 
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				   <?php if(!empty($blog_heading)): ?>
					  <h3><?php echo __($blog_heading)?></h3>
					<?php endif; ?>
					<?php if(!empty($blog_imageicon)): ?>
					  <div class="clv_underline"><img src="<?php echo esc_url($blog_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif;
					if(!empty($blog_descreption)):
					?><p><?php echo esc_html($blog_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="dairy_blog_section">
			<div class="row">
			    <?php
				$args = array(
                    'post_type' =>'post',
                    'order'   => 'ASC',
                    'posts_per_page' => $blog_shownumber
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
        			    $thum_image = cultivation_aq_resize($attachment_url, 370, 270, true);
        			endif;	
            	?> 
				<div class="col-lg-6 col-md-6">
					<div class="right_blog_section">
					    <div class="right_blog_block">
					        <?php if(!empty($thum_image)): ?>
    							<div class="right_blog_image">
    							   <img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    							</div>
						    <?php endif; ?>
							<div class="right_blog_content"> 
								<span class="agri_blog_date"><?php echo get_the_date(); ?></span>
								<h3><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3>
								<div class="blog_user">
									<div class="user_name">
										<?php echo get_avatar( get_the_author_meta('ID'), 60); ?>
										<a href="<?php echo esc_url(get_author_posts_url(get_the_ID())); ?>"><span><?php the_author(); ?></span></a>
									</div>
									<div class="comment_block">
										<span><i class="fa fa-comments-o" aria-hidden="true"></i></span>
										<a href="<?php echo esc_url(get_comments_link(get_the_ID())); ?>"><?php echo get_comments_number(get_the_ID()); ?></a>
									</div>
								</div>
								<?php if(function_exists('cultivation_the_excerpt')):?>
							 	  <p><?php cultivation_the_excerpt(150); ?></p>
								<?php endif; ?>
								<a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php esc_html_e('read more','cultivation'); ?><span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
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
<!-- blog style three -->
<?php
break;
default:
?>
<div class="clv_blog_wrapper clv_section">
	<div class="container">
		<div class="row justify-content-center"> 
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				    <?php if(!empty($blog_heading)): ?>
					  <h3><?php echo __($blog_heading)?></h3>
					<?php endif; ?>
					<?php if(!empty($blog_imageicon)): ?>
					  <div class="clv_underline"><img src="<?php echo esc_url($blog_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif;
					if(!empty($blog_descreption)):
					?><p><?php echo esc_html($blog_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="blog_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						    <?php
            				$args = array(
                                'post_type' =>'post',
                                'order'   => 'ASC',
                                'posts_per_page' => $blog_shownumber
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
                    			    $thum_image = cultivation_aq_resize($attachment_url, 370, 270, true);
                    			endif;	
            		        ?> 
							<div class="swiper-slide">
								<div class="blog_slide">
								    <?php if(!empty($thum_image)): ?>
									<div class="blog_image">
										<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" class="img-fluid" />
									</div>
									<?php endif; ?>
									<div class="blog_content">
										<h6 class="blog_date"><?php echo get_the_date(); ?></h6>
										<h4 class="blog_title"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h4>
										<div class="blog_user">
											<div class="user_name">
											   <?php echo get_avatar( get_the_author_meta('ID'), 60); ?>
											   <a href="<?php echo esc_url(get_author_posts_url(get_the_ID())); ?>"><span><?php the_author(); ?></span></a>
											</div>
											<div class="comment_block">
												<span><i class="fa fa-comments-o" aria-hidden="true"></i></span>
												<a href="<?php echo esc_url(get_comments_link(get_the_ID())); ?>">
												<?php echo get_comments_number(get_the_ID()); ?>
												</a>
											</div> 
										</div>
										<?php if(!function_exists('cultivation_the_excerpt')): ?>
									  	   <p><?php cultivation_the_excerpt(150)?></p>
										<?php endif; ?>
										<a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php esc_html_e('read more','cultivation'); ?> <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
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
					  <span class="slider_arrow blog_left left_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="10px" height="20px">
						<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
						 d="M0.272,10.703 L8.434,19.703 C8.792,20.095 9.372,20.095 9.731,19.703 C10.089,19.308 10.089,18.668 9.731,18.274 L2.217,9.990 L9.730,1.706 C10.089,1.310 10.089,0.672 9.730,0.277 C9.372,-0.118 8.791,-0.118 8.433,0.277 L0.271,9.274 C-0.082,9.666 -0.082,10.315 0.272,10.703 Z"/>
						</svg>
					</span>
					<span class="slider_arrow blog_right right_arrow">
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
<?php
}