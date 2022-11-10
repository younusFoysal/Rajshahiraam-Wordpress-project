<?php if (!defined('FW')) die('Forbidden'); 

$service_style = '';
if(!empty($atts['cultivation_servicepickerstwo']['service_style'])):
   $service_style = $atts['cultivation_servicepickerstwo']['service_style'];
endif;
switch($service_style){
case 'style_one':
    
    $servicetwo = '';
    if(!empty($atts['cultivation_servicepickerstwo']['style_one']['cultivation_servicetwo'])):
      $servicetwo = $atts['cultivation_servicepickerstwo']['style_one']['cultivation_servicetwo'];
    endif; 
?>
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-9">
		<div class="footer_service_wrapper">
			<div class="row">
			 <?php
			 if(!empty($servicetwo)):
			   foreach($servicetwo as $servicab): 
			        $service_title = '';
			        if(!empty($servicab['service_title'])):
			          $service_title = $servicab['service_title'];
			        endif;
			        $service_imageicon = '';
			        if(!empty($servicab['service_imageicon']['url'])):
			          $service_imageicon = $servicab['service_imageicon']['url'];
			        endif;
			        if(!empty($service_imageicon)):
        		    ?>
        		    <div class="col-md-4">
    					<div class="footer_service_block">
    					  <img src="<?php echo esc_url($service_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    					  <?php if(!empty($service_title)): ?>
    					    <h4><?php echo __($service_title); ?></h4>
    					  <?php endif; ?>
    					</div>
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
<?php 
break;
case 'style_two':
    $servicetwo = '';
    if(!empty($atts['cultivation_servicepickerstwo']['style_two']['cultivation_servicetwo'])):
      $servicetwo = $atts['cultivation_servicepickerstwo']['style_two']['cultivation_servicetwo'];
    endif; 
?>
<div class="clv_features_wrapper clv_section">
	<div class="container">
		<div class="row">
		    <?php
			 if(!empty($servicetwo)):
			   foreach($servicetwo as $servicab): 
    	        $service_title = '';
    	        if(!empty($servicab['service_title'])):
    	          $service_title = $servicab['service_title'];
    	        endif;
    	        $service_imageicon = '';
    	        if(!empty($servicab['service_imageicon']['url'])):
    	          $service_imageicon = $servicab['service_imageicon']['url'];
    	        endif;
    	        $service_description = '';
    	        if(!empty($servicab['service_description'])):
    	          $service_description = $servicab['service_description'];
    	        endif;
    	        $service_buttontext = '';
    	        if(!empty($servicab['service_buttontext'])):
    	          $service_buttontext = $servicab['service_buttontext'];
    	        else:
    	          $service_buttontext = esc_html__('read more','cultivation');
    	        endif;
    	        $service_button_url = '';
    	        if(!empty($servicab['service_button_url'])):
    	          $service_button_url = $servicab['service_button_url'];
    	        endif;
	        if(!empty($service_imageicon)):
		    ?>
			<div class="col-md-4 col-lg-4">
				<div class="feature_block">
				    <?php if(!empty($service_imageicon)): ?>
					<div class="feature_img">
						<img src="<?php echo esc_url($service_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
					</div>
					<?php 
					endif;
					if(!empty($service_title)): ?>
					  <h3><?php echo esc_html($service_title); ?></h3>
					<?php endif;
					if(!empty($service_description)):
					?><p><?php echo esc_html($service_description); ?></p>
					<?php endif;
					if(!empty($service_button_url)):
					?><a href="<?php echo esc_url($service_button_url); ?>" class="clv_btn"><?php echo esc_html($service_buttontext); ?></a>
					<?php endif; ?>
				</div>
			</div>
			<?php 
    		endif;
		    endforeach;
		   endif;
    	  ?>
		</div>
	</div>
</div>
<?php
break;
}