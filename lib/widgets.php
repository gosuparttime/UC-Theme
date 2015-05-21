<?

// Page Widget
class PageWidget extends WP_Widget
{
  function PageWidget()
  {
    $widget_ops = array('classname' => 'PageWidget', 'description' => 'Displays information from selected page' );
    $this->WP_Widget('PageWidget', 'Page Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'available' => '', 'checkbox' => '', ) );
	$available = $instance['available'];
	$checkbox = $instance['checkbox'];
	$query = new WP_Query(array( 'post_type' => 'page', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
<p>
  <label for="<?php echo $this->get_field_id('available'); ?>">Choose A Module: </label>
  <select id="<?php echo $this->get_field_id('available'); ?>" name="<?php echo $this->get_field_name('available'); ?>" class="widefat" style="width:100%;">
    <? while ( $query->have_posts() ) : $query->the_post();
  $id = get_the_ID();?>
    <option <?php selected( $instance['available'], $id ); ?> value="<?php echo $id; ?>"><?php echo the_title(); ?></option>
    <? endwhile;
  	wp_reset_postdata(); ?>
  </select>
<p>
  <input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?>/>
  <label for="<?php echo $this->get_field_id('checkbox'); ?>">
    <?php _e('Remove Title'); ?>
  </label>
</p>
</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['checkbox'] = $new_instance['checkbox'];
	$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$checkbox = empty($instance['checkbox']) ? ' ' : apply_filters('widget_title', $instance['checkbox']);
	$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'page', 'page_id' => $available));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	
	if ($checkbox !="1"){
		echo $before_title;
		echo the_title();
		echo $after_title;
	}
	
    
    // WIDGET CODE GOES HERE
   
  	if (get_field('page_summary')){
		the_field('page_summary');
	} else {
		echo the_excerpt();
	}
	echo '<div class="clearfix pad-one-b"><a class="btn-default" href="';
	echo get_permalink();
	echo '">';
	if (get_field('page_action')){
		the_field('page_action');
	} else {
		echo the_title();
	}
	echo ' <i class="icon-chevron-right"></i></a></div>';
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("PageWidget");') );

/**
 * Search widget class
 *
 * @since 2.8.0
 */
class WP_Post_Search extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'SearchWidget', 'description' => 'Displays search results for posts' );
    	$this->WP_Widget('Search Posts Widget', 'Search Posts Widget', $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

		// Use current theme search form if it exists
		get_search_form();

		echo $after_widget;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

}
add_action( 'widgets_init', create_function('', 'return register_widget("WP_Post_Search");') );