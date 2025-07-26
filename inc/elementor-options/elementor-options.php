<?php 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use Elementor\Modules\DynamicTags\Module as TagsModule;


class themesflat_options_elementor {
	public function __construct(){	
        add_action('elementor/documents/register_controls', [$this, 'themesflat_elementor_register_options'], 10);
        add_action('elementor/editor/before_enqueue_scripts', function() { wp_enqueue_script( 'elementor-preview-load', THEMESFLAT_LINK . 'js/elementor/elementor-preview-load.js', array( 'jquery' ), null, true );
        }, 10, 3);
    }

    public function themesflat_elementor_register_options($element){
        $post_id = $element->get_id();
        $post_type = get_post_type($post_id);

        // if ( ($post_type !== 'post') ) {
        // 	$this->themesflat_options_page_header($element);
        //     $this->themesflat_options_page_footer($element);                      
        // }

        $this->themesflat_options_page($element);
        $this->themesflat_options_page_footer($element);

    }

    public function themesflat_options_page_footer($element) {
        // TF Page Title
        $element->start_controls_section(
            'themesflat_footer_options',
            [
                'label' => esc_html__('TF Footer', 'zeng'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );       

        $element->add_control(
            'hide_Footer',
            [
                'label'     => esc_html__( 'Hide Footer', 'zeng'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'zeng'),
                    'block'      => esc_html__( 'No', 'zeng'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} footer' => 'display: {{VALUE}};',
                ],
            ]
        ); 

        $element->end_controls_section();
    }

    public function themesflat_options_page($element) {
        // TF Page
        $element->start_controls_section(
            'themesflat_page_options',
            [
                'label' => esc_html__('TF Page', 'zeng'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'style_background',
            [
                'label'     => esc_html__( 'Style Background Page', 'zeng'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                	'' => esc_html__( 'Theme Setting', 'zeng'),
                    'page-background' => esc_html__( 'Page Background Image', 'zeng'),
                    'video' => esc_html__( 'Page Background Video', 'zeng'),
                ],
            ]
        );

        $element->add_control(
            'image_background',
            [
                'label'   => esc_html__( 'Custom Background Body', 'vineta' ),
                'type'    => Controls_Manager::MEDIA,
                'condition' => [ 'style_background' => 'page-background' ]
            ]
        );

        $element->add_control(
            'video_background',
            [
                'label'     => esc_html__( 'Select Video', 'finwice'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                	'' => esc_html__( 'Theme Setting', 'finwice'),
                    'video-1' => esc_html__( 'Video 1', 'finwice'),
                    'video-2' => esc_html__( 'Video 2', 'finwice'),
                    'video-3' => esc_html__( 'Video 3', 'finwice'),
                    'video-4' => esc_html__( 'Video 4', 'finwice'),
                    'video-5' => esc_html__( 'Video 5', 'finwice'),
                    'video-6' => esc_html__( 'Video 6', 'finwice'),
                    'video-7' => esc_html__( 'Video 7', 'finwice'),
                    'video-8' => esc_html__( 'Video 8', 'finwice'),
                    'video-9' => esc_html__( 'Video 9', 'finwice'),
                    'video-10' => esc_html__( 'Video 10', 'finwice'),
                    'video-11' => esc_html__( 'Video 11', 'finwice'),
                ],
                'condition' => [ 'style_background' => 'video' ]
            ]
        );

        $element->end_controls_section();
    }

}

new themesflat_options_elementor();