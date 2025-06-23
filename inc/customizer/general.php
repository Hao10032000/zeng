<?php 
// Enable Smooth Scroll
$wp_customize->add_setting(
  'enable_smooth_scroll',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('enable_smooth_scroll'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'enable_smooth_scroll',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Smooth Scroll ( OFF | ON )', 'zeng'),
        'section' => 'general_panel',
        'priority' => 1,
    ))
);

//Socials
$wp_customize->add_setting(
    'social_links',
    array(
      'sanitize_callback' => 'esc_attr',
      'default' => themesflat_customize_default('social_links'),     
    )   
  );
  $wp_customize->add_control( new themesflat_SocialIcons($wp_customize,
      'social_links',
      array(
          'type' => 'social-icons',
          'label' => esc_html__('Social Media', 'zeng'),
          'section' => 'general_panel',
          'priority' => 4,
      ))
  );


// Go To Button
$wp_customize->add_setting(
  'go_top',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('go_top'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'go_top',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Go Top Button ( OFF | ON )', 'zeng'),
        'section' => 'general_panel',
        'priority' => 6,
    ))
);

$wp_customize->add_setting('themesflat_options[info]', array(
        'type'              => 'info_control',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',            
    )
);

$wp_customize->add_control( new themesflat_Info( $wp_customize, 'logo_label', array(
    'label' => esc_html__('Logo Site', 'zeng'),
                   'section' => 'general_panel',
    'settings' => 'themesflat_options[info]',
    'priority' => 6
    ) )
);

//Logo
$wp_customize->add_setting(
    'site_logo_dark',
    array(
        'default' => themesflat_customize_default('site_logo_dark'),
        'sanitize_callback' => 'esc_url_raw',
    )
);    
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'site_logo_dark',
        array(
           'label'          => esc_html__( 'Upload Your Logo Dark', 'zeng' ),
           'description'    => esc_html__( 'If you don\'t display logo please remove it your website display 
            Site Title default in General', 'zeng' ),
           'type'           => 'image',
                   'section' => 'general_panel',

           'priority'       => 7,
        )
    )
);

$wp_customize->add_setting(
    'site_logo_light',
    array(
        'default' => themesflat_customize_default('site_logo_light'),
        'sanitize_callback' => 'esc_url_raw',
    )
);    
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'site_logo_light',
        array(
           'label'          => esc_html__( 'Upload Your Logo Light', 'zeng' ),
           'description'    => esc_html__( 'If you don\'t display logo please remove it your website display 
            Site Title default in General', 'zeng' ),
           'type'           => 'image',
                   'section' => 'general_panel',

           'priority'       => 8,
        )
    )
);

// Logo Size    
$wp_customize->add_setting(
    'logo_width',
    array(
        'default'   =>  themesflat_customize_default('logo_width'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_Slide_Control( $wp_customize,
    'logo_width',
        array(
            'type'      =>  'slide-control',
                   'section' => 'general_panel',
            'label'     =>  'Logo Size Width(px)',
            'priority'  => 9,
            'input_attrs' => array(
                'min' => 0,
                'max' => 500,
                'step' => 1,
            ),
        )

    )
);

$wp_customize->add_setting('themesflat_options[info]', array(
        'type'              => 'info_control',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',            
    )
);
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'freelancer_label', array(
    'label' => esc_html__('Freelancer Popup', 'zeng'),
                   'section' => 'general_panel',
    'settings' => 'themesflat_options[info]',
    'priority' => 9
    ) )
);

// freelancer

$wp_customize->add_setting(
  'enable_freelancer',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('enable_freelancer'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'enable_freelancer',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Freelancer Popup ( OFF | ON )', 'zeng'),
        'section' => 'general_panel',
        'priority' => 10,
    ))
);

$wp_customize->add_setting(
    'heading_freelancer',
    array(
        'default' => themesflat_customize_default('heading_freelancer'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'heading_freelancer',
    array(
        'label' => esc_html__( 'Heading', 'zeng' ),
        'section' => 'general_panel',
        'type' => 'text',
        'priority' => 11
    )
);

$wp_customize->add_setting(
    'heading_freelancer_subheading',
    array(
        'default' => themesflat_customize_default('heading_freelancer_subheading'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'heading_freelancer_subheading',
    array(
        'label' => esc_html__( 'Description', 'zeng' ),
        'section' => 'general_panel',
        'type' => 'text',
        'priority' => 12
    )
);

// Button Text
$wp_customize->add_setting(
    'freelancer_button_text',
    array(
        'default' => themesflat_customize_default('freelancer_button_text'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'freelancer_button_text',
    array(
        'label' => esc_html__( 'Text', 'zeng' ),
                'section' => 'general_panel',

        'type' => 'text',
        'priority' => 13
    )
);
// Button Url
$wp_customize->add_setting(
    'freelancer_button_url',
    array(
        'default' => themesflat_customize_default('freelancer_button_url'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'freelancer_button_url',
    array(
        'label' => esc_html__( 'Url', 'zeng' ),
                'section' => 'general_panel',

        'type' => 'text',
        'priority' => 14
    )
);