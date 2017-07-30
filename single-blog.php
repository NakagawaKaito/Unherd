<?php # Blog Post Archive (The Feed)
get_header(); ?>

<div class="hero hero--bg-orange">
	<div class="container">
		<h1 class="hero__title"><?php echo get_the_title( get_field('blog_archive_page_id','option')) ?></h1>
	</div>
</div>

<?php # The loop
while ( have_posts() ) : the_post(); ?>
<div id="blog-post-container">
	<article>
		<?php include( $include_path . 'global/post/article-hero.php'); ?>

		<?php include( $include_path . 'global/post/article-ingredients.php'); ?>
		<div class="article-container">
			<?php include( $include_path . 'global/post/article-meta.php') ?>
			<?php # Time for the Modular Loop!
			include( $include_path . 'modular-loop.php');?>
		</div>
	</article>

	<?php /*
	[bg_colour] => #FF6A53
    [image_desktop] => 
    [image_mobile] => 
    [desktop_image_position] => cover
    [mobile_image_position] => cover
    [content_repeater]
    */

    # If there's anything in the blog post's CTA
    if ( !empty( $acf_fields['content_repeater'])) {
		# Fake these fields to $section so we can include call_to_action.php 
		$section['bg_colour'] 				= $acf_fields['bg_colour'];
		$section['image_desktop'] 			= $acf_fields['image_desktop'];
		$section['image_mobile'] 			= $acf_fields['image_mobile'];
		$section['desktop_image_position'] 	= $acf_fields['desktop_image_position'];
		$section['mobile_image_position'] 	= $acf_fields['mobile_image_position'];
		$section['content_repeater'] 		= $acf_fields['content_repeater'];
		include( $include_path . 'sections/call_to_action.php');
    } ?>
</div>
<div class="next-blog-post">
	<?php echo get_next_posts_link( 'Next Post' ); ?> 
</div>
<?php endwhile; ?>


<?php get_footer();