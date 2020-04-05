<?php get_header(); ?>
	<?php 

		$options = get_option( 'section_selection' ); 
		//Home
		$home_background = esc_attr( get_option( 'home_background' ) );
		$home_title = esc_attr( get_option( 'home_title' ) );
		$home_description = esc_attr( get_option( 'home_description' ) );
		$facebook_link = esc_attr( get_option( 'facebook_link' ) );
		$twitter_link = esc_attr( get_option( 'twitter_link' ) );
		$linkedin_link = esc_attr( get_option( 'linkedin_link' ) );
		$instagram_link = esc_attr( get_option( 'instagram_link' ) );
		$github_link = esc_attr( get_option( 'github_link' ) );
		$skype_link = esc_attr( get_option( 'skype_link' ) );

		//About Me
		$profile_picture = esc_attr( get_option( 'profile_picture' ) );
		$cover_picture = esc_attr( get_option( 'cover_picture' ) );
		$about_me = esc_attr( get_option( 'about_me' ) );
		$first_name = esc_attr( get_option( 'first_name' ) );
		$last_name = esc_attr( get_option( 'last_name' ) );
		$address = esc_attr( get_option( 'address' ) );
		$mobile_phone = esc_attr( get_option( 'mobile_phone' ) );
		$email = esc_attr( get_option( 'email' ) );

	?>
	<div id="home" class="section header" style="background: black url(<?php echo $home_background ?>) no-repeat top center; background-size: cover;">
		<h1 class="title"><?php echo $home_title ?></h1>
		<h2 class="description"><?php echo $home_description ?></h2>
		<div class="social-icon">
		<ul class="icon-list">
			<?php if($facebook_link) { ?>
			<li>	
				<a href="<?php echo $facebook_link ?>" target="_blank" rel="noopener" aria-label="Find me on Facebook">
					<i class="fab fa-facebook fa-2x facebook"></i>
				</a>
			</li>
			<?php } ?>
			<?php if($twitter_link) { ?>
			<li>
				<a href="<?php echo $twitter_link ?>" target="_blank" rel="noopener" aria-label="Find me on Twitter">
					<i class="fab fa-twitter fa-2x twitter"></i>
				</a>
			</li>
			<?php } ?>
			<?php if($linkedin_link) { ?>
			<li>	
				<a href="<?php echo $linkedin_link ?>" target="_blank" rel="noopener" aria-label="Find me on LinkedIn">
					<i class="fab fa-linkedin fa-2x linkedin"></i>
				</a>
			</li>
			<?php } ?>
			<?php if($instagram_link) { ?>
			<li>
				<a href="<?php echo $instagram_link ?>" target="_blank" rel="noopener" aria-label="Find me on Instagram">
					<i class="fab fa-instagram fa-2x instagram"></i>
				</a>
			</li>
			<?php } ?>
			<?php if($github_link) { ?>
			<li>
				<a href="<?php echo $github_link ?>" target="_blank" rel="noopener" aria-label="Find me on GitHub">
					<i class="fab fa-github fa-2x github"></i>
				</a>
			</li>
			<?php } ?>
			<?php if($skype_link) { ?>
			<li>
				<a href="<?php echo $skype_link ?>" target="_blank" rel="noopener" aria-label="Find me on Skype">
					<i class="fab fa-skype fa-2x skype"></i>
				</a>	
			</li>
			<?php } ?>
        </ul>
		</div>
	</div>
	
	<?php if($options['about'] == 1) { ?>
		<div id="about" class="section about" style="background: black url(<?php echo $cover_picture ?>) no-repeat top center; background-size: cover;">
			<div class="profile">
				<div class="profile-picture">
					<img width="150px" alt="My Profile Picture" src="<?php echo $profile_picture ?>">
				</div>
				<div class="information">
					<div class="name">
						<?php echo $first_name . ' ' . $last_name ?>
					</div>
					<div class="address">
						<i class="fa fa-map-marker info-icon" aria-hidden="true"></i><?php echo $address ?>
					</div>
					<div class="mobile-phone">
						<i class="fa fa-phone info-icon" aria-hidden="true"></i><?php echo $mobile_phone ?>
					</div>
					<div class="email">
						<i class="fa fa-envelope info-icon" aria-hidden="true"></i><?php echo $email ?>
					</div>
				</div>

			</div>
			<div class="about-me">
				<?php echo $about_me ?>
			</div>
		</div>
	<?php } ?>

	<?php if($options['education'] == 1) { ?>
	<div id="education" class="section general-section"> 
		<h3 class="general-title">Education</h3>
		<div class="general-list">
		<?php 
		$args = array(
					'post_type' => 'education',
					'orderby' => 'date',
					'order' => 'ASC'
				);

				$educations = new WP_Query($args);

				while($educations->have_posts()) {
					$educations->the_post();

					$school = rwmb_get_value('th-school');
					$qualification = rwmb_get_value('th-qualification');
					$description = rwmb_get_value('th-school_description');
					$start_date = rwmb_get_value('th-start_date');
					$end_date = rwmb_get_value('th-end_date');

		?>
			<div class="general-item">
				<div class="general-name">
					<?php echo $school ?>
				</div>
				<div class="general-info">
					<div class="general-qualification">
						<?php echo $qualification ?>
					</div>
					<div class="general-date">
						<?php echo $start_date . ' - ' . $end_date ?>
					</div>
				</div>
				<div class="general-description">
					<?php echo $description ?>
				</div>
			</div>
	<?php } ?>
		</div>
	</div>
	<?php } ?>
	<div class="divider"></div>
		
	<?php if($options['experience'] == 1) { ?>
		<div id="experience" class="section general-section"> 
		<h3 class="general-title">Experiences</h3>
		<div class="general-list">
		<?php 
		$args = array(
					'post_type' => 'experience',
					'orderby' => 'date',
					'order' => 'ASC'
				);

				$experiences = new WP_Query($args);

				while($experiences->have_posts()) {
					$experiences->the_post();

					$school = rwmb_get_value('th-company');
					$qualification = rwmb_get_value('th-position');
					$description = rwmb_get_value('th-experience_description');
					$start_date = rwmb_get_value('th-start_date');
					$end_date = rwmb_get_value('th-end_date');

		?>
			<div class="general-item">
				<div class="general-name">
					<?php echo $school ?>
				</div>
				<div class="general-info">
					<div class="general-qualification">
						<?php echo $qualification ?>
					</div>
					<div class="general-date">
						<?php echo $start_date . ' - ' . $end_date ?>
					</div>
				</div>
				<div class="general-description">
					<?php echo $description ?>
				</div>
			</div>
	<?php } ?>
		</div>
	</div>
	<?php } ?>
	<div class="divider"></div>
	
	<?php if($options['skill'] == 1) { ?>
	<div id="skill" class="section skill">
		<h3 class="skill-title">Skills</h3>
		<div class="skill-list">

		<?php 
			wp_reset_query();

			$args = array(
				'post_type' => 'skill',
				 'meta_key' => 'th-percentage',
				  'orderby' => 'meta_value',
				  'order' => 'DESC',
			);
			

			$skills = new WP_Query($args);

			while($skills->have_posts()) {
				$skills->the_post();

				$skill = rwmb_get_value('th-skill');
				$skill_percentage = rwmb_get_value('th-percentage');
		
		?>
		<div class="skill-card">
			<div class="skill-name"><?php echo $skill ?></div>
			<ul class="skill-list">
				<li class="default-bar">
					<span class="skill-percentage" style="width:<?php echo $skill_percentage ?>%"></span>
				</li>
			</ul>
		</div>

		<?php } ?>
		</div>
	</div>
	<?php } ?>


	<?php if($options['project'] == 1) { ?>
	<div id="project" class="section project" style="background:#fff url(<?php echo get_template_directory_uri() . '/img/projects-background.jpg' ?>) no-repeat top center; background-size: cover;">
		<h3 class="project-title">Projects</h3>
		<div class="project-list">
		<?php 
			wp_reset_query();
			$args = array(
				'post_type' => 'project',
				'orderby' => 'date',
				'order' => 'ASC'
			);

			$projects = new WP_Query($args);

			while($projects->have_posts()) {
				$projects->the_post();

				$project_title = rwmb_get_value('th-project_title');
				$project_url = rwmb_get_value('th-project_url');
				$project_description = rwmb_get_value('th-project_description');
		
		?>
		<div class="project-card" style="background: #fff url(<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>) no-repeat top center; background-size: cover;">
			<div class="project-overlay" >
				<a href="<?php echo $project_url ?>">
				<div class="project-name"><?php echo $project_title ?></div>
				<div class="project-description"><?php echo $project_description ?></div>
				</a>
			</div>
		</div>
		<?php } ?>
		</div>
	</div>
	<?php } ?>		
	<?php get_footer(); ?>