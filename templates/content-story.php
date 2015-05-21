<?
$custom_fields = get_post_custom();
$mySummary = $custom_fields['page_summary'];
echo '<div class="col-sm-6 col-xs-5">';
echo '<div class="thumbnail">';
if (has_post_thumbnail()){
	the_post_thumbnail('feature-thumb');
} else { ?>
<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/placeholder-th.jpg" alt="<?php bloginfo( 'name' ); ?>" />
<?	}
echo '</div>';
echo '<h3 class="blue">';
echo the_title();
echo '</h3>';
echo '</div>';
echo '<div class="col-sm-9 col-xs-10">';
echo '<div class="widget">';
if (!empty($mySummary[0])){
	echo $mySummary[0];
}else {
	echo excerpt(50, true);
}
echo '</div>';
echo '<a class="btn btn-default" href="'.get_permalink($p->ID).'">';
echo 'Read ';
echo the_title();
echo '&#8217;s Full Story <i class="fa fa-chevron-right" aria-hidden="true"></i>';
echo '</a>';
echo '</div>';
?>