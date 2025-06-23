<?php
/**
 * @package zeng
 */

if ( is_single() ) {
    echo '<div class="post-content clearfix">';    
        the_content();
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zeng' ),
            'after'  => '</div>',
        ) );
    echo '</div>';

} else {
    echo '<div class="post-content text-body-1">';
        if( strpos( get_the_content(), 'more-link' ) === false ) {
            add_filter( 'excerpt_more', 'themesflat_excerpt_not_more' );
            the_excerpt();     
        } else {
            add_filter( 'the_content_more_link', 'themesflat_excerpt_not_more' );
            the_content();
        }
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zeng' ),
            'after'  => '</div>',
        ) );
    echo '</div>';
}

