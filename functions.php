<?php
/**
 * ZenG Theme functions and definitions
 *
 * @package zeng
 */

// Constants
define( 'THEMESFLAT_DIR', trailingslashit( get_template_directory() ));
define( 'THEMESFLAT_LINK', trailingslashit( get_template_directory_uri() ));
define( 'THEMESFLAT_PROTOCOL', is_ssl() ? 'https' : 'http' );

/**
 * Theme setup
 */
if ( ! function_exists( 'themesflat_setup' ) ) :
function themesflat_setup() {

    // Load text domain for translations
    load_theme_textdomain( 'zeng', THEMESFLAT_DIR . 'languages' );

    // RSS feed links
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support('title-tag');
 
    // Featured images
    add_theme_support('post-thumbnails');

    // Menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'zeng' ),
    ) );

    // HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Custom background and header
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) );
    add_theme_support( 'custom-header' );

    // Gutenberg supports
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );

    // Custom Logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Editor styles
    add_editor_style( 'css/editor-style.css' );

    // Set content width
    if ( ! isset( $GLOBALS['content_width'] ) ) {
        $GLOBALS['content_width'] = 1200;
    }
}
endif;
add_action( 'after_setup_theme', 'themesflat_setup' );

/**
 * Register widget areas
 */
function themesflat_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Blog', 'zeng' ),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in the blog sidebar.', 'zeng' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    for ( $i = 1; $i <= 4; $i++ ) {
        register_sidebar( array(
            'name'          => sprintf( esc_html__( 'Footer Widget Area %d', 'zeng' ), $i ),
            'id'            => 'footer-' . $i,
            'description'   => sprintf( esc_html__( 'Add widgets here to appear in Footer area %d.', 'zeng' ), $i ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    }
}
add_action( 'widgets_init', 'themesflat_widgets_init' );

/**
 * Enqueue styles and scripts
 */
function themesflat_scripts() {
    // CSS
    wp_enqueue_style( 'bootstrap', THEMESFLAT_LINK . 'css/bootstrap.css', array(), '5.0.0' );
    wp_enqueue_style( 'icon-zeng', THEMESFLAT_LINK . 'css/icon-zeng.css' );
    wp_enqueue_style( 'icon-zeng-extend', THEMESFLAT_LINK . 'css/icon-zeng-extend.css' );
    wp_enqueue_style( 'themesflat-style', THEMESFLAT_LINK . 'css/style.css' );
    wp_enqueue_style( 'themesflat-inline-css', THEMESFLAT_LINK . 'css/inline-css.css' );
    wp_enqueue_style( 'swiper-theme', THEMESFLAT_LINK . 'css/swiper-bundle.min.css' );
    wp_enqueue_style( 'animate-text', THEMESFLAT_LINK . 'css/animateText.css' );
    wp_enqueue_style( 'fancybox', THEMESFLAT_LINK . 'css/jquery.fancybox.min.css' );
    wp_enqueue_style( 'odometer', THEMESFLAT_LINK . 'css/odometer.min.css' );

    // Google Fonts
    wp_enqueue_style( 'zeng-fonts', themesflat_fonts_url(), array(), null );

    // JS
    wp_enqueue_script( 'swiper-theme', THEMESFLAT_LINK . 'js/swiper-bundle.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-js', THEMESFLAT_LINK . 'js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'image-loader', THEMESFLAT_LINK . 'js/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'gsap', THEMESFLAT_LINK . 'js/gsap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'ScrollTrigger', THEMESFLAT_LINK . 'js/ScrollTrigger.min.js', array( 'gsap' ), '1.0.0', true );
    wp_enqueue_script( 'handleGsap', THEMESFLAT_LINK . 'js/handleGsap.js', array( 'gsap' ), '1.0.0', true );
    wp_enqueue_script( 'fancybox', THEMESFLAT_LINK . 'js/jquery.fancybox.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'lazysize', THEMESFLAT_LINK . 'js/lazysize.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'odometer', THEMESFLAT_LINK . 'js/odometer.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'counter', THEMESFLAT_LINK . 'js/counter.js', array(), '1.0.0', true );
    wp_enqueue_script( 'ScrollSmooth', THEMESFLAT_LINK . 'js/ScrollSmooth.js', array(), '1.0.0', true );
    wp_enqueue_script( 'SplitText', THEMESFLAT_LINK . 'js/SplitText.min.js', array( 'gsap' ), '1.0.0', true );
    wp_enqueue_script( 'splitting', THEMESFLAT_LINK . 'js/splitting.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'textanimation', THEMESFLAT_LINK . 'js/textanimation.js', array( 'splitting' ), '1.0.0', true );
    wp_enqueue_script( 'carousel', THEMESFLAT_LINK . 'js/carousel.js', array(), '1.0.0', true );
    wp_enqueue_script( 'themesflat-main', THEMESFLAT_LINK . 'js/main.js', array( 'jquery' ), '1.0.0', true );

    // Localize AJAX + nonce
    wp_localize_script( 'themesflat-main', 'zeng_ajax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'zeng_ajax_nonce' ),
    ) );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'themesflat_scripts' );

/**
 * Fonts URL
 */
function themesflat_get_style( $style ) {
    return str_replace( 'italic', 'i', $style );
}

function themesflat_fonts_url() {
    $fonts_url = '';
    $font_families = array();

    $typography_body     = themesflat_get_json( 'typography_body' );
    $typography_headings = themesflat_get_json( 'typography_headings' );
    $typography_menu     = themesflat_get_json( 'typography_menu' );
    $typography_sub_menu = themesflat_get_json( 'typography_sub_menu' );

    if ( ! empty( $typography_body ) ) {
        $font_families[] = $typography_body['family'] . ':' . themesflat_get_style( $typography_body['style'] );
    } else {
        $font_families[] = 'Archivo:400,400i,700,700i,900';
    }

    if ( ! empty( $typography_headings ) ) {
        $font_families[] = $typography_headings['family'] . ':' . themesflat_get_style( $typography_headings['style'] );
    }

    if ( ! empty( $typography_menu ) ) {
        $font_families[] = $typography_menu['family'] . ':' . themesflat_get_style( $typography_menu['style'] );
    }

    if ( ! empty( $typography_sub_menu ) ) {
        $font_families[] = $typography_sub_menu['family'] . ':' . themesflat_get_style( $typography_sub_menu['style'] );
    }

    if ( ! empty( $font_families ) ) {
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
        );
        $fonts_url = add_query_arg( $query_args, THEMESFLAT_PROTOCOL . '://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}

/**
 * AJAX handler for popup
 */
function zeng_load_post_popup() {
    check_ajax_referer( 'zeng_ajax_nonce', 'security' );

    $post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;

    if ( $post_id > 0 ) {
        $query = new WP_Query( array(
            'p'         => $post_id,
            'post_type' => 'post',
        ) );

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();

                ob_start();
                get_template_part( 'tpl/content', 'popup' );
                $html = ob_get_clean();

                echo wp_kses_post( $html );
            }
            wp_reset_postdata();
        }
    }
    wp_die();
}
add_action( 'wp_ajax_zeng_load_post_popup', 'zeng_load_post_popup' );
add_action( 'wp_ajax_nopriv_zeng_load_post_popup', 'zeng_load_post_popup' );

/**
 * Include required files
 */
require THEMESFLAT_DIR . 'inc/customizer.php';
require THEMESFLAT_DIR . 'inc/helpers.php';
require THEMESFLAT_DIR . 'inc/structure.php';
require THEMESFLAT_DIR . 'inc/breadcrumb.php';
require THEMESFLAT_DIR . 'inc/template-tags.php';
require THEMESFLAT_DIR . 'inc/styles.php';

// TGMPA & Plugins
require_once THEMESFLAT_DIR . 'inc/plugins/class-tgm-plugin-activation.php';
require_once THEMESFLAT_DIR . 'inc/plugins/plugins.php';

// Options
require THEMESFLAT_DIR . 'inc/options/options-definition.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/social_icons.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/number.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/dropdown-sidebars.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/dropdown-pages.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/box-control.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/radio-images.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/check-box.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/typography.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/color_overlay.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/multi-images.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/styler_slider.php';
require_once THEMESFLAT_DIR . 'inc/options/controls/draganddrop-controls.php';

// Elementor
require_once THEMESFLAT_DIR . 'inc/elementor-options/elementor-options.php';
require_once THEMESFLAT_DIR . 'inc/elementor-options/elementor-functions.php';

// Demo Import
require_once THEMESFLAT_DIR . 'demo/import-demo.php';

/**
 * Admin styles & scripts
 */
function themesflat_load_customizer_style() {
    wp_enqueue_style( 'plugin-install' );
    wp_enqueue_script( 'wp-plupload' );
    wp_enqueue_script( 'jquery-ui' );

    wp_enqueue_style( 'themesflat-customizer', THEMESFLAT_LINK .'css/admin/customizer.css', array(), '1.0.0' );
    wp_enqueue_style( 'themesflat-alpha-color-picker', THEMESFLAT_LINK .'css/admin/alpha-color-picker.css', array(), '1.0.0' );

    wp_enqueue_script( 'themesflat-alpha-color-picker', THEMESFLAT_LINK . 'js/admin/alpha-color-picker.js', array( 'wp-color-picker' ), '2.1.2', true );
    wp_enqueue_script( 'themesflat-customizer', THEMESFLAT_LINK .'js/admin/customizer.js', array( 'jquery','customize-preview' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'themesflat_load_customizer_style' );
add_action( 'admin_enqueue_scripts', 'themesflat_load_customizer_style' );

function themesflat_load_admin_style() {
    wp_enqueue_style( 'themesflat-admin', THEMESFLAT_LINK .'css/admin/admin.css', array(), '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'themesflat_load_admin_style', 999 );
