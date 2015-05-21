<?php
//Changing Posts to Slides
add_filter('manage_edit-post_columns' , 'set_slide_columns');
function home_page_menu() {
  add_menu_page( 'Site Options', 'Site Options', 'edit_posts', 'home-menu', null, '', 79 );
}

add_action('admin_menu', 'home_page_menu');

function dir_page_menu() {
  add_menu_page( 'Directory', 'Directory', 'edit_posts', 'dir-menu', null, '', 33 );
}

add_action('admin_menu', 'dir_page_menu');

// Custom Post Types
add_action( 'init', 'create_new_slides' );
function create_new_slides() {
	// Add Student Types
	$labels = array(
		'name' => 'Slides',
		 'singular_name' => 'Slide',
		 'menu_name' => 'Slides',
		 'add_new' => 'Add Slide',
		 'add_new_item' => 'Add New Slide',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Slide',
		 'new_item' => 'New Slide',
		 'view' => 'View Slide',
		 'view_item' => 'View Slide',
		 'search_items' => 'Search Slides',
		 'not_found' => 'No Slides Found',
		 'not_found_in_trash' => 'No Slides Found in Trash',
		 'parent' => 'Parent Slide'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new slides for UC. These are displayed on the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => false,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'slide'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 1,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'thumbnail'),
	);
	register_post_type('slide', $args);
};
function set_slide_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'date' => __('Date'),
		'categories' => __('Categories'),
		'tags' => __('Tags'),
		'column_1' => __('Attribution'),
    );
}
// POPULATE CUSTOM COLUMNS ON CUSTOM POST
add_action('manage_posts_custom_column', 'add_new_post_cols', 10, 2);
	function add_new_post_cols($column, $post_id){
	global $post;
	switch ($column){
		case 'column_1':
		$column_1_content = get_field('original_url');
		echo $column_1_content;
		default:
		break;
	}
}
add_filter('manage_posts_custom_column' , 'set_slide_columns');
// Create Featurettes
add_action( 'init', 'create_new_features' );
function create_new_features() {
	// Add Student Types
	$labels = array(
		'name' => 'Featurettes',
		 'singular_name' => 'Featurette',
		 'menu_name' => 'Featurettes',
		 'add_new' => 'Add Featurette',
		 'add_new_item' => 'Add New Featurette',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Featurette',
		 'new_item' => 'New Featurette',
		 'view' => 'View Featurette',
		 'view_item' => 'View Featurette',
		 'search_items' => 'Search Featurettes',
		 'not_found' => 'No Featurettes Found',
		 'not_found_in_trash' => 'No Featurettes Found in Trash',
		 'parent' => 'Parent Featurette'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new featurette items for UC. These are displayed on the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => false,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'featurette'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 2,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('featurette', $args);
};
function set_features_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'date' => __('Date'),
		'column_1' => __('Featurette Image'),
		'column_2' => __('Featurette Content'),
    );
}
// POPULATE CUSTOM COLUMNS ON CUSTOM POST
add_action('manage_featurette_posts_custom_column', 'add_new_features_cols', 10, 2);
	function add_new_features_cols($column, $post_id){
	global $post;
	switch ($column){
	case 'column_1':
	$column_1_content = the_post_thumbnail('thumbnail');
	echo $column_1_content;
	default:
	break;
	case 'column_2':
	$column_2_content = the_excerpt();
	echo $column_2_content;
	default:
	break;
	}
}
add_filter('manage_featurette_posts_columns' , 'set_features_columns');

// Change Posts to News
//
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'UC News';
    $submenu['edit.php'][5][0] = 'All UC News';
    $submenu['edit.php'][10][0] = 'Add News Article';
    $submenu['edit.php'][15][0] = 'News Categories'; // Change name for categories
    $submenu['edit.php'][16][0] = 'News Tags'; // Change name for tags
	
    echo '';
}

function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News Article';
	$labels->add_new_item = 'Add News Article';
	$labels->edit_item = 'Edit News Article';
	$labels->new_item = 'News Article';
	$labels->view_item = 'View News Article';
	$labels->search_items = 'Search News Articles';
	$labels->not_found = 'No News Articles found';
	$labels->not_found_in_trash = 'No News Articles found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );



if( function_exists('acf_add_options_sub_page') )
{
    
	acf_add_options_sub_page(array(
        'title' => 'University College Specific Items',
        'parent' => 'home-menu',
        'capability' => 'manage_options'
    ));
	acf_add_options_sub_page(array(
        'title' => 'University College Homepage Items',
        'parent' => 'home-menu',
        'capability' => 'manage_options'
    ));
	
}
//Add Modules
add_action( 'init', 'create_new_modules' );
function create_new_modules() {
	// Add Modules
	$labels = array(
		'name' => 'Modules',
		 'singular_name' => 'Module',
		 'menu_name' => 'Modules',
		 'add_new' => 'Add Module',
		 'add_new_item' => 'Add New Module',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Module',
		 'new_item' => 'New Module',
		 'view' => 'View Module',
		 'view_item' => 'View Module',
		 'search_items' => 'Search Modules',
		 'not_found' => 'No Modules Found',
		 'not_found_in_trash' => 'No Modules Found in Trash',
		 'parent' => 'Parent Module'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new modules for OCL. These can be content blocks for the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'module'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 3,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('module', $args);
};
//Add Callouts
add_action( 'init', 'create_new_callout' );
function create_new_callout() {
	// Add Modules
	$labels = array(
		'name' => 'Callouts',
		 'singular_name' => 'Callout',
		 'menu_name' => 'Callouts',
		 'add_new' => 'Add Callout',
		 'add_new_item' => 'Add New Callout',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Callout',
		 'new_item' => 'New Callout',
		 'view' => 'View Callout',
		 'view_item' => 'View Callout',
		 'search_items' => 'Search Callouts',
		 'not_found' => 'No Callouts Found',
		 'not_found_in_trash' => 'No Modules Found in Trash',
		 'parent' => 'Parent Module'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new callouts for UC. These can be displayed at the bottom of any page within the UC Site',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'callout'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 4,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('callout', $args);
};
// Add Mega Menus
add_action( 'init', 'create_new_megas' );
function create_new_megas() {
	// Add Mega Menus
	$labels = array(
		'name' => 'Mega Menus',
		 'singular_name' => 'Mega Menu',
		 'menu_name' => 'Mega Menus',
		 'add_new' => 'Add Mega Menu',
		 'add_new_item' => 'Add New Mega Menu',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Mega Menu',
		 'new_item' => 'New Mega Menu',
		 'view' => 'View Mega Menu',
		 'view_item' => 'View Mega Menu',
		 'search_items' => 'Search Mega Menu',
		 'not_found' => 'No Mega Menus Found',
		 'not_found_in_trash' => 'No Mega Menus Found in Trash',
		 'parent' => 'Parent Mega Menu'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new Mega Menus for UC. These are for main navigation on the UC site',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'mega-menu'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 3,
		'show_in_menu' => 'themes.php',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('mega-menu', $args);
};
// Register Custom Post Type
function my_class_listing() {

	$labels = array(
		'name'                => _x( 'Courses', 'Post Type General Name', 'ucmaster' ),
		'singular_name'       => _x( 'Course Listing', 'Post Type Singular Name', 'ucmaster' ),
		'menu_name'           => __( 'Course Listings', 'ucmaster' ),
		'parent_item_colon'   => __( 'Parent Course List:', 'ucmaster' ),
		'all_items'           => __( 'All Course Listings', 'ucmaster' ),
		'view_item'           => __( 'View Course Listing', 'ucmaster' ),
		'add_new_item'        => __( 'Add New Course Listing', 'ucmaster' ),
		'add_new'             => __( 'Add New', 'ucmaster' ),
		'edit_item'           => __( 'Edit Course Listing', 'ucmaster' ),
		'update_item'         => __( 'Update Course Listing', 'ucmaster' ),
		'search_items'        => __( 'Search Course Listing', 'ucmaster' ),
		'not_found'           => __( 'Not found', 'ucmaster' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ucmaster' ),
	);
	$rewrite = array(
		'slug'                => 'class-list',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'class-list', 'ucmaster' ),
		'description'         => __( 'Course Listing for University College', 'ucmaster' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'page-attributes', ),
		'taxonomies'          => array( 'schools', ' department' , 'format'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 23,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'class-list',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'class-list', $args );

}

// Hook into the 'init' action
add_action( 'init', 'my_class_listing', 0 );
// Register Custom Taxonomy
function format_tax()  {
	$labels = array(
		'name'                       => _x( 'Formats', 'Taxonomy General Name', 'ucmaster' ),
		'singular_name'              => _x( 'Format', 'Taxonomy Singular Name', 'ucmaster' ),
		'menu_name'                  => __( 'Formats', 'ucmaster' ),
		'all_items'                  => __( 'All Formats', 'ucmaster' ),
		'parent_item'                => __( 'Parent Format', 'ucmaster' ),
		'parent_item_colon'          => __( 'Parent Format:', 'ucmaster' ),
		'new_item_name'              => __( 'New Format Name', 'ucmaster' ),
		'add_new_item'               => __( 'Add New Format', 'ucmaster' ),
		'edit_item'                  => __( 'Edit Format', 'ucmaster' ),
		'update_item'                => __( 'Update Format', 'ucmaster' ),
		'separate_items_with_commas' => __( 'Separate Formats with commas', 'ucmaster' ),
		'search_items'               => __( 'Search Formats', 'ucmaster' ),
		'add_or_remove_items'        => __( 'Add or Remove Formats', 'ucmaster' ),
		'choose_from_most_used'      => __( 'Choose from the most used Formats', 'ucmaster' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'formats', 'class-list', $args );
}
// Hook into the 'init' action
add_action( 'init', 'format_tax' );
// Register Custom Taxonomy
function school_tax()  {
	$labels = array(
		'name'                       => _x( 'Schools', 'Taxonomy General Name', 'ucmaster' ),
		'singular_name'              => _x( 'School', 'Taxonomy Singular Name', 'ucmaster' ),
		'menu_name'                  => __( 'Schools', 'ucmaster' ),
		'all_items'                  => __( 'All Schools', 'ucmaster' ),
		'parent_item'                => __( 'Parent School', 'ucmaster' ),
		'parent_item_colon'          => __( 'Parent School:', 'ucmaster' ),
		'new_item_name'              => __( 'New School Name', 'ucmaster' ),
		'add_new_item'               => __( 'Add New School', 'ucmaster' ),
		'edit_item'                  => __( 'Edit School', 'ucmaster' ),
		'update_item'                => __( 'Update School', 'ucmaster' ),
		'separate_items_with_commas' => __( 'Separate Schools with commas', 'ucmaster' ),
		'search_items'               => __( 'Search Schools', 'ucmaster' ),
		'add_or_remove_items'        => __( 'Add or Remove Schools', 'ucmaster' ),
		'choose_from_most_used'      => __( 'Choose from the most used Schools', 'ucmaster' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'schools', 'class-list', $args );
}
// Hook into the 'init' action
add_action( 'init', 'school_tax' );
// Register Custom Taxonomy
function dept_tax()  {
	$labels = array(
		'name'                       => _x( 'Departments', 'Taxonomy General Name', 'ucmaster' ),
		'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'ucmaster' ),
		'menu_name'                  => __( 'Departments', 'ucmaster' ),
		'all_items'                  => __( 'All Departments', 'ucmaster' ),
		'parent_item'                => __( 'Parent Department', 'ucmaster' ),
		'parent_item_colon'          => __( 'Parent Department:', 'ucmaster' ),
		'new_item_name'              => __( 'New Department Name', 'ucmaster' ),
		'add_new_item'               => __( 'Add New Department', 'ucmaster' ),
		'edit_item'                  => __( 'Edit Department', 'ucmaster' ),
		'update_item'                => __( 'Update Department', 'ucmaster' ),
		'separate_items_with_commas' => __( 'Separate Department with commas', 'ucmaster' ),
		'search_items'               => __( 'Search Department', 'ucmaster' ),
		'add_or_remove_items'        => __( 'Add or Remove Department', 'ucmaster' ),
		'choose_from_most_used'      => __( 'Choose from the most used Department', 'ucmaster' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'capabilities' => array (
            'manage_terms' => 'edit_posts',
            'edit_terms' => 'edit_posts',
            'delete_terms' => 'edit_posts',
            'assign_terms' => 'edit_posts'
        ),
	);
	register_taxonomy( 'department', 'class-list', $args );
}
// Hook into the 'init' action
add_action( 'init', 'dept_tax' );

// Staff Directory
// Register Custom Post Type
function my_staff_dir() {

	$labels = array(
		'name'                => _x( 'Staff Members', 'Post Type General Name', 'ucmaster' ),
		'singular_name'       => _x( 'Staff Member', 'Post Type Singular Name', 'ucmaster' ),
		'menu_name'           => __( 'Staff Members', 'ucmaster' ),
		'parent_item_colon'   => __( 'Parent Staff Member:', 'ucmaster' ),
		'all_items'           => __( 'All Staff Members', 'ucmaster' ),
		'view_item'           => __( 'View Staff Member', 'ucmaster' ),
		'add_new_item'        => __( 'Add New Staff Member', 'ucmaster' ),
		'add_new'             => __( 'Add New', 'ucmaster' ),
		'edit_item'           => __( 'Edit Staff Member', 'ucmaster' ),
		'update_item'         => __( 'Update Staff Member', 'ucmaster' ),
		'search_items'        => __( 'Search Staff Members', 'ucmaster' ),
		'not_found'           => __( 'Not found', 'ucmaster' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ucmaster' ),
	);
	$rewrite = array(
		'slug'                => 'directory/staff-directory',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'staff-list', 'ucmaster' ),
		'description'         => __( 'Staff Listings for University College', 'ucmaster' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'          => '',//array( 'office-list'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position' 	  => 1,
		'show_in_menu' 		  => 'dir-menu',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'staff-dir',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'staff', $args );

}
// Hook into the 'init' action
add_action( 'init', 'my_staff_dir', 0 );
//
function my_office_dir() {

	$labels = array(
		'name'                => _x( 'Offices', 'Post Type General Name', 'ucmaster' ),
		'singular_name'       => _x( 'Office', 'Post Type Singular Name', 'ucmaster' ),
		'menu_name'           => __( 'Offices', 'ucmaster' ),
		'parent_item_colon'   => __( 'Parent Office:', 'ucmaster' ),
		'all_items'           => __( 'All Offices', 'ucmaster' ),
		'view_item'           => __( 'View Office Information', 'ucmaster' ),
		'add_new_item'        => __( 'Add New Office Listing', 'ucmaster' ),
		'add_new'             => __( 'Add New', 'ucmaster' ),
		'edit_item'           => __( 'Edit Office Information', 'ucmaster' ),
		'update_item'         => __( 'Update Office Information', 'ucmaster' ),
		'search_items'        => __( 'Search Offices', 'ucmaster' ),
		'not_found'           => __( 'Not found', 'ucmaster' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ucmaster' ),
	);
	$rewrite = array(
		'slug'                => 'directory/office-directory',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'office-list', 'ucmaster' ),
		'description'         => __( 'Office Listings for University College', 'ucmaster' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor'),
		'taxonomies'          => '',
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position' 	  => 3,
		'show_in_menu' 		  => 'dir-menu',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'office-dir',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'office', $args );

}
// Hook into the 'init' action
add_action( 'init', 'my_office_dir', 0 );

// Register Custom Taxonomy
function office_tax()  {
	$labels = array(
		'name'                       => _x( 'Office Categories', 'Taxonomy General Name', 'ucmaster' ),
		'singular_name'              => _x( 'Office Category', 'Taxonomy Singular Name', 'ucmaster' ),
		'menu_name'                  => __( 'Office Categories', 'ucmaster' ),
		'all_items'                  => __( 'All Office Categories', 'ucmaster' ),
		'parent_item'                => __( 'Parent Office Category', 'ucmaster' ),
		'parent_item_colon'          => __( 'Parent Office Category:', 'ucmaster' ),
		'new_item_name'              => __( 'New Office Category Name', 'ucmaster' ),
		'add_new_item'               => __( 'Add New Office Category', 'ucmaster' ),
		'edit_item'                  => __( 'Edit Office Category', 'ucmaster' ),
		'update_item'                => __( 'Update Office Category', 'ucmaster' ),
		'separate_items_with_commas' => __( 'Separate Office Categories with commas', 'ucmaster' ),
		'search_items'               => __( 'Search Office Categories', 'ucmaster' ),
		'add_or_remove_items'        => __( 'Add or Remove Office Category', 'ucmaster' ),
		'choose_from_most_used'      => __( 'Choose from the most used Office Categories', 'ucmaster' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'capabilities' => array (
            'manage_terms' => 'edit_posts',
            'edit_terms' => 'edit_posts',
            'delete_terms' => 'edit_posts',
            'assign_terms' => 'edit_posts'
        ),
	);
	register_taxonomy( 'office-list', 'staff', $args );
}
// Hook into the 'init' action
add_action( 'init', 'office_tax' );

add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
	add_submenu_page( 'dir-menu', 'Add New Staff Member', 'Add New Staff Member', 'edit_posts',' post-new.php?post_type=staff');
	add_submenu_page( 'dir-menu', 'Add New office', 'Add New Office', 'edit_posts',' post-new.php?post_type=office');
	add_submenu_page( 'dir-menu', 'Office Categories', 'Office Categories', 'manage_options',' edit-tags.php?taxonomy=office-list&post_type=staff');
}
//
// Register Custom Post Type
function my_uc_story() {

	$labels = array(
		'name'                => _x( 'UC Stories', 'Post Type General Name', 'ucmaster' ),
		'singular_name'       => _x( 'UC Story', 'Post Type Singular Name', 'ucmaster' ),
		'menu_name'           => __( 'UC Stories', 'ucmaster' ),
		'parent_item_colon'   => __( 'Parent UC Story:', 'ucmaster' ),
		'all_items'           => __( 'All UC Stories', 'ucmaster' ),
		'view_item'           => __( 'View UC Story', 'ucmaster' ),
		'add_new_item'        => __( 'Add New UC Story', 'ucmaster' ),
		'add_new'             => __( 'Add New', 'ucmaster' ),
		'edit_item'           => __( 'Edit UC Story', 'ucmaster' ),
		'update_item'         => __( 'Update UC Story', 'ucmaster' ),
		'search_items'        => __( 'Search UC Stories', 'ucmaster' ),
		'not_found'           => __( 'Not found', 'ucmaster' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ucmaster' ),
	);
	$rewrite = array(
		'slug'                => 'about-us/alumni/uc-stories',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'uc-story', 'ucmaster' ),
		'description'         => __( 'UC Stories for University College Website', 'ucmaster' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
		//'taxonomies'          => array( 'schools', ' department' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 24,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'uc-story',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'uc-story', $args );

}

// Hook into the 'init' action
add_action( 'init', 'my_uc_story', 0 );

// Custom CSS Styling
function add_menu_icons_styles(){
?>
 
<style>
#adminmenu #menu-posts-class-list div.wp-menu-image:before {
  content: '\f330';
}
#adminmenu #menu-posts-uc-story	div.wp-menu-image:before {
  content: '\f336';
}
#adminmenu #toplevel_page_dir-menu div.wp-menu-image:before {
  content: '\f336';
}
</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );
?>