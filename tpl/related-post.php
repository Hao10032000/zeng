<?php
if ( ! get_theme_mod( 'show_related_post' ) )
    return;
$grid_columns  = themesflat_get_opt( 'grid_columns_post_related' );
$grid_columns_tablet  = themesflat_get_opt( 'grid_columns_post_related_tablet' );
$grid_columns_mobile  = themesflat_get_opt( 'grid_columns_post_related_mobile' );
$grid_columns_mobile_small  = themesflat_get_opt( 'grid_columns_post_related_mobile_small' );
$readmore_text = themesflat_get_opt('blog_archive_readmore_text');
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$args = array(                    
    'post_status'         => 'publish',
    'post_type'           => 'post',
    'paged' => $paged,
    'ignore_sticky_posts' => true,
    'posts_per_page'      => themesflat_get_opt( 'number_related_post' ),
    'post__not_in' => array($post->ID),
); 

$categories = (array) get_the_category();

if ( empty( $categories ) )
    return;

$args['category'] = wp_list_pluck( $categories, 'slug' );

?>


<!-- related-post -->
<div class="tf-container sw-layout related-post">
    <?php if (!empty(themesflat_get_opt('heading_related'))): ?>
        <h3 class="mb_28"><?php echo esc_html(themesflat_get_opt('heading_related')) ?></h3>
    <?php endif; ?>
    <div class="swiper" data-preview="<?php echo esc_attr($grid_columns);  ?>" data-tablet="<?php echo esc_attr($grid_columns_tablet);  ?>" data-mobile="<?php echo esc_attr($grid_columns_mobile);  ?>" data-mobile-sm="<?php echo esc_attr($grid_columns_mobile_small);  ?>"
        data-space-lg="30" data-space-md="24" data-space="15">
        <div class="swiper-wrapper">

            <?php
$query = new WP_Query($args);
if( $query->have_posts() ) {
    while ($query->have_posts()) : $query->the_post(); ?>
            <div class="swiper-slide">
                <div class="feature-post-item style-default hover-image-translate item-grid ">
                    <div class="img-style mb_26">
                            <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'themesflat-blog-grid'); ?>
                    </div>
                    <div class="content">
                        <?php 
                        echo '<div class="meta-feature">';
                            echo get_the_date();
                        echo '</div>';
                        the_title( sprintf( '<h5 class="title"><a href="%s" class="link line-clamp-2" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
                        ?>
                      
                    </div>
                </div>
            </div>
    <?php
    endwhile;
}
wp_reset_postdata();            
?>



        </div>
        <div class="sw-dots sw-pagination-layout mt_22 justify-content-center d-flex ">
        </div>
    </div>
</div>
<!-- /End related-post -->
