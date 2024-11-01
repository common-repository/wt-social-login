<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.webtoffee.com
 * @since             1.0.0
 * @package           Wt_Social_Login
 *
 * @wordpress-plugin
 * Plugin Name:       Social Login for WordPress
 * Plugin URI:        https://wordpress.org/plugins/wt-social-login/  
 * Description:       Single sign-on using existing information from a social networking service such as Facebook, Google or LinkedIn, to sign into a WordPress website instead of creating a new login account.
 * Version:           1.0.9
 * Author:            WebToffee
 * Author URI:        https://www.webtoffee.com/  
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       wt-social-login
 * Domain Path:       /languages
 * WC tested up to:   5.8.0
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}


// include( 'admin/class-wishlist_webtoffee_settings.php' );
define('WT_SOCIAL_LOGIN_BASEPATH', plugin_dir_path(__FILE__));
define('WT_SOCIAL_LOGIN_BASEURL', plugin_dir_url(__FILE__));



/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('WT_SOCIAL_LOGIN_VERSION', '1.0.9');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wt-social-login-activator.php
 */
function activate_wt_social_login() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wt-social-login-activator.php';
    Wt_Social_Login_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wt-social-login-deactivator.php
 */
function deactivate_wt_social_login() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wt-social-login-deactivator.php';
    Wt_Social_Login_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_wt_social_login');
register_deactivation_hook(__FILE__, 'deactivate_wt_social_login');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-wt-social-login.php';
require plugin_dir_path(__FILE__) . 'includes/class-wt-sociallogin-uninstall-feedback.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wt_social_login() {

    $plugin = new Wt_Social_Login();
    $plugin->run();
}

//todo Move to inner Page

function wt_sl_settings_link($links) {



    $plugin_links = array(
        '<a href="' . esc_url(admin_url('/admin.php?page=wt-social-login')) . '">' . __('Settings', 'wt-social-login') . '</a>',
        '<a target="_blank" href="https://wordpress.org/support/plugin/wt-social-login/">' . __('Support', 'wt-social-login') . '</a>',
        '<a target="_blank" href="https://wordpress.org/support/plugin/wt-social-login/reviews?rate=5#new-post">' . __('Review', 'wt-social-login') . '</a>',
    );
    if (array_key_exists('deactivate', $links)) {
        $links['deactivate'] = str_replace('<a', '<a class="wtsociallogin-deactivate-link"', $links['deactivate']);
    }
    return array_merge($plugin_links, $links);
}

add_action('plugin_action_links_' . plugin_basename(__FILE__), 'wt_sl_settings_link');

run_wt_social_login();