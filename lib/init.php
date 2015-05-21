<?php
/**
 * ucmaster initial setup and constants
 */
function ucmaster_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/ucmaster/ucmaster-translations
  load_theme_textdomain('ucmaster', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'ucmaster'),
	'utility_navigation' => __('Utility Navigation', 'ucmaster'),
	'footer_nav1' => __('Footer Nav 1', 'ucmaster'),
	'footer_nav2' => __('Footer Nav 2', 'ucmaster'),
	'footer_nav3' => __('Footer Nav 3', 'ucmaster'),
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'homepage-thumb', 240, 240, true ); 
	add_image_size( 'homepage-slide', 800, 550, true );
	add_image_size( 'feature-page', 850, 400, true );
	add_image_size( 'feature-thumb', 175, 175, true ); 
	add_image_size( 'two-across', 450, 250, true );
	add_image_size( 'three-across', 290, 210, true );
	//add_image_size( 'page-header', 1170, 250, true ); 
	add_image_size( 'two-down', 450, 9999, false );
	add_image_size( 'news-head', 740, 420, true );  
  }
  add_filter('image_size_names_choose', 'my_image_sizes');
	function my_image_sizes($sizes) {
	$addsizes = array(
	"feature-thumb" => __( "Featured Thumbnail"),
	"two-down" => __( "Vertical Image"),
	"two-across" => __( "Half Page Image"),
	"three-across" => __( "Third Page Image"),
	"feature-page" => __( "Page Header"),
	"homepage-thumb" => __( "Homepage Thumbnails"),
	"homepage-slide" => __( "Homepage Slides"),
	"news-head" => __( "News Header"),
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
  }

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  //add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('gallery','caption'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'ucmaster_setup');

function uc_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => 'primary_navigation', /* menu name */
    		'menu_class' => 'nav navbar-nav',
    		'theme_location' => 'primary_navigation', /* where in the theme it's assigned */
    		'menu_id' => 'menu-primary-navigation', /* container class */
    		'depth' => '3', /* suppress lower levels for now */
    		'walker' => new ucmaster_Nav_Walker()
    	)
    );
}
function uc_ute_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => 'utility_navigation', /* menu name */
    		'menu_class' => 'nav',
    		'theme_location' => 'utility_navigation', /* where in the theme it's assigned */
    		'container' => 'false', /* container class */
    		'depth' => '0', /* suppress lower levels for now */
			'walker' => new ucmaster_Nav_Walker(),
    	)
    );
}
/**
 * Register sidebars
 */
function ucmaster_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'ucmaster'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'ucmaster'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'ucmaster_widgets_init');
//