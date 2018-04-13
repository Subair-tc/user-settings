<?php
// ######rareTeam settings #########.
function user_settings_rareTeam() {

	global $wpdb;
	global $current_user;
	$group_name_lists = $wpdb->get_results( "SELECT id,name,description,status FROM wp_bp_groups WHERE creator_id='$current_user->ID'" );

	foreach ( $group_name_lists as $group_name_list ) {
		if ( $group_name_list->status == 'public' ) { 
                    continue; 
                    
                }
		$group_name = $group_name_list->name;
		$group_name = stripslashes( $group_name );
		$group_desc = stripslashes( $group_name_list->description );
		$grp_id = $group_name_list->id;
	}

	?><div class="rareTeam-cont rare-team-settings-new" id="rare_team_settings">
				
			
				<div class="tab-content" id="myTabContent">
				   <div aria-labelledby="home-tab" id="my-team" class="tab-pane fade  active in" role="tabpanel">
					   <div class="item-list-tabs no-ajax" id="group-create-tabs" role="navigation">
							<?php if ( $grp_id ) { ?><h3 class="settings-first-head">edit your SCDteam</h3> <?php 
                                                        
                                                        } else {
                                                            ?> <h3>create SCDteam</h3> 
                                                            <?php } ?>
						</div>

						<?php if ( $grp_id ) { ?>

						<form id="us_update_rareteam_form" name="us_update_rareteam_form">
						<input type="hidden" name="us_update_rareteam_flag" id="us_update_rareteam_flag" value="0" />
						<div class="item-body" id="group-create-body">
						  <div class="rareteam-name-update">
							<label for="group-name">SCDteam name<span style="color:red;">*</span></label>
							<input name="group-name" id="group-name" aria-required="true" value="<?php echo $group_name; ?>" type="text" grp_id="<?php echo $grp_id; ?>" maxlength="30" editFlag='0' autocomplete="false">
						  </div>
						  <div class="rareteam-mission-update">
							<label for="group-desc">SCDteam mission</label>
							<textarea name="group-desc" id="group-desc" aria-required="true" value="list"  maxlength="250" editFlag='0'><?php echo $group_desc; ?></textarea>
							<p style="font-family:gibson-light;font-size:14px;">maximum of 250 characters allowed.</p>
						  </div>
						  <input type="hidden" id="rareT_settings_changed" value="">
							
						
	  					<div class="settings-footer-bolck">
									<button name="edit_group" id="us_edit_group_set" class="btn button-green">update SCDteam</button>
							<input type="reset" name ="us_edit_group_reset" id ="us_edit_group_reset" value="cancel" class="btn button-gray" />
								<div class="settings-spinner rareteam-spinner" style="display: none;"><i class="fa fa-spinner"></i></div>
							</div>
						  </div><!-- .item-body -->

							</form>
							<?php } else { ?>
							  <div class="item-body" id="group-create-body">
								<div>
									 you haven't created your rareTeam yet. what are you waiting for?! <a href="#" data-toggle="modal" data-target="#rare-team-started">get started here.</a>

								</div>
							  </div>
							<?php }?>

				   </div>

				  </div>
				</div>

				<?php
}
// rare team settings update.
add_action( 'wp_ajax_ajax_us_updterare_team', 'ajax_us_updterare_team' );
function ajax_us_updterare_team() {

	global $wpdb;
	$table = $wpdb->prefix . 'bp_groups';
	$user_ID = get_current_user_id();
	$group_name_lists = $wpdb->get_results( "SELECT id FROM $table WHERE creator_id='$user_ID'" );
	foreach ( $group_name_lists as $group_name_list ) {
		if ( $group_name_list->status == 'public' ) { 
                    continue; 
                    
                }
		$grp_id = $group_name_list->id;
	}
	if ( $_POST['grp_id'] != $grp_id ) {
		echo 'error';
		exit;
	}

	$data = array(
	  'name'        => $_POST['gName'],
	  'description' => $_POST['group_desc'],
	);
	$where = array(
	  'id' => $grp_id,
	);
	if ( $wpdb->update( $table, $data, $where ) ) {
		echo 'success'; 
		$mission_change = $_POST['mission_change'];
		if ( $mission_change == 1 ) {
			  $post_name = 'rareTeam_updated_general_settings'; 
// give custom activity name if you are processing an ajax call.
			  $post_seedname = 'rareTeam_updated_general_settings';
			  $post_content = 'Updated SCDteam missions';
			  $post_desc = 'Updated SCDteam missions';
// Give post description if it is specified in encouragement power name and description table.
			  updateActivity( $post_name,$post_content,$post_desc,$post_seedname,$_POST['grp_id'] );
// Function Call.
		}
		/* Activity passing for crisp thinking. */
		$content = ''; 
		$gName = $_POST['gName'];
		$group_desc = $_POST['group_desc'];
		if($gName) {
		$content .= "Name => $gName,";
		}
		if($group_desc) {
		$content .= "rareTeam mission => $group_desc ";
		} 
		global $current_user;
		get_currentuserinfo();
		$user_domain = bp_loggedin_user_domain();
		$action = '<a href="'.$user_domain.'" target="_blank">'.$current_user->display_name.'</a> edit SCDteam settings on '.$GLOBALS['onvoice_label']['lblonevoice'];
		$activity_args = array(
		'user_id'           => $current_user->ID,
		'content'           => $content,
		'component'         => 'edit_rareTeam',
		'type'              => 'edit_rareTeam_new',
		'action'            => $action
		);
		crisp_data_tracks ( $activity_args );
		/* End- Activity passing for crisp thinking. */
	}

}
?>
