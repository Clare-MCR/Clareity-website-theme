<?php

/**
 *  Custom excerpt
 *  
 */

function wgcp_excerpt_l ($length) {
  return 105;
}
function wgcp_excerpt_m ($length) {
  return 55;
}
function wgcp_excerpt_s ($length) {
  return 40;
}
function wgcp_excerpt_ss ($length) {
  return 19;
}
function wgcp_excerpt_more ($more) {
  return '...';
}

function wgcp_excerpt ($length_callback='', $more_callback='') {
  
  global $post;
  
  if(function_exists($length_callback)){
    add_filter('excerpt_length', $length_callback); 
  }

  if(function_exists($more_callback)){
    add_filter('excerpt_more', $more_callback);
  }
  
  $output = get_the_excerpt();

  $output = apply_filters('wptexturize', $output);

  $output = apply_filters('convert_chars', $output);

  $output = '<p class="excerpt">'.$output.'</p>';

  echo $output;
}

/**
 *  Navi control
 *  
 */

function navi_control() {
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
  }

/**
 *	Get current date
 * 	
 */
 
function get_current_date() {
	$current_date = getdate();	
	$current_formatted_date =  $current_date["weekday"].', '.$current_date["mday"].' '.$current_date["month"].' '.$current_date["year"];
	echo $current_formatted_date;
}
function get_current_month() {
  $current_date = getdate();  
  $current_formatted_date =  $current_date["mon"];
  return $current_formatted_date;
}
function get_current_year() {
  $current_date = getdate();  
  $current_formatted_date =  $current_date["year"];
  return $current_formatted_date;
}

/**
 *  Callback function for the menus
 *  
 */

function wp_custom_list() {
  global $shortname;
  $pages = get_option($shortname.'_menu_pages');
  if ($pages){
  $pages_list = wp_list_pages('style=list&title_li=&echo=0&include='.$pages);
      echo "<ul class='top_bar_menu'>".$pages_list."</ul>";
  }
}

/**
 *  List pages for the footer menu
 *  
 */
function wp_custom_list_footer() {
  global $shortname;
  $pages = get_option($shortname.'_menu_pages_footer');
  if ($pages){
  $pages_list = wp_list_pages('style=list&title_li=&echo=0&include='.$pages);
      echo "<ul class='bottom_navigation'>".$pages_list."</ul>";
}
}

/**
 *  Get favicon
 *  
 */
 
function get_custom_favicon() {
 $favicon_url = get_option('wgcp_favicon_url');
 if ($favicon_url) {
    echo "<link rel='icon' type='image/png' href='".$favicon_url."' />"; 
 }
}

/**
 *  Add custom css to override default values
 *  
 */

add_action('wp_head', 'wegraphics_custom_css'); 
function wegraphics_custom_css() {
  
  global $shortname;
  
?>

<style type="text/css">
	div#attribution {width: 498px;height: 20px;text-align: right;display:block !important; font-size:11px; margin:-7px 0px 50px 0px; padding:0px 0px 0px 0px; text-shadow: black 0em 0em .7em;}
	div#attribution.wide {width: 738px;}
	div#attribution a {color: #fff;}
  <?php if(get_option($shortname.'_color_main_bck') != "") { ?>
  /* Set background color */
  body { background: #<?php echo get_option($shortname.'_color_main_bck'); ?>; }
  <?php } ?> 
  <?php if(get_option($shortname.'_font_size') == "font_small") { ?>
  /* If Font Size is Small */
  h1 {font-size: 20px;}
  h2 {font-size: 16px;}
  h3, .menu li a, #banner-content p {font-size: 14px;}
  h4, h5 , .widget-title, .comment-auth, #commentform #submit, .footer-title, #left-col form#searchform label.screen-reader-text {font-size: 13px;}
  .post-quote, blockquote {font-size: 12px;}
  body, input, textarea, .social-media li, .sidebar-gallery ul li span.img-desc strong, #footer-base .subscribe {font-size: 10px;}
  .menu li a span, .menu li ul li a, .sidebar-gallery ul li span.img-desc, .left-widget, .comment-date, a.comment-reply-link, .footer-col p {font-size: 9px;}
  #banner-content p {line-height: 20px;}
  body, input, textarea, .post-quote, blockquote {line-height: 16px;}
  .menu li a span, .menu li ul li a, .social-media li, #footer-base .subscribe {line-height: 14px;}
  <?php } ?>
  <?php if(get_option($shortname.'_font_size') == "font_bold") { ?>
  /* If Font Size is Bold */
  h1 {font-size: 34px;}
  h2 {font-size: 26px;}
  h3, .menu li a, #banner-content p {font-size: 22px;}
  h4, h5 , .widget-title, .comment-auth, #commentform #submit, .footer-title, #left-col form#searchform label.screen-reader-text {font-size: 20px;}
  .post-quote, blockquote {font-size: 16px;}
  body, input, textarea, .social-media li, .sidebar-gallery ul li span.img-desc strong, #footer-base .subscribe {font-size: 14px;}
  .menu li a span, .menu li ul li a, .sidebar-gallery ul li span.img-desc, .left-widget, .comment-date, a.comment-reply-link, .footer-col p {
  	font-size: 13px;}
  #banner-content p {line-height: 28px;}
  body, input, textarea, .post-quote, blockquote {line-height: 24px;}
  .menu li a span, .menu li ul li a, .social-media li, #footer-base .subscribe {line-height: 22px;}
  <?php } ?>
  /* Change Font Family */
  <?php if(get_option('wgcp_list_font_title') != "") { ?>
  h1, h2, h3, h4, h5, .widget-title, .comment-auth, #commentform #submit, .footer-title, #left-col form#searchform label.screen-reader-text, .menu li a {font-family: <?php echo stripslashes(get_option($shortname.'_list_font_title')); ?>;}
  <?php } ?>
  <?php if(get_option($shortname.'_list_font_general') != "") { ?>
  body, input, textarea,  .menu li span, .menu li ul li a {font-family: <?php echo stripslashes(get_option($shortname.'_list_font_general')); ?>;}
  <?php } ?>
  <?php if(get_option($shortname.'_list_font_emphasis') != "") { ?>
  .social-media li, .post-quote, blockquote, #banner-content p, #footer-base .subscribe {font-family: <?php echo stripslashes(get_option($shortname.'_list_font_emphasis')); ?>;}
  <?php } ?>  
  /* Main Color Scheme */
  <?php if(get_option($shortname.'_color_heading') != "") { ?>
  h1, h2, h3, h4, h5, h1 a, h2 a, h3 a, h4 a, h5 a {color: #<?php echo get_option($shortname.'_color_heading'); ?>;} 
  <?php } ?>
  <?php if(get_option($shortname.'_color_text') != "") { ?>
  #left-col, #main-col, input, textarea, input:focus, textarea:focus, .comment-text, .comment-auth, .comment-auth a {color: #<?php echo get_option($shortname.'_color_text'); ?>} 
  <?php } ?>
  <?php if(get_option($shortname.'_color_metatext') != "") { ?>
  .post-info, .post-info a, #blog-footer, #footer, .social-media li, .social-media, .comment-date, a.comment-reply-link{
  	color: #<?php echo get_option($shortname.'_color_metatext'); ?>;
  }<?php } ?>
  <?php if(get_option($shortname.'_color_links') != "") { ?>
  a {color: #<?php echo get_option($shortname.'_color_links'); ?>;} 
  <?php } ?>
  <?php if(get_option($shortname.'_color_links_hover') != "") { ?>
  a:hover { color: #<?php echo get_option($shortname.'_color_links_hover'); ?>; }
  <?php } ?>
  /* Menu Colors */
  <?php if(get_option($shortname.'_color_menu_seplines') != "") { ?>
  .menu li { border-bottom: 1px solid #<?php echo get_option($shortname.'_color_menu_seplines'); ?>; }
  <?php } ?>
  <?php if(get_option($shortname.'_color_menu_text') != "") { ?> 
  .menu li a, .menu li span { color: #<?php echo get_option($shortname.'_color_menu_text'); ?>; }
  <?php } ?> 
  <?php if(get_option($shortname.'_color_menu_texthov') != "") { ?> 
  .menu li a:hover, .menu li:hover span { color: #<?php echo get_option($shortname.'_color_menu_texthov'); ?>; }
  <?php } ?> 
  /* Widget/Sidebar Colors */
  <?php if(get_option($shortname.'_sidebar_title_text') != "") { ?>
  .widget-title, h4.footer-title { color: #<?php echo get_option($shortname.'_sidebar_title_text'); ?>; }
  <?php } ?>
  <?php if(get_option($shortname.'_sidebar_item_text') != "") { ?> 
  .footer-col, .sidebar-widget, .left-widget { color: #<?php echo get_option($shortname.'_sidebar_item_text'); ?>; }
  <?php } ?>
  <?php if(get_option($shortname.'_sidebar_link_text') != "") { ?> 
  .footer-col a, .sidebar-widget a, .left-widget a, .sidebar-gallery ul li span.img-desc{ color: #<?php echo get_option($shortname.'_sidebar_link_text'); ?>; }
  <?php } ?>
  <?php if(get_option($shortname.'_sidebar_link_text_hover') != "") { ?> 
  .footer-col a:hover, .sidebar-widget a:hover, .left-widget a:hover { color: #<?php echo get_option($shortname.'_sidebar_link_text_hover_text'); ?>; }
  <?php } ?>
  <?php if(get_option($shortname.'_sidebar_list_item_sep') != "") { ?> 
  .sidebar-widget ul li, .footer-col ul li, .footer-title { border-bottom: 1px solid #<?php echo get_option($shortname.'_sidebar_list_item_sep'); ?>; }
  <?php } ?>
  <?php if(get_option($shortname.'_sidebar_portfolio_background') != "") { ?> 
  .sidebar-gallery ul li span.img-desc { background-color: #<?php echo get_option($shortname.'_sidebar_portfolio_background'); ?>; }
  <?php } ?>
</style>

<?php } 

/**
 *	Register sidebar
 * 	
 */

if ( function_exists('register_sidebar') ) {
	register_sidebar( array(
		'name' => 'Left',
		'description' => 'The section under the left navigation and logo.',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
		'before_widget' => '<div id="%1$s" class="left-widget">',
    	'after_widget'  => '</div>'
    
	));
	register_sidebar( array(
    'name' => 'General Sidebar',
    'description' => 'Add widgets on the general sidebar when displayed.',
    'before_title'  => '<h4 class="widget-title"><span>',
    'after_title'   => '</span></h4>',
    'before_widget' => '<div id="%1$s" class="sidebar-widget">',
    'after_widget'  => '</div>'
    
  ));
  register_sidebar( array(
    'name' => 'Thin Footer Area',
    'description' => 'Add your widget for the thin footer area when displayed - 2 widgets recommended.',
    'before_title'  => '<h4 class="footer-title">',
    'after_title'   => '</h4>',
    'before_widget' => '<div id="%1$s" class="footer-col">',
    'after_widget'  => '</div>'
    
  ));
  register_sidebar( array(
    'name' => 'Wide Footer Area',
    'description' => 'Add your widget for the wide footer area when displayed - only 3 widgets allowed.',
    'before_title'  => '<h4 class="footer-title">',
    'after_title'   => '</h4>',
    'before_widget' => '<div id="%1$s" class="footer-col">',
    'after_widget'  => '</div>'
    
  ));
}

/**
 *	Register menus
 * 	
 */
add_theme_support( 'menus' );
function register_custom_nav_menus() {
 
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'categories_navigation_menu' => __('Add here your primary navigation menu')/*,
		  'static-pages-top-menu' => __('Add here the menu for the top bar')*/
		)
	);
}
}
add_action( 'init', 'register_custom_nav_menus' );

/**
 *  Twitter stream
 *  
 */
function twitter_stream($username,$limit) {
?>
<script src="http://twitter.com/javascripts/blogger.js" type="text/javascript"></script>
<script src="http://twitter.com/statuses/user_timeline/<?php echo $username; ?>.json?callback=twitterCallback2&amp;count=<?php echo $limit; ?>" type="text/javascript"></script>
<?php

}


/**
 *  get banners
 *  
 */
function wegraphics_banner($dimension) {
  global $shortname;
  global $options;
  $number_of_banners = get_option($shortname.'_banner_number'.$dimension);
  $enable_check = "enable".$dimension;
  if(get_option($shortname.'_enable_banner'.$dimension) == $enable_check && get_option($shortname.'_custom_ads_code'.$dimension) == '') {
  
  foreach ($options as $value) {                      
     
    if ($value['type'] == "text_multi_banner") {    
          foreach ( $value['options'] as $option_value ) {
            
            if($option_value['type'] == "banner_details" && $option_value['dim'] == $dimension ) {
              $k = 0;          
              foreach ( $option_value['options'] as $new_option_value ) {
                
              if($k == $number_of_banners) break;
              $k++;               
              //siamo nel ciclo del banner singolo
               $cur_ban = 'banner_id'.$dimension.'_'.$k;
                foreach ( $new_option_value['options'] as $new_option_value_banner ) {
                    for ($i = 1; $i <= 3; $i++){
                    $banner[$cur_ban][$new_option_value_banner['id']] = get_option($new_option_value_banner['id']);
                    }
                }
                
                $cur_index_url = $shortname.'_banner_'.$k.$dimension.'_url';
                $cur_index_link = $shortname.'_banner_'.$k.$dimension.'_link';
                $cur_index_title = $shortname.'_banner_'.$k.$dimension.'_title';
                
                foreach ( $banner[$cur_ban] as $ban_key => $ban_value ) {                   
                       
                    
                    if($ban_key == $cur_index_url) {
                      
                      $cur_url = $ban_value;
                      
                    } else if ($ban_key == $cur_index_link) {
                      
                      $cur_link = $ban_value;
                      
                    } else if ($ban_key == $cur_index_title) {
                      
                      $cur_title = $ban_value;
                      
                    }
                    
                     
                } 
                
                
               $return = '<a class="'.$cur_ban.'" href="'.$cur_link.'" title="'.$cur_title.'" ><img src="'.$cur_url.'" alt="'.$cur_title.'" /></a>';
               echo $return;
                              
              }              
          
            }
          }
        }
      }
   } else if (get_option($shortname.'_custom_ads_code'.$dimension) != '') { $custom_str = get_option($shortname.'_custom_ads_code'.$dimension); echo stripslashes($custom_str);  }
}

/**
 *  Callback function for the menus
 *  
 */

/**
 *	Comments template
 * 	
 */
 
function wegraphics_comment($comment, $attr, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div class="comment" id="comment-<?php comment_ID(); ?>">
     
     	  <div class="comment-info"><?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>	   
     	  <div class="comment-auth"><?php printf(__('%s'), get_comment_author_link()) ?></div>
     	  	<span class="comment-date"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></span>
     	  </div>
     	  <div class="comment-text">		  
     	  		<?php comment_text() ?>
     	  </div>
     	 	  <div class="reply">
     		<?php comment_reply_link(array_merge( $attr, array('depth' => $depth, 'max_depth' => $attr['max_depth']))) ?>
      
      
     


      
      

     </div>
     
     
     
     
<?php
      }

function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
  <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?> 
<?php //modify the comment counts to only reflect the number of comments minus pings
if( phpversion() >= '4.4' ) add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
    if ( ! is_admin() ) {
      global $id;
      $get_comments = get_comments('post_id=' . $id);
      $comments_by_type = &separate_comments($get_comments);
      return count($comments_by_type['comment']); 
    } else {
            return $count;
        }
}


/**
 *  thumbnail support
 *  
 */
if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails', array( 'post', 'gallery', 'video' ) );
set_post_thumbnail_size( 300, 212 );  
}
/**
 *	Custom background
 * 	
 */
/*if(function_exists('add_custom_background')) { add_custom_background(); }*/

/**
 *  Add various supports
 *  
 */
 
    /** Tell WordPress to run the panle when the 'after_setup_theme' hook is run. */
    add_action( 'after_setup_theme', 'wegraphics_setup_appearance' );

    if ( ! function_exists('wegraphics_setup_appearance') ):

    function wegraphics_setup_appearance() {

  
    }
    endif;


/**
 Plugin Name: Simple Custom Post Type Archives
 Plugin URI: http://www.cmurrayconsulting.com/software/wordpress-custom-post-type-archives/
 Description: Adds friendly permalink support, template files, and a conditional for public, non-hierarchical custom post types. A natural extension to the built in custom post types feature in 3.0.
 Version: 0.9.3
 Author: Jacob M Goldman (C. Murray Consulting)
 Author URI: http://www.cmurrayconsulting.com

    Plugin: Copyright 2009 C. Murray Consulting  (email : jake@cmurrayconsulting.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * is it a post type that this plugin deals with?
 * 
 * @param string|array $post_type should be a custom post type archive
 * @return true if its a post type we deal with, false if not
 */
function is_scpta_post_type( $post_type ) 
{
  if ( is_array($post_type) )   // multiple post types 
  {
    if ( count($post_type) > 1 )  // not a custom post type archive
      return false;
      
    $post_type = $post_type[0];   
  }
  
  if ( !is_string($post_type) )
    return;
  
  $post_type = get_post_type_object( $post_type );
  
  if ( !is_null( $post_type ) && $post_type->_builtin == false && $post_type->public == true && isset($post_type->rewrite['slug']) && !empty($post_type->rewrite['slug']) && $post_type->hierarchical == false ) 
    return $post_type;  
  
  return false;
}

/**
 * generate rewrite rules for custom post type archives
 */

add_action( 'generate_rewrite_rules', 'scpta_rewrite_rules' );

function scpta_rewrite_rules( $wp_rewrite )
{
  $post_types = get_post_types();
  
  foreach ( $post_types as $type ) :
    
    if ( !$type_info = is_scpta_post_type($type) )  // skip native, non-public, no slug types - hierarchical too? 
      continue;
    
    $type_slug = $type_info->rewrite['slug'];
    
    $new_rules = array( 
      $type_slug.'/?$' => 'index.php?post_type='.$type,
      $type_slug.'/page/?([0-9]{1,})/?$' => 'index.php?post_type='.$type.'&paged='.$wp_rewrite->preg_index(1),
      $type_slug.'/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type='.$type.'&feed='.$wp_rewrite->preg_index(1),
      $type_slug.'/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type='.$type.'&feed='.$wp_rewrite->preg_index(1)
    );
    
      $wp_rewrite->rules = array_merge($new_rules, $wp_rewrite->rules);

  endforeach;
}

/**
 * after querying posts, set some new wp_query properties
 */
 
add_action( 'parse_query', 'scpta_parse_query', 100 );

function scpta_parse_query( $wp_query )
{
  if ( !isset($wp_query->query_vars['post_type']) )
    return;
  
  $post_type = $wp_query->query_vars['post_type'];
  
  if ( get_query_var('name') || !is_scpta_post_type($post_type) || is_robots() || is_feed() || is_trackback() )
    return;
    
  add_filter( 'body_class', 'scpta_body_classes' );                     // add special body classes
  add_filter( 'wp_title', 'scpta_wp_title', 10, 3 );                    // correct wp_title 
  $wp_query->is_home = false;                               // correct is_home variable
  $wp_query->is_custom_post_type_archive = true;                      // define new query variable
} 

/**
 * custom template files for custom post type archives
 */

add_action( 'template_redirect', 'scpta_template_redirect' );

function scpta_template_redirect()
{ 
  if ( is_custom_post_type_archive() ) :
  
    $post_type = is_scpta_post_type( get_query_var('post_type') );
  
    $template = array( "type-".$post_type->name.".php" );
    if ( isset( $post_type->rewrite['slug'] ) ) $template[] = "type-".$post_type->rewrite['slug'].".php";
    array_push( $template, 'type.php', 'index.php' );
  
    locate_template( $template, true );
    
    die();
    
  endif;
}

/**
 * custom wp_title for custom post type archives
 */
function scpta_wp_title($title, $sep, $seplocation)
{
  $post_type = is_scpta_post_type( get_query_var('post_type') );
  
  $title = $post_type->label;
  $t_sep = '%WP_TITILE_SEP%'; // Temporary separator, for accurate flipping, if necessary
  
  $prefix = '';
  if ( !empty($title) )
    $prefix = " $sep ";

  // Determines position of the separator and direction of the breadcrumb
  if ( 'right' == $seplocation ) { // sep on right, so reverse the order
    $title_array = explode( $t_sep, $title );
    $title_array = array_reverse( $title_array );
    $title = implode( " $sep ", $title_array ) . $prefix;
  } else {
    $title_array = explode( $t_sep, $title );
    $title = $prefix . implode( " $sep ", $title_array );
  }
  
  return $title;
}

/**
 * Add body classes for custom post types.
 */
function scpta_body_classes($classes) 
{
  array_push( $classes, 'custom-post-type-archive', 'custom-post-type-' . get_query_var('post_type') . '-archive' );
  return $classes;
}

/**
 * Determines whether the current view is a custom post type archive.
 * 
 * @param string $post_type Optional. The registered name of the post type to check against. 
 * @return true or false
 */
function is_custom_post_type_archive( $post_type = '' ) 
{
  global $wp_query;
  
  if ( !isset($wp_query->is_custom_post_type_archive) || !$wp_query->is_custom_post_type_archive ) 
    return false;
  
  if ( empty($post_type) || $post_type == get_query_var('post_type') )
    return true;
      
  // not sure whether to add checks against label, singular label or slug... adds more overhead and could be problematic with default labels (post)
    
  return false;
}

/**
 * Display a link to the current post type feed. Automatically called on custom post
 * type archives and single custom post types if automatic feed links is enabled. 
 * Priority of 2 based on feed_links priority in default-filters.php
 */
 
add_action( 'wp_head', 'scpta_feed_links', 2 ); 
 
function scpta_feed_links()
{
  if ( !current_theme_supports('automatic-feed-links') )
    return;
  
  if ( !$post_type = is_scpta_post_type( get_query_var('post_type') ) )
    return; 
  
  echo '<link rel="alternate" type="' . feed_content_type() . '" title="' . esc_attr( get_bloginfo('name') . ' &raquo; '. $post_type->label . ' Feed' ) . '" href="' . get_scpta_feed_link($post_type->name) . "\" />\n";
}

/**
 * Get a feed link for a custom post type archive
 * 
 * @param object $post_type Custom post type name.
 * @param string $feed Optional. Feed type.
 * @return string Link to the feed for the post type specified by $post_type.
 */
function get_scpta_feed_link( $post_type, $feed = '' )
{
  if ( !$post_type = is_scpta_post_type( $post_type ) )
    return false;
    
  if ( empty($feed) )
    $feed = get_default_feed();
    
  $permalink_structure = get_option('permalink_structure');
  
  if ( '' == $permalink_structure ) {
    $link = home_url("?feed=$feed&amp;post_type=" . $post_type->name);
  } else {
    $link = home_url( $post_type->rewrite['slug'] );
    $feed_link = ( $feed == get_default_feed() ) ? 'feed' : "feed/$feed";
    $link = trailingslashit($link) . user_trailingslashit($feed_link, 'feed');
  }
  
  $link = apply_filters('scpta_feed_link', $link, $feed);
  
  return $link;
}




/**
 * on activation and deactivation flush rewrite rules
 */
add_action( 'custom_type_arch', 'scpta_flush_rewrite' );
/** register_deactivation_hook( __FILE__, 'scpta_flush_rewrite' ); **/

function scpta_flush_rewrite() {
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}




}
	
?>