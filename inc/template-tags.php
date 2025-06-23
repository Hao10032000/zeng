<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package zeng
 */


/**
 * Prints HTML with meta information for the current post-date/time, post categories and author.
 */

if ( ! function_exists( 'themesflat_posted_category' ) ) :
function themesflat_posted_category( $layout = '' ) { 	
	if ( has_category() ) {
		echo '<div class="post-categories">'.esc_html__("In - ",'zeng');
			the_category( ', ' );
		echo '</div>';
	}	
}
endif;

if ( ! function_exists( 'themesflat_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function themesflat_entry_footer() {
	// Hide category and tag text for pages.
	$tags_links = '';
if ( 'post' === get_post_type() && is_single() ) {
    $tags = get_the_tags();
    if ( $tags ) {
        echo '<div class="wrap-tag d-flex flex-wrap align-items-center gap_12">';
        echo '<span class="text-title text_on-surface-color fw-7">' . esc_html__( 'Tag:', 'zeng' ) . '</span>';
        echo '<ul class="d-flex flex-wrap gap_12">';
        foreach ( $tags as $tag ) {
            $tag_link = get_tag_link( $tag->term_id );
            echo '<li><a href="' . esc_url( $tag_link ) . '" class="tag text-caption-1">' . esc_html( $tag->name ) . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}


	?>

	<?php

}
endif;

if ( ! function_exists( 'themesflat_post_navigation' ) ) :
function themesflat_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'zeng' ); ?></h2>
		<ul class="tf-article-navigation">
			<?php
			if ( is_attachment() ) :

				$prevPost = get_adjacent_post( false, '', true);
				if( is_object( $prevPost ) ){
					$prev_title = get_the_title($prevPost->ID);
				}
				$prev = esc_html__( 'Published In', 'zeng' );
				$date = get_the_date();
				echo '<li class="item prev">';
						previous_post_link('<div class="prev-button">%link</div>', $date); 
						previous_post_link('<div class="title-post">%link</div>', $prev_title); 
				echo '</li>';
			else :

				$prevPost = get_adjacent_post( false, '', true);
				if( is_object( $prevPost ) ){
					$prev_title = get_the_title($prevPost->ID);
					$prev = esc_html__( 'Previous', 'zeng' );
					$date = get_the_date();

					echo '<li class="item prev">';
						echo '<div class="content">';
							previous_post_link('<div class="post-button prev-button">%link</div>', $prev); 
							previous_post_link('<div class="title-post">%link</div>', $prev_title); 
						echo '</div>';
					echo '</li>';
				}

				$nextPost = get_adjacent_post( false, '', false);
				if( is_object( $nextPost ) ){
					$next_title = get_the_title($nextPost->ID);
					$next = esc_html__( 'Next', 'zeng' );
					$date = get_the_date();
					echo '<li class="item next">';
						echo '<div class="content">';
						next_post_link('<div class="post-button next-button">%link</div>', $next); 
							next_post_link('<div class="title-post">%link</div>', $next_title); 
						echo '</div>';
					echo '</li>';
				}
				
			endif;
			?>
		</ul><!-- .nav-links --> 
	</nav><!-- .navigation -->
	<?php
}
endif;