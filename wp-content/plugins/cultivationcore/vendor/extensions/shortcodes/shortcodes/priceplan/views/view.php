<?php if (!defined('FW')) die('Forbidden');

$priceplan_style = '';
if(!empty($atts['priceplan_style'])):
   $priceplan_style = $atts['priceplan_style'];
endif; 
$pl_heading = '';
if(!empty($atts['pl_heading'])):
   $pl_heading = $atts['pl_heading'];
endif; 
$pl_shownumber = '';
if(!empty($atts['pl_shownumber'])):
   $pl_shownumber = $atts['pl_shownumber'];
endif; 
$pl_descreption = '';
if(!empty($atts['pl_descreption'])):
   $pl_descreption = $atts['pl_descreption'];
endif; 
$pl_imageicon = '';
if(!empty($atts['pl_imageicon']['url'])):
   $pl_imageicon = $atts['pl_imageicon']['url'];
endif; 
switch ($priceplan_style) {
case 'style_one':
?>
<!-- pricingplan style one -->
<div class="garden_pricing_wrapper clv_section">
		<div class="container">
		   <?php if(!empty($pl_heading) || !empty($pl_imageicon) || !empty($pl_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading">
					    <?php if(!empty($pl_heading)): ?>
					    <h3><?php echo esc_html($pl_heading); ?></h3>
						<?php endif; 
						if(!empty($pl_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($pl_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($pl_descreption)):
						?><p><?php echo esc_html($pl_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="pricing_section"> 
				<div class="row">
				    <?php
				    $args = array(
                       'post_type' =>'plane',
                       'order'   => 'ASC',
                       'posts_per_page' => $pl_shownumber
                      );
				    $cv_query = new WP_Query($args);
        		    if($cv_query->have_posts() ) :
                       while($cv_query->have_posts()): $cv_query->the_post();
                        if(function_exists( 'fw_get_db_post_option' )):	
                            $cultivation_post_data = fw_get_db_post_option(get_the_ID()); 
                        endif;
                        $pl_currency = '';
                        if(!empty($cultivation_post_data['pl_currency'])):
                          $pl_currency = $cultivation_post_data['pl_currency'];
                        endif;
                        $pl_price = '';
                        if(!empty($cultivation_post_data['pl_price'])):
                          $pl_price = $cultivation_post_data['pl_price'];
                        endif;
                        $pl_buttontext = '';
                        if(!empty($cultivation_post_data['pl_buttontext'])):
                          $pl_buttontext = $cultivation_post_data['pl_buttontext'];
                        else:
                           $pl_buttontext = esc_html__('purchase','cultivation');
                        endif;
                        $pl_buttonurl = '';
                        if(!empty($cultivation_post_data['pl_buttonurl'])):
                           $pl_buttonurl = $cultivation_post_data['pl_buttonurl'];
                        endif;
                        $pl_tabletext = '';
                        if(!empty($cultivation_post_data['pl_tabletext'])):
                          $pl_tabletext = $cultivation_post_data['pl_tabletext'];
                        endif;
                        $pl_headingcolor = '';
                        if(!empty($cultivation_post_data['pl_headingcolor'])):
                          $pl_headingcolor ="background-color:".esc_attr($cultivation_post_data['pl_headingcolor']).";";
                        endif;
                       $section_style   = ($pl_headingcolor ) ? 'style="'. esc_attr($pl_headingcolor) . '"' : '';
        			?>
					<div class="col-lg-4 col-md-4">
						<div class="pricing_block">
							<div class="pricing_header" <?php printf($section_style); ?>>
								<h3><?php the_title(); ?></h3>
							</div>
							<?php if(!empty($pl_price)): ?>
							  <h1><span><?php echo esc_html($pl_currency); ?></span><?php echo esc_html($pl_price); ?></h1>
							<?php endif; ?>
							<ul> 
							 <?php
							 foreach($pl_tabletext as $tabletextval ):
							   if(!empty($tabletextval['table_text_iner'])):
    							  echo '<li>
    							         <p>'.esc_html($tabletextval['table_text_iner']).'</p>
    							       </li>';
							   endif;   
							 endforeach;
							?>
							</ul>
						    <?php if(!empty($pl_buttonurl)): ?>
						 	  <a href="<?php echo esc_url($pl_buttonurl); ?>"><?php echo esc_html($pl_buttontext); ?></a>
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
<!-- pricingplan style one -->	
<?php
break;
case 'style_two':
?>
<!-- pricingplan style two -->	
<div class="coffee_pricing_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($pl_heading) || !empty($pl_imageicon) || !empty($pl_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading">
					    <?php if(!empty($pl_heading)): ?>
					    <h3><?php echo esc_html($pl_heading); ?></h3>
						<?php endif; 
						if(!empty($pl_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($pl_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($pl_descreption)):
						?><p><?php echo esc_html($pl_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="coffee_pricing_section">
				    
					<div class="coffee_pricing_toggle">
						<p class="fieldset">
						    <?php
						    $i = 1;
						    $tax_terms = get_terms('plane-category');
						    foreach($tax_terms as $category):
							$cata_name = $category->name;
						    $cata_slug = $category->slug;
						    ?>
							<input type="radio" name="duration-1" value="<?php echo esc_attr($cata_slug); ?>" id="<?php echo esc_attr($cata_slug); ?>-<?php echo esc_attr($i)?>" class="my_toggle" checked>
							<label for="<?php echo esc_attr($cata_slug); ?>-<?php echo esc_attr($i)?>"><?php echo esc_html($cata_name); ?></label>
							<?php 
							$i++;
							endforeach;
							?>
							<span class="pr_switch"></span>
						</p>
					</div>
					<div class="pricing_table_section">
					<div class="row">
				    <?php
				    $args = array(
                       'post_type' =>'plane',
                       'order'   => 'ASC',
                       'posts_per_page' =>6
                      );
				    $cv_query = new WP_Query($args);
        		    if($cv_query->have_posts() ) :
                       while($cv_query->have_posts()): $cv_query->the_post();
                       
                        if(function_exists( 'fw_get_db_post_option' )):	
                            $cultivation_post_data = fw_get_db_post_option(get_the_ID()); 
                        endif;
                        $pl_currency = '';
                        if(!empty($cultivation_post_data['pl_currency'])):
                          $pl_currency = $cultivation_post_data['pl_currency'];
                        endif;
                        $pl_price = '';
                        if(!empty($cultivation_post_data['pl_price'])):
                          $pl_price = $cultivation_post_data['pl_price'];
                        endif;
                        $pl_buttontext = '';
                        if(!empty($cultivation_post_data['pl_buttontext'])):
                          $pl_buttontext = $cultivation_post_data['pl_buttontext'];
                        else:
                           $pl_buttontext = esc_html__('purchase','cultivation');
                        endif;
                        $pl_buttonurl = '';
                        if(!empty($cultivation_post_data['pl_buttonurl'])):
                           $pl_buttonurl = $cultivation_post_data['pl_buttonurl'];
                        endif;
                        $pl_tabletext = '';
                        if(!empty($cultivation_post_data['pl_tabletext'])):
                          $pl_tabletext = $cultivation_post_data['pl_tabletext'];
                        endif;
                        $pl_headingcolor = '';
                        if(!empty($cultivation_post_data['pl_headingcolor'])):
                          $pl_headingcolor ="background-color:".esc_attr($cultivation_post_data['pl_headingcolor']).";";
                        endif;
                       $section_style   = ($pl_headingcolor ) ? 'style="'. esc_attr($pl_headingcolor) . '"' : '';
                       
                        $ca_slug = array();
					    $post_categories = get_the_terms( get_the_ID(), 'plane-category' );
						if( $post_categories ):
					      foreach ( $post_categories as $selected_categories ):
					          $ca_slug[] = $selected_categories->slug;
						      $post_cata_slug = join(" ",$ca_slug);		  
					       endforeach; 
						else:
					     $post_cata_slug = '';
					    endif;
        		        ?>  
						<div class="col-md-4">
							<div class="pricing-group">
							     <div class="coffee_pricing_block <?php echo esc_attr($post_cata_slug); ?>">
									<div class="pricing_header <?php the_title_attribute(); ?>" <?php printf($section_style); ?>>
										<h5><?php the_title(); ?></h5>
										<?php if(!empty($pl_price)): ?>
						                  <h3><span><?php echo esc_html($pl_currency); ?></span><?php echo esc_html($pl_price); ?></h3>
						                <?php endif; ?>
									</div>
									<ul>
									 <?php
            						 foreach($pl_tabletext as $tabletextval ):
            						    if(!empty($tabletextval['table_text_iner'])):
                							echo '<li>
                							      <p>'.esc_html($tabletextval['table_text_iner']).'</p>
                							     </li>';
            							   endif;   
            					     endforeach;
            						 ?>
									</ul>
									<?php if(!empty($pl_buttonurl)): ?>
					 	               <a href="<?php echo esc_url($pl_buttonurl); ?>"><?php echo esc_html($pl_buttontext); ?></a>
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
		 </div>
  	  </div>
   </div>
</div>
<!-- pricingplan style two -->	
<?php
break;
default;
?>
<div class="garden_pricing_wrapper clv_section">
	<div class="container">
	   <?php if(!empty($pl_heading) || !empty($pl_imageicon) || !empty($pl_descreption)): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				    <?php if(!empty($pl_heading)): ?>
				    <h3><?php echo esc_html($pl_heading); ?></h3>
					<?php endif; 
					if(!empty($pl_imageicon)):
					?><div class="clv_underline"><img src="<?php echo esc_url($pl_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
					<?php
					endif;
					if(!empty($pl_descreption)):
					?><p><?php echo esc_html($pl_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="pricing_section"> 
			<div class="row">
			    <?php
			    $args = array(
                   'post_type' =>'plane',
                   'order'   => 'ASC',
                   'posts_per_page' => $pl_shownumber
                  );
			    $cv_query = new WP_Query($args);
    		    if($cv_query->have_posts() ) :
                   while($cv_query->have_posts()): $cv_query->the_post();
                   
                    if(function_exists( 'fw_get_db_post_option' )):	
                        $cultivation_post_data = fw_get_db_post_option(get_the_ID()); 
                    endif;
                    $pl_currency = '';
                    if(!empty($cultivation_post_data['pl_currency'])):
                      $pl_currency = $cultivation_post_data['pl_currency'];
                    endif;
                    $pl_price = '';
                    if(!empty($cultivation_post_data['pl_price'])):
                      $pl_price = $cultivation_post_data['pl_price'];
                    endif;
                    $pl_buttontext = '';
                    if(!empty($cultivation_post_data['pl_buttontext'])):
                      $pl_buttontext = $cultivation_post_data['pl_buttontext'];
                    else:
                       $pl_buttontext = esc_html__('purchase','cultivation');
                    endif;
                    $pl_buttonurl = '';
                    if(!empty($cultivation_post_data['pl_buttonurl'])):
                       $pl_buttonurl = $cultivation_post_data['pl_buttonurl'];
                    endif;
                    $pl_tabletext = '';
                    if(!empty($cultivation_post_data['pl_tabletext'])):
                      $pl_tabletext = $cultivation_post_data['pl_tabletext'];
                    endif;
                    $pl_headingcolor = '';
                    if(!empty($cultivation_post_data['pl_headingcolor'])):
                      $pl_headingcolor ="background-color:".esc_attr($cultivation_post_data['pl_headingcolor']).";";
                    endif;
                   $section_style   = ($pl_headingcolor ) ? 'style="'. esc_attr($pl_headingcolor) . '"' : '';
    			?>
				<div class="col-lg-4 col-md-4">
					<div class="pricing_block">
						<div class="pricing_header" <?php printf($section_style); ?>>
							<h3><?php the_title(); ?></h3>
						</div>
						<?php if(!empty($pl_price)): ?>
						  <h1><span><?php echo esc_html($pl_currency); ?></span><?php echo esc_html($pl_price); ?></h1>
						<?php endif; ?>
						<ul>
						 <?php
						 foreach($pl_tabletext as $tabletextval ):
						   if(!empty($tabletextval['table_text_iner'])):
							  echo '<li>
							         <p>'.esc_html($tabletextval['table_text_iner']).'</p>
							       </li>';
						   endif;   
						 endforeach;
						?>
						</ul>
					    <?php if(!empty($pl_buttonurl)): ?>
					 	  <a href="<?php echo esc_url($pl_buttonurl); ?>"><?php echo esc_html($pl_buttontext); ?></a>
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
<?php   
}