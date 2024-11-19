<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;

// use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;

class aixorAbout extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-about';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('About Us', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-person';
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
            'about_us_section',
            [
                'label' => esc_html__('About Us', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_subtitle',
            [
                'label'       => esc_html__('Section Sub Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('About Us', 'aixor-core'),
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
                'type'        => Controls_Manager::WYSIWYG,
                'label_block' => true
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'funfacts_section',
            [
                'label' => esc_html__('Funfacts', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        // repeater start
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'funfact_image', [
                'label'   => __('Cover Image', 'aixor-core'),
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
            'funfact_name', [
                'label'       => __('Name', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Years Experience', 'aixor-core'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'funfact_count', [
                'label'       => __('Number', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => '12<span>+</span>',
                'label_block' => true,
                'rows'        => 2
            ]
        );
        $repeater->add_control(
            'funfact_icon',
            [
                'label' => esc_html__('Choose Icon', 'aixor-core'),
                'type'  => Controls_Manager::MEDIA,
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
            'funfact_list',
            [
                'label'       => __('FunFacts List', 'aixor-core'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'funfact_name'   => __('Years Experience', 'aixor-core'),
                        'funfact_count' => "12<span>+</span>"
                    ],
                    [
                        'funfact_name'   => __('Completed Projects', 'aixor-core'),
                        'funfact_count' => "25k<span>+</span>"
                    ],
                    [
                        'funfact_name'   => __('Award Winning', 'aixor-core'),
                        'funfact_count' => "110<span>+</span>"
                    ],
                    [
                        'funfact_name'   => __('Satisfied Clients', 'aixor-core'),
                        'funfact_count' => "4M<span>+</span>"
                    ],

                ],
                'title_field' => '{{{ funfact_name }}}',
            ]
        );
        // repeater end

        $this->end_controls_section();


        $this->sectionSubTitleStyle();
        $this->sectionTitleStyle();
        $this->funfactBoxStyle();
        $this->funfactTitleStyle();
        $this->funfactNumberStyle();
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
                    '{{WRAPPER}} .about-sec .section-header .section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .about-sec .section-header .section-subtitle',
            ]
        );
        $this->add_control(
            'section_subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .about-sec .section-header .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    private function funfactBoxStyle()
    {
        $this->start_controls_section(
            'funfact_box_style',
            [
                'label' => esc_html__('FunFact Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'funfact_box_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'funfact_box_border',
                'selector' => '{{WRAPPER}} .funfact-box',
            ]
        );
        $this->add_control(
            'funfact_box_radius',
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
                    '{{WRAPPER}} .funfact-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'funfact_box_padding',
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
                    '{{WRAPPER}} .funfact-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function funfactTitleStyle()
    {
        $this->start_controls_section(
            'funfact_title_style',
            [
                'label' => esc_html__('FunFact - Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'funfact_title_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact-box .funfact-header .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'funfact_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .funfact-box .funfact-header .title',
            ]
        );
        $this->add_control(
            'funfact_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .funfact-box .funfact-header .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function funfactNumberStyle()
    {
        $this->start_controls_section(
            'funfact_number_style',
            [
                'label' => esc_html__('FunFact - Number', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'funfact_number_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact-box .funfact-footer .number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'funfact_number_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .funfact-box .funfact-footer .number',
            ]
        );
        $this->add_control(
            'funfact_number_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .funfact-box .funfact-footer .number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $funfacts = $settings['funfact_list'];
        ?>

        <div class="about-sec">
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
                        <div class="right">
                            <?php echo ($settings['section_title']); ?>
                        </div>
                    <?php } ?>
                </div>

                <?php if ($funfacts) { ?>
                    <div class="funfacts-wrap">
                        <?php foreach ($funfacts as $index => $funfact) { ?>
                            <div data-aos="<?php echo esc_attr($funfact['animation']); ?>" data-aos-delay="<?php echo esc_attr($funfact['animation_delay']); ?>" class="funfact-box <?php echo $index === 0 ? 'active' : ''; ?>">
                                <?php if (!empty($funfact['funfact_image']['url'])) { ?>
                                    <img src="<?php echo esc_url($funfact['funfact_image']['url']) ?>" alt="Funfact"
                                         class="overlay">
                                <?php }
                                if (!empty($funfact['funfact_name'])) {
                                    ?>
                                    <div class="funfact-header">
                                <span class="title">
                                    <?php echo esc_html($funfact['funfact_name']); ?>
                                </span>
                                    </div>
                                <?php } ?>
                                <div class="funfact-footer">
                                    <?php if (!empty($funfact['funfact_count'])) { ?>
                                        <span class="number"><?php echo $funfact['funfact_count']; ?></span>
                                    <?php }
                                    if (!empty($funfact['funfact_icon']['url'])) { ?>
                                        <img src="<?php echo esc_url($funfact['funfact_icon']['url']); ?>"
                                             alt="Funfact">
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