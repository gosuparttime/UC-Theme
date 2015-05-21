<?php
/*
Template Name: Degree / Certificate Template
*/
?>

<div class="hidden-xs">
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>
<?php get_template_part('templates/featured', 'image'); ?>
<?php get_template_part('templates/content', 'degree'); ?>
