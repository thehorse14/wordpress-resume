<?php 
	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo( 'name' ); wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); 
		$options = get_option( 'section_selection' ); ?>
	</head>
<nav class="my-navbar">
	<?php 
		$formats = array( 'about', 'education', 'experience', 'skill', 'project');
		$sections = array();
		foreach ( $formats as $format ){
		$checked = ( $options[$format] == 1 ? 'checked' : '' );
			if($checked) {
				$sections[] = $format;
			}
		}

		$home_background = esc_attr( get_option( 'home_background' ) );
	 ?>
	 <div id="sidebar" class="bar-container bar-container-hide">
		<i class="fas fa-bars"></i>
	 </div>

	<ul class="sidebar" style="background:  rgb(30, 72, 209) url(<?php echo $home_background ?>) no-repeat top center; background-size: cover;">
		<li>
			<a href="#home">Home</a>
		</li>
		<?php foreach ($sections as $section) { ?>
		<li>
			<a href="#<?php echo $section?>"><?php echo $section?></a>
		</li>
		<?php } ?>
	</ul>
	<ul class="navbar-list" role="presentation">
		<li>
			<a href="#home" class="selected">Home</a>
		</li>
		<?php foreach ($sections as $section) { ?>
		<li>
			<a href="#<?php echo $section?>"><?php echo $section?></a>
		</li>
		<?php } ?>
	</ul>
</nav>

	
	
	
	
	
	
	
	
	
	
	
	
	
	