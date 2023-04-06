<?php get_header();
    pageBanner([
        'title' => 'Previous Events',
        'subtitle' => 'Our completed events'
    ]);
?>
<div class="container container--narrow page-section">
	<?php
	$pastEvents = new WP_Query([
		'paged' => get_query_var('paged', 1),
		'order_by' => 'meta_value_num',
		'meta_key' => 'event_date',
		'order' => 'ASC',
		'post_type' => 'event',
		'meta_query' => [
			[
				'key' => 'event_date',
				'compare' => '<',
				'value' => $today = date('Ymd'),
				'type' => 'NUMERIC'
			]
		]
	]);
		while ($pastEvents->have_posts()) :
			$pastEvents->the_post();
			get_template_part('template-parts/content-event');
	endwhile;
	echo paginate_links([
		'total' => $pastEvents->max_num_pages
	])
	?>
</div>

<?php  get_footer(); ?>
