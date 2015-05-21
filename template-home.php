<?php
/*
Template Name: Homepage Template
*/
?>

<div class="row first-row">
  <div class="col-md-9">
    <?php while (have_posts()) : the_post(); ?>
    <div class="content mar-one-r"><?php get_template_part('templates/page', 'header'); ?>
    
      <?php get_template_part('templates/content', 'page'); ?>
	  <?php endwhile; ?>
      <div class="clearfix pad-one-t" id="quick-nav" role="navigation">
         <? if( have_rows('add_callouts', 'option') ):
				$myCount = get_field('add_callouts', 'option');
				$btnItems = count($myCount);
				if( $btnItems == 2 || $btnItems == 4 ){
					echo '<ul class="list-unstyled row">';
				} else {
					echo '<ul class="list-unstyled row">';
				}
				while ( have_rows('add_callouts', 'option') ) : the_row();	
					$btnText = get_sub_field('button_text', 'option');	
					$btnURL = get_sub_field('button_url', 'option');	
					$btnColor = get_sub_field('button_color', 'option');	
					$btnIcon = get_sub_field('button_icon', 'option');	
					if( $btnItems == 2 || $btnItems == 4 ){
						echo '<li class="col-half pad-one-lr mar-one-b clearfix">';
					} else {
						echo '<li class="col-sm-5 clearfix">';
					}
					echo '<a href="';
					echo $btnURL;
					echo '" class="btn btn-block btn-';
					echo $btnColor;
					echo ' clearfix"><i class="fa ';
					echo $btnIcon;
					echo ' fa-2x" aria-hidden="true"></i><span>';
					echo $btnText;
					echo '</span></a></li>';
				endwhile;
				echo '</ul>';
			else :			
			// no rows found
			endif; ?>      
      </div>
    </div>
    
  </div>
  <aside class="col-md-6 hidden-sm hidden-xs" id="featurette">
    <?php get_template_part('templates/content', 'feature'); ?>
  </aside>
</div>
</div>
</div>
<div class="light-gray-bg spacer pad-one-tb">
  <div class="container">
  
    <ul class="second-row row">
      <li class="col-sm-5">
        <? get_feature_content('col1_featured'); ?>
      </li>
      <li class="col-sm-5">
        <? get_feature_content('col2_featured'); ?>
      </li>
      <li class="col-sm-5">
        <? get_feature_content('col3_featured'); ?>
      </li>
    </ul>
  </div>
</div>
<div class="white-bg spacer">
  <div class="container">
    <div id="third-row">
      <div class="col-sm-10 col-sm-push-5 creamsicle-bg constrictor">
        <h3>University College News</h3>
        <div class="pad-one-b clearfix" id="news-feed">
          <ul class="list-unstyled row widget">
            <?php
			$args = array( 'posts_per_page' => 3 );
			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <li class="col-md-5">
              <h5 class="news-feed"> <a href="<? echo get_permalink(); ?>">
                <?php the_title(); ?>
                </a> </h5>
              <p class="meta"><em>
                <?php _e("Posted", "ocl-theme"); ?>
                <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
                  <?php the_time('F j, Y'); ?>
                </time>
                <?php _e("by ", "ucmaster"); ?>
                <?php the_author(', '); ?>
                </em></p>
              <?php echo excerpt(50);?> </li>
            <?php
			endforeach; 
			wp_reset_postdata();
		?>
          </ul>
          <a class="btn btn-default" href="/news-events/university-college-news/">Read All University College News <i class="fa fa-chevron-right" aria-hidden="true"></i></a> </div>
      </div>
      <div class="col-sm-5 col-sm-pull-10 feed-bg constrictor">
        <h3>University College Social</h3>
        <div class="pad-one-b">
          <div class=""><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#facebook" role="tab" data-toggle="tab"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>Facebook</a></li>
              <li><a href="#twitter" role="tab" data-toggle="tab"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i>Twitter</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content ">
              <div class="tab-pane active" id="facebook">
                <div class="scroller">
                  <div class="widget">
                    <?php recent_facebook_posts(array('likes' => 1, 'excerpt_length' => 140, 'show_page_link' => 0, 'show_link_previews' => 1)); ?>
                  </div>
                </div>
                <a href="https://www.facebook.com/UniversityCollegeSU" target="_blank" class="btn btn-default">University College Facebook&nbsp;Page&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div>
              <div class="tab-pane" id="twitter">
                <?php myTweets('gosuparttime'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
