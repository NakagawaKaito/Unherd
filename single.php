<?php get_header();
	# The Loop
	if(have_posts()): while(have_posts()): the_post();
		include('includes/snippets/' . $post->post_type . '-card.php');
	endwhile; endif;
get_footer();

