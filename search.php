<div class="hidden-xs">
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
</div>
<?php get_template_part('templates/page', 'header'); 
	
	
    if (!have_posts()) : ?>
<div class="alert alert-warning">
  <?php _e('Sorry, no results were found.', 'ucmaster'); ?>
</div>
<hr class="divide" />
<section id="staff-search" role="complementary">
  <div class="row">
    <div class="col-half">
      <div class="col-xs-15">
        <h3 class="zero-mar-t">Search the <? echo get_bloginfo('name'); ?> Web Site</h3>
        <p>Try searching the University College web site again for information</p>
        <?php get_search_form(); ?>
      </div>
    </div>
    <div class="col-half">
      <div class="col-xs-15">
        <? ucstaff_search_form(); ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
	$count = 0;
	$last_type="";
$typecount = 0;
	while (have_posts()) : the_post(); 
	 if ($last_type != $post->post_type){
        $typecount = $typecount + 1;
        if ($typecount > 1){
            echo '</div></div><hr class="divide" />'; //close type container
        }
        // save the post type.
        $last_type = $post->post_type;
		
        //open type container
        switch ($post->post_type) {
            case 'post':
                echo '<div class="clearfix"><h2>News Articles</h2><div class="row">';
                break;
            case 'page':
                echo '<div class="clearfix"><h2>Pages</h2><div class="row">';
                break;
            case 'staff':
                echo '<div class="clearfix"><h2>Staff Members</h2>';
                break;
            case 'office':
                echo '<div class="clearfix"><h2>Offices</h2><div class="row">';
                break;
            case 'uc-story':
                echo '<div class="clearfix"><h2>UC Stories</h2><div class="row">';
                break;
			case 'tribe_events':
                echo '<div class="clearfix"><h2>Events</h2><div class="row">';
                break;
            //add as many as you need.
        }
    } 
	$post_type = get_post_type();
	
	if ($post_type == "staff"){
	
    	if ($count == 0){
			echo '<div class="row">';
		} 
		echo '<div class="col-sm-5 mar-one-b">';
  		echo '<div class="row">'; 
		get_template_part('templates/content', 'staff-dir'); 
		$count++;
		echo '</div></div>';
		if ($count == 3){
			echo '<div class="col-xs-15 hidden-xs"><hr class="faint"/></div></div>';
			$count = 0;
		}
	} else {
		echo '<div class="col-sm-14">';
		get_template_part('templates/content', 'search');
		echo '</div></div>';
	} 
endwhile; 
echo '</div>';?>
<?php if ($wp_query->max_num_pages > 1) : ?>
<hr class="divide" />
<?php
    // custom function to output Bootstrap pagination added in custom.php
    page_navi();
  ?>
<?php endif; ?>
</div>
</div>
