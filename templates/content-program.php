<?php while (have_posts()) : the_post(); ?>
<article class="row">
  <?
  $sidebar = get_field('add_sidebar');
  	if ($sidebar){
		echo '<div class="col-sm-10">';
	} else {
		echo '<div class="col-sm-15">';
  	}
  ?>
  <header>
    <div class="page-header">
  <h1>
    <?php echo ucmaster_title(); ?>
  </h1>
</div>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
    </div>
    </div>
    <? if ($sidebar){
	$addDocs = get_field('applicable_downloads');
	$addContact = get_field('contact');
	$myPages= get_field('additional_pages');
	$addDetails = get_field('submit_details');

	echo '<aside class="col-sm-5" id="right-side">';
	if ($addDetails){
	  echo '<h3>Additional Information</h3>';
	  if (!empty($myPages)){
			foreach( $myPages as $post):
			echo '<a class="btn btn-primary btn-block" href="';
			echo get_permalink();
			echo '"><i class="fa fa-chevron-right" aria-hidden="true"></i>';
			echo get_the_title();
			echo '</a>';
		endforeach;		
		wp_reset_postdata();
	  }
	  
	}
	if ($addDocs){
	  $myDocs= get_field('downloads');
	  if (!empty($myDocs)){
		echo '<h3>Downloads</h3>';
		foreach( $myDocs as $post):
			$description = $post->post_content;
			echo '<a class="btn btn-download btn-block" href="';
			echo wp_get_attachment_url();
			echo '"><i class="fa fa-download fa-lg" aria-hidden="true"></i>';
			echo get_the_title();
			if (!empty($description)){
				echo '<small>';
				echo $description;
				echo '</small>';
			}
			echo '</a>';
		endforeach;		
		wp_reset_postdata();
	  }
	}
	echo '<h3>Contact</h3>';
	if ($addContact == "External SU Staff"){
		  	$myStaff= get_field('staff_information');
		  	if (have_rows('staff_information')):
				
				while( have_rows('staff_information') ): the_row(); 
				echo '<div class="row pad-one-b">';
				$image = get_sub_field('staff_photo');
				if (!empty($image)){
					echo '<div class="col-sm-6 col-xs-5">';
					echo '<div class="thumbnail">';
					$size = 'feature-thumb';
					echo wp_get_attachment_image( $image, $size );
					echo '</div>';
					echo '</div><div class="col-sm-9 col-xs-10 zero-pad-l widget">';
				} else {
					echo '<div class="col-sm-15 col-xs-15 widget">';
				}
				$staffPhone = get_sub_field('phone');
				if (empty($staffPhone)){
					$staffPhone = $myPhone;
				}
				$staffEmail = get_sub_field('email');
				echo '<h5 class="zero-mar-t">';
				echo get_sub_field('staff_name');
				echo '</h5>';
				echo '<ul class="list-unstyled">';
				if( get_sub_field('positions') ):
					echo '<em class="meta">';
					echo get_sub_field('positions');
					echo '</em>';
				endif;
				echo '<li><a href="mailto:'.$staffEmail.'">';
				echo $staffEmail;
				echo '</a></li>';
				if (! empty($staffPhone)){
					echo '<li>';
					echo '<a href="tel:'.$staffPhone.'">';
					echo $staffPhone;
					echo '</a></li>';
				}
				echo '</ul>';
				
				echo '</div>';
				$content = get_sub_field('staff_information');
				if (!empty($content)){
					echo '<div class="col-xs-15 mar-one-tb widget">';
					echo $content;
					echo '</div>';
				}
				echo '</div>';	
			endwhile;
			wp_reset_postdata();
			//echo '</div>';
		endif;
		  
	  } else {
		  $myStaff= get_field('choose_staff');
		  if (!empty($myStaff)){
			
			foreach( $myStaff as $post):
				setup_postdata($post); 		 
				echo '<div class="row pad-one-b">';
				get_template_part('templates/content', 'staff-dir');	
				echo '</div>';	
			endforeach;	
			wp_reset_postdata();
			//echo '</div>';
		  } else {
			  echo '<ul class="list-unstyled">';
			  echo '<li><strong>';
			  echo get_bloginfo('name');
			  echo '</strong></li><li><a href="mailto:"';
			  echo get_field ('email', 'options');
			  echo '">';
			  echo get_field ('email', 'options');
			  echo '</a></li><li><a href="tel:"1.';
			  echo get_field ('phone', 'options');
			  echo '">';
			  echo get_field ('phone', 'options');
			  echo '</a></li></ul>';
		  }
		  
	  }
	  
	  echo '</div></div></aside>';
	}
	  ?>
  </div>
  <footer> </footer>
</article>
<?php endwhile; ?>

