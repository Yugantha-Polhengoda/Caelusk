<?php

if (!class_exists('Redux'))
    {
    return;
    }
function newIconFont() 
    { 
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome-all.css' );
    }

add_action( 'redux/page/aixor_options/enqueue', 'newIconFont' );

$opt_name = "aixor_options";
$theme    = wp_get_theme();
$args = array(
    'opt_name' => $opt_name,
    'display_name' => $theme->get('Name') ,
    'display_version' => $theme->get('Version') ,
    'menu_type' => 'menu',
    'allow_sub_menu' => true,
    'menu_title'        => esc_html__( 'Aixor Options', 'aixor' ),
    'google_api_key' => '',
    'google_update_weekly' => false,
    'async_typography' => true,
    'admin_bar' => false,
    'admin_bar_icon' => '',
    'admin_bar_priority' => 50,
    'global_variable' => $opt_name,
    'dev_mode' => false,
    'update_notice' => false,
    'customizer' => false,
    'page_priority' => 3,
    'page_parent' => 'themes.php',
    'page_permissions' => 'manage_options',
    'menu_icon' => '',
    'last_tab' => '',
    'page_icon' => 'icon-themes',
    'page_slug' => 'themeoptions',
    'save_defaults' => true,
    'default_show' => false,
    'default_mark' => '',
    'show_import_export' => true
);
Redux::setArgs( $opt_name, $args );

//Preloader

Redux::setSection($opt_name, array(
    'title' => esc_html__('Set Preloader', 'aixor') ,
    'id' => esc_html__('main-preloader', 'aixor') ,
    'icon' => 'fa-solid fa-bars-progress',
    'fields' => array(

        array(
                'id'       => 'aixor_preloader_switcher_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"         => esc_html__( 'ON', 'aixor' ),
                    "2"         => esc_html__( 'OFF', 'aixor' ),
                ),
                'title'    => esc_html__( 'Preloader Options', 'aixor' ),
                'subtitle' => esc_html__( 'Select preloader to ON/OFF  Options.', 'aixor' ),
            ),

        array(
            'title'     => esc_html__( 'Preloader', 'aixor' ),
            'id'        => 'sec1',
            'type'      => 'section',
            'indent'    => true,
        ),

        array(
            'title'     => esc_html__( 'Preloader Video', 'aixor' ),
            'id'        => 'preloader_video',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/video/hero-video.mp4'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Logo Image', 'aixor' ),
            'id'        => 'preloader_img',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/aixor-big-logo.svg'
                ), 
            'indent'    => true
        ),
    )
));

//Blog-Page

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Page', 'aixor') ,
    'id' => esc_html__('blog-Page', 'aixor') ,
    'icon' => 'fa-solid fa-bars-progress',
    'fields' => array(

        array(
            'title'     => esc_html__( 'Breadcrumb Details', 'aixor' ),
            'id'        => 'blogsec1',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Content', 'aixor' ),
            'id'        => 'blogbanner_text',
            'default'   => esc_html__( '
                "At AIXOR, we hold that creativity sparks innovation. As a full-spectrum creative firm, we excel in converting ambitious ideas into engaging results."
                ', 'aixor' ),
            'type'      => 'textarea',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Name', 'aixor' ),
            'id'        => 'author_name',
            'type'      => 'text',
            'default'   => esc_html__( 'Ahshan M', 'aixor' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Designation', 'aixor' ),
            'id'        => 'author_designation',
            'type'      => 'text',
            'default'   => esc_html__( 'Chief Executive Officer', 'aixor' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Sub Title', 'aixor' ),
            'id'        => 'subtitle',
            'type'      => 'text',
            'default'   => esc_html__( 'AIXOR', 'aixor' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Text', 'aixor' ),
            'id'        => 'blogbutton_text',
            'type'      => 'text',
            'default'     => esc_html__("Let's Connect", "aixor"),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Link', 'aixor' ),
            'id'        => 'blogbutton_link',
            'type'      => 'text',
            'default'   => esc_html__( 'https://wpriverthemes.com/aixor/contact/', 'aixor' ),
            'indent'    => true
        ),

        array(
            'id'       => 'blogbuttonlink_newtab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Link to Open in new window', 'aixor' ),
        ),

        array(
            'title'     => esc_html__( 'Button Image', 'aixor' ),
            'id'        => 'blogbutton_img',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/btn-arrow.svg'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Image Info', 'aixor' ),
            'id'        => 'blogsec2',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Background Image', 'aixor' ),
            'id'        => 'blogbg_img',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/contact.png'
                ), 
            'indent'    => true
        ),

        array(
            'id'       => 'blogbgimg_on_off',
            'type'     => 'button_set',
            'default'  => '1',
            'options'  => array(
                "1"         => esc_html__( 'ON', 'aixor' ),
                "2"         => esc_html__( 'OFF', 'aixor' ),
            ),
            'title'    => esc_html__( 'Background Image ON/OFF', 'aixor' ),
        ),
    )
));

//404-Page

Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page', 'aixor') ,
    'id' => esc_html__('404-Page', 'aixor') ,
    'icon' => 'fa-solid fa-bars-progress',
    'fields' => array(

        array(
            'title'     => esc_html__( 'Breadcrumb Details', 'aixor' ),
            'id'        => 'sec1',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Title', 'aixor' ),
            'id'        => 'banner_text',
            'type'      => 'text',
            'default'   => wp_kses_post( '<span>Oops!</span> Page Not<br>Found (404)', 'aixor' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Content', 'aixor' ),
            'id'        => 'banner_content',
            'type'      => 'textarea',
            'default'   => wp_kses_post( "<span class='required'>*</span>We couldn't find the page you're looking for. This could be because the page has been moved or<br>deleted, you might have mistyped the URL, or the link you followed could be outdated.", 'aixor' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Text', 'aixor' ),
            'id'        => 'button_text',
            'type'      => 'text',
            'default'   => esc_html__( 'Back To Home', 'aixor' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Link', 'aixor' ),
            'id'        => 'button_link',
            'type'      => 'text',
            'default'   => esc_html__( 'https://wpriverthemes.com/aixor/contact/', 'aixor' ),
            'indent'    => true
        ),

        array(
            'id'       => 'buttonlink_newtab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Link to Open in new window', 'aixor' ),
        ),

        array(
            'title'     => esc_html__( 'Button Image', 'aixor' ),
            'id'        => 'button_img',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/btn-arrow.svg'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Image Info', 'aixor' ),
            'id'        => 'sec2',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Background Image', 'aixor' ),
            'id'        => 'bg_img',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/images/contact.png'
                ), 
            'indent'    => true
        ),

        array(
            'id'       => 'bgimg_on_off',
            'type'     => 'button_set',
            'default'  => '1',
            'options'  => array(
                "1"         => esc_html__( 'ON', 'aixor' ),
                "2"         => esc_html__( 'OFF', 'aixor' ),
            ),
            'title'    => esc_html__( 'Background Image ON/OFF', 'aixor' ),
        ),
    )
));

//404-Styling

Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page Styling', 'aixor') ,
    'id' => esc_html__('404-Page-style', 'aixor') ,
    'icon' => 'fa-solid fa-bars-progress',
    'sub-section' => 'true',
    'fields' => array(

        array( 
            'id'          => 'title-typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Title Font', 'aixor'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('.error-hero-sec .hero-bottom h2'),
            'units'       =>'px',
            'subtitle'    => esc_html__('specify the body font properties', 'aixor'),
            'default'     => array(
                'font-family' => 'Arapey', 
                'font-style' => 'italic',
                'google'      => true,
            ),
        ),

        array( 
            'id'          => 'titlespan-typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Title Span Font', 'aixor'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('.error-hero-sec .hero-bottom h2 span'),
            'units'       =>'px',
            'subtitle'    => esc_html__('specify the body font properties', 'aixor'),
            'default'     => array(
                'font-family' => 'Urbanist', 
                'google'      => true,
            ),
        ),

        array( 
            'id'          => 'content-typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Content Font', 'aixor'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('.error-hero-sec .hero-bottom p'),
            'units'       =>'px',
            'subtitle'    => esc_html__('specify the body font properties', 'aixor'),
            'default'     => array(
                'font-family' => 'Urbanist', 
                'font-style'  => 'italic',
                'font-weight' => '400', 
                'google'      => true,
            ),
        ),

        array( 
            'id'          => 'button-typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Button Font', 'aixor'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('.theme-btn'),
            'units'       =>'px',
            'subtitle'    => esc_html__('specify the body font properties', 'aixor'),
            'default'     => array(
                'font-family' => 'Urbanist', 
                'google'      => true,
            ),
        ),

        array(
            'title'        => esc_html__( 'Button Background', 'aixor' ),
            'id'           => 'btnbg',
            'type'         => 'color',
            'output'       => array(
                'background' => '.theme-btn'
            ),
            'validate'     => 'color',
        ),

         array( 
            'id'          => 'hoverbutton-typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Hover Button Font', 'aixor'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('.theme-btn:hover'),
            'units'       =>'px',
            'subtitle'    => esc_html__('specify the body font properties', 'aixor'),
            'default'     => array(
                'font-family' => 'Urbanist', 
                'google'      => true,
            ),
        ),

        array(
            'title'        => esc_html__( 'Hover Button Background', 'aixor' ),
            'id'           => 'hoverbtnbg',
            'type'         => 'color',
            'output'       => array(
                'background' => '.theme-btn:before'
            ),
            'validate'     => 'color',
        ),
    )
));

//Color

Redux::setSection($opt_name, array(
    'title' => esc_html__('Styling', 'aixor') ,
    'id' => esc_html__('aixor_color', 'aixor') ,
    'icon' => 'fas fa-edit',
    'fields' => array(

    array(
            'id'       => 'cursor_on_off',
            'type'     => 'button_set',
            'default'  => '1',
            'options'  => array(
                "1"         => esc_html__( 'ON', 'aixor' ),
                "2"         => esc_html__( 'OFF', 'aixor' ),
            ),
            'title'    => esc_html__( 'Magic Cursor ON/OFF', 'aixor' ),
        ),

    array(
            'title'     => esc_html__( 'Custom Color Option', 'aixor' ),
            'id'        => 'customcolors',
            'type'      => 'section',
            'indent'    => true,
        ),

    array(
            'title'     => esc_html__( 'Choose main theme color', 'aixor' ),
            'id'        => 'colorcode',
            'type'      => 'color',
            'default'  => '#000',
            'validate' => 'color',
            'transparent' => false,
        ),

    array(
            'title'     => esc_html__( 'Custom Text Color', 'aixor' ),
            'id'        => 'customtextdark',
            'type'      => 'section',
            'indent'    => true,
        ),

    array(
            'title'     => esc_html__( 'Primary Text Color', 'aixor' ),
            'id'        => 'colorcode1',
            'type'      => 'color',
            'default'   => '#ffffff',
            'validate'  => 'color',
            'transparent' => false,
        ),

    array(
            'title'     => esc_html__( 'Secondary Text Color', 'aixor' ),
            'id'        => 'colorcode2',
            'type'      => 'color',
            'default'   => '#999999',
            'validate'  => 'color',
            'transparent' => false,
        ),

    array(
            'title'     => esc_html__( 'Tertiary Text Color', 'aixor' ),
            'id'        => 'colorcode3',
            'type'      => 'color',
            'default'   => '#666666',
            'validate'  => 'color',
            'transparent' => false,
        ),

   
    )
));
