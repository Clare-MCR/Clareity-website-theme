<?php
/*
/* Portfolio widget */
/*
 * 
 */
class wegraphics_portfolio extends WP_Widget {

   function wegraphics_portfolio() {
     $widget_ops = array('description' => 'Add a widget that contains the most recent portfolio pieces. Use it only in the general sidebar.' );
       parent::WP_Widget(false, __('WG - Portfolio', 'webello'),$widget_ops,$control_ops);      
   }
   
   function widget($args, $instance) {  
    extract( $args );
    $title = $instance['title'];
    $unique_id = $args['widget_id'];
    $portfolio_number = empty($instance['portfolio_number']) ? '' : $instance['portfolio_number'];
  ?>
  
    <?php echo $before_widget; ?>   
     <div class="sidebar-gallery">
     <h4 class="widget-title"><span><?php echo $title ?></span></h4>
  	<ul>
  <?php query_posts('post_type=portfolio&posts_per_page='.$portfolio_number); ?>
  <?php while (have_posts()) : the_post(); ?>
  
    <li>
    <?php
    $titletext = get_the_title(); 
    $image_thumb =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'sidebar-thumb' ); $image_thumb_src = $image_thumb[0];
    $image =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full'); $image_src = $image[0];  
      $custom = get_post_custom($post->ID); 
    
    ?>
    <a href="<?php echo $image_src; ?>" rel="prettyPhoto[1]" title="<a href='<?php the_permalink(); ?>'><?php echo $titletext; ?></a> <?php echo $custom["caption"][0]; ?>">
    	<?php the_post_thumbnail( 'sidebar-thumb' ); ?>
    </a>
   	<a href="<?php the_permalink(); ?>"><span class="img-desc"><strong><?php echo $titletext; ?></strong> <?php echo $custom["caption"][0]; ?></span></a>
       
</li> 
    
  
  <?php endwhile;?>  
  	</ul>
  	</div>
    <?php echo $after_widget; ?>
        
      
  <?php
   }

   function update($new_instance, $old_instance) {       
       $instance = $old_instance;
       $instance['portfolio_number'] = stripslashes($new_instance['portfolio_number']);  
       $instance['title'] = stripslashes($new_instance['title']);  

      return $instance;
       
   }

   function form($instance) {        
   
       $title = esc_attr($instance['title']);
       $portfolio_number = esc_attr($instance['portfolio_number']);
       ?>
       <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','webello'); ?></label>
         <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
         <?php echo '<p><label for="' . $this->get_field_id('portfolio_number') . '">' . 'Number of Recent Portfolios:' . '</label><input class="widefat" id="' . $this->get_field_id('portfolio_number') . '" name="' . $this->get_field_name('portfolio_number') . '" type="text" value="' .  $portfolio_number . '" /></p>'; ?>
       </p>
      <?php
   }
   
} 
function WeGraphicsPortfolio() {
  register_widget('wegraphics_portfolio');
}

add_action('widgets_init', 'WeGraphicsPortfolio');


?>