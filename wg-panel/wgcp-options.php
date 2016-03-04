<?php

/**
 Theme Name: Bello
 Theme URI: http://wegraphics.net
 Description: A powerful WordPress theme with beautiful built-in portfolios and styled galleries. 
 Author: Nathan Brown & Natalie Hipp | WeGraphics
 Author URI: http://wegraphics.net
 Version: 1.0
 Tags: black, white, two-columns, fixed-width, custom-header, custom-background, threaded-comments, sticky-post, translation-ready, microformats, rtl-language-support, editor-style, custom-menu, styled galleries, portfolios, custom post type, custom taxonomy, custom styles
 
 License: GNU General Public License version 3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
/*********************************************************************/
/**
 * 
 *  Options page
 */
/*********************************************************************/

/**
 *  $options - Array of array contaning the WGCP options 
 * 
 * 
 */


global $shortname;
  
  $options = array (
  
    /* General section options */
  
    array ( 
    
        "name" => "General",
        "type" => "section"
        
        ),
    
    array (  
    
        "type" => "open"
        
        ),
        

    array ( 
      
         "legend_name" => "Logo",
         "label_name" => "Add your logo",
         "desc" => "Use upload button on the right to add a new logo for your website. Suggested dimension 136px × 134px in transparent png",
         "id" => $shortname."_logo_url",
         "id_suffix" => "logo_url",
         "type" => "text_with_upload",
         "std" => ""
        
         ),
      
    
    array ( 
      
         "legend_name" => "Favicon",
         "label_name" => "Add favicon",
         "desc" => "Use upload button on the right to add a favicon for your website. Please, use a 16px × 16px PNG image",
         "id" => $shortname."_favicon_url",
         "id_suffix" => "favicon_url",
         "type" => "text_with_upload",
         "std" => ""
        
         ),
         
   array ( 
     
        "legend_name" => "Portfolio URL",
        "label_name" => "URL to your Portfolio",
        "desc" => "If you've created a page and linked it to a portfolio template, add the URL to that page here - it displays on links within portfolio items",
        "id" => $shortname."_portfolio_url",
        "id_suffix" => "portfolio_url",
        "type" => "text",
        "std" => ""
       
        ),
         
         
    array (   
    
         "legend_name" => "Footer",
         "label_name" => "Customize your footer text",
         "desc" => "You can use html here",
         "id" => $shortname."_footer_text",
         "type" => "textarea",
         "std" => ""
         
         ),
         
        
    array (   
    
         "legend_name" => "Google Analytics",
         "label_name" => "Add your Google Analytics code",
         "desc" => "Fill this input field with your Google Analytics code to activate statistics for your website",
         "id" => $shortname."_google_analytics",
         "type" => "textarea",
         "std" => ""
         
         ),
         
         
    array (  
    
         "sub_cat_name" => "Social accounts",
         "type" => "sub_cat",
         
         ),
         
    array (   
    
         "legend_name" => "FeedBurner",
         "type" => "text_multi",
         "options" => 
         
                  array(
         
                    array(
         
                     "label_name" => "Custom feed url",
                     "id" => $shortname."_feedburner_url",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Your FeedBurner url here - http://feeds.feedburner.com/yourwebsite" 
                  
                    )
                  
                  
                  )
                  
         ),
    
    array (   
    
         "legend_name" => "Social links",
         "type" => "text_multi",
         "options" => 
         
                  array(
         
                    
                  
                    array(
         
                     "label_name" => "Facebook Username",
                     "id" => $shortname."_facebook_username",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Insert only your username" 
                  
                    ),
                    
                    array(
                    
                    "label_name" => "Twitter Username",
                    "id" => $shortname."_twitter_username",
                    "type" => "text",
                    "std" => "",
                    "desc" => "Insert only your username" 
                 
                   ),
                    
                    array(
                    
                    "label_name" => "Flickr Username",
                    "id" => $shortname."_flickr_username",
                    "type" => "text",
                    "std" => "",
                    "desc" => "Insert only your username" 
                 
                   ),
                   
                   array(
                   
                   "label_name" => "LinkedIn Username",
                   "id" => $shortname."_linkedin_username",
                   "type" => "text",
                   "std" => "",
                   "desc" => "Insert only your username" 
                
                  )
         
                  
                  )
                  
         ),
    
    array (   
    
         "type" => "close" 
         
         ),
    
    /* Style and layout section options */
        
    array(  
    
         "name" => "Style and Layout",
         "type" => "section"),
    
    array(  
    
         "type" => "open"
         
         ),
        
     array ( 
       
          "legend_name" => "Background Image",
          "label_name" => "Add your background image",
          "desc" => "Use upload button on the right to add a new background for your website. This background will not be tiled. Recommended dimensions are 1440 x 900.",
          "id" => $shortname."_background_url",
          "id_suffix" => "background_url",
          "type" => "text_with_upload",
          "std" => ""
         
          ),
          
     array (
          
              "legend_name" => "Post Options",
              "type" => "text_multi_posts",
              "options" => array (   
              
              				array ( 
              				                
			                  	"label_name" => "Show Author?",
			                  	"id" => $shortname."_show_post_author",
			                  	"type" => "radio",
			                  	"desc" => "Show author for normal posts",
			                  	"options" => array( "show_post_author_yes" => "yes", "show_post_author_no" => "no" ),
			                  	"std" => "show_post_author_yes"
			                  	
			
			                     ),    
              
                             array ( 
           						"label_name" => "Show Date?",
           						"id" => $shortname."_show_post_date",
           						"type" => "radio",
           						"desc" => "Show date for normal posts",
           						"options" => array( "show_post_date_yes" => "yes", "show_post_date_no" => "no" ),
           						"std" => "show_post_date_yes"
                                    
             
                                  ),
                                  
                             array ( 
     
                               	"label_name" => "Show Comments?",
                               	"id" => $shortname."_show_post_comments",
                               	"type" => "radio",
                               	"desc" => "Show comments for normal posts",
                               	"options" => array( "show_post_comments_yes" => "yes", "show_post_comments_no" => "no" ),
                               	"std" => "show_post_comments_yes"
                               	
             
                                  ),
                                  
                             
                                  
                             array ( 
                             
                               	"label_name" => "Show Categories?",
                               	"id" => $shortname."_show_post_categories",
                               	"type" => "radio",
                               	"desc" => "Show categories for normal posts",
                               	"options" => array( "show_post_categories_yes" => "yes", "show_post_categories_no" => "no" ),
                               	"std" => "show_post_categories_yes"
                               	
             
                                  ),
                                  
                             array ( 
                             
                               	"label_name" => "Show Tags?",
                               	"id" => $shortname."_show_post_tags",
                               	"type" => "radio",
                               	"desc" => "Show tags for normal posts",
                               	"options" => array( "show_post_tags_yes" => "yes", "show_post_tags_no" => "no" ),
                               	"std" => "show_post_tags_yes"
                               	
             
                                  )
                             
                                )
             ),
     
     array (
          
              "legend_name" => "Portfolio Post Options",
              "type" => "text_multi_posts",
              "options" => array (    
              
              				array ( 
              				                
			                  	"label_name" => "Show Author?",
			                  	"id" => $shortname."_show_portfolio_post_author",
			                  	"type" => "radio",
			                  	"desc" => "Show author for normal posts",
			                  	"options" => array( "show_portfolio_post_author_yes" => "yes", "show_portfolio_post_author_no" => "no" ),
			                  	"std" => "show_portfolio_post_author_yes"
			                  	
			
			                     ),   
              
                             array ( 
           						"label_name" => "Show Date?",
           						"id" => $shortname."_show_portfolio_post_date",
           						"type" => "radio",
           						"desc" => "Show date for normal posts",
           						"options" => array( "show_portfolio_post_date_yes" => "yes", "show_portfolio_post_date_no" => "no" ),
           						"std" => "show_portfolio_post_date_yes"
                                    
             
                                  ),
                                  
                             array ( 
     
                               	"label_name" => "Show Comments?",
                               	"id" => $shortname."_show_portfolio_post_comments",
                               	"type" => "radio",
                               	"desc" => "Show comments for normal posts",
                               	"options" => array( "show_portfolio_post_comments_yes" => "yes", "show_portfolio_post_comments_no" => "no" ),
                               	"std" => "show_portfolio_post_comments_yes"
                               	
             
                                  ),
                                  
                             
                                  
                             array ( 
                             
                               	"label_name" => "Show Categories?",
                               	"id" => $shortname."_show_portfolio_post_categories",
                               	"type" => "radio",
                               	"desc" => "Show categories for normal posts",
                               	"options" => array( "show_portfolio_post_categories_yes" => "yes", "show_portfolio_post_categories_no" => "no" ),
                               	"std" => "show_portfolio_post_categories_yes"
                               	
             
                                  ),
                                  
                             array ( 
                             
                               	"label_name" => "Show Tags?",
                               	"id" => $shortname."_show_portfolio_post_tags",
                               	"type" => "radio",
                               	"desc" => "Show tags for normal posts",
                               	"options" => array( "show_portfolio_post_tags_yes" => "yes", "show_portfolio_post_tags_no" => "no" ),
                               	"std" => "show_portfolio_post_tags_yes"
                               	
             
                                  )
                             
                                )
             ),          
          
     
     
     array (
     
         "legend_name" => "Font family",
         "type" => "text_multi",
         "options" => array (       
         
                        array ( 
      
                               "label_name" => "Main font-family",
                               "desc" => "This font-family will be used for all your contents except headings",
                               "id" => $shortname."_list_font_general",
                               "type" => "dropdown",                               
                               "options" => array ( 
                               		"'Helvetica Neue', Helvetica, Arial, sans-serif", 
                               		"'PT Sans Narrow', sans-serif",
                               		"Georgia, 'Times New Roman', Times, serif", 
                               		"Tahoma, Geneva, sans-serif", 
                               		"'Trebuchet MS', Helvetica, sans-serif", 
                               		"Verdana, Geneva, sans-serif", 
                               		"'LucidaGrande', 'Lucida Sans Unicode', sans-serif" ),
                               		
                               "std" => "'Helvetica Neue', Helvetica, Arial, sans-serif"
        
                             ),
                             
                        array ( 

                               "label_name" => "Font-family for titles",
                               "desc" => "This font-family will be used for titles and headings",
                               "id" => $shortname."_list_font_title",
                               "type" => "dropdown",
                               "options" => array ( 
                               		"'PT Sans Narrow', sans-serif",
                               		"'Helvetica Neue', Helvetica, Arial, sans-serif", 
                               		"Georgia, 'Times New Roman', Times, serif", 
                               		"Tahoma, Geneva, sans-serif", 
                               		"'Trebuchet MS', Helvetica, sans-serif", 
                               		"Verdana, Geneva, sans-serif", 
                               		"'LucidaGrande', 'Lucida Sans Unicode', sans-serif" 
                               		
                               	),
                               		
                               "std" => "'PT Sans Narrow', sans-serif"
        
                             ),
                             
                         array ( 
                         
	                            "label_name" => "Font-family for emphasized elements",
	                            "desc" => "This font-family will be used for items that are emphasized",
	                            "id" => $shortname."_list_font_emphasis",
	                            "type" => "dropdown",
                               "options" => array ( 
                               		"Georgia, 'Times New Roman', Times, serif", 
                               		"'Helvetica Neue', Helvetica, Arial, sans-serif", 
                               		"'PT Sans Narrow', sans-serif",
                               		"Tahoma, Geneva, sans-serif", 
                               		"'Trebuchet MS', Helvetica, sans-serif", 
                               		"Verdana, Geneva, sans-serif", 
                               		"'LucidaGrande', 'Lucida Sans Unicode', sans-serif" 
                                ),
	                            "std" => "Georgia, 'Times New Roman', Times, serif"
	     
	                          )
                        
                           )
        ),
        
     array(
         
         "legend_name" => "Font size",
         "label_name" => "Choose the font-size",
         "id" => $shortname."_font_size",
         "id_suffix" => "short_des",
         "type" => "radio",
         "desc" => "You can choose the font-size here",
         "options" => array( "font_small" => "small", "font_normal" => "normal", "font_bold" => "bold" ),
         "std" => "font_normal"
        
        ),
        
           
     array (   
    
         "legend_name" => "Customize color scheme",
         "type" => "color-picker",
         "options" => 
         
                  array(
         
                    array(
         
                     "label_name" => "Body background color",
                     "id" => $shortname."_color_main_bck",
                     "input_id" => "colorpickerField_1",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Choose a color for the main background (will only display if no background image is selected." 
                  
                    ),
                    
                    array(
                       
                       "label_name" => "Heading Colors",
                       "id" => $shortname."_color_heading",
                       "input_id" => "colorpickerField_29",
                       "type" => "text",
                       "std" => "",
                       "desc" => "Choose the main color for the headings" 
                    
                      ),
                  
                    array(
                    
                    "label_name" => "Text color an normal element",
                    "id" => $shortname."_color_text",
                    "input_id" => "colorpickerField_15",
                    "type" => "text",
                    "std" => "",
                    "desc" => "Choose the main color for the text" 
                 
                   ),
                   
                   array(
        
                    "label_name" => "Light text color and metainfo",
                    "id" => $shortname."_color_metatext",
                    "input_id" => "colorpickerField_16",
                    "type" => "text",
                    "std" => "",
                    "desc" => "Choose the color for the meta information text and other secondary element" 
                 
                   ),
                    
                    array(
         
                     "label_name" => "Links",
                     "id" => $shortname."_color_links",
                     "input_id" => "colorpickerField_8",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Choose a color for the links and highlithed elements" 
                  
                    ),          
                  
                    array(
                       
                       "label_name" => "Links on Hover",
                       "id" => $shortname."_color_links_hover",
                       "input_id" => "colorpickerField_28",
                       "type" => "text",
                       "std" => "",
                       "desc" => "Choose a color for hover style of links" 
                    
                      )  
                    
                    
                    
                   
                    
                    
                  )
                  
         ),
         
         
         array (   
    
         "legend_name" => "Choose colors for the menu",
         "type" => "color-picker",
         "options" => 
         
                  array(
         
                      
                    
                    
                    array(
         
                     "label_name" => "Menu separation lines",
                     "id" => $shortname."_color_menu_seplines",
                     "input_id" => "colorpickerField_5",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Choose a color for the separation lines (side borders of the list items)" 
                  
                    ),
                    
                    
                    array(
         
                     "label_name" => "Item text color",
                     "id" => $shortname."_color_menu_text",
                     "input_id" => "colorpickerField_9",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Choose a color for the item text" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "Item text color on hover",
                     "id" => $shortname."_color_menu_texthov",
                     "input_id" => "colorpickerField_10",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Choose a color for the item text on hover" 
                  
                    ),
                
                )
                  
         ),
         
    array (   
    
         "legend_name" => "Choose colors for the sidebar and widget areas",
         "type" => "color-picker",
         "options" => 
         
                  array(
         
                    
                    array(
         
                     "label_name" => "Widget Title Text",
                     "id" => $shortname."_sidebar_title_text",
                     "input_id" => "colorpickerField_22",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Choose a color for the general sidebar titles and titles under the navigation" 
                  
                    ),
                    
                    
                    array(
         
                     "label_name" => "Widget Item Text Color",
                     "id" => $shortname."_sidebar_item_text",
                     "input_id" => "colorpickerField_23",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Choose a color for the general text" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "Widget Link Text Color",
                     "id" => $shortname."_sidebar_link_text",
                     "input_id" => "colorpickerField_24",
                     "type" => "text",
                     "std" => "",
                     "desc" => "Choose a color for links" 
                  
                    ),
                    
                    array(
                    
                    "label_name" => "Widget Link Text Color on Hover",
                    "id" => $shortname."_sidebar_link_text_hover",
                    "input_id" => "colorpickerField_25",
                    "type" => "text",
                    "std" => "",
                    "desc" => "Choose a color for links on hover" 
                 
                   ),
                   
                   array(
                      
                      "label_name" => "Sidebar List Item Separator",
                      "id" => $shortname."_sidebar_list_item_sep",
                      "input_id" => "colorpickerField_27",
                      "type" => "text",
                      "std" => "",
                      "desc" => "Choose a color for the border separator between list items" 
                   
                     ),
                   
                   array(
                      
                      "label_name" => "Portfolio Title Background Color",
                      "id" => $shortname."_sidebar_portfolio_background",
                      "input_id" => "colorpickerField_26",
                      "type" => "text",
                      "std" => "",
                      "desc" => "Choose a color for behind portfolio titles in the portfolio widget" 
                   
                     ),
                    
                
                )
                  
         ),

    array( 
    
         "type" => "close" 
         
         ),
    
    /* SEO section options */

    array(  
    
         "name" => "SEO",
         "type" => "section"
         
         ),
    
    array(  
    
         "type" => "open"
         
         ),

    array(
         
         "legend_name" => "Activate SEO",
         "label_name" => "Activate SEO support?",
         "id" => $shortname."_activate_seo",
         "type" => "radio",
         "desc" => "Enable or disable SEO support. We help you take control of your search engine readiness with some in-built theme options. However, this theme will support third part plugins if you select 'no'",
         "options" => array( "activate_seo_yes" => "yes", "activate_seo_no" => "no" ),
         "std" => "activate_seo_yes"
        
        ),
        
    array(
         
         "legend_name" => "NoIndex",
         "label_name" => "Use noindex for the following pages?",
         "id_suffix" => "short_des",
         "type" => "checkbox",
         "desc" => "Select the pages where you want to use noindex. Search engines will not read these pages",
         "options" => array( 
                             array ( 
                                    
                                    "id" => $shortname."_seo_noindex_cat",
                                    "name" => "categories",
                                    "label_name" => "Categories", 
                                    "std" => ""
                                    
                                    ), 
                                    
                             array (
                                    
                                    "id" => $shortname."_seo_noindex_arc",
                                    "name" => "archives",
                                    "label_name" => "Archives", 
                                    "std" => ""
                                    
                                    ), 
                                    
                             array (
                                    
                                    "id" => $shortname."_seo_noindex_sea",
                                    "name" => "search_chb",
                                    "label_name" => "Search page", 
                                    "std" => ""
                                    
                                    ) 
                           
                           ),
        
        ),
    
    array (  
    
         "sub_cat_name" => "Homepage SEO",
         "type" => "sub_cat",
         
         ),
    
    array(
         
         "legend_name" => "Homepage title",
         "label_name" => "Homepage title format",
         "id" => $shortname."_seo_frontpage_title",
         "id_suffix" => "short_des",
         "type" => "radio",
         "desc" => "Select the title format for your frontpage",
         "options" => array( "home_only_title" => "Only title", "title_description" => "Title and description" ),
         "std" => "home_only_title"
        
        ),
    
    array (   
    
         "legend_name" => "Home page SEO details",
         "type" => "text_multi",
         "options" => array (
                        
                      array (   
    
                          "legend_name" => "Homepage description",
                          "label_name" => "Add the frontpage description",
                          "desc" => "Fill this field to add a custom description to your homepage for SEO purposes",
                          "id" => $shortname."_seo_frontpage_description",
                          "type" => "textarea",
                          "std" => ""
                      ),
                      
                      array (   
    
                          "legend_name" => "Homepage keywords",
                          "label_name" => "Add the frontpage keywords",
                          "desc" => "Separate the keywords with comma (E.g.: design, art, sport, lifestyle)",
                          "id" => $shortname."_seo_frontpage_keywords",
                          "type" => "text",
                          "std" => ""
                      ),
                      
                   )   
         ),
    
    array (   
    
         "legend_name" => "Additional homepage headers",
         "label_name" => "Add custom code",
         "desc" => "Additional code within &lt;head&gt; tag for the homepage",
         "id" => $shortname."_seo_add_header_home",
         "type" => "textarea",
         "std" => ""
         
         ),
    
    array (  
    
         "sub_cat_name" => "Single pages SEO",
         "type" => "sub_cat",
         
         ),
         
    array(
         
         "legend_name" => "Single page titles",
         "label_name" => "Single title format",
         "id" => $shortname."_seo_single_title",
         "id_suffix" => "short_des",
         "type" => "radio",
         "desc" => "Select the title format for your single page",
         "options" => array( "single_only_title" => "Only title", "blogname_title" => "BlogName | Page title", "title_blogname" => "Page title | BlogName" ),
         "std" => ""
        
        ),
        
        
    array (   
    
         "legend_name" => "Additional post headers",
         "label_name" => "Add custom code",
         "desc" => "Additional code within &lt;head&gt; tag for posts",
         "id" => $shortname."_seo_add_header_post",
         "type" => "textarea",
         "std" => ""
         
         ),
         
    array (   
    
         "legend_name" => "Additional page headers",
         "label_name" => "Add custom code",
         "desc" => "Additional code within &lt;head&gt; tag for pages",
         "id" => $shortname."_seo_add_header_page",
         "type" => "textarea",
         "std" => ""
         
         ),
    
    array (  
    
         "sub_cat_name" => "Categories and archives",
         "type" => "sub_cat_long",
         
         ),
        
    array(
         
         "legend_name" => "Category and archive titles",
         "label_name" => "Category and archive title format",
         "id" => $shortname."_seo_category_title",
         "id_suffix" => "short_des",
         "type" => "radio",
         "desc" => "Select the title format for your single page",
         "options" => array( "cat_only_title" => "Only title", "blogname_catname" => "BlogName | Category title", "catname_blogname" => "Category title | BlogName" ),
         "std" => ""
        
        ),
        
   array (   
    
         "legend_name" => "Additional category headers",
         "label_name" => "Add custom code",
         "desc" => "Additional code within &lt;head&gt; tag for categories",
         "id" => $shortname."_seo_add_header_category",
         "type" => "textarea",
         "std" => ""
         
         ),

    array( 
    
         "type" => "close" 
         
         ),

    /* ADV manager section options */
        
    array(  
    
         "name" => "ADV Manager",
         "type" => "section"
         
         ),
    
    array(  
    
         "type" => "open"
      
         ),
         
    array (   
    
         "legend_name" => "Header Banner",
         "type" => "text_multi_banner",
         "options" => 
         
                  array(
         
                    array(
         
                     "legend_name" => "Activate banner",
                     "label_name" => "Activate banner",
                     "id" => $shortname."_enable_banner_468",                     
                     "type" => "radio",
                     "desc" => "Enable or disable header banner",
                     "options" => array( "enable_468" => "yes", "disable_468" => "no" ),
                     "std" => "disable_468"
                  
                    ),  
                    
                    array(
                    
                    "legend_name" => "Auto-open banner",
                    "label_name" => "Auto-open banner",
                    "id" => $shortname."_open_banner_468",                     
                    "type" => "radio",
                    "desc" => "Automatically open header banner",
                    "options" => array( "open_468" => "yes", "close_468" => "no" ),
                    "std" => "close_468"
                 
                   ),                  
                    
                                        
                    array(
                                              
                     "type" => "banner_details",
                     "dim" => "_468",
                     "label_name" => "test",
                     "options" => 
           
                                array (
                                        array (
                                            "banner_name" => "Banner #1",                      
                                            "id" => "banner_id_468_1",
                                            "id_block" => "banner_468_block_1",
                                            "type" => "banner_form",
                                            "options" => array (
                                            
                                                  
                                                    
                                                )
                    
                                        ),                
                                        
                                )              
                    ),  
                    
                     array(
         
                     "legend_name" => "Custom text for the banners",
                     "label_name" => "Add custom text for the header banner",
                     "desc" => "You can also paste your custom ads code here (such as Google Adsense)",
                     "id" => $shortname."_custom_ads_code_468",
                     "type" => "textarea",
                     "std" => ""
                  
                    ),                   
                  
                  )
                  
         ),
        
    
   
    
          
    array(  
    
         "type" => "close" 
         
         ),

    /* Translation section options */

    array(  
    
         "name" => "Translationr",
         "type" => "section"
         
         ),
    
    array(  
    
         "type" => "open"
        
         ),
         
   array(
         
         "legend_name" => "Activate custom string",
         "label_name" => "Enable the use of custom strings",
         "id" => $shortname."_activate_translation",                     
         "type" => "radio",
         "desc" => "Enable or disable custom strings. Click 'yes' and save to use your custom string (use the form below for the customization)",
         "options" => array( "enable_translation" => "yes", "disable_translation" => "no" ),
         "std" => ""
                  
          ), 
                
    array (   
    
         "legend_name" => "Social Media",
         "type" => "text_multi",
         "options" => 
         
                  array(
         
                    array(
         
                     "label_name" => "Subscribe string",
                     "id" => $shortname."_subs_string",
                     "type" => "text",
                     "std" => "Subscribe",
                     "desc" => "Customize the string" 
                  
                    ), 
                    
                    array(
                    
                    "label_name" => "Follow Us string",
                    "id" => $shortname."_follow_us_string",
                    "type" => "text",
                    "std" => "Follow Us",
                    "desc" => "Customize the string" 
                 
                   )
                  
                  
                  )
                        
         ),
         
         array (   
    
         "legend_name" => "404 Error Page",
         "type" => "text_multi",
         "options" => 
         
                  array(
         
                    array(
         
                     "label_name" => "Not found string",
                     "id" => $shortname."_notfound_string",
                     "type" => "text",
                     "std" => "Page Not Found!",
                     "desc" => "Customize the string" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "Not found message",
                     "id" => $shortname."_notfoundmessage_string",
                     "type" => "text",
                     "std" => "Sorry, but the page you were looking for is not here.",
                     "desc" => "Customize the string" 
                  
                    ),
         
                  
                  )
                        
         ),
         
         array (   
    
         "legend_name" => "Home page",
         "type" => "text_multi",
         "options" => 
         
                  array(
         
                    array(
         
                     "label_name" => "Recent articles string",
                     "id" => $shortname."_recentarticles_string",
                     "type" => "text",
                     "std" => "Recent articles",
                     "desc" => "Customize the string" 
                  
                    ),  
                    
                    array(
         
                     "label_name" => "Links string",
                     "id" => $shortname."_links_string",
                     "type" => "text",
                     "std" => "Links",
                     "desc" => "Customize the string" 
                  
                    ),  
                    
                    array(
         
                     "label_name" => "Archives string",
                     "id" => $shortname."_archives_string",
                     "type" => "text",
                     "std" => "Archives",
                     "desc" => "Customize the string" 
                  
                    ), 
                    
                    array(
         
                     "label_name" => "From string",
                     "id" => $shortname."_from_string",
                     "type" => "text",
                     "std" => "From",
                     "desc" => "Customize the string" 
                  
                    ) 
                    
                  
                  
                  )
                        
         ),
         
         array (   
         
              "legend_name" => "Portfolio pages",
              "type" => "text_multi",
              "options" => 
              
                       array(
              
                         array(
              
                          "label_name" => "Portfolio string",
                          "id" => $shortname."_portfolio_string",
                          "type" => "text",
                          "std" => "Portfolio",
                          "desc" => "Customize the string" 
                       
                         ),
                         
                         array(
                         
                             "label_name" => "Portfolios string",
                             "id" => $shortname."_portfolios_string",
                             "type" => "text",
                             "std" => "Portfolios",
                             "desc" => "Customize the string" 
                          
                         ),
                         
                         array(
                         
                             "label_name" => "Back to Portfolio string",
                             "id" => $shortname."_back_to_portfolio_string",
                             "type" => "text",
                             "std" => "Back to Portfolio",
                             "desc" => "Customize the string" 
                          
                         ),
                         
                         array(
                         
                             "label_name" => "View Gallery",
                             "id" => $shortname."_view_gallery_string",
                             "type" => "text",
                             "std" => "View Gallery",
                             "desc" => "Customize the string" 
                          
                         ),
                         
                         array(
                         
                             "label_name" => "View Gallery Details",
                             "id" => $shortname."_view_gallery_details_string",
                             "type" => "text",
                             "std" => "View Gallery Details",
                             "desc" => "Customize the string" 
                          
                         )
                         
                                                
                       )
                             
              ),
         
         
         
         array (  
         
         "legend_name" => "Comments",
         "type" => "text_multi",
         "options" => 
         
                  array(
         
                    array(
         
                     "label_name" => "No comments",
                     "id" => $shortname."_nocomment_string",
                     "type" => "text",
                     "std" => "No comment",
                     "desc" => "Customize the string" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "One comment",
                     "id" => $shortname."_onecomment_string",
                     "type" => "text",
                     "std" => "One comment",
                     "desc" => "Customize the string" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "N comments",
                     "id" => $shortname."_ncomments_string",
                     "type" => "text",
                     "std" => "% comments",
                     "desc" => "Customize the string" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "Leave reply string",
                     "id" => $shortname."_leavereply_string",
                     "type" => "text",
                     "std" => "Leave reply",
                     "desc" => "Customize the string" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "Cancel reply string",
                     "id" => $shortname."_cancelreply_string",
                     "type" => "text",
                     "std" => "Cancel reply",
                     "desc" => "Customize the string" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "To post string",
                     "id" => $shortname."_topost_string",
                     "type" => "text",
                     "std" => "to post a comment",
                     "desc" => "Customize the string" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "Name string",
                     "id" => $shortname."_nameres_string",
                     "type" => "text",
                     "std" => "Name",
                     "desc" => "Customize the string" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "Name string",
                     "id" => $shortname."_submit_string",
                     "type" => "text",
                     "std" => "Submit comment",
                     "desc" => "Customize the string" 
                  
                    ),
                    
                    array(
         
                     "label_name" => "Your message string",
                     "id" => $shortname."_yourmessage_string",
                     "type" => "text",
                     "std" => "Your message",
                     "desc" => "Customize the string" 
                  
                    ),
         
                  
                  )
                        
         ),

    array( 
    
         "type" => "close" 
         
         )
            
  );
  
?>