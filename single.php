<?php
/**
 * The template for displaying all single posts.
 *
 * @package zeng
 */


get_header(); ?>
<div id="main-content" class="main-content tf-container w-3">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <?php get_template_part( 'tpl/page-title'); ?>
            </div>
        </div>
        <div class="col-md-12">

            <div class="wrap-features-post-single">
                <?php get_template_part('tpl/feature-post-single'); ?>
            </div>

            <div class="wrap-content-post-single">
                <div class="post-social-share">
                    <ul class="social">
                        <li>
                            <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>"
                                target="_blank">
                                <i class="icon-EnvelopeSimple"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"
                                target="_blank">
                                <i class="icon-X"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>"
                                target="_blank">
                                <i class="icon-LinkedIn"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://dribbble.com/" target="_blank">
                                <i class="icon-dribbble"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/" target="_blank">
                                <i class="icon-GitHub"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="blog-detail_heading">
                    <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                echo '<div class="meta-category">';
                foreach ($categories as $key => $cat) {
                    if ($key > 0) echo ' ';
                    echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" class="cat-badge">' . esc_html($cat->name) . '</a>';
                }
                echo '</div>';
            }
            ?>
                    <h3 class="title_detail text-linear"><?php the_title(); ?></h3>
                    <?php
            echo '<ul class="meta-feature">';
                $author_id = get_post_field('post_author', get_the_ID());
                echo '<li class="meta-item">';
                    echo '<span class="meta-label">Author</span>';
                    echo '<span class="meta-value">' . esc_html(get_the_author_meta('display_name', $author_id)) . '</span>';
                echo '</li>';
                echo '<li class="meta-item">';
                    echo '<span class="meta-label">Post Date</span>';
                    echo '<span class="meta-value">' . esc_html(get_the_date()) . '</span>';
                echo '</li>';
            echo '</ul>';
            ?>
                </div>

                <div class="popup-post-content">
                    <?php the_content(); ?>
                </div>

                <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
            </div>
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->
<?php get_footer(); ?>