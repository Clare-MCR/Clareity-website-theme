<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Begin Main Body -->
<div id="container">
<div id="main-header">
    <h1>Clareity</h1>
    <h3><?php bloginfo('description'); ?></h3>
</div>

<!-- Begin Main Col -->
<div id="main-col" class="shadow">
    <h2><?php the_title(); ?></h2>

	     <?php if ( has_post_thumbnail() ) { ?>
	           <?php the_post_thumbnail( 'slideshow' ); ?>            
	      <?php } ?>
	      
     	
        <div class="page-content">    
    	<?php the_content('Read more'); ?>
    	</div>
        
</div>

<!-- End Main Col -->

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer('wide'); ?>