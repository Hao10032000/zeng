<?php 
$wp_customize->add_setting(
    'style_blog_single',
    array(
        'default'           => themesflat_customize_default('style_blog_single'),
        'sanitize_callback' => 'esc_attr',
    )
);

$wp_customize->add_control( 
    'style_blog_single',
    array (
        'type'      => 'select',           
        'section'   => 'section_content_blog_single',
        'priority'  => 1,
        'label'         => esc_html__('Blog Single Style', 'zeng'),
        'choices'   => array (
            'content-single'     => esc_html__( 'Style 1','zeng' ),
            'content-single2'      =>  esc_html__( 'Style 2','zeng' ),
        ),
    )
);

// Show Post Navigator
$wp_customize->add_setting (
    'show_post_navigator',
    array (
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('show_post_navigator'),     
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'show_post_navigator',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__('Show Post Navigator ( OFF | ON )', 'zeng'),
        'section'   => 'section_content_blog_single',
        'priority'  => 2
    ))
);

// Social Share
$wp_customize->add_setting(
    'show_social_share',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('show_social_share'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'show_social_share',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Show Social Share Blog  ( OFF | ON )', 'zeng'),
          'section'   => 'section_content_blog_single',
          'priority' => 3,
      ))
  );

  // Show AuthorBox
$wp_customize->add_setting (
    'show_author_box',
    array (
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'show_author_box',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__('Show Author Post ( OFF | ON )', 'zeng'),
        'section'   => 'section_content_blog_single',
        'priority'  => 4
    ))
);

// Enable Entry Footer Content
$wp_customize->add_setting(
  'show_entry_footer_content',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('show_entry_footer_content'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'show_entry_footer_content',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Blog Tags ( OFF | ON )', 'zeng'),
        'section' => 'section_content_blog_single',
        'priority' => 4,
    ))
);

// Show Related Posts
$wp_customize->add_setting (
    'show_related_post',
    array (
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => 0,     
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'show_related_post',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__('Related Posts ( OFF | ON )', 'zeng'),
        'section'   => 'section_content_blog_single',
        'priority'  => 5
    ))
);

$wp_customize->add_setting(
    'heading_related',
    array(
        'default' => themesflat_customize_default('heading_related'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'heading_related',
    array(
        'label' => esc_html__( 'Heading', 'zeng' ),
        'section'   => 'section_content_blog_single',
        'type' => 'text',
        'priority' => 6
    )
);

// Gird columns Related Posts
$wp_customize->add_setting(
    'grid_columns_post_related',
    array(
        'default'           => themesflat_customize_default('grid_columns_post_related'),
        'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
    )
);
$wp_customize->add_control(
    'grid_columns_post_related',
    array(
        'type'      => 'select',           
        'section'   => 'section_content_blog_single',
        'priority'  => 7,
        'label'     => esc_html__('Columns Of Related Posts Desktop', 'zeng'),
        'choices'   => array(                
            2     => esc_html__( '2 Columns', 'zeng' ),
            3     => esc_html__( '3 Columns', 'zeng' ),
            4     => esc_html__( '4 Columns', 'zeng' ),                
            5     => esc_html__( '5 Columns', 'zeng' ),                
        )
    )
);

// Gird columns Related Posts
$wp_customize->add_setting(
    'grid_columns_post_related_tablet',
    array(
        'default'           => themesflat_customize_default('grid_columns_post_related_tablet'),
        'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
    )
);
$wp_customize->add_control(
    'grid_columns_post_related_tablet',
    array(
        'type'      => 'select',           
        'section'   => 'section_content_blog_single',
        'priority'  => 7,
        'label'     => esc_html__('Columns Of Related Posts Tablet', 'zeng'),
        'choices'   => array(                
            2     => esc_html__( '2 Columns', 'zeng' ),
            3     => esc_html__( '3 Columns', 'zeng' ),
            4     => esc_html__( '4 Columns', 'zeng' ),                
        )
    )
);

// Gird columns Related Posts
$wp_customize->add_setting(
    'grid_columns_post_related_mobile',
    array(
        'default'           => themesflat_customize_default('grid_columns_post_related_mobile'),
        'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
    )
);
$wp_customize->add_control(
    'grid_columns_post_related_mobile',
    array(
        'type'      => 'select',           
        'section'   => 'section_content_blog_single',
        'priority'  => 7,
        'label'     => esc_html__('Columns Of Related Posts Mobile', 'zeng'),
        'choices'   => array(                
            1     => esc_html__( '1 Columns', 'zeng' ),
            2     => esc_html__( '2 Columns', 'zeng' ),
            3     => esc_html__( '3 Columns', 'zeng' ),
        )
    )
);


// Gird columns Related Posts
$wp_customize->add_setting(
    'grid_columns_post_related_mobile_small',
    array(
        'default'           => themesflat_customize_default('grid_columns_post_related_mobile_small'),
        'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
    )
);
$wp_customize->add_control(
    'grid_columns_post_related_mobile_small',
    array(
        'type'      => 'select',           
        'section'   => 'section_content_blog_single',
        'priority'  => 7,
        'label'     => esc_html__('Columns Of Related Posts Mobile Small', 'zeng'),
        'choices'   => array(                
            1     => esc_html__( '1 Columns', 'zeng' ),
            2     => esc_html__( '2 Columns', 'zeng' ),
            3     => esc_html__( '3 Columns', 'zeng' ),
        )
    )
);

// Number Of Related Posts
$wp_customize->add_setting (
    'number_related_post',
    array(
        'default' => themesflat_customize_default('number_related_post'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'number_related_post',
    array(
        'type'      => 'text',
        'label'     => esc_html__('Number Of Related Posts', 'zeng'),
        'section'   => 'section_content_blog_single',
        'priority'  => 8
    )
);