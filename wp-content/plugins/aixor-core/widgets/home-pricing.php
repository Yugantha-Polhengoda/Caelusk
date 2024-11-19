<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use Elementor\Repeater;


class aixorPricing extends Widget_Base
{

    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-pricing';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Pricing Table', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-calendar';
    }

    /**
     * Get widget categories.
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['aixor-elementor-cat'];
    }

    /**
     * Get widget keywords.
     *
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['aixor', 'pricing'];
    }

    /**
     * Register Aixor widget controls.
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'pricing_section_header',
            [
                'label' => esc_html__('Section Header', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_subtitle',
            [
                'label'       => esc_html__('Section Sub Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('PRICING PLANS', 'aixor-core'),
            ]
        );
        $this->add_control(
            'section_subtitle_icon',
            [
                'label' => esc_html__('Choose Subtitle Icon', 'aixor-core'),
                'type'  => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'section_title',
            [
                'label'       => esc_html__('Section Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => '<span>Flexible Plans,</span> Powerful Results',
                'label_block' => true
            ]
        );
        $this->add_control(
            'section_content',
            [
                'label'       => esc_html__('Section Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Whether you\'re a startup looking for a boost or an established brand aiming to elevate your presence,<br> we have a plan that fits your goals and budget.',
                'label_block' => true
            ]
        );
        $this->end_controls_section();

        $this->tabSection();


        $this->sectionSubTitleStyle();
        $this->sectionTitleStyle();
        $this->tabTitleStyle();
        $this->pricingBoxStyle();
        $this->pricingTitleStyle();
        $this->pricingPriceStyle();
        $this->pricingPriceSubTitleStyle();
        $this->pricingContentStyle();
        $this->pricingFeatureListBoxStyle();
        $this->pricingFeatureListsStyle();
        $this->pricingFeatureListIconStyle();
        $this->pricingButtonStyle();

    }

    protected function tabSection()
    {
        $this->start_controls_section(
            'pricing_section_tabs',
            [
                'label' => esc_html__('Pricing Lists', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'pricing_shape_image1',
            [
                'label'   => esc_html__('Shape Image 1', 'aixor-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'pricing_shape_image2',
            [
                'label'   => esc_html__('Shape Image 2', 'aixor-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'pricing_tab_title',
            [
                'label'       => esc_html__('Tab Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Monthly', 'aixor-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'pricing_tab_slug',
            [
                'label'       => esc_html__('Tab Slug', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'monthly',
                'label_block' => true,
            ]
        );
        // Plan One
        $repeater->add_control(
            'pricing_plan_1',
            [
                'type'       => Controls_Manager::ALERT,
                'alert_type' => 'success',
                'heading'    => esc_html__('Plan 1', 'aixor-core')
            ]
        );
        $repeater->add_control(
            'pricing_is_popular',
            [
                'label'        => esc_html__('Make Popular Plan', 'aixor-core'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'aixor-core'),
                'label_off'    => esc_html__('No', 'aixor-core'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $repeater->add_control(
            'pricing_title',
            [
                'label'       => esc_html__('Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Standard Plan', 'aixor-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'pricing_price',
            [
                'label'       => esc_html__('Price', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => '$1.500<span>/month</span>',
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'pricing_content',
            [
                'label'       => esc_html__('Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Ideal for growing businesses that need more advanced solutions.',
                'label_block' => true,
                'row'         => 3
            ]
        );
        $repeater->add_control(
            'pricing_feature_lists',
            [
                'label'       => esc_html__('Feature Lists', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => "Custom website design\nBasic SEO optimisation\nSocial media setup\nMonthly performance reports\nEmail support",
                'label_block' => true,
                'row'         => 5
            ]
        );
        $repeater->add_control(
            'pricing_check_icon',
            [
                'label'       => esc_html__('List Icon', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'las la-check',
                'description'   => sprintf(
                    esc_html__( 'Paste Line-Awesomr Icon Class. For more icons, visit %s.', 'aixor-core' ),
                    '<a href="https://icons8.com/line-awesome" target="_blank">icons pack</a>'),
            ]
        );
        $repeater->add_control(
            'pricing_button_text',
            [
                'label'       => esc_html__('Button Text', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__("Let's Start Now", "aixor-core"),
            ]
        );
        $repeater->add_control(
            'button_icon_type',
            [
                'label' => esc_html__('Icon Type', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon' => esc_html__('Icon Class', 'aixor-core'),
                    'svg_upload' => esc_html__('Upload SVG', 'aixor-core'),
                ],
                'default' => 'svg_upload',
            ]
        );

        $repeater->add_control(
            'button_icon',
            [
                'label' => esc_html__('Icon', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'iconoir-arrow-up-right',
                'description' => sprintf(
                    esc_html__('Paste Iconoir Icon Class. For more icons, visit %s.', 'aixor-core'),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'
                ),
                'condition' => [
                    'button_icon_type' => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'button_icon_svg_upload',
            [
                'label' => esc_html__('Upload SVG', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'description' => esc_html__('Upload an SVG file.', 'aixor-core'),
                'condition' => [
                    'button_icon_type' => 'svg_upload',
                ],
            ]
        );
        $repeater->add_control(
            'pricing_button_url',
            [
                'label'       => esc_html__('Button Url', 'aixor-core'),
                'type'        => Controls_Manager::URL,
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'animation1', [
                'label'         => esc_html__( 'Animation Effect', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => [
                    'None'  => esc_html__('None', 'aixor-core'),
                    'fade-up' => esc_html__('fade-up', 'aixor-core'),
                    'fade-down' => esc_html__('fade-down', 'aixor-core'),
                    'fade-left' => esc_html__('fade-left', 'aixor-core'),
                    'fade-right' => esc_html__('fade-right', 'aixor-core'),
                    // Add more options here if needed
                ],
                'default'       => 'fade-up', // Set default value to 'none'
            ]
        );

        $repeater->add_control(
            'animation_delay1', [
                'label'       => esc_html__('Animation Delay', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        // Plan Two
        $repeater->add_control(
            'pricing_plan_2',
            [
                'type'       => Controls_Manager::ALERT,
                'alert_type' => 'success',
                'heading'    => esc_html__('Plan 2', 'aixor-core')
            ]
        );
        $repeater->add_control(
            'pricing2_is_popular',
            [
                'label'        => esc_html__('Make Popular Plan', 'aixor-core'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'aixor-core'),
                'label_off'    => esc_html__('No', 'aixor-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater->add_control(
            'pricing2_title',
            [
                'label'       => esc_html__('Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Standard Plan', 'aixor-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'pricing2_price',
            [
                'label'       => esc_html__('Price', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => '$1.500<span>/month</span>',
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'pricing2_content',
            [
                'label'       => esc_html__('Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Ideal for growing businesses that need more advanced solutions.',
                'label_block' => true,
                'row'         => 3
            ]
        );
        $repeater->add_control(
            'pricing2_feature_lists',
            [
                'label'       => esc_html__('Feature Lists', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => "Everything in Standard Plan\nAdvanced SEO and keyword targeting\nContent creation and blog management\nSocial media management and advertising\nPriority email and phone support",
                'label_block' => true,
                'row'         => 5
            ]
        );
        $repeater->add_control(
            'pricing2_check_icon',
            [
                'label'       => esc_html__('List Icon', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'las la-check',
                'description'   => sprintf(
                    esc_html__( 'Paste Line-Awesomr Icon Class. For more icons, visit %s.', 'aixor-core' ),
                    '<a href="https://icons8.com/line-awesome" target="_blank">icons pack</a>'),
            ]
        );
        $repeater->add_control(
            'pricing2_button_text',
            [
                'label'       => esc_html__('Button Text', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__("Let's Start Now", "aixor-core"),
            ]
        );
        $repeater->add_control(
            'button2_icon_type',
            [
                'label' => esc_html__('Icon Type', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon2' => esc_html__('Icon Class', 'aixor-core'),
                    'svg_upload2' => esc_html__('Upload SVG', 'aixor-core'),
                ],
                'default' => 'svg_upload2',
            ]
        );

        $repeater->add_control(
            'button2_icon',
            [
                'label' => esc_html__('Icon', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'iconoir-arrow-up-right',
                'description' => sprintf(
                    esc_html__('Paste Iconoir Icon Class. For more icons, visit %s.', 'aixor-core'),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'
                ),
                'condition' => [
                    'button2_icon_type' => 'icon2',
                ],
            ]
        );

        $repeater->add_control(
            'button2_icon_svg_upload',
            [
                'label' => esc_html__('Upload SVG', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'description' => esc_html__('Upload an SVG file.', 'aixor-core'),
                'condition' => [
                    'button2_icon_type' => 'svg_upload2',
                ],
            ]
        );
        $repeater->add_control(
            'pricing2_button_url',
            [
                'label'       => esc_html__('Button Url', 'aixor-core'),
                'type'        => Controls_Manager::URL,
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'animation2', [
                'label'         => esc_html__( 'Animation Effect', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => [
                    'None'  => esc_html__('None', 'aixor-core'),
                    'fade-up' => esc_html__('fade-up', 'aixor-core'),
                    'fade-down' => esc_html__('fade-down', 'aixor-core'),
                    'fade-left' => esc_html__('fade-left', 'aixor-core'),
                    'fade-right' => esc_html__('fade-right', 'aixor-core'),
                    // Add more options here if needed
                ],
                'default'       => 'fade-up', // Set default value to 'none'
            ]
        );

        $repeater->add_control(
            'animation_delay2', [
                'label'       => esc_html__('Animation Delay', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'pricing_lists',
            [
                'label'       => esc_html__('Pricing Lists', 'aixor-core'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'pricing_tab_title'     => 'Monthly',
                        'pricing_tab_slug'      => 'monthly',
                        'pricing_price'         => '$1.500<span>/month</span>',
                        'pricing_title'         => 'Standard Plan',
                        'pricing_feature_lists' => "Custom website design\nBasic SEO optimisation\nSocial media setup\nMonthly performance reports\nEmail support",
                        'pricing_is_popular'    => 'no',

                        'pricing2_price'         => '$6.500<span>/month</span>',
                        'pricing2_title'         => 'Professional Plan',
                        'pricing2_feature_lists' => "Everything in Standard Plan\nAdvanced SEO and keyword targeting\nContent creation and blog management\nSocial media management and advertising\nPriority email and phone support",
                        'pricing2_is_popular'    => 'yes'
                    ],
                    [
                        'pricing_tab_title'     => 'Annual <span>-20%</span>',
                        'pricing_tab_slug'      => 'annual',
                        'pricing_price'         => '$1.500<span>/month</span>',
                        'pricing_title'         => 'Standard Plan',
                        'pricing_feature_lists' => "Custom website design\nBasic SEO optimisation\nSocial media setup\nMonthly performance reports\nEmail support",
                        'pricing_is_popular'    => 'no',

                        'pricing2_price'         => '$6.500<span>/month</span>',
                        'pricing2_title'         => 'Professional Plan',
                        'pricing2_feature_lists' => "Everything in Standard Plan\nAdvanced SEO and keyword targeting\nContent creation and blog management\nSocial media management and advertising\nPriority email and phone support",
                        'pricing2_is_popular'    => 'yes'
                    ]
                ],
                'title_field' => '{{{ pricing_tab_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    private function sectionSubTitleStyle()
    {
        $this->start_controls_section(
            'section_subtitle_style',
            [
                'label' => esc_html__('Section Sub-Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_subtitle_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-sec .section-header .section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .pricing-sec .section-header .section-subtitle',
            ]
        );
        $this->add_control(
            'section_subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-sec .section-header .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function sectionTitleStyle()
    {
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Section Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_title_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-sec .section-header .section-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .about-sec .section-header .section-title',
            ]
        );
        $this->add_control(
            'section_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .about-sec .section-header .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function tabTitleStyle()
    {
        $this->start_controls_section(
            'tab_title_style',
            [
                'label' => esc_html__('Tab Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tab_title_color',
            [
                'label'     => esc_html__('Normal Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-sec .pricing_nav .nav-item button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tab_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-sec .pricing_nav .nav-item button.active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'tab_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .pricing-sec .pricing_nav .nav-item button',
            ]
        );
        $this->add_responsive_control(
            'tab_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-sec .pricing_nav .nav-item button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function pricingBoxStyle()
    {
        $this->start_controls_section(
            'pricing_box_style',
            [
                'label' => esc_html__('Pricing Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'pricing_box_background',
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .pricing-box',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'pricing_box_border',
                'selector' => '{{WRAPPER}} .pricing-box',
            ]
        );
        $this->add_responsive_control(
            'pricing_box_radius',
            [
                'label'      => esc_html__('Border Radius', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 16,
                    'right'    => 16,
                    'bottom'   => 16,
                    'left'     => 16,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_box_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 40,
                    'right'    => 28,
                    'bottom'   => 40,
                    'left'     => 28,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_box_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function pricingTitleStyle()
    {
        $this->start_controls_section(
            'pricing_title_style',
            [
                'label' => esc_html__('Pricing Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pricing_title_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'pricing_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .pricing-box .title',
            ]
        );
        $this->add_responsive_control(
            'pricing_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function pricingPriceStyle()
    {
        $this->start_controls_section(
            'pricing_price_style',
            [
                'label' => esc_html__('Pricing Price', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pricing_price_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'pricing_price_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .pricing-box .price',
            ]
        );
        $this->add_responsive_control(
            'pricing_price_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function pricingPriceSubTitleStyle()
    {
        $this->start_controls_section(
            'pricing_price_subtitle_style',
            [
                'label' => esc_html__('Pricing Price Subtitle', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pricing_price_subtitle_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .price span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'pricing_price_subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .pricing-box .price span',
            ]
        );
        $this->add_responsive_control(
            'pricing_price_subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .price span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function pricingContentStyle()
    {
        $this->start_controls_section(
            'pricing_content_style',
            [
                'label' => esc_html__('Pricing Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pricing_content_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'pricing_content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .pricing-box p',
            ]
        );
        $this->add_responsive_control(
            'pricing_content_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function pricingFeatureListBoxStyle()
    {
        $this->start_controls_section(
            'pricing_feature_list_box_style',
            [
                'label' => esc_html__('Pricing Feature List Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'pricing_feature_list_box_border',
                'selector' => '{{WRAPPER}} .pricing-box .feature-lists',
            ]
        );
        $this->add_responsive_control(
            'pricing_feature_list_box_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 32,
                    'right'    => 28,
                    'bottom'   => 32,
                    'left'     => 28,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .feature-lists' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_feature_list_box_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .feature-lists' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function pricingFeatureListsStyle()
    {
        $this->start_controls_section(
            'pricing_feature_lists_style',
            [
                'label' => esc_html__('Pricing Feature Lists', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pricing_feature_lists_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .feature-lists li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'pricing_feature_lists_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .pricing-box .feature-lists li',
            ]
        );
        $this->add_responsive_control(
            'pricing_feature_lists_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .feature-lists li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function pricingFeatureListIconStyle()
    {
        $this->start_controls_section(
            'pricing_feature_list_icon_style',
            [
                'label' => esc_html__('Pricing Feature List Icon', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pricing_feature_list_icon_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .feature-lists li .icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'pricing_feature_list_icon_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .feature-lists li .icon svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_feature_list_icon_size',
            [
                'label'      => esc_html__('Size', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .feature-lists li .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_feature_list_icon_width',
            [
                'label'      => esc_html__('Width', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 26,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .feature-lists li .icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_feature_list_icon_height',
            [
                'label'      => esc_html__('Height', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 26,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .feature-lists li .icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_feature_list_icon_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .feature-lists li .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_feature_list_icon_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .feature-lists li .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function pricingButtonStyle()
    {
        $this->start_controls_section(
            'pricing_button_style',
            [
                'label' => esc_html__('Pricing Button', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'aixor-core'),
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn'          => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'selector' => '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'aixor-core'),
            ]
        );
        $this->add_control(
            'button_hv_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn:hover'          => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn:hover svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_hv_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'button_hv_border',
                'selector' => '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'tab_hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn',
            ]
        );
        $this->add_responsive_control(
            'button_radius',
            [
                'label'      => esc_html__('Border Radius', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 12,
                    'right'    => 24,
                    'bottom'   => 12,
                    'left'     => 24,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box .pricing-footer .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    /**
     * Render currency widget output on the frontend.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="pricing-sec">
            <div class="custom-container">
                <div class="section-header section-header2">
                    <?php if (!empty($settings['section_subtitle'])) { ?>
                        <span class="section-subtitle">
                            <?php if (!empty($settings['section_subtitle_icon']['url'])) { ?>
                                <img src="<?php echo esc_url($settings['section_subtitle_icon']['url']); ?>"
                                     alt="<?php echo esc_attr($settings['section_subtitle']); ?>">
                            <?php }
                            echo esc_html($settings['section_subtitle']); ?>
                        </span>
                    <?php }
                    if (!empty($settings['section_title'])) {
                        ?>
                        <h2 class="section-title section-title2">
                            <?php echo $settings['section_title']; ?>
                        </h2>
                    <?php }
                    if (!empty($settings['section_content'])) {
                        ?>
                        <p class="section-desc"><?php echo $settings['section_content']; ?></p>
                    <?php } ?>
                </div>

                <?php if ($settings['pricing_lists']) { ?>
                        <div class="pricing_nav_wrap">
                            <ul class="pricing_nav nav-tabs" id="myTab" role="tablist">
                                <?php foreach ($settings['pricing_lists'] as $index => $tab_list) {
                                    $activeClass = '';
                                    if ($index == 0) {
                                        $activeClass = 'active';
                                    }
                                    ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo esc_attr($activeClass); ?>"
                                                id="<?php echo esc_attr($tab_list['pricing_tab_slug']); ?>-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#<?php echo esc_attr($tab_list['pricing_tab_slug']); ?>"
                                                type="button"
                                                role="tab"
                                                aria-controls="<?php echo esc_attr($tab_list['pricing_tab_slug']); ?>"
                                                aria-selected="<?php if ($index == 0) {
                                                    echo true;
                                                } else {
                                                    echo false;
                                                } ?>"><?php echo $tab_list['pricing_tab_title']; ?>

                                        </button>
                                    </li>
                                <?php } ?>
                            </ul>
                            <span class="nav-hover-shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="290" height="70"
                                         viewBox="0 0 290 70" fill="none">
                                        <path d="M290 0L249 60H41L0 0H290Z" fill="url(#paint0_linear_1_3)"/>
                                        <g filter="url(#filter0_d_1_3)">
                                        <path d="M36 62C36 59.7909 37.7909 58 40 58H250C252.209 58 254 59.7909 254 62H36Z"
                                              fill="white"/>
                                        </g>
                                        <defs>
                                        <filter id="filter0_d_1_3" x="32" y="58" width="226" height="12"
                                                filterUnits="userSpaceOnUse"
                                                color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                       result="hardAlpha"/>
                                        <feOffset dy="4"/>
                                        <feGaussianBlur stdDeviation="2"/>
                                        <feComposite in2="hardAlpha" operator="out"/>
                                        <feColorMatrix type="matrix"
                                                       values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                                 result="effect1_dropShadow_1_3"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_3"
                                                 result="shape"/>
                                        </filter>
                                        <linearGradient id="paint0_linear_1_3" x1="145" y1="90" x2="145"
                                                        y2="-1.62534e-07" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#666666"/>
                                        <stop offset="1"/>
                                        </linearGradient>
                                        </defs>
                                    </svg>
                                </span>
                        </div>
                    <div class="tab-content" id="myTabContent">

                        <?php foreach ($settings['pricing_lists'] as $index => $tab_list) {
                            $activeClass = '';
                            if ($index == 0) {
                                $activeClass = 'show active';
                            }
                            ?>
                            <div class="tab-pane fade <?php echo esc_attr($activeClass); ?>"
                                 id="<?php echo esc_attr($tab_list['pricing_tab_slug']); ?>" role="tabpanel"
                                 aria-labelledby="<?php echo esc_attr($tab_list['pricing_tab_slug']); ?>-tab">
                                <div class="pricing-lists">
                                    <?php if (!empty($settings['pricing_shape_image1']['url'])) { ?>
                                        <div class="shape_img shape_img1">
                                            <img src="<?php echo esc_url($settings['pricing_shape_image1']['url']); ?>"
                                                 alt="<?php echo esc_attr__('Shape', 'aixor-core'); ?>">
                                        </div>
                                        <?php
                                    }
                                    if (!empty($settings['pricing_shape_image2']['url'])) { ?>
                                        <div class="shape_img shape_img2">
                                            <img src="<?php echo esc_url($settings['pricing_shape_image2']['url']); ?>"
                                                 alt="<?php echo esc_attr__('Shape', 'aixor-core'); ?>">
                                        </div>
                                        <?php
                                    }

                                    if (!empty($tab_list['pricing_title']) || !empty($tab_list['pricing_price']) || !empty($tab_list['pricing_content']) || !empty($tab_list['pricing_feature_lists']) || !empty($tab_list['pricing_button_text'])) { ?>
                                        <div class="pricing-box" data-aos="<?php echo esc_attr($tab_list['animation1']); ?>" data-aos-delay="<?php echo esc_attr($tab_list['animation_delay1']); ?>">
                                            <?php if ($tab_list['pricing_is_popular'] == 'yes') { ?>
                                                <span class="pricing-featured-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="40" viewBox="0 0 28 40" fill="none">
                                                    <path d="M0 0H28V37.463C28 38.3706 26.8882 38.8088 26.2689 38.1453L15.4621 26.5665C14.6714 25.7194 13.3286 25.7194 12.5379 26.5665L1.73105 38.1453C1.11177 38.8088 0 38.3706 0 37.463V0Z" fill="white"/>
                                                    <path d="M19 12.25H15.81L18.07 10C18.2105 9.85937 18.2893 9.66875 18.2893 9.47C18.2893 9.27125 18.2105 9.08063 18.07 8.94C17.9264 8.8013 17.7346 8.72378 17.535 8.72378C17.3354 8.72378 17.1436 8.8013 17 8.94L14.75 11.2V8C14.75 7.80109 14.671 7.61032 14.5303 7.46967C14.3897 7.32902 14.1989 7.25 14 7.25C13.8011 7.25 13.6103 7.32902 13.4697 7.46967C13.329 7.61032 13.25 7.80109 13.25 8V11.19L11 8.93C10.8564 8.7913 10.6646 8.71378 10.465 8.71378C10.2654 8.71378 10.0736 8.7913 9.93 8.93C9.85895 8.99981 9.80251 9.08307 9.76399 9.17493C9.72546 9.26678 9.70562 9.36539 9.70562 9.465C9.70562 9.56461 9.72546 9.66322 9.76399 9.75507C9.80251 9.84693 9.85895 9.93019 9.93 10L12.19 12.26H9C8.80109 12.26 8.61032 12.339 8.46967 12.4797C8.32902 12.6203 8.25 12.8111 8.25 13.01C8.25 13.2089 8.32902 13.3997 8.46967 13.5403C8.61032 13.681 8.80109 13.76 9 13.76H12.19L9.93 16C9.78955 16.1406 9.71066 16.3312 9.71066 16.53C9.71066 16.7288 9.78955 16.9194 9.93 17.06C10.0723 17.2011 10.2646 17.2802 10.465 17.2802C10.6654 17.2802 10.8577 17.2011 11 17.06L13.25 14.8V18C13.25 18.1989 13.329 18.3897 13.4697 18.5303C13.6103 18.671 13.8011 18.75 14 18.75C14.1989 18.75 14.3897 18.671 14.5303 18.5303C14.671 18.3897 14.75 18.1989 14.75 18V14.81L17 17.07C17.1423 17.2111 17.3346 17.2902 17.535 17.2902C17.7354 17.2902 17.9277 17.2111 18.07 17.07C18.2105 16.9294 18.2893 16.7388 18.2893 16.54C18.2893 16.3412 18.2105 16.1506 18.07 16.01L15.81 13.75H19C19.1989 13.75 19.3897 13.671 19.5303 13.5303C19.671 13.3897 19.75 13.1989 19.75 13C19.75 12.8011 19.671 12.6103 19.5303 12.4697C19.3897 12.329 19.1989 12.25 19 12.25Z" fill="black"/>
                                                    </svg>
                                                </span>
                                            <?php } ?>
                                            <div class="pricing-header">
                                                <span class="title"><?php echo esc_html($tab_list['pricing_title']); ?></span>
                                                <h3 class="price"><?php echo $tab_list['pricing_price']; ?></h3>
                                                <?php if (!empty($tab_list['pricing_content'])) { ?>
                                                    <p class="content">
                                                        <span class="required">*</span> <?php echo esc_html($tab_list['pricing_content']); ?>
                                                    </p>
                                                    <?php
                                                }

                                                $featureLists = explode("\n", $tab_list['pricing_feature_lists']);
                                                if ($featureLists) {
                                                    ?>
                                                    <ul class="feature-lists">
                                                        <?php foreach ($featureLists as $featureList) { ?>
                                                            <li>
                                                        <span class="icon">
                                                            <i class="<?php echo esc_attr($tab_list['pricing_check_icon']); ?>"></i>
                                                        </span>
                                                            <?php echo esc_html($featureList); ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>

                                            </div>
                                            <?php if(!empty($tab_list['pricing_button_text'] )): ?>
                <div class="pricing-footer">
                    <a <?php if($tab_list['pricing_button_url']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                    href="<?php echo esc_url($tab_list['pricing_button_url']['url']); ?>" class="theme-btn">
                        <?php echo esc_html($tab_list['pricing_button_text']);
                            ?> 
                        <?php
                        if ($tab_list['button_icon_type'] === 'icon') {
                            // Render the icon class
                            echo '<i class="' . esc_attr($tab_list['button_icon']) . '"></i>';
                        } elseif ($tab_list['button_icon_type'] === 'svg_upload') {
                            // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                            echo '<img src="' . esc_url(wp_get_attachment_image_url($tab_list['button_icon_svg_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($tab_list['button_icon_svg_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                        }
                        ?>
                    </a>
                </div>
                <?php endif;?>

                                        </div>
                                        <?php
                                    }

                                    if (!empty($tab_list['pricing2_title']) || !empty($tab_list['pricing2_price']) || !empty($tab_list['pricing2_content']) || !empty($tab_list['pricing2_feature_lists']) || !empty($tab_list['pricing2_button_text'])) { ?>
                                        <div class="pricing-box" data-aos="<?php echo esc_attr($tab_list['animation2']); ?>" data-aos-delay="<?php echo esc_attr($tab_list['animation_delay2']); ?>">
                                            <?php if ($tab_list['pricing2_is_popular'] == 'yes') { ?>
                                                <span class="pricing-featured-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="40" viewBox="0 0 28 40" fill="none">
                                                    <path d="M0 0H28V37.463C28 38.3706 26.8882 38.8088 26.2689 38.1453L15.4621 26.5665C14.6714 25.7194 13.3286 25.7194 12.5379 26.5665L1.73105 38.1453C1.11177 38.8088 0 38.3706 0 37.463V0Z" fill="white"/>
                                                    <path d="M19 12.25H15.81L18.07 10C18.2105 9.85937 18.2893 9.66875 18.2893 9.47C18.2893 9.27125 18.2105 9.08063 18.07 8.94C17.9264 8.8013 17.7346 8.72378 17.535 8.72378C17.3354 8.72378 17.1436 8.8013 17 8.94L14.75 11.2V8C14.75 7.80109 14.671 7.61032 14.5303 7.46967C14.3897 7.32902 14.1989 7.25 14 7.25C13.8011 7.25 13.6103 7.32902 13.4697 7.46967C13.329 7.61032 13.25 7.80109 13.25 8V11.19L11 8.93C10.8564 8.7913 10.6646 8.71378 10.465 8.71378C10.2654 8.71378 10.0736 8.7913 9.93 8.93C9.85895 8.99981 9.80251 9.08307 9.76399 9.17493C9.72546 9.26678 9.70562 9.36539 9.70562 9.465C9.70562 9.56461 9.72546 9.66322 9.76399 9.75507C9.80251 9.84693 9.85895 9.93019 9.93 10L12.19 12.26H9C8.80109 12.26 8.61032 12.339 8.46967 12.4797C8.32902 12.6203 8.25 12.8111 8.25 13.01C8.25 13.2089 8.32902 13.3997 8.46967 13.5403C8.61032 13.681 8.80109 13.76 9 13.76H12.19L9.93 16C9.78955 16.1406 9.71066 16.3312 9.71066 16.53C9.71066 16.7288 9.78955 16.9194 9.93 17.06C10.0723 17.2011 10.2646 17.2802 10.465 17.2802C10.6654 17.2802 10.8577 17.2011 11 17.06L13.25 14.8V18C13.25 18.1989 13.329 18.3897 13.4697 18.5303C13.6103 18.671 13.8011 18.75 14 18.75C14.1989 18.75 14.3897 18.671 14.5303 18.5303C14.671 18.3897 14.75 18.1989 14.75 18V14.81L17 17.07C17.1423 17.2111 17.3346 17.2902 17.535 17.2902C17.7354 17.2902 17.9277 17.2111 18.07 17.07C18.2105 16.9294 18.2893 16.7388 18.2893 16.54C18.2893 16.3412 18.2105 16.1506 18.07 16.01L15.81 13.75H19C19.1989 13.75 19.3897 13.671 19.5303 13.5303C19.671 13.3897 19.75 13.1989 19.75 13C19.75 12.8011 19.671 12.6103 19.5303 12.4697C19.3897 12.329 19.1989 12.25 19 12.25Z" fill="black"/>
                                                    </svg>
                                                </span>
                                            <?php } ?>
                                            <div class="pricing-header">
                                                <span class="title"><?php echo esc_html($tab_list['pricing2_title']); ?></span>
                                                <h3 class="price"><?php echo $tab_list['pricing2_price']; ?></h3>
                                                <?php if (!empty($tab_list['pricing2_content'])) { ?>
                                                    <p class="content">
                                                        <span class="required">*</span> <?php echo esc_html($tab_list['pricing2_content']); ?>
                                                    </p>
                                                    <?php
                                                }

                                                $featureLists = explode("\n", $tab_list['pricing2_feature_lists']);
                                                if ($featureLists) {
                                                    ?>
                                                    <ul class="feature-lists">
                                                        <?php foreach ($featureLists as $featureList) { ?>
                                                            <li>
                                                       <span class="icon">
                                                        <i class="<?php echo esc_attr($tab_list['pricing2_check_icon']); ?>"></i>
                                                        </span>
                                                                <?php echo esc_html($featureList); ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>

                                            </div>
                                            <?php if(!empty($tab_list['pricing2_button_text'] )): ?>
                <div class="pricing-footer">
                    <a <?php if($tab_list['pricing2_button_url']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                    href="<?php echo esc_url($tab_list['pricing2_button_url']['url']); ?>" class="theme-btn">
                        <?php echo esc_html($tab_list['pricing2_button_text']);
                            ?> 
                        <?php
                        if ($tab_list['button2_icon_type'] === 'icon2') {
                            // Render the icon class
                            echo '<i class="' . esc_attr($tab_list['button2_icon']) . '"></i>';
                        } elseif ($tab_list['button2_icon_type'] === 'svg_upload2') {
                            // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                            echo '<img src="' . esc_url(wp_get_attachment_image_url($tab_list['button2_icon_svg_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($tab_list['button2_icon_svg_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                        }
                        ?>
                    </a>
                </div>
                <?php endif;?>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }

    public function content_template()
    {

    }

}