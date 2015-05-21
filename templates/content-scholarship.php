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
	$addDetails = get_field('submit_details');
	$addContact = get_field('contact');
	
	
	echo '<aside class="col-sm-5" id="right-side">';
	if ($addDocs){
	  $myDocs= get_field('downloads');
	  if (!empty($myDocs)){
		echo '<h2>Downloads</h2>';
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
	if ($addDetails){
	  $myInstruct= get_field('special_instructions');
	  $mySubmit= get_field('submit_information');
	  if (!empty($mySubmit)){
		echo '<h2>Submission Details</h2>';
			if (!empty($myInstruct)){
				echo '<strong>';
				echo $myInstruct;
				echo '</strong>';
			}
			echo '<p>';
			echo $mySubmit;
			echo '</p>';
			
		wp_reset_postdata();
	  }
	}
	if ($addContact){
		  $myStaff= get_field('choose_staff');
		  if (!empty($myStaff)){
			echo '<h3>Contact</h3>';
			echo '<p>Regarding questions relating to the:<br /><strong> ';
			echo get_the_title();
			echo '</strong></p>';
			foreach( $myStaff as $post):
				setup_postdata($post); 		 
				echo '<div class="row pad-one-b">';
				get_template_part('templates/content', 'staff-dir');	
				echo '</div>';	
			endforeach;	
			wp_reset_postdata();
			//echo '</div>';
		  }
	  }
	  
	  echo '</aside>';
	}
	
	
	?>
  



