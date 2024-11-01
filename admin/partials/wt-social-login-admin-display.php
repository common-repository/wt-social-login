<?php
/**
 *  Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wrap">
	<div id="alerts">

	</div>
	<div id="icon-themes" class="icon32"></div>
	<h2><?php _e( 'WordPress Social Login Settings', 'wt-social-login' ); ?></h2>
	<?php settings_errors(); ?>
	<h2 class="nav-tab-wrapper">
		<a href="<?php echo admin_url( 'admin.php?page=wt-social-login&tab=general-settings' ); ?>"
		   class="nav-tab  <?php echo ( $tab == 'general-settings' || ! $tab ) ? 'nav-tab-active' : ''; ?> "> <?php _e( 'General', 'wt-social-login' ); ?></a>
		<a href="<?php echo admin_url( 'admin.php?page=wt-social-login&tab=facebook-settings' ); ?>"
		   class="nav-tab <?php echo ( $tab == 'facebook-settings' ) ? 'nav-tab-active' : ''; ?> "> <?php _e( 'Facebook', 'wt-social-login' ); ?></a>
		<a href="<?php echo admin_url( 'admin.php?page=wt-social-login&tab=google-settings' ); ?>"
		   class="nav-tab <?php echo ( $tab == 'google-settings' ) ? 'nav-tab-active' : ''; ?> "> <?php _e( 'Google', 'wt-social-login' ); ?></a>
		<a href="<?php echo admin_url( 'admin.php?page=wt-social-login&tab=linkedin-settings' ); ?>"
		   class="nav-tab <?php echo ( $tab == 'linkedin-settings' ) ? 'nav-tab-active' : ''; ?> "> <?php _e( 'LinkedIn', 'wt-social-login' ); ?></a>
	</h2>


</div>
<div class="wrap">
		<?php 
			$settings_class = '';
			if(!empty($_GET['tab'])) {
				switch($_GET['tab']) {
					case 'general-settings':
						$settings_class = ' wt-sl-general';
						break;
				}
			}else{
				$settings_class = ' wt-sl-general';//'tab' index empty means default plugin page.
			}
		?>
	<div class="bg-white wt-sl-settings<?php echo $settings_class;?>">
		
		<div class="sl-settings-left">
			<form action="options.php" method="post">
				<?php
				settings_fields( 'wt_social_login_settings' );
				do_settings_sections( $this->plugin_name );
				submit_button();
				?>
			</form>
		</div>
			
		<div class="sl-settings-right">
			<?php
				do_action('wt_sl_app_instructions');
			?>
		</div>

	</div>
</div>
