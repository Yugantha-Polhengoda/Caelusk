<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;


class aixorOurPartner extends Widget_Base
{
    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'aixor-our-partner';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Our Partner', 'aixor-core');
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
            'partner_section',
            [
                'label' => esc_html__('Our Partner', 'aixor-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        // repeater start
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'partner_image', [
                'label'   => __('Partner Image', 'aixor-core'),
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
            'partner_name', [
                'label'       => __('Partner Name', 'aixor-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Javast', 'aixor-core'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'partner_list',
            [
                'label'       => __('Partners', 'aixor-core'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'partner_name' => __('Javast', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('CSS.IO', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('CSS.IO', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Stripe', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Digitek', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Bits', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Javast', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('CSS.IO', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('CSS.IO', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Stripe', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Digitek', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Bits', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Javast', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('CSS.IO', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('CSS.IO', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Stripe', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Digitek', 'aixor-core'),
                    ],
                    [
                        'partner_name' => __('Bits', 'aixor-core'),
                    ]
                ],
                'title_field' => '{{{ partner_name }}}',
            ]
        );
        // repeater end

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

        <div class="our-partner-sec">
            <?php if ($settings['partner_list']) { ?>
                <ul>
                    <?php foreach ($settings['partner_list'] as $partner) { ?>
                        <li><img src="<?php echo esc_url($partner['partner_image']['url']) ?>"
                                 alt="<?php echo esc_html($partner['partner_name']); ?>"></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>

        <?php
    }

    public function content_template()
    {

    }

}