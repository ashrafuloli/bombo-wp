<?php

namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined('ABSPATH') || die();

class CF7 extends BDevs_El_Widget
{

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
    public function get_name()
    {
        return 'cf7';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __('Contact Form 7', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/contact-7-form/';
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-shortcode';
    }

    public function get_keywords()
    {
        return ['form', 'contact', 'cf7', 'contact form', 'gravity', 'ninja'];
    }

    protected function register_content_controls()
    {
        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Design Style', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                    'style_2' => __('Style 2', 'bdevselement'),
                    'style_3' => __('Style 3', 'bdevselement'),
                    'style_4' => __('Style 4', 'bdevselement'),
                    'style_5' => __('Style 5', 'bdevselement'),
                ],
                'default' => 'style_1', 
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Desccription', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon_switch',
            [
                'label' => __('Subtitle Icon Show/Hide', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'design_style' => ['style_2','style_3'],
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __('Heading Sub Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2','style_3'],
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
            'desccription',
            [
                'label' => __('Desccription', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Heading Desccription Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_control(
            'contact_number',
            [
                'label' => __('Contact Number', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '02 (555) 520 890 ',
                'placeholder' => __('Contact Number', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_control(
            'shape_image',
            [
                'label' => __('Shape Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __('Big Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2','style_3'],
                ],
            ]
        );

        $this->add_control(
            'small_image',
            [
                'label' => __('Icon Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_control(
            'cta-info',
            [
                'label' => __('CTA Info', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('CTA info Text', 'bdevselement'),
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
            '_section_features_list',
            [
                'label' => __('Contact List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

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
                        'type' => 'icon'
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
                        'type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'tab_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'default' => __('Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_content',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Type content here', 'bdevselement'),
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
                'title_field' => '<# print(tab_title || "Carousel Item"); #>',
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


        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => [ 'style_4']
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

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'button_icon',
                [
                    'label' => __('Icon', 'bdevselement'),
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
                'label' => __('Icon Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'after',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .btn--icon-before .btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn--icon-after .btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            '_section_cf7',
            [
                'label' => bdevs_element_is_cf7_activated() ? __('Contact Form 7', 'bdevselement') : __('Missing Notice', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
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

        $this->start_controls_section(
            'section_map',
            [
                'label' => __('Map', 'elementor'),
            ]
        );

        $default_address = __('London Eye, London, United Kingdom', 'elementor');
        $this->add_control(
            'address',
            [
                'label' => __('Address', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => $default_address,
                'default' => $default_address,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'zoom',
            [
                'label' => __('Zoom Level', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                ],
            ]
        );


        $this->add_responsive_control(
            'height',
            [
                'label' => __('Height', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 300,
                ],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 1440,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} iframe' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'prevent_scroll',
            [
                'label' => __('Prevent Scroll', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'selectors' => [
                    '{{WRAPPER}} iframe' => 'pointer-events: none;',
                ],
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => __('View', 'elementor'),
                'type' => Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_fields_style',
            [
                'label' => __('Form Fields', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'field_width',
            [
                'label' => __('Width', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-cf7-form label' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'field_margin',
            [
                'label' => __('Spacing Bottom', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'field_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'field_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'field_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
                'scheme' => Typography::TYPOGRAPHY_3
            ]
        );

        $this->add_control(
            'field_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'field_placeholder_color',
            [
                'label' => __('Placeholder Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ::-moz-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ::-ms-input-placeholder' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_field_state');

        $this->start_controls_tab(
            'tab_field_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'field_border',
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'field_box_shadow',
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
            ]
        );

        $this->add_control(
            'field_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_field_focus',
            [
                'label' => __('Focus', 'bdevselement'),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'field_focus_border',
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):focus',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'field_focus_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):focus',
            ]
        );

        $this->add_control(
            'field_focus_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            'cf7-form-label',
            [
                'label' => __('Form Fields Label', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'label_margin',
            [
                'label' => __('Spacing Bottom', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hr3',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} label',
                'scheme' => Typography::TYPOGRAPHY_3
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'submit',
            [
                'label' => __('Submit Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'submit_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'submit_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'submit_typography',
                'selector' => '{{WRAPPER}} .wpcf7-submit',
                'scheme' => Typography::TYPOGRAPHY_4
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'submit_border',
                'selector' => '{{WRAPPER}} .wpcf7-submit',
            ]
        );

        $this->add_control(
            'submit_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'submit_box_shadow',
                'selector' => '{{WRAPPER}} .wpcf7-submit',
            ]
        );

        $this->add_control(
            'hr4',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'submit_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-submit' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'submit_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-submit' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'submit_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-submit:hover, {{WRAPPER}} .wpcf7-submit:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'submit_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-submit:hover, {{WRAPPER}} .wpcf7-submit:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'submit_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-submit:hover, {{WRAPPER}} .wpcf7-submit:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (!bdevs_element_is_cf7_activated()) {
            return;
        }

        // button
        if (!empty($settings['button_link'])) {
            $this->add_inline_editing_attributes('button_text', 'none');
            $this->add_render_attribute('button_text', 'class', 'bdevs-btn-text');
            $this->add_render_attribute('button', 'class', 'theme-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }

        $this->add_render_attribute('title', 'class', 'big_title mb-0');
        $this->add_render_attribute('title_1', 'class', 'big_title mb-0');
        $this->add_render_attribute('title_2', 'class', 'section-title');
        $title = bdevs_element_kses_basic($settings['title']);

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], 'full');
        }

        ?>
        <?php if ($settings['design_style'] === 'style_5'):
        
        ?>

        <div class="service__contact--form service__details--contact__form mb-30 wow fadeInUp2" data-wow-delay="2s">
            <?php if ($settings['title']) : ?>
            <h4 class="service-details-subtitle mb-25"><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h4>
            <?php endif; ?>

            <?php
                if (!empty($settings['form_id'])) {
                    echo bdevs_element_do_shortcode('contact-form-7', [
                        'id' => $settings['form_id'],
                        'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param($settings['html_class']),
                    ]);
                }
            ?>
        </div>

    <?php elseif ($settings['design_style'] === 'style_4'): 

    ?>


        <section class="appoint-cta-area z-index wow fadeInUp2" data-wow-delay=".6s">
            <div class="custom-container">
                <div class="appoint-cta-space grey-bg">
                    <?php
                        if (!empty($settings['form_id'])) {
                            echo bdevs_element_do_shortcode('contact-form-7', [
                                'id' => $settings['form_id'],
                                'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param($settings['html_class']),
                            ]);
                        }
                    ?>
                    
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_3'): ?>

        <section class="service-contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php if ( !empty($bg_image) ) : ?>
                        <div class="service__contact--img mr-70 mb-30 wow fadeInUp2"  data-wow-delay=".3s">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="<?php print esc_attr__('image','airvice'); ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="service__contact--form mb-30 wow fadeInUp2"  data-wow-delay=".6s">
                            <div class="section-title-wrapper mb-40">
                                <?php if ($settings['sub_title']) : ?>
                                <h6 class="subtitle mb-20">
                                    <?php if ( !empty($settings['icon_switch']) ): ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/subtitle-icon.png" class="img-fluid"   alt="img"> 
                                    <?php endif; ?>
                                    <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h6>
                                <?php endif; ?>

                                <?php if ($settings['title']) : ?>
                                <h2 class="section-title"><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
                                <?php endif; ?>
                            </div>

                            <div id="contact-form">
                            <?php
                                if (!empty($settings['form_id'])) {
                                    echo bdevs_element_do_shortcode('contact-form-7', [
                                        'id' => $settings['form_id'],
                                        'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param($settings['html_class']),
                                    ]);
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_2'):

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], 'full');
        }

        if (!empty($settings['small_image']['id'])) {
            $small_image = wp_get_attachment_image_url($settings['small_image']['id'], 'full');
        }

        ?>

        <section class="contact-inner-area wow fadeInUp2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact__inner">
                            <?php if ( !empty($bg_image) ) : ?>
                            <div class="contact__inner--img">
                                <img src="<?php echo esc_url($bg_image); ?>" class="img-fluid c-img" alt="<?php print esc_attr__('image','airvice'); ?>">
                                <div class="news__service--number black-soft-bg contact__inner--img__number">
                                    <div class="news__service--number__icon">
                                        <img src="<?php echo esc_url($small_image); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
                                    </div>
                                    <?php if ($settings['contact_number']) : ?>
                                    <div class="news__service--number__btn">
                                        <a href="tel:<?php echo bdevs_element_kses_intermediate($settings['contact_number']); ?>" class="theme-btn"><?php echo bdevs_element_kses_intermediate($settings['contact_number']); ?></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="contact__inner--form service__contact--form">
                                <div class="section-title-wrapper mb-40">
                                    <?php if ($settings['sub_title']) : ?>
                                    <h6 class="subtitle mb-20">
                                        <?php if ( !empty($settings['icon_switch']) ): ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/subtitle-icon.png" class="img-fluid" alt="img">
                                        <?php endif; ?>
                                        <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h6>
                                    <?php endif; ?>

                                    <?php if ($settings['title']) : ?>
                                    <h2 class="section-title"><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
                                    <?php endif; ?>
                                </div>

                                <div id="contact-form">
                                <?php
                                    if (!empty($settings['form_id'])) {
                                        echo bdevs_element_do_shortcode('contact-form-7', [
                                            'id' => $settings['form_id'],
                                            'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param($settings['html_class']),
                                        ]);
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php else:
        if (empty($settings['address'])) {
            return;
        }

        if (0 === absint($settings['zoom']['size'])) {
            $settings['zoom']['size'] = 10;
        }

        if (!empty($settings['shape_image']['id'])) {
            $shape_image = wp_get_attachment_image_url($settings['shape_image']['id'], 'full');
        }
        ?>
        <section class="cta__area p-relative pt-140 pb-130 fix z-index-1">
            <div class="cta__shape">
            <?php if (!empty($shape_image)): ?>
                <img class="cta-4-shape" src="<?php echo esc_url($shape_image); ?>" alt="">
            <?php endif; ?>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xxl-8 offset-xxl-2">
                     <div class="cta__content-4 text-center">
                        <div class="section__title-wrapper section__title-wrapper-4 section__title-white text-center mb-45 wow fadeInUp2" data-wow-delay=".3s">
                            <?php if ($settings['title']) : ?>
                                <h2 class="section__title section__title-4 wow fadeInUp2" data-wow-delay=".3s">
                                    <?php echo bdevs_element_kses_intermediate($settings['title']); ?>
                                </h2>
                            <?php endif; ?>

                            <?php if ($settings['desccription']) : ?>
                                <p class="wow fadeInUp2" data-wow-delay=".5s">
                                    <?php echo bdevs_element_kses_intermediate($settings['desccription']); ?>  
                                </p>
                            <?php endif; ?>

                        </div>
                        <div class="cta__form mb-25 wow fadeInUp2" data-wow-delay=".7s">
                            <?php
                                if (!empty($settings['form_id'])) {
                                    echo bdevs_element_do_shortcode('contact-form-7', [
                                        'id' => $settings['form_id'],
                                        'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param($settings['html_class']),
                                    ]);
                                }
                            ?>
                        </div>
                        <div class="cta__features">
                            <?php if ($settings['cta-info']) : ?>
                                <?php echo bdevs_element_kses_intermediate($settings['cta-info']); ?>
                            <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </section>

    <?php endif; ?>


        <?php

    }
}
