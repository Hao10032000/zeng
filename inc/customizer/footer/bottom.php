<?php 
  
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
        'section' => 'section_bottom',
        'type' => 'textarea',
        'priority' => 1
    )
);

$wp_customize->add_setting(
    'bottom_menu',
      array(
          'sanitize_callback' => 'themesflat_sanitize_checkbox',
          'default' => themesflat_customize_default('bottom_menu'),     
      )   
  );
  $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
      'bottom_menu',
      array(
          'type' => 'checkbox',
          'label' => esc_html__('Menu ( OFF | ON )', 'zeng'),
        'section' => 'section_bottom',
          'priority' => 2,
      ))
  );