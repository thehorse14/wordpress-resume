<h1>Home Setting</h1>
<?php settings_errors(); ?>
<?php 
	
	$home_background = esc_attr( get_option( 'home_background' ) );
	$home_title = esc_attr( get_option( 'home_title' ));
	$home_description = esc_attr( get_option( 'home_description' ) );

	$facebook_link = esc_attr( get_option( 'facebook_link' ) );
	$twitter_link = esc_attr( get_option( 'twitter_link' ) );
	$linkedin_link = esc_attr( get_option( 'linkedin_link' ) );
	$instagram_link = esc_attr( get_option( 'instagram_link' ) );
	$github_link = esc_attr( get_option( 'github_link' ) );
	$skype_link = esc_attr( get_option( 'skype_link' ) );

	
?>

<form id="submitForm" method="post" action="options.php" class="th-form">
	<?php settings_fields( 'th-settings-group' ); ?>
	<?php do_settings_sections( 'th_theme' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>