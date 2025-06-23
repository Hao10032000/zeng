<?php 
//Header Style
$wp_customize->add_setting(
    'style_header',
    array(
        'default'           => themesflat_customize_default('style_header'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_RadioImages($wp_customize,
    'style_header',
    array (
        'type'      => 'radio-images',           
        'section'   => 'section_options',
        'priority'  => 1,
        'label'         => esc_html__('Header Style', 'zeng'),
        'choices'   => array (
            'header-default' => array (
                'tooltip'   => esc_html__( 'Header Default','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/controls/header-default.jpg'
            ),
            'header-02' => array (
                'tooltip'   => esc_html__( 'Header 02','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/controls/header-02.jpg'
            ),
        ),
    ))
); 

// Enable Header Sticky
$wp_customize->add_setting(
  'header_sticky',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('header_sticky'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'header_sticky',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Header Sticky ( OFF | ON )', 'zeng'),
        'section' => 'section_options',
        'priority' => 3,
    ))
);    

// Show search 
$wp_customize->add_setting(
  'header_search_box',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('header_search_box'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'header_search_box',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Search Box ( OFF | ON )', 'zeng'),
        'section' => 'section_options',
        'priority' => 4,
    ))
);

$wp_customize->add_setting(
    'heading_search',
    array(
        'default' => themesflat_customize_default('heading_search'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'heading_search',
    array(
        'label' => esc_html__( 'Heading Search Form', 'zeng' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 4,
        'active_callback' => function () use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'header_search_box' )->value();
        }, 
    )
);

$wp_customize->add_setting(
    'heading_search_category',
    array(
        'default' => themesflat_customize_default('heading_search_category'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'heading_search_category',
    array(
        'label' => esc_html__( 'Heading Category Search', 'zeng' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 4,
        'active_callback' => function () use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'header_search_box' )->value();
        }, 
    )
);

$wp_customize->add_setting(
    'heading_search_blog',
    array(
        'default' => themesflat_customize_default('heading_search_blog'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'heading_search_blog',
    array(
        'label' => esc_html__( 'Heading Blog Search', 'zeng' ),
        'section' => 'section_options',
        'type' => 'text',
        'priority' => 4,
        'active_callback' => function () use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'header_search_box' )->value();
        }, 
    )
);

  // Social Header
$wp_customize->add_setting(
    'social_header',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('social_header'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'social_header',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Social ( OFF | ON )', 'zeng'),
          'section' => 'section_options',
          'priority' => 7,
      ))
  );

// Social Header
$wp_customize->add_setting(
    'header_dark_light',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('header_dark_light'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'header_dark_light',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Button Dark & Light ( OFF | ON )', 'zeng'),
          'section' => 'section_options',
          'priority' => 8,
      ))
  );


// button
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'header_button_label', array(
    'label'    => esc_html__( 'Button', 'zeng' ),
    'section'  => 'section_options',
    'settings' => 'themesflat_options[info]',
    'priority' => 17,
    'active_callback' => function () use ( $wp_customize ) {
        return 1 === $wp_customize->get_setting( 'header_button' )->value();
    }, 
) )
);

$wp_customize->add_setting(
    'header_button',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('header_button'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'header_button',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Header Button ( OFF | ON )', 'zeng'),
          'section' => 'section_options',
          'priority' => 18,
      ))
  );


// Button Text
$wp_customize->add_setting(
    'header_button_text',
    array(
        'default' => themesflat_customize_default('header_button_text'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_button_text',
    array(
        'label' => esc_html__( 'Text', 'zeng' ),
          'section' => 'section_options',
        'type' => 'text',
        'priority' => 19
    )
);
// Button Url
$wp_customize->add_setting(
    'header_button_url',
    array(
        'default' => themesflat_customize_default('header_button_url'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_button_url',
    array(
        'label' => esc_html__( 'Url', 'zeng' ),
          'section' => 'section_options',
        'type' => 'text',
        'priority' => 20
    )
);

// Mobile Information
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'header_mobile_information', array(
    'label'    => esc_html__( 'Information Mobile Menu', 'zeng' ),
    'section'  => 'section_options',
    'settings' => 'themesflat_options[info]',
    'priority' => 21,
) )
);

$wp_customize->add_setting(
    'mobile_information',
    array(
        'default' => themesflat_customize_default('mobile_information'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'mobile_information',
    array(
        'label' => esc_html__( 'Custom HTML Information', 'zeng' ),
          'section' => 'section_options',
        'type' => 'text',
        'priority' => 22
    )
);