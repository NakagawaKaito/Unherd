<?php 
get_header();

$acf_fields = get_fields( get_field( 'unheard_archive_page_id','option'));
include( $include_path . 'global/page/page-hero.php'); ?>


<div class="unheard-archive wiaw-ajax-append">	
	<?php # The Loop!
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		include( $include_path . 'snippets/'.$post->post_type.'-card.php');
	endwhile; endif; ?>
	
</div>
<div class="container">
	<?php # Paging
	wiaw_archive_nav(); ?>
</div>

<?php include( $include_path . 'modular-loop.php'); ?>

<?php get_footer();