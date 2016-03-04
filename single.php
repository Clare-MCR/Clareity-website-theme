<?php get_header(); ?>

<!-- Begin Main Body -->
<div id="container">
<div id="main-header">
    <h1>Clareity</h1>
    <h3><?php bloginfo('description'); ?></h3>
</div>

<!-- Begin Left Col -->
<div id="left-col">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- STANDARD POST -->
	<div class="blog-entry">
	<?php $categories = get_the_category(); ?>
	<?php $dtStr = date("c", get_post_meta( get_the_ID(), 'when', true )); ?>
	<?php $date = new DateTime($dtStr); ?>
	
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2> 
         <div class="post-info">
            <span class="post-categories"><strong>What: </strong><?php echo $categories[0]->name; ?></span>
            <span class="post-date"><strong>When: </strong><?php echo $date->format('l jS F Y g:i a') ?></span>
            <span class="post-tags"><strong>Where: </strong><?php echo get_post_meta($post->ID, 'where', true); ?></span>
         </div>
         <?php the_content(); ?>
         <br/><br/><span style="font-size: 1.5em;">For your diaries!</span>
		<div class="whatwhenwhere">
           		<strong>What: </strong><?php echo $categories[0]->name; ?><br/>
           		<strong>When: </strong><?php echo $date->format('l jS F Y ga') ?><br/>
           		<strong>Where: </strong><?php echo get_post_meta($post->ID, 'where', true); ?><br/>
			<strong>Who:</strong> For everyone that is interested!</br>
		</div> 
    </div>
    
<?php endwhile; else: ?>
<?php endif; ?>
    
</div>
<!-- End Left Col -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>