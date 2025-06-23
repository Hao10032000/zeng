<?php 
// Footer background color    
$wp_customize->add_setting(
    'footer_background_color',
    array(
        'default'           => themesflat_customize_default('footer_background_color'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    new themesflat_ColorOverlay(
        $wp_customize,
        'footer_background_color',
        array(
            'label'         => esc_html__('Backgound Color', 'zeng'),
            'section'       => 'color_footer',
            'settings'      => 'footer_background_color',
            'priority'      => 1
        )
    )
);

$wp_customize->add_setting(
    'footer_image_size',
    array(
        'default'           => themesflat_customize_default('footer_image_size'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'footer_image_size',
    array (
        'type'      => 'select',           
        'section'   => 'color_footer',
        'priority'  => 3,
        'label'         => esc_html__('Footer Image Size', 'zeng'),
        'choices'   => array (
            'auto' =>  esc_html__( 'Original','zeng' ),
            'contain' =>  esc_html__( 'Fit to Screen','zeng' ),
            'cover' =>  esc_html__( 'Fill Screen','zeng' )
            ) ,
    )
);