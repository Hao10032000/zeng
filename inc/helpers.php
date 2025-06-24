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

/**
 * Blog layout
 */
function themesflat_blog_layout() {  

    switch (get_post_type()) {
        case 'page':
            $layout = themesflat_get_opt_elementor('page_sidebar_layout');   
            break;
        case 'post':
            $layout = themesflat_get_opt('sidebar_layout');
            break;
        default:
            $layout = themesflat_get_opt('page_sidebar_layout');
            break;
    }

    if (is_search()) {
        $layout = themesflat_get_opt('sidebar_layout');
    }

    return $layout;
}

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


    // if ( themesflat_get_opt( 'go_top') == 1 ) {
    //     echo '<div class="progress-wrap active-progress">
    //         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    //             <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 0;">
    //             </path>
    //         </svg>
    //     </div>';
    // }

}
add_action( 'wp_body_open', 'themesflat_preload_hook' );


function themesflat_kses_allowed_html() {
    $allowed_tags = array(
        'a' => array(
            'class' => array(),
            'href'  => array(),
            'rel'   => array(),
            'title' => array(),
        ),
        'abbr' => array(
            'class' => array(),
            'title' => array(),
        ),
        'b' => array(),
        'blockquote' => array(
            'class' => array(),
            'cite'  => array(),
        ),
        'cite' => array(
            'class' => array(),
            'title' => array(),
        ),
        'code' => array(
            'class' => array(),
        ),
        'del' => array(
            'datetime' => array(),
            'title' => array(),
        ),
        'dd' => array(),
        'div' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'dl' => array(
            'class' => array(),
        ),
        'dt' => array(
            'class' => array(),
        ),
        'em' => array(
            'class' => array(),
        ),
        'h1' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h2' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h3' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h4' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h5' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h6' => array(
            'class' => array(),
            'style' => array(),
        ),
        'i' => array(
            'class' => array(),
        ),
        'img' => array(
            'alt'    => array(),
            'class'  => array(),
            'height' => array(),
            'src'    => array(),
            'width'  => array(),
        ),
        'li' => array(
            'class' => array(),
            'style' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
            'style' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
            'class' => array(),
        ),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'strike' => array(
            'class' => array(),
        ),
        'strong' => array(
            'class' => array(),
        ),
        'ul' => array(
            'class' => array(),
            'style' => array(),
        ),
        'input' => array(
            'class' => array(),
            'id' => array(),
            'type' => array(),
            'value' => array(),
            'data-customize-setting-link' => array(),
            'placeholder' => array(),
            'name' => array(),
            'tabindex' => array(),
            'size' => array(),
            'aria-required' => array(),
        ),
        'label' => array(
            'class' => array(),
            'style' => array(),
            'for' => array(),
        ),
    );    
    return $allowed_tags;
}
add_filter( 'wp_kses_allowed_html', 'themesflat_kses_allowed_html', 10, 2);

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

function custom_nav_menu_li_classes($classes, $item, $args, $depth) {
    if ( $args->theme_location === 'primary' ) {
        $classes[] = 'text-menu';

        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-child'; 
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'custom_nav_menu_li_classes', 10, 4);

function custom_submenu_ul_class($classes, $args, $depth) {
    if ( $args->theme_location === 'primary' ) {
        $classes[] = 'submenu'; 
    }
    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'custom_submenu_ul_class', 10, 3);

// Remove tag br in contactform
add_filter('wpcf7_autop_or_not', '__return_false'); 

function zeng_enqueue_media_uploader($hook) {
    // Only load on user profile/edit pages
    if ($hook === 'profile.php' || $hook === 'user-edit.php') {
        wp_enqueue_media(); // Load WordPress media uploader
    }
}
add_action('admin_enqueue_scripts', 'zeng_enqueue_media_uploader');

// Add custom user profile fields to wp-admin user edit page
function add_custom_user_profile_fields($user) {
    ?>
    <h2><?php esc_html_e('Profile Information', 'zeng'); ?></h2>
    <table class="form-table">
        <!-- Avatar -->
        <tr>
            <th><label for="custom_avatar"><?php esc_html_e('Custom Avatar', 'zeng'); ?></label></th>
            <td>
                <?php $avatar_url = esc_url(get_the_author_meta('custom_avatar', $user->ID)); ?>
                <?php if ($avatar_url): ?>
                    <img src="<?php echo $avatar_url; ?>" alt="<?php esc_attr_e('User Avatar', 'zeng'); ?>" style="max-width:100px; display:block; margin-bottom:10px; border-radius:50%;">
                <?php endif; ?>
                <input type="text" name="custom_avatar" id="custom_avatar" value="<?php echo $avatar_url; ?>" class="regular-text" />
                <br />
                <button class="button" id="upload_avatar_button"><?php esc_html_e('Upload Image', 'zeng'); ?></button>
                <p class="description"><?php esc_html_e('Paste an image URL or use the media uploader.', 'zeng'); ?></p>
            </td>
        </tr>

        <!-- Other fields -->
        <tr>
            <th><label for="full_name"><?php esc_html_e('Full Name', 'zeng'); ?></label></th>
            <td><input type="text" name="full_name" id="full_name" value="<?php echo esc_attr(get_the_author_meta('full_name', $user->ID)); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="job_title"><?php esc_html_e('Job Title / Current Occupation', 'zeng'); ?></label></th>
            <td><input type="text" name="job_title" id="job_title" value="<?php echo esc_attr(get_the_author_meta('job_title', $user->ID)); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="address"><?php esc_html_e('Address', 'zeng'); ?></label></th>
            <td><input type="text" name="address" id="address" value="<?php echo esc_attr(get_the_author_meta('address', $user->ID)); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="cv_link"><?php esc_html_e('View My CV (URL)', 'zeng'); ?></label></th>
            <td><input type="url" name="cv_link" id="cv_link" value="<?php echo esc_attr(get_the_author_meta('cv_link', $user->ID)); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="contact_link"><?php esc_html_e('Contact Link', 'zeng'); ?></label></th>
            <td><input type="url" name="contact_link" id="contact_link" value="<?php echo esc_attr(get_the_author_meta('contact_link', $user->ID)); ?>" class="regular-text" /></td>
        </tr>

        <?php
        $socials = [
            'linkedin' => __('LinkedIn', 'zeng'),
            'github' => __('GitHub', 'zeng'),
            'twitter' => __('X (Twitter)', 'zeng'),
            'dribbble' => __('Dribbble', 'zeng'),
            'facebook' => __('Facebook', 'zeng'),
            'instagram' => __('Instagram', 'zeng'),
            'tiktok' => __('TikTok', 'zeng'),
            'youtube' => __('YouTube', 'zeng'),
            'behance' => __('Behance', 'zeng'),
            'medium' => __('Medium', 'zeng'),
        ];

        foreach ($socials as $key => $label) {
            ?>
            <tr>
                <th><label for="<?php echo esc_attr($key); ?>"><?php echo esc_html($label); ?> <?php esc_html_e('URL', 'zeng'); ?></label></th>
                <td>
                    <input type="url" name="<?php echo esc_attr($key); ?>" id="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr(get_the_author_meta($key, $user->ID)); ?>" class="regular-text" />
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <script>
        jQuery(document).ready(function($){
            $('#upload_avatar_button').on('click', function(e){
                e.preventDefault();
                var image = wp.media({
                    title: '<?php echo esc_js(__('Upload Avatar', 'zeng')); ?>',
                    multiple: false
                }).open().on('select', function(){
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    $('#custom_avatar').val(image_url);
                });
            });
        });
    </script>
    <?php
}

// Hook into user profile display actions
add_action('show_user_profile', 'add_custom_user_profile_fields');
add_action('edit_user_profile', 'add_custom_user_profile_fields');

function save_custom_user_profile_fields($user_id) {
    if (!current_user_can('edit_user', $user_id)) return;

    $url_fields = [
        'custom_avatar', 'cv_link', 'contact_link',
        'linkedin', 'github', 'twitter', 'dribbble',
        'facebook', 'instagram', 'tiktok', 'youtube', 'behance', 'medium',
    ];

    $text_fields = [
        'full_name', 'job_title', 'address', 'public_email',
    ];

    foreach ($url_fields as $field) {
        if (isset($_POST[$field])) {
            update_user_meta($user_id, $field, esc_url_raw($_POST[$field]));
        }
    }
    foreach ($text_fields as $field) {
        if (isset($_POST[$field])) {
            update_user_meta($user_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('personal_options_update', 'save_custom_user_profile_fields');
add_action('edit_user_profile_update', 'save_custom_user_profile_fields');
