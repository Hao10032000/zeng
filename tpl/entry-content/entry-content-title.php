<?php  
/**
 * @package zeng
 */
?>

	<?php
	if ( is_singular('post') ) :						
		the_title( '<h3 class="title">', '</h3>' );
	else :
		the_title( sprintf( '<h3 class="title"><a href="%s" class="link" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
	endif;
	?>										
