<? 
	$type = get_sub_field('choose_type');
	//echo $col;
	if ($type == "page"){
		include(locate_template('templates/widget-page.php'));
	} elseif ($type == "module"){
		include(locate_template('templates/widget-module.php'));	
	} elseif ($type == "custom"){
		include(locate_template('templates/widget-custom.php'));
	}
?>

