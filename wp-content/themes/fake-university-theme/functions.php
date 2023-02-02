<?php
function fake_university_files() {
	wp_enqueue_script('fake_university_main_script', get_theme_file_uri('/build/index.js'), ['jquery'], 1.0, true);
	wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('custom_google_fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	wp_enqueue_style('fake_university_main_style', get_theme_file_uri('/build/style-index.css'));
	wp_enqueue_style('fake_university_extra_style', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'fake_university_files');

function fake_university_features() {
	add_theme_support('title-tag');
}

add_action('after_setup_theme', 'fake_university_features');