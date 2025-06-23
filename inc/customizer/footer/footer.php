<?php 

  // General
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'footer_label_general', array(
    'label'    => esc_html__( 'Footer General', 'zeng' ),
    'section'   => 'section_footer',
    'settings' => 'themesflat_options[info]',
    'priority' => 1,
) )
);

$wp_customize->add_setting(
    'style_footer',
    array(
        'default'           => themesflat_customize_default('style_footer'),
        'sanitize_callback' => 'esc_attr',
    )
);

$wp_customize->add_control( 
    'style_footer',
    array (
        'type'      => 'select',           
        'section'   => 'section_footer',
        'priority'  => 1,
        'label'         => esc_html__('Sidebar Position', 'zeng'),
        'choices' => array(
            'style1'    => esc_html__( 'Default with 3 Menu', 'zeng' ),
            'style2'      => esc_html__( 'Style 2 with 2 Menu', 'zeng' ), 
        ),   
    )
);

// Footer description
$wp_customize->add_setting(
    'footer_description',
    array(
        'default' => themesflat_customize_default('footer_description'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'footer_description',
    array(
        'label' => esc_html__( 'Footer Description', 'zeng' ),
    'section'   => 'section_footer',
        'type' => 'text',
        'priority' => 1
    )
);

  // Social Footer
$wp_customize->add_setting(
    'footer_social',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('footer_social'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'footer_social',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Social ( OFF | ON )', 'zeng'),
    'section'   => 'section_footer',
          'priority' => 2,
      ))
  );

  // Mobile Information
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'footer_label_menu', array(
    'label'    => esc_html__( 'Footer Heading Menu', 'zeng' ),
    'section'   => 'section_footer',
    'settings' => 'themesflat_options[info]',
    'priority' => 3,
) )
);

// Heading Menu
$wp_customize->add_setting(
    'footer_heading_menu_1',
    array(
        'default' => themesflat_customize_default('footer_heading_menu_1'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'footer_heading_menu_1',
    array(
        'label' => esc_html__( 'Heading Menu 1', 'zeng' ),
    'section'   => 'section_footer',
        'type' => 'text',
        'priority' => 4
    )
);

// Heading Menu
$wp_customize->add_setting(
    'footer_heading_menu_2',
    array(
        'default' => themesflat_customize_default('footer_heading_menu_2'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'footer_heading_menu_2',
    array(
        'label' => esc_html__( 'Heading Menu 2', 'zeng' ),
    'section'   => 'section_footer',
        'type' => 'text',
        'priority' => 5
    )
);

// Heading Menu
$wp_customize->add_setting(
    'footer_heading_menu_3',
    array(
        'default' => themesflat_customize_default('footer_heading_menu_3'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'footer_heading_menu_3',
    array(
        'label' => esc_html__( 'Heading Menu 3', 'zeng' ),
    'section'   => 'section_footer',
        'type' => 'text',
        'priority' => 6
    )
);

// Mobile Information
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'footer_mail', array(
    'label'    => esc_html__( 'Footer Form', 'zeng' ),
    'section'   => 'section_footer',
    'settings' => 'themesflat_options[info]',
    'priority' => 7,
) )
);

$wp_customize->add_setting(
    'footer_form',
    array(
        'default' => themesflat_customize_default('footer_form'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'footer_form',
    array(
        'label' => esc_html__( 'Shortcode Form Footer', 'zeng' ),
        'section'   => 'section_footer',
        'type' => 'text',
        'priority' => 8
    )
);