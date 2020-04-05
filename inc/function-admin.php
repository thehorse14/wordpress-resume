<?php


function th_add_admin_page() {
	
	add_menu_page( 'Resume Setting', 'Resume', 'manage_options', 'th_general_settings', 'th_theme_general_page', 'dashicons-id-alt', 110 );

	//General
	add_submenu_page( 'th_general_settings', 'Resume General Options', 'General', 'manage_options', 'th_general_settings', 'th_theme_general_page' );
	//Home
	add_submenu_page( 'th_general_settings', 'Resume Home Options', 'Home', 'manage_options', 'th_theme', 'th_theme_create_page' );
	//About Me
	add_submenu_page( 'th_general_settings', 'About Options', 'About Me', 'manage_options', 'th_about_settings', 'th_theme_about_page' );
}
add_action( 'admin_menu', 'th_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'th_custom_settings' );

function th_custom_settings() {

	//General
	register_setting( 'th-general-group', 'section_selection' );


	add_settings_section('th-general-options', '', 'th_general_options', 'th_general');

	add_settings_field( 'section-selections', 'Section selections', 'th_section_selections', 'th_general', 'th-general-options' );

	//Home
	register_setting( 'th-settings-group', 'home_background' );
	register_setting( 'th-settings-group', 'home_title' );
	register_setting( 'th-settings-group', 'home_description' );
	register_setting( 'th-settings-group', 'facebook_link' );
	register_setting( 'th-settings-group', 'twitter_link' ); // sanitize callback function);
	register_setting( 'th-settings-group', 'linkedin_link' );
	register_setting( 'th-settings-group', 'instagram_link' );
	register_setting( 'th-settings-group', 'github_link' );
	register_setting( 'th-settings-group', 'skype_link' );
	
	add_settings_section( 'th-home-options', '', 'th_home_options', 'th_theme');
	
	add_settings_field( 'sidebar-profile-picture', 'Home Background', 'th_profile', 'th_theme', 'th-home-options');
	add_settings_field( 'home-title', 'Home Title', 'th_home_title', 'th_theme', 'th-home-options' );
	add_settings_field( 'home-description', 'Home Description', 'th_home_description', 'th_theme', 'th-home-options' );
	add_settings_field( 'facebook-link', 'Facebook Link', 'th_facebook_link', 'th_theme', 'th-home-options' );
	add_settings_field( 'twitter-link', 'Twitter Link', 'th_twitter_link', 'th_theme', 'th-home-options' );
	add_settings_field( 'linkedin-link', 'LinkedIn Link', 'th_linkedin_link', 'th_theme', 'th-home-options' );
	add_settings_field( 'instagram-link', 'Instagram Link', 'th_instagram_link', 'th_theme', 'th-home-options' );
	add_settings_field( 'github-link', 'GitHub Link', 'th_github_link', 'th_theme', 'th-home-options' );
	add_settings_field( 'skype_link', 'Skype Link', 'th_skype_link', 'th_theme', 'th-home-options' );

	
	//About me
	register_setting( 'th-about-settings', 'profile_picture' );
	register_setting( 'th-about-settings', 'cover_picture' );
	register_setting( 'th-about-settings', 'about_me' );
	register_setting( 'th-about-settings', 'first_name' );
	register_setting( 'th-about-settings', 'last_name' );
	register_setting( 'th-about-settings', 'address' );
	register_setting( 'th-about-settings', 'mobile_phone' );
	register_setting( 'th-about-settings', 'email' );

	add_settings_section( 'th-about-options', '', 'th_about_settings', 'th_about' );
	add_settings_field( 'profile_picture', 'Profile Picture', 'th_profile_picture', 'th_about', 'th-about-options' );
	add_settings_field( 'cover_picture', 'Cover Picture', 'th_cover_picture', 'th_about', 'th-about-options' );
	add_settings_field( 'about_me', 'Description About Yourself', 'th_about_me', 'th_about', 'th-about-options' );
	add_settings_field( 'about_name', 'Full Name', 'th_name', 'th_about', 'th-about-options' );
	add_settings_field( 'about_address', 'Address', 'th_address', 'th_about', 'th-about-options' );
	add_settings_field( 'mobile_phone', 'Mobile', 'th_mobile_phone', 'th_about', 'th-about-options' );
	add_settings_field( 'about_email', 'Email', 'th_email', 'th_about', 'th-about-options' );

	
}

function th_general_options() {
	echo 'Resume Site General Setting';
}


function th_about_settings() {
	echo 'Customize information about you';
}

function th_home_options() {
	echo 'Customize your Sidebar Information';
}

function th_section_selections() {
	$options = get_option( 'section_selection' );
	$formats = array( 'about', 'education', 'experience', 'skill', 'project');
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="section_selection['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function th_profile() {
	$home_background = esc_attr( get_option( 'home_background' ) );
	if( empty($home_background) ){
		echo '<button type="button" class="wordpress-button" value="Upload Background Picture" id="upload-button"><span class="dashicons-before dashicons-format-image"></span> Upload Background Picture</button><input type="hidden" id="profile-picture" name="home_background" value="" />';
	} else {
		echo '<button type="button" class="wordpress-button" value="Replace Background Picture" id="upload-button"><span class="dashicons-before dashicons-format-image"></span> Replace Background Picture</button><input type="hidden" id="profile-picture" name="home_background" value="'.$home_background.'" /> <button type="button" class="wordpress-button" value="Remove" id="remove-picture"><span class="dashicons-before dashicons-no"></span> Remove</button>';
	}
	
}
function th_home_title() {
	$home_title = esc_attr( get_option( 'home_title' ) );
	echo '<input type="text" name="home_title" value="'.$home_title.'" placeholder="Home Title" />';
}
function th_home_description() {
	$home_description = esc_attr( get_option( 'home_description' ) );
	echo '<textarea style="width: 100%; height: 100%" name="home_description" placeholder="Home Description" >'.$home_description.'</textarea>';
}
function th_facebook_link() {
	$facebook_link = esc_attr( get_option( 'facebook_link' ) );
	echo '<input type="text" name="facebook_link" value="'.$facebook_link.'" placeholder="Facebook Link" />';
}
function th_twitter_link() {
	$twitter_link = esc_attr( get_option( 'twitter_link' ) );
	echo '<input type="text" name="twitter_link" value="'.$twitter_link.'" placeholder="Twitter Link" />';
}
function th_linkedin_link() {
	$linkedin_link = esc_attr( get_option( 'linkedin_link' ) );
	echo '<input type="text" name="linkedin_link" value="'.$linkedin_link.'" placeholder="LinkedIn Link" />';
}
function th_instagram_link() {
	$instagram_link = esc_attr( get_option( 'instagram_link' ) );
	echo '<input type="text" name="instagram_link" value="'.$instagram_link.'" placeholder="Instagram Link" />';
}
function th_github_link() {
	$github_link = esc_attr( get_option( 'github_link' ) );
	echo '<input type="text" name="github_link" value="'.$github_link.'" placeholder="GitHub Link" />';
}
function th_skype_link() {
	$skype_link = esc_attr( get_option( 'skype_link' ) );
	echo '<input type="text" name="skype_link" value="'.$skype_link.'" placeholder="Skype Link" />';
}

//About Me
function th_profile_picture() {
	$profile_picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($profile_picture) ){
		echo '<button type="button" class="wordpress-button" value="Upload Profile Picture" id="upload-button"><span class="dashicons-before dashicons-format-image"></span> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<button type="button" class="wordpress-button" value="Replace Profile Picture" id="upload-button"><span class="dashicons-before dashicons-format-image"></span> Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$profile_picture.'" /> <button type="button" class="wordpress-button" value="Remove" id="remove-picture"><span class="dashicons-before dashicons-no"></span> Remove</button>';
	}
	
}
function th_cover_picture() {
	$cover_picture = esc_attr( get_option( 'cover_picture' ) );
	if( empty($cover_picture) ){
		echo '<button type="button" class="wordpress-button" value="Upload Cover Picture" id="upload-cover-button"><span class="dashicons-before dashicons-format-image"></span> Upload Cover Picture</button><input type="hidden" id="cover-picture" name="cover_picture" value="" />';
	} else {
		echo '<button type="button" class="wordpress-button" value="Replace Cover Picture" id="upload-cover-button"><span class="dashicons-before dashicons-format-image"></span> Replace Cover Picture</button><input type="hidden" id="cover-picture" name="cover_picture" value="'.$cover_picture.'" /> <button type="button" class="wordpress-button" value="Remove" id="remove-cover-picture"><span class="dashicons-before dashicons-no"></span> Remove</button>';
	}
	
}
function th_about_me() {
	$about_me = esc_attr( get_option( 'about_me' ) );
	echo '<textarea style="width: 100%" name="about_me" placeholder="About Me" >'.$about_me.'</textarea>';
}
function th_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function th_address() {
	$address = esc_attr( get_option ( 'address' ) );
	echo '<input type="text" name="address" value="'.$address.'" placeholder="Address" />';
}
function th_mobile_phone() {
	$mobile_phone = esc_attr( get_option ( 'mobile_phone' ) );
	echo '<input type="text" name="mobile_phone" value="'.$mobile_phone.'" placeholder="Mobile Phone" />';
}
function th_email() {
	$email = esc_attr( get_option ( 'email' ) );
	echo '<input type="text" name="email" value="'.$email.'" placeholder="Email Address" />';
}

//General Template
function th_theme_general_page() {
	require_once( get_template_directory() . '/inc/templates/general-admin.php');
}

//Home Template
function th_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/home-admin.php' );
}
//About Me Template
function th_theme_about_page() {
	require_once( get_template_directory() . '/inc/templates/about-admin.php' );
}

















