    <div class="auto-popup" data-delay="2000" data-effect="bottom">
        <div class="popup-hire-me d-flex align-items-center ">
            <div class="avatar">
				<?php
				echo get_avatar(get_the_author_meta('user_email'),$size='200');
				?>
            </div>
            <div class="content">
                <h5 class="text_white"><?php echo esc_html(themesflat_get_opt('heading_freelancer')); ?></h5>
                <p class="text-body-1 text_white"><?php echo esc_html(themesflat_get_opt('heading_freelancer_subheading')); ?></p>
            </div>
            <?php if(themesflat_get_opt('freelancer_button_text')): ?>
                <a href="<?php echo esc_url(themesflat_get_opt('freelancer_button_url')); ?>" class="tf-btn btn-white btn-switch-text">
                    <span>
                        <span class="btn-double-text" data-text="<?php echo esc_attr(themesflat_get_opt('freelancer_button_text')); ?>"><?php echo esc_html(themesflat_get_opt('freelancer_button_text')); ?></span>
                    </span>
                </a>
            <?php endif; ?>
            <div class="close-btn">
                <i class="icon-XCircle"></i>
            </div>
        </div>
    </div>