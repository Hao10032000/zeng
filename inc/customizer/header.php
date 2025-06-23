<?php 
// ADD SECTION NAVIGATION
$wp_customize->add_section('section_navigation',array(
    'title'         => 'Navigation',
    'priority'      => 3,
    'panel'         => 'header_panel',
)); 
require THEMESFLAT_DIR . "inc/customizer/header/navigation.php";

// ADD SECTION HEADER OPTION
$wp_customize->add_section('section_options',array(
    'title'         => 'Header Options',
    'priority'      => 4,
    'panel'         => 'header_panel',
)); 
require THEMESFLAT_DIR . "inc/customizer/header/header-options.php";