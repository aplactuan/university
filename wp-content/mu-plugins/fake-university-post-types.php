<?php
function fake_university_post_types() {
	//Event post type
	register_post_type('event', [
		'rewrite' => ['slug' => 'events'],
		'has_archive' => true,
		'public' => true,
		'show_in_rest' => true,
		'supports' => ['title', 'excerpt', 'editor'],
		'menu_icon' => 'dashicons-calendar',
		'labels' => [
			'name' => 'Events',
			'add_new_item' => 'Add new event',
			'edit_item' => 'Edit event',
			'all_items' => 'All Events',
			'singular_name' => 'Event'
		]
	]);

	//Program post type
	register_post_type('program', [
		'rewrite' => ['slug' => 'programs'],
		'has_archive' => true,
		'public' => true,
		'show_in_rest' => true,
		'supports' => ['title', 'editor'],
		'menu_icon' => 'dashicons-awards',
		'labels' => [
			'name' => 'Programs',
			'add_new_item' => 'Add new programs',
			'edit_item' => 'Edit programs',
			'all_items' => 'All Programs',
			'singular_name' => 'Program'
		]
	]);
}

add_action('init', 'fake_university_post_types');