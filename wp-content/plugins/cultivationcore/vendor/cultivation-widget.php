<?php
/**
 * version 1.0.0
 * Register and load the widget
 */
function cultivation_load_widget() {
    
    register_widget('Cultivation_widget_aboutus');
    register_widget('Cultivation_widget_menu');
    register_widget('Cultivation_widget_recentpost');
    register_widget('Cultivation_widget_contactinformation');
    register_widget('cultivation_timetable_widget');
    register_widget('cultivation_testimonial_widget');
    register_widget('Cultivation_Instagram_Widget');
} 
add_action( 'widgets_init', 'cultivation_load_widget');

/**
 * About summary and logo widget
 */ 
class Cultivation_widget_aboutus extends WP_Widget {
    
    function  __construct() {

	parent::__construct(
		'Cultivation_widget_aboutus', // Base ID of your widget
		 esc_html__('About Summary & Logo', 'cultivation'),  // Widget name will appear in UI
		   array( 'description' => esc_html__( 'About summary and logo', 'cultivation' ), ) // Widget description
		 );
    }
    public function widget( $args, $instance ) {
        
    $app_widget_title = '';
    if ( isset( $instance[ 'app_widget_title' ] ) ) {
        $app_widget_title = $instance[ 'app_widget_title' ];
    }
    $app_widget_desc = '';
    if ( isset( $instance[ 'app_widget_desc' ] ) ) {
        $app_widget_desc = $instance[ 'app_widget_desc' ];
    }
    $app_widget_contactnum = '';
    if ( isset( $instance[ 'app_widget_contactnum' ] ) ) {
        $app_widget_contactnum = $instance[ 'app_widget_contactnum' ];
    }
    $gplay_image_url = '';
    if ( isset( $instance[ 'gplay_image_url' ] ) ) {
        $gplay_image_url = $instance[ 'gplay_image_url' ];
    }
    ?>
    <div class="footer_block">
        <?php if(!empty($gplay_image_url)): ?>
		  <div class="footer_logo"><a href="<?php echo esc_url(home_url('/'));  ?>"><img src="<?php echo esc_url($gplay_image_url); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" /></a></div>
		<?php endif;
		if(!empty($app_widget_desc)):
		?><p><?php echo esc_html($app_widget_desc); ?></p>
		<?php
		endif;
		if(!empty($app_widget_title)): ?>
		<h6><?php echo esc_html($app_widget_title); ?></h6>
		<?php endif;
		if(!empty($app_widget_contactnum)):
		?><h3><?php echo esc_html($app_widget_contactnum); ?></h3>
		<?php endif; ?>
	</div>
    <?php
    }
    public function form( $instance ) {
        
    $app_widget_title = '';
    if ( isset( $instance[ 'app_widget_title' ] ) ) {
        $app_widget_title = $instance[ 'app_widget_title' ];
    }
    $app_widget_desc = '';
    if ( isset( $instance[ 'app_widget_desc' ] ) ) {
        $app_widget_desc = $instance[ 'app_widget_desc' ];
    }
    $app_widget_contactnum = '';
    if ( isset( $instance[ 'app_widget_contactnum' ] ) ) {
        $app_widget_contactnum = $instance[ 'app_widget_contactnum' ];
    }
    $gplay_image_url = '';
    if ( isset( $instance[ 'gplay_image_url' ] ) ) {
        $gplay_image_url = $instance[ 'gplay_image_url' ];
    }
    
    ?>
    <p class="img-prev">
  	<?php if (isset($gplay_image_url)) { echo '<img src="'.esc_url($gplay_image_url).'" class="window_image_url"';} ?>
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('gplay_image_url'); ?>">
    <?php esc_html_e('upload Image', 'cultivation') ?>:</label>
    <input  id="<?php echo $this->get_field_id('gplay_image_url'); ?>" type="hidden" class="gplayimage-url" name="<?php echo $this->get_field_name('gplay_image_url'); ?>" value="<?php if (isset($gplay_image_url)) echo esc_attr($gplay_image_url); ?>"/>
    <input data-title="<?php esc_attr_e('Image','cultivation'); ?>" data-btntext="<?php esc_attr_e('Select it','cultivation'); ?>" class="button upload_gplay_image_button" type="button" value="<?php esc_attr_e('Upload','cultivation') ?>" />
    </p>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id( 'app_widget_desc' )); ?>">
    <?php esc_html_e( 'Content:','cultivation'); ?></label> 
    <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'app_widget_desc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'app_widget_desc' )); ?>" rows="5"><?php echo esc_html( $app_widget_desc ); ?></textarea>
    </p>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id( 'app_widget_title' )); ?>">
    <?php esc_html_e( 'Title:','miraculous'); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'app_widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'app_widget_title' )); ?>" type="text" value="<?php echo esc_attr( $app_widget_title ); ?>" />
    </p>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id('app_widget_contactnum')); ?>">
    <?php esc_html_e( 'Contact Number:','miraculous'); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('app_widget_contactnum')); ?>" name="<?php echo esc_attr($this->get_field_name('app_widget_contactnum')); ?>" type="text" value="<?php echo esc_attr( $app_widget_contactnum ); ?>" />
    </p>
   <?php 
    }
    public function update( $new_instance, $old_instance ) {
        
      $instance = array();
      $instance['app_widget_title'] = ( ! empty( $new_instance['app_widget_title'] ) ) ? strip_tags( $new_instance['app_widget_title'] ) : '';
      $instance['app_widget_contactnum'] = ( ! empty( $new_instance['app_widget_contactnum'] ) ) ? strip_tags( $new_instance['app_widget_contactnum'] ) : '';
      $instance['app_widget_desc'] = ( ! empty( $new_instance['app_widget_desc'] ) ) ? strip_tags( $new_instance['app_widget_desc'] ) : '';
      $instance['gplay_image_url'] = ( ! empty( $new_instance['gplay_image_url'] ) ) ? strip_tags( $new_instance['gplay_image_url'] ) : '';
      return $instance;
    
    }
}
 
/**
 * cultivation widget menu
 */ 
class Cultivation_widget_menu extends WP_Widget {
    
    function  __construct() {

	parent::__construct(
		'Cultivation_widget_menu', // Base ID of your widget
		 esc_html__('Cultivation Menu Option', 'cultivation'),  // Widget name will appear in UI
		   array( 'description' => esc_html__( 'Cultivation Menu Option', 'cultivation' ), ) // Widget description
		 );
    } 
    public function widget( $args, $instance ) {
        
    $app_widget_title = '';
    if ( isset( $instance[ 'app_widget_title' ] ) ) {
        $app_widget_title = $instance[ 'app_widget_title' ];
    }
    $gplay_image_url = '';
    if ( isset( $instance[ 'gplay_image_url' ] ) ) {
        $gplay_image_url = $instance[ 'gplay_image_url' ];
    }  
    $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
    if (!$nav_menu):
       return;
    endif;
    ?>
    <div class="footer_block"> 
		<div class="footer_heading">
		    <?php if(!empty($app_widget_title)): ?>
			  <h4><?php echo esc_html($app_widget_title); ?></h4>
			<?php endif;
			if(!empty($gplay_image_url)):
			?><img src="<?php echo esc_url($gplay_image_url); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
			<?php endif; ?>
		</div>
		<?php wp_nav_menu( array( 'menu' => $nav_menu) ); ?>
	</div>
    <?php
    }
    public function form( $instance ) {
        $app_widget_title = '';
        if ( isset( $instance[ 'app_widget_title' ] ) ) {
            $app_widget_title = $instance[ 'app_widget_title' ];
        }
        $gplay_image_url = '';
        if ( isset( $instance[ 'gplay_image_url' ] ) ) {
            $gplay_image_url = $instance[ 'gplay_image_url' ];
        }  
        $menus = get_terms('nav_menu', array( 'hide_empty' => false ) );
            if ( !$menus ):
               echo '<p>'. sprintf( esc_html__('No menus have been created yet.<a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
            return;
	    endif;
    ?>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id( 'app_widget_title' )); ?>">
    <?php esc_html_e( 'Title:','miraculous'); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'app_widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'app_widget_title' )); ?>" type="text" value="<?php echo esc_attr( $app_widget_title ); ?>" />
    </p>
    <p class="img-prev">
  	<?php if (isset($gplay_image_url)) { echo '<img src="'.esc_url($gplay_image_url).'" class="window_image_url"';} ?>
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('gplay_image_url'); ?>">
    <?php esc_html_e('upload Image', 'cultivation') ?>:</label>
    <input  id="<?php echo $this->get_field_id('gplay_image_url'); ?>" type="hidden" class="gplayimage-url" name="<?php echo $this->get_field_name('gplay_image_url'); ?>" value="<?php if (isset($gplay_image_url)) echo esc_attr($gplay_image_url); ?>"/>
    <input data-title="<?php esc_attr_e('Image','cultivation'); ?>" data-btntext="<?php esc_attr_e('Select it','cultivation'); ?>" class="button upload_gplay_image_button" type="button" value="<?php esc_attr_e('Upload','cultivation') ?>" />
    </p>
    <p>
	<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
    <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
    <?php
    foreach ( $menus as $menu ):
        $selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
        echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';
    endforeach;  
    ?>
    </select>
    </p>
    <?php
    }
    public function update( $new_instance, $old_instance ) {
        
    $instance = array();
    $instance['app_widget_title'] = ( ! empty( $new_instance['app_widget_title'] ) ) ? strip_tags( $new_instance['app_widget_title'] ) : '';
    $instance['app_widget_contactnum'] = ( ! empty( $new_instance['app_widget_contactnum'] ) ) ? strip_tags( $new_instance['app_widget_contactnum'] ) : '';
    $instance['gplay_image_url'] = ( ! empty( $new_instance['gplay_image_url'] ) ) ? strip_tags( $new_instance['gplay_image_url'] ) : '';
    $instance['nav_menu'] = ( ! empty( $new_instance['nav_menu'] ) ) ? strip_tags( $new_instance['nav_menu'] ) : '';
    return $instance;
    
    }
}

/**
 * Cultivation Recent Post
 */ 
 class Cultivation_widget_recentpost extends WP_Widget {
     
    function  __construct() {
        parent::__construct(
    	    'Cultivation_widget_recentpost', // Base ID of your widget
    		esc_html__('Cultivation Recent Post', 'cultivation'),  // Widget name will appear in UI
    		 array( 'description' => esc_html__( 'Cultivation Recent Post', 'cultivation' ), ) // Widget description
		   );
    } 
    public function widget( $args, $instance ) {
        
        $app_widget_title = '';
        if ( isset( $instance[ 'app_widget_title' ] ) ) {
            $app_widget_title = $instance[ 'app_widget_title' ];
        }
        $gplay_image_url = '';
        if ( isset( $instance[ 'gplay_image_url' ] ) ) {
            $gplay_image_url = $instance[ 'gplay_image_url' ];
        }  
        
        $app_widget_number = '';
        if ( isset( $instance[ 'app_widget_number' ] ) ) {
           $app_widget_number = $instance[ 'app_widget_number' ];
        }  
    ?>
    <div class="footer_heading"> 
	    <?php if(!empty($app_widget_title)): ?>
		  <h4><?php echo __($app_widget_title); ?></h4>
		<?php endif;
		if(!empty($gplay_image_url)):
		?><img src="<?php echo esc_url($gplay_image_url); ?>" alt="<?php echo esc_attr_e('image','cultivation'); ?>" />
		<?php endif; ?>
		<div class="footer_slider_arrows">
			<span class="footer_arrow footer_left">
				<svg 
				 xmlns="http://www.w3.org/2000/svg"
				 xmlns:xlink="http://www.w3.org/1999/xlink"
				 width="6px" height="10px">
				<path fill-rule="evenodd"  fill="rgb(182, 182, 182)"
				 d="M0.215,5.448 L4.736,9.733 C5.023,10.007 5.489,10.007 5.777,9.733 C6.064,9.462 6.064,9.020 5.777,8.747 L1.777,4.954 L5.777,1.161 C6.064,0.888 6.064,0.447 5.777,0.174 C5.489,-0.098 5.023,-0.098 4.735,0.174 L0.215,4.461 C0.071,4.598 -0.000,4.776 -0.000,4.954 C-0.000,5.133 0.072,5.312 0.215,5.448 Z"/>
				</svg>
			</span>
			<span class="footer_arrow footer_right">
				<svg 
				 xmlns="http://www.w3.org/2000/svg"
				 xmlns:xlink="http://www.w3.org/1999/xlink"
				 width="7px" height="10px">
				<path fill-rule="evenodd"  fill="rgb(182, 182, 182)"
				 d="M6.409,5.448 L1.885,9.733 C1.598,10.007 1.131,10.007 0.844,9.733 C0.556,9.462 0.556,9.020 0.844,8.747 L4.846,4.954 L0.844,1.161 C0.556,0.888 0.556,0.447 0.844,0.174 C1.131,-0.098 1.598,-0.098 1.886,0.174 L6.410,4.461 C6.553,4.598 6.625,4.776 6.625,4.954 C6.625,5.133 6.553,5.312 6.409,5.448 Z"/>
				</svg>
			</span>
		</div>
	</div> 
	<div class="footer_post_slider">
		<div class="swiper-container">
			<div class="swiper-wrapper">
			   <?php
			    $args = array(
                   'post_type' =>'post',
				   'posts_per_page' => $app_widget_number,
				   'post_status' =>'publish',
                  );
                $cv_query = new WP_Query($args);
    	        if($cv_query->have_posts()) :
    		       while($cv_query->have_posts()) : $cv_query->the_post();
    		       
    		        if(has_post_thumbnail(get_the_ID())):
                        $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
                        $thum_image = cultivation_aq_resize($attachment_url, 70, 65, true);
                    endif;	
			    ?>
			    <div class="swiper-slide">
					<div class="footer_post_slide">
					    <?php if(!empty($thum_image)): ?>
    						<div class="footer_post_image">
    							<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
    						</div>
						<?php endif; ?>
    						<div class="footer_post_content">
    							<span><?php echo get_the_date(); ?></span>
    							<p><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></p>
    						</div>
					</div>
				</div>
				<?php
                  endwhile;
                endif;
                ?>
			</div>
		</div>
	</div>
	<?php
    }
    public function form( $instance ) {
        $app_widget_title = '';
        if ( isset( $instance[ 'app_widget_title' ] ) ) {
            $app_widget_title = $instance[ 'app_widget_title' ];
        }
        $gplay_image_url = '';
        if ( isset( $instance[ 'gplay_image_url' ] ) ) {
            $gplay_image_url = $instance[ 'gplay_image_url' ];
        }  
        $app_widget_number = '';
        if ( isset( $instance[ 'app_widget_number' ] ) ) {
           $app_widget_number = $instance[ 'app_widget_number' ];
        }  
    ?> 
    <p class="img-prev">
  	 <?php if (isset($gplay_image_url)) { echo '<img src="'.esc_url($gplay_image_url).'" class="window_image_url"';} ?>
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('gplay_image_url'); ?>">
    <?php esc_html_e('upload Image', 'cultivation') ?>:</label>
    <input  id="<?php echo $this->get_field_id('gplay_image_url'); ?>" type="hidden" class="gplayimage-url" name="<?php echo $this->get_field_name('gplay_image_url'); ?>" value="<?php if (isset($gplay_image_url)) echo esc_attr($gplay_image_url); ?>"/>
    <input data-title="<?php esc_attr_e('Image','cultivation'); ?>" data-btntext="<?php esc_attr_e('Select it','cultivation'); ?>" class="button upload_gplay_image_button" type="button" value="<?php esc_attr_e('Upload','cultivation') ?>" />
    </p>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id( 'app_widget_title' )); ?>">
    <?php esc_html_e( 'Title:','miraculous'); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'app_widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'app_widget_title' )); ?>" type="text" value="<?php echo esc_attr( $app_widget_title ); ?>" />
    </p>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id( 'app_widget_number' )); ?>">
    <?php esc_html_e( 'Show No.of Post :','miraculous'); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'app_widget_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'app_widget_number' )); ?>" type="text" value="<?php echo esc_attr( $app_widget_number ); ?>" />
    </p>
    <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['app_widget_title'] = ( ! empty( $new_instance['app_widget_title'] ) ) ? strip_tags( $new_instance['app_widget_title'] ) : '';
        $instance['gplay_image_url'] = ( ! empty( $new_instance['gplay_image_url'] ) ) ? strip_tags( $new_instance['gplay_image_url'] ) : '';
        $instance['app_widget_number'] = ( ! empty( $new_instance['app_widget_number'] ) ) ? strip_tags( $new_instance['app_widget_number'] ) : '';
        return $instance;  
    }
 }
 
 /**
  * Cultivation Contact Information
  */ 
class Cultivation_widget_contactinformation extends WP_Widget {
     
    function  __construct() {
        parent::__construct(
    	    'Cultivation_widget_contactinformation', // Base ID of your widget
    		esc_html__('Cultivation Contact Information', 'cultivation'),  // Widget name will appear in UI
    		 array( 'description' => esc_html__( 'Cultivation Contact Information', 'cultivation' ), ) // Widget description
		   );
    }  
    
    public function widget( $args, $instance ) {
        $app_widget_title = '';
        if ( isset( $instance[ 'app_widget_title' ] ) ) {
            $app_widget_title = $instance[ 'app_widget_title' ];
        }
        $gplay_image_url = '';
        if ( isset( $instance[ 'gplay_image_url' ] ) ) {
            $gplay_image_url = $instance[ 'gplay_image_url' ];
        }  
        $app_widget_desc = '';
        if ( isset( $instance[ 'app_widget_desc' ] ) ) {
           $app_widget_desc = $instance[ 'app_widget_desc' ];
        }
        $app_widget_email = '';
        if (isset( $instance['app_widget_email'])){
           $app_widget_email = $instance['app_widget_email'];
        }
        $app_widget_number = '';
        if (isset( $instance['app_widget_number'])){
           $app_widget_number = $instance['app_widget_number'];
        } 
    ?>
    <div class="footer_heading">
        <?php if(!empty($app_widget_title)): ?>
		  <h4><?php echo __($app_widget_title); ?></h4>
		<?php endif;
		if(!empty($gplay_image_url)):
		?><img src="<?php echo esc_url($gplay_image_url); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
		<?php endif; ?>
	</div>
	<?php if(!empty($app_widget_desc)):	?>
    <p>
    <span>
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490.735 490.735" width="16px" height="16px">
        <g>
        	<path d="M254.464,470.039l-59.5-174.2l-174.3-59.6c-26.7-9.1-27.8-46.4-1.7-57.1l429.5-176.7c25.1-10.3,50.2,14.8,39.9,39.9
        		l-176.8,429.4C300.864,497.839,263.564,496.639,254.464,470.039z"></path>
        </g>
        </svg>
	</span>
	<?php echo __($app_widget_desc);?>
	</p>
	<?php endif;
	if(!empty($app_widget_number)):
	?>
    <p><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.56 480.56" width="16px" height="16px">
	<g>
		<path d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8
			c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4
			c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8
			c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3
			c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9
			c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z"/>
		<path d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1
			c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z"/>
		<path d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5
			l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z"/>
	</g>
</svg>
</span><?php echo __($app_widget_number); ?></p>
	<?php endif;
	if(!empty($app_widget_email)):
	?>
	<p>
    <span>
    <svg height="16px" viewBox="0 0 465.882 465.882" width="16px" xmlns="http://www.w3.org/2000/svg"><path d="m232.941 0-232.941 145.588v291.176c0 16.08 13.036 29.118 29.118 29.118h407.647c16.082 0 29.118-13.038 29.118-29.118v-291.176zm158.009 167.426-158.009 98.755-158.009-98.755 158.009-98.755z"/></svg>
    </span>
    <?php echo __($app_widget_email);?>
	</p>
	<?php endif;
    	$cultivation_core = '';
        if(class_exists('Cultivation_corelibrary')):
            $cultivation_core = new Cultivation_corelibrary();
            /** social pagelink */
            if(!function_exists('cultivation_social_pagelink')):
                $cultivation_core->cultivation_social_pagelink();
            endif;
        endif;
	}
    public function form( $instance ) {
        
        $app_widget_title = '';
        if ( isset( $instance[ 'app_widget_title' ] ) ) {
            $app_widget_title = $instance[ 'app_widget_title' ];
        }
        $gplay_image_url = '';
        if ( isset( $instance[ 'gplay_image_url' ] ) ) {
            $gplay_image_url = $instance[ 'gplay_image_url' ];
        }  
        $app_widget_desc = '';
        if ( isset( $instance[ 'app_widget_desc' ] ) ) {
            $app_widget_desc = $instance[ 'app_widget_desc' ];
        }
        $app_widget_email = '';
        if (isset( $instance['app_widget_email'])){
           $app_widget_email = $instance['app_widget_email'];
        }
        $app_widget_number = '';
        if (isset( $instance['app_widget_number'])){
           $app_widget_number = $instance['app_widget_number'];
        } 
    ?>
    <p class="img-prev">
  	<?php if (isset($gplay_image_url)) { echo '<img src="'.esc_url($gplay_image_url).'" class="window_image_url"';} ?>
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('gplay_image_url'); ?>">
    <?php esc_html_e('upload Image', 'cultivation') ?>:</label>
    <input  id="<?php echo $this->get_field_id('gplay_image_url'); ?>" type="hidden" class="gplayimage-url" name="<?php echo $this->get_field_name('gplay_image_url'); ?>" value="<?php if (isset($gplay_image_url)) echo esc_attr($gplay_image_url); ?>"/>
    <input data-title="<?php esc_attr_e('Image','cultivation'); ?>" data-btntext="<?php esc_attr_e('Select it','cultivation'); ?>" class="button upload_gplay_image_button" type="button" value="<?php esc_attr_e('Upload','cultivation') ?>" />
    </p>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id( 'app_widget_title' )); ?>">
    <?php esc_html_e( 'Title:','miraculous'); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('app_widget_title')); ?>" name="<?php echo esc_attr($this->get_field_name('app_widget_title')); ?>" type="text" value="<?php echo esc_attr($app_widget_title); ?>" />
    </p>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id( 'app_widget_desc' )); ?>">
    <?php esc_html_e( 'Address:','cultivation'); ?></label> 
    <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('app_widget_desc')); ?>" name="<?php echo esc_attr($this->get_field_name('app_widget_desc')); ?>" rows="5"><?php echo esc_html($app_widget_desc); ?></textarea>
    </p>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id('app_widget_email')); ?>">
    <?php esc_html_e( 'Enter Mail Address:','miraculous'); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('app_widget_email')); ?>" name="<?php echo esc_attr($this->get_field_name( 'app_widget_email' )); ?>" type="text" value="<?php echo esc_attr($app_widget_email); ?>" />
    </p>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id('app_widget_number')); ?>">
    <?php esc_html_e( 'Enter Contact Number :','miraculous'); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('app_widget_number')); ?>" name="<?php echo esc_attr($this->get_field_name( 'app_widget_number' )); ?>" type="text" value="<?php echo esc_attr($app_widget_number); ?>" />
    </p>
    <?php    
    } 
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['app_widget_title'] = ( ! empty( $new_instance['app_widget_title'] ) ) ? strip_tags( $new_instance['app_widget_title'] ) : '';
        $instance['gplay_image_url'] = ( ! empty( $new_instance['gplay_image_url'] ) ) ? strip_tags( $new_instance['gplay_image_url'] ) : '';
        $instance['app_widget_desc'] = ( ! empty( $new_instance['app_widget_desc'] ) ) ? strip_tags( $new_instance['app_widget_desc'] ) : '';
        $instance['app_widget_email'] = ( ! empty( $new_instance['app_widget_email'] ) ) ? strip_tags( $new_instance['app_widget_email'] ) : '';
        $instance['app_widget_number'] = ( ! empty( $new_instance['app_widget_number'] ) ) ? strip_tags( $new_instance['app_widget_number'] ) : '';
        return $instance;  
    }
 }
 
/**
 * Cultivation Social Widget
 */ 
class cultivation_timetable_widget extends WP_Widget {
    
    function  __construct() {
        parent::__construct(
    	    'cultivation_timetable_widget', // Base ID of your widget
    		esc_html__('cultivation Time Table widget', 'cultivation'),  // Widget name will appear in UI
    		 array( 'description' => esc_html__( 'cultivation Time Table widget', 'cultivation' ), ) // Widget description
		   );
    }  
    
    public function widget( $args, $instance ) {
        
        $gplay_image_url = '';
        if ( isset( $instance[ 'gplay_image_url' ] ) ) {
            $gplay_image_url = $instance[ 'gplay_image_url' ];
        }  
        $app_widget_title = '';
        if ( isset( $instance[ 'app_widget_title' ] ) ) {
            $app_widget_title = $instance[ 'app_widget_title' ];
        }  
    if(!empty($app_widget_title)): 
    ?><div class="footer_heading">
    	<h4><?php echo esc_html($app_widget_title); ?></h4>
    	<img src="<?php echo esc_url($gplay_image_url); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
      </div>
	<?php 
	endif; 
	/**
     * Get theme setting data
     */
    $cultivation_theme_data = '';
    if (function_exists('fw_get_db_settings_option')):	
        $cultivation_theme_data = fw_get_db_settings_option();
    endif; 
    if(!empty($cultivation_theme_data['cultivation_timetable'])):
      $cultivation_timetable = $cultivation_theme_data['cultivation_timetable']
	?> 
	<ul class="time_table">
	  <?php
	   if(!empty($cultivation_timetable)):
	      foreach($cultivation_timetable as $timetable):
    	      $enterday = '';
    	      if(!empty($timetable['enterday'])):
    	        $enterday = $timetable['enterday'];
    	      endif;
    	      $entertime = '';
    	      if(!empty($timetable['entertime'])):
    	       $entertime = $timetable['entertime']; 
    	      endif;
	       ?><li>
    		   <p><span><i class="fa fa-angle-right" aria-hidden="true"></i></span><?php echo esc_html($enterday); ?></p>
    		   <p><?php echo esc_html($entertime); ?></p>
    		</li>
	 <?php endforeach; 
	  endif;
	 ?>
	</ul>
    <?php   
    endif;
    }
    public function form( $instance ) {
        
        $gplay_image_url = '';
        if ( isset( $instance[ 'gplay_image_url' ] ) ) {
            $gplay_image_url = $instance[ 'gplay_image_url' ];
        }  
        $app_widget_title = '';
        if (isset( $instance[ 'app_widget_title' ] ) ) {
            $app_widget_title = $instance['app_widget_title'];
        }  
       
        ?>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'app_widget_title' )); ?>">
        <?php esc_html_e( 'Show Number OF Testimonial :','miraculous'); ?></label> 
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'app_widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'app_widget_title' )); ?>" type="text" value="<?php echo esc_attr( $app_widget_title ); ?>" />
        </p>
        <p class="img-prev">
         <?php if (isset($gplay_image_url)) { echo '<img src="'.esc_url($gplay_image_url).'" class="window_image_url"';} ?>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('gplay_image_url'); ?>">
        <?php esc_html_e('upload Image', 'cultivation') ?>:</label>
        <input  id="<?php echo $this->get_field_id('gplay_image_url'); ?>" type="hidden" class="gplayimage-url" name="<?php echo $this->get_field_name('gplay_image_url'); ?>" value="<?php if (isset($gplay_image_url)) echo esc_attr($gplay_image_url); ?>"/>
        <input data-title="<?php esc_attr_e('Image','cultivation'); ?>" data-btntext="<?php esc_attr_e('Select it','cultivation'); ?>" class="button upload_gplay_image_button" type="button" value="<?php esc_attr_e('Upload','cultivation') ?>" />
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['gplay_image_url'] = ( ! empty( $new_instance['gplay_image_url'] ) ) ? strip_tags( $new_instance['gplay_image_url'] ) : ''; 
        $instance['app_widget_title'] = ( ! empty( $new_instance['app_widget_title'] ) ) ? strip_tags( $new_instance['app_widget_title'] ) : ''; 
        return $instance;
    }
     
}

/**
 * Cultivation Testimonial Widget
 */ 
class cultivation_testimonial_widget extends WP_Widget {
    
    function  __construct() {
        parent::__construct(
    	    'cultivation_testimonial_widget', // Base ID of your widget
    		esc_html__('cultivation Testimonial widget', 'cultivation'),  // Widget name will appear in UI
    		 array( 'description' => esc_html__( 'cultivation Testimonial widget', 'cultivation' ), ) // Widget description
		   );
    }  
    public function widget( $args, $instance ) { 
    ?>
    <div class="sidebar_block">
    	<div class="sidebar_test_slider">
    		<div class="swiper-container">
    			<div class="swiper-wrapper">
    			    <?php
    			    $app_widget_number = '';
                    if ( isset( $instance[ 'app_widget_number' ] ) ) {
                        $app_widget_number = $instance[ 'app_widget_number' ];
                    }  
				    $args = array(
                       'post_type' =>'testimonial',
                       'order'   => 'ASC',
                       'posts_per_page' =>$app_widget_number
                      );
				    $cv_query = new WP_Query($args);
        		    if($cv_query->have_posts() ) :
                       while($cv_query->have_posts()): $cv_query->the_post();
                        if(function_exists( 'fw_get_db_post_option' )):	
                           $testimonial_post_data = fw_get_db_post_option(get_the_ID()); 
                        endif;
                        $designation = '';
                        if(!empty($testimonial_post_data['ts_designation'])):
                           $designation = $testimonial_post_data['ts_designation'];
                        endif;
                        if(has_post_thumbnail(get_the_ID())):
                             $attachment_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
        			         $thum_image = cultivation_aq_resize($attachment_url, 65, 65, true);
        			    endif;	
        			   $testimonial_quote = get_template_directory_uri().'/assets/images/blogside_quote.png';
        		    ?> 
    				<div class="swiper-slide">
    					<div class="sidebar_test_slide">
    					    <?php if(!empty($thum_image)): ?>
        						<div class="test_slide_image">
        							<img src="<?php echo esc_url($thum_image); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>">
        						</div>
    						<?php endif; ?>
    						<div class="test_slide_content">
    							<?php the_content(); ?>
								<h5><?php the_title(); ?></h5>
    							<?php if(!empty($testimonial_quote)): ?>
    							  <img src="<?php echo esc_url($testimonial_quote); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>">
    							<?php endif; ?>
    						</div>
    					</div>
    				</div>
    				<?php
					endwhile;
					  wp_reset_postdata();
					endif;
	                ?>
    			</div>
    			<div class="sidebar_arrow_wrapper">
    				<span class="sidebar_test_arrow test_left">
    					<i class="fa fa-angle-left" aria-hidden="true"></i>
    				</span>
    				<span class="sidebar_test_arrow test_right">
    					<i class="fa fa-angle-right" aria-hidden="true"></i>
    				</span>
    			</div>
    		</div>
       	 </div>
    </div>
    <?php
    }
    public function form( $instance ) {
        
    $app_widget_number = '';
    if ( isset( $instance[ 'app_widget_number' ] ) ) {
        $app_widget_number = $instance[ 'app_widget_number' ];
    }  
    $gplay_image_url = '';
    if ( isset( $instance[ 'gplay_image_url' ] ) ) {
        $gplay_image_url = $instance[ 'gplay_image_url' ];
    }      
    ?>
    <p>
    <label for="<?php echo esc_attr($this->get_field_id( 'app_widget_number' )); ?>">
    <?php esc_html_e( 'Show Number OF Testimonial :','miraculous'); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'app_widget_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'app_widget_number' )); ?>" type="text" value="<?php echo esc_attr( $app_widget_number ); ?>" />
    </p>
    <?php    
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['gplay_image_url'] = ( ! empty( $new_instance['gplay_image_url'] ) ) ? strip_tags( $new_instance['gplay_image_url'] ) : '';
        $instance['app_widget_number'] = ( ! empty( $new_instance['app_widget_number'] ) ) ? strip_tags( $new_instance['app_widget_number'] ) : ''; 
        return $instance;
    }
    
}

/**
 * Instagram Widget
*/
Class Cultivation_Instagram_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'cultivation-instagram-feed',
			__( 'Instagram Widget', 'cultivation' ),
			array(
				'classname' => 'cultivation-instagram-feed',
				'description' => esc_html__( 'Displays your latest Instagram photos', 'cultivation' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	function widget( $args, $instance ) {

		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$username = empty( $instance['username'] ) ? '' : $instance['username'];
		$limit = empty( $instance['number'] ) ? 9 : $instance['number'];
		$size = 'thumbnail';
		$target = empty( $instance['target'] ) ? '_self' : $instance['target'];
		$link = empty( $instance['link'] ) ? '' : $instance['link'];
        $gplay_image_url = '';
        if ( isset( $instance[ 'gplay_image_url' ] ) ) {
            $gplay_image_url = $instance[ 'gplay_image_url' ];
        }
		echo $args['before_widget'];
		echo '<div class="footer_block">';
		?>
		<div class="footer_heading">
		   <?php if(!empty($title)): ?>
			 <h4><?php echo esc_html($title); ?></h4>
		   <?php endif;
		   if(!empty($gplay_image_url)):
		   ?><img src="<?php echo esc_url($gplay_image_url); ?>" alt="<?php esc_attr_e('image','cultivation'); ?>" />
		   <?php endif; ?>
		</div>
		<?php
		if ( '' !== $username ) {
			$media_array = cultivation_instagram_images( $username );
			if ( is_wp_error( $media_array ) ) {
				echo wp_kses_post( $media_array->get_error_message() );
			} else {
				// filter for images only?
				if ( $images_only = apply_filters( 'wpiw_images_only', false ) ) {
					$media_array = array_filter( $media_array, 'check_insta_images_only' );
			   }

				// slice list down to required limit.
				$media_array = array_slice( $media_array, 0, $limit );

				// filters for custom classes.
				$ulclass = apply_filters( 'wpiw_list_class', 'instagram-pics instagram-size-' . $size );
				$liclass = apply_filters( 'wpiw_item_class', '' );
				$aclass = apply_filters( 'wpiw_a_class', '' );
				$imgclass = apply_filters( 'wpiw_img_class', '' );
				$template_part = apply_filters( 'wpiw_template_part', 'parts/motov4-widgets.php' );

				?>
				<div class="vt_instagram_info">
				<ul class="<?php echo esc_attr( $ulclass ); ?>"><?php
				foreach( $media_array as $item ) {
					if ( locate_template( $template_part ) !== '' ) {
						include locate_template( $template_part );
					} else {
						echo '<li class="' . esc_attr( $liclass ) . '"><a href="' . esc_url( $item['link'] ) . '" target="' . esc_attr( $target ) . '"  class="' . esc_attr( $aclass ) . '"><img src="' . esc_url( $item[$size] ) . '" alt="'.esc_attr__('instagram','cultivation').'" class="' . esc_attr( $imgclass ) . 'img-responsive"/></a></li>';
					}
				}
				?></ul>
				</div>
				<?php
			}
		}

		$linkclass = apply_filters( 'wpiw_link_class', 'clear' );
		$linkaclass = apply_filters( 'wpiw_linka_class', '' );

		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url = '//instagram.com/explore/tags/' . str_replace( '#', '', $username );
				break;

			default:
				$url = '//instagram.com/' . str_replace( '@', '', $username );
				break;
		}

		if ( '' !== $link ) {
			?><p class="<?php echo esc_attr( $linkclass ); ?>"><a href="<?php echo trailingslashit( esc_url( $url ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>" class="<?php echo esc_attr( $linkaclass ); ?>"><?php echo wp_kses_post( $link ); ?></a></p><?php
		}
		echo '</div>';
		//do_action( 'wpiw_after_widget', $instance );
	
		echo $args['after_widget'];
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'title' => __( 'Instagram', 'cultivation' ),
			'username' => '',
			'size' => 'large',
			'link' => __( 'Follow Me!', 'cultivation' ),
			'number' => 9,
			'target' => '_self',
		) );
		
		$title = '';
		if(isset($instance['title'])):
		 $title = $instance['title'];
		endif;
		$gplay_image_url = '';
        if ( isset( $instance[ 'gplay_image_url' ] ) ) {
            $gplay_image_url = $instance[ 'gplay_image_url' ];
        }  
		$username = '';
		if(isset($instance['username'])):
		 $username = $instance['username'];
		endif;
		$number = '';
		if(isset($instance['number'])):
		$number = absint( $instance['number'] );
		endif;
		$size = 'thumbnail';
		$target = '';
		if(isset($instance['target'])):
	     $target = $instance['target'];
		endif;
		$link = '';
		if(isset($instance['link'])):
		 $link = $instance['link'];
		endif;
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'cultivation' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
		 <p class="img-prev">
  	      <?php if (isset($gplay_image_url)) { echo '<img src="'.esc_url($gplay_image_url).'" class="window_image_url"';} ?>
        </p>
        <p>
         <label for="<?php echo $this->get_field_id('gplay_image_url'); ?>">
         <?php esc_html_e('upload Image', 'cultivation') ?>:</label>
         <input  id="<?php echo $this->get_field_id('gplay_image_url'); ?>" type="hidden" class="gplayimage-url" name="<?php echo $this->get_field_name('gplay_image_url'); ?>" value="<?php if (isset($gplay_image_url)) echo esc_attr($gplay_image_url); ?>"/>
         <input data-title="<?php esc_attr_e('Image','cultivation'); ?>" data-btntext="<?php esc_attr_e('Select it','cultivation'); ?>" class="button upload_gplay_image_button" type="button" value="<?php esc_attr_e('Upload','cultivation') ?>" />
        </p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( '@username or #tag', 'cultivation' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'cultivation' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open links in', 'cultivation' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" class="widefat">
				<option value="_self" <?php selected( '_self', $target ); ?>><?php esc_html_e( 'Current window (_self)', 'cultivation' ); ?></option>
				<option value="_blank" <?php selected( '_blank', $target ); ?>><?php esc_html_e( 'New window (_blank)', 'cultivation' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'cultivation' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" /></label></p>
		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['gplay_image_url'] = ( ! empty( $new_instance['gplay_image_url'] ) ) ? strip_tags( $new_instance['gplay_image_url'] ) : '';
		$instance['username'] = trim( strip_tags( $new_instance['username'] ) );
		$instance['number'] = ! absint( $new_instance['number'] ) ? 9 : $new_instance['number'];
		$instance['size'] = 'thumbnail';
		$instance['target'] = ( ( '_self' === $new_instance['target'] || '_blank' === $new_instance['target'] ) ? $new_instance['target'] : '_self' );
		$instance['link'] = strip_tags( $new_instance['link'] );
		return $instance;
	}
}