<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.webtoffee.com
 * @since      1.0.0
 *
 * @package    Wt_Social_Login
 * @subpackage Wt_Social_Login/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wt_Social_Login
 * @subpackage Wt_Social_Login/admin
 * @author     markhf <shahad_p@yahoo.com>
 */

class Wt_Social_Login_Admin {

	/**
	 * The options name to be used in this plugin
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string      $option_name    Option name of this plugin
	 */
	private $option_name_general = 'wt_social_login_general';
	private $option_name         = 'wt_social_login';


	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$display_sl_in_wc_checkout_page = get_option( 'display_sl_in_wc_checkout_page' );
		if ( $display_sl_in_wc_checkout_page ) {
			add_action( 'woocommerce_before_checkout_form', array( $this, 'show_in_wc_checkoutpage' ), 1 );
		}

		$display_sl_in_wc_thankyou_page = get_option( 'display_sl_in_wc_thankyou_page' );
		if ( $display_sl_in_wc_thankyou_page ) {
			add_action( 'woocommerce_thankyou', array( $this, 'show_in_wc_checkoutpage' ), 1 );
		}

		$display_sl_in_wc_login_page = get_option( 'display_sl_in_wc_login_page' );
		if ( $display_sl_in_wc_login_page ) {
			add_action( 'woocommerce_login_form', array( $this, 'social_links' ) );

		}
		add_action( 'login_form', array( $this, 'social_links' ) );
		add_action( 'login_enqueue_scripts', array( $this,'wt_sl_add_login_styles' ) );
	}

	public function show_in_wc_checkoutpage() {

		$wt_social_login_enable = get_option( 'wt_social_login_enable' );
		if ( $wt_social_login_enable ) {
			echo '<h4>For faster checkout, login or register using your social account.</h4>';
			$wt_social_login_enable_google   = get_option( 'wt_social_login_enable_google' );
			$wt_social_login_enable_facebook = get_option( 'wt_social_login_enable_facebook' );
			$wt_social_login_enable_linkedin = get_option( 'wt_social_login_enable_linkedin' );

			if ( $wt_social_login_enable_facebook ) {
				include 'facebook.php';
			}
			if ( $wt_social_login_enable_google ) {
				include 'google.php';
			}
			if ( $wt_social_login_enable_linkedin ) {
				include 'linkedin.php';
			}
		}
	}

	public function social_links() {

		$wt_social_login_enable = get_option( 'wt_social_login_enable' );
		if ( $wt_social_login_enable ) {
			if ( isset( $_GET['error'] ) ) {
				include 'partials/login-error.php';
			}
			$msg = __( 'Login with Social Media', 'wt-social-login' );
			echo "<h4><b>$msg</b></h4> <div>";

			$wt_social_login_enable_google   = get_option( 'wt_social_login_enable_google' );
			$wt_social_login_enable_facebook = get_option( 'wt_social_login_enable_facebook' );
			$wt_social_login_enable_linkedin = get_option( 'wt_social_login_enable_linkedin' );

			if ( $wt_social_login_enable_facebook ) {
				include 'facebook.php';
			}
			if ( $wt_social_login_enable_google ) {
				include 'google.php';
			}
			if ( $wt_social_login_enable_linkedin ) {
				include 'linkedin.php';
			}
			echo '</div>';

		}
	}

	/**
	 * Sets profile picture for the user based on their social media account.
	 *
	 * @since    1.0.6
	 */
	public function wt_sl_change_avatar($args, $id_or_email) {
		$profile_pic_url = get_user_meta($id_or_email, 'wt_sl_profile_pic', true);
		if(!empty($profile_pic_url)) {
			$args['url'] = $profile_pic_url;
		}
		return $args;
	}

	/**
	 * Add styles to the wordpress login page.
	 *
	 * @since    1.0.7
	 */
	public function wt_sl_add_login_styles() {
		?>
		<style type="text/css">
		.wt-sl-iconlink {
			text-decoration: none;
		}
		.wt-sl-iconlink:active, .wt-sl-iconlink:hover, .wt-sl-iconlink:focus {
			box-shadow: unset !important;
		}
    	</style>
	<?php
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wt_Social_Login_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wt_Social_Login_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wt-social-login-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wt_Social_Login_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wt_Social_Login_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wt-social-login-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function sl_unlink() {

		check_ajax_referer( 'login_unlink', 'wt_nonce' );
		$platform = sanitize_text_field( $_POST['platform'] );
		delete_user_meta( get_current_user_id(), $platform . '_last_login' );
		delete_user_meta( get_current_user_id(), $platform . '_email' );
		delete_user_meta( get_current_user_id(), $platform . '_link_status' );
		delete_user_meta( get_current_user_id(), 'wt_sl_profile_pic' );
		wp_die();
	}

	public function add_plugin_admin_menu() {

		add_menu_page(
			'Webtoffee Social Login',
			'Social Login',
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_plugin_setup_page' ),
			'dashicons-groups',
			'80'
		);
	}

	public function display_plugin_setup_page() {
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : '';
		include 'partials/wt-social-login-admin-display.php';
	}

	public function modify_social_login_woocommerce_myaccount() {
			include 'woocommerce-myaccount.php';

	}

	public function display_options_page() {
		include_once 'partials/wt-social-login-admin-display.php';
	}

	public function register_setting_page() {
	    
		if ( isset( $_POST['_wp_http_referer'] ) ) {
			$uri      = urldecode( $_POST['_wp_http_referer'] );
			$exploded = array();
			parse_str( $uri, $exploded );
			$tab = isset($exploded['tab']) ? $exploded['tab'] : '';
		} else {
			$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : '';
		}

		switch ( $tab ) {
			case 'general-settings':
				include 'register-general-settings.php';
				break;
			case 'facebook-settings':
				include 'register-facebook-settings.php';
				break;
			case 'linkedin-settings':
				include 'register-linkedin-settings.php';
				break;
			case 'google-settings':
				include 'register-google-settings.php';
				break;
			default:
				include 'register-general-settings.php';
				break;
		}
	}

}
