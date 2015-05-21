<?php
/**
 * Clean up the_excerpt()
 
function ucmaster_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'ucmaster') . '</a>';
}
add_filter('excerpt_more', 'ucmaster_excerpt_more');
*/
function custom_excerpt_length( $length ) {
	return 125;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/**
 * Manage output of wp_title()
 */
function ucmaster_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'ucmaster_wp_title', 10);
/*
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
 This custom function is for PLUGIN: WP Modal Login - Hook to implement shortcode logic inside WordPress nav menu items
* Shortcode code can be added using WordPress menu admin menu in description field
*/



// Stories
function load_my_pages( $atts, $content = null ) {
	extract( shortcode_atts( array(	
		'name' => '',
	), $atts ) );
		
	if($name){
		$args = array( 'post_type' => 'page',
		'posts_per_page' => '1',
		'name' => $name );
	}else{ 
		$args = array( 'post_type' => 'page',
		'posts_per_page' => '1',
		'orderby' => 'rand');
	}
	$loop = new WP_Query( $args );
	if ($loop->have_posts()): while($loop->have_posts()): $loop->the_post();
		if (has_post_thumbnail()) :
			echo the_post_thumbnail('small-feature');
		endif;
		echo '<h4>';
		echo the_title();
		echo '</h4>';
		echo the_excerpt();
	
	wp_reset_postdata();
	endwhile;
	endif;
}

add_shortcode('show-page', 'load_my_pages'); 

// Navigation Blocks
function get_nav_content($item){
	$myID = $item->ID;
	$myPage = get_page($myID);
	$custom_fields = get_post_custom($myID);
	$mySummary = $custom_fields['page_summary'];
	echo '<div class="row">';
	
	if( has_post_thumbnail( $myID)){
		echo '<div class="col-xs-7 mar-one-t">';
		echo '<div class="white-th">';
		echo get_the_post_thumbnail( $myID, 'feature-thumb' );
		echo '</div>';
		echo '<h3 class="h4">';
		echo get_the_title( $myID );
		echo '</h3>';
		echo '</div>';
		echo '<div class="col-xs-8 zero-pad-l">';
	} else {
		echo '<div class="col-xs-15">';
		echo '<h3 class="h4">';
		echo get_the_title( $myID );
		echo '</h3>';
	}
	echo '<div class="minor">';
	if (!empty($mySummary[0])){
		//echo '<p>';
		echo $mySummary[0];
		//echo '</p>';
	} else {
		echo get_excerpt_by_id($myID);
	}
	echo '</div>';
	echo '<a class="btn btn-default" href="'.get_permalink($myID).'">';
	echo 'Learn More ';
	echo '<i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
	echo '</div></div>';
}
// Homeapge Blocks
function get_feature_content($item){
	if (have_rows($item, 'option')):
		while ( have_rows($item, 'option') ) : the_row();
			if( get_row_layout() == 'page_item' ):
			$posts = get_sub_field('show_page');
				if( $posts ):
					foreach( $posts as $p):
					$custom_fields = get_post_custom($p->ID);
					$mySummary = $custom_fields['page_summary'];
					echo '<div class="row second-unit">';
					if( has_post_thumbnail($p->ID)){
						echo '<div class="col-md-7 col-sm-15 col-xs-5 mar-one-t feature_th">';
						echo '<div class="white-th">';
						echo get_the_post_thumbnail($p->ID,'feature-thumb' );
						echo '</div>';
						echo '<h3 class="blue hidden-xs">';
						echo get_the_title($p->ID);
						echo '</h3>';
						echo '</div>';
						echo '<div class="col-md-8 col-sm-15 col-xs-10 zero-pad-l-md">';
						echo '<h3 class="blue visible-xs">';
						echo get_the_title($p->ID);
						echo '</h3>';
					} else {
						echo '<div class="col-xs-15">';
						echo '<h3 class="blue">';
						echo get_the_title($p->ID);
						echo '</h3>';
					}
					echo '<div class="text-pad"><div class="widget">';
					if (!empty($mySummary[0])){
						//echo '<p>';
						echo $mySummary[0];
						//echo '</p>';
					} else {
						echo get_excerpt_by_id($p->ID);
						
					}
					echo '</div></div>';
					echo '<a class="btn btn-default" href="'.get_permalink($p->ID).'">';
					echo 'Learn More';
					echo '<i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
					echo '</div></div>';
					endforeach;
					wp_reset_postdata();
				
			endif;
			elseif	(get_row_layout() == 'uc_story' ):
				$story = get_sub_field('show_story');
				if (empty($story)){
					$args = array(
						'post_type'      	=> 'uc-story',
						'posts_per_page'	=> 1,
						'orderby'        	=> 'rand',
					);
				} else {
					$args = array(
						'post_type'      	=> 'uc-story',
						'posts_per_page'	=> 1,
						'post__in'			=> $story->ID,
					);
				}
				wp_reset_postdata();
				$query = new WP_Query( $args );
				
				if ( $query->have_posts() ) {
					echo '<div class="row second-unit">';
					
					while ( $query->have_posts() ) : $query->the_post();
					$custom_fields = get_post_custom();
					$mySummary = $custom_fields['page_summary'];
						if( has_post_thumbnail()){
							echo '<div class="col-md-7 col-sm-15 col-xs-5 mar-one-t feature_th">';
							echo '<div class="white-th">';
							echo the_post_thumbnail('feature-thumb');
							echo '</div>';
							echo '<h3 class="blue hidden-xs">';
							echo "UC Success Story";
							echo '</h3>';
							echo '</div>';
							echo '<div class="col-md-8 col-sm-15 col-xs-10 zero-pad-l-md">';
							echo '<h3 class="blue visible-xs">';
							echo "UC Success Story";
							echo '</h3>';
						} else {
							echo '<div class="col-xs-15">';
							echo '<h3 class="blue">';
							echo "UC Success Story";
							echo '</h3>';
						}
						echo '<div class="clearfix"><div class="widget">';
						echo '<h4>';
						echo the_title();
						echo '</h4>';
						if (!empty($mySummary[0])){
							//echo '<p>';
							echo $mySummary[0];
							//echo '</p>';
						} else {
							echo excerpt(50, true);
						}
						echo '</div></div>';
						echo '<a class="btn btn-default" href="'.get_permalink($p->ID).'">';
						echo 'Read ';
						echo the_title();
						echo '&#8217;s Full Story <i class="fa fa-chevron-right" aria-hidden="true"></i>';
						echo '</a>';
						echo '</div></div>';
					endwhile;
				}
				wp_reset_postdata();
			endif;
				
		endwhile;
	endif;
}
function my_rfbp_read_more($more, $link)
{
    return ' &hellip; <a href="'. $link . '">Read more</a>';
}

add_filter('rfbp_read_more', 'my_rfbp_read_more', 10, 2);

// change default posts per page for office archive
add_action('pre_get_posts', 'wpse63675_pre_posts');
function wpse63675_pre_posts($q) {
    if(!is_post_type_archive(array('office', 'uc-story', 'staff')))
        return;
    $q->set('posts_per_page', -1); // or however many you want
	$q->set('ordeby', 'title');
	$q->set('order', 'ASC');
}

function get_my_page($pager){
	$args = array(
	//'pagename' => 'office-directory-content',
	'page_id' => $pager,
	);
	$the_query = new WP_Query( $args );
	//var_dump ($the_query);
	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) : $the_query->the_post();
		echo '<h3 class="zero-mar-t">';
		the_title();
		echo '</h3>';
		$url = get_the_permalink();
		$custom_fields = get_post_custom();
		$mySummary = $custom_fields['page_summary'];
		$myCTA = $custom_fields['page_cta'];
		if (!empty($mySummary[0])){
			$content = $mySummary[0];
		} else {
			$content = excerpt(75, true);
		}
		if (!empty($myCTA[0])){
			$cta = $myCTA[0];
		} else {
			$cta = "Learn More";
		}
		echo '<div class="widget">';
		echo $content;
		echo '<div class="chunk">';
		echo '<a href="'.$url.'" class="btn btn-default">';
		echo $cta;
		echo ' <i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
		echo '</div>';
		echo '</div>';
		
		endwhile;
		wp_reset_postdata();
	};
};
// Display Modules
function display_module($type, $heading, $block, $hide) {
	echo '<div class="clearfix';
	
	echo '" role="complementary">';
    $query = new WP_Query(array( 'post_type' => 'module', 'name' => $type));
    while ( $query->have_posts() ) : $query->the_post();
	if (!$hide){
		echo '<h'.$heading.'>';
		the_title();
		echo '</h'.$heading.'>';
	}
	echo '<div class="widget">';
	if (has_post_thumbnail()){
		echo '<div class="pad-one-t">'; 
		the_post_thumbnail('featured');
		echo '</div>'; 
	}
	the_content();//$info; 
    endwhile;
	wp_reset_postdata();
	echo '</div></div>'; 
}
// order by last name
function posts_orderby_lastname ($orderby_statement) 
{
  $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
}
// extend search
// Add ACF Fields to Search
/**
 * [list_searcheable_acf list all the custom fields we want to include in our search query]
 * @return [array] [list of custom fields]
 */
function list_searcheable_acf(){
  $list_searcheable_acf = array("positions", "title", "office");
  return $list_searcheable_acf;
}


 
/**
 * [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
 * @param  [query-part/string]      $where    [the initial "where" part of the search query]
 * @param  [object]                 $wp_query []
 * @return [query-part/string]      $where    [the "where" part of the search query as we customized]
 * see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
 * credits to Vincent Zurczak for the base query structure/spliting tags section
 */
function advanced_custom_search( $where, &$wp_query ) {
 
    global $wpdb;
 
    if ( empty( $where ))
        return $where;
 
    // get search expression
    $terms = $wp_query->query_vars[ 's' ];
    
    // explode search expression to get search terms
    $exploded = explode( ' ', $terms );
    if( $exploded === FALSE || count( $exploded ) == 0 )
        $exploded = array( 0 => $terms );
         
    // reset search in order to rebuilt it as we whish
    $where = '';
    
    // get searcheable_acf, a list of advanced custom fields you want to search content in
    $list_searcheable_acf = list_searcheable_acf();
 
    foreach( $exploded as $tag ) :
        $where .= " 
          AND (
            (wp_posts.post_title LIKE '%$tag%')
            OR (wp_posts.post_content LIKE '%$tag%')
            OR EXISTS (
              SELECT * FROM wp_postmeta
	              WHERE post_id = wp_posts.ID
	                AND (";
 
        foreach ($list_searcheable_acf as $searcheable_acf) :
          if ($searcheable_acf == $list_searcheable_acf[0]):
            $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          else :
            $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          endif;
        endforeach;
 
	        $where .= ")
            )
            OR EXISTS (
              SELECT * FROM wp_comments
              WHERE comment_post_ID = wp_posts.ID
                AND comment_content LIKE '%$tag%'
            )
            OR EXISTS (
              SELECT * FROM wp_terms
              INNER JOIN wp_term_taxonomy
                ON wp_term_taxonomy.term_id = wp_terms.term_id
              INNER JOIN wp_term_relationships
                ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
              WHERE (
          		taxonomy = 'post_tag'
            		OR taxonomy = 'category'          		
            		OR taxonomy = 'myCustomTax'
          		)
              	AND object_id = wp_posts.ID
              	AND wp_terms.name LIKE '%$tag%'
            )
        )";
    endforeach;
    return $where;
}
 
add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );

//
// Display Events
//
function display_events($limit, $cat) {
	global $post;
	if ($cat):
	$args = array(
		'post_type' => 'tribe_events',
		'eventDisplay'   => 'upcoming',
		'posts_per_page' => $limit,
		'tax_query' => array(
		array(
			'taxonomy' => 'tribe_events_cat',
			'field' => 'slug',
			'terms' => $cat,
		)
	),);
	else:
	$args = array(
		'post_type' => 'tribe_events',
		'eventDisplay'   => 'upcoming',
		'posts_per_page' => $limit,
	);
	endif;
	
	$posts = tribe_get_events( $args );
	$myCount = count($posts);
	if ($myCount < 1){
		echo '<p><em>There are no events to display at this time</em></p>';
	} else {
		echo '<ul class="list-unstyled">';
	foreach( $posts as $post ) :
		setup_postdata( $post );
		echo '<li>';
		echo '<h5 class="mar-half-b">';
		echo '<a href="';
		echo tribe_get_event_link();
		echo '" rel="bookmark">';
		echo the_title();
		echo '</a>';
		echo '</h5>';
		echo '<p class="meta">';
		$tba = get_field('add_tba');
		if ($tba){
			echo get_field('tba_message');
		} else {
			echo tribe_events_event_schedule_details();
		}
		echo '</p>';
		//echo excerpt(40);
		echo '</li>';
	endforeach;
	echo "</ul><!-- .hfeed -->";
	}
	$event_url = tribe_get_events_link();
	echo '<hr class="faint"/><a class="btn btn-info" href="' . $event_url . '" rel="bookmark">';
				if ( empty( $category ) ) {
					_e( 'View All Events', 'tribe-events-calendar' );
				} else {
					_e( 'View All Events in Category', 'tribe-events-calendar' );
				}
				echo '<i class="fa fa-calendar fa-lg"></i></a>';
	wp_reset_postdata();
}
function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );