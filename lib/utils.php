<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

// Tell WordPress to use searchform.php from the templates/ directory
function ucmaster_get_search_form($form) {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'ucmaster_get_search_form');

function ucstaff_search_form($form) {
  $form = '';
  locate_template('/templates/searchstaff.php', true, false);
  return $form;
}
// Sort Search Results?

//Post Parent Find
function is_tree($pid)
{
  global $post;

  $ancestors = get_post_ancestors($post->$pid);
  $root = count($ancestors) - 1;
  $parent = $ancestors[$root];

  if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors)))
  {
    return true;
  }
  else
  {
    return false;
  }
};
// Format Content & Excerpts
function excerpt($limit, $read, $btn) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
	
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  if (!$read) {
	  if($btn){
	  	$excerpt .='</p><a class="btn btn-default" href="' . get_permalink() . '">' . __('Read&nbsp;More <i class="fa fa-arrow-right"></i>', 'ucmaster') . '</a>';
	  } else {
		$excerpt .='&hellip; <a href="' . get_permalink() . '">' . __('Read&nbsp;More', 'ucmaster') . '</a></p>';
	  }
  }
  $excerpt = '<p>'.$excerpt;
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

function get_excerpt_by_id($post_id){
	$the_post = get_post($post_id); //Gets post ID
	$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
	$excerpt_length = 35; //Sets excerpt length by word count
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
	$words = explode(' ', $the_excerpt, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
	array_pop($words);
	array_push($words, '');
	$the_excerpt = implode(' ', $words);
	endif;
	//$the_excerpt = '<p>' . $the_excerpt . '</p>';
	return $the_excerpt;
}
remove_action('tribe_events_single_event_after_the_content', array('TribeiCal', 'single_event_links'));
add_action('tribe_events_single_event_after_the_content', 'customized_tribe_single_event_links');
 
function customized_tribe_single_event_links()	{
	if (is_single() && post_password_required()) {
		return;
	}
 
	echo '<div class="tribe-events-cal-links">';
	echo '<a class="tribe-events-gcal tribe-events-button" href="' . tribe_get_gcal_link() . '" title="' . __( 'Add to Google Calendar', 'tribe-events-calendar-pro' ) . '">Google Calendar <i class="fa fa-calendar"></i></a>';
	echo '<a class="tribe-events-ical tribe-events-button" href="' . tribe_get_single_ical_link() . '">iCal Export <i class="fa fa-download"></i></a>';
	echo '</div><!-- .tribe-events-cal-links -->';
}
add_filter('gmap_link', 'tribe_gmap_link_changer');

function tribe_gmap_link_changer () {
        return str_replace(' + ', ' at ');
}

// PAgination Page Navi
// Use this function to create pagingation links that are styleable with Twitter Bootstrap
// http://www.lanexa.net/2012/09/add-twitter-bootstrap-pagination-to-your-wordpress-theme/

// Numeric Page Navi
function page_navi($before = '', $after = '') {
  global $wpdb, $wp_query;
  $request = $wp_query->request;
  $posts_per_page = intval(get_query_var('posts_per_page'));
  $paged = intval(get_query_var('paged'));
  $numposts = $wp_query->found_posts;
  $max_page = $wp_query->max_num_pages;
  if ( $numposts <= $posts_per_page ) { return; }
  if(empty($paged) || $paged == 0) {
    $paged = 1;
  }
  $pages_to_show = 7;
  $pages_to_show_minus_1 = $pages_to_show-1;
  $half_page_start = floor($pages_to_show_minus_1/2);
  $half_page_end = ceil($pages_to_show_minus_1/2);
  $start_page = $paged - $half_page_start;
  if($start_page <= 0) {
    $start_page = 1;
  }
  $end_page = $paged + $half_page_end;
  if(($end_page - $start_page) != $pages_to_show_minus_1) {
    $end_page = $start_page + $pages_to_show_minus_1;
  }
  if($end_page > $max_page) {
    $start_page = $max_page - $pages_to_show_minus_1;
    $end_page = $max_page;
  }
  if($start_page <= 0) {
    $start_page = 1;
  }

  echo $before.'<ul class="pagination">'."";
  if ($paged > 1) {
    $first_page_text = '<i class="fa fa-angle-double-left"></i>';
    echo '<li class="prev"><a href="'.get_pagenum_link().'" title="First">'.$first_page_text.'</a></li>';
  }

  $prevposts = get_previous_posts_link('<i class="fa fa-angle-left"></i>');
  if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
  else { echo '<li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>'; }

  for($i = $start_page; $i  <= $end_page; $i++) {
    if($i == $paged) {
      echo '<li class="active"><a href="#">'.$i.'</a></li>';
    } else {
      echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
    }
  }
  echo '<li class="">';
  next_posts_link('<i class="fa fa-angle-right"></i>');
  echo '</li>';
  if ($end_page < $max_page) {
    $last_page_text = '<i class="fa fa-angle-double-right"></i>';
    echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
  }
  echo '</ul>'.$after."";
}
//

// TINY MCE Edits
add_editor_style( 'assets/css/editor-style.css' );

function myplugin_tinymce_buttons($buttons)
 {
	//Remove the format dropdown select and text color selector
	$remove = array('underline','forecolor','justifyfull','alignleft','aligncenter','alignright','justify','hr','blockquote', 'strikethrough');
	return array_diff($buttons,$remove);
 }
add_filter('mce_buttons_2','myplugin_tinymce_buttons');
add_filter('mce_buttons','myplugin_tinymce_buttons');
// Format Styles
add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );
function fb_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Colors',
			'items' => array(
				array(
					'title' => 'Red',
					'inline' => 'span',
					'classes' => 'red',
				),
				array(
					'title' => 'Blue',
					'inline' => 'span',
					'classes' => 'blue',
				),
				array(
					'title' => 'Orange',
					'inline' => 'span',
					'classes' => 'orange',
				),
				array(
					'title' => 'White',
					'inline' => 'span',
					'classes' => 'white',
				),
				array(
					'title' => 'Gray',
					'inline' => 'span',
					'classes' => 'gray',
				),
				array(
					'title' => 'Gray - Light',
					'inline' => 'span',
					'classes' => 'gray-light',
				),
				array(
					'title' => 'Gray - Lighter',
					'inline' => 'span',
					'classes' => 'gray-lighter',
				),
			),
        ),
        array(
            'title' => 'Unordered Lists',
			'items' => array(
				array(
					'title' => 'Unstyled',
					'selector' => 'ul',
					'classes' => 'list-unstyled',
				),
				array(
					'title' => 'Inline',
					'selector' => 'ul',
					'classes' => 'list-inline',
				),
			),
		),
		 array(
            'title' => 'Horizontal Rules',
			'items' => array(
				array(
					'title' => 'Visual Divide',
					'selector' => 'hr',
					'classes' => 'divide',
				),
				array(
					'title' => 'Faint Line',
					'selector' => 'hr',
					'classes' => 'faint',
				),
			),
		),
		array(
            'title' => 'Tables',
			'items' => array(
				array(
					'title' => 'Table Hover',
					'selector' => 'table',
					'classes' => 'table table-hover',
				),
				array(
					'title' => 'Table Condensed',
					'selector' => 'table',
					'classes' => 'table table-condensed',
				),
				array(
					'title' => 'Table Bordered',
					'selector' => 'table',
					'classes' => 'table table-bordered',
				),
			),
		),
		array(
            'title' => 'Table - Cell Background',
			'items' => array(
				array(
					'title' => 'Yellow',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-warning',
				),
				array(
					'title' => 'Green',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-success',
				),
				array(
					'title' => 'Blue',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-info',
				),
				array(
					'title' => 'Red',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-danger',
				),
				array(
					'title' => 'Gray - Light',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-gray-light',
				),
			),
		),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}
//
/**
 * Filter the link query arguments to change the post types. 
 *
 * @param array $query An array of WP_Query arguments. 
 * @return array $query
 */
function my_custom_link_query( $query ){
    // custom post type slug to be removed
    $cpt_to_remove = 'module';      // Edit this to your needs
    // find the corresponding array key
    $key = array_search( $cpt_to_remove, $query['post_type'] ); 
    // remove the array item
    if( $key )
        unset( $query['post_type'][$key] );
    return $query; 
}
function my_custom_link_query2( $query ){
    // custom post type slug to be removed
    $cpt_to_remove = 'slide';      // Edit this to your needs
    // find the corresponding array key
    $key = array_search( $cpt_to_remove, $query['post_type'] ); 
    // remove the array item
    if( $key )
        unset( $query['post_type'][$key] );
    return $query; 
}
function my_custom_link_query3( $query ){
    // custom post type slug to be removed
    $cpt_to_remove = 'featurette';      // Edit this to your needs
    // find the corresponding array key
    $key = array_search( $cpt_to_remove, $query['post_type'] ); 
    // remove the array item
    if( $key )
        unset( $query['post_type'][$key] );
    return $query; 
}
function my_custom_link_query4( $query ){
    // custom post type slug to be removed
    $cpt_to_remove = 'staff';      // Edit this to your needs
    // find the corresponding array key
    $key = array_search( $cpt_to_remove, $query['post_type'] ); 
    // remove the array item
    if( $key )
        unset( $query['post_type'][$key] );
    return $query; 
}
function my_custom_link_query5( $query ){
    // custom post type slug to be removed
    $cpt_to_remove = 'mega-menu';      // Edit this to your needs
    // find the corresponding array key
    $key = array_search( $cpt_to_remove, $query['post_type'] ); 
    // remove the array item
    if( $key )
        unset( $query['post_type'][$key] );
    return $query; 
}
function my_custom_link_query6( $query ){
    // custom post type slug to be removed
    $cpt_to_remove = 'callout';      // Edit this to your needs
    // find the corresponding array key
    $key = array_search( $cpt_to_remove, $query['post_type'] ); 
    // remove the array item
    if( $key )
        unset( $query['post_type'][$key] );
    return $query; 
}
add_filter( 'wp_link_query_args', 'my_custom_link_query' );
add_filter( 'wp_link_query_args', 'my_custom_link_query2' );
add_filter( 'wp_link_query_args', 'my_custom_link_query3' );
add_filter( 'wp_link_query_args', 'my_custom_link_query4' );
add_filter( 'wp_link_query_args', 'my_custom_link_query5' );
add_filter( 'wp_link_query_args', 'my_custom_link_query6' );
// Remove h1 and pre formats
function wpa_45815($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wpa_45815');