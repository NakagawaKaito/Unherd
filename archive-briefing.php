<?php 
get_header();

$acf_fields = get_fields( get_field( 'briefing_archive_page_id','option'));
include( $include_path . 'global/page/page-hero.php'); ?>



	<div class="the-briefings pc-s3 wiaw-ajax-append d-flex flex-wrap">
		<?php # The Loop!
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			include( $include_path . 'snippets/briefing-card.php');
		endwhile; endif; ?>
	</div>

	<?php # Paging
	wiaw_archive_nav(); ?>


<?php include( $include_path . 'modular-loop.php'); ?>

<?php get_footer();