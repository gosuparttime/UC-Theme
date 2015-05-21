<?php
// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'color' => 'default', /* primary, default, info, success, danger, warning, inverse */
	'url'  => '',
	'text' => '',
	'subtext' => '',
	'blank' => false,
	'block' => false,
	'size' => '',
	'icon'=>'',
	), $atts ) );
	
	if($color == "default"){
		$color = "btn btn-default";
	}
	else{ 
		$color = "btn btn-".$color;
	}
	if($blank == false){
		$blank = "_self";
	}
	else{ 
		$blank = "_blank";
	}
	if($block == true){
		$color = $color. " btn-block";
	}
	else{ 
		$color = $color;
	}
	if(! $icon){
		$icon = "fa-chevron-right";
	} else {
		$icon = "fa-".$icon;
	}
	if($size == "large"){
		$icon = $icon." fa-2x";
	}
	
		
	$output = '<a href="' . $url . '" class="'.$color.'" target="'.$blank.'" title="'.$text.'" role="button">';
	
	
	if($subtext){
		$output .= '<i class="pull-right fa ' . $icon . '"></i>';
		$output .= $text;
		$output .= '<br/><small>';
		$output .= $subtext;
		$output .= '</small>';
	} else{
		$output .= $text;
		$output .= '<i class="fa ' . $icon . '" aria-hidden="true"></i>';
	}
	$output .= '</a>';
	
	return $output;
}

add_shortcode('button', 'buttons');
//
// List Files for Publications and other file lists
//
function list_documents( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'cat' => '',
	'column' => '',
	'icon' => '',
	), $atts ) );
	
	if(empty ($cat)){
		$cat = "documents";
	}
	if(empty ($column) || $column == 1){
		$col = "list-unstyled";
	} else if ($column == 2){
		$col = "half-nav";
	}
	if(! $icon){
		$icon = "file-pdf-o";
	}
	$args = array( 
		'post_type' => 'attachment',
		'posts_per_page' => -1,
		'orderby'       => 'menu_order',
        'order'         => 'ASC',
        'suppress_filters' => false,
		'tax_query' => array(
       array(
          'taxonomy' => 'media_category',
          'field' => 'slug', // can also be either term ID or Slug
          'terms' => $cat,
   		))
	); 
	$output = '<ul class="'.$col.'">';
	$attachments = get_posts( $args );
	if ( $attachments ) {
		foreach ( $attachments as $post ) {
			setup_postdata( $post );
			$output .= '<li>';
			$text = get_the_title($post->ID );
			$url = wp_get_attachment_url( $post->ID );
			$subtext = get_the_excerpt();
			$output .= do_shortcode('[button text="'.$text.'" url="'.$url.'" subtext="'.$subtext.'" icon="'.$icon.'" blank="true" color="default" size="large"]');
			$output .= '</li>';
		}
		wp_reset_postdata();
	}
   $output .= '</ul>';
   return $output;
}

add_shortcode('list-docs', 'list_documents');
//
// Post Listings
function list_posts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'cat' => '',
	'items' => '',
	), $atts ) );
	if(empty ($items)){
		$items = "-1";
	}
	$col = "list-unstyled";
	$icon = "chevron-right";
	$myArray = explode(',', $cat);
	$args = array( 
		'posts_per_page' => $items,
		'cat' => $cat,
	); 
	$output = '<ul class="'.$col.'">';
	$posts = get_posts( $args );
	$count = 0;
	if ( $posts ) {
		foreach ( $posts as $post ) {
			setup_postdata( $post );
			$output .= '<li>';
			//$text = get_the_title($post->ID );
			//$url = get_permalink($post->ID );
			$subtext = excerpt(50, true);
			$output .= '<h4 class="entry-title"><a href="'.get_permalink($post->ID).'">';
      		$output .= get_the_title($post->ID);
      		$output .= '</a></h4>';
			$output .= $subtext;
			$output .= '</li>';
			$count++;
		}
		
	} else {
		$output .= '<p><em>These are currently no news items for '.get_the_title().'</em></p>';
	}
	wp_reset_postdata();
   	$output .= '</ul>';
   	if ($count == $items){
		$output .= '<hr class="faint" />';
	   	$output .= '<ul class="'.$col.'">';
	   	foreach ($myArray as $value) {
			$myCat = get_cat_name( $value );
			$category_link = get_category_link($value );
			$output .= '<li>'; 
			$output .= '<a class="btn btn-default" href="'.esc_url( $category_link ).'">';
			$output .= 'View more articles on: ' .$myCat;
			$output .= '<i class="fa fa-chevron-right"></i></a>';
			$output .= '</li>';
		}
	    $output .= '</ul>';
   }
   return $output;
}

add_shortcode('list-posts', 'list_posts');
//
// Show Staff
function show_staff( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'members' => '',
	), $atts ) );
	$myArray = explode(',', $members);
	ob_start();
	echo '<div class="row">';
	$stafz = new WP_Query(
        array ( 
		'posts_per_page' => -1,
		'post_type' => 'staff',
		'post__in' => $myArray,
		'order' => 'ASC',
	)); 
	if ($stafz->have_posts()) :
		$output .= '<div class="row">';
		while ($stafz->have_posts()) : $stafz->the_post();
			echo '<div class="col-xs-15 mar-one-b">';
			echo '<div class="row">';
			get_template_part('templates/content', 'staff-dir'); 
			echo '</div>';
			echo '</div>';
			
		endwhile;
		wp_reset_postdata();
	endif;
	
	echo '</div>';
  
   return ob_get_clean();
}

add_shortcode('show-staff', 'show_staff');
//
// Show Modules
function show_module( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => '',
		'heading' => '',
		'block' => '',
		'hide' => '',			
	), $atts ) );
	if (empty($heading)){
		$heading= '3';
	}
	if (empty($block)){
		$block= false;
	}
	if (empty($hide)){
		$hide= false;
	}
	ob_start();
	display_module($type, $heading, $block, $hide);
    return ob_get_clean();
}

add_shortcode('show-module', 'show_module');
//
// List Courses
function list_courses( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'format' => '',
	'nav' => false,
	), $atts ) );
	ob_start();
	$myTax = $format;
	$showNav = $nav;
	include(locate_template('templates/content-courses.php'));
    return ob_get_clean();
}

add_shortcode('list-courses', 'list_courses');
//
// List News
function show_news_feed( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'items' => '',
	'nav' => false,
	), $atts ) );
	if(empty ($items)){
		$items = "3";
	}
	ob_start(); ?>
	<ul class="list-unstyled">
            <?php
			$args = array( 'posts_per_page' => $items );
			$myposts = new WP_Query( $args );
			if ($myposts->have_posts()) :
			while ($myposts->have_posts()) : $myposts->the_post(); ?>
            <li>
              <h5 class="mar-half-b"> <a href="<? echo get_permalink(); ?>">
                <?php the_title(); ?>
                </a> </h5>
              <p class="meta"><em>
                <?php _e("Posted", "ucmaster"); ?>
                <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
                  <?php the_time('F j, Y'); ?>
                </time>
                <?php _e("by ", "ucmaster"); ?>
                <?php the_author(', '); ?>
                </em></p>
              <?php //echo excerpt(40);?></li>
            <?php
			endwhile;
			endif;
			wp_reset_postdata();
			?>
          </ul>
          <hr class="faint">
          <a class="btn btn-info" href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>" rel="bookmark">View All News<i class="fa fa-newspaper-o fa-lg"></i></a>
		  <? return ob_get_clean();
}

add_shortcode('show-news', 'show_news_feed');

// Show Hours
function show_hours( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'items' => '',
	'nav' => false,
	), $atts ) );
	ob_start();
	while ( have_rows('office_hours', 'option') ) : the_row();
	
			// display a sub field value
			echo '<h4>';
			the_sub_field('section_title', 'option');
			echo '</h4>';
			
			if( have_rows('hours') ):
			echo '<ul class="list-unstyled">';
			// loop through the rows of data
			while ( have_rows('hours') ) : the_row();
				echo '<li><strong>';
				$dayz = get_sub_field('days_week', 'option');
				$days = implode(', ', $dayz);
				if ($days == "Monday, Tuesday, Wednesday, Thursday, Friday"){
					echo 'Monday – Friday';
				} elseif ($days == "Monday, Tuesday, Wednesday"){
					echo 'Monday – Wednesday';
				}
				 else {
					echo $days;
				}
				echo '</strong><br />';
				the_sub_field('start_time', 'option');
				echo '&#8211;';
				the_sub_field('end_time', 'option');
				echo '</li>';
			endwhile;
			echo '</ul>';
		    endif;
			
		endwhile;
	return ob_get_clean();
}
add_shortcode('show-hours', 'show_hours');
//
// Show Events
function show_events( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'limit' => '',
	'cat' => '',
	), $atts ) );
	if(empty ($limit)){
		$limit = "3";
	}
	ob_start();
	display_events($limit, $cat);
    return ob_get_clean();
}

add_shortcode('show-events', 'show_events');
// Show Events
function show_forms( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'form' => '',
	), $atts ) );
	ob_start();
	get_template_part('forms/form', $form);
    return ob_get_clean();
}

add_shortcode('show-forms', 'show_forms');
//
// Add Events to CF7
function add_event_to_cf7($atts) {
	$cat = $atts['name'];
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
	$html = '';
	$posts = tribe_get_events( $args );
	$myCount = count($posts);
	if ($myCount == 0){
		$html .= '<br/><em class="red">Currently, there a no events are scheduled</em>';
	}
	$html .= '<select name="your-events" id="your-events" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required select form-control">';
	if ($myCount == 0){
		$html .= '<option value="Email New Events to Student">Email me when new events are scheduled</option>';
	} else {
		foreach( $posts as $post ) :
			setup_postdata( $post );
			$html .= '<option value="';
			$html .= tribe_get_start_date(null,true,'F j, Y  \- g:i a');
			$html .= ' &#8211; ';
			$html .= tribe_get_end_date(null,true,'g:i a');
			$html .= '">';
			$html .= tribe_get_start_date(null,true,'F j, Y \- g:i a');
			$html .= ' &#8211; ';
			$html .= tribe_get_end_date(null,true,'g:i a');
			$html .= '</option>';
		endforeach;
	}
	$html .= '<option value="Make Advisement Appointment">Contact me to schedule an appointment for individual advisement</option>';
	$html .='</select>';
	
	return $html;
}
wpcf7_add_shortcode('wpcf7_add_wd', 'add_event_to_cf7', true);
