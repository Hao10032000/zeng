<?php 

$wp_customize->add_setting(
  'blog_single_meta',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('blog_single_meta'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'blog_single_meta',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Show Blog Single Meta ( OFF | ON )', 'zeng'),
        'section' => 'section_content_blog_single',
        'priority' => 1,
    ))
);  

$wp_customize->add_setting(
  'blog_single_share_sidebar',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('blog_single_share_sidebar'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'blog_single_share_sidebar',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Show Share Post Side ( OFF | ON )', 'zeng'),
        'section' => 'section_content_blog_single',
        'priority' => 2,
    ))
);  

$wp_customize->add_setting(
  'blog_single_share_bottom',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('blog_single_share_bottom'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'blog_single_share_bottom',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Show Share Post Bottom Content ( OFF | ON )', 'zeng'),
        'section' => 'section_content_blog_single',
        'priority' => 3,
    ))
);  

$wp_customize->add_setting(
  'blog_single_navigation',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('blog_single_navigation'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'blog_single_navigation',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Show Post Navigator ( OFF | ON )', 'zeng'),
        'section' => 'section_content_blog_single',
        'priority' => 4,
    ))
);  