<?php get_header();
	# The Loop
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 

		$acf_fields = get_fields();

		# What's the background?
		switch ( $acf_fields['resource_type']) {
			# Stat
		 	case 'statistic': ?>
		 		<?php if ( !empty( $post_acf['statistic'])): ?>
	 				<div class="single-resource__statistic">
			 			<?php echo do_shortcode( $post_acf['statistic']) ?>
			 		</div>
		 		<?php else: 
			 		# Is there a featured image?
					if ( has_post_thumbnail()) {
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'theme-hero', true);
						$bg_image = $thumb_url_array[0];
					# No? Fallback is a block colour
					} else {
						$bg_image = '';
					} ?>
			 		<div class="resource-card__bg resource-card__bg--image" style="background-image: url(<?php echo $bg_image ?>)"></div>
	 			<?php endif ?>
		 		<?php break;

		 	# Quote
		 	case 'quote': ?>
		 		<div class="resource-card__bg resource-card__bg--quote">
		 			<p class="resource-card__quote-text"><?php echo $acf_fields['quote'] ?></p>
		 		</div>
		 		<?php break;

		 	# Everything else
		 	default: 
				# Is there a featured image?
				if ( has_post_thumbnail()) {
					$thumb_id = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'theme-hero', true);
					$bg_image = $thumb_url_array[0];
				# No? Fallback is a block colour
				} else {
					$bg_image = '';
				} ?>
		 		<div class="resource-card__bg resource-card__bg--image" style="background-image: url(<?php echo $bg_image ?>)"></div>
		 	<?php break;

		 } // end switch ?>


		<?php //include( $include_path . 'global/post/article-ingredients.php'); ?>

		<div class="article-container pull-up">
			<?php include( $include_path . 'global/post/track-buttons.php'); ?>
			<h1 class="single-resource__title"><?php the_title() ?></h1>

			<div class="single-resource__share  d-sm-flex justify-content-start align-items-center">
				<ul class="single-resource__share-links fa4">
					<li class="list-inline-item">
						<a href="#">
							<i class="fal fa-facebook"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
							<i class="fal fa-twitter"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
							<i class="fal fa-print"></i>
						</a>
					</li>
				</ul>

				<?php if ( !empty( $acf_fields['download_data_file'])): ?>
					<p class="mb-0 ml-auto"><a  class="single-resource__data-btn" href="<?php echo $acf_fields['download_data_file'] ?>"><?php _e('Download Data', 'whoisandywhite') ?></a></p>
				<?php endif ?>
			</div>

			<?php # Set $post as $section['select_resource']
			$section['select_resource'] = $post;
			include( $include_path . 'sections/resource.php'); ?>

			<?php the_content() ?>
		</div>


		<?php if ( !empty( $acf_fields['related_media'])): ?>
		<div class="related-media">
			<div class="container">
				<h4 class="section-title section-title--small"><?php _e('Related Media','whoisandywhite') ?></h4>
			
				<div class="the-resources d-sm-flex">
				<?php # Loop through the media as posts
				foreach ($acf_fields['related_media'] as $post){
					setup_postdata( $post);
					include( $include_path . 'snippets/resource-card.php');
				} 
				wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<?php endif ?>

	<?php endwhile; endif;
get_footer();



/*
This code gets the posts that this resource has been attached to.
It's not in the latest invision, so I'm not using it for now.

wiaw_get_posts_for_resource( $post->ID))

# Returns array of post_id's
*/ 