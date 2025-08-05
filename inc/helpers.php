<?php
/**
 * Return the built-in header styles for this theme
 *
 * @return  array
 */
Class themesflat_options_helpers {
    public function themesflat_recognize_control_class( $name ) {
        $segments = explode( '-', $name );
        $segments = array_map( 'ucfirst', $segments );
        
        return implode( '', $segments );
    }
}

function themesflat_render_box_control($name,$control=array(),$id='') {
    add_action('admin_enqueue_scripts','themesflat_admin_color_picker');
    $default = array(
        'margin-top' => '',
        'margin-bottom' => '',
        'margin-left' => '',
        'margin-right' => '',
        'padding-top' => '',
        'padding-bottom' => '',
        'padding-left' => '',
        'padding-right' => '',
        'border-top-width' => '',
        'border-bottom-width' => '',
        'border-left-width' => '',
        'border-right-width' => ''
        );
    $controls = themesflat_decode($control);
    if (!is_array($controls)) {
        $controls = array();
    }
    $controls = array_merge($default,$controls);
    ?>
    <div class="themesflat_box_control">
        <div class="themesflat_box_position">
            <div class="themesflat_box_margin">
                <label class="themesflat_box_label"><?php echo esc_html('Margin');?></label>
                <input placeholder="-" data-position='margin-top' value ="<?php  echo esc_attr(($controls['margin-top']));?>" class="top" type="text"/>
                <input placeholder="-" data-position='margin-bottom' value ="<?php  echo esc_attr(($controls['margin-bottom']));?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='margin-left' value ="<?php  echo esc_attr(($controls['margin-left']));?>" class="left" type="text"/>
                <input placeholder="-" data-position='margin-right' value ="<?php  echo esc_attr(($controls['margin-right']));?>" class="right" type="text"/>
            </div>

            <div class="themesflat_box_padding">
                <label class="themesflat_box_label"><?php echo esc_html('Padding');?></label>
                <input placeholder="-" data-position='padding-top' value ="<?php  echo esc_attr(($controls['padding-top']));?>" class="top" type="text"/>
                <input placeholder="-" data-position='padding-bottom' value ="<?php  echo esc_attr(($controls['padding-bottom']));?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='padding-left' value ="<?php  echo esc_attr(($controls['padding-left']));?>" class="left" type="text"/>
                <input placeholder="-" data-position='padding-right' value ="<?php  echo esc_attr(($controls['padding-right']));?>" class="right" type="text"/>
            </div>

            <div class="themesflat_box_border">
                <label class="themesflat_box_label"><?php echo esc_html('Border');?></label>
                <input placeholder="-" data-position='border-top-width' value ="<?php  echo esc_attr(($controls['border-top-width']));?>" class="top" type="text"/>
                <input placeholder="-" data-position='border-bottom-width' value ="<?php  echo esc_attr(($controls['border-bottom-width']));?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='border-left-width' value ="<?php  echo esc_attr(($controls['border-left-width']));?>" class="left" type="text"/>
                <input placeholder="-" data-position='border-right-width' value ="<?php  echo esc_attr(($controls['border-right-width']));?>" class="right" type="text"/>
            </div>
            <div class="themesflat_control_logo"></div>
        </div>
    </div>
    <input name="<?php echo esc_attr($name);?>" data-customize-setting-link="<?php echo  esc_attr($id);?>" value="<?php echo esc_attr(json_encode($controls));?>" type="hidden"/>
    <?php 
}

function themesflat_available_icons($name = 'icon' ) {
    $icon_types = array ($name.'_type'=>'fontawesome',$name.'_fontawesome' => '',$name.'_openiconic' => '',$name.'_typicons' => '',$name.'_entypo' => '',$name.'_linecons' => '',$name.'_monosocial' => '',$name.'_material' => '',$name.'_simpleline' => '',$name.'_ionicons' => '',$name.'_eleganticons' => '',$name.'_themifyicons' => '',$name.'_icomoon' => '');
    return  $icon_types;
}

function themesflat_excerpt_more( $more ) {
    return '';
}

function themesflat_excerpt_not_more( $more ) {
    return '';
}

function themesflat_remove_more_link_scroll( $link ) {
    $link = preg_replace( '|#more-[0-9]+|', '', $link );

    return $link;
}
add_filter( 'the_content_more_link', 'themesflat_remove_more_link_scroll' );

function themesflat_special_excerpt($length) {
    global $themesflat_length;
    return $themesflat_length;
}

function themesflat_available_social_icons() {
    $icons = apply_filters( 'themesflat_available_icons', array(
        'twitter'        => array( 'iclass' => 'icon-zeng-twitter', 'title' => 'Twitter','share_link' => THEMESFLAT_PROTOCOL . '://twitter.com/intent/tweet?url=' ),
        'facebook'       => array( 'iclass' => 'icon-zeng-facebook', 'title' => 'Facebook','share_link'=> THEMESFLAT_PROTOCOL . '://www.facebook.com/sharer/sharer.php?u=' ),
        'pinterest'      => array( 'iclass' => 'icon-zeng-pinterest', 'title' => 'Pinterest','share_link' => THEMESFLAT_PROTOCOL . '://pinterest.com/pin/create/bookmarklet/?url=' ),
        'instagram'      => array( 'iclass' => 'icon-zeng-instagram', 'title' => 'Instagram','share_link' => 'https://www.instagram.com/?url=' ),
        'youtube'        => array( 'iclass' => 'icon-zeng-youtube', 'title' => 'Youtube','share_link' =>'' ),
        'vimeo'          => array( 'iclass' => 'icon-zeng-vimeo', 'title' => 'Vimeo','share_link' =>'' ),
        'behance'        => array( 'iclass' => 'icon-zeng-behance', 'title' => 'Behance','share_link' =>'' ),
        'digg'           => array( 'iclass' => 'icon-zeng-digg', 'title' => 'Digg','share_link' =>'http://digg.com/submit?url=' ),
        'slack'          => array( 'iclass' => 'icon-zeng-slack', 'title' => 'Slack','share_link' => ''),
        'spotify'        => array( 'iclass' => 'icon-zeng-spotify', 'title' => 'Spotify','share_link' => ''),
        'dribble'          => array( 'iclass' => 'icon-zeng-dribbble', 'title' => 'Dribble','share_link' => ''),
        'linkedin'          => array( 'iclass' => 'icon-zeng-linkedin', 'title' => 'Linkedin','share_link' => ''),
        'telegram'          => array( 'iclass' => ' icon-zeng-telegram', 'title' => 'Telegram','share_link' => ''),        
        'whatsapp'          => array( 'iclass' => ' icon-zeng-whatsapp', 'title' => 'Whatsapp','share_link' => ''),        
        'tiktok'          => array( 'iclass' => ' icon-zeng-tiktok', 'title' => 'Tiktok','share_link' => ''),        
    ) );

    $icons['__ordering__'] = array_keys( $icons );

    return $icons;
}

/**
 * Menu fallback
 */
function themesflat_menu_fallback() {
    echo '<ul id="menu-main" class="menu">
    <li>
    <a class="menu-fallback" href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__( 'Create a Menu', 'zeng' ) . '</a></li></ul>';
}


/**
 * Change the excerpt length
 */
function themesflat_excerpt_length( $length ) {  
    $excerpt = themesflat_get_opt('blog_archive_post_excepts_length');
    return $excerpt;
}
add_filter( 'excerpt_length', 'themesflat_excerpt_length', 999 );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */
    function themesflat_wp_title( $title, $sep ) {
        if ( is_feed() ) {
            return $title;
        }

        global $page, $paged;

        // Add the blog name
        $title .= get_bloginfo( 'name', 'display' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) {
            $title .= " $sep $site_description";
        }

        // Add a page number if necessary:
        if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
            $title .= " $sep " . sprintf( esc_html__( 'Page %s', 'zeng' ), max( $paged, $page ) );
        }

        return $title;
    }

    add_filter( 'wp_title', 'themesflat_wp_title', 10, 2 );

    /**
     * Title shim for sites older than WordPress 4.1.
     *
     * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
     * @todo Remove this function when WordPress 4.3 is released.
     */
    if ( ! function_exists( '_wp_render_title_tag' ) ) {
        function themesflat_render_title() {
            ?>
            <title><?php bloginfo('name'); ?></title> 
            <?php
        }
        add_action( 'wp_head', 'themesflat_render_title' );
    }
    
endif;

function themesflat_hex2rgba($color, $opacity = false) {
 
    $default = 'rgb(0,0,0)';
 
    //Return default if no color provided
    if(empty($color))
          return $default; 
 
    //Sanitize $color if "#" is provided 
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
            return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

function themesflat_render_box_position($class,$box_control,$custom_string='') {
    $css = esc_attr($class) .'{';
    if (is_array($box_control)) {
        foreach ($box_control as $key => $value) {
            if ( $value !='') {
                $css .= esc_attr($key) .':'.esc_attr(str_replace("px","",$value)).'px; ';
            }
        }
    }
    $css .= esc_attr($custom_string);
    $css .= '}';

    wp_add_inline_style( 'themesflat-inline-css', $css );
}

function themesflat_render_style($class,$custom_string=''){
    $css = esc_attr($class) .'{';
    if (is_array($custom_string)) {
        foreach ($custom_string as $key => $value) {
            if ( $value !='') {
                $css .= esc_attr($key) .':'.esc_attr($value);
            }
        }
    }
    else {
        $css .= esc_attr($custom_string);
    }
    $css .= '}';
    add_action( 'wp_enqueue_scripts', 'themesflat_add_custom_styles',10,$css );
}

function themesflat_add_custom_styles($custom) {
    echo 'inhere';
    wp_add_inline_style( 'themesflat-inline-css', '.testimagebox{}' );
} 

function themesflat_render_attrs($atts,$echo = true) {
    $attr = '';
    if (is_array($atts)) {
        foreach ($atts as $key => $value) {
            if ( $value !='') {
                $attr .= $key . '="' . esc_attr( $value ) . '" ';
            }
        }
    }
    if ($echo == true) {
        echo esc_attr($attr);
    }
    return $attr;
}

function themesflat_get_json($key) {
    if ( get_theme_mod($key) == '' ) return themesflat_customize_default($key);
    if (!is_array(get_theme_mod($key))) {
    $decoded_value = json_decode(str_replace('&quot;', '"',  get_theme_mod( $key )), true );
    }
    else {
        $decoded_value = get_theme_mod($key);
    }
    return $decoded_value;
}

function themesflat_decode($value) {
    if (!is_array($value)) {
        $decoded_value = json_decode(str_replace('&quot;', '"',  $value) , true );
    }
    else {
        $decoded_value = $value;
    }
    return $decoded_value;
}

function themesflat_dynamic_sidebar($sidebar) {
    if ( is_active_sidebar ( $sidebar ) ) {
        dynamic_sidebar( $sidebar );        
    } 
}

/**
 * Get post meta, using rwmb_meta() function from Meta Box class
 */
function themesflat_meta( $key,$ID = '') {
    global $post;
    if ( $ID =='' && !is_null($post)) :
        return get_post_meta( $post->ID,$key, true );
    else:
        return get_post_meta($ID,$key,true);
    endif;
}

function themesflat_get_opt( $key ) {
    return get_theme_mod( $key, themesflat_customize_default( $key ) );
}

function themesflat_render_social($prefix = '',$value='',$show_title=false) {
    if ($value == '') {
        $value = themesflat_get_json('social_links');
    }
    $class= array();
    $class[] = ($show_title == false ? 'tf-social d-flex lg-hide' : 'themesflat-widget-socials');

    if ( ! is_array( $value ) ) {
            $decoded_value = json_decode(str_replace('&quot;', '"', $value), true );
            $value = is_array( $decoded_value ) ? $decoded_value : array();
        }

    $icons = themesflat_available_social_icons();

    ?>
    <ul class="<?php echo esc_attr(implode(" ", $class));?>">
        <?php
        foreach ( $value as $key => $val ) {
            if ($key != '__ordering__') {
                $title = ($show_title == false ? '' : $icons[$key]['title']);
                printf(
                    '<li class="%1$s">
                        <a href="%2$s" target="_blank" rel="alternate" title="%4$s">
                            <i class="icon-zeng-%4$s"></i>                            
                        </a>
                    </li>',
                    esc_attr( $key ),
                    esc_url( $val ),
                    esc_attr( $val ),
                    esc_attr( $key ),
                    esc_html($title)
                );
            }
    }
        ?>
    </ul><!-- /.social -->       
    <?php 
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function themesflat_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'themesflat_pingback_header' );

function themesflat_preload_hook(){



}
add_action( 'wp_body_open', 'themesflat_preload_hook' );


function themesflat_layout_draganddrop($blocks) {
    if ( ! is_array( $blocks ) ) {
        $blocks = explode( ',', $blocks );
    }
    $blocks = array_combine( $blocks, $blocks );
    return $blocks;
}

function get_themesflat_search_form($style = 'default') {
    set_query_var('themesflat_search_form_style', $style);
    get_search_form();
}

add_filter('get_search_form', 'themesflat_custom_search_form_output');
function themesflat_custom_search_form_output($form) {
    $style = get_query_var('themesflat_search_form_style', 'default');

    if ($style === 'style-2') {
        $form = '<form role="search" method="get" class="search-form form-search style-2" action="' . esc_url(home_url('/')) . '">
            <fieldset class="input-search">
                <input type="search" value="' . esc_attr(get_search_query()) . '" name="s" class="s" placeholder="' . esc_attr__('Search posts', 'zeng') . '"/>
            </fieldset>
            <div class="btn-submit">
                <button type="submit" class="btn-icon">
                    <i class="icon-search"></i>
                </button>
            </div>
        </form>';
    } else {
        $form = '<form role="search" method="get" class="search-form form-search" action="' . esc_url(home_url('/')) . '">
            <fieldset class="input-search">
                <input type="search" value="' . esc_attr(get_search_query()) . '" name="s" class="s" placeholder="' . esc_attr__('Searching....', 'zeng') . '"/>
            </fieldset>
            <div class="btn-submit">
                <button type="submit" class="tf-btn animate-hover-btn btn-switch-text">
                    <span>
                        <span class="btn-double-text" data-text="Search">Search</span>
                    </span>
                </button>
            </div>
        </form>';
    }

    return $form;
}


function themesflat_categories_postcount_filter ($variable) {
    $variable = str_replace('</a> (', '<span> (', $variable);
    $variable = str_replace(')', ')</span></a>', $variable);
    return $variable;
}
add_filter('wp_list_categories','themesflat_categories_postcount_filter');

function themesflat_archive_postcount_filter ($variable) {
    $variable = str_replace('</a>&nbsp;(', '<span> (', $variable);
    $variable = str_replace(')', ')</span></a>', $variable);
    return $variable;
}
add_filter('get_archives_link', 'themesflat_archive_postcount_filter');

function themesflat_social_single() {
        $value = themesflat_get_json('social_links');
        $sharelink = themesflat_available_social_icons();
        ?>
        <div class="share-bar text-center lg-hide">
            <h6 class="mb_20"><?php echo esc_html__( 'Share this post:', 'zeng' ); ?></h6>        
            <ul class="d-grid gap_6">
                <?php
                    foreach ( $value as $key => $val ) {
                        if ( $key != '__ordering__') {
                            $link = $sharelink[$key]['share_link'].get_the_permalink();
                            printf(
                                '<li class="%1$s">
                                    <a href="%2$s" class="social-item d-flex align-items-center justify-content-center text-body-1 fw-7 gap_8" target="_blank" rel="alternate" title="%1$s">
                                        <i class="icon-zeng-%4$s"></i> %1$s
                                    </a>
                                </li>',
                                esc_attr( $key ),
                                esc_url( $link ),
                                esc_attr( $link ),
                                esc_attr( $key )
                            );
                        }
                    }
                ?>
            </ul>
        </div>
        <?php
}

function themesflat_get_page_titles() {
    $title = '';
    
    if ( ! is_archive() ) {       
        if ( is_home() ) {
            if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                $title = get_post_meta( $page_for_posts, 'custom_title', true );
                if ( empty( $title ) ) {
                    $title = get_the_title( $page_for_posts );
                }
            }
            if ( is_front_page() ) {
                $title = esc_html__('Blog', 'zeng');              
            }
        } 
        elseif ( is_page() ) {
            $title = get_post_meta( get_the_ID(), 'custom_title', true );
            if ( ! $title ) {
                $title = get_the_title();
            }
        } elseif ( is_404() ) {
            $title = esc_html__( '404', 'zeng' );
        } elseif ( is_search() ) {
            $title = sprintf( esc_html__( 'Search results for &#8220;%s&#8221;', 'zeng' ), get_search_query() );
        } else {
            $title = get_post_meta( get_the_ID(), 'custom_title', true );
            if ( ! $title ) {
                $title = get_the_title();
            } 

            if (is_single() && get_post_type() == 'post' && themesflat_get_opt('blog_featured_title') != ''){
                $title = themesflat_get_opt('blog_featured_title');
            }
        }
    } else {
        if ( is_author() ) {
            the_post();
            $title = sprintf( esc_html__( 'Author: %s', 'zeng' ), get_the_author() );
            rewind_posts();
        } elseif ( is_day() ) {
            $title = sprintf( esc_html__( 'Daily: %s', 'zeng' ), get_the_date() );
        } elseif ( is_month() ) {
            $title = sprintf( esc_html__( 'Monthly: %s', 'zeng' ), get_the_date( 'F Y' ) );
        } elseif ( is_year() ) {
            $title = sprintf( esc_html__( 'Yearly: %s', 'zeng' ), get_the_date( 'Y' ) );
        } elseif ( is_search() ) {
            $title = sprintf( esc_html__( 'Search results for &#8220;%s&#8221;', 'zeng' ), get_search_query() );
        } elseif ( is_tax() || is_category() || is_tag() ) {
            $title = single_term_title( '', false );
        } else {
            $title = get_the_title();
        }
    }

    return array(
        'title' => $title,
    );
}

// Remove tag br in contactform
add_filter('wpcf7_autop_or_not', '__return_false'); 

function my_custom_website_info_admin_menu() {

    // Optionally, add a top-level menu item if you prefer
    add_menu_page(
        'Website/Admin Information',
        'Website Info',
        'manage_options',
        'my-website-info',
        'my_website_info_page_callback',
        'dashicons-admin-generic', // Icon for the menu (check dashicons.com for options)
        80 // Position in the menu hierarchy
    );
}
add_action('admin_menu', 'my_custom_website_info_admin_menu');

// 2. Register settings fields
function my_website_info_settings_init() {
    // Register a setting group and an option to store all data as an array
    register_setting(
        'my_website_info_group',       // Settings group name
        'my_website_info_options'      // Option name (all data will be stored here as an array)
    );

    // Add a settings section for general information
    add_settings_section(
        'my_website_info_general_section', // ID of the section
        'General Information',             // Title of the section
        'my_website_info_general_section_callback', // Callback function for section description
        'my-website-info'                  // Slug of the settings page
    );

    // Add individual fields for general information
    add_settings_field(
        'custom_avatar',
        'Avatar (URL)',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'custom_avatar', 'type' => 'text', 'description' => 'URL for the avatar image.']
    );

    add_settings_field(
        'full_name',
        'Full Name',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'full_name', 'type' => 'text', 'description' => 'Full name of the website manager or representative.']
    );

    add_settings_field(
        'job_title',
        'Job Title',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'job_title', 'type' => 'text', 'description' => 'E.g., CEO, Founder, Webmaster.']
    );

    add_settings_field(
        'address',
        'Address',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'address', 'type' => 'text', 'description' => 'Contact address.']
    );

    // NEW FIELD: Email
    add_settings_field(
        'email_address',
        'Email Address',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'email_address', 'type' => 'email', 'description' => 'General contact email address.']
    );

    add_settings_field(
        'cv_link',
        'CV/Resume Link',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'cv_link', 'type' => 'url', 'description' => 'URL to a CV or portfolio page.']
    );

    add_settings_field(
        'contact_link',
        'Contact Link',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'contact_link', 'type' => 'url', 'description' => 'URL of the contact page or form.']
    );

    // Section for social media links
    add_settings_section(
        'my_website_info_social_section',
        'Social Media',
        'my_website_info_social_section_callback',
        'my-website-info'
    );

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

    foreach ($socials as $id => $label) {
        add_settings_field(
            'social_' . $id, // Unique ID for each social field
            $label,
            'my_website_info_field_callback',
            'my-website-info',
            'my_website_info_social_section',
            ['name' => 'social_' . $id, 'type' => 'url', 'description' => 'URL for your ' . $label . ' profile.']
        );
    }
}
add_action('admin_init', 'my_website_info_settings_init');

// 3. Callback function for the General Information section
function my_website_info_general_section_callback() {
    echo '<p>Enter the basic information about your website or its representative.</p>';
}

// Callback function for the Social Media section
function my_website_info_social_section_callback() {
    echo '<p>Enter the links to your social media profiles.</p>';
}

// Function to render individual input fields
function my_website_info_field_callback($args) {
    $options = get_option('my_website_info_options');
    $name = $args['name'];
    $type = $args['type'];
    $description = $args['description'];
    $value = isset($options[$name]) ? esc_attr($options[$name]) : '';

    echo '<input type="' . esc_attr($type) . '" id="' . esc_attr($name) . '" name="my_website_info_options[' . esc_attr($name) . ']" value="' . esc_attr($value) . '" class="regular-text">';
    echo '<p class="description">' . esc_html($description) . '</p>';

    // If it's the avatar field, add a media uploader button
    if ($name === 'custom_avatar') {
        echo '<button type="button" class="button my-upload-button" data-field-id="custom_avatar">Select Image</button>';
        // Enqueue WordPress Media Uploader scripts
        wp_enqueue_media();
        ?>
        <script>
            jQuery(document).ready(function($){
                $('.my-upload-button').click(function(e) {
                    e.preventDefault();
                    var button = $(this);
                    var field_id = button.data('field-id');
                    var custom_uploader = wp.media({
                        title: 'Select Avatar Image',
                        library: { type: 'image' },
                        button: { text: 'Select Image' },
                        multiple: false
                    }).on('select', function() {
                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                        $('#' + field_id).val(attachment.url);
                    }).open();
                });
            });
        </script>
        <?php
    }
}

// 4. Render the settings page content
function my_website_info_page_callback() {
    ?>
    <div class="wrap">
        <h1>Website/Admin Information</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('my_website_info_group'); // The settings group registered
            do_settings_sections('my-website-info');  // The slug of the settings page
            submit_button('Save Changes');
            ?>
        </form>
    </div>
    <?php
}

// 5. Function to retrieve the saved data in the front-end
function get_my_website_info() {
    $options = get_option('my_website_info_options');

    // Default values to prevent errors if no data has been saved yet
    $default_info = [
        'custom_avatar' => '',
        'full_name'     => '',
        'job_title'     => '',
        'address'       => '',
        'email_address' => '', // NEW DEFAULT: Email
        'cv_link'       => '',
        'contact_link'  => '',
    ];

    $socials = [
        'linkedin' => '', 'github' => '', 'twitter' => '',
        'dribbble' => '', 'facebook' => '', 'instagram' => '',
        'tiktok'   => '', 'youtube' => '', 'behance' => '',
        'medium'   => '',
    ];

    foreach ($socials as $id => $label) {
        $default_info['social_' . $id] = '';
    }

    // Merge saved options with defaults to ensure all keys exist
    return wp_parse_args($options, $default_info);
}

