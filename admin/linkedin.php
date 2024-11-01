<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wt_social_login_linkedin_app_id       = get_option( 'wt_social_login_linkedin_app_id' );
$wt_social_login_linkedin_app_secret   = get_option( 'wt_social_login_linkedin_app_secret' );
$wt_social_login_linkedin_callback_url = get_option( 'wt_social_login_linkedin_callback_url' );

$client_id     = $wt_social_login_linkedin_app_id;
$client_secret = $wt_social_login_linkedin_app_secret;
$redirect_uri  = $wt_social_login_linkedin_callback_url;



$csrf_token = random_int( 1111111, 9999999 );
$scopes     = 'r_liteprofile%20r_emailaddress';

if ( ! function_exists( 'getCallback' ) ) {
	function getCallback() {
		$wt_social_login_linkedin_app_id       = get_option( 'wt_social_login_linkedin_app_id' );
		$wt_social_login_linkedin_app_secret   = get_option( 'wt_social_login_linkedin_app_secret' );
		$wt_social_login_linkedin_callback_url = get_option( 'wt_social_login_linkedin_callback_url' );

		$client_id     = $wt_social_login_linkedin_app_id;
		$client_secret = $wt_social_login_linkedin_app_secret;
		$redirect_uri  = $wt_social_login_linkedin_callback_url;

		$csrf_token = random_int( 1111111, 9999999 );
		$scopes     = 'r_basicprofile%20r_emailaddress';

		if ( isset( $_REQUEST['code'] ) ) {
			$code            = $_REQUEST['code'];
			$url             = 'https://www.linkedin.com/oauth/v2/accessToken';
			$params          = array(
				'client_id'     => $client_id,
				'client_secret' => $client_secret,
				'redirect_uri'  => $redirect_uri,
				'code'          => $code,
				'grant_type'    => 'authorization_code',
			);
			$request         = new WP_Http();
				$accessToken = $request->request(
					$url,
					array(
						'method' => 'POST',
						'body'   => $params,
					)
				);
			$accessToken     = isset($accessToken['body']) ? json_decode( $accessToken['body'] ) : '';
			$accessToken = isset($accessToken->access_token) ? $accessToken->access_token : '';
			if($accessToken) {
				$user_email_url = 'https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))&oauth2_access_token=' . $accessToken;
				$user_email_data = @file_get_contents( $user_email_url, false );
				if($user_email_data !== false) {
					$user_email = json_decode( $user_email_data );
					$linkedin_profile_url = 'https://api.linkedin.com/v2/me?projection=(id,localizedFirstName,localizedLastName,profilePicture(displayImage~:playableStreams))&oauth2_access_token=' . $accessToken;
					$linkedin_profile_data = @file_get_contents( $linkedin_profile_url, false );
					if($linkedin_profile_data !== false) {
						$linkedin_profile_data = json_decode( $linkedin_profile_data);
						$wt_sl_user_data['first_name'] = isset($linkedin_profile_data->localizedFirstName) ? $linkedin_profile_data->localizedFirstName : '';
						$wt_sl_user_data['last_name'] = isset($linkedin_profile_data->localizedLastName) ? $linkedin_profile_data->localizedLastName : '';
						$wt_sl_user_data['display_name'] = $wt_sl_user_data['first_name'].' '.$wt_sl_user_data['last_name'];
						$wt_sl_user_data['profile_pic'] = !empty($linkedin_profile_data->profilePicture->{'displayImage~'}->elements[0]->identifiers[0]->identifier) ? $linkedin_profile_data->profilePicture->{'displayImage~'}->elements[0]->identifiers[0]->identifier : '';
					}

					$user_email = !empty($user_email->elements[0]->{'handle~'}->emailAddress) ? $user_email->elements[0]->{'handle~'}->emailAddress:'';
					$platform   = 'linkedin';
					include 'wt-social-login.php';
				}
			}

		}
	}
}

getCallback();
if ( $wt_social_login_linkedin_callback_url && $wt_social_login_linkedin_app_secret && $wt_social_login_linkedin_app_id ) {
	$link = "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={$client_id}&redirect_uri={$redirect_uri}&state={$csrf_token}&scope={$scopes}";
} else {
	$link = '?error=linkedin';
}
?>
<a class='wt-sl-iconlink' href="<?php echo $link; ?>"><img style="display: inline" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/sl-linkedin.png'; ?>" alt=""> </a>
