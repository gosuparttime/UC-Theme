<div id="myCarousel" class="carousel slide"> 
  <!-- Carousel items -->
  <?php $myposts = get_field('featured_slides', 'option');
  ?>
  <div class="row">
    <div class="col-md-9 col-sm-15 slide-image">
      <div class="carousel-inner">
        <?php 
		
        foreach( $myposts as $post ) :  setup_postdata($post);
          $post_num++;
          $post_thumbnail_id = get_post_thumbnail_id();
          $featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'homepage-slide' );
      ?>
        <div class="<?php if($post_num == 1){ echo 'active'; } ?> item">
          <div class="full-bg" style="background-image:url(<? echo $featured_src[0] ?>)"> <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/scaled.png" class="scaled" /></div>
          <div class="carousel-caption">
            <div class="row">
              <div class="col-sm-5">
                <h2>
                  <?php the_title_attribute(); ?>
                </h2>
              </div>
              <div class="col-sm-10">
              <? the_content();?>
              <? $field = get_field_object('button_link');
				 $value = get_field('button_link');
				 $label = $field['choices'][ $value ];
				 if ($label == "Internal"){
					 $url = get_field('button_url');
					 echo '<a href="';
					 echo $url;
					 echo'" class="btn btn-primary"><i class="fa fa-chevron-right"></i>';
					 echo get_field('button_label');
					 echo '</a>';
				 } else {
					 $url = get_field('button_external_url');
					 echo '<a href="';
					 echo $url;
					 echo'" class="btn btn-primary"><i class="fa fa-chevron-right"></i>';
					 echo get_field('button_label');
					 echo '</a>';
				 }
			  ?>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <?php $post = $tmp_post; ?>
      </div>
    </div>
    <div class="col-md-6 slide-thumbs hidden-xs hidden-sm">
      <ol class="carousel-indicators">
        <?php
		$paginate = 0;
		foreach( $myposts as $post ) :  setup_postdata($post);
          ?>
        <li data-target="#myCarousel" data-slide-to="<? echo $paginate ?>" class="<?php if($paginate == 0){ echo 'active'; } ?> clearfix">
          <div class="carousel-thumb"><?php the_post_thumbnail( 'homepage-thumb' ); ?></div>
          <div class="carousel-caption">
            <h5>
              <?php the_title_attribute(); ?>
            </h5>
          </div>
          <div class="carousel-overlay"></div>
        </li>
        <? $paginate++;
      endforeach; ?>
      </ol>
    </div>
    <div class="visible-xs visible-sm"><a class="carousel-control left" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left fa-2x"></i></a> <a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right fa-2x"></i></a></div>
  </div>
</div>
