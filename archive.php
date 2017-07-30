<?php get_header();

if (have_posts()) :
	# Queue the first post.
	the_post(); ?>

	<div class="container">

		<h1 class="page-title"><?php

			# Show the correct archive title
			if (is_day()) {
				printf(__('Daily Archives: %s', 'whoisandywhite'), 
					'<span>' . get_the_date() . '</span>');
			} elseif (is_month()) {
				printf(
					__('Monthly Archives: %s', 'whoisandywhite'),
					'<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'whoisandywhite')) . '</span>'
			);
			} elseif (is_year()) {
				printf(
					__('Yearly Archives: %s', 'whoisandywhite'),
					'<span>' . get_the_date(_x('Y', 'yearly archives date format', 'whoisandywhite')) . '</span>'
			);
			} elseif (is_tag()) {
				printf(__('Tag Archives: %s', 'whoisandywhite'), '<span>' . single_tag_title('', false) . '</span>');
				// Show an optional tag description
				$tag_description = tag_description();
				if ($tag_description) {
					echo apply_filters(
						'tag_archive_meta',
						'<div class="tag-archive-meta">' . $tag_description . '</div>'
					);
				}
			} elseif (is_category()) {
				printf(
					__('Category Archives: %s', 'whoisandywhite'),
					'<span>' . single_cat_title('', false) . '</span>'
				);
				// Show an optional category description
				$category_description = category_description();
				if ($category_description) {
					echo apply_filters(
						'category_archive_meta',
						'<div class="category-archive-meta">' . $category_description . '</div>'
					);
				}
			} else {
				_e('Blog Archives', 'whoisandywhite');
			}
		?></h1>


		<?php # Rewind the loop back
		rewind_posts();  ?>



		<?php # The loop
		while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>

				<h3 class="article-title"><a title="<?php the_title_attribute() ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>     

				<?php the_excerpt(); ?>

			</article>

		<?php endwhile; ?>

		<?php # Paging
		wiaw_archive_nav(); ?>

		<?php // get_sidebar( 'blog' ); ?>

	</div>

<?php
endif; ?>

<?php get_footer();


// EOF