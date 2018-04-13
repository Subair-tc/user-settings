jQuery(document).ready(function() {

	$('#us_update_password_flag').val(0);

	baseUrl=window.location.origin;
 	$("#us_country").on("change",function() {
		var val =  $(this).val();
		if ( val== 'US'  ) {
			$("#us_state_province").hide();
			$("#state_province").show();
			$('.state-label-span').hide();
		} else {
			$("#us_state_province").show();
			$("#state_province").hide();
			$('.state-label-span').show();
		}
	});


	$( '#us_twitter_ac' ).on("change",function(){
		var value = $(this).prop('checked');
		if(value) {
			$("#us_twitter_ac_name").show();
		} else {
			$("#us_twitter_ac_name").hide();
		}
	});
	$( '#us_pinterest_ac' ).on("change",function(){
		var value = $(this).prop('checked');
		if(value) {
			$("#us_pinterest_ac_name").show();
		} else {
			$("#us_pinterest_ac_name").hide();
		}
	});

	$( '#instagram_ac' ).on("change",function(){
		var value = $(this).prop('checked');
		if(value) {
			$("#us_instagram_user_name").show();
		} else {
			$("#us_instagram_user_name").hide();
		}
	});
	

	$( '#us_youtube_ac' ).on("change",function(){
		var value = $(this).prop('checked');
		if(value) {
			$("#us_youtube_ac_name").show();
		} else {
			$("#us_youtube_ac_name").hide();
		}
	});
	
	$('#us_profile_privacy_submit').on( "click",function( e ) {
		e.preventDefault();
		$(".profile-spinner").show();
		var display_name 			= $("#us_display_name").val();
		if( $.trim(display_name) == '' ) {
			$("#us_display_name_error").html("please enter display name");
			$("#us_display_name_error").show();
			$("#us_display_name").focus();
			$(".profile-spinner").hide();
			return;
		} else{ 
			$("#us_display_name_error").hide();
		}
		var us_my_story 			= $("#us_my_story").val();
		var us_twitter_ac_name 		= $("#us_twitter_ac_name").val();
		var us_instagram_user_name	= $("#us_instagram_user_name").val();
		var us_pinterest_ac_name	= $("#us_pinterest_ac_name").val();
		var us_youtube_ac_name	    = $("#us_youtube_ac_name").val();
		var us_first_name			= $("#us_first_name").val();
		var fname_status			= $("#fname_status").prop('checked');
		var us_last_name			= $("#us_last_name").val();
		var lname_status			= $("#lname_status").prop('checked');
		var us_sex					= $("#us_sex").val();
		var sex_status				= $("#sex_status").prop('checked');
		var month					= $("#month").val();
		var day						= $("#day").val();
		var us_year					= $("#us_year").val();
		var us_age					= $("#us_age").val();
		var age_status				= $("#age_status").prop('checked');
		var us_country				= $("#us_country").val();
		var country_status			= $("#country_status").prop('checked');
		var us_state_province		= $("#us_state_province").val();
		var state_province			= $("#state_province").val();
		var state_status			= $("#state_status").prop('checked');
		var us_city_province		= $("#us_city_province").val();
		var city_status				= $("#city_status").prop('checked');

		//scoial media

		var us_twitter_ac			= $("#us_twitter_ac").prop('checked');
		var instagram_ac			= $("#instagram_ac").prop('checked');
		var us_pinterest_ac			= $("#us_pinterest_ac").prop('checked');
		var us_youtube_ac			= $("#us_youtube_ac").prop('checked'); 
		var state;
		if( us_country !== "US") {
			  state = us_state_province;
		} else {
			  state = state_province;
		}

		var data = {
			action					: 'update_user_profile_and_privacy',
			display_name			: $.trim(display_name),
			us_my_story				: $.trim( us_my_story),
			us_twitter_ac_name		: $.trim(us_twitter_ac_name),
			us_instagram_user_name	: $.trim(us_instagram_user_name),
			us_pinterest_ac_name	: $.trim(us_pinterest_ac_name),
			us_youtube_ac_name		: $.trim(us_youtube_ac_name),
			us_first_name			: $.trim(us_first_name),
			fname_status			: $.trim(fname_status),
			us_last_name			: $.trim(us_last_name),
			lname_status			: $.trim(lname_status),
			us_sex					: $.trim( us_sex),
			sex_status				: $.trim(sex_status),
			month					: $.trim(month),
			day						: $.trim(day),
			us_year					: $.trim(us_year),
			us_age					: $.trim(us_age),
			age_status				: $.trim(age_status),
			us_country				: $.trim(us_country),
			country_status			: $.trim(country_status),
			us_state_province		: $.trim(state),
			state_status			: $.trim(state_status),
			us_city_province		: $.trim(us_city_province),
			city_status				: $.trim(city_status),
			us_twitter_ac			: $.trim(us_twitter_ac),
			instagram_ac			: $.trim(instagram_ac),
			us_pinterest_ac			: $.trim(us_pinterest_ac),
			us_youtube_ac			: $.trim(us_youtube_ac),
		};
		jQuery.ajax({
			type: "POST",
			async: true,
			url: ajaxurl,
			data: data,
			success: function( response ) {
				$(".profile-spinner").hide();
				if( response === 'display_name_error' ) {
						$("#us_display_name_error").html("username is not available");
						$("#us_display_name_error").show();
						$("#us_display_name").focus();
						return;
				}
				Alert.render("got it, thanks!","alert-settings-icon");
				$('html, body').animate({
					scrollTop: 0
				}, 700);
				
				var postname="profile_and_privacy_settings_updated";
				var postdesc="Update Profile and Privacys Settings";
				var seedname="profile_and_privacy_settings_updated";
				activityTracking(postname,postdesc,seedname);
				//location.reload();
			}
		});
	
	
	
		
	});



	// notification updation
	$('#us_update_notify_settings').on('click',function() {
		$(".notfy-spinner").show(); 
		 var notification					=	0;
		var courage_reply_notify			=	0;
		var courage_care_notify 			=	0;		
		var	courage_mention_notify			=	0;
		var	courage_email_digest			=	0;
		var	rareteam_invite_notify			=	0;
		var rareteam_accept_decline_notify	=	0;
		var rareteam_share_notify			=	0;
		var new_post_rareteam				=	0;
		var welcome_mail_notify 			=	0;
		var profile_message_notify 			=	0;

		if($('input#notification:checked').length) {
			notification = 1;
		}
		if($('input#courage_reply_notify:checked').length) {
			courage_reply_notify = 1;
		}
		if($('input#courage_care_notify:checked').length) {
			courage_care_notify = 1;
		}
		if($('input#courage_mention_notify:checked').length) {
			courage_mention_notify = 1;
		}
		if($('input#courage_email_digest:checked').length) {
			courage_email_digest = 1;
		}
		if($('input#rareteam_invite_notify:checked').length) {
			rareteam_invite_notify = 1;
		}
		if($('input#rareteam_accept_decline_notify:checked').length) {
			rareteam_accept_decline_notify = 1;
		}
		if($('input#rareteam_share_notify:checked').length) {
			rareteam_share_notify = 1;
		}
		if($('input#new_post_rareteam:checked').length) {
			new_post_rareteam = 1;
		}
		if($('input#welcome_mail_notify:checked').length) {
     		 welcome_mail_notify = 1;
   		}
	
		if($('input#profile_message_notify:checked').length) {
			profile_message_notify = 1;
		}
		/*var confirmBox = $('input#noti_settings_changed').attr('rel');
			if(confirmBox >= 1) {
				$('body').append('<span class="form_loader"><img src="'+baseUrl+'/application/themes/onevoice/images/loadingIcon.GIF"/></span>');
			} else {
			  if($('#genSet .load').length<=0)
			  $("button#acUpdate").after('<img src='+baseUrl+'/application/plugins/mySettings/images/ajax-loader.gif class="load">');
			}*/
		
		 
			var data = {
				action								:	'us_updatenotification',
				notification						:	notification,
				courage_reply_notify				:	courage_reply_notify,
				courage_care_notify					:	courage_care_notify,
				courage_mention_notify				:	courage_mention_notify,
				courage_email_digest				:	courage_email_digest,
				rareteam_invite_notify				:	rareteam_invite_notify,
				rareteam_accept_decline_notify		:	rareteam_accept_decline_notify,
				rareteam_share_notify				:	rareteam_share_notify,
				new_post_rareteam					:	new_post_rareteam,
				welcome_mail_notify					:	welcome_mail_notify,
				profile_message_notify				:	profile_message_notify
			};
      

     	jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			success: function(response) {
				$(".notfy-spinner").hide();
				Alert.render("got it, thanks!","alert-settings-icon");
				// Activity Tracking
				var postname="notification_settings_updated";
				var postdesc="Updated notification settings.";
				var seedname="notification_settings_updated";
				activityTracking(postname,postdesc,seedname);

				$('html, body').animate({
					scrollTop: 0
				}, 700);
			}
		});
		
		
		
	});
	// ends notification updation

	//rareTeam edit team name settings
jQuery('#us_edit_group_set').on('click',function(e) {
		$(".rareteam-spinner").show();
		e.preventDefault();
		$('#us_update_rareteam_flag').val(0); 
		 $(".error").hide();//Hiding error message
        var hasError=false;//Error checking variable
      	var gName=$('input#group-name').val();
          var group_desc=$('textarea#group-desc').val();
          var grp_id = $('input#group-name').attr('grp_id'); 
          gName      = $.trim(gName);
          group_desc = $.trim(group_desc);
          if (gName === '') {
              $('input#group-name').after('<span class="error">please enter your SCDteam name</span>');
              hasError = true;
          }
          if(hasError === true){
            $(".rareteam-spinner").hide();return false;
          }
          else
          {
          var confirmBox = $('input#rareT_settings_changed').attr('rel');


           var title_change = $('#group-name').attr('editFlag'); 
           var mission_change = $('#group-desc').attr('editFlag');
           var data = 
              {
            action: 'ajax_us_updterare_team',
            gName: gName,
            group_desc: group_desc,
            grp_id: grp_id,
            title_change:title_change,
            mission_change:mission_change
              };
        	jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			success: function(response) {
				$(".rareteam-spinner").hide();
				if( response === 'error0' ){
                  Alert.render("something went wrong!!..","alert-settings-icon"); 
                }
                else {
                  Alert.render("got it, thanks!","alert-settings-icon"); 
                  $('input#rareT_settings_changed').val(0);
                  $('#group-name').attr('editFlag','0');
                  $('#group-desc').attr('editFlag','0');
                  $('input#rareT_settings_changed').attr('rel','0');//updated so change value 0.
                  $('.binder-over').hide();
                  if(confirmBox === 2 )
					window.location = is_link;
				  
					var postname="rareteam_settings_updated";
					var postdesc="Updated SCDteam settings.";
					var seedname="rareteam_settings_updated";
					activityTracking(postname,postdesc,seedname);
				}
				$('html, body').animate({
					scrollTop: 0
				}, 700);
			}
              });
        }
  });
//ends rareTeam edit team name settings


//Change password validation & submit
    jQuery('#us_changePass').on('click',function() {
		$(".password-spinner").show();
      $(".error").hide();
	  var hasError = false;
	  var oldPass=jQuery('input:[name=oldPass]').val();
      var newPass=jQuery('input:[name=newPass]').val();
      var repPass=jQuery('input:[name=repeatPass]').val();
      var passCheck=/^(?=.*\d)(?=.*[A-Z])(?!.*[^a-zA-Z0-9@!#%&*$+=])(.{8,20})$/.test(newPass);

		if( oldPass == '' ) {
				$('input:[name=oldPass]').after('<span class="error">please enter your current password.</span>');
				hasError = true;
		}
		else if (newPass ==='') {
            $('input:[name=newPass]').after('<span class="error">please enter new password.</span>');
            hasError = true;
        } 
       else if(!passCheck)
       {
       $('input:[name=newPass]').after("<span class='error'>Sorry. Passwords must be 8-20 characters long and include one number and one capital letter.</span>");
            hasError = true;
       }
        else if (repPass === '') {
            $('input:[name=repeatPass]').after('<span class="error">please re-enter your password.</span>');
            hasError = true;
        } else if (newPass !== repPass ) {
            $('input:[name=repeatPass]').after('<span class="error">Passwords do not match.</span>');
            hasError = true;
        }
        
        if(hasError === true) 
        {
			$(".password-spinner").hide();return false;
        }
        else
        {
 
         var data = 
            {
          action: 'us_update_user_password',
          newPass: newPass,
		  repPass:repPass,
		  oldPass:oldPass
            };
      
        // the_ajax_script.ajaxurl is a variable that will contain the url to the ajax processing file
        jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			success: function(response) {
				$(".password-spinner").hide();
				
				var result = JSON.parse(response);
				if( result.error === false) {
					postname="general_settings_update_password";
					postdesc="Updates password from my-setings";
					seedname="general_settings_update_password";
					activityTracking(postname,postdesc,seedname);

					Alert.render("you have successfully changed your password. please log in with your new password!","alert-settings-icon"); 
					$('.btn-cust-ok').live('click',function(){
						window.location.href = baseUrl+'/login/?loggedout=true';
					});
				} else if( result.password == 'old-not-match'){
					$('input:[name=oldPass]').after('<span class="error">Sorry, this doesn\'t match your current password.</span>');
				}
				else if( result.password =='used-already') {
					 $('input:[name=repeatPass]').after('<span class="error">Please use new password.</span>');
				} else {
					$('input:[name=repeatPass]').after('<span class="error">Error updating password.</span>');
				}
			
			}
              
        });
        }
      
    });
	//Ends Change password validation & submit
	
	// update email
	jQuery('#us_update_email').on('click',function(e) {
		$(".email-spinner").show();
		e.preventDefault();
		var user_email = $("#us_email_address").val();
		 
			  	
         var data = 
         {
			action		: 'us_update_user_email',
			user_email	: user_email
		};
		
		 jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			success: function(response) {
				$(".email-spinner").hide();
				response = $.trim(response);
				if( response == "user_email_error" ) {
					  Alert.render("this email address isn’t available. please try again.","alert-settings-icon"); 
				 } else if( response == "not_changed") {
					 Alert.render("please change email id update","alert-settings-icon"); 
				 } else if (response == "not_valid_email") {
					  Alert.render("please enter valid email address","alert-settings-icon"); 
				} else {
					Alert.render("got it, thanks!","alert-settings-icon");
					postname="general_settings_update_email";
					postdesc="Updates email from my-setings";
					seedname="general_settings_update_email";
					activityTracking(postname,postdesc,seedname);

				}
				 
				  $('html, body').animate({
					scrollTop: 0
				}, 700);
				  
				}
			});
		});
		

		//Managing settings tab

		jQuery('.mysettings-tabs .tab-links a').on('click', function(e)  {
			var currentAttrValue = jQuery(this).attr('href');

			var a_class =$(this).hasClass('contact_us_btn');
			if( a_class )  {
				return;
			}
			// Show/Hide Tabs
			jQuery('.mysettings-tabs ' + currentAttrValue).show().siblings().hide();
	
			// Change/remove current tab to active
			window.preAct=jQuery(this).parents().eq(2).find('li.active a').attr('href');
			window.preActLi=jQuery(this).parents().eq(2).find('li.active');
		

			jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
	
			e.preventDefault();
		});




	$('#us_profile_privacy_form').bind('change','input,select,textarea',function(){
	//$('#us_profile_privacy_form').bind('input,select,textarea', function(){
		$('input#us_profile_privacy_flag').val(1);
	});

	$('#us_update_password_form').on('change','input',function(){
	//$('#us_update_password_form').bind('input', function(){	
		$('input#us_update_password_flag').val(1);
	});

	$('#us_update_email_form').bind('change','input,select,textarea',function(){
	//$('#us_update_email_form').bind('input,select,textarea', function(){	
		$('input#us_update_email_flag').val(1);
	});

	$('#us_update_rareteam_form').bind('change','input,select,textarea',function(){
	//$('#us_update_rareteam_form').bind('input,select,textarea', function(){	
		$('input#us_update_rareteam_flag').val(1);
	});
	
	$('#us_update_notification_form').bind('change','input,select,textarea',function(){
	//$('#us_update_notification_form').bind('input,select,textarea', function(){	
		$('input#us_update_notification_flag').val(1);
	});


	$('#us_cancel_email_updation, #us_update_email').on('click',function(){
		$('#us_update_email_flag').val(0);
	});
	$('#us_cancelPass, #us_changePass').on('click',function(){
		$('#us_update_password_flag').val(0);

	});
	$('#us_profile_privacy_reset, #us_profile_privacy_submit').on('click',function(){
		$('#us_profile_privacy_flag').val(0);
	});

	$("#us_update_notify_settings").on('click',function(){
		$('#us_update_notification_flag').val(0);
	});
	
	$('#us_update_password_form').on('reset',function() {
		$('#us_changePass').attr('disabled','true');
		$('#us_cancelPass').attr('disabled','true');
	});

	$('#us_repeatPass, #us_newPass ').on('keyup',function() {
		var us_newPass 		=	$('#us_newPass').val();
		var us_repeatPass	=	$('#us_repeatPass').val();
		var us_oldPass		=	$('#us_oldPass').val();
		if( us_newPass !='' && us_repeatPass != '' && us_oldPass != '' ) {
			$('#us_changePass').removeAttr('disabled');
			$('#us_cancelPass').removeAttr('disabled');
		} else{
			$('#us_changePass').attr('disabled','true');
			$('#us_cancelPass').attr('disabled','true');
		}
	});

	$("#rareteam_settings").on('change','#group-name',function(){
		$('#group-name').attr('editFlag','1');
	});
	//ends rareTeam tittle change

	$("#rareteam_settings").on('change','#group-desc',function(){
		$('#group-desc').attr('editFlag','1');
	});
	 

		//tab change event listener
$('.mysettings-tabs').on('click',' #tabs ul li',function(event){
	var updateStatus  = false;
	var updateHidden  = '';
	var resetButton = '';
	var currentAttrValue = $(this);
	window.tabHref  	= $(this).find('a').attr('href');//clicked tab id
	if( preAct != tabHref && typeof tabHref !='undefined' )  {
		var profile_privacy		= $('input#us_profile_privacy_flag').val();
		var update_password		= $('input#us_update_password_flag').val(); console.log(update_password);
		var update_email   		= $('input#us_update_email_flag').val();
		var update_rareteam		= $('input#us_update_rareteam_flag').val();
		var update_notification	= $('input#us_update_notification_flag').val();
	    var triggerButton = '';
		if( profile_privacy === '1' ) { 
				triggerButton	= '#us_profile_privacy_submit';
				resetButton		= '#us_profile_privacy_reset';
				updateHidden	= '#us_profile_privacy_flag';
				updateStatus	=  true;
		} else if( update_password === '1' ) {
				triggerButton	= '#us_changePass';
				resetButton		= '#us_cancelPass';
				updateHidden	= '#us_update_password_flag';
				updateStatus	= true;
		} else if( update_email === '1' ) {
				triggerButton	= '#us_update_email';
				resetButton		= '#us_cancel_email_updation';
				updateHidden	= '#us_update_email_flag';
				updateStatus	= true;
		} else if( update_rareteam === '1' ) {
				triggerButton = '#us_edit_group_set';
				resetButton		= '#us_edit_group_reset';
				updateHidden  = '#us_update_rareteam_flag';
				updateStatus  = true;
		} else if( update_notification === '1' ) {
				triggerButton = '#us_update_notify_settings';
				resetButton		= '#us_notify_settings_reset';
				updateHidden  = '#us_update_notification_flag';
				updateStatus  = true;
		}
		console.log('triggerButton'+triggerButton);
		console.log('tabHref'+tabHref);
		console.log('updateStatus' + updateStatus);
		if(updateStatus === true) { 
			$('<div ></div>').appendTo('body')
			.html('<img src="'+baseUrl+'/application/themes/onevoice/images/settings-icon.png" class="settings-confbox"/>')
			.dialog({
				modal: true,
				title: 'you have unsaved changes. do you want to save?',
				autoOpen: true,
				width: 'auto',
				resizable: false,
				buttons: {
					yes: function () {  
						$('.binder-over').hide();  
						$(updateHidden).val('rel','1');   
						$(this).dialog("close");
						$(triggerButton).trigger('click');


						// Show/Hide Tabs
						//	$(preAct).show();
						//	$(tabHref).hide();
						// currentAttrValue.removeClass('active');
						//	preActLi.addClass('active');

						return true;
					},
					no: function () {
						if( update_notification == 1 ) { // refershing  for notification.
							var refesh_parameter = '';
							if( tabHref == '#profile_privacy') {
								refesh_parameter = '';
							} else if ( tabHref == '#user_notification') {
								refesh_parameter = '/?from=user_notification';
							} else if ( tabHref == '#login_settings') {
								refesh_parameter = '/?from=login_settings';
							} else if ( tabHref == '#rareteam_settings') {
								refesh_parameter = '/?from=rareteam_settings';
							}
							var cur_url      = window.location.origin;
							window.location.href = cur_url + '/settings/' +refesh_parameter;
						}

						$('.binder-over').hide();
						$(resetButton).trigger('click'); 
						$(this).dialog("close");
						$(updateHidden).val(0);
						return false;
					}  
				},create:function () {
					$('.binder-over').show();  

				}
			});     
		}
			
	}
	//ends if(updateStatus == true)
});
//ends tab change event listener

	

});
	

var numDays = {
		'1': 31, '2': 28, '3': 31, '4': 30, '5': 31, '6': 30,
		'7': 31, '8': 31, '9': 30, '10': 31, '11': 30, '12': 31
};

function setDays(oMonthSel, oDaysSel, oYearSel) {
	var nDays, oDaysSelLgth, opt, i = 1;
	nDays = numDays[oMonthSel[oMonthSel.selectedIndex].value];

	if (nDays == 28 && oYearSel[oYearSel.selectedIndex].value % 4 == 0){
		++nDays;
	}	
	
	oDaysSelLgth = oDaysSel.length-1;

	if (nDays != oDaysSelLgth)
	{
		if (nDays < oDaysSelLgth) {
			oDaysSel.length = nDays+1;
		} else {
			for (i; i < nDays - oDaysSelLgth + 1; i++) {
				opt = new Option(oDaysSelLgth + i, oDaysSelLgth + i);
						oDaysSel.options[oDaysSel.length] = opt;
			}
		}
			
		}
	var oForm = oMonthSel.form;
	var month = oMonthSel.options[oMonthSel.selectedIndex].value;
	var day = oDaysSel.options[oDaysSel.selectedIndex].value;
	var year = oYearSel.options[oYearSel.selectedIndex].value;	
	oForm.hidden.value = month + '/' + day + '/' + year;

	var age = calculate_age( month,day,year );
	$('.age_content').html(age);
	$("#us_age").val(age);
}


function calculate_age( birth_month,birth_day,birth_year ) {
	if( birth_year == '' || birth_year == 0 ) {
		return '';
	}
	today_date = new Date();
    today_year = today_date.getFullYear();
    today_month = today_date.getMonth();
    today_day = today_date.getDate();
    age = today_year - birth_year;

    if ( today_month < (birth_month - 1))
    {
        age--;
    }
    if (((birth_month - 1) == today_month) && (today_day < birth_day))
    {
        age--;
	}
	return (age>0)? age:0; 
}

$('document').ready(function(){
	$('body').on('click',function(){
		$('#us_oldPass').removeAttr('readonly');
		$('#us_newPass').removeAttr('readonly');
		$('#us_repeatPass').removeAttr('readonly');
	});
});
