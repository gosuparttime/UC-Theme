<?php
/**
 * Page titles
 */
function ucmaster_title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return __('Latest Posts', 'ucmaster');
    }
  } elseif (is_search()) {
    return sprintf(__('Search Results for: %s', 'ucmaster'), get_search_query());
  } elseif (is_404()) {
    return __('Otto can&#8217;t find what you are looking for&#8230;', 'ucmaster');
  } elseif (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      return apply_filters('single_term_title', $term->name);
	} elseif ( is_post_type_archive( 'office' ) ) {
	   return 'Office Directory';
    } elseif ( is_post_type_archive( 'staff' ) ) {
	   return 'Staff Directory';
    } elseif (is_post_type_archive()) {
      return apply_filters('the_title', get_queried_object()->labels->name);
    } elseif (is_day()) {
      return sprintf(__('Daily Archives: %s', 'ucmaster'), get_the_date());
    } elseif (is_month()) {
      return sprintf(__('Monthly Archives: %s', 'ucmaster'), get_the_date('F Y'));
    } elseif (is_year()) {
      return sprintf(__('Yearly Archives: %s', 'ucmaster'), get_the_date('Y'));
    } elseif (is_author()) {
      $author = get_queried_object();
      return sprintf(__('Author Archives: %s', 'ucmaster'), apply_filters('the_author', is_object($author) ? $author->display_name : null));
    } else {
      return single_cat_title('', false);
    }
  
  } else {
    return get_the_title();
  }
}
function ucparent_title() {
	$parent_title = get_the_title($post->post_parent);
	echo $parent_title;
}
