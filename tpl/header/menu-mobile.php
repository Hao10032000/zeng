    <?php 
        $header_button_text = themesflat_get_opt('header_button_text');
        $header_button_url = themesflat_get_opt('header_button_url');   
        
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
    <!-- mobile-nav -->
    <div class="offcanvas offcanvas-start mobile-nav-wrap " tabindex="-1" id="menu-mobile"
        aria-labelledby="menu-mobile">
        <div class="offcanvas-header top-nav-mobile">
            <div class="offcanvas-title">
                        <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo">
                            <img src="<?php echo esc_url($logo_site_dark); ?>" alt="logo" class="main-logo" width="193" height="44"
                                data-light="<?php echo esc_url($logo_site_dark); ?>" data-dark="<?php echo esc_url($logo_site_light); ?>">
                        </a>
            </div>
            <div data-bs-dismiss="offcanvas" class="btn-close-menu">
                <i class="icon-X"></i>
            </div>
        </div>
        <div class="offcanvas-body inner-mobile-nav">
            <div class="mb-body">
                
                <?php get_template_part( 'tpl/header/navigator'); ?>
                

                <div class="support">
                    <a href="<?php echo esc_url(themesflat_get_opt('header_button_url')) ?>" class="tf-btn style-2 animate-hover-btn">
                        <span><?php echo wp_kses($header_button_text, themesflat_kses_allowed_html()); ?></span>
                    </a>
                    <ul class="mb-info">
                        <?php echo wp_kses(themesflat_get_opt('mobile_information'), themesflat_kses_allowed_html()); ?>
                        <li>
                            <div class="wrap-social">
                                <p> <?php esc_html_e('Follow us:', 'zeng'); ?> </p>
                                <?php  
                                    themesflat_render_social();    
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- /mobile-nav -->