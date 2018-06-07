<?php

/**
 * _s-child_theme functions and definitions
 *
 * This is the functions.php file for child theme for _s, all the functions & definitions for this theme are declared here.
 *
 * @link https://github.com/parth-gohil/_s-child_theme
 *
 * @package _s-child_theme
 * @since 0.0.1
 */
if (!function_exists('_s_child_theme_task_register')) {

// Register Custom Post Type
	/**
	 * Summary.
	 *
	 * Description.
	 *
	 * @since x.x.x
	 *
	 * @see Function/method/class relied on
	 * @link URL
	 * @global type $varname Description.
	 * @global type $varname Description.
	 *
	 * @param type $var Description.
	 * @param type $var Optional. Description. Default.
	 * @return type Description.
	 */
	function _s_child_theme_task_register() {

		$labels = array(
			'name' => _x('Tasks', 'Post Type General Name', 'text_domain'),
			'singular_name' => _x('Task', 'Post Type Singular Name', 'text_domain'),
			'menu_name' => __('Task', 'text_domain'),
			'name_admin_bar' => __('Task', 'text_domain'),
			'archives' => __('Task Archives', 'text_domain'),
			'attributes' => __('Task Attributes', 'text_domain'),
			'parent_item_colon' => __('Parent Task:', 'text_domain'),
			'all_items' => __('All Tasks', 'text_domain'),
			'add_new_item' => __('Add New Task', 'text_domain'),
			'add_new' => __('Add New', 'text_domain'),
			'new_item' => __('New Task', 'text_domain'),
			'edit_item' => __('Edit Task', 'text_domain'),
			'update_item' => __('Update Task', 'text_domain'),
			'view_item' => __('View Task', 'text_domain'),
			'view_items' => __('View Task', 'text_domain'),
			'search_items' => __('Search Task', 'text_domain'),
			'not_found' => __('Not found', 'text_domain'),
			'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
			'featured_image' => __('Featured Image', 'text_domain'),
			'set_featured_image' => __('Set featured image', 'text_domain'),
			'remove_featured_image' => __('Remove featured image', 'text_domain'),
			'use_featured_image' => __('Use as featured image', 'text_domain'),
			'insert_into_item' => __('Insert into Task', 'text_domain'),
			'uploaded_to_this_item' => __('Uploaded to this Task', 'text_domain'),
			'items_list' => __('Tasks list', 'text_domain'),
			'items_list_navigation' => __('Tasks list navigation', 'text_domain'),
			'filter_items_list' => __('Filter items Task', 'text_domain'),
		);
		$args = array(
			'label' => __('Task', 'text_domain'),
			'labels' => $labels,
			'supports' => array('title', 'editor'),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'page',
		);
		register_post_type('task', $args);
	}

	add_action('init', '_s_child_theme_task_register', 0);
}
/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
    add_meta_box( 'meta-box-id', __( 'My Meta Box', 'textdomain' ), 'wpdocs_my_display_callback', 'task' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $task Current post object.
 */
function wpdocs_my_display_callback( $task ) {
    // Display code/markup goes here. Don't forget to include nonces!
	?>
	<input type="checkbox" name="_s_child_theme_task_status" id="_s_child_theme_task_status">
		<label for="_s_child_theme_task_status"><h1>Task Title</h1></label>
	<?php
}

/**
 * Save meta box content.
 *
 * @param int $task_id Post ID
 */
function wpdocs_save_meta_box( $task_id ) {
    // Save logic goes here. Don't forget to include nonce checks!
}
add_action( 'save_post', 'wpdocs_save_meta_box' );