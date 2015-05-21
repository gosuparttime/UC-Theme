<div class="col-sm-6 col-xs-15 pull-right" id="staff-photo">
<?
echo '<div class="thumbnail mar-one-b">';
if (has_post_thumbnail()){
	the_post_thumbnail('two-down');
} else { ?>
<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/placeholder-th.jpg" alt="<?php bloginfo( 'name' ); ?>" />
<?	}
echo '</div></div>';
$staffPhone = get_field('phone');
if (empty($staffPhone)){
	$staffPhone = $myPhone;
}
$staffEmail = get_field('email');
echo '<div class="page-header"><h2 class="zero-mar-b">';
echo get_the_title();
if (get_field('degrees_titles')){
	echo ', ';
	echo get_field('degrees_titles');
}
echo '</h2></div>';

if( have_rows('positions') ):
	while ( have_rows('positions') ) : the_row();
		$term = get_sub_field('office');
		echo '<p><em>';
		echo get_sub_field('title');
		echo '</em><br/>';
		echo $term->name;
		echo '</p>';
	endwhile;
endif;
echo '<ul class="list-unstyled">';
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
echo '<hr class="divide"/><h3>';
echo 'About '.get_the_title();
echo '</h3>';
the_content();
echo '</div>';
