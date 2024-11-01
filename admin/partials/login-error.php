<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$error = isset( $_GET['error'] ) ? $_GET['error'] : '';
?>
<h4 style='color: darkred;'><?php echo wp_kses( $error, array() ); ?> <?php _e( 'Login Error', 'wt-social-login' ); ?></h4>
<p><?php _e( 'Please fill the credentials to login', 'wt-social-login' ); ?> </p>
