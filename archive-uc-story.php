<div class="hidden-xs">
  <p id="breadcrumbs"> <span prefix="v: http://rdf.data-vocabulary.org/#"> <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" rel="v:url" property="v:title">Home</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>/about-us/" rel="v:url" property="v:title">About Us</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>/about-us/alumni/" rel="v:url" property="v:title">Alumni</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title">UC Stories</span></span> </span></span></p>
</div>
<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/featured', 'image'); ?>
<?php

// The Query
$args = array(
	//'pagename' => 'office-directory-content',
	'page_id' => 490,
);
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	echo '<article>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		the_content();
	}
	echo '</article>';
	wp_reset_postdata();
	echo '<hr class="divide" />';
};
?>
<section id="staff-directory" role="complementary">
  <?php 
	if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'ucmaster'); ?>
  </div>
  <?php get_search_form(); ?>
  <?php endif; ?>
  <?php 
	$count = 0;
	while (have_posts()) : the_post(); ?>
  <? if ($count == 0){
			echo '<div class="row">';
		} ?>
  <div class="col-half mar-one-b">
    <div class="container-fluid"><div class="well"><div class="row">
      <?php 
		get_template_part('templates/content', 'story'); 
		$count++;
		 
		?>
    </div></div></div>
  </div>
  <? if ($count == 2){
			echo '</div>';
			$count = 0;
		}
      endwhile;
	  if ($count < 2){
		echo '</div>';
		//echo $count;
	  }
	  ?>
</section>
<?php if ($wp_query->max_num_pages > 1) : ?>
<nav class="post-nav">
  <ul class="pager">
    <li class="previous">
      <?php next_posts_link(__('&larr; Older posts', 'ucmaster')); ?>
    </li>
    <li class="next">
      <?php previous_posts_link(__('Newer posts &rarr;', 'ucmaster')); ?>
    </li>
  </ul>
</nav>
<?php endif; ?>
