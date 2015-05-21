<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/tribe-events-bar.class.php
 *
 * @package TribeEventsCalendar
 *
 */
?>

<?php

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();

global $wp;
$current_url = esc_url( add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );

 ?>

<?php do_action('tribe_events_bar_before_template') ?>
<div id="tribe-events-bar">
	<div class="row">
	<form id="tribe-bar-form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="<?php echo esc_attr( $current_url ); ?>">

		<!-- Mobile Filters Toggle -->
		
		<!-- Views -->
		<?php if ( count( $views ) > 1 ) { ?>
		<div id="tribe-bar-views" class="col-sm-4 col-sm-push-11 col-xs-15">
			<div class="tribe-bar-views-inner tribe-clearfix">
				<h3 class="tribe-events-visuallyhidden sr-only"><?php _e( 'Event Views Navigation', 'tribe-events-calendar' ) ?></h3>
				<label><?php _e( 'View As', 'tribe-events-calendar' ); ?></label>
				<select class="tribe-bar-views-select tribe-no-param" name="tribe-bar-view">
					<?php foreach ( $views as $view ) : ?>
						<option <?php echo tribe_is_view($view['displaying']) ? 'selected' : 'tribe-inactive' ?> value="<?php echo $view['url'] ?>" data-view="<?php echo $view['displaying'] ?>">
							<?php echo $view['anchor'] ?>
						</option>
					<?php endforeach; ?>
				</select>
                
			</div><!-- .tribe-bar-views-inner -->
		</div><!-- .tribe-bar-views -->
		

		<?php if ( !empty( $filters ) ) { ?>
		<div class="tribe-bar-filters col-sm-11 col-sm-pull-4 col-xs-15">
			<div class="tribe-bar-filters-inner tribe-clearfix">
				<?php foreach ( $filters as $filter ) : ?>
					<div class="<?php echo esc_attr( $filter['name'] ) ?>-filter">
						<label class="label-<?php echo esc_attr( $filter['name'] ) ?>" for="<?php echo esc_attr( $filter['name'] ) ?>"><?php echo $filter['caption'] ?></label>
						<?php echo $filter['html'] ?>
					</div>
				<?php endforeach; ?>
				<div class="tribe-bar-submit">
					
      <button type="submit" name="submit-bar" class="search-submit btn btn-primary"><?php _e('<i class="fa fa-search"></i> Find Events', 'ucmaster'); ?></button>
				</div><!-- .tribe-bar-submit -->
			</div><!-- .tribe-bar-filters-inner -->
		</div><!-- .tribe-bar-filters -->
		<?php } // if ( !empty( $filters ) ) ?>
		
		<?php } // if ( count( $views ) > 1 ) ?>
	</form><!-- #tribe-bar-form -->
</div>
</div><!-- #tribe-events-bar -->
<?php do_action('tribe_events_bar_after_template') ?>
