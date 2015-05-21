<?php while (have_posts()) : the_post(); ?>
<article class="row">
  <div class="col-sm-10">
  <header>
    <div class="page-header">
  <h1>
    <?php echo ucmaster_title(); ?>
  </h1>
</div>
  </header>
  <div class="entry-content">
    <?php 
	  
		  $myLoc = get_field('office_location');
		  $myEmail = get_field('office_email');
		  $myPhone = get_field('office_phone');
		  $myFax = get_field('office_fax');
		  $myHours = get_field('office_hours');
		  $myContact = get_field('add_contact');
		  $myForms = get_field('form_url');
		  $myStaff = get_field('staff_members');
		  $myURL = get_field('sep_url');
		  if ($myURL){
		  	$mySite = get_field('office_website');
		  }
	  
	  the_content();
	  if (!empty($myStaff)){
	  	echo '<hr class="divide"/><h3>Staff Members</h3>';
		//echo '<div class="row">';
		$count = 0;
		foreach( $myStaff as $post):
			setup_postdata($post);
			if ($count == 0){
				echo '<div class="row">';
			} 
			echo '<div class="col-half clearfix pad-one-b">';
			get_template_part('templates/content', 'staff-dir');
			//echo $count;
			$count++;
			echo '</div>';
			if ($count == 2){
				echo '<div class="col-xs-15 hidden-xs"><hr class="faint"/></div></div>';
				$count = 0;
			}
		endforeach;
			if ($count > 0){
				echo '</div>';
				$count = 0;
			}
		wp_reset_postdata();
		//echo '</div>';
	  }
	  echo '</div></div>';
	  echo '<aside class="col-sm-5" id="right-side">';
	  echo '<h3>Contact Us:</h3>';
	  echo '<div class="row"><div class="col-sm-15 col-xs-8">';
	  echo '<p><strong>';
	  echo the_title();
	  echo '</strong><br />';
	  echo bloginfo( 'name' ).'<br />';
	  echo get_field('location', 'option').'<br />';
	  if (! empty($myLoc)){
		  echo $myLoc;
	  	  echo '<br />';
	  }
	  echo 'Syracuse, NY 13244';
	  echo '</p>';
	  if (! empty($mySite)){
		  echo '<p><strong>Website:</strong><br />';
		  echo '<a href="'.$mySite.'">';
		  echo $mySite;
		  echo '</a></p>';
	  }
	  echo '<p><strong>E-mail:</strong><br />';
	  if (! empty($myEmail)){
		  echo '<a href="mailto:'.$myEmail.'">';
		  echo $myEmail;
	  } else {
		  echo '<a href="mailto:';
		  echo get_field('email', 'option');
		  echo '">';
		  echo get_field('email', 'option');
	  }
	  echo '</a></p>';
	  echo '<p><strong>Phone:</strong><br />';
	  if (! empty($myPhone)){
		  echo '<a href="tel:1.'.$myPhone.'">';
		  echo $myPhone;
	  } else {
		  echo '<a href="tel:1.';
		  echo get_field('phone', 'option');
		  echo '">';
		  echo get_field('phone', 'option');
	  }
	  echo '</a></p>';
	  if (! empty($myFax)){
		  echo '<p><strong>Fax:</strong><br />';
		  echo $myFax;
		  echo '</p>';
	  }
	  if ($myForms){
		  //var_dump($myForms);
		echo '<a class="btn btn-block btn-primary mar-one-b" href="';
		echo get_permalink($myForms->ID);
		echo '"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>';
		echo 'Contact ';
		the_title();
		echo '</a>';
	  }
	  echo '</div><div class="col-sm-15 col-xs-7"><hr class="faint hidden-xs" />';
	  echo '<h3 class="zero-mar-t">Office Hours</h3>';
	  if( have_rows('office_hours') ):
	
		// loop through the rows of data
		while ( have_rows('office_hours') ) : the_row();
	
			// display a sub field value
			echo '<h4>';
			the_sub_field('section_title');
			echo '</h4>';
			
			if( have_rows('hours') ):
			echo '<ul class="list-unstyled">';
			// loop through the rows of data
			while ( have_rows('hours') ) : the_row();
				echo '<li><strong>';
				$dayz = get_sub_field('days_week');
				$days = implode(', ', $dayz);
				if ($days == "Monday, Tuesday, Wednesday, Thursday, Friday"){
					echo 'Monday – Friday';
				} elseif ($days == "Monday, Tuesday, Wednesday"){
					echo 'Monday – Wednesday';
				} elseif ($days == "Monday, Tuesday, Wednesday, Thursday"){
					echo 'Monday – Thursday';
				}
				 else {
					echo $days;
				}
				echo '</strong><br />';
				the_sub_field('start_time');
				echo '&#8211;';
				the_sub_field('end_time');
				echo '</li>';
			endwhile;
			echo '</ul>';
		    endif;
			
		endwhile;
		else:
			while ( have_rows('office_hours', 'option') ) : the_row();
	
			// display a sub field value
			echo '<h4>';
			the_sub_field('section_title', 'option');
			echo '</h4>';
			
			if( have_rows('hours') ):
			echo '<ul class="list-unstyled">';
			// loop through the rows of data
			while ( have_rows('hours') ) : the_row();
				echo '<li><strong>';
				$dayz = get_sub_field('days_week', 'option');
				$days = implode(', ', $dayz);
				if ($days == "Monday, Tuesday, Wednesday, Thursday, Friday"){
					echo 'Monday – Friday';
				} elseif ($days == "Monday, Tuesday, Wednesday"){
					echo 'Monday – Wednesday';
				}
				 else {
					echo $days;
				}
				echo '</strong><br />';
				the_sub_field('start_time', 'option');
				echo '&#8211;';
				the_sub_field('end_time', 'option');
				echo '</li>';
			endwhile;
			echo '</ul>';
		    endif;
			
		endwhile;
	  endif;
	 
	  
	  echo '</div></div></aside>';
	  ?>
  </div>
</article>
<?php endwhile; ?>
