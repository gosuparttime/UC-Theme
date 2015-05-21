<? $post = $callout;
	setup_postdata( $post );
	$title = get_field('callout_title');
?>
<hr class="divide" /><h3 class="zero-mar-t">
      <?php
	  if (!empty($title)){
		  echo $title; 
	  } else {
		  the_title();
	  } ?>
    </h3>
<div class="row" id="callout" role="complementary">
  <div class="col-sm-10 col-xs-15">
    
    <?php the_content(); ?>
  </div>
  <div class="col-sm-5 col-xs-15">
    <? if( have_rows('add_button') ):
 	// loop through the rows of data
    while ( have_rows('add_button') ) : the_row();
        // display a sub field value
        $url = get_sub_field('button_url');
		$script = get_sub_field('button_scripts');
		$owl = get_sub_field('outside_url');
        $cta = get_sub_field('button_cta');
	    $icon = get_sub_field('button_icon');
		echo '<a class="btn btn-block btn-primary" href="';
		if (!empty($url)){
			echo get_permalink($url);
			echo '">';
		} else if (!empty($owl)){
			echo $owl;
			echo '" target="_blank">';
		} else if (!empty($script)){
			echo '" ';
			echo $script;
			echo '>';
		} else{
			echo '/">';
		}
		echo '<i class="fa ';
		echo $icon;
		echo ' fa-lg" aria-hidden="true"></i>';
		if (!empty($cta)){
			echo $cta; 
		  } else {
			echo get_the_title($url);
		  }
		echo '</a>';
    endwhile;
	else :
	// no rows found
	endif; ?>
  </div>
</div>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
