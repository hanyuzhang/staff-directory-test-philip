<?php
/**
 * hanson functions and definitions
 *
 */
register_nav_menus( array(
	'primary' => esc_html__( 'Primary Menu', 'cube' ),
) );
function cube_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cube' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cube_widgets_init' );
function cube_scripts() {
	wp_enqueue_style( 'cube-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'cube_scripts' );
add_theme_support( 'post-thumbnails' );
/**
 * Disable the auto generated email sent to the admin after a core update
 */
apply_filters( 'auto_core_update_send_email', false, $type, $core_update, $result );

/**

 * Disable the auto generated email sent to the admin after a core update

 */

apply_filters( 'auto_core_update_send_email', false, $type, $core_update, $result );

// function remove_editor() {
//   remove_post_type_support('page', 'editor');
//   remove_post_type_support('post', 'editor');
//   remove_post_type_support('page', 'custom-fields');
//   remove_post_type_support('post', 'custom-fields');
//   remove_post_type_support('page', 'revisions');
//   remove_post_type_support('post', 'revisions');
//   remove_post_type_support('page', 'author');
//   remove_post_type_support('post', 'author');
//   remove_post_type_support('page', 'comments');
//   remove_post_type_support('post', 'comments');
//   remove_post_type_support('page', 'trackbacks');
//   remove_post_type_support('post', 'trackbacks');
// }
// add_action('admin_init', 'remove_editor');

add_action( 'add_meta_boxes', 'my_remove_post_meta_boxes' );

function my_remove_post_meta_boxes() {
	//remove_meta_box( 'slugdiv', 'post', 'normal' );
	//remove_meta_box( 'slugdiv', 'page', 'normal' );
}

// if( function_exists('acf_add_options_page') ) {
	
// 	acf_add_options_page();
	
// }

function create_staffPostType() {
	$supports = array(
		'title',
		'editor',
		'thumbnail',
		'excerpt', 
		'custom-fields',
	);
    register_post_type('staff',
	    array(
	      	'labels' => array(
	       		'name' => __('Staff'),
	       		'singular_name' => __('Staff')
	      	),
	      	'supports' => $supports,
	      	'hierarchical' => false,
	      	'public' => true,
	      	'has_archive' => false,
	      	'query_var ' => false,
	      	'rewrite' => array('slug' => 'staff'),
	     )
    );
}
add_action('init', 'create_staffPostType');

function taxonomy_staff() {
  	$labels = array(
	    'name'              => __('Department'),
	    'singular_name'     => __('Department'),
	    'search_items'      => __('SearchDepartment'),
	    'all_items'         => __('All Department'),
	    'parent_item'       => __('Parent Department'),
	    'edit_item'         => __('Edit Department'), 
	    'update_item'       => __('Update Department'),
	    'add_new_item'      => __('Add New Department'),
	    'new_item_name'     => __('New Department'),
	    'menu_name'         => __('Department'),
	);
	$args = array(
	    'labels' => $labels,
	    'hierarchical' => true,
	);
  	register_taxonomy('department', 'staff', $args);
}

add_action('init', 'taxonomy_staff');
