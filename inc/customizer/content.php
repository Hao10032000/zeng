<?php 
// ADD SECTION BLOG ARCHIVE
$wp_customize->add_section('section_content_blog_archive',array(
    'title'         => 'Blog',
    'priority'      => 1,
    'panel'         => 'content_panel',
));
require THEMESFLAT_DIR . "inc/customizer/content/blog-archive.php";