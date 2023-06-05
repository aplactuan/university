<?php
get_header();
while (have_posts()) :
	the_post();
    pageBanner();
?>
	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program') ?>"><i class="fa fa-home" aria-hidden="true"></i>All Programs</a>
				<span class="metabox__main"><?php the_title() ?></span>
			</p>
		</div>
		<div class="generic-content">
			<?php the_field('main_content_body') ?>
		</div>
		<?php
		$programProfessors = new WP_Query([
			'posts_per_page' => -1,
			'order_by' => 'title',
			'order' => 'ASC',
			'post_type' => 'professor',
			'meta_query' => [
				[
					'key' => 'related_programs',
					'compare' => 'LIKE',
					'value' => '"' . get_the_ID() . '"'
				]
			]
		]);
		if ($programProfessors->have_posts()) : ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">
                <?php echo get_the_title() ?> Professors
            </h2>
            <ul class="professor-cards">
                <?php
                while ($programProfessors->have_posts()):
                    $programProfessors->the_post();
                    ?>
                    <li class="professor-card__list-item">
                        <a href="<?php the_permalink(); ?>" class="professor-card">
                            <img src="<?php the_post_thumbnail_url('professorLandscape'); ?>" class="professor-card__image" >
                            <span class="professor-card__name"><?php the_title(); ?></span>
                        </a>
                    </li>
                <?php
                endwhile; ?>
            </ul>
		<?php endif;

		wp_reset_postdata();
		?>
		<?php
		$programEvents = new WP_Query([
			'posts_per_page' => 2,
			'order_by' => 'meta_value_num',
			'meta_key' => 'event_date',
			'order' => 'ASC',
			'post_type' => 'event',
			'meta_query' => [
				[
					'key' => 'event_date',
					'compare' => '>=',
					'value' => $today = date('Ymd'),
					'type' => 'NUMERIC'
				],
                [
                   'key' => 'related_programs',
                   'compare' => 'LIKE',
                   'value' => '"' . get_the_ID() . '"'
                ]
			]
		]);
        if ($programEvents->have_posts()) : ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">
                Related <?php echo get_the_title() ?> Events
            </h2>
            <?php
	        while ($programEvents->have_posts()):
		        $programEvents->the_post();
		        get_template_part('template-parts/content-event');
	        endwhile;
        endif;

		wp_reset_postdata();
        $relatedCampuses = get_field('related_campus');
        if ($relatedCampuses): ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">
                <?php the_title() ?>  is available in this Campus(es)
            </h2>
            <ul class="link-list min-list">
        <?php
            foreach ($relatedCampuses as $campus) :
            ?>
                <li><a href="<?php echo get_the_permalink($campus) ?>"><?php echo get_the_title($campus) ?></a></li>
        <?php
            endforeach;
            ?>
            </ul>
        <?php
        endif;
		?>
	</div>
<?php endwhile;
get_footer();
?>

