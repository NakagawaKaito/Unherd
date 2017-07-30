<?php get_header();

$term_id = get_queried_object_id();

# Page Hero (set $acf_fields as term page ACF)
$acf_fields = get_fields( 'term_' . $term_id);
include( $include_path . 'global/page/page-hero.php'); ?>


<div class="container">
	<div class="theme__posts wiaw-ajax-append d-flex flex-wrap">
		<?php # The loop
		if (have_posts()): while ( have_posts() ) : the_post();
			include( $include_path . 'snippets/' . $post->post_type . '-card.php');
		endwhile; endif; ?>
		</div>
	</div>
	<?php # Paging
	wiaw_archive_nav(); ?>
</div>

<?php # Include the modular loop
$acf_fields = get_fields( 'term_' . $term_id);
include( $include_path . 'modular-loop.php'); ?>

<?php get_footer();