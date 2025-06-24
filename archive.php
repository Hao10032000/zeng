<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package zeng
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="wrap-content-area clearfix">
				<div id="primary" class="content-area" >
					<main id="main" class="post-wrap" role="main">
					<?php if ( have_posts() ) : ?>
					<div class="wrap-blog-article has-post-content">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_type() );
							?>

						<?php endwhile; ?>		
					</div>	
					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>
					</main><!-- #main -->
					<div class="clearfix">
					<?php	        
						get_template_part( 'tpl/pagination' );				
					?>
					</div>
				</div><!-- #primary -->
				<?php 
				if ( $blog_layout_sidebar == 'sidebar-left' || $blog_layout_sidebar == 'sidebar-right' ) :
					get_sidebar();
				endif;
				?>
			</div><!-- /.wrap-content-area -->
		</div><!-- /.col-md-12 -->
	</div><!-- /.row -->
</div>
<?php get_footer(); ?>