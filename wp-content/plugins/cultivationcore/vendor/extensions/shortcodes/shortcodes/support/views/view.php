<?php if (!defined('FW')) die('Forbidden');

$support_heading = '';
if(!empty($atts['support_heading'])):
 $support_heading = $atts['support_heading'];
endif;
$support_imageicon = '';
if(!empty($atts['support_imageicon']['url'])):
 $support_imageicon = $atts['support_imageicon']['url'];
endif;
$support_counter = '';
if(!empty($atts['support_counter'])):
 $support_counter = $atts['support_counter'];
endif;
?>
<div class="support_main_wrapper">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="footer_support_wrapper">
				    <?php if(!empty($support_heading) || !empty($support_imageicon)): ?>
					<div class="footer_service_section">
						<img src="<?php echo esc_url($support_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
						<h3><?php echo __($support_heading); ?></h3>
					</div>
					<?php endif; ?>
					<div class="footer_service_section">
					    <?php if(!empty($support_counter)):
					     foreach($support_counter as $supprtvalues ):
					         
					         $counter_text = '';
					         if(!empty($supprtvalues['counter_text'])):
					            $counter_text = $supprtvalues['counter_text'];
					         endif;
					         $counterin_imageicon = '';
					         if(!empty($supprtvalues['counterin_imageicon']['url'])):
					            $counterin_imageicon = $supprtvalues['counterin_imageicon']['url'];
					         endif;
					    ?>
					    <div class="contact_label">
					        <?php if(!empty($counterin_imageicon)): ?>
							<span><img src="<?php echo esc_url($counterin_imageicon); ?>" alt="<?php echo esc_attr_e('images','cultivation')?>" /></span>
							<?php endif; ?>
							<?php if(!empty($counter_text)): ?>
							  <h4><?php echo esc_html($counter_text); ?></h4>
							<?php endif; ?>
						</div>
						<?php 
						 endforeach;
						endif; 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>