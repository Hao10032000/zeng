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

        if ( ($post_type !== 'post') ) {
        	$this->themesflat_options_page_header($element);
            $this->themesflat_options_page_footer($element);                      
        }

        $this->themesflat_options_page($element);
        $this->themesflat_options_page_pagetitle($element);

        if ( $post_type == 'post' ) {
            $this->themesflat_options_blog($element);
        }

        if ( $post_type == 'services' ) {
            $this->themesflat_options_services($element);
        }

    }

    public function themesflat_options_page_header($element) {
        // TF Header
        $element->start_controls_section(
            'themesflat_header_options',
            [
                'label' => esc_html__('TF Header', 'zeng'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'style_header',
            [
                'label'     => esc_html__( 'Header Style', 'zeng'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                	'' => esc_html__( 'Theme Setting', 'zeng'),
                    'header-default' => esc_html__( 'Header Default', 'zeng'),
                    'header-02' => esc_html__( 'Header 02', 'zeng'),
                ],
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_pagetitle($element) {
        // TF Page Title
        $element->start_controls_section(
            'themesflat_pagetitle_options',
            [
                'label' => esc_html__('TF Page Title', 'zeng'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );       

        $element->add_control(
            'hide_pagetitle',
            [
                'label'     => esc_html__( 'Hide Page Title', 'zeng'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'zeng'),
                    'block'      => esc_html__( 'No', 'zeng'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} .main-page-title' => 'display: {{VALUE}};',
                ],
            ]
        ); 

        $element->add_control(
            'hide_breadcrumb',
            [
                'label'     => esc_html__( 'Hide BreadCrumb', 'zeng'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'zeng'),
                    'block'      => esc_html__( 'No', 'zeng'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} .tf-breadcrumb' => 'display: {{VALUE}};',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'pagetitle_padding',
            [
                'label' => esc_html__( 'Padding', 'zeng' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .main-page-title' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        ); 

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'pagetitle_bg',
                'label' => esc_html__( 'Background', 'zeng' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .main-page-title',
            ]
        );

        $element->add_control(
            'list_category_heading',
            [
                'label'     => esc_html__( 'List Category', 'zeng'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_control(
            'show_category_list',
            [
                'label'     => esc_html__( 'Category List', 'zeng'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'zeng'),
                    0       => esc_html__( 'Hide', 'zeng'),
                    1       => esc_html__( 'Show', 'zeng'),                    
                ],
            ]
        );

        $element->add_control(
            'style_category_list',
            [
                'label'     => esc_html__( 'Style Category List', 'zeng'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'style1'       => esc_html__( 'Style 1', 'zeng'),
                    'style2'      => esc_html__( 'Style 2', 'zeng'),
                ],
            ]
        ); 

        $element->add_responsive_control(
            'category_list_padding',
            [
                'label' => esc_html__( 'Padding', 'zeng' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .list-features-post' => 'padding-top: {{TOP}}{{UNIT}} !important; padding-bottom: {{BOTTOM}}{{UNIT}} !important;',
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
            'main_content_heading',
            [
                'label'     => esc_html__( 'Main Content', 'zeng'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_control(
            'background_page',
            [
                'label' => esc_html__( 'Background Color', 'zeng' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #main-content' => 'background-color: {{VALUE}}; z-index: 999;',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'main_content_padding',
            [
                'label' => esc_html__( 'Padding', 'zeng' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'main_content_margin',
            [
                'label' => esc_html__( 'Margin', 'zeng' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'spacing_container',
            [
                'label'     => esc_html__( 'Container', 'zeng'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_responsive_control(

			'container_width',
			[
				'label'     => esc_html__( 'Container Width', 'zeng' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px','%','vh' ],
				'range'     => [
					'px' => [
						'min' => 1,
						'max' => 2500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-container ' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $element->end_controls_section();
    }

    public function themesflat_options_blog($element) {
        // TF Blog
        $element->start_controls_section(
            'themesflat_blog_options',
            [
                'label' => esc_html__('TF Blog', 'zeng'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'style_blog_single',
            [
                'label'     => esc_html__( 'Style Single Blog', 'zeng'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                	'' => esc_html__( 'Theme Setting', 'zeng'),
                    'content-single' => esc_html__( 'Style 1', 'zeng'),
                    'content-single2' => esc_html__( 'Style 2', 'zeng'),
                ],
            ]
        );


        $element->end_controls_section();
    }

        public function themesflat_options_page_footer($element) {
        // TF Footer
        $element->start_controls_section(
            'themesflat_footer_options',
            [
                'label' => esc_html__('TF Footer', 'zeng'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'footer_heading',
            [
                'label'     => esc_html__( 'Footer', 'zeng'),
                'type'      => Controls_Manager::HEADING,
            ]
        );       

        $element->add_control(
            'style_footer',
            [
                'label'     => esc_html__( 'Style Footer', 'zeng'),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'style1'       => esc_html__( 'Default with 3 Menu', 'zeng'),
                    'style2'      => esc_html__( 'Style 2 with 2 Menu', 'zeng'),
                ],
            ]
        );


        $element->end_controls_section();
    }

}

new themesflat_options_elementor();