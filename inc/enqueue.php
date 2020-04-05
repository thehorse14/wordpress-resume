<?php

function th_load_admin_scripts( $hook ){
	// echo $hook;
	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
	
	wp_register_script( 'th-admin-script', get_template_directory_uri() . '/js/home.admin.js', array('jquery'), '1.0.0', true );
	wp_register_script( 'th-about-script', get_template_directory_uri() . '/js/th.about.js', array('jquery'), '1.0.0', true);
	wp_register_style( 'th-setting-style', get_template_directory_uri() . '/css/th.admin.css' );
	
	$pages_array = array(
		'toplevel_page_th_general_settings',
		'resume_page_th_theme',
		'resume_page_th_about_settings'
	);
	
	if( in_array( $hook, $pages_array ) ){
		
		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'th-setting-style' );
	} 
	
	if( 'resume_page_th_theme' == $hook ){
		
		wp_enqueue_media();
		wp_enqueue_script( 'th-admin-script' );
	}

	if( 'resume_page_th_about_settings' == $hook) {
		wp_enqueue_media();
		wp_enqueue_script( 'th-about-script' );
	}
	
}
add_action( 'admin_enqueue_scripts', 'th_load_admin_scripts' );


function th_load_scripts(){
	wp_enqueue_style('fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css');
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
	wp_enqueue_style( 'my-style', get_template_directory_uri() . '/style.css', NULL, microtime(), 'all' );
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'section-detection', get_template_directory_uri() . '/js/section-detection.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery' );
	
}
add_action( 'wp_enqueue_scripts', 'th_load_scripts' );















