<?php
/*
Template Name: Form Page Template
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
<?php get_template_part('templates/content', 'page'); ?>
<?php 
$form = get_field('choose_form');
get_template_part('forms/form', $form); ?>
<?php endwhile; ?>
<? if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
} ?>
</div></div>