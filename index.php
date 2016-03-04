<?php get_header(); ?>

<!-- Begin Main Body -->
<div id="container">

<div id="main-header" class="shadow">
    <h1><?php bloginfo('name'); ?></h1>
    <h3><?php bloginfo('description'); ?></h3>
</div>

<!-- Begin Left Col -->
<div id="left-col" class="shadow">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- STANDARD POST -->
	<div class="blog-entry">
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>  
         <?php if(get_option('wgcp_show_post_date') == 'show_post_date_yes' OR get_option('wgcp_show_post_author') == 'show_post_author_yes' OR get_option('wgcp_show_post_comments') == 'show_post_comments_yes') { ?>
         <div class="post-info">
            <span class="post-categories"><strong>What: </strong><?php $whats = get_post_meta($post->ID, 'What', false); ?><?php foreach($whats as $what) { echo $what;} ?></span>
            <span class="post-date"><strong>When: </strong><?php $whens = get_post_meta($post->ID, 'When', false); ?><?php foreach($whens as $when) { echo $when;} ?></span>
            <span class="post-tags"><strong>Where: </strong><?php $wheres = get_post_meta($post->ID, 'Where', false); ?><?php foreach($wheres as $where) { echo $where;} ?></span>
         </div>
         <?php } ?>
         
         <?php the_content('Read more'); ?>
         
    </div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

        
    
    <div class="navigation-links">
    <?php wg_next_posts_link('Newer Posts', '<div class="newer-posts">', '</div>'); ?>
    <?php wg_previous_posts_link('Older Posts', '<div class="older-posts">', '</div>'); ?>
    </div>

</div>
<!-- End Left Col -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>