<?php
/**
 * @package zeng
 */
//Output all custom styles for this theme

function themesflat_custom_styles( $custom ) {
	$custom = '';

	//GROUP LAYOUT
		$content_controls = themesflat_decode(themesflat_get_opt('content_controls'));
	    themesflat_render_box_position("#themesflat-content",$content_controls);

	    $logo_width = themesflat_get_opt( 'logo_width');
		if ( $logo_width !='' ) {
			$custom .= "header .site-logo img { max-width:" . esc_attr($logo_width) . "px;height: auto;}"."\n";
		}

		$menu_distance_between = themesflat_get_opt( 'menu_distance_between');
		if ( $menu_distance_between !='' ) {
			$custom .= "#mainnav > ul > li { margin-left:" . esc_attr($menu_distance_between) . "px; margin-right:". esc_attr($menu_distance_between) ."px;}"."\n";
		}

	//GROUP FOOTER
		$footer_controls = themesflat_decode(themesflat_get_opt('footer_controls'));
	    themesflat_render_box_position("#footer",$footer_controls);

    //GROUP PAGE TITLE
		$page_title_controls = themesflat_decode(themesflat_get_opt('page_title_controls'));
	    themesflat_render_box_position(".page-title.style-default",$page_title_controls);


    	if ( themesflat_get_opt('primary_color') !='' || themesflat_get_opt('body_text_color') !='' || themesflat_get_opt('header1_background') !=''  || themesflat_get_opt('header2_background') !='') {

			// Root Primary Color
			$custom .= ' :root { --On-surface:' . esc_attr(themesflat_get_opt('primary_color')) . " }"."\n";
			$custom .= ' :root { --Secondary:' . esc_attr(themesflat_get_opt('body_text_color')) . " }"."\n";
			$custom .= ' :root { --Line:' . esc_attr(themesflat_get_opt('border_color')) . " }"."\n";
			$custom .= ' :root { --bg-header:' . esc_attr(themesflat_get_opt('header1_background')) . " }"."\n";
			$custom .= ' :root { --bg-header2:' . esc_attr(themesflat_get_opt('header2_background')) . " }"."\n";

		} 	

	   
	$custom = apply_filters('themesflat/render/style',$custom);
	wp_add_inline_style( 'themesflat-inline-css', $custom );

}

add_action( 'wp_enqueue_scripts', 'themesflat_custom_styles' );