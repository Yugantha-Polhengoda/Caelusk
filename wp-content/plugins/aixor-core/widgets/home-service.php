<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;

class aixorService extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-service';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Our Service', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-tools';
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
            'service_section',
            [
                'label' => esc_html__('Our Service', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_subtitle',
            [
                'label'       => esc_html__('Section Sub Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Our Service', 'aixor-core'),
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
                'default'     => 'At AIXOR, we offer tailored creative solutions to elevate your brand and drive success, exceeding your expectations with our expert team\'s dedicated services.',
                'label_block' => true
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'servlisttitle_section',
            [
                'label' => esc_html__('Service List Title', 'aixor-core'),
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
            'servlist_tit1', [
                'label'         => esc_html__( 'Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'servlist_icon1_type',
            [
                'label' => esc_html__('Icon Type', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon1' => esc_html__('Icon Class', 'aixor-core'),
                    'svg_upload1' => esc_html__('Upload SVG', 'aixor-core'),
                ],
                'default' => 'svg_upload',
            ]
        );

        $this->add_control(
            'servlist_icon1',
            [
                'label' => esc_html__('Icon', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'las la-arrow-down',
                'description' => sprintf(
                    esc_html__('Paste Line-Awesome Icon Class. For more icons, visit %s.', 'aixor-core'),
                    '<a href="https://icons8.com/line-awesome" target="_blank">icons pack</a>'
                ),
                'condition' => [
                    'servlist_icon1_type' => 'icon1',
                ],
            ]
        );

        $this->add_control(
            'servlist_svg1_upload',
            [
                'label' => esc_html__('Upload SVG', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'description' => esc_html__('Upload an SVG file.', 'aixor-core'),
                'condition' => [
                    'servlist_icon1_type' => 'svg_upload1',
                ],
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
            'servlist_tit2', [
                'label'         => esc_html__( 'Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'servlist_icon2_type',
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

        $this->add_control(
            'servlist_icon2',
            [
                'label' => esc_html__('Icon', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'las la-arrow-down',
                'description' => sprintf(
                    esc_html__('Paste Line-Awesome Icon Class. For more icons, visit %s.', 'aixor-core'),
                    '<a href="https://icons8.com/line-awesome" target="_blank">icons pack</a>'
                ),
                'condition' => [
                    'servlist_icon2_type' => 'icon2',
                ],
            ]
        );

        $this->add_control(
            'servlist_svg2_upload',
            [
                'label' => esc_html__('Upload SVG', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'description' => esc_html__('Upload an SVG file.', 'aixor-core'),
                'condition' => [
                    'servlist_icon2_type' => 'svg_upload2',
                ],
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
            'servlist_tit3', [
                'label'         => esc_html__( 'Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'servlist_icon3_type',
            [
                'label' => esc_html__('Icon Type', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon3' => esc_html__('Icon Class', 'aixor-core'),
                    'svg_upload3' => esc_html__('Upload SVG', 'aixor-core'),
                ],
                'default' => 'svg_upload3',
            ]
        );

        $this->add_control(
            'servlist_icon3',
            [
                'label' => esc_html__('Icon', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'las la-arrow-down',
                'description' => sprintf(
                    esc_html__('Paste Line-Awesome Icon Class. For more icons, visit %s.', 'aixor-core'),
                    '<a href="https://icons8.com/line-awesome" target="_blank">icons pack</a>'
                ),
                'condition' => [
                    'servlist_icon3_type' => 'icon3',
                ],
            ]
        );

        $this->add_control(
            'servlist_svg3_upload',
            [
                'label' => esc_html__('Upload SVG', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'description' => esc_html__('Upload an SVG file.', 'aixor-core'),
                'condition' => [
                    'servlist_icon3_type' => 'svg_upload3',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'service_lists_section',
            [
                'label' => esc_html__('Service Lists', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        // repeater start
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_image', [
                'label'   => __('Product Image', 'aixor-core'),
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
            'service_name', [
                'label'       => __('Product Name', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Years Experience', 'aixor-core'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ]
            ]
        );

        // LINK
        $repeater->add_control(
            'service_link',
            [
                'label'         => esc_html__( 'Name Link', 'aixor-core' ),
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

        $repeater->add_control(
            'service_features', [
                'label'       => __('Product Features', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => "I. Legacy Modernisation \nII. Solution Design \nIII. Technology Enabling \nIV. Mobile-First Systems",
                'label_block' => true,
                'rows'        => 5
            ]
        );
        $repeater->add_control(
            'service_icon',
            [
                'label' => esc_html__('Choose Icon', 'aixor-core'),
                'type'  => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'service_lists',
            [
                'label'       => __('Service Lists', 'aixor-core'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'service_name'        => __('Branding Identity', 'aixor-core'),
                        'service_description' => "I. Legacy Modernisation \nII. Solution Design \nIII. Technology Enabling \nIV. Mobile-First Systems"
                    ],
                    [
                        'service_name'        => __('Interactive Design', 'aixor-core'),
                        'service_description' => "I. Legacy Modernisation \nII. Solution Design \nIII. Technology Enabling \nIV. Mobile-First Systems"
                    ],
                    [
                        'service_name'        => __('Development', 'aixor-core'),
                        'service_description' => "I. Legacy Modernisation \nII. Solution Design \nIII. Technology Enabling \nIV. Mobile-First Systems"
                    ],
                    [
                        'service_name'        => __('SEO/Marketing', 'aixor-core'),
                        'service_description' => "I. Legacy Modernisation \nII. Solution Design \nIII. Technology Enabling \nIV. Mobile-First Systems"
                    ],
                ],
                'title_field' => '{{{ service_name }}}',
            ]
        );
        // repeater end

        $this->end_controls_section();


        $this->sectionSubTitleStyle();
        $this->sectionTitleStyle();
        $this->serviceBoxStyle();
        $this->serviceTitleStyle();
        $this->serviceFeaturesStyle();
        $this->serviceImageStyle();
    }

    private function sectionSubTitleStyle()
    {
        $this->start_controls_section(
            'service_subtitle_style',
            [
                'label' => esc_html__('Section Sub-Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_subtitle_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-sec .section-header .section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'service_subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .service-sec .section-header .section-subtitle',
            ]
        );
        $this->add_control(
            'service_subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .service-sec .section-header .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-sec .section-header .section-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .service-sec .section-header .section-title',
            ]
        );
        $this->add_control(
            'section_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .service-sec .section-header .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function serviceBoxStyle()
    {
        $this->start_controls_section(
            'service_box_style',
            [
                'label' => esc_html__('Service Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'service_box_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'service_box_hv_bg',
            [
                'label'     => esc_html__('Hover Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-box:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'service_box_border',
                'selector' => '{{WRAPPER}} .service-box',
            ]
        );
        $this->add_control(
            'service_box_radius',
            [
                'label'      => esc_html__('Border Radius', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .service-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'service_box_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 35,
                    'right'    => 0,
                    'bottom'   => 35,
                    'left'     => 0,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .service-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function serviceTitleStyle()
    {
        $this->start_controls_section(
            'service_title_style',
            [
                'label' => esc_html__('Service Product - Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_title_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-box .service-inner .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'service_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .service-box .service-inner .title',
            ]
        );
        $this->add_control(
            'service_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .service-box .service-inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function serviceFeaturesStyle()
    {
        $this->start_controls_section(
            'service_features_style',
            [
                'label' => esc_html__('Service Features', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_features_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-box .service-inner .service-feature-lists' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'service_features_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .service-box .service-inner .service-feature-lists',
            ]
        );
        $this->add_control(
            'service_features_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .service-box .service-inner .service-feature-lists' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function serviceImageStyle()
    {
        $this->start_controls_section(
            'service_image_style',
            [
                'label' => esc_html__('Service Image', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'service_image_width',
            [
                'label'      => esc_html__('Width', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 5000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .service-box .service-inner .service-img-box img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_image_height',
            [
                'label'      => esc_html__('Height', 'aixor-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 5000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .service-box .service-inner .service-img-box img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_image_radius',
            [
                'label'      => esc_html__('Border Radius', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .service-box .service-inner .service-img-box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_image_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .service-box .service-inner .service-img-box img' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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


        <div class="service-sec">
            <div class="custom-container">
                <div class="section-header">
                    <?php if (!empty($settings['section_subtitle'])) { ?>
                        <span class="section-subtitle">
                            <?php if (!empty($settings['section_subtitle_icon']['url'])) { ?>
                                <img src="<?php echo esc_url($settings['section_subtitle_icon']['url']); ?>"
                                     alt="<?php echo esc_attr($settings['section_subtitle']); ?>">
                                <?php
                            }
                            echo esc_html($settings['section_subtitle']); ?>
                        </span>
                    <?php }
                    if (!empty($settings['section_title'])) {
                        ?>
                        <h3 class="section-title reveal-type">
                            <?php echo esc_html($settings['section_title']); ?>
                        </h3>
                    <?php } ?>
                </div>
            </div>

            <div class="service-lists-wrap">
                <div class="service-lists-header">
                    <div class="custom-container">
                        <div class="service-header-th">
                            <?php
                            if ($settings['servlist_icon1_type'] === 'icon1') {
                                // Render the icon class
                                echo '<i class="' . esc_attr($settings['servlist_icon1']) . '"></i>';
                            } elseif ($settings['servlist_icon1_type'] === 'svg_upload1') {
                                // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                                echo '<img src="' . esc_url(wp_get_attachment_image_url($settings['servlist_svg1_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($settings['servlist_svg1_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                            }
                            ?>
                            <?php echo esc_html($settings['servlist_tit1']); ?>
                        </div>
                        <div class="service-header-th">
                            <?php
                            if ($settings['servlist_icon2_type'] === 'icon2') {
                                // Render the icon class
                                echo '<i class="' . esc_attr($settings['servlist_icon2']) . '"></i>';
                            } elseif ($settings['servlist_icon2_type'] === 'svg_upload2') {
                                // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                                echo '<img src="' . esc_url(wp_get_attachment_image_url($settings['servlist_svg2_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($settings['servlist_svg2_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                            }
                            ?>
                            <?php echo esc_html($settings['servlist_tit2']); ?>
                        </div>
                        <div class="service-header-th">
                            <?php
                            if ($settings['servlist_icon3_type'] === 'icon3') {
                                // Render the icon class
                                echo '<i class="' . esc_attr($settings['servlist_icon3']) . '"></i>';
                            } elseif ($settings['servlist_icon3_type'] === 'svg_upload3') {
                                // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                                echo '<img src="' . esc_url(wp_get_attachment_image_url($settings['servlist_svg3_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($settings['servlist_svg3_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                            }
                            ?>
                            <?php echo esc_html($settings['servlist_tit3']); ?>
                        </div>
                    </div>
                </div>

                <?php if ($settings['service_lists']) { ?>
                    <div class="service-lists">
                        <?php foreach ($settings['service_lists'] as $index => $service_list) { ?>
                            <div class="service-box <?php echo $index === 0 ? 'active' : ''; ?>">
                                <div class="service-inner">
                                    <h4 class="title">
                                        <?php if (!empty($service_list['service_icon']['url'])) { ?>
                                            <img src="<?php echo esc_url($service_list['service_icon']['url']); ?>"
                                                 alt="<?php echo esc_attr__('service icon', 'aixor-core'); ?>">
                                        <?php } ?>
                                        <?php if (!empty($service_list['service_link']['url'])): ?>
                                            <a <?php if ($service_list['service_link']['is_external'] == true): ?> target="_blank" <?php endif; ?>
                                               href="<?php echo esc_url($service_list['service_link']['url']); ?>">
                                                <?php echo esc_html($service_list['service_name']); ?>
                                            </a>
                                        <?php else: ?>
                                            <?php echo esc_html($service_list['service_name']); ?>
                                        <?php endif; ?>

                                    </h4>
                                    <p class="service-feature-lists">
                                        <?php
                                        $service_features = $service_list['service_features'];
                                        $service_features_list = explode("\n", $service_features);
                                        foreach ($service_features_list as $feature_list) {
                                            echo '<span>' . esc_html($feature_list) . '</span>';
                                        }
                                        ?>
                                    </p>
                                    <div class="service-img-box">
                                        <?php if (!empty($service_list['service_image']['url'])) { ?>
                                            <img src="<?php echo esc_url($service_list['service_image']['url']); ?>"
                                                 alt="<?php echo esc_attr__('Service Image', 'aixor-core'); ?>">
                                        <?php } ?>
                                    </div>
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