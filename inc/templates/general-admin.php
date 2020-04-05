<h1>General</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="th-form">
	<?php settings_fields( 'th-general-group' ); ?>
	<?php do_settings_sections( 'th_general' ); ?>
	<?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>