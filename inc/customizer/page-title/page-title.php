<?php 
// Page title heading
$wp_customize->add_setting(
  'page_title_heading_enabled',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('page_title_heading_enabled'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'page_title_heading_enabled',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Heading ( OFF | ON )', 'zeng'),
        'section' => 'section_page_title',
        'priority' => 1,
    ))
);

$wp_customize->add_setting(
  'page_title_heading_count',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('page_title_heading_count'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'page_title_heading_count',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Count Number ( OFF | ON )', 'zeng'),
        'section' => 'section_page_title',
        'priority' => 2,
    ))
);

$wp_customize->add_setting(
  'page_title_description',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('page_title_description'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'page_title_description',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Description Category ( OFF | ON )', 'zeng'),
        'section' => 'section_page_title',
        'priority' => 3,
    ))
);

$wp_customize->add_setting(
    'page_title_alignment',
    array(
        'default'           => themesflat_customize_default('page_title_alignment'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'page_title_alignment',
    array (
        'type'      => 'select',           
        'section'   => 'section_page_title',
        'priority'  => 4,
        'label'         => esc_html__('Page Title Alignment', 'zeng'),
        'choices'   => array (
            'left' =>  esc_html__( 'Left','zeng' ),
            'center' =>  esc_html__( 'Center','zeng' ),
            'right' =>  esc_html__( 'Right','zeng' )
            ) ,
    )
); 


$wp_customize->add_setting(
    'show_category_list',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('show_category_list'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'show_category_list',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Show Category List ( OFF | ON )', 'zeng'),
        'section'   => 'section_page_title',
          'priority' => 5,
      ))
);

$wp_customize->add_setting (
    'style_category_list',
    array (
        'sanitize_callback' => 'themesflat_sanitize_text',
        'default' => themesflat_customize_default('style_category_list'),     
    )
);

$wp_customize->add_control( 
    'style_category_list',
    array (
        'type'      => 'select',           
        'section'   => 'section_page_title',
        'priority'  => 6,
        'label'         => esc_html__('Style Category List', 'zeng'),
        'choices' => array(
            'style1'    => esc_html__( 'Style 1', 'zeng' ),
            'style2'      => esc_html__( 'Style 2', 'zeng' ), 
        ),  
    )
); 

// Box control
$wp_customize->add_setting(
    'page_title_controls',
    array(
        'default' => themesflat_customize_default('page_title_controls'),
        'sanitize_callback' => 'themesflat_sanitize_text',
    )
);
$wp_customize->add_control( new themesflat_BoxControls($wp_customize,
    'page_title_controls',
    array(
        'label' => esc_html__( 'Page Title Controls (px)', 'zeng' ),
        'section' => 'section_page_title',
        'type' => 'box-controls',
        'priority' => 7
    ))
);  