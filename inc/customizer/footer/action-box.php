<?php 
// Partner
$wp_customize->add_setting(
    'show_action_box',
    array(
        'default'   => themesflat_customize_default('show_action_box'),
        'sanitize_callback'  => 'themesflat_sanitize_checkbox',
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'show_action_box',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Action Box ( OFF | ON )', 'zeng'),
            'section'   => 'section_action_box',
            'priority'  => 1
        )
    )
);    



// Subtitle
$wp_customize->add_setting(
    'template_action_box',
    array(
        'default'           => themesflat_customize_default('template_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'template_action_box',
    array(
       'label'          => esc_html__( 'Template ID Section Contact', 'zeng' ),
       'type'           => 'number',
       'section'        => 'section_action_box',
       'priority'       => 2,
    )
);

