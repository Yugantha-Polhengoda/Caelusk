<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;

class aixorProjectProjects extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-project-projects';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Feature Projects V2', 'aixor-core');
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
        return ['aixor', 'project', 'projects'];
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
                'label' => esc_html__('Project Row', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'info_title1', [
                'label'         => esc_html__( 'Info Title 1', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'info_content1', [
                'label'         => esc_html__( 'Info Content 1', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'info_title2', [
                'label'         => esc_html__( 'Info Title 2', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'info_content2', [
                'label'         => esc_html__( 'Info Content 2', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'info_title3', [
                'label'         => esc_html__( 'Info Title 3', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'info_content3', [
                'label'         => esc_html__( 'Info Content 3', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'info_title4', [
                'label'         => esc_html__( 'Info Title 4', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'info_content4', [
                'label'         => esc_html__( 'Info Content 4', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'button_text', [
                'label'         => esc_html__( 'Button Text', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'button_link',
            [
                'label'         => esc_html__( 'Button Link', 'aixor-core' ),
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
            'project_img',
            [
                'label'     => esc_html__( 'Image', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        $repeater->add_control(
            'animation1', [
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
            'animation_delay1', [
                'label'       => esc_html__('Animation Delay', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Project List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ info_content1 }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'projectcol_section',
            [
                'label' => esc_html__('Project Column', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'infocol_title1', [
                'label'         => esc_html__( 'Info Title 1', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'infocol_content1', [
                'label'         => esc_html__( 'Info Content 1', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'infocol_title2', [
                'label'         => esc_html__( 'Info Title 2', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'infocol_content2', [
                'label'         => esc_html__( 'Info Content 2', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'buttoncol_text', [
                'label'         => esc_html__( 'Button Text', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'buttoncol_link',
            [
                'label'         => esc_html__( 'Button Link', 'aixor-core' ),
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
            'projectcol_img',
            [
                'label'     => esc_html__( 'Image', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        $repeater->add_control(
            'animation2', [
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
            'animation_delay2', [
                'label'       => esc_html__('Animation Delay', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'projectcol_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Info', 'aixor-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'aixor-core' ),
                'label_off'     => __( 'Hide', 'aixor-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Project List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ infocol_content1 }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'projectcontrols_section',
            [
                'label' => esc_html__('Project Cards Controls', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'projectrow_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Row Card Info', 'aixor-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'aixor-core' ),
                'label_off'     => __( 'Hide', 'aixor-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'projectcolcard_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Column Card Info', 'aixor-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'aixor-core' ),
                'label_off'     => __( 'Hide', 'aixor-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();
        
        /*-----------------------------------------Header section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'header_section_style',
            [
                'label' => esc_html__('Project Content Style', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'header_section_tabs'
        );

        $this->start_controls_tab(
            'header_section_menu_tab',
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
                    '{{WRAPPER}} .feature-project-info-box .title ' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .feature-project-info-box .title',
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .feature-project-info-box .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-project-info-box .title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_section_info_tab',
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
                    '{{WRAPPER}} .feature-project-info-box .subtitle ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .feature-project-info-box .subtitle ',
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .feature-project-info-box .subtitle ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-project-info-box .subtitle ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <!-- ===== Feature Start ===== -->
        <div class="feature-sec feature-sec-2" id="projects">
            <div class="custom-container">


                <div class="feature-project-lists">
                    <!-- Project 1 -->
                    <?php if (!empty($settings['list1'])):
                        foreach ($settings['list1'] as $settings_loop): ?>
                    <?php if ($settings['projectrow_switcher_options'] === 'yes') : ?>
                    <div class="feature-project" data-aos="<?php echo esc_attr($settings_loop['animation1']); ?>" data-aos-delay="<?php echo esc_attr($settings_loop['animation_delay1']); ?>">
                        <div class="hover_mouse">
                            <a <?php if($settings_loop['button_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                            href="<?php echo esc_url($settings_loop['button_link']['url']); ?>"><?php echo esc_html($settings_loop['button_text']); ?></a>
                        </div>
                        <?php if (!empty($settings_loop['project_img']['url'])) { ?>
                        <div class="img-box">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $settings_loop['project_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($settings_loop['project_img']['id'], '_wp_attachment_image_alt', true); ?>">
                        </div>
                        <?php } ?>
                        <div class="feature-project-infos">
                            <div class="feature-project-info-box">
                                <span class="title"><?php echo esc_html($settings_loop['info_title1']); ?></span>
                                <span class="subtitle"><?php echo ($settings_loop['info_content1']); ?></span>
                            </div>
                            <div class="feature-project-info-box">
                                <span class="title"><?php echo esc_html($settings_loop['info_title2']); ?></span>
                                <span class="subtitle"><?php echo ($settings_loop['info_content2']); ?></span>
                            </div>
                            <div class="feature-project-info-box">
                                <span class="title"><?php echo esc_html($settings_loop['info_title3']); ?></span>
                                <span class="subtitle"><?php echo ($settings_loop['info_content3']); ?></span>
                            </div>
                            <div class="feature-project-info-box">
                                <span class="title"><?php echo esc_html($settings_loop['info_title4']); ?></span>
                                <span class="subtitle"><?php echo ($settings_loop['info_content4']); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php endforeach; endif;?>
                    
                    <?php if ($settings['projectcolcard_switcher_options'] === 'yes') : ?>
                    <div class="project-col-2">
                        <?php if (!empty($settings['list2'])):
                        foreach ($settings['list2'] as $settingscol_loop): ?>
                        <?php if ($settingscol_loop['projectcol_switcher_options'] === 'yes') : ?>
                        <div class="feature-project feature-project-2" data-aos="<?php echo esc_attr($settingscol_loop['animation2']); ?>" data-aos-delay="<?php echo esc_attr($settingscol_loop['animation_delay2']); ?>">
                            <div class="hover_mouse">
                                <a <?php if($settingscol_loop['buttoncol_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($settingscol_loop['buttoncol_link']['url']); ?>"><?php echo esc_html($settingscol_loop['buttoncol_text']); ?></a>
                            </div>
                            <?php if (!empty($settingscol_loop['projectcol_img']['url'])) { ?>
                            <div class="img-box">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $settingscol_loop['projectcol_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($settingscol_loop['projectcol_img']['id'], '_wp_attachment_image_alt', true); ?>">
                            </div>
                            <?php } ?>
                            <div class="feature-project-infos">
                                <div class="feature-project-info-box">
                                    <span class="title"><?php echo esc_html($settingscol_loop['infocol_title1']); ?></span>
                                    <span class="subtitle"><?php echo esc_html($settingscol_loop['infocol_content1']); ?></span>
                                </div>
                                <div class="feature-project-info-box">
                                    <span class="title"><?php echo esc_html($settingscol_loop['infocol_title2']); ?></span>
                                    <span class="subtitle"><?php echo esc_html($settingscol_loop['infocol_content2']); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php endforeach; endif;?>
                    </div>
                    <?php endif;?>
                </div>

            </div>
        </div>
        <!-- ===== Feature End -->
        <?php
    }

    public function content_template()
    {

    }

}