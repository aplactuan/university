<?php

function university_post_types() {
	//professor post type
	register_post_type('professor', [
		'supports' => ['title', 'editor', 'thumbnail'],
		'public' => true,
		'show_in_rest' => true,
		'labels' => [
			'name' => 'Professors',
			'add_new' => 'Add Professor',
			'add_new_item' => 'Add New Professor',
			'edit_item' => 'Edit Professor',
			'all_items' => 'All Professors',
			'singular_name' => 'Professor'
		],
		'menu_icon' => 'dashicons-businessperson'
	]);

    //campus post type
    register_post_type('campus', [
        'supports' => ['title', 'editor', 'excerpt'],
        'rewrite' => ['slug' => 'campuses'],
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => 'Campuses',
            'add_new' => 'Add Campus',
            'add_new_item' => 'Add New Campus',
            'edit_item' => 'Edit Campus',
            'all_items' => 'All Campuses',
            'singular_name' => 'Campus'
        ],
        'menu_icon' => 'dashicons-location-alt'
    ]);

	//event post type
	register_post_type('event', [
		'supports' => ['title', 'editor', 'excerpt'],
		'rewrite' => ['slug' => 'events'],
		'has_archive' => true,
		'public' => true,
		'show_in_rest' => true,
		'labels' => [
			'name' => 'Events',
			'add_new' => 'Add Event',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			'all_items' => 'All Events',
			'singular_name' => 'Event'
		],
		'menu_icon' => 'dashicons-calendar'
	]);

	//program post type
	register_post_type('program', [
		'supports' => ['title', 'editor'],
		'rewrite' => ['slug' => 'programs'],
		'has_archive' => true,
		'public' => true,
		'show_in_rest' => true,
		'labels' => [
			'name' => 'Programs',
			'add_new' => 'Add Program',
			'add_new_item' => 'Add New Program',
			'edit_item' => 'Edit Program',
			'all_items' => 'All Program',
			'singular_name' => 'Program'
		],
		'menu_icon' => 'dashicons-awards'
	]);
}
add_action('init', 'university_post_types');
