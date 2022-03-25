<?php

namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined('ABSPATH') || die();

class FAQ extends BDevs_El_Widget
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
        return 'faq';
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
        return __('FAQ', 'bdevselement');
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
        return 'eicon-edit';
    }

    public function get_keywords()
    {
        return ['services', 'tab'];
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
                'label' => __('Title ', 'bdevselement'),
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
                    'design_style' => ['style_3'],
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
                    'design_style' => ['style_2','style_3'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'label_block' => true,
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
                'label' => __('Description', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Heading Description Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_4'],
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
            '_section_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1','style_2'],
                ],
            ]
        );

        $this->add_control(
            'tab_big_image',
            [
                'label' => __('BG Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'tab_big_image2',
            [
                'label' => __('Image 2', 'bdevselement'),
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
            'tab_big_image3',
            [
                'label' => __('Image 3', 'bdevselement'),
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

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Faq List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Title', 'bdevselement'),
                'default' => __('Tab Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_content_info',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'default' => __('Content Here', 'bdevselement'),
                'placeholder' => __('Type subtitle here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // REPEATER
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
        //end Faq List

        //Faq Counter
        $this->start_controls_section(
            '_counter_slides',
            [
                'label' => __('Faq Counter', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_4'],
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_color',
            [
                'label' => __( 'Fact Color', 'bdevselement' ),
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
            'counter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Counter Title', 'bdevselement'),
                'default' => __('Counter Title', 'bdevselement'),
                'placeholder' => __('Type Counter Title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'counter_number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Counter Number', 'bdevselement'),
                'default' => __('10', 'bdevselement'),
                'placeholder' => __('Type Number here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // REPEATER
        $this->add_control(
            'counter_slide',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(counter_title || "Carousel Item"); #>',
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
                    'design_style' => ['style_4'],
                ],
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

    }

    // register_style_controls
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
        $this->add_render_attribute('title', 'class', 'big_title text-white mb-0');
        $title = bdevs_element_kses_basic($settings['title']);

        // img 
        if (!empty($settings['tab_big_image']['id'])) {
            $tab_big_image = wp_get_attachment_image_url(!empty($settings['tab_big_image']['id']), !empty($settings['tab_big_image_size']));
            if (!$tab_big_image) {
                $tab_big_image = $settings['tab_big_image']['url'];
            }
        }

        if (!empty($settings['tab_big_image2']['id'])) {
            $tab_big_image2 = wp_get_attachment_image_url(!empty($settings['tab_big_image2']['id']), !empty($settings['tab_big_image_size']));
            if (!$tab_big_image2) {
                $tab_big_image2 = $settings['tab_big_image2']['url'];
            }
        }

        if (!empty($settings['tab_big_image3']['id'])) {
            $tab_big_image3 = wp_get_attachment_image_url(!empty($settings['tab_big_image3']['id']), !empty($settings['tab_big_image_size']));
            if (!$tab_big_image3) {
                $tab_big_image3 = $settings['tab_big_image3']['url'];
            }
        }

        if (empty($settings['slides'])) {
            return;
        }
        ?>
        <?php if ($settings['design_style'] === 'style_3'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section-title');

        $this->add_render_attribute('button', 'class', 'z-btn z-btn-border wow fadeInLeft');
        $this->add_render_attribute('button', 'data-wow-delay', '.6s');
        ?>

        <div class="afaq__text afaq__text--3 mb-30 mr-165 wow fadeInUp2" data-wow-delay=".6s">
            <div class="section-title-wrapper mb-50">
                <?php if ($settings['sub_title']): ?>
                <h6 class="subtitle mb-20">
                    <?php if ( !empty($settings['icon_switch']) ): ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/subtitle-icon.png" class="img-fluid" alt="img">
                    <?php endif; ?>
                     <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h6>
                <?php endif; ?>

                <?php if (!empty($settings['title'])): ?>
                    <h2 class="section-title"><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
                <?php endif; ?>
            </div>
            <div class="accordion" id="accordionExample">
                <?php foreach ($settings['slides'] as $id => $slide) :
                    // active class
                    $collapsed_tab = ($id == 0) ? '' : 'collapsed';
                    $area_expanded = ($id == 0) ? 'true' : 'false';
                    $active_show_tab = ($id == 0) ? 'show' : '';
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" 
                        id="heading_<?php echo esc_attr($id); ?>">
                        <button class="accordion-button <?php echo esc_attr($collapsed_tab); ?>" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapse_<?php echo esc_attr($id); ?>" 
                        aria-expanded="true" 
                        aria-controls="collapse_<?php echo esc_attr($id); ?>">
                            <?php echo bdevs_element_kses_basic($slide['tab_title']); ?>
                        </button>
                    </h2>

                    <div 
                    id="collapse_<?php echo esc_attr($id); ?>" 
                    class="accordion-collapse collapse <?php echo esc_attr($active_show_tab); ?>" 
                    aria-labelledby="heading_<?php echo esc_attr($id); ?>" 
                    data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php elseif ($settings['design_style'] === 'style_2'):
        $this->add_render_attribute('button', 'class', 'z-btn z-btn-border wow fadeInLeft');
        $this->add_render_attribute('button', 'data-wow-delay', '.6s');

        ?>
        <section class="faq-area-3">
            <div class="custom-container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="afaq__img--3 mb-30 mr-70 wow fadeInUp2" data-wow-delay=".3s">
                            <?php if ( !empty($tab_big_image) ) : ?>
                            <img src="<?php echo esc_url($tab_big_image); ?>" class="img-fluid img-1" alt="<?php print esc_attr__('image','airvice'); ?>">
                            <?php endif; ?>

                            <?php if ( !empty($tab_big_image2) ) : ?>
                            <img src="<?php echo esc_url($tab_big_image2); ?>" class="img-fluid img-2" alt="<?php print esc_attr__('image','airvice'); ?>">
                            <?php endif; ?>

                            <?php if ( !empty($tab_big_image3) ) : ?>
                            <img src="<?php echo esc_url($tab_big_image3); ?>" class="img-fluid img-3" alt="<?php print esc_attr__('image','airvice'); ?>">
                            <?php endif; ?>
                            <i class="flaticon-air-conditioner icon-one"></i>
                            <i class="flaticon-house icon-two"></i>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-9">
                        <div class="afaq__text afaq__text--3 mb-30 mr-165 wow fadeInUp2" data-wow-delay=".6s">
                            <div class="section-title-wrapper mb-50">
                                <?php if (!empty($settings['sub_title'])): ?>
                                <h6 class="subtitle mb-20"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h6>
                                <?php endif; ?>
                                <?php if (!empty($settings['title'])): ?>
                                <h2 class="section-title"><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    // active class
                                    $collapsed_tab = ($id == 0) ? '' : 'collapsed';
                                    $area_expanded = ($id == 0) ? 'true' : 'false';
                                    $active_show_tab = ($id == 0) ? 'show' : '';
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" 
                                        id="heading_<?php echo esc_attr($id); ?>">
                                        <button class="accordion-button <?php echo esc_attr($collapsed_tab); ?>"
                                         type="button" 
                                         data-bs-toggle="collapse" 
                                         data-bs-target="#collapse_<?php echo esc_attr($id); ?>" 
                                         aria-expanded="true" 
                                         aria-controls="collapse_<?php echo esc_attr($id); ?>">
                                            <?php echo bdevs_element_kses_basic($slide['tab_title']); ?>
                                        </button>
                                    </h2>

                                    <div 
                                        id="collapse_<?php echo esc_attr($id); ?>" 
                                        class="accordion-collapse collapse <?php echo esc_attr($active_show_tab); ?>" 
                                        aria-labelledby="heading_<?php echo esc_attr($id); ?>" 
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: 
        // img 
        if (!empty($settings['tab_big_image']['id'])) {
            $tab_big_image = wp_get_attachment_image_url(!empty($settings['tab_big_image']['id']), !empty($settings['tab_big_image_size']));
            if (!$tab_big_image) {
                $tab_big_image = $settings['tab_big_image']['url'];
            }
        }

        ?>

        <section class="faq-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php if ( !empty($tab_big_image) ) : ?>
                        <div class="afaq__img mb-30 wow fadeInUp2" data-wow-delay=".5s">
                            <img src="<?php echo esc_url($tab_big_image); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="afaq__text mb-30 wow fadeInUp2" data-wow-delay="1s">
                            <?php if (!empty($settings['title'])): ?>
                            <div class="section-title-wrapper mb-55">
                                <h2 class="section-title"><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
                            </div>
                            <?php endif; ?>
                            <div class="accordion" id="accordionExample">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    // active class
                                    $collapsed_tab = ($id == 0) ? '' : 'collapsed';
                                    $area_expanded = ($id == 0) ? 'true' : 'false';
                                    $active_show_tab = ($id == 0) ? 'show' : '';
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" 
                                        id="heading_<?php echo esc_attr($id); ?>">
                                        <button class="accordion-button <?php echo esc_attr($collapsed_tab); ?>" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse_<?php echo esc_attr($id); ?>" 
                                        aria-expanded="true" 
                                        aria-controls="collapse_<?php echo esc_attr($id); ?>">
                                        <?php echo bdevs_element_kses_basic($slide['tab_title']); ?>
                                        </button>
                                    </h2>

                                    <div id="collapse_<?php echo esc_attr($id); ?>"
                                     class="accordion-collapse collapse <?php echo esc_attr($active_show_tab); ?>" 
                                     aria-labelledby="heading_<?php echo esc_attr($id); ?>" 
                                     data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?>
                                        </div>
                                    </div>
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