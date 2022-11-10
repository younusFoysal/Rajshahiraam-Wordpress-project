<?php
/**
 * Theme Option Setting Class
 */
class Cultivation_customsetting {
    
    /**
     * class construct
     */
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
	 * Top Header Setting
     */
	public function cultivation_topheader_setting(){ 
    	    $themeoption_data = '';
            if(!empty($this->cultivation_theme_data)):
               $themeoption_data = $this->cultivation_theme_data;
            endif;
            $header_style = '';
    	    if(!empty($themeoption_data['headerinfo_switch']['header_style'])):
    	      $header_style = $themeoption_data['headerinfo_switch']['header_style'];
    	    endif;   
            switch($header_style) { 
                case 'style-default': 
                $def_address = '';
                if(!empty($themeoption_data['headerinfo_switch']['style-default']['def_address'])):
                    $def_address = $themeoption_data['headerinfo_switch']['style-default']['def_address'];
                endif;
                $def_number = '';
                if(!empty($themeoption_data['headerinfo_switch']['style-default']['def_number'])):
                    $def_number = $themeoption_data['headerinfo_switch']['style-default']['def_number'];
                endif;
                $def_email = '';
                if(!empty($themeoption_data['headerinfo_switch']['style-default']['def_email'])):
                     $def_email = $themeoption_data['headerinfo_switch']['style-default']['def_email'];
                endif;
                if(!empty($def_address) || !empty($def_number) || !empty($def_email)):
			?>
			<div class="clv_address">
				<div class="row">
				    <?php if(!empty($def_address)): ?>
					<div class="col-md-4">
						<div class="address_block">
							<span class="addr_icon">
								<svg 
								 xmlns="http://www.w3.org/2000/svg"
								 xmlns:xlink="http://www.w3.org/1999/xlink"
								 width="12px" height="16px" viewBox="0 0 12 16">
								<defs>
								<filter id="Filter_0">
									<feFlood flood-color="#ffa90d" flood-opacity="1" result="floodOut" />
									<feComposite operator="atop" in="floodOut" in2="SourceGraphic" result="compOut" />
									<feBlend mode="normal" in="compOut" in2="SourceGraphic" />
								</filter>
                                </defs>
								<g filter="url(#Filter_0)">
								<path fill-rule="evenodd"  fill="#ffa90d"
								 d="M5.530,-0.004 C2.497,-0.004 0.029,2.434 0.029,5.431 C0.029,9.148 4.951,14.609 5.161,14.839 C5.358,15.055 5.702,15.054 5.898,14.839 C6.108,14.609 11.029,9.148 11.029,5.431 C11.029,2.434 8.562,-0.004 5.530,-0.004 ZM5.530,8.165 C4.004,8.165 2.762,6.937 2.762,5.431 C2.762,3.923 4.004,2.696 5.530,2.696 C7.055,2.696 8.297,3.923 8.297,5.431 C8.297,6.937 7.055,8.165 5.530,8.165 Z"/>
								</g>
								</svg>
							</span>
							<p><?php echo __($def_address); ?></p>
						</div>
					</div>
					<?php endif;
					if(!empty($def_number)):
					?>
					<div class="col-md-4">
						<div class="address_block">
							<span class="addr_icon">
								<svg 
								 xmlns="http://www.w3.org/2000/svg"
								 xmlns:xlink="http://www.w3.org/1999/xlink"
								 width="16px" height="15px" viewBox="0 0 16 15">
								<g filter="url(#Filter_0)">
								<path fill-rule="evenodd"  fill="rgb(0, 0, 0)"
								 d="M13.866,7.234 C13.607,5.720 12.892,4.343 11.802,3.254 C10.653,2.108 9.197,1.379 7.592,1.155 L7.754,-0.003 C9.613,0.254 11.296,1.095 12.626,2.426 C13.888,3.689 14.716,5.282 15.019,7.037 L13.866,7.234 ZM10.537,4.459 C11.296,5.220 11.796,6.178 11.977,7.238 L10.824,7.434 C10.684,6.617 10.300,5.872 9.713,5.286 C9.091,4.665 8.304,4.274 7.439,4.151 L7.601,2.995 C8.719,3.150 9.734,3.657 10.537,4.459 ZM4.909,8.180 C5.709,9.161 6.611,10.032 7.689,10.710 C7.920,10.853 8.176,10.959 8.416,11.090 C8.538,11.159 8.623,11.137 8.722,11.033 C9.088,10.660 9.459,10.290 9.831,9.922 C10.318,9.439 10.931,9.439 11.421,9.922 C12.017,10.516 12.614,11.109 13.207,11.706 C13.704,12.206 13.701,12.816 13.201,13.323 C12.864,13.664 12.505,13.987 12.186,14.344 C11.721,14.865 11.140,15.034 10.471,14.996 C9.500,14.942 8.607,14.622 7.745,14.203 C5.831,13.272 4.194,11.983 2.823,10.354 C1.808,9.148 0.971,7.834 0.421,6.353 C0.153,5.638 -0.038,4.905 0.022,4.127 C0.059,3.649 0.237,3.241 0.590,2.907 C0.971,2.544 1.330,2.168 1.705,1.798 C2.192,1.317 2.804,1.317 3.295,1.795 C3.598,2.093 3.894,2.394 4.194,2.694 C4.485,2.988 4.775,3.274 5.065,3.569 C5.578,4.083 5.578,4.683 5.069,5.194 C4.703,5.564 4.341,5.931 3.969,6.290 C3.872,6.388 3.863,6.466 3.913,6.585 C4.160,7.172 4.513,7.694 4.909,8.180 Z"/>
								</g>
								</svg>
							</span>
							<p><?php echo __($def_number); ?></p>
						</div>
					</div>
					<?php endif; 
					if(!empty($def_email)):
					?>
					<div class="col-md-4">
						<div class="address_block">
							<span class="addr_icon">
								<svg 
								 xmlns="http://www.w3.org/2000/svg"
								 xmlns:xlink="http://www.w3.org/1999/xlink"
								 width="20px" height="15px" viewBox="0 0 20 15">
								<g filter="url(#Filter_0)">
								<path fill-rule="evenodd"  fill="rgb(0, 0, 0)"
								 d="M14.468,8.297 C15.479,7.588 16.707,6.742 18.151,5.760 C18.554,5.483 18.907,5.174 19.211,4.833 L19.211,13.062 L14.468,8.297 ZM17.398,4.619 C15.683,5.816 14.388,6.719 13.509,7.333 C13.026,7.670 12.667,7.920 12.436,8.082 C12.402,8.106 12.349,8.146 12.278,8.196 C12.201,8.251 12.105,8.321 11.986,8.407 C11.756,8.574 11.565,8.709 11.413,8.811 C11.261,8.915 11.077,9.031 10.862,9.159 C10.646,9.286 10.443,9.382 10.252,9.445 C10.061,9.510 9.885,9.541 9.722,9.541 L9.711,9.541 L9.701,9.541 C9.538,9.541 9.362,9.510 9.171,9.445 C8.980,9.382 8.777,9.286 8.561,9.159 C8.345,9.031 8.161,8.915 8.010,8.811 C7.858,8.709 7.667,8.574 7.437,8.407 C7.318,8.321 7.221,8.251 7.145,8.196 C7.074,8.146 7.020,8.106 6.986,8.082 C6.690,7.872 6.332,7.622 5.916,7.329 C5.428,6.989 4.861,6.591 4.208,6.138 C3.000,5.297 2.275,4.791 2.035,4.619 C1.597,4.322 1.183,3.912 0.794,3.389 C0.406,2.868 0.211,2.382 0.211,1.937 C0.211,1.382 0.358,0.920 0.651,0.551 C0.945,0.181 1.363,-0.004 1.908,-0.004 L17.515,-0.004 C17.974,-0.004 18.372,0.164 18.708,0.498 C19.043,0.832 19.211,1.233 19.211,1.701 C19.211,2.262 19.038,2.798 18.692,3.310 C18.346,3.821 17.914,4.258 17.398,4.619 ZM4.956,8.295 L0.211,13.062 L0.211,4.833 C0.522,5.181 0.879,5.491 1.282,5.760 C2.783,6.784 4.006,7.629 4.956,8.295 ZM6.551,9.435 C6.954,9.732 7.281,9.965 7.532,10.132 C7.783,10.299 8.117,10.469 8.534,10.644 C8.951,10.817 9.340,10.903 9.700,10.903 L9.711,10.903 L9.721,10.903 C10.082,10.903 10.471,10.817 10.888,10.644 C11.305,10.469 11.639,10.299 11.890,10.132 C12.141,9.965 12.468,9.732 12.871,9.435 C12.989,9.348 13.114,9.258 13.243,9.165 L18.626,14.573 C18.312,14.853 17.942,14.995 17.515,14.995 L1.908,14.995 C1.481,14.995 1.110,14.853 0.796,14.573 L6.180,9.165 C6.314,9.262 6.439,9.352 6.551,9.435 Z"/>
								</g>
								</svg>
							</span>
							<p><?php echo __($def_email); ?></p>
						</div>
					</div>
					<?php endif; ?>
				 </div>
			   </div>
			 <?php
            endif;
            break; 
            case 'style-one': 
            $def_address = '';
            if(!empty($themeoption_data['headerinfo_switch']['style-one']['def_address'])):
                $def_address = $themeoption_data['headerinfo_switch']['style-one']['def_address'];
            endif;
            $def_number = '';
            if(!empty($themeoption_data['headerinfo_switch']['style-one']['def_number'])):
                $def_number = $themeoption_data['headerinfo_switch']['style-one']['def_number'];
            endif;
            $def_email = '';
            if(!empty($themeoption_data['headerinfo_switch']['style-one']['def_email'])):
                 $def_email = $themeoption_data['headerinfo_switch']['style-one']['def_email'];
            endif;
            if(!empty($def_address) || !empty($def_number) || !empty($def_email)):   
        	?> 
            <div class="clv_address">
                <div class="row">
            	  <?php if(!empty($def_address)): ?> 
            	    <div class="col-md-4">
                	    <div class="address_block">
            				<span class="addr_icon">
            				<svg 
            				 xmlns="http://www.w3.org/2000/svg"
            				 xmlns:xlink="http://www.w3.org/1999/xlink"
            				 width="12px" height="16px">
            				<defs>
            				<filter id="Filter_0">
            				<feFlood flood-color="rgb(31, 161, 46)" flood-opacity="1" result="floodOut" />
            				<feComposite operator="atop" in="floodOut" in2="SourceGraphic" result="compOut" />
            				<feBlend mode="normal" in="compOut" in2="SourceGraphic" />
            				</filter>
                            </defs>
            				<g filter="url(#Filter_0)">
            				<path fill-rule="evenodd"  fill="rgb(83, 175, 30)"
            				 d="M5.530,-0.004 C2.497,-0.004 0.029,2.434 0.029,5.431 C0.029,9.148 4.951,14.609 5.161,14.839 C5.358,15.055 5.702,15.054 5.898,14.839 C6.108,14.609 11.029,9.148 11.029,5.431 C11.029,2.434 8.562,-0.004 5.530,-0.004 ZM5.530,8.165 C4.004,8.165 2.762,6.937 2.762,5.431 C2.762,3.923 4.004,2.696 5.530,2.696 C7.055,2.696 8.297,3.923 8.297,5.431 C8.297,6.937 7.055,8.165 5.530,8.165 Z"/>
            				</g>
            				</svg>
            				</span>
            				<div class="header_location">
            				 <?php echo __($def_address); ?>
            				</div>
                		  </div>
            		  </div>
            		  <?php endif;
            		  if(!empty($def_number)):
            	 	  ?>
                	   <div class="col-md-4">
                			<div class="address_block">
                				<span class="addr_icon">
                					<svg 
                					 xmlns="http://www.w3.org/2000/svg"
                					 xmlns:xlink="http://www.w3.org/1999/xlink"
                					 width="16px" height="15px">
                					<g filter="url(#Filter_0)">
                					<path fill-rule="evenodd"  fill="rgb(0, 0, 0)"
                					 d="M13.866,7.234 C13.607,5.720 12.892,4.343 11.802,3.254 C10.653,2.108 9.197,1.379 7.592,1.155 L7.754,-0.003 C9.613,0.254 11.296,1.095 12.626,2.426 C13.888,3.689 14.716,5.282 15.019,7.037 L13.866,7.234 ZM10.537,4.459 C11.296,5.220 11.796,6.178 11.977,7.238 L10.824,7.434 C10.684,6.617 10.300,5.872 9.713,5.286 C9.091,4.665 8.304,4.274 7.439,4.151 L7.601,2.995 C8.719,3.150 9.734,3.657 10.537,4.459 ZM4.909,8.180 C5.709,9.161 6.611,10.032 7.689,10.710 C7.920,10.853 8.176,10.959 8.416,11.090 C8.538,11.159 8.623,11.137 8.722,11.033 C9.088,10.660 9.459,10.290 9.831,9.922 C10.318,9.439 10.931,9.439 11.421,9.922 C12.017,10.516 12.614,11.109 13.207,11.706 C13.704,12.206 13.701,12.816 13.201,13.323 C12.864,13.664 12.505,13.987 12.186,14.344 C11.721,14.865 11.140,15.034 10.471,14.996 C9.500,14.942 8.607,14.622 7.745,14.203 C5.831,13.272 4.194,11.983 2.823,10.354 C1.808,9.148 0.971,7.834 0.421,6.353 C0.153,5.638 -0.038,4.905 0.022,4.127 C0.059,3.649 0.237,3.241 0.590,2.907 C0.971,2.544 1.330,2.168 1.705,1.798 C2.192,1.317 2.804,1.317 3.295,1.795 C3.598,2.093 3.894,2.394 4.194,2.694 C4.485,2.988 4.775,3.274 5.065,3.569 C5.578,4.083 5.578,4.683 5.069,5.194 C4.703,5.564 4.341,5.931 3.969,6.290 C3.872,6.388 3.863,6.466 3.913,6.585 C4.160,7.172 4.513,7.694 4.909,8.180 Z"/>
                					</g>
                					</svg>
                				</span>
                				<div class="header_location">
                				 <?php echo __($def_number); ?>
                				</div>
                			</div>
                		</div>
                		<?php endif;
                		if(!empty($def_email)):
                		?>
                		<div class="col-md-4">
                			<div class="address_block br_none">
                				<span class="addr_icon">
                					<svg 
                					 xmlns="http://www.w3.org/2000/svg"
                					 xmlns:xlink="http://www.w3.org/1999/xlink"
                					 width="20px" height="15px">
                					 <g filter="url(#Filter_0)">
                					 <path fill-rule="evenodd"  fill="rgb(0, 0, 0)"
                					 d="M14.468,8.297 C15.479,7.588 16.707,6.742 18.151,5.760 C18.554,5.483 18.907,5.174 19.211,4.833 L19.211,13.062 L14.468,8.297 ZM17.398,4.619 C15.683,5.816 14.388,6.719 13.509,7.333 C13.026,7.670 12.667,7.920 12.436,8.082 C12.402,8.106 12.349,8.146 12.278,8.196 C12.201,8.251 12.105,8.321 11.986,8.407 C11.756,8.574 11.565,8.709 11.413,8.811 C11.261,8.915 11.077,9.031 10.862,9.159 C10.646,9.286 10.443,9.382 10.252,9.445 C10.061,9.510 9.885,9.541 9.722,9.541 L9.711,9.541 L9.701,9.541 C9.538,9.541 9.362,9.510 9.171,9.445 C8.980,9.382 8.777,9.286 8.561,9.159 C8.345,9.031 8.161,8.915 8.010,8.811 C7.858,8.709 7.667,8.574 7.437,8.407 C7.318,8.321 7.221,8.251 7.145,8.196 C7.074,8.146 7.020,8.106 6.986,8.082 C6.690,7.872 6.332,7.622 5.916,7.329 C5.428,6.989 4.861,6.591 4.208,6.138 C3.000,5.297 2.275,4.791 2.035,4.619 C1.597,4.322 1.183,3.912 0.794,3.389 C0.406,2.868 0.211,2.382 0.211,1.937 C0.211,1.382 0.358,0.920 0.651,0.551 C0.945,0.181 1.363,-0.004 1.908,-0.004 L17.515,-0.004 C17.974,-0.004 18.372,0.164 18.708,0.498 C19.043,0.832 19.211,1.233 19.211,1.701 C19.211,2.262 19.038,2.798 18.692,3.310 C18.346,3.821 17.914,4.258 17.398,4.619 ZM4.956,8.295 L0.211,13.062 L0.211,4.833 C0.522,5.181 0.879,5.491 1.282,5.760 C2.783,6.784 4.006,7.629 4.956,8.295 ZM6.551,9.435 C6.954,9.732 7.281,9.965 7.532,10.132 C7.783,10.299 8.117,10.469 8.534,10.644 C8.951,10.817 9.340,10.903 9.700,10.903 L9.711,10.903 L9.721,10.903 C10.082,10.903 10.471,10.817 10.888,10.644 C11.305,10.469 11.639,10.299 11.890,10.132 C12.141,9.965 12.468,9.732 12.871,9.435 C12.989,9.348 13.114,9.258 13.243,9.165 L18.626,14.573 C18.312,14.853 17.942,14.995 17.515,14.995 L1.908,14.995 C1.481,14.995 1.110,14.853 0.796,14.573 L6.180,9.165 C6.314,9.262 6.439,9.352 6.551,9.435 Z"/>
                					</g>
                				  </svg>
                				</span>
                				<div class="header_location">
                				  <?php echo __($def_email); ?>
                				</div> 
                			</div>
                		</div>
                	 <?php endif; ?>
                   </div>
               </div>
              <?php  
             endif;        
            break; 
            default:
          }
	}
    
    /**
	 * Custom button Setting
     */
    public function cultivation_custombutton_setting(){
        $themeoption_data = '';
        if(!empty($this->cultivation_theme_data)):
           $themeoption_data = $this->cultivation_theme_data;
        endif;
        $header_button = '';
        if(!empty($themeoption_data['header_button'])):
          $header_button = $themeoption_data['header_button'];
        endif;
        $header_button = '';
        if(!empty($themeoption_data['header_button'])):
          $header_button = $themeoption_data['header_button'];
        endif;
        $header_button_text = '';
        if(!empty($themeoption_data['header_button_text'])):
          $header_button_text = $themeoption_data['header_button_text'];
        else:
          $header_button_text = esc_html__('appointment','cultivation');
        endif;
        $header_button_url = '';
        if(!empty($themeoption_data['header_button_url'])):
          $header_button_url = $themeoption_data['header_button_url'];
        endif;
        if($header_button == 'on'):  
           echo '<a href="'.esc_url($header_button_url).'" class="appointment_btn">'.esc_html($header_button_text).'</a>';
        endif;
    }
    /**
     * woomincart settings 
     */ 
    public function cultivation_woomincart_setting(){
    $themeoption_data = '';
    if(!empty($this->cultivation_theme_data)):
       $themeoption_data = $this->cultivation_theme_data;
    endif;
    $header_mincart = '';    
    if(!empty($themeoption_data['header_mincart'])):
      $header_mincart = $themeoption_data['header_mincart'];
    endif;
    if($header_mincart == 'on'):
        if(class_exists("Woocommerce")):
        $woocommercemin_class = '';
        if(is_shop() || is_product()):
            $woocommercemin_class = esc_html__('clv_product_mincard','cultivation');
        endif;
    ?> 
    <li>
    	<a class="cart_toggle" href="javascript:;">
    		<svg 
    		 xmlns="http://www.w3.org/2000/svg"
    		 xmlns:xlink="http://www.w3.org/1999/xlink"
    		 width="18px" height="20px">
    		<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
    		 d="M16.712,5.566 C16.682,5.244 16.404,4.997 16.071,4.997 L12.857,4.997 L12.857,3.747 C12.857,1.678 11.127,-0.004 9.000,-0.004 C6.873,-0.004 5.143,1.678 5.143,3.747 L5.143,4.997 L1.928,4.997 C1.595,4.997 1.318,5.244 1.288,5.566 L0.002,19.315 C-0.014,19.490 0.046,19.664 0.168,19.793 C0.290,19.923 0.462,19.997 0.643,19.997 L17.357,19.997 C17.538,19.997 17.710,19.923 17.832,19.793 C17.952,19.664 18.014,19.490 17.997,19.315 L16.712,5.566 ZM6.428,3.747 C6.428,2.367 7.582,1.247 9.000,1.247 C10.417,1.247 11.571,2.367 11.571,3.747 L11.571,4.997 L6.428,4.997 L6.428,3.747 ZM1.347,18.745 L2.515,6.247 L5.143,6.247 L5.143,7.670 C4.759,7.887 4.500,8.286 4.500,8.746 C4.500,9.436 5.076,9.996 5.786,9.996 C6.495,9.996 7.071,9.436 7.071,8.746 C7.071,8.286 6.812,7.887 6.428,7.670 L6.428,6.247 L11.571,6.247 L11.571,7.670 C11.188,7.887 10.928,8.284 10.928,8.746 C10.928,9.436 11.505,9.996 12.214,9.996 C12.924,9.996 13.500,9.436 13.500,8.746 C13.500,8.286 13.240,7.887 12.857,7.670 L12.857,6.247 L15.484,6.247 L16.653,18.745 L1.347,18.745 Z"/>
    		</svg>
    		<span>
    		 <?php echo WC()->cart->get_cart_contents_count(); ?>   
    		</span>
    	</a>
       <div class="clv_cart_box <?php echo esc_attr($woocommercemin_class); ?>">
    		<div class="cart_section">
    		    <?php woocommerce_mini_cart(); ?>
    		</div>
    	</div>
    </li>  
    <?php
      endif;
    endif;
   }
   /**
    * function search
    */ 
    public function cultivation_search_setting(){
    $themeoption_data = '';
    if(!empty($this->cultivation_theme_data)):
       $themeoption_data = $this->cultivation_theme_data;
    endif;
    $header_search = '';    
    if(!empty($themeoption_data['header_search'])):
      $header_search = $themeoption_data['header_search'];
    endif;
    if($header_search == 'on'):    
    ?>
    <li>
	   <a class="search_toggle" href="javascript:;"><i class="fa fa-search" aria-hidden="true"></i></a>
	</li>
	<li>
	<div class="search_box">
		<div class="search_block"> 
			<h3><?php esc_html_e('Explore more with us','cultivation'); ?></h3>
			<form role="search" method="get" class="searchform group" action="<?php echo home_url( '/' ); ?>">
			<div class="search_field">
		    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search here', 'cultivation' ) ?>" value="<?php echo get_search_query() ?>" name="s"
title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>"/>
			<input type="submit" value="<?php esc_attr_e( 'search', 'cultivation'); ?>"/>
          </div>
          </form>
		</div>
		<span class="search_close">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 47.971 47.971" style="enable-background:new 0 0 47.971 47.971;" xml:space="preserve"  width="30px" height="30px">
			<g>
			<path style="fill:#fec007;" d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88
					c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242
					C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879
					s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/>
			</g>
			</svg>
		</span>
	</div>
	</li>
	<?php   
    endif;
    }
}