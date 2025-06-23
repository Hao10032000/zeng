<?php 
$header_search_box = themesflat_get_opt('header_search_box');
if (themesflat_get_opt_elementor('header_search_box') != '') {
    $header_search_box = themesflat_get_opt_elementor('header_search_box');
}

$header_dark_light = themesflat_get_opt('header_dark_light');
if (themesflat_get_opt_elementor('header_dark_light') != '') {
    $header_dark_light = themesflat_get_opt_elementor('header_dark_light');
}
$header_button_show = themesflat_get_opt('header_button');
if (themesflat_get_opt_elementor('header_button') != '') {
    $header_button_show = themesflat_get_opt_elementor('header_button');
}
$header_button_text = themesflat_get_opt('header_button_text');
$header_button_url = themesflat_get_opt('header_button_url');

$header_social = themesflat_get_opt('social_header');
if (themesflat_get_opt_elementor('social_header') != '') {
    $header_social = themesflat_get_opt_elementor('social_header');
}

$logo_site_dark = themesflat_get_opt('site_logo_dark');
if (!empty(themesflat_get_opt_elementor('site_logo_dark'))) {
    if (themesflat_get_opt_elementor('site_logo_dark')['url'] != '') {
        $logo_site_dark = themesflat_get_opt_elementor('site_logo_dark')['url'];
    }else {
        $logo_site_dark = themesflat_get_opt('site_logo_dark');
    }    
}

$logo_site_light = themesflat_get_opt('site_logo_light');
if (!empty(themesflat_get_opt_elementor('site_logo_light'))) {
    if (themesflat_get_opt_elementor('site_logo_light')['url'] != '') {
        $logo_site_light = themesflat_get_opt_elementor('site_logo_light')['url'];
    }else {
        $logo_site_light = themesflat_get_opt('site_logo_light');
    }    
}

?>


        <!-- header -->
        <header class="bg-header">
            <!-- topbar -->
            <div class="topbar">
                <div class="tf-container">
                    <div class="topbar-inner d-flex justify-content-between align-items-center">
                        <?php if ($header_social == 1): ?>
                            <?php  
                                themesflat_render_social();    
                            ?>
                        <?php endif; ?>
                        
                        <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo">
                            <img src="<?php echo esc_url($logo_site_dark); ?>" alt="logo" class="main-logo" width="193" height="44"
                                data-light="<?php echo esc_url($logo_site_dark); ?>" data-dark="<?php echo esc_url($logo_site_light); ?>">
                        </a>
                        <div class="wrap d-flex justify-content-end">
                            <?php if ($header_dark_light == 1): ?>
                                <div class="mode-check">
                                    <span class="label light sm-hide"><?php echo esc_html_e('Light', 'zeng') ?></span>
                                    <div class="toggle toggle-switch-mode">
                                        <div class="toggle-button"></div>
                                    </div>
                                    <span class="label dark"><?php echo esc_html_e('Dark', 'zeng') ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ($header_button_show == 1): ?>
                                <a href="<?php echo esc_url(themesflat_get_opt('header_button_url')); ?>" class="tf-btn style-2 btn-switch-text animate-hover-btn md-hide">
                                    <span>
                                        <span class="btn-double-text" data-text="<?php echo esc_attr($header_button_text); ?>"><?php echo wp_kses($header_button_text, themesflat_kses_allowed_html()); ?></span>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End topbar -->

	        <?php if (themesflat_get_opt('header_sticky') == 1):?>

            <!-- header-menu -->
            <div class="header-menu style-default header-fixed">
                <div class="tf-container">
                    <div class="header-inner d-flex justify-content-between align-items-center">
                        <div class="mobile-button d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#menu-mobile"
                            aria-controls="menu-mobile">
                            <div class="burger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="desk-navigation">
                            <?php get_template_part( 'tpl/header/navigator'); ?>
                        </div>
                        
                        <?php if ($header_search_box == 1): ?>
                            <a class="btn-find link-no-action" href="#canvasSearch" data-bs-toggle="offcanvas" aria-label="Search">
                                <i class="icon-search"></i>
                            </a>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <!-- End header-menu -->

            <?php endif; ?>

            <!-- header-menu -->
            <div class="header-menu style-default">
                <div class="tf-container">
                    <div class="header-inner d-flex justify-content-between align-items-center">
                        <div class="mobile-button d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#menu-mobile"
                            aria-controls="menu-mobile">
                            <div class="burger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>


                        <div class="desk-navigation">
                            <?php get_template_part( 'tpl/header/navigator'); ?>
                        </div>


                        <?php if ($header_search_box == 1): ?>
                            <a class="btn-find link-no-action" href="#canvasSearch" data-bs-toggle="offcanvas" aria-label="Search">
                                <i class="icon-search"></i>
                            </a>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <!-- End header-menu -->

        </header>
        <!-- End header -->
         

        