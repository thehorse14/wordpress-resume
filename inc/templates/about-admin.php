<h1>About Me</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="th-form">
	<?php settings_fields( 'th-about-settings' ); ?>
	<?php do_settings_sections( 'th_about' ); ?>
	<?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>