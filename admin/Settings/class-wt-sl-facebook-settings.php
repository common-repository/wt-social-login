<?php
/**
 *  Exit if accessed directly
 *
 * @package  Wt_Sl_Facebook_Settings
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Wt_Sl_Facebook_Settings.
 *
 * @since 1.0.0
 * @return output html
 */
class Wt_Sl_Facebook_Settings {

	/**
	 * Wt_sl_fb_enable.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_sl_fb_enable() {
			/* Translators: %s Docs URL. */	
			
			echo wp_kses_post( sprintf( __( '%1$s Get the API Key, APP Secret, Valid OAuth Redirect URL from %2$s Facebook for Developer%3$s account.%4$s', 'wt-social-login' ), '<div class="wt-sl-callout wt-sl-callout-info" style="font-weight: 500;"><p>', '<a href="https://developers.facebook.com/apps/" target="_blank">', '</a>', '</p></div>') );
	}

	/**
	 * Wt_social_login_enable_facebook.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_enable_facebook() {
		echo '<input value="1" type="checkbox" id="wt_social_login_enable_facebook" name="wt_social_login_enable_facebook" ' . checked( 1, get_option( 'wt_social_login_enable_facebook' ), false ) . ' />';
	}

	/**
	 * Wt_social_login_facebook_app_id.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_facebook_app_id() {
		$wt_social_login_facebook_app_id = get_option( 'wt_social_login_facebook_app_id' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Get the App ID value from Facebook app', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_facebook_app_id" id="wt_social_login_facebook_app_id" value="' . esc_attr( $wt_social_login_facebook_app_id ) . '">';
	}

	/**
	 * Wt_social_login_facebook_app_secret.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_facebook_app_secret() {
		$wt_social_login_facebook_app_secret = get_option( 'wt_social_login_facebook_app_secret' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Get the App secret value from Facebook app', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_facebook_app_secret" id="wt_social_login_facebook_app_secret" value="' . esc_attr( $wt_social_login_facebook_app_secret ) . '">';
	}

	/**
	 * Wt_social_login_facebook_outh_url.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_facebook_outh_url() {
		$wt_social_login_facebook_outh_url = get_option( 'wt_social_login_facebook_outh_url' );
		echo '<span class="wt-sl-tooltip" data-wt-sl-tooltip="'.__('Specify the Valid OAuth redirect URIs value from Facebook App. After successful Facebook authentication, users will be redirected to this URL', 'wt-social-login').'"><span class="wt-sl-tootip-icon"></span></span>';
		echo '<input type="text" name="wt_social_login_facebook_outh_url" id="wt_social_login_facebook_outh_url" value="' . esc_attr( $wt_social_login_facebook_outh_url ) . '">';
	}

	/**
	 * Wt_social_login_facebook_app_instructions.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function wt_social_login_facebook_app_instructions() {
		?>
		<div class="sl-app-instruction">
			<h2 class="title"><?php _e('Steps to create Facebook App', 'wt-social-login'); ?></h2>
			<ol>
				<li><?php printf(__('Go to %1$s Facebook For Developers %2$s', 'wt-social-login'), '<a href="https://developers.facebook.com/apps/" target="_blank">', '</a>'); ?></li>
				<li><?php _e('Log in with your Facebook credentials.', 'wt-social-login'); ?></li>
				<li><?php printf(__('Click on the %1$s Create App %2$s button and in the Popup choose the %1$s Consumer %2$s option.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('If you see the message %1$s Become a Facebook Developer %2$s, then you need to click on the green %1$s Register Now %2$s button, fill the form then finally verify your account.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Fill %1$s App Display Name %2$s, %1$s App Contact Email %2$s. The specified "App Display Name" will appear on your %3$s Consent Screen %4$s.', 'wt-social-login'),'<b>', '</b>', '<a href="https://developers.facebook.com/docs/facebook-login/permissions/overview/" target="_blank">', '</a>'); ?></li>
				<li><?php printf(__('%1$s Optional %2$s: choose a %1$s Business Manager Account %2$s in the popup, if you have any.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Click the %1$s Create App %2$s button and complete the Security Check.', 'wt-social-login'), '<b>','</b>' ); ?></li>
				<li><?php printf(__('Find %1$s Facebook Login %2$s and click %1$s Set Up %2$s.', 'wt-social-login'),'<b>', '</b>') ?></li>
                                <li><?php printf(__('Select %1$s Web %2$s and enter the following URL to the  %1$s Site URL %2$s field:%1$s %3$s %2$s', 'wt-social-login'), '<b>', '</b>', site_url()); ?></li>
				<li><?php printf(__('Press %1$s Save %2$s', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Click on the %1$s Settings %2$s option what you find on the left side, under %1$s Products %2$s - %1$s Facebook Login %2$s', 'wt-social-login'), '<b>', '</b>') ?></li>
				<li><?php printf(__('Add a redirect URL to the %1$s Valid OAuth redirect URIs %2$s field and also add this in the %1$s Facebook Valid OAuth Redirect URL %2$s field of the plugin. eg:%1$s %3$s %2$s', 'wt-social-login'), '<b>', '</b>', wp_login_url()); ?></li>
				<li><?php printf(__('Click on %1$s Save Changes %2$s', 'wt-social-login'), '<b>',' </b>'); ?></li>
				<li><?php printf(__('On the top left side, click on the %1$s Settings %2$s menu point, then click %1$s Basic %2$s', 'wt-social-login'), '<b>', '</b>') ?></li>
				<li><?php printf(__('Enter your domain name to the %1$s App Domains %2$s field, eg: %1$s mydomain.com %2$s', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Fill up the %1$s Privacy Policy URL %2$s field. Provide a publicly available and easily accessible privacy policy that explains what data you are collecting and how you will use that data.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Select a %1$s Category %2$s, an %1$s App Icon %2$s and pick the %1$s App Purpose %2$s option that describes your App the best, then press %1$s Save Changes %2$s', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('Your application is currently private, which means that only you can log in with it. In the top bar click on the switch next to the %1$s In development %2$s label, then click the %1$s Switch Mode %2$s button.', 'wt-social-login'), '<b>', '</b>'); ?></li>
				<li><?php printf(__('At the top of the page you can find your %1$s App ID %2$s & %1$s App secret %2$s. Copy the codes.', 'wt-social-login'), '<b>', '</b>') ?></li>
				<li><?php printf(__('Paste the %1$s App ID %2$s & %1$s App secret %2$s values to the %1$s Facebook App ID/API Key %2$s & %1$s Facebook App Secret %2$s fields of the plugin respectively.', 'wt-social-login'), '<b>', '</b>'); ?></li>
			</ol>
		</div>

		<?php
	}

}
