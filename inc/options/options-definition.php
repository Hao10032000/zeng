<?php
/**
 * Return the default options of the theme
 * 
 * @return  void
 */

function themesflat_customize_default($key) {
	$default = array(
		'social_links'	=> array ("facebook" => '#', "twitter" => '#', "pinterest" => '#', "instagram" => '#'),
		'show_social_share' => 0,		
		'social_footer' => 0,
		'go_top' => 1,

		'social_header' => 1,

		'style_background' => '',
		'video_background' => 'video-1',

		'style_header'	=> 'header-default',	
		'header_backgroundcolor'=>'#24283E',
		'header_background_bottom_color'=>'',
		'header_sticky' => 0,
		'header_search_box' => 0,
		'header_button'=> 1,
		'header_dark_light' => 0,
		'header_button_text' => 'Let\'s talk!',
		'header_button_url' => '',

				'mobile_information' => '
        <li>Call Us Now: <span class="number">+1 666 8888</span></li>
        <li>Support 24/7: <a href="#" class="link">themesflat@gmail.com</a></li>
		',

		'heading_search' => 'What are you looking for?',
		'heading_search_category' => 'Popular Searches:',
		'heading_search_blog' => 'Trending Now',

		'enable_freelancer' => 0,
		'heading_freelancer' => 'available for hire',
		'heading_freelancer_subheading' => 'Availability: 2 Hours',
		'freelancer_button_text' => 'Hire Me',
		'freelancer_button_url' => '/contact',

		'show_post_navigator' => 0,
		'show_entry_footer_content'	=> 0,
		'logo_width' => '',
		'menu_location_primary' => 'primary',
		'site_logo_dark'	=> THEMESFLAT_LINK . 'images/logo-dark.png',
		'site_logo_light'	=> THEMESFLAT_LINK . 'images/logo-white.png',
		'site_logo_sticky'	=> THEMESFLAT_LINK . 'images/logo.png',
		'site_logo_mobile'	=> THEMESFLAT_LINK . 'images/logo.png',	
		'header_color_sticky' => '',
		'show_bottom' => 1,		
		'header_backgroundcolor_sticky'=>'#fff',	

		'primary_color'=>'#161616',
		'body_text_color'=>'#4e5052',
		'border_color'=>'#e9e9e9',
		'header1_background'=>'#f8f7f7',
		'header2_background'=>'#fff',
		
		'body_background_color' => '',
		'page_sidebar_layout' => 'sidebar-right',
		'content_controls' => array('padding-top' => 0,'padding-bottom' => 80),

		'menu_distance_between' => '',

		'h1_size' => 56,
		'h2_size' => 44,
		'h3_size' => 36,
		'h4_size' => 30,
		'h5_size' => 24,
		'h6_size' => 18,
		
		'page_title_background_color' => '#24283E',
		'page_title_background_color_opacity' => '40',
		'page_title_text_color' => '',		
		'page_title_controls' => array('padding-top' => '', 'padding-bottom' => ''),
		'page_title_background_image' =>  '',
		'page_title_image_size' => 'cover',
		'page_title_heading_enabled' => 1,
		'page_title_heading_count' => 0,
		'page_title_description' => 0,
		'show_category_list' => 0,
		'style_category_list' => 'style1',

		'bread_crumb_prefix' =>'',
		'bread_crumb_description' =>'',
		'breadcrumb_separator' =>  '/',
		'breadcrumb_color' => '#FFFFFF',

		'breadcrumb_enabled' => 1,
		'show_post_paginator' => 1,
		'blog_grid_number_post' => 10,
		'blog_grid_columns' => 2,
		'post_content_elements' => 'meta,title,excerpt_content,readmore',
		'blog_archive_exclude' => '',
		'blog_featured_title' => 'Blog Details',
		'sidebar_layout' => 'sidebar-right',
		'blog_archive_layout' => 'blog-list',
		'grid_columns_post_related' => 4,
		'grid_columns_post_related_tablet' => 3,
		'grid_columns_post_related_mobile' => 1,
		'grid_columns_post_related_mobile_small' => 2,
		'number_related_post' => 4,
		'blog_sidebar_list'		  => 'blog-sidebar',	
		'show_author_box' => 0,
		'blog_archive_readmore' => 1,
		'blog_archive_post_excepts_length' => 25,
		'blog_archive_readmore_text' => 'Read More',
		'blog_posts_per_page'	=> 3,
		'blog_order_by'	=> 'date',
		'blog_order_direction' => 'DESC',
		'page_sidebar_list'	=> 'blog-sidebar',	
		'heading_related' => 'Related Post',

		'footer_background_color'	=> '#24283E',
		'footer_title_widget_color' => '#fff',
		'footer_text_color'			=> '#A2A3AB',
		'footer_text_color_hover'   => '#317C6F',
		'footer_widget_areas' => 3,
		'footer_controls' => array('padding-top' => '', 'padding-bottom' =>'' ),
		'footer1' => 'footer-1',
		'footer2' => 'footer-2',
		'footer3' => 'footer-3',
		'footer4' => 'footer-4',
		'footer_background_image' => '',
		'footer_form' => '',
		'style_footer' => 'style1',
		'enable_footer_fixed' => 0,
		'footer_image_size' => 'cover',
		'footer_social' => 1,
		'footer_description' => 'Welcome to your go-to destination for insightful news! Discover
                            carefully selected articles that inform, inspire.',
		'footer_heading_menu_1' => 'Quick Link',
		'footer_heading_menu_2' => 'Categories',
		'footer_heading_menu_3' => 'Useful Links',
		'typography_bottom_copyright' => array(
			'family' => 'Epilogue',
			'style'  => '400',
			'size'   => '14',
			'line_height'=>'22px',
			'letter_spacing' => '',
		),
		'bottom_background_color'	=> '#24283E',
		'bottom_text_color'			=> '#A2A3AB',
		'bottom_link_color'         => '#ffffff',
		'bottom_text_color_hover'   => '',		
		'bottom_menu'   => 1,		
		'layout_version'			=> 'wide',		
		'footer_copyright'			=> '© 2025 ZenG. All Rights Reserved.',
		'enable_smooth_scroll'	=> 0,
		'page_title_styles' => 'default',
		'page_title_alignment' => 'left',

	);
	return $default[$key];
}