
<?php
if ( has_nav_menu( 'primary' ) ) {
    if ( class_exists( 'Custom_Nav_Menu_Walker' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'nav-menu style-1 lg-hide',
            'walker'         => new Custom_Nav_Menu_Walker(),
        ) );
    } else {
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'nav-menu style-1 lg-hide',
            'fallback_cb'    => 'themesflat_menu_fallback',
        ) );
    }
} else {
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'fallback_cb'    => 'themesflat_menu_fallback',
        'container'      => false,
    ) );
}
?>