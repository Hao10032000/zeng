<?php
$feature_post = '';
$feature_post .= get_the_post_thumbnail( get_the_ID(), 'full' );

if ( $feature_post ) {
    echo '<div class="featured-post">' . $feature_post . '</div>';
}
?>