<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require 'settings/class-wt-sl-facebook-settings.php';

// For Section Headings
add_settings_section(
	'wt_social_login_general',
	'',
	'Wt_Sl_Facebook_Settings::wt_sl_fb_enable',
	$this->plugin_name
);





// Enable Facebook Login
add_settings_field(
	'wt_social_login_enable_facebook',
	__( 'Enable Facebook', 'wt-social-login' ),
	'Wt_Sl_Facebook_Settings::wt_social_login_enable_facebook',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_enable_facebook' )
);

register_setting(
	'wt_social_login_settings',
	'wt_social_login_enable_facebook'
);




// Facebook App ID/API Key
add_settings_field(
	'wt_social_login_facebook_app_id',
	__( 'Facebook App ID/API Key', 'wt-social-login' ),
	'Wt_Sl_Facebook_Settings::wt_social_login_facebook_app_id',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_facebook_app_id' )
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_facebook_app_id'
);

// Facebook App Secret
add_settings_field(
	'wt_social_login_facebook_app_secret',
	__( 'Facebook App Secret', 'wt-social-login' ),
	'Wt_Sl_Facebook_Settings::wt_social_login_facebook_app_secret',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_facebook_app_secret' )
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_facebook_app_secret'
);

// Facebook App Secret
add_settings_field(
	'wt_social_login_facebook_outh_url',
	__( 'Facebook Valid OAuth Redirect URL', 'wt-social-login' ),
	'Wt_Sl_Facebook_Settings::wt_social_login_facebook_outh_url',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_facebook_outh_url' )
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_facebook_outh_url'
);

add_action('wt_sl_app_instructions','Wt_Sl_Facebook_Settings::wt_social_login_facebook_app_instructions');
