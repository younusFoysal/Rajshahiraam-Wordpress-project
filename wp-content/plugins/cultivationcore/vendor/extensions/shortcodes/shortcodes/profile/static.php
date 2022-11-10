<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if(is_user_logged_in()):


wp_enqueue_media();
wp_enqueue_script(
		'frontend-profile-upload',
		 plugin_dir_url( __FILE__ ).'static/js/frontend-profile-upload.js',
		array( 'jquery' ),
		false,
		true
	);
endif;

