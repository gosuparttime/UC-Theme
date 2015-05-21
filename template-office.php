<?php
/*
Template Name: Office Template
*/
?>

<div class="hidden-xs">
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>

<?php get_template_part('templates/content', 'office'); ?>
