<?php
function fake_university_files() {
	wp_enqueue_style('fake_university_main_style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'fake_university_files');