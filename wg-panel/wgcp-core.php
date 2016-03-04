<?php

/**
 * WG Control Panel created and coded by Piervincenzo Madeo
 * http://wegraphics.net/downloads/web/wemagazine/
 * 
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
 *  WG Control Panel v.2.0. Released April 2012.
 *  http://wegraphics.net
 * 
 *  Panel core page
 */
/*********************************************************************/




/*function wegraphics_site_preview() {?>
  <iframe id="themepreview" name="themepreview" src="<?php echo get_option('home'); ?>/?preview=1"></iframe> 
  <?php 
}*/

/**
 *  wgcp_add_admin() - Add admin capabilities to theme options
 *  
 */

function wgcp_add_admin() {

    global $themename, $shortname, $options;
    
    foreach ($options as $value) {      
    if (isset($value['id'])) {      
      if ( get_option( $value['id'] ) === FALSE ) {        
        if (array_key_exists('std', $value)) {           
            update_option( $value['id'], $value['std'] );          
            $$value['id'] = $value['std'];          
        }        
      } else {        
          $$value['id'] = get_option( $value['id'] ); 
      }
    }
      if ($value['type'] == "text_multi" || $value['type'] == "color-picker" || $value['type'] == "checkbox" ) {
        foreach ( $value['options'] as $option_value ) {
          if (isset($option_value['id'])) {     
            if ( get_option( $option_value['id'] ) === FALSE) {
              if (array_key_exists('std', $option_value)) {
                update_option( $option_value['id'], $option_value['std'] );                
                $$option_value['id'] = $option_value['std'];          
              }
            } else {
              $$option_value['id'] = get_option( $option_value['id'] ); 
           }                        
          }                      
        }      
      }
      
      
      
  // initialize options for the multi_banner section    

  if ($value['type'] == "text_multi_banner" OR $value['type'] == "text_multi_posts") {
    
     foreach ( $value['options'] as $option_value ) { 
      if (isset($option_value['id'])) {     
            if ( get_option( $option_value['id'] ) === FALSE) {
              if (array_key_exists('std', $option_value)) {
                update_option( $option_value['id'], $option_value['std'] );                
                $$option_value['id'] = $option_value['std'];          
              }
            } else {
              $$option_value['id'] = get_option( $option_value['id'] ); 
           }                        
          } 
        if($option_value['type'] == "banner_details") {
          
          foreach ( $option_value['options'] as $new_option_value ) {
            foreach ( $new_option_value['options'] as $new_option_value_banner ) {
            if (isset($new_option_value_banner['id'])) {     
            if ( get_option( $new_option_value_banner['id'] ) === FALSE) {
              if (array_key_exists('std', $new_option_value_banner)) {
                update_option( $new_option_value_banner['id'], $new_option_value_banner['std'] );                
                $$new_option_value_banner['id'] = $new_option_value_banner['std'];          
              }
              } else {
                $$new_option_value_banner['id'] = get_option( $new_option_value_banner['id'] ); 
              }                        
            }
            }
           }
          }
        
        if (isset($option_value['id'])) {     
          if ( get_option( $option_value['id'] ) === FALSE) {
            if (array_key_exists('std', $option_value)) {
              update_option( $option_value['id'], $option_value['std'] );                
              $$option_value['id'] = $option_value['std'];          
            }
        } else {
          $$option_value['id'] = get_option( $option_value['id'] ); 
        }                        
        }               
          
        }
      
     }
               
    }
    
    

    if ( $_GET['page'] == basename(__FILE__) ) {    
        if ( 'save' == $_REQUEST['action'] ) {
            foreach ($options as $value) {                      
                update_option( $value['id'], $_REQUEST[ $value['id'] ] );                    
                if ( $value['type'] == "text_multi" || $value['type'] == "color-picker"  || $value['type'] == "checkbox") {                      
                foreach ( $value['options'] as $option_value ) {                       
                        update_option( $option_value['id'], $_REQUEST[ $option_value['id'] ] );                        
                    }                      
                }
                
                
            // save options for the multi_banner section     
                
                if ($value['type'] == "text_multi_banner" OR $value['type'] == "text_multi_posts") {
    
          foreach ( $value['options'] as $option_value ) {
            update_option( $option_value['id'], $_REQUEST[ $option_value['id'] ] ); 
            if($option_value['type'] == "banner_details") {
          
              foreach ( $option_value['options'] as $new_option_value ) {
                foreach ( $new_option_value['options'] as $new_option_value_banner ) {
                  update_option( $new_option_value_banner['id'], $_REQUEST[ $new_option_value_banner['id'] ] );
                }
              }              
          
            }
          }
        }
                
                
                                                       
            }

            foreach ($options as $value) {                
                if( isset( $_REQUEST[ $value['id'] ] ) ) {                      
          update_option( $value['id'], $_REQUEST[ $value['id'] ]  );                     
                } else {                      
                    delete_option( $value['id'] );                     
                }                               
            }                 
      header("Location: themes.php?page=wgcp-core.php&saved=true");
      die;
        } else if ( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {                 
                if (isset($value['std'])) {                    
                    update_option( $value['id'], $value['std'] );                  
                } else {                  
                    delete_option( $value['id'] );                  
                }            
                if ( $value['type'] == "text_multi" || $value['type'] == "color-picker" || $value['type'] == "checkbox" ) {                      
                    foreach ( $value['options'] as $option_value ) {                       
                        if (isset($option_value['std'])) {                    
                           update_option( $option_value['id'], $option_value['std'] );                  
                        } else {                  
                           delete_option( $option_value['id'] );                  
            }                        
          }                      
        } 

    // reset options for the multi_banner section 

      if ($value['type'] == "text_multi_banner") {
    
          foreach ( $value['options'] as $option_value ) {
            if (isset($option_value['std'])) {                    
                           update_option( $option_value['id'], $option_value['std'] );                  
                        } else {                  
                           delete_option( $option_value['id'] );                  
            } 
            if($option_value['type'] == "banner_details") {
          
              foreach ( $option_value['options'] as $new_option_value ) {
                foreach ( $new_option_value['options'] as $new_option_value_banner ) {
                 if (isset($new_option_value_banner['std'])) {                    
                           update_option( $new_option_value_banner['id'], $new_option_value_banner['std'] );                  
                        } else {                  
                           delete_option( $new_option_value_banner['id'] );                  
            }
                }
              }              
          
            }
          }
        }

           
      }
      header("Location: themes.php?page=wgcp-core.php&reset=true");
      die;
     }
    }


    wgcp_addmenu();

}

/**
 *  wgcp_addmenu() - Add options page to menu
 *  
 */
function wgcp_addmenu(){
  
  global $themename;
  $page = add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'wgcp_admin');   
  add_action('admin_print_scripts-'.$page, 'wgcp_admin_scripts');
  add_action('admin_print_styles-'.$page, 'wgcp_admin_styles');
  
}

/**
 *  wgcp_admin_scripts() - Add jquery capabilities and custom scripts
 *  
 */
function wgcp_admin_scripts() {

  wp_deregister_script('jquery');
  wp_enqueue_script('jquery',  get_bloginfo('template_directory') . '/wg-panel/js/jquery.js', null, '1.4.2');
  wp_enqueue_script('wgcp-admin-js', get_bloginfo('template_directory') . '/wg-panel/js/jqueryui.js',  null, false);
  wp_enqueue_script('wgcp-admin-custom-js', get_bloginfo('template_directory') . '/wg-panel/js/admin-custom.js',  null, false);
  wp_enqueue_script('wgcp-admin-colorpicker-js', get_bloginfo('template_directory') . '/wg-panel/js/colorpicker.js',  null, false);
  wp_enqueue_script('wgcp-admin-uploadify-js', get_bloginfo('template_directory') . '/wg-panel/js/jquery.uploadify.min.js',  null, false);
  wp_enqueue_script('wgcp-admin-swfobject-js', get_bloginfo('template_directory') . '/wg-panel/js/swfobject.js',  null, false);
  
}

/**
 *  wgcp_admin_styles() - Add css scripts
 *  
 */

function wgcp_admin_styles() {
  
  wp_enqueue_style('wgcp-admin', get_bloginfo('template_directory') .'/wg-panel/css/wgcp_ui.css');
  wp_enqueue_style('wgcp-colorpicker', get_bloginfo('template_directory') .'/wg-panel/css/colorpicker.css');
  
}

/**
 *  wgcp_admin() - The options page interface
 *  
 */

function wgcp_admin() {

    global $themename, $shortname, $options;

    if (isset($_REQUEST['saved'])) {
      if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    };
    if (isset($_REQUEST['reset'])) {
      if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated reset_info fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    };
    
?>


<!--  panel -->

<script type="text/javascript">
jQuery(function($){
jQuery(".upload_button").each(function(){
  var current_id = "#" + $(this).attr('id');
  jQuery(current_id).uploadify({
       'uploader': "<?php echo get_bloginfo('template_directory'); ?>/wg-panel/js/uploadify.swf",
       'script': "<?php echo get_bloginfo('template_directory'); ?>/wg-panel/wgcp-img.php?upload_image=uploaded",
       'folder': 'uploads',
       'cancelImg': '',
       'height': '23',
       'width': '76',
       'method': 'POST',
       'buttonImg'   : '<?php echo get_bloginfo('template_directory'); ?>/wg-panel/css/images/upload_button.png',
       'wmode': 'transparent',
       'fileDesc': 'Image Files',
       'fileExt': '*.jpg;*.jpeg;*.gif;*.png',
       'multi': false,
       'sizeLimit': 100 * 1024 * 1024,
       'auto': true,
       'onSelect': function(event,ID,fileObj,data) {
         jQuery('.operation_progress').children().show().addClass('progress');
         jQuery('.operation_progress').fadeIn(200);
       },
       'onComplete': function(event,ID,fileObj,data) {
          var file = fileObj.name;
          var file_parsed = file.replace(" ","-");
          var file_url = "<?php echo get_bloginfo('template_directory'); ?>/custom-uploads/" + file_parsed;
          var id_suffix = current_id.substring(13);
          jQuery("#input_field" + id_suffix).val(file_url);
          jQuery('.operation_progress div').removeClass('progress').addClass('complete').delay(1600).fadeOut(800, function () {
                          jQuery(this).removeClass('complete')
                     }).parent().delay(1900).fadeOut(450);
       }       
  });
});

var current_db_value_468 = '<?php echo get_option($shortname.'_banner_number_468'); ?>';
for(var j = 1; j < parseInt(current_db_value_468) + 1; j++) {

        jQuery('#banner_468_block_'+j).show();

}  



jQuery('#radio_wgcp_banner_number_125 input:radio[name=wgcp_banner_number_125]').click(function(e){

var selected_value = $('#radio_wgcp_banner_number_125 input:radio[name=wgcp_banner_number_125]:checked').val();
//if (current_db_value != selected_value) {
for(var j = 1; j < parseInt(selected_value) + 1; j++) {

        jQuery('#banner_block_'+j).delay(800).fadeIn(400);;

}
for(var i = 10; i > selected_value; i--) {
        jQuery('#banner_block_'+i).delay(800).fadeOut(400);
      }
});

jQuery('#radio_wgcp_banner_number_250 input:radio[name=wgcp_banner_number_250]').click(function(){

var selected_value = $('#radio_wgcp_banner_number_250 input:radio[name=wgcp_banner_number_250]:checked').val();
//if (current_db_value != selected_value) {
for(var j = 1; j < parseInt(selected_value) + 1; j++) {

        jQuery('#banner_block_250_'+j).delay(800).fadeIn(400);;

}
for(var i = 10; i > selected_value; i--) {
        jQuery('#banner_block_250_'+i).delay(800).fadeOut(400);
      }
});
  
});

</script>
<div id="options">

  <div class="panel_header">
    <img src="<?php echo bloginfo('template_directory').'/wg-panel/css/images/logo.png' ?>" alt="panel logo" /> 
    <div class="version"><img src="<?php echo bloginfo('template_directory').'/wg-panel/css/images/version.png' ?>" alt="panel version" /></div>
    <ul>
      <li><a class="general" href="#option_group-1">General</a></li>
      <li><a class="style" href="#option_group-2">Style and Layout</a></li>
      <li><a class="seo" href="#option_group-3">SEO</a></li>
      <li><a class="adv" href="#option_group-4">ADV Management</a></li>
      <li><a class="translation" href="#option_group-5">Translation</a></li>
    </ul>
    <div style="clear: both;"></div>
  </div>  

<div class="panel_wrapper">

<form id="formElem" name="formElem" action="" method="post" enctype="multipart/form-data">
<div class="operation_progress"><div></div></div>    
<?php foreach ($options as $value) { 
                    
    switch ( $value['type'] ) {
                     
        case "open":
        ?>
          
        <div id="option_group-<?php echo $i; ?>">
                    
        <?php 
                      
            switch ( $i ) {
                    
              case "1": echo "<h4>General settings</h4>"; break;
              case "2": echo "<h4 class='head_pan_large'>Customize style and layout</h4>"; break;
              case "3": echo "<h4>Improve SEO</h4>"; break;
              case "4": echo "<h4>Manage banners</h4>"; break;
              case "5": echo "<h4>Modify strings</h4>"; break;
                        
            }
                     
        ?>
           
        <?php 
    
        break;
                    
    case "close":

    ?>
            
    </div>
            
    <?php 
    
    break;

        case "sub_cat":
        
    ?>
          
        <h4 class='head_pan'><?php echo $value['sub_cat_name']; ?></h4>
          
        <?php 
          
        break;
        
        
        case "sub_cat_long":
        
    ?>
          
        <h4 class='head_pan_large'><?php echo $value['sub_cat_name']; ?></h4>
          
        <?php 
          
        break;
          
    case "text":
    
    ?>
    
    <fieldset>
    <legend><?php echo $value['legend_name']; ?></legend>
        <p>
            <label for="<?php echo $value['id']; ?>"><?php echo $value['label_name']; ?></label>
            <input id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
        </p>
        <span class="description"><?php echo $value['desc']; ?></span>
        </fieldset>
    
    <?php 
    
    break;
          
        case "text_multi":
        
    ?>
        
    <fieldset>
        <legend><?php echo $value['legend_name']; ?></legend>
   
        <?php 
           foreach ( $value['options'] as $option_value ) {
        ?>
          <div class="pad_radio">
          <label for="<?php echo $option_value['id']; ?>"><?php echo $option_value['label_name']; ?></label>
          <?php if($option_value['type'] == "text") { ?>
          <input id="<?php echo $option_value['id']; ?>" name="<?php echo $option_value['id']; ?>" type="<?php echo $option_value['type']; ?>" value="<?php if ( get_option( $option_value['id'] ) != "") { echo get_option( $option_value['id'] ); } else { echo $option_value['std']; } ?>" />
          <?php } else if ($option_value['type'] == "textarea") { ?>
          <textarea rows="8" cols="80" id="<?php echo $option_value['id']; ?>" name="<?php echo $option_value['id']; ?>"><?php if ( get_option( $option_value['id'] ) != "") { echo stripslashes(get_option( $option_value['id'] )); } else { echo $option_value['std']; } ?></textarea>
          <?php } else if ($option_value['type'] == "dropdown") { ?>
          <select name="<?php echo $option_value['id']; ?>" id="<?php echo $option_value['id']; ?>" style="margin-left: 0px;">
            <?php foreach($option_value['options'] as $new_option_value) { 
             $selected = '';
                 if (get_option($option_value['id']) == $new_option_value) {
                    $selected = ' selected="selected"';
                 }
                 else if (get_option($option_value['id']) === FALSE && $option_value['std'] == $new_option_value){
                    $selected = ' selected="selected"';
                 }
                 else {
                    $selected = '';
                 } ?>
            <option value="<?php echo $new_option_value; ?>"<?php echo $selected; ?>><?php echo $new_option_value; ?></option>         
            <?php } ?>
          </select>
        <?php } ?>
        </div>
        <span class="description"><?php echo $option_value['desc']; ?></span>
        <br />          
        <?php } ?>
        </fieldset>     
        
    <?php
          
        break;
    
    case "text_multi_banner":
        
    ?>
        
    <fieldset>
        <legend><?php echo $value['legend_name']; ?></legend>
       
        <?php            
           foreach ( $value['options'] as $option_value ) { // inside the second loop
        ?>
            
        <?php if($option_value['type'] != "banner_details") {
          
           if($option_value['type'] == "textarea") { ?>
           <div class="clear"></div>
          <h5 style="clear: both; margin-top: 30px;">You can use the textarea below to add custom code</h5>
          <?php } ?>
          <div class="pad_radio">
           
           <?php if($option_value['type'] == "radio") { ?>
           <label><?php echo $option_value['label_name']; ?></label>
            <div id="radio_<?php echo $option_value['id']; ?>" class="radio_ui">
              <?php foreach ($option_value['options'] as $new_option_value => $new_option_text) {
                 $checked = ' ';
                 if (get_option($option_value['id']) == $new_option_value) {
                    $checked = ' checked="checked" ';
                 }
                 else if (get_option($option_value['id']) === FALSE && $option_value['std'] == $new_option_value){
                    $checked = ' checked="checked" ';
                 }
                 else {
                    $checked = ' ';
                 }
                echo '<input type="radio" name="'.$option_value['id'].'" value="'.
                $new_option_value.'" id="'.$new_option_value.'"'.$checked.'/><label class="'.$new_option_text.'" for="'.$new_option_value.'">'.$new_option_text.'</label>';
                
              } ?>
          </div>
          <?php } elseif($option_value['type'] == "select_radio") { ?>
          <label><?php echo $option_value['label_name']; ?></label>
            <div id="radio_<?php echo $option_value['id']; ?>" class="radio_ui">
              <?php foreach ($option_value['options'] as $new_option_value => $new_option_text) {
                 
                 $checked = ' ';
                 if (get_option($option_value['id']) == $new_option_text) {
                    $checked = ' checked="checked" ';
                 }
                 else if (get_option($option_value['id']) === FALSE && $option_value['std'] == $new_option_text){
                    $checked = ' checked="checked" ';
                 }
                 else {
                    $checked = ' ';
                 }
                echo '<input type="radio" name="'.$option_value['id'].'" value="'.
                $new_option_text.'" id="'.$new_option_value.'"'.$checked.'/><label class="'.$new_option_text.'" for="'.$new_option_value.'">'.$new_option_text.'</label>';
                
              } ?>
          </div>
          <?php } elseif($option_value['type'] == "textarea") { ?>
          <div style="margin-left: -14px;">
          <label><?php echo $option_value['label_name']; ?></label>
           <textarea rows="8" cols="80" name="<?php echo $option_value['id']; ?>"><?php if ( get_option( $option_value['id'] ) != "") { echo stripslashes(get_option( $option_value['id'] )); } else { echo $option_value['std']; } ?></textarea>
          </div>
          <?php } elseif($option_value['type'] == "text") { ?>
          <div>
          <label><?php echo $option_value['label_name']; ?></label>
          <input id="<?php echo $option_value['id']; ?>" class="margin_ban" maxlength="2" size="2" name="<?php echo $option_value['id']; ?>" type="<?php echo $option_value['type']; ?>" value="<?php if ( get_option( $option_value['id'] ) != "") { echo get_option( $option_value['id'] ); } else { echo $option_value['std']; } ?>" />
          </div>
          <?php } ?>
          </div> 
          <span class="description"><?php echo $option_value['desc']; ?></span>    
          
         <?php } 
         
         else if($option_value['type'] == "banner_details") { // inside banner_details, starts loop to check how many banners there are 
         ?>
              
          <div class="banner_details">
          <?php 
          
           
          foreach ($option_value['options'] as $new_option_value) { 
          
          
          ?>
          

             
             
                                 

                  
          <?php } ?>
         
            
          <?php } ?>
         
        <?php } // end foreach 
        ?>
        
        </div> 
    </fieldset>     
    
    
    <?php
              
            break;
        
        case "text_multi_posts":
            
        ?>
            
        <fieldset>
            <legend><?php echo $value['legend_name']; ?></legend>
           <!-- NM Start first For Each-->
            <?php            
               foreach ( $value['options'] as $option_value ) { // inside the second loop
            ?>
                
              
               <div class="pad_radio">
               
               <?php if($option_value['type'] == "radio") { ?>
		               <label><?php echo $option_value['label_name']; ?></label>
		                <div id="radio_<?php echo $option_value['id']; ?>" class="radio_ui">
		                  <?php foreach ($option_value['options'] as $new_option_value => $new_option_text) {
		                     $checked = ' ';
		                     if (get_option($option_value['id']) == $new_option_value) {
		                        $checked = ' checked="checked" ';
		                     }
		                     else if (get_option($option_value['id']) === FALSE && $option_value['std'] == $new_option_value){
		                        $checked = ' checked="checked" ';
		                     }
		                     else {
		                        $checked = ' ';
		                     }
		                    echo '<input type="radio" name="'.$option_value['id'].'" value="'.
		                    $new_option_value.'" id="'.$new_option_value.'"'.$checked.'/><label class="'.$new_option_text.'" for="'.$new_option_value.'">'.$new_option_text.'</label>';
		                    
		                  } ?>
		              	</div>
              <?php } elseif($option_value['type'] == "select_radio") { ?>
		              <label><?php echo $option_value['label_name']; ?></label>
		                <div id="radio_<?php echo $option_value['id']; ?>" class="radio_ui">
		                  <?php foreach ($option_value['options'] as $new_option_value => $new_option_text) {
		                     
		                     $checked = ' ';
		                     if (get_option($option_value['id']) == $new_option_text) {
		                        $checked = ' checked="checked" ';
		                     }
		                     else if (get_option($option_value['id']) === FALSE && $option_value['std'] == $new_option_text){
		                        $checked = ' checked="checked" ';
		                     }
		                     else {
		                        $checked = ' ';
		                     }
		                    echo '<input type="radio" name="'.$option_value['id'].'" value="'.
		                    $new_option_text.'" id="'.$new_option_value.'"'.$checked.'/><label class="'.$new_option_text.'" for="'.$new_option_value.'">'.$new_option_text.'</label>';
		                    
		                  } ?>
              			</div>
              <?php }  elseif($option_value['type'] == "text") { ?>
			              <div>
			              <label><?php echo $option_value['label_name']; ?></label>
			              <input id="<?php echo $option_value['id']; ?>" class="margin_ban" maxlength="2" size="2" name="<?php echo $option_value['id']; ?>" type="<?php echo $option_value['type']; ?>" value="<?php if ( get_option( $option_value['id'] ) != "") { echo get_option( $option_value['id'] ); } else { echo $option_value['std']; } ?>" />
			              </div>
              <?php } ?>
              
              </div> 
              <span class="description"><?php echo $option_value['desc']; ?></span>    
              
                  
              
             
                
             
            <?php } // end foreach 
            ?>
            
        </fieldset>     
        
    <?php
    
    break;
          
    case "textarea":
            
    ?>
    
    <fieldset>
    <legend><?php echo $value['legend_name']; ?></legend>
    <p>
      <label for="<?php echo $value['id']; ?>"><?php echo $value['label_name']; ?></label>
      <textarea rows="8" cols="80" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea>
    </p>
    <span class="description"><?php echo $value['desc']; ?></span>
    </fieldset>
    
    <?php

    break;
          
    case "radio-homepage":

    ?>
    
    <fieldset>
     <legend><?php echo $value['legend_name']; ?></legend>
   
    <div id="layout-radio">             
     <label><?php echo $value['label_name']; ?></label> 
      <?php foreach ($value['options'] as $option_value => $option_text) {
          $checked = ' ';
          if (get_option($value['id']) == $option_value) {
            $checked = ' checked="checked" ';
          }
          else if (get_option($value['id']) === FALSE && $value['std'] == $option_value){
            $checked = ' checked="checked" ';
          }
          else {
            $checked = ' ';
          }
          echo '<input type="radio" name="'.$value['id'].'" value="'.
            $option_value.'" id="'.$option_value.'"'.$checked.'/><label class="'.$option_value.'" for="'.$option_value.'">'.$option_text.'</label>';
      } ?>
    <span class="description"><?php echo $value['desc']; ?></span>
    <div class="clear"></div>      
    </div>
    </fieldset>
    
    <?php

    break;
    
    case "radio":

    ?>
    
    <fieldset>
     <legend><?php echo $value['legend_name']; ?></legend>
      <div class="pad_radio">
      <label><?php echo $value['label_name']; ?></label>
      <div id="radio_<?php echo $value['id']; ?>" class="radio_ui">
              <?php foreach ($value['options'] as $option_value => $option_text) {
                 $checked = '';
          if (get_option($value['id']) == $option_value) {
            $checked = ' checked="checked" ';
          }
          else if (get_option($value['id']) === FALSE && $value['std'] == $option_value){
            $checked = ' checked="checked" ';
          }
          else {
            $checked = '';
          }
          echo '<input type="radio" name="'.$value['id'].'" value="'.
            $option_value.'" id="'.$option_value.'"'.$checked.'/><label class="'.$option_value.'" for="'.$option_value.'">'.$option_text.'</label>';
      } ?>
          </div>
        </div>
          <span class="description" <?php if($value['id_suffix'] != "short_des") { echo "style='width: 270px; float: right; position: relative; top: -30px; margin-bottom: 0;'"; } ?>><?php echo $value['desc']; ?></span>
    </fieldset>    
    <?php

    break;
    
    case "checkbox":

    ?>
    
    <fieldset>
     <legend><?php echo $value['legend_name']; ?></legend>
     <div class="pad_radio">
      <label><?php echo $value['label_name']; ?></label>
      <div id="checkbox_<?php echo $value['legend_name']; ?>" class="radio_ui">
              <?php foreach ($value['options'] as $option_value) {                
            
                 $current_string = get_option($option_value['id']);
                 $checked = '';
                 if (substr_count($current_string, $option_value['name'])) {
                   $checked = ' checked="checked" ';
                 }
                 else {
                    $checked = ''; 
                 }
                
                echo '<input type="checkbox" name="'.$option_value['id'].'" value="'.
                $option_value['name'].'" id="'.$option_value['name'].'"'.$checked.'/><label class="'.$option_value['name'].'" for="'.$option_value['name'].'" >'.$option_value['label_name'].'</label>';
               } ?>
          </div>
          </div>
          <span class="description" <?php if($value['id_suffix'] != "short_des") { echo "style='width: 270px; float: right; position: relative; top: -30px; margin-bottom: 0;'"; } ?>><?php echo $value['desc']; ?></span>
    </fieldset>    
    <?php

    break;
    
    case "color-picker":

    ?>
    <fieldset>
    <legend><?php echo $value['legend_name']; ?></legend>
   
    <?php 
     foreach ( $value['options'] as $option_value ) {
     ?>
      <div class="color_picker_container">
     <label for="<?php echo $option_value['input_id']?>"><?php echo $option_value['label_name']; ?></label>     
      <span class="small_des">#</span><input type="text" name="<?php echo $option_value['id']; ?>" maxlength="6" size="6" class="colorpickerField" id="<?php echo $option_value['input_id']?>" value="<?php if ( get_option( $option_value['id'] ) != "") { echo get_option( $option_value['id'] ); } else { echo $option_value['std']; } ?>" />
      <div class="colorSelector"><div></div></div> 
      <span class="description"><?php echo $option_value['desc']; ?></span>
      <div style="clear: both;"></div>
    </div>
    <?php 
     }
     ?>  
    
    </fieldset>
    
    <?php
    
     break;
    
    case "dropdown_cat":

    ?>
    <fieldset>
    <legend><?php echo $value['legend_name']; ?></legend>
    <div class="select_cont">
    <label style="margin-left: 20px;" for="<?php echo $value['id']; ?>"><?php echo $value['label_name']; ?></label>
    
    
          <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="margin-left: 0px;">
          
            <option value=""<?php $selected = ''; if (!$selected) { echo ' selected="selected"'; } ?>>&nbsp;</option>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
             
                 if (get_option($value['id']) == $category->cat_name) {
                    $selected = ' selected="selected"';
                 }
                 else if (get_option($value['id']) === FALSE && $value['std'] == $category->cat_name){
                    $selected = ' selected="selected"';
                 }
                 else {
                    $selected = '';
                 } ?>
            <option value="<?php echo $category->cat_name; ?>"<?php echo $selected; ?>><?php echo $category->cat_name; ?></option>         
            <?php
            }
             ?>
          </select>

     </div>
     <span class="description"><?php echo $value['desc']; ?></span>
    </fieldset>
    
    <?php

    break;
               
    case "text_with_upload":

    ?>

    <fieldset>
    <legend><?php echo $value['legend_name']; ?></legend>
            <div class="field">
            <label for="<?php echo "input_field".$value ['id_suffix']; ?>"><?php echo $value['label_name']; ?></label>
            <input id="<?php echo "input_field".$value ['id_suffix']; ?>" name="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
            <span class="upload_buttons">
              <a href="#" id="upload_image<?php echo $value['id_suffix'] ?>" class="upload_button">upload</a>
            </span>
            <span class="description"><?php echo $value['desc']; ?></span>
            </div> 
    </fieldset>
    
    <?php 
    
    break;
          
    case "section":
          
    $i++;
          
    break;
          
    }

  }?>
  
  <input name="save" type="submit" id="button_save" value="Save changes" />    
    <input type="hidden" name="action" value="save" />
</form>
        
        <div id="reset_button"><a href="#"></a></div>
        
        <div class="reset_panel">
          <p>By clicking "YES" you'll turn all of the settings to their default values.</p>
          <p class="ask"><strong>Are you sure?</strong></p>
        <div class="clearfix"></div>
        <form method="post" action="">
          <input name="reset" type="submit" class="button_reset"  value="YES" />
          <input type="hidden" name="action" value="reset" />
          <div class="no_reset"><a href="#">No!</a></div>
        </form>
        </div> 
        <div style="clear: both;"></div>
</div>

<div class="panel_footer">
  <p>Bello Theme - a premium wordpress theme by WeGraphics.net</p>
  <div class="doc"><a href="http://wegraphics.net/demo/item/bello/documentation/">Documentation</a></div>
</div>
</div>
<div style="position: absolute; top: 0; right: 0;">
<?php // wegraphics_site_preview() ?>
</div>


<?php
}

//Hooks the main function

add_action('admin_menu', 'wgcp_add_admin'); ?>