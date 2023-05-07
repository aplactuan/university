<?php
function pageBanner($args = NULL) {
	if (!isset($args['title'])) {
		$args['title'] = get_the_title();
	}
	if (!isset($args['subtitle'])) {
		$args['subtitle'] = get_field('page_banner_subtitle_text');
	}

	if (!isset($args['photo'])) {
		if (get_field('page_banner_image')
            && !is_home()
            && !is_archive()
        ) {
			$args['photo'] = get_field('page_banner_image')['sizes']['pageBanner'];
		}
		else {
			$args['photo'] = get_theme_file_uri('images/ocean.jpg');
		}
	}
	?>
	<div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>)"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
			<div class="page-banner__intro">
				<p><?php echo $args['subtitle']; ?></p>
			</div>
		</div>
	</div>
<?php
}
function fake_university_files() {
	wp_enqueue_script('googlemap', '//maps.googleapis.com/maps/api/js?key=AIzaSyCpTDHxpR46BxOz5ow7Qgtxady1uWY3kOc', NULL, 1.0, true);
	wp_enqueue_script('fake_university_main_script', get_theme_file_uri('/build/index.js'), ['jquery'], 1.0, true);
	wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('custom_google_fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	wp_enqueue_style('fake_university_main_style', get_theme_file_uri('/build/style-index.css'));
	wp_enqueue_style('fake_university_extra_style', get_theme_file_uri('/build/index.css'));

    wp_localize_script('fake_university_main_script', 'siteData', [
            'root_url' => get_site_url()
    ]);
}

add_action('wp_enqueue_scripts', 'fake_university_files');

function fake_university_features() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_image_size('professorLandscape', 400,  200, true);
	add_image_size('professorPortrait', 480, 650, true);
	add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'fake_university_features');

function fake_university_get_posts($query) {
	if (!is_admin() AND is_post_type_archive('campus') AND $query->is_main_query()) {
		$query->set('posts_per_page', -1);
	}

	if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
		$query->set('order_by', 'title');
		$query->set('order', 'asc');
		$query->set('posts_per_page', -1);
	}
	if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
		$query->set('order_by', 'meta_value_num');
		$query->set('meta_key', 'event_date');
		$query->set('order', 'asc');
		$query->set('meta_query', [
			[
				'key' => 'event_date',
				'compare' => '>=',
				'value' => $today = date('Ymd'),
				'type' => 'NUMERIC'
			]
		]);
	}
}

add_action('pre_get_posts', 'fake_university_get_posts');
function fake_university_google_api($api) {
    $api['key'] = 'secret';
    return $api;
}
add_filter('acf/fields/google_map/api', 'fake_university_google_api');