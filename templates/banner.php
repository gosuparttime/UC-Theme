<div class="hidden-xs">
  <div id="page-banner">
    <div class="banner-image"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/banners/rotate.php" alt="Images of Syracuse University" /></div>
    <div class="page-header">
      <h2>
        <?php 
			if (is_singular('post')){
				echo get_the_title('679');
			} elseif (is_page() && $post->post_parent){
				$parent_title = get_the_title($post->post_parent);
				echo $parent_title;
			} elseif (is_singular('uc-story')){
				echo 'UC Stories';
			} elseif (is_singular('staff')){
				echo 'Staff Directory';
			} elseif (is_404()){
				echo 'Page Not Found';
			} elseif (get_post_type() == "tribe_events") {
   				echo 'University College Events';
			} else {
				echo ucmaster_title();
			}
			//$parent_title = get_the_title($post->post_parent);
				//echo $parent_title;
		?>
      </h2>
    </div>
  </div>
</div>
