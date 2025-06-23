<?php
/**
 * themesflat functions and definitions
 *
 * @package zeng
 */
// remove_theme_mods();

define( 'THEMESFLAT_DIR', trailingslashit( get_template_directory() )) ;
define( 'THEMESFLAT_LINK', trailingslashit( get_template_directory_uri() ) );
define( 'THEMESFLAT_PROTOCOL' , (is_ssl()) ? 'https' : 'http' );
if ( ! function_exists( 'themesflat_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function themesflat_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on burger, use a find and replace
     * to change 'zeng' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'zeng', THEMESFLAT_DIR . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Content width
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 1200; /* pixels */
    }

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */

    add_theme_support( 'post-thumbnails' ); 
    // 366
    add_image_size( 'themesflat-blog', 976, 549, true );
    // 320
    add_image_size( 'themesflat-blog-grid', 639, 480, true );  
    // 700  
    add_image_size( 'themesflat-blog-single', 1800, 720, true );  
    // 674
    add_image_size( 'themesflat-blog-single-2', 1350, 1012, true );    
    // 277
    add_image_size( 'themesflat-blog-style1', 555, 415, true );  
    add_image_size( 'themesflat-blog-style2', 480, 270, true );   
    // 220
    add_image_size( 'themesflat-blog-style3', 588, 330, true );   

    //Get thumbnail url
    function themesflat_thumbnail_url($size){
        global $post;
        if( $size== '' ) {
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            return esc_url($url);
        } else {
            $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size);
            return esc_url($url[0]);
        }
    }

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'zeng' ),
        'bottom' => esc_html__( 'Bottom Menu', 'zeng' ),
        'footer-1' => esc_html__( 'Footer Menu 1', 'zeng' ),
        'footer-2' => esc_html__( 'Footer Menu 2', 'zeng' ),
        'footer-3' => esc_html__( 'Footer Menu 3', 'zeng' )
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    // Set up the WordPress core custom background feature.
    $args = array(
        'default-color' => 'ffffff',
        'default-image' => '',
    );

    add_theme_support( 'custom-background', $args );
    add_theme_support( 'custom-header', $args );

    // Custom stylesheet to the TinyMCE visual editor
    function themesflat_add_editor_styles() {
        add_editor_style( 'css/editor-style.css' );
    }
    add_action( 'admin_init', 'themesflat_add_editor_styles' );

}
endif; // themesflat_setup

add_action( 'after_setup_theme', 'themesflat_setup' );

function themesflat_wpfilesystem() {
    include_once (ABSPATH . '/wp-admin/includes/file.php');
    WP_Filesystem();
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function themesflat_widgets_init() {

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Blog', 'zeng' ),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Blog Sidebar.', 'zeng' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );     

    //Widget footer
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area 1', 'zeng' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer area 1.', 'zeng' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area 2', 'zeng' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer area 2.', 'zeng' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area 3', 'zeng' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer area 3.', 'zeng' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area 4', 'zeng' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer widget area 4.', 'zeng' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

}
add_action( 'widgets_init', 'themesflat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function themesflat_scripts() {    
    // Theme stylesheet.    
    wp_enqueue_style( 'icon-zeng', THEMESFLAT_LINK . 'css/icon-zeng.css' );
    wp_enqueue_style( 'icon-zeng-extend', THEMESFLAT_LINK . 'css/icon-zeng-extend.css' );
    wp_enqueue_style( 'themesflat-style', THEMESFLAT_LINK . 'css/style.css' );
    wp_enqueue_style( 'themesflat-inline-css', THEMESFLAT_LINK . 'css/inline-css.css' );    
    wp_enqueue_style( 'swiper-theme', THEMESFLAT_LINK . 'css/swiper-bundle.min.css' );   
    
    wp_enqueue_script( 'jquery-mb-ytplayer', THEMESFLAT_LINK . 'js/jquery.mb.YTPlayer.js', array('jquery'),'3.2.8',true);     
    wp_enqueue_script( 'swiper-theme', THEMESFLAT_LINK . 'js/swiper-bundle.min.js' );   
    
    if ( themesflat_get_opt('enable_smooth_scroll') == 1 ) {
        wp_enqueue_script( 'smoothscroll', THEMESFLAT_LINK . 'js/smoothscroll.js', array(),'1.2.1',true);
    }
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply', array(),'2.0.4',true );
    }    
    
    // Load the main js    
    wp_enqueue_script( 'themesflat-main', THEMESFLAT_LINK . 'js/main.js', array(),'2.0.4',true);

    wp_enqueue_script( 'splitting', THEMESFLAT_LINK . 'js/splitting.min.js' );
    wp_enqueue_script( 'bootstrap-js', THEMESFLAT_LINK . 'js/bootstrap.min.js' );
    
}

add_action( 'wp_enqueue_scripts', 'themesflat_scripts' );


/**
 * Enqueue Bootstrap
 */
function themesflat_enqueue_bootstrap() {
    wp_enqueue_style( 'bootstrap', THEMESFLAT_LINK . 'css/bootstrap.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'themesflat_enqueue_bootstrap', 9 );

// Customizer additions.
require THEMESFLAT_DIR . 'inc/customizer.php';

// Helpers
require THEMESFLAT_DIR . 'inc/helpers.php';

// Struct
require THEMESFLAT_DIR . 'inc/structure.php';

// Breadcrumbs additions.
require THEMESFLAT_DIR . 'inc/breadcrumb.php';

// Custom template tags for this theme.
require THEMESFLAT_DIR . 'inc/template-tags.php';

// Style.
require THEMESFLAT_DIR . 'inc/styles.php';

// Required plugins
require_once THEMESFLAT_DIR . 'inc/plugins/class-tgm-plugin-activation.php';

// Plugin Activation
require_once THEMESFLAT_DIR . 'inc/plugins/plugins.php';

require THEMESFLAT_DIR . "inc/options/options-definition.php";
require_once( THEMESFLAT_DIR . 'inc/options/controls/social_icons.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/number.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/dropdown-sidebars.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/dropdown-pages.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/box-control.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/radio-images.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/check-box.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/color_overlay.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/multi-images.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/styler_slider.php');
require_once( THEMESFLAT_DIR . 'inc/options/controls/draganddrop-controls.php');
require_once( THEMESFLAT_DIR . 'inc/elementor-options/elementor-options.php');
require_once( THEMESFLAT_DIR . 'inc/elementor-options/elementor-functions.php');
require_once( THEMESFLAT_DIR . 'demo/import-demo.php');


// Load Customizer Style
function themesflat_load_customizer_style() { 
    wp_enqueue_script( 'wp-plupload' );
    wp_enqueue_style( 'plugin-install' ); 
    wp_enqueue_script('jquery-ui');

    wp_register_style('themesflat-customizer', THEMESFLAT_LINK .'css/admin/customizer.css', false, '1.0.0' );
    wp_enqueue_style('themesflat-customizer' ); 
    wp_enqueue_style('themesflat-alpha-color-picker', THEMESFLAT_LINK .'css/admin/alpha-color-picker.css', false, '1.0.0' );    
    wp_enqueue_script('themesflat-alpha-color-picker', THEMESFLAT_LINK . 'js/admin/alpha-color-picker.js', array('wp-color-picker'),'2.1.2',true);
    wp_enqueue_script('themesflat-customizer', THEMESFLAT_LINK .'js/admin/customizer.js', array( 'jquery','customize-preview' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'themesflat_load_customizer_style' );
add_action( 'admin_enqueue_scripts', 'themesflat_load_customizer_style' ); 

// Load Admin Style
function themesflat_load_admin_style() {
    wp_enqueue_style( 'themesflat-admin', THEMESFLAT_LINK .'css/admin/admin.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'themesflat_load_admin_style', 999 );

// Add custom user profile fields to wp-admin user edit page
function add_custom_user_profile_fields($user) {
    ?>
    <h2>Profile Information</h2>
    <table class="form-table">
        <tr>
            <th><label for="full_name">Full Name</label></th>
            <td>
                <input type="text" name="full_name" id="full_name" value="<?php echo esc_attr(get_the_author_meta('full_name', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="job_title">Job Title / Current Occupation</label></th>
            <td>
                <input type="text" name="job_title" id="job_title" value="<?php echo esc_attr(get_the_author_meta('job_title', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="address">Address</label></th>
            <td>
                <input type="text" name="address" id="address" value="<?php echo esc_attr(get_the_author_meta('address', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="cv_link">View My CV (URL)</label></th>
            <td>
                <input type="url" name="cv_link" id="cv_link" value="<?php echo esc_attr(get_the_author_meta('cv_link', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="contact_link">Contact Link</label></th>
            <td>
                <input type="url" name="contact_link" id="contact_link" value="<?php echo esc_attr(get_the_author_meta('contact_link', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>

        <?php
        // List of social media platforms (required and optional)
        $socials = [
            'linkedin' => 'LinkedIn',
            'github' => 'GitHub',
            'twitter' => 'X (Twitter)',
            'dribbble' => 'Dribbble',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'tiktok' => 'TikTok',
            'youtube' => 'YouTube',
            'behance' => 'Behance',
            'medium' => 'Medium',
        ];

        foreach ($socials as $key => $label) {
            ?>
            <tr>
                <th><label for="<?php echo $key; ?>"><?php echo $label; ?> URL</label></th>
                <td>
                    <input type="url" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo esc_attr(get_the_author_meta($key, $user->ID)); ?>" class="regular-text" />
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
// Hook into user profile display actions
add_action('show_user_profile', 'add_custom_user_profile_fields');
add_action('edit_user_profile', 'add_custom_user_profile_fields');

// Save custom user profile fields
function save_custom_user_profile_fields($user_id) {
    // Check permission
    if (!current_user_can('edit_user', $user_id)) return false;

    // List of all fields to save
    $fields = [
        'full_name', 'job_title', 'address', 'cv_link', 'contact_link',
        'linkedin', 'github', 'twitter', 'dribbble',
        'facebook', 'instagram', 'tiktok', 'youtube', 'behance', 'medium',
    ];

    // Save each field if submitted
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_user_meta($user_id, $field, esc_url_raw($_POST[$field]));
        }
    }
}
// Hook into user profile save actions
add_action('personal_options_update', 'save_custom_user_profile_fields');
add_action('edit_user_profile_update', 'save_custom_user_profile_fields');




