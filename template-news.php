<?php
/*
Template Name: Select News Feed Template
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
<?php 
$term = get_field('choose_news_category');
//print_r($term);
if( $term ):
	echo '<hr class="divide">';
	echo '<h3>';
	echo 'News About: '.get_the_title();
	echo '</h3>';
	$cats = implode(",", $term);
	echo do_shortcode('[list-posts cat="'.$cats.'" items="5"]');
endif; 
endwhile; ?>
</div></div>