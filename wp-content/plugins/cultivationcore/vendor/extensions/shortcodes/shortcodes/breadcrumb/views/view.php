<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} 
$bg_image = '';
if ( ! empty( $atts['breadcrumb_bgimage'] ) && ! empty( $atts['breadcrumb_bgimage']['url'] ) ) {
	$bg_image = 'background-image:url(' . $atts['breadcrumb_bgimage']['url'] . ');';
}
$bg_padding = '';
if(!empty( $atts['breadcrumb_padding'])){
 $bg_padding = 'padding:'.$atts['breadcrumb_padding']; 
}
$section_style   = ($bg_image || $bg_padding ) ? 'style="'.esc_attr($bg_padding).';'. esc_attr($bg_image) . '"' : '';
?>
<!--Breadcrumb-->
<div class="breadcrumb_wrapper" <?php printf($section_style); ?>>
	<div class="container"> 
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="breadcrumb_inner">
					<?php 
                    echo '<h3>';
                        if(is_home() && have_posts()) :
                          esc_html_e('Blog','cultivation');
                        endif;
                        if(is_page()):
                            the_title();
                        endif;
                        if(is_single()): 
                            single_post_title();
                        endif;
                        if(class_exists( 'WooCommerce' ) ):
                            if(is_shop()):
                                esc_html_e('Shop','cultivation');
                            else:
                                if(is_archive()):
                                    the_archive_title();
                                endif;
                           endif;
                        else:
                          if(is_archive()):
                            the_archive_title();
                          endif; 
                        endif;
                        if(is_search()):
                            printf( esc_html__( 'Search Results for: %s', 'cultivation' ), '<span>'.get_search_query().'</span>' );
                        endif;
                       echo '</h3>';
                    ?>
				</div>
			</div>
		</div>
	</div>
	<div class="breadcrumb_block">
		<?php 
        if(function_exists('fw_ext_breadcrumbs')):
			echo fw_ext_breadcrumbs(); 
		endif;
        ?>
	</div>
</div> 