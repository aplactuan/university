<?php
add_action('rest_api_init', 'universityRegisterRoute');

function universityRegisterRoute() {
	register_rest_route('university/v1', 'search',  [
		'method' => "GET",
		'callback' => 'universitySearchResults'
	]);
}

function universitySearchResults() {
	$professors = new WP_Query([
		'post_type' => 'professor'
	]);

	$professorList = [];

	while ($professors->have_posts()) {
		$professors->the_post();
		$professorList[] = [
			'title' => get_the_title(),
			'permalink' => get_the_permalink()
		];
	}

	return $professorList;
}