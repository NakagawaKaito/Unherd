<?php get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();

# Get the ACF Fields
$acf_fields = get_fields(); ?>
	<?php include( $include_path . 'global/post/article-hero.php'); ?>
	<div class="article-container">

		<?php # Ticket Options
		if ( !empty( $acf_fields['ticket_options']) || !empty( $acf_fields['ticket_text'])): ?>
			<h5 class="event-subtitle"><?php _e('Ticket Info', 'whoisandywhite') ?></h5>
			<?php # Ticket details exist
			if ( !empty( $acf_fields['ticket_options'])){
				echo '<ul class="event-ticket-details">';
				foreach ($acf_fields['ticket_options'] as $ticket) {
					echo '<li>&pound;' . $ticket['price'] . ' ' . $ticket['title'] . '</li>';
				}
				echo '</ul>';
			} else {
				echo wpautop( $acf_fields['ticket_text']);
			}  ?>
		<?php endif; ?>

		<?php # Event Description
		if ( !empty( $post->post_content)): ?>
			<h5 class="event-subtitle"><?php _e('Description', 'whoisandywhite') ?></h5>
			<?php the_content() ?>
		<?php endif; ?>


	</div>

<?php endwhile; endif;
get_footer() ?>