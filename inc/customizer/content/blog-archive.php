<?php 

// Entry Content Elements
$wp_customize->add_setting (
    'post_content_elements',
    array (
        'sanitize_callback' => 'themesflat_sanitize_text',
        'default' => themesflat_customize_default('post_content_elements'),     
    )
);
$wp_customize->add_control( new themesflat_Control_Drag_And_Drop( $wp_customize,
    'post_content_elements',
    array(
        'type'      => 'draganddrop-controls',
        'label'     => esc_html__('Post Content Elements', 'zeng'),
        'description' => esc_html__( 'Drag and drop elements to re-order.', 'zeng' ),
        'section'   => 'section_content_blog_archive',
        'priority'  => 5,
        'choices' => array(
            'meta'            => esc_html__( 'Meta', 'zeng' ),
            'title'           => esc_html__( 'Title', 'zeng' ),
            'excerpt_content' => esc_html__( 'Excerpt', 'zeng' ),
            'readmore'        => esc_html__( 'Read More', 'zeng' ),
        ),        
    ))
); 

// Excerpt
$wp_customize->add_setting(
    'blog_archive_post_excepts_length',
    array(
        'default'   =>  themesflat_customize_default('blog_archive_post_excepts_length'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_Slide_Control( $wp_customize,
    'blog_archive_post_excepts_length',
        array(
            'type'      =>  'slide-control',
            'section'   =>  'section_content_blog_archive',
            'label'     =>  'Post Excepts Length',
            'priority'  => 6,
            'input_attrs' => array(
                'min' => 0,
                'max' => 500,
                'step' => 1,
            ),
        )

    )
); 

// Read More Text
$wp_customize->add_setting (
    'blog_archive_readmore_text',
    array(
        'default' => themesflat_customize_default('blog_archive_readmore_text'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'blog_archive_readmore_text',
    array(
        'type'      => 'text',
        'label'     => esc_html__('Read More Text', 'zeng'),
        'section'   => 'section_content_blog_archive',
        'priority'  => 7
    )
);


$wp_customize->add_setting(
    'blog_single_style',
    array(
        'default'           => themesflat_customize_default('blog_single_style'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'blog_single_style',
    array (
        'type'      => 'select',           
        'section'   => 'section_content_blog_archive',
        'priority'  => 8,
        'label'         => esc_html__('Blog Single Popup', 'zeng'),
        'default'           => 'sidebar-right',
        'choices'   => array (
            'default'            => esc_html__( 'Disable', 'zeng' ),
            'popup'           => esc_html__( 'Popup', 'zeng' ),
        ),
    )
);

$wp_customize->add_setting(
    'sidebar_layout',
    array(
        'default'           => themesflat_customize_default('sidebar_layout'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'sidebar_layout',
    array (
        'type'      => 'select',           
        'section'   => 'section_content_blog_archive',
        'priority'  => 9,
        'label'         => esc_html__('Sidebar Position', 'zeng'),
        'default'           => 'sidebar-right',
        'choices'   => array (
            'fullwidth'         =>   esc_html__( 'Full Width','zeng' ),
            'sidebar-right'     => esc_html__( 'Sidebar Right','zeng' ),
            'sidebar-left'      =>  esc_html__( 'Sidebar Left','zeng' ),
        ),
    )
);