<?php get_header();
# The Loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
# ACF Fields
$acf_fields = get_fields(); ?>
<article>
	
	<?php include( $include_path . 'global/post/article-summary.php'); ?>

	<?php include( $include_path . 'global/post/article-hero.php'); ?>

	<?php include( $include_path . 'global/post/article-ingredients.php'); ?>
	<div class="article-container">
		<?php include( $include_path . 'global/post/article-meta.php') ?>

		<?php if(AccessControl::check()): ?>
			<?php include($include_path . 'modular-loop.php'); ?>
		<?php else: ?>
			
			<div class="accesscontrol-hidden">
				<?php include($include_path . 'modular-loop.php'); ?>
			</div>
			<?php include($include_path . 'signupform.php'); ?>
		<?php endif; ?>
		
	</div>
</article>

<?php include( $include_path . 'global/post/related-articles.php'); ?>

<?php endwhile; endif;

get_footer();