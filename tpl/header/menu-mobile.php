<?php
if ( has_nav_menu( 'primary' ) ) {
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'nav-menu style-3',
        'walker'         => new Custom_Nav_Menu_Walker(),
        'depth'          => 1,
    ) );
} else {
    wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false ) );
}
?>