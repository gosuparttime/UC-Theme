<?
$heading = get_sub_field('heading_type');
$title = get_sub_field('section_title');
$content = get_sub_field('section_content');
//$page = get_sub_field('add_page');
$image = get_sub_field('add_image');
//$show = get_sub_field('show_link');
//$link = get_sub_field('add_link');
/*$cta = get_sub_field('call_to_action');
// Get Page Items
$custom_fields = get_post_custom($page->ID);
$myCTA = $custom_fields['page_cta'];
if (empty($cta)){
		if (!empty($myCTA[0])){
			$cta = $myCTA[0];
		} else {
			$cta = "Learn More";
		}
}
if( $page ): 
	$url = get_permalink($page->ID);
endif;
*/
echo '<div class="row">';
if (is_mobile()){
	$chunk = "homepage-thumb";
} else {
	if ($col == "2"){
		$chunk = "two-across";
	} else {
		$chunk = "three-across";
	}
}


if (!empty ($image)){
	$thumb = $image['sizes'][ $chunk ];
	$alt = $image['alt'];
	echo '<div class="col-sm-15 col-xs-5">';
	echo '<div class="thumbnail mar-one-b">';
	echo '<img src="';
	echo $thumb;
	echo '" alt="';
	echo $alt;
	echo '"/>';
	echo '</div>';
		echo '</div><div class="col-sm-15 col-xs-10 page-widget">';
	} else{
		echo '<div class="col-xs-15 page-block">';
}
echo '<'.$heading.' class="zero-mar-t">';
echo $title;
echo '</'.$heading.'>';
echo '<div class="widget">';
echo $content;
echo '</div>';
echo '</div>';
/*if ($link != "No Link"){
	echo '<div class="chunk">';
	echo '<a href="'.$url.'" class="btn btn-default">';
	echo $cta;
	echo ' <i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
	echo '</div>';
}*/
echo '</div>';
?>
