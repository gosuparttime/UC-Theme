<?php 
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>
<?php 

// Setup an array of venue details for use later in the template
$venue_details = array();

if ($venue_name = tribe_get_meta( 'tribe_event_venue_name' ) ) {
	$venue_details[] = $venue_name;	
}

if ($venue_address = tribe_get_meta( 'tribe_event_venue_address' ) ) {
	$venue_details[] = $venue_address;	
}
// Venue microformats
$has_venue_address = ( $venue_address ) ? ' location': '';

// Organizer
$organizer = tribe_get_organizer();

?>

<div class="row">
  <? if (has_post_thumbnail()) {
		echo '<div class="col-sm-3 col-xs-4 pull-right">';
	 	echo '<div class="thumbnail mar-two-t">';
  	 	the_post_thumbnail('feature-thumb');
  		echo '</div></div>';
		echo '<div class="col-sm-12 col-xs-11">';
  } else {
	  echo '<div class="col-xs-15">';
  }
  ?>
  <!-- Event Cost -->
  <?php if ( tribe_get_cost() ) : ?>
  <div class="tribe-events-event-cost"> <span><?php echo tribe_get_cost( null, true ); ?></span> </div>
  <?php endif; ?>
  
  <!-- Event Title -->
  <header>
    <?php do_action( 'tribe_events_before_the_event_title' ) ?>
    <h4 class="tribe-events-list-event-title entry-title summary news-feed"> <a href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
      <?php the_title() ?>
      </a> </h4>
    <?php do_action( 'tribe_events_after_the_event_title' ) ?>
    
    <!-- Event Meta -->
    <?php do_action( 'tribe_events_before_the_meta' ) ?>
    <div class="author <?php echo $has_venue_address; ?>"> 
      
      <!-- Schedule & Recurrence Details -->
      <p><strong><?php echo tribe_events_event_schedule_details() ?></strong></p>
      
    </div>
    <!-- .tribe-events-event-meta --> 
  </header>
  <section> 
    <!-- Event Image --> 
    <!-- Event Content -->
    <?php do_action( 'tribe_events_before_the_content' ) ?>
    <div class="tribe-events-list-event-description tribe-events-content description entry-summary">
      <?php echo excerpt(50, true); ?>
    </div>
    <!-- .tribe-events-list-event-description -->
    <?php do_action( 'tribe_events_after_the_content' ) ?>
  </section>
</div>
</div>
