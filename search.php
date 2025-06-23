<?php
/**
 * The template for displaying search results pages.
 *
 * @package zeng
 */

get_header(); 
?>
<div class="tf-container <?php echo esc_attr(themesflat_get_opt('blog_style_layout')); ?>">
	<div class="row">

		<div class="col-lg-9">
			<?php if ( have_posts() ) : ?>
					<div class="wrap-blog-article  <?php echo esc_attr(themesflat_get_opt('blog_style_layout')); ?> has-post-content">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
							?>
						<?php endwhile; ?>

						
					</div>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
											<?php
							global $themesflat_paging_style, $themesflat_paging_for;
							$themesflat_paging_for = 'blog';
					        $themesflat_paging_style = themesflat_get_opt('blog_archive_pagination_style');		        
							get_template_part( 'tpl/pagination' );
						?>		
		</div>

		<div class="col-lg-3">
				<?php 
					if ( themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-right' ) :
						get_sidebar();
					endif;
				?>
		</div>

	</div>
</div>
<?php get_footer(); ?>