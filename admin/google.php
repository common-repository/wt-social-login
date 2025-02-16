<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;

@header( 'X-Accel-Buffering: no' );

require WT_SOCIAL_LOGIN_BASEPATH . 'vendor/autoload.php';


$wt_social_login_google_app_id       = get_option( 'wt_social_login_google_app_id' );
$wt_social_login_google_app_secret   = get_option( 'wt_social_login_google_app_secret' );
$wt_social_login_google_callback_url = get_option( 'wt_social_login_google_callback_url' );

// Step 1: Enter you google account credentials
$g_client = new Google_Client();
$g_client->setClientId( $wt_social_login_google_app_id );
$g_client->setClientSecret( $wt_social_login_google_app_secret );
$g_client->setRedirectUri( $wt_social_login_google_callback_url );
$g_client->setScopes( 'profile email' );

$service = new Google_Service_Oauth2( $g_client );



if ( $wt_social_login_google_callback_url && $wt_social_login_google_app_secret && $wt_social_login_google_app_id ) {
	// Step 2 : Create the url
	$auth_url = $g_client->createAuthUrl();
} else {
	$auth_url = '?error=google';
}
echo "<a class='wt-sl-iconlink wt-sl-button' href='$auth_url'> <img style='display: inline' src='" . plugin_dir_url( __FILE__ ) . '/images/sl-google.png' . "'/> </a>";



// Step 3 : Get the authorization  code
$code = isset( $_GET['code'] ) ? $_GET['code'] : null;

$uri      = $_SERVER['REQUEST_URI'];
$uri      = urldecode( $uri );
$exploded = array();
parse_str( $uri, $exploded );

if ( isset( $exploded['code'] ) ) {
	$code = $exploded['code'];
}


// Step 4: Get access token
if ( $code ) {
	try {
		$token = $g_client->fetchAccessTokenWithAuthCode( $code );
		$g_client->setAccessToken( $token );

	} catch ( Exception $e ) {
		// echo $e->getMessage();
	}

	try {
		$pay_load = $g_client->verifyIdToken();


	} catch ( Exception $e ) {
		// echo $e->getMessage();
	}
} else {
	$pay_load = null;
}

if ( isset( $pay_load ) ) {
	if ( $g_client->getAccessToken() ) {
		$user                     = $service->userinfo->get( $_POST );
		$_SESSION['access_token'] = $g_client->getAccessToken();
		$user_email               = $user->email;

		$wt_sl_user_data['first_name'] = isset($user->givenName) ? $user->givenName : '';
		$wt_sl_user_data['last_name'] = isset($user->familyName) ? $user->familyName : '';
		$wt_sl_user_data['display_name'] = isset($user->name) ?$user->name : '';
		$wt_sl_user_data['profile_pic'] = isset($user->picture) ? $user->picture : '';
		$platform                 = 'google';
		include 'wt-social-login.php';
		die;
	}
}
