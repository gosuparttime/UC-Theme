<?
$myLoc = get_field('office_location');
$myEmail = get_field('office_email');
$myPhone = get_field('office_phone');
$myFax = get_field('office_fax');
$myHours = get_field('office_hours');
$myURL = get_field('sep_url');
if ($myURL){
	$mySite = get_field('office_website');
}
echo '<aside class="col-sm-5">';
echo '<h3 class="zero-mar-b">Contact Us:</h3>';
echo '<div class="row"><div class="col-sm-15 col-xs-8">';
echo '<p><strong>';
echo the_title();
echo '</strong><br />';
echo 'University College<br />';
echo '700 University Ave.<br />';
echo $myLoc;
echo '<br />';
echo 'Syracuse, NY 13244';
echo '</p>';
echo '<p><strong>E-mail:</strong><br />';
echo '<a href="mailto:'.$myEmail.'">';
echo $myEmail;
echo '</a></p>';
echo '<p><strong>Phone:</strong><br />';
echo '<a href="tel:'.$myPhone.'">';
echo $myPhone;
echo '</a></p>';
if (! empty($myFax)){
	echo '<p><strong>Fax:</strong><br />';
	echo $myFax;
	echo '</p>';
}
echo '</div><div class="col-sm-15 col-xs-7">';
echo '<h4>Office Hours</h4>';
if( have_rows('office_hours') ):
	// loop through the rows of data
	while ( have_rows('office_hours') ) : the_row();
	// display a sub field value
		echo '<h5>';
		the_sub_field('section_title');
		echo '</h5>';
		if( have_rows('hours') ):
			echo '<ul class="list-unstyled">';
			// loop through the rows of data
			while ( have_rows('hours') ) : the_row();
				echo '<li>';
				$dayz = get_sub_field('days_week');
				$days = implode(', ', $dayz);
				if ($days == "Monday, Tuesday, Wednesday, Thursday, Friday"){
					echo 'Monday – Friday';
				} elseif ($days == "Monday, Tuesday, Wednesday"){
					echo 'Monday – Wednesday';
				}
				 else {
					echo $days;
				}
				echo '<br />';
				the_sub_field('start_time');
				echo '&#8211;';
				the_sub_field('end_time');
				echo '</li>';
			endwhile;
		echo '</ul>';
		endif;
	endwhile;
endif;
echo '</div></div></aside>';
?>