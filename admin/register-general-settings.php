<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require 'settings/class-wt-sl-general-settings.php';

// For Section Headings
add_settings_section(
	'wt_social_login_general',
	'',
	'',
	$this->plugin_name
);



// Enable Social Login
add_settings_field(
	'wt_social_login_enable',
	__( 'Enable Social Login', 'wt-social-login' ),
	'WT_Sl_General_Settings::wt_social_login_enable',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'wt_social_login_enable' )
);

register_setting(
	'wt_social_login_settings',
	'wt_social_login_enable'
);






// WooCommerce Login Page
add_settings_field(
	'display_sl_in_wc_login_page',
	__( 'Enable Social Login on WooCommerce Login Page', 'wt-social-login' ),
	'WT_Sl_General_Settings::display_sl_in_wc_login_page',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'display_sl_in_wc_login_page' )
);
register_setting(
	'wt_social_login_settings',
	'display_sl_in_wc_login_page'
);

// WooCommerce Registration Page
add_settings_field(
	'display_sl_in_wc_registration_page',
	__( 'Enable Social Login on WooCommerce Registration Page', 'wt-social-login' ),
	'WT_Sl_General_Settings::display_sl_in_wc_registration_page',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'display_sl_in_wc_registration_page' )
);
register_setting(
	'wt_social_login_settings',
	'display_sl_in_wc_registration_page'
);

// WooCommerce Registration Page
add_settings_field(
	'display_sl_in_wc_checkout_page',
	__( 'Enable Social Login on WooCommerce Checkout Page', 'wt-social-login' ),
	'WT_Sl_General_Settings::display_sl_in_wc_checkout_page',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'display_sl_in_wc_checkout_page' )
);
register_setting(
	'wt_social_login_settings',
	'display_sl_in_wc_checkout_page'
);

// WooCommerce Registration Page
add_settings_field(
	'display_sl_in_wc_thankyou_page',
	__( 'Enable Social Login on WooCommerce ThankYou Page', 'wt-social-login' ),
	'WT_Sl_General_Settings::display_sl_in_wc_thankyou_page',
	$this->plugin_name,
	$this->option_name_general,
	array( 'label_for' => 'display_sl_in_wc_thankyou_page' )
);
register_setting(
	'wt_social_login_settings',
	'display_sl_in_wc_thankyou_page'
);

// Social Login Title
add_settings_field(
	'wt_social_login_title',
	__( 'Title on Account details page', 'wt-social-login' ),
	'WT_Sl_General_Settings::wt_social_login_title',
	$this->plugin_name,
	$this->option_name_general,
	array( 
		'label_for' => 'wt_social_login_title'
	)
);
register_setting(
	'wt_social_login_settings',
	'wt_social_login_title'
);


