jQuery('document').ready(function(){
   
     jQuery('.user-settings-status').on('change',function( e ){
		
		var noti_status = jQuery(this).attr('checked');
		if( noti_status == undefined ) {
			status_to = 0;
		} else {
			status_to = 1;
		}
		var settings_id	= jQuery(this).attr('settings-id');
		var data = {
			action		: 'us_enable_disable_user_settings',
			settings_id	: settings_id,
			status_to	: status_to
		};
		jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			success: function( response ) {
				if( false === response  ) {
					Alert.render('something went wrong', "alert-fapvoice");
				} else {
					jQuery('.custom_notification_section_success').show();
					setTimeout(function() {
						jQuery('.custom_notification_section_success').hide();
					}, 500);
				}
			}
		});
	});
	
});