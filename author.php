<?php get_header(); ?>

<?php # Get the Author
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); 
$author_acf = get_fields('user_' . $curauth->ID);
?>

<div class="author-hero">
    <div class="author-hero__content">
        <?php echo get_avatar( $curauth->ID, 200, '', '', array( 'class' => 'author-hero__image img-fluid rounded-circle') ); ?> 
        <h1 class="author-hero__title"><?php echo $curauth->display_name ?></h1>
        <?php echo wpautop( $curauth->description) ?>

        <?php if ( !empty( $author_acf['user_social'])): ?>
        <ul class="author-hero__social fa4">
            <?php foreach ($author_acf['user_social'] as $link): ?>
            <li><a href="<?php echo $link['url'] ?>" title="<?php echo $link['title'] ?>" target="_blank"><i class="fa fa-<?php echo $link['icon'] ?>"></i></a></li>
            <?php endforeach ?>
        </ul>
        <?php endif ?>
    </div>
</div>

<div class="container">
    <h2 class="section-title section-title--small"><?php _e('Articles', 'whoisandywhite') ?></h2>
</div>
<div class="single-author__articles wiaw-ajax-append pc-s4">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        include( $include_path . 'snippets/'.$post->post_type.'-card.php');
    endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>
    <?php endif; ?>
</div>  

<?php # Paging
wiaw_archive_nav(); ?>


<!-- <div class="container">
    <h1>The rest of the content on this page seems out of place. Can we discuss? AW</h1>
</div>
 -->

<?php get_footer(); ?>