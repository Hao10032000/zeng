<?php 
$titles = themesflat_get_page_titles();    
ob_start();
if ( $titles['title'] ) { printf( '%s', wp_kses_post($titles['title']) ); }
$title = ob_get_clean();
?>

<?php 

    if ( themesflat_get_opt( 'breadcrumb_enabled' ) == 1 ):
        themesflat_breadcrumb();
    endif;  
                                
    if ( themesflat_get_opt('page_title_heading_enabled') == 1 ) {
        echo sprintf('<h2 class="page-title-heading">Blog Single</h2>', $title); 
    }
                          
?>
<div class="popup-post-wrapper">

    <!-- Feature Post -->
    <div class="wrap-features-post-single">
        <?php get_template_part('tpl/feature-post-single'); ?>
    </div>

    <!-- Content -->
    <div class="wrap-content-post-single">

        <!-- Social Share -->
        <div class="post-social-share">
            <ul class="social">
                <li>
                    <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" target="_blank">
                        <i class="icon-EnvelopeSimple"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank">
                        <i class="icon-X"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank">
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

        <!-- Heading -->
        <div class="blog-detail_heading">
            <?php
            $categories = get_the_category();
            if ( !empty($categories) ) {
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
                echo '<li class="meta-item"><span class="meta-label">Author</span>';
                echo '<span class="meta-value">' . esc_html(get_the_author_meta('display_name', $author_id)) . '</span></li>';
                echo '<li class="meta-item"><span class="meta-label">Post Date</span>';
                echo '<span class="meta-value">' . esc_html(get_the_date()) . '</span></li>';
            echo '</ul>';
            ?>
        </div>

            <div class="popup-post-content">
                <?php the_content(); ?>
                
                <?php themesflat_entry_footer(); 
                    themesflat_post_navigation();
                ?>
                <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                ?>
            </div>
    </div>

</div>
