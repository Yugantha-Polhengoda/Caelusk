<?php
/**
 * aixor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aixor
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!defined('ALLOW_UNFILTERED_UPLOADS')) {
    define('ALLOW_UNFILTERED_UPLOADS', true);
}

/**
 * Required Files
 */

require_once get_template_directory() . '/inc/redux/config.php';
require_once get_template_directory() . '/inc/redux/color.php';
/*TGM PLUGIN*/
// require_once get_template_directory() . '/tgm-plugin/recommend_plugins.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aixor_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on aixor, use a find and replace
        * to change 'aixor' to the name of your theme in all the template files.
        */
    load_theme_textdomain('aixor', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');
    add_image_size('aixor-blog', 753, 262, false);
    add_image_size('aixor-blog-standard', 753, 400, false);

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'main-menu'    => esc_html__('Main Menu', 'aixor'),
            'sidebar-menu' => esc_html__('Sidebar Menu', 'aixor'),
            'dropdown-menu' => esc_html__('DropDown Menu', 'aixor'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'aixor_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'aixor_setup');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aixor_content_width()
{
    $GLOBALS['content_width'] = apply_filters('aixor_content_width', 640);
}

add_action('after_setup_theme', 'aixor_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aixor_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'aixor'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'aixor'),
            'before_widget' => '<div id="%1$s" class="sidebar-widget sidebar-widget-recent-post %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
}

add_action('widgets_init', 'aixor_widgets_init');

/**
 * Register and Enqueue Styles.
 */

function aixor_register_styles()
{

    wp_enqueue_style('line-awesome', get_template_directory_uri() . '/assets/css/line-awesome.min.css');
    wp_enqueue_style('iconoir', get_template_directory_uri() . '/assets/css/iconoir.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css');

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css');
    wp_enqueue_style('aos', get_template_directory_uri() . '/assets/css/aos.css');

    wp_enqueue_style('aixor-main-style', get_template_directory_uri() . '/assets/css/style.css');

    wp_enqueue_style('aixor-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('aixor-style', 'rtl', 'replace');

    wp_enqueue_style('aixor-unit', get_template_directory_uri() . '/assets/css/aixor-unit-test.css');

    if (!is_admin()) {
        wp_enqueue_style('aixor-fonts', 'https://fonts.googleapis.com/css2?family=Arapey:ital@0;1&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap', array(), '1.0.0', 'all');
    }

    wp_enqueue_style('aixor-responsive', get_template_directory_uri() . '/assets/css/responsive.css');

    wp_enqueue_script('aixor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'aixor_register_styles');

/**
 * Register and Enqueue Scripts.
 */

function aixor_register_scripts()
{

    wp_enqueue_script(
        'bootstrap-bundle-min',
        get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        array('jquery'),
        '',
        true
    );

    wp_enqueue_script(
        'lib-gsap',
        get_template_directory_uri() . '/assets/js/gsap.min.js',
        array('jquery'),
        '3.12.5',
        true
    );

    wp_enqueue_script(
        'lib-ScrollTrigger-min',
        get_template_directory_uri() . '/assets/js/ScrollTrigger.min.js',
        array('jquery', 'lib-gsap'),
        '3.12.5',
        true
    );

//    wp_enqueue_script(
//        'lib-ScrollToPlugin-min',
//        get_template_directory_uri() . '/assets/js/ScrollToPlugin.min.js',
//        array( 'jquery', 'lib-gsap', 'lib-ScrollTrigger-min' ),
//        '3.12.5',
//        true
//    );

//    wp_enqueue_script(
//        'lib-ScrollSmoother-min',
//        get_template_directory_uri() . '/assets/js/ScrollSmoother.min.js',
//        array( 'jquery', 'lib-gsap', 'lib-ScrollTrigger-min', 'lib-ScrollToPlugin-min' ),
//        '3.12.5',
//        true
//    );

    wp_enqueue_script(
        'split-type',
        get_template_directory_uri() . '/assets/js/split-type.min.js',
        array('jquery'),
        '0.3.4',
        true
    );
//    wp_enqueue_script(
//        'lib-SplitText-min',
//        get_template_directory_uri() . '/assets/js/SplitText.min.js',
//        array( 'jquery', 'lib-gsap', 'lib-ScrollTrigger-min', 'lib-ScrollToPlugin-min', 'lib-ScrollSmoother-min' ),
//        '3.12.5',
//        true
//    );

    wp_enqueue_script(
        'lib-aos',
        get_template_directory_uri() . '/assets/js/aos.js',
        array('jquery'),
        '',
        true
    );

    wp_enqueue_script(
        'jarallax',
        get_template_directory_uri() . '/assets/js/jarallax.js',
        array('jquery'),
        '',
        true
    );

    wp_enqueue_script(
        'jarallax-element-min',
        get_template_directory_uri() . '/assets/js/jarallax-element.min.js',
        array('jquery'),
        '',
        true
    );
    wp_enqueue_script(
        'aixor-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        time(),
        true
    );

}

add_action('wp_enqueue_scripts', 'aixor_register_scripts');


// Aixor Pagination Display

function aixor_pagination()
{

    global $wp_query;

    if ($wp_query->max_num_pages <= 1) return;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(array(
        'prev_text' => wp_specialchars_decode('<i class="las la-angle-left"></i>', ENT_QUOTES),
        'next_text' => wp_specialchars_decode('<i class="las la-angle-right"></i>', ENT_QUOTES),
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
    ));
    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<nav aria-label="navigation"><ul class="pagination">';
        foreach ($pages as $page) {
            echo "<li class='page-item'>$page</li>";
        }
        echo '</ul></nav>';
        wp_link_pages($args);
    }
}


// Aixor Category
function aixor_category()
{
    $categories = get_the_category();
    $separator = ' ';
    $output = '';
    if ($categories) {
        foreach ($categories as $category) {
            $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
        }
        echo trim($output, $separator);
    }
}


// Aixor Comments Display
function aixor_theme_comment($comment, $args, $depth)
{
    //echo 's';
    $GLOBALS['comment'] = $comment;
    $gravatar = get_avatar($comment, $size = '100'); ?>
    <div class="comment-box">
        <?php echo get_avatar($comment, $size = '80'); ?>
        <div class="comment-body">
            <span class="name"><?php printf(get_comment_author()) ?></span>
            <span class="date"><?php the_time('F j, Y'); ?></span>
            <p><?php comment_text() ?></p>
            <?php
            $reply_link = get_comment_reply_link(
                array_merge(
                    $args,
                    array(
                        'reply_text' => 'REPLY',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                    )
                )
            );

            if ($reply_link) : ?>
                <span class="reply-btn theme-btn">
                    <?php echo $reply_link; ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/reply-icon.svg'); ?>" alt="Icon">
                </span>
            <?php endif; ?>
        </div>
    </div>

    <?php
}

// Aixor Recommended Plugins

// Load required file for plugin management functions
require_once ABSPATH . 'wp-admin/includes/plugin.php';

/**
 * Handle bulk plugin install and activation if form is submitted
 */
function aixor_handle_bulk_install_and_activate() {
    if (isset($_POST['bulk_install_plugins'])) {
        // Ensure nonce is valid
        check_admin_referer('aixor_bulk_install');

        $plugins = array(
            array(
                'name'      => esc_html__('Contact Form 7', 'aixor'),
                'slug'      => 'contact-form-7',
                'required'  => true,
                'main_file' => 'contact-form-7/wp-contact-form-7.php' // Ensure this is the correct main file for the plugin
            ),
            array(
                'name'      => 'Elementor Website Builder',
                'slug'      => 'elementor',
                'required'  => true,
                'main_file' => 'elementor/elementor.php' // Ensure this is the correct main file for the plugin
            ),
            array(
                'name'      => esc_html__('One Click Demo Import', 'aixor'),
                'slug'      => 'one-click-demo-import',
                'required'  => true,
                'main_file' => 'one-click-demo-import/one-click-demo-import.php' // Ensure this is the correct main file for the plugin
            ),
            array(
                'name'      => esc_html__('Redux Framework', 'aixor'),
                'slug'      => 'redux-framework',
                'required'  => true,
                'main_file' => 'redux-framework/redux-framework.php' // Ensure this is the correct main file for the plugin
            ),
            array(
                'name'      => esc_html__( 'Elementor Header & Footer Builder', 'aixor' ),
                'slug'      => 'header-footer-elementor',
                'required'  => true,
                'main_file' => 'header-footer-elementor/header-footer-elementor.php'
            ),
            array(
                 'name'      => esc_html__('Aixor Core', 'aixor'),
                 'slug'      => 'aixor-core',
                 'source'    => get_template_directory() . '/tgm-plugin/plugins/aixor-core.zip',
                 'version'   => '2.0.0',
                 'required'  => true,
                     'main_file' => 'aixor-core/aixor-core.php' 
            ),

            array(
                'name'      => esc_html__('Safe SVG', 'aixor'),
                'slug'      => 'safe-svg',
                'required'  => true,
                'main_file' => 'safe-svg/safe-svg.php' // Ensure this is the correct main file for the plugin
            ),
            array(
                'name'      => esc_html__('Classic Editor', 'aixor'),
                'slug'      => 'classic-editor',
                'required'  => true,
                'main_file' => 'classic-editor/classic-editor.php' // Ensure this is the correct main file for the plugin
            ),
        );

        $plugins_to_install = array();
        $plugins_to_activate = array();
        $active_plugins = get_option('active_plugins', array());

        foreach ($plugins as $plugin) {
            $plugin_file = $plugin['main_file'];
            if (!file_exists(WP_PLUGIN_DIR . '/' . $plugin_file)) {
                $plugins_to_install[] = $plugin;
            } elseif (!in_array($plugin_file, $active_plugins)) {
                $plugins_to_activate[] = $plugin_file;
            }
        }

        if (!empty($plugins_to_install)) {
            include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

            $skin = new Automatic_Upgrader_Skin();
            $upgrader = new Plugin_Upgrader($skin);

            foreach ($plugins_to_install as $plugin) {
                $source = isset($plugin['source']) ? $plugin['source'] : 'https://downloads.wordpress.org/plugin/' . $plugin['slug'] . '.zip';
                $result = $upgrader->install($source);

                if (is_wp_error($result)) {
                    // Handle error
                    echo '<div class="notice notice-error"><p>' . esc_html__('Failed to install plugin: ', 'aixor') . esc_html($plugin['name']) . '</p></div>';
                }
            }
        }

        if (!empty($plugins_to_activate)) {
            foreach ($plugins_to_activate as $plugin) {
                $result = activate_plugin($plugin);

                if (is_wp_error($result)) {
                    // Handle error
                    echo '<div class="notice notice-error"><p>' . esc_html__('Failed to activate plugin: ', 'aixor') . esc_html($plugin) . '</p></div>';
                }
            }
        }

        wp_redirect(admin_url('plugins.php'));
        exit;
    }
}
add_action('admin_init', 'aixor_handle_bulk_install_and_activate');

/**
 * Register recommended plugins and provide bulk install option.
 */
function aixor_register_recommended_plugins() {
    $plugins = array(
        array(
            'name'      => esc_html__('Contact Form 7', 'aixor'),
            'slug'      => 'contact-form-7',
            'required'  => true,
            'main_file' => 'contact-form-7/wp-contact-form-7.php' // Ensure this is the correct main file for the plugin
        ),
        array(
            'name'      => 'Elementor Website Builder',
            'slug'      => 'elementor',
            'required'  => true,
            'main_file' => 'elementor/elementor.php' // Ensure this is the correct main file for the plugin
        ),
        array(
                'name'      => esc_html__( 'Elementor Header & Footer Builder', 'aixor' ),
                'slug'      => 'header-footer-elementor',
                'required'  => true,
                'main_file' => 'header-footer-elementor/header-footer-elementor.php'
            ),
        array(
            'name'      => esc_html__('One Click Demo Import', 'aixor'),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
            'main_file' => 'one-click-demo-import/one-click-demo-import.php' // Ensure this is the correct main file for the plugin
        ),
        array(
            'name'      => esc_html__('Redux Framework', 'aixor'),
            'slug'      => 'redux-framework',
            'required'  => true,
            'main_file' => 'redux-framework/redux-framework.php' // Ensure this is the correct main file for the plugin
        ),
        array(
                 'name'      => esc_html__('Aixor Core', 'aixor'),
                 'slug'      => 'aixor-core',
                 'source'    => get_template_directory() . '/tgm-plugin/plugins/aixor-core.zip',
                 'version'   => '2.0.0',
                 'required'  => true,
                     'main_file' => 'aixor-core/aixor-core.php' 
            ),

        array(
            'name'      => esc_html__('Safe SVG', 'aixor'),
            'slug'      => 'safe-svg',
            'required'  => true,
            'main_file' => 'safe-svg/safe-svg.php' // Ensure this is the correct main file for the plugin
        ),
        array(
            'name'      => esc_html__('Classic Editor', 'aixor'),
            'slug'      => 'classic-editor',
            'required'  => true,
            'main_file' => 'classic-editor/classic-editor.php' // Ensure this is the correct main file for the plugin
        ),
    );

    echo '<div class="wrap">';
    $missing_plugins = false;

    foreach ($plugins as $plugin) {
        $plugin_file = $plugin['main_file'];
        $plugin_name = $plugin['name'];

        // Check if plugin is active
        if (!in_array($plugin_file, get_option('active_plugins', array()))) {
            $missing_plugins = true;
            if (!file_exists(WP_PLUGIN_DIR . '/' . $plugin_file)) {
                echo '<div class="notice notice-error is-dismissible"><p>' . sprintf(esc_html__('The plugin "%s" is required but not installed.', 'aixor'), $plugin_name) . ' <a href="' . wp_nonce_url(add_query_arg(array('action' => 'install-plugin', 'plugin' => $plugin['slug']), admin_url('update.php')), 'install-plugin_' . $plugin['slug']) . '" class="button button-primary">' . esc_html__('Install Now', 'aixor') . '</a></p></div>';
            } else {
                echo '<div class="notice notice-error is-dismissible"><p>' . sprintf(esc_html__('The plugin "%s" is installed but not activated.', 'aixor'), $plugin_name) . ' <a href="' . wp_nonce_url(add_query_arg(array('action' => 'activate', 'plugin' => $plugin_file), admin_url('plugins.php')), 'activate-plugin_' . $plugin_file) . '" class="button button-primary">' . esc_html__('Activate Now', 'aixor') . '</a></p></div>';
            }
        }
    }

    if ($missing_plugins) {
        // Display bulk install button if there are missing or inactive plugins
        echo '<form method="post">';
        wp_nonce_field('aixor_bulk_install');
        echo '<input type="submit" name="bulk_install_plugins" class="button button-primary" value="' . esc_attr__('Bulk Install/Activate All Recommended Plugins', 'aixor') . '">';
        echo '</form>';
    }

    echo '</div>';
}

add_action('admin_notices', 'aixor_register_recommended_plugins');

// Aixor Demo-Import

function aixor_import_files() {
    return array(

        array(
            'import_file_name'             => __('Hamburger Menu', 'aixor'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-import/data.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-import/widget.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-import/custom.dat',
            'local_import_redux' => trailingslashit( get_template_directory() ) . 'demo-import/redux.json',
            'import_preview_image_url'   => 'https://wpriverthemes.com/landing/aixor/assets/imgs/demo-1.png',
            'preview_url'                  => 'https://wpriverthemes.com/aixor/',
        ),
         array(
            'import_file_name'             => __('Notch Bar Menu', 'aixor'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-import/data.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-import/widget.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-import/custom.dat',
            'local_import_redux' => trailingslashit( get_template_directory() ) . 'demo-import/redux.json',
            'import_preview_image_url'   => 'https://wpriverthemes.com/landing/aixor/assets/imgs/demo-2.png',
            'preview_url'                  => 'https://wpriverthemes.com/aixor/home-notch-menu/',
        )

    );
}
add_filter( 'pt-ocdi/import_files', 'aixor_import_files' );

function aixor_ocdi_after_import( $selected_import ) {

    if ( 'Hamburger Menu' === $selected_import['import_file_name'] ) {

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Home Menu', 'nav_menu' );

        // Assign menus to their locations.
        $sidebar_menu = get_term_by( 'name', 'Sidebar Menu', 'nav_menu' );

        // Assign menus to their locations.
        $dropdown_menu = get_term_by( 'name', 'DropDown Menu', 'nav_menu' );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home - Ham Menu' );
        $posts_page_id = get_page_by_title( 'Blog Insights' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $posts_page_id->ID );
        
    }
    elseif ( 'Notch Bar Menu' === $selected_import['import_file_name'] ) {

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Home Menu', 'nav_menu' );

        // Assign menus to their locations.
        $sidebar_menu = get_term_by( 'name', 'Sidebar Menu', 'nav_menu' );

        // Assign menus to their locations.
        $dropdown_menu = get_term_by( 'name', 'DropDown Menu', 'nav_menu' );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home - Notch Menu' );
        $posts_page_id = get_page_by_title( 'Blog Insights' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $posts_page_id->ID );
        
    }

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'sidebar-menu' => $sidebar_menu->term_id,
            'dropdown-menu' => $dropdown_menu->term_id,
        )
    );
}
add_action( 'pt-ocdi/after_import', 'aixor_ocdi_after_import' );


require_once get_template_directory() . '/inc/aixor-class-wp-bootstrap-navwalker.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

function my_theme_enqueue_scripts() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom.js', array(), null, true);
    wp_localize_script('custom-script', 'themeData', array(
        'imgUrl' => esc_url(get_template_directory_uri() . '/assets/images/btn-arrow.svg')
    ));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

