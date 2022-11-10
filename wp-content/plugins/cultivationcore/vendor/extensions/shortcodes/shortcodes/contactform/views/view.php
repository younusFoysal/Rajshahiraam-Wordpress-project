<?php if (!defined('FW')) die('Forbidden'); ?>
<div class="contact_form_wrapper clv_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="contact_form_section">
                    <div class="row">
                    <?php 
                    $contactform_shortcode = '';
                    if(!empty($atts['contactform_shortcode'])):
                      $contactform_shortcode = $atts['contactform_shortcode'];
                      echo do_shortcode($contactform_shortcode);
                    endif;
                    ?> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="working_time_section">
                    <div class="timetable_block">
                        <?php 
                        $schedule_heading = '';
                        if(!empty($atts['schedule_heading'])):
                           $schedule_heading = $atts['schedule_heading']; 
                        endif;
                        if(!empty($schedule_heading)):
                          echo '<h5>'.esc_html($schedule_heading).'</h5>';
                        endif;
                        $schedule_information = '';
                        if(!empty($atts['schedule_information'])):
                          $schedule_information = $atts['schedule_information'];  
                        endif;
                        ?>
                        <ul>
                        <?php 
                        if(!empty($schedule_information)):
                        foreach($schedule_information as $information_time):
                            $schedule_day = '';
                            if(!empty($information_time['schedule_day'])):
                               $schedule_day = $information_time['schedule_day'];
                            endif;
                            $schedule_time = '';
                            if(!empty($information_time['schedule_time'])):
                               $schedule_time = $information_time['schedule_time'];
                            endif;
                            if(!empty($schedule_day) || !empty($schedule_time)):
                        ?> <li>
                           <p><?php echo esc_html($schedule_day); ?></p>
                           <p><?php echo esc_html($schedule_time); ?></p>
                          </li>
                        <?php
                        endif;
                        endforeach;
                        endif;
                        ?>
                    </ul>
                    </div>
                    <?php 
                    $schedule_contacttitle = '';
                    if(!empty($atts['schedule_contacttitle'])):
                    $schedule_contacttitle = $atts['schedule_contacttitle']; 
                    endif;  
                    $schedule_contactnumber = '';
                    if(!empty($atts['schedule_contactnumber'])):
                    $schedule_contactnumber = $atts['schedule_contactnumber']; 
                    endif;  
                    if(!empty($schedule_contacttitle) || !empty($schedule_contactnumber)):
                    ?>
                    <div class="tollfree_block">
                        <?php 
                        if(!empty($schedule_contacttitle)):
                        ?>
                        <h5><?php echo esc_html($schedule_contacttitle); ?></h5>
                        <?php 
                        endif; 
                        if(!empty($schedule_contactnumber)):
                        ?>
                       <h3><?php echo esc_html($schedule_contactnumber); ?></h3>
                       <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div> 
        </div>
    </div>
</div>