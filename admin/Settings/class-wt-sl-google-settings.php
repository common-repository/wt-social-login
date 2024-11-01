<?php
/**
 *  Exit if accessed directly
 *
 * @package  Wt_Sl_Google_Settings
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Wt_Sl_Google_Settings.
 *
 * @since 1.0.0
 */
class Wt_Sl_Google_Settings {

	/**
	 * Wt_sl_google_enable.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_sl_google_enable() {

		/* Translators: %s Docs URL. */	

		echo wp_kses_post( sprintf( __( '%1$s Get the API Key, APP Secret, callback URL from %2$s Google Cloud Platform%3$s account.%4$s', 'wt-social-login' ), '<div class="wt-sl-callout wt-sl-callout-info" style="font-weight: 500;"><p>', '<a href="https://console.cloud.google.com/apis/" target="_blank">', '</a>', '</p></div>') );

	}

	/**
	 * Wt_social_login_enable_google.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_enable_google() {
		echo '<input value="1" type="checkbox" id="wt_social_login_enable_google" name="wt_social_login_enable_google" ' . checked( 1, get_option( 'wt_social_login_enable_google' ), false ) . ' />';
	}

	/**
	 * Wt_social_login_google_app_id.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_google_app_id() {
		$wt_social_login_google_app_id = get_option( 'wt_social_login_google_app_id' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Insert the Client ID value of your Google App', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_google_app_id" id="wt_social_login_google_app_id" value="' . esc_attr( $wt_social_login_google_app_id ) . '">';
	}

	/**
	 * Wt_social_login_google_app_secret.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_google_app_secret() {
		$wt_social_login_google_app_secret = get_option( 'wt_social_login_google_app_secret' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Insert the Client Secret value of your Google App', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_google_app_secret" id="wt_social_login_google_app_secret" value="' . esc_attr( $wt_social_login_google_app_secret ) . '">';
	}

	/**
	 * Wt_social_login_google_callback_url.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_google_callback_url() {
		$wt_social_login_google_callback_url = get_option( 'wt_social_login_google_callback_url' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Specify the Authorised redirect URIs value from Google App. After successful Google authentication, users will be redirected to this URL.', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_google_callback_url" id="wt_social_login_google_callback_url" value="' . esc_attr( $wt_social_login_google_callback_url ) . '">';
	}

	/**
	 * Wt_social_login_google_app_instructions.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_google_app_instructions() {
		?>
		<div class="sl-app-instruction">
			<h2 class="title"><?php _e('Steps to create Google App', 'wt-social-login'); ?></h2>
			<ol>
				<li><?php printf(__('Go to %1$s  Google Cloud Platform. %2$s', 'wt-social-login'), '<a href="https://console.cloud.google.com/apis/" target="_blank">', '</a>'); ?></li>
				<li><?php _e('Log in with your Google credentials.', 'wt-social-login'); ?></li>
				<li><?php printf(__('If you don\'t have a project yet, you\'ll need to create one. You can do this by clicking on the blue %1$s CREATE PROJECT %2$s button on the right side!  ( If you already have a project, click on the name of your project from the top menu bar instead, which will bring up a modal and click %1$s New Project %2$s ).', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Name your project and then click on the %1$s Create %2$s button again.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php _e('Once you have a project, you\'ll end up in the dashboard.', 'wt-social-login'); ?></li>
				<li><?php printf(__('Click the %1$s OAuth consent screen %2$s button on the left hand side.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Choose a %1$s User Type %2$s according to your needs. If you want to enable the social login with Google for any users with a Google account, then pick the External option!', 'wt-social-login'), '<b>', '</b>'); ?> 
					<ul>
						<li><?php printf(__('%1$s Note: %2$s We don\'t use sensitive or restricted scopes either. But if you will use this App for other purposes too, then you may need to go through an %3$s independent security review %4$s!', 'wt-social-login'), '<b>', '</b>', '<a href="https://support.google.com/cloud/answer/9110914" target="_blank">', '</a>'); ?></li>
					</ul>
				</li>
				<li><?php printf(__('Enter a name for your App to the %1$s App name %2$s field, which will appear as the name of the app asking for consent.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Fill the %1$s Authorized domains %2$s field with your domain name, eg: %3$s without subdomains!', 'wt-social-login'), '<b>', '</b>', '<b>mydomain.com</b>'); ?></li>
				<li><?php _e('Save your settings!', 'wt-social-login'); ?></li>
				<li><?php printf(__('On the left side, click on the %1$s Credentials %2$s menu point, then click the %1$s + Create Credentials %2$s button on the top bar.', 'wt-social-login'), '<b>', '</b>') ?></li>
				<li><?php printf(__('Choose the %1$s OAuth client ID %2$s option.', 'wt-social-login'),'<b>', '</b>'); ?></li>
				<li><?php printf(__('Select the %1$s Web application %2$s under Application type.', 'wt-social-login'),'<b>', '</b>'); ?></li>
				<li><?php printf(__('Enter a %1$s Name %2$s for your OAuth client ID.', 'wt-social-login'),'<b>', '</b>'); ?></li>
				<li><?php printf(__('Add a redirect URL to the %1$s Authorised redirect URIs %2$s field and also add this in the field: %1$s Google callback URL %2$s of the plugin. eg: %1$s %3$s %2$s', 'wt-social-login'),'<b>', '</b>', wp_login_url()); ?></li>
				<li><?php printf(__('Click on the %1$s Create %2$s button.', 'wt-social-login'),'<b>', '</b>'); ?></li>
				<li><?php printf(__('A modal should pop up with your credentials. If that doesn\'t happen, go to the Credentials in the left hand menu and select your app by clicking on its name and you\'ll be able to copy the %1$s Client ID %2$s and %1$s Client Secret %2$s from there.', 'wt-social-login'),'<b>', '</b>'); ?></li>
				<li><?php printf(__('Paste the %1$s Client ID %2$s & %1$s Client Secret %2$s to the fields %1$s Google App ID/API Key %2$s & %1$s Google App Secret %2$s respectively.', 'wt-social-login'), '<b>', '</b>'); ?></li>
			</ol>
		<div>
		<?php
	}

}
