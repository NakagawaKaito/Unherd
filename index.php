<?php get_header(); ?>

<div class="container">

	<?php # The Loop
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article <?php post_class(); ?>>

			<h3 class="article-title"><a title="<?php the_title_attribute() ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>     

			<?php the_excerpt(); ?>

		</article>

	<?php endwhile; endif; ?>

	<?php # Paging
	wiaw_archive_nav(); ?>


	<?php // get_sidebar(); ?>

</div>

<?php get_footer(); 
