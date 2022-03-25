<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Fact extends BDevs_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'fact';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Fact', 'bdevselement' );
    }

	public function get_custom_help_url() {
		return 'http://elementor.bdevs.net//widgets/fact/';
	}

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-save-o';
    }

    public function get_keywords() {
        return [ 'fact', 'image', 'counter' ];
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                    'style_3' => __( 'Style 3', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );
        $this->end_controls_section(); 

        $this->start_controls_section(
            '_section_media',
            [
                'label' => __('Icon / Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_10'],
                ],
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => __('Media Type', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'bdevselement'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'bdevselement'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        } else {
            $this->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        }

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Desccription', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_10'],
                ],
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Heading Title',
                'placeholder' => __('Heading Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Desccription', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Heading Desccription Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2'],
                ],
            ]
        );

        $this->add_control(
            'feature_info',
            [
                'label' => __('Feature Info', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Feature Info Content', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'bdevselement'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => __('H2', 'bdevselement'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => __('H3', 'bdevselement'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => __('H4', 'bdevselement'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => __('H5', 'bdevselement'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => __('H6', 'bdevselement'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevselement'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();
 

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Fact List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'tab_bg_color',
            [
                'label' => __( 'BG Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#2371ff',
                'frontend_available' => true,
                'selectors' => [
                     '{{WRAPPER}} .fact-area-3::before, {{WRAPPER}} .theme-bg-blue   ' => 'background-color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        ); 

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __( 'Field condition', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                    'style_3' => __( 'Style 3', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );


        $repeater->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'bdevselement' ),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevselement' ),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ], 
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon',
                        'field_condition' => ['style_1','style_2','style_3'],
                    ]
                ]
            );
        } 
        else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon',
                        'field_condition' => ['style_1','style_2','style_3'],
                    ]
                ]
            );
        }  

        $repeater->add_control(
            'fact_text_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#FEC931',
                'frontend_available' => true,
                'selectors' => [
                     '{{WRAPPER}}  {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        );  

        $repeater->add_control(
            'number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Fact Number', 'bdevselement' ),
                'default' => __( '70', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );               

        $repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Type Sub Title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'description',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'label' => __( 'Description', 'bdevselement' ),
                'placeholder' => __( 'Type description here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(subtitle || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->end_controls_section();     

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Title & Desccription', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .counter__item .counter',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .counter__item .counter',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .counter__item .counter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blend_mode',
            [
                'label' => __( 'Blend Mode', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => __( 'Normal', 'bdevselement' ),
                    'multiply' => 'Multiply',
                    'screen' => 'Screen',
                    'overlay' => 'Overlay',
                    'darken' => 'Darken',
                    'lighten' => 'Lighten',
                    'color-dodge' => 'Color Dodge',
                    'saturation' => 'Saturation',
                    'color' => 'Color',
                    'difference' => 'Difference',
                    'exclusion' => 'Exclusion',
                    'hue' => 'Hue',
                    'luminosity' => 'Luminosity',
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .counter' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        // subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Sub Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .cta__content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .cta__content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .counter__item .cta__content span',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'subtitle',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .counter__item .cta__content span',
            ]
        );

        $this->add_control(
            'heading_subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .counter__item .cta__content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // content

        $this->add_control(
            '_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Content', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_desc_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_desc_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desccription',
                'selector' => '{{WRAPPER}} .counter__item span',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'desccription',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .counter__item span',
            ]
        );

        $this->add_control(
            'heading_desc_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .counter__item span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

                // Button style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevs-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_service_button_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title section__title-3' );

        // button
        if (!empty($settings['button_link'])) {
            $this->add_inline_editing_attributes( 'button_text', 'none' );
            $this->add_render_attribute( 'button_text', 'class', 'bdevs-btn-text' );
            $this->add_render_attribute( 'button', 'class', 'w-btn w-btn-purple w-100 bdevs-btn' );
            $this->add_link_attributes( 'button', $settings['button_link'] );
        }

        $this->add_inline_editing_attributes( 'description', 'intermediate' );
        $this->add_render_attribute( 'description', 'class', 'bdevs-card-text' );

        if ( empty( $settings['slides'] ) ) {
            return;
        }
        ?>

        <?php if ( $settings['design_style'] === 'style_1' ): ?>

        <section class="fact-area">
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $key => $slide ) : ?>
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="afact mb-30 wow fadeInUp2" data-wow-delay=".3s">
                            <div class="afact--img mb-20">
                                <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                                    $this->get_render_attribute_string( 'image' );
                                    $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                    ?>
                                    <figure>
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                    </figure>
                                    <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                    <figure>
                                        <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                    </figure>
                                <?php endif; ?>
                            </div>
                            <div class="afact--text">
                                <div class="afact--text__title">
                                    <h2><?php echo bdevs_element_kses_basic( $slide['number'] ); ?></h2>
                                </div>
                                <div class="afact--text__content">
                                    <?php if ( !empty( $slide['subtitle'] ) ) : ?>
                                    <h4><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></h4>
                                    <?php endif; ?>
                                    <?php if ( !empty( $slide['description'] ) ) : ?>
                                    <h3><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ): ?>

        <section class="fact-area-3 m-0 z-index">
            <div class="custom-container">
                <div class="theme-bg-blue pt-90 pb-65 z-index ">
                    <div class="row">
                        <?php foreach ( $settings['slides'] as $key => $slide ) : ?>
                        <div class="col-xl-3 col-sm-6">
                            <div class="afact__3 mb-30 wow fadeInUp2" data-wow-delay=".3s">
                                <div class="afact__3--icon">
                                    <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                                        $this->get_render_attribute_string( 'image' );
                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                        <figure>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                        </figure>
                                        <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                        <figure>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                        </figure>
                                    <?php endif; ?>
                                </div>
                                <div class="afact__3--text">
                                    <?php if ( !empty( $slide['number'] ) ) : ?>
                                    <h2><?php echo bdevs_element_kses_basic( $slide['number'] ); ?></h2>
                                    <?php endif; ?>
                                    <?php if ( !empty( $slide['description'] ) ) : ?>
                                    <span><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_3' ): 
            // bg_image
            if (!empty($settings['bg_image']['id'])) {
                $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
                if ( ! $bg_image ) {
                    $bg_image = $settings['bg_image']['url'];
                }
            }    
        ?>

        <section class="choose-fact-area">
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $key => $slide ) : ?>
                    <div class="col-xl-3 col-sm-6">
                        <div class="choose--fact text-center mb-30 wow fadeInUp2" data-wow-delay=".3s">
                            <div class="choose--fact__icon mb-25">
                                <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                                    $this->get_render_attribute_string( 'image' );
                                    $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                    ?>
                                    <figure>
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                    </figure>
                                    <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                    <figure>
                                        <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                    </figure>
                                <?php endif; ?>
                            </div>
                            <div class="choose--fact__text">
                                <?php if ( !empty( $slide['number'] ) ) : ?>
                                <h2><?php echo bdevs_element_kses_basic( $slide['number'] ); ?></h2>
                                <?php endif; ?>

                                <?php if ( !empty( $slide['description'] ) ) : ?>
                                <span><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_4' ): ?>
        <section class="counter-wraper">
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $slide ) :?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-couter single-couter-2 mb-30">
                            <div class="counter-icon">
                               <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                                $this->get_render_attribute_string( 'image' );
                                $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                ?>
                                <figure>
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                </figure>
                                <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                <figure>
                                    <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                </figure>
                                <?php endif; ?>
                            </div>
                            <div class="counter-text-box">
                                <?php if ( !empty( $slide['number'] ) ) : ?>
                                <h1><span class="counter"><?php echo bdevs_element_kses_basic( $slide['number'] ); ?> </span>+</h1>
                                <?php endif; ?>
                                
                                <?php if ( !empty( $slide['subtitle'] ) ) : ?>
                                <h3><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></h3>
                                <?php endif; ?>

                                <?php if ( !empty( $slide['description'] ) ) : ?>   
                                <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>        

        <?php elseif ( $settings['design_style'] === 'style_5' ): ?>
        <section class="fact-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-10">
                        <div class="section-title pos-rel mb-45">
                            <div class="section-text section-text-white pos-rel">
                                <?php if ( $settings['sub_title'] ) : ?>
                                <h5 class="sub-title"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></h5>
                                <?php endif; ?>
                                <?php if ( $settings['title' ] ) : ?>
                                    <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                            tag_escape( $settings['title_tag'] ),
                                            $this->get_render_attribute_string( 'title_2' ),
                                            bdevs_element_kses_basic( $settings['title' ] )
                                        );
                                    ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ( !empty($settings['button_text']) ) : ?>
                        <div class="section-button section-button-left mb-30">
                            <!-- button one  -->
                            <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                $this->add_render_attribute( 'button', 'class', 'bt-btn site-btn-border' );
                                printf( '<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string( 'button' ),
                                    esc_html( $settings['button_text'] )
                                    );
                            elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                            <?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
                                if ( $settings['button_icon_position'] === 'before' ) :
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                    <?php
                                else :
                                    $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                    ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo $button_text; ?> <?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-lg-6 col-md-8">
                        <div class="cta-satisfied">
                            <?php foreach ( $settings['slides'] as $slide ) :?>
                            <div class="single-satisfied mb-50">
                                <?php if ( !empty( $slide['number'] ) ) : ?>
                                <h1><?php echo bdevs_element_kses_basic( $slide['number'] ); ?></h1>
                                <?php endif; ?> 

                                <h5> 
                                <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                                $this->get_render_attribute_string( 'image' );
                                $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                ?>
                                <figure>
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                </figure>
                                <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                <figure>
                                    <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                </figure>
                                <?php endif; ?> 

                                <?php if ( !empty( $slide['subtitle'] ) ) : ?>
                                <?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?>
                                <?php endif; ?>
                                </h5>
                                <?php if ( !empty( $slide['description'] ) ) : ?>   
                                <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <?php endif; ?>   

        <?php
    }
}
