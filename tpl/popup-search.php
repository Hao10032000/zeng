    <!-- .open-search -->
    <div class="offcanvas offcanvas-top offcanvas-search" id="canvasSearch">
        <button class="btn-close-search" type="button" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="icon-X"></i>
        </button>
        <div class="offcanvas-body">
            <div class="tf-container w-xl">
                <div class="wrap-form">
                    <h5 class="title"><?php echo esc_html(themesflat_get_opt('heading_search')); ?>  </h5>                   
                    <?php get_themesflat_search_form('style-1'); ?>
                </div>

                <div class="popular-searches">
                    <h5 class="title"><?php echo esc_html(themesflat_get_opt('heading_search_category')); ?>  </h5>                   
                    <ul class="list d-flex align-items-center flex-wrap ">
                        <?php
                        $categories = get_categories([
                            'taxonomy' => 'category',
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => true,
                        ]);

                            foreach ($categories as $category) {
                                $link = get_category_link($category->term_id);
                                ?>
                                <li><a href="<?php echo esc_url($link); ?>" class="text-body-1 text_on-surface-color fw-7"><?php echo esc_html($category->name); ?></a></li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>

                <div class="tf-line "></div>
                <div class="trending">
                    <h5 class="title"><?php echo esc_html(themesflat_get_opt('heading_search_blog')); ?>  </h5>                   
                    <div class="tf-grid-layout lg-col-3 md-col-2">
                        <?php 
                             $query_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 6
                            );
                            $flat_post = new WP_Query( $query_args );
                        ?>
                        <?php if ( $flat_post->have_posts() ) : ?>
			            <?php while ( $flat_post->have_posts() ) : $flat_post->the_post(); ?>

                            <div class="feature-post-item style-small d-flex align-items-center hover-image-rotate item-grid ">
                                <a href="<?php the_permalink(); ?>" class="img-style">
                                    <?php 
                                        the_post_thumbnail( 'thumbnail' );
                                    ?>
                                </a>
                                <div class="content">

                                        <ul class="meta-feature text-caption-2 fw-7 text_secodary-color d-flex align-items-center mb_8 text-uppercase">
                                            <?php $author_id = get_post_field('post_author', get_the_ID());
                                                echo '<li>';   
                                                    echo get_the_date();
                                                echo '</li>';
                                                echo '<li>';
                                                    printf(
                                                        ' <a class="link" href="%s" title="%s" rel="author">%s</a>',
                                                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
                                                        esc_attr( sprintf( __( '%s', 'zeng' ), get_user_full_name($author_id) )),
                                                        get_user_full_name($author_id)
                                                    );
                                                echo '</li>';
                                            ?>
                                        </ul>
                                    <?php the_title( sprintf( '<h6 class="title"><a href="%s" class="link line-clamp-2" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>                        

                                </div>
                            </div>

                        <?php endwhile; ?>
		                	<?php wp_reset_postdata(); ?>
		                	<?php else : ?>  
                            <p><?php esc_html_e('No posts found','zeng') ?></p>
		                <?php endif; ?>  
          
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.open-search -->