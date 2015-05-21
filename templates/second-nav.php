<?
if (is_tree(478) || is_post_type_archive(array( 'uc-story' ))  || is_singular(array( 'uc-story' ))) {
   $myMenu = "about-us";
   
} elseif (is_tree(518)) {
   $myMenu = "academics";
   $menuTitle = "Academics";
} elseif (is_tree(537)) {
   $myMenu = "future-students";
   $menuTitle = "Future Students";
} elseif (is_tree(579)) {
   $myMenu = "current-students";
   $menuTitle = "Current Students";
} elseif (is_tree(592)) {
   $myMenu = "tuition-financial-aid";
   $menuTitle = "Tuition & Financial Aid";
} elseif (is_tree(678) || is_singular(array( 'post', 'tribe_events')) || is_post_type_archive(array( 'tribe_events' ))  || is_home() ) {
   $myMenu = "news-events";
   $menuTitle = "News & Events";
}  elseif (is_tree(660)) {
   $myMenu = "faculty-resources";
   $menuTitle = "Faculty Resources";
} elseif (is_tree(668)) {
   $myMenu = "giving";
   $menuTitle = "Giving";
}  elseif (is_tree(654)) {
   $myMenu = "";
} elseif (is_tree(657) || is_singular(array( 'office', 'staff' )) || is_post_type_archive(array( 'office', 'staff' ))){
   $myMenu = "directory";
   $menuTitle = "Directory";
} elseif (get_post_type() == "tribe_events") {
   $myMenu = "news-events";
   $menuTitle = "News & Events";
}
?>
<? if (!empty($myMenu)){
	?>
	<div class="navbar-inverse">
<button type="button" id="second-toggle" class=" navbar-toggle collapsed" data-toggle="collapse" data-target=".second-collapse">
<? if(!empty($menuTitle)){
	echo $menuTitle;
} else {
	echo "Local";
} ?> Navigation
          <div class="pull-right"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
          </button>
        <nav class="collapse second-collapse" role="navigation" id="secondary-navigation">
	<?
	wp_nav_menu( array(
		'menu' => $myMenu,
		'menu_id' => 'menu-secondary-navigation',
		'depth' => 3,
		'menu_class' => 'nav',
		'walker' => new ucmaster_Nav_Walker(),
	)); ?>
    
	</nav>
</div>
	<?
} else {
	echo '<div class="hidden-xs">';
	display_module('questions-part-time-study', 3);
	echo '</div>';
}
?>