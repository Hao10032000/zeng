<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package zeng
 */

?>

<?php 
$template_action_box_id = themesflat_get_opt( 'template_action_box' );
echo do_shortcode('[my_elementor_template id='. $template_action_box_id .']'); ?>

</div><!-- #main-content -->



<footer>
    <p class="font-3 text_secondary-color text-center">
        <?php echo wp_kses_post(themesflat_get_opt( 'footer_copyright')); ?></p>
</footer>

</div><!-- /#boxed -->

<?php 
    $image_background = themesflat_get_opt('image_background');
    if (themesflat_get_opt_elementor('image_background') != '') {
        $image_background = themesflat_get_opt_elementor('image_background');
    }
    $style_background = themesflat_get_opt('style_background');
    if (themesflat_get_opt_elementor('style_background') != '') {
        $style_background = themesflat_get_opt_elementor('style_background');
    }
    $video_option = themesflat_get_opt('video_background');
    if (themesflat_get_opt_elementor('video_background') != '') {
        $video_option = themesflat_get_opt_elementor('video_background');
    }
    if ($style_background == 'page-background'): ?>
<div class="body-overlay d-block">
    <img src="<?php echo esc_url($image_background); ?>" alt="background body" />
</div>
<?php else: ?>

<?php 
        $video_data = '';
        $base_url = 'https://micare.vithemes.com/wp-content/demo/video/';

        if ($video_option === 'video-1') {
            $video_data = $base_url . 'video1.mp4';
        } elseif ($video_option === 'video-2') {
            $video_data = $base_url . 'video2.mp4';
        } elseif ($video_option === 'video-3') {
            $video_data = $base_url . 'video3.mp4';
        } elseif ($video_option === 'video-4') {
            $video_data = $base_url . 'video4.mp4';
        } elseif ($video_option === 'video-5') {
            $video_data = $base_url . 'video5.mp4';
        } elseif ($video_option === 'video-6') {
            $video_data = $base_url . 'video6.mp4';
        } elseif ($video_option === 'video-7') {
            $video_data = $base_url . 'video7.mp4';
        } elseif ($video_option === 'video-8') {
            $video_data = $base_url . 'video8.mp4';
        } elseif ($video_option === 'video-9') {
            $video_data = $base_url . 'video9.mp4';
        } elseif ($video_option === 'video-10') {
            $video_data = $base_url . 'video10.mp4';
        } elseif ($video_option === 'video-11') {
            $video_data = $base_url . 'video11.mp4';
        }
    ?>
<video class="body-overlay" muted autoplay loop playsinline>
    <source src="<?php echo esc_url($video_data); ?>" type="video/mp4">
</video>



<?php endif; ?>



<?php wp_footer(); ?>

</body>
</html>