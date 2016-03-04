<?php

/**
 *  Add title no_index
 *  
 */
function wegraphics_noindex() { 
 
 global $shortname;
 
 $noindex_string = "<meta name='robots' content='noindex,nofollow' />";
 
 if (is_category() && get_option($shortname.'_seo_noindex_cat') == 'categories' ) {
   echo $noindex_string;
 }
 else if (is_archive() && !is_category() && get_option($shortname.'_seo_noindex_arc') == 'archives' ) {
   echo $noindex_string;   
 }
 else if (is_search() && get_option($shortname.'_seo_noindex_sea') == 'search_chb' ) {
   echo $noindex_string;   
 }

}

function wegraphics_additional_headers() { 
 
 global $shortname;
 
 if (is_home() && get_option($shortname.'_seo_add_header_home') != '') {
   echo stripslashes(get_option($shortname.'_seo_add_header_home'));
 }
 else if (is_single() && get_option($shortname.'_seo_add_header_post') != '' ) {
   echo stripslashes(get_option($shortname.'_seo_add_header_post'));  
 }
 else if (is_page() && get_option($shortname.'_seo_add_header_page') != '' ) {
   echo stripslashes(get_option($shortname.'_seo_add_header_page'));  
 }
 else if (is_category() && get_option($shortname.'_seo_add_header_category') == 'search_chb' ) {
   echo stripslashes(get_option($shortname.'_seo_add_header_category'));   
 }

}

/**
 *	Add title to all types of WordPress pages
 * 	
 */
function wegraphics_title() {
	global $shortname;
  //home page title
	if (is_home() || is_front_page()) {	
		if (get_option($shortname.'_seo_frontpage_title') == 'home_only_title') { bloginfo('name'); } 
		else if (get_option($shortname.'_seo_frontpage_title') == 'title_description') { bloginfo('name'); echo ' | '; bloginfo('description'); } 
		else { bloginfo('name'); }  
		
	}
	
	//single posts/pages title
	if (is_single() || is_page()) {
		if (get_option($shortname.'_seo_single_title') == 'title_blogname') { echo wp_title('',false,'').' | '.get_bloginfo('name'); } 
		else if (get_option($shortname.'_seo_single_title') == 'blogname_title') { echo get_bloginfo('name').' | '.wp_title('',false,''); } 
else if (get_option($shortname.'_seo_single_title') == 'single_only_title' || get_option($shortname.'_seo_single_title') == '') { echo wp_title('',false,''); }
  
  }
	
	//categories or archives or search results page
	if (is_category() || is_archive() || is_search()) {    
		if (get_option($shortname.'_seo_category_title') == 'catname_blogname') {
			echo wp_title('',false,'').' | '.get_bloginfo('name');
		} else if (get_option($shortname.'_seo_category_title') == 'blogname_catname') { 
			echo get_bloginfo('name').' | '.wp_title('',false,'');
		} else if (get_option($shortname.'_seo_category_title') == 'cat_only_title' || get_option($shortname.'_seo_category_title') == '') { 
			echo wp_title('',false,'');
		}
		
	}
  if(is_404()) {    
    echo wp_title('',false,'');    
  }
}

/**
 *	Add meta description function 	
 */
function wegraphics_description() {
  
	global $shortname;
  
	// meta description for the homepage
  if (is_home() && get_option($shortname.'_seo_frontpage_description') != '') {
    echo '<meta name="description" content="'.get_option($shortname.'_seo_frontpage_description').'" />';
  } 
  else if (is_home() && get_option($shortname.'_seo_frontpage_description') == '') {
    $frontpage_des = get_bloginfo('description');
    echo '<meta name="description" content="'.$frontpage_des.'" />'; 
  }
	
  if (is_single() || is_page()) {
	//meta description for single post and pages
	global $wp_query; 
	if (isset($wp_query->post->ID)) $postid = $wp_query->post->ID; 
	if (isset($postid)) $single_des = get_post_meta($postid, '_meta_description', true);
	if (get_post_meta($postid, "_meta_description", true) != '') {
		echo '<meta name="description" content="'.$single_des.'" />';
	} else { 
		if (isset($postid)) $post_excerpt = get_the_excerpt($postid); 
		if (isset($postid)) $post_content = $wp_query->post->post_content; 
		
		//limit the_content for meta description
		$post_content = apply_filters('the_content', $post_content);
		$post_content = str_replace(']]>', ']]&gt;', $post_content);
		$post_content = strip_tags($post_content);
		$content_limit = 30;
		$words_in_post = explode(' ', $post_content, $content_limit + 1);
		if (count($words_in_post)> $content_limit) {
			array_pop($words_in_post);
			array_push($words_in_post, '...');
			$post_content = implode(' ', $words_in_post);
		}
		
		if (is_singular() && $post_excerpt !== "" ) {
			echo '<meta name="description" content="'.$post_excerpt.'" />';
		} else {
			echo '<meta name="description" content="'.$post_content.'" />';
		}
	}
	}
	
	if (is_category() || is_archive() || is_search()) {
	#index descriptions
	remove_filter('term_description','wpautop');
	$category = get_query_var('cat'); 
    $cat_des = category_description($category);
	if ($catdes !== '') {
		if (is_category()) echo '<meta name="description" content="'. $cat_des .'" />';
	} else  { 
		echo '<meta name="description" content="Currently viewing archives by category |'.wp_title('',false,'').'" />';  
	}
  } else if (is_archive())  {
     echo '<meta name="description" content="Currently viewing archives from'.wp_title('',false,'').'" />';
  }
}

/**
 *	Add meta keywords function
 * 	
 */

function wegraphics_keywords() {

global $shortname;
	
	//homepage meta keywords
	if (is_home() && get_option($shortname.'_seo_frontpage_keywords') != '') {
	 echo '<meta name="keywords" content="'.get_option($shortname.'_seo_frontpage_keywords').'" />';
  }
  
	//single page meta keywords
	global $wp_query; 
	if (isset($wp_query->post->ID)) $postid = $wp_query->post->ID; 
	if (isset($postid)) $single_keys = get_post_meta($postid, '_meta_keywords', true);
	if (get_post_meta($post->ID, "_meta_keywords", true) !== '' && $single_keys !== '') {
		if (is_single() || is_page()) echo '<meta name="keywords" content="'.$single_keys.'" />';
	} else { 
		if (isset($postid)) $post_tags = wp_get_post_tags($postid);
		foreach ($post_tags as $tag) {		
		$list_of_tags .= $tag->name;
		$list_of_tags .= ', ';
		}
		$post_categories = get_the_category($postid);
		$list_of_tags .= $post_categories[0]->name;
		if (is_single() || is_page()) echo '<meta name="keywords" content="'.$list_of_tags.'" />';
	}
}
/**
 *	Use canonical URLs 
 * 	

remove_action('wp_head', 'rel_canonical');
function wegraphics_use_canonical() {
  
  global $shortname;
  
  //homepage canonical url
  if (is_home() && get_option($shortname.'_seo_activate_canonical') == 'activate_can_yes') {
     echo '<link rel="canonical" href="'.get_bloginfo('url').'" />';
  }
	
	//single pages, archives and categories canonical urls
	global $wp_query; 
	if (isset($wp_query->post->ID)) $postid = $wp_query->post->ID; 
	if (get_option($shortname.'_seo_activate_canonical') == 'activate_can_yes') {
		if (is_singular())  {
		   echo '<link rel="canonical" href="'.get_permalink().'" />
<link rel="shortlink" href="'.wp_get_shortlink().'" />';
    }	
	}
	if (get_option($shortname.'_seo_activate_canonical') == 'activate_can_yes') {
	  $current_cat_id = get_query_var('cat');
	}
}
*/
?>