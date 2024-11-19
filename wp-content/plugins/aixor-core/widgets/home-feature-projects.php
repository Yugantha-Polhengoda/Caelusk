<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;

class aixorFeatureProjects extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-feature-projects';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Feature Projects', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-gallery-grid';
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
        return ['aixor', 'team', 'feature', 'projects', 'profile'];
    }

    /**
     * Register Aixor widget controls.
     *
     * @access protected
     */
    protected function register_controls()
    {
        /* Feature Header Start */
        $this->start_controls_section(
            'feature_header_section',
            [
                'label' => esc_html__('General', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_subtitle',
            [
                'label'       => esc_html__('Section Sub-Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Our projects', 'aixor-core'),
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
                'default'     => 'Featured WOW <span>Projects!</span>',
                'row'         => 2
            ]
        );
        $this->add_control(
            'section_content',
            [
                'label'       => esc_html__('Section Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => 'Explore our collection of cutting-edge products designed to empower your business and elevate your creative potential. <br>
                Each product is meticulously crafted to provide exceptional performance, usability, and results.'
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => esc_html__('Button Text', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__("View More", "aixor-core"),
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
            'button_url',
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
        $this->end_controls_section();
        /* Feature Header End */

        $this->start_controls_section(
            'feature_projects_section',
            [
                'label' => esc_html__('Feature Projects', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
       
        $this->add_control(
            'post_number',
            [
                'label'         => __( 'Number of Posts', 'aixor-core' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 3,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'     => __( 'Order By', 'aixor-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'ID',
                'options'   => [
                    'none' 		=> __( 'None', 'aixor-core' ),
                    'ID' 		=> __( 'ID', 'aixor-core' ),
                    'title' 	=> __( 'Title', 'aixor-core' ),
                    'date' 		=> __( 'Date', 'aixor-core' ),
                    'rand' 		=> __( 'Random', 'aixor-core' ),
                ],
            ]
        );
        $this->add_control(
            'order',
            [
                'label'     => __( 'Order', 'aixor-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'DESC',
                'options'   => [
                    'DESC' 		=> __( 'Descending', 'aixor-core' ),
                    'ASC' 		=> __( 'Ascending', 'aixor-core' ),
                ],
            ]
        );

        $this->end_controls_section();


        $this->sectionSubTitleStyle();
        $this->sectionTitleStyle();
        $this->sectionContentStyle();
        $this->projectBoxStyle();
        $this->projectImgBoxStyle();
        $this->projectInfoTitleStyle();
        $this->projectInfoSubTitleStyle();
        $this->sectionButtonStyle();
    }

    private function sectionSubTitleStyle()
    {
        $this->start_controls_section(
            'section_subtitle_style',
            [
                'label' => esc_html__('Section Header Sub-Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_subtitle_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-sec .section-header .section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .feature-sec .section-header .section-subtitle',
            ]
        );
        $this->add_control(
            'section_subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-sec .section-header .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'label' => esc_html__('Section Header Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'section_title_color',
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .feature-sec .section-header .section-title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .feature-sec .section-header .section-title',
            ]
        );
        $this->add_control(
            'section_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-sec .section-header .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function sectionContentStyle()
    {
        $this->start_controls_section(
            'section_content_style',
            [
                'label' => esc_html__('Section Header Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_content_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-sec .section-header .section-desc' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .feature-sec .section-header .section-desc',
            ]
        );
        $this->add_control(
            'section_content_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-sec .section-header .section-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function projectBoxStyle()
    {
        /* Feature Header Start */
        $this->start_controls_section(
            'feature_project_box_style',
            [
                'label' => esc_html__('Project Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'feature_project_box_bg',
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .feature-project',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'feature_project_box_border',
                'selector' => '{{WRAPPER}} .feature-project',
            ]
        );
        $this->add_control(
            'feature_project_box_radius',
            [
                'label'      => esc_html__('Border Radius', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 20,
                    'right'    => 20,
                    'bottom'   => 20,
                    'left'     => 20,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .feature-project' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'feature_project_box_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 12,
                    'right'    => 12,
                    'bottom'   => 30,
                    'left'     => 12,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .feature-project' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function projectImgBoxStyle()
    {
        $this->start_controls_section(
            'feature_project_img_box_style',
            [
                'label' => esc_html__('Project Img Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'feature_project_img_box_width',
            [
                'label'      => esc_html__('Width', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 2000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .feature-project .img-box' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'feature_project_img_box_height',
            [
                'label'      => esc_html__('Height', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 2000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .feature-project .img-box' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'feature_project_img_box_border',
                'selector' => '{{WRAPPER}} .feature-project .img-box',
            ]
        );
        $this->add_control(
            'feature_project_img_box_radius',
            [
                'label'      => esc_html__('Border Radius', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-project .img-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'feature_project_img_box_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-project .img-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'feature_project_img_box_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-project .img-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function projectInfoTitleStyle()
    {
        $this->start_controls_section(
            'project_info_title_style',
            [
                'label' => esc_html__('Project Info Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'project_info_title_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-project-info-box .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'project_info_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .feature-project-info-box .title',
            ]
        );
        $this->add_control(
            'project_info_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-project-info-box .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function projectInfoSubTitleStyle()
    {
        $this->start_controls_section(
            'project_info_subtitle_style',
            [
                'label' => esc_html__('Project Info Sub-Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'project_info_subtitle_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-project-info-box .subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'project_info_subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .feature-project-info-box .subtitle',
            ]
        );
        $this->add_control(
            'project_info_subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-project-info-box .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function sectionButtonStyle()
    {
        $this->start_controls_section(
            'section_button_style',
            [
                'label' => esc_html__('Section Button', 'aixor-core'),
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
            'section_button_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-more-btn-wrap .theme-btn'          => 'color: {{VALUE}}',
                    '{{WRAPPER}} .feature-more-btn-wrap .theme-btn svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'section_button_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-more-btn-wrap .theme-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'section_button_border',
                'selector' => '{{WRAPPER}} .feature-more-btn-wrap .theme-btn',
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
            'section_button_hv_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-more-btn-wrap .theme-btn:hover'          => 'color: {{VALUE}}',
                    '{{WRAPPER}} .feature-more-btn-wrap .theme-btn:hover svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'section_button_hv_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-more-btn-wrap .theme-btn:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'section_button_hv_border',
                'selector' => '{{WRAPPER}} .feature-more-btn-wrap .theme-btn:hover',
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
                'name'     => 'section_button_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .feature-more-btn-wrap .theme-btn',
            ]
        );
        $this->add_control(
            'section_button_padding',
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
                    '{{WRAPPER}} .feature-more-btn-wrap .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'section_button_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-more-btn-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    
        // Custom post args
        $args = array(
            'post_type'      => 'project',
            'posts_per_page' => $settings['post_number'],
            'order'          => $settings['order'],
            'orderby'        => $settings['orderby'],
        );
        
        $posts = new \WP_Query($args);
        ?>
        <div class="feature-sec">
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
                    if (!empty($settings['section_title'])) { ?>
                        <h2 class="section-title section-title2">
                            <?php echo $settings['section_title']; ?>
                        </h2>
                    <?php }
                    if (!empty($settings['section_content'])) { ?>
                        <p class="section-desc"><?php echo $settings['section_content']; ?></p>
                    <?php } ?>
                </div>
    
                <?php if ($posts->have_posts()): ?>
                    <div class="feature-project-lists">
                        <?php
                        while ($posts->have_posts()): $posts->the_post();
                            global $post;
                            //  $idd = get_the_ID();
                            $infoTitle        = get_post_meta($post->ID, 'info_title', true);
                            $infoDescription  = get_post_meta($post->ID, 'info_description', true);
                            $infoIndustry     = get_post_meta($post->ID, 'info_industry', true);
                            $infoReleaseDate = get_post_meta($post->ID, 'info_release_date', true);
                            $featuredImage    = get_the_post_thumbnail($post->ID, 'full');
                        ?>
                            <div class="feature-project">
                                <div class="hover_mouse">
                                    <a href="<?php the_permalink(); ?>">
                                        View
                                    </a>
                                </div>
                                <?php if (!empty($featuredImage)) { ?>
                                    <div class="img-box">
                                        <?php echo $featuredImage; ?>
                                    </div>
                                <?php } ?>
                                <div class="feature-project-infos">
                                    <?php if (!empty($infoTitle)) { ?>
                                        <div class="feature-project-info-box">
                                            <span class="title"><?php echo esc_html__('Project Name:', 'aixor-core'); ?></span>
                                            <a href="<?php the_permalink(); ?>">
                                            <span class="subtitle"><?php echo esc_html($infoTitle); ?></span>
                                            </a>
                                        </div>
                                    <?php }
                                    if (!empty($infoDescription)) { ?>
                                        <div class="feature-project-info-box">
                                            <span class="title"><?php echo esc_html__('Description', 'aixor-core'); ?></span>
                                           <span class="subtitle"><?php echo ($infoDescription); ?></span>
                                        </div>
                                    <?php }
                                    if (!empty($infoIndustry)) { ?>
                                        <div class="feature-project-info-box">
                                            <span class="title"><?php echo esc_html__('Industry:', 'aixor-core'); ?></span>
                                            <span class="subtitle"><?php echo esc_html($infoIndustry); ?></span>
                                        </div>
                                    <?php }
                                    if (!empty($infoReleaseDate)) { ?>
                                        <div class="feature-project-info-box">
                                            <span class="title"><?php echo esc_html__('Release Date:', 'aixor-core'); ?></span>
                                            <span class="subtitle"><?php echo esc_html($infoReleaseDate); ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php    
                        endwhile;
                        wp_reset_postdata(); 
                        ?>
                    </div>
                <?php endif; ?>
    
                <?php if (!empty($settings['button_text'])): ?>
                    <div class="feature-more-btn-wrap">
                        <?php if (!empty($settings['button_url']['url'])): ?>
                            <a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="theme-btn">
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
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
    

    public function content_template()
    {

    }

}