<?php
if ( ! function_exists( 'themesflat_body_classes' ) ) {
	add_filter( 'body_class', 'themesflat_body_classes' );

	function themesflat_body_classes( $classes ) {	
		$custom_page_class = themesflat_meta('custom_page_class');

		$classes[] = $custom_page_class;

		/**
		 * Header Style
		 */
		$style_header = themesflat_get_opt('style_header');
		if (themesflat_get_opt_elementor('style_header') != '') {
		    $style_header = themesflat_get_opt_elementor('style_header');
		}
		$classes[] = $style_header;

		/**
		 * One Page
		 */
		$one_page = '';
		if (themesflat_get_opt_elementor('onepage_menu') == 1) {
		    $one_page = 'one-page-menu';
		}
		$classes[] = $one_page;

		/**
		 * Name Page
		 */	  
		 $slug = get_post_field( 'post_name', get_post() );  	
		if ( $slug != '' ) {
			$classes[] = 'class-name-page-'.$slug;
		}

		return $classes;
	}
}