<?php
/**
 * The template for displaying all single posts.
 *
 * @package zeng
 */


get_header(); ?>
<div id="main-content" class="main-content tf-container">
	<div class="row">
			<div class="col-md-12">
				<?php get_template_part( 'tpl/page-title'); ?>
			</div>
		<div class="col-md-9">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
			<?php endwhile; // end of the loop. ?>
		</div>
		<div class="col-md-3">
			<?php 
				get_sidebar();
			?>
		</div>
	</div><!-- /.row -->
</div><!-- /.container -->
<?php get_footer(); ?>