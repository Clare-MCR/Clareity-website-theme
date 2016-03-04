<?php

/*
Theme Name: Bello
Theme URI: http://wegraphics.net
Description: A powerful WordPress theme with beautiful built-in portfolios and styled galleries.
Author: Nathan Brown & Natalie Hipp | WeGraphics
Author URI: http://wegraphics.net
Version: 1.0
Tags: black, white, two-columns, fixed-width, custom-header, custom-background, threaded-comments, sticky-post, translation-ready, microformats, rtl-language-support, editor-style, custom-menu, styled galleries, portfolios, custom post type, custom taxonomy, custom styles

License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
/*********************************************************************/
/*	WGCP Variables setup	*/


$theme_data = get_theme_data(TEMPLATEPATH .  '/style.css');
$themename = $theme_data['Title'];
$shortname = "wgcp";
load_theme_textdomain('webello', get_template_directory().'/languages');

/*	Functions, Shortcodes, Widgets inclusion	*/

if ( ! isset( $content_width ) )
    	$content_width = 650;

require_once(TEMPLATEPATH . '/wg-includes/functions/wg-seo-functions.php');
require_once(TEMPLATEPATH . '/wg-includes/functions/wg-meta-box.php');
require_once(TEMPLATEPATH . '/wg-includes/functions/wg-custom-type-portfolio.php');
require_once(TEMPLATEPATH . '/wg-includes/functions/wg-custom-functions.php');
require_once(TEMPLATEPATH . '/wg-includes/widgets/wg-twitter-widget.php');
require_once(TEMPLATEPATH . '/wg-includes/widgets/wg-portfolio-widget.php');


/*	WGCP	*/


require_once(TEMPLATEPATH . '/wg-panel/wgcp-options.php');
require_once(TEMPLATEPATH . '/wg-panel/wgcp-core.php');



if ( function_exists( 'add_theme_support' ) ) {
// Add Featured Image Support
  add_theme_support( 'post-thumbnails' );
}
if ( function_exists( 'add_image_size' ) ) {
// Custom Homepage Thumbnail
	add_image_size( 'full-width', 695 ); //
	add_image_size( 'eventspic', 100 ); //
}

add_filter('walker_nav_menu_start_el', 'description_in_nav_el', 10, 4);
function description_in_nav_el($item_output, $item, $depth, $args)
{
	return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<span>{$item->attr_title}</span><", $item_output);
}

// Next/Previous Links

function wg_previous_posts_link($label = '', $pre = '', $post = '') {
	ob_start();
	previous_posts_link($label);
	$buffer = ob_get_contents();
	ob_end_clean();
	if(!empty($buffer)) echo $pre,$buffer,$post;
}

function wg_next_posts_link($label = '', $pre = '', $post = '') {
	ob_start();
	next_posts_link($label);
	$buffer = ob_get_contents();
	ob_end_clean();
	if(!empty($buffer)) echo $pre,$buffer,$post;
}

//
function webello_close_banner_cookie() {
	if (!isset($_COOKIE['webello_close_banner'])) {
	    setcookie('webello_close_banner', 1, time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);
	}
}
add_action('init', 'webello_close_banner_cookie');

// Admin Bar Manipulation

function webello_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu(array(
		'parent' => 'appearance',
		'id' => 'wgcp-core',
		'title' => 'Bello Options',
		'href' => admin_url('themes.php?page=wgcp-core.php'),
		'meta' => false
	));
}
add_action( 'wp_before_admin_bar_render', 'webello_admin_bar_render' );

function exclude_single_posts ( $dfi_id, $post_id ) {
	// don't trigger on pages
	if( is_page() ) {
		return 0; // invalid id means no image
	}
	return $dfi_id; // the original featured image id
}
add_filter( 'dfi_thumbnail_id', 'exclude_single_posts', 10, 2 );

add_action( 'wpcf7_init', 'custom_add_shortcode_datalist' );
function custom_add_shortcode_datalist() {
    wpcf7_add_shortcode( 'datalist', 'custom_datalist_shortcode_handler', true );
}
function custom_datalist_shortcode_handler( $tag ) {
    $tag = new WPCF7_Shortcode( $tag );

    $atts = array(
        'type' => 'text',
        'name' => $tag->name,
        'list' => $tag->name . '-options' );

    $input = sprintf(
        '<input %s />',
        wpcf7_format_atts( $atts ) );

    $datalist = '';

    foreach ( $tag->values as $val ) {
        $datalist .= sprintf( '<option>%s</option>', esc_html( $val ) );
    }

    $datalist = sprintf(
        '<datalist id="%1$s">%2$s</datalist>',
        $tag->name . '-options',
        $datalist );

    return $input . $datalist;
}



?>

 <?php if ( ! defined( 'ABSPATH' ) ) exit;
function ninja_forms_register_field_datalist(){
	$args = array(
		'name'          => __( 'DataList', 'ninja-forms' ),
		'edit_function' => 'ninja_forms_field_datalist_edit',
		'edit_options'  => array(
			array(
				'type' => 'hidden',
				'name' => 'user_info_field_group',
			),
		),
		'edit_settings' => array(
			'advanced' => array(
				array(
					'type'  => 'checkbox',
					'name'  => 'user_state',
					'label' => __( 'This is the user\'s state', 'ninja-forms' ),
				),
			),
		),
		'display_function' => 'ninja_forms_field_datalist_display',
		'group' => 'standard_fields',
		'edit_label' => true,
		'edit_label_pos' => true,
		'edit_req' => true,
		'edit_custom_class' => true,
		'edit_help' => true,
		'edit_desc' => true,
		'edit_meta' => false,
		'sidebar' => 'template_fields',
		'edit_conditional' => true,
		'conditional' => array(
			'action' => array(
				'show' => array(
					'name'        => __( 'Show This', 'ninja-forms' ),
					'js_function' => 'show',
					'output'      => 'hide',
				),
				'hide' => array(
					'name'        => __( 'Hide This', 'ninja-forms' ),
					'js_function' => 'hide',
					'output'      => 'hide',
				),
				'change_value' => array(
					'name'        => __( 'Selected Value', 'ninja-forms' ),
					'js_function' => 'change_value',
					'output'      => 'list',
				),
				'add_value' => array(
					'name'        => __( 'Add Value', 'ninja-forms' ),
					'js_function' => 'add_value',
					'output'      => 'ninja_forms_field_list_add_value',
				),
				'remove_value' => array(
					'name'        => __( 'Remove Value', 'ninja-forms' ),
					'js_function' => 'remove_value',
					'output'      => 'list',
				),
			),
			'value' => array(
				'type' => 'list',
			),
		),
		'edit_sub_value' => 'nf_field_datalist_edit_sub_value',
		'sub_table_value' => 'nf_field_datalist_sub_table_value',
	);

	ninja_forms_register_field('_datalist', $args);
	add_filter( 'ninja_forms_field_wrap_class', 'ninja_forms_field_filter_datalist_wrap_class', 10, 2 );
	add_action('ninja_forms_display_after_opening_field_wrap', 'ninja_forms_display_datalist_type', 10, 2);
}

add_action('init', 'ninja_forms_register_field_datalist');

function ninja_forms_display_datalist_type( $field_id, $data ){
	$field_row = ninja_forms_get_field_by_id( $field_id );
	$field_type = $field_row['type'];
	if( $field_type == '_list' ){
		if ( isset( $data['list_type'] ) ){
			$list_type = $data['list_type'];
		} else{
			$list_type = '';
		}

		?>
		<input type="hidden" id="ninja_forms_field_<?php echo $field_id;?>_list_type" value="<?php echo $list_type;?>">
		<?php
	}
}

function ninja_forms_field_datalist_add_value( $field_id, $x, $conditional, $name, $id, $current = '', $field_data = '' ){
	$current_value = isset( $current['value']['value'] ) ? $current['value']['value'] : '';
	$current_label = isset( $current['value']['label'] ) ? $current['value']['label'] : '';
	$current_calc = isset ( $current['value']['calc'] ) ? $current['value']['calc'] : '';

	$list_show_value = isset( $field_data['list_show_value'] ) ? $field_data['list_show_value'] : '';

	_e( 'Label', 'ninja-forms' );
	?>
	<input type="text" name="<?php echo $name;?>[label]" id="<?php echo $id;?>" class="" value="<?php echo $current_label;?>">
	<?php
	if( $list_show_value == 1 ){
		_e( 'Value', 'ninja-forms' );
		?>
		<input type="text" name="<?php echo $name;?>[value]" id="<?php echo $id;?>" class="ninja-forms-field-<?php echo $field_id;?>-list-option-value" value="<?php echo $current_value;?>">
		<?php
	}else{
		?>
		<input type="hidden" name="<?php echo $name;?>[value]" value="_ninja_forms_no_value">
		<?php
	}
	_e( 'Calc', 'ninja-forms' );
	?>
	<input type="text" name="<?php echo $name;?>[calc]" id="<?php echo $id;?>" class="" value="<?php echo $current_calc;?>">
	<?php

}

function ninja_forms_field_datalist_edit( $field_id, $data ) {
	global $wpdb;

	$list_type = isset( $data['list_type'] ) ? $data['list_type'] : '';
	$hidden = isset( $data['list_show_value'] ) ? $data['list_show_value'] : 0;
	$multi_size = isset( $data['multi_size'] ) ? $data['multi_size'] : 5;
	$default_options = array(
		array( 'label' => 'Option 1', 'value' => '', 'calc' => '', 'selected' => 0 ),
		array( 'label' => 'Option 2', 'value' => '', 'calc' => '', 'selected' => 0 ),
		array( 'label' => 'Option 3', 'value' => '', 'calc' => '', 'selected' => 0 ),
	);

	$list_options = isset ( $data['list']['options'] ) ? $data['list']['options'] : $default_options;

	$list_type_options = array(
		array('name' => __( 'Datalist', 'ninja-forms' ), 'value' => 'datalist'),
	);

	ninja_forms_edit_field_el_output( $field_id, 'select', __( 'List Type', 'ninja-forms' ), 'list_type', $list_type, 'wide', $list_type_options, 'widefat' );

	?>

	<p id="ninja_forms_field_<?php echo $field_id;?>_multi_size_p" class="description description-wide" style="<?php if($list_type != 'multi'){ echo 'display:none;';}?>">
		<?php _e( 'Multi-Select Box Size', 'ninja-forms' );?>: <input type="text" id="" name="ninja_forms_field_<?php echo $field_id;?>[multi_size]" value="<?php echo $multi_size;?>">
	</p>
	<span id="ninja_forms_field_<?php echo $field_id;?>_list_span" class="ninja-forms-list-span">
		<!-- <p class="description description-wide"> -->
			<a href="#" id="ninja_forms_field_<?php echo $field_id;?>_list_add_option" class="ninja-forms-field-add-list-option button-secondary"><?php _e( 'Add New', 'ninja-forms' );?></a>
			<a href="#TB_inline?width=640&height=530&inlineId=ninja_forms_field_<?php echo $field_id;?>_import_options_div" class="thickbox button-secondary" title="<?php _e( 'Import List Items', 'ninja-forms' ); ?>" id=""><?php _e( 'Import List Items', 'ninja-forms' );?></a>
		<!-- </p> -->

		<p class="description description-wide">
			<input type="hidden" id="" name="ninja_forms_field_<?php echo $field_id;?>[list_show_value]" value="0">
			<label for="ninja_forms_field_<?php echo $field_id;?>_list_show_value"><input type="checkbox" value="1" id="ninja_forms_field_<?php echo $field_id;?>_list_show_value" name="ninja_forms_field_<?php echo $field_id;?>[list_show_value]" class="ninja-forms-field-list-show-value" <?php if(isset($data['list_show_value']) AND $data['list_show_value'] == 1){ echo "checked='checked'";}?>>
			<?php _e( 'Show list item values', 'ninja-forms' );?> </label>
		</p>
		<div id="ninja_forms_field_<?php echo $field_id;?>_list_options" class="ninja-forms-field-list-options description description-wide">
			<input type="hidden" name="ninja_forms_field_<?php echo $field_id;?>[list][options]" value="">
			<?php
			if( isset( $list_options ) AND is_array( $list_options ) AND $list_options != '' ){
				$x = 0;
				foreach( $list_options as $option ) {
					ninja_forms_field_list_option_output( $field_id, $x, $option, $hidden );
					$x++;
				}
			}
			?>

		</div>
	</span>
	<?php add_thickbox(); ?>
		<div id="ninja_forms_field_<?php echo $field_id;?>_import_options_div" style="display:none;">
			<textarea id="test" class="list-import-textarea"></textarea>
			<input type="button" class="save-list-import button-secondary" value="<?php _e( 'Import', 'ninja-forms' ); ?>" rel="<?php echo $field_id;?>">
			<input type="button" class="cancel-list-import button-secondary" value="<?php _e( 'Cancel', 'ninja-forms' ); ?>">
			<p><?php _e( 'To use this feature, you can paste your CSV into the textarea above.', 'ninja-forms' );?></p>
			<p><?php _e( 'The format should look like the following:', 'ninja-forms' );?></p>
<pre>
<?php
$example1 = _x( 'Label,Value,Calc', 'Example for list importing. Leave puncation in place.', 'ninja-forms' );
echo $example1;
echo '<br />';
echo $example1;
echo '<br />';
echo $example1;
?>
</pre>

			<p><?php _e( "If you want to send an empty value or calc, you should use '' for those.", 'ninja-forms' );?></p>
<pre>
<?php
$example2 = __( 'Label', 'ninja-forms' ) . ",'',''";
echo $example2;
echo '<br />';
echo $example2;
echo '<br />';
echo $example2;
?>
</pre>


		</div>
	<?php
}

function ninja_forms_field_datalist_display( $field_id, $data, $form_id = '' ){
	global $wpdb, $ninja_forms_fields;

	if(isset($data['show_field'])){
		$show_field = $data['show_field'];
	}else{
		$show_field = true;
	}

	$field_class = ninja_forms_get_field_class( $field_id, $form_id );
	$field_row = ninja_forms_get_field_by_id($field_id);

	$type = $field_row['type'];
	$type_name = $ninja_forms_fields[$type]['name'];

	if ( isset( $data['list_type'] ) ) {
		$list_type = $data['list_type'];
	} else {
		$list_type = '';
	}

	if(isset($data['list_show_value'])){
		$list_show_value = $data['list_show_value'];
	}else{
		$list_show_value = 0;
	}

	if( isset( $data['list']['options'] ) AND $data['list']['options'] != '' ){
		$options = $data['list']['options'];
	}else{
		$options = array();
	}

	if(isset($data['label_pos'])){
		$label_pos = $data['label_pos'];
	}else{
		$label_pos = 'left';
	}

	if(isset($data['label'])){
		$label = $data['label'];
	}else{
		$label = $type_name;
	}

	if( isset( $data['multi_size'] ) ){
		$multi_size = $data['multi_size'];
	}else{
		$multi_size = 5;
	}

	if( isset( $data['default_value'] ) AND !empty( $data['default_value'] ) ){
		$selected_value = $data['default_value'];
	}else{
		$selected_value = '';
	}

	$list_options_span_class = apply_filters( 'ninja_forms_display_list_options_span_class', '', $field_id );

	switch($list_type){
		case 'dropdown':
			break;
		case 'datalist':
			?>
			<input type="text" name="ninja_forms_field_<?php echo $field_id;?>" id="ninja_forms_field_<?php echo $field_id;?>" class="<?php echo $field_class;?>" rel="<?php echo $field_id;?>" list="list_<?php echo $field_id;?>">
			<datalist id="list_<?php echo $field_id;?>">
				<?php
				if($label_pos == 'inside'){
					?>
					<option value=""><?php echo $label;?></option>
					<?php
				}
				foreach($options as $option){

					if(isset($option['value'])){
						$value = $option['value'];
					}else{
						$value = $option['label'];
					}

					$value = htmlspecialchars( $value, ENT_QUOTES );

					if(isset($option['label'])){
						$label = $option['label'];
					}else{
						$label = '';
					}

					if(isset($option['display_style'])){
						$display_style = $option['display_style'];
					}else{
						$display_style = '';
					}

					if ( isset( $option['disabled'] ) AND $option['disabled'] ){
						$disabled = 'disabled';
					}else{
						$disabled = '';
					}

					$label = htmlspecialchars( $label, ENT_QUOTES );

					$label = stripslashes( $label );

					$label = str_replace( '&amp;', '&', $label );

					$field_label = $data['label'];

					if($list_show_value == 0){
						$value = $label;
					}


					if ( $selected_value == $value OR ( is_array( $selected_value ) AND in_array( $value, $selected_value ) ) ) {
						$selected = 'selected';
					}else if( ( $selected_value == '' OR $selected_value == $field_label ) AND isset( $option['selected'] ) AND $option['selected'] == 1 ){
						$selected = 'selected';
					}else{
						$selected = '';
					}

					?>
					<option value="<?php echo $value;?>" <?php echo $selected;?> style="<?php echo $display_style;?>" <?php echo $disabled;?>><?php echo $label;?></option>
				<?php
				}
				?>
			</datalist>
			<?php
			break;
		case 'radio':
			break;
	}
}

function ninja_forms_field_datalist_option_output($field_id, $x, $option = '', $hidden = ''){
	if($hidden == 1){
		$hidden = '';
	}else{
		$hidden = 'display:none';
	}
	if(is_array($option)){
		$label = htmlspecialchars( $option['label'] );
		$label = str_replace( '&amp;', '&', $label );
		$value = htmlspecialchars( $option['value'] );
		$value = str_replace( '&amp;', '&', $value );
		if ( isset ( $option['calc'] ) ) {
			$calc = $option['calc'];
		} else {
			$calc = '';
		}
		if( isset( $option['selected'] ) ){
			$selected = $option['selected'];
		}else{
			$selected = '';
		}
		$hide = '';
	}else{
		$label = '';
		$value = '';
		$selected = '';
		$calc = '';
		$hide = 'style="display:none;"';
	}
	if($selected == 1){
		$selected = "checked='checked'";
	}

	?>
	<div id="ninja_forms_field_<?php echo $field_id;?>_list_option_<?php echo $x;?>" class="ninja-forms-field-<?php echo $field_id;?>-list-option ninja-forms-field-list-option" <?php echo $hide;?> data-field="<?php echo $field_id; ?>">
		<table class="list-options">
			<tr>
				<td class="ninja-forms-delete-list-option-td">
					<a href="#" id="ninja_forms_field_<?php echo $field_id;?>_list_remove_option" class="nf-remove-list-option"><span class="dashicons dashicons-dismiss"></span></a>
				</td>
				<td class="ninja-forms-list-option-label-td">
					<?php _e( 'Label', 'ninja-forms' );?>: <input type="text" name="ninja_forms_field_<?php echo $field_id;?>[list][options][<?php echo $x;?>][label]" id="ninja_forms_field_<?php echo $field_id;?>_list_option_label" class="ninja-forms-field-list-option-label" value="<?php echo $label;?>">
				</td>
				<td class="ninja-forms-list-option-value-td">
					<span id="ninja_forms_field_<?php echo $field_id;?>_list_option_<?php echo $x;?>_value_span" name="" class="ninja-forms-field-<?php echo $field_id;?>-list-option-value" style="<?php echo $hidden;?>"><?php _e( 'Value', 'ninja-forms' );?>: <input type="text" name="ninja_forms_field_<?php echo $field_id;?>[list][options][<?php echo $x;?>][value]" id="ninja_forms_field_<?php echo $field_id;?>_list_option_value" class="ninja-forms-field-list-option-value" value="<?php echo $value;?>"></span>
				</td>
				<td class="ninja-forms-list-option-calc-td">
					<?php _ex( 'Calc', 'Short for calculation', 'ninja-forms' );?>: <input type="text" name="ninja_forms_field_<?php echo $field_id;?>[list][options][<?php echo $x;?>][calc]" id="ninja_forms_field_<?php echo $field_id;?>_list_option_calc" class="ninja-forms-field-list-option-calc" value="<?php echo $calc;?>">
				</td>
				<td class="ninja-forms-list-option-selected-td">
					<label for="ninja_forms_field_<?php echo $field_id;?>_options_<?php echo $x;?>_selected"><?php _e( 'Selected', 'ninja-forms' );?> <input type="hidden" value="0" name="ninja_forms_field_<?php echo $field_id;?>[list][options][<?php echo $x;?>][selected]"><input type="checkbox" value="1" name="ninja_forms_field_<?php echo $field_id;?>[list][options][<?php echo $x;?>][selected]" id="ninja_forms_field_<?php echo $field_id;?>_options_<?php echo $x;?>_selected" class="ninja-forms-field-list-option-selected" <?php echo $selected;?>></label>
				</td>
				<td class="ninja-forms-list-option-drag-td">
					<span class="ninja-forms-drag"><span class="dashicons dashicons-menu"></span></span>
				</td>
			</tr>
		</table>
		</div>

	<?php
}

function ninja_forms_field_filter_datalist_wrap_class( $field_wrap_class, $field_id ){
	$field_row = ninja_forms_get_field_by_id( $field_id );
	$field_type = $field_row['type'];
	if( $field_type == '_list' ){
		$field_data = $field_row['data'];
		if( isset( $field_data['list_type'] ) ){
			$list_type = $field_data['list_type'];
		}else{
			$list_type = '';
		}

		$field_wrap_class = str_replace( 'list-wrap', 'list-'.$list_type.'-wrap', $field_wrap_class );
	}

	return $field_wrap_class;
}

// Add a filter to change the current field_value to the "selected" list elements on form load, if any exist.
function ninja_forms_field_filter_datalist_data( $form_id ){
	global $ninja_forms_loading, $ninja_forms_processing;

	if ( isset ( $ninja_forms_loading ) ) {
		$all_fields = $ninja_forms_loading->get_all_fields();
	} else {
		return false;
	}

	// Make sure we have some fields before displaying them!
	if ( ! $all_fields ) {
		return;
	}

	// Loop through all of our fields and see if we have any list fields.

	foreach( $all_fields as $field_id => $user_value ) {
		$tmp_array = array();
		if ( isset ( $ninja_forms_loading ) ) {
			$field = $ninja_forms_loading->get_field_settings( $field_id );
		} else {
			// $field = $ninja_forms_processing->get_field_settings( $field_id );
		}

		$field_type = $field['type'];
		$data = $field['data'];
		// Check to see if we are working with a list. If so, filter the default_value
		if( $field_type == '_list' && empty( $user_value ) ){
			if( isset( $data['list']['options'] ) AND is_array( $data['list']['options'] ) AND !empty( $data['list']['options'] ) ){
				foreach( $data['list']['options'] as $option ){
					if( isset( $option['selected'] ) AND $option['selected'] == 1 ){
						if( isset( $data['list_show_value'] ) AND $data['list_show_value'] == 1 ){
							$tmp_array[] = $option['value'];
						}else{
							$tmp_array[] = $option['label'];
						}
					}
				}
				if ( empty( $tmp_array ) AND $data['list_type'] == 'dropdown' AND $data['label_pos'] != 'inside' ) {
					if ( isset ( $data['list_show_value'] ) AND $data['list_show_value'] == 1 AND $data['label_pos'] != 'inside' ) {
						$tmp_array[] = $data['list']['options'][0]['value'];
					} else {
						$tmp_array[] = $data['list']['options'][0]['label'];
					}
				}
			}
			if ( isset ( $ninja_forms_loading ) ) {
				if ( $ninja_forms_loading->get_field_settings( $field_id ) ) {
					$ninja_forms_loading->update_field_value( $field_id, $tmp_array );
				}
			} else {
				// if ( !$ninja_forms_processing->get_field_value( $field_id ) ) {
				// 	$ninja_forms_processing->update_field_value( $field_id, $tmp_array );
				// }
			}
		}
	}
}

add_action( 'ninja_forms_display_pre_init', 'ninja_forms_field_filter_list_data', 8 );

/**
 * Edit submission value output function
 *
 * @since 2.7
 * @return void
 */
function nf_field_datalist_edit_sub_value( $field_id, $user_value, $field ) {
	$label = $field['data']['label'];
	$label_pos = $field['data']['label_pos'];
	$selected_value = $user_value;
	$options = $field['data']['list']['options'];

	$field_class = isset( $field['data']['class'] ) ? $field['data']['class'] : '';

	if( isset( $field['data']['list_show_value'] ) ){
		$list_show_value = $field['data']['list_show_value'];
	}else{
		$list_show_value = 0;
	}
	switch( $field['data']['list_type'] ) {
		case 'datalist':
			?>
			<select name="fields[<?php echo $field_id; ?>]" id="ninja_forms_field_<?php echo $field_id;?>" class="<?php echo $field_class;?>" rel="<?php echo $field_id;?>">
				<?php
				if($label_pos == 'inside'){
					?>
					<option value=""><?php echo $label;?></option>
					<?php
				}
				foreach( $options as $option ){

					if(isset($option['value'])){
						$value = $option['value'];
					}else{
						$value = $option['label'];
					}

					$value = htmlspecialchars( $value, ENT_QUOTES );

					if(isset($option['label'])){
						$label = $option['label'];
					}else{
						$label = '';
					}

					if(isset($option['display_style'])){
						$display_style = $option['display_style'];
					}else{
						$display_style = '';
					}

					if ( isset( $option['disabled'] ) AND $option['disabled'] ){
						$disabled = 'disabled';
					}else{
						$disabled = '';
					}

					$label = htmlspecialchars( $label, ENT_QUOTES );

					$label = stripslashes( $label );

					$label = str_replace( '&amp;', '&', $label );

					$field_label = $data['label'];

					if($list_show_value == 0){
						$value = $label;
					}

					if ( $selected_value == $value OR ( is_array( $selected_value ) AND in_array( $value, $selected_value ) ) ) {
						$selected = 'selected';
					}else if( ( $selected_value == '' OR $selected_value == $field_label ) AND isset( $option['selected'] ) AND $option['selected'] == 1 ){
						$selected = 'selected';
					}else{
						$selected = '';
					}

					?>
					<option value="<?php echo $value;?>" <?php echo $selected;?> style="<?php echo $display_style;?>" <?php echo $disabled;?>><?php echo $label;?></option>
				<?php
				}
				?>
			</select>
			<?php
			break;
		case 'radio':
			break;
	}
}

/**
 * Output our user value on the sub table
 *
 * @since 2.7
 * @return void
 */
function nf_field_datalist_sub_table_value( $field_id, $user_value ) {
	if ( is_array ( $user_value ) ) {
		echo '<ul>';
		$max_items = apply_filters( 'nf_sub_table_user_value_max_items', 3, $field_id );
		$x = 0;

		while ( $x < $max_items && $x <= count( $user_value ) - 1 ) {
			echo '<li>' . $user_value[$x] . '</li>';
			$x++;
		}
		echo '</ul>';
	} else {
		$max_len = apply_filters( 'nf_sub_table_user_value_max_len', 140, $field_id );
		if ( strlen( $user_value ) > 140 )
			$user_value = substr( $user_value, 0, 140 );

		echo nl2br( $user_value );
	}
}
?>
