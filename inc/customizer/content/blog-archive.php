<?php 

    // Number Posts
    $wp_customize->add_setting (
        'blog_grid_number_post',
        array(
            'default' => themesflat_customize_default('blog_grid_number_post'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'blog_grid_number_post',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Show Number Posts', 'zeng'),
        'section'   => 'section_content_blog_archive',
            'priority'  => 1
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
        'priority'  => 1,
        'label'         => esc_html__('Sidebar Position', 'zeng'),
        'default'           => 'sidebar-right',
        'choices'   => array (
            'sidebar-right'     => esc_html__( 'Sidebar Right','zeng' ),
            'sidebar-left'      =>  esc_html__( 'Sidebar Left','zeng' ),
        ),
    )
);

$wp_customize->add_setting(
    'blog_style_layout',
    array(
        'default'           => themesflat_customize_default('blog_style_layout'),
        'sanitize_callback' => 'esc_attr',
    )
);

$wp_customize->add_control( 
    'blog_style_layout',
    array (
        'type'      => 'select',           
        'section'   => 'section_content_blog_archive',
        'priority'  => 4,
        'label'         => esc_html__('Style Posts', 'zeng'),
        'default'           => 'style-list',
        'choices'   => array (
            'style-grid'     => esc_html__( 'Style Grid','zeng' ),
            'style-list'      =>  esc_html__( 'Style List','zeng' ),
        ),
    )
);

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

// Meta Elements
$wp_customize->add_setting (
    'meta_elements',
    array (
        'sanitize_callback' => 'themesflat_sanitize_text',
        'default' => themesflat_customize_default('meta_elements'),     
    )
);
$wp_customize->add_control( new themesflat_Control_Drag_And_Drop( $wp_customize,
    'meta_elements',
    array(
        'type'      => 'draganddrop-controls',
        'label'     => esc_html__('Meta Elements', 'zeng'),
        'description' => esc_html__( 'Drag and drop elements to re-order.', 'zeng' ),
        'section'   => 'section_content_blog_archive',
        'priority'  => 8,
        'choices' => array(
            'author'    => esc_html__( 'Author', 'zeng' ),
            'date'      => esc_html__( 'Date', 'zeng' ), 
            'category'      => esc_html__( 'Category', 'zeng' ), 
            'read'      => esc_html__( 'Reading Time', 'zeng' ), 
        ),        
    ))
); 

// Pagination
$wp_customize->add_setting(
    'blog_archive_pagination_style',
    array(
        'default'           => themesflat_customize_default('blog_archive_pagination_style'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'blog_archive_pagination_style',
    array(
        'type'      => 'select',           
        'section'   => 'section_content_blog_archive',
        'priority'  => 9,
        'label'         => esc_html__('Pagination Style', 'zeng'),
        'choices'   => array(
            'numeric'         =>  esc_html__('Numeric','zeng'),
            'pager-numeric'         =>  esc_html__('Page & Numeric','zeng'),
        ),
    )
);