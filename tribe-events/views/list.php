<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views 
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<p id="breadcrumbs"> <span prefix="v: http://rdf.data-vocabulary.org/#"> <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" rel="v:url" property="v:title">Home</a></span> | <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>news-events" rel="v:url" property="v:title">News &amp; Events</a></span> | <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>news-events/calendar-events/" rel="v:url" property="v:title">Calendar &amp; Events</a></span> | <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title">University College Events</span></span> </span></p>
<!-- List Title -->
<header class="page-header">
  <h1 class="tribe-events-page-title">University College Events</h1>
</header>
<?php do_action( 'tribe_events_before_template' ); ?>

<!-- Tribe Bar -->
<?php tribe_get_template_part( 'modules/bar' ); ?>

<!-- Main Events Content -->
<?php tribe_get_template_part( 'list/content' ); ?>
<div class="tribe-clear"></div>
<?php do_action( 'tribe_events_after_template' ) ?>
