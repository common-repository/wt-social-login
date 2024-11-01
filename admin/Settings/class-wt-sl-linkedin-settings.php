<?php
/**
 *  Exit if accessed directly
 *
 * @package  Wt_Sl_Linkedin_Settings
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Wt_Sl_Linkedin_Settings.
 *
 * @since 1.0.0
 */
class Wt_Sl_Linkedin_Settings {

	/**
	 * Wt_sl_linkedin_enable.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_sl_linkedin_enable() {

		/* Translators: %s Docs URL. */

		echo wp_kses_post( sprintf( __( '%1$s Get the API Key, APP Secret, callback URL from %2$s LinkedIn for Developer%3$s account.%4$s', 'wt-social-login' ), '<div class="wt-sl-callout wt-sl-callout-info" style="font-weight: 500;"><p>', '<a href="https://www.linkedin.com/developers/" target="_blank">', '</a>', '</p></div>') );

	}

	/**
	 * Wt_social_login_enable_linkedin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_enable_linkedin() {
		echo '<input value="1" type="checkbox" id="wt_social_login_enable_linkedin" name="wt_social_login_enable_linkedin" ' . checked( 1, get_option( 'wt_social_login_enable_linkedin' ), false ) . ' />';
	}

	/**
	 * Wt_social_login_linkedin_app_id.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_linkedin_app_id() {
		$wt_social_login_linkedin_app_id = get_option( 'wt_social_login_linkedin_app_id' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Insert the Client ID value of your LinkedIn App', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_linkedin_app_id" id="wt_social_login_linkedin_app_id" value="' . esc_attr( $wt_social_login_linkedin_app_id ) . '">';
	}

	/**
	 * Wt_social_login_linkedin_app_secret.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_linkedin_app_secret() {
		$wt_social_login_linkedin_app_secret = get_option( 'wt_social_login_linkedin_app_secret' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Insert the Client Secret value of your LinkedIn App', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_linkedin_app_secret" id="wt_social_login_linkedin_app_secret" value="' . esc_attr( $wt_social_login_linkedin_app_secret ) . '">';
	}

	/**
	 * Wt_social_login_linkedin_callback_url.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_linkedin_callback_url() {
		$wt_social_login_linkedin_callback_url = get_option( 'wt_social_login_linkedin_callback_url' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Specify the Authorised redirect URIs value from LinkedIn App. After successful LinkedIn authentication, users will be redirected to this URL.', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_linkedin_callback_url" id="wt_social_login_linkedin_callback_url" value="' . esc_attr( $wt_social_login_linkedin_callback_url ) . '">';
	}

	/**
	 * Wt_social_login_linkedin_app_instructions.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_linkedin_app_instructions() {
		?>
		<div class="sl-app-instruction">
			<h2 class="title"><?php _e('Steps to create LinkedIn App', 'wt-social-login'); ?></h2>
			<ol>
				<li><?php printf(__('Go to %1$s LinkedIn Developers Page. %2$s', 'wt-social-login'), '<a href="https://www.linkedin.com/developers/" target="_blank">', '</a>'); ?></li>
				<li><?php printf(__('Click the %1$s Create App %2$s link in the header menu.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php _e('Log in with your LinkedIn credentials if you are not logged in.', 'wt-social-login'); ?></li>
				<li><?php _e('To correctly create the application please fill in the sections of the application which are explained below,', 'wt-social-login'); ?></li>
				<ul class="wt-ul-square">
					<li><?php _e('App Name – Enter a name for your application.', 'wt-social-login'); ?></li>
					<li><?php _e('LinkedIn Page – Select an existing LinkedIn page of the company or create a new LinkedIn page.', 'wt-social-login'); ?></li>
					<li><?php _e('Privacy policy URL – Enter the URL for the Privacy policy.', 'wt-social-login'); ?></li>
					<li><?php _e('App logo – Upload an app logo.', 'wt-social-login'); ?></li>
					<li><?php _e('Legal agreement - Read the terms of service and check the box to confirm that you have read and agree to the terms.'); ?></li>
				</ul>
				<li><?php printf(__('Go to the %1$s Auth %2$s section and edit %1$s Authorized redirect URLs for your app %2$s under the %1$s OAuth 2.0 settings %2$s', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Click the %1$s Add redirect URL %2$s link.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('In the redirects URLs, you just need to enter your site\'s login URL and also add this in the %1$s Linkedin callback URL %2$s field of the plugin.e.g: %1$s %3$s %2$s', 'wt-social-login'), '<b>', '</b>', wp_login_url()); ?></li>
				<li><?php printf(__('Select the %1$s Sign In with LinkedIn %2$s product from the %1$s Products %2$s section.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('After a few minutes the product will be listed in your %1$s Added products %2$s list.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('If the app is successfully created then you will need to copy the %1$s Client ID %2$s & %1$s Client Secret %2$s and paste it to the %1$s Linkedin App ID/API Key %2$s & %1$s Linkedin App Secret %2$s fields of the plugin respectively.', 'wt-social-login'), '<b>', '</b>'); ?></li>
			</ol>
		</div>
		<?php
	}
}
