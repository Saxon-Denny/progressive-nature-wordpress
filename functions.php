<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action('init','create_custom_post_type_podcasts');

function create_custom_post_type_podcasts(){
	$labels = array(
		'name' => 'podcasts',
		'singular_name' => 'podcasts',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New podcasts',
		'edit_item' => 'Edit podcasts',
		'new_item' => 'New podcasts',
		'view_item' => 'View podcasts',
		'search_items' => 'Search podcasts',
		'not_found' => 'No events found',
		'not_found_in_trash' => 'No events found in Trash',
		'parent_item_colon' => '',
	);
	
	$args = array(
				'label' => __('podcasts'),
		'labels' => $labels, // from array above
		'public' => true,
		'can_export' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-calendar', // from this list
		'hierarchical' => false,
		'rewrite' => array( "slug" => "audio" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
		'taxonomies' => array( 'podcasts_category', 'post_tag'), // own categories
		'has_archive' => true
	);


	register_post_type('podcasts', $args); // used as internal identifier
}

	
