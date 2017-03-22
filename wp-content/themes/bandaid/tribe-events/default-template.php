<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>
<div class="platform-page tribe-events">
	<section id="panel-header">
		<div class="container">
			<div class="row">
				<div id="left-column" class="col-md-3 col-sm-3 text-center">
					<div class="v-center">
						<div class="v-in">
							<h1 class="bs-ap-title platform">Events</h1>
						</div>
					</div>
				</div>
				<div id="right-column" class="col-md-9 col-sm-9">

				</div>
			</div>
		</div>
	</section>
</div>
<div id="tribe-events-pg-template">

	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</div> <!-- #tribe-events-pg-template -->
<?php
get_footer();
