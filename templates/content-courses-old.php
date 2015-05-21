<section class="course-listings">
<?php
	$buckets = term_exists( $myTax, 'formats');
	$classes = get_objects_in_term( $buckets, 'formats');
	$args = array(
		'post_type' => 'class-list',
		'posts_per_page' => '-1',
		'post__in' => $classes,
	);	
	$loop = new WP_Query( $args );
	//print_r($loop);
	if ($loop->have_posts() ):
	while ( $loop->have_posts() ) : $loop->the_post();
	//var_dump ($classes);
	//if (!empty($classes)):
		$term_list = wp_get_post_terms($post->ID, 'schools', array("fields" => "names"));
		print_r($term_list);
		$terms = get_terms( 'schools' );
		// Show-hide nav
		if ($showNav):
			echo '<div class="row">';
			echo '<div class="col-sm-7 col-xs-15">';
			$parent_permalink = get_permalink();
			echo '<h5>';
				echo 'Choose Your School/College'; 
				echo '</h5>';
			echo '<form id="page-changer">';
			echo '<select ONCHANGE="location = this.options[this.selectedIndex].value;" class="form-control">';
			
			 foreach ($terms  as $term ):
				echo '<option value="#'.$term->slug.'">';
				echo $term->name;
				echo '</option>';
			endforeach;
			echo '</select>';
			echo '</form>';
			wp_reset_postdata();
			echo '</div>';
			echo '</div>';
		endif;     
		echo '<div class="clearfix">';
		// display class list
		foreach ($terms as $term ):
			$schools = get_objects_in_term( $term, 'schools');
			if (!empty($schools)):
				echo '<h3 id="'.$term->slug.'">';
				echo $term->name;
				echo '</h3>';
			endif;
			$depts =  get_terms('department');
			echo '<h3 id="'.$term->slug.'">';
			echo $term->name;
			echo '</h3>';
			foreach ($depts  as $dept ):
				$args = array(
					'post_type' => 'class-list',
					'posts_per_page' => '-1',
					'post__in' => $classes,
					'tax_query' => array(
						'relation' => 'AND',
							array(
								'taxonomy' => 'schools',
								'field'    => 'slug',
								'terms'    => $term->slug,
							),
							array(
								'taxonomy' => 'department',
								'field'    => 'slug',
								'terms'    => $dept->slug,
							),
							array(
								'taxonomy' => 'formats',
								'field'    => 'slug',
								'terms'    => $myTax,
							),
						),
					);	
				
				$query = new WP_Query( $args );
				if ($query->have_posts() ):
					echo '<h4>';
					echo $dept->name;
					echo '</h4><hr class="faint"/>';
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
						if( have_rows('course_information') ):
							while ( have_rows('course_information') ) : the_row();
								$taxes = get_sub_field('department_id');
								$dupes = $taxes->slug;
								$deptz = $dept->slug;
								if ($dupes == $deptz):
									echo '<tr>';
									echo '<td class="text-uppercase">';
									echo $dept->slug;
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
											echo '&#8211;';
											echo the_sub_field('end_date');
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
										endwhile;
									else :
										echo 'TBD';
									endif;
									echo '</td>';	
									echo '</tr>';
									echo '<tr>';
								endif;
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
				else:
					echo 'no class';
				endif;
			endforeach;
		endforeach;
		endwhile;
	else:
		echo '<p><em>No courses offered currently</em></p>';
	endif;
	?>
</section>