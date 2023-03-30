<?php
get_header();
while (have_posts()) :
	the_post(); ?>
	<div class="page-banner">
        <?php $pageBannerImage = get_field('page_banner_image'); ?>
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $pageBannerImage['sizes']['pageBanner']; ?>)"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php the_title() ?></h1>
			<div class="page-banner__intro">
				<p><?php the_field('page_banner_subtitle_text'); ?></p>
			</div>
		</div>
	</div>
	<div class="container container--narrow page-section">
        <div class="generic-content">
            <div class="row">
                <div class="one-third">
                    <?php the_post_thumbnail('professorPortrait'); ?>
                </div>
                <div class="two-thirds">
	                <?php the_content() ?>
                </div>
            </div>
        </div>
		<?php
		$relatedPrograms = get_field('related_programs');
		if ($relatedPrograms) { ?>
			<hr class="section-break">
			<h2>Subject(s) Taught</h2>
			<ul class="link-list min-list">
				<?php
				foreach ($relatedPrograms as $program) { ?>
					<li>
						<a href="<?php echo get_the_permalink($program)?>">
							<?php echo get_the_title($program) ?>
						</a>
					</li>
				<?php  }
				?>
			</ul>
			<?php
		}
		?>
	</div>
<?php endwhile;
get_footer();
?>


