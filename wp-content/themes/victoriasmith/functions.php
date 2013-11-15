<?php 

add_theme_support('menus');

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true ); // W x H, hard crop

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'featured-siderail', 212, 9999 );
}

// Add Custom Post Type
function my_custom_post_workshops() {
	$labels = array(
		'name'               => _x( 'Workshops', 'post type general name' ),
		'singular_name'      => _x( 'Workshop', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Workshop' ),
		'edit_item'          => __( 'Edit Workshop' ),
		'new_item'           => __( 'New Workshop' ),
		'all_items'          => __( 'All Workshops' ),
		'view_item'          => __( 'View Workshop' ),
		'search_items'       => __( 'Search Workshops' ),
		'not_found'          => __( 'No results found' ),
		'not_found_in_trash' => __( 'No results found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Workshop content',
		'public'        => true,
		'menu_position' => 20,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'workshops', $args );	
}
add_action( 'init', 'my_custom_post_workshops' );

?>