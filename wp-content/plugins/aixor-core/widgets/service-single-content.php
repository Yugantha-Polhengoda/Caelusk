<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;

class aixorServiceSingleContent extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-service-content';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Service Content', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-text';
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
        return ['aixor', 'service', 'content'];
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
               'label' => esc_html__( 'Tab 1', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'section_subtitle_icon1',
            [
                'label'     => esc_html__( 'Icon', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        $this->add_control(
            'section_subtitle1',
            [
                'label'       => esc_html__('Section Sub Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Tab 2', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'section_title1', [
                'label'         => esc_html__( 'Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Tab 3', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'section_list1', [
                'label'         => esc_html__( 'List', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'rows'        => 10
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'image_section',
            [
                'label' => esc_html__('Image Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'project_image',
            [
                'label'     => esc_html__( 'Image', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        $this->end_controls_section();

        $this->start_controls_section(
            'hamburger_section',
            [
                'label' => esc_html__('Footer Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_11',
            [
               'label' => esc_html__( 'Tab 1', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'section_subtitle_icon2',
            [
                'label'     => esc_html__( 'Icon', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        $this->add_control(
            'section_subtitle2',
            [
                'label'       => esc_html__('Section Sub Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_12',
            [
               'label' => esc_html__( 'Tab 2', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'section_title2', [
                'label'         => esc_html__( 'Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_13',
            [
               'label' => esc_html__( 'Tab 3', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'section_list2', [
                'label'         => esc_html__( 'Content', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'rows'        => 20
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        
        /*-----------------------------------------Header section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'header_hamburger_style',
            [
                'label' => esc_html__('Content Style', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'header_hamburger_tabs'
        );

        $this->start_controls_tab(
            'header_hamburger_subtitle_tab',
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
            'header_hamburger_title_tab',
            [
               'label' => esc_html__( 'Title', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'title_color',
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
            'header_hamburger_menu_tab',
            [
               'label' => esc_html__( 'List', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'list_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-single-content-wrap .section-header ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'list_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .project-single-content-wrap .section-header ul li',
            ]
        );
        $this->add_responsive_control(
            'list_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .project-single-content-wrap .section-header ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'list_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .project-single-content-wrap .section-header ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_hamburger_icon_tab',
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
                    '{{WRAPPER}} .project-single-content-wrap .section-header p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .project-single-content-wrap .section-header p',
            ]
        );
        
        $this->add_responsive_control(
            'content_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .project-single-content-wrap .section-header p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-single-content-wrap .section-header p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <!-- ===== Header Sidebar Start ===== -->
       
            <div class="project-single-content-wrap">
                <div class="section-header">
                    <span class="section-subtitle">
                        <?php if (!empty($settings['section_subtitle_icon1']['url'])) { ?>
                        <img src="<?php echo esc_url($settings['section_subtitle_icon1']['url']); ?>"
                             alt="<?php echo esc_attr__('shape', 'aixor-core') ?>">
                        <?php } ?>
                        <?php echo esc_html($settings['section_subtitle1']); ?>
                    </span>
                    <div class="right">
                        <?php echo ($settings['section_title1']); ?>
                        <?php echo ($settings['section_list1']); ?>
                    </div>
                </div>
                <?php if (!empty($settings['project_image']['url'])): ?>
                <div class="full-image">
                    <img class="scaleDown" src="<?php echo esc_url(wp_get_attachment_image_url( $settings['project_image']['id'], 'full' ));?>" alt="<?php echo get_post_meta($settings['project_image']['id'], '_wp_attachment_image_alt', true); ?>">
                </div>
                <?php endif;?>

                <div class="section-header">
                    <span class="section-subtitle">
                        <?php if (!empty($settings['section_subtitle_icon2']['url'])) { ?>
                        <img src="<?php echo esc_url($settings['section_subtitle_icon2']['url']); ?>"
                             alt="<?php echo esc_attr__('shape', 'aixor-core') ?>">
                        <?php } ?>
                        <?php echo esc_html($settings['section_subtitle2']); ?>
                    </span>
                    <div class="right">
                        <?php echo ($settings['section_title2']); ?>
                        <div class="paragraphs">
                            <?php echo ($settings['section_list2']); ?>
                        </div>
                    </div>
                </div>
            </div>

        <!-- ===== Menu End ===== -->
        <?php
    }

    public function content_template()
    {

    }

}