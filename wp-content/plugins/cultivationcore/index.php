<?php
/**
 * Plugin Name: Cultivation Core Plugin 
 * Plugin URI: http://themes91.in/wp/cultivation/
 * Description: This plugin create custom post type and some meta option and Shortcode .
 * Version: 1.0.0 
 * Text Domain: cultivationcore
 * Author: kamleshyadav
 * Author URI: https://themeforest.net/user/kamleshyadav
 */ 
 
global $cultivation_plug_version;

$cultivation_plug_version = '1.0';

remove_action( 'wp_head', 'rest_output_link_wp_head');

/**
 * Admin Enqueue Scripts
 */ 
add_action( 'admin_enqueue_scripts', 'cultivation_widget_upload_script' );

function cultivation_widget_upload_script($hook) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script( 'cultivationcore-widget-uploader', plugin_dir_url( __FILE__ ) . 'assets/js/cultivation-admin-script.js', array('jquery') );
}

/**
 * plugin script enqueue
 */ 
add_action( 'wp_enqueue_scripts', 'cultivation_pluginscript_enqueue' );
function cultivation_pluginscript_enqueue(){
    
  //style  
  wp_enqueue_style('toastr', plugin_dir_url( __FILE__ )  . 'assets/css/toastr.min.css', array(), '1', 'all' );
  
  wp_enqueue_script( 'toastr', plugin_dir_url( __FILE__ ) . 'assets/js/toastr.min.js', array('jquery'), '20151215', true );
  
  wp_enqueue_script( 'cultivationcore-custom', plugin_dir_url( __FILE__ ) . 'assets/js/cultivation-custom-script.js', array('jquery'), '20151215', true );
  
  wp_localize_script( 'cultivationcore-custom', 'frontadminajax', array('ajax_url' => admin_url( 'admin-ajax.php' )) );
   
}  

/** 
 * Cultivation widgets
 */
require_once 'vendor/cultivation-widget.php';

/** 
 * Cultivation custom post type
 */
require_once 'vendor/cultivation-custom-posttype.php';
/** 
 * Cultivation ajax function
 */
require_once 'vendor/cultivation-ajax-function.php';
/** 
 * Cultivation custom settings
 */
require_once 'vendor/cultivation-custom-setting.php';
/**
 *cultivation action theme custom fw settings
 */
add_action('fw_backend_add_custom_settings_menu', 'cultivation_action_theme_custom_fw_settings_menu');
function cultivation_action_theme_custom_fw_settings_menu($data) {
    add_menu_page(
        esc_html__( 'Cultivation Options', 'cultivationcore' ),
        esc_html__( 'Cultivation Options', 'cultivationcore' ),
        $data['capability'],
        $data['slug'],
        $data['content_callback']
      );
}

/**
 * cultivation Shortcode Extensions
 */
function cultivation_shortcode_extensions($locations) {
	$locations[
		dirname(__FILE__) . '/vendor/extensions'
	] = plugin_dir_url( __FILE__ ) . 'vendor/extensions';

   return $locations;
	
}
add_filter('fw_extensions_locations','cultivation_shortcode_extensions');

/**
 * cultivation Demo Content Important
 */
function  cultivation_filter_fw_ext_backups_demos($demos){
	$demos_array = array(
	    
        'cultivation' => array(
            	'title' => esc_html__('cultivation', 'cultivationcore'),
            	'screenshot' => 'http://themes91.in/wp/cultivation/data/images/cultivation.jpg',
            	'preview_link' => 'http://themes91.in/wp/cultivation/',
    	       ), 
		'agriculture' => array(
            	'title' => esc_html__('Agriculture', 'cultivationcore'),
            	'screenshot' => 'http://themes91.in/wp/cultivation/data/images/agriculture.jpg',
            	'preview_link' => 'http://themes91.in/wp/cultivation/cultivation-home2/',
    	       ), 
    	'dairyfarm' => array(
            	'title' => esc_html__('Dairy Farm', 'cultivationcore'),
            	'screenshot' => 'http://themes91.in/wp/cultivation/data/images/dairyfarm.jpg',
            	'preview_link' => 'http://themes91.in/wp/cultivation/cultivation-home3/',
    	       ), 
    	 
    	'expertfarming' => array(
            	'title' => esc_html__('Expert Farming', 'cultivationcore'),
            	'screenshot' => 'http://themes91.in/wp/cultivation/data/images/expert.jpg' ,
            	'preview_link' => 'http://themes91.in/wp/cultivation/cultivation-home4/',
    	       ),         
    	'vegetable' => array( 
            	'title' => esc_html__('vegetable', 'cultivationcore'),
            	'screenshot' => 'http://themes91.in/wp/cultivation/data/images/vegetable.jpg' ,
            	'preview_link' => 'http://themes91.in/wp/cultivation/cultivation-home5/',
    	       ),    
    	'coffeefarming' => array(
            	'title' => esc_html__('Coffee Farming', 'cultivationcore'),
            	'screenshot' => 'http://themes91.in/wp/cultivation/data/images/coffeehouse.jpg',
            	'preview_link' => 'http://themes91.in/wp/cultivation/cultivation-home6/',
    	       ),      
    	       
	);
    foreach ($demos_array as $id => $data) {
		$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
			'url' => 'http://themes91.in/wp/cultivation/data/themedemo',
			'file_id' => $id,
		));  
		$demo->set_title($data['title']);
		$demo->set_screenshot($data['screenshot']);
		$demo->set_preview_link($data['preview_link']);
        $demos[$demo->get_id()] = $demo;
        unset($demo);
	}
   return $demos;  
}
$dir = get_template_directory().'/demo-content';
if(!is_dir($dir)):
add_filter('fw:ext:backups-demo:demos','cultivation_filter_fw_ext_backups_demos');  
endif; 

/**
 * svg image allow
 */
function cultivation_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cultivation_mime_types'); 

/**
 *cultivation function get current theme currency
 */ 
if( ! function_exists('cultivation_revolution_slider_fun') ):
    function cultivation_revolution_slider_fun(){
        global $wpdb;
        $slider_arr = array('' => 'Select Slider');
        $rev_tbl = $wpdb->prefix . 'revslider_sliders';
        $sql = "SELECT * FROM `$rev_tbl`";
        $results = $wpdb->get_results($sql);
        if(!empty($results)){
            foreach($results as $row){
                $slider_arr[$row->alias] = $row->alias;
            }
        }
        
        return $slider_arr;
    }
endif;  

/**
 * Cultivation Core Libary
 */ 
class Cultivation_corelibrary {
    
    public function __construct(){
        
        /**
         * Get theme setting data
         */
        $this->cultivation_theme_data = '';
        if (function_exists('fw_get_db_settings_option')):	
            $this->cultivation_theme_data = fw_get_db_settings_option();
        endif; 
        /**
         * Get meta setting data
         */
        $this->cultivation_meta_data = '';
        if (function_exists('fw_get_db_post_option')): 
            $this->cultivation_meta_data = fw_get_db_post_option(get_the_ID());
        endif; 
        
    }
    
    /**
     * Cultivation Login Form
     */  
    public function cultivation_login_form(){
        
       $themeoption_data = '';
        if(!empty($this->cultivation_theme_data)):
            $themeoption_data = $this->cultivation_theme_data; 
        endif; 
        $loginsinguplogo_image = '';
        if(!empty($themeoption_data['loginsinguplogo_image']['url'])):
            $loginsinguplogo_image = $themeoption_data['loginsinguplogo_image']['url'];
        else:
           $loginsinguplogo_image = get_template_directory_uri().'/assets/images/logo_white.png'; 
        endif;
        $headingimage = '';
        if(!empty($themeoption_data['headingicon_image']['url'])):
            $headingimage = $themeoption_data['headingicon_image']['url'];
        else:
            $headingimage = get_template_directory_uri().'/assets/images/clv_underline.png';
        endif;
        $loginsingup_title = '';
        if(!empty($themeoption_data['loginsingup_title'])):
            $loginsingup_title = $themeoption_data['loginsingup_title'];
        else:
            $loginsingup_title = esc_html('welcome to cultivation!','cultivation');
        endif;
        $loginsingupform_title = '';
        if(!empty($themeoption_data['loginsingup_form_title'])):
            $loginsingupform_title = $themeoption_data['loginsingup_form_title'];
        else:
            $loginsingupform_title = esc_html__('sign in account','cultivation');
        endif;
        $loginsingup_descreption = '';
        if(!empty($themeoption_data['loginsingup_descreption'])):
            $loginsingup_descreption = $themeoption_data['loginsingup_descreption'];
        endif;
        $facebookicone = get_template_directory_uri().'/assets/images/fb.png';
        $googleicone = get_template_directory_uri().'/assets/images/google.png';
        echo '<div class="signin_wrapper">
               <div class="signup_inner">
                 <div class="signup_details">';
                  if(!empty($loginsinguplogo_image)):
                    echo '<div class="site_logo">
                            <a href="'.esc_url(home_url('/')).'">
                                <img src="'.esc_url($loginsinguplogo_image).'" alt="'.esc_attr__('image','cultivation').'">
                            </a>
                        </div>';  
                endif;  
                if(!empty($loginsingup_title)):             
                    echo  '<h3>'.esc_html($loginsingup_title).'</h3>';
                endif;
                if(!empty($loginsingup_descreption)):
                   echo '<p>'.esc_html($loginsingup_descreption).'</p>';
                endif;
                    echo '<a href="javascript:;" class="clv_btn white_btn pop_signup">'.esc_html__('sign in','cultivation').'</a>';
                    $themeoption_data = '';
                    if(!empty($this->cultivation_theme_data)):
                        $themeoption_data = $this->cultivation_theme_data; 
                    endif;
                    $facebook = '';
                    if(!empty($themeoption_data['social_facebooks'])):
                     $facebook = $themeoption_data['social_facebooks'];
                    endif;
                    $instagram = '';
                    if(!empty($themeoption_data['social_instagrams'])):
                     $instagram = $themeoption_data['social_instagrams'];
                    endif;
                    $twitter = '';
                    if(!empty($themeoption_data['social_twitters'])):
                      $twitter = $themeoption_data['social_twitters'];
                    endif;
                    $linkedin = '';
                    if(!empty($themeoption_data['social_linkedins'])):
                      $linkedin = $themeoption_data['social_linkedins'];
                    endif;
                    $youtube = '';
                    if(!empty($themeoption_data['social_youtubes'])):
                      $youtube = $themeoption_data['social_youtubes'];
                    endif; 
                    echo '<ul>';
                        if(!empty($facebook)):
                            echo '<li><a href="'.esc_url($facebook).'"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>';
                        endif;
                        if(!empty($twitter)):
                            echo '<li><a href="'.esc_url($twitter).'"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>';
                        endif;
                        if(!empty($linkedin)):
                            echo '<li><a href="'.esc_url($linkedin).'"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>';
                        endif;
                        if(!empty($youtube)):
                           echo '<li><a href="'.esc_url($youtube).'"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>';
                         endif;
                        if(!empty($instagram)):
                           echo '<li><a href="'.esc_url($instagram).'"><span><i class="fa fa-instagram" aria-hidden="true"></i></span></a></li>';
                        endif;
                    echo '</ul>'; 
              echo '</div> 
                <div class="signup_form_section">';
                    if(!empty($loginsingupform_title)):
                      echo '<h4>'.esc_html($loginsingupform_title).'</h4>';
                    endif;
                    if(!empty($headingimage)):
                       echo '<img src="'.esc_url($headingimage).'" alt="'.esc_attr__('image','cultivation').'">';
                    endif;
                    echo '<form id="form_login" method="post"> 
                            <div class="form_block">
                             <input type="text" class="form_field" name="lusername" id="lusername" placeholder="'.esc_attr__('Username or Email','cultivation').'">
                            </div>
                            <div class="form_block">
                              <input type="password" class="form_field" name="lpassword" id="lpassword" placeholder="'.esc_attr__('Password','cultivation').'">
                            </div>
                            <div class="form_block">
                                <label>'.esc_html__('Keep me signed in','miraculous').'
								<input type="checkbox" name="rem_check" id="rem_check">
								<span class="checkmark"></span>
							    </label>
                            </div>
                            <button class="hst_loader" style="display: none;"><i class="fa fa-circle-o-notch fa-spin"></i>'.esc_html__('Loading','miraculous').'</button>
                              <div class="popup_forgot">
                                  <a href="'.wp_lostpassword_url().'">'.esc_html__('Forgot Password ?','miraculous').'</a>
                              </div> 
                            <input type="submit" name="login_one" id="login_btn" class="clv_btn" value="'.esc_attr__('login now','cultivation').'">
                        </form>';
                        
                    $social_loginbutton = '';
                    if(!empty($themeoption_data['social_loginbutton'])):
                      $social_loginbutton = $themeoption_data['social_loginbutton'];
                    endif;
                    
                        
                    if($social_loginbutton == 'on'):
                    
                    /**
                     * facebook login url
                     */ 
                    $app_id = '';
                    if(!empty($themeoption_data['facebook_login_client_id'])):
                    $app_id= $themeoption_data['facebook_login_client_id'];
                    endif; 
                    
                    $redirect_url = get_site_url() . "/wp-admin/admin-ajax.php?action=cultivation_facebook_oauth_callback";
                    $permission = esc_html__("email,name","cultivation");
                    $final_url = "https://www.facebook.com/dialog/oauth?client_id=" . urlencode($app_id) . "&redirect_uri=" . urlencode($redirect_url) . "&permission=" . $permission;
                    
                    echo'<div class="social_button_section">
                            <a href="'.esc_url($final_url).'" class="fb_btn"><span><img src="'.esc_url($facebookicone).'" alt="'.esc_attr__('image','cultivation').'"></span>
                            <span>'.esc_html__('facebook','cultivation').'</span>
                            </a>';
                      
                          
                    global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
                    
                    $googleplus_app_name = '';
                    if(!empty($themeoption_data['google_app_name'])):
                    $googleplus_app_name= $themeoption_data['google_app_name'];
                    endif;  
                    $google_login_client_id = '';
                    if(!empty($themeoption_data['google_login_client_id'])):
                    $google_login_client_id = $themeoption_data['google_login_client_id'];
                    endif;  
                    $google_login_client_secret = '';
                    if(!empty($themeoption_data['google_login_client_secret'])):
                    $google_login_client_secret = $themeoption_data['google_login_client_secret'];
                    endif; 
                	require_once 'vendor/googleplusoauth/apiClient.php';
                    require_once 'vendor/googleplusoauth/contrib/apiPlusService.php';
                	$client = new apiClient();
                	$client->setApplicationName($googleplus_app_name);
                	$client->setScopes(array('https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.profile'));
                	$plus = new apiPlusService($client);
                    $authUrl = $client->createAuthUrl(); 
                	
                    echo'<a href="'.esc_url($authUrl).'" class="google_btn">
                              <span><img src="'.esc_url($googleicone).'" alt="'.esc_attr__('image','cultivation').'"></span>
                              <span>'.esc_html__('google+','cultivation').'</span>
                            </a> 
                        </div>'; 
                        
                        endif;
                        echo '<span class="success_close">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve" width="11px" height="11px" >
                                <g>
                                <path fill="#fec007" style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
                                    c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
                                    l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
                                    c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>';    
    }
/**
 *  Cultivation Singup Form
 */ 
public function cultivation_singup_form(){
        
    $themeoption_data = '';
    if(!empty($this->cultivation_theme_data)):
        $themeoption_data = $this->cultivation_theme_data; 
    endif;
    $loginsinguplogo_image = '';
    if(!empty($themeoption_data['loginsinguplogo_image']['url'])):
        $loginsinguplogo_image = $themeoption_data['loginsinguplogo_image']['url'];
    else:
       $loginsinguplogo_image = get_template_directory_uri().'/assets/images/logo_white.png'; 
    endif;
    $headingimage = '';
    if(!empty($themeoption_data['headingicon_image']['url'])):
        $headingimage = $themeoption_data['headingicon_image']['url'];
    else:
        $headingimage = get_template_directory_uri().'/assets/images/clv_underline.png';
    endif;
    $loginsingup_title = '';
    if(!empty($themeoption_data['loginsingup_title'])):
        $loginsingup_title = $themeoption_data['loginsingup_title'];
    endif;
    $loginsingupform_title = '';
    if(!empty($themeoption_data['loginsingup_form_title'])):
        $loginsingupform_title = $themeoption_data['loginsingup_form_title'];
    else:
        $loginsingupform_title = esc_html__('create account','cultivation');
    endif;
    $loginsingup_descreption = '';
    if(!empty($themeoption_data['loginsingup_descreption'])):
        $loginsingup_descreption = $themeoption_data['loginsingup_descreption'];
    endif;
    $facebookicone = get_template_directory_uri().'/assets/images/fb.png';
    $googleicone = get_template_directory_uri().'/assets/images/google.png';
    echo '<div class="signup_wrapper">
            <div class="signup_inner">
               <div class="signup_details">';
                if(!empty($loginsinguplogo_image)):
                    echo '<div class="site_logo">
                              <a href="'.esc_url(home_url('/')).'">
                                <img src="'.esc_url($loginsinguplogo_image).'" alt="'.esc_attr__('image','cultivation').'">
                              </a>
                          </div>';  
                endif;  
    if(!empty($loginsingup_title)):
       echo  '<h3>'.esc_html($loginsingup_title).'</h3>';
    endif;
    if(!empty($loginsingup_descreption)):
       echo '<p>'.__($loginsingup_descreption).'</p>';
    endif;
    echo '<a href="javascript:;" class="clv_btn white_btn pop_signin">'.esc_html__('Log In ','cultivation').'</a>';
            $facebook = '';
            if(!empty($themeoption_data['social_facebooks'])):
            $facebook = $themeoption_data['social_facebooks'];
            endif;
            $instagram = '';
            if(!empty($themeoption_data['social_instagrams'])):
            $instagram = $themeoption_data['social_instagrams'];
            endif;
            $twitter = '';
            if(!empty($themeoption_data['social_twitters'])):
            $twitter = $themeoption_data['social_twitters'];
            endif;
            $linkedin = '';
            if(!empty($themeoption_data['social_linkedins'])):
            $linkedin = $themeoption_data['social_linkedins'];
            endif;
            $youtube = '';
            if(!empty($themeoption_data['social_youtubes'])):
            $youtube = $themeoption_data['social_youtubes'];
            endif;
            echo '<ul>';
                if(!empty($facebook)):
                    echo '<li><a href="'.esc_url($facebook).'"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>';
                endif;
                if(!empty($twitter)):
                    echo '<li><a href="'.esc_url($twitter).'"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>';
                endif;
                if(!empty($linkedin)):
                    echo '<li><a href="'.esc_url($linkedin).'"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>';
                endif;
                if(!empty($youtube)):
                   echo '<li><a href="'.esc_url($youtube).'"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>';
                 endif;
                if(!empty($instagram)):
                   echo '<li><a href="'.esc_url($instagram).'"><span><i class="fa fa-instagram" aria-hidden="true"></i></span></a></li>';
                endif;
            echo '</ul>'; 
    echo '</div>
        <div class="signup_form_section">
            <h4>'.esc_html($loginsingupform_title).'</h4>
            <img src="'.esc_url($headingimage).'" alt="'.esc_attr__('image','cultivation').'">
            <form id="form_register" method="post">
                <div class="form_block">
                   <input type="text" class="form_field" name="username" id="rgusername" placeholder="'.esc_attr__('User Name','cultivation').'">
                </div>
                <div class="form_block">
                    <input type="text" class="form_field" name="useremail" id="useremail" placeholder="'.esc_attr__('Email','cultivation').'">
                </div>
                <div class="form_block">
                    <input type="password" class="form_field" name="regpassword" id="regpassword" placeholder="'.esc_attr__('Password','cultivation').'">
                </div>
                <div class="form_block">
                    <input type="password" class="form_field" name="cregpassword" id="cregpassword" placeholder="'.esc_attr__('Confirm Password','cultivation').'">
                </div>
                <input type="submit" name="register_one" id="register_btn" class="clv_btn" value="'.esc_attr__('sign up','cultivation').'">
                <button class="hst_loader" style="display: none;">
				  <i class="fa fa-circle-o-notch fa-spin"></i>
				 '.esc_html__('Loading','miraculous').'
				</button>
            </form>'; 
            $social_loginbutton = '';
            if(!empty($themeoption_data['social_loginbutton'])):
              $social_loginbutton = $themeoption_data['social_loginbutton'];
            endif;
            if($social_loginbutton == 'on'):
                    /**
                     * facebook login url
                     */ 
                    $app_id = '';
                    if(!empty($themeoption_data['facebook_login_client_id'])):
                    $app_id= $themeoption_data['facebook_login_client_id'];
                    endif; 
                    $redirect_url = get_site_url() . "/wp-admin/admin-ajax.php?action=cultivation_facebook_oauth_callback";
                    $permission = esc_html__("email,name","cultivation");
                    $final_url = "https://www.facebook.com/dialog/oauth?client_id=" . urlencode($app_id) . "&redirect_uri=" . urlencode($redirect_url) . "&permission=" . $permission;
                    
                    echo'<div class="social_button_section">
                            <a href="'.esc_url($final_url).'" class="fb_btn"><span><img src="'.esc_url($facebookicone).'" alt="'.esc_attr__('image','cultivation').'"></span>
                            <span>'.esc_html__('facebook','cultivation').'</span>
                            </a>';
                      
                          
                    global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
                    
                    $googleplus_app_name = '';
                    if(!empty($themeoption_data['google_app_name'])):
                    $googleplus_app_name= $themeoption_data['google_app_name'];
                    endif;  
                    $google_login_client_id = '';
                    if(!empty($themeoption_data['google_login_client_id'])):
                    $google_login_client_id = $themeoption_data['google_login_client_id'];
                    endif;  
                    $google_login_client_secret = '';
                    if(!empty($themeoption_data['google_login_client_secret'])):
                    $google_login_client_secret = $themeoption_data['google_login_client_secret'];
                    endif; 
                	require_once 'vendor/googleplusoauth/apiClient.php';
                    require_once 'vendor/googleplusoauth/contrib/apiPlusService.php';
                	$client = new apiClient();
                	$client->setApplicationName($googleplus_app_name);
                	$client->setScopes(array('https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.profile'));
                	$plus = new apiPlusService($client);
                    $authUrl = $client->createAuthUrl(); 
                	
                    echo'<a href="'.esc_url($authUrl).'" class="google_btn">
                              <span><img src="'.esc_url($googleicone).'" alt="'.esc_attr__('image','cultivation').'"></span>
                              <span>'.esc_html__('google+','cultivation').'</span>
                            </a> 
                        </div>'; 
            endif;    
        echo '<span class="success_close">
                <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve" width="11px" height="11px" >
                <g>
                <path fill="#fec007" style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
                    c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
                    l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
                    c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
                </g>
                </svg>
            </span>
            
        </div>
    </div>
 </div>';
}
    
/**
 * cultivation social page link
 */ 
 
function cultivation_social_pagelink(){
    
    $themeoption_data = '';
    if(!empty($this->cultivation_theme_data)):
        $themeoption_data = $this->cultivation_theme_data; 
    endif;
    $facebook = '';
    if(!empty($themeoption_data['social_facebooks'])):
    $facebook = $themeoption_data['social_facebooks'];
    endif;
    $instagram = '';
    if(!empty($themeoption_data['social_instagrams'])):
    $instagram = $themeoption_data['social_instagrams'];
    endif;
    $twitter = '';
    if(!empty($themeoption_data['social_twitters'])):
    $twitter = $themeoption_data['social_twitters'];
    endif;
    $linkedin = '';
    if(!empty($themeoption_data['social_linkedins'])):
    $linkedin = $themeoption_data['social_linkedins'];
    endif;
    $youtube = '';
    if(!empty($themeoption_data['social_youtubes'])):
    $youtube = $themeoption_data['social_youtubes'];
    endif;
    echo '<ul class="agri_social_links">';
        if(!empty($facebook)):
            echo '<li><a href="'.esc_url($facebook).'"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>';
        endif;
        if(!empty($twitter)):
            echo '<li><a href="'.esc_url($twitter).'"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>';
        endif;
        if(!empty($linkedin)):
            echo '<li><a href="'.esc_url($linkedin).'"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>';
        endif;
        if(!empty($youtube)):
           echo '<li><a href="'.esc_url($youtube).'"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>';
         endif;
        if(!empty($instagram)):
           echo '<li><a href="'.esc_url($instagram).'"><span><i class="fa fa-instagram" aria-hidden="true"></i></span></a></li>';
        endif;
    echo '</ul>'; 
        
    }
    
    /**
     * cultivation custom function newsltter,and partner,
     */  
    function cultivation_newsletterpartner(){
        
    $themeoption_data = '';
    if(!empty($this->cultivation_theme_data)):
        $themeoption_data = $this->cultivation_theme_data; 
    endif; 
    $partners_switch = '';
    if(!empty($themeoption_data['partners_switch'])):
       $partners_switch = $themeoption_data['partners_switch'];
    else:
       $partners_switch = esc_html__('off','cultivation');
    endif;
    $cv_partners = '';
    if(!empty($themeoption_data['cv_partners'])):
       $cv_partners = $themeoption_data['cv_partners'];
    endif;
    $bg_color = '';
    if (!empty( $themeoption_data['background_color']) ):
    	$bg_color = 'background-color:' . $themeoption_data['background_color'] . ';';
    endif;
    $bg_image = '';
    if (!empty( $themeoption_data['background_image']['url'] ) && ! empty( $themeoption_data['background_image']['url']) ):
        $bg_image = 'background-image:url(' . $themeoption_data['background_image']['url'] . ');';
    endif;
    $section_style   = ( $bg_color || $bg_image ) ? 'style="' . esc_attr($bg_color . $bg_image) . '"' : '';
    if($partners_switch == 'on'):
    ?>
    <div class="clv_partner_wrapper clv_section" <?php printf($section_style); ?>><div class="container">
				<div class="row">
					<div class="col-md-12"> 
						<div class="partner_slider">
							<div class="swiper-container">
								<div class="swiper-wrapper">
								 <?php
								 if(!empty($cv_partners)):
								   foreach($cv_partners as $partners):
								   $partners_image = '';
    						       if(!empty($partners['partners_image']['url'])):
    						         $partners_image = $partners['partners_image']['url'];
    						       endif;
    						       $website_url = '';
    						       if(!empty($partners['website_url'])):
    						          $website_url = $partners['website_url'];
    						       endif;
    						       $partners_svgicon = '';
    						       if(!empty($partners['partners_svgicon'])):
    						          $partners_svgicon = $partners['partners_svgicon'];
    						       endif;
    						       
    						       if(!empty($partners_image) || !empty($partners_svgicon)):
								   ?>
								   <div class="swiper-slide">
									  <div class="partner_slide">
										<div class="partner_image">
										<?php if(!empty($partners_image)): ?>
									 	<img src="<?php echo esc_url($partners_image); ?>" alt="<?php esc_attr_e('partners','cultivation'); ?>">
										<?php
										else: 
										printf($partners_svgicon);
										endif;
										?>	 
									   </div>
								    </div>
							     </div>
							   <?php 
							   endif;
						 	 endforeach;
							endif;
							?>
							</div>
						</div>
						<!-- Add Arrows -->
						<span class="slider_arrow partner_left left_arrow">
							<svg 
							 xmlns="http://www.w3.org/2000/svg"
							 xmlns:xlink="http://www.w3.org/1999/xlink"
							 width="10px" height="15px">
							<path fill-rule="evenodd"  fill="rgb(226, 226, 226)"
							 d="M0.324,8.222 L7.117,14.685 C7.549,15.097 8.249,15.097 8.681,14.685 C9.113,14.273 9.113,13.608 8.681,13.197 L2.670,7.478 L8.681,1.760 C9.113,1.348 9.113,0.682 8.681,0.270 C8.249,-0.139 7.548,-0.139 7.116,0.270 L0.323,6.735 C0.107,6.940 -0.000,7.209 -0.000,7.478 C-0.000,7.747 0.108,8.017 0.324,8.222 Z"/>
							</svg>
						</span>
					    <span class="slider_arrow partner_right right_arrow">
							<svg 
							 xmlns="http://www.w3.org/2000/svg"
							 xmlns:xlink="http://www.w3.org/1999/xlink"
							 width="19px" height="25px">
							<path fill-rule="evenodd" fill="rgb(226, 226, 226)"
							 d="M13.676,13.222 L6.883,19.685 C6.451,20.097 5.751,20.097 5.319,19.685 C4.887,19.273 4.887,18.608 5.319,18.197 L11.329,12.478 L5.319,6.760 C4.887,6.348 4.887,5.682 5.319,5.270 C5.751,4.861 6.451,4.861 6.884,5.270 L13.676,11.735 C13.892,11.940 14.000,12.209 14.000,12.478 C14.000,12.747 13.892,13.017 13.676,13.222 Z"/>
							</svg>
						</span>
						</div>
					</div>
				</div>
				<?php 
				endif;
				$newsletter_heading = '';
                if(!empty($themeoption_data['newsletter_heading'])):
                  $newsletter_heading = $themeoption_data['newsletter_heading'];
                endif;
                $newsletter_subheading = '';
                if(!empty($themeoption_data['newsletter_subheading'])):
                   $newsletter_subheading = $themeoption_data['newsletter_subheading'];
                endif;
                $newsletter_second_heading = '';
                if(!empty($themeoption_data['newsletter_second_heading'])):
                   $newsletter_second_heading = $themeoption_data['newsletter_second_heading'];
                endif;
                $newsletter_apikey = '';
                if(!empty($themeoption_data['newsletter_apikey'])):
                   $newsletter_apikey = $themeoption_data['newsletter_apikey'];
                endif;
                $newsletter_listid = '';
                if(!empty($themeoption_data['newsletter_listid'])):
                   $newsletter_listid = $themeoption_data['newsletter_listid'];
                endif;
                $newsletter_switch = '';
                if(!empty($themeoption_data['newsletter_switch'])):
                   $newsletter_switch = $themeoption_data['newsletter_switch'];
                else:
                   $newsletter_switch = esc_html__('off','cultivation');
                endif;
                if($newsletter_switch == 'on'):
				?>
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
              <?php endif; ?>
			</div>
		</div>
	<?php
    }
/**
 * Only Newsletter
 */  
public function cultivation_newsletter(){
    $themeoption_data = '';
    if(!empty($this->cultivation_theme_data)):
        $themeoption_data = $this->cultivation_theme_data; 
    endif; 
    $newsletter_heading = '';
    if(!empty($themeoption_data['newsletter_heading'])):
      $newsletter_heading = $themeoption_data['newsletter_heading'];
    endif;
    $newsletter_subheading = '';
    if(!empty($themeoption_data['newsletter_subheading'])):
       $newsletter_subheading = $themeoption_data['newsletter_subheading'];
    endif;
    $newsletter_second_heading = '';
    if(!empty($themeoption_data['newsletter_second_heading'])):
       $newsletter_second_heading = $themeoption_data['newsletter_second_heading'];
    endif;
    $newsletter_apikey = '';
    if(!empty($themeoption_data['newsletter_apikey'])):
       $newsletter_apikey = $themeoption_data['newsletter_apikey'];
    endif;
    $newsletter_listid = '';
    if(!empty($themeoption_data['newsletter_listid'])):
       $newsletter_listid = $themeoption_data['newsletter_listid'];
    endif;
    $newsletter_switch = '';
    if(!empty($themeoption_data['newsletterinner_switch'])):
       $newsletter_switch = $themeoption_data['newsletterinner_switch'];
    else:
       $newsletter_switch = esc_html__('off','cultivation');
    endif;
    if($newsletter_switch == 'on'):
?>
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
<?php 
  endif;
}

/**
 * theme background image
 */
public function cultivation_theme_background_image(){
    $themeoption_data = '';
    if(!empty($this->cultivation_theme_data)):
        $themeoption_data = $this->cultivation_theme_data; 
    endif; 
    $bg_image = '';
    if ( ! empty( $themeoption_data['background_image'] ) && ! empty( $themeoption_data['background_image']['url'] ) ) {
    	 $bg_image = 'background-image:url('.$themeoption_data['background_image']['url'].');';
    }
    $section_style   = ($bg_image) ? 'style="' . esc_attr($bg_image) . '"' : '';
    return $section_style;
   }
     
}
/**
 * instagram_images
 */ 
function cultivation_instagram_images( $username ) {
	$username = trim( strtolower( $username ) );
	switch ( substr( $username, 0, 1 ) ) {
		case '#':
		$url = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
		$transient_prefix = 'h';
		break;
        default:
		$url = 'https://instagram.com/' . str_replace( '@', '', $username );
		$transient_prefix = 'u';
		break;
	}

	if ( false === ( $instagram = get_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {
		$remote = wp_remote_get( $url );
		//print_r($remote);
		if ( is_wp_error( $remote ) ) {
			return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'cultivation' ) );
		}

		if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
			return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'cultivation' ) );
		}

		$shards      = explode( 'window._sharedData = ', $remote['body'] );
		$insta_json  = explode( ';</script>', $shards[1] );
		$insta_array = json_decode( $insta_json[0], true );

		if ( ! $insta_array ) {
			return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'cultivation' ) );
		}

		if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
			$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
		} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
			$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
		} else {
			return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'cultivation' ) );
		}

		if ( ! is_array( $images ) ) {
			return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'cultivation' ) );
		}

		$instagram = array();
		foreach ( $images as $image ) {
			if ( true === $image['node']['is_video'] ) {
				$type = 'video';
			} else {
				$type = 'image';
			}

			$caption = __( 'Instagram Image', 'cultivation' );
			if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
				$caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
			}

			$instagram[] = array(
				'description' => $caption,
				'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
				'time'        => $image['node']['taken_at_timestamp'],
				'comments'    => $image['node']['edge_media_to_comment']['count'],
				'likes'       => $image['node']['edge_liked_by']['count'],
				'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
				'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
				'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
				'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
				'type'        => $type,
			);
		} // End foreach().

		// do not set an empty transient - should help catch private or empty accounts.
		if ( ! empty( $instagram ) ) {
			$instagram = base64_encode( serialize( $instagram ) );
			set_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
		}
	}
 
	if ( ! empty( $instagram ) ) {
		return unserialize( base64_decode( $instagram ) );
	} else {
		return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'cultivation' ) );
	}
}

/**
 * woocommerce register form
 */ 
function cultivation_wooc_extra_register_fields() { 
?>

<p class="form-row form-row-first">
<label for="reg_billing_first_name"><?php _e( 'First name', 'cultivation' ); ?><span class="required">*</span></label>
<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
</p>
<p class="form-row form-row-last">
<label for="reg_billing_last_name"><?php _e( 'Last name', 'cultivation' ); ?><span class="required">*</span></label>
<input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
</p>
<p class="form-row form-row-wide">
<label for="reg_billing_phone"><?php _e( 'Phone', 'cultivation' ); ?></label>
<input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>"/>
</p>
<div class="clear"></div>
<?php
 }
add_action( 'woocommerce_register_form_start', 'cultivation_wooc_extra_register_fields' );

/**
 * register fields Validating.
 */
function cultivation_wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
          $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'cultivation' ) );
    }

    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'cultivation' ) );
    }
    return $validation_errors;
}
add_action( 'woocommerce_register_post', 'cultivation_wooc_validate_extra_register_fields', 10, 3 );

/**
* Below code save extra fields.
*/
function cultivation_wooc_save_extra_register_fields( $customer_id ) {
    
    if (isset( $_POST['billing_phone'])) {
        // Phone input filed which is used in WooCommerce
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
    if (isset($_POST['billing_first_name'])) {
        //First name field which is by default
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        // First name field which is used in WooCommerce
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    }
    if (isset( $_POST['billing_last_name'])) {
        // Last name field which is by default
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        // Last name field which is used in WooCommerce
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }

}
add_action( 'woocommerce_created_customer', 'cultivation_wooc_save_extra_register_fields' );
