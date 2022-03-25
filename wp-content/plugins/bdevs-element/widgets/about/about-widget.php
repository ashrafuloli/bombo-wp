<?php

namespace BdevsElement\Widget;

Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined('ABSPATH') || die();

class About extends BDevs_El_Widget
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
        return 'about';
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
        return __('About', 'bdevselement');
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
        return 'eicon-single-post';
    }

    public function get_keywords()
    {
        return ['info', 'blurb', 'box', 'about', 'content'];
    }

    /**
     * Register content related controls
     */
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
                    'style_6' => __('Style 6', 'bdevselement'),
                    'style_7' => __('Style 7', 'bdevselement'),
                    'style_8' => __('Style 8', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        // Icon/Image
        $this->start_controls_section(
            '_section_mediad',
            [
                'label' => __( 'Icon / Image', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_10'],
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

        // Title & Description
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs Info Box Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevselement'),
                'placeholder' => __('Type info box description', 'bdevselement'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
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

        // imgage
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_7'],
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
                    'design_style' => ['style_2','style_3','style_5','style_6','style_7'],
                ],
            ]
        );

        $this->add_control(
            'medium_image',
            [
                'label' => __('Medium Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => [
                    'design_style' => ['style_1','style_2'],
                ],
            ]
        );

        $this->add_control(
            'small_image',
            [
                'label' => __('Small Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1',],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Features List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                 'condition' => [
                    'design_style' => ['style_8'],
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevselement'),
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
                    'condition' => [
                        'field_condition' => [ 'style_1','style_5']
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
                    'type' => 'image',
                    'field_condition' => [ 'style_1','style_5']
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
                        'field_condition' => [ 'style_1','style_5']
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
                        'field_condition' => [ 'style_1','style_5']
                    ]
                ]
            );
        }

        $repeater->add_control(
            'sub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Sub Title', 'bdevselement'),
                'placeholder' => __('Type sub title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'type' => 'icon',
                    'field_condition' => [ 'style_4']
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
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
                'label' => __('Description', 'bdevselement'),
                'placeholder' => __('Type description here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'type' => 'icon',
                    'field_condition' => [ 'style_1','style_2','style_4','style_5','style_8']
                ]
            ]
        );

        $repeater->add_control(
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
                    'field_condition' => ['style_5','style_8']
                ]
            ]
        );

        $repeater->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Icon Bg color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#FEC931',
                'frontend_available' => true,
                'selectors' => [
                     '{{WRAPPER}}  {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
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
                    'design_style' => [ 'style_1']
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
                'condition' => [
                    'design_style' => ['style_4','style_7'],
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

    /**
     * Register styles related controls
     */
    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_media_style',
            [
                'label' => __('Icon / Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offset_toggle',
            [
                'label' => __('Offset', 'bdevselement'),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', 'bdevselement'),
                'label_on' => __('Custom', 'bdevselement'),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'media_offset_x',
            [
                'label' => __('Offset Left', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'render_type' => 'ui',
            ]
        );

        $this->add_responsive_control(
            'media_offset_y',
            [
                'label' => __('Offset Top', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    // Media translate styles
                    '(desktop){{WRAPPER}} .about__thumb img , (desktop){{WRAPPER}} .capabilities__thumb, (desktop){{WRAPPER}} .achievement__thumb img' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}} .about__thumb img, (tablet){{WRAPPER}} .capabilities__thumb, (tablet){{WRAPPER}} .achievement__thumb img' => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}} .about__thumb img, (mobile){{WRAPPER}} .capabilities__thumb, (mobile){{WRAPPER}} .achievement__thumb img' => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}});',
                    // Body text styles
                    '{{WRAPPER}} .about__thumb,{{WRAPPER}} .capabilities__thumb, {{WRAPPER}} .achievement__thumb img' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'media_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .about__thumb, {{WRAPPER}} .achievement__thumb' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'media_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .about__thumb, {{WRAPPER}} .about__thumb i, {{WRAPPER}} .achievement__thumb' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'media_border',
                'selector' => '{{WRAPPER}} .about__thumb img, {{WRAPPER}} .about__thumb i, {{WRAPPER}} .achievement__thumb img',
            ]
        );

        $this->add_responsive_control(
            'media_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .about__thumb img, {{WRAPPER}} .achievement__thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about__thumb i, {{WRAPPER}} .achievement__thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'media_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .about__thumb img, {{WRAPPER}} .about__thumb i, {{WRAPPER}} .achievement__thumb img'
            ]
        );

        $this->add_control(
            'icon_bg_rotate',
            [
                'label' => __('Background Rotate', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
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
                    // Icon rotate styles
                    '{{WRAPPER}} .about__thumb img' => '-ms-transform: rotate(-{{SIZE}}{{UNIT}}); -webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                    // Icon box transform styles
                    '(desktop){{WRAPPER}} .about__thumb,(desktop){{WRAPPER}} .achievement__thumb' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg);',
                    '(tablet){{WRAPPER}} .about__thumb,(tablet){{WRAPPER}} .achievement__thumb' => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg);',
                    '(mobile){{WRAPPER}} .about__thumb,(mobile){{WRAPPER}} .achievement__thumb' => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg);',
                ],
            ]
        );

        $this->end_controls_section();

        // Title & Description style
        $this->start_controls_section(
            '_section_title_style',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Box Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .about__content, {{WRAPPER}} .capabilities__content, {{WRAPPER}} .achievement__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Sub Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'sub_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .about__content .section__title span,{{WRAPPER}} .section__title span, {{WRAPPER}} .section__title-3 span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label' => __('Sub Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__content .section__title span,{{WRAPPER}} .section__title span, {{WRAPPER}} .section__title-3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .about__content .section__title span,{{WRAPPER}} .section__title span, {{WRAPPER}} .section__title-3 span',
                'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_control(
            'title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .about__content .section__title,{{WRAPPER}} .section__title-2 h2, {{WRAPPER}} .section__title-3 h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__content .section__title h2,{{WRAPPER}} .section__title-2 h2, {{WRAPPER}} .section__title-3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .about__content .section__title h2,{{WRAPPER}} .section__title-2 h2, {{WRAPPER}} .section__title-3 h2',
                'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_control(
            'description_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .about__content p, {{WRAPPER}} .achievement__content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__content p, {{WRAPPER}} .achievement__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .about__content p, {{WRAPPER}} .achievement__content p',
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

        $title = bdevs_element_kses_basic($settings['title']);
        ?>

    <?php if ($settings['design_style'] === 'style_8'):

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section-title' );

        $this->add_render_attribute('button', 'class', 'theme-btn theme-btn-blue bdevs-btn');
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['bg_image']['id']) ){
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
        }

        ?>

        <div class="choose-feature-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="choose--feature__left mr-70 mb-30">
                            <div class="section-title-wrapper mb-35 wow fadeInUp2" data-wow-delay=".3s">
                                <?php if ( $settings['sub_title'] ): ?>
                                <h6 class="subtitle mb-20">
                                    <?php if ( !empty($settings['shape_switch']) ): ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/subtitle-icon.png" class="img-fluid" alt="img">
                                    <?php endif;?>

                                    <?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></h6>
                                <?php endif;?>

                               <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); 
                                ?>
                            </div>

                            <?php if ($settings['description']): ?>
                                <p class="mb-40 wow fadeInUp2" data-wow-delay=".4s"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <?php if ( !empty($settings['button_text']) ) : ?>
                            <div class="ateam__3--btn wow fadeInUp2" data-wow-delay=".6s">
                                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                    printf('<a %1$s href="%3$s">%2$s</a>',
                                        $this->get_render_attribute_string('button'),
                                        esc_html($settings['button_text']),
                                        esc_url($settings['button_link']['url'])
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
                                <?php endif;
                                endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <?php foreach ($settings['slides'] as $slide): ?>
                            <div class="col-sm-6">
                                <div class="choose--feature mb-30 wow fadeInUp2" data-wow-delay=".3s">
                                    <div class="choose--feature__icon mb-15">
                                        <?php if ( $slide['type'] === 'image' && ( $slide['image_icon']['url'] || $slide['image_icon']['id'] ) ):
                                            $this->get_render_attribute_string( 'image' );
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                            ?>
                                            <figure>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'image_icon', 'image_icon' ); ?>
                                            </figure>
                                            <?php elseif ( !empty( $slide['icon'] ) || !empty( $slide['selected_icon']['value'] ) ): ?>
                                            <figure>
                                                <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' );?>
                                            </figure>
                                        <?php endif;?>
                                    </div>
                                    <div class="choose--feature__text">
                                        <h4 class="choose--feature__text--title"><a href="<?php echo esc_url( $slide['title_url'] ); ?>"><?php echo bdevs_element_kses_intermediate($slide['title']); ?></a></h4>
                                        <p><?php echo bdevs_element_kses_intermediate($slide['description']); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($settings['design_style'] === 'style_7'):

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'z-index' );


        if ( !empty($settings['bg_image']['id']) ){
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
        }


        ?>

        <section class="contact-area">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-7">
                        <?php if ( !empty($bg_image) ) : ?>
                        <div class="acontact__img wow fadeInUp2" data-wow-delay=".3s">
                            <img src="<?php echo esc_url($bg_image); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">

                            <div class="acontact__img--text wow fadeInUp2" data-wow-delay=".5s">
                                <h1 class="acontact__img--text__backtitle"><?php echo bdevs_element_kses_intermediate($settings['back_title']); ?></h1>
                               <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); 
                                ?>
                            </div>
                        </div>
                        <?php endif ?>
                    </div>
                    <div class="col-lg-5">
                        <div class="acontact__form wow fadeInUp2" data-wow-delay=".8s">
                            <h3 class="acontact__form--title"><?php echo bdevs_element_kses_intermediate($settings['form_title']); ?></h3>

                            <?php if (!empty($settings['form_id'])) {
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
        </section>


    <?php elseif ($settings['design_style'] === 'style_6'):

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section-title' );


        if ( !empty($settings['bg_image']['id']) ){
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
        }


        ?>

        <section class="service-area-2 white-bg z-index">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="aservice--2 mb-30">
                            <div class="section-title-wrapper mb-50 wow fadeInUp2" data-wow-delay=".3s">
                               <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); 
                                ?>
                            </div>

                            <?php foreach ($settings['slides'] as $slide): ?>
                            <div class="aservice__list mb-55 wow fadeInUp2" data-wow-delay=".6s">
                                <div class="aservice__list--icon">
                                    <?php if ( $slide['type'] === 'image' && ( $slide['image_icon']['url'] || $slide['image_icon']['id'] ) ):
                                        $this->get_render_attribute_string( 'image' );
                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                        <figure>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'image_icon', 'image_icon' ); ?>
                                        </figure>
                                        <?php elseif ( !empty( $slide['icon'] ) || !empty( $slide['selected_icon']['value'] ) ): ?>
                                        <figure>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' );?>
                                        </figure>
                                    <?php endif;?>
                                </div>
                                <div class="aservice__list--text">
                                    <h4 class="aservice__list--text__title"><a href="<?php echo esc_url( $slide['title_url'] ); ?>"><?php echo bdevs_element_kses_intermediate($slide['title']); ?></a></h4>
                                    <p><?php echo bdevs_element_kses_intermediate($slide['description']); ?></p>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <?php if ( !empty($bg_image) ) : ?>
                        <div class="aservice--img__2 mb-30 wow fadeInUp2" data-wow-delay="1.5s">
                            <img src="<?php echo esc_url($bg_image); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>
        
    <?php elseif ($settings['design_style'] === 'style_5'):
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section-title' );

        if ( !empty($settings['bg_image']['id']) ){
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
        }


        ?>

        <div class="choose-area-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="choose--content choose--content__3">
                            <div class="section-title-wrapper mb-35 wow fadeInUp2" data-wow-delay=".3s">
                                <?php if ($settings['sub_title']): ?>
                                <h6 class="subtitle mb-20"> <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h6>
                                <?php endif; ?>

                               <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); 
                                ?>
                            </div>
                            <?php if ($settings['description']): ?>
                                <p class="mb-40 wow fadeInUp2" data-wow-delay=".6s"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>

                            <?php foreach ($settings['slides'] as $slide): ?>
                            <div class="achoose mb-40 wow fadeInUp2" data-wow-delay=".9s">
                                <div class="achoose__icon theme-bg-blue">
                                    <?php if ( $slide['type'] === 'image' && ( $slide['image_icon']['url'] || $slide['image_icon']['id'] ) ):
                                        $this->get_render_attribute_string( 'image' );
                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                        <figure>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'image_icon', 'image_icon' ); ?>
                                        </figure>
                                        <?php elseif ( !empty( $slide['icon'] ) || !empty( $slide['selected_icon']['value'] ) ): ?>
                                        <figure>
                                            <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' );?>
                                        </figure>
                                    <?php endif;?>
                                </div>
                                <div class="achoose__text fix">
                                    <h4 class="achoose__text--title"><?php echo bdevs_element_kses_intermediate($slide['title']); ?></h4>
                                    <p><?php echo bdevs_element_kses_intermediate($slide['description']); ?></p>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php if ( !empty($bg_image) ) : ?>
                        <div class="achoose__img--3 wow fadeInUp2" data-wow-delay="1.5s">
                            <img src="<?php echo esc_url($bg_image); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($settings['design_style'] === 'style_4'):

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section-title' );


        ?>

        <section class="about-area-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="acontact__form mr-70 wow fadeInUp2" data-wow-delay=".3s">
                            <h3 class="acontact__form--title"><?php echo bdevs_element_kses_intermediate($settings['form_title']); ?></h3>
                            <?php if (!empty($settings['form_id'])) {
                                echo bdevs_element_do_shortcode('contact-form-7', [
                                    'id' => $settings['form_id'],
                                    'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param($settings['html_class']),
                                ]);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="aabout-text-3">
                            <div class="section-title-wrapper mb-30 wow fadeInUp2" data-wow-delay=".6s">
                                <?php if ($settings['sub_title']): ?>
                                <h6 class="subtitle mb-20"> <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h6>
                                <?php endif; ?>

                               <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); 
                                ?>
                            </div>

                            <?php if ($settings['description']): ?>
                                <p class="mb-45 wow fadeInUp2" data-wow-delay=".9s"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            <div class="aabout__fact">
                                <div class="row">
                                    <?php foreach ($settings['slides'] as $slide): ?>
                                    <div class="col-md-6">
                                        <div class="aabout__fact--single mb-30 wow fadeInUp2" data-wow-delay="1.2s">
                                            <h2 class="aabout__fact--single__title"><?php echo bdevs_element_kses_intermediate($slide['title']); ?></h2>
                                            <h4 class="aabout__fact--single__subtitle"><?php echo bdevs_element_kses_intermediate($slide['sub_title']); ?></h4>
                                            <p><?php echo bdevs_element_kses_intermediate($slide['description']); ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <?php elseif ($settings['design_style'] === 'style_3'):

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        if (!empty($settings['author_img']['id'])) {
            $author_img = wp_get_attachment_image_url($settings['author_img']['id'], $settings['thumbnail_size']);
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section-title');

        $this->add_render_attribute('button', 'class', 'theme-btn');
        $this->add_link_attributes('button', $settings['button_link']);
        
        ?>

        <section class="about-area about-back-bg pt-120 pb-85 wow fadeInUp2" data-wow-delay=".6s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    <?php if ( !empty($bg_image) ) : ?>
                        <div class="aabout-img-space2 mb-35 position-relative mr-70 z-index wow fadeInUp2" data-wow-delay=".3s">
                            <img src="<?php echo esc_url($bg_image); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
                            <div class="aabout__since d-flex align-items-center justify-content-center">
                                <div>
                                    <span><?php echo bdevs_element_kses_intermediate($settings['img_text']); ?></span>
                                    <h3><?php echo bdevs_element_kses_intermediate($settings['img_text2']); ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="aabout-text aabout-text2 mb-35 z-index">
                            <div class="section-title-wrapper mb-30 wow fadeInUp2" data-wow-delay=".3s">
                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        $title
                                    ); 
                                ?>
                            </div>
                            <?php if ($settings['description']): ?>
                                <p class="mb-40 wow fadeInUp2" data-wow-delay=".5s"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            <div class="row">
                                <?php foreach ($settings['slides'] as $slide): 

                                    ?>
                                <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6">
                                    <div class="aabout--profile aabout--profile2 mb-45 wow fadeInUp2" data-wow-delay=".8s">
                                        <div class="aabout--profile__img">
                                        <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ):
                                            $this->get_render_attribute_string( 'image' );
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                            ?>
                                            <figure>
                                             <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                            </figure>
                                            <?php elseif ( !empty( $slide['icon'] ) || !empty( $slide['selected_icon']['value'] ) ): ?>
                                            <figure>
                                                <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' );?>
                                            </figure>
                                        <?php endif;?>
                                        </div>
                                        <div class="aabout--profile__text aabout--profile__text2">
                                            <h4><?php echo bdevs_element_kses_intermediate($slide['title']); ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>

                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="aabout--profile__number grey-bg mb-45 wow fadeInUp2" data-wow-delay="1.4s">
                                        <span><?php echo bdevs_element_kses_intermediate($settings['number_text']); ?></span>
                                        <h4><a href="tel:<?php echo bdevs_element_kses_intermediate($settings['number']); ?>"><?php echo bdevs_element_kses_intermediate($settings['number']); ?> </a></h4>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="aabout--profile__para mb-45 wow fadeInUp2" data-wow-delay="1.7s">
                                        <p><?php echo bdevs_element_kses_intermediate($settings['ab_description']); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="aabout--profile__wrapper wow fadeInUp2" data-wow-delay="2s">
                                <?php if ( !empty($settings['button_text']) ) : ?>
                                <div class="aabout--btn">
                                     <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                            printf('<a %1$s href="%3$s">%2$s</a>',
                                                $this->get_render_attribute_string('button'),
                                                esc_html($settings['button_text']),
                                                esc_url($settings['button_link']['url'])
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
                                        <?php endif;
                                    endif; ?>
                                </div>
                                <?php endif; ?>

                                <?php if ( !empty($author_img) ) : ?>
                                <div class="aabout--profile">
                                    <div class="aabout--profile__img">
                                        <img src="<?php echo esc_url($author_img); ?>" class="img-fluid" alt="<?php print esc_attr__('image','airvice'); ?>">
                                    </div>
                                    <div class="aabout--profile__text">
                                        <h4><?php echo bdevs_element_kses_intermediate($settings['author_name']); ?></h4>
                                        <span><?php echo bdevs_element_kses_intermediate($settings['author_designation']); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif ($settings['design_style'] === 'style_2'):
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }
        if (!empty($settings['medium_image']['id'])) {
            $medium_image = wp_get_attachment_image_url($settings['medium_image']['id'], $settings['thumbnail_size']);
        } 

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section-title');

        ?>

        <section class="position-relative">
            <?php if ( !empty($bg_image) ) : ?>
            <div class="why__choose--bg d-lg-none">
                <img src="<?php echo esc_url($bg_image); ?>" class="img-fluid z-index" alt="<?php print esc_attr__('image','airvice'); ?>">
            </div>
            <?php endif; ?>
            <div class="choose-area" data-background="<?php echo esc_url($bg_image); ?>">
                <div class="choose-bg-right" data-background="<?php echo esc_url($medium_image); ?>"></div>
                <div class="choose--content__wrapper z-index">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-lg-7">
                                <div class="choose--content">
                                    <div class="section-title-wrapper mb-35 wow fadeInUp2" data-wow-delay=".3s">
                                        <?php if ($settings['sub_title']): ?>
                                        <h6 class="subtitle mb-20">
                                            <?php if ( !empty($settings['shape_switch']) ): ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/subtitle-icon.png" class="img-fluid" alt="img">
                                            <?php endif; ?>
                                            <?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h6>
                                        <?php endif; ?>

                                       <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape($settings['title_tag']),
                                                $this->get_render_attribute_string('title'),
                                                $title
                                            ); 
                                        ?>
                                    </div>

                                    <?php if ($settings['description']): ?>
                                        <p class="mb-40 wow fadeInUp2" data-wow-delay=".6s"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                    <?php endif; ?>

                                    <?php foreach ($settings['slides'] as $slide): ?>
                                    <div class="achoose mb-40 wow fadeInUp2" data-wow-delay="1.2s">
                                        <div class="achoose__icon elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
                                            <?php if ( $slide['type'] === 'image' && ( $slide['image_icon']['url'] || $slide['image_icon']['id'] ) ):
                                                $this->get_render_attribute_string( 'image' );
                                                $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                                ?>
                                                <figure>
                                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'image_icon', 'image_icon' ); ?>
                                                </figure>
                                                <?php elseif ( !empty( $slide['icon'] ) || !empty( $slide['selected_icon']['value'] ) ): ?>
                                                <figure>
                                                    <?php bdevs_element_render_icon( $slide, 'icon', 'selected_icon' );?>
                                                </figure>
                                            <?php endif;?>
                                        </div>
                                        <div class="achoose__text">
                                            <h4 class="achoose__text--title"><?php echo bdevs_element_kses_intermediate($slide['title']); ?></h4>
                                            <p><?php echo bdevs_element_kses_intermediate($slide['description']); ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php else:

        if (!empty($settings['image']['id'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section-title');

        $this->add_render_attribute('button', 'class', 'bombo-btn');
        $this->add_link_attributes('button', $settings['button_link']);
    
        ?>

        <section class="about-area black-bg pt-120 pb-90">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <?php if ( !empty($image) ) : ?>
                        <div class="about-thumb mb-30">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php print esc_attr__('image','airvice'); ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-content pl-50">
                            <?php if ( !empty($title) ) : ?>
                            <h2 class="about-title mb-50"><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
                            <?php endif; ?>

                            <p><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>

                            <div class="about-btn pt-40">
                                <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                        printf('<a %1$s href="%3$s">%2$s</a>',
                                            $this->get_render_attribute_string('button'),
                                            esc_html($settings['button_text']),
                                            esc_url($settings['button_link']['url'])
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
                                    <?php endif;
                                endif; ?>
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
