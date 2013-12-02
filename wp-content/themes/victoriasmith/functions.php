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
	add_image_size( 'home-slider', 9999, 146, true );
}

// Add Workshops Custom Post Type
function my_custom_post_workshops() {
	$labels = array(
		'name'               => _x( 'Workshops', 'post type general name' ),
		'singular_name'      => _x( 'Workshop', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'workshop' ),
		'add_new_item'       => __( 'Add New Workshop' ),
		'edit_item'          => __( 'Edit Workshop' ),
		'new_item'           => __( 'New Workshop' ),
		'all_items'          => __( 'All Workshops' ),
		'view_item'          => __( 'View Workshop' ),
		'search_items'       => __( 'Search Workshops' ),
		'not_found'          => __( 'No results found' ),
		'not_found_in_trash' => __( 'No results found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Workshops'
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
	
// Add Testimonials Custom Post Type
function my_custom_post_testimonials() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'testimonial' ),
		'add_new_item'       => __( 'Add New Testimonial' ),
		'edit_item'          => __( 'Edit Testimonial' ),
		'new_item'           => __( 'New Testimonial' ),
		'all_items'          => __( 'All Testimonial' ),
		'view_item'          => __( 'View Testimonial' ),
		'search_items'       => __( 'Search Testimonials' ),
		'not_found'          => __( 'No results found' ),
		'not_found_in_trash' => __( 'No results found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Testimonial content',
		'public'        => true,
		'menu_position' => 20,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'testimonials', $args );	
}
add_action( 'init', 'my_custom_post_testimonials' );
	
// Add Theme Options Tab	
	// add the admin options page
    add_action('admin_menu', 'plugin_admin_add_page');
    function plugin_admin_add_page() {
		add_options_page('VS Theme Options Page', 'VS Theme Options', 'manage_options', 'plugin', 'plugin_options_page');
    }
    
	// display the admin options page
    function plugin_options_page() {
    ?>
        <div>
            <h2>VS Theme Options</h2>
            Options relating to Victoria Smith's custom Wordpress theme.
            <form action="options.php" method="post">
            <?php settings_fields('plugin_options'); ?>
            <?php do_settings_sections('plugin'); ?>
             
            <input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
            </form>
        </div>
     
    <?php
    }
	
	// add the admin settings and such
    add_action('admin_init', 'plugin_admin_init');
    function plugin_admin_init(){
		register_setting( 'plugin_options', 'plugin_options', 'plugin_options_validate' );
		add_settings_section('plugin_main', 'Home Featured Content', 'plugin_section_text', 'plugin');
		add_settings_field('plugin_text_string', 'Plugin Text Input', 'plugin_setting_string', 'plugin', 'plugin_main');
    }
	
	function plugin_section_text() {
		echo '<p>Identify which content you want to feature in the three boxes on the home page by placing their comma separated Page IDs in the order you want them to appear on the home page. To find the page IDs, go to Pages in the menu to the left and hover over the title(s) you want to add. The page ID number will appear in the address at the bottom next to "post=" </p>';
    }
	
	function plugin_setting_string() {
		$options = get_option('plugin_options');
		echo "<input id='plugin_text_string' name='plugin_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
    }
	
	// validate our options
    function plugin_options_validate($input) {
		$newinput['text_string'] = trim($input['text_string']);
		if(!preg_match('/^[a-z0-9]{32}$/i', $newinput['text_string'])) {
			$newinput['text_string'] = '';
		}
		return $newinput;
    }
    function var_pre($v, $m=""){
    	echo "<pre>$m".($m != "" ? ":":"")."\n";
    	var_dump($v);
    	echo "<pre>\n";
    }

add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'home_cta',
			'name' => __( 'Homepage Blocks' ),
			'description' => __( 'The Blocks on the Homepage. (Max 3 widgets displayed)' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	/* Repeat register_sidebar() code for additional sidebars. */
}


    ?>