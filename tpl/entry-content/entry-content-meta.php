<?php  
/**
 * @package zeng
 */
?>
<?php 
echo '<div class="meta-feature fw-7 d-flex mb_16 text-body-1">';
    $meta_elements = themesflat_layout_draganddrop(themesflat_get_opt( 'meta_elements' ));
    $author_id = get_post_field('post_author', get_the_ID());
    foreach ( $meta_elements as $meta_element ) :
        if ( 'date' == $meta_element ) {
            echo '<li>';   
                echo get_the_date();
            echo '</li>';
        } 
    endforeach;
echo '</div>';
?>

