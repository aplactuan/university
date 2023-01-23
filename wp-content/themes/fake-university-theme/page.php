<?php while (have_posts()) :
	the_post(); ?>
	HEllo
	<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
	<p><?php the_content(); ?></p>
<?php endwhile; ?>