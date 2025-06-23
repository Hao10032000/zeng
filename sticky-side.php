<?php
/**
 * Template Name: Sidebar Author
 *
 * @package zeng
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta
  name="description"
  content="zeng - Therapy & Counseling Psychologist WordPress Theme">
<link rel="profile" href="<?php echo THEMESFLAT_PROTOCOL ?>://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); 

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
$user_id = get_the_author_meta('ID');
$facebook   = get_user_meta($user_id, 'facebook', true);
$twitter    = get_user_meta($user_id, 'twitter', true);
$instagram  = get_user_meta($user_id, 'instagram', true);
$pinterest  = get_user_meta($user_id, 'pinterest', true);
?>
<div class="themesflat-boxed">	

	<div id="main-content" class="site-main clearfix">
		<div id="themesflat-content" class="page-wrap">


    <div id="wrapper">

        <div class="main-content style-1 ">

            <div class="wrap-main-blog position-relative section-onepage">

                <div class="overlay-blog" id="overlay-blog"></div>
                <div class="show-sidebar">
                    <div class="icon">
                        <div class="bars" id="bar1"></div>
                        <div class="bars" id="bar2"></div>
                        <div class="bars" id="bar3"></div>
                    </div>
                </div>

                <!-- header-menu -->
                <div class="left-bar">
                    <div class="canvas-wrapper ">
                    
                        <!-- author -->
                        <div class="box-author style-1 text-center">
                            <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo">
                                <img src="<?php echo esc_url($logo_site_dark); ?>" alt="logo" class="main-logo" width="193" height="44"
                                    data-light="<?php echo esc_url($logo_site_dark); ?>" data-dark="<?php echo esc_url($logo_site_light); ?>">
                            </a>
                            <div class="info">
                                <div class="avatar">
                                    <?php
									    echo get_avatar(get_the_author_meta('user_email'),$size='200');
									?>	
                                </div>
                                <h4 class="mb_4"><?php $author_id = get_post_field('post_author', get_the_ID()); echo get_user_full_name($author_id); ?></h4>
                                <p class="text-body-1"><?php echo get_user_meta($user_id, 'address', true); ?></p>
                            </div>

                                <?php if( !empty($facebook) || !empty($twitter) || !empty($pinterest) || !empty($instagram) ): ?>
                                        <ul class="social">
                                            <?php if ($facebook) {
                                                echo '<li class="h6 fw-7 text_on-surface-color"><a href="' . esc_url($facebook) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-FacebookLogo"></i></a></li>';
                                            } ?>
                                                <?php if ($twitter) {
                                                echo '<li class="h6 fw-7 text_on-surface-color"><a href="' . esc_url($twitter) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-XLogo"></i></a></li>';
                                            } ?>
                                                <?php if ($pinterest) {
                                                echo '<li class="h6 fw-7 text_on-surface-color"><a href="' . esc_url($pinterest) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-PinterestLogo"></i></a></li>';
                                            } ?>
                                                <?php if ($instagram) {
                                                echo '<li class="h6 fw-7 text_on-surface-color"><a href="' . esc_url($instagram) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="InstagramLogo"></i></a></li>';
                                            } ?>
                                        </ul>
                                <?php endif; ?>
                        </div>
                        <!-- author -->
                        
                        <!-- menu -->

                        <div class="inner-mobile-nav sidebar-menu">
                            <div class="mobile-nav-wrap">
                                <?php get_template_part( 'tpl/header/navigator-side'); ?>
                            </div>
                        </div>

                        <!-- menu -->


                    </div>
                </div>
                <!-- End header-menu -->

                <div class="content-inner">

                    <!-- topbar -->
                    <div class="topbar style-1">
                        <div class="tf-container w-xl">
                            <div class="topbar-inner d-flex justify-content-between align-items-center">
                                <?php if ($header_search_box == 1): ?>
                                    <?php get_themesflat_search_form('style-2'); ?>
                                <?php endif; ?>
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

                    <!-- content -->

                    	<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'page' ); ?>
						<?php endwhile; ?>

                    <!-- content -->

                    <!-- Footer -->
                        <?php get_template_part( 'tpl/footer/footer-side'); ?>
                    <!-- /Footer -->

                </div>
                
            </div>
            
        </div>
    </div>


            </div><!-- #content -->
    </div><!-- #main-content -->

    </div><!-- /#boxed -->
<?php wp_footer(); ?>
</body>
</html>