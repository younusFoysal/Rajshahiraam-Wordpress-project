<?php
/**
 * Ajax all code
 * 
 * cultivation sinup submit by ajax form
 */ 
add_action('wp_ajax_cultivation_user_register_form','cultivation_user_register_form'); 
add_action('wp_ajax_nopriv_cultivation_user_register_form','cultivation_user_register_form');
function cultivation_user_register_form(){
    $error = array();
    if( isset($_POST['username']) && isset($_POST['useremail']) && isset($_POST['password']) && isset($_POST['confirmpass']) ):
    extract($_POST);
    
    if( ! validate_username($username) ):
    	$error['erroruser'] = esc_html__("* Username is not valid. Use only lowercase letter!",'cultivation');
    endif;
    
    if( username_exists($username) ):
    	$error['erroruser'] = esc_html__("* Username is already exist!",'cultivation');
    endif;
   
    if( email_exists($useremail) ):
    	$error['erroremail'] = esc_html__("* Email is already exist!",'cultivation'); 
    endif;
    
    if( empty($error) ):
		$userdata = array(
            'user_login' => $username,
            'user_pass' => $password,
            'first_name' => $full_name,
            'user_email' => $useremail
         );
    $user_id = wp_insert_user( $userdata );
        //On success
        if ( ! is_wp_error( $user_id ) ):
            $data = array('status' => 'true', 'msg' => 'You are successfully registered. Please login');
            echo json_encode($data);
        else:
            $data = array('status' => 'false', 'msg' => 'Something went wrong. Please try again.');
            echo json_encode($data);
        endif;
    else:
       $error['status'] = 'false';
       echo json_encode($error);
    endif;
    
endif;
wp_die();
}
/**
 * cultivation login submit by ajax form
 */ 
add_action('wp_ajax_cultivation_user_login_form','cultivation_user_login_form'); 
add_action('wp_ajax_nopriv_cultivation_user_login_form','cultivation_user_login_form');
function cultivation_user_login_form(){

   if( isset($_POST['username']) && isset($_POST['password']) ):
    extract($_POST);
        
    if($rem_check):
        $rem = true;
    else:
       $rem = false;
    endif;
    
    if( is_user_logged_in() ):
       $data = array('status' => 'false', 'msg' => 'You are already logged in!');
    else:
        $creds = array();
        $creds['user_login'] = $username;
        $creds['user_password'] = $password;
        $creds['remember'] = $rem;
        $user = wp_signon( $creds, true );
            if ( is_wp_error($user) ):
                $error = esc_html__('Incorrect login details.', 'miraculous');
                $data = array('status' => 'false', 'msg' => $error);
            else:
               $url = site_url('/my-account');
               $data = array('status' => 'true', 'msg' => 'Login Successfully', 'redirect_uri' => $url);
            endif;
    endif;
        echo json_encode($data);
        wp_die();
    endif;
    
    $data = array('status' => 'false', 'msg' => 'Something went wrong. Please try again.');
    echo json_encode($data);
    wp_die();
 }
 
 /**
  * Cultivation Newsletter 
  */
add_action( 'wp_ajax_cultivation_send_newsletter', 'cultivation_send_newsletter');
add_action( 'wp_ajax_nopriv_cultivation_send_newsletter', 'cultivation_send_newsletter'); 
function cultivation_send_newsletter(){ 
    require_once 'mailchimp/MailChimp.php';
	$api_key = '';
	if(!empty($_POST['apikey'])):
	   $api_key = $_POST['apikey'];
	endif;
	$list_id = '';
	if(!empty($_POST['listid'])):
       $list_id = $_POST['listid']; 
	endif;
	$subc_email = '';
	if(!empty($_POST['subc_email'])):
	    $subc_email = $_POST['subc_email'];
	endif;
	$mailchimpob = new MailChimp_Subscribed($api_key,$list_id,$subc_email);
	wp_die();    
}  
/**
  * Cultivation user update form 
  */
add_action( 'wp_ajax_cultivation_user_update_form', 'cultivation_user_update_form');
add_action( 'wp_ajax_nopriv_cultivation_user_update_form', 'cultivation_user_update_form');   
function cultivation_user_update_form() {
    $error = array();
    if( isset($_POST['username']) && isset($_POST['useremail']) && isset($_POST['userid']) ) {
    extract($_POST);
	$current_user = wp_get_current_user();

    if( $current_user->user_email != trim($useremail) ) {

        if( email_exists($useremail) ) {
        
        $error['status'] = 'false';
        $error['msg'] = "Email is already exist!";

        }

    }
   
    $full_name = explode(' ', $username);
    $first_name = $full_name[0];
    unset($full_name[0]);
    $last_name = implode(' ', $full_name);
    if( empty($error) ) {
       
    if( isset($password) && isset($confpassword) && $password != '' && $confpassword != '' ) {
           
        $userdata = array(
            'ID' => $userid,
            'user_pass' => $password,
            'first_name' => $first_name,
            'last_name' => $userlname,
            'user_email' => $useremail,
            'display_name' => $username
         );

	}else{

        $userdata = array(
           'ID' => $userid,
           'first_name' => $first_name,
           'last_name' => $userlname,
           'user_email' => $useremail,
           'display_name' => $username
           );

	}
    $user_id = wp_update_user( $userdata );
        //On success
        if ( ! is_wp_error( $user_id ) ) {
            if(!empty($profile_img)):
               update_user_meta($user_id, 'user_profile_img', $profile_img);
            endif;
            if(!empty($userephone)):
              update_user_meta( $user_id, 'user_phone_number', $userephone );
            endif;
            if(!empty($usereaddress)):
             update_user_meta( $user_id, 'user_address', $usereaddress );
            endif;
           $data = array('status' => 'true', 'msg' => 'Profile Successfully update');
           echo json_encode($data);
        }else{
          $data = array('status' => 'false', 'msg' => 'Something went wrong. Please try again.');
          echo json_encode($data);
        }

    }else{
      echo json_encode($error);
    }
     die();
    }

}
/**
 * Cultivation Gallery Load more  
 */ 
add_action( 'wp_ajax_cultivation_gallery_loadmore', 'cultivation_gallery_loadmore');
add_action( 'wp_ajax_nopriv_cultivation_gallery_loadmore', 'cultivation_gallery_loadmore'); 
function cultivation_gallery_loadmore() {
    $gallery_load_more  = '';
    if(!empty($_POST['click_value'])):
      $gallery_load_more  = $_POST['click_value'];
    endif;
    $args = array(
        'post_type' =>'gallery',
        'order'   => 'ASC',
        'posts_per_page' => $gallery_load_more,
        );
	$cv_query = new WP_Query($args);
	if($cv_query->have_posts() ) :
        while($cv_query->have_posts()): $cv_query->the_post();
        if(function_exists( 'fw_get_db_post_option' )):	
            $services_post_data = fw_get_db_post_option(get_the_ID()); 
        endif;
        $headingimage = '';
        if(!empty($services_post_data['services_imageheading']['url'])):
            $headingimage = $services_post_data['services_imageheading']['url'];
        endif;
        if(has_post_thumbnail(get_the_ID())):
            $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
		    $thum_image = cultivation_aq_resize($attachment_url, 370, 320, false);
		endif;	
	?>  
	<div class="gallery_grid_item">
		<div class="gallery_image">
			<?php if(!empty($thum_image)): ?>
				<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
				<div class="gallery_overlay">
				  <a href="<?php echo esc_url($attachment_url); ?>" class="view_image"><span><i class="fa fa-search" aria-hidden="true"></i></span></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php 
    endwhile;
     wp_reset_postdata();
    endif;
    $args = $num = '';
    $args = array( 'post_type'=>'gallery','posts_per_page' => -1 );
    $num = count( get_posts( $args ) );
    if($numbergallery >= $num ):
    ?>
	<style scoped> 
	.ajxloadgallery{display:none;}
	</style>
   <?php
   endif;
  }
function cultivation_generateRandomString($length = 10) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';
for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
}
return $randomString;
}
add_action("wp_ajax_cultivation_facebook_oauth_callback", "cultivation_facebook_oauth_callback");
add_action("wp_ajax_nopriv_cultivation_facebook_oauth_callback", "cultivation_facebook_oauth_callback");
function cultivation_facebook_oauth_callback(){
    
    $cultivation_theme_data = '';
    if(function_exists('fw_get_db_settings_option')):	
      $cultivation_theme_data = fw_get_db_settings_option();
    endif; 
    $facebook_app_id = '';
    if(!empty($cultivation_theme_data['facebook_login_client_id'])):
      $facebook_app_id = $cultivation_theme_data['facebook_login_client_id'];
    endif;
    $facebook_app_secret = '';
    if(!empty($cultivation_theme_data['facebook_login_client_secret'])):
      $facebook_app_secret = $cultivation_theme_data['facebook_login_client_secret'];   
    endif;
    global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
	require_once("../wp-load.php");
    if(isset($_GET["code"]))
    {   
       
        $jsonurl = "https://graph.facebook.com/oauth/access_token?client_id=" .$facebook_app_id. "&redirect_uri=". get_site_url() . "/wp-admin/admin-ajax.php?action=facebook_oauth_callback" . "&client_secret=" .$facebook_app_secret. "&code=" . $_GET["code"];
        $cSession = curl_init(); 
        curl_setopt($cSession,CURLOPT_URL,$jsonurl);
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false); 
        $result = curl_exec($cSession);
        curl_close($cSession);
        $face_bookdata = json_decode($result);
        if(isset($face_bookdata->access_token))
        {   
            $access_token = $face_bookdata->access_token;
            $user_information = file_get_contents("https://graph.facebook.com/me?access_token=" . $access_token . "&fields=email,name");
        	$user_information_array = json_decode($user_information, true);
            $email = $user_information_array["email"];
        	$name = $user_information_array["name"];
        	if(username_exists($name))
			{
				$user_id = username_exists($name);
				wp_set_auth_cookie($user_id);
                update_user_meta($user_id, "facebook_access_token", $access_token);
			    header('Location: ' . get_site_url());
			
			}
			else
			{
			//create a new account and then login
			wp_create_user($name, cultivation_generateRandomString(), $email);
			$user_id = username_exists($name);
			wp_set_auth_cookie($user_id);
            update_user_meta($user_id, "facebook_access_token", $access_token);
			header('Location: ' . get_site_url());
			 
			}
        }
        else
        {   
          header("Location: " . get_site_url());
        }
    }
    else
    {
    	header("Location: " . get_site_url());
    }
wp_die();
}

/*
 * Google Data Registration Form
 */
function googlegenerateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
add_action("wp_ajax_cultivation_googleplus_oauth_callback", "cultivation_googleplus_oauth_callback");
add_action("wp_ajax_nopriv_cultivation_googleplus_oauth_callback", "cultivation_googleplus_oauth_callback"); 
function cultivation_googleplus_oauth_callback()
{
    global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
    /**
     * Get theme setting data
     */
    $cultivation_theme_data = '';
    if (function_exists('fw_get_db_settings_option')):	
        $cultivation_theme_data = fw_get_db_settings_option();
    endif; 
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
	
	require_once("../wp-load.php");
	require_once 'googleplusoauth/apiClient.php';
	require_once 'googleplusoauth/contrib/apiPlusService.php';
	
	$client = new apiClient();
	$client->setApplicationName($googleplus_app_name);
	
	$client->setScopes(array('https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.profile'));
	
	$plus = new apiPlusService($client);
	
	$client->authenticate();
	
	$_SESSION['access_token'] = $client->getAccessToken();
	
	$client->setAccessToken($_SESSION['access_token']);	
	
	$me = $plus->people->get('me');
	
	$email = $me["emails"][0]["value"];
	
	$name = $me["displayName"];
	
	if(email_exists($email))
	{
		$user_id = email_exists($email);
		
		wp_set_auth_cookie($user_id);
		
		update_user_meta($user_id, "googleplus_access_token", $_SESSION["access_token"]);
		
		header('Location: ' . get_site_url());
	}
	else
	{
		$current_id= wp_create_user($name, googlegenerateRandomString(), $email);
		$user_id = email_exists($name);
		
		wp_set_auth_cookie($current_id);
		
		update_user_meta($current_id, "googleplus_access_token", $_SESSION["access_token"]);
		
		header('Location: ' . get_site_url());
	}
	unset($_SESSION["access_token"]);
	die();
	
}

/** 
 * Product Load More Ajax
 */ 
add_action("wp_ajax_cultivation_woocom_productloademore", "cultivation_woocom_productloademore");
add_action("wp_ajax_nopriv_cultivation_woocom_productloademore", "cultivation_woocom_productloademore"); 
function cultivation_woocom_productloademore(){
$product_shownumber  = '';
if(!empty($_POST['click_value'])):
  $product_shownumber  = $_POST['click_value'];
endif;
$args = array(
     'post_type' =>'product',
     'order'   => 'ASC',
     'posts_per_page' => $product_shownumber
    );
$cv_query = new WP_Query($args);
if($cv_query->have_posts()) :
    while($cv_query->have_posts()): $cv_query->the_post();
    if(has_post_thumbnail(get_the_ID())):
        $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
	    $thum_image = cultivation_aq_resize($attachment_url, 253, 170, false);
	endif;	
   global $product;
   if(class_exists('WooCommerce')):
   ?>
	<div class="col-md-4">
		<div class="org_product_block">
			<?php 
		    $price = get_post_meta( get_the_ID(), '_regular_price', true);
            $price_sale = get_post_meta( get_the_ID(), '_sale_price', true);
            if(!empty($price_sale)):
		      $percentage = round( ( ( $price - $price_sale ) / $price ) * 100 );
            echo '<span class="product_label">'.esc_html($percentage);
               echo esc_html__('% OFF','cultivation');
            echo '</span>';  
            endif;
		    ?>
			<?php if(!empty($thum_image)): ?>
			 <div class="org_product_image">
			    <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
			    </a>
			 </div>
			<?php endif; ?>
			<h4><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h4>
			<?php if($price_html = $product->get_price_html()): ?><h3><span><i class="fa fa-usd" aria-hidden="true"></i></span><?php printf($price_html); ?></h3>
			<?php endif;
			if($product = wc_get_product(get_the_ID())): ?>
			<a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="shop_btn">
			 <?php esc_html_e('add to cart','cultivation'); ?> 
			</a>
		   <?php endif; ?>
		</div>
	</div>
<?php 
endif;
endwhile;
wp_reset_postdata();
endif;
$args = $num = '';
$args = array( 'post_type'=>'product','posts_per_page' => -1 );
$num = count( get_posts( $args ) );
if($product_shownumber >= $num ):
?>
<style> 
a#clv_loadmoreoption { display: none; }
</style>
<?php 
endif; 
die();
}