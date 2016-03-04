<?php get_header(); ?>
<section class="content">

<div id="archives"><div id="container">

<div id="main-header"><h1><?php bloginfo('name'); ?></h1></div>
<div id="arch-col">
<?php if( is_home() && get_option('page_for_posts') ): ?>
<h2><?php echo apply_filters('the_title',get_page( get_option('page_for_posts') )->post_title); ?></h2>
<?php elseif( is_singular() ) : ?>
<h1><?php the_title(); ?></h1>
<?php endif; ?>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'order'=> 'DESC', 'orderby' => 'meta_value', 'meta_key'=>'when', 'posts_per_page'=>10, 'paged'=>$paged);
$wp_query = new WP_Query( $args );
if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	<?php $categories = get_the_category(); ?>
	<?php $dtStr = date("c", get_post_meta( get_the_ID(), 'when', true )); ?>
	<?php $date = new DateTime($dtStr); ?>
	<div class="blog-entry">
	<div class="titlebox">
		<b><?php echo $categories[0]->name ?></b> - <?php echo $date->format('l jS F Y g:i a') ?>
		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	</div>
	<?php the_post_thumbnail('eventspic'); ?>
	<?php the_excerpt(); ?> 
     	</div>

<?php endwhile; else:
	echo "No Events Found";
endif;

wp_reset_postdata();
wp_reset_query();	 // Restore global post data stomped by the_post().

?>
    <div class="navigation-links">
    <?php wg_next_posts_link('Newer Posts', '<div class="newer-posts">', '</div>'); ?>
    <?php wg_previous_posts_link('Older Posts', '<div class="older-posts">', '</div>'); ?>
    </div>

</div>
</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>