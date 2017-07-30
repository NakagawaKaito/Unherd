<?php 
get_header();

$acf_fields = get_fields( get_field( 'event_archive_page_id','option'));
include( $include_path . 'global/page/page-hero.php'); ?>

<div class="container">

	<div class="events-archive wiaw-ajax-append d-flex flex-wrap">	
		<?php # The Loop!
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			include( $include_path . 'snippets/event-card.php');
		endwhile; endif; ?>
	</div>

	<?php # Paging
	wiaw_archive_nav(); ?>

</div>

<?php include( $include_path . 'modular-loop.php'); ?>

<?php get_footer();