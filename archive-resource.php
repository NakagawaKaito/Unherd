<?php # Resource Media Archive Template
get_header();

# page header
$resource_page_id = get_field( 'resource_archive_page_id','option');
$post = get_post( $resource_page_id);
setup_postdata( $post);
$acf_fields = get_fields( $resource_page_id);
include( $include_path . 'global/page/page-hero.php'); 
wp_reset_postdata(); ?>

<div class="container">	

	<ul  class="resource-archive__filter">
		<li><a class="<?php if( !isset( $_GET['filter'])) echo 'active' ?>" href="<?php echo get_the_permalink( $resource_page_id) ?>">All Media</a></li>
		<li><a class="<?php if( isset( $_GET['filter']) && ( $_GET['filter'] == 'video')) echo 'active' ?>" href="<?php echo get_the_permalink( $resource_page_id) ?>?filter=video">Video</a></li>
		<li><a class="<?php if( isset( $_GET['filter']) && ( $_GET['filter'] == 'audio')) echo 'active' ?>" href="<?php echo get_the_permalink( $resource_page_id) ?>?filter=audio">Audio</a></li>
		<li><a class="<?php if( isset( $_GET['filter']) && ( $_GET['filter'] == 'quote')) echo 'active' ?>" href="<?php echo get_the_permalink( $resource_page_id) ?>?filter=quote">Quotes</a></li>
		<li><a class="<?php if( isset( $_GET['filter']) && ( $_GET['filter'] == 'statistic')) echo 'active' ?>" href="<?php echo get_the_permalink( $resource_page_id) ?>?filter=statistic">Infographics</a></li>
	</ul>

	<div class="resource-archive wiaw-ajax-append d-flex flex-wrap">	
	<?php # The loop
	while ( have_posts() ) : the_post();
		include( 'includes/snippets/resource-card.php');
	endwhile; ?>
	</div>

	<?php # Paging
	wiaw_archive_nav(); ?>

</div>
<?php get_footer();