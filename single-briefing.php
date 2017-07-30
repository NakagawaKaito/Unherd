<?php get_header();
# The Loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article>
	<?php include( $include_path . 'global/post/article-hero.php'); ?>

	<div class="article-container">
		<div class="article-meta article-meta--author d-flex flex-row align-items-center justify-content-start">
			<?php echo get_avatar( get_the_author_id(), 77, '', '', array( 'class' => 'article-meta__author-image img-fluid rounded-circle') ); ?> 
			<div>
				<p class="article-meta__author-name"><?php the_author_posts_link() ?></p>
				<p class="article-meta__post-date"><?php the_date('d F Y') ?></p>
			</div>
		</div>
	</div>

	<div class="briefing-container">		
		<?php $acf_fields = get_fields(); ?>
		<?php if ( !empty( $acf_fields['points'])): ?>
		<div class="briefing-pages"></div>
		<div class="briefing-points">
			<?php $i=0;
			foreach ($acf_fields['points'] as $point): ?>
				<div class="briefing-point">
					<div class="briefing-point__content">					
						<h4 class="briefing-point__title"><?php echo $point['title'] ?></h4>

						<?php # Include a resource?
						if ( !empty( $point['resource'])) {
							$rid = array_shift( $point['resource']);
							include( $include_path . 'sections/resource.php');
						} ?>

						<?php # The Content
						echo wiaw_add_footnote_ref( $point['content']);
						# Footnotes
						wiaw_footnote_output(); ?>
					</div>

					<div class="briefing-point__footer">
						<h5 class="briefing-point__next-title"><?php 
							if ($i+1 < count( $acf_fields['points'])) {
								echo 'Next - ' . $acf_fields['points'][$i+1]['title'];
							} else {
								echo '&nbsp;';
							} ?></h5>
					</div>
				</div>
			<?php $i++; endforeach ?>
		</div>
		<?php endif ?>
	</div>
</article>
<?php endwhile; endif;

get_footer();