<?php 
/*
Template Name: Events
*/
get_header(); ?>

<div id="archives"><div id="container">
<div id="main-header"><h1><?php bloginfo('name'); ?></h1></div>
<div id="arch-col">
<h2><?php the_title(); ?></h2>
<?php
$args = array( 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'date' );
$postslist = get_posts( $args );
foreach ( $postslist as $post ) :
  setup_postdata( $post ); ?> 
	<div class="blog-entry">      
<div class="titlebox"><strong><?php $whats = get_post_meta($post->ID, 'What', false); ?><?php foreach($whats as $what) { echo $what;} ?></strong>
 - <?php $whens = get_post_meta($post->ID, 'When', false); ?><?php foreach($whens as $when) { echo $when;} ?>
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2></div>
<?php the_post_thumbnail(eventspic); ?>
<?php the_excerpt(); ?> 
     </div>

<?php
endforeach; 
wp_reset_postdata();
?>
    <div class="navigation-links">
    <?php wg_next_posts_link('Newer Posts', '<div class="newer-posts">', '</div>'); ?>
    <?php wg_previous_posts_link('Older Posts', '<div class="older-posts">', '</div>'); ?>
    </div>

</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>