<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

$event_id = get_the_ID();

?>

<p id="breadcrumbs"> <span prefix="v: http://rdf.data-vocabulary.org/#"> <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" rel="v:url" property="v:title">Home</a></span> | <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>news-events" rel="v:url" property="v:title">News &amp; Events</a></span> | <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>news-events/calendar-events/" rel="v:url" property="v:title">Calendar &amp; Events</a></span> | <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>university-college-events/" rel="v:url" property="v:title">University College Events</a></span> | <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title"><?php echo the_title(); ?></span></span> </span></p>
<div class="row" id="tribe-events-content">
  <div class="col-sm-10 col-xs-15">
    <div class="tribe-events-single vevent hentry"> 
      
      <!-- Notices -->
      <?php tribe_events_the_notices() ?>
      <?php the_title( '<header class="page-header"><h1>', '</h1></header>' ); ?>
      <div class="tribe-events-schedule updated published tribe-clearfix"> <?php echo tribe_events_event_schedule_details( $event_id, '<h4 class="zero-mar-t zero-mar-b">', '</h4>'); ?>
        <?php  if ( tribe_get_cost() ) :  ?>
        <span class="tribe-events-divider">|</span> <span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
        <?php endif; ?>
      </div>
      
      <!-- Event header -->
      <div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
        <hr class="divide" />
      </div>
      <!-- #tribe-events-header -->
      
      <?php while ( have_posts() ) :  the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
        <!-- Event featured image, but exclude link --> 
        <? 	if (has_post_thumbnail()) {
			echo '<div class="thumbnail">';
  	 		the_post_thumbnail('news-head');
  			echo '</div>';
  		} 
  	?>
        
        <!-- Event content -->
        <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
        <div class="tribe-events-single-event-description tribe-events-content entry-content description">
          <?php the_content(); ?>
        </div>
        <!-- .tribe-events-single-event-description -->
        
      </div>
      <!-- #post-x -->
      <?php if( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
      <?php endwhile; ?>
    </div>
    <!-- #tribe-events-content --> 
  </div>
  <aside class="col-sm-5 col-xs-15" id="sidebar"><!-- Event meta -->
    <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
    <?php
				/**
				 * The tribe_events_single_event_meta() function has been deprecated and has been
				 * left in place only to help customers with existing meta factory customizations
				 * to transition: if you are one of those users, please review the new meta templates
				 * and make the switch!
				 */
				if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) )
					tribe_get_template_part( 'modules/meta' );
				else echo tribe_events_single_event_meta()
				?>
    <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
  </aside>
  <div class="col-sm-10 col-xs-15">
  <? if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
} ?>
  <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
    <!-- Event footer -->
    <div id="tribe-events-footer"> 
      <!-- Navigation --> 
      <!-- Navigation -->
      <h3 class="tribe-events-visuallyhidden">
        <?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?>
      </h3>
      
      <!-- .tribe-events-sub-nav -->
      <p class="tribe-events-back"><a href="<?php echo tribe_get_events_link() ?>" class="btn btn-default">
        <?php _e( '<i class="fa fa-arrow-left"></i> Back To All Events', 'tribe-events-calendar' ) ?>
        </a></p>
    </div>
    <!-- #tribe-events-footer --> 
  </div>
</div>
<!-- row-->