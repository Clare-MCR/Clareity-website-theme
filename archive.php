<?php get_header(); ?>
<!-- Archive Template for Custom Taxonomy, Category, Tag, Author, and Date -->
<!-- Begin Main Body -->
<div id="container">

<div id="main-header" class="shadow">
    <h1>
    <?php if (is_category()) { ?>
              
       <?php if(get_option('wgcp_activate_translation') == 'enable_translation') { echo get_option('wgcp_archive_string'); } else { _e('Archive', 'webello'); } ?>: <?php single_cat_title(); ?>
       
    <?php } elseif (is_tag()) { ?>
              
       <?php if(get_option('wgcp_activate_translation') == 'enable_translation') { echo get_option('wgcp_archive_string'); } else { _e('Archive', 'webello'); } ?>: <?php single_tag_title(); ?>
                  
    <?php } elseif (is_day()) { ?>
       
       <?php if(get_option('wgcp_activate_translation') == 'enable_translation') { echo get_option('wgcp_archive_string'); } else { _e('Archive', 'webello'); } ?>: <?php the_time('F jS, Y'); ?> 
    
    <?php } elseif (is_month()) { ?>
           
       <?php if(get_option('wgcp_activate_translation') == 'enable_translation') { echo get_option('wgcp_archive_string'); } else { _e('Archive', 'webello'); } ?>: <?php the_time('F, Y'); ?>
    
    <?php } elseif (is_year()) { ?>
           
       <?php if(get_option('wgcp_activate_translation') == 'enable_translation') { echo get_option('wgcp_archive_string'); } else { _e('Archive', 'webello'); } ?>: <?php the_time('Y'); ?>
            
    <?php } else { ?>
    	<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
    	<?php bloginfo('name'); ?> <?php if(get_option('wgcp_activate_translation') == 'enable_translation') { echo get_option('wgcp_archive_string'); } else { _e('Archive', 'webello'); } ?>: <?php echo $term->name; ?>
    <?php } ?>
    
    </h1>
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

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- STANDARD POST -->
	<div class="blog-entry">
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2> 
        <?php if ( has_post_thumbnail() ) { ?>
         <a href="<?php the_permalink() ?>" class="post-thumb">
              <?php the_post_thumbnail( 'single-thumb' ); ?><span class="post-thumb-hover"></span>
         </a>
         <?php } ?>
         
         <?php if(get_option('wgcp_show_post_date') == 'show_post_date_yes' OR get_option('wgcp_show_post_author') == 'show_post_author_yes' OR get_option('wgcp_show_post_comments') == 'show_post_comments_yes') { ?>
         <div class="post-info">
         	<?php if(get_option('wgcp_show_post_author') == 'show_post_author_yes') { ?>
         		<span class="post-author"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></span>
         	<?php } ?>
         	
         	<?php if(get_option('wgcp_show_post_date') == 'show_post_date_yes') { ?>
            	<span class="post-date"><?php the_time('d F Y'); ?></span>
            <?php } ?>
            <?php if(get_option('wgcp_show_post_comments') == 'show_post_comments_yes') { ?>
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
         
         <?php the_content('Read more'); ?>
		
		
		 <?php if(get_option('wgcp_show_post_categories') == 'show_post_categories_yes' OR get_option('wgcp_show_post_tags') == 'show_post_tags_yes') { ?>
		     <div class="post-info bottom">
		     	<?php if(get_option('wgcp_show_post_categories') == 'show_post_categories_yes') { ?>
		     		<span class="post-categories"><?php the_category(', '); ?></span>
		     	<?php } ?>
		     	<?php if(get_option('wgcp_show_post_tags') == 'show_post_tags_yes') { ?>
		     		<span class="post-tags"><?php the_tags('',', ',''); ?></span>
		     	<?php } ?>
		     </div>
		 <?php } ?>
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