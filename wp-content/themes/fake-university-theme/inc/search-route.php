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
		's' => sanitize_text_field($data['term'])
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
				'permalink' => get_the_permalink(),
				'id' => get_the_ID()
			];
		}

		if (get_post_type() == 'event') {
			$eventDate = new DateTime(get_field('event_date'));
			$results['events'][] = [
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'description' => has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 18),
				'month' => $eventDate->format('M'),
				'day' => $eventDate->format('d')
			];
		}

		if (get_post_type() == 'professor') {
			$results['professors'][] = [
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'image' => get_the_post_thumbnail_url(0, 'professorLandscape')
			];
		}
	}

	if ($results['programs']) {
		$relatedProfessorMetaQuery = ['relations' => 'OR'];

		foreach ($results['programs'] as $item) {
			array_push($relatedProfessorMetaQuery, [
				'key' => 'related_programs',
				'compare' => 'LIKE',
				'value' => '"'. $item['id'] .'"'
			]);
		}
		$relatedProfessorsQuery = new WP_Query([
			'post_type' => 'professor',
			'meta_query' =>$relatedProfessorMetaQuery
		]);

		while ($relatedProfessorsQuery->have_posts()) {
			$relatedProfessorsQuery->the_post();
			$results['professors'][] = [
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'image' => get_the_post_thumbnail_url(0, 'professorLandscape')
			];
		}

		$results['professors'] = array_values(array_unique($results['professors'], SORT_ASC));
	}

	return $results;
}