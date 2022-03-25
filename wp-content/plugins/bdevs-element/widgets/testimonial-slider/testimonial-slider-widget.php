<?php

namespace BdevsElement\Widget;

use Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Testimonial_Slider extends BDevs_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'testimonial_slider';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __( 'Testimonial Slider', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/slider/';
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'eicon-blockquote';
    }

    public function get_keywords() {
        return ['slider', 'testimonial', 'gallery', 'carousel'];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label'              => __( 'Design Style', 'bdevselement' ),
                'type'               => Controls_Manager::SELECT,
                'options'            => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                    'style_3' => __( 'Style 3', 'bdevselement' ),
                    'style_4' => __( 'Style 4', 'bdevselement' ),
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        $this->end_controls_section();

        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Title', 'bdevselement' ),
                'placeholder' => __( 'Type Title', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'back-title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Back Title', 'bdevselement' ),
                'default' => __( 'Colors', 'bdevselement' ),
                'placeholder' => __( 'Type back title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );  

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', 'bdevselement'),
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('http://elementor.bdevs.net/', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label'   => __( 'Title HTML Tag', 'bdevselement' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __( 'H1', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h1',
                    ],
                    'h2' => [
                        'title' => __( 'H2', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h2',
                    ],
                    'h3' => [
                        'title' => __( 'H3', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h3',
                    ],
                    'h4' => [
                        'title' => __( 'H4', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h4',
                    ],
                    'h5' => [
                        'title' => __( 'H5', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h5',
                    ],
                    'h6' => [
                        'title' => __( 'H6', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h6',
                    ],
                ],
                'default' => 'h2',
                'toggle'  => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'     => __( 'Alignment', 'bdevselement' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'type'    => Controls_Manager::MEDIA,
                'label'   => __( 'Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();

        // icon
        $this->start_controls_section(
            '_section_mediad',
            [
                'label' => __( 'Icon / Image', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3'],
                ],
            ]
        );

        $this->add_control(
            'type',
            [
                'label'          => __( 'Media Type', 'bdevselement' ),
                'type'           => Controls_Manager::CHOOSE,
                'label_block'    => false,
                'options'        => [
                    'icon'  => [
                        'title' => __( 'Icon', 'bdevselement' ),
                        'icon'  => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevselement' ),
                        'icon'  => 'fa fa-image',
                    ],
                ],
                'default'        => 'icon',
                'toggle'         => false,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'image_icon',
            [
                'label'     => __( 'Image', 'bdevselement' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image',
                ],
                'dynamic'   => [
                    'active' => true,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'image_icon',
                'default'   => 'medium_large',
                'separator' => 'none',
                'exclude'   => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail',
                ],
                'condition' => [
                    'type' => 'image',
                ],
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
                'icon',
                [
                    'label'       => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type'        => Controls_Manager::ICON,
                    'options'     => bdevs_element_get_bdevs_element_icons(),
                    'default'     => 'fa fa-smile-o',
                    'condition'   => [
                        'type' => 'icon',
                    ],
                ]
            );
        } else {
            $this->add_control(
                'selected_icon',
                [
                    'type'             => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block'      => true,
                    'default'          => [
                        'value'   => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition'        => [
                        'type' => 'icon',
                    ],
                ]
            );
        }

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Slides', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type'    => Controls_Manager::MEDIA,
                'label'   => __( 'profile Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'model',
            [
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label'  => false,
                'placeholder' => __( 'Model', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( 'GH15', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1'],
                ], 
            ]
        );

        $repeater->add_control(
            'name',
            [
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label'  => false,
                'placeholder' => __( 'Name', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( 'logitec', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1'],
                ], 
            ]
        );

        $repeater->add_control(
            'price',
            [
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label'  => false,
                'placeholder' => __( 'Price', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( '$45', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1'],
                ], 
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1'],
                ], 
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1'],
                ], 
            ]
        );

        $repeater->add_control(
            'description',
            [
                'type'        => Controls_Manager::TEXTAREA,
                'label' => __( 'Description', 'bdevselement' ),
                'label_block' => true,
                'placeholder' => __( 'Description', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( 'Bdevs Description', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
            ]
        );

        $repeater->add_control(
            'author-name',
            [
                'type'        => Controls_Manager::TEXT,
                'label' => __( 'Author Name', 'bdevselement' ),
                'placeholder' => __( 'Name', 'bdevselement' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( 'Johson', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
            ]
        );

        $repeater->add_control(
            'author-designation',
            [
                'type'        => Controls_Manager::TEXT,
                'label' => __( 'Author Designation', 'bdevselement' ),
                'placeholder' => __( 'Designation', 'bdevselement' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( 'CEO', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
            ]
        );


        $this->add_control(
            'slides',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name || "Carousel Item"); #>',
                'default'     => [
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
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'thumbnail',
                'default'   => 'medium_large',
                'separator' => 'before',
                'exclude'   => [
                    'custom',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __( 'Slider Item', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'item_border',
                'selector' => '{{WRAPPER}} .bdevs-slick-item',
            ]
        );

        $this->add_responsive_control(
            'item_border_radius',
            [
                'label'      => __( 'Border Radius', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .bdevs-slick-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Slide Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label'      => __( 'Content Padding', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .bdevs-slick-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-slick-content',
                'exclude'  => [
                    'image',
                ],
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Title', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .bdevs-slick-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title',
                'selector' => '{{WRAPPER}} .bdevs-slick-title',
                'scheme'   => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_subtitle',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Subtitle', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-slick-subtitle',
                'scheme'   => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __( 'Navigation - Arrow', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label'        => __( 'Position', 'bdevselement' ),
                'type'         => Controls_Manager::POPOVER_TOGGLE,
                'label_off'    => __( 'None', 'bdevselement' ),
                'label_on'     => __( 'Custom', 'bdevselement' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label'      => __( 'Vertical', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition'  => [
                    'arrow_position_toggle' => 'yes',
                ],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label'      => __( 'Horizontal', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition'  => [
                    'arrow_position_toggle' => 'yes',
                ],
                'range'      => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label'      => __( 'Border Radius', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_arrow' );

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label'     => __( 'Background Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label'     => __( 'Background Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label'     => __( 'Border Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __( 'Navigation - Dots', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label'      => __( 'Vertical Position', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label'      => __( 'Spacing', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label'       => __( 'Alignment', 'bdevselement' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options'     => [
                    'left'   => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'toggle'      => true,
                'selectors'   => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_dots' );
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label'     => __( 'Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label'     => __( 'Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __( 'Active', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label'     => __( 'Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( empty( $settings['slides'] ) ) {
            return;
        }

        $title = bdevs_element_kses_basic( $settings['title'] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title section__title-4' );
        ?>
    <?php if ( $settings['design_style'] == 'style_3' ):


        $title = bdevs_element_kses_basic( $settings['title'] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title-5 mb-15' );


    ?>

        <section class="testimonial-area-3">
            <div class="container">
                <div class="testimonial-active-3 swiper-container pb-35">
                    <div class="swiper-wrapper">
                        <?php foreach ( $settings['slides'] as $slide ):
                            if ( !empty( $slide['image']['id'] ) ) {
                                $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            }
                        ?>
                        <div class="atestimonial__3 mb-30 swiper-slide wow fadeInUp2" data-wow-delay=".3s">
                            <div class="atestimonial__3--text mb-10">
                                <div class="atestimonial__3--text__rating mb-15">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <?php if ( $slide['message'] ): ?>
                                <p><?php echo bdevs_element_kses_basic( $slide['message'] ); ?></p>
                                <?php endif;?>
                            </div>
                            <div class="atestimonial__3--client">
                                <?php if ( !empty( $image ) ): ?>
                                <div class="atestimonial__3--client__img">
                                    <img src="<?php print esc_url( $slide['image']['url'] );?>" class="img-fluid" alt="img">
                                </div>
                                <?php endif;?>
                                <div class="atestimonial__3--client__text">
                                    <?php if ( !empty( $slide['designation_name'] ) ): ?>
                                    <span><?php echo bdevs_element_kses_basic( $slide['designation_name'] ); ?></span>
                                    <?php endif;?>

                                    <?php if ( !empty( $slide['client_name'] ) ): ?>
                                    <h4 class="atestimonial__3--client__text--title"><?php echo bdevs_element_kses_basic( $slide['client_name'] ); ?></h4>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                     <!-- If we need pagination -->
                     <div class="swiper-pagination2"></div>
                </div>
            </div>
        </section>
    <?php elseif ( $settings['design_style'] == 'style_2' ): 

        $title = bdevs_element_kses_basic( $settings['title'] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section-title testimonial-section-title' );
        if ( !empty( $settings['image']['id'] ) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }

    ?>

        <section class="testimonial-area black-bg">
            <div class="container">
                <div class="row">
                    <div class="swiper-container btestimonial-active">
                        <div class="swiper-wrapper">
                            <?php foreach ( $settings['slides'] as $slide ):
                                if ( !empty( $slide['image']['id'] ) ) {
                                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                }
                            ?>
                            <div class="testimonial-wrapper swiper-slide">
                                <div class="testimonial-content">
                                    <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?> </p>

                                </div>
                                <div class="b-testimonial-author">
                                    <?php if ( !empty( $image ) ): ?>
                                    <div class="b-author-img f-left">
                                        <img src="<?php print esc_url( $slide['image']['url'] );?>" alt="img">
                                    </div>
                                    <?php endif; ?>
                                    <div class="author-desc f-left">
                                        <h6><?php echo bdevs_element_kses_basic( $slide['author-name'] ); ?></h6>
                                        <span><?php echo bdevs_element_kses_basic( $slide['author-designation'] ); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php else:
            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'section-title text-white' );            

            if ( !empty( $settings['bg_image']['id'] ) ) {
                $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
            }
        ?>   



        <section class="featured-area black-bg pt-120 pb-100">
            <?php if ( $settings['back-title'] ) : ?>
            <span class="back-text2 d-none d-lg-block"><?php echo bdevs_element_kses_basic( $settings['back-title'] ); ?></span>
            <?php endif; ?>
            <div class="container">
                <div class="row">
                    <div class="section-title-wrapper mb-70">
                        <?php if ( $settings['title'] ) : ?>
                        <div class="fea-sce-title">
                            <h2 class="section-title"><?php echo bdevs_element_kses_basic( $settings['title'] ); ?></h2>
                        </div>
                        <?php endif; ?>

                        <div class="fea-hed-btn">
                            <a class="fea-btn" href="<?php echo esc_url( $settings['button_link'] ); ?>"><i class="fal fa-minus-circle"></i> <?php echo bdevs_element_kses_basic( $settings['button_text'] ); ?></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="swiper-container featured-active">
                        <div class="swiper-wrapper">
                            <?php foreach ( $settings['slides'] as $slide ):
                                if ( !empty( $slide['image']['id'] ) ) {
                                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                }
                            ?>
                            <div class="featured-wrapper swiper-slide mb-30 text-center">
                                <?php if ( !empty( $image ) ): ?>
                                <div class="featured-thumb mb-30">
                                    <img src="<?php print esc_url( $slide['image']['url'] );?>" alt="">
                                </div>
                                <?php endif; ?>

                                <div class="featured-content">
                                    <div class="featured-name">
                                        <h5><?php echo bdevs_element_kses_basic( $slide['model'] ); ?></h5>
                                        <h6><?php echo bdevs_element_kses_basic( $slide['name'] ); ?></h6>
                                        <span class="featured-price"><?php echo bdevs_element_kses_basic( $slide['price'] ); ?></span>
                                    </div>

                                    <div class="featured-cart-btn">
                                        <a href="<?php echo esc_url( $slide['button_link'] ); ?>"><i class="fal fa-plus-circle"></i> <?php echo bdevs_element_kses_basic( $slide['button_text'] ); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif;?>
        <?php
}
}
