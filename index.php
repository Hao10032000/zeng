<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package finwice
 */

get_header(); ?>
	<div class="main-content tf-container">
		<div class="row">
						<div class="col-md-12">
				<?php get_template_part( 'tpl/page-title'); ?>
			</div>
			<div class="col-md-9">
				<div class="wrap-content-area clearfix">
					<div id="primary" class="content-area">
						<main id="main" class="post-wrap" role="main">
							<?php if ( have_posts() ) : ?>
							<div class="wrap-blog-article has-post-content">
								<?php while ( have_posts() ) : the_post(); ?>

									<?php
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

				</div><!-- /.wrap-content-area -->
			</div>
			<div class="col-md-3">
					<?php 
						get_sidebar();
					?>
			</div>


<?php get_footer(); ?>