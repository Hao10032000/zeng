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
    'subtitle_action_box',
    array(
        'default'           => themesflat_customize_default('subtitle_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'subtitle_action_box',
    array(
       'label'          => esc_html__( 'Sub Title', 'zeng' ),
       'type'           => 'text',
       'section'        => 'section_action_box',
       'priority'       => 2,
    )
);

// title before
$wp_customize->add_setting(
    'title_before_action_box',
    array(
        'default'           => themesflat_customize_default('title_before_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'title_before_action_box',
    array(
       'label'          => esc_html__( 'Title Before', 'zeng' ),
       'type'           => 'text',
       'section'        => 'section_action_box',
       'priority'       => 3,
    )
);
// title repeater 1
$wp_customize->add_setting(
    'title_repeater1_action_box',
    array(
        'default'           => themesflat_customize_default('title_repeater1_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'title_repeater1_action_box',
    array(
       'label'          => esc_html__( 'Title Repeater1', 'zeng' ),
       'type'           => 'text',
       'section'        => 'section_action_box',
       'priority'       => 4,
    )
);
// title repeater 2
$wp_customize->add_setting(
    'title_repeater2_action_box',
    array(
        'default'           => themesflat_customize_default('title_repeater2_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'title_repeater2_action_box',
    array(
       'label'          => esc_html__( 'Title Repeater2', 'zeng' ),
       'type'           => 'text',
       'section'        => 'section_action_box',
       'priority'       => 5,
    )
);
// title after
$wp_customize->add_setting(
    'title_after_action_box',
    array(
        'default'           => themesflat_customize_default('title_after_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'title_after_action_box',
    array(
       'label'          => esc_html__( 'Title Before', 'zeng' ),
       'type'           => 'text',
       'section'        => 'section_action_box',
       'priority'       => 6,
    )
);
// title 
$wp_customize->add_setting(
    'title_action_box',
    array(
        'default'           => themesflat_customize_default('title_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'title_action_box',
    array(
       'label'          => esc_html__( 'Title', 'zeng' ),
       'type'           => 'text',
       'section'        => 'section_action_box',
       'priority'       => 7,
    )
);

// mail
$wp_customize->add_setting(
    'mail_action_box',
    array(
        'default'           => themesflat_customize_default('mail_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'mail_action_box',
    array(
       'label'          => esc_html__( 'Mail', 'zeng' ),
       'type'           => 'text',
       'section'        => 'section_action_box',
       'priority'       => 8,
    )
);

// mail
$wp_customize->add_setting(
    'address_action_box',
    array(
        'default'           => themesflat_customize_default('address_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'address_action_box',
    array(
       'label'          => esc_html__( 'Address', 'zeng' ),
       'type'           => 'text',
       'section'        => 'section_action_box',
       'priority'       => 9,
    )
);
// mail
$wp_customize->add_setting(
    'shortcode_action_box',
    array(
        'default'           => themesflat_customize_default('shortcode_action_box'),
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'shortcode_action_box',
    array(
       'label'          => esc_html__( 'Shortcode', 'zeng' ),
       'type'           => 'text',
       'section'        => 'section_action_box',
       'priority'       => 10,
    )
);
