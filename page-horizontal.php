<?php
/**
 * Template Name: Page Horizontal
 * @package zeng
 */

$website_info = get_my_website_info();
$header_button_show = themesflat_get_opt('header_button');
if (themesflat_get_opt_elementor('header_button') != '') {
    $header_button_show = themesflat_get_opt_elementor('header_button');
}
$header_button_text = themesflat_get_opt('header_button_text');
$header_button_url = themesflat_get_opt('header_button_url');

?>	

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta
  name="description"
  content="zeng - Therapy & Counseling Psychologist WordPress Theme">
<link rel="profile" href="<?php echo THEMESFLAT_PROTOCOL ?>://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="themesflat-boxed counter-scroll bg_dark">	

    <?php get_template_part( 'tpl/header/header-navigation'); ?>

	<div id="main-content">

        <div class="tf-container">
            <div class="header header-fixed  style-1">
            <div class="tf-container">
                <div class="row">
                    <div class="offset-xxl-4 col-xxl-7 offset-xl-4 col-xl-7">
                        <div class="header-sidebar style-horizontal bs-light-mode">
                            <div class="box ">
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
                    <ul class="nav-menu style-2 list-icon ">
                        <?php get_template_part( 'tpl/header/navigator-with-icon'); ?>
                    </ul>
                            <a class="menu-button show-menu-mobile  d-sm-none link-no-action" data-target="#menu-1"
                                href="#"><i class="icon-CirclesFour"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup-menu-mobile" id="menu-1">
                <?php get_template_part( 'tpl/header/navigator-2'); ?>
            </div>
            </div>
        </div>

        <div class="tf-container w-2">

            <div class="row">

                <div class="offset-xxl-4 col-xxl-7 offset-xl-4 col-xl-7 ">

                    <div class="main-content section-onepage">

                        <div class="header-sidebar style-horizontal bs-light-mode">
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
                                <?php endif; ?>     
                                <?php if ($website_info['job_title']): ?>
                                <div class="text-label text-uppercase fw-6 text_primary-color font-3  letter-spacing-1">
                                    <?php echo esc_html($website_info['job_title']); ?>
                                </div>
                                <?php endif; ?>     
                            </div>
                            </div>
                                    <?php get_template_part( 'tpl/header/navigator-with-icon'); ?>
                            <a class="menu-button show-menu-mobile  d-sm-none link-no-action" data-target="#menu-2"
                                href="#"><i class="icon-CirclesFour"></i></a>
                            <div id="menu-2" class="popup-menu-mobile">
                                <?php get_template_part( 'tpl/header/navigator-2'); ?>
                            </div>
                        </div>


                        <div class="user-bar text-center">

                                            <div class="box-author mb_12">
                    <div class="img-style mb_16">

                        <?php if ($website_info['custom_avatar']): ?>
                            <img decoding="async" loading="lazy" src="<?php echo esc_url($website_info['custom_avatar']); ?>" width="314" height="314"
                                alt="feature post">
                        <?php else: ?>
                                <img src="<?php echo  THEMESFLAT_LINK . '/images/avatar-thumbnail.png'; ?>" alt="avatar">
                        <?php endif; ?>
                    </div>
                    <div class="info">
                        <?php if ($website_info['full_name']): ?>
                            <div class="name font-2 text_white mb_8"><?php echo esc_html($website_info['full_name']); ?></div>
                        <?php else: ?>
                            <div class="name font-2 text_white mb_8"><?php echo _e('ZenG', 'zeng'); ?></div>
                        <?php endif; ?>   

                        <?php if ($website_info['job_title']): ?>
                            <div class="text-label text-uppercase fw-6 text_primary-color font-3 mb_16 letter-spacing-1"><?php echo esc_html($website_info['job_title']); ?></div>
                        <?php else: ?>
                            <div class="text-label text-uppercase fw-6 text_primary-color font-3 mb_16 letter-spacing-1"><?php echo _e('AI Developer', 'zeng'); ?></div>
                        <?php endif; ?>   
                        
                        <?php if ($website_info['email_address']): ?>
                                                    <a href="mailto:<?php echo esc_attr($website_info['email_address']); ?>"
                            class="hover-underline-link text_white text-body-2 mb_4"><?php echo esc_html($website_info['email_address']); ?></a>
                        <?php else: ?>
                            <a href="mailto:sample@gmail.com"
                            class="hover-underline-link text_white text-body-2 mb_4"><?php echo _e('sample@gmail.com', 'zeng'); ?></a>
                        <?php endif; ?> 

                        <?php if ($website_info['address']): ?>
                                <p class="text-caption-2 text_secondary-color font-3"><?php echo esc_html($website_info['address']); ?></p>
                        <?php else: ?>
                            <p class="text-caption-2 text_secondary-color font-3"><?php echo _e('Based in San Francisco, CA', 'zeng'); ?></p>
                        <?php endif; ?>   
                    </div>
                </div>

                            <ul class="list-icon d-flex justify-content-center mb_28">
                                <?php if ($website_info['social_linkedin']): ?>
                                    <li><a href="<?php echo esc_attr($website_info['social_linkedin']); ?>" class="icon-LinkedIn"></a></li>
                                <?php endif; ?>   
                                <?php if ($website_info['social_github']): ?>
                                    <li> <a href="<?php echo esc_attr($website_info['social_github']); ?>" class="icon-GitHub"></a></li>
                                <?php endif; ?>  
                                <?php if ($website_info['social_twitter']): ?>
                                    <li><a href="<?php echo esc_attr($website_info['social_twitter']); ?>" class="icon-X"></a></li>
                                <?php endif; ?>  
                                <?php if ($website_info['social_dribbble']): ?>
                                    <li><a href="<?php echo esc_attr($website_info['social_dribbble']); ?>" class="icon-dribbble"></a></li>
                                <?php endif; ?> 
                                <?php if ($website_info['social_facebook']): ?>
                                    <li><a href="<?php echo esc_attr($website_info['social_facebook']); ?>" class="icon-facebook"></a></li>
                                <?php endif; ?> 
                                <?php if ($website_info['social_instagram']): ?>
                                    <li><a href="<?php echo esc_attr($website_info['social_instagram']); ?>" class="icon-instagram"></a></li>
                                <?php endif; ?> 
                                <?php if ($website_info['social_tiktok']): ?>
                                    <li><a href="<?php echo esc_attr($website_info['social_tiktok']); ?>" class="icon-tiktok"></a></li>
                                <?php endif; ?> 
                                <?php if ($website_info['social_youtube']): ?>
                                    <li><a href="<?php echo esc_attr($website_info['social_youtube']); ?>" class="icon-youtube"></a></li>
                                <?php endif; ?> 
                                <?php if ($website_info['social_behance']): ?>
                                    <li><a href="<?php echo esc_attr($website_info['social_behance']); ?>" class="icon-behance"></a></li>
                                <?php endif; ?> 
                                <?php if ($website_info['social_medium']): ?>
                                    <li><a href="<?php echo esc_attr($website_info['social_medium']); ?>" class="icon-medium"></a></li>
                                <?php endif; ?> 
                            </ul>

                                <?php if ($website_info['cv_link']): ?>
                                    <a href="<?php echo esc_attr($website_info['cv_link']); ?>" class="tf-btn btn-w-full style-border mb_20">
                                        <span class="bg_btn"></span>
                                        <span class="title"><i class="icon-ReadCvLogo"></i><?php echo _e('View My CV', 'zeng'); ?></span>
                                        <span class="effect-shine"></span>
                                    </a>
                                <?php endif; ?> 
                                
                                <?php if ($website_info['contact_link']): ?>
                                <a href="<?php echo esc_attr($website_info['contact_link']); ?>" class="tf-btn style-1 animate-hover-btn btn-w-full">
                                    <i class="icon-EnvelopeSimple"></i><span><?php echo _e('Contact Me', 'zeng'); ?></span>
                                </a>
                                <?php endif; ?> 

                            <div class="item-shape">
                                <img src="<?php echo  THEMESFLAT_LINK . '/images/small-comet.png'; ?>" alt="shape">
                            </div>
                        </div>

                        <?php while ( have_posts() ) : the_post(); ?>
			            	<?php get_template_part( 'content', 'page' ); ?>
			            <?php endwhile; // end of the loop. ?>

                    </div>

                    

                </div>
            </div>
            <div class="right-bar style-1 d-flex flex-column align-items-center">
                <ul class="list-icon menu-option d-flex flex-column gap_8">
                    <li><a href="#" class="link-no-action show-sidebar"><i class="icon-CirclesFour"></i></a>
                    </li>
                    <li>
                        <div class="toggle-switch-mode"><i class="icon-Sun"></i></div>
                    </li>
                </ul>
            </div>
        </div>


    </div>


 <div class="overlay-popup"></div>
<?php get_footer(); ?>