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
