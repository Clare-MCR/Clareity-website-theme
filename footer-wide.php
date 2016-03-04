</div>
<!-- End Main Body -->
<div id="blog-footer">
    <div id="footer-base">
        <span class="copyright">
        <?php if (get_option('wgcp_footer_text') != '') { echo stripslashes(get_option('wgcp_footer_text')); } else { $blog_name = get_bloginfo('name'); $blog_url = home_url(); ?>
        	<p>&copy; <?php _e('Copyright','webello'); ?> 2013 <a href="<?php echo $blog_url; ?>"><?php echo $blog_name; ?></a> - Clare College <?php _e('All rights reserved','webello'); ?>.</p>
        <?php } ?>
        </span>
        <?php if (get_option('wgcp_feedburner_url') != '') { ?>
        <span class="subscribe"><a href="<?php echo get_option('wgcp_feedburner_url'); ?>" class="rss"><?php if($translation == 'enable_translation') { echo get_option('wgcp_subs_string'); } else { _e('Subscribe', 'webello'); } ?></a></span><?php } ?>
    </div>
</div>
<!-- End Footer -->
</div>
<!-- End Site Wrapper -->

<?php wp_footer(); ?>
</body>
</html>