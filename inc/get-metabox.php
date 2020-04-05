
<?php

function th_get_meta_box( $meta_boxes ) {
	$prefix = 'th-';
	$meta_boxes = array();
	$meta_boxes[] = array(
		'id' => 'education',
		'title' => esc_html__( 'Education Information', 'metabox-online-generator' ),
		'post_types' => array( 'education' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'school',
				'type' => 'text',
				'name' => esc_html__( 'School Name', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'qualification',
				'type' => 'text',
				'name' => esc_html__( 'Qualification', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'school_description',
				'type' => 'textarea',
				'name' => esc_html__( 'Description', 'metabox-online-generator' ),
			),

		),
	);

	$meta_boxes[] = array(
		'id' => 'experience',
		'title' => esc_html__( 'Experience Information', 'metabox-online-generator' ),
		'post_types' => array( 'experience' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'company',
				'type' => 'text',
				'name' => esc_html__( 'Company Name', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'position',
				'type' => 'text',
				'name' => esc_html__( 'Position', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'experience_description',
				'type' => 'textarea',
				'name' => esc_html__( 'Description', 'metabox-online-generator' ),
			),

		),
	);

	$meta_boxes[] = array(
		'id' => 'general',
		'title' => esc_html__( 'Date', 'metabox-online-generator' ),
		'post_types' => array( 'experience', 'education' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'start_date',
				'type' => 'date',
				'name' => esc_html__( 'Start Date', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'end_date',
				'type' => 'date',
				'name' => esc_html__( 'End Date', 'metabox-online-generator' ),
			),
		),
	);

	$meta_boxes[] = array(
		'id' => 'project',
		'title' => esc_html__( 'Project', 'metabox-online-generator' ),
		'post_types' => array('project' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'project_title',
				'type' => 'text',
				'name' => esc_html__( 'Title', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'project_url',
				'type' => 'url',
				'name' => esc_html__( 'URL', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'project_description',
				'type' => 'textarea',
				'name' => esc_html__( 'Description', 'metabox-online-generator' ),
			),
		),
	);

	$meta_boxes[] = array(
		'id' => 'skills',
		'title' => esc_html__( 'Skill', 'metabox-online-generator' ),
		'post_types' => array('skill' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'skill',
				'type' => 'text',
				'name' => esc_html__( 'Title', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'percentage',
				'type' => 'slider',
				'name' => esc_html__( 'Level of Proficiency', 'metabox-online-generator' ),
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'th_get_meta_box' );

?>