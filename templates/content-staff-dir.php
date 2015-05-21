<div class="col-sm-6 col-xs-5">
<?
echo '<div class="thumbnail">';
if (has_post_thumbnail()){
	the_post_thumbnail('feature-thumb');
} else { ?>
<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/placeholder-th.jpg" alt="<?php bloginfo( 'name' ); ?>" />
<?	}
echo '</div>';
$staffPhone = get_field('phone');
if (empty($staffPhone)){
	$staffPhone = $myPhone;
}
$staffEmail = get_field('email');
echo '</div><div class="col-sm-9 col-xs-10 zero-pad-l widget">';
echo '<h5 class="zero-mar-t">';
echo get_the_title();
if (get_field('degrees_titles')){
	echo ', ';
	echo get_field('degrees_titles');
}
echo '</h5>';
echo '<ul class="list-unstyled">';
if( have_rows('positions') ):
	while ( have_rows('positions') ) : the_row();
		$term = get_sub_field('office');
		echo '<li><em>';
		echo get_sub_field('title');
		echo '</em><br />';
		echo $term->name;
		echo '<li>';
	endwhile;
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
$content = get_the_content();
if (!empty($content)){
	echo '<a href="'.get_permalink().'" class="btn btn-sm btn-default">';
	echo 'Read Biography <i class="fa fa-chevron-right" aria-hidden="true"></i>';
	echo '</a>';
}
echo '</div>';
