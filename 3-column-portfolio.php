<?php
/*
Template Name: 3 Column Portfolio
*/
?>

<?php get_header(); ?>


<!-- Begin Main Body -->
<div id="container">
<div id="main-header" class="shadow">
    <h1><?php the_title(); ?></h1>
    <ul class="social-media">
    	<?php if (get_option('wgcp_facebook_username') !== '' OR get_option('wgcp_twitter_username') !== '' OR get_option('wgcp_flickr_username') !== '' OR get_option('wgcp_linkedin_username') !== '') { ?><li><?php if($translation == 'enable_translation') { echo get_option('wgcp_follow_us_string'); } else { _e('Follow Us', 'webello'); } ?> <span class="arrow">&raquo;</span> </li><?php } ?>
    	
        <?php if (get_option('wgcp_facebook_username') !== '') { ?><li><a href="http://www.facebook.com/<?php echo get_option('wgcp_facebook_username'); ?>" class="round-icon sm-facebook">Facebook</a></li><?php } ?>
        <?php if (get_option('wgcp_twitter_username') !== '') { ?><li><a href="http://twitter.com/<?php echo get_option('wgcp_twitter_username'); ?>" class="round-icon sm-twitter">Twitter</a></li><?php } ?>
        <?php if (get_option('wgcp_flickr_username') !== '') { ?><li><a href="http://www.flickr.com/<?php echo get_option('wgcp_flickr_username'); ?>" class="round-icon sm-flickr">Flickr</a></li><?php } ?>
        <?php if (get_option('wgcp_linkedin_username') !== '') { ?><li><a href="http://www.linkedin.com/in/<?php echo get_option('wgcp_linkedin_username'); ?>" class="round-icon sm-linkedin">LinkedIn</a></li><?php } ?>
    </ul>
</div>

<!-- Begin Main Col -->
<div id="main-col" class="shadow">
	<div class="gallery gallery-container-3col">
  
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if ($post->post_content != '') { echo '<div class="page-content">'; the_content(); echo '</div>'; } ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

    <?php 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 12, 'paged' => $paged);
    $wp_query = new WP_Query( $args );
    
    if ($wp_query->have_posts()) :
    while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
    	
    	<?php $image_thumb =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '3-column' ); $image_thumb_src = $image_thumb[0];
    	$image =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full'); $image_src = $image[0];
    	$custom = get_post_custom($post->ID); 
    	?>
    	
    	<a href="<?php echo $image_src; ?>" rel="prettyPhoto[1]" title="<a href='<?php the_permalink(); ?>'><?php the_title(); ?></a> <?php echo $custom["caption"][0]; ?>"><img src="<?php echo $image_thumb_src; ?>" width="220" height="146" alt="<?php the_title(); ?>" /></a>
    	
    	
    <?php endwhile; ?>
    
    <div class="navigation-links">
    <?php wg_next_posts_link('Newer Posts', '<div class="newer-posts">', '</div>'); ?>
    <?php wg_previous_posts_link('Older Posts', '<div class="older-posts">', '</div>'); ?>
    </div>
    	
    <?php endif; ?>   
       
    <?php wp_reset_postdata(); ?>   	        
       
    </div>
</div>
<!-- End Main Col -->

<?php get_footer('wide'); ?>