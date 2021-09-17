<?php
/**
 * Cafe post type.
 *
 * @package Mm
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Create custom post type.
 * post_type: cafe
 */
function mm_create_cafe_cpt() {
	$labels = array(
		'name'           => esc_html_x( 'Cafe', 'Post Type General Name', 'mm' ),
		'singular_name'  => esc_html_x( 'Cafe', 'Post Type Singular Name', 'mm' ),
		'menu_name'      => esc_html_x( 'Cafe', 'Admin Menu text', 'mm' ),
		'name_admin_bar' => esc_html_x( 'Recipe', 'Add New on Toolbar', 'mm' ),
		'view_items'     => esc_html__( 'View Cafe', 'mm' ),
		'not_found'      => esc_html__( 'No Recipe Found', 'mm' ),
	);

	$args = array(
		'label'               => esc_html__( 'Cafe', 'cafe' ),
		'description'         => '',
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-beer',
		'supports'            => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
		'taxonomies'          => array( 'recipes' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'hierarchical'        => true,
		'exclude_from_search' => false,
		'show_in_rest'        => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	register_post_type( 'cafe', $args );
}

add_action( 'init', 'mm_create_cafe_cpt' );

/**
 * Create custom taxonomy.
 * taxonomy: recipes
 */
function mm_create_recipes_custom_taxonomy() {
	$labels = array(
		'name'              => esc_html_x( 'Categories', 'taxonomy general name', 'mm' ),
		'singular_name'     => esc_html_x( 'Category', 'taxonomy singular name', 'mm' ),
		'search_items'      => esc_html__( 'Search Categories', 'mm' ),
		'all_items'         => esc_html__( 'All Categories', 'mm' ),
		'parent_item'       => esc_html__( 'Parent Category', 'mm' ),
		'parent_item_colon' => esc_html__( 'Parent Category:', 'mm' ),
		'edit_item'         => esc_html__( 'Edit Category', 'mm' ),
		'update_item'       => esc_html__( 'Update Category', 'mm' ),
		'add_new_item'      => esc_html__( 'Add New Category', 'mm' ),
		'new_item_name'     => esc_html__( 'New Category Name', 'mm' ),
		'menu_name'         => esc_html__( 'Categories', 'mm' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'recipes' ),
	);

	register_taxonomy( 'recipes', array( 'cafe' ), $args );
}

add_action( 'init', 'mm_create_recipes_custom_taxonomy' );
