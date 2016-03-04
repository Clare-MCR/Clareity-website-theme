<?php
// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'webello'); ?></p>
  <?php
    return;
  }
?>

<?php 
 if(get_option('wgcp_activate_translation') == 'enable_translation') {
    $no_comment = get_option('wgcp_nocomment_string'); 
    $one_comment = get_option('wgcp_onecomment_string'); 
    $n_comment = get_option('wgcp_ncomments_string'); 
    $leave_reply = get_option('wgcp_leavereply_string');
    $cancel_reply = get_option('wgcp_cancelreply_string');
    $topost = get_option('wgcp_topost_string');
    $name_res = get_option('wgcp_nameres_string');
    $submit = get_option('wgcp_submit_string');
    $your_message = get_option('wgcp_yourmessage_string');
 } else {
    $no_comment = 'No comment';
    $one_comment = 'One comment';
    $n_comment = '% comments';
    $leave_reply = 'Leave reply';
    $cancel_reply = 'Cancel reply';
    $topost = 'to post a comment';
    $name_res = 'Name';
    $submit = 'Submit comment';
    $your_message = 'Your message';
 } 
 ?>

<!-- BEGIN COMMENTS -->
    <div id="comments">
    
    <?php if ( have_comments() ) : ?>
    
    <h3><?php comments_number(__($no_comment,'webello'), __($one_comment,'webello'), __($n_comment,'webello') );?></h3>


	<ol class="commentlist">
    	  <?php wp_list_comments('callback=wegraphics_comment'); ?>
	</ol>
	
	<?php else : // this is displayed if there are no comments so far ?>
	
	  <?php if ( comments_open() ) : // if comment is open, but no comments yet ?>
	
	   <?php else : // comments are closed ?>
	
	  <?php endif; ?>
	<?php endif; ?>
	
    
<?php if ( comments_open() ) : ?>
    
<div id="comment-form">

	<h3><?php comment_form_title( __($leave_reply,'webello'), __($leave_reply,'webello') ); ?></h3>

	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(__($cancel_reply,'webello')); ?></small>
	</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('Login','webello'); ?></a> <?php _e($topost,'webello'); ?>.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> <?php _e('[Logged]','webello'); ?>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out','webello'); ?>"><?php _e('Log out','webello'); ?> &raquo;</a></p>

<?php else : ?>

	
		<label for="author"><?php _e($name_res,'webello');?> <small><?php if ($req) _e('*','webello'); ?></small></label> 
		<input type="text" name="author" id="author" value="" size="22" tabindex="1" />
	
		<label for="email"><?php _e('Email','webello'); ?><small><?php if ($req) _e('*','webello'); ?></small></label>
		<input type="text" name="email" id="email" value="" size="22" tabindex="2" />
	
		<label for="url"><?php _e('Website','webello'); ?></label>
		<input type="text" name="url" id="url" value="" size="22" tabindex="3" />
		
<?php endif; ?>
	
		<label for="comment"><?php _e($your_message,'webello');?></label>
		<textarea name="comment" id="comment" tabindex="4"></textarea>
	
	<div class="submit"><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e($submit,'webello'); ?>" /></div>
	
	<?php comment_id_fields(); ?>
	<?php do_action('comment_form', $post->ID); ?>
	
	</form>

</div>

<?php endif; // If registration required and not logged in ?>


<?php endif; ?>

    </div>
    <!-- END COMMENTS -->
