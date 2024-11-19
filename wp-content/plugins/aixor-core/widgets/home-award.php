<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;

class aixorAward extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-award';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Our Award', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-star';
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
        return ['aixor', 'award', 'review'];
    }

    /**
     * Register Aixor widget controls.
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'award_section_header',
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
                'default'     => esc_html__('OUR AWARDS', 'aixor-core'),
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
            'award_section',
            [
                'label' => esc_html__('Award', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        // repeater start
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'award_image', [
                'label'   => esc_html__('Award Image', 'aixor-core'),
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
            'award_title', [
                'label'       => esc_html__('Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('I. Awwwards Jury', 'aixor-core'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true
                ]
            ]
        );

        $repeater->add_control(
            'award_year', [
                'label'       => esc_html__('Year', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('John Doe', 'aixor-core'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'award_lists',
            [
                'label'       => esc_html__('Our Awards List', 'aixor-core'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'award_title' => 'I. Awwwards Jury',
                        'award_year'  => '2021-2024',
                    ],
                    [
                        'award_title' => 'II. Studio of the year',
                        'award_year'  => '2023',
                    ],
                    [
                        'award_title' => 'III. Cannes Lions',
                        'award_year'  => '2022',
                    ],
                    [
                        'award_title' => 'IV. Adobe Design Achievement Awards',
                        'award_year'  => '2022-2023',
                    ],
                    [
                        'award_title' => 'V. D&AD Awards',
                        'award_year'  => '2021',
                    ],
                    [
                        'award_title' => 'VI. Red Dot Design Awards',
                        'award_year'  => '2020-2021',
                    ],


                ],
                'title_field' => '{{{ award_title }}}',
            ]
        );
        // repeater end

        $this->end_controls_section();

        $this->sectionSubTitleStyle();
        $this->awardBoxStyle();
        $this->awardTitleStyle();
        $this->awardDateStyle();
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
                    '{{WRAPPER}} .awards-sec .section-header .section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .awards-sec .section-header .section-subtitle',
            ]
        );
        $this->add_responsive_control(
            'section_subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .awards-sec .section-header .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function awardBoxStyle()
    {
        $this->start_controls_section(
            'award_box_style',
            [
                'label' => esc_html__('Award Box', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'award_box_bg',
            [
                'label'     => esc_html__('Background', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awards-box' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'award_box',
                'selector' => '{{WRAPPER}} .awards-box',
            ]
        );
        $this->add_responsive_control(
            'award_box_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 24,
                    'right'    => 0,
                    'bottom'   => 24,
                    'left'     => 0,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .awards-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'award_box_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .awards-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function awardTitleStyle()
    {
        $this->start_controls_section(
            'award_title_style',
            [
                'label' => esc_html__('Award Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'award_title_color',
                'label'    => esc_html__('Color', 'aixor-core'),
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .awards-box .awards-inner h4',
            ]
        );
        $this->add_control(
            'award_title_hv_color',
            [
                'label'     => esc_html__('Hover Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awards-box:hover .awards-inner h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'award_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .awards-box .awards-inner h4',
            ]
        );
        $this->add_responsive_control(
            'award_title_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .awards-box .awards-inner h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'award_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .awards-box .awards-inner h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function awardDateStyle()
    {
        $this->start_controls_section(
            'award_year_style',
            [
                'label' => esc_html__('Award Year', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'award_year_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awards-box .awards-inner .date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'award_year_hv_color',
            [
                'label'     => esc_html__('Hover Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awards-box:hover .awards-inner .date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'award_year_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .awards-box .awards-inner .date',
            ]
        );
        $this->add_responsive_control(
            'award_year_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .awards-box .awards-inner .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        <div class="awards-sec">
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

            if ($settings['award_lists']) {
                ?>
                <div class="awards-list">

                    <?php foreach ($settings['award_lists'] as $index => $award) { ?>
                        <div class="awards-box <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="awards-inner">
                                <?php if (!empty($award['award_image']['url'])) { ?>
                                    <div class="overlay"
                                         style="background-image: url('<?php echo esc_url($award['award_image']['url']); ?>')"></div>
                                <?php } ?>
                                <h4><?php echo esc_html($award['award_title']); ?></h4>
                                <span class="date"><?php echo esc_html($award['award_year']); ?></span>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            <?php } ?>

        </div>

        <?php
    }

    public function content_template()
    {

    }

}