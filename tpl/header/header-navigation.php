    <?php 
$website_info = get_my_website_info();
$header_button_show = themesflat_get_opt('header_button');
if (themesflat_get_opt_elementor('header_button') != '') {
    $header_button_show = themesflat_get_opt_elementor('header_button');
}
$header_button_text = themesflat_get_opt('header_button_text');
$header_button_url = themesflat_get_opt('header_button_url');
    
    ?>
    <!-- Start popup-show-bar -->
    <div class="popup-show-bar">
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
                <?php get_template_part( 'tpl/header/navigator'); ?>
                <div class="d-flex gap_12 align-items-center">
                        <?php if ($header_button_show == 1): ?>
                            <a href="<?php echo esc_url(themesflat_get_opt('header_button_url')); ?>" class="tf-btn style-1 btn-switch-text">
                                <span>
                                    <span class="btn-double-text" data-text="<?php echo wp_kses_post($header_button_text); ?>"><?php echo wp_kses_post($header_button_text); ?></span>
                                </span>
                            </a>
                        <?php endif; ?>   
                </div>
            </div>
        </div>
    </div>
    <!-- End popup-show-bar -->

            <div class="right-bar style-1 d-flex flex-column align-items-center not-for-vertical">
                <ul class="list-icon menu-option d-flex flex-column gap_8">
                    <li><a href="#" class="link-no-action show-sidebar"><i class="icon-CirclesFour"></i></a>
                    </li>
                    <li>
                        <div class="toggle-switch-mode"><i class="icon-Sun"></i></div>
                    </li>
                </ul>
            </div>