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

    // Load CSS
    wp_enqueue_style( 'icon-zeng', THEMESFLAT_LINK . 'css/icon-zeng.css' );
    wp_enqueue_style( 'themesflat-style', THEMESFLAT_LINK . 'css/style.css' );
    wp_enqueue_style( 'themesflat-inline-css', THEMESFLAT_LINK . 'css/inline-css.css' );
    wp_enqueue_style( 'swiper-theme', THEMESFLAT_LINK . 'css/swiper-bundle.min.css' );
    wp_enqueue_style( 'animate-text', THEMESFLAT_LINK . 'css/animateText.css' );
    wp_enqueue_style( 'fancybox', THEMESFLAT_LINK . 'css/jquery.fancybox.min.css' );
    wp_enqueue_style( 'odometer', THEMESFLAT_LINK . 'css/odometer.min.css' );

    // Load JS
    wp_enqueue_script( 'swiper-theme', THEMESFLAT_LINK . 'js/swiper-bundle.min.js', array(), '1.0.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Main JS scripts
    wp_enqueue_script( 'bootstrap-js', THEMESFLAT_LINK . 'js/bootstrap.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'ScrollTrigger', THEMESFLAT_LINK . 'js/ScrollTrigger.min.js', array('gsap'), '1.0.0', true );
    wp_enqueue_script( 'gsap', THEMESFLAT_LINK . 'js/gsap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'handleGsap', THEMESFLAT_LINK . 'js/handleGsap.js', array('gsap'), '1.0.0', true );
    wp_enqueue_script( 'fancybox', THEMESFLAT_LINK . 'js/jquery.fancybox.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'lazysize', THEMESFLAT_LINK . 'js/lazysize.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'odometer', THEMESFLAT_LINK . 'js/odometer.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'counter', THEMESFLAT_LINK . 'js/counter.js', array(), '1.0.0', true );
    wp_enqueue_script( 'ScrollSmooth', THEMESFLAT_LINK . 'js/ScrollSmooth.js', array(), '1.0.0', true );
    wp_enqueue_script( 'SplitText', THEMESFLAT_LINK . 'js/SplitText.min.js', array('gsap'), '1.0.0', true );
    wp_enqueue_script( 'splitting', THEMESFLAT_LINK . 'js/splitting.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'textanimation', THEMESFLAT_LINK . 'js/textanimation.js', array('splitting'), '1.0.0', true );
    wp_enqueue_script( 'carousel', THEMESFLAT_LINK . 'js/carousel.js', array(), '1.0.0', true );
    wp_enqueue_script( 'themesflat-main', THEMESFLAT_LINK . 'js/main.js', array('jquery'), '1.0.0', true );
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

class Custom_Icon_Menu_Walker extends Walker_Nav_Menu {

    /**
     * Start the element output.
     *
     * @see Walker_Nav_Menu::start_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
         * Filters the list of CSS classes to be applied to an individual menu item in the WordPress admin menu.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string[] $classes The array of CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        /**
         * Filters the ID applied to an individual menu item in the WordPress admin menu.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['class'] = 'nav_link'; // Add this class to your anchor tag
        if ( in_array('current-menu-item', $classes) || in_array('current_page_item', $classes) ) {
            $atts['class'] .= ' active'; // Add 'active' class if it's the current menu item
        }
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel'] = ! empty( $item->xfn ) ? $item->xfn : '';
        $atts['aria-current'] = $item->current ? 'page' : '';

        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array    $atts   The HTML attributes applied to the menu item's `<a>` element, empty array otherwise.
         * @param WP_Post  $item   The current menu item data object.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
         * @param int      $depth  Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string   $title The menu item's title.
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        // --- Custom HTML Structure START ---
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';

        // Get custom field for icon class if it exists.
        // You might need to add a custom field to your menu items in the WordPress dashboard.
        // For example, using ACF or a simple custom meta box.
        $icon_class = get_post_meta( $item->ID, '_menu_item_icon', true );
        if ( ! empty( $icon_class ) ) {
            $item_output .= '<i class="icon ' . esc_attr( $icon_class ) . '"></i>';
        } else {
            // Fallback icon if no custom field is set, or remove this if not needed.
            // You could map specific menu item titles to icons here.
            $item_output .= '<i class="icon icon-User"></i>'; // Replace 'icon-Default' with a suitable default
        }

        $item_output .= '<span class="tooltip text-caption-1">' . $title . '</span>';
        $item_output .= '</a>';
        $item_output .= $args->after;
        // --- Custom HTML Structure END ---

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    // You might also need to customize 'start_lvl' if your <ul> has specific classes
    // and 'end_lvl' and 'end_el' if you need to modify their closing tags.
    // However, for your specific request, 'start_el' is the main focus.

    /**
     * Starts the list before the elements are added.
     *
     * @see Walker_Nav_Menu::start_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        // Add your desired classes for nested <ul> here if needed.
        // In your example, the main <ul> has 'nav-menu style-2 list-icon',
        // but typically sub-menus might have different classes.
        $output .= "{$n}{$indent}<ul class=\"sub-menu\">\n";
    }
}

function custom_menu_item_icons() {
    add_action( 'wp_nav_menu_item_custom_fields', 'custom_menu_item_icon_field', 10, 2 );
    add_action( 'wp_update_nav_menu_item', 'custom_menu_item_icon_save', 10, 3 );
}
add_action( 'admin_init', 'custom_menu_item_icons' );

function custom_menu_item_icon_field( $item_id, $item ) {
    $icon_class = get_post_meta( $item_id, '_menu_item_icon', true );
    ?>
    <p class="field-custom description description-wide">
        <label for="edit-menu-item-icon-<?php echo $item_id; ?>">
            <?php _e( 'Icon Class (e.g., icon-User)', 'zeng' ); ?><br />
            <input type="text" id="edit-menu-item-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-icon[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $icon_class ); ?>" />
        </label>
    </p>
    <?php
}

function custom_menu_item_icon_save( $menu_id, $menu_item_db_id, $args ) {
    if ( isset( $_POST['menu-item-icon'][ $menu_item_db_id ] ) ) {
        $icon_class = sanitize_text_field( wp_unslash( $_POST['menu-item-icon'][ $menu_item_db_id ] ) );
        update_post_meta( $menu_item_db_id, '_menu_item_icon', $icon_class );
    } else {
        delete_post_meta( $menu_item_db_id, '_menu_item_icon' );
    }
}







