<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! session_id() ) {
	@session_start();
}
$wt_social_login_facebook_app_id     = get_option( 'wt_social_login_facebook_app_id' );
$wt_social_login_facebook_app_secret = get_option( 'wt_social_login_facebook_app_secret' );
$wt_social_login_facebook_outh_url   = get_option( 'wt_social_login_facebook_outh_url' );
require WT_SOCIAL_LOGIN_BASEPATH . 'vendor/autoload.php';
if ( $wt_social_login_facebook_app_id && $wt_social_login_facebook_app_secret && $wt_social_login_facebook_outh_url ) {


	$fb = new Facebook\Facebook(
		array(
			'app_id'                => $wt_social_login_facebook_app_id, // Replace {app-id} with your app id
			'app_secret'            => $wt_social_login_facebook_app_secret,
			'default_graph_version' => 'v2.10',
		)
	);


	$helper = $fb->getRedirectLoginHelper();

	$permissions = array( 'email' ); // Optional permissions


	$loginUrl = $helper->getLoginUrl( $wt_social_login_facebook_outh_url, $permissions );
	$fb_url   = htmlspecialchars( $loginUrl );
	echo "<a class='wt-sl-iconlink' href='$fb_url'> <img style='display: inline' src='" . plugin_dir_url( __FILE__ ) . '/images/sl-facebook.png' . "'/> </a>";

	try {
		$accessToken = $helper->getAccessToken();
	} catch ( Facebook\Exceptions\FacebookResponseException $e ) {
		// When Graph returns an error
		// echo 'Graph returned an error: ' . $e->getMessage();
		// exit;
	} catch ( Facebook\Exceptions\FacebookSDKException $e ) {
		// When validation fails or other local issues
		// echo 'Facebook SDK returned an error: ' . $e->getMessage();
		// exit;
	}

	if ( ! isset( $accessToken ) ) {
		if ( $helper->getError() ) {
			@header( 'HTTP/1.0 401 Unauthorized' );
			// echo "Error: " . $helper->getError() . "\n";
			// echo "Error Code: " . $helper->getErrorCode() . "\n";
			// echo "Error Reason: " . $helper->getErrorReason() . "\n";
			// echo "Error Description: " . $helper->getErrorDescription() . "\n";
		} else {
			@header( 'HTTP/1.0 400 Bad Request' );
			// echo 'Bad request';
		}
		// exit;
	} else {

		$wt_sl_user_data = array(
			'first_name' => '',
			'last_name' => '',
			'display_name'	=> '',
			'profile_pic' => '',
		);
		$fb_access = $accessToken->getValue();

		$response   = $fb->get( '/me?fields=id,email,name,first_name,last_name,picture', $fb_access );
		$user       = $response->getGraphUser();
		if($user) {
			if(null !== ($user->getFirstName()))
				$wt_sl_user_data['first_name'] = $user->getFirstName();
			if(null !== ($user->getLastName()))
				$wt_sl_user_data['last_name'] = $user->getLastName();
			if(null !== ($user->getName()))
				$wt_sl_user_data['display_name'] = $user->getName();
			if(null !== $user->getPicture() && null !== $user->getPicture()->getUrl())
				$wt_sl_user_data['profile_pic'] = $user->getPicture()->getUrl();
		}
		$platform   = 'facebook';
		$user_email = $user['email'];
		if ( $user_email ) {
			include 'wt-social-login.php';
			die;
		}
	}
} else {
	$fb_url = '?error=facebook';
	echo "<a style='text-decoration: none'  href='$fb_url'> <img style='display: inline' src='" . plugin_dir_url( __FILE__ ) . '/images/sl-facebook.png' . "'/> </a>";

}
