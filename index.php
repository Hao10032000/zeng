<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package zeng
 */
get_header(); 
$blog_layout_sidebar = isset($_GET['sidebar_layout']) ? $_GET['sidebar_layout'] : themesflat_get_opt('sidebar_layout');
?>
	<div class="main-content tf-container w-3 blog-sidebar-<?php echo esc_attr($blog_layout_sidebar); ?>">
		<div class="row">
						<div class="col-md-12">
			<div class="page-title">
				<?php get_template_part( 'tpl/page-title'); ?>
			</div>
		</div>
			<div class="<?php echo esc_attr($blog_layout_sidebar == 'fullwidth' ? 'col-lg-12' : 'col-lg-8'); ?>">
				<div class="wrap-content-area clearfix">
					<div id="primary" class="content-area">
						<main id="main" class="post-wrap" role="main">
							<?php if ( have_posts() ) : ?>
							<div class="wrap-blog-article has-post-content <?php echo esc_attr(themesflat_get_opt('post_content_layout')); ?>"">
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
			<div class="col-lg-4">
				<?php 
					if ( $blog_layout_sidebar == 'sidebar-left' || $blog_layout_sidebar == 'sidebar-right' ) :
						get_sidebar();
					endif;
					?>
			</div>


<?php get_footer(); ?>