<?php get_header();
    pageBanner([
       'title' => 'All Events',
       'subtitle' => 'All the university events'
    ]);
?>
	<div class="container container--narrow page-section">
		<?php while (have_posts()) {
			the_post();
            get_template_part('template-parts/content', 'event');
        }
		echo paginate_links();
		?>
        <hr class="section-break">

        <p>Looking for our previous events? <a href="<?php echo site_url('/past-events') ?>">Check out our previous events</a></p>
	</div>
<?php	get_footer(); ?>