<?php 
$wp_customize->add_setting(
    'primary_color',
    array(
        'default'           => themesflat_customize_default('primary_color'),
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_color',
        array(
            'label'         => esc_html__('Primary Color', 'zeng'),
            'section'       => 'color_general',
            'settings'      => 'primary_color',
            'priority'      => 1
        )
    )
);

$wp_customize->add_setting(
    'body_text_color',
    array(
        'default'           => themesflat_customize_default('body_text_color'),
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'body_text_color',
        array(
            'label'         => esc_html__('Body Text Color', 'zeng'),
            'section'       => 'color_general',
            'settings'      => 'body_text_color',
            'priority'      => 2
        )
    )
);

$wp_customize->add_setting(
    'border_color',
    array(
        'default'           => themesflat_customize_default('border_color'),
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'border_color',
        array(
            'label'         => esc_html__('Body Border Line Color', 'zeng'),
            'section'       => 'color_general',
            'settings'      => 'border_color',
            'priority'      => 3
        )
    )
);

$wp_customize->add_setting(
    'header1_background',
    array(
        'default'           => themesflat_customize_default('header1_background'),
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'header1_background',
        array(
            'label'         => esc_html__('Header 01 Background', 'zeng'),
            'section'       => 'color_general',
            'settings'      => 'header1_background',
            'priority'      => 4
        )
    )
);


$wp_customize->add_setting(
    'header2_background',
    array(
        'default'           => themesflat_customize_default('header2_background'),
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'header2_background',
        array(
            'label'         => esc_html__('Header 02 Background', 'zeng'),
            'section'       => 'color_general',
            'settings'      => 'header2_background',
            'priority'      => 5
        )
    )
);