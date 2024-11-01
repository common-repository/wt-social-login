<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.webtoffee.com
 * @since      1.0.0
 *
 * @package    Wt_Social_Login
 * @subpackage Wt_Social_Login/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wt_Social_Login
 * @subpackage Wt_Social_Login/includes
 * @author     markhf <shahad_p@yahoo.com>
 */
if (!defined('WPINC')) {
	die;
}
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
class Wt_Social_Login_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
	}
}
