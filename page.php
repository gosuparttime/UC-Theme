<div class="hidden-xs">
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div><div class="row">
  <div class="col-xs-15">
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/featured', 'image'); ?>
<?php get_template_part('templates/content', 'page'); ?>
<? if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
} ?>
<?php $callout = get_field('office_information');
if ($callout){
	include(locate_template('templates/callout.php'));
}
?>
<?php endwhile; ?>
</div></div>