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

$website_info = get_my_website_info();
?>


        <header class="header header-fixed style-1">
            <div class="tf-container w-6">
                <div class="header-sidebar style-1">
                    <div class="box">
                        <?php if ($website_info['custom_avatar']): ?>
                            <div class="avatar">
                                <img src="<?php echo esc_url($website_info['custom_avatar']); ?>" width="68" height="68" alt="avatar">
                            </div>
                        <?php else: ?>
                            <div class="avatar">
                                <img src="<?php echo  THEMESFLAT_LINK . '/images/avatar.png'; ?>" alt="avatar">
                            </div>
                        <?php endif; ?>
                        <div class="info">
                            <div class="info">
                                <?php if ($website_info['full_name']): ?>
                                    <h6 class="font-4 mb_4"><?php echo esc_html($website_info['full_name']); ?></h6>
                                <?php else: ?>
                                    <h6 class="font-4 mb_4"><?php echo _e('ZenG', 'zeng'); ?></h6>
                                <?php endif; ?>     
                                <?php if ($website_info['job_title']): ?>
                                <div class="text-label text-uppercase fw-6 text_primary-color font-3  letter-spacing-1">
                                    <?php echo esc_html($website_info['job_title']); ?>
                                </div>
                                <?php endif; ?>     
                            </div>
                        </div>
                    </div>

                    <?php get_template_part( 'tpl/header/navigator'); ?>
                    
                    <div class="d-flex gap_12 align-items-center">
                        <?php if ($header_button_show == 1): ?>
                            <a href="<?php echo esc_url(themesflat_get_opt('header_button_url')); ?>" class="tf-btn style-1 animate-hover-btn">
                                <span>
                                    <?php echo wp_kses_post($header_button_text); ?>
                                </span>
                            </a>
                        <?php endif; ?>   
                        <a class="menu-button show-menu-mobile  d-lg-none link-no-action" data-target="#menu-1"
                            href="#"><i class="icon-CirclesFour"></i></a>
                    </div>
                </div>
            </div>

            <div class="popup-menu-mobile" id="menu-1">
                <?php get_template_part( 'tpl/header/menu-mobile'); ?>
            </div>                       


        </header>

        <header class="header">
            <div class="tf-container w-6">
                <div class="header-sidebar style-1">
                    <div class="box">
                        <?php if ($website_info['custom_avatar']): ?>
                            <div class="avatar">
                                <img src="<?php echo esc_url($website_info['custom_avatar']); ?>" width="68" height="68" alt="avatar">
                            </div>
                        <?php else: ?>
                            <div class="avatar">
                                <img src="<?php echo  THEMESFLAT_LINK . '/images/avatar.png'; ?>" alt="avatar">
                            </div>
                        <?php endif; ?>
                        <div class="info">
                            <div class="info">
                                <?php if ($website_info['full_name']): ?>
                                    <h6 class="font-4 mb_4"><?php echo esc_html($website_info['full_name']); ?></h6>
                                <?php else: ?>
                                    <h6 class="font-4 mb_4"><?php echo _e('ZenG', 'zeng'); ?></h6>
                                <?php endif; ?>     
                                <?php if ($website_info['job_title']): ?>
                                <div class="text-label text-uppercase fw-6 text_primary-color font-3  letter-spacing-1">
                                    <?php echo esc_html($website_info['job_title']); ?>
                                </div>
                                <?php endif; ?>     
                            </div>
                        </div>
                    </div>
                    <?php get_template_part( 'tpl/header/navigator'); ?>
                    <div class="d-flex gap_12 align-items-center">
                        <?php if ($header_button_show == 1): ?>
                            <a href="<?php echo esc_url(themesflat_get_opt('header_button_url')); ?>" class="tf-btn style-1 animate-hover-btn">
                                <span>
                                    <?php echo wp_kses_post($header_button_text); ?>
                                </span>
                            </a>
                        <?php endif; ?>     
                        <a class="menu-button show-menu-mobile  d-lg-none link-no-action" data-target="#menu-2"
                            href="#"><i class="icon-CirclesFour"></i></a>
                    </div>
                </div>
            </div>

            <div class="popup-menu-mobile" id="menu-2">
                <?php get_template_part( 'tpl/header/menu-mobile'); ?>
            </div>


       

            

        </header>

        