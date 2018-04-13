<?php


add_action('wp_ajax_user_settings_notification','user_settings_notification');
function user_settings_notification() {
 
		global $wpdb;
		$user = wp_get_current_user();
		$userId = $user->ID;
 
		// get user settings status

		$notification 					=	us_user_settings_status('notification');
		$courage_reply_notify 			=	us_user_settings_status('courage_reply_notify');
		$courage_care_notify 			=	us_user_settings_status('courage_care_notify');
		$courage_mention_notify 		=	us_user_settings_status('courage_mention_notify');
		$courage_email_digest 			=	us_user_settings_status('courage_email_digest');
		$rareteam_invite_notify			=	us_user_settings_status('rareteam_invite_notify');
		$rareteam_accept_decline_notify	=	us_user_settings_status('rareteam_accept_decline_notify');
		$rareteam_share_notify			=	us_user_settings_status('rareteam_share_notify');
		$new_post_rareteam				=	us_user_settings_status('new_post_rareteam');
		$welcome_mail_notification		=	us_user_settings_status('welcome_mail_notify');
		$profile_message_notify			=	us_user_settings_status('profile_message_notify');
		

		$notification_actv  					= ($notification_actv )? (( $notification->is_visible ) ? 'checked="checked"' : ''):'checked="checked"' ;
		$courage_reply_notify_actv 				= ($courage_reply_notify)? (($courage_reply_notify->is_visible)? 'checked="checked"' : '') : 'checked="checked"' ;
		$courage_care_notify_actv 				= ($courage_care_notify)? ( ($courage_care_notify->is_visible)? 'checked="checked"' : '' ) :'checked="checked"' ;
		$courage_mention_notify_actv 			= ($courage_mention_notify)? ( ($courage_mention_notify->is_visible)? 'checked="checked"' : '' ) : 'checked="checked"' ;
		$courage_email_digest_actv 				= ( $courage_email_digest )? ( ($courage_email_digest->is_visible)? 'checked="checked"' : '' ) : 'checked="checked"' ;
		$rareteam_invite_notify_actv 			= ($rareteam_invite_notify)? ( ($rareteam_invite_notify->is_visible)? 'checked="checked"' : '' ) : 'checked="checked"' ;
		$rareteam_accept_decline_notify_actv 	= ($rareteam_accept_decline_notify)? ( ($rareteam_accept_decline_notify->is_visible)? 'checked="checked"' : '') : 'checked="checked"' ;
		$rareteam_share_notify_actv 			= ($rareteam_share_notify)? ( ($rareteam_share_notify->is_visible)? 'checked="checked"' : '') : 'checked="checked"' ;
		$new_post_rareteam_actv 				= ($new_post_rareteam)? ( ($new_post_rareteam->is_visible)? 'checked="checked"' : '') : 'checked="checked"' ;
		$welcome_mail_notification_actv 		= ($welcome_mail_notification) ? ( ($welcome_mail_notification->is_visible)? 'checked="checked"' : '' ) : 'checked="checked"' ;
		$profile_message_notify_actv 			= ($profile_message_notify)? ( ($profile_message_notify->is_visible)? 'checked="checked"' : '') : 'checked="checked"' ;


	
	$out = '<div id="notiSettings" class="row col-sm-12">
            <h3> notification settings </h3> <h2>Send me an email when:</h2>
			
			<form name="us_update_notification_form" id="us_update_notification_form" >
			<input type="hidden" name="us_update_notification_flag" id="us_update_notification_flag" value="0" />
			';
       /* <div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">email notifications</label>
                        <input type="checkbox" data-toggle="toggle" id="notification" class="gen_but" rel="' . $notification->is_visible . '" '.$notification_actv.'>
                        </div>
        </div>*/
		$out .=' <div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">a member replies to a post I\'ve added</label>
                        <input type="checkbox" data-toggle="toggle" id="courage_reply_notify" class="gen_but" rel="' . $courage_reply_notify->is_visible . '" '.$courage_reply_notify_actv.'>
                        </div>
        </div>
		 <div class="row" style="display:none;">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">a member cares about a post I\'ve added</label>
                        <input type="checkbox" data-toggle="toggle" id="courage_care_notify" class="gen_but" rel="' . $courage_care_notify->is_visible . '" '.$courage_care_notify_actv.'>
                        </div>
        </div>
		 <div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">a member mentions me in a post</label>
                        <input type="checkbox" data-toggle="toggle" id="courage_mention_notify" class="gen_but" rel="' . $courage_mention_notify->is_visible . '" '.$courage_mention_notify_actv.'>
                        </div>
        </div>
		<div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">a member sends me a message
						</label>
                        <input type="checkbox" data-toggle="toggle" id="profile_message_notify" class="gen_but" rel="' . $profile_message_notify->is_visible . '" '.$profile_message_notify_actv.'>
                        </div>
        </div>
		
		<div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">a member invites me to a rareTeam</label>
                        <input type="checkbox" data-toggle="toggle" id="rareteam_invite_notify" class="gen_but" rel="' . $rareteam_invite_notify->is_visible . '" '.$rareteam_invite_notify_actv.'>
                        </div>
        </div>
		<div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">a member accepts/ declines an invite to my SCDteam </label>
                        <input type="checkbox" data-toggle="toggle" id="rareteam_accept_decline_notify" class="gen_but" rel="' . $rareteam_accept_decline_notify->is_visible . '" '.$rareteam_accept_decline_notify_actv.'>
                        </div>
        </div>
		<div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">a member adds a post to a SCDteam I belong to</label>
                        <input type="checkbox" data-toggle="toggle" id="new_post_rareteam" class="gen_but" rel="' . $new_post_rareteam->is_visible . '" '.$new_post_rareteam_actv.'>
                        </div>
        </div><div class="row">
                        <div class="col-sm-12 form-group borderclass">                          
                        </div>
        </div>';
		
		/* <div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">a member shares a post to a rareTeam I belong to</label>
                        <input type="checkbox" data-toggle="toggle" id="rareteam_share_notify" class="gen_but" rel="' . $rareteam_share_notify . '" '.$rareteam_share_notify_actv.'>
                        </div>
        </div>*/
        $out .=' <div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">digest of recently added SMART Social Wall posts</label>
                        <input type="checkbox" data-toggle="toggle" id="courage_email_digest" class="gen_but" rel="' . $courage_email_digest->is_visible . '" '.$courage_email_digest_actv.'>
                        </div>
        </div>
        <div class="row">
                        <div class="col-sm-12 form-group card required">
                        <label class="checkbox-inline">updates on site features and functionality </label>
                        <input type="checkbox" data-toggle="toggle" id="welcome_mail_notify" class="gen_but" rel="' . $welcome_mail_notification->is_visible . '" '.$welcome_mail_notification_actv.'>
                        </div>
        </div>
		<div class="row">
                          <div class="col-sm-12 form-group">
                          <div class="footer-btn-row settings-footer-bolck"> 
						  
							<button class="btn button-green" id="us_update_notify_settings" type="button">update</button>
							<input type="reset" name="us_notify_settings_reset"  id="us_notify_settings_reset" style="display:none" />
						  	<div class="settings-spinner notfy-spinner" style="display: none;"><i class="fa fa-spinner"></i></div>
						  </div>              
                          </div>
						  	
         </div>
		
       </div> 
	   
	   </form>';
	echo $out;
}


add_action( 'wp_ajax_us_updatenotification', 'us_updatenotification' );
function us_updatenotification() {
	global $wpdb;
	$user = wp_get_current_user();
	$notification 					= $_POST['notification'];
	$courage_reply_notify 			= $_POST['courage_reply_notify'];
	$courage_care_notify 			= $_POST['courage_care_notify'];
	$courage_mention_notify 		= $_POST['courage_mention_notify'];
	$courage_email_digest 			= $_POST['courage_email_digest'];
	$rareteam_invite_notify 		= $_POST['rareteam_invite_notify'];
	$rareteam_accept_decline_notify = $_POST['rareteam_accept_decline_notify'];
	$rareteam_share_notify 			= $_POST['rareteam_share_notify'];
	$new_post_rareteam 				= $_POST['new_post_rareteam'];
	$welcome_mail_notify 			= $_POST['welcome_mail_notify'];
	$profile_message_notify 		= $_POST['profile_message_notify'];
	
	($notification == 0)?$notification_status = 'no':$notification_status = 'yes';
	
	$table = 'wp_users';
	$data = array(
		'notification_status' => $notification_status
	);
	$where = array(
		'ID' =>	$user->ID
	);
	$wpdb->update( $table, $data, $where );
	
	// updating the settings

	us_update_user_settings( 'notification',$notification ,$notification );
	us_update_user_settings( 'courage_reply_notify',$courage_reply_notify ,$courage_reply_notify );
	us_update_user_settings( 'courage_care_notify',$courage_care_notify ,$courage_care_notify );
	us_update_user_settings( 'courage_mention_notify',$courage_mention_notify ,$courage_mention_notify );
	us_update_user_settings( 'courage_email_digest',$courage_email_digest ,$courage_email_digest );
	us_update_user_settings( 'rareteam_invite_notify',$rareteam_invite_notify ,$rareteam_invite_notify );
	us_update_user_settings( 'rareteam_accept_decline_notify',$rareteam_accept_decline_notify ,$rareteam_accept_decline_notify );
	us_update_user_settings( 'rareteam_share_notify',$rareteam_share_notify ,$rareteam_share_notify );
	us_update_user_settings( 'new_post_rareteam',$new_post_rareteam ,$new_post_rareteam );
	us_update_user_settings( 'welcome_mail_notify',$welcome_mail_notify ,$welcome_mail_notify );
	us_update_user_settings( 'profile_message_notify',$profile_message_notify ,$profile_message_notify );


	do_action('onvus_after_notification_settings_updated',$courage_email_digest,$user );

}




