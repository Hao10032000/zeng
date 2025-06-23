<?php
/**
 * @package zeng
 */
    
 $blog_style_layout = isset($_GET['blog_style_layout']) ? $_GET['blog_style_layout'] : themesflat_get_opt('blog_style_layout');
 $paste_class = $blog_style_layout == 'style-grid' ? 'style-default item-grid' : 'style-list';

?>

	<article id="post-<?php the_ID(); ?>" class="blog-post feature-post-item <?php echo esc_attr($paste_class); ?> hover-image-translate">
			<?php get_template_part( 'tpl/feature-post'); ?>
			<div class="content">
				<?php 
				$content_elements = themesflat_layout_draganddrop(themesflat_get_opt( 'post_content_elements' ));
				foreach ( $content_elements as $content_element ) :
					if ( 'meta' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-meta' );
					} elseif ( 'title' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-title' );
					} elseif ( 'excerpt_content' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-body' );
					} elseif ( 'readmore' == $content_element ) {
						echo ( '<div class="bottom-blog">');
							get_template_part( 'tpl/entry-content/entry-content-readmore' );
						echo ( '</div>');
					}
				endforeach;
				?>
			</div><!-- /.entry-post -->
	</article><!-- #post-## -->