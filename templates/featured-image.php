<?
if (get_field('show_featured_image')){
	$format = get_field('vert_horz');
	if ($format == 'Horizontal'){
		echo '<div class="pad-one-b hidden-xs"><div class="thumbnail">';
		the_post_thumbnail('feature-page');
		echo '</div></div>';
	} else {
		echo '<div class="col-md-6 pull-right mar-one-l zero-pad-r mar-one-b hidden-xs hidden-sm"><div class="thumbnail">';
		the_post_thumbnail('two-down');
		echo '</div></div>';
	}
};
?>

