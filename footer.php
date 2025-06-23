<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package zeng
 */
$style_footer = themesflat_get_opt('style_footer');
if (themesflat_get_opt_elementor('style_footer') != '') {
    $style_footer = themesflat_get_opt_elementor('style_footer');
}
?>        
        </div><!-- #content -->
    </div><!-- #main-content -->


    <!-- Footer -->
        <div class="tf-container tf-spacing-8 pt-0">
            <footer class="footer <?php echo esc_attr($style_footer == 'style2' ? 'style-1' : ''); ?>">
                <div class="footer-body">
                    <div class="footer-about footer-item">
                        <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo mb_20">
                            <img src="<?php echo esc_url(themesflat_get_opt('site_logo_dark')); ?>" alt="logo" class="main-logo"
                                data-light="<?php echo esc_url(themesflat_get_opt('site_logo_dark')); ?>" data-dark="<?php echo esc_url(themesflat_get_opt('site_logo_light')); ?>">
                        </a>
                        <p class="text-caption-1 mb_28"><?php echo esc_html(themesflat_get_opt('footer_description')); ?></p>
                        <?php if (themesflat_get_opt('footer_social') == 1): ?>
                            <?php  
                                themesflat_render_social();    
                            ?>
                        <?php endif; ?>
                    </div>
                    <div class="footer-content footer-item">
                        <div class="footer-col-block page-link">
                            <h6 class="footer-heading  footer-heading-mobile text_color-1 mb_16">
                                <?php echo esc_html(themesflat_get_opt('footer_heading_menu_1')); ?>
                            </h6>
                            <div class="tf-collapse-content">
                                <?php
                                    wp_nav_menu( array( 'theme_location' => 'footer-1', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false,'menu_class'     => 'footer-menu-list d-grid gap_12', ) );
                                ?>
                            </div>
                        </div>
                        <div class="footer-col-block page-link">
                            <h6 class="footer-heading  footer-heading-mobile text_color-1 mb_16">
                                <?php echo esc_html(themesflat_get_opt('footer_heading_menu_2')); ?>
                            </h6>
                            <div class="tf-collapse-content">
                                <?php
                                    wp_nav_menu( array( 'theme_location' => 'footer-2', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false,'menu_class'     => 'footer-menu-list d-grid gap_12', ) );
                                ?>
                            </div>
                        </div>
                        <?php if ($style_footer == 'style1'): ?>
                        <div class="footer-col-block page-link">
                            <h6 class="footer-heading  footer-heading-mobile text_color-1 mb_16">
                                <?php echo esc_html(themesflat_get_opt('footer_heading_menu_3')); ?>
                            </h6>
                            <div class="tf-collapse-content">
                                <?php
                                    wp_nav_menu( array( 'theme_location' => 'footer-3', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false,'menu_class'     => 'footer-menu-list d-grid gap_12', ) );
                                ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="footer-newsletter footer-item">
                        <?php echo do_shortcode(themesflat_get_opt('footer_form')); ?>
                    </div>
                </div>
                <div class="footer-bottom d-flex align-items-center justify-content-between">
                    <p class="text-caption-1"><?php echo wp_kses(themesflat_get_opt( 'footer_copyright'), themesflat_kses_allowed_html()); ?></p>
                   
                   <?php
                        if (themesflat_get_opt( 'bottom_menu') == 1) {
                            wp_nav_menu( array( 'theme_location' => 'bottom', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false,'menu_class'     => 'list d-flex', ) );
                        }
                    ?>
                </div>
            </footer>
        </div>
        <!-- /Footer -->


</div><!-- /#boxed -->
<?php wp_footer(); ?>
</body>
</html>