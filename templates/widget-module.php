<?
$heading = get_sub_field('heading_type');
$title = get_sub_field('section_title');
$page = get_sub_field('add_module');
$image = get_sub_field('add_image');
$show = get_sub_field('show_link');
$link = get_sub_field('add_link');
$cta = get_sub_field('call_to_action');
// Get Page Items
$custom_fields = get_post_custom($page->ID);
$myCTA = $custom_fields['page_cta'];
$module = new WP_Query(
	array ( 
		'posts_per_page' => 1,
		'post_type' => 'module',
		'post__in' => array($page->ID),
)); 
if ($module->have_posts()) :
	while ($module->have_posts()) : $module->the_post();
		if (empty($cta)){
				if (!empty($myCTA[0])){
					$cta = $myCTA[0];
				} else {
					$cta = "Learn More";
				}
		}
		if(empty($title)): 
			$title = get_the_title();
		endif;
		
		if ($col == "2"){
			$chunk = "two-across";
		} else {
			$chunk = "three-across";
		}
		if (!empty ($image)){
			$thumb = $image['sizes'][ $chunk ];
			$alt = $image['alt'];
			echo '<div class="thumbnail mar-one-b">';
			echo '<img src="';
			echo $thumb;
			echo '" alt="';
			echo $alt;
			echo '"/>';
			echo '</div>';
		}

		echo '<'.$heading.' class="zero-mar-t">';
		echo $title;
		echo '</'.$heading.'>';
		echo '<div class="widget">';
		the_content();
		echo '</div>';
	endwhile;
	wp_reset_postdata();
endif;
?>
