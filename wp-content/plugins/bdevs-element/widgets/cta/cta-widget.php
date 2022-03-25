<?php
namespace BdevsElement\Widget;

use Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Repeater;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class CTA extends BDevs_El_Widget {

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
        return 'cta';
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
        return __( 'CTA', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net/widgets/gradient-heading/';
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
        return 'eicon-t-letter';
    }

    public function get_keywords() {
        return ['gradient', 'advanced', 'heading', 'title', 'colorful'];
    }

    protected function register_content_controls() {

        //Settings
        $this->start_controls_section(
            '_section_settings',
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

        //desc
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Desccription', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'button_text1',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
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
            'button_link1',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'thumbnail',
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
                'default' => 'h3',
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
        // section title 01 end 

        // section title 02 
        $this->start_controls_section(
            '_section_title2',
            [
                'label' => __( 'Title & Desccription 02', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_6'],
                ],
            ]

        );


        $this->add_control(
            'title2',
            [
                'label'       => __( 'Title2', 'bdevselement' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'desccription2',
            [
                'label'       => __( 'Desccription2', 'bdevselement' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Desccription Text', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_4', 'style_10', 'style_12'],
                ],
            ]
        );


        $this->add_control(
            'title_tag2',
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
                'default' => 'h3',
                'toggle'  => false,
            ]
        );

        $this->add_responsive_control(
            'align2',
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

        //listview with icon
        $this->start_controls_section(
            '_section_list',
            [
                'label'     => __( 'Items List', 'bdevselement' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_10', 'style_11'],
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'label'       => __( 'Title', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'items_list',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
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

        $this->end_controls_section();

        //button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_4']
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
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

        // 2nd btn
        $this->start_controls_section(
            '_section_button2',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_6']
                ],
            ]
        );
        $this->add_control(
            'button_text2',
            [
                'label' => __( 'Button Text 2', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'button_link2',
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
                'button_icon2',
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
                'button_selected_icon2',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
            'button_icon_position2',
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
            'button_icon_spacing2',
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

        $this->start_controls_section(
            '_section_cf7',
            [
                'label' => bdevs_element_is_cf7_activated() ? __('Contact Form 7', 'bdevselement') : __('Missing Notice', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3'],
                ],
            ]
        );

        if (!bdevs_element_is_cf7_activated()) {
            $this->add_control(
                '_cf7_missing_notice',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(
                        __('Hello %2$s, looks like %1$s is missing in your site. Please click on the link below and install/activate %1$s. Make sure to refresh this page after installation or activation.', 'bdevselement'),
                        '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term'))
                        . '" target="_blank" rel="noopener">Contact Form 7</a>',
                        bdevs_element_get_current_user_display_name()
                    ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

            $this->add_control(
                '_cf7_install',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term')) . '" target="_blank" rel="noopener">Click to install or activate Contact Form 7</a>',
                ]
            );
            $this->end_controls_section();
            return;
        }

        $this->add_control(
            'form_id',
            [
                'label' => __('Select Your Form', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => ['' => __('', 'bdevselement')] + \bdevs_element_get_cf7_forms(),
            ]
        );

        $this->add_control(
            'html_class',
            [
                'label' => __('HTML Class', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __('Add CSS custom class to the form.', 'bdevselement'),
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
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Title', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'heading_margin',
            [
                'label'      => __( 'Margin', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cta__content .cta__content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label'      => __( 'Padding', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cta__content .cta__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title',
                'selector' => '{{WRAPPER}} .cta__area .cta__content .z-title',
                'scheme'   => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'title',
                'label'    => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .cta__area .cta__content .z-title',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__content .z-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blend_mode',
            [
                'label'     => __( 'Blend Mode', 'bdevselement' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    ''            => __( 'Normal', 'bdevselement' ),
                    'multiply'    => 'Multiply',
                    'screen'      => 'Screen',
                    'overlay'     => 'Overlay',
                    'darken'      => 'Darken',
                    'lighten'     => 'Lighten',
                    'color-dodge' => 'Color Dodge',
                    'saturation'  => 'Saturation',
                    'color'       => 'Color',
                    'difference'  => 'Difference',
                    'exclusion'   => 'Exclusion',
                    'hue'         => 'Hue',
                    'luminosity'  => 'Luminosity',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cta__area .cta__content .z-title' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        // subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Sub Title', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_margin',
            [
                'label'      => __( 'Margin', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cta__content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_padding',
            [
                'label'      => __( 'Padding', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cta__content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle',
                'selector' => '{{WRAPPER}} .cta__content span',
                'scheme'   => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'subtitle',
                'label'    => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .cta__content span',
            ]
        );

        $this->add_control(
            'heading_subtitle_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .cta__content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // content

        $this->add_control(
            '_heading_description',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Content', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'heading_desc_margin',
            [
                'label'      => __( 'Margin', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-heading p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_desc_padding',
            [
                'label'      => __( 'Padding', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-heading p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'desccription',
                'selector' => '{{WRAPPER}} .section-heading p',
                'scheme'   => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'desccription',
                'label'    => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .section-heading p',
            ]
        );

        $this->add_control(
            'heading_desc_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .section-heading p' => 'color: {{VALUE}};',
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
            '_tab_button_hover',
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
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus,{{WRAPPER}} .bdevs-btn:hover::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus,{{WRAPPER}} .bdevs-btn:hover::after' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus,{{WRAPPER}} .bdevs-btn:hover::after' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $title = bdevs_element_kses_basic( $settings['title'] );

        if ( !empty( $settings['cta_img']['id'] ) ) {
            $cta_img = wp_get_attachment_image_url( $settings['cta_img']['id'], $settings['thumbnail_size'] );
        }

        ?>

        <?php if ( $settings['design_style'] === 'style_4' ):

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'afaq__banner--text__title' );
            $this->add_inline_editing_attributes( 'title2', 'basic' );
            $this->add_render_attribute( 'title2', 'class', 'promotion__title' );

            $this->add_render_attribute( 'button', 'class', 'theme-btn' );
            $this->add_render_attribute( 'button', 'data-wow-delay', '.3s' );
            if ( !empty( $settings['button_link'] ) ) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            $this->add_render_attribute( 'button2', 'class', 'w-btn w-btn-8 w-btn-1-white bdevs-btn' );
            $this->add_render_attribute( 'button2', 'data-wow-delay', '.3s' );
            if ( !empty( $settings['button_link2'] ) ) {
                $this->add_link_attributes( 'button2', $settings['button_link2'] );
            }

            if ( !empty( $image ) ) {
                $image = $settings['image']['url'];
            }

            ?>

            <section class="promotion__area promotion__bg pt-125 pb-125 p-relative d-none">
                <?php if ( !empty($settings['shape_switch']) ): ?>
                <div class="promotion__shape">
                   <img class="promotion-dot" src="assets/img/icon/promotion/pro-dot.png" alt="">
                   <img class="promotion-plus" src="assets/img/icon/promotion/pro-plus.png" alt="">
                   <img class="promotion-triangle" src="assets/img/icon/promotion/pro-triangle.png" alt="">
                </div>
                <?php endif;?>
                <div class="container">
                   <div class="row">
                      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                         <div class="promotion__content wow fadeInUp2" data-wow-delay=".3s">
                            <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                tag_escape( $settings['title_tag2'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title
                            );?>
                            
                            <?php if ( !empty( $settings['desccription'] ) ): ?>
                                <p><?php echo bdevs_element_kses_basic( $settings['desccription'] ); ?></p>
                            <?php endif;?>

                            <?php if ( !empty($settings['button_text']) ) : ?>
                            <div class="su-cta-btn">
                                <?php if ( $settings['button_text'] && (  ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ):
                                    printf( '<a %1$s href="%3$s">%2$s</a>',
                                        $this->get_render_attribute_string( 'button' ),
                                        esc_html( $settings['button_text'] ),
                                        esc_url( $settings['button_link']['url'] ) );
                                    elseif ( empty( $settings['button_text'] ) && (  ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ): ?>
                                                            <a <?php $this->print_render_attribute_string( 'button' );?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' );?></a>
                                                        <?php elseif ( $settings['button_text'] && (  ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ):
                                        if ( $settings['button_icon_position'] === 'before' ): ?>
                                                        <a <?php $this->print_render_attribute_string( 'button' );?>><span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] );?></span> <?php echo esc_html( $settings['button_text'] ); ?></a>
                                                        <?php
                                        else: ?>
                                            <a <?php $this->print_render_attribute_string( 'button' );?>><?php echo esc_html( $settings['button_text'] ); ?> <span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] );?></span></a>
                                        <?php
                                    endif;
                                endif;?>
                            </div>
                            <?php endif;?>
                         </div>
                      </div>
                      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                         <div class="promotion__content pl-70 promotion__right wow fadeInUp2" data-wow-delay=".5s">
                            <?php if ( !empty( $settings['title2'] ) ): ?>
                                <h3 class="promotion__title"><?php echo bdevs_element_kses_intermediate( $settings['title2'] ); ?></h3>
                            <?php endif;?>
                            <?php if ( !empty( $settings['desccription2'] ) ): ?>
                                <p><?php echo bdevs_element_kses_basic( $settings['desccription2'] ); ?></p>
                            <?php endif;?>

                            <?php if ( !empty($settings['button_text']) ) : ?>
                            <div class="su-cta-btn2">
                                <!-- btn 2 -->
                                <?php if ( $settings['button_text2'] && ( ( empty( $settings['button_selected_icon2'] ) || empty( $settings['button_selected_icon2']['value'] ) ) && empty( $settings['button_icon2'] ) ) ) :
                                        printf( '<a %1$s>%2$s</a>',
                                            $this->get_render_attribute_string( 'button2' ),
                                            esc_html( $settings['button_text2'] )
                                            );
                                    elseif ( empty( $settings['button_text2'] ) && ( ( !empty( $settings['button_selected_icon2'] ) || empty( $settings['button_selected_icon2']['value'] ) ) || !empty( $settings['button_icon2'] ) ) ) : ?>
                                        <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php bdevs_element_render_icon( $settings, 'button_icon2', 'button_selected_icon2' ); ?></a>
                                    <?php elseif ( $settings['button_text2'] && ( ( !empty( $settings['button_selected_icon2'] ) || empty( $settings['button_selected_icon2']['value'] ) ) || !empty($settings['button_icon2']) ) ) :
                                        if ( $settings['button_icon_position2'] === 'before' ): ?>
                                            <a <?php $this->print_render_attribute_string( 'button2' ); ?>><span><?php bdevs_element_render_icon( $settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2'] ); ?></span> <?php echo esc_html($settings['button_text2']); ?></a>
                                            <?php
                                        else: ?>
                                            <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php echo esc_html($settings['button_text2']); ?> <span><?php bdevs_element_render_icon( $settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2'] ); ?></span></a>
                                        <?php
                                        endif;
                                endif; ?>
                            </div>
                            <?php endif;?>
                         </div>
                      </div>
                   </div>
                </div>
            </section>

            <div class="afaq__banner mb-50 wow fadeInUp2" data-wow-delay=".3s">
            <?php if ( !empty($cta_img) ) : ?>
                <img src="<?php echo esc_url($cta_img); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
            <?php endif; ?>

                <div class="afaq__banner--text text-center">
                    <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                        tag_escape( $settings['title_tag'] ),
                        $this->get_render_attribute_string( 'title' ),
                        $title
                    );?>
                    
                    <?php if ( !empty( $settings['desccription'] ) ): ?>
                        <p><?php echo bdevs_element_kses_basic( $settings['desccription'] ); ?></p>
                    <?php endif;?>

                    <?php if ( !empty($settings['button_text']) ) : ?>
                    <div class="afaq__banner--text__btn">
                        <?php if ( $settings['button_text'] && (  ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ):
                            printf( '<a %1$s href="%3$s">%2$s</a>',
                                $this->get_render_attribute_string( 'button' ),
                                esc_html( $settings['button_text'] ),
                                esc_url( $settings['button_link']['url'] ) );
                            elseif ( empty( $settings['button_text'] ) && (  ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ): ?>
                                                    <a <?php $this->print_render_attribute_string( 'button' );?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' );?></a>
                                                <?php elseif ( $settings['button_text'] && (  ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ):
                                if ( $settings['button_icon_position'] === 'before' ): ?>
                                                <a <?php $this->print_render_attribute_string( 'button' );?>><span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] );?></span> <?php echo esc_html( $settings['button_text'] ); ?></a>
                                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string( 'button' );?>><?php echo esc_html( $settings['button_text'] ); ?> <span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] );?></span></a>
                                <?php
                            endif;
                        endif;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>


        <?php elseif ( $settings['design_style'] === 'style_3' ):

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'cta__title cta__title-3' );

            $this->add_render_attribute( 'button', 'class', 'w-btn w-btn-white-3 bdevs-btn' );
            if ( !empty( $settings['button_link'] ) ) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            if (!empty($settings['cta_img']['id'])) {
                $cta_img = wp_get_attachment_image_url($settings['cta_img']['id'], $settings['thumbnail_size']);
            }

            ?>
        <section class="newsletter-area-3 wow fadeInUp2" data-wow-delay=".5s">
            <div class="newsletter__wrapper--3">
                <div class="news__subscribe theme-bg text-center pt-110 pb-100">
                    <div class="section-title-wrapper mb-50">
                        <?php if ($settings['title']): ?>
                        <h2 class="section-title text-white"><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
                        <?php endif ?>
                    </div>
                    <?php if (!empty($settings['form_id'])) {
                        echo bdevs_element_do_shortcode('contact-form-7', [
                            'id' => $settings['form_id'],
                            'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param($settings['html_class']),
                        ]);
                    }
                    ?>
                </div>
                <div class="news__service black-soft-bg text-center pt-110 pb-120">
                    <div class="section-title-wrapper mb-50">
                        <?php if ($settings['title02']): ?>
                        <h2 class="section-title text-white"><?php echo bdevs_element_kses_intermediate($settings['title02']); ?></h2>
                        <?php endif ?>
                    </div>
                    <div class="news__service--number">
                        <div class="news__service--number__icon">
                            <img src="<?php echo esc_url($cta_img); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
                        </div>
                        <div class="news__service--number__btn">
                            <a href="tel:<?php echo bdevs_element_kses_intermediate($settings['cta_number']); ?>" class="theme-btn"><?php echo bdevs_element_kses_intermediate($settings['cta_number']); ?> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ):

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'cta__title cta__title-2' );

            $this->add_render_attribute( 'button', 'class', 'theme-btn black-btn bdevs-btn' );
            if ( !empty( $settings['button_link'] ) ) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            ?>

            <section class="newsletter-area z-index m-0">
                <div class="container">
                    <div class="anewsletter--bg">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contact-shape-1.png" class="img-fluid news__shape news__shape1" alt="img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contact-shape-2.png" class="img-fluid news__shape news__shape2 jump" alt="img">
                        <div class="row">
                            <div class="col-12">
                                <div class="anewsletter z-index wow fadeInUp2" data-wow-delay=".5s">
                                    <div class="section-title-wrapper">
                                    <?php if ($settings['title']): ?>
                                        <h2 class="section-title text-white"><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
                                    <?php endif ?>
                                    </div>
                                    <?php if ( !empty($settings['button_text']) ) : ?>
                                    <div class="anewsletter__btn">
                                       <?php if ( $settings['button_text'] && (  ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ):
                                        printf( '<a %1$s>%2$s</a>',
                                            $this->get_render_attribute_string( 'button' ),
                                            esc_html( $settings['button_text'] )
                                        );
                                        elseif ( empty( $settings['button_text'] ) && (  ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ): ?>
                                        <a <?php $this->print_render_attribute_string( 'button' );?>><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon' );?></a>
                                        <?php elseif ( $settings['button_text'] && (  ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ):
                                        if ( $settings['button_icon_position'] === 'before' ): ?>
                                        <a <?php $this->print_render_attribute_string( 'button' );?>><span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] );?></span> <?php echo esc_html( $settings['button_text'] ); ?></a>
                                        <?php
                                        else: ?>
                                        <a <?php $this->print_render_attribute_string( 'button' );?>><?php echo esc_html( $settings['button_text'] ); ?> <span><?php bdevs_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] );?></span></a>
                                        <?php endif;
                                        endif;?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php else:

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'cta__title' );

            $this->add_render_attribute( 'button', 'class', 'cta-btn' );

            if ( !empty( $settings['button_link'] ) ) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }
        ?>
        <section class="cta-area black-bg pt-100">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <div class="cta-wrapper">
                            <?php if ($settings['title']): ?>
                            <div class="cta-text">
                                <h2><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
                            </div>
                            <?php endif ?>

                            <div class="cta-btn-wrap">
                                <a class="cta-btn" href="<?php echo esc_url( $settings['button_link1'] ); ?>"><?php echo bdevs_element_kses_basic( $settings['button_text1'] ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php endif;?>
        <?php
    }
}

