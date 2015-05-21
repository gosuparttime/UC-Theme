<?php

/**
 *
 * Please see single-event.php in this directory for detailed instructions on how to use and modify these templates.
 *
 */

?>

<script type="text/html" id="tribe_tmpl_tooltip">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">
		<h3 class="popover-title">[[=title]]</h3>
		<div class="popover-content">
			<div class="meta">
				<abbr class="tribe-events-abbr updated published dtstart">[[=startTime]] </abbr>
				[[ if(endTime.length) { ]]
				-<abbr class="tribe-events-abbr dtend"> [[=endTime]]</abbr>
				[[ } ]]
			</div>
			[[ if(imageTooltipSrc.length) { ]]
			<div class="tribe-events-event-thumb">
				<img src="[[=imageTooltipSrc]]" alt="[[=title]]" />
			</div>
			[[ } ]]
			[[ if(excerpt.length) { ]]
			<p>[[=raw excerpt]]</p>
			[[ } ]]
			<span class="tribe-events-arrow"></span>
		</div>
	</div>
</script>