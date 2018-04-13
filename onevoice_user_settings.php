<?php
/*
 * Plugin Name:Onevoice user settings
 * Description: User settings option.
 * Version: 1.0
 * Author: subair TC
 * Author URI: 
 */

/* Set constant path to the plugin directory. */
define( 'USER_SETTINGS_MULTI_PATH', plugin_dir_path( __FILE__ ) );

/* Set constant url to the plugin directory. */
define( 'USER_SETTINGS_MULTI_URL', plugin_dir_url( __FILE__ ) );

/* Set the constant path to the plugin's includes directory. */
define( 'USER_SETTINGS_INC', USER_SETTINGS_MULTI_PATH . trailingslashit( 'inc' ), true );


/* Set the constant path to the plugin's image directory. */
define( 'USER_SETTINGS_MULTI_IMAGES', USER_SETTINGS_MULTI_PATH . trailingslashit( 'images' ), true );

add_action( 'wp_enqueue_scripts', 'add_usersettings_script' );
function add_usersettings_script() {
    
	//wp_register_script( 'jqueryui', '//code.jquery.com/ui/1.11.4/jquery-ui.js', true );
	wp_register_script( 'user-settings', plugins_url( '/js/my-settings.js', __FILE__ ), true );
	wp_enqueue_script( 'jqueryui' );
	wp_enqueue_script( 'user-settings' );
	wp_localize_script('user-settings', 'Ajax', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	));

	wp_register_script( 'us_bootstrap-toggle', plugins_url( '/js/bootstrap-toggle.min.js', __FILE__ ), true );
	wp_enqueue_script( 'us_bootstrap-toggle' );

}
add_action( 'wp_enqueue_scripts', 'add_usersettings_styles' );
function add_usersettings_styles() {

	wp_register_style( 'user-settingsstyle', plugins_url( '/css/mySettings.css', __FILE__ ) );
	wp_enqueue_style( 'user-settingsstyle' );

	wp_register_style( 'us_bootstrap-toggle', plugins_url( '/css/bootstrap-toggle.min.css', __FILE__ ) );
	wp_enqueue_style( 'us_bootstrap-toggle' );
}


add_action( 'admin_enqueue_scripts', 'add_usersettings_admin_style' );
function add_usersettings_admin_style(){
	
	wp_register_script( 'user-settings-js', plugins_url( '/js/user-settings.js', __FILE__ ), true );
	wp_enqueue_script( 'user-settings-js' );
	wp_localize_script('user-settings-js', 'Ajax', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	));
}
/* Runs when plugin is activated */
register_activation_hook(__FILE__,'user_settings_plugin_activate'); 

function user_settings_plugin_activate() {
    global $wpdb;
	
	// CREATE the settings table
	
	$settings_table 		= $wpdb->prefix."profile_settings";
	$user_settings_table 	= $wpdb->prefix."user_settings";
	$user_data_table	 	= $wpdb->prefix."extended_user_data";
	$plugin_settings_table 	= $wpdb->prefix."user_settings_plugin";

	
	$wpdb->query( "CREATE TABLE IF NOT EXISTS {$plugin_settings_table} (
		`ID` bigint(20) NOT NULL AUTO_INCREMENT ,
		`name` VARCHAR(100) NOT NULL ,
		`value`  LONGTEXT NOT NULL,
		`status` INT(1) NOT NULL DEFAULT '1' , 
		PRIMARY KEY (`ID`)) 
	");
	
	$wpdb->query( "CREATE TABLE IF NOT EXISTS {$settings_table} (
		`ID` bigint(20) NOT NULL AUTO_INCREMENT ,
		`name` VARCHAR(100) NOT NULL ,
		`label` VARCHAR(100) NOT NULL ,
		`status` INT(1) NOT NULL DEFAULT '1' , 
		PRIMARY KEY (`ID`)) 
	");
	
	$wpdb->query(" CREATE TABLE IF NOT EXISTS {$user_settings_table} (
		`ID` bigint(20) NOT NULL AUTO_INCREMENT ,
		`user_id` bigint(20),
		`settings_id` bigint(20),
		`settings_value` VARCHAR(20),
		`is_visible` INT(1) NOT NULL DEFAULT '1',
		PRIMARY KEY (`ID`))
	");
	
	
	$wpdb->query(" CREATE TABLE IF NOT EXISTS {$user_data_table} (
		`ID` bigint(20) NOT NULL AUTO_INCREMENT ,
		`user_id` bigint(20),
		`country` VARCHAR(400),
		`state` VARCHAR(400),
		`city` VARCHAR(400),
		`street_address_1` VARCHAR(500),
		`street_address_2` VARCHAR(500),
		`day_of_dob` INT(11),
		`month_of_dob` INT(11),
		`year_of_dob` INT(11),
		`age` INT(11),
		`sex` INT(11)  DEFAULT NULL,
		`zipcode` VARCHAR(250),
		`twitter_username` VARCHAR(250),
		`instagram_user_name` VARCHAR(250),
		`youtube_user_name` VARCHAR(250),
		`pinterest_username` VARCHAR(250),
		`survey_id` VARCHAR(450),
		`timezone` VARCHAR(450),
		`guagetotal` DECIMAL(7,2),
		`timeline_guage` DECIMAL(7,2),
		`rareQ` VARCHAR(150),
		`rareJ` VARCHAR(150),
		`user_name` VARCHAR(150),
		`rarePoll` VARCHAR(150),
		PRIMARY KEY (`ID`))
	");
	
	

    $the_page_title = 'Settings';
    $the_page_name = 'settings';

    // the menu entry...
    delete_option("user_settings_page_title");
    add_option("user_settings_page_title", $the_page_title, '', 'yes');
    // the slug...
    delete_option("user_settings_page_name");
    add_option("user_settings_page_name", $the_page_name, '', 'yes');
    // the id...
    delete_option("user_settings_page_id");
    add_option("user_settings_page_id", '0', '', 'yes');

    $the_page = get_page_by_title( $the_page_title );

    if ( ! $the_page ) {

        // Create post object
        $_p = array();
        $_p['post_title'] = $the_page_title;
        $_p['post_content'] = "";
        $_p['post_status'] = 'publish';
        $_p['post_type'] = 'page';
        $_p['comment_status'] = 'closed';
        $_p['ping_status'] = 'closed';
		// the default 'Uncatrgorised'
        $_p['post_category'] = array(1); 

        // Insert the post into the database
        $the_page_id = wp_insert_post( $_p );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...

        $the_page_id = $the_page->ID;

        //make sure the page is not trashed...
        $the_page->post_status = 'publish';
        $the_page_id = wp_update_post( $the_page );

    }

    delete_option( 'user_settings_page_id' );
    add_option( 'user_settings_page_id', $the_page_id );

}


/* Runs on plugin deactivation*/
//register_deactivation_hook( __FILE__, 'user_settings_plugin_deactivate' );

/* un-install hook*/
//register_uninstall_hook(__FILE__, 'user_settings_plugin_uninstall');


// set my settings template


//Template fallback
add_action("template_redirect", 'user_settings_theme_redirect');

function user_settings_theme_redirect() {
    global $wp;
    $plugindir = dirname( __FILE__ );

   if (isset($wp->query_vars["pagename"]) && $wp->query_vars["pagename"] == 'settings') {
        $templatefilename = 'mySettings.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/templates/' . $templatefilename;
        }
        global $post, $wp_query;
		if (have_posts()) {
			include_once( $return_template );
			die();
		} else {
			$wp_query->is_404 = true;
		}
    }
}



/* including plugin functions and files*/
require_once( USER_SETTINGS_INC . 'country-name.php' );
require_once( USER_SETTINGS_INC . 'state-names.php' );
require_once( USER_SETTINGS_INC . 'sex-name.php' );
require_once( USER_SETTINGS_INC . 'month-name.php' );
require_once( USER_SETTINGS_INC . '/admin/settings-admin.php' );
require_once( USER_SETTINGS_INC . 'notification-settings.php' );
require_once( USER_SETTINGS_INC . 'profile-privacy.php' );
require_once( USER_SETTINGS_INC . 'login-settings.php' );
require_once( USER_SETTINGS_INC . 'rareteam-settings.php' );







/* function for inserting  the user settings */

function us_update_user_settings( $settings_name, $settings_value,$visible,$user_id="" ) {
	
	global $wpdb;
	
	if ( !$user_id ) {
		$user_id 				= get_current_user_id();
	}
	$settings_table 		= $wpdb->prefix."profile_settings";
	$user_settings_table 	= $wpdb->prefix."user_settings";

	$settings_id_obj = $wpdb->get_row( $wpdb->prepare( "SELECT ID FROM {$settings_table} WHERE name = %s", $settings_name )  );

	if( ! $settings_id_obj ) {
		$data = array(
			'name' 	=> stripslashes ( $settings_name ),
			'label' => stripslashes ( $settings_name )

		);
		$wpdb->insert($settings_table,$data);
		$settings_id  = $wpdb->insert_id;
	} else {
		$settings_id = $settings_id_obj->ID;
	}

	$user_settings = $wpdb->get_row( $wpdb->prepare( " SELECT ID FROM {$user_settings_table} WHERE user_id = %d AND settings_id = %d", $user_id,$settings_id   ) ); 
	if( intval( $visible ) === 1 || $visible == true ) {
		$visibility = 1;
	} else {
		$visibility = 0;
	}
	//echo $visibility;
	//echo '-->'.$visible.'<br/>';
	if ( $user_settings->ID ) {
		
		$data = array(
			'settings_value' 	=> stripslashes ($settings_value),
			'is_visible'		=>	stripslashes ($visibility)

		);
		$where = array(
			'ID'	=>	$user_settings->ID
		);
		$wpdb->update($user_settings_table,$data,$where);
	} else {
		$data = array(
			'settings_value' 	=> 	stripslashes ( $settings_value ),
			'is_visible'		=>	stripslashes ( $visibility ),
			'user_id'			=>	stripslashes ( $user_id ),
			'settings_id'		=>	stripslashes ($settings_id )
		);
		$wpdb->insert($user_settings_table,$data);
	}
	//return $wpdb->last_query;
	return;
}

/*  function for get the user extended profile data*/

function us_get_user_extended_profile( $user_id = '', $field = '' ) {
	if( ! $user_id ) {
		$user_id = get_current_user_id();
	}

	global $wpdb;

	$user_settings_table 	= $wpdb->prefix."user_settings";
	$user_data_table	 	= $wpdb->prefix."extended_user_data";
	$user_table 			= $wpdb->prefix."users";

	if( $field ) {
		$user_deata = $wpdb->get_row( $wpdb->prepare( "SELECT %s  FROM {$user_data_table} WHERE user_id = %d", $field,$user_id ));
	} else {
		$user_data = $wpdb->get_row( $wpdb->prepare( "SELECT ex_user.*,user.*  FROM {$user_data_table} ex_user INNER JOIN {$user_table}  user ON ex_user.user_id = user.ID  WHERE ex_user.user_id = %d", $user_id ) );
	}
	
	return $user_data;
}



// function for updating user data on user registration.

function us_update_extended_user_data( $user_id ) {
	global $wpdb;
	$data = array(
		'user_id'	=> $user_id
	);
	$table = $wpdb->prefx.'extended_user_data';
	return $wpdb->insert( $table,$data );
}

add_action( 'user_register', 'us_update_extended_user_data', 11, 1 );


/*  function for checking settings status of a user!!!!*/

function us_user_settings_status( $settings_name = "ALL",$user_id='' ){
	if( ! $user_id ) {
		$user_id = get_current_user_id();
	}
	global $wpdb;

	$user_settings_table 	= $wpdb->prefix."user_settings";
	$settings_table 		= $wpdb->prefix."profile_settings";

	if( $settings_name == 'ALL' ) {
			$settings_data  = $wpdb->get_results( $wpdb->prepare( "SELECT ps.name as settings_name, us.`settings_value`,us.`is_visible` FROM {$user_settings_table} us INNER JOIN {$settings_table } ps ON us.`settings_id` = ps.ID WHERE us.user_id =%d ", $user_id ) );
	} else {
		$settings_data  = $wpdb->get_row( $wpdb->prepare( "SELECT ps.name as settings_name, us.`settings_value`,us.`is_visible` FROM {$user_settings_table} us INNER JOIN {$settings_table } ps ON us.`settings_id` = ps.ID WHERE us.user_id =%d AND  ps.name = %s ", $user_id, $settings_name ) );
		
	}

	return $settings_data;
}



// get users with a settings on!!

function us_users_with_settings_on( $settings_name ) {
	global $wpdb;
	$user_settings_table 	= $wpdb->prefix."user_settings";
	$settings_table 		= $wpdb->prefix."profile_settings";
	$users  = $wpdb->get_row( $wpdb->prepare( "SELECT GROUP_CONCAT(us.user_id) as users  FROM {$user_settings_table} us INNER JOIN {$settings_table } ps ON us.`settings_id` = ps.ID WHERE  ps.name = %s AND us.`is_visible` = 1 ",  $settings_name ) );
	return $users;
}

?>
