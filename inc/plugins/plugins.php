<?php
// Register action to declare required plugins
add_action('tgmpa_register', 'themesflat_recommend_plugin');
function themesflat_recommend_plugin() {
    
    $plugins = array(
        array(
            'name' => esc_html__('Elementor', 'zeng'),
            'slug' => 'elementor',
            'required' => true
        ),
        array(
            'name' => esc_html__('ThemesFlat Core', 'zeng'),
            'slug' => 'plugin-core',
            'source' => THEMESFLAT_DIR . 'inc/plugins/plugin-core.zip',
            'required' => true
        ),
        array(
            'name' => esc_html__('Contact Form 7', 'zeng'),
            'slug' => 'contact-form-7',
            'required' => false
        ),    
        array(
            'name' => esc_html__('Mailchimp', 'zeng'),
            'slug' => 'mailchimp-for-wp',
            'required' => false
        ),       
        array(
            'name' => esc_html__('One Click Demo Import', 'zeng'),
            'slug' => 'one-click-demo-import',
            'required' => false
        )   
    );
    
    tgmpa($plugins);
}

