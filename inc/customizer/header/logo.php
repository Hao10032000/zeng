<?php 
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
           'section'        => 'section_logo',
           'priority'       => 1,
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
           'section'        => 'section_logo',
           'priority'       => 1,
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
            'section'   =>  'section_logo',
            'label'     =>  'Logo Size Width(px)',
            'priority'  => 3,
            'input_attrs' => array(
                'min' => 0,
                'max' => 500,
                'step' => 1,
            ),
        )

    )
);