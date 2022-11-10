<?php if (!defined('FW')):  die('Forbidden');  endif;
$mapiframe = '';
if(!empty($atts['mapifreame'])):
 $mapiframe = $atts['mapifreame'];
endif;
if(!empty($mapiframe)):
?>
<div class="contact_map_wrapper">
 <?php print($mapiframe); ?>
</div>
<?php
endif;