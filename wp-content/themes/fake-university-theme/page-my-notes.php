<?php
if (!is_user_logged_in()) {
	wp_redirect(esc_url(site_url('/')));
	exit();
}
get_header();
while (have_posts()) :
	the_post();
	pageBanner();
	?>
	<div class="container container--narrow page-section">
        <div class="create-note">
            <h2 class="headline headline--medium">Create Note</h2>
            <input type="text" class="new-note-title" placeholder="Enter Title">
            <textarea class="new-note-body" placeholder="Enter Description"></textarea>
            <span class="submit-note">Submit</span>
        </div>
		<?php
            $userNotes = new WP_Query([
                'post_type' => 'note',
                'posts_per_page' => -1,
                'author' => get_current_user_id()
            ]);
            if ($userNotes->have_posts()) : ?>
                <ul class="min-list">
	                <?php
	                while ($userNotes->have_posts()) :
	                $userNotes->the_post();
	                ?>
                    <li data-id="<?php the_ID(); ?>">
                        <input type="text" readonly class="note-title-field" value="<?php echo esc_attr(get_the_title()) ?>">
                        <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</span>
                        <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</span>
                        <textarea readonly class="note-body-field"><?php echo esc_attr(wp_strip_all_tags(get_the_content())) ?></textarea>
                        <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right" aria-hidden="true"></i>Edit</span>
                    </li>
                    <?php endwhile; ?>
                </ul>
            <?php
            endif;
            wp_reset_query();
        ?>
    </div>
<?php endwhile;
get_footer();