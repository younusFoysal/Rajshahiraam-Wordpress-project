<?php if (!defined('FW')) die('Forbidden'); 

$newsletter_style = '';
if(!empty($atts['newsletter_style'])):
  $newsletter_style = $atts['newsletter_style'];
endif;
$newsletter_heading = '';
if(!empty($atts['newsletter_heading'])):
  $newsletter_heading = $atts['newsletter_heading'];
endif;
$newsletter_subheading = '';
if(!empty($atts['newsletter_subheading'])):
  $newsletter_subheading = $atts['newsletter_subheading'];
endif;
$newsletter_second_heading = '';
if(!empty($atts['newsletter_second_heading'])):
  $newsletter_second_heading = $atts['newsletter_second_heading'];
endif;
$newsletter_apikey = '';
if(!empty($atts['newsletter_apikey'])):
  $newsletter_apikey = $atts['newsletter_apikey'];
endif;
$newsletter_listid = '';
if(!empty($atts['newsletter_listid'])):
  $newsletter_listid = $atts['newsletter_listid'];
endif;
?>
<div class="container">
    <div class="clv_newsletter_wrapper">
    	<div class="newsletter_text">
    	    <?php if(!empty($newsletter_heading)): ?>
    		   <h2><?php echo __($newsletter_heading); ?></h2>
    		<?php endif; 
    		 if(!empty($newsletter_subheading)):
    		?><h4><?php echo esc_html($newsletter_subheading); ?></h4>
    		<?php endif; ?>
    	</div>
    	<div class="newsletter_field">
    		<h3><?php echo esc_html($newsletter_second_heading); ?></h3>
    		<div class="newsletter_field_block">
    		    <input type="hidden" id="ns_apikey" name="ns_apikey" value="<?php echo esc_attr($newsletter_apikey); ?>">
			    <input type="hidden" id="ns_list" name="ns_list"  value="<?php echo esc_attr($newsletter_listid); ?>">
    			<input type="text" id="ns_email" name="ns_email" placeholder="<?php esc_attr_e('Enter Your Email Here','cultivation'); ?>" />
    			<a href="javascript:;" id="cv_newslatter"><?php esc_html_e('subscribe now','cultivation'); ?></a>
    			<div class="cv_messages"></div>
    		</div> 
    	</div>
    </div> 
</div>