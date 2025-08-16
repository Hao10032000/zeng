<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package zeng
 */

?>
<!-- section-contact-->
<div id="contact" class="section-contact style-1 section spacing-6">
    <div class="tf-container w-3">
    <div class="row">
        <div class="col-lg-5">
            <div class="heading-section mb_44">
                <div class="tag-heading text-uppercase text-label font-3 letter-spacing-1 mb_33">
                    Contact
                </div>
                <div class="title mb_40">
                    <h3 class="text_white  fw-5 animationtext clip ">Lets <span
                            class="tf-text s1 cd-words-wrapper text_primary-color">
                            <span class="item-text is-visible">Design</span>
                            <span class="item-text is-hidden">Create</span>
                            <span class="item-text is-hidden">Craft</span>
                        </span>
                        Incredible
                    </h3>
                    <h3 class="text_white title fw-5 "> Work Together</h3>
                </div>
                <div class="heading-title">
                    <div class="mb_12">
                        <h4 class="text_white fw-4 mb_4"><a href="#"
                                class="hover-underline-link link">themesflat@gmail.com</a></h4>
                        <p class="text-caption-2 text_secondary-color font-3">Based in San Francisco, CA
                        </p>
                    </div>
                    <ul class="list-icon d-flex">
                        <li><a href="#" class="icon-LinkedIn"></a></li>
                        <li> <a href="#" class="icon-GitHub"></a></li>
                        <li><a href="#" class="icon-X"></a></li>
                        <li><a href="#" class="icon-dribbble"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <form class="form-contact bs-light-mode">
                <div class="d-grid gap_24  mb_24">
                    <fieldset class="">
                        <input id="name" type="text" placeholder="Your name" name="name" tabindex="2"
                            aria-required="true" required="">
                    </fieldset>
                    <fieldset class="">
                        <input class="" type="email" placeholder="Your email" name="email" tabindex="2" value=""
                            id="email" aria-required="true" required="">
                    </fieldset>
                    <fieldset>
                        <textarea id="message" class="" rows="4" placeholder="Your Message..." tabindex="2"
                            aria-required="true" required=""></textarea>
                    </fieldset>
                </div>

                <ul class="list-tag">
                    <li><a href="#" class="text_white text-body-1 font-3">
                            &lt; $1,000</a>
                    </li>
                    <li><a href="#" class="text_white text-body-1 font-3">$1,000 - $5,000</a></li>
                    <li><a href="#" class="text_white text-body-1 font-3">$5,000 - $10,000</a></li>
                    <li><a href="#" class="text_white text-body-1 font-3">$10,000 - 20,000</a></li>
                    <li><a href="#" class="text_white text-body-1 font-3">&lt; $20,000</a></li>
                </ul>

                <div class="button-submit">
                    <button class="tf-btn style-1 animate-hover-btn" type="submit">
                        <span>
                            Get Started !
                        </span>
                    </button>
                </div>
                <div class="item-shape">
                    <img src="images/item/small-comet.webp" loading="lazy" decoding="async" alt="item">
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<!-- End section-contact -->
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