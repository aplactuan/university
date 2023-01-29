<?php
function fake_university_files() {
	wp_enqueue_style('fake_university_main_style', get_theme_file_uri('/build/style-index.css'));
	wp_enqueue_style('fake_university_extra_style', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'fake_university_files');