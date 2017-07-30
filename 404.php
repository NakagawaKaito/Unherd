<?php get_header(); ?>
<div class="container">

	<h1 class="page-title"><?php _e('This is Embarrassing', 'whoisandywhite'); ?></h1>

	<p class="lead"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'whoisandywhite' ); ?></p>

    <div class="well">
		<?php get_search_form(); ?>
	</div>

</div><!-- /.container -->

<?php get_footer();