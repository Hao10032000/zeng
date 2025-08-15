<?php
$feature_post = '';
$thumbnail = get_the_post_thumbnail( get_the_ID(), 'full' );

if ( $thumbnail ) {
    $feature_post .= '<a href="' . get_permalink() . '">' . $thumbnail . '</a>';
}

if ( $feature_post ) {
    echo '<div class="featured-post">' . $feature_post . '</div>';
}
?>
