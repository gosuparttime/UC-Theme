<?php
/*
Template Name: Specific Program / Opportunity Template
*/
?>

<div class="hidden-xs">
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>

<?php get_template_part('templates/content', 'program'); ?>
<? if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
} ?>