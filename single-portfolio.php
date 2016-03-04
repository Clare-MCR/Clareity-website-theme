<?php get_header(); ?>
<?php $translation = get_option('wgcp_activate_translation'); ?>

<!-- Begin Main Body -->
<div id="container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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


<!-- Begin Left Col -->
<div id="main-col" class="shadow">
<?php if ( has_post_thumbnail() ) { ?>
      <?php the_post_thumbnail('full-width'); ?>
 <?php } ?>
         
     <?php if(get_option('wgcp_show_portfolio_post_date') == 'show_portfolio_post_date_yes' OR get_option('wgcp_show_portfolio_post_author') == 'show_portfolio_post_author_yes' OR get_option('wgcp_show_portfolio_post_comments') == 'show_portfolio_post_comments_yes') { ?>
     <div class="post-info">
     	<?php if(get_option('wgcp_show_portfolio_post_author') == 'show_portfolio_post_author_yes') { ?>
     		<span class="post-author"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></span>
     	<?php } ?>
     	
     	<?php if(get_option('wgcp_show_portfolio_post_date') == 'show_portfolio_post_date_yes') { ?>
        	<span class="post-date"><?php the_time('d F Y'); ?></span>
        <?php } ?>
        <?php if(get_option('wgcp_show_portfolio_post_comments') == 'show_portfolio_post_comments_yes') { ?>
            <?php 
            if(get_option('wgcp_activate_translation') == 'enable_translation') {
               $no_comment = get_option('wgcp_nocomment_string'); 
               $one_comment = get_option('wgcp_onecomment_string'); 
               $n_comment = get_option('wgcp_ncomments_string'); 
               $comment_off = get_option('wgcp_commentoff_string'); 
            } else {
               $no_comment = 'No comments';
               $one_comment = 'One comment';
               $n_comment = '% comments';
               $comment_off = 'Comments off';
            } 
            ?>
            <span class="post-comments"><?php comments_popup_link(__($no_comment, 'webello'), __($one_comment, 'webello'), __($n_comment, 'webello'), '', __($comment_off, 'webello')); ?></span>
        <?php } ?>
     </div>
     <?php } ?>
     
     <div class="page-content">
     	<?php the_content(); ?>
     	
     	
     	<?php if(get_option('wgcp_show_portfolio_post_categories') == 'show_portfolio_post_categories_yes' OR get_option('wgcp_show_portfolio_post_tags') == 'show_portfolio_post_tags_yes') { ?>
     	    <div class="post-info bottom">
     	    	<?php if(get_option('wgcp_show_portfolio_post_categories') == 'show_portfolio_post_categories_yes') { ?>
     	    		<span class="post-categories"><?php echo get_the_term_list( $post->ID, 'portfolio_categories', '', ', ', '' ); ?></span>
     	    	<?php } ?>
     	    	<?php if(get_option('wgcp_show_portfolio_post_tags') == 'show_portfolio_post_tags_yes') { ?>
     	    		<span class="post-tags"><?php echo get_the_term_list( $post->ID, 'portfolio_tags', '', ', ', '' ); ?></span>
     	    	<?php } ?>
     	    </div>
     	<?php } ?>
     	
     	
     	<a href="<?php if (get_option('wgcp_portfolio_url') != '') { echo get_option('wgcp_portfolio_url'); } else { echo get_post_type_archive_link('portfolio'); } ?>" class="port-back-link">
     	<?php if($translation == 'enable_translation') { echo get_option('wgcp_back_to_portfolio_string'); } else { _e('Back to Portfolio', 'webello'); } ?> &raquo;
     	</a>
     	
     </div>
    
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
    
    <?php comments_template(); ?>
    
</div>
<!-- End Left Col -->


<?php get_footer('wide'); ?>