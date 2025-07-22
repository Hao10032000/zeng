<?php  
/**
 * @package zeng
 */
?>
<?php 
echo '<div class="meta-feature">';
    $author_id = get_post_field('post_author', get_the_ID());
    echo '<li>';   
        echo get_the_date();
    echo '</li>';
echo '</div>';
?>

