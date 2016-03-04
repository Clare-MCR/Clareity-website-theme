<?php

  add_action('init', 'portfolio_register');
 
function portfolio_register() {
 
  $labels = array(
    'name' => _x('Portfolio', 'post type general name'),
    'singular_name' => _x('Portfolio Item', 'post type singular name'),
    'add_new' => _x('Add New', 'portfolio item'),
    'add_new_item' => __('Add New Portfolio Item'),
    'edit_item' => __('Edit Portfolio Item'),
    'new_item' => __('New Portfolio Item'),
    'view_item' => __('View Portfolio Item'),
    'search_items' => __('Search Portfolioy'),
    'not_found' =>  __('Nothing found'),
    'not_found_in_trash' => __('Nothing found in Trash'),
    'parent_item_colon' => ''
  );
 
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'has_archive' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','thumbnail', 'author', 'comments', 'tags')
    ); 
 
  register_post_type( 'portfolio' , $args );
  flush_rewrite_rules();
}
  
  register_taxonomy("portfolio_categories", array("portfolio"), array("hierarchical" => true, "label" => "Portfolio Categories", "singular_label" => "Portfolio Category", "rewrite" => true));


$labels2 = array(
    'name' => _x( 'Portfolio Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Portfolio Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Portfolio Tags' ),
    'popular_items' => __( 'Popular Portfolio Tags' ),
    'all_items' => __( 'All Portfolio Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Portfolio Tag' ), 
    'update_item' => __( 'Update Portfolio Tag' ),
    'add_new_item' => __( 'Add New Portfolio Tag' ),
    'new_item_name' => __( 'New Portfolio Tag' ),
    'separate_items_with_commas' => __( 'Separate portfolio tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove portfolio tags' ),
    'choose_from_most_used' => __( 'Choose from the most used portfolio tags' ),
    'menu_name' => __( 'Portfolio Tags' ),
  ); 

  register_taxonomy('portfolio_tags','portfolio',array(
    'hierarchical' => false,
    'labels' => $labels2,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio_tags' ),
  ));  
  
  add_action("admin_init", "admin_init");
  add_action('save_post', 'save_details');
  
function save_details(){
  global $post;
 
  update_post_meta($post->ID, "caption", $_POST["caption"]);
}
 
function admin_init(){
  add_meta_box("credits_meta", "Add a description for your portfolio", "credits_meta", "portfolio", "normal", "high");
  add_meta_box("video_meta", "Add details for your video", "video_meta", "video", "normal", "high");
}
 
function credits_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $caption = $custom["caption"][0];
  ?>
  <p><label>Caption: <small>Used in prettyPhoto pop-ups and the Portfolio Widget</small></label><br />
  <textarea cols="50" rows="5" name="caption" style="width:98%"><?php echo $caption; ?></textarea></p>
  <?php
}

add_action("manage_posts_custom_column",  "portfolio_custom_columns");
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
 
function portfolio_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Portfolio Title",
    "description" => "Description",
    /*"portfolios" => "Portfolios",*/
  );
 
  return $columns;
}
function portfolio_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "description":
      the_excerpt();
      break;
    /*case "portfolios":
      echo get_the_term_list($post->ID, 'Skills', '', ', ','');
      break;*/
  }
}

?>