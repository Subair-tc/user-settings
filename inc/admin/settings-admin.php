<?php
add_action( 'admin_menu', 'us_add_admin_submenu' );
function us_add_admin_submenu() { 
	add_menu_page( 
		'User Settings',
		'User Settings',
		'manage_options',
		'user-settings',
		'us_user_settings',
		USER_SETTINGS_MULTI_URL.'images/settings_icon.png',
		83
	);
}

function us_user_settings() {
    ?>

    <div class="user-settings">
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<h1> User Settings </h1>
			</div>
		</div>
		
		<?php /*<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="about-user-settings">
					<p>
						Please find the developer option for user settings plugin below (beta)
					</p>
				
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<h3 > Enable Beta Testing Mode ? </h3>
				<?php
					$beta_testing		= us_get_plugin_settings('beta_testing','status');
					$beta_testing_users 	= us_get_plugin_settings('beta_testing_users','value');
					if( $beta_testing ) { ?>
						<input class="beta-testing-status" checked data-toggle="toggle" type="checkbox"  data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">				
					<?php } else{ ?>
						<input class="beta-testing-status" data-toggle="toggle" type="checkbox"  data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
					<?php } ?>

					<div class="add_beta_testers">
						<div class="form-group">
							<label>add beta testers user id's seperated by comma.</label>
							<input type="text" id="beta_testers" name"beta_testers"  class="form-control" value="<?php echo $beta_testing_users; ?>">
						</div>

						<button class="btn btn-success" id="beta_testers_submit"> add users </button>


					</div>
			</div>*/ ?>


			<div class="row user settings-row">
				<div class="col-sm-12">
					<div class="user-settings-options">
						<?php us_get_user_settings(); ?>
					</div>
				</div>
			</div>

		</div>






			
			
	</div>


<?php
}


function us_get_user_settings() {
	global $wpdb;
	$table = $wpdb->prefix."profile_settings";
	$settings = $wpdb->get_results("SELECT * FROM {$table}");
	if ( $settings ) { ?>
		<table border="0" class="form t-style table table-resposive" id="user_settings_options" width="100%" cellpadding="0" cellspacing="0">
			
			<thead>
				<tr>
					<th>ID</th>
					<th>Settings Name</th>
					<th>Enable/Disable</th>
				</tr>
			</thead>
		<?php foreach ( $settings  as $settings ) { ?>
				<tr>
					<td><?php echo $settings->ID; ?></td>
					<td><?php echo $settings->label; ?></td>
					<td>
						<?php if( $settings->status ) {
							$checked = 'checked';
						} else {
							$checked = '';
						}
						echo '<input class="user-settings-status" '.$checked.'   data-toggle="toggle" type="checkbox" settings-id="'.$settings->ID.'"  data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">';
							
						?>
					</td>
				</tr>
		<?php
		}

	}

}



function us_get_plugin_settings( $settings_name = "",$return = "" ) {
	global $wpdb;
	$settings_table = $wpdb->prefix.'user_settings_plugin';
	if( $settings_name == "" ) {
		$settings_details = $wpdb->get_results( "SELECT * FROM {$settings_table}" );
		return $settings_details;
	}
	$settings_status = $wpdb->get_row( $wpdb->prepare( "SELECT status,name FROM {$settings_table} WHERE name='%s'",$settings_name ) );
	if( $return == "status" ) {
		return ($settings_status)? $settings_status->status : 1;
	} elseif( $return == "value" ) {
		return $settings_status->value;
	}

	return  $settings_status;
	
}


function us_enable_disable_userSettings(){
	if ( isset( $_POST['settings_id'] ) && isset( $_POST['status_to'] ) ) {
		$settings_id = $_POST['settings_id'];
		$status_to = $_POST['status_to'];
		if( $status_to != 1 && $status_to != 0 ) {
			$status_to = 1;
		}

		global $wpdb;
		$table = $wpdb->prefix.'profile_settings';
		$data = array (
			'status'	=>	$status_to
		);
		$where =  array(
			'ID'		=>	$settings_id
		);
		return $wpdb->update( $table, $data, $where );
	} else {
		return false;
	}
}
 add_action( 'wp_ajax_us_enable_disable_user_settings', 'us_enable_disable_userSettings' );