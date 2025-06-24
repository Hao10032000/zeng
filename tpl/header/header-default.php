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

$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$avatar        = get_user_meta($user_id, 'custom_avatar', true);
$full_name    = get_user_meta($user_id, 'full_name', true);
$name_default = $current_user->display_name;
$job_title    = get_user_meta($user_id, 'job_title', true);
$address      = get_user_meta($user_id, 'address', true);
$cv_link      = get_user_meta($user_id, 'cv_link', true);
$contact_link = get_user_meta($user_id, 'contact_link', true);

$socials = [
    'linkedin' => 'LinkedIn',
    'github'   => 'GitHub',
    'twitter'  => 'X (Twitter)',
    'dribbble' => 'Dribbble',
    'facebook' => 'Facebook',
    'instagram'=> 'Instagram',
    'tiktok'   => 'TikTok',
    'youtube'  => 'YouTube',
    'behance'  => 'Behance',
    'medium'   => 'Medium',
];

?>


        <header class="header header-fixed style-1">
            <div class="tf-container w-6">
                <div class="header-sidebar style-1">
                    <div class="box">
                        <?php if ($avatar): ?>
                            <div class="avatar">
                                <img src="<?php echo esc_url($avatar); ?>" width="68" height="68" alt="avatar">
                            </div>
                        <?php else: ?>
                            <div class="avatar">
                                <?php echo get_avatar($user_id, 120); ?>
                            </div>
                        <?php endif; ?>
                        <div class="info">
                            <div class="info">
                                <?php if ($full_name): ?>
                                    <h6 class="font-4 mb_4"><?php echo esc_html($full_name); ?></h6>
                                <?php else: ?>
                                    <h6 class="font-4 mb_4"><?php echo esc_html($name_default); ?></h6>
                                <?php endif; ?>     
                                <?php if ($job_title): ?>
                                <div class="text-label text-uppercase fw-6 text_primary-color font-3  letter-spacing-1">
                                    <?php echo esc_html($job_title); ?>
                                </div>
                                <?php endif; ?>     
                            </div>
                        </div>
                    </div>

                    <ul class="nav-menu style-1 lg-hide">
                        <li class="text-menu text_white">
                            <a href="#about"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>About</span>
                                <span class="text" data-splitting>About</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#resume"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Resume</span>
                                <span class="text" data-splitting>Resume</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#services"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Services</span>
                                <span class="text" data-splitting>Services</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#portfolio"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Portfolio</span>
                                <span class="text" data-splitting>Portfolio</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#pricing"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Pricing</span>
                                <span class="text" data-splitting>Pricing</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#contact"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Contact</span>
                                <span class="text" data-splitting>Contact</span>
                            </a>
                        </li>
                    </ul>
                    
                    <div class="d-flex gap_12 align-items-center">
                        <a href="<?php echo esc_url(themesflat_get_opt('header_button_url')); ?>" class="tf-btn style-1 animate-hover-btn">
                            <span>
                                <?php echo wp_kses($header_button_text, themesflat_kses_allowed_html()); ?>
                            </span>
                        </a>
                        <a class="menu-button show-menu-mobile  d-lg-none link-no-action" data-target="#menu-1"
                            href="#"><i class="icon-CirclesFour"></i></a>
                    </div>
                </div>
            </div>
            <div class="popup-menu-mobile" id="menu-1">
                <ul class="nav-menu style-3 ">
                    <li class="text-menu text_white">
                        <a href="#about" class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>About</span>
                            <span class="text" data-splitting>About</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#resume" class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Resume</span>
                            <span class="text" data-splitting>Resume</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#services"
                            class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Services</span>
                            <span class="text" data-splitting>Services</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#portfolio"
                            class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Portfolio</span>
                            <span class="text" data-splitting>Portfolio</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#pricing"
                            class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Pricing</span>
                            <span class="text" data-splitting>Pricing</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#contact"
                            class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Contact</span>
                            <span class="text" data-splitting>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </header>

        <header class="header">
            <div class="tf-container w-6">
                <div class="header-sidebar style-1">
                    <div class="box">
                        <?php if ($avatar): ?>
                            <div class="avatar">
                                <img src="<?php echo esc_url($avatar); ?>" width="68" height="68" alt="avatar">
                            </div>
                        <?php else: ?>
                            <div class="avatar">
                                <?php echo get_avatar($user_id, 120); ?>
                            </div>
                        <?php endif; ?>     
                        <div class="info">
                            <?php if ($full_name): ?>
                                <h6 class="font-4 mb_4"><?php echo esc_html($full_name); ?></h6>
                            <?php else: ?>
                                <h6 class="font-4 mb_4"><?php echo esc_html($name_default); ?></h6>
                            <?php endif; ?>     
                            <?php if ($job_title): ?>
                            <div class="text-label text-uppercase fw-6 text_primary-color font-3  letter-spacing-1">
                                <?php echo esc_html($job_title); ?>
                            </div>
                            <?php endif; ?>     
                        </div>
                    </div>
                    <ul class="nav-menu style-1 lg-hide">
                        <li class="text-menu text_white">
                            <a href="#about"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>About</span>
                                <span class="text" data-splitting>About</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#resume"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Resume</span>
                                <span class="text" data-splitting>Resume</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#services"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Services</span>
                                <span class="text" data-splitting>Services</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#portfolio"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Portfolio</span>
                                <span class="text" data-splitting>Portfolio</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#pricing"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Pricing</span>
                                <span class="text" data-splitting>Pricing</span>
                            </a>
                        </li>
                        <li class="text-menu text_white">
                            <a href="#contact"
                                class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                                <span class="text" data-splitting>Contact</span>
                                <span class="text" data-splitting>Contact</span>
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex gap_12 align-items-center">
                        <a href="#contact" class="tf-btn style-1 animate-hover-btn">
                            <span>
                                Hire Me
                            </span>
                        </a>
                        <a class="menu-button show-menu-mobile  d-lg-none link-no-action" data-target="#menu-2"
                            href="#"><i class="icon-CirclesFour"></i></a>
                    </div>
                </div>
            </div>
            <div class="popup-menu-mobile" id="menu-2">
                <ul class="nav-menu style-3 ">
                    <li class="text-menu text_white">
                        <a href="#about" class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>About</span>
                            <span class="text" data-splitting>About</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#resume" class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Resume</span>
                            <span class="text" data-splitting>Resume</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#services"
                            class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Services</span>
                            <span class="text" data-splitting>Services</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#portfolio"
                            class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Portfolio</span>
                            <span class="text" data-splitting>Portfolio</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#pricing"
                            class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Pricing</span>
                            <span class="text" data-splitting>Pricing</span>
                        </a>
                    </li>
                    <li class="text-menu text_white">
                        <a href="#contact"
                            class="nav_link toggle splitting link link-no-action text-button font-3 fw-6">
                            <span class="text" data-splitting>Contact</span>
                            <span class="text" data-splitting>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </header>

        