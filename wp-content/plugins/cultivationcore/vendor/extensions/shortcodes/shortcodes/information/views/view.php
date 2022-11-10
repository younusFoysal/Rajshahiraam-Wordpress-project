<?php if ( ! defined( 'FW' ) ):  die( 'Forbidden' ); endif; ?>
<!--Contact Block-->
<div class="contact_blocks_wrapper clv_section">
    <div class="container">
        <div class="row">
            <?php
            $cultivation_information = '';
            if(!empty($atts['cultivation_information'])):
               $cultivation_information = $atts['cultivation_information'];   
            endif;
            if(!empty($cultivation_information)):
            foreach($cultivation_information as $information ):
                $info_title = '';
                if(!empty($information['info_title'])):
                  $info_title = $information['info_title'];
                endif;
                 $info_imageicon = '';
                if(!empty($information['info_imageicon']['url'])):
                  $info_imageicon = $information['info_imageicon']['url'];
                endif;
                 $info_details = '';
                if(!empty($information['info_details'])):
                  $info_details = $information['info_details'];
                endif;
            ?>
            <div class="col-lg-4 col-md-4">
                <div class="contact_block">
                    <?php if(!empty($info_imageicon)): ?>
                    <span></span>
                    <div class="contact_icon"><img src="<?php echo esc_url($info_imageicon); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></div>
                    <?php endif;
                    if(!empty($info_title)):
                    ?><h4><?php echo esc_html($info_title); ?></h4>
                    <?php 
                    endif;
                    if(!empty($info_details)):
                        printf($info_details);
                    endif;
                    ?>
                </div>
            </div>
            <?php endforeach;
            endif;
            ?>
        </div>
    </div>
</div>