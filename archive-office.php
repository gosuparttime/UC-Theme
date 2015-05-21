<? 
//global $page_head;
$page_head = "Office Directory";
?>
<div class="hidden-xs">
  <p id="breadcrumbs"> <span prefix="v: http://rdf.data-vocabulary.org/#"> <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" rel="v:url" property="v:title">Home</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>directory" rel="v:url" property="v:title">Directory</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title">Office Directory</span></span> </span></p>
</div>
<?php get_template_part('templates/page', 'header'); ?>
<?php

// The Query
$args = array(
	//'pagename' => 'office-directory-content',
	'page_id' => 659,
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
<section id="office-directory" role="complementary">
  <?php 
	//query_posts($query_string . '&orderby=title&order=asc');
if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'ucmaster'); ?>
  </div>
  <?php get_search_form(); ?>
  <?php endif; ?>
  <table class="table table-hover" border="0" cellspacing="0" cellpadding="0">
    <caption class="sr-only">
    Office Directory
    </caption>
    <thead>
      <tr>
        <th width="50%">Office</th>
        <th width="25%">Phone</th>
        <th width="25%">Email</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	
	while (have_posts()) : the_post(); ?>
      <tr>
        <?php get_template_part('templates/content', 'office-dir'); ?>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
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
