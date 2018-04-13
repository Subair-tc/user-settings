<?php
/**
 Template for my settings page.
 You can copy this file into your theme directory to modify the contents.
*/
get_header();
if( ! is_user_logged_in() ) {
	wp_safe_redirect( home_url() );
}
$userid = get_current_user_id();

/*-----------------------------------------------Activity tracking-----------------------------------------------*/
	global $wpdb;
	global $post;
	$current = $wp_query->post;
	$post_name = $current->post_name; 
	// give custom activity name if you are processing an ajax call.
	$post_content = $current->post_content;
	$post_desc = 'my settings landing page';
	// Give post description if it is specified in encouragement power name and description table.
	$post_seed_name = $current->post_name;
	updateActivity( $post_name,$post_content,$post_desc,$post_seed_name );
	if ( function_exists( 'ot_get_option' ) ) {
		$contentGroup = ot_get_option( 'top_level_group_id' );
		if($contentGroup ) { ?>
			<script>
				$(document).ready(function () {
					ga('set', '<?php echo $contentGroup ?>', 'Member and Settings Pages');
				});
			</script>
		
		<?php
		}
		
	}

?>
	<div class="col-sm-12"><!--HEADER 1 -->
		<div class="container pull-left settings-page-wrap">
			<div class="cont-head"></div>
				<div class="rareCurate-nav">
					<div class="clinical-searchbox">
						<div class="input-group">
							
						</div>
					</div>
					<div class="cont-sub-head settings-page-head">
						<a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown"  href="#" id="drop4">
						<i class="fa fa-cogs"></i>
						<h1>Settings</h1>

						
					</a>
					</div>
				</div> <!--END -->      
				<div class="mysettings-tabs">
					<div class="tab-links" id='tabs'>
	
		<?php
			$profile_privacy    	= 'active';
			$user_notification   	= '';
			$login_settings   		= '';
			$rareteam_settings  	= '';

			if ( $_GET['from'] == 'user_notification' ) {
				
				$profile_privacy 	= '';
				$user_notification 	= 'active';
			
			} elseif ( $_GET['from'] == 'login_settings' ) {
				
				$profile_privacy 	= '';
				$login_settings 	= 'active';
			
			} elseif ( $_GET['from'] == 'rareteam_settings' ) {
			
				$profile_privacy 	= '';
				$rareteam_settings 	= 'active';
			
			}
		?>
		<ul>
			<li class=" <?php echo $profile_privacy; ?>">
				<span class="icon-circle" style="">
					<i class="fa fa-user"></i>
				</span>
				<a href="#profile_privacy">profile & privacy</a>
			</li>
			
			<li class="<?php echo $user_notification; ?>">
				<span class="icon-circle" style="">
					<i class="fa fa-envelope"></i>
				</span>
				<a href="#user_notification">email notifications</a>
			</li>
			
			<li class="<?php echo $login_settings; ?>">
				<span class="icon-circle" style="">
					<i class="fa fa-unlock-alt"></i></span>
					<a href="#login_settings">login</a>
			</li>
			
			<li class="<?php echo $rareteam_settings; ?>" >
				<span class="icon-circle" style="">
					<i class="fa fa-group"></i>
				</span>
				<a href="#rareteam_settings">SCDteams</a>
			</li>

			<li >
				<span class="icon-circle" style="">
					<i class="fa fa-question"></i>
				</span>
				<a class="contact_us_btn fapmodal-contact-us" data-target="#fapmodal-contact-us" data-toggle="modal">send us a question</a>
			</li>
		</ul>
	</div>
	
	
	<div class="tab-content">


		
		
		<div id="profile_privacy" class="tab <?php echo $profile_privacy; ?>">  
				<?php user_settings_profile_privacy(); ?>
			
		</div>

		<div id="user_notification" class="tab <?php echo $user_notification; ?>">   
			<?php  user_settings_notification(); ?>
		</div>


		<div id="login_settings" class="tab <?php echo $login_settings; ?>">
					<?php  us_login_settings();  ?>
		</div>
	
		<div id="rareteam_settings" class="tab <?php echo $rareteam_settings; ?>">
			<?php  user_settings_rareTeam(); ?>
		</div>

	</div>
</div>
<?php get_footer(); ?>