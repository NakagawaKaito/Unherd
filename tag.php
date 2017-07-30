<?php
/**
 * Search Results Template
 *
 * @package WordPress
 * @subpackage whoisandywhite
 */
global $wp_query;
get_header(); ?>

<div class="page-hero" style="background-color: #2B2B2B;">	
	<div class="container">
		<span class="intro">Content related with:</span>
		<h1 class="page-title"><?php printf(__('“%s”', 'whoisandywhite'), '<span>' . single_tag_title('', false) . '</span>'); ?></h1>
	</div>
</div>


<div class="container">
	<?php if(have_posts()): ?>
		<div class="results">Showing <span class="number"><?= $wp_query->found_posts ?></span> results</div>

		<div class="theme__posts wiaw-ajax-append d-flex flex-wrap">
			<?php while(have_posts()): the_post(); ?>
				<?php include( $include_path . 'snippets/' . $post->post_type . '-card.php'); ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>
	<?php # Paging
	wiaw_archive_nav(); ?>

	<?php get_footer();

// EOF
