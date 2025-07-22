<?php 

  // General
$wp_customize->add_control( new themesflat_Info( $wp_customize, 'footer_label_general', array(
    'label'    => esc_html__( 'Footer General', 'zeng' ),
    'section'   => 'section_footer',
    'settings' => 'themesflat_options[info]',
    'priority' => 1,
) )
);

// Footer Copyright
$wp_customize->add_setting(
    'footer_copyright',
    array(
        'default' => themesflat_customize_default('footer_copyright'),
        'sanitize_callback' => 'themesflat_sanitize_text',
    )
);
$wp_customize->add_control(
    'footer_copyright',
    array(
        'label' => esc_html__( 'Copyright', 'zeng' ),
        'section'   => 'section_footer',
        'type' => 'textarea',
        'priority' => 1
    )
);