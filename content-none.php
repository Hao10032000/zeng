<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package zeng
 */
?>

<section class="no-results not-found">
	<header class="result-header">
		<h1 class="result-title nothing"><?php esc_html_e( 'Nothing Found', 'zeng' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
			<?php
				$message = sprintf( 'Ready to publish your first post? <a href="%s">Get started here', esc_url(admin_url( 'post-new.php' ) ) );
                echo wp_kses( $message, wp_kses_post() );
			?>
			</p>

	</div><!-- .page-content -->
</section><!-- .no-results -->