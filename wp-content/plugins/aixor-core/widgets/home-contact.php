<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;


class aixorContact extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-contact';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Contact', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-envelope';
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
        return ['aixor', 'contact', 'profile'];
    }

    /**
     * Register Aixor widget controls.
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'contact_section',
            [
                'label' => esc_html__('Contact', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'contact_title',
            [
                'label'       => esc_html__('Title', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => 'Let’s <span>Connect</span>',
            ]
        );
        $this->add_control(
            'contact_content',
            [
                'label'       => esc_html__('Content', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Whether you have a question, or want to discuss a potential project, our team at <br> AIXOR is here to help. Please fill out the form below!!!',
                'label_block' => true
            ]
        );
        $this->add_control(
            'contact_image',
            [
                'label'   => esc_html__('Contact Image', 'aixor-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'contact_form',
            [
                'label'       => esc_html__('Contact Shortcode', 'aixor-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__('', 'aixor-core'),
                'label_block' => true,
                'row'         => 3,
                'placeholder' => '[contact_form id="1"]'
            ]
        );
        $this->end_controls_section();


        $this->contactTitleStyle();
        $this->contactContentStyle();
        $this->contactImageStyle();
    }

    private function contactTitleStyle()
    {
        $this->start_controls_section(
            'contact_title_style',
            [
                'label' => esc_html__('Title', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'contact_title_color',
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .contact-sec .contact-content h3',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'contact_title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .contact-sec .contact-content h3',
            ]
        );
        $this->add_responsive_control(
            'contact_title_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => 14,
                    'right'    => 14,
                    'bottom'   => 14,
                    'left'     => 14,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .contact-sec .contact-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_title_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default'    => [
                    'top'      => -14,
                    'right'    => -14,
                    'bottom'   => -14,
                    'left'     => -14,
                    'unit'     => 'px',
                    'isLinked' => true,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .contact-sec .contact-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function contactContentStyle()
    {
        $this->start_controls_section(
            'contact_content_style',
            [
                'label' => esc_html__('Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'contact_content_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-sec .contact-content > p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'contact_content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .contact-sec .contact-content > p',
            ]
        );
        $this->add_responsive_control(
            'contact_content_padding',
            [
                'label'      => esc_html__('Padding', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-sec .contact-content > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_content_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-sec .contact-content > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    private function contactImageStyle()
    {
        $this->start_controls_section(
            'contact_image_style',
            [
                'label' => esc_html__('Image', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'contact_image_width',
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
                    '{{WRAPPER}} .contact-sec .img-box' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_image_height',
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
                    'size' => 620,
                    'unit' => 'px'
                ],
                'selectors'  => [
                    '{{WRAPPER}} .contact-sec .img-box' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_image_margin',
            [
                'label'      => esc_html__('Margin', 'aixor-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-sec .img-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        <div class="contact-sec">
            <div class="custom-row">
                <div class="left">
                    <div class="contact-content">
                        <?php if (!empty($settings['contact_title'])) { ?>
                            <h3 data-aos="fade-up"><?php echo $settings['contact_title']; ?></h3>
                        <?php }
                        if (!empty($settings['contact_content'])) { ?>
                            <p>
                                <span class="required">*</span> <?php echo $settings['contact_content']; ?>
                            </p>
                        <?php }

                        echo do_shortcode($settings['contact_form']);
                        ?>
                        <!--                        <form class="contact-form">-->
                        <!--                            <div class="input-group">-->
                        <!--                                <input type="text" placeholder="Name"/>-->
                        <!--                            </div>-->
                        <!---->
                        <!--                            <div class="col-2">-->
                        <!--                                <div class="input-group">-->
                        <!--                                    <input type="email" placeholder="E-mail"/>-->
                        <!--                                </div>-->
                        <!--                                <div class="input-group">-->
                        <!--                                    <input type="text" placeholder="Phone">-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                            <div class="input-group">-->
                        <!--                                <textarea name="message" id="message" placeholder="Message"></textarea>-->
                        <!--                            </div>-->
                        <!--                            <div class="input-group">-->
                        <!--                                <button class="theme-btn">-->
                        <!--                                    Send Message-->
                        <!--                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"-->
                        <!--                                         fill="none">-->
                        <!--                                        <path d="M1 13L13 1M13 1H4M13 1V10" stroke="white" stroke-width="1.5"-->
                        <!--                                              stroke-linecap="round" stroke-linejoin="round"/>-->
                        <!--                                    </svg>-->
                        <!--                                </button>-->
                        <!--                            </div>-->
                        <!--                        </form>-->
                    </div>
                </div>
                <div class="right">
                    <?php if (!empty($settings['contact_image']['url'])) { ?>
                        <div class="img-box">
                            <img src="<?php echo esc_url($settings['contact_image']['url']); ?>" alt="img">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php
    }

    public function content_template()
    {

    }

}