
<div class="nav-wrap">
    <nav id="mainnav" class="mainnav main-menu lg-hide" role="navigation">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'fallback_cb'    => 'themesflat_menu_fallback',
                'container'      => false,
                'menu_class'     => 'navigation',
            ) );
        ?>
    </nav><!-- #site-navigation -->  
</div><!-- /.nav-wrap -->   