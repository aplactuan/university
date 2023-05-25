<?php
add_action('rest_api_init', 'universityRegisterRoute');

function universityRegisterRoute() {
	register_rest_route('university/v1', 'search',  [
		'method' => "GET",
		'callback' => 'universitySearchResults'
	]);
}

function universitySearchResults($data) {
	$mainQuery = new WP_Query([
		'post_type' => ['page', 'post', 'professor', 'event', 'campus', 'program'],
		's' => sanitize_text_field($data['keyword'])
	]);

	$results = [
		'generalInfo' => [],
		'campuses' => [],
		'professors' => [],
		'events' => [],
		'programs' => []
	];

	while ($mainQuery->have_posts()) {
		$mainQuery->the_post();
		if (in_array(get_post_type(), ['post', 'page'])) {
			$results['generalInfo'][] = [
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'postType' => get_post_type(),
				'authorName' => get_the_author()
			];
		}

		if (get_post_type() == 'campus') {
			$results['campuses'][] = [
				'title' => get_the_title(),
				'permalink' => get_the_permalink()
			];
		}

		if (get_post_type() == 'program') {
			$results['programs'][] = [
				'title' => get_the_title(),
				'permalink' => get_the_permalink()
			];
		}

		if (get_post_type() == 'event') {
			$results['events'][] = [
				'title' => get_the_title(),
				'permalink' => get_the_permalink()
			];
		}

		if (get_post_type() == 'professor') {
			$results['professors'][] = [
				'title' => get_the_title(),
				'permalink' => get_the_permalink()
			];
		}
	}

	return $results;
}