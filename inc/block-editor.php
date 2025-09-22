<?php
/**
 * Block Editor support
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function zeng_register_block_assets() {
    // Custom block style
    register_block_style(
        'core/paragraph',
        array(
            'name'  => 'zeng-fancy-paragraph',
            'label' => __( 'Fancy Paragraph', 'zeng' ),
        )
    );

    // Custom block pattern
    register_block_pattern(
        'zeng/hero',
        array(
            'title'       => __( 'Hero Section', 'zeng' ),
            'description' => __( 'Hero heading + text + button.', 'zeng' ),
            'content'     => '<!-- wp:heading --><h2>'.esc_html__( 'Welcome to ZenG', 'zeng' ).'</h2><!-- /wp:heading -->',
        )
    );
}
add_action( 'init', 'zeng_register_block_assets' );
