<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require 'settings/class-wt-sl-google-settings.php';

// For Section Headings
add_settings_section(
	'wt_social_login_general',
	'',
	'Wt_Sl_Google_Settings::wt_sl_google_enable',
	$this->plugin_name
);


// Enable Google Login
add_settings_field(
	'wt_social_login_enable_google',
	__( 'Enable Google', 'wt-social-login' ),
	'Wt_Sl_Google_Settings::wt_social_login_enable_google',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_enable_google' )
);

register_setting(
	'wt_social_login_settings',
	'wt_social_login_enable_google'
);

// Google App ID/API Key
add_settings_field(
	'wt_social_login_google_app_id',
	__( 'Google App ID/API Key', 'wt-social-login' ),
	'Wt_Sl_Google_Settings::wt_social_login_google_app_id',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_google_app_id' )
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_google_app_id'
);

// Google App Secret
add_settings_field(
	'wt_social_login_google_app_secret',
	__( 'Google App Secret', 'wt-social-login' ),
	'Wt_Sl_Google_Settings::wt_social_login_google_app_secret',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_google_app_secret' )
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_google_app_secret'
);

// Google App Secret
add_settings_field(
	'wt_social_login_google_callback_url',
	__( 'Google callback URL', 'wt-social-login' ),
	'Wt_Sl_Google_Settings::wt_social_login_google_callback_url',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_google_callback_url' )
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_google_callback_url'
);

add_action('wt_sl_app_instructions','Wt_Sl_Google_Settings::wt_social_login_google_app_instructions');
