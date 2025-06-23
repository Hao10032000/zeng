<?php
global $themesflat_thumbnail;

$size         = is_single() ? 'themesflat-blog' : $themesflat_thumbnail;
$feature_post = get_the_post_thumbnail(get_the_ID(), $size);

if ($feature_post) :
?>
    <div class="img-style">
        <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
        <?php echo wp_kses_post($feature_post); ?>

        <?php
        $meta_elements = themesflat_layout_draganddrop(themesflat_get_opt('meta_elements'));

        foreach ($meta_elements as $meta_element) {
            if ($meta_element === 'category') {
                $categories = get_the_category();

                if (!empty($categories)) {
                    echo '<span class="post-category">';
                    foreach ($categories as $category) {
                        $category_link = esc_url(get_category_link($category->term_id));
                        $category_name = esc_html($category->name);

                        echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
                    }
                    echo '</span>';
                }
            }

            if ($meta_element === 'read') {
                echo '<div class="tag time text-caption-2 text_white"><i class="icon-Timer"></i> ' . get_reading_time() . '</div>';
            }
        }
        ?>
    </div>
<?php endif; ?>
