<?php
function fake_university_post_types() {
	register_post_type('Events', [
		'public' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-calendar',
		'labels' => [
			'name' => 'Events',
			'add_new_item' => 'Add new event',
			'edit_item' => 'Edit event',
			'all_items' => 'All Events',
			'singular_name' => 'Event'
		]
	]);
}

add_action('init', 'fake_university_post_types');
