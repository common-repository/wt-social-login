(function( $ ) {
	'use strict';

    $(document).ready(function (a) {

        $('.unlink').click(function (e) {
            e.preventDefault();
            var platform = $(this).data("platform");


            $.ajax({
                url: wt_sl_login_unlink.sl_login_unlink,
                type: 'POST',
                data: {
                    action: 'sl_unlink',
                    platform: platform,
                    wt_nonce: wt_sl_login_unlink.wt_nonce
                },
                success: function (response) {
                  console.log(response);
                    location.reload(); //todo remove pageload and use ajax

                },
                error: function (error) {
                    alert("Deletion Failed"); //TODO Optimize based on requirements
                }
            });
        });
    });

})( jQuery );
