<?php 
if (is_page() && is_page_template('tpl/front-page.php')) return;

$titles = themesflat_get_page_titles();
$title = $titles['title'] ? wp_kses_post($titles['title']) : '';

$page_title_alignment = themesflat_get_opt_elementor('page_title_alignment') ?: themesflat_get_opt('page_title_alignment');

$term = get_queried_object();
$description = $term->description ?? '';
$show_category_list = themesflat_get_opt('show_category_list');
if (themesflat_get_opt_elementor('show_category_list') != '') {
    $show_category_list = themesflat_get_opt_elementor('show_category_list');
}
$style_category_list = themesflat_get_opt('style_category_list');
if (themesflat_get_opt_elementor('style_category_list') != '') {
    $style_category_list = themesflat_get_opt_elementor('style_category_list');
}
?>

<!-- Breadcrumb -->
<div class="bg-surface2-color tf-breadcrumb">
    <div class="tf-container">
        <?php if (themesflat_get_opt('breadcrumb_enabled')) themesflat_breadcrumb(); ?>
    </div>
</div>

<?php if ( !is_singular('post') ): ?>

<!-- Page Title -->
<div class="page-title main-page-title style-default <?php echo esc_attr($page_title_alignment); ?>">
    <div class="tf-container">
        <div class="title d-flex align-items-center gap_16">
            <?php 
            if (themesflat_get_opt('page_title_heading_enabled')) {
                echo '<h1 class="mb_12">' . $title . '</h1>';
            }

            $count = 0;

                if (is_category() && isset($term->term_id)) {
                    $count = get_category($term->term_id)->count;
                }

            ?>
            <?php if (themesflat_get_opt('page_title_heading_count') == 1): ?>
                <?php if (is_category()): ?>
                    <span class="tag text-caption-1 text_white_light"><?php echo esc_html($count); ?> <?php esc_html_e('article','zeng'); ?></span>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php if (themesflat_get_opt('page_title_description') == 1): ?>
            <?php if (!empty($description)): ?>
                <p><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Category List -->
<?php if ($show_category_list == 1): ?>
    <div class="list-features-post sw-layout pt-0">
        <div class="tf-container">
            <div class="swiper sw-layout wrap-tag-categories <?php echo esc_attr($style_category_list == 'style2' ? 'style-1' : ''); ?>"
                data-preview="auto" data-destop="auto"
                data-tablet="auto" data-mobile="auto"
                data-space-lg="12" data-space-md="12" data-space="12">
                
                <div class="sw-button style-default text_primary-color nav-prev-layout">
                    <i class="icon-CaretLeft"></i>
                </div>

                <div class="swiper-wrapper">
                    <?php
                    $categories = get_categories([
                        'taxonomy' => 'category',
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => true,
                    ]);

                    // Repeat categories 3 times as original code
                    for ($i = 0; $i < 3; $i++) {
                        foreach ($categories as $category) {
                            $link = get_category_link($category->term_id);
                            ?>
                            <div class="swiper-slide">
                                <a href="<?php echo esc_url($link); ?>" class="tag text_on-surface-color <?php echo esc_attr($style_category_list == 'style1' ? 'text-body-2' : 'h6'); ?>">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="sw-button <?php echo esc_attr($style_category_list == 'style1' ? 'style-default text_primary-color nav-next-layout' : 'style-cycle text_primary-color nav-next-layout'); ?>">
                    <i class="icon-CaretRight"></i>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php endif; ?>