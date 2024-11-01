(function ($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$( document ).ready(
		function (a) {

			$( '.unlink' ).click(
				function (e) {
					e.preventDefault();
					var platform = $( this ).data( "platform" );

					$.ajax(
						{
							url: wt_sl_login_unlink.sl_login_unlink,
							type: 'POST',
							data: {
								action: 'sl_unlink',
								platform: platform,
								wt_nonce: wt_sl_login_unlink.wt_nonce
							},
							success: function (response) {
								console.log( response );
								location.reload(); // todo remove pageload and use ajax

							},
							error: function (error) {
								alert( "Deletion Failed" ); // TODO Optimize based on requirements
							}
						}
					);
				}
			);
		}
	);

})( jQuery );
