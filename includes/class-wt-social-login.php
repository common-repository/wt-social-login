<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.webtoffee.com
 * @since      1.0.0
 *
 * @package    Wt_Social_Login
 * @subpackage Wt_Social_Login/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wt_Social_Login
 * @subpackage Wt_Social_Login/includes
 * @author     markhf <shahad_p@yahoo.com>
 */
class Wt_Social_Login {

	protected $loader;

	protected $plugin_name;
        
	protected $version;

	public function __construct() {
            
		if ( defined( 'WT_SOCIAL_LOGIN_VERSION' ) ) {
			$this->version = WT_SOCIAL_LOGIN_VERSION;
		} else {
			$this->version = '1.0.9';
		}
		$this->plugin_name = 'wt-social-login';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}
        
        
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wt-social-login-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wt-social-login-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wt-social-login-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wt-social-login-public.php';

		$this->loader = new Wt_Social_Login_Loader();

	}
        
	private function set_locale() {

		$plugin_i18n = new Wt_Social_Login_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Wt_Social_Login_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'edit_user_profile', $plugin_admin, 'modify_social_login_woocommerce_myaccount' );
		$this->loader->add_action( 'woocommerce_edit_account_form', $plugin_admin, 'modify_social_login_woocommerce_myaccount' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );


		//Register Setting
		$this->loader->add_filter( 'admin_init', $plugin_admin, 'register_setting_page' );

		$this->loader->add_action('wp_ajax_sl_unlink',  $plugin_admin,'sl_unlink' );
		$this->loader->add_filter( 'get_avatar_data', $plugin_admin, 'wt_sl_change_avatar', 100, 2 );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
        
	private function define_public_hooks() {

		$plugin_public = new Wt_Social_Login_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

        
	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}