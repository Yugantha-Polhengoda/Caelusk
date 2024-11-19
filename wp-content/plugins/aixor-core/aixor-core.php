<?php
/**
 * Plugin Name: Aixor Core
 * Description: Aixor Core Plugin Contains Elementor Widgets Specifically created for aixor WordPress Theme.
 * Plugin URI:  wordpressriverthemes.com/aixor
 * Version:     2.0.0
 * Author:      WordPressRiver
 * Author URI:  https://themeforest.net/user/wordpressriver/portfolio
 * Text Domain: aixor-core
 *
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.20.0
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

define('AIXOR_CORE_VERSION', '1.0.0');
define('AIXOR_CORE_MAIN_FILE', __FILE__);
define('AIXOR_CORE_BASENAME', plugin_basename(__FILE__));
define('AIXOR_CORE_URL', plugin_dir_url(__FILE__));
define('AIXOR_CORE_DIR_PATH', plugin_dir_path(__FILE__));

// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'aixor_core' ) ) {
    /**
     * Main aixor Core Class
     *
     * The main class that initiates and runs the aixor Core plugin.
     *
     * @since 1.7.0
     */
    final class aixor_core {
        /**
         * aixor Core Version
         *
         * Holds the version of the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string The plugin version.
         */
        const VERSION = '1.0' ;
        /**
         * Minimum Elementor Version
         *
         * Holds the minimum Elementor version required to run the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string Minimum Elementor version required to run the plugin.
         */
        const MINIMUM_ELEMENTOR_VERSION = '1.7.0';

        /**
         * Minimum PHP Version
         *
         * Holds the minimum PHP version required to run the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string Minimum PHP version required to run the plugin.
         */
        const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

        /**
         * Instance
         *
         * Holds a single instance of the `aixor_core` class.
         *
         * @since 1.7.0
         *
         * @access private
         * @static
         *
         * @var aixor_core A single instance of the class.
         */
        private static  $_instance = null ;
        /**
         * Instance
         *
         * Ensures only one instance of the class is loaded or can be loaded.
         *
         * @since 1.7.0
         *
         * @access public
         * @static
         *
         * @return aixor_core An instance of the class.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        /**
         * Clone
         *
         * Disable class cloning.
         *
         * @since 1.7.0
         *
         * @access protected
         *
         * @return void
         */
        public function __clone() {
            // Cloning instances of the class is forbidden
            _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'aixor-core' ), '1.7.0' );
        }

        /**
         * Wakeup
         *
         * Disable unserializing the class.
         *
         * @since 1.7.0
         *
         * @access protected
         *
         * @return void
         */
        public function __wakeup() {
            // Unserializing instances of the class is forbidden.
            _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'aixor-core' ), '1.7.0' );
        }
        /**
         * Constructor
         *
         * Initialize the aixor Core plugins.
         *
         * @since 1.0.0
         *
         * @access public
         */
        public function __construct() {
            $this->define_constants();
            $this->core_includes();
            $this->init_hooks();
            do_action( 'aixor_core_loaded' );
        }

        /**
         * Define Constants
         *
         * Define plugin constants.
         *
         * @since 1.0.0
         *
         * @access private
         */
        private function define_constants() {
            define( 'AIXOR_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
        }

        /**
         * Include Files
         *
         * Load core files required to run the plugin.
         *
         * @since 1.7.0
         *
         * @access public
         */
        public function core_includes() {
            // Load additional required files
            require_once AIXOR_PLUGIN_INC_PATH . 'aixorcore-functions.php';

            require_once( AIXOR_CORE_DIR_PATH . 'custom-posts/project.php');
        }

        /**
         * Init Hooks
         *
         * Hook into actions and filters.
         *
         * @since 1.7.0
         *
         * @access private
         */
        private function init_hooks() {
            add_action( 'init', [ $this, 'i18n' ] );
            add_action( 'plugins_loaded', [ $this, 'init' ] );
        }

        /**
         * Load Textdomain
         *
         * Load plugin localization files.
         *
         * @since 1.7.0
         *
         * @access public
         */
        public function i18n() {
            load_plugin_textdomain( 'aixor-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
        }

        /**
         * Init bronx Core
         *
         * Load the plugin after Elementor (and other plugins) are loaded.
         *
         * @since 1.0.0
         * @since 1.7.0 The logic moved from a standalone function to this class method.
         *
         * @access public
         */
        public function init() {

            if ( !did_action( 'elementor/loaded' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
                return;
            }

            // Check for required Elementor version

            if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
                return;
            }

            // Check for required PHP version

            if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
                return;
            }

            // Add new Elementor Categories
            add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

            // Register Widget Styles
            add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
            add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

            // Register Widget Scripts
            add_action( 'elementor/frontend/after_register_scripts', [ $this,'register_widget_scripts' ] );
            add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

            // Register New Widgets
            add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have Elementor installed or activated.
         *
         * @since 1.1.0
         * @since 1.7.0 Moved from a standalone function to a class method.
         *
         * @access public
         */
        public function admin_notice_missing_main_plugin() {
            $message = sprintf(
            /* translators: 1: aixor Core 2: Elementor */
                esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'aixor-core' ),
                '<strong>' . esc_html__( 'aixor core', 'aixor-core' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'aixor-core' ) . '</strong>'
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }

        /**
         * Register Widget Scripts
         *
         * Register custom scripts required to run Saasland Core.
         *
         * @since 1.6.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access public
         */
        public function register_widget_scripts() {
            wp_register_script( 'main', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ), false, true );
        }

        /**
         * Register Widget Styles
         *
         * Register custom styles required to run Saasland Core.
         *
         * @since 1.7.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access public
         */

        public function enqueue_widget_styles() {

        }

        /**
         * Register New Widgets
         *
         * Include aixor Core widgets files and register them in Elementor.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access public
         */
        public function on_widgets_registered() {
            $this->include_widgets();
            $this->register_widgets();
        }

        /**
         * Include Widgets Files
         *
         * Load aixor Core widgets files.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access private
         */
        private function include_widgets()
        {

            // Home //
            require_once(__DIR__ . '/widgets/home-hero.php');
            require_once(__DIR__ . '/widgets/home-header-v1.php');
            require_once(__DIR__ . '/widgets/home-header-v2.php');
            require_once(__DIR__ . '/widgets/home-team.php');
            require_once(__DIR__ . '/widgets/home-about.php');
            require_once(__DIR__ . '/widgets/home-feature-projects.php');
            require_once(__DIR__ . '/widgets/home-footer.php');
            require_once(__DIR__ . '/widgets/home-testimonial.php');
            require_once(__DIR__ . '/widgets/home-service.php');
            require_once(__DIR__ . '/widgets/home-our-partner.php');
            require_once(__DIR__ . '/widgets/home-pricing.php');
            require_once(__DIR__ . '/widgets/home-award.php');
            require_once(__DIR__ . '/widgets/home-contact.php');

            // About //
            require_once(__DIR__ . '/widgets/about-hero.php');
            require_once(__DIR__ . '/widgets/about-service.php');
            require_once(__DIR__ . '/widgets/about-process.php');
            require_once(__DIR__ . '/widgets/about-faq.php');

            // Project //
            require_once(__DIR__ . '/widgets/project-projects.php');

            // Contact //
            require_once(__DIR__ . '/widgets/contact-contactform.php');

            // Service-Single //
            require_once(__DIR__ . '/widgets/service-single-header.php');
            require_once(__DIR__ . '/widgets/service-single-project.php');
            require_once(__DIR__ . '/widgets/service-single-content.php');
        }

        /**
         * Register Widgets
         *
         * Register aixor Core widgets.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access private
         */
        private function register_widgets()
        {
            // Home-Page //

            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorHomeHero());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorHomeHeaderV1());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorHomeHeaderV2());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorTeam());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorAbout());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorFeatureProjects());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorHomeFooter());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorTestimonial());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorService());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorOurPartner());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorPricing());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorAward());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorContact());

            // About-Page //

            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorAboutHero());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorAboutService());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorProcess());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorAboutFAQ());

            // Project-Page //

            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorProjectProjects());

            // Contact-Page //

            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorContactContactForm());

            // Service-Single-Page //

            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorServiceSingleHeader());

            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorServiceSingleProject());
            \Elementor\Plugin::instance()->widgets_manager->register(new \aixorServiceSingleContent());
        }

        /**
         * Add new Elementor Categories
         *
         * Register new widget categories for aixor Core widgets.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access public
         */
        public function add_elementor_category() {
            \Elementor\Plugin::instance()->elements_manager->add_category( 'aixor-elementor-cat', [
                'title' => __( 'Aixor Elements', 'aixor-core' ),
            ], 1 );
        }

    }
}


// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'aixor_core_load' ) ) {
    /**
     * Load aixor Core
     *
     * Main instance of aixor_core.
     *
     * @since 1.0.0
     * @since 1.7.0 The logic moved from this function to a class method.
     */
    function aixor_core_load() {
        return aixor_core::instance();
    }

    // Run aixor Core
    aixor_core_load();
}

//function aixorLoadPlugin(){
//    require_once AIXOR_CORE_DIR_PATH . 'plugin.php';
//    // require_once AIXOR_CORE_DIR_PATH . 'includes/helper.php';
//}
//add_action('plugins_loaded', 'aixorLoadPlugin');






