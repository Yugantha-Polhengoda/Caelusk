<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;

class aixorServiceSingleProject extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-service-project';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Service Project', 'aixor-core');
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
        return ['aixor', 'service', 'project'];
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
                'label' => esc_html__('Project', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Image', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'project_img',
            [
                'label'     => esc_html__( 'Image', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Info Box', 'aixor-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'info_title', [
                'label'         => esc_html__( 'Info Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'info_content', [
                'label'         => esc_html__( 'Info Content', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'info_class', [
                'label'         => esc_html__( 'Info Class Name', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Info List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ info_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Button', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'button_text', [
                'label'         => esc_html__( 'Button Text', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
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

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        
        /*-----------------------------------------Header section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'header_section_style',
            [
                'label' => esc_html__('Info Style', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'header_section_tabs'
        );

        $this->start_controls_tab(
            'header_section_title_tab',
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
                    '{{WRAPPER}} .feature-project-info-box .title' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .feature-project-info-box .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-project-info-box .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_section_content_tab',
            [
               'label' => esc_html__( 'Content', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-project-info-box .subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .feature-project-info-box .subtitle',
            ]
        );
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .feature-project-info-box .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-project-info-box .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_section_info_tab',
            [
               'label' => esc_html__( 'Button', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-project .feature-project-infos .feature-project-info-box .theme-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bgcolor',
            [
                'label'     => esc_html__('Background Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-project .feature-project-infos .feature-project-info-box .theme-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .theme-btn',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <!-- ===== Project Start ===== -->

            <div class="feature-project">
                <?php if (!empty($settings['project_img']['url'])) { ?>
                <div class="img-box">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['project_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($settings['project_img']['id'], '_wp_attachment_image_alt', true); ?>">
                </div>
                <?php } ?>
                <div class="feature-project-infos">
                    <?php if(!empty($settings['list1'])):
                        foreach ($settings['list1'] as $index => $settings_loop):?>
                    <div class="feature-project-info-box <?php echo esc_attr($settings_loop['info_class']); ?>">
                        <span class="title"><?php echo esc_html($settings_loop['info_title']); ?></span>
                        <span class="subtitle"><?php echo esc_html($settings_loop['info_content']); ?></span>
                    </div>
                    <?php endforeach; endif;?>

                    <div class="feature-project-info-box">
                        <?php if(!empty($settings['button_text'] )): ?>
                        <a <?php if($settings['button_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                        href="<?php echo esc_url($settings['button_link']['url']); ?>" class="theme-btn">
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
                        <?php endif;?>
                    </div>
                </div>

            </div>

        <!-- ===== Project End ===== -->
        <?php
    }

    public function content_template()
    {

    }

}