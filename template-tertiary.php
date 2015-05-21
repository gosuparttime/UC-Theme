<?php
/*
Template Name: Online Course Template
*/
?>

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
<hr class="divide" />
<?php 
	$myTax = "online";
	$showNav = true;
	include(locate_template('templates/content-courses.php')); ?>
<?php endwhile; ?>
</div></div>