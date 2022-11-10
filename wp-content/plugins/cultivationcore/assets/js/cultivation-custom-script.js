jQuery(document).ready( function($){
    "use strict";
    
    /**
     * singup js
    */  
   $("#form_register").on('submit', function(e){
		e.preventDefault();
		var username = $("#rgusername").val();
		var useremail = $("#useremail").val();
		var password = $("#regpassword").val();
		var confirmpass = $("#cregpassword").val();
		var emptyfield = false;
		var emailvalid = false;
		var passvalid = false;
		toastr.clear();
 
		if( username == '' ) {
			emptyfield = true;
		}
		if(useremail == '') {
			emptyfield = true;
		}
		if(password == '') {
			emptyfield = true;
		}
		if(confirmpass == '') {
			emptyfield = true;
		}

		if(emptyfield == false) {
			if ( validateEmail(useremail) ) {
				emailvalid = true;
			}else {
				emailvalid = false;
				toastr.error('Email is not valid.');
	        }

	        if(password == confirmpass){
	        	passvalid = true;
	        }else{
	        	passvalid = false;
	        	toastr.error('password does not match.');
	        }

		}else{
			$(".form-msg").addClass('error-row');
			toastr.error('All fields are required.');
		}

		if(passvalid == true && emailvalid == true) {
			var formdata ='username='+username+'&useremail='+useremail+'&password='+password+'&confirmpass='+confirmpass;
				formdata += '&action=cultivation_user_register_form';
				
                $("#erroremail").html('');
				$("#errorcpass").html('');
				$("#register_btn").hide();
				$(".hst_loader").show();
				$(".form-msg").html('');
				$.ajax({
					type: 'post',
					url: frontadminajax.ajax_url,
					data: formdata,
					success: function(response){
						var result = JSON.parse(response);
					    
						if( result.status == 'true' ) {
							$(".form-msg").addClass('success-row');
							toastr.success(result.msg);
							$("#form_register")[0].reset();
						}else{
							$.each(result, function(i,n){
							    if(n != 'false'){
							        toastr.error(n);   
							    }
							});
						}
                        $(".hst_loader").hide();
						$("#register_btn").show();
                        
					}
				});
		} 
  

	});
    
    /**
	 * Login form js
	 */ 
	$("#form_login").on('submit', function(e){
	e.preventDefault();
	var username = $("#lusername").val();
	var password = $("#lpassword").val();
	var rem = $('#rem_check').val();
    toastr.clear();
		if(username == '' && password == ''){
			$(".form-lmsg").addClass('error-row');
			toastr.error('All fields are required.');
		}else{
			var formdata ='username='+username+'&password='+password+'&rem_check='+rem;
			formdata += '&action=cultivation_user_login_form';

			$("#login_btn").hide();
			$(".hst_loader").show();
			$(".form-lmsg").html('');
			$.ajax({
				type: 'post',
				url: frontadminajax.ajax_url,
				data: formdata,
				success: function(response){
					var result = JSON.parse(response);
					if( result.status == 'false' ) {
						$(".form-lmsg").addClass('error-row');
						toastr.error(result.msg);
					}else{
					    toastr.success(result.msg);
						window.location.href = result.redirect_uri;
					}
					
					$(".hst_loader").hide();
					$("#login_btn").show();

				}
			});
		}

	});
	
    /**
     * mailchimp jquery
     */ 
	$('#cv_newslatter').on('click',function(e) {
	    e.preventDefault(); 
	    var subc_email = $("#ns_email").val();
        var apikey = $("#ns_apikey").val();
        var listid = $("#ns_list").val();
		
		if (!validateEmail(subc_email))  
        {  
         $(".cv_messages").html("<span style='color:red;'>Please make sure you enter a valid email address.</span>");
        }else{
		    jQuery.ajax({ 
			    type : "post",
                url : frontadminajax.ajax_url,
                data : {'action': "cultivation_send_newsletter", apikey : apikey,listid:listid,subc_email:subc_email}, 
				success: function(response) {
                           if(response=="200" ){
                               $(".cv_messages").html('<span style="color:green;">You have successfully subscribed to our mailing list.</span>');
							 } else if(response=="204"){
                                $(".cv_messages").html('<span style="color:red;">Your Email Alreday Subscribed List</span>');  
							 }else{
							  $(".cv_messages").html('<span style="color:red;">Please Check Email Address</span>');  
							}

						}
                  });
	        }
	 });
	 
   /**
	* email checker
	*/ 
    function validateEmail(uemail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	    if (filter.test(uemail)) {
	        return true;
	    }
	    else {
	        return false;
	    }
    }
   /**
    * profile edite
    */
   $('#cv_user_profiledite').on('click',function(e) {
       $('.user_profileview').hide();
       $('.user_profileedite').show();
    });
   
   $("#cv_profile_edit").on('submit', function(e){
		e.preventDefault();
		var username = $("#efname").val();
		var userlname = $("#elname").val();
		var useremail = $("#eemail").val();
		var userephone = $("#ephone").val();
		var usereaddress = $("#eaddress").val();
		var userid = $("#cur_user_id").val();
		var pro_img = $("#image-url").val();
		var password = $("#ed_password").val();
		var confpassword = $("#ed_confpassword").val();

		var emptyfield = false;
		var emailvalid = false;
		var passvalid = false;

		if( username == '' ) {
			emptyfield = true;
		}
		if(useremail == '') {
			emptyfield = true;
		}
		if(password == '' && confpassword == ''){
			passvalid = true;
		}

		if(emptyfield == false) {
			if ( validateEmail(useremail) ) {
				emailvalid = true;
			}else {
				emailvalid = false;
	    		toastr.warning("Email is not valid.");
	        }
	        if(password == confpassword){
	        	passvalid = true;
	        }else{
	        	passvalid = false;
	        	toastr.warning("password does not match");
	        }

		}else{
			toastr.error("All fields are required.");
		}

		if(emailvalid == true && passvalid == true) {
			var formdata = 'userid='+userid+'&userlname='+userlname+'&usereaddress='+usereaddress+'&userephone='+userephone+'&username='+username+'&useremail='+useremail+'&profile_img='+pro_img+'&password='+password+'&confpassword='+confpassword;
				formdata += '&action=cultivation_user_update_form';
				
                $(".user_profileedite").hide();
                
				$(".hst_loader").show();
				 
				$.ajax({
					type: 'post',
					url: frontadminajax.ajax_url,
					data: formdata,
					success: function(response){
						var result = JSON.parse(response);
						if(result.status == 'false'){
							toastr.error(result.msg);
						}else{
							toastr.success(result.msg);
						}
						$(".hst_loader").hide();
						$(".user_profileview").show();

					}
				});
		}	

	});
	 
    /**
	 * cultivation gallery load more
	 */
	 $("#gallery_load_more").on('click', function(){
	     
	    var ajx_auto_incriment = 1;
		var ajx_blog_number = 6;
		var ajx_blog_showmore = 4;
	    var ajx_multi = ajx_blog_showmore*ajx_auto_incriment;
		var ajx_value = +ajx_blog_number +ajx_multi;
		ajx_auto_incriment++;
		var formdata = 'click_value='+ajx_value;
		formdata += '&action=cultivation_gallery_loadmore';
	    $.ajax({
			type : "post", 
			url : frontadminajax.ajax_url,
			data : formdata, 
			success: function(response) {
				 
				 $("#gallery_load_mores").html(response);
			  }
		  })
	 }); 
    
    
    /**
	  * Gallery Images
	  */ 
	  $(".wc_gallery_image").on('click',function(){
	    $('.wc_get_gallery_src').attr('src',$(this).find('img').attr('data-img-src'));
	  });
	  
	 /**
	  * cultivation Woocommerce Product load more
	  */ 
	  
	  $('#clv_loadmoreoption').on('click',function(){
	      
	    var ajx_auto_incriment =1;
	    var ajx_blog_number = $(this).attr('data-productnumber');
	    var ajx_blog_showmore = $(this).attr('data-loadernumber');
	    var ajx_multi = ajx_blog_showmore*ajx_auto_incriment;
	    var ajx_value = ajx_blog_number + ajx_multi;
		ajx_auto_incriment++; 
		var formdata = 'click_value='+ajx_value;
	    formdata += '&action=cultivation_woocom_productloademore';
	    $.ajax({
			type : "post", 
			url : frontadminajax.ajax_url,
			data : formdata, 
			success: function(response) {
			    console.log(response);
			     $("#clv_product_setdata").html(response);
			  } 
		  })
	         
	  });
});  