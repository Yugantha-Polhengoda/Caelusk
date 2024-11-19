<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;

class aixorProcess extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-process';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Process', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-number-field';
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
        return ['aixor', 'process', 'profile'];
    }

    /**
     * Register Aixor widget controls.
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'process_section_header',
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
                'default'     => esc_html__('Our Process', 'aixor-core'),
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
                'default'     => 'Refined Process, <span>Efficient Flow</span>',
                'label_block' => true
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'process_section',
            [
                'label' => esc_html__('Process', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        // repeater start
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'process_image', [
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
            'process_number', [
                'label'       => esc_html__('Number', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'process_name', [
                'label'       => esc_html__('Name', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'process_designation', [
                'label'       => esc_html__('Designation', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'process_content', [
                'label'       => esc_html__('Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'animation_number', [
                'label'       => esc_html__('Animation Delay', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Process List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ process_name }}}', // Reapeter Title 
            ]
        );

        // repeater end

        $this->end_controls_section();
        $this->sectionSubTitleStyle();
        $this->sectionTitleStyle();
        $this->processNumberStyle();
        $this->processNameStyle();
        $this->processDesignationStyle();
        $this->processContentStyle();
        $this->processShapeStyle();
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
                    '{{WRAPPER}} .section-header .section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
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

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'section_title_color',
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .section-title.section-title2',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .section-title.section-title2',
            ]
        );
        $this->add_control(
            'section_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title.section-title2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

     private function processNumberStyle()
    {
        $this->start_controls_section(
            'process_number_style',
            [
                'label' => esc_html__('Process Number', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'process_number_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process-box .img-box .number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'process_number_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .process-box .img-box .number',
            ]
        );
        $this->add_control(
            'process_number_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .process-box .img-box .number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
  
    private function processNameStyle()
    {
        $this->start_controls_section(
            'process_name_style',
            [
                'label' => __('Process - Name', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'process_name_color',
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
                'name'     => 'process_name_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .team-member-box .content .name',
            ]
        );
        $this->add_control(
            'process_name_margin',
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

    private function processDesignationStyle()
    {
        $this->start_controls_section(
            'process_designation_style',
            [
                'label' => __('Process - Designation', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'process_designation_color',
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
                'name'     => 'process_designation_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .team-member-box .content .designation',
            ]
        );
        $this->add_control(
            'process_designation_margin',
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

    private function processContentStyle()
    {
        $this->start_controls_section(
            'process_content_style',
            [
                'label' => __('Process - Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'process_content_color',
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
                'name'     => 'process_content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .team-member-box .content p',
            ]
        );
        $this->add_control(
            'process_content_padding',
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
            'process_content_margin',
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

    private function processShapeStyle()
    {
        $this->start_controls_section(
            'process_line_shape_style',
            [
                'label' => __('Line Shape', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'process_line_shape_bg',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-box .shape span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'process_line_shape_width',
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
            'process_line_shape_height',
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

    /**
     * Render currency widget output on the frontend.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <!-- ===== Process Start ===== -->
        <div class="process-sec">
            <?php if (!empty($settings['section_subtitle'])) { ?>
            <div class="section-header section-header2">
                <span class="section-subtitle">
                    <?php if (!empty($settings['section_subtitle_icon']['url'])) { ?>
                        <img src="<?php echo esc_url($settings['section_subtitle_icon']['url']); ?>"
                             alt="<?php echo esc_attr__('Shape', 'aixor-core') ?>">
                    <?php } ?>

                    <?php echo esc_html($settings['section_subtitle']); ?>
                </span>
                <h2 class="section-title section-title2">
                    <?php echo $settings['section_title']; ?>
                </h2>
            </div>
            <?php } ?>

            <div class="process-lists">
                <?php if(!empty($settings['list1'])):
                    foreach ($settings['list1'] as $index => $settingsicon_loop):?>
                <div class="team-member-box process-box" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($settingsicon_loop['animation_number']); ?>">
                    <div class="img-box">
                        <span class="number"><?php echo esc_html($settingsicon_loop['process_number']); ?></span>
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $settingsicon_loop['process_image']['id'], 'full' ));?>" alt="<?php echo get_post_meta($settingsicon_loop['process_image']['id'], '_wp_attachment_image_alt', true); ?>">
                    </div>
                    <div class="content">
                        <span class="name"><?php echo esc_html($settingsicon_loop['process_name']); ?></span>
                        <span class="designation"><?php echo esc_html($settingsicon_loop['process_designation']); ?></span>
                        <div class="shape"><span></span></div>
                        <p><?php echo esc_html($settingsicon_loop['process_content']); ?></p>
                    </div>
                </div>
                <?php endforeach; endif;?>
            </div>

        </div>
        <!-- ===== Process End ===== -->

        <?php
    }

    public function content_template()
    {

    }

}