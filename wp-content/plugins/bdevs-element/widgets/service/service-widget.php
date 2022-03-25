<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Service extends BDevs_El_Widget {

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
        return 'service';
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
        return __( 'Service', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/icon-box/';
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
        return 'eicon-preview-medium';
    }

    public function get_keywords() {
        return [ 'service', 'list', 'icon' ];
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
                    'style_4' => __( 'Style 4', 'bdevselement' ),
                    'style_5' => __( 'Style 5', 'bdevselement' ),
                    'style_6' => __( 'Style 6', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'shape_switch',
            [
                'label' => __('Shape Show/Hide', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
  

        // section title
        $this->start_controls_section(
            '_section_title_part',
            [
                'label' => __( 'Section Title & Desccription', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2'],
                ],            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs Info Box Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Sub Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_6'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs Info Box Title', 'bdevselement' ),
                'placeholder' => __( 'Type Info Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2','style_3','style_4','style_5']
                ],
            ]
        );


         $this->add_control(
            'description',
            [
                'label' => __( 'Desccription', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Desccription', 'bdevselement' ),
                'placeholder' => __( 'Type Your Desccription', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => [
                    'design_style' => ['style_1','style_2','style_3','style_4','style_5']
                ],
            ]
        );

        $this->add_control(
            'about_list',
            [
                'label' => __( 'About List', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'About List', 'bdevselement' ),
                'placeholder' => __( 'Type About List', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_5'],
                ],
            ]
        );

        $this->add_control(
            'title_url',
            [
                'label' => __( 'Title URL', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs title url goes here', 'bdevselement' ),
                'placeholder' => __( 'Set title URL', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'bdevselement' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'bdevselement' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'bdevselement' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'bdevselement' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'bdevselement' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'bdevselement' ),
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
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
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
            '_section_mediad',
            [
                'label' => __( 'Icon / Image', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1','style_2','style_3'],
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

        // button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1','style_2','style_5']
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
                'button_icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $this->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
            'button_icon_position',
            [
                'label' => __( 'Icon Position', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); 

        // _section_icon

        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __( 'Services List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' =>[
                    'design_style'=>['style_6']
                ]
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
                    'style_4' => __( 'Style 4', 'bdevselement' ),
                    'style_5' => __( 'Style 5', 'bdevselement' ),
                    'style_6' => __( 'Style 6', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );
        $repeater->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'bdevselement' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
            ]
        );

        $repeater->add_control(
            'background_overlay_opacity',
            [
                'label' => __( 'Opacity', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => .5,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'opacity: {{SIZE}};',
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
            ]
        );
        $repeater->add_control(
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

        $repeater->add_control(
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

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',

                    'condition' => [
                        'type' => 'icon',
                    ]
                ]
            );
        } else {
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
                    ]
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features Title', 'bdevselement' ),
                'placeholder' => __( 'Type Icon Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_3', 'style_4','style_2', 'style_6'],
                ], 
            ]
        );

        $repeater->add_control(
            'service_number',
            [
                'label' => __( 'Servive Number', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Servive Number', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_5'],
                ],
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Icon Description', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Button Text', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_6'],
                ], 
            ]
        );

        $repeater->add_control(
            's_url',
            [
                'label' => __( 'URL', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'URL Here', 'bdevselement' ),
                'condition' => [
                    'field_condition' => ['style_1','style_3', 'style_6'],
                ], 
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
                'title_field' => '<# print(title || "Carousel Item"); #>',
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
                    ]
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
                ]
            ]
        );

        $this->add_responsive_control(
            'align_slide',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_h_section_style_title',
            [
                'label' => __( 'Section Title & Desccription', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_h_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_heading_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_heading_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'htitle',
                'selector' => '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'htitle',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title',
            ]
        );

        $this->add_control(
            'h_heading_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'h_blend_mode',
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
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        $this->add_control(
            '_h_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_subheading_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_subheading_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subhtitle',
                'selector' => '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'subhtitle',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span',
            ]
        );

        $this->add_control(
            'h_subheading_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            '_h_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Content', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_heading_desc_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-left p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_heading_desc_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-left p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h_desccription',
                'selector' => '{{WRAPPER}} .features__content-left p',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'h_desccription',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .features__content-left p',
            ]
        );

        $this->add_control(
            'h_heading_desc_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .features__content-left p' => 'color: {{VALUE}};',
                ],
            ]
        );        

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_icon',
            [
                'label' => __( 'Icon', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon' => 'padding: {{SIZE}}{{UNIT}}',
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 150,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typ',
                'selector' => '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'selector' => '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i'
            ]
        );

        $this->add_responsive_control(
            'icon_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i'
            ]
        );

        $this->start_controls_tabs( '_tabs_icon' );

        $this->start_controls_tab(
            '_tab_icon_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_rotate',
            [
                'label' => __( 'Rotate Icon Box', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'default' => [
                    'unit' => 'deg',
                ],
                'range' => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'icon_bg_color!' => '',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_border_border!' => '',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_bg_rotate',
            [
                'label' => __( 'Rotate Icon Box', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'default' => [
                    'unit' => 'deg',
                ],
                'range' => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover .icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'icon_bg_color!' => '',
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .features__content-2 h3, {{WRAPPER}} .services__content h3',
                'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .features__content-2 h3, {{WRAPPER}} .services__content h3',
            ]
        );

        $this->start_controls_tabs( '_tabs_title' );

        $this->start_controls_tab(
            '_tab_title_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 h3 a, {{WRAPPER}} .services__content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_title_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 h3 a:hover, {{WRAPPER}} .services__content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_badge',
            [
                'label' => __( 'Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Typography', 'bdevselement' ),
                'exclude' => [
                    'font_family',
                    'line_height'
                ],
                'default' => [
                    'font_size' => ['']
                ],
                'selector' => '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p',
                'scheme' => Typography::TYPOGRAPHY_3,
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

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'description', 'none' );
        $this->add_render_attribute( 'description', 'class', '' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );
        $this->add_render_attribute( 'button_text', 'class', '' );
        $this->add_render_attribute( 'button', 'class', 'z-btn' ); 

        ?>
        <?php if ( $settings['design_style'] === 'style_6' ): 
            
        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title section__title-3' ); 

        $this->add_render_attribute('button', 'class', 'link-btn bdevs-btn');
        if( !empty($settings['button_link']) )
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['image']['id']) ){
            $image = wp_get_attachment_image_url( $settings['image']['id'], 'full' );
        }

        ?>

        <section class="contact__support p-relative pt-130 pb-110">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <?php if ( !empty($image) ) : ?>
                <div class="contact__shape">
                    <img src="<?php print esc_url($image); ?>" alt="image">
                </div>
            <?php endif;?>
            <?php endif;?>
          <div class="container">
             <div class="row">
                <?php 
                    foreach ( $settings['slides'] as $key => $slide ):
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            if ( ! $image ) {
                                $image = $slide['image']['url'];
                            }
                        }
                ?>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp2" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                   <div class="contact__item-inner hover__active mb-30 active">
                      <div class="contact__item text-center transition-3 white-bg">
                         <div class="contact__icon d-flex justify-content-center align-items-end">
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
                         <div class="contact__content">
                            <?php if ( $settings['title'] ): ?>
                                <h3 class="contact__title-2"><a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_intermediate( $settings['title'] ); ?></a>
                                </h3>
                            <?php endif;?>

                            <?php if( $slide['title'] ) : ?>
                                <h3 class="contact__title-2"><a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a>
                                </h3>
                            <?php endif; ?>

                            <?php if ( $slide['description'] ): ?>
                                <p><?php echo bdevs_element_kses_intermediate( $slide['description'] ); ?></p>
                            <?php endif;?>

                            <?php if ( $slide['button_text'] ): ?>
                                <a href="<?php echo esc_url( $slide['s_url'] ); ?>" class="link-btn"><?php echo bdevs_element_kses_intermediate( $slide['button_text'] ); ?><i class="arrow_right"></i></a>
                            <?php endif;?>
                         </div>
                      </div>
                   </div>
                </div>
                <?php endforeach; ?>
             </div>
          </div>
        </section>


        <?php elseif ( $settings['design_style'] === 'style_5' ): 
            
        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title-5 mb-20 wow fadeInUp2' ); 

        $this->add_render_attribute('button', 'class', 'w-btn w-btn-blue-5 w-btn-6 w-btn-14 w-btn-1-5 wow fadeInUp2 bdevs-btn');
        if( !empty($settings['button_link']) )
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['image']['id']) ){
            $image = wp_get_attachment_image_url( $settings['image']['id'], 'full' );
        }

        if ( !empty($settings['bg_image']['id']) ){
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
        }

        ?>
        <section class="about__area">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-6 col-xl-6 col-lg-6">
                     <div class="about__thumb-wrapper-5">
                        <?php if ( !empty($bg_image) ) : ?>
                            <img class="ml-100 about-thumb-5-big wow bounceInLeft" data-wow-delay=".3s" src="<?php print esc_url($bg_image); ?>" alt="image" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceInLeft;">
                        <?php endif;?>

                        <?php if ( !empty($image) ) : ?>
                            <img class="about-5-sm wow bounceInLeft" data-wow-delay=".5s" src="<?php print esc_url($image); ?>" alt="image" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInLeft;">
                        <?php endif;?>
                     </div>
                  </div>
                  <div class="col-xxl-5 offset-xxl-1 col-xl-5 offset-xl-1 col-lg-6 col-md-8">
                     <div class="about__content-5 pt-35">
                        <div class="section__title-wrapper section__title-wrapper-5 mb-30 wow fadeInUp2" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                             <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title
                                );
                            ?>

                           <?php if ( $settings['description'] ): ?>
                            <p class="wow fadeInUp2" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;"><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?>
                            </p>
                            <?php endif;?>

                        </div>
                        <div class="about__list mb-40 wow fadeInUp2" data-wow-delay=".7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                           <ul>
                               <?php if ( $settings['about_list'] ): ?>
                                    <?php echo bdevs_element_kses_intermediate( $settings['about_list'] ); ?>
                                <?php endif;?>
                           </ul>
                        </div>
                        <div class="about__counter mb-30">
                           <ul>
                                <?php foreach ( $settings['slides'] as $key => $slide ):

                                ?>
                              <li>
                                 <div class="about__counter-item wow fadeInUp2" data-wow-delay=".9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;">
                                    <?php if( $slide['service_number'] ) : ?>
                                       <h4><span class="counter"><?php echo bdevs_element_kses_basic( $slide['service_number'] ); ?></span>+</h4>
                                    <?php endif; ?> 
                                    <?php if( $slide['description'] ) : ?>
                                       <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                                    <?php endif; ?> 
                                 </div>
                              </li>
                              <?php endforeach; ?>
                           </ul>
                        </div>
                        <?php if ( !empty($settings['button_text']) ) : ?>
                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_4' ): 
            
        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title section__title-3' ); 

        $this->add_render_attribute('button', 'class', 'w-btn w-btn-purple w-btn-purple-2 w-btn-3 w-btn-6 bdevs-btn');
        if( !empty($settings['button_link']) )
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['image']['id']) ){
            $image = wp_get_attachment_image_url( $settings['image']['id'], 'full' );
        }

        ?>

        <section class="services__area p-relative">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-8 offset-xxl-2 col-xl-10 offset-xl-1">
                     <div class="section__title-wrapper section__title-wrapper-3 text-center section-padding-3 mb-80 wow fadeInUp2" data-wow-delay=".3s">
                        <?php if ( !empty($image) ) : ?>
                        <span class="section__pre-title-img">
                            <img src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        </span>
                        <?php endif;?>

                        <?php if ( $settings['sub_title'] ): ?>
                            <span class="section__pre-title purple"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                        <?php endif;?>

                        <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['title_tag'] ),
                            $this->get_render_attribute_string( 'title' ),
                            $title
                            );
                        ?>

                       <?php if ( $settings['description'] ): ?>
                            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif;?>

                     </div>
                  </div>
               </div>
               <div class="row">
                 <?php 
                    foreach ( $settings['slides'] as $key => $slide ):
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            if ( ! $image ) {
                                $image = $slide['image']['url'];
                            }
                        }
                ?>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp2" data-wow-delay=".3s">
                     <div class="services__item-3 white-bg transition-3 mb-30 text-center">
                        <div class="services__icon-3">
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
                        <div class="services__content-3">

                        <?php if( $slide['title'] ) : ?>
                           <h3 class="services__title-3"><a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a></h3>
                        <?php endif; ?>

                        <?php if( $slide['description'] ) : ?>
                           <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                        <?php endif; ?> 

                        </div>
                     </div>
                  </div>
                <?php endforeach; ?>
               </div>
               <div class="row">
                  <div class="col-xxl-12 wow fadeInUp2" data-wow-delay=".9s">
                     <div class="services__more text-center mt-30">
                         <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                        endif; ?>
                     </div>
                  </div>
               </div>
            </div>
        </section>


        <?php elseif ( $settings['design_style'] === 'style_3' ): 
            
        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title section__title-2' ); 

        $this->add_render_attribute('button', 'class', '');
        if( !empty($settings['button_link']) )
        $this->add_link_attributes('button', $settings['button_link']);

        ?>

        <section class="services__area grey-bg-3 pt-120 pb-60 p-relative d-none">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <div class="services__shape-2">
               <img class="services-2-circle" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/services/home-2/services-circle.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="services-2-circle-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/services/home-2/services-circle-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
            </div>
            <?php endif;?>
            <div class="container">
               <div class="row align-items-end">

                  <div class="col-xxl-4 col-lg-5 col-md-7">
                     <div class="section__title-wrapper mb-70 wow fadeInUp2" data-wow-delay=".3s">
                        <?php if ( !empty($image) ) : ?>
                        <span class="section__pre-title-img">
                            <img src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        </span>
                        <?php endif;?>

                        <?php if ( $settings['sub_title'] ): ?>
                            <span class="section__pre-title purple"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                        <?php endif;?>

                        <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['title_tag'] ),
                            $this->get_render_attribute_string( 'title' ),
                            $title
                            );
                        ?>
                        <?php if ( $settings['description'] ): ?>
                            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif;?>


                     </div>
                  </div>

                  <div class="col-xxl-8 col-lg-7 col-md-5">
                     <div class="services__more mb-70 text-sm-end wow fadeInUp2" data-wow-delay=".5s">
                        <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                        endif; ?>
                     </div>
                  </div>

               </div>
               <div class="row">
                <?php 
                    foreach ( $settings['slides'] as $key => $slide ):
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            if ( ! $image ) {
                                $image = $slide['image']['url'];
                            }
                        }
                ?>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp2" data-wow-delay=".3s">
                     <div class="services__inner services__inner-2 hover__active mb-30">
                        <div class="services__item-2 transition-3 white-bg ">

                           <div class="services__icon-2">
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

                           <div class="services__content-2">
                            <?php if( $slide['title'] ) : ?>
                              <h3 class="services__title-2"><a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a></h3>
                            <?php endif; ?>
                            <?php if( $slide['description'] ) : ?>
                              <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
                            <?php endif; ?>

                           </div>
                        </div>
                     </div>
                  </div>

                <?php endforeach; ?>
               </div>
            </div>
        </section>

        <div class="afeature text-center mb-30 wow fadeInUp2" data-wow-delay=".3s">
            <div class="afeature__icon mb-35">
                <?php if ( $settings['type'] === 'image' && ( $settings['image_icon']['url'] || $settings['image_icon']['id'] ) ):
                    $this->get_render_attribute_string( 'image' );
                    $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                    ?>
                    <figure>
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_icon', 'image_icon' ); ?>
                    </figure>
                    <?php elseif ( !empty( $settings['icon'] ) || !empty( $settings['selected_icon']['value'] ) ): ?>
                    <figure>
                        <?php bdevs_element_render_icon( $settings, 'icon', 'selected_icon' );?>
                    </figure>
                <?php endif;?>
            </div>
            <div class="afeature__text">
                <h4 class="afeature__text--title"><a href="<?php echo esc_url( $settings['title_url'] ); ?>"><?php echo bdevs_element_kses_intermediate( $settings['title'] ); ?></a></h4>
                <p class="p-0"><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
            </div>
        </div>

        <?php elseif ( $settings['design_style'] === 'style_2' ):

        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title' ); 

        $this->add_render_attribute('button', 'class', '');
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['image']['id']) ){
            $image = wp_get_attachment_image_url( $settings['image']['id'], 'full' );
        }

        ?>
        <section class="features__area pt-60 pb-155 p-relative overflow-y-visible d-none">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <div class="circle-animation features">
               <span></span>
            </div>
            <div class="features__shape">
               <img class="features-circle-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/features/home-1/circle-1.png" alt="<?php print esc_attr__('image','wetland'); ?>">
            </div>
            <?php endif;?>
            <div class="container">
               <div class="row">
                  <div class="col-xxl-6 col-xl-6 col-lg-6">

                     <div class="section__title-wrapper mb-65 wow fadeInUp2" data-wow-delay=".3s">
                        <?php if ( !empty($image) ) : ?>
                        <span class="section__pre-title-img">
                            <img src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        </span>
                        <?php endif;?>

                        <?php if ( $settings['sub_title'] ): ?>
                            <span class="section__pre-title purple"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                        <?php endif;?>

                        <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['title_tag'] ),
                            $this->get_render_attribute_string( 'title' ),
                            $title
                            );
                        ?>

                       <?php if ( $settings['description'] ): ?>
                            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif;?>

                     </div>

                  </div>
               </div>
               <div class="row">
                <?php 
                    foreach ( $settings['slides'] as $key => $slide ):
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            if ( ! $image ) {
                                $image = $slide['image']['url'];
                            }
                        }
                ?>
                  <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                     <div class="features__item mb-30 wow fadeInUp2" data-wow-delay=".3s">

                        <div class="features__icon mb-35">
                            <span class="gradient-pink elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
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
                            </span>
                        </div>

                        <?php if( $slide['title'] ) : ?>
                            <h3 class="features__title"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h3>
                         <?php endif; ?>

                        <?php if( $slide['description'] ) : ?>
                        <div class="features__list"> 
                           <?php echo bdevs_element_kses_basic( $slide['description'] ); ?>
                        </div>
                        <?php endif; ?>

                     </div>
                  </div>
                <?php endforeach; ?>
               </div>
            </div>
        </section>

        <div class="awork mb-30 wow fadeInUp2" data-wow-delay=".3s">
            <?php if ( !empty($image) ) : ?>
            <div class="awork__img">
                <img src="<?php echo esc_url($image); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
                <div class="awork__img--overlay">
                    <?php if ( $settings['type'] === 'image' && ( $settings['image_icon']['url'] || $settings['image_icon']['id'] ) ):
                        $this->get_render_attribute_string( 'image' );
                        $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                        ?>
                        <figure>
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_icon', 'image_icon' ); ?>
                        </figure>
                        <?php elseif ( !empty( $settings['icon'] ) || !empty( $settings['selected_icon']['value'] ) ): ?>
                        <figure>
                            <?php bdevs_element_render_icon( $settings, 'icon', 'selected_icon' );?>
                        </figure>
                    <?php endif;?>
                </div>
            </div>
            <?php endif ?>

            <div class="awork__text text-center">
                <?php if ( $settings['title'] ): ?>
                <h4 class="awork__text--title mb-15"><a href="<?php echo esc_url( $settings['title_url'] ); ?>"><?php echo bdevs_element_kses_intermediate( $settings['title'] ); ?></a></h4>
                <?php endif ?>
                <p class="mb-15"><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                <?php if ( !empty($settings['button_text']) ) : ?>
                <div class="awork__text--link">
                    <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                            printf('<a %1$s>%2$s</a>',
                                $this->get_render_attribute_string('button'),
                                esc_html($settings['button_text'])
                            );
                        elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                        <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                            if ($settings['button_icon_position'] === 'before'): ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    <span><?php echo esc_html($settings['button_text']); ?></span></a>
                            <?php
                            else: ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>>
                                    <span><?php echo esc_html($settings['button_text']); ?></span>
                                    <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                </a>
                            <?php
                            endif;
                    endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php else: 

        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', '' );

        $this->add_render_attribute('button', 'class', 'theme-btn');
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['image']['id']) ){
            $image = wp_get_attachment_image_url( $settings['image']['id'], 'full' );
        }
        ?>

        <section class="services__area p-relative pt-150 pb-130 d-none">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <div class="services__shape">
               <img class="services-circle-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/services/home-1/circle-1.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="services-circle-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/services/home-1/circle-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="services-dot" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/services/home-1/dot.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="services-triangle" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/services/home-1/triangle.png" alt="<?php print esc_attr__('image','wetland'); ?>">
            </div>
            <?php endif;?>
            <div class="container">
                <div class="row">
                  <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-6 col-md-10 offset-md-1 p-0">
                     <div class="section__title-wrapper text-center mb-75 wow fadeInUp2" data-wow-delay=".3s">
                        <?php if ( !empty($image) ) : ?>
                        <span class="section__pre-title-img">
                            <img src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        </span>
                        <?php endif;?>

                        <?php if ( $settings['sub_title'] ): ?>
                            <span class="section__pre-title purple"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                        <?php endif;?>

                        <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['title_tag'] ),
                            $this->get_render_attribute_string( 'title' ),
                            $title
                            );
                        ?>

                        <?php if ( $settings['description'] ): ?>
                            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif;?>

                     </div>
                  </div>
               </div>
               <div class="row">
                    <?php 
                    foreach ( $settings['slides'] as $key => $slide ):
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            if ( ! $image ) {
                                $image = $slide['image']['url'];
                            }
                        }
                    ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">

                        <div class="services__inner hover__active mb-30 wow fadeInUp2" data-wow-delay=".9s">
                            <div class="services__item white-bg text-center transition-3">
                               <div class="services__icon mb-25 d-flex align-items-end justify-content-center">
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

                               <div class="services__content">
                                <?php if( $slide['title'] ) : ?>
                                    <h3 class="services__title"><a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></a></h3>
                                <?php endif; ?>

                                <?php if( $slide['description'] ): ?>
                                    <p><?php echo bdevs_element_kses_intermediate( $slide['description'] ); ?></p>
                                <?php endif; ?>

                               </div>
                            </div>
                        </div>

                    </div>
                    <?php endforeach; ?>
               </div>
            </div>
        </section> 

        <div class="ablog mb-55 wow fadeInUp2" data-wow-delay=".3s">
            <?php if ( !empty($image) ) : ?>
            <div class="ablog__img">
                <img src="<?php echo esc_url($image); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
            </div>
            <?php endif ?>
            <div class="ablog__text ablog__text--service">
                <div class="blog__date blog__date--service__icon">
                    <?php if ( $settings['type'] === 'image' && ( $settings['image_icon']['url'] || $settings['image_icon']['id'] ) ):
                        $this->get_render_attribute_string( 'image' );
                        $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                        ?>
                        <figure>
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_icon', 'image_icon' ); ?>
                        </figure>
                        <?php elseif ( !empty( $settings['icon'] ) || !empty( $settings['selected_icon']['value'] ) ): ?>
                        <figure>
                            <?php bdevs_element_render_icon( $settings, 'icon', 'selected_icon' );?>
                        </figure>
                    <?php endif;?>
                </div>
                <?php if ( $settings['title'] ): ?>
                <h4 class="ablog__text--title"><a href="<?php echo esc_url( $settings['title_url'] ); ?>"><?php echo bdevs_element_kses_intermediate( $settings['title'] ); ?></a></h4>
                <?php endif;?>

                <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>

                <?php if ( !empty($settings['button_text']) ) : ?>
                <div class="ablog__btn">
                    <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                            printf('<a %1$s>%2$s</a>',
                                $this->get_render_attribute_string('button'),
                                esc_html($settings['button_text'])
                            );
                        elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                        <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                            if ($settings['button_icon_position'] === 'before'): ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    <span><?php echo esc_html($settings['button_text']); ?></span></a>
                            <?php
                            else: ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>>
                                    <span><?php echo esc_html($settings['button_text']); ?></span>
                                    <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                </a>
                            <?php
                            endif;
                    endif; ?>
                </div>
                <?php endif;?>
            </div>
        </div>
        <?php endif; ?>
        
        <?php
    }

}