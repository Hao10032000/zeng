    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'fallback_cb'    => 'themesflat_menu_fallback', 
        'container'      => false,
        'menu_class'     => 'navigation nav-menu style-1 list-icon', 
        'walker'         => new Custom_Icon_Menu_Walker(), 
    ) );
    ?>