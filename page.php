<?php get_header(); ?>

	<?php # The Loop
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php # Get ACF Fields
		$acf_fields = get_fields(); ?>

		<?php # Page Hero
		if ( !is_front_page()) {
			include( $include_path . 'global/page/page-hero.php');
		} ?>


		<?php include( $include_path . 'modular-loop.php') ?>

	<?php endwhile; endif; ?>
	
<?php get_footer();

