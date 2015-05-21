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