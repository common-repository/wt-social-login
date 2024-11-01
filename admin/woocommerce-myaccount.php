<?php
$wt_user_meta = get_user_meta( get_current_user_id() );
?>
<h2>
    <?php
    $wt_social_login_title = get_option( 'wt_social_login_title' );
    if ( ! $wt_social_login_title ) {
	$wt_social_login_title = 'Social Login Accounts';
    }
    _e( $wt_social_login_title, 'wt-social-login' );
    ?>
</h2>
<p><?php _e( 'Your account is connected to the following social login providers.', 'wt-social-login' ); ?> </p>
<table width="100%" id="sl-plugin">
    <tr>
	<th><?php _e( 'Provider', 'wt-social-login' ); ?></th>
	<th><?php _e( 'Account', 'wt-social-login' ); ?></th>
	<th><?php _e( 'Last Login', 'wt-social-login' ); ?></th>
	<th><?php _e( 'Actions', 'wt-social-login' ); ?></th>
    </tr>
    <tr>
	<td><b>Google</b></td>
	<td>
	    <?php
	    if ( ! empty( $wt_user_meta[ 'google_email' ][ 0 ] ) ) {
		echo $wt_user_meta[ 'google_email' ][ 0 ];
	    }
	    ?>
	</td>
	<td>
	    <?php
	    if ( ! empty( $wt_user_meta[ 'google_last_login' ][ 0 ] ) ) {
		echo $wt_user_meta[ 'google_last_login' ][ 0 ];
	    }
	    ?>
	</td>
	<td><?php if ( ( ! empty( $wt_user_meta[ 'google_link_status' ][ 0 ] ) ) && $wt_user_meta[ 'google_link_status' ][ 0 ] == 1 ) { ?>
    	    <button data-platform="google"  class="unlink">Unlink</button>
	    <?php } else { ?>
    	    <div>Link</div>
    <?php include 'google.php';
} ?>
	</td>
    </tr>

    <tr>
	<td><b>LinkedIn</b></td>
	<td>
	    <?php
	    if ( ! empty( $wt_user_meta[ 'linkedin_email' ][ 0 ] ) ) {
		echo $wt_user_meta[ 'linkedin_email' ][ 0 ];
	    }
	    ?>
	</td>
	<td>
	    <?php
	    if ( ! empty( $wt_user_meta[ 'linkedin_last_login' ][ 0 ] ) ) {
		echo $wt_user_meta[ 'linkedin_last_login' ][ 0 ];
	    }
	    ?>
	</td>
	<td><?php if ( ( ! empty( $wt_user_meta[ 'linkedin_link_status' ][ 0 ] ) ) && $wt_user_meta[ 'linkedin_link_status' ][ 0 ] == 1 ) { ?>
    	    <button data-platform="linkedin"  class="unlink">Unlink</button>
<?php } else { ?>
    	    <div>Link</div>
    <?php include 'linkedin.php';
} ?>
	</td>
    </tr>



    <tr>
	<td><b>Facebook</b></td>
	<td>
	    <?php
	    if ( ! empty( $wt_user_meta[ 'facebook_email' ][ 0 ] ) ) {
		echo $wt_user_meta[ 'facebook_email' ][ 0 ];
	    }
	    ?>
	</td>
	<td>
	    <?php
	    if ( ! empty( $wt_user_meta[ 'facebook_last_login' ][ 0 ] ) ) {
		echo $wt_user_meta[ 'facebook_last_login' ][ 0 ];
	    }
	    ?>
	</td>
	<td><?php if ( ( ! empty( $wt_user_meta[ 'facebook_link_status' ][ 0 ] ) ) && $wt_user_meta[ 'facebook_link_status' ][ 0 ] == 1 ) { ?>
    	    <button data-platform="facebook"  class="unlink">Unlink</button>
<?php } else { ?>
    	    <div>Link</div>
    <?php
    include 'facebook.php';
}
?>
	</td>
    </tr>
</table>
