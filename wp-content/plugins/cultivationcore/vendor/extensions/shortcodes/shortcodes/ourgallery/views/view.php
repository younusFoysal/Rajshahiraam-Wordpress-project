<?php if (!defined('FW')) die('Forbidden'); 
$gallery_style = '';
if(!empty($atts['gallery_style'])):
   $gallery_style = $atts['gallery_style'];
endif;
$gallery_heading = '';
if(!empty($atts['gallery_heading'])):
   $gallery_heading = $atts['gallery_heading'];
endif; 
$gallery_load_more = '';
if(!empty($atts['gallery_load_more'])):
   $gallery_load_more = $atts['gallery_load_more'];
endif; 
$gallery_descreption = '';
if(!empty($atts['gallery_descreption'])):
   $gallery_descreption = $atts['gallery_descreption'];
endif; 
$gallery_imageicon = '';
if(!empty($atts['gallery_imageicon']['url'])):
   $gallery_imageicon = $atts['gallery_imageicon']['url'];
endif; 
$gallery_category = '';
if(!empty($atts['gallery_category'])):
   $gallery_category = $atts['gallery_category'];
endif;
switch ($gallery_style) {
case 'style_one':
?>
<div class="clv_gallery_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($gallery_heading) || !empty($gallery_imageicon) || !empty($gallery_descreption) ): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading white_heading">
				    <?php if(!empty($gallery_heading)): ?>
					  <h3><?php echo __($gallery_heading); ?></h3>
					<?php endif; 
					if(!empty($gallery_imageicon)):
					?>
					<div class="clv_underline"><img src="<?php echo esc_url($gallery_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif; 
					if(!empty($gallery_descreption)):
					?><p><?php echo esc_html($gallery_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-12">
				<div class="gallery_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						   <?php 
						   if(!empty($gallery_category)):
						     foreach($gallery_category as $get_categorys ):
    						     $gallery_shownumber = '';
    					         if(!empty($get_categorys['gallery_number'])):
    					            $gallery_shownumber = $get_categorys['gallery_number'];
    					         endif;
    					         $gallery_catname = '';
    					         if(!empty($get_categorys['gallery_catname'])):
    					            $gallery_catname = $get_categorys['gallery_catname'];
    					         endif;
    					    ?>
							<div class="swiper-slide">
								<div class="gallery_slide">
									<div class="gallery_grid">
									    <?php
                        				$args = array(
                                            'post_type' =>'gallery',
                                            'order'   => 'ASC',
                                            'posts_per_page' => $gallery_shownumber,
                                            'tax_query' => array(
                                                    array (
                                                    'taxonomy' =>'gallery-category', 
                                                    'field' => 'id',
                                                    'terms' => $gallery_catname,
                                                   )         
                                              ),
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
                                			    $thum_image = cultivation_aq_resize($attachment_url, 370, 260, true);
                                			endif;	
                                		?>     
									    <div class="gallery_grid_item">
											<div class="gallery_image">
											    <?php if(!empty($thum_image)): ?>
												     <img src="<?php echo esc_url($thum_image); ?>" alt="<?php the_title_attribute(); ?>" />
        										 	 <div class="gallery_overlay">
        											    <a href="<?php echo esc_url($attachment_url); ?>" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
        										    </div>
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
							</div>
						   <?php 
						    endforeach;
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
<?php 
break;
case 'style_two':
$galleryplus  = get_template_directory_uri().'/assets/images/gallery_plus.png'; 
?>
<div class="dairy_gallery_wrapper clv_section">
	<div class="container">
	<?php if(!empty($gallery_heading) || !empty($gallery_imageicon) || !empty($gallery_descreption) ): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				    <?php if(!empty($gallery_heading)): ?>
					  <h3><?php echo __($gallery_heading); ?></h3>
					<?php endif; 
					if(!empty($gallery_imageicon)):
					?>
					<div class="clv_underline"><img src="<?php echo esc_url($gallery_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif; 
					if(!empty($gallery_descreption)):
					?><p><?php echo esc_html($gallery_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	</div>
	<div class="dairy_gallery_inner">
		<div class="row">
			<div class="col-md-12">
				<div class="gallery_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						   <?php 
						   if(!empty($gallery_category)):
						     foreach($gallery_category as $get_categorys ):
    						     $gallery_shownumber = '';
    					         if(!empty($get_categorys['gallery_number'])):
    					            $gallery_shownumber = $get_categorys['gallery_number'];
    					         endif;
    					         $gallery_catname = '';
    					         if(!empty($get_categorys['gallery_catname'])):
    					            $gallery_catname = $get_categorys['gallery_catname'];
    					         endif;
    					    ?>
							<div class="swiper-slide">
								<div class="gallery_slide">
									<div class="gallery_grid">
									    <?php
                        				$args = array(
                                            'post_type' =>'gallery',
                                            'order'   => 'ASC',
                                            'posts_per_page' => $gallery_shownumber,
                                            'tax_query' => array(
                                                    array (
                                                    'taxonomy' =>'gallery-category', 
                                                    'field' => 'id',
                                                    'terms' => $gallery_catname,
                                                   )         
                                              ),
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
                                			    $thum_image = cultivation_aq_resize($attachment_url, 800, 600, false);
                                			endif;	
                                		?>     
										<div class="gallery_grid_item">
											<div class="gallery_image">
												<?php if(!empty($attachment_url)):?>
												<img src="<?php echo esc_url($thum_image); ?>" alt="<?php the_title_attribute(); ?>" />
												<div class="gallery_overlay">
													<a href="<?php echo esc_url($attachment_url); ?>" class="view_image"><span><img src="<?php echo esc_url($galleryplus); ?>" alt="<?php the_title_attribute(); ?>" /></span></a>
												</div>
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
							 </div>
							<?php 
						    endforeach;
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
<?php
break;  
case 'style_three':
?>
<div class="garden_project_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($gallery_heading) || !empty($gallery_imageicon) || !empty($gallery_descreption) ): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				     <?php if(!empty($gallery_heading)): ?>
					  <h3><?php echo __($gallery_heading); ?></h3>
					 <?php endif; 
					  if(!empty($gallery_imageicon)):
					 ?>
					<div class="clv_underline"><img src="<?php echo esc_url($gallery_imageicon); ?>" alt="<?php echo esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif;
					if(!empty($gallery_descreption)):
					?><p><?php echo esc_html($gallery_descreption); ?></p>
				    <?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="project_nav"> 
					<ul>
						<li class="active">
						<a data-filter="*" href="javascript:;"><?php esc_html_e('all projects ','cultivation'); ?></a>
						<div class="list_dots">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						</div>
						</li> 
						<?php 
						$tax_terms = '';
						$tax_terms = get_terms('gallery-category');
						if(!empty($tax_terms)):
						foreach($tax_terms as $category):
						   $cata_name = $category->name;
				           $cata_slug = $category->slug;
						?>
						<li>
						<a data-filter=".<?php echo esc_attr($cata_slug); ?>" href="javascript:;"><?php echo esc_html($cata_name); ?></a>
						<div class="list_dots">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
						</li>
					    <?php
					    endforeach;
					    endif;
					    ?>
					</ul>
				</div>
			</div>
			<div class="col-md-12">
				<div class="garden_project_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						   <?php 
						   if(!empty($gallery_category)):
						     foreach($gallery_category as $get_categorys ):
    						     $gallery_shownumber = '';
    					         if(!empty($get_categorys['gallery_number'])):
    					            $gallery_shownumber = $get_categorys['gallery_number'];
    					         endif;
    					         $gallery_catname = '';
    					         if(!empty($get_categorys['gallery_catname'])):
    					            $gallery_catname = $get_categorys['gallery_catname'];
    					         endif;
    					    ?>
						    <div class="swiper-slide">
								<div class="garden_project_slide">
									<div class="garden_project_grid">
									<?php
                    				$args = array(
                                        'post_type' =>'gallery',
                                        'order'   => 'ASC',
                                        'posts_per_page' => $gallery_shownumber,
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
                            			    $thum_image = cultivation_aq_resize($attachment_url, 370, 320, false);
                            			endif;	
                            			$ca_slug = array();
                    				    $post_categories = get_the_terms(get_the_ID(), 'gallery-category');
                    				    if( $post_categories ):
                        					foreach ( $post_categories as $selected_categories ):
                        						$ca_slug[] = $selected_categories->slug;
                        						$post_cata_slug = join(" ",$ca_slug);		  
                        					endforeach; 
                    				    else:
                    					     $post_cata_slug = '';
                    				    endif;
                                		?>       
										<div class="project_item garden <?php echo esc_attr($post_cata_slug); ?>">
										<div class="project_block">
										<?php if(!empty($thum_image)): ?>
										<div class="project_image"><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
										<div class="project_overlay">
										<h3><?php the_title(); ?></h3>
										<?php the_content(); ?>
										</div>
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
							</div>
							<?php 
						    endforeach;
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
<?php
break;
case 'style_four':
?>
<div class="clv_gallery_wrapper clv_section">
	<div class="container">
	<?php if(!empty($gallery_heading) || !empty($gallery_imageicon) || !empty($gallery_descreption) ): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				 <?php if(!empty($gallery_heading)): ?>
				   <h3><?php echo __($gallery_heading); ?></h3>
				 <?php endif; 
				  if(!empty($gallery_imageicon)):
				 ?><div class="clv_underline"><img src="<?php echo esc_url($gallery_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
				 <?php endif; 
				 if(!empty($gallery_descreption)):
				 ?><p><?php echo esc_html($gallery_descreption); ?></p>
				 <?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-md-12">
			<div class="gallery_slide">
				<div class="gallery_grid" id="gallery_load_mores">
                <?php
				$args = array(
                    'post_type' =>'gallery',
                    'order'   => 'ASC',
                    'posts_per_page' => $gallery_load_more,
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
        			    $thum_image = cultivation_aq_resize($attachment_url, 370, 320, false);
        			endif;	
        			?>  
					<div class="gallery_grid_item">
						<div class="gallery_image">
							<?php if(!empty($thum_image)): ?>
    							<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    							<div class="gallery_overlay">
    								<a href="<?php echo esc_url($attachment_url); ?>" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
    							</div> 
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
			</div>
		</div>
	</div>
</div>
<?php
break;   
default;
?>
<div class="clv_gallery_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($gallery_heading) || !empty($gallery_imageicon) || !empty($gallery_descreption) ): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading white_heading">
				    <?php if(!empty($gallery_heading)): ?>
					  <h3><?php echo __($gallery_heading); ?></h3>
					<?php endif; 
					if(!empty($gallery_imageicon)):
					?>
					<div class="clv_underline"><img src="<?php echo esc_url($gallery_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif; 
					if(!empty($gallery_descreption)):
					?><p><?php echo esc_html($gallery_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-12">
				<div class="gallery_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						   <?php 
						   if(!empty($gallery_category)):
						     foreach($gallery_category as $get_categorys ):
    						     $gallery_shownumber = '';
    					         if(!empty($get_categorys['gallery_number'])):
    					            $gallery_shownumber = $get_categorys['gallery_number'];
    					         endif;
    					         $gallery_catname = '';
    					         if(!empty($get_categorys['gallery_catname'])):
    					            $gallery_catname = $get_categorys['gallery_catname'];
    					         endif;
    					    ?>
							<div class="swiper-slide">
								<div class="gallery_slide">
									<div class="gallery_grid">
									    <?php
                        				$args = array(
                                            'post_type' =>'gallery',
                                            'order'   => 'ASC',
                                            'posts_per_page' => $gallery_shownumber,
                                            'tax_query' => array(
                                                    array (
                                                    'taxonomy' =>'gallery-category', 
                                                    'field' => 'id',
                                                    'terms' => $gallery_catname,
                                                   )         
                                                ),
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
                                			    $thum_image = cultivation_aq_resize($attachment_url, 800, 600, false);
                                			endif;	
                                		?>     
									    <div class="gallery_grid_item">
											<div class="gallery_image">
											     <?php if(!empty($thum_image)): ?>
												 <img src="<?php echo esc_url($thum_image); ?>" alt="<?php the_title_attribute(); ?>" />
        										 <div class="gallery_overlay">
        											<a href="<?php echo esc_url($attachment_url); ?>" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
        										 </div>
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
							</div>
						   <?php 
						    endforeach;
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
<?php
}