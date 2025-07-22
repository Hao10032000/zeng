<?php 
// ADD SECTION BREADCRUMB
$wp_customize->add_section('section_breadcrumb',array(
    'title'         => 'Breadcrumb',
    'priority'      => 2,
    'panel'         => 'page_title_panel',
));
require THEMESFLAT_DIR . "inc/customizer/page-title/breadcrumb.php";