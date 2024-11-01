<?php

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require 'settings/class-wt-sl-linkedin-settings.php';

// For Section Headings
add_settings_section(
	'wt_social_login_general',
	'',
	'Wt_Sl_Linkedin_Settings::wt_sl_linkedin_enable',
	$this->plugin_name
);

// Enable Linkedin Login
add_settings_field(
	'wt_social_login_enable_linkedin',
	__( 'Enable Linkedin', 'wt-social-login' ),
	'Wt_Sl_Linkedin_Settings::wt_social_login_enable_linkedin',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_enable_linkedin' )
);

register_setting(
	'wt_social_login_settings',
	'wt_social_login_enable_linkedin'
);




// Linkedin App ID/API Key
add_settings_field(
	'wt_social_login_linkedin_app_id',
	__( 'Linkedin App ID/API Key', 'wt-social-login' ),
	'Wt_Sl_Linkedin_Settings::wt_social_login_linkedin_app_id',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_linkedin_app_id' )
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_linkedin_app_id'
);

// Linkedin App Secret
add_settings_field(
	'wt_social_login_linkedin_app_secret',
	__( 'Linkedin App Secret', 'wt-social-login' ),
	'Wt_Sl_Linkedin_Settings::wt_social_login_linkedin_app_secret',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_linkedin_app_secret' )
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_linkedin_app_secret'
);

// Linkedin App Secret
add_settings_field(
	'wt_social_login_linkedin_callback_url',
	__( 'Linkedin callback URL', 'wt-social-login' ),
	'Wt_Sl_Linkedin_Settings::wt_social_login_linkedin_callback_url',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_linkedin_callback_url' )
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_linkedin_callback_url'
);

add_action('wt_sl_app_instructions','Wt_Sl_Linkedin_Settings::wt_social_login_linkedin_app_instructions');
