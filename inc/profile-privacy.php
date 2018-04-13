<?php
// Profile and privacy settings.
function user_settings_profile_privacy() {

	global $current_user;
	$url = bp_loggedin_user_domain();
	
	//var_dump($current_user);
	
	$display_name 	= $current_user->display_name;
	$status_update 	= $current_user->status_update;
	

	$user_data  = us_get_user_extended_profile();  // get the user's full profile data.
	//var_dump($user_data);
	
	$avatarDir = 'application/uploads/avatars/' . $current_user->ID;
// avatar directory for this user.
	if ( file_exists( $avatarDir ) ) {
		$picOption = 'edit profile pic';
	} else {
		$picOption = 'upload profile pic'; 

	}
?>
	<div id="rareProSet" class="settings-header">
		<div class="row">
			<div class="col-sm-12">
				<h3> tell the community about yourself </h3>
				<a href="<?php echo $url; ?>" class="view-profile-settings">view profile page  </a>
			</div>
		</div>
	</div>
		
		<form name="us_profile_privacy_form" id="us_profile_privacy_form" >
			
			<input type="hidden" name="us_profile_privacy_flag" id="us_profile_privacy_flag" value="0" />

			<h2 class="prof-section-title">introduction</h2>
			<div class="row">
				<div class="col-sm-3 form-group card required"> 
					<div class="profile-pic-wrap">
						<a href='<?php echo $url; ?>profile/change-avatar/' id="profilepic" class="settings-profile-pic"> 
							<!-- <i class="fa fa-edit"></i> --> <?php /*echo $picOption;*/ ?>
							<img src="<?php echo plugin_dir_url( __FILE__ )  ?>../images/profile-photo-bg.png">
						</a> 
						<?php
							$avatar  = bp_core_fetch_avatar( array( 'item_id' => $current_user->ID, 'type' => 'full' ) );
							echo $avatar;
						?> 
					</div>
				</div>
				
				<div class="col-sm-9">
					<div class="form-group">
						<label for="us_my_story">
							username <span>(15 characters)</span>
						</label>
						<input type="text" class="form-control" id="us_display_name" value="<?php echo $display_name; ?>" maxlength="15" autocomplete="false">
						<span class="error" id="us_display_name_error"></span>
					</div>
					
					<div class="form-group">
						<label for="us_my_story">
							my story <span>(140 characters)</span>
						</label>
						<textarea type="text" class="form-control" id="us_my_story"  maxlength="140"><?php echo wp_unslash( $status_update ); ?></textarea>
					</div>
					
				</div>
				
			</div>
			
			<div class="social-media-row">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<?php
							$twitter_status = us_user_settings_status( 'twitter_account' );
							if( isset($user_data)  && $user_data->twitter_username && $twitter_status->is_visible ) {
								$checked = "checked";
								$style = " ";
							} else {
								$checked = "";
								$style = 'style="display:none" ';
							}
						?>
						<input type="checkbox" name="us_twitter_ac" id="us_twitter_ac" <?php echo $checked; ?> >
						<i class="fa fa-twitter"></i>
						<label for="us_twitter_ac_name">add Twitter username</label>
						<input  class="form-control" type="text" name="us_twitter_ac_name" id="us_twitter_ac_name" value="<?php echo ( isset($user_data) )? wp_unslash( $user_data->twitter_username ) : '';  ?>" <?php echo $style; ?> autocomplete="false" />
					</div>


					<div class="form-group">
						<?php
							$instagram_status = us_user_settings_status( 'instagram_account' );
							if( isset($user_data) && $user_data->instagram_user_name && $instagram_status->is_visible ) {
								$checked = "checked";
								$style = " ";
							} else {
								$checked = "";
								$style = 'style="display:none" ';
							}
						?>
						
						<input type="checkbox" name="instagram_ac" id="instagram_ac" <?php echo $checked; ?> >
						<i class="fa fa-instagram"></i>
						<label for="instagram_user_name">add Instagram  username</label>
						<input class="form-control" type="text" name="us_instagram_user_name" id="us_instagram_user_name" value="<?php echo (isset($user_data) )?  wp_unslash( $user_data->instagram_user_name ) : '';  ?>" <?php echo $style; ?> autocomplete="false" />
					</div>
					
					<div class="form-group">
						
						<?php
							$pinterest_status = us_user_settings_status( 'pinterest_account' );
							if( isset($user_data) && $user_data->pinterest_username && $pinterest_status->is_visible ) {
								$checked = "checked";
								$style = " ";
							} else {
								$checked = "";
								$style = 'style="display:none" ';
							}
						?>
						<input type="checkbox" name="us_pinterest_ac" id="us_pinterest_ac" <?php echo $checked; ?> >
						<i class="fa fa-pinterest"></i>
						<label for="us_pinterest_ac_name">add Pinterest username</label>
						<input class="form-control" type="text" name="us_pinterest_ac_name" id="us_pinterest_ac_name" value="<?php echo ( isset($user_data) )? wp_unslash( $user_data->pinterest_username ) : '';  ?>" <?php echo $style; ?> autocomplete="false"/>
					</div>
					
					<div class="form-group">
						<?php
							$youtube_status = us_user_settings_status( 'youtube_account' );
							if( isset($user_data) && $user_data->youtube_user_name && $youtube_status->is_visible ) {
								$checked = "checked";
								$style = " ";
							} else {
								$checked = "";
								$style = 'style="display:none" ';
							}
						?>
						
						<input type="checkbox" name="us_youtube_ac" id="us_youtube_ac" <?php echo $checked; ?> >
						<i class="fa fa-youtube-play"></i>
						<label for="us_youtube_ac_name">add YouTube username</label>
						<input class="form-control" type="text" name="us_youtube_ac_name" id="us_youtube_ac_name" value="<?php echo ( isset($user_data) )? wp_unslash(  $user_data->youtube_user_name ) : '';  ?>" <?php echo $style; ?> autocomplete="false" />
					</div>
					
				</div>
				</div>
			</div>
			
			
			
			
			<div class="basics-row">
				<div class="row">
					<div class="col-sm-6"><h2> basics</h2></div>
					<div class="col-sm-6 text-center visible-header hidden-xs"><p>visible to community members?</p></div>
				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<label for="us_first_name">first name <span>(15 characters)</span></label>
							<input type="text" class="form-control" id="us_first_name" value="<?php echo $current_user->first_name; ?>" maxlength="15" autocomplete="false" >
						</div>
						<div class="col-sm-6 text-center visible-cont">
							<?php
									$fname_status = us_user_settings_status( 'first_name' ); // get the current status
									if( $fname_status->is_visible ) {
										$status = "checked";
									} else {
										$status = " ";
									}

							?>
							
							<input type="checkbox" name="fname_status" id="fname_status"  <?php echo $status; ?>/> <label class="yes-label">yes</label>
							<span class="visible-header-mobile"><p>visible to community members?</p></span>
						</div>
					</div>
				</div>
				
				
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<label for="us_last_name">last name <span>(15 characters)</span></label>
							<input type="text" class="form-control" id="us_last_name" value="<?php echo wp_unslash( $current_user->last_name ); ?>" maxlength="15" autocomplete="false">
						</div>
						<div class="col-sm-6 text-center visible-cont">
							<?php
									$lname_status = us_user_settings_status( 'last_name' ); // get the current status
									if( $lname_status->is_visible ) {
										$status = "checked";
									} else {
										$status = " ";
									}

							?>
							<input type="checkbox" name="lname_status" id="lname_status" <?php echo $status; ?> /><label class="yes-label">yes</label>
							<span class="visible-header-mobile"><p>visible to community members?</p></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<label for="us_sex">sex </label>
							<select  id="us_sex" name="us_sex" class="form-control" >
								<?php
									if( !is_null($user_data->sex) ) {
										//$get_sexname = us_get_user_sex_name( $user_data->sex );
										//echo '<option value="'.$user_data->sex.'">'.$get_sexname.'</option>';
										$sex_val = $user_data->sex;
										
										$female = '';
										$male = '';
										$other = '';
										$transsexual ='';
										$unknown = '';
										switch ( $sex_val ) {
											case 0: 
												$female = 'selected';break;
											case 1: 
												$male = 'selected';break;
											case 2: 
												$other = 'selected';break;
											case 3: 
												$transsexual = 'selected';break;
											case 4: 
												$unknown = 'selected';break;

										}
									} 
								
								?>
								<option value="">Please Select</option>
								<option <?php echo $female; ?> value="0">Female</option>
								<option <?php echo $male; ?> value="1">Male</option>
								<option <?php echo $other; ?> value="2">Other</option>
								<option <?php echo $transsexual; ?> value="3">Transsexual</option>
								<option <?php echo $unknown; ?>  value="4">Unknown</option>
							
							</select>
						</div>
						<div class="col-sm-6 text-center visible-cont">
							<?php
									$sex_status = us_user_settings_status( 'sex' ); // get the current status
									if( $sex_status->is_visible || ! ( $sex_status )  ) {
										$status = "checked";
									} else {
										$status = " ";
									}

							?>
							<input type="checkbox" name="sex_status" id="sex_status" <?php echo $status;  ?>/><label class="yes-label">yes</label>
							<span class="visible-header-mobile"><p>visible to community members?</p></span>
						</div>
					</div>
					</div>
					<div class="form-group">
					<div class="row">
					<div class="col-sm-6">
					<label class="full-width-label">birthday </label>
					<select name="us_year" id="us_year" onchange="setDays(month,day,this)"  class="form-control">
						
						<option value="0000">Year</option>
						<?php 
						for( $year = 2017; $year > 1949 ; $year-- ) {
							if( isset($user_data) &&  $user_data->year_of_dob &&  $user_data->year_of_dob == $year  ) {
								echo '<option selected value="'.$year.'">'.$year.'</option>';

							} else {
								echo '<option value="'.$year.'">'.$year.'</option>';
							}
							
							
						}
						
						?>
						
					</select>

					<select name="month" id="month" onchange="setDays(this,day,us_year)" class="form-control">
						<?php 
						
						
						if( isset($user_data) &&  $user_data->month_of_dob ) {											
							$selected_month = $user_data->month_of_dob;
							
						} else {

							$selected_month = 0;
						}

						echo us_get_month_drop_down( $selected_month );
						?>
						
						
					</select>
					<select name="day" id="day" onchange="setDays(month,this,us_year)" class="form-control">
						
						<option value="00">Day</option>
						<?php 
						for( $day = 1; $day <= 31 ; $day++ ) {
							if( isset($user_data) &&  $user_data->day_of_dob &&  $user_data->day_of_dob == $day  ) {
								echo '<option selected value="'.$day.'">'.$day.'</option>';
							} else {
								echo '<option value="'.$day.'">'.$day.'</option>';
							}
							
						}
						?>
						
					</select>
					
					<input type="hidden" name="dob" value="" />
						</div>

						<div class="col-sm-6">
							<div class="not-visible-cont"><p>not visible</p></div>
						</div>
					</div>
</div>
					<div class="form-group">

					<div class="row age-row">
						<div class="col-sm-6">
								<input type="hidden" id="us_age" name="us_age" value="<?php echo isset($user_data) ?  $user_data->age : 0; ?>" />
							<label for="us_age">age: </label> &nbsp; <span class="age_content"><?php echo ( isset($user_data) )? $user_data->age : ''; ?></span>
						</div>

							<div class="col-sm-6 text-center  visible-cont">
								
								<?php
									$age_status = us_user_settings_status( 'age' ); // get the current status
									if( $age_status->is_visible || ! ( $age_status ) ) {
										$status = "checked";
									} else {
										$status = " ";
									}

								?>
								
								<input type="checkbox" name="age_status" id="age_status" <?php echo $status; ?> /><label class="yes-label">yes</label>
							<span class="visible-header-mobile"><p>visible to community members?</p></span>
							</div>

					</div>
					</div>
					
					
				</div>
			
			
			
			
			<div class="lcoation">
				<div class="row">
				<div class="col-sm-12">
					<h2> location</h2>
				</div>
				</div>
				<div class="form-group">
				<div class="row">
				<div class="col-sm-6">
				
					<label for="us_country">country </label>
					
					<select id="us_country" name="us_country" class="form-control" >
						
						<?php
							if( isset($user_data) &&  $user_data->country ) {


								//echo '<option value="'.$user_data->country.'">'.us_user_country_name( $user_data->country ).'</option>';
							} else {
								//echo '<option value="">Please Select</option>';
							}


						?>
						
						<option value="">Please Select</option>

						<?php

							$country_list = us_country_list();$count = 0;

							foreach ( $country_list as $country_code=>$country ) {
								if( $count++ == 3 ) {
									echo '<option disabled class="dis-option">-----------------------------------------</option>';
								}
								if( isset($user_data) &&  $user_data->country &&  $country_code == $user_data->country   ) {
									echo '<option selected value="'.$country_code.'">'.$country.'</option>';
								} else {
									echo '<option value="'.$country_code.'">'.$country.'</option>';
								}
							}

						?>

					</select>
				</div>
				
				<div class="col-sm-6 text-center  visible-cont">
					<?php
									$country_status = us_user_settings_status( 'country' ); // get the current status
									if( $country_status->is_visible || !( $country_status ) ) {
										$status = "checked";
									} else {
										$status = " ";
									}

								?>
					<input type="checkbox" name="country_status" id="country_status" <?php echo $status ; ?>/><label class="yes-label">yes</label>
							<span class="visible-header-mobile"><p>visible to community members?</p></span>
				</div>
				</div>
				</div>
				<div class="form-group">
				<div class="row">
				<div class="col-sm-6">
					
						
						<?php
								$state_content = '';
								//if(  !isset($user_data) || !$user_data->country || $user_data->country == 'US' ) {
								if( $user_data->country == 'US' ) {
									$us_state_province_style = 'style="display:none"';
									$state_province_style  = '';
								} else {
									$state_province_style = 'style="display:none"';
									$us_state_province_style = '';
									if( isset($user_data) ) {
										$state_content = $user_data->state;
									}
								}
						?>

						<label for="state_province">state/province <span class="state-label-span"  <?php echo $us_state_province_style; ?> >(15 characters)</span></label>

						<select name="state_province" id="state_province" class="form-control" <?php echo $state_province_style; ?> >
							
							<option value="">Please Select</option>
							<?php 
							
							$us_state_names = us_get_state();

							foreach ( $us_state_names as $state_code=>$state ) {
								if( isset($user_data) &&  $user_data->state &&  $user_data->state == $state_code  ) {
									echo '<option selected value="'.$state_code.'">'.$state.'</option>';
								} else {
									echo '<option value="'.$state_code.'">'.$state.'</option>';
								}
							}


							?>
						</select>
						
						
						<input name="us_state_province" type="text" class="form-control" id="us_state_province" value="<?php echo  wp_unslash( $state_content ); ?>"  <?php echo $us_state_province_style; ?>  maxlength="15" autocomplete="false"/>

				</div>
				
				<div class="col-sm-6 text-center visible-cont">
					<?php
							$state_status = us_user_settings_status( 'state' ); // get the current status
							if(  ! $state_status || $state_status->is_visible ) {
								$status = "checked";
							} else {
								$status = " ";
							}

						?>
						
					<input type="checkbox" name="state_status" id="state_status" <?php echo $status; ?> /><label class="yes-label">yes</label>
							<span class="visible-header-mobile"><p>visible to community members?</p></span>
				</div>
				</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							
								<label for="state_province">city <span>(15 characters) </span> </label>
								<input name="us_city_province" type="text" class="form-control" id="us_city_province" value="<?php echo ( isset ($user_data) )?  wp_unslash( $user_data->city ) : ''; ?>" maxlength="15" autocomplete="false" />
							
						</div>
						
						<div class="col-sm-6 text-center  visible-cont">
							
							<?php
								$city_status = us_user_settings_status( 'city' ); // get the current status
								if( ! $city_status || $city_status->is_visible  ) {
									$status = "checked";
								} else {
									$status = " ";
								}

							?>
							<input type="checkbox" name="city_status" id="city_status"  <?php echo $status ; ?>/><label class="yes-label">yes</label>
								<span class="visible-header-mobile"><p>visible to community members?</p></span>
						</div>
					</div>
				</div>	
			</div>
				
			<div class="row">
				<div class="col-sm-12">
					<div class="settings-footer-bolck">
						<input id="us_profile_privacy_submit" type="submit" class="btn button-green" value="update" />
						<input type="reset" class="btn button-gray" value="cancel" id="us_profile_privacy_reset" />
						<div class="settings-spinner profile-spinner" style="display: none;"><i class="fa fa-spinner"></i></div>
					</div>
				</div>
			
			</div>
			
		</form>
		
	<?php
}



function update_user_profile_and_privacy() {
	
	$display_name 				= isset( $_POST['display_name'] ) ? stripslashes ( $_POST['display_name'] ): '' ;
	$us_my_story 				= isset( $_POST['us_my_story'] ) ? stripslashes ( $_POST['us_my_story'] ): '' ;
	$us_twitter_ac_name			= isset( $_POST['us_twitter_ac_name'] ) ? stripslashes ($_POST['us_twitter_ac_name'] ): '' ;
	$us_pinterest_ac_name		= isset( $_POST['us_pinterest_ac_name'] ) ? stripslashes ( $_POST['us_pinterest_ac_name'] ): '' ;
	$us_youtube_ac_name			= isset( $_POST['us_youtube_ac_name'] ) ? stripslashes ( $_POST['us_youtube_ac_name'] ): '' ;
	$us_instagram_user_name		= isset( $_POST['us_instagram_user_name'] ) ? stripslashes ( $_POST['us_instagram_user_name'] ): '' ;
	$us_first_name				= isset( $_POST['us_first_name'] ) ? stripslashes ( $_POST['us_first_name'] ): '' ;
	$fname_status				= isset( $_POST['fname_status'] ) ? stripslashes ( $_POST['fname_status'] ) : '' ;
	$us_last_name				= isset( $_POST['us_last_name'] ) ? stripslashes ($_POST['us_last_name'] ): '' ;
	$lname_status				= isset( $_POST['lname_status'] ) ? stripslashes ($_POST['lname_status']): '' ;
	$us_sex						= isset( $_POST['us_sex'] ) ? stripslashes ($_POST['us_sex']): NULL ;
	$sex_status					= isset( $_POST['sex_status'] ) ? stripslashes ($_POST['sex_status']): '' ;
	$month						= isset( $_POST['month'] ) ? stripslashes ($_POST['month']): '' ;
	$day						= isset( $_POST['day'] ) ? stripslashes ($_POST['day']): '' ;
	$us_year					= isset( $_POST['us_year'] ) ? stripslashes ($_POST['us_year']): '' ;
	$us_age						= isset( $_POST['us_age'] ) ? stripslashes ($_POST['us_age']): '' ;
	$age_status					= isset( $_POST['age_status'] ) ? stripslashes ($_POST['age_status']): '' ;
	$us_country					= isset( $_POST['us_country'] ) ? stripslashes ($_POST['us_country']): '' ;
	$country_status				= isset( $_POST['country_status'] ) ? stripslashes ($_POST['country_status']): '' ;
	$us_state_province			= isset( $_POST['us_state_province'] ) ? stripslashes ($_POST['us_state_province']): '' ;
	$state_status				= isset( $_POST['state_status'] ) ? stripslashes ($_POST['state_status']): '' ;
	$us_city_province			= isset( $_POST['us_city_province'] ) ? stripslashes($_POST['us_city_province']): '' ;
	$city_status				= isset( $_POST['city_status'] ) ? stripslashes($_POST['city_status']): '' ;
	
	$us_twitter_ac				= isset( $_POST['us_twitter_ac'] ) ? stripslashes($_POST['us_twitter_ac']): '' ;
	$instagram_ac				= isset( $_POST['instagram_ac'] ) ? stripslashes ($_POST['instagram_ac']): '' ;
	$us_pinterest_ac			= isset( $_POST['us_pinterest_ac'] ) ? stripslashes($_POST['us_pinterest_ac']): '' ;
	$us_youtube_ac				= isset( $_POST['us_youtube_ac'] ) ? stripslashes($_POST['us_youtube_ac']): '' ;

	global $wpdb;
	
	$settings_table 		= $wpdb->prefix."profile_settings";
	$user_settings_table 	= $wpdb->prefix."user_settings";
	$user_data_table	 	= $wpdb->prefix."extended_user_data";
	$user_table	 			= $wpdb->prefix."users";
	
	$user_id 				= get_current_user_id();
	
	
	if ( $display_name ) {
		
		$display_names 		= array();
		$dnameExist 	= false;
		$current_data 	= $wpdb->get_row( "SELECT display_name,user_login FROM wp_users WHERE ID='$user_id'" );
		$old_dname		= $current_data->display_name;
		$old_user_name 	= $current_data->user_login;

		if ( $old_dname != $display_name && $old_user_name != $display_name ) {
			$sql_dname = $wpdb->get_results( 'SELECT display_name,user_login FROM wp_users' );
			foreach ( $sql_dname as $dname ) {
				$display_names[] = strtolower( $dname->display_name );
				$display_names[] = strtolower( $dname->user_login );
			}
			if ( in_array( strtolower( $display_name ),$display_names ) ) {
				$dnameExist = true;
				echo 'display_name_error';
				exit();
			}
		}


		
		$data = array(
			'display_name'	=> $display_name,
			'status_update'	=> $us_my_story
		);
		//Give suggetion name for @ mention
		$query   = "SELECT suggestion_name FROM  wp_users  WHERE ID ='$user_id' AND user_status=0";
		$suggestion_name        = $wpdb->get_var( $query );
		$user        = wp_get_current_user();
		if($user->display_name != $display_name || $suggestion_name=='')
		{
				//Update suggetion name
				new_suggestion_name($display_name,$user_id);
		}
	} else {
		$data = array(
			'status_update'	=> $us_my_story
		);
	}

	$where = array(
		'ID' => $user_id

	);
	$wpdb->update($user_table,$data,$where); // updated user table.
	
	// Updating extended user profile.
	$where = array(
		'user_id'	=> $user_id
	);
	
	
	$data = array(
		'user_id'				=> stripslashes ( $user_id ),
		'country' 				=> stripslashes ( $us_country ),
		'state' 				=> stripslashes ( $us_state_province ),
		'city' 					=> stripslashes ( $us_city_province ),
		'day_of_dob'			=> stripslashes ( $day ),
		'month_of_dob'			=> stripslashes ( $month ),
		'year_of_dob'			=> stripslashes ( $us_year ),
		'age'					=> stripslashes ( $us_age ),
		'twitter_username'		=> stripslashes ( $us_twitter_ac_name ),
		'youtube_user_name'		=> stripslashes ( $us_youtube_ac_name ),
		'pinterest_username'	=> stripslashes ( $us_pinterest_ac_name ),
		'instagram_user_name'	=> stripslashes ( $us_instagram_user_name )
		
	);

	if( $us_sex >= 0 && $us_sex !='' ) {
		$data['sex'] = stripslashes ( $us_sex );
	} else {
		$data['sex'] = -1;
	}

	// check user have an entry in extended profile table.

	//echo $user_id ; exit;

	$profile_id = $wpdb->get_row( $wpdb->prepare( "SELECT ID FROM {$user_data_table} WHERE user_id = %d",$user_id ) );
	//echo $wpdb->last_query; exit;
	if( $profile_id->ID > 0 ) {
		$wpdb->update( $user_data_table,$data,$where ); // updated user date table.
	} else {
		$wpdb->insert( $user_data_table,$data );  // Insert new user data into table.
	}

	//echo $wpdb->last_query;
	
	//updating the user settings table. 
	update_user_meta($user_id,'first_name',$us_first_name);
	update_user_meta($user_id,'last_name',$us_last_name);
	$fname_status = ($fname_status == 'true')? 1 : 0;
	us_update_user_settings( 'first_name',$us_first_name ,$fname_status );
	$lname_status = ($lname_status == 'true')? 1 : 0;
	us_update_user_settings( 'last_name',$us_last_name ,$lname_status );
	$sex_status = ($sex_status == 'true')? 1 : 0;
	us_update_user_settings( 'sex',$us_sex ,$sex_status );
	$age_status = ($age_status == 'true')? 1 : 0;
	us_update_user_settings( 'age',$us_age ,$age_status );
	$country_status = ($country_status == 'true')? 1 : 0;
	us_update_user_settings( 'country',$us_country ,$country_status );
	$state_status = ($state_status == 'true')? 1 : 0;
	us_update_user_settings( 'state',$us_state_province ,$state_status );
	$city_status = ($city_status == 'true')? 1 : 0;
	us_update_user_settings( 'city',$us_city_province ,$city_status );

	$us_twitter_ac 		= ($us_twitter_ac == 'true')? 1 : 0;
	$instagram_ac 		= ($instagram_ac == 'true')? 1 : 0;
	$us_pinterest_ac 	= ($us_pinterest_ac == 'true')? 1 : 0;
	$us_youtube_ac		= ($us_youtube_ac == 'true')? 1 : 0;
	us_update_user_settings( 'twitter_account',$us_twitter_ac_name ,$us_twitter_ac );
	us_update_user_settings( 'instagram_account',$us_instagram_user_name ,$instagram_ac ); 
	us_update_user_settings( 'pinterest_account',$us_pinterest_ac_name ,$us_pinterest_ac );
	us_update_user_settings( 'youtube_account',$us_youtube_ac_name ,$us_youtube_ac );
	
	
	/* Activity passing for crisp thinking. */
	    $content = ''; 
		if($display_name) {
		$content .= "Display name => $display_name,";
		}
		if($us_my_story) {
		$content .= "Profile quote => $us_my_story, ";
		}
		if($us_first_name) {
		$content .= "First name => $us_first_name, ";
		}
		if($us_last_name) {
		$content .= "Last name => $us_last_name, ";
		}
		if($us_state_province) {
		$content .= "State/ province => $us_state_province, ";
		}
		if($us_city_province) {
		$content .= "City => $us_city_province, ";
		}
		if($us_twitter_ac_name) {
		$content .= "Twitter username =>  $us_twitter_ac_name, ";
		}
		if($us_instagram_user_name) {
		$content .= "Instagram username => $us_instagram_user_name, ";
		}
		if($us_pinterest_ac_name) {
		$content .= "Pinterest username =>  $us_pinterest_ac_name, ";
		}
		if($us_youtube_ac_name) {
		$content .= "Youtube username => $us_youtube_ac_name, ";
		}
		 
		$user_domain = bp_loggedin_user_domain();
		$action = '<a href="'.$user_domain.'" target="_blank">'.$display_name.'</a> update profile & privacy settings on '.$GLOBALS['onvoice_label']['lblonevoice'];
		$activity_args = array(
		'user_id'           => $user_id,
		'content'           => $content,
		'component'         => 'profile_privacy_settings',
		'type'              => 'profile_privacy_settings_new',
		'action'            => $action
		);
		crisp_data_tracks ( $activity_args );
	/* End- Activity passing for crisp thinking. */
}

add_action( 'wp_ajax_update_user_profile_and_privacy', 'update_user_profile_and_privacy' );

?>
