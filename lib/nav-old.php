<?php
/**
 * Cleaner walker for wp_nav_menu()
 *
 * Walker_Nav_Menu (WordPress default) example output:
 *   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
 *   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
 *
 * ucmaster_Nav_Walker example output:
 *   <li class="menu-home"><a href="/">Home</a></li>
 *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
 
class ucmaster_Nav_Walker extends Walker_Nav_Menu {
  function check_current($classes) {
    return preg_match('/(current[-_])|active|dropdown/', $classes);
  }

  function start_lvl(&$output, $depth = 0, $args = array()) {
    $output .= "\n<div class=\"nav-panel\"><div class=\"container\"><ul class=\"dropdown-menu\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $item_html = '';
    parent::start_el($item_html, $item, $depth, $args);

    if ($item->is_dropdown && ($depth === 0)) {
      $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html);
      $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
    }
    elseif (stristr($item_html, 'li class="divider')) {
      $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
    }
    elseif (stristr($item_html, 'li class="dropdown-header')) {
      $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
    }

    $item_html = apply_filters('ucmaster/wp_nav_menu_item', $item_html);
    $output .= $item_html;
  }

  function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
    $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

    if ($element->is_dropdown) {
      $element->classes[] = 'dropdown';
    }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }
}
*/
/**
 * Remove the id="" on nav menu items
 * Return 'menu-slug' for nav menu classes
 */
function ucmaster_nav_menu_css_class($classes, $item) {
  $slug = sanitize_title($item->title);
  //$classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
  $classes = preg_replace('/(current(-page[-_])(item|parent|ancestor))/', 'active', $classes);
  $classes = preg_replace('/^((page)[-_\w+]+)+/', 'active', $classes);

  $classes[] = 'menu-' . $slug;

  $classes = array_unique($classes);

  return array_filter($classes, 'is_element_empty');
}
add_filter('nav_menu_css_class', 'ucmaster_nav_menu_css_class', 10, 2);
add_filter('nav_menu_item_id', '__return_null');

/**
 * Clean up wp_nav_menu_args
 *
 * Remove the container
 * Use ucmaster_Nav_Walker() by default
*/
function ucmaster_nav_menu_args($args = '') {
  $ucmaster_nav_menu_args['container'] = false;

  if (!$args['items_wrap']) {
    $ucmaster_nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
  }

  if (!$args['depth']) {
    $ucmaster_nav_menu_args['depth'] = 2;
  }

  if (!$args['walker']) {
    $ucmaster_nav_menu_args['walker'] = new ucmaster_Nav_Walker();
  }

  return array_merge($args, $ucmaster_nav_menu_args);
}
add_filter('wp_nav_menu_args', 'ucmaster_nav_menu_args');
 
 // Menu output mods
/* Bootstrap_Walker for Wordpress 
     * Author: George Huger, Illuminati Karate, Inc 
     * More Info: http://illuminatikarate.com/blog/bootstrap-walker-for-wordpress 
     * 
     * Formats a Wordpress menu to be used as a Bootstrap dropdown menu (http://getbootstrap.com). 
     * 
     * Specifically, it makes these changes to the normal Wordpress menu output to support Bootstrap: 
     * 
     *        - adds a 'dropdown' class to level-0 <li>'s which contain a dropdown 
     *         - adds a 'dropdown-submenu' class to level-1 <li>'s which contain a dropdown 
     *         - adds the 'dropdown-menu' class to level-1 and level-2 <ul>'s 
     * 
     * Supports menus up to 3 levels deep. 
     *  
     */ 
    class ucmaster_Nav_Walker extends Walker_Nav_Menu 
    {     
 
        /* Start of the <ul> 
         * 
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".  
         *                   So basically add one to what you'd expect it to be 
         */         
        function start_lvl(&$output, $depth) 
        {
            $tabs = str_repeat("\t", $depth); 
            // If we are about to start the first submenu, we need to give it a dropdown-menu class 
            if ($depth == 0 || $depth == 1) { //really, level-1 or level-2, because $depth is misleading here (see note above) 
                $output .= "\n{$tabs}<div class=\"nav-panel\"><div class=\"container\"><div class=\"row\"><div class=\"col-sm-5\"><ul class=\"dropdown-menu\">\n"; 
            } else { 
                $output .= "\n{$tabs}<ul>\n"; 
            } 
            return;
        } 
 
        /* End of the <ul> 
         * 
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".  
         *                   So basically add one to what you'd expect it to be 
         */         
        function end_lvl(&$output, $depth)  
        {
            if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!) 
 
                // we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now 
                $output .= '<!--.dropdown-->'; 
            } 
            $tabs = str_repeat("\t", $depth); 
			
            $output .= "\n{$tabs}</ul></div><div class=\"col-sm-5 hidden-xs\">";
			$output .= add_nav_features($link, 1);
			$output .= "</div><div class=\"col-sm-5 hidden-xs\">";
			$output .= add_nav_features($link, 2);
			$output .= "</div>\n"; 
            return; 
        }
 
        /* Output the <li> and the containing <a> 
         * Note: $depth is "correct" at this level 
         */         
        function start_el(&$output, $item, $depth, $args)  
        {    
            global $wp_query; 
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : ''; 
            $class_names = $value = ''; 
            $classes = empty( $item->classes ) ? array() : (array) $item->classes; 
 
            /* If this item has a dropdown menu, add the 'dropdown' class for Bootstrap */ 
            if ($item->hasChildren) { 
                $classes[] = 'dropdown'; 
                // level-1 menus also need the 'dropdown-submenu' class 
                if($depth == 1) { 
                    $classes[] = 'dropdown-submenu'; 
                } 
            } 
 
            /* This is the stock Wordpress code that builds the <li> with all of its attributes */ 
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ); 
            $class_names = ' class="' . esc_attr( $class_names ) . '"'; 
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';             
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : ''; 
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : ''; 
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : ''; 
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
            $item_output = $args->before; 
 
            /* If this item has a dropdown menu, make clicking on this link toggle it */ 
            if ($item->hasChildren && $depth == 0) { 
			
                $item_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="dropdown">'; 
            } else { 
                $item_output .= '<a'. $attributes .'>'; 
            } 
 
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after; 
 
            /* Output the actual caret for the user to click on to toggle the menu */             
            if ($item->hasChildren && $depth == 0) { 
                $item_output .= '<b class="caret"></b></a>'; 
            } else { 
                $item_output .= '</a>'; 
            } 
 
            $item_output .= $args->after; 
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ); 
            return; 
        }
 
        /* Close the <li> 
         * Note: the <a> is already closed 
         * Note 2: $depth is "correct" at this level 
         */         
        function end_el (&$output, $item, $depth, $args)
        {
            $output .= '</li>'; 
            return;
        } 
 
        /* Add a 'hasChildren' property to the item 
         * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633  
         */ 
        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) 
        { 
            // check whether this item has children, and set $item->hasChildren accordingly 
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]); 
 
            // continue with normal behavior 
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); 
        }         
    } 
//add_editor_style('editor-style.css');

/*
// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
	}
  
  return $classes;
}*/
function add_nav_features($link, $pos) {
	if( $pos == 1 ) {
    	$junk = '<h4>Item 1</h4>';
		$junk .= apply_filters( 'the_title', $item->title, $item->ID );
	}
	if( $pos == 2 ) {
    	$junk = '<h4>Item 2</h4>';
	}
  
  return $junk;
}