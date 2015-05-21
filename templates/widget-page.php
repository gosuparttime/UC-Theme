<?
$heading = get_sub_field('heading_type');
//$title = get_sub_field('section_title');
$content = get_sub_field('section_content');
$page = get_sub_field('add_page');
$show = get_sub_field('show_link');
$cta = get_sub_field('call_to_action');
if( $page ): 
echo '<div class="row">';
// override $post'
$post = $page;
setup_postdata( $post );
	$custom_fields = get_post_custom();
	$mySummary = $custom_fields['page_summary'];
	$myCTA = $custom_fields['page_cta'];
	if (empty($content)){
		if (!empty($mySummary[0])){
			$content = $mySummary[0];
		} else {
			$content = excerpt(75, true);
		}
	}
	
	if (empty($cta)){
		if (!empty($myCTA[0])){
			$cta = $myCTA[0];
		} else {
			$cta = "Learn More";
		}
	}
	$title = get_the_title();
	$url = get_the_permalink();
	$image = get_the_post_thumbnail();
	if ($col == "2"){
		$chunk = "two-across";
	} else {
		$chunk = "three-across";
	}
	if ($image){
		echo '<div class="col-sm-15 col-xs-5">';
		echo '<div class="thumbnail mar-one-b">';
		if (is_mobile()){
			the_post_thumbnail('homepage-thumb');
		} else {
			the_post_thumbnail($chunk);
		}
		echo '</div>';
		echo '</div><div class="col-sm-15 col-xs-10 page-widget">';
	} else{
		echo '<div class="col-xs-15 page-block">';
	}
wp_reset_postdata();
endif; 
// Add Content

echo '<'.$heading.' class="zero-mar-t">';
echo $title;
echo '</'.$heading.'>';
//if ($col=="3"){
	echo '<div class="widget">';
	echo $content;
	
//} else {
	//echo $content;
//}

	echo '<div class="chunk">';
	echo '<a href="'.$url.'" class="btn btn-default">';
	echo $cta;
	echo ' <i class="fa fa-chevron-right" aria-hidden="true"></i></a>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
?>
