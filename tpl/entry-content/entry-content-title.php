<?php  
/**
 * @package zeng
 */
?>

<?php
$style = themesflat_get_opt('blog_single_style');

if ( is_singular('post') ) : 
    the_title('<h3 class="title">', '</h3>');
else :
    if ( $style === 'popup' ) {
        the_title('<h3 class="title"><a href="#" class="link open-post-popup" data-id="' . get_the_ID() . '">', '</a></h3>');
    } else {
        the_title(sprintf('<h3 class="title"><a href="%s" class="link" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');
    }
endif;
?>

