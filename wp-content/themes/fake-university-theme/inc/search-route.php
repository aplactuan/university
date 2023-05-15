<?php

add_action('register_api_init', 'universityRegisterRoute');

function universitySearchRoute() {
	register_rest_route('university/v1', 'search',  [
		'method' => WP_REST_Server::READABLE,
		'callback' => 'universitySearchResults'
	]);
}

function universitySearchResults() {
	return "It's morbin time";
}