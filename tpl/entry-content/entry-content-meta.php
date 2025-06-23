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
        } elseif ( 'author' == $meta_element ) {
            echo '<li>';
                echo '<span class="text_secodary2-color">' . esc_html__( 'POST BY', 'zeng' ) . '</span>';
                printf(
                    ' <a class="link" href="%s" title="%s" rel="author" aria-label="author">%s</a>',
                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
                    esc_attr( sprintf( __( 'POST BY %s', 'zeng' ), get_user_full_name($author_id) )),
                    get_user_full_name($author_id)
                );
            echo '</li>';
        }
    endforeach;
echo '</div>';
?>

