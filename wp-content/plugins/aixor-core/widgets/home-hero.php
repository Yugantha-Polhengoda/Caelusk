<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;

class aixorHomeHero extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-home-hero';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Hero', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-post';
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
        return ['aixor', 'home', 'hero'];
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
                'label' => esc_html__('Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'author_name',
            [
                'label'       => esc_html__('Author Name', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Ahshan M', 'aixor-core'),
                'placeholder' => esc_html__('Type author name here', 'aixor-core'),
            ]
        );
        $this->add_control(
            'author_designation',
            [
                'label'       => esc_html__('Author Designation', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Chief Executive Officer', 'aixor-core'),
                'placeholder' => esc_html__('Type author name here', 'aixor-core'),
            ]
        );
        $this->add_control(
            'description',
            [
                'label'       => esc_html__('Description', 'aixor-core'),
                'type'        => Controls_Manager::WYSIWYG,
                'default'     =>'<p>“ At AIXOR, we believe that creativity is the catalyst for innovation.
                            As a full-service creative agency, we specialise in transforming
                            bold ideas into compelling realities.</p>
                        <p>Whether it’s developing a brand identity, creating a user-friendly
                            website, or executing a dynamic marketing campaign, we
                            approach every project with the same level of dedication and
                            enthusiasm. “</p>',
                'placeholder' => esc_html__('Type your description here', 'aixor-core'),
            ]
        );
        $this->add_control(
            'title1',
            [
                'label'       => esc_html__('Title 1', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Imagination', 'aixor-core'),
                'placeholder' => esc_html__('Type title here', 'aixor-core'),
            ]
        );
        $this->add_control(
            'title2',
            [
                'label'       => esc_html__('Title 2', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Meets Innovation', 'aixor-core'),
                'placeholder' => esc_html__('Type title here', 'aixor-core'),
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label'       => esc_html__('Button Text', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__("Let's Connect", "aixor-core"),
                'placeholder' => esc_html__('Type title here', 'aixor-core'),
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
            'button1_icon',
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
        $this->add_control(
            'video_url',
            [
                'label'       => esc_html__('Video Url', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => 'https://framerusercontent.com/assets/SP4PqvNBi5Gey10EBITMUTP0A.mp4',
                'placeholder' => esc_html__('https://', 'aixor-core'),
            ]
        );

        $this->end_controls_section();


        $this->authorStyleSettings();
        $this->descriptionStyleSettings();
        $this->titleStyleSettings();
        $this->buttonStyleSettings();
    }

    private function authorStyleSettings()
    {
        $this->start_controls_section(
            'author_name_style',
            [
                'label' => esc_html__('Author', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'author_name_color',
            [
                'label'     => esc_html__('Author Name Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-sec .hero-top .author-info h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'author_name_typography',
                'label'    => esc_html__('Author Name Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .hero-sec .hero-top .author-info h4',
            ]
        );
        $this->add_control(
            'author_name_margin',
            [
                'label'      => esc_html__('Author Name Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 0,
                    'right'    => 0,
                    'bottom'   => 0,
                    'left'     => 0,
                    'unit'     => 'em',
                    'isLinked' => false,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .hero-sec .hero-top .author-info h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'author_designation_color',
            [
                'label'     => esc_html__('Author Designation Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-sec .hero-top .author-info span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'author_designation_typography',
                'label'    => esc_html__('Author Designation Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .hero-sec .hero-top .author-info span',
            ]
        );
        $this->add_control(
            'author_designation_margin',
            [
                'label'      => esc_html__('Author Designation Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 0,
                    'right'    => 0,
                    'bottom'   => 0,
                    'left'     => 0,
                    'unit'     => 'em',
                    'isLinked' => false,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .hero-sec .hero-top .author-info span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function descriptionStyleSettings()
    {
        $this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__('Description', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-sec .hero-top p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'description_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .hero-sec .hero-top p',
            ]
        );
        $this->add_control(
            'description_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 0,
                    'right'    => 0,
                    'bottom'   => 0,
                    'left'     => 0,
                    'unit'     => 'em',
                    'isLinked' => false,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .hero-sec .hero-top p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function titleStyleSettings()
    {
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'title1_color',
                'types'    => ['gradient'],
                'label'    => esc_html__('Title 1 Color', 'aixor-core'),
                'selector' => '{{WRAPPER}} .hero-sec .hero-bottom h2',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title1_typography',
                'label'    => esc_html__('Title 1 Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .hero-sec .hero-bottom h2',
            ]
        );
        $this->add_control(
            'title1_margin',
            [
                'label'      => esc_html__('Title 1 Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-sec .hero-bottom h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'hr2',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'title2_color',
                'types'    => ['gradient'],
                'label'    => esc_html__('Title 2 Color', 'aixor-core'),
                'selector' => '{{WRAPPER}} .hero-sec .hero-bottom h2:nth-child(2)',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title2_typography',
                'label'    => esc_html__('Title 2 Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .hero-sec .hero-bottom h2:nth-child(2)',
            ]
        );
        $this->add_control(
            'title2_margin',
            [
                'label'      => esc_html__('Title 2 Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-sec .hero-bottom h2:nth-child(2)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function buttonStyleSettings()
    {
        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button', 'aixor-core'),
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
            'button_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn',
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
            'button_hv_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn:hover svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_hv_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_hv_border',
                'selector' => '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn:hover',
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
                'name'     => 'button_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn',
            ]
        );
        $this->add_control(
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
                    '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'button_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-sec .hero-bottom .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <div class="hero-sec">
            <div class="custom-container">
                <div class="hero-inner">
                    <?php if (!empty($settings['video_url'])) { ?>
                        <div class="hero-video">
                            <video src="<?php echo esc_attr($settings['video_url']); ?>" loop="true" muted="true" autoplay playsinline=""></video>
                        </div>
                    <?php } ?>

                    <div class="hero-top">

                        <div class="hero-top-desc">
                            <?php echo $settings['description']; ?>
                        </div>

                        <?php if (!empty($settings['author_name']) || !empty($settings['author_designation'])) { ?>
                            <div class="author-info">
                                <?php if (!empty($settings['author_name'])) { ?>
                                    <h4><?php echo esc_html($settings['author_name']); ?></h4>
                                <?php } if (!empty($settings['author_designation'])) { ?>
                                    <span><?php echo esc_html($settings['author_designation']); ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="hero-bottom">
                        <?php if (!empty($settings['title1']) || !empty($settings['title2'])) { ?>
                            <div class="left">
                                <?php if (!empty($settings['title1'])) { ?>
                                    <h2><?php echo esc_html($settings['title1']); ?></h2>
                                <?php }
                                if (!empty($settings['title2'])) { ?>
                                    <h2><?php echo esc_html($settings['title2']); ?></h2>
                                <?php } ?>
                            </div>
                        <?php }
                        if (!empty($settings['button_text'])) {
                            if ( ! empty( $settings['button_url']['url'] ) ) {
                                $this->add_link_attributes( 'button_url', $settings['button_url'] );
                            }
                            ?>
                            <a <?php $this->print_render_attribute_string( 'button_url' ); ?> class="theme-btn">
                                <?php
                                    echo esc_html($settings['button_text']); ?>
                                    <?php
                            if ($settings['button_icon_type'] === 'icon') {
                                // Render the icon class
                                echo '<i class="' . esc_attr($settings['button1_icon']) . '"></i>';
                            } elseif ($settings['button_icon_type'] === 'svg_upload') {
                                // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                                echo '<img src="' . esc_url(wp_get_attachment_image_url($settings['button_icon_svg_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($settings['button_icon_svg_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                            }
                            ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function content_template()
    {

    }

}