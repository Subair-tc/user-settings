<?php


function us_login_settings() {
    global $current_user;
    ?>
        <div class="row">
            <div class="col-sm-12">
                <h3 class="settings-first-head"> update your email address or password below </h3>


                <form id="us_update_email_form" name="us_update_email_form">
					<input type="hidden" name="us_update_email_flag" id="us_update_email_flag" value="0" />
                    <div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label for="us_email_address">email address</label>
								<input type="email" class="form-control" id="us_email_address" value="<?php echo $current_user->user_email; ?>" />
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col-sm-12">
								
								<div class="settings-footer-bolck">
									<button type="submit" class="btn button-green" id="us_update_email" name="us_update_email" > update email </button>
									<button type="reset" class="btn button-gray" id="us_cancel_email_updation" name="us_cancel_email_updation"> cancel </button>
									<div class="settings-spinner email-spinner" style="display: none;"><i class="fa fa-spinner"></i></div>
								</div>

								
							</div>
					</div>
                </form>
            </div>
        </div>


        <div class="row">
            <div class='col-sm-12'>
                <form id='us_update_password_form' name='us_update_password_form'>
					
                    <div class="form-group">
						<?php 
						$user_id = get_current_user_id();
						$user = get_user_by( 'ID', $user_id );
						$updated_pass_meta = get_user_meta( $user_id,'updated_password',true ); 
						if( $user->user_url == ''  || $updated_pass_meta ) { ?>
						<div class='row'>
							<div class='col-sm-6 card required'>
								<label class='control-label'>old password</label>
								<input  type='password'  readonly style="display:none">
								<input autocomplete='off' class='form-control' size='20' type='password' name='oldPass' id='us_oldPass'  maxlength="20" readonly >
							</div>
						</div>
						<?php } ?> 
						
						<div class='row'>
							<div class='col-sm-6 card required'>
								<label class='control-label'>new password</label>
								<input autocomplete='off' class='form-control' size='20' type='password' name='newPass' id='us_newPass'  maxlength="20" readonly>
								<p class='settings-descr'>- 8-20 characters long<br/> - at least one number and one capital letter<br/> -  special characters are allowed (ex. $ or @)</p>
							</div>
							<div class='col-sm-6  card required'>
								<label class='control-label'>re-enter new password</label>
								<input autocomplete='off' class='form-control' size='20' type='password' name='repeatPass' id='us_repeatPass'  maxlength="20" readonly>
							</div>
						</div>
					</div>
                    <div class='row footer-btn acc-foot'>
						<div class='col-sm-12'>
							<div class="settings-footer-bolck">
								<button class='btn button-green' id='us_changePass'type='button' disabled>update password</button> 
								<input class='btn button-gray' id='us_cancelPass'type='reset' value="cancel" disabled>	
								<div class="settings-spinner password-spinner" style="display: none;"><i class="fa fa-spinner"></i></div>
							</div>
							
						</div>
                    </div>

					<input type="hidden" name="us_update_password_flag" id="us_update_password_flag" value="0" />
                </form>
            </div>
        </div>

    <?php

}

add_action( 'wp_ajax_us_update_user_password', 'us_update_user_password' );

function  us_update_user_password() {
	$password = $_POST['newPass'];
	$repPass = $_POST['repPass'];
	$oldPass = $_POST['oldPass'];


	if (   empty( $password ) || empty( $repPass ) || ! preg_match( '/^(?=.*\d)(?=.*[A-Z])(?!.*[^a-zA-Z0-9@!#%&*$+=])(.{8,20})$/',$password ) ) {
		$return['error']     = true;
		
		if ( empty( $password ) || empty( $repPass )  ) {
			$return['password']  = 'empty';
			$errors->add( 'password_required', __( 'Password is required field' ) );
		} else {
			$return['password']  = 'no-secure';
			$errors->add( 'password_required', __( 'Password not secure' ) );
		}

		echo wp_json_encode( $return );
		die();
	}

	$user_id = get_current_user_id();

	$user = get_user_by( 'ID', $user_id );
	$updated_pass_meta = get_user_meta( $user_id,'updated_password',true );
	if( $user->user_url == ''  || $updated_pass_meta ) {
		if( wp_check_password( $password, $user->data->user_pass ) ||  ! wp_check_password( $oldPass, $user->data->user_pass ) ) {
			$return['error']     = true;
			if( ! wp_check_password( $oldPass, $user->data->user_pass ) ) {
				$return['password']  = 'old-not-match';
			} else {
				$return['password']  = 'used-already';
			}
			
			echo wp_json_encode( $return );
			die();
		}
	}

	
	$return['error']     = false;
	$return['password']  = wp_logout_url();
	wp_set_password( $password,$user_id );
	update_user_meta( $user_id,'updated_password',true );
	echo wp_json_encode( $return );
	die();

}

add_action( 'wp_ajax_us_update_user_email', 'us_update_user_email' );
function us_update_user_email() {
	$user_email = $_POST['user_email'];
	if(  $user_email == '' || ! is_email( $user_email ) ) {
		$return['message'] = 'not_valid_email';
		$error_flag = true;
		echo $return['message'];
		exit;
	} 
	$user_id = get_current_user_id();	
	global $wpdb;
	$user_table = $wpdb->prefix.'users';

	// Checking  list for already existing email.
	$emails = array();
	$email_exist = false;
	$return = array();
	$error_flag = false;
	
	$current_email = $wpdb->get_row( $wpdb->prepare ( "SELECT user_email FROM {$user_table} WHERE ID = %d", $user_id ) );
	if( $user_email != $current_email->user_email ) {
		$email_list = $wpdb->get_results( 'SELECT user_email FROM wp_users' );
		foreach ( $email_list as $email_id ) {
			$emails[] = $email_id->user_email;
		}
		if ( in_array( $user_email,$emails ) ) {
			$email_exist = true;
			$return['message'] = 'user_email_error';
			$error_flag = true;
		}
	} else {
		$return['message'] = 'not_changed';
		$error_flag = true;
	}
	if( !$error_flag ) {
		$data = array(
			'user_email' =>$user_email
		);
		$where = array(
			"ID"	=>$user_id
		);
		$wpdb->update($user_table,$data,$where );
		$return['message'] = 'success';
		
		/* Activity passing for crisp thinking. */
		global $current_user;
		get_currentuserinfo();
		$user_domain = bp_loggedin_user_domain();
		$action = '<a href="'.$user_domain.'" target="_blank">'.$current_user->display_name.'</a> edit email address on '.$GLOBALS['onvoice_label']['lblonevoice'];
		$activity_args = array(
		'user_id'           => $current_user->ID,
		'content'           => $user_email,
		'component'         => 'edit_email_address',
		'type'              => 'edit_email_address_new',
		'action'            => $action
		);
		crisp_data_tracks ( $activity_args );
		/* End- Activity passing for crisp thinking. */
	}
	echo $return['message'];
	exit;
}