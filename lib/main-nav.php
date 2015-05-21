<?php

function main_uc_nav(){
	$count = 1;
	$args = array( 'post_type' => 'mega-menu');
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
	if( have_rows('nav_item') ):
	echo '<ul class="nav navbar-nav" id="menu-primary-navigation" aria-labelledby="main-navigation">';
    while( have_rows('nav_item') ): the_row();
	$link = get_sub_field('nav_link');
	$slug = $link->ID;
	$label = get_sub_field('nav_title');
	$myNav = get_sub_field('secondary_menu');
	$drop = get_sub_field('drop_down');
	$col1 = get_sub_field('column_1');
	$col2 = get_sub_field('column_2');
	//var_dump($link);
	echo '<li class="dropdown">';
	if (!$drop){
		echo '<a class="dropdown-toggle" href="'.get_permalink($link->ID).'" tabindex="0">';
	} else {
		echo '<a class="dropdown-toggle" href="#" data-toggle="dropdown" data-target="#" tabindex="0">';
	}
	if($label){
		echo $label;
	}else{
		echo  $link->post_title;
	}
	echo  '<i class="fa fa-chevron-down" aria-hidden="true"></i></a>';
	
    if ($drop){
	echo  '<div class="nav-panel container-fluid" id="'.$slug.'">';
	
	echo '<div class="row pad-half-tb">';
	echo '<nav class="col-sm-5" id="main-secondary-nav-'.$slug.'">';
	if ($myNav){
		$the_menu = $myNav;
		wp_nav_menu( array(
			'menu' => $the_menu ,
			'depth' => 1,
			'link_after' => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
			'menu_class' => 'nav drop-nav',
		));
	}
	echo '</nav>';
	echo '<div class="col-sm-5 hidden-xs">';
	get_nav_content($col1);
	echo '</div>';
	echo '<div class="col-sm-5 hidden-xs">';
	get_nav_content($col2);
	echo '</div>';
	echo '</div>';
	}
	echo '</li>';
	//wp_reset_postdata();
    endwhile;
	
	
	echo '</ul>';
	endif;
	wp_reset_postdata();
    endwhile;
}
