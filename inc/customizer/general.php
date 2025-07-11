<?php 

//Header Style
$wp_customize->add_setting(
    'style_background',
    array(
        'default'           => themesflat_customize_default('style_background'),
        'sanitize_callback' => 'esc_attr',
    )
);

$wp_customize->add_control( 
    'style_background',
    array (
        'type'      => 'select',           
        'section' => 'general_panel',
        'priority'  => 1,
        'label'         => esc_html__('Style Background Page', 'zeng'),
        'default'           => 'page-background',
        'choices'   => array (
            'page-background'     => esc_html__( 'Page Background Image','zeng' ),
            'video'      =>  esc_html__( 'Page Background Video','zeng' ),
        ),
    )
);

//Header Style
$wp_customize->add_setting(
    'video_background',
    array(
        'default'           => themesflat_customize_default('video_background'),
        'sanitize_callback' => 'esc_attr',
    )
);

$wp_customize->add_control( new themesflat_RadioImages($wp_customize,
    'video_background',
    array (
        'type'      => 'radio-images',           
        'section' => 'general_panel',
        'priority'  => 1,
        'label'         => esc_html__('Select Video', 'zeng'),
        'choices'   => array (
            'video-1' => array (
                'tooltip'   => esc_html__( 'Video 1','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-1.jpg'
            ),
            'video-2' => array (
                'tooltip'   => esc_html__( 'Video 2','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-2.jpg'
            ),
            'video-3' => array (
                'tooltip'   => esc_html__( 'Video 3','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-10.jpg'
            ),
            'video-4' => array (
                'tooltip'   => esc_html__( 'Video 4','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-6.jpg'
            ),
            'video-5' => array (
                'tooltip'   => esc_html__( 'Video 5','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-9.jpg'
            ),
            'video-6' => array (
                'tooltip'   => esc_html__( 'Video 6','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-8.jpg'
            ),
            'video-7' => array (
                'tooltip'   => esc_html__( 'Video 7','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-3.jpg'
            ),
            'video-8' => array (
                'tooltip'   => esc_html__( 'Video 8','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-11.jpg'
            ),
            'video-9' => array (
                'tooltip'   => esc_html__( 'Video 9','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-5.jpg'
            ),
            'video-10' => array (
                'tooltip'   => esc_html__( 'Video 10','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-4.jpg'
            ),
            'video-11' => array (
                'tooltip'   => esc_html__( 'Video 11','zeng' ),
                'src'       => THEMESFLAT_LINK . 'images/features/feature-bg-7.jpg'
            ),
        ),
    ))
); 