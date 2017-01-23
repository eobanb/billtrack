<?php
/*
Plugin Name: BillTrack backend
Description: Creates a custom post type for bill updates
Plugin URI:  http://indianapublicmedia.org
Version:     0.1
Author:      Eoban Binder
Author URI:  http://eoban.com
*/

/* 


/*
* Creating a function to create the custom post type for Bill Updates
*/

function custom_post_type_billupdates() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Bill Updates', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Bill Update', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Bill Updates', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Bill', 'twentythirteen' ),
		'all_items'           => __( 'All Updates', 'twentythirteen' ),
		'view_item'           => __( 'View Update', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Update', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Update', 'twentythirteen' ),
		'update_item'         => __( 'Update Update', 'twentythirteen' ),
		'search_items'        => __( 'Search Updates', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'billupdates', 'twentythirteen' ),
		'description'         => __( 'Legislative session updates', 'twentythirteen' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'author', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'post_tag', 'category' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'billupdates', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type_billupdates', 0 );

function modify_billupdates() {
    if ( post_type_exists( 'billupdates' ) ) {

        /* Give products hierarchy (for house plans) */
        global $wp_post_types, $wp_rewrite;
        $wp_post_types['billupdates']->hierarchical = true;
        $args = $wp_post_types['billupdates'];
        $wp_rewrite->add_rewrite_tag("%billupdates%", '(.+?)', $args->query_var ? "{$args->query_var}=" : "post_type=billupdates&name=");
        add_post_type_support('billupdates','page-attributes');
    }
}
add_action( 'init', 'modify_billupdates', 1 );

function remove_post_custom_fields() {
	remove_meta_box( 'powerpress-podcast', 'billupdates', 'normal' );
	remove_meta_box( 'aiosp', 'billupdates', 'advanced' );
	remove_meta_box( 'simpletags-settings', 'billupdates', 'side' );
}
add_action( 'do_meta_boxes' , 'remove_post_custom_fields' );

// Update CSS within in Admin
function billtrack_admin_style() {
  wp_enqueue_style('admin-styles', '/wp-content/plugins/ipm-billtrack/billtrack-admin-style.css');
}
function billtrack_admin_js() {
	wp_enqueue_script( 'admin-js', '/wp-content/plugins/ipm-billtrack/billtrack-admin.js');
}

add_action('admin_enqueue_scripts', 'billtrack_admin_style');
add_action('admin_enqueue_scripts', 'billtrack_admin_js');
?>