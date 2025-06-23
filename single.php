<?php
/**
 * The template for displaying all single posts.
 *
 * @package zeng
 */


$style_blog_single = themesflat_get_opt('style_blog_single');
if (themesflat_get_opt_elementor('style_blog_single') != '') {
    $style_blog_single = themesflat_get_opt_elementor('style_blog_single');
}
 
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


	<?php if( $style_blog_single == 'content-single' ): ?>

	<div class="heading-post">
		<div class="tf-container">
	        <div class="content text-center">
	            <div class="wrap-meta-feature d-flex align-items-center justify-content-center">
						<?php $categories = get_the_category(); if (!empty($categories)) {
                		    echo '<span class="tag">';
                		    foreach ($categories as $category) {
                		        $category_link = esc_url(get_category_link($category->term_id));
                		        $category_name = esc_html($category->name);
							
                		        echo '<a href="' . $category_link . '" class="text-title fw-7 text_white">' . $category_name . '</a> ';
                		    }
                		    echo '</span>';
                		} ?>
	                <ul class="meta-feature fw-7 d-flex mb_16 text-body-1 mb-0  align-items-center">
						<?php $author_id = get_post_field('post_author', get_the_ID());
        				    echo '<li>';   
        				        echo get_the_date();
        				    echo '</li>';
        				    echo '<li>';
        				        echo '<span class="text_secodary2-color">' . esc_html__( 'POST BY', 'zeng' ) . '</span>';
        				        printf(
        				            ' <a class="link" href="%s" title="%s" rel="author">%s</a>',
        				            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
        				            esc_attr( sprintf( __( 'POST BY %s', 'zeng' ), get_user_full_name($author_id) )),
        				            get_user_full_name($author_id)
        				        );
        				    echo '</li>';
        				?>
	                </ul>
	            </div>
	            <h1 class="mb_16"><?php the_title(); ?></h1>
	            <div class="user-post d-flex align-items-center justify-content-center gap_20">
	                <div class="avatar ">
	                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
	                </div>
	                <p class="fw-7">        				     <?php
    $author_id = get_post_field('post_author', get_the_ID());

    echo '<span class="text_secodary2-color">' . esc_html__( 'POST BY', 'zeng' ) . '</span>';
    
    printf(
        ' <a class="link" href="%s" title="%s" rel="author">%s</a>',
        esc_url( get_author_posts_url( $author_id ) ),
        esc_attr( sprintf( __( 'POST BY %s', 'zeng' ), get_user_full_name($author_id) ) ),
        esc_html( get_user_full_name($author_id) )
    );
?></p>
	            </div>
	        </div>
	        <div class="thumbs-post">
				<?php echo get_the_post_thumbnail( get_the_ID(), 'themesflat-blog-single' ); ?>
	        </div>
		</div>
	</div>

	<?php else: ?>

	<div class="heading-post style-1">
        <div class="tf-container ">
            <div class="post-inner">
                <div class="content ">
                    <div class="wrap-meta-feature d-flex align-items-center">
						<?php $categories = get_the_category(); if (!empty($categories)) {
                		    echo '<span class="tag">';
                		    foreach ($categories as $category) {
                		        $category_link = esc_url(get_category_link($category->term_id));
                		        $category_name = esc_html($category->name);
							
                		        echo '<a href="' . $category_link . '" class="text-title fw-7 text_white">' . $category_name . '</a> ';
                		    }
                		    echo '</span>';
                		} ?>
                        <ul class="meta-feature fw-7 d-flex mb_16 text-body-1 mb-0 align-items-center">
							<?php $author_id = get_post_field('post_author', get_the_ID());
        					    echo '<li>';   
        					        echo get_the_date();
        					    echo '</li>';
        					    echo '<li>';
        					        echo '<span class="text_secodary2-color">' . esc_html__( 'POST BY', 'zeng' ) . '</span>';
        					        printf(
        					            ' <a class="link" href="%s" title="%s" rel="author">%s</a>',
        					            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
        					            esc_attr( sprintf( __( 'POST BY %s', 'zeng' ), get_user_full_name($author_id) )),
        					            get_user_full_name($author_id)
        					        );
        					    echo '</li>';
        					?>
                        </ul>
                    </div>
	            	<h1 class="mb_20"><?php the_title(); ?></h1>
                    <div class="user-post d-flex align-items-center  gap_20">
                        <div class="avatar ">
	                    	<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                        </div>
                        <p class="fw-7">        				     <?php   echo '<span class="text_secodary2-color">' . esc_html__( 'POST BY', 'zeng' ) . '</span>';
        				        printf(
        				            ' <a class="link" href="%s" title="%s" rel="author">%s</a>',
        				            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
        				            esc_attr( sprintf( __( 'POST BY %s', 'zeng' ), get_user_full_name($author_id) )),
        				            get_user_full_name($author_id)
        				        ); ?></p>
                    </div>
                </div>
                <div class="thumbs-post">
					<?php echo get_the_post_thumbnail( get_the_ID(), 'themesflat-blog-single-2' ); ?>
                </div>
            </div>
        </div>
    </div>

	<?php endif; ?>


	<?php if( $style_blog_single == 'content-single' ): ?>

	<div class="single-post">
		<div class="tf-container">
			<div class="row">
				<?php if( themesflat_get_opt('show_social_share') == 1 ): ?>
					<div class="col-lg-3">
						<?php 
							themesflat_social_single();
						?>
					</div>
				<?php endif; ?>
				<div class="<?php echo esc_attr(themesflat_get_opt('show_social_share') == 1 ? 'col-lg-6' : 'col-lg-12');  ?>">
					<div class="post-details">

						<div class="content-single">
							<?php the_content(); ?>
						</div>

						<?php if( themesflat_get_opt('show_entry_footer_content') == 1 ): ?>
							<?php themesflat_entry_footer(); ?>
						<?php endif; ?>

						<?php if( themesflat_get_opt('show_author_box') == 1 ): ?>
						<!-- author -->
						<?php 
							$user_id = get_the_author_meta('ID');
							$facebook   = get_user_meta($user_id, 'facebook', true);
							$twitter    = get_user_meta($user_id, 'twitter', true);
							$instagram  = get_user_meta($user_id, 'instagram', true);
							$pinterest  = get_user_meta($user_id, 'pinterest', true);
							$author_id = get_post_field('post_author', get_the_ID());
							?>
							<?php if ( get_the_author_meta( 'description' ) ): ?>

								<h4 class="title mb_24"><?php esc_html_e('About The Author', 'zeng') ?></h4>

								<div class="box-author">
                                    <div class="info text-center">
                                        <div class="avatar mb_12">
                                            <?php
											echo get_avatar(get_the_author_meta('user_email'),$size='100');
											?>	
                                        </div>
                                        <h6 class="mb_4"><?php echo get_user_full_name($author_id); ?></h6>
                                        <p class="text-caption-1"><?php echo get_user_meta($user_id, 'address', true); ?></p>
                                    </div>
                                    <div class="content">
                                        <p class="mb_20">												<?php 
												echo get_the_author_meta( 'description' );
												?>	</p>
										<?php if( !empty($facebook) || !empty($twitter) || !empty($pinterest) || !empty($instagram) ): ?>
                                        <ul class="social">
											<?php if ($facebook) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($facebook) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-FacebookLogo"></i></a></li>';
											} ?>
												<?php if ($twitter) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($twitter) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-XLogo"></i></a></li>';
											} ?>
												<?php if ($pinterest) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($pinterest) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-PinterestLogo"></i></a></li>';
											} ?>
												<?php if ($instagram) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($instagram) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="InstagramLogo"></i></a></li>';
											} ?>
                                        </ul>
									<?php endif; ?>
                                    </div>
                                </div>
							<?php endif; ?>
						<!-- /author -->
						<?php endif; ?>

						<!-- navigator post -->
						<?php if( themesflat_get_opt('show_post_navigator') == 1 ): ?>
							<?php themesflat_post_navigation(); ?>
						<?php endif; ?>
						<!-- navigator post -->

						<!-- comment -->

							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						<!-- comment -->

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php else: ?>

	<div class="single-post style-1">
		<div class="tf-container">
			<div class="row">
				<?php if( themesflat_get_opt('show_social_share') == 1 ): ?>
					<div class="col-lg-2 lg-hide">
						<?php 
							themesflat_social_single();
						?>
					</div>
				<?php endif; ?>
				<div class="<?php echo esc_attr(themesflat_get_opt('show_social_share') == 1 ? 'col-lg-10 has-social' : 'col-lg-12 no-social');  ?>">

					<div class="content-inner">
						<div class="wrap-post-details">
												<div class="post-details">

						<div class="content-single">
							<?php the_content(); ?>
						</div>

						<?php if( themesflat_get_opt('show_entry_footer_content') == 1 ): ?>
							<?php themesflat_entry_footer(); ?>
						<?php endif; ?>

						<!-- navigator post -->
						<?php if( themesflat_get_opt('show_post_navigator') == 1 ): ?>
							<?php themesflat_post_navigation(); ?>
						<?php endif; ?>
						<!-- navigator post -->

						<!-- comment -->

							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						<!-- comment -->

					</div>
						</div>
						<div class="overlay-sidebar"></div>
						<div class="show-sidebar sidebar-btn">
							<div class="icon">
								<div class="bars" id="bar1"></div>
								<div class="bars" id="bar2"></div>
								<div class="bars" id="bar3"></div>
							</div>
						</div>
						<div class="sidebar handle-sidebarblog">

							<?php if( themesflat_get_opt('show_author_box') == 1 ): ?>
							<?php 							$user_id = get_the_author_meta('ID');
							$facebook   = get_user_meta($user_id, 'facebook', true);
							$twitter    = get_user_meta($user_id, 'twitter', true);
							$instagram  = get_user_meta($user_id, 'instagram', true);
							$author_id = get_post_field('post_author', get_the_ID());
							$pinterest  = get_user_meta($user_id, 'pinterest', true); ?>
							<div class="sidebar__item about text-center">
                                    <h5 class="sidebar__title "><?php esc_html_e('About Write', 'zeng') ?></h5>
                                    <div class="box-author style-1 sidebar__item mb-0">
                                        <div class="info text-center">
                                            <div class="avatar mb_30">
												<?php
												echo get_avatar(get_the_author_meta('user_email'),$size='200');
												?>
                                            </div>
                                            <h4 class="mb_4"><?php echo get_user_full_name($author_id); ?></h4>
                                            <p class="text-body-1"><?php echo get_user_meta($user_id, 'address', true); ?></p>
                                        </div>
										<?php if( !empty($facebook) || !empty($twitter) || !empty($pinterest) || !empty($instagram) ): ?>
                                        <ul class="social">
											<?php if ($facebook) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($facebook) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-FacebookLogo"></i></a></li>';
											} ?>
												<?php if ($twitter) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($twitter) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-XLogo"></i></a></li>';
											} ?>
												<?php if ($pinterest) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($pinterest) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-PinterestLogo"></i></a></li>';
											} ?>
												<?php if ($instagram) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($instagram) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="InstagramLogo"></i></a></li>';
											} ?>
                                        </ul>
									<?php endif; ?>
                                    </div>
                                </div>
							<?php endif; ?>

							<?php 
								get_sidebar();
							?>
						</div>
					</div>

					

				</div>
			</div>
		</div>
	</div>			
	
	<?php endif; ?>
	
	<?php endwhile; // end of the loop. ?>
	
	<?php get_template_part( 'tpl/related-post' ); ?>

<?php get_footer(); ?>