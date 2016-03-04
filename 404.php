<?php get_header(); ?>

<!-- Begin Main Body -->
<div id="container">

<div id="main-header" class="shadow">
    <h1><?php bloginfo('name'); ?></h1>
    <ul class="social-media">
    	<?php if (get_option('wgcp_facebook_username') !== '' OR get_option('wgcp_twitter_username') !== '' OR get_option('wgcp_flickr_username') !== '' OR get_option('wgcp_linkedin_username') !== '') { ?><li><?php if($translation == 'enable_translation') { echo get_option('wgcp_follow_us_string'); } else { _e('Follow Us', 'webello'); } ?> <span class="arrow">&raquo;</span> </li><?php } ?>
    	
        <?php if (get_option('wgcp_facebook_username') !== '') { ?><li><a href="http://www.facebook.com/<?php echo get_option('wgcp_facebook_username'); ?>" class="round-icon sm-facebook">Facebook</a></li><?php } ?>
        <?php if (get_option('wgcp_twitter_username') !== '') { ?><li><a href="http://twitter.com/<?php echo get_option('wgcp_twitter_username'); ?>" class="round-icon sm-twitter">Twitter</a></li><?php } ?>
        <?php if (get_option('wgcp_flickr_username') !== '') { ?><li><a href="http://www.flickr.com/<?php echo get_option('wgcp_flickr_username'); ?>" class="round-icon sm-flickr">Flickr</a></li><?php } ?>
        <?php if (get_option('wgcp_linkedin_username') !== '') { ?><li><a href="http://www.linkedin.com/in/<?php echo get_option('wgcp_linkedin_username'); ?>" class="round-icon sm-linkedin">LinkedIn</a></li><?php } ?>
    </ul>
</div>


<!-- Begin Left Col -->
<div id="left-col" class="shadow">


	<div class="blog-entry" style="min-height:400px;">
        <h3 class="no_posts"><em>404 |</em> <?php if(get_option('wgcp_activate_translation')) { echo get_option('wgcp_notfound_string'); } else { _e('Page Not Found!', 'webello'); } ?></h3>
        
        <p class="no_posts"><?php if(get_option('wgcp_activate_translation')) { echo get_option('wgcp_notfoundmessage_string'); } else { _e('Sorry, but the page you were looking for is not here.', 'webello'); } ?></p>
    </div>
    

    
</div>
<!-- End Left Col -->

<?php get_sidebar(); ?>


<?php get_footer(); ?>