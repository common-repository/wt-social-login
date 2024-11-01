<?php
/**
 *  Exit if accessed directly
 *
 * @package  WT_Sl_General_Settings
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WT_Sl_General_Settings.
 *
 * @since 1.0.0
 */
class WT_Sl_General_Settings {

	/**
	 * Wt_sl_enable.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_sl_enable() {
		echo '<p>' . esc_attr__( 'The below fields will takeup the default values as indicated if not amended to your specification.', 'wt-social-login' ) . '</p>';
	}

	/**
	 * Wt_social_login_enable.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_enable() {
		echo '<input value="1" type="checkbox" id="wt_social_login_enable" name="wt_social_login_enable" ' . checked( 1, get_option( 'wt_social_login_enable' ), false ) . ' />';
	}

	/**
	 * Display_sl_in_wc_login_page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function display_sl_in_wc_login_page() {
		echo '<input value="1" type="checkbox" id="display_sl_in_wc_login_page" name="display_sl_in_wc_login_page" ' . checked( 1, get_option( 'display_sl_in_wc_login_page' ), false ) . ' />';
	}

	/**
	 * Display_sl_in_wc_registration_page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function display_sl_in_wc_registration_page() {
		echo '<input value="1" type="checkbox" id="display_sl_in_wc_registration_page" name="display_sl_in_wc_registration_page" ' . checked( 1, get_option( 'display_sl_in_wc_registration_page' ), false ) . ' />';
	}

	/**
	 * Display_sl_in_wc_checkout_page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function display_sl_in_wc_checkout_page() {
		echo '<input value="1" type="checkbox" id="display_sl_in_wc_checkout_page" name="display_sl_in_wc_checkout_page" ' . checked( 1, get_option( 'display_sl_in_wc_checkout_page' ), false ) . ' />';
	}

	/**
	 * Display_sl_in_wc_thankyou_page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function display_sl_in_wc_thankyou_page() {
		echo '<input value="1" type="checkbox" id="display_sl_in_wc_thankyou_page" name="display_sl_in_wc_thankyou_page" ' . checked( 1, get_option( 'display_sl_in_wc_thankyou_page' ), false ) . ' />';
	}

	/**
	 * Wt_social_login_title.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_title() {
		$wt_social_login_title = get_option( 'wt_social_login_title' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Title for Social Login section in the Account details page', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_title" id="wt_social_login_title" placeholder="Social Login Accounts" value="' . esc_attr( $wt_social_login_title ) . '">';
	}

}
