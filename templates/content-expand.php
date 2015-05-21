
    <?
	if( have_rows('add_page_items') ): ?>
    <?php while( have_rows('add_page_items') ): the_row(); 

		// vars
		$rule = get_sub_field('include_rule');
		$columns = get_sub_field('choose_columns');
		//global $columns;
		if ($rule){
			echo '<hr class="divide"/>';
		}
		echo '<div class="row">';
		if ($columns == 1){
			//et_template_part('templates/widget', 'content'); 
			$col = 2;
						//get_template_part('templates/widget', 'two');
						include(locate_template('templates/widget-two.php'));
		} elseif ($columns == 2){
			if( get_sub_field('column_1') ):
				echo '<div class="col-half"><div class="col-xs-15 add-mar">';
				if( have_rows('column_1') ):
					while( have_rows('column_1') ): the_row();
						//echo "Hi";
						$col = 2;
						//get_template_part('templates/widget', 'two');
						include(locate_template('templates/widget-two.php'));
					endwhile;		
				endif;
				echo '</div></div>';
			endif;
			if( get_sub_field('column_2') ):
				echo '<div class="col-half"><div class="col-xs-15 add-mar">';
				if( have_rows('column_2') ):
					while( have_rows('column_2') ): the_row();
						//echo "There";
						$col = 2;
						include(locate_template('templates/widget-two.php'));
					endwhile;		
				endif;
				echo '</div></div>';
			endif;
		} elseif ($columns == 3){
			if( get_sub_field('column_1') ):
				echo '<div class="col-sm-5 col-xs-15 add-mar">';
				if( have_rows('column_1') ):
					while( have_rows('column_1') ): the_row();
						//echo "Hi";
						$col = 3;
						include(locate_template('templates/widget-two.php'));
					endwhile;		
				endif;
				echo '</div>';
			endif;
			if( get_sub_field('column_2') ):
				echo '<div class="col-sm-5 col-xs-15 add-mar">';
				if( have_rows('column_2') ):
					while( have_rows('column_2') ): the_row();
						//echo "There";
						$col = 3;
						include(locate_template('templates/widget-two.php'));
					endwhile;		
				endif;
				echo '</div>';
			endif;
			if( get_sub_field('column_3') ):
				echo '<div class="col-sm-5 col-xs-15 add-mar">';
				if( have_rows('column_3') ):
					while( have_rows('column_3') ): the_row();
						//echo "Bobo";
						$col = 3;
						include(locate_template('templates/widget-two.php'));
					endwhile;		
				endif;
				echo '</div>';
			endif; 
		}
		echo '</div>'; ?>
    <?php endwhile; ?>
    <?php endif; ?>
