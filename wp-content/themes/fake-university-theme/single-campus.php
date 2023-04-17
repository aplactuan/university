<?php
get_header();
while (have_posts()) :
	the_post();
	pageBanner();
	?>
	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program') ?>"><i class="fa fa-home" aria-hidden="true"></i>All Campus</a>
				<span class="metabox__main"><?php the_title() ?></span>
			</p>
		</div>
		<div class="generic-content">
			<?php the_content() ?>
		</div>
		<?php
		$campusPrograms = new WP_Query([
			'posts_per_page' => -1,
			'order_by' => 'title',
			'order' => 'ASC',
			'post_type' => 'program',
			'meta_query' => [
				[
					'key' => 'related_campus',
					'compare' => 'LIKE',
					'value' => '"' . get_the_ID() . '"'
				]
			]
		]);
		if ($campusPrograms->have_posts()) : ?>
			<hr class="section-break">
			<h2 class="headline headline--medium">
				Programs found in this Campus
			</h2>
			<ul class="link-list min-list">
				<?php
				while ($campusPrograms->have_posts()):
					$campusPrograms->the_post();
					?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</li>
				<?php
				endwhile; ?>
			</ul>
		<?php endif;

		wp_reset_postdata();
		?>

	</div>
<?php endwhile;
get_footer();
?>

