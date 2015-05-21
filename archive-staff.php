<div class="hidden-xs">
  <p id="breadcrumbs"> <span prefix="v: http://rdf.data-vocabulary.org/#"> <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>" rel="v:url" property="v:title">Home</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>directory" rel="v:url" property="v:title">Directory</a></span> &nbsp;|&nbsp; <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title">Staff Directory</span></span> </span></p>
</div>
<?php get_template_part('templates/page', 'header'); ?>
<?php

// The Query
$args = array(
	//'pagename' => 'office-directory-content',
	'page_id' => 658,
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
<section id="staff-search" role="complementary">
  <div class="row">
    <div class="col-half">
      <div class="col-xs-15">
        <? ucstaff_search_form(); ?>
      </div>
    </div>
    <div class="col-half">
      <div class="col-xs-15">
        <? get_my_page('659'); ?>
      </div>
    </div>
  </div>
  <hr class="divide" />
</section>
<section id="staff-directory" role="complementary">
  <?php 
    add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
    $loop = new WP_Query(
        array (
            'post_type' => 'staff',
            'staff-type' => $type
        )
    );
	if (! $loop->have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'ucmaster'); ?>
  </div>
  <?php get_search_form(); ?>
  <?php endif; ?>
  <?php 
	$count = 0;
	while ($loop->have_posts()) : $loop->the_post(); ?>
  <? if ($count == 0){
			echo '<div class="row">';
		} ?>
  <div class="col-sm-5 mar-one-b">
    <div class="row">
      <?php 
		get_template_part('templates/content', 'staff-dir'); 
		$count++;
		 
		?>
    </div>
  </div>
  <? if ($count == 3){
			echo '<div class="col-xs-15 hidden-xs"><hr class="faint"/></div></div>';
			$count = 0;
		}
      endwhile;
	  if ($count < 3){
		echo '</div>';
		//echo $count;
	  }
	  remove_filter( 'posts_orderby' , 'posts_orderby_lastname' );
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
