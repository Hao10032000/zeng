<?php
/**
 * Demo Import Data
 */
function themesflat_import_files() {
    return array(
        array(
            'import_file_name'           => 'Import Demo Data',
            'import_file_url'            => esc_url(THEMESFLAT_LINK.'/demo/content.xml'),
            'import_widget_file_url'     => esc_url(THEMESFLAT_LINK.'/demo/widgets.wie'),
            'import_customizer_file_url' => esc_url(THEMESFLAT_LINK.'/demo/options.dat'),
            'import_preview_image_url'   => esc_url(THEMESFLAT_LINK.'screenshot.png'),
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the MailChimp form.', 'zeng' ),
            'preview_url'                => esc_url('https://zeng.vithemes.com/'),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'themesflat_import_files' );

function themesflat_before_content_import() { 
    $posts = get_posts(array( 'post_type' => 'post','numberposts' => -1));
    foreach ( $posts as $posts ) {
        wp_delete_post( $posts->ID, true);
    }   

    global $wp_registered_sidebars;
    $widgets = get_option('sidebars_widgets');
    foreach ($wp_registered_sidebars as $sidebar => $value) {
        unset($widgets[$sidebar]);
    }
    update_option('sidebars_widgets',$widgets);
}
add_action( 'pt-ocdi/before_content_import', 'themesflat_before_content_import' );

function themesflat_after_import_setup() {
    // Removes Elementor Global Defaults for Fonts, Colors, and Typography
    update_option( "elementor_disable_color_schemes", "yes" );
    update_option( "elementor_disable_typography_schemes", "yes" );
    $default_colors = array();
    $default_colors[1] = "#151515";
    $default_colors[2] = "#FDDB05";
    $default_colors[3] = "#7A7A7A";
    $default_colors[4] = "#EB6D2F";
    update_option( "elementor_scheme_color", $default_colors );
    update_option( "elementor_container_width", "1200" );
    update_option( "elementor_space_between_widgets", "0" );

    $main_menu = get_term_by( 'name', 'main-menu', 'nav_menu' );
    $bottom_menu = get_term_by( 'name', 'bottom-menu', 'nav_menu' );
    $footer_menu_1 = get_term_by( 'name', 'footer-menu-1', 'nav_menu' );
    $footer_menu_2 = get_term_by( 'name', 'footer-menu-2', 'nav_menu' );
    $footer_menu_3 = get_term_by( 'name', 'footer-menu-3', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'footer-1' => $footer_menu_1->term_id,
            'footer-2' => $footer_menu_2->term_id,
            'footer-3' => $footer_menu_3->term_id,
            'bottom' => $bottom_menu->term_id
        )
    );

    $front_page_id = get_page_by_title( 'Home 01' );
    $blog_page_id  = get_page_by_title( 'Blog' );
    
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'posts_per_page', 4 );
    
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules(); 
}
add_action( 'pt-ocdi/after_import', 'themesflat_after_import_setup' );
