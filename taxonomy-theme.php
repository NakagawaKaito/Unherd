<?php get_header();

$term_id = get_queried_object_id();

# Page Hero (set $acf_fields as term page ACF)
$acf_fields = get_fields( 'term_' . $term_id);
include( $include_path . 'global/page/page-hero.php'); ?>

<?php # Get the first post (see theme.functions.php for pre_get_posts hook) 
$args = array(
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'theme',
			'field'    => 'term_id',
			'terms'    => $term_id,
		),
	),
);
$first_post = get_posts( $args);
# Do some faking with $section so we can include the /sections/single_post.php file
if ( !empty( $first_post)) {
	$section = array( 'post' => array_shift( $first_post));
	include( $include_path . 'sections/single_post.php');
} else {
	echo '<div class="alert alert-warning">No posts</div>';
} ?>




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