jQuery(function(){	
	
	// Tabs	
	jQuery('#options').tabs({ 
    fx: { opacity: 'toggle', duration: 300}
	});
	
	jQuery('a.general, a.style, a.seo, a.adv, a.translation').click(function(e){ e.preventDefault(); });

	
	jQuery('#layout-radio').buttonset();
	
	jQuery(".radio_ui").each(function(){
    var current_id = "#" + $(this).attr('id');
    jQuery(current_id).buttonset();
  });
	
	jQuery('#button_save').click(function(e){
	  
	  jQuery('.operation_progress').children().show().addClass('progress');
    
    jQuery('.operation_progress').fadeIn(200);	
	
		var form_options = jQuery('#formElem').serialize();
		
		var save_button = jQuery(this);
					
		e.preventDefault();
		
		
		jQuery.ajax({
			type: "POST",
			url: "themes.php?page=wgcp-core.php",
			data: form_options,
			success: function(){
				jQuery('.operation_progress div').removeClass('progress').addClass('saved').delay(1600).fadeOut(800, function () {
                            jQuery(this).removeClass('saved')
                        }).parent().delay(1900).fadeOut(450);
			}
		});
	});
	
	jQuery('#reset_button a').click(function(e){
		
		e.preventDefault();
		
		if(jQuery('.reset_panel').is(':hidden')){ 
			jQuery('.reset_panel').fadeIn("fast");
		}
		else if (jQuery('.reset_panel').is(':visible')) { 
			jQuery('.reset_panel').fadeOut("fast"); 
		}
	});
	
	jQuery(document).click(function() {
		if (jQuery('.reset_panel').is(':visible')) { 
			jQuery('.reset_panel').fadeOut("fast"); 
		}
	});
	jQuery('.no_reset a').click(function(e) {
	  e.preventDefault();
		if (jQuery('.reset_panel').is(':visible')) { 
			jQuery('.reset_panel').fadeOut("fast"); 
		}
	});
	jQuery('.reset_panel, #reset_button a').click(function(e) { 
		e.stopPropagation(); 
	});

  /*jQuery('.colorSelector').ColorPicker({
      
      onShow: function (colpkr) {
        jQuery(colpkr).fadeIn(500);
        return false;
      },
      onHide: function (colpkr) {
        jQuery(colpkr).fadeOut(500);
        return false;
      },
      onChange: function (hsb, hex, rgb) {
        jQuery('.colorSelector div').css('backgroundColor', '#' + hex);
      },
      onSubmit: function (hsb, hex, rgb, el) {
        jQuery(".colorpickerField_1").val(hex);
        jQuery(el).ColorPickerHide();
      }
    });*/
    
    jQuery('#colorpickerField_1, #colorpickerField_2, #colorpickerField_3, #colorpickerField_4, #colorpickerField_5, #colorpickerField_6, #colorpickerField_7, #colorpickerField_8, #colorpickerField_9, #colorpickerField_10, #colorpickerField_11, #colorpickerField_12, #colorpickerField_13, #colorpickerField_14, #colorpickerField_15, #colorpickerField_16, #colorpickerField_17, #colorpickerField_18, #colorpickerField_19, #colorpickerField_20, #colorpickerField_21, #colorpickerField_22, #colorpickerField_23, #colorpickerField_24, #colorpickerField_25, #colorpickerField_26, #colorpickerField_27, #colorpickerField_28, #colorpickerField_29, #colorpickerField_30').ColorPicker({

      
      onShow: function (colpkr) {
        jQuery(colpkr).fadeIn(550);
        return false;
      },
      
      onHide: function (colpkr) {
        jQuery(colpkr).fadeOut(250);
        return false;
      },
      
      
      onSubmit: function(hsb, hex, rgb, el) {
        jQuery(el).val(hex);
        jQuery(el).ColorPickerHide();
      },
      
      onBeforeShow: function () {
        jQuery(this).ColorPickerSetColor(this.value);
      }

}).bind('keyup', function(){
  jQuery(this).ColorPickerSetColor(this.value);
});

$('.banner_block a').click(function (e){
  
  e.preventDefault();
  var current_id = "#" + $(this).parent().parent().prev().attr('id');
  $(current_id).fadeIn('fast');
    
  
});

$('.modify_button').click(function (e){
  
  e.preventDefault();
  $('.banner_form').fadeOut('fast');
    
  
});
	
});