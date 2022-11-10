<?php if (!defined('FW')) die('Forbidden');
$product_heading = '';
if(!empty($atts['product_heading'])):
   $product_heading = $atts['product_heading'];
endif;
$product_shownumber = '';
if(!empty($atts['product_shownumber'])):
   $product_shownumber = $atts['product_shownumber'];
endif;
$product_loadermore = '';
if(!empty($atts['product_loadermore'])):
   $product_loadermore = $atts['product_loadermore'];
endif;
$product_descreption = '';
if(!empty($atts['product_descreption'])):
   $product_descreption = $atts['product_descreption'];
endif;
$product_headingclass = '';
if(!empty($atts['product_headingclass'])):
   $product_headingclass = $atts['product_headingclass'];
endif;
if($product_headingclass == true):
   $product_headingclass = 'white_heading'; 
endif;
$product_imageicon = '';
if(!empty($atts['product_imageicon']['url'])):
   $product_imageicon = $atts['product_imageicon']['url'];
endif;
$product_style ='';
if(!empty($atts['product_style'])):
   $product_style = $atts['product_style'];
endif;
switch ($product_style) {
case 'style_one':
?> 
<!--Shop-->
<div class="clv_shop_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($product_heading) || !empty($product_imageicon) || !empty($product_descreption)): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading <?php echo esc_attr($product_headingclass); ?>">
				    <?php if(!empty($product_heading)): ?>
					  <h3><?php echo __($product_heading); ?></h3>
					<?php endif; 
					if(!empty($product_imageicon)):
					?><div class="clv_underline"><img src="<?php echo esc_url($product_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif; 
					if(!empty($product_descreption)):
					?><p><?php echo __($product_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="shop_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						    <?php
            				$args = array(
                                'post_type' =>'product',
                                'order'   => 'ASC',
                                'posts_per_page' => $product_shownumber
                                );
            				$cv_query = new WP_Query($args);
            				if($cv_query->have_posts() ) :
                                while($cv_query->have_posts()): $cv_query->the_post();
                                if(has_post_thumbnail(get_the_ID())):
                                    $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    			    $thum_image = cultivation_aq_resize($attachment_url, 170,200, false);
                    			endif;	
                    			global $product;
                    	    if(class_exists('WooCommerce')):
                    		?> 
							<div class="swiper-slide">
								<div class="shop_slide">
								    <?php if(!empty($thum_image)): ?>
									<div class="item_image">
									   <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" class="img-fluid" /></a>
									</div>
									<?php endif; ?>
									<h5><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h5>
									<?php if($price_html = $product->get_price_html()): ?>
									  <h6><?php printf($price_html); ?></h6>
									<?php endif; ?>
									<div class="item_overlay">
									    <?php
									    if(function_exists( 'yith_wishlist_constructor' ) ):
										 echo do_shortcode ('[yith_wcwl_add_to_wishlist]'); 
									     endif;
									     ?>
										<h5><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h5>
										  <?php
										  if($price_html = $product->get_price_html()):
										  ?><h6><?php printf($price_html); ?></h6>
										  <?php endif;
										  if($product = wc_get_product(get_the_ID())):
										  ?><a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="shop_btn"><?php esc_html_e('add to cart','cultivation'); ?></a>
										<?php endif; ?>
									</div>
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
					<span class="slider_arrow shop_left left_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="10px" height="20px">
						<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
						 d="M0.272,10.703 L8.434,19.703 C8.792,20.095 9.372,20.095 9.731,19.703 C10.089,19.308 10.089,18.668 9.731,18.274 L2.217,9.990 L9.730,1.706 C10.089,1.310 10.089,0.672 9.730,0.277 C9.372,-0.118 8.791,-0.118 8.433,0.277 L0.271,9.274 C-0.082,9.666 -0.082,10.315 0.272,10.703 Z"/>
						</svg>
					</span>
					<span class="slider_arrow shop_right right_arrow">
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
break;
case 'style_two':
?>
<div class="org_product_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($product_heading) || !empty($product_imageicon) || !empty($product_descreption)): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading <?php echo esc_attr($product_headingclass); ?>">
				    <?php if(!empty($product_heading)): ?>
					  <h3><?php echo __($product_heading); ?></h3>
					<?php endif; 
					if(!empty($product_imageicon)):
					?><div class="clv_underline"><img src="<?php echo esc_url($product_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif; 
					if(!empty($product_descreption)):
					?><p><?php echo __($product_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?> 
		<div class="org_product_section">
			<div class="row" id="clv_product_setdata"> 
			    <?php
				$args = array(
                    'post_type' =>'product',
                    'order'   => 'ASC',
                    'posts_per_page' => $product_shownumber
                    );
				$cv_query = new WP_Query($args);
				if($cv_query->have_posts() ) :
                    while($cv_query->have_posts()): $cv_query->the_post();
                    if(has_post_thumbnail(get_the_ID())):
                        $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
        			    $thum_image = cultivation_aq_resize($attachment_url, 253, 170, false);
        			endif;	
        			global $product;
        		    if(class_exists('WooCommerce')):
        		   ?>
    				<div class="col-md-4">
    					<div class="org_product_block">
    					    <?php 
    					    $price = get_post_meta( get_the_ID(), '_regular_price', true);
                             $price_sale = get_post_meta( get_the_ID(), '_sale_price', true);
                            if(!empty($price_sale)):
    					      $percentage = round( ( ( $price - $price_sale ) / $price ) * 100 );
                              echo '<span class="product_label">'.esc_html($percentage).esc_html__('% OFF','cultivation').'</span>';  
                            endif;
    					    ?>
    					   <?php if(!empty($thum_image)): ?>
    						 <div class="org_product_image">
    						    <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    						    </a>
    						 </div>
    						<?php endif; ?>
    						<h4><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h4>
    						<?php if($price_html = $product->get_price_html()): ?><h3><span><i class="fa fa-usd" aria-hidden="true"></i></span><?php printf($price_html); ?></h3>
							<?php endif;
							if($product = wc_get_product(get_the_ID())): ?>
							<a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="shop_btn">
							 <?php esc_html_e('add to cart','cultivation'); ?> 
							</a>
    					   <?php endif; ?>
    					</div>
    				</div>
				<?php 
				endif;
				endwhile;
        		wp_reset_postdata();
        		endif;
				?>
			</div>
			<div class="load_more_btn">
		     <a href="javascript:;" id="clv_loadmoreoption" data-productnumber="<?php echo esc_attr($product_shownumber); ?>" data-loadernumber="<?php echo esc_attr($product_loadermore); ?>" class="clv_btn"><?php esc_html_e('view more','cultivation'); ?></a> 
		    </div>
		</div>
	</div>
</div>
<?php 
break;
default: 
?>
<!--Shop-->
<div class="clv_shop_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($product_heading) || !empty($product_imageicon) || !empty($product_descreption)): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading <?php echo esc_attr($product_headingclass); ?>">
				    <?php if(!empty($product_heading)): ?>
					  <h3><?php echo __($product_heading); ?></h3>
					<?php endif; 
					if(!empty($product_imageicon)):
					?><div class="clv_underline"><img src="<?php echo esc_url($product_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php endif; 
					if(!empty($product_descreption)):
					?><p><?php echo __($product_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="shop_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						    <?php
            				$args = array(
                                'post_type' =>'product',
                                'order'   => 'ASC',
                                'posts_per_page' => $product_shownumber
                                );
            				$cv_query = new WP_Query($args);
            				if($cv_query->have_posts() ) :
                                while($cv_query->have_posts()): $cv_query->the_post();
                                if(has_post_thumbnail(get_the_ID())):
                                    $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                    			    $thum_image = cultivation_aq_resize($attachment_url, 195, 128, false);
                    			endif;	
                    			global $product;
                    	    if(class_exists('WooCommerce')):
                    		?> 
							<div class="swiper-slide">
								<div class="shop_slide">
								    <?php if(!empty($thum_image)): ?>
									<div class="item_image">
									   <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" class="img-fluid" /></a>
									</div>
									<?php endif; ?>
									<h5><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h5>
									<?php if($price_html = $product->get_price_html()): ?>
									  <h6><?php printf($price_html); ?></h6>
									<?php endif; ?>
									<div class="item_overlay">
									    <?php if(function_exists( 'yith_wishlist_constructor' ) ):?>
										<label for="wishlist1">
										<?php
										echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
										</label>
										<?php endif; ?>
										 <h5><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h5>
										  <?php
										  if($price_html = $product->get_price_html()):
										  ?><h6><?php printf($price_html); ?></h6>
										  <?php endif;
										  if($product = wc_get_product(get_the_ID())):
										  ?><a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="shop_btn"><?php esc_html_e('add to cart','cultivation'); ?></a>
										  <?php endif; ?>
									</div>
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
					<span class="slider_arrow shop_left left_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="10px" height="20px">
						<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
						 d="M0.272,10.703 L8.434,19.703 C8.792,20.095 9.372,20.095 9.731,19.703 C10.089,19.308 10.089,18.668 9.731,18.274 L2.217,9.990 L9.730,1.706 C10.089,1.310 10.089,0.672 9.730,0.277 C9.372,-0.118 8.791,-0.118 8.433,0.277 L0.271,9.274 C-0.082,9.666 -0.082,10.315 0.272,10.703 Z"/>
						</svg>
					</span>
					<span class="slider_arrow shop_right right_arrow">
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