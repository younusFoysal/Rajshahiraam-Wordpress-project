<?php if (!defined('FW')) die('Forbidden'); 
$counter_style = '';
if(!empty($atts['counter_style'])):
   $counter_style = $atts['counter_style'];
endif;
$counter_heading = '';
if(!empty($atts['counter_heading'])):
   $counter_heading = $atts['counter_heading'];
endif; 
$counter_descreption = '';
if(!empty($atts['counter_descreption'])):
   $counter_descreption = $atts['counter_descreption'];
endif; 
$counter_imageicon = '';
if(!empty($atts['counter_imageicon']['url'])):
   $counter_imageicon = $atts['counter_imageicon']['url'];
endif; 
$counter_imageicon = '';
if(!empty($atts['counter_imageicon']['url'])):
   $counter_imageicon = $atts['counter_imageicon']['url'];
endif; 
$cultivation_counter = '';
if(!empty($atts['cultivation_counter'])):
   $cultivation_counter = $atts['cultivation_counter'];
endif; 
switch ($counter_style) {
case 'style_one':
?>
<!--Counter Style one-->
<div class="clv_counter_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($counter_heading) || !empty($counter_imageicon) || !empty($counter_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading white_heading">
					    <?php if(!empty($counter_heading)): ?>
					    <h3><?php echo esc_html($counter_heading); ?></h3>
						<?php endif; 
						if(!empty($counter_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($counter_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($counter_descreption)):
						?><p><?php echo esc_html($counter_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="counter_section">
			<div class="row">
			<?php foreach($cultivation_counter as $counter_data):
			 $counter_number = '';
			 if(!empty($counter_data['counter_number'])):
			   $counter_number = $counter_data['counter_number'];  
			 endif;
			 $counter_number_unit = '';
			 if(!empty($counter_data['counter_number_unit'])):
			   $counter_number_unit = $counter_data['counter_number_unit'];  
			 endif;
			 $counter_title = '';
			 if(!empty($counter_data['counter_title'])):
			   $counter_title = $counter_data['counter_title'];  
			 endif;
			 $counterin_imageicon = '';
			 if(!empty($counter_data['counterin_imageicon']['attachment_id'])):
			  $attachment_id = $counter_data['counterin_imageicon']['attachment_id'];
	
               $counterin_imageicon_full = wp_get_attachment_url($attachment_id, 'full');
               if(function_exists('cultivation_aq_resize')):
			   $counterin_imageicon = cultivation_aq_resize($counterin_imageicon_full,80,80,true);
			   else:
			      $counterin_imageicon = wp_get_attachment_url($attachment_id, 'full'); 
			   endif;
			 endif;
			?> 
			<div class="col-lg-3 col-md-3">
				<div class="counter_block">
				    <?php if(!empty($counterin_imageicon)): ?>
					<div class="counter_img">
						<span class="red_bg"><img src="<?php echo esc_url($counterin_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" class="img-fluid" /></span>
					</div>
					<?php endif; ?>
					<div class="counter_text">
					    <?php if(!empty($counter_number)): ?>
						<h4><span class="count_no" data-to="<?php echo esc_attr($counter_number); ?>" data-speed="3000"><?php echo esc_html($counter_number);?></span><?php if(!empty($counter_number_unit)): ?><span><?php echo esc_html($counter_number_unit); ?></span><?php endif; ?></h4>
						<?php 
						endif;
						if(!empty($counter_title)): ?>
					  	   <h5><?php echo esc_html($counter_title); ?></h5>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<!--Counter Style One-->
<?php 
break;
case 'style_two':
?>
<!--Counter Style Two -->
<div class="clv_counter_wrapper clv_section clv_counter_style2"> 
	<div class="container">
    <?php if(!empty($counter_heading) || !empty($counter_imageicon) || !empty($counter_descreption)): ?>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				    <?php if(!empty($counter_heading)): ?>
				    <h3><?php echo esc_html($counter_heading); ?></h3>
					<?php endif; 
					if(!empty($counter_imageicon)):
					?><div class="clv_underline"><img src="<?php echo esc_url($counter_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
					<?php
					endif;
					if(!empty($counter_descreption)):
					?><p><?php echo esc_html($counter_descreption); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="counter_section">
		<div class="row">
		    <?php foreach($cultivation_counter as $counter_data):
    			 $counter_number = '';
    			 if(!empty($counter_data['counter_number'])):
    			   $counter_number = $counter_data['counter_number'];  
    			 endif;
    			 $counter_number_unit = '';
    			 if(!empty($counter_data['counter_number_unit'])):
    			     
    			   $counter_number_unit = $counter_data['counter_number_unit'];
    			   
    			 endif;
    			 $counter_title = '';
    			 if(!empty($counter_data['counter_title'])):
    			   $counter_title = $counter_data['counter_title'];  
    			 endif;
    			 $counterin_imageicon = '';
    			 if(!empty($counter_data['counterin_imageicon']['attachment_id'])):
    			  $attachment_id = $counter_data['counterin_imageicon']['attachment_id'];
    	
                   $counterin_imageicon_full = wp_get_attachment_url($attachment_id, 'full');
                   if(function_exists('cultivation_aq_resize')):
    			   $counterin_imageicon = cultivation_aq_resize($counterin_imageicon_full,80,80,true);
    			   else:
    			      $counterin_imageicon = wp_get_attachment_url($attachment_id, 'full'); 
    			   endif;
    			 endif;
    			?> 
				<div class="col-lg-3 col-md-3">
					<div class="counter_block">
					    <?php if(!empty($counterin_imageicon)): ?>
						<div class="counter_img">
						   <span><img src="<?php echo esc_url($counterin_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" class="img-fluid" /></span>
						</div>
						<?php endif; ?>
						<div class="counter_text">
						    <?php if(!empty($counter_number)): ?>
							<h4><span class="count_no" data-to="<?php echo esc_attr($counter_number); ?>" data-speed="3000"><?php echo esc_html($counter_number);?></span><?php if(!empty($counter_number_unit)): ?><span><?php echo esc_html($counter_number_unit); ?></span><?php endif; ?></h4>
							<?php endif; 
							if(!empty($counter_title)):
							?><h5><?php echo esc_html($counter_title); ?></h5>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php 
break;
default;
?>
<div class="clv_counter_wrapper clv_section">
	<div class="container">
	    <?php if(!empty($counter_heading) || !empty($counter_imageicon) || !empty($counter_descreption)): ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6">
					<div class="clv_heading">
					    <?php if(!empty($counter_heading)): ?>
					    <h3><?php echo esc_html($counter_heading); ?></h3>
						<?php endif; 
						if(!empty($counter_imageicon)):
						?><div class="clv_underline"><img src="<?php echo esc_url($counter_imageicon); ?>" alt="<?php esc_attr_e('underline','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($counter_descreption)):
						?><p><?php echo esc_html($counter_descreption); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="counter_section">
			<div class="row">
			<?php foreach($cultivation_counter as $counter_data):
			 $counter_number = '';
			 if(!empty($counter_data['counter_number'])):
			   $counter_number = $counter_data['counter_number'];  
			 endif;
			 $counter_number_unit = '';
			 if(!empty($counter_data['counter_number_unit'])):
			   $counter_number_unit = $counter_data['counter_number_unit'];  
			 endif;
			 $counter_title = '';
			 if(!empty($counter_data['counter_title'])):
			   $counter_title = $counter_data['counter_title'];  
			 endif;
			 
			 $counterin_imageicon = '';
			 if(!empty($counter_data['counterin_imageicon']['attachment_id'])):
			  $attachment_id = $counter_data['counterin_imageicon']['attachment_id'];
	
               $counterin_imageicon_full = wp_get_attachment_url($attachment_id, 'full');
               if(function_exists('cultivation_aq_resize')):
			   $counterin_imageicon = cultivation_aq_resize($counterin_imageicon_full,80,80,true);
			   else:
			      $counterin_imageicon = wp_get_attachment_url($attachment_id, 'full'); 
			   endif;
			 endif;
			?> 
			<div class="col-lg-3 col-md-3">
				<div class="counter_block">
				    <?php if(!empty($counterin_imageicon)): ?>
					<div class="counter_img">
						<span class="red_bg"><img src="<?php echo esc_url($counterin_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" class="img-fluid" /></span>
					</div>
					<?php endif; ?>
					<div class="counter_text">
					    <?php if(!empty($counter_number)): ?>
						<h4><span class="count_no" data-to="<?php echo esc_attr($counter_number); ?>" data-speed="3000"><?php echo esc_html($counter_number);?></span><?php if(!empty($counter_number_unit)): ?><span><?php echo esc_html($counter_number_unit); ?></span><?php endif; ?></h4>
						<?php 
						endif;
						if(!empty($counter_title)): ?>
					  	   <h5><?php echo esc_html($counter_title); ?></h5>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php 
}