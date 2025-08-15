<?php
/**
 * @package zeng
 */
    
?>

<article id="post-<?php the_ID(); ?>" class="blog-post feature-post-item">
    <?php get_template_part( 'tpl/feature-post'); ?>
    <div class="content">
        <?php 
				$content_elements = themesflat_layout_draganddrop(themesflat_get_opt( 'post_content_elements' ));
				foreach ( $content_elements as $content_element ) :
					if ( 'title' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-title' );
					} elseif ( 'meta' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-meta' );
					} elseif ( 'excerpt_content' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-body' );
					} elseif ( 'readmore' == $content_element ) {
						echo ( '<div class="bottom-blog">');
							get_template_part( 'tpl/entry-content/entry-content-readmore' );
						echo ( '</div>');
					}
				endforeach;
				?>
    </div>
</article>
