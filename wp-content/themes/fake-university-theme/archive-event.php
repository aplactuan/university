<?php get_header();
    pageBanner([
        'title' => 'All Events',
        'subtitle' => 'Be updated in our events'
    ]);
?>

<div class="container container--narrow page-section">
	<?php while (have_posts()) :
		the_post();
		get_template_part('template-parts/content-event');
	endwhile;
	echo paginate_links()
	?>
    <hr class="section-break" />
    <p>
        Miss out on our previous events. <a href="<?php echo site_url('past-events') ?>">Check them out on our past events page </a>
    </p>
</div>

<?php  get_footer(); ?>
