<?php

/**
 *	Add meta box for a custom SEO optimization
 * 	
 */

// create meta box array 
$post_meta_box_seo = array(
	'id' => 'seo_description_meta_box',
	'title' => 'SEO Optimization',
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(
		array(
			'name' => 'Meta description',
			'desc' => 'Here you can add a custom description for SEO purposes, remember that most search engines use a maximum of 160 chars for the description.',
			'id' => '_meta_description',
			'type' => 'textarea',
			'std' => ''
		),
		array(
			'name' => 'Meta keywords',
			'desc' => 'Here you can add custom keywords (separated by commas) for SEO purposes <em>(e.g.: design, culture, football)</em>',
			'id' => '_meta_keywords',
			'type' => 'text',
			'std' => ''
		)
	)
);

// Add meta box
function wegraphics_add_box() {

	global $post_meta_box_seo;	
	add_meta_box($post_meta_box_seo['id'], $post_meta_box_seo['title'], 'wegraphics_show_box', $post_meta_box_seo['page'], $post_meta_box_seo['context'], $post_meta_box_seo['priority']);
}

add_action('admin_menu', 'wegraphics_add_box');

// Callback function to show fields in meta box
function wegraphics_show_box() {

	global $post_meta_box_seo, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="wegraphics_post_meta_box_seo_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<div class="form-table" style="padding: 0 15px 25px 15px;">';

	foreach ($post_meta_box_seo['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		echo '<div>',
				'<div style="font-weight: bold; margin: 18px 0 5px 0;"><label for="', $field['id'], '">', $field['name'], '</label></div>', '<div style="margin-bottom: 8px; padding: 0 30px 0 0;">', $field['desc'], '</div>';
				'<div>';
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:95%" />';
				break;
			case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:95%">', $meta ? $meta : $field['std'], '</textarea>';
				break;
		}
		echo
			'</div>';
	}
	
	echo '</div>';
}

// Save data from meta box
function wegraphics_save_data($post_id) {

	global $post_meta_box_seo;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['wegraphics_post_meta_box_seo_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($post_meta_box_seo['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}

add_action('save_post', 'wegraphics_save_data');



?>