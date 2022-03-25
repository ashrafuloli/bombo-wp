<?php

namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Core\Schemes;
use \Elementor\Group_Control_Background;
use \BdevsElement\BDevs_El_Select2;

defined('ABSPATH') || die();


class Post_List extends BDevs_El_Widget
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
        return 'post_list';
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
        return __('Post List', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/widgets/post-list/';
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
        return 'eicon-parallax';
    }

    public function get_keywords()
    {
        return ['posts', 'post', 'post-list', 'list', 'news'];
    }

    /**
     * Get a list of All Post Types
     *
     * @return array
     */
    public function get_post_types()
    {
        $post_types = bdevs_element_get_post_types([], ['elementor_library', 'attachment']);
        return $post_types;
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

        $this->start_controls_section(
            '_section_media_',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __('Icon Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'       => __( 'Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Heading Sub Title',
                'placeholder' => __( 'Heading Sub Text', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 4,
                'default'     => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'bdevselement' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Description Text', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            's_title_tag',
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
                'default' => 'h4',
                'toggle'  => false,
            ]
        );

        $this->add_responsive_control(
            's_align',
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
                    '{{WRAPPER}} .section__title-wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT
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
            '_section_post_list',
            [
                'label' => __('List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label' => __('Source', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->get_post_types(),
                'default' => key($this->get_post_types()),
            ]
        );

        $this->add_control(
            'show_post_by',
            [
                'label' => __('Show post by:', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'default' => 'recent',
                'options' => [
                    'recent' => __('Recent Post', 'bdevselement'),
                    'selected' => __('Selected Post', 'bdevselement'),
                ],

            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Item Limit', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'dynamic' => ['active' => true],
                'condition' => [
                    'show_post_by' => ['recent']
                ]
            ]
        );

        $repeater = [];

        foreach ($this->get_post_types() as $key => $value) {

            $repeater[$key] = new Repeater();

            $repeater[$key]->add_control(
                'title',
                [
                    'label' => __('Title', 'bdevselement'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => __('Customize Title', 'bdevselement'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $repeater[$key]->add_control(
                'post_short_text',
                [
                    'label' => __('Short Content', 'bdevselement'),
                    'type' => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'placeholder' => __('Short Content', 'bdevselement'),
                    'rows' => 3,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $repeater[$key]->add_control(
                'list_btn_text',
                [
                    'label' => __('BTN Text', 'bdevselement'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => __('Read More', 'bdevselement'),
                    'placeholder' => __('Link Text', 'bdevselement'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $repeater[$key]->add_control(
                'list_count_number',
                [
                    'label' => __('Count Number', 'bdevselement'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => __('01', 'bdevselement'),
                    'placeholder' => __('Count Number', 'bdevselement'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $repeater[$key]->add_control(
                'service_author_name',
                [
                    'label' => __('Author Name', 'bdevselement'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => __('Jon Williamson', 'bdevselement'),
                    'placeholder' => __('Author Name', 'bdevselement'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );


            $repeater[$key]->add_control(
                'post_id',
                [
                    'label' => __('Select ', 'bdevselement') . $value,
                    'label_block' => true,
                    'type' => BDevs_El_Select2::TYPE,
                    'multiple' => false,
                    'placeholder' => 'Search ' . $value,
                    'data_options' => [
                        'post_type' => $key,
                        'action' => 'bdevs_element_post_list_query'
                    ],
                ]
            );

            $this->add_control(
                'selected_list_' . $key,
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater[$key]->get_controls(),
                    'title_field' => '{{ title }}',
                    'condition' => [
                        'show_post_by' => 'selected',
                        'post_type' => $key
                    ],
                ]
            );
        }

        $this->end_controls_section();

        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => __('Layout', 'bdevselement'),
                'label_block' => false,
                'type' => Controls_Manager::CHOOSE,
                'default' => 'list',
                'options' => [
                    'list' => [
                        'title' => __('List', 'bdevselement'),
                        'icon' => 'eicon-editor-list-ul',
                    ],
                    'inline' => [
                        'title' => __('Inline', 'bdevselement'),
                        'icon' => 'eicon-ellipsis-h',
                    ],
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'feature_image',
            [
                'label' => __('Featured Image', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'post_image',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ],
                'condition' => [
                    'feature_image' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'list_icon',
            [
                'label' => __('List Icon', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'feature_image!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'far fa-check-circle',
                    'library' => 'reguler'
                ],
                'condition' => [
                    'list_icon' => 'yes',
                    'feature_image!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'meta',
            [
                'label' => __('Show Meta', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'author_meta',
            [
                'label' => __('Author', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'author_icon',
            [
                'label' => __('Author Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-user',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'author_meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'date_meta',
            [
                'label' => __('Date', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );        

        $this->add_control(
            'comments_meta',
            [
                'label' => __('Comments', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'date_icon',
            [
                'label' => __('Date Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-calendar-check',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'date_meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'category_meta',
            [
                'label' => __('Category', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes',
                    'post_type' => 'post',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'category_icon',
            [
                'label' => __('Category Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-folder-open',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'category_meta' => 'yes',
                    'post_type' => 'post',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'meta_position',
            [
                'label' => __('Meta Position', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'default' => 'bottom',
                'options' => [
                    'top' => __('Top', 'bdevselement'),
                    'bottom' => __('Bottom', 'bdevselement'),
                ],
                'condition' => [
                    'meta' => 'yes',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
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
                'default' => 'h4',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'item_align',
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
    }

    protected function register_style_controls()
    {

        $this->start_controls_section(
            '_section_post_list_style',
            [
                'label' => __('List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'list_item_common',
            [
                'label' => __('Common', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_responsive_control(
            'list_item_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'list_item_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'list_item_background',
                'label' => __('Background', 'bdevselement'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'list_item_box_shadow',
                'label' => __('Box Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'list_item_border',
                'label' => __('Border', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item',
            ]
        );

        $this->add_responsive_control(
            'list_item_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'advance_style',
            [
                'label' => __('Advance Style', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'bdevselement'),
                'label_off' => __('Off', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_responsive_control(
            'list_item_first',
            [
                'label' => __('First Item', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'list_item_first_child_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:first-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'list_item_first_child_border',
                'label' => __('Border', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:first-child',
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'list_item_last',
            [
                'label' => __('Last Item', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'list_item_last_child_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'list_item_last_child_border',
                'label' => __('Border', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:last-child',
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->end_controls_section();
        //Title Style
        $this->start_controls_section(
            '_section_post_list_title_style',
            [
                'label' => __('Title', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'scheme' => Schemes\Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .bdevselement-post-list-title',
            ]
        );

        $this->start_controls_tabs('title_tabs');
        $this->start_controls_tab(
            'title_normal_tab',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_hover_tab',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'title_hvr_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item a:hover .bdevselement-post-list-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
        //List Icon Style
        $this->start_controls_section(
            '_section_list_icon_feature_iamge_style',
            [
                'label' => __('Icon & Feature Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'feature_image',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                        [
                            'name' => 'list_icon',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} span.bdevselement-post-list-icon' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'feature_image!' => 'yes',
                    'list_icon' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Font Size', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} span.bdevselement-post-list-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'feature_image!' => 'yes',
                    'list_icon' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_line_height',
            [
                'label' => __('Line Height', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} span.bdevselement-post-list-icon' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'feature_image!' => 'yes',
                    'list_icon' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __('Image Width', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-item a img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'feature_image' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_boder',
                'label' => __('Border', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-list-item a img',
                'condition' => [
                    'feature_image' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'image_boder_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-item a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'feature_image' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_margin_right',
            [
                'label' => __('Margin Right', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} span.bdevselement-post-list-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevselement-post-list-item a img' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //List Meta Style
        $this->start_controls_section(
            '_section_list_meta_style',
            [
                'label' => __('Meta', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'meta' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'label' => __('Typography', 'bdevselement'),
                'scheme' => Schemes\Typography::TYPOGRAPHY_3,
                'selector' => '{{WRAPPER}} .bdevselement-post-list-meta-wrap span',
            ]
        );

        $this->add_control(
            'meta_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'meta_space',
            [
                'label' => __('Space Between', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span:last-child' => 'margin-right: 0;',
                ],
            ]
        );

        $this->add_responsive_control(
            'meta_box_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'meta_icon_heading',
            [
                'label' => __('Meta Icon', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'meta_icon_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'meta_icon_space',
            [
                'label' => __('Space Between', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span i' => 'margin-right: {{SIZE}}{{UNIT}};',
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

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if (!$settings['post_type']) return;
        $args = [
            'post_status' => 'publish',
            'post_type' => $settings['post_type'],
        ];
        if ('recent' === $settings['show_post_by']) {
            $args['posts_per_page'] = $settings['posts_per_page'];
        }

        $selected_post_type = 'selected_list_' . $settings['post_type'];

        $customize_title = [];
        $ids = [];
        if ('selected' === $settings['show_post_by']) {
            $args['posts_per_page'] = -1;
            $lists = $settings['selected_list_' . $settings['post_type']];
            if (!empty($lists)) {
                foreach ($lists as $index => $value) {
                    $post_id = !empty($value['post_id']) ? $value['post_id'] : 0;
                    $ids[] = $post_id;
                    if ($value['title']) $customize_title[$post_id] = $value['title'];
                }
            }
            $args['post__in'] = (array)$ids;
            $args['orderby'] = 'post__in';
        }

        if ('selected' === $settings['show_post_by'] && empty($ids)) {
            $posts = [];
        } else {
            $posts = get_posts($args);
        }

        $this->add_render_attribute('title', 'class', 'item_title');
        

        if (!empty($settings['design_style']) and $settings['design_style'] == 'style_3'): 
            $title = bdevs_element_kses_basic( $settings['title'] );
            $this->add_render_attribute('title', 'class', 'ablog__text--title ablog__text--title2');

        ?>

        <section class="blog-area">
            <div class="container">
                <div class="row">
                    <?php foreach ($posts as $inx => $post):
                    $categories = get_the_category($post->ID);
                    $author_bio_avatar_size = 55;
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="ablog ablog-2 mb-30 wow fadeInUp2" data-wow-delay=".3s">
                            <?php if ('yes' === $settings['feature_image']): ?>
                            <div class="ablog__img">
                                <img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
                            </div>
                            <?php endif; ?>
                            <div class="ablog__text ablog__text2">
                                <?php if ('yes' === $settings['date_meta']): ?>
                                <div class="blog__date blog__date2">
                                    <h3 class="text-white"><?php echo get_the_date("d"); ?></h3>
                                    <span class="text-white"><?php echo get_the_date("M"); ?></span>
                                </div>
                                <?php endif; ?>

                                <?php if ('top' == $settings['meta_position']) : ?>
                                <?php if ('yes' === $settings['meta']): ?>
                                <div class="ablog__meta">
                                    <ul>
                                       <?php if ('yes' === $settings['author_meta']): ?>
                                            <li class="d-none">
                                                <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <?php if ($settings['author_icon']):
                                                        Icons_Manager::render_icon($settings['author_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ('yes' === $settings['date_meta']): ?>
                                            <li class="d-none">
                                                <?php if ($settings['date_icon']):
                                                    Icons_Manager::render_icon($settings['date_icon'], ['aria-hidden' => 'true']);
                                                endif;
                                                echo get_the_date("M d, Y"); ?>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ('post' === $settings['post_type'] && 'yes' === $settings['category_meta']):
                                            $categories = get_the_category($post->ID); ?>
                                            <li>
                                                <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>">
                                                    <?php if ($settings['category_icon']):
                                                        Icons_Manager::render_icon($settings['category_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo esc_html($categories[0]->name); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if ('yes' === $settings['comments_meta']): ?>
                                            <li>
                                                <a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>

                                <?php $title = $post->post_title;
                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                    $title = $customize_title[$post->ID];
                                }
                                printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    esc_html($title),
                                    esc_url(get_the_permalink($post->ID))
                                ); ?>

                                <?php if ( !empty($settings[$selected_post_type][$inx]['post_short_text']) ): ?>
                                    <p><?php print $settings[$selected_post_type][$inx]['post_short_text'] ; ?></p>
                                <?php endif; ?>

                               <?php if ( 'top' !== $settings['meta_position']) : ?>
                               <?php if ('yes' === $settings['meta']): ?>
                                <div class="ablog__meta">
                                    <ul>

                                        <?php if ('post' === $settings['post_type'] && 'yes' === $settings['category_meta']):
                                            $categories = get_the_category($post->ID); ?>
                                            <li>
                                                <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>">
                                                    <?php if ($settings['category_icon']):
                                                        Icons_Manager::render_icon($settings['category_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo esc_html($categories[0]->name); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if ('yes' === $settings['comments_meta']): ?>
                                            <li>
                                                <a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>

                                <?php if ('yes' === $settings['author_meta']): ?>
                                <div class="ablog__user">
                                    <div class="ablog__user--img">
                                        <?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'','',array('class'=>'img-fluid media-object rounded-circle') ); ?>
                                    </div>
                                    <div class="ablog__user--title">
                                        <h5><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php print get_the_author(); ?></a></h5>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] == 'style_2'): 
            $title = bdevs_element_kses_basic( $settings['title'] );
            $this->add_render_attribute('title', 'class', 'ablog__text--title ablog__text--title2 ablog__text--title3');
            $this->add_render_attribute( 'title_s', 'class', 'section__title section__title-3 section-mb-15' );
            if (!empty($settings['icon_image']['id'])) {
                $icon_image = wp_get_attachment_image_url($settings['icon_image']['id'], 'full');
            }
        ?>


        <section class="blog-area">
            <div class="container">
                <div class="row">
                    <?php foreach ($posts as $inx => $post):
                    $categories = get_the_category($post->ID);
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="ablog ablog-2 ablog-3 mb-30 wow fadeInUp2" data-wow-delay=".6s">
                            <?php if ('yes' === $settings['feature_image']): ?>
                            <div class="ablog__img ablog__img3">
                                <img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="<?php print esc_attr__('image','airvice'); ?>">
                                <?php if ('yes' === $settings['date_meta']): ?>
                                <div class="blog__date blog__date2 blog__date3">
                                    <h3 class="text-white"><?php echo get_the_date("d"); ?></h3>
                                    <span class="text-white"><?php echo get_the_date("M"); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <div class="ablog__text ablog__text2 ablog__text3 text-center">
                                <?php if ('top' == $settings['meta_position']) : ?>
                                <?php if ('yes' === $settings['meta']): ?>
                                <div class="ablog__meta ablog__meta3">
                                    <ul>
                                       <?php if ('yes' === $settings['author_meta']): ?>
                                            <li>
                                                <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <?php if ($settings['author_icon']):
                                                        Icons_Manager::render_icon($settings['author_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ('yes' === $settings['comments_meta']): ?>
                                            <li>
                                                <a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ('post' === $settings['post_type'] && 'yes' === $settings['category_meta']):
                                            $categories = get_the_category($post->ID); ?>
                                            <li>
                                                <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>">
                                                    <?php if ($settings['category_icon']):
                                                        Icons_Manager::render_icon($settings['category_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo esc_html($categories[0]->name); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                               <?php endif; ?>
                                <?php endif; ?>

                                <?php $title = $post->post_title;
                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                    $title = $customize_title[$post->ID];
                                }
                                printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    esc_html($title),
                                    esc_url(get_the_permalink($post->ID))
                                ); ?>

                                <?php if ( !empty($settings[$selected_post_type][$inx]['post_short_text']) ): ?>
                                    <p><?php print $settings[$selected_post_type][$inx]['post_short_text'] ; ?></p>
                                <?php endif; ?>

                               <?php if ( 'top' !== $settings['meta_position']) : ?>
                               <?php if ('yes' === $settings['meta']): ?>
                                <div class="ablog__meta ablog__meta3">
                                    <ul>
                                       <?php if ('yes' === $settings['author_meta']): ?>
                                            <li>
                                                <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <?php if ($settings['author_icon']):
                                                        Icons_Manager::render_icon($settings['author_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ('yes' === $settings['comments_meta']): ?>
                                            <li>
                                                <a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ('post' === $settings['post_type'] && 'yes' === $settings['category_meta']):
                                            $categories = get_the_category($post->ID); ?>
                                            <li>
                                                <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>">
                                                    <?php if ($settings['category_icon']):
                                                        Icons_Manager::render_icon($settings['category_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo esc_html($categories[0]->name); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>

                                <div class="ablog__text3--btn">
                                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="theme-btn grey-btn"><?php print $settings[$selected_post_type][$inx]['list_btn_text'] ; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php else:
            $this->add_render_attribute( 'title_s', 'class', 'section__title section__title-2' );
            $this->add_render_attribute('title', 'class', 'blog__title');
            $this->add_render_attribute('button', 'class', 'w-btn w-btn-blue w-btn-6 bdevs-btn');
            $this->add_link_attributes('button', $settings['button_link']);
            $title = bdevs_element_kses_basic( $settings['title'] );

            if (!empty($settings['icon_image']['id'])) {
                $icon_image = wp_get_attachment_image_url($settings['icon_image']['id'], 'full');
            }
            if (!empty($posts)): ?>

            <section class="blog-area">
                <div class="container">
                    <div class="row">
                        <?php foreach ($posts as $inx => $post):
                        $categories = get_the_category($post->ID);
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="ablog mb-55 wow fadeInUp2" data-wow-delay=".3s">
                                <?php if ('yes' === $settings['feature_image']): ?>
                                <div class="ablog__img">
                                  <img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="<?php print esc_attr__('image','airvice'); ?>">
                                </div>
                                <?php endif; ?>
                                <div class="ablog__text">
                                    <?php if ('yes' === $settings['date_meta']): ?>
                                    <div class="blog__date">
                                        <h3><?php echo get_the_date("d"); ?></h3>
                                        <span><?php echo get_the_date("M"); ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ('top' == $settings['meta_position']) : ?>
                                    <?php if ('yes' === $settings['meta']): ?>
                                    <div class="ablog__meta">
                                        <ul>
                                           <?php if ('yes' === $settings['author_meta']): ?>
                                                <li>
                                                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        <?php if ($settings['author_icon']):
                                                            Icons_Manager::render_icon($settings['author_icon'], ['aria-hidden' => 'true']);
                                                        endif;
                                                        echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if ('yes' === $settings['comments_meta']): ?>
                                                <li>
                                                    <a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if ('post' === $settings['post_type'] && 'yes' === $settings['category_meta']):
                                                $categories = get_the_category($post->ID); ?>
                                                <li>
                                                    <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>">
                                                        <?php if ($settings['category_icon']):
                                                            Icons_Manager::render_icon($settings['category_icon'], ['aria-hidden' => 'true']);
                                                        endif;
                                                        echo esc_html($categories[0]->name); ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                   <?php endif; ?>
                                    <?php endif; ?>

                                    <?php $title = $post->post_title;
                                    if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                        $title = $customize_title[$post->ID];
                                    }
                                    printf('<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        esc_html($title),
                                        esc_url(get_the_permalink($post->ID))
                                    ); ?>

                                    <?php if ( !empty($settings[$selected_post_type][$inx]['post_short_text']) ): ?>
                                        <p><?php print $settings[$selected_post_type][$inx]['post_short_text'] ; ?></p>
                                    <?php endif; ?>

                                    <?php if ('top' !== $settings['meta_position']) : ?>
                                    <?php if ('yes' === $settings['meta']): ?>
                                    <div class="ablog__meta">
                                        <ul>
                                           <?php if ('yes' === $settings['author_meta']): ?>
                                                <li>
                                                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        <?php if ($settings['author_icon']):
                                                            Icons_Manager::render_icon($settings['author_icon'], ['aria-hidden' => 'true']);
                                                        endif;
                                                        echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if ('yes' === $settings['comments_meta']): ?>
                                                <li>
                                                    <a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if ('post' === $settings['post_type'] && 'yes' === $settings['category_meta']):
                                                $categories = get_the_category($post->ID); ?>
                                                <li>
                                                    <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>">
                                                        <?php if ($settings['category_icon']):
                                                            Icons_Manager::render_icon($settings['category_icon'], ['aria-hidden' => 'true']);
                                                        endif;
                                                        echo esc_html($categories[0]->name); ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                   <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="ablog__btn">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="theme-btn"><?php print $settings[$selected_post_type][$inx]['list_btn_text'] ; ?> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <?php
            else:
                printf('%1$s %2$s %3$s',
                    __('No ', 'bdevselement'),
                    esc_html($settings['post_type']),
                    __('Found', 'bdevselement')
                );
            endif;
            ?>
        <?php endif;
    }
}
