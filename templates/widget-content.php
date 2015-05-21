<div class="col-xs-15">
	<?
	if( have_rows('column_1') ):
	while( have_rows('column_1') ): the_row();
		$heading = get_sub_field('heading_type');
		$title = get_sub_field('section_title');
		$content = get_sub_field('section_content');
		// Add Content
		echo '<div class="add-mar">';
		echo '<'.$heading.' class="zero-mar-t">';
		echo $title;
		echo '</'.$heading.'>';
		echo $content;
		echo '</div>';
	endwhile;
	endif;?>
</div>