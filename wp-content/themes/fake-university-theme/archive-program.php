<?php get_header();
    pageBanner([
        'title' => 'All Programs',
        'subtitle' => 'See all of our available programs'
    ]);
?>

<div class="container container--narrow page-section">
    <ul class="link-list min-list">
	    <?php while (have_posts()) :
		    the_post();
		    ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	    <?php
	    endwhile; ?>
    </ul>
    <?php
	echo paginate_links()
	?>
</div>

<?php  get_footer(); ?>
