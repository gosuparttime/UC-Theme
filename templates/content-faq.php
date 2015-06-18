<section>
  <?php

// check if the repeater field has rows of data
if( have_rows('faq_section') ):
$faq = 1;
 	// loop through the rows of data
    while ( have_rows('faq_section') ) : the_row();

        // display a sub field value
        $header = get_sub_field('section_title');
		if (! empty($header)){
			echo '<hr class="divide" />';
			echo '<h2>';
			echo $header;
			echo '</h2>';
		}
		if( have_rows('faq') ):
			
			$count = 0;
			echo '<div class="panel-group" id="accordion'.$faq.'">';
			echo '';
			// loop through the rows of data
			while ( have_rows('faq') ) : the_row();
				$count++;
		
				// display a sub field value
				echo '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion'.$faq.'" href="#collapse'.$faq.'-'.$count.'">';
				echo get_sub_field('question');
				echo '</a></h4></div>';
				echo '<div id="collapse'.$faq.'-'.$count.'" class="panel-collapse collapse"><div class="panel-body">';
				echo get_sub_field('answer');
				echo '</div></div></div>';
			endwhile;
			
			echo '</div>';
		endif;$faq++;
	endwhile;
endif;
?>
</section>
