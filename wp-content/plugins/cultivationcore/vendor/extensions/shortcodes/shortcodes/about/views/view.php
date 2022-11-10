<?php if (!defined('FW')) die('Forbidden');

$about_style = '';
if(!empty($atts['cultivation_pickers']['aboutus_style'])):
	$about_style = $atts['cultivation_pickers']['aboutus_style'];
endif; 
$abouts_title = '';
if(!empty($atts['abouts_title'])):
	$abouts_title = $atts['abouts_title'];
endif; 
$abouts_sub_title = '';
if(!empty($atts['abouts_sub_title'])):
	$abouts_sub_title = $atts['abouts_sub_title'];
endif; 
$about_heading_icone = '';
if(!empty($atts['about_heading_icone']['url'])):
	$about_heading_icone = $atts['about_heading_icone']['url'];
endif; 
$about_image = '';
if(!empty($atts['about_image']['url'])):
	$about_image = $atts['about_image']['url'];
endif; 
$about_description = '';
if(!empty($atts['about_description'])):
   $about_description = $atts['about_description'];
endif; 
switch ($about_style) {
case 'style_one':
$abouts_text = '';
if(!empty($atts['cultivation_pickers']['style_one']['abouts_text'])):
   $abouts_text = $atts['cultivation_pickers']['style_one']['abouts_text'];
else:
   $abouts_text = esc_html__('read more','cultivation'); 
endif; 
$abouts_link = '';
if(!empty($atts['cultivation_pickers']['style_one']['abouts_link'])):
   $abouts_link = $atts['cultivation_pickers']['style_one']['abouts_link'];
endif;    
$about_video_url = ''; 
if(!empty($atts['cultivation_pickers']['style_one']['about_video_url'])):
	$about_video_url = $atts['cultivation_pickers']['style_one']['about_video_url'];
endif;  
?> 
<!-- style one -->
<div class="clv_about_wrapper clv_section">
	<div class="container">
		<div class="row">
		    <?php if(!empty($about_image)): ?>
		    <div class="col-md-6">
				<div class="about_img">
					<img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
				</div>
			</div>
			<?php endif; ?>
			<div class="col-md-6">
				<div class="about_content">
					<div class="about_heading">
					     <?php if(!empty($abouts_title)): ?>
						   <h2><?php echo __($abouts_title); ?></h2>
						 <?php endif;
						  if(!empty($abouts_sub_title)):
						  ?><h6><?php echo esc_html($abouts_sub_title); ?></h6>
						  <?php endif; 
						  if(!empty($about_heading_icone)):
						  ?><div class="clv_underline"><img src="<?php echo esc_url($about_heading_icone); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
						  <?php endif; ?>
					</div>
					<?php if(!empty($about_description)): ?>
    					<div class="para_content">
    						<?php echo __($about_description)?>
    					</div>
					<?php endif; ?>
					<div class="video_block">
					    <?php if(!empty($about_video_url)): ?>
    						<div class="video_btn">
    							<a href="<?php echo esc_url($about_video_url); ?>" class="play_video"><span class="pulse"><i class="fa fa-play" aria-hidden="true"></i></span> <?php esc_html_e('watch video','cultivation'); ?></a>
    						</div>
						<?php endif;
						if(!empty($abouts_link)):
						?><a href="<?php echo esc_url($abouts_link); ?>" class="clv_btn"><?php echo esc_html($abouts_text); ?></a>
						<?php endif; ?>
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
$abouts_text = '';
if(!empty($atts['cultivation_pickers']['style_two']['abouts_text'])):
   $abouts_text = $atts['cultivation_pickers']['style_two']['abouts_text'];
else:
   $abouts_text = esc_html__('read more','cultivation'); 
endif; 
$abouts_link = '';
if(!empty($atts['cultivation_pickers']['style_two']['abouts_link'])):
   $abouts_link = $atts['cultivation_pickers']['style_two']['abouts_link'];
endif;      
?>
<!-- style two -->
<div class="about_farm_wrapper clv_section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="about_content">
					<div class="about_heading">
					    <?php if(!empty($abouts_title)): ?>
						  <h2><?php echo __($abouts_title); ?></h2>
						<?php endif;
						if(!empty($about_heading_icone)):
						?><div class="clv_underline"><img src="<?php echo esc_url($about_heading_icone); ?>" alt="<?php echo esc_attr_e('image','cultivation'); ?>" /></div>
						<?php
						endif;
						if(!empty($abouts_sub_title)): ?>
						<h6><?php echo esc_html($abouts_sub_title); ?></h6>
						<?php endif; ?>
					</div>
					<div class="para_content">
						<?php echo __($about_description); ?>
					</div>
					<?php if(!empty($abouts_link)): ?>
					   <a href="<?php echo esc_url($abouts_link); ?>" class="clv_btn"><?php echo esc_html($abouts_text); ?></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="about_img">
				<?php if(!empty($about_image)): ?>
					<img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
				<?php endif;
			     $cultivation_title = '';
			     if(!empty($atts['cultivation_pickers']['style_two']['cultivation_title'])):
			        $cultivation_title = $atts['cultivation_pickers']['style_two']['cultivation_title']; 
			     endif;
			     $cultivation_number = '';
			     if(!empty($atts['cultivation_pickers']['style_two']['cultivation_number'])):
			        $cultivation_number = $atts['cultivation_pickers']['style_two']['cultivation_number']; 
			     endif;
			    if(!empty($cultivation_title) || !empty($cultivation_number)):
			    ?>	
				<div class="about_img_details">
				   <h3><?php echo esc_html($cultivation_title); ?></h3>
				   <h1><?php echo esc_html($cultivation_number); ?></h1>
				</div>
			    <?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
</div>
<!-- style two -->
<?php 
break;
case 'style_three':
$about_auth_sign = ''; 
if(!empty($atts['cultivation_pickers']['style_three']['about_auth_sign']['url'])):
	$about_auth_sign = $atts['cultivation_pickers']['style_three']['about_auth_sign']['url'];
endif; 
$designation = ''; 
if(!empty($atts['cultivation_pickers']['style_three']['designation'])):
	$designation = $atts['cultivation_pickers']['style_three']['designation'];
endif;   
$about_names = ''; 
if(!empty($atts['cultivation_pickers']['style_three']['about_names'])):
	$about_names = $atts['cultivation_pickers']['style_three']['about_names'];
endif;   
?>
<!-- style three -->
<div class="clv_about_agriculture_wrapper clv_section">
	<div class="container">
		<div class="row">
		    <?php if(!empty($about_image)): ?>
    			<div class="col-md-6 col-lg-6">
    				<div class="about_agri_image">
    					<img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    				</div>
    			</div>
			<?php endif; ?>
			<div class="col-md-6 col-lg-6">
				<div class="about_agri_content">
				     <?php if(!empty($abouts_title)): ?>
					  <h2><?php echo esc_html($abouts_title); ?></h2>
					<?php endif;
					if(!empty($abouts_sub_title)):
					?><h6><?php echo esc_html($abouts_sub_title); ?></h6>
					<?php 
					endif; 
					if(!empty($about_description)):
					   echo __($about_description);
					endif; 
					?>
					<div class="auth_sign_block">
					    <?php if(!empty($designation) || !empty($about_names)): ?>
						<div class="agri_auth_name">
						   <h5><?php echo esc_html($designation); ?></h5>
						   <p><?php echo esc_html($about_names); ?></p>
						</div>
						<?php 
						endif;
						if(!empty($about_auth_sign)): ?>
					    	<div class="agri_auth_sign"><img src="<?php echo esc_url($about_auth_sign); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					    <?php endif; ?>	
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
$cultivation_title = '';
if(!empty($atts['cultivation_pickers']['style_four']['cultivation_title'])):
  $cultivation_title = $atts['cultivation_pickers']['style_four']['cultivation_title']; 
endif;
$cultivation_number = '';
if(!empty($atts['cultivation_pickers']['style_four']['cultivation_number'])):
  $cultivation_number = $atts['cultivation_pickers']['style_four']['cultivation_number']; 
endif;    
$about_video_url = ''; 
if(!empty($atts['cultivation_pickers']['style_four']['about_video_url'])):
	$about_video_url = $atts['cultivation_pickers']['style_four']['about_video_url'];
endif; 
?>
<!-- style four -->
<div class="clv_about_product clv_section">
    <div class="container">
    	<div class="row"> 
    		<div class="col-md-6 col-lg-6">
    			<div class="about_product_contect">
    			   <?php if(!empty($abouts_title)): ?>
    				 <h2><?php echo __($abouts_title); ?></h2>
    			   <?php endif; 
    			   if(!empty($abouts_sub_title)):
    			   ?><h6><?php echo esc_html($abouts_sub_title); ?></h6>
    			   <?php endif; 
    			   if(!empty($about_description)):
					   echo __($about_description);
				   endif; 
    			   ?> 
    			   <div class="about_product_contact">
    				<?php if(!empty($cultivation_title)): ?>
    					<h4><?php echo esc_html($cultivation_title); ?></h4>
    				<?php endif;
    				if(!empty($cultivation_number)):
    				?><h3><?php echo esc_html($cultivation_number); ?></h3>
    				<?php endif; ?>
    				<span>
				    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 480.56 480.56" style="enable-background:new 0 0 480.56 480.56;" xml:space="preserve"  width="32px" height="32px">
				             <g><g><path style="fill:#ffffff;" d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8
									c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4
									c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8
									c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3
									c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9
									c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z"/>
								<path style="fill:#ffffff;" d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1
									c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z"/>
								<path style="fill:#ffffff;" d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5
									l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z"/>
							   </g>
						    </g>
					   </svg>
    			    </span>
    			  </div>
    			</div>
    		</div>
    		<div class="col-md-6 col-lg-6">
    		  <?php if(!empty($about_video_url)): ?>
    			<div class="about_product_image">
    			    <?php if(!empty($about_image)): ?>
    				   <img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    				<?php endif; ?>
    				<div class="play_btn_block">
    					<a href="<?php echo esc_url($about_video_url); ?>" class="play_video">
    						<span class="agri_play_icon">
    							<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    								 viewBox="0 0 191.255 191.255" style="enable-background:new 0 0 191.255 191.255;" xml:space="preserve" width="30px" height="30px">
    							<path style="fill:#eab318;" d="M162.929,66.612c-2.814-1.754-6.514-0.896-8.267,1.917s-0.895,6.513,1.917,8.266c6.544,4.081,10.45,11.121,10.45,18.833
    								s-3.906,14.752-10.45,18.833l-98.417,61.365c-6.943,4.329-15.359,4.542-22.512,0.573c-7.154-3.97-11.425-11.225-11.425-19.406
    								V34.262c0-8.181,4.271-15.436,11.425-19.406c7.153-3.969,15.569-3.756,22.512,0.573l57.292,35.723
    								c2.813,1.752,6.513,0.895,8.267-1.917c1.753-2.812,0.895-6.513-1.917-8.266L64.512,5.247c-10.696-6.669-23.661-7-34.685-0.883
    								C18.806,10.48,12.226,21.657,12.226,34.262v122.73c0,12.605,6.58,23.782,17.602,29.898c5.25,2.913,10.939,4.364,16.616,4.364
    								c6.241,0,12.467-1.754,18.068-5.247l98.417-61.365c10.082-6.287,16.101-17.133,16.101-29.015S173.011,72.899,162.929,66.612z"/>
    							</svg>
    						</span>
    					</a> 
    				</div> 
    			</div>
    		 <?php endif; ?>
    		</div>
    	</div>
    </div>
</div>
<!-- style four -->
<?php 
break;
case 'style_five':
    $about_heading = '';
    if(!empty($atts['cultivation_pickers']['style_five']['about_heading'])):
      $about_heading = $atts['cultivation_pickers']['style_five']['about_heading']; 
    endif;   
    $about_descreption = '';
    if(!empty($atts['cultivation_pickers']['style_five']['about_descreption'])):
      $about_descreption = $atts['cultivation_pickers']['style_five']['about_descreption']; 
    endif;       
    $about_imageicon = '';
    if(!empty($atts['cultivation_pickers']['style_five']['about_imageicon']['url'])):
      $about_imageicon = $atts['cultivation_pickers']['style_five']['about_imageicon']['url']; 
    endif;  
    $abouts_text = '';
    if(!empty($atts['cultivation_pickers']['style_five']['abouts_text'])):
      $abouts_text = $atts['cultivation_pickers']['style_five']['abouts_text']; 
    else:
      $abouts_text = esc_html_e('read more','cultivation');
    endif; 
    $abouts_link = '';
    if(!empty($atts['cultivation_pickers']['style_five']['abouts_link'])):
      $abouts_link = $atts['cultivation_pickers']['style_five']['abouts_link']; 
    endif; 
    $cultivation_counter = '';
    if(!empty($atts['cultivation_pickers']['style_five']['cultivation_counter'])):
      $cultivation_counter = $atts['cultivation_pickers']['style_five']['cultivation_counter']; 
    endif;  
?>
<!-- style five -->
<div class="dairy_about_wrapper clv_section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
				    <?php if(!empty($about_heading)): ?>
					   <h3><?php echo __($about_heading); ?></h3>
					<?php endif; ?>
					<div class="clv_underline"><img src="<?php echo esc_url($about_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					<?php if(!empty($about_descreption)): ?>
				   	    <?php echo esc_html($about_descreption); ?>
					<?php endif; ?>
				</div>  
			</div>
		</div>
		<div class="dairy_about_inner">
			<div class="row">
			    <div class="col-md-6">
				    <?php if(!empty($about_image)): ?> 
					<div class="about_img">
					   <img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
					</div>
					<?php endif; ?>
				</div>
			    <div class="col-md-6">
				  <div class="about_content">
					<?php if(!empty($abouts_title)): ?>
					<div class="about_heading"> 
					   <h2><?php echo __($abouts_title); ?></h2>
					   <div class="clv_underline"><img src="<?php echo esc_url($about_heading_icone); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
					</div> 
					<?php endif; 
					if(!empty($about_description)):
					?><?php echo __($about_description)?>
				    <?php endif;
				    if(!empty($abouts_link)):
				    ?><a href="<?php echo esc_url($abouts_link); ?>" class="clv_btn2"><?php echo esc_html($abouts_text); ?></a>
					<?php endif;
					if(!empty($cultivation_counter)):
					?><div class="dairy_counter_wrapper">
						    <?php 
						    foreach($cultivation_counter as $countervalue ):
						     $counter_number = '';
						     if(!empty($countervalue['counter_number'])):
						        $counter_number = $countervalue['counter_number'];
						     endif;
						     $counter_number_unit = '';
						     if(!empty($countervalue['counter_number_unit'])):
						        $counter_number_unit = $countervalue['counter_number_unit'];
						     endif;
						     $counter_title = '';
						     if(!empty($countervalue['counter_title'])):
						        $counter_title = $countervalue['counter_title'];
						     endif;
						     $counterin_imageicon = '';
						     if(!empty($countervalue['counterin_imageicon']['url'])):
						        $counterin_imageicon = $countervalue['counterin_imageicon']['url'];
						     endif;
						    ?>
						    <div class="dairy_counter_block">
								<div class="counter_text">
									<h4><span class="count_no" data-to="<?php echo esc_attr($counter_number); ?>" data-speed="3000"><?php echo esc_html($counter_number); ?></span><span><?php echo esc_html($counter_number_unit); ?></span></h4>
									<h5><?php echo esc_html($counter_title); ?></h5>
								</div>
								<?php if(!empty($counterin_imageicon)): ?>
								 <img src="<?php echo esc_url($counterin_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
							    <?php endif; ?>
							</div>
						    <?php 
						    endforeach; 
						    ?>
						</div>
						<?php endif; ?>
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
$cultivation_title = '';
if(!empty($atts['cultivation_pickers']['style_six']['cultivation_title'])):
  $cultivation_title = $atts['cultivation_pickers']['style_six']['cultivation_title']; 
endif;  
$cultivation_address = '';
if(!empty($atts['cultivation_pickers']['style_six']['cultivation_address'])):
  $cultivation_address = $atts['cultivation_pickers']['style_six']['cultivation_address']; 
endif;  
$cultivation_number = '';
if(!empty($atts['cultivation_pickers']['style_six']['cultivation_number'])):
  $cultivation_number = $atts['cultivation_pickers']['style_six']['cultivation_number']; 
endif;   
$abouts_text = '';
if(!empty($atts['cultivation_pickers']['style_six']['abouts_text'])):
  $abouts_text = $atts['cultivation_pickers']['style_six']['abouts_text'];
else:
  $abouts_text = esc_html__('more about','cultivation');  
endif; 
$abouts_link = '';
if(!empty($atts['cultivation_pickers']['style_six']['abouts_link'])):
  $abouts_link = $atts['cultivation_pickers']['style_six']['abouts_link']; 
endif;  
$cultivation_subcontent = '';
if(!empty($atts['cultivation_pickers']['style_six']['cultivation_subcontent'])):
  $cultivation_subcontent = $atts['cultivation_pickers']['style_six']['cultivation_subcontent']; 
endif; 
?> 
<!-- style six -->
<div class="garden_about_wrapper clv_section">
		<div class="container">
			<div class="garden_about_section">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="garden_about_image">
						    <?php if(!empty($about_image)): ?>
							   <img src="<?php echo esc_url($about_image)?>" alt="<?php esc_attr('image','cultivation'); ?>" />
							<?php endif; ?>
							<div class="garden_ofc_block">
							    <?php if(!empty($cultivation_title)): ?>
								<h3><?php echo esc_html($cultivation_title); ?></h3>
								<?php endif; 
								if(!empty($cultivation_address)):
								?><p><?php echo esc_html($cultivation_address); ?></p>
								<?php endif; ?>
							</div> 
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="garden_about_content">
						    <?php if(!empty($abouts_title)): ?>
							   <h2><?php echo __($abouts_title); ?></h2>
							<?php endif; 
							if(!empty($abouts_sub_title)):
							?>
							<h6><?php echo esc_html($abouts_sub_title); ?></h6>
						    <?php endif; 
						    if(!empty($about_description)):
						    ?><?php echo __($about_description); ?>
							<?php endif;
							if(!empty($cultivation_subcontent)):
							?>
							<div class="garden_about_blog">
							    <?php foreach($cultivation_subcontent as $subcontentval):
							        
							    $heading = '';       
							    if(!empty($subcontentval['heading'])):
							        $heading = $subcontentval['heading'];
							    endif;
							    $descreption = '';       
							    if(!empty($subcontentval['descreption'])):
							        $descreption = $subcontentval['descreption'];
							    endif;
							    $imageicon = '';       
							    if(!empty($subcontentval['imageicon']['url'])):
							        $imageicon = $subcontentval['imageicon']['url'];
							    endif;
							    ?>
								<div class="about_blog_inner">
									<div class="about_blog_image"><img src="<?php echo esc_url($imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
									<?php if(!empty($heading)): ?>
									   <h4><?php echo esc_html($heading); ?></h4>
									<?php endif;
									if(!empty($descreption)):
									?><p><?php echo esc_html($descreption);  ?></p>
									<?php endif; ?> 
								</div>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
							<div class="garden_contact_section">
							    <?php if(!empty($abouts_link)): ?>
								<a href="<?php echo esc_url($abouts_link); ?>" class="clv_btn"><?php echo esc_html($abouts_text); ?></a>
								<?php endif;
								if(!empty($cultivation_number)):
								?>
								<div class="contact_number">
									<span>
									<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 viewBox="0 0 480.56 480.56" style="enable-background:new 0 0 480.56 480.56;" xml:space="preserve" width="20px" height="20px">
									<g><g><path style="fill: #ffffff;" d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8
													c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4
													c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8
													c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3
													c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9
													c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z"/>
									<path style="fill: #ffffff;" d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1
													c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z"/>
									<path style="fill: #ffffff;" d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5
													l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z"/>
									</g></g>
									</svg>
									</span>
									<h4><?php echo esc_html($cultivation_number); ?></h4>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	  </div>
</div>
<!-- style six -->
<!-- style seven -->
<?php
break;
case 'style_seven':
$heading = '';
if(!empty($atts['cultivation_pickers']['style_seven']['heading'])):
$heading = $atts['cultivation_pickers']['style_seven']['heading']; 
endif;  
$descreption = '';
if(!empty($atts['cultivation_pickers']['style_seven']['descreption'])):
$descreption = $atts['cultivation_pickers']['style_seven']['descreption']; 
endif; 
$imageicon = '';
if(!empty($atts['cultivation_pickers']['style_seven']['imageicon']['url'])):
$imageicon = $atts['cultivation_pickers']['style_seven']['imageicon']['url']; 
endif; 
?>
<div class="garden_service_about_wrapper clv_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="service_about_content">
				    <?php if(!empty($abouts_title)): ?>
					  <h1><?php echo __($abouts_title); ?></h1>
					<?php endif; 
					if(!empty($about_description)):
					    echo __($about_description);
					endif;
					?>
					<div class="garden_green_box">
					    <?php if(!empty($imageicon)): ?> 
						<div class="green_box_image">
						  <img src="<?php echo esc_url($imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
						</div>
						<?php endif; ?>
						<div class="green_box_content">
						    <?php if(!empty($heading)): ?>
							<h4><?php echo esc_html($heading); ?></h4>
							<?php endif;
							if(!empty($descreption)):
							?><p><?php echo esc_html($descreption); ?></p>
						    <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
			     <?php if(!empty($about_image)): ?> 
    				<div class="service_about_image">
    					<img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    				</div>
				 <?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- style seven -->
<!-- style eight  -->
<?php
break;
case 'style_eight':
    
$cultivation_title = '';
if(!empty($atts['cultivation_pickers']['style_eight']['cultivation_title'])):
$cultivation_title = $atts['cultivation_pickers']['style_eight']['cultivation_title']; 
endif;   
$counter_number = '';
if(!empty($atts['cultivation_pickers']['style_eight']['counter_number'])):
$counter_number = $atts['cultivation_pickers']['style_eight']['counter_number']; 
endif; 

$abouts_text = '';
if(!empty($atts['cultivation_pickers']['style_eight']['abouts_text'])):
  $abouts_text = $atts['cultivation_pickers']['style_eight']['abouts_text']; 
else:
  $abouts_text = esc_html__('discover more','cultivation');
endif; 
$abouts_link = '';
if(!empty($atts['cultivation_pickers']['style_eight']['abouts_link'])):
$abouts_link = $atts['cultivation_pickers']['style_eight']['abouts_link']; 
endif; 
?>
<div class="org_about_wrapper clv_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
			    <?php if(!empty($about_image)): ?>
    				<div class="org_about_image">
    					<img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    				</div>
				<?php endif; ?> 
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="org_about_contents">
				    <?php if(!empty($abouts_sub_title)): ?>
					   <h5><?php echo __($abouts_sub_title); ?></h5>
					<?php endif;
					if(!empty($abouts_title)):
					?><h2><?php echo esc_html($abouts_title); ?></h2>
					<?php endif; 
					if(!empty($about_heading_icone)):
					?><img src="<?php echo esc_url($about_heading_icone); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
					<?php endif; 
					if(!empty($about_description)):
					?><?php echo __($about_description);
					endif;
					if(!empty($abouts_link)):
					?><a href="<?php echo esc_url($abouts_link); ?>" class="clv_btn"><?php echo esc_html($abouts_text); ?></a>
					<?php endif; ?>
					<div class="org_support">
					    <?php if(!empty($cultivation_title)): ?>
						    <h6><?php echo esc_html($cultivation_title) ;?></h6>
						<?php
						endif;
						if(!empty($counter_number)): ?>
					 	   <h3><?php echo esc_html($counter_number); ?></h3>
					 	<?php endif; ?>
					</div>
				</div> 
			</div>
		</div> 
	</div>
</div>
<!-- style eight  --> 
<!-- style nine -->
<?php
break;
case 'style_nine':
$abouts_text = '';
if(!empty($atts['cultivation_pickers']['style_nine']['abouts_text'])):
  $abouts_text = $atts['cultivation_pickers']['style_nine']['abouts_text']; 
else:
  $abouts_text = esc_html__('read more','cultivation');
endif; 
$abouts_link = '';
if(!empty($atts['cultivation_pickers']['style_nine']['abouts_link'])):
$abouts_link = $atts['cultivation_pickers']['style_nine']['abouts_link']; 
endif;  
$about_imagenine = '';
if(!empty($atts['cultivation_pickers']['style_nine']['about_imagenine']['url'])):
$about_imagenine = $atts['cultivation_pickers']['style_nine']['about_imagenine']['url']; 
endif;  
?>
<div class="coffee_about_wrapper clv_section">
	<div class="container">
		<div class="row">
		    <?php if(!empty($about_image)): ?>
			<div class="col-md-6 col-lg-6">
				<div class="coffee_about_image"><img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
			</div>
			<?php endif; ?>
			<div class="col-md-6 col-lg-6">
				<div class="coffee_about_content">
				    <?php if(!empty($abouts_sub_title)): ?>
					   <h6><?php echo esc_html($abouts_sub_title); ?></h6>
					<?php endif;
					if(!empty($abouts_title)): ?>
				    <h5><?php echo __($abouts_title); ?></h5>
					<?php endif;
					if(!empty($about_description)):
					?><?php echo __($about_description); ?>
					<?php endif;
					if(!empty($abouts_link)):
					?>
					<a href="<?php echo esc_url($abouts_link); ?>"><?php echo esc_html($abouts_text); ?></a>
					<?php endif; 
					if(!empty($about_imagenine)):
					?><img src="<?php echo esc_url($about_imagenine); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
					<?php endif; ?>
				</div>
			</div>
		</div> 
	</div>
</div>
<!-- style nine -->
<?php 
break;
default:
$abouts_text = '';
if(!empty($atts['cultivation_pickers']['style_one']['abouts_text'])):
   $abouts_text = $atts['cultivation_pickers']['style_one']['abouts_text'];
else:
   $abouts_text = esc_html__('read more','cultivation'); 
endif; 
$abouts_link = '';
if(!empty($atts['cultivation_pickers']['style_one']['abouts_link'])):
   $abouts_link = $atts['cultivation_pickers']['style_one']['abouts_link'];
endif;    
$about_video_url = ''; 
if(!empty($atts['cultivation_pickers']['style_one']['about_video_url'])):
	$about_video_url = $atts['cultivation_pickers']['style_one']['about_video_url'];
endif;  
?>
<!-- style one -->
<div class="clv_about_wrapper clv_section">
	<div class="container">
		<div class="row">
		    <?php if(!empty($about_image)): ?>
		    <div class="col-md-6">
				<div class="about_img">
					<img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
				</div>
			</div>
			<?php endif; ?>
			<div class="col-md-6">
				<div class="about_content">
					<div class="about_heading">
					     <?php if(!empty($abouts_title)): ?>
						   <h2><?php echo __($abouts_title); ?></h2>
						 <?php endif;
						  if(!empty($abouts_sub_title)):
						  ?><h6><?php echo esc_html($abouts_sub_title); ?></h6>
						  <?php endif; 
						  if(!empty($about_heading_icone)):
						  ?><div class="clv_underline"><img src="<?php echo esc_url($about_heading_icone); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
						  <?php endif; ?>
					</div>
					<?php if(!empty($about_description)): ?>
    					<div class="para_content">
    						<?php echo __($about_description)?>
    					</div>
					<?php endif; ?>
					<div class="video_block">
					    <?php if(!empty($about_video_url)): ?>
    						<div class="video_btn">
    							<a href="<?php echo esc_url($about_video_url); ?>" class="play_video"><span class="pulse"><i class="fa fa-play" aria-hidden="true"></i></span> <?php esc_html_e('watch video','cultivation'); ?></a>
    						</div>
						<?php endif;
						if(!empty($abouts_link)):
						?><a href="<?php echo esc_url($abouts_link); ?>" class="clv_btn"><?php echo esc_html($abouts_text); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php
}