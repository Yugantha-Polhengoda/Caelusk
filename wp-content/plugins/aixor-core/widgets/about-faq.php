<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Background;

class aixorAboutFAQ extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-about-faq';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('FAQ', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-help-o';
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
        return ['aixor', 'about', 'faq'];
    }

    /**
     * Register Aixor widget controls.
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Section Header', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label'       => esc_html__('Section Sub-Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('faq', 'aixor-core'),
            ]
        );
        $this->add_control(
            'section_subtitle_icon',
            [
                'label' => esc_html__('Choose Section Subtitle Icon', 'aixor-core'),
                'type'  => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'section_title',
            [
                'label'       => esc_html__('Section Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => 'Frequent Queries, <span>Quick Fixes</span>',
            ]
        );
        $this->add_control(
            'section_content',
            [
                'label'       => esc_html__('Section Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => 'Whether you have specific questions or need general information, our FAQ section
                    is here to help. From details about our services to guidance on choosing the right plan'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'faq_section',
            [
                'label' => esc_html__('FAQ Section', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_12',
            [
               'label' => esc_html__( 'Tab 1', 'aixor-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'number', [
                'label'         => esc_html__( 'Number', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'question', [
                'label'         => esc_html__( 'Question', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'answer', [
                'label'         => esc_html__( 'Answer', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'id', [
                'label'         => esc_html__( 'ID', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'controls', [
                'label'         => esc_html__( 'Controls', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'FAQ List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ number }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_13',
            [
               'label' => esc_html__( 'Tab 2', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'shape_img1',
            [
                'label'     => esc_html__( 'Shape Image 1', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'shape_img2',
            [
                'label'     => esc_html__( 'Shape Image 2', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'footer_section',
            [
                'label' => esc_html__('Section Footer', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->start_controls_tabs(
        'style_tabs_3'
        );

        $this->start_controls_tab(
            'style_normal_tab_33',
            [
               'label' => esc_html__( 'Tab 1', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'contenttext', [
                'label'         => esc_html__( 'Text', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contentlink_text', [
                'label'         => esc_html__( 'Link Text', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'content_link',
            [
                'label'         => esc_html__( 'Link', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
            ]
        );

        $this->add_control(
            'faqbottom_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Bottom Info', 'aixor-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'aixor-core' ),
                'label_off'     => __( 'Hide', 'aixor-core' ),
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_34',
            [
               'label' => esc_html__( 'Tab 2', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'button_text', [
                'label'         => esc_html__( 'Button Text', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'button_link',
            [
                'label'         => esc_html__( 'Button Link', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
            ]
        );

         $this->add_control(
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

        $this->add_control(
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

        $this->add_control(
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

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        
        /*-----------------------------------------Header section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'header_section_style',
            [
                'label' => esc_html__('Section Header Style', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'header_section_tabs'
        );

        $this->start_controls_tab(
            'header_section_subtitle_tab',
            [
               'label' => esc_html__( 'Sub Title', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header .section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .section-header .section-subtitle',
            ]
        );
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .section-header .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'subtitle_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .section-header .section-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_section_title_tab',
            [
               'label' => esc_html__( 'Title', 'aixor-core' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'title_color',
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .section-title.section-title',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .section-header .section-title',
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .section-header .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .section-header .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_section_content_tab',
            [
               'label' => esc_html__( 'Content', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header .section-desc' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .section-header .section-desc',
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .section-header .section-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .section-header .section-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'header_hamburger_style',
            [
                'label' => esc_html__('FAQ Content Style', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'header_hamburger_tabs'
        );

        $this->start_controls_tab(
            'header_faq_number_tab',
            [
               'label' => esc_html__( 'Number', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-item .accordion-header .number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'numberactive_color',
            [
                'label'     => esc_html__('Active Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-item .accordion-header button[aria-expanded="true"]' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_faq_question_tab',
            [
               'label' => esc_html__( 'Question', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'question_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-item .accordion-header button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'questionactive_color',
            [
                'label'     => esc_html__('Active Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-item .accordion-header button[aria-expanded="true"]' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'question_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .faq-item .accordion-header button',
            ]
        );
        $this->add_responsive_control(
            'question_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-item .accordion-header button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'question_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-item .accordion-header button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_faq_answer_tab',
            [
               'label' => esc_html__( 'Answer', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'answer_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-item .accordion-body p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'answer_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .faq-item .accordion-body p',
            ]
        );
        $this->add_responsive_control(
            'answer_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-item .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'answer_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-item .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_hamburger_icon_tab',
            [
               'label' => esc_html__( 'Icon', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-item .accordion-header button .plus-icon span' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hovericon_color',
            [
                'label'     => esc_html__('Active Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-item .accordion-header button[aria-expanded="true"] .plus-icon span' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'icon_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-item .accordion-header button .plus-icon span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-item .accordion-header button .plus-icon span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'footer_section_style',
            [
                'label' => esc_html__('Footer Content Style', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'footer_section_tabs'
        );

        $this->start_controls_tab(
            'footer_section_text_tab',
            [
               'label' => esc_html__( 'Text', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-sec .faq-bottom p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'text_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .faq-sec .faq-bottom p',
            ]
        );
        $this->add_responsive_control(
            'text_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-sec .faq-bottom p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'text_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-sec .faq-bottom p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'footer_section_linktext_tab',
            [
               'label' => esc_html__( 'Link Text', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'linktext_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-sec .faq-bottom p a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'linktext_bordercolor',
            [
                'label'         => esc_html__( 'Border Color', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .faq-sec .faq-bottom p a'=> 'border-bottom: 1px solid {{VALUE}} !important;',
                ],

            ]
        );
      
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'linktext_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .faq-sec .faq-bottom p a',
            ]
        );
        $this->add_responsive_control(
            'linktext_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-sec .faq-bottom p a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'linktext_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-sec .faq-bottom p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'footer_section_button_tab',
            [
               'label' => esc_html__( 'Button', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-sec .faq-bottom .theme-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bgcolor',
            [
                'label'     => esc_html__('Background Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-sec .faq-bottom .theme-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .theme-btn',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

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
       <!-- ===== Faq Start ===== -->
        <div class="faq-sec">
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
                    if (!empty($settings['section_title'])) { ?>
                        <h2 class="section-title section-title2">
                            <?php echo $settings['section_title']; ?>
                        </h2>
                    <?php }
                    if (!empty($settings['section_content'])) { ?>
                        <p class="section-desc"><?php echo $settings['section_content']; ?></p>
                    <?php } ?>
            </div>

            <!-- Faq lists -->
            <div class="accordion faq-lists" id="accordionExample">
            <?php if (!empty($settings['shape_img1']['url'])) { ?>
                <div class="shape_img shape_img1">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($settings['shape_img1']['id'], 'full')); ?>" alt="<?php echo get_post_meta($settings['shape_img1']['id'], '_wp_attachment_image_alt', true); ?>">
                </div>
            <?php } ?>
            <?php if (!empty($settings['shape_img2']['url'])) { ?>
                <div class="shape_img shape_img2">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($settings['shape_img2']['id'], 'full')); ?>" alt="<?php echo get_post_meta($settings['shape_img2']['id'], '_wp_attachment_image_alt', true); ?>">
                </div>
            <?php } ?>

            <?php if (!empty($settings['list1'])):
                $first_item = true; // Flag to track the first item
                foreach ($settings['list1'] as $settings_loop): ?>
                    <div class="accordion-item faq-item">
                        <h2 class="accordion-header" id="<?php echo esc_attr($settings_loop['id']); ?>">
                            <button class="accordion-button <?php echo $first_item ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse"
                                data-bs-target="#<?php echo esc_attr($settings_loop['controls']); ?>" aria-expanded="<?php echo $first_item ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($settings_loop['controls']); ?>">
                                <span class="number"><?php echo esc_html($settings_loop['number']); ?></span> <?php echo esc_html($settings_loop['question']); ?> 
                                <span class="plus-icon"><span></span><span></span></span>
                            </button>
                        </h2>
                        <div id="<?php echo esc_attr($settings_loop['controls']); ?>" class="accordion-collapse collapse <?php echo $first_item ? 'show' : ''; ?>" aria-labelledby="<?php echo esc_attr($settings_loop['id']); ?>"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><?php echo esc_html($settings_loop['answer']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                    // After the first item is rendered, set the flag to false
                    $first_item = false;
                        endforeach;
                        endif; ?>
            </div>

            <!-- Faq Bottom -->
            <?php if ($settings['faqbottom_switcher_options'] === 'yes') : ?>
            <div class="faq-bottom">
                <p><?php echo esc_html($settings['contenttext']); ?>
                    <a <?php if($settings['content_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                    href="<?php echo esc_url($settings['content_link']['url']); ?>"><?php echo esc_html($settings['contentlink_text']); ?></a>
                </p>
                <?php if(!empty($settings['button_text'] )): ?>
                <a <?php if($settings['button_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($settings['button_link']['url']); ?>" class="theme-btn">
                    <?php echo esc_html($settings['button_text']); ?>
                    <?php
                        if ($settings['button_icon_type'] === 'icon') {
                            // Render the icon class
                            echo '<i class="' . esc_attr($settings['button_icon']) . '"></i>';
                        } elseif ($settings['button_icon_type'] === 'svg_upload') {
                            // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                            echo '<img src="' . esc_url(wp_get_attachment_image_url($settings['button_icon_svg_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($settings['button_icon_svg_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                        }
                    ?>
                </a>
                <?php endif;?>
            </div>
            <?php endif;?>

        </div>
        <!-- ===== Faq End ===== -->
        <?php
    }

    public function content_template()
    {

    }

}