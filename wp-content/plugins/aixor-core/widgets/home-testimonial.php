<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;

class aixorTestimonial extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-testimonial';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Our Review', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
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
        return ['aixor', 'testimonial', 'review'];
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
                'default'     => esc_html__('OUR REVIEWS', 'aixor-core'),
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
                'label' => esc_html__('Testimonial', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        // repeater start
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_image', [
                'label'   => esc_html__('Image', 'aixor-core'),
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
            'testimonial_name', [
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
            'testimonial_designation', [
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
            'testimonial_content', [
                'label'       => esc_html__('Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__('“ AIXOR truly understands the power of storytelling and strategic marketing"', 'aixor-core'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true
                ]
            ]
        );

        $repeater->add_control(
            'testimonialrating_image', [
                'label'   => esc_html__('Rating Image', 'aixor-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'testimonial_list', //repeater name
            [
                'label'     => esc_html__( 'Testimonial', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Testimonial', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ testimonial_name }}}', // Reapeter Title 
            ]
        );
        // repeater end

        $this->end_controls_section();

        $this->sectionSubTitleStyle();
        $this->testimonialBoxStyle();
        $this->testimonialContentStyle();
        $this->testimonialImageStyle();
        $this->testimonialNameStyle();
        $this->testimonialDesignationStyle();
    }

    /* Style Controls */
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
                    '{{WRAPPER}} .testimonial-sec .section-header .section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .testimonial-sec .section-header .section-subtitle',
            ]
        );
        $this->add_control(
            'section_subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-sec .section-header .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function testimonialBoxStyle()
    {
        $this->start_controls_section(
            'testimonial_box_style',
            [
                'label' => esc_html__('Testimonial Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'testimonial_box_background',
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .testimonial-box',
            ]
        );
        $this->add_responsive_control(
            'testimonial_box_width',
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
                'default'    => [
                    'unit' => 'px',
                    'size' => 308,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-box' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testimonial_box_height',
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
                    'size' => 428,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-box' => 'Height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'testimonial_box_border',
                'selector' => '{{WRAPPER}} .testimonial-box',
            ]
        );
        $this->add_responsive_control(
            'testimonial_box_radius',
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
                    '{{WRAPPER}} .testimonial-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testimonial_box_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 24,
                    'right'    => 24,
                    'bottom'   => 24,
                    'left'     => 24,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function testimonialContentStyle()
    {
        $this->start_controls_section(
            'testimonial_content_style',
            [
                'label' => esc_html__('Testimonial Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'testimonial_content_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-box .testimonial-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .testimonial-box .testimonial-content p',
            ]
        );
        $this->add_responsive_control(
            'testimonial_content_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-box .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function testimonialImageStyle()
    {
        $this->start_controls_section(
            'testimonial_image_style',
            [
                'label' => esc_html__('Testimonial Image', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'testimonial_image_width',
            [
                'label'      => esc_html__('Width', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 200,
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
                    '{{WRAPPER}} .testimonial-box .testimonial-author img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testimonial_image_height',
            [
                'label'      => esc_html__('Height', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 200,
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
                    '{{WRAPPER}} .testimonial-box .testimonial-author img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_image_radius',
            [
                'label'      => esc_html__('Border Radius', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 50,
                    'right'    => 50,
                    'bottom'   => 50,
                    'left'     => 50,
                    'unit'     => '%',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-box .testimonial-author img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_image_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-box .testimonial-author img' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function testimonialNameStyle()
    {
        $this->start_controls_section(
            'testimonial_name_style',
            [
                'label' => esc_html__('Testimonial Name', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'testimonial_name_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-box .testimonial-author .name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_name_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .testimonial-box .testimonial-author .name',
            ]
        );
        $this->add_control(
            'testimonial_name_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-box .testimonial-author .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function testimonialDesignationStyle()
    {
        $this->start_controls_section(
            'testimonial_designation_style',
            [
                'label' => esc_html__('Testimonial Designation', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'testimonial_designation_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-box .testimonial-author .designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_designation_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .testimonial-box .testimonial-author .designation',
            ]
        );
        $this->add_control(
            'testimonial_designation_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-box .testimonial-author .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        <div class="testimonial-sec">
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
            <?php }

            if (!empty($settings['testimonial_list'])) { ?>
                <div class="testimonial-lists-wrap">
                    <div class="hover_mouse">
                        <span>
                            Showing
                            Down...
                        </span>
                    </div>
                    <div class="testimonial-lists">
                        <?php foreach ($settings['testimonial_list'] as $index => $testimonial) { ?>
                            <div class="testimonial-box">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $testimonial['testimonialrating_image']['id'], 'full' ));?>" alt="<?php echo get_post_meta($testimonial['testimonialrating_image']['id'], '_wp_attachment_image_alt', true); ?>">

                                <div class="testimonial-content">
                                    <p><?php echo esc_html($testimonial['testimonial_content']); ?></p>
                                </div>

                                <div class="testimonial-author">
                                    <?php if (!empty($testimonial['testimonial_image']['url'])) { ?>
                                        <img src="<?php echo esc_url($testimonial['testimonial_image']['url']); ?>"
                                             alt="<?php echo esc_attr($testimonial['testimonial_name']); ?>">
                                    <?php } ?>
                                    <div class="content">
                                        <span class="name"><?php echo esc_html($testimonial['testimonial_name']); ?></span>
                                        <span class="designation"><?php echo esc_html($testimonial['testimonial_designation']); ?></span>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php
    }

    public function content_template()
    {

    }

}