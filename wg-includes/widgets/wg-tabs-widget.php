<?php 
/*
/* Tabbed widget */
/*
 * 
 */
class TabbedWidget extends WP_Widget
{
    function TabbedWidget(){
    $widget_ops = array('description' => 'Displays Recent-Popular-Random widget');
    parent::WP_Widget(false,$name='WG - Tabs',$widget_ops,$control_ops);
  }

    function widget($args, $instance){
    extract($args);
    $post_number_recent = empty($instance['recentPostsNumber']) ? '' : $instance['recentPostsNumber'];
    $post_number_popular = empty($instance['popularPostsNumber']) ? '' : $instance['popularPostsNumber'];
    $post_number_random = empty($instance['randomNumber']) ? '' : $instance['randomNumber'];
    
?>

<?php 
 $width = 50;
 $height = 50;
 $classtext = '';
?>
<?php echo $before_widget; ?>  
<!-- the tabs -->
<div class="tab_wrapper">
<ul class="tabs">
  <li><a href="#first"><?php _e('Latest', 'magazine'); ?></a></li>
  <li><a href="#second"><?php _e('Popular', 'magazine'); ?></a></li>
  <li><a href="#third"><?php _e('Random', 'magazine'); ?></a></li>
</ul>

<!-- tab "panes" -->
<div class="panes">
  <div><ul>
        <?php query_posts("showposts=$post_number_recent");
        if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php 
          		$titletext = get_the_title(); 
                $thumb_arr = wegraphics_create_thumbnail($width,$height,$classtext,$titletext,$titletext,$custom_field='',$return_array=true); ?>
<li>
  <a href="<?php the_permalink();?>"><?php if($thumb_arr['have_thumb']) { echo wegraphics_create_thumbnail($width,$height,$classtext,$titletext,$titletext); } else { echo '<img src="'.get_bloginfo('template_directory').'/images/default_thumb_tabs.jpg" alt="default image" />'; } ?></a><div class="tab_tit_mar"><p><a href="<?php the_permalink();?>"><?php the_title();?></a></p></div>
</li>


        <?php endwhile; endif; wp_reset_query(); ?>
      </ul> </div>
      
  <div> <ul>
        <?php global $wpdb;
          $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , $post_number_popular");
          foreach ($result as $post) {
            //setup_postdata($post);
            $postid = $post->ID;
            //$title = $post->post_title;
            $commentcount = $post->comment_count;
            if ($commentcount != 0) {
            	$query_id [] =  $postid;
            	 };
          	}; ?>
              <?php query_posts(array( 'post__in' => $query_id )); ?>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php 
                $titletext = get_the_title(); 
                $thumb_arr = wegraphics_create_thumbnail($width,$height,$classtext,$titletext,$titletext,$custom_field='',$return_array=true); 
                ?>
<li>
  <a href="<?php the_permalink();?>"><?php if($thumb_arr['have_thumb']) { echo wegraphics_create_thumbnail($width,$height,$classtext,$titletext,$titletext); } else { echo '<img src="'.get_bloginfo('template_directory').'/images/default_thumb_tabs.jpg" alt="default image" />'; } ?></a><div class="tab_tit_mar"><p><a href="<?php the_permalink();?>"><?php the_title();?></a></p></div>
</li>
              <?php endwhile; endif; wp_reset_query(); ?>
            
      </ul></div>
      
      
  <div><ul>
        <?php query_posts("showposts=$post_number_random&caller_get_posts=1&orderby=rand");
          if (have_posts()) : while (have_posts()) : the_post(); ?>
           <?php 
                $titletext = get_the_title(); 
                $thumb_arr = wegraphics_create_thumbnail($width,$height,$classtext,$titletext,$titletext,$custom_field='',$return_array=true); 
            ?>
 <li>
  <a href="<?php the_permalink();?>"><?php if($thumb_arr['have_thumb']) { echo wegraphics_create_thumbnail($width,$height,$classtext,$titletext,$titletext); } else { echo '<img src="'.get_bloginfo('template_directory').'/images/default_thumb_tabs.jpg" alt="default image" />'; } ?></a><div class="tab_tit_mar"><p><a href="<?php the_permalink();?>"><?php the_title();?></a></p></div>
</li>
          <?php endwhile; endif; wp_reset_query(); ?>
      </ul></div>
</div>
</div>
<?php echo $after_widget; ?>  
<?php
  }

  /*Saves the settings. */
    function update($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['recentPostsNumber'] = stripslashes($new_instance['recentPostsNumber']);
    $instance['popularPostsNumber'] = stripslashes($new_instance['popularPostsNumber']);
    $instance['randomNumber'] = stripslashes($new_instance['randomNumber']);

    return $instance;
  }

  /*Creates the form for the widget in the back-end. */
    function form($instance){
    //Defaults
    $instance = wp_parse_args( (array) $instance, array('recentPostsNumber'=>'3', 'popularPostsNumber'=>'3', 'randomNumber'=>'3') );

    $post_number_recent = htmlspecialchars($instance['recentPostsNumber']);
    $post_number_popular = htmlspecialchars($instance['popularPostsNumber']);
    $post_number_random = htmlspecialchars($instance['randomNumber']);
    
    # Number of Recent Posts
    echo '<p><label for="' . $this->get_field_id('recentPostsNumber') . '">' . 'Number of Recent Posts:' . '</label><input class="widefat" id="' . $this->get_field_id('recentPostsNumber') . '" name="' . $this->get_field_name('recentPostsNumber') . '" type="text" value="' . $post_number_recent . '" /></p>';
    
    # Number of Popular Posts
    echo '<p><label for="' . $this->get_field_id('popularPostsNumber') . '">' . 'Number of Popular Posts:' . '</label><input class="widefat" id="' . $this->get_field_id('popularPostsNumber') . '" name="' . $this->get_field_name('popularPostsNumber') . '" type="text" value="' . $post_number_popular . '" /></p>';
    
    # Number of Comments
    echo '<p><label for="' . $this->get_field_id('randomNumber') . '">' . 'Number of Random Posts:' . '</label><input class="widefat" id="' . $this->get_field_id('randomNumber') . '" name="' . $this->get_field_name('randomNumber') . '" type="text" value="' . $post_number_random . '" /></p>'; 
    
  }

}// end TabbedWidget class

function TabbedWidgetInit() {
  register_widget('TabbedWidget');
}

add_action('widgets_init', 'TabbedWidgetInit');

?>
