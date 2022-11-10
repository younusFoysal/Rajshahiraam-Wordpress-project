<?php if (!defined('FW')) die('Forbidden');
$cv_partners = '';
if(!empty($atts['cv_partners'])):
   $cv_partners = $atts['cv_partners'];
endif; 
?>
<!-- partener style one -->
<div class="clv_partner_wrapper clv_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="partner_slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						<?php 
						foreach($cv_partners as $partners_value):
    					    $partners_image = '';
    					    if(!empty($partners_value['partners_image']['attachment_id'])):
    					        $attachment_id = $partners_value['partners_image']['attachment_id'];
    					        
    					         $partners_image_full = wp_get_attachment_url($attachment_id, 'full');
    					          if(function_exists('cultivation_aq_resize')):
                    			      $partners_image = cultivation_aq_resize($partners_image_full,170,120,true);
                    			   else:
                    			       $partners_image = wp_get_attachment_url($attachment_id, 'full');
                    			   endif;
    					      endif;
    					    $partners_svgicon = '';
    						if(!empty($partners_value['partners_svgicon'])):
    						    $partners_svgicon = $partners_value['partners_svgicon'];
    						endif;
    					    $website_url = '';
    					    if(!empty($partners_value['website_url'])):
    					        $website_url = $partners_value['website_url'];
    					    endif;
    					   if(!empty($partners_image) || !empty($partners_svgicon)):
						   ?> 
    						<div class="swiper-slide">
    							<div class="partner_slide">
    								<div class="partner_image">
    								  <a href="<?php echo esc_url($website_url); ?>">
    								    <?php 
    								     if(!empty($partners_image)): 
    								    ?><img src="<?php echo esc_url($partners_image); ?>" alt="<?php esc_attr_e('partner logo','cultivation'); ?>" >
    								    <?php
    								    else: 
    								    printf($partners_svgicon);   
    								   endif; ?>    
    								  </a>
    								</div> 
    							</div>
        					</div>
						   <?php 
						  endif;
						endforeach;
					   ?>
					  </div>
					</div>
					<!-- Add Arrows -->
					<span class="slider_arrow partner_left left_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="10px" height="15px">
						<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
						 d="M0.324,8.222 L7.117,14.685 C7.549,15.097 8.249,15.097 8.681,14.685 C9.113,14.273 9.113,13.608 8.681,13.197 L2.670,7.478 L8.681,1.760 C9.113,1.348 9.113,0.682 8.681,0.270 C8.249,-0.139 7.548,-0.139 7.116,0.270 L0.323,6.735 C0.107,6.940 -0.000,7.209 -0.000,7.478 C-0.000,7.747 0.108,8.017 0.324,8.222 Z"/>
						</svg>
					</span>
					<span class="slider_arrow partner_right right_arrow">
						<svg 
						 xmlns="http://www.w3.org/2000/svg"
						 xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="19px" height="25px">
						<path fill-rule="evenodd" fill="rgb(226, 226, 226)"
						 d="M13.676,13.222 L6.883,19.685 C6.451,20.097 5.751,20.097 5.319,19.685 C4.887,19.273 4.887,18.608 5.319,18.197 L11.329,12.478 L5.319,6.760 C4.887,6.348 4.887,5.682 5.319,5.270 C5.751,4.861 6.451,4.861 6.884,5.270 L13.676,11.735 C13.892,11.940 14.000,12.209 14.000,12.478 C14.000,12.747 13.892,13.017 13.676,13.222 Z"/>
						</svg>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- partener style one -->