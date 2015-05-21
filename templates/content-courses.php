<section class="course-listings">
  <?php
	$buckets = get_term_by('slug', $myTax, 'formats');
	$taxCount =$buckets->count;
	$schools = get_terms('department', 'orderby=name&hide_empty=1');
	if ($taxCount >= 1):
		echo '<h3>';
		echo 'Current Course Offerings';
		echo '</h3>';
		echo '<hr class="faint" />';
		foreach ($schools as $school):
			//$mySchool = $school->slug;
			//array_push($school_list, $mySchool);
		
		$args = array(
				'post_type' => 'class-list',
				'posts_per_page' => '-1',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'department',
						'field'    => 'slug',
						'terms'    => $school,
					),
					array(
						'taxonomy' => 'formats',
						'field'    => 'slug',
						'terms'    => $myTax,
					),
				),
				'meta_key' 		=> 'course_information_0_course_id',
				'orderby'       => 'meta_value_num',
				'order'         => 'ASC',
			);
		$query = new WP_Query( $args );
		$classes = array();
		//print_r($schools);
		if ($query->have_posts() ):
			
			echo '<h4>';
			echo $school->name;
			echo '</h4>';
			echo '<div class="table-responsive">';
			echo '<table class="table table-small" border="0" width="100%" cellspacing="0" cellpadding="0">';
			echo '<thead>';
			echo '<tr>';
			echo '<th width="15%">Course</th>';
			echo '<th width="15%">Section</th>';
			echo '<th width="15%">Class #</th>';
			echo '<th width="15%">Credit Hours</th>';
			echo '<th width="20%">Dates</th>';
			echo '<th width="20%">Time</th>';
			echo '</tr>';
			echo '</thead><tbody>';
			while ( $query->have_posts() ) : $query->the_post();
			//var_dump($post);
				if( have_rows('course_information') ):
					while ( have_rows('course_information') ) : the_row();
						$taxes = get_sub_field('department_id');
						$dupes = $taxes->slug;
						$deptz = $school->slug;
						if ($dupes == $deptz):
							echo '<tr>';
							echo '<td class="text-uppercase">';
							echo $taxes->slug;
							echo '&nbsp;';
							echo get_sub_field('course_id');
							echo '</td>';
							echo '<td class="text-uppercase">'.get_sub_field('section_id').'</td>';
							echo '<td class="text-uppercase">'.get_sub_field('class_id').'</td>';
							echo '<td class="text-uppercase">'.get_field('credit_hours').'</td>';
							echo '<td>';
							if( have_rows('dates') ):
								while ( have_rows('dates') ) : the_row();
									echo the_sub_field('start_date');
									if (get_sub_field('end_date')){
										echo '&#8211;';
										echo the_sub_field('end_date');
									}
									echo '<br/>';
									endwhile;
								else :
									echo 'TBD';
							endif;
							echo '</td>';
							echo '<td>';
							if( have_rows('times') ):
								while ( have_rows('times') ) : the_row();
									$isOnline = get_sub_field('online_course');
									if ($isOnline){
										echo 'Online';
									} else{
										the_sub_field('start_time');
										echo '&#8211;';
										the_sub_field('end_time');
									}
									echo '<br/>';
								endwhile;
							else :
								echo 'TBD';
							endif;
							echo '</td>';	
							echo '</tr>';
						endif;
						echo '<tr>';
				//endif;
				endwhile;
			endif;
			echo '<td colspan="6"><strong>';
			the_title();
			echo '</strong>';
			echo '<div class="meta">Instructor: '.get_field('instructor').'</div>';
			the_content();
			echo '</td>';
			echo '</tr>';				
		endwhile;
		echo '</tbody>';
		echo '</table>';
		echo '</div>';
		wp_reset_postdata();	
		endif;
		endforeach;
	else:
		echo '<strong><em>Currently there are no courses offered</em></strong>';
	endif;
	?>
</section>
