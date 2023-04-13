<?php get_header();
pageBanner([
	'title' => 'All Campuses',
	'subtitle' => 'Look on all of our campuses'
]);
?>

    <div class="container container--narrow page-section">
        <div class="acf-map">
			<?php while (have_posts()) :
				the_post();
                $mapLocation = get_field('map_location')
				?>
                <div class="marker" data-lat="<?php echo $mapLocation['lat']?>" data-lng="<?php echo $mapLocation['lng']?>"></div>

			<?php
			endwhile; ?>
        </div>
    </div>

<?php  get_footer(); ?>