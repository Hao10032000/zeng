<?php



global $the_query;

// Don't print empty markup if there's only one page.


if ( is_home() ) {
    // Trang blog: dùng custom WP_Query nếu cần thay đổi post_per_page
    $post_per_page = isset($_GET['post_per_page']) ? $_GET['post_per_page'] : themesflat_get_opt('blog_grid_number_post');
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $query_args = array(
        'post_type'      => 'post',
        'posts_per_page' => $post_per_page,
        'paged'          => $paged,
    );

    $query = new WP_Query( $query_args );
    $max_num_pages = $query->max_num_pages;
} else {
    // Trong category, tag, archive,... dùng query mặc định
    global $wp_query;
    $query = $wp_query;
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $max_num_pages = $wp_query->max_num_pages;
}

$pagenum_link = html_entity_decode( get_pagenum_link() );

$query_args   = array();

$url_parts    = explode( '?', $pagenum_link );



if ( isset( $url_parts[1] ) ) {

	wp_parse_str( $url_parts[1], $query_args );

}



$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );

$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';



$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';

$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';



// Set up paginated links.

$links = paginate_links( array(

	'base'     => $pagenum_link,

	'format'   => $format,

	'total'    => $query->max_num_pages,
	
	'current'  => $paged,

	'mid_size' => 1,

	'add_args' => array_map( 'urlencode', $query_args ),

	'prev_text' => ( '<i class="icon-CaretLeft"></i>' ),
	'next_text' => ( '<i class="icon-CaretRight"></i>' ),

) );



$numeric_links = paginate_links( array(

	'base'     => $pagenum_link,

	'format'   => $format,

	'total'    =>$query->max_num_pages,

	'current'  => $paged,

	'mid_size' => 1,

	'add_args' => array_map( 'urlencode', $query_args ),

	'prev_next' => false

) );



$next_link = get_next_posts_link( esc_html__( 'Next', 'zeng' ) );

$prev_link = get_previous_posts_link( esc_html__( 'Previous', 'zeng' ) );

$loadmore_text = apply_filters('themesflat/template/loadmore_text',esc_html__('Load More','zeng'));

$more_link = get_next_posts_link( esc_html( $loadmore_text) );

global $themesflat_paging_style;

global $themesflat_paging_for;

?>



<?php if ( $themesflat_paging_style == 'pager' && ! ( empty( $next_link ) && empty( $prev_link ) ) ): ?>



	<nav class="navigation paging-navigation pager <?php  echo esc_attr($themesflat_paging_for);?>" role="navigation">

		<div class="pagination loop-pagination">

			<?php echo wp_kses( $prev_link, themesflat_kses_allowed_html() ) ?>

			<?php echo wp_kses( $next_link, themesflat_kses_allowed_html() ) ?>

		</div>

	</nav>



<?php elseif ( $themesflat_paging_style == 'numeric' && ! empty( $numeric_links ) ): ?>



	<nav class="navigation paging-navigation numeric <?php  echo esc_attr($themesflat_paging_for);?>" role="navigation">

		<div class="pagination loop-pagination">

			<?php echo wp_kses( $numeric_links, themesflat_kses_allowed_html() ) ?>

		</div>

	</nav>



<?php elseif ( $themesflat_paging_style == 'loadmore' && ! empty( $next_link ) ): ?>

	

	<nav class="navigation paging-navigation loadmore <?php  echo esc_attr($themesflat_paging_for);?>" role="navigation">

		<div class="pagination loop-pagination text-center draw-border">

			<?php echo wp_kses( $more_link, themesflat_kses_allowed_html() ) ?>

		</div>

	</nav>



<?php elseif ( ! empty( $links ) ): ?>



	<nav class="navigation  paging-navigation pager-numeric <?php  echo esc_attr($themesflat_paging_for);?>" role="navigation">

		<div class="pagination loop-pagination">

			<?php echo wp_kses( $links, themesflat_kses_allowed_html() ) ?>

		</div>

	</nav>



<?php endif ?>