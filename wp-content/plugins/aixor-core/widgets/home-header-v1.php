<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;

class aixorHomeHeaderV1 extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-home-headerv1';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Header V1', 'aixor-core');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-header';
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
        return ['aixor', 'home', 'headerv1'];
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
               'label' => esc_html__( 'Logo Info', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'header_logo',
            [
                'label'     => esc_html__( 'Header Logo Image', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        // LINK
        $this->add_control(
            'headerlink_logo',
            [
                'label'         => esc_html__( 'Header Logo Link', 'aixor-core' ),
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
               'label' => esc_html__( 'Contact Info', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'number',
            [
                'label'       => esc_html__('Phone Number', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('(+84) 0123456789', 'aixor-core'),
            ]
        );

        // LINK
        $this->add_control(
            'number_link',
            [
                'label'         => esc_html__( 'Number Link', 'aixor-core' ),
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
            'mail_icon',
            [
                'label'         => esc_html__( 'Mail Icon Class','aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'aixor-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'mail_link',
            [
                'label'         => esc_html__( 'Mail Link', 'aixor-core' ),
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

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'menustyle1_section',
            [
                'label' => esc_html__('Menu Style One', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'menu_title', [
                'label'         => esc_html__( 'Menu Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'menu_link',
            [
                'label'         => esc_html__( 'Menu Title Link', 'aixor-core' ),
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
            'menu_badge', [
                'label'         => esc_html__( 'Menu Badge', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Menu List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ menu_title }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'menu1_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Menu Controls', 'aixor-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'aixor-core' ),
                'label_off'     => __( 'Hide', 'aixor-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'menustyle2_section',
            [
                'label' => esc_html__('Menu Style Two', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'menu_title2', [
                'label'         => esc_html__( 'Menu Title', 'aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list3', //repeater name
            [
                'label'     => esc_html__( 'Drop-Down Menu List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ menu_title2 }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'menu2_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Menu Controls', 'aixor-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'aixor-core' ),
                'label_off'     => __( 'Hide', 'aixor-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'hamburger_section',
            [
                'label' => esc_html__('Hamburger Content', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sidebar_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Hamburger Controls', 'aixor-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'aixor-core' ),
                'label_off'     => __( 'Hide', 'aixor-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
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
            'designation',
            [
                'label'       => esc_html__('Title 1', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Based in Hanoi,', 'aixor-core'),
            ]
        );

        $this->add_control(
            'email_text',
            [
                'label'       => esc_html__('Email Text', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('E: MindBlowingArt2692@gmail.com', 'aixor-core'),
            ]
        );

        // LINK
        $this->add_control(
            'email_link',
            [
                'label'         => esc_html__( 'Email Link', 'aixor-core' ),
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
            'name',
            [
                'label'       => esc_html__('Title 2', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('VietNam', 'aixor-core'),
            ]
        );

        $this->add_control(
            'number_text',
            [
                'label'       => esc_html__('Number Text', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('(+84) 0123456789', 'aixor-core'),
            ]
        );

        // LINK
        $this->add_control(
            'numbertext_link',
            [
                'label'         => esc_html__( 'Number Link', 'aixor-core' ),
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
            'style_normal_tab_12',
            [
               'label' => esc_html__( 'Tab 2', 'aixor-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 
            'soc_icon',
            [
                'label'         => esc_html__( 'Icon Class','aixor-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'aixor-core' ),
                    '<a href="https://icons8.com/line-awesome" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'socico_link',
            [
                'label'         => esc_html__( 'Icon Link', 'aixor-core' ),
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
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Icon List', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'aixor-core' ),
                    ],
                ],
                'title_field' => '{{{ soc_icon }}}', // Reapeter Title 
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
            'sidebar_img',
            [
                'label'     => esc_html__( 'Sidebar Background Image', 'aixor-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'sidebar_img_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Image Controls', 'aixor-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'aixor-core' ),
                'label_off'     => __( 'Hide', 'aixor-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
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
                'label' => esc_html__('Header Content Style', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'header_section_tabs'
        );

        $this->start_controls_tab(
            'header_section_menu_tab',
            [
               'label' => esc_html__( 'Menu Info', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'menu_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-menu-wrap .navbar .menu li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'menuhover_color',
            [
                'label'     => esc_html__('Hover Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-menu-wrap .navbar .menu li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'menu_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .header-menu-wrap .navbar .menu li a',
            ]
        );
        $this->add_responsive_control(
            'menu_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-menu-wrap .navbar .menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-menu-wrap .navbar .menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_section_info_tab',
            [
               'label' => esc_html__( 'Contact Info', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'contact_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-menu-wrap .header-right-info a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'contact_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .header-menu-wrap .header-right-info a',
            ]
        );
        $this->add_responsive_control(
            'contact_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-menu-wrap .header-right-info a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-menu-wrap .header-right-info a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'header_hamburger_style',
            [
                'label' => esc_html__('Hamburger Content Style', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'header_hamburger_tabs'
        );

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
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-top ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-top ul li',
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-top ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-top ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_hamburger_titlelink_tab',
            [
               'label' => esc_html__( 'Link', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'titlelink_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-top ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'titlelink_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-top ul li a',
            ]
        );
        $this->add_responsive_control(
            'titlelink_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-top ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'titlelink_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-top ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_hamburger_menu_tab',
            [
               'label' => esc_html__( 'Menu', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'hamburgermenu_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .sidebar-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hamburgermenuhover_color',
            [
                'label'     => esc_html__('Hover Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .sidebar-menu ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'hamburgermenu_typography',
                'label'    => esc_html__('Typography', 'aixor-core'),
                'selector' => '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .sidebar-menu ul li a',
            ]
        );
        $this->add_responsive_control(
            'hamburgermenu_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .sidebar-menu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'hamburgermenu_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .sidebar-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_hamburger_icon_tab',
            [
               'label' => esc_html__( 'Icon', 'aixor-core' ),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-bottom ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hovericon_color',
            [
                'label'     => esc_html__('Hover Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-bottom ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hovericon_bg',
            [
                'label'     => esc_html__('Hover BG Color', 'aixor-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-bottom ul li a:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'icon_margin',
            [
                'label'         => __( 'Margin', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-bottom ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label'         => __( 'Padding', 'aixor-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .header-sidebar-wrap .header-sidebar-content .header-sidebar-bottom ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <?php if ($settings['sidebar_switcher_options'] === 'yes') : ?>
        <div class="scroll-to-show-menu">
            <span class="hamburg-menu">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
        <div class="header-sidebar-wrap">
            <div class="header-sidebar-content">
                <span class="close-header-sidebar"><i class="las la-times"></i></span>
                <?php if ($settings['sidebar_img_switcher_options'] === 'yes') : ?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['sidebar_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($settings['sidebar_img']['id'], '_wp_attachment_image_alt', true); ?>" class="sidebar-shape">
                <?php endif; ?>
                <div class="header-sidebar-top">
                    <ul>
                        <li><span><?php echo esc_html($settings['designation']); ?></span> <a <?php if($settings['email_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                        href="<?php echo esc_url($settings['email_link']['url']); ?>"><?php echo esc_html($settings['email_text']); ?></a></li>
                        <li><span><?php echo esc_html($settings['name']); ?></span> <a <?php if($settings['numbertext_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                        href="<?php echo esc_url($settings['numbertext_link']['url']); ?>"><?php echo esc_html($settings['number_text']); ?></a></li>
                    </ul>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'sidebar-menu',
                    'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'nav',
                    'container_class' => 'sidebar-menu',
                    'menu_class'      => 'menu',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>',
                    'walker'          => new aixor_Bootstrap_Navwalker(),
                ));
                ?>
                <div class="header-sidebar-bottom">
                    <ul>
                        <?php if(!empty($settings['list2'])):
                            foreach ($settings['list2'] as $index => $settingsicon_loop):?>
                        <?php if(!empty($settingsicon_loop['soc_icon'] )): ?>
                        <li><a <?php if($settingsicon_loop['socico_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                        href="<?php echo esc_url($settingsicon_loop['socico_link']['url']); ?>"><i class="<?php echo esc_attr($settingsicon_loop['soc_icon']); ?>"></i></a></li>
                        <?php endif;?>
                        <?php endforeach; endif;?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- ===== Header Sidebar End ===== -->

        <!-- ===== Menu Start ===== -->
        <header class="header-menu-wrap">
            <div class="custom-container">
                <div class="custom-row">
                    <a <?php if($settings['headerlink_logo']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                    href="<?php echo esc_url($settings['headerlink_logo']['url']); ?>" class="logo">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['header_logo']['id'], 'full' ));?>" alt="<?php echo get_post_meta($settings['header_logo']['id'], '_wp_attachment_image_alt', true); ?>">
                    </a>
                    <nav class="navbar">
                        <ul class="menu">
                            <?php if ($settings['menu1_switcher_options'] === 'yes') : ?>
                            <?php if(!empty($settings['list1'])):
                                foreach ($settings['list1'] as $index => $settings_loop):?>
                            <li><a <?php if($settings_loop['menu_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                            href="<?php echo esc_url($settings_loop['menu_link']['url']); ?>"><?php echo esc_html($settings_loop['menu_title']); ?> <span><?php echo esc_html($settings_loop['menu_badge']); ?></span></a>
                            </li>
                            <?php endforeach; endif;?>
                            <?php endif;?>

                            <?php if ($settings['menu2_switcher_options'] === 'yes') : ?>
                            <?php if(!empty($settings['list3'])):
                                foreach ($settings['list3'] as $index => $settings2_loop):?>
                            <li class="dropdown-menu-item">
                                <a href="#"><?php echo esc_html($settings2_loop['menu_title2']); ?> <i class="las la-angle-down"></i></a>
                                <?php
                                    wp_nav_menu(array(
                                        'theme_location'  => 'dropdown-menu',
                                        'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                                        'container'       => 'ul',
                                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                        'items_wrap'      => '<ul data-in="#" data-out="#" class="dropdown-list %2$s" id="%1$s">%3$s</ul>',
                                        'walker'          => new aixor_Bootstrap_Navwalker(),
                                    ));
                                ?>
                            </li>
                            <?php endforeach; endif;?>
                            <?php endif;?>
                        </ul>
                    </nav>
                    <div class="header-right-info">
                        <a <?php if($settings['number_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                        class="with-border" href="<?php echo esc_url($settings['number_link']['url']); ?>">
                            <?php echo esc_html($settings['number']); ?>
                        </a>
                        
                        <a <?php if($settings['mail_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                        href="<?php echo esc_url($settings['mail_link']['url']); ?>">
                           <i class="<?php echo esc_attr($settings['mail_icon']); ?>"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- ===== Menu End ===== -->
        <?php
    }

    public function content_template()
    {

    }

}