<?php get_header();
    pageBanner([
        'title' => 'All Events',
        'subtitle' => 'Be updated in our events'
    ]);
?>

<div class="container container--narrow page-section">
	<?php while (have_posts()) :
		the_post();
		?>
        <div class="event-summary">
	        <?php $eventDate = new DateTime(get_field('event_date')); ?>
            <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                <span class="event-summary__month"><?php echo  $eventDate->format('M'); ?></span>
                <span class="event-summary__day"><?php echo  $eventDate->format('d'); ?></span>
            </a>
            <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php echo wp_trim_words(get_the_content(), 18) ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
            </div>
        </div>
	<?php
	endwhile;
	echo paginate_links()
	?>
    <hr class="section-break" />
    <p>
        Miss out on our previous events. <a href="<?php echo site_url('past-events') ?>">Check them out on our past events page </a>
    </p>
</div>

<?php  get_footer(); ?>
