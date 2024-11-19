<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;

class aixorTeam extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-team';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Team', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-testimonial';
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
        return ['aixor', 'team', 'profile'];
    }

    /**
     * Register Aixor widget controls.
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'team_section_header',
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
                'default'     => esc_html__('OUR MEMBERS', 'aixor-core'),
            ]
        );
        $this->add_control(
            'section_subtitle_icon',
            [
                'label' => esc_html__('Choose Subtitle Icon', 'aixor-core'),
                'type'  => Controls_Manager::MEDIA,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_section',
            [
                'label' => esc_html__('Team', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        // repeater start
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_image', [
                'label'   => esc_html__('Choose Image', 'aixor-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_name', [
                'label'       => esc_html__('Name', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('John Doe', 'aixor-core'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_designation', [
                'label'       => esc_html__('Designation', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('CEO', 'aixor-core'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_content', [
                'label'       => esc_html__('Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Lorem ipsum dolor sit amet, tpat dictum purus, at malesuada tellus convallis et. Aliquam erat volutpat. Vestibulum felis ex, ultrices posuere facilisis eget, malesuada quis elit. Nulla ac eleifend odio', 'aixor-core'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true
                ]
            ]
        );

        $repeater->add_control(
            'animation', [
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
            'animation_delay', [
                'label'       => esc_html__('Animation Delay', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'team_list',
            [
                'label'       => esc_html__('Team Members', 'aixor-core'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'team_name'        => 'Daniel Jack',
                        'team_designation' => 'Creative Director',
                        'team_content'     => 'Daniel Jack oversees all creative projects, <br> bringing his keen eye for design and <br>exceptional storytelling abilities to the table.',
                    ],
                    [
                        'team_name'        => 'Bob Pasley',
                        'team_designation' => 'Lead Designer',
                        'team_content'     => 'Bob Pabsley is the creative force behind our<br> stunning visual designs with a strong<br> background in UI/UX and graphic design.',
                    ],
                    [
                        'team_name'        => 'Adrew Onana',
                        'team_designation' => 'Senior Developer',
                        'team_content'     => 'Andrew Onana is our tech guru, responsible<br> for turning our creative visions into<br> functional digital solutions.',
                    ],
                    [
                        'team_name'        => 'Luka Modric',
                        'team_designation' => 'Project Manager',
                        'team_content'     => 'James ensures that all our projects are<br> delivered on time and within budget, every<br> project runs smoothly from start to finish.',
                    ],
                    [
                        'team_name'        => 'Toni Kross',
                        'team_designation' => 'Lead Visual',
                        'team_content'     => 'Toni Kroos brings a fresh perspective to our<br> design team. He help our clients stand out in<br> a crowded market.',
                    ],
                ],
                'title_field' => '{{{ team_name }}}',
            ]
        );
        // repeater end

        $this->end_controls_section();

        $this->teamCVSection();

        $this->teamBoxStyle();
        $this->teamImageStyle();
        $this->teamNameStyle();
        $this->teamDesignationStyle();
        $this->teamContentStyle();
        $this->teamShapeStyle();
        $this->teamCvBoxStyle();
        $this->teamCvTitleStyle();
        $this->teamCvContentStyle();
        $this->teamCvButtonStyle();
    }

    private function teamCVSection()
    {
        $this->start_controls_section(
            'team_cv_section',
            [
                'label' => esc_html__('Apply CV', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'team_cv_show',
            [
                'label'        => esc_html__('Show CV Box', 'aixor-core'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'aixor-core'),
                'label_off'    => esc_html__('Hide', 'aixor-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'team_cv_logo',
            [
                'label'     => esc_html__('Logo', 'aixor-core'),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'team_cv_show' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'team_cv_cover_bg',
            [
                'label'     => esc_html__('Cover Background', 'aixor-core'),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'team_cv_show' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'team_cv_title',
            [
                'label'       => esc_html__('Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => 'Become Our <br>Member?',
                'condition'   => [
                    'team_cv_show' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'team_cv_content',
            [
                'label'       => esc_html__('Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => 'Join the AIXOR community and<br> unlock a world of creative<br> possibilities.',
                'condition'   => [
                    'team_cv_show' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'team_cv_button_text',
            [
                'label'       => esc_html__('Button Text', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__("Apply CV", "aixor-core"),
                'condition'   => [
                    'team_cv_show' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'team_cv_button_url',
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
                'condition'   => [
                    'team_cv_show' => 'yes'
                ]
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

        $this->add_control(
            'cvanimation', [
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

        $this->add_control(
            'cvanimation_delay', [
                'label'       => esc_html__('Animation Delay', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
    }

    /* Style Controls */
    private function teamBoxStyle()
    {
        $this->start_controls_section(
            'team_box_style',
            [
                'label' => __('Team Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'team_box_bg',
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .team-member-box',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'team_box_border',
                'selector' => '{{WRAPPER}} .team-member-box',
            ]
        );
        $this->add_control(
            'team_box_radius',
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
                    '{{WRAPPER}} .team-member-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'team_box_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 10,
                    'right'    => 10,
                    'bottom'   => 10,
                    'left'     => 10,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function teamImageStyle()
    {
        $this->start_controls_section(
            'team_img_style',
            [
                'label' => __('Team - Image', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'team_image_width',
            [
                'label'      => esc_html__('Width', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .img-box' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'team_image_height',
            [
                'label'      => esc_html__('Height', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 390,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .img-box' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'team_image_radius',
            [
                'label'      => esc_html__('Border Radius', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .img-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'team_image_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 10,
                    'right'    => 10,
                    'bottom'   => 10,
                    'left'     => 10,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .img-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'team_image_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .img-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function teamNameStyle()
    {
        $this->start_controls_section(
            'team_name_style',
            [
                'label' => __('Team - Name', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'team_name_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-box .content .name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'team_name_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .team-member-box .content .name',
            ]
        );
        $this->add_control(
            'team_name_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .content .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function teamDesignationStyle()
    {
        $this->start_controls_section(
            'team_designation_style',
            [
                'label' => __('Team - Designation', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'team_designation_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-box .content .designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'team_designation_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .team-member-box .content .designation',
            ]
        );
        $this->add_control(
            'team_designation_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .content .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function teamContentStyle()
    {
        $this->start_controls_section(
            'team_content_style',
            [
                'label' => __('Team - Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'team_content_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-box .content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'team_content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .team-member-box .content p',
            ]
        );
        $this->add_control(
            'team_content_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'team_content_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function teamShapeStyle()
    {
        $this->start_controls_section(
            'team_line_shape_style',
            [
                'label' => __('Line Shape', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'team_line_shape_bg',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-box .shape span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_line_shape_width',
            [
                'label'      => esc_html__('Width', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 500,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .shape span' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'team_line_shape_height',
            [
                'label'      => esc_html__('Height', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 20,
                        'step' => 1,
                    ]
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-member-box .shape span' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function teamCvBoxStyle()
    {
        $this->start_controls_section(
            'team_cv_box_style',
            [
                'label' => __('CV Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'team_cv_box_background',
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .team-cv-box',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'team_cv_box_border',
                'selector' => '{{WRAPPER}} .team-cv-box',
            ]
        );
        $this->add_control(
            'team_cv_box_radius',
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
                    '{{WRAPPER}} .team-cv-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'team_cv_box_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 10,
                    'right'    => 10,
                    'bottom'   => 10,
                    'left'     => 10,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-cv-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function teamCvTitleStyle()
    {
        $this->start_controls_section(
            'team_cv_title_style',
            [
                'label' => __('CV - Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'team_cv_title_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-cv-box .team-cv-header .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'team_cv_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .team-cv-box .team-cv-header .title',
            ]
        );
        $this->add_control(
            'team_cv_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .team-cv-box .team-cv-header .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    private function teamCvContentStyle()
    {
        $this->start_controls_section(
            'team_cv_content_style',
            [
                'label' => __('CV - Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'team_cv_content_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-cv-box .team-cv-header p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'team_cv_content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .team-cv-box .team-cv-header p',
            ]
        );
        $this->add_control(
            'team_cv_content_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .team-cv-box .team-cv-header p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function teamCvButtonStyle()
    {
        $this->start_controls_section(
            'team_cv_button_style',
            [
                'label' => esc_html__('Cv - Button', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'aixor-core' ),
            ]
        );
        $this->add_control(
            'team_cv_button_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_cv_button_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'team_cv_button_border',
                'selector' => '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'aixor-core' ),
            ]
        );
        $this->add_control(
            'team_cv_button_hv_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn:hover svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_cv_button_hv_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'team_cv_button_hv_border',
                'selector' => '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn:hover',
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
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'team_cv_button_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn',
            ]
        );
        $this->add_control(
            'team_cv_button_padding',
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
                    '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'team_cv_button_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .team-cv-box .team-cv-footer .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        <div class="team-sec">
            <?php if (!empty($settings['section_subtitle'])) { ?>
                <div class="section-header">
                    <span class="section-subtitle">
                        <?php if (!empty($settings['section_subtitle_icon']['url'])) { ?>
                            <img src="<?php echo esc_url($settings['section_subtitle_icon']['url']); ?>"
                                 alt="<?php echo esc_attr__('Shape', 'aixor-core') ?>">
                        <?php } ?>

                        <?php echo esc_html($settings['section_subtitle']); ?>
                    </span>
                </div>
            <?php } ?>

            <div class="team-members">
                <?php if ($settings['team_list']) {
                    foreach ($settings['team_list'] as $team) { ?>
                        <div class="team-member-box" data-aos="<?php echo esc_attr($team['animation']); ?>" data-aos-delay="<?php echo esc_attr($team['animation_delay']); ?>">
                            <?php if (!empty($team['team_image']['url'])) { ?>
                                <div class="img-box">
                                    <img src="<?php echo esc_url($team['team_image']['url']); ?>"
                                         alt="<?php echo esc_attr($team['team_name']); ?>">
                                </div>
                            <?php } ?>
                            <div class="content">
                                <span class="name"><?php echo esc_html($team['team_name']); ?></span>
                                <span class="designation"><?php echo esc_html($team['team_designation']); ?></span>
                                <div class="shape">
                                    <span></span>
                                </div>
                                <?php if (!empty($team['team_content'])) { ?>
                                    <p><?php echo $team['team_content']; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    <?php }
                    ?>
                <?php }

                if ($settings['team_cv_show'] == 'yes') {
                    ?>

                    <div class="team-cv-box" data-aos="<?php echo esc_attr($settings['cvanimation']); ?>" data-aos-delay="<?php echo esc_attr($settings['cvanimation_delay']); ?>">

                        <?php if (!empty($settings['team_cv_cover_bg']['url'])) { ?>
                            <img src="<?php echo esc_url($settings['team_cv_cover_bg']['url']); ?>"
                                 alt="<?php echo esc_attr__('Shape', 'aixor-core'); ?>"
                                 class="overlay">
                        <?php } ?>
                        <div class="team-cv-header">
                            <?php if (!empty($settings['team_cv_logo']['url'])) { ?>
                                <img src="<?php echo esc_url($settings['team_cv_logo']['url']); ?>"
                                     alt="<?php echo esc_attr__('Logo', 'aixor-core'); ?>">
                            <?php }
                            if (!empty($settings['team_cv_title'])) {
                                ?>
                                <h3 class="title"><?php echo $settings['team_cv_title']; ?></h3>
                            <?php }
                            if (!empty($settings['team_cv_content'])) {
                                ?>
                                <p><?php echo $settings['team_cv_content']; ?></p>
                            <?php } ?>
                        </div>
                        <?php
                        if (!empty($settings['team_cv_button_text'])) {
                            if (!empty($settings['team_cv_button_url']['url'])) {
                                $this->add_link_attributes('team_cv_button_url', $settings['team_cv_button_url']);
                            }
                            ?>
                            <div class="team-cv-footer">
                                <a <?php $this->print_render_attribute_string('team_cv_button_url'); ?>
                                        class="theme-btn">
                                    <?php
                                    echo esc_html($settings['team_cv_button_text']);
                                    ?>
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