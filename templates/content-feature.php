<div class="carousel slide" id="feature-slider">
<? $posts = get_field('add_features', 'option');
	$paginate = 0;
	if( $posts ): ?>
<div class="carousel-inner">
  <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
  <?php setup_postdata($post); 
        $bg_color = get_field('background_color');
?>
  <div class="constrictor item <?php if($paginate == 0){ echo 'active'; } ?>" style="background: <?php echo $bg_color ?>;">
    <div class="fitter">
      <div class="pad-one-lr">
        <?php the_content(); ?>
        <? 
		$radio = get_field('in_out_link');
		$inside = get_field('page_link');
		$outside = get_field('external_link');
		$cta = get_field('call_to_action');
		if ($radio == "Inside"){
			if (!empty($inside)){
				echo '<a class="btn btn-default" title ="'.$cta.'" href="';
				echo $inside;
				echo '">';
				echo get_field('call_to_action');
				echo '<i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
			}
		} else {
			if (!empty($outside)){
				echo '<a class="btn btn-default" title ="'.$cta.'"  href="';
				echo $outside;
				echo '">';
				echo get_field('call_to_action');
				echo '<i class="fa fa-external-link" aria-hidden="true"></i></a>';
			}
		}
		?>
      </div>
    </div>
  </div>
  <?
$paginate++;
endforeach;
wp_reset_postdata();
echo '</div>';
endif;
?>
  <div class="slider-nav">
    <div class="nav-arrow"><a class="left" href="#feature-slider" data-slide="prev" title ="previous slide"><i class="fa fa-chevron-left" aria-hidden="true"></i><span class="sr-only">Next Slide</span></a></div>
    <ol class="carousel-indicators carousel-nav pull-left">
      <?php
        $myposts = get_field('add_features', 'option');
		$pager = 0;
		foreach( $myposts as $post ) :  setup_postdata($post);
          ?>
      <li data-target="#feature-slider" data-slide-to="<? echo $pager ?>" class="indicate <?php if($pager == 0){ echo 'active'; } ?>"></li>
      <? $pager++;
      endforeach; 
	  wp_reset_postdata(); ?>
      
    </ol><div class="nav-arrow"><a class="right" href="#feature-slider" data-slide="next" title ="next slide"><i class="fa fa-chevron-right" aria-hidden="true"></i><span class="sr-only">Next Slide</span></a></div>
  </div>
</div>
