<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;

class aixorHomeFooter extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-home-footer';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Footer', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-footer';
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
        return ['aixor', 'home', 'footer'];
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
                'label' => esc_html__('Footer Top Section', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Company Info', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'compheading', [
                'label'         => esc_html__( 'Heading', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'comptitle', [
                'label'         => esc_html__( 'Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'compicon_icon_type',
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

        $repeater->add_control(
            'compicon_icon',
            [
                'label' => esc_html__('Icon', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'iconoir-arrow-up-right',
                'description' => sprintf(
                    esc_html__('Paste Iconoir Icon Class. For more icons, visit %s.', 'aixor-core'),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'
                ),
                'condition' => [
                    'compicon_icon_type' => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'compicon_icon_svg_upload',
            [
                'label' => esc_html__('Upload SVG', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'description' => esc_html__('Upload an SVG file.', 'aixor-core'),
                'condition' => [
                    'compicon_icon_type' => 'svg_upload',
                ],
            ]
        );

        // LINK
        $repeater->add_control(
            'comptitle_link',
            [
                'label'         => esc_html__( 'Title Link', 'aixor-core' ),
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
                'title_field' => '{{{ comptitle }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'copyright', [
                'label'         => esc_html__( 'Copyright Text', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Contact Info', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'contheading', [
                'label'         => esc_html__( 'Heading', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contnumber', [
                'label'         => esc_html__( 'Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'contnumber_link',
            [
                'label'         => esc_html__( 'Title Link', 'aixor-core' ),
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
            'conttext_animation', [
                'label'         => esc_html__( 'Text Animation', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => [
                    'None'  => esc_html__('None', 'aixor-core'),
                    'slide-up' => esc_html__('slide-up', 'aixor-core'),
                    'slide-right' => esc_html__('slide-right', 'aixor-core'),
                    'slide-down' => esc_html__('slide-down', 'aixor-core'),
                    'slide-left' => esc_html__('slide-left', 'aixor-core'),
                    // Add more options here if needed
                ],
                'default'       => 'slide-up', // Set default value to 'none'
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Contact List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ contnumber }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'btn_text', [
                'label'         => esc_html__( 'Button', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'button_icon_type',
            [
                'label' => esc_html__('Icon Type', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon1' => esc_html__('Icon Class', 'aixor-core'),
                    'svg_upload1' => esc_html__('Upload SVG', 'aixor-core'),
                ],
                'default' => 'svg_upload1',
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
                    'button_icon_type' => 'icon1',
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
                    'button_icon_type' => 'svg_upload1',
                ],
            ]
        );

        // LINK
        $this->add_control(
            'btntext_link',
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Social Info', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'socheading', [
                'label'         => esc_html__( 'Heading', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'soctitle', [
                'label'         => esc_html__( 'Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'socicon_type',
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

        $repeater->add_control(
            'socicon',
            [
                'label' => esc_html__('Icon', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'iconoir-arrow-up-right',
                'description' => sprintf(
                    esc_html__('Paste Iconoir Icon Class. For more icons, visit %s.', 'aixor-core'),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'
                ),
                'condition' => [
                    'socicon_type' => 'icon2',
                ],
            ]
        );

        $repeater->add_control(
            'socicon_svg_upload',
            [
                'label' => esc_html__('Upload SVG', 'aixor-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'description' => esc_html__('Upload an SVG file.', 'aixor-core'),
                'condition' => [
                    'socicon_type' => 'svg_upload2',
                ],
            ]
        );

        // LINK
        $repeater->add_control(
            'soctitle_link',
            [
                'label'         => esc_html__( 'Title Link', 'aixor-core' ),
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
            'list3', //repeater name
            [
                'label'     => esc_html__( 'Info List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ soctitle }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'country', [
                'label'         => esc_html__( 'Country Text', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'footerbottom_section',
            [
                'label' => esc_html__('Footer Bottom Section', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_11',
            [
               'label' => esc_html__( 'Logo Info', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'logo_img',
            [
                'label'     => esc_html__( 'Footer Logo Image', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        $this->add_control(
            'logo_animation', [
                'label'         => esc_html__( 'Image Animation Effect', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => [
                    'None'  => esc_html__('None', 'aixor-core'),
                    'slide-up' => esc_html__('slide-up', 'aixor-core'),
                    'slide-right' => esc_html__('slide-right', 'aixor-core'),
                    'slide-down' => esc_html__('slide-down', 'aixor-core'),
                    'slide-left' => esc_html__('slide-left', 'aixor-core'),
                    // Add more options here if needed
                ],
                'default'       => 'slide-up', // Set default value to 'none'
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        
        /*-----------------------------------------Footer section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'header_section_style',
            [
                'label' => esc_html__('Footer Content Style', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'header_section_tabs'
        );

        $this->start_controls_tab(
            'footer_section_heading_tab',
            [
               'label' => esc_html__( 'Heading', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-widget h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .footer-widget h4',
            ]
        );
        $this->add_responsive_control(
            'heading_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .footer-widget h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'heading_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .footer-widget h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'footer_section_title_tab',
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
                    '{{WRAPPER}} .footer-link ul li a,
                    .footer-contact-infos .footer-widget-top a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .footer-link ul li a,
                .footer-contact-infos .footer-widget-top a',
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .footer-link ul li a,
                    .footer-contact-infos .footer-widget-top a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-link ul li a,
                    .footer-contact-infos .footer-widget-top a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'footer_section_copyright_tab',
            [
               'label' => esc_html__( 'Copyright', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'copyright_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-widget .copyright' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'copyright_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .footer-widget .copyright',
            ]
        );
        $this->add_responsive_control(
            'copyright_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .footer-widget .copyright' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'copyright_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .footer-widget .copyright' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->start_controls_tabs(
        'footer_contact_tabs'
        );

        $this->start_controls_tab(
            'footer_contact_btn_tab',
            [
               'label' => esc_html__( 'Button', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btnbg_color',
            [
                'label'     => esc_html__('Background Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btn' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btnhover_color',
            [
                'label'     => esc_html__('Hover Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btnbghover_color',
            [
                'label'     => esc_html__('Hover BG Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btn:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .theme-btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .theme-btn',
            ]
        );
        $this->add_responsive_control(
            'btn_margin',
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
            'btn_padding',
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
        <!-- ===== Footer Start ===== -->
    <footer class="footer-area">

        <div class="footer-top">
            <div class="row">

                <div class="col-md-3">
                    <div class="footer-widget footer-link">
                        <div class="footer-widget-top">
                            <h4><?php echo esc_html($settings['compheading']); ?></h4>
                            <ul>
                                <?php if(!empty($settings['list1'])):
                                    foreach ($settings['list1'] as $index => $settings_loop):?>
                                <li><a <?php if($settings_loop['comptitle_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                                class="with-border" href="<?php echo esc_url($settings_loop['comptitle_link']['url']); ?>">
                                <?php
                                if ($settings_loop['compicon_icon_type'] === 'icon') {
                                    // Render the icon class
                                    echo '<i class="' . esc_attr($settings_loop['compicon_icon']) . '"></i>';
                                } elseif ($settings_loop['compicon_icon_type'] === 'svg_upload') {
                                    // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                                    echo '<img src="' . esc_url(wp_get_attachment_image_url($settings_loop['compicon_icon_svg_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($settings_loop['compicon_icon_svg_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                                }
                                ?>
                             <?php echo esc_html($settings_loop['comptitle']); ?></a>
                                </li>
                                <?php endforeach; endif;?>
                            </ul>
                        </div>
                        <div class="copyright">
                            <?php echo esc_html($settings['copyright']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget footer-link">
                        <div class="footer-contact-infos">
                            <div class="footer-widget-top">
                                <h4><?php echo esc_html($settings['contheading']); ?></h4>
                                <div class="links">
                                    <?php if(!empty($settings['list2'])):
                                    foreach ($settings['list2'] as $index => $settingscont_loop):?>
                                    <div class="split-text-anim">
                                        <a data-aos="<?php echo esc_attr($settingscont_loop['conttext_animation']); ?>" href="<?php echo esc_url($settingscont_loop['contnumber_link']['url']); ?>" class="with-border"><?php echo esc_html($settingscont_loop['contnumber']); ?></a>
                                    </div>
                                    <?php endforeach; endif;?>
                                </div>
                            </div>
                            <?php if(!empty($settings['btn_text'] )): ?>
                            <a <?php if($settings['btntext_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                            href="<?php echo esc_url($settings['btntext_link']['url']); ?>" class="theme-btn">
                                <?php echo esc_html($settings['btn_text']); ?> 
                                <?php
                            if ($settings['button_icon_type'] === 'icon1') {
                                // Render the icon class
                                echo '<i class="' . esc_attr($settings['button_icon']) . '"></i>';
                            } elseif ($settings['button_icon_type'] === 'svg_upload1') {
                                // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                                echo '<img src="' . esc_url(wp_get_attachment_image_url($settings['button_icon_svg_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($settings['button_icon_svg_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                            }
                            ?>
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget footer-link">
                        <div class="footer-widget-top">
                            <h4><?php echo esc_html($settings['socheading']); ?></h4>
                            <ul>
                                <?php if(!empty($settings['list3'])):
                                    foreach ($settings['list3'] as $index => $settingssoc_loop):?>
                                <li><a <?php if($settingssoc_loop['soctitle_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                                class="with-border" href="<?php echo esc_url($settingssoc_loop['soctitle_link']['url']); ?>">
                                <?php
                                if ($settingssoc_loop['socicon_type'] === 'icon2') {
                                    // Render the icon class
                                    echo '<i class="' . esc_attr($settingssoc_loop['socicon']) . '"></i>';
                                } elseif ($settingssoc_loop['socicon_type'] === 'svg_upload2') {
                                    // Render the uploaded SVG/image with wp_get_attachment_image_url and alt text
                                    echo '<img src="' . esc_url(wp_get_attachment_image_url($settingssoc_loop['socicon_svg_upload']['id'], 'full')) . '" alt="' . esc_attr(get_post_meta($settingssoc_loop['socicon_svg_upload']['id'], '_wp_attachment_image_alt', true)) . '">';
                                }
                                ?>
                                <?php echo esc_html($settingssoc_loop['soctitle']); ?></a>
                                </li>
                                <?php endforeach; endif;?>
                            </ul>
                        </div>
                        <div class="copyright">
                            <?php echo esc_html($settings['country']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="split-text-anim">
                <img data-aos="<?php echo esc_attr($settings['logo_animation']); ?>" src="<?php echo esc_url(wp_get_attachment_image_url( $settings['logo_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($settings['logo_img']['id'], '_wp_attachment_image_alt', true); ?>">
            </div>
        </div>

    </footer>
    <!-- ===== Footer End ===== -->
        <?php
    }

    public function content_template()
    {

    }

}