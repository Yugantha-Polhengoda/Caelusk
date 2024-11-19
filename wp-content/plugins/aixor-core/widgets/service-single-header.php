<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;

class aixorServiceSingleHeader extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-service-header';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Service Hero', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-header';
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
        return ['aixor', 'service', 'header'];
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
                'label' => esc_html__('Header Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Header Info', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label'       => esc_html__('Section Sub Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('BRAND IDENTITY', 'aixor-core'),
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
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true
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
                'label' => esc_html__('Header Content Style', 'aixor-core'),
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
            'section_subtitle_color',
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
                'name'     => 'section_subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .section-header .section-subtitle',
            ]
        );
        $this->add_control(
            'section_subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .section-header .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_control(
            'section_title_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header .section-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'section_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .section-header .section-title',
            ]
        );
        $this->add_control(
            'section_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .section-header .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <!-- ===== Header Start ===== -->
        <?php if (!empty($settings['section_subtitle'])) { ?>
        <div class="project-single-header">
            <div class="section-header">
                <span class="section-subtitle">
                    <?php if (!empty($settings['section_subtitle_icon']['url'])) { ?>
                        <img src="<?php echo esc_url($settings['section_subtitle_icon']['url']); ?>"
                             alt="<?php echo esc_attr__('Shape', 'aixor-core') ?>">
                    <?php } ?>
                    <?php echo esc_html($settings['section_subtitle']); ?>
                </span>
                <h3 class="section-title reveal-type">
                    <?php echo esc_html($settings['section_title']); ?>
                </h3>
            </div>
        </div>
        <?php } ?>
        <!-- ===== Header End ===== -->
        <?php
    }

    public function content_template()
    {

    }

}