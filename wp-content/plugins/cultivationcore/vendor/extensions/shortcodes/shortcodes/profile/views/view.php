<?php if (!defined('FW')) die('Forbidden');
$preview = get_template_directory_uri().'/assets/images/pro_img.png';
$user_id = get_current_user_id();
if(!empty($user_id)):
$name = get_the_author_meta('display_name', $user_id);
$email = get_the_author_meta('user_email', $user_id);
$first_name = get_the_author_meta('first_name', $user_id);
$last_name = get_the_author_meta('last_name', $user_id);
$phone_number = get_the_author_meta('user_phone_number', $user_id);
$user_address = get_the_author_meta('user_address', $user_id);
endif;
if(is_user_logged_in()):
?>  
<!--User Profile-->
<div class="user_profile_wrapper clv_section user_profileview">
    <div class="container">
        <div class="user_profile_section">
            <div class="profile_image_block">
                <div class="user_profile_img">
                <?php
                $img_src = get_user_meta($user_id, 'user_profile_img', true); 
                if($img_src): 
                ?>
                <img src="<?php echo esc_url($img_src); ?>" alt="<?php esc_attr_e('preview','cultivation'); ?>" id="img-preview" class="img-fluid">
                <?php else: ?>
                <img src="<?php echo esc_url($preview); ?>" alt="<?php esc_attr_e('preview','cultivation'); ?>" id="img-preview" class="img-fluid">
                <?php endif; ?>
                </div>
            </div>
            <div class="checkout_heading">
                <h3><?php esc_html_e('Profile','cultivation'); ?></h3>
                <a href="javascript:;" id="cv_user_profiledite">
                    <span>
                        <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="12px" height="12px" viewBox="0 0 485.219 485.22" style="enable-background:new 0 0 485.219 485.22;"
                                xml:space="preserve">
                        <g>
                        <path fill="#fec007" d="M467.476,146.438l-21.445,21.455L317.35,39.23l21.445-21.457c23.689-23.692,62.104-23.692,85.795,0l42.886,42.897
                                C491.133,84.349,491.133,122.748,467.476,146.438z M167.233,403.748c-5.922,5.922-5.922,15.513,0,21.436
                                c5.925,5.955,15.521,5.955,21.443,0L424.59,189.335l-21.469-21.457L167.233,403.748z M60,296.54c-5.925,5.927-5.925,15.514,0,21.44
                                c5.922,5.923,15.518,5.923,21.443,0L317.35,82.113L295.914,60.67L60,296.54z M338.767,103.54L102.881,339.421
                                c-11.845,11.822-11.815,31.041,0,42.886c11.85,11.846,31.038,11.901,42.914-0.032l235.886-235.837L338.767,103.54z
                                    M145.734,446.572c-7.253-7.262-10.749-16.465-12.05-25.948c-3.083,0.476-6.188,0.919-9.36,0.919
                                c-16.202,0-31.419-6.333-42.881-17.795c-11.462-11.491-17.77-26.687-17.77-42.887c0-2.954,0.443-5.833,0.859-8.703
                                c-9.803-1.335-18.864-5.629-25.972-12.737c-0.682-0.677-0.917-1.596-1.538-2.338L0,485.216l147.748-36.986
                                C147.097,447.637,146.36,447.193,145.734,446.572z"/>
                        </g>
                        </svg>
                    </span>
                    <?php esc_html_e('edit profile','cultivation'); ?>
                </a>
            </div>
            <div class="profile_form">
                <div class="row">
                    <?php if(!empty($name)): ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('first name','cultivation'); ?></h6>
                            <input type="text" name="fname" id="fname" class="form_field" value="<?php echo esc_attr($name); ?>" readonly>
                        </div>
                    </div>
                    <?php endif;
                    if(!empty($last_name)):
                    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('last name','cultivation'); ?></h6>
                            <input type="text" class="form_field" name="lname" id="lname" value="<?php echo esc_attr($last_name); ?>" readonly>
                        </div>
                    </div>
                    <?php
                    endif;
                    if(!empty($email)):
                    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('email','cultivation'); ?></h6>
                            <input type="text" class="form_field" name="email" id="email" value="<?php echo esc_attr($email); ?>" readonly>
                        </div>
                    </div>
                    <?php endif;
                    if(!empty($phone_number)):
                    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('contact no.','cultivation'); ?></h6>
                            <input type="text" class="form_field" name="cnumber" id="cnumber" value="<?php echo esc_attr($phone_number); ?>" readonly>
                        </div>
                    </div>
                    <?php endif;
                    if(!empty($user_address)):
                    ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="form_block">
                           <h6><?php esc_html_e('address','cultivation'); ?></h6>
                           <textarea class="form_field" name="address" id="address"  value="<?php echo esc_attr($user_address); ?>" readonly><?php echo esc_attr($user_address); ?></textarea>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div> 
    </div>
</div>
<!--User Profile Edit -->
<div class="user_profile_wrapper clv_section user_profileedite">
    <div class="container">
        <div class="user_profile_section">
            <div class="profile_image_block">
                <div class="user_profile_img">
                    <?php
                    $img_src = get_user_meta($user_id, 'user_profile_img', true); 
                    if($img_src): 
                    ?><img src="<?php echo esc_url($img_src); ?>" alt="<?php esc_attr_e('preview','cultivation'); ?>" id="img-preview" class="img-fluid">
                    <?php else: ?>
                    <img src="<?php echo esc_url($preview); ?>" alt="<?php esc_attr_e('preview','cultivation'); ?>" id="img-preview" class="img-fluid">
                    <?php endif; ?>
                    <label for="user_profile" class="img_edit_plus">
                        <span>
                           <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="20px" height="20px" viewBox="0 0 485.219 485.22" style="enable-background:new 0 0 485.219 485.22;"
                                    xml:space="preserve">
                            <g>
                                <path fill="#ffffff" d="M467.476,146.438l-21.445,21.455L317.35,39.23l21.445-21.457c23.689-23.692,62.104-23.692,85.795,0l42.886,42.897
                                    C491.133,84.349,491.133,122.748,467.476,146.438z M167.233,403.748c-5.922,5.922-5.922,15.513,0,21.436
                                    c5.925,5.955,15.521,5.955,21.443,0L424.59,189.335l-21.469-21.457L167.233,403.748z M60,296.54c-5.925,5.927-5.925,15.514,0,21.44
                                    c5.922,5.923,15.518,5.923,21.443,0L317.35,82.113L295.914,60.67L60,296.54z M338.767,103.54L102.881,339.421
                                    c-11.845,11.822-11.815,31.041,0,42.886c11.85,11.846,31.038,11.901,42.914-0.032l235.886-235.837L338.767,103.54z
                                        M145.734,446.572c-7.253-7.262-10.749-16.465-12.05-25.948c-3.083,0.476-6.188,0.919-9.36,0.919
                                    c-16.202,0-31.419-6.333-42.881-17.795c-11.462-11.491-17.77-26.687-17.77-42.887c0-2.954,0.443-5.833,0.859-8.703
                                    c-9.803-1.335-18.864-5.629-25.972-12.737c-0.682-0.677-0.917-1.596-1.538-2.338L0,485.216l147.748-36.986
                                    C147.097,447.637,146.36,447.193,145.734,446.572z"/>
                            </g>
                            </svg>
                        </span>
                    </label>
                </div>
            </div>
            <div class="checkout_heading">
                <h3><?php esc_html_e('Profile Edit','cultivation'); ?></h3>
            </div>
            <form id="cv_profile_edit" method="post">
            <div class="profile_form"> 
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('first name','cultivation'); ?></h6>
                            <input type="text" name="efname" id="efname" class="form_field" value="<?php echo esc_attr($name); ?>" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('last name','cultivation'); ?></h6>
                            <input type="text" name="elname" id="elname" class="form_field" value="<?php echo esc_attr($last_name); ?>" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('email','cultivation'); ?></h6>
                            <input type="text" name="eemail" id="eemail" class="form_field" value="<?php echo esc_attr($email); ?>" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('contact no.','cultivation'); ?></h6>
                            <input type="text" name="ephone" id="ephone" class="form_field" value="<?php echo esc_attr($phone_number); ?>" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('New Password','cultivation'); ?></h6>
                            <input type="password" name="ed_password" id="ed_password" class="form_field" value="" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form_block">
                            <h6><?php esc_html_e('Confirm Password','cultivation'); ?></h6>
                            <input type="password" name="ed_confpassword" id="ed_confpassword" class="form_field" value="" >
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form_block">
                            <h6><?php esc_html_e('address','cultivation'); ?></h6>
                            <textarea name="eaddress" id="eaddress" class="form_field" value="<?php echo esc_attr($user_address); ?>" ><?php echo esc_html($user_address); ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <input type="hidden" id="image-url" value="">
                        <input type="hidden" id="cur_user_id" value="<?php echo esc_attr($user_id); ?>">
                        <div class="save_btn">
                        <input type="submit" id="cv_editprofilesave" class="ms_btn" value="Save"></div>
                        <button class="hst_loader"><i class="fa fa-circle-o-notch fa-spin"></i> 
    					 <?php esc_html_e('Loading', 'miraculous'); ?></button>
    				</div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
else:
?>
<div class="user_profile_wrapper clv_section">
    <div class="container">
        <div class="checkout_heading">
          <h3><?php esc_html_e('Your are not logged in:','cultivation'); ?></h3>
        </div>
    </div>
</div>
<?php
endif; 