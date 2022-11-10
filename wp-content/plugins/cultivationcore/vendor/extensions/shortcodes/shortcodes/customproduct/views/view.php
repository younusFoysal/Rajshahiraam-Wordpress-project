<?php if (!defined('FW')) die('Forbidden');

 $product_heading = '';
 if(!empty($atts['product_heading'])):
   $product_heading = $atts['product_heading'];
 endif;
 $product_descreption = '';
 if(!empty($atts['product_descreption'])):
   $product_descreption = $atts['product_descreption'];
 endif;
 $product_imageicon = '';
 if(!empty($atts['product_imageicon']['url'])):
   $product_imageicon = $atts['product_imageicon']['url'];
 endif;
?>
<div class="dairy_products_wrapper clv_section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6">
				<div class="clv_heading">
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
		<div class="dairy_product_inner">
			<div class="row">
			    <?php 
			    $cultivation_product = '';
                if(!empty($atts['cultivation_product'])):
                   $cultivation_product = $atts['cultivation_product'];
                endif;
                if(!empty($cultivation_product)):
                    foreach($cultivation_product as $productvalue):
                        $product_title = '';
                        if(!empty($productvalue['product_title'])):
                          $product_title = $productvalue['product_title'];
                        endif;
                        $product_descreption = '';
                        if(!empty($productvalue['product_descreption'])):
                          $product_descreption = $productvalue['product_descreption'];
                        endif;
                        $product_imageicon = '';
                        if(!empty($productvalue['product_imageicon']['url'])):
                          $product_imageicon = $productvalue['product_imageicon']['url'];
                        endif;
                        $product_bg_imageicon = '';
                        if(!empty($productvalue['product_bg_imageicon']['url'])):
                          $product_bg_imageicon = $productvalue['product_bg_imageicon']['url'];
                        endif;
                        $product_buttontext = '';
                        if(!empty($productvalue['product_buttontext'])):
                          $product_buttontext = $productvalue['product_buttontext'];
                        else:
                           $product_buttontext = esc_html__('Read More','cultivation');
                        endif;
                        $product_buttonurl = '';
                        if(!empty($productvalue['product_buttonurl'])):
                          $product_buttonurl = $productvalue['product_buttonurl'];
                        endif;
                    if(!empty($product_title) || !empty($product_descreption) || !empty($product_imageicon)):
                    ?>
                    <div class="col-md-3 col-lg-3">
    					<div class="dairy_product_block">
    					    <?php if(!empty($product_imageicon)): ?>
    						<div class="product_image">
    						  <img src="<?php echo esc_url($product_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    						</div>
    						<?php endif; ?> 
    						<div class="product_content">
    						    <?php if(!empty($product_title)): ?>
    							  <h4><?php echo esc_html($product_title); ?></h4>
    							<?php endif; 
    							if(!empty($product_descreption)):
    							?><p><?php echo esc_html($product_descreption); ?></p>
    							<?php endif;
    							if(!empty($product_buttonurl)):
    							?><a href="<?php echo esc_url($product_buttonurl); ?>"><?php echo esc_html($product_buttontext); ?></a>
    					        <?php endif; ?>
    						</div>
    						<?php if(!empty($product_bg_imageicon)): ?>
    						  <img src="<?php echo esc_url($product_bg_imageicon); ?>" alt="<?php esc_attr_e('product image','cultivation'); ?>"/>
    						<?php endif; ?>
    						<span class="product_devider top_devider"></span>
    						<span class="product_devider"></span>
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