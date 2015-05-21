<?php
/*
Template Name: Scholarship Template
*/
?>

<div class="hidden-xs">
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>
<article class="row">
<?php while (have_posts()) : the_post(); ?>

<?php get_template_part('templates/content', 'scholarship'); ?>
</article>
<footer>
<? if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
} ?>
</footer>
<?php $callout = get_field('office_information');

if ($callout){
	echo '<div class="row"><div class="col-xs-15">';
	include(locate_template('templates/callout.php'));
	echo '</div></div>';
}
?>
<?php endwhile; ?>

