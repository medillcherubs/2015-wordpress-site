<?php

// ADD MENU SUPPORT
add_theme_support( 'menus' );
add_action('init', 'register_my_menus');
function register_my_menus(){
  register_nav_menus(
    array(
      'header-menu' => 'Header Menu',
      'footer-menu' => 'Footer Menu',
      'homepage-teaser' => 'Homepage Teaser'
    )
  );
}

function related_stories($related_stories){

	if ($related_stories) {

		echo "<h3 class='related-head'>Related Stories</h3>";
		echo "<ul class='related-stories-list'>";

		$stories = split(",", $related_stories[0]);

		foreach($stories as $story) {

			$story_meta = get_post($story, ARRAY_A);
			echo "<li><a href='" . get_permalink($story) . "'>" . $story_meta['post_title'] . "</a></li>";

		}

		echo "</ul>";

	}

}

function menu_search($items){
    $search = '<li class="menu-item search-input"><img id="search-img" src="http://cherubs.medill.northwestern.edu/wp-content/uploads/2014/07/magnifying_glass1.png"> <form class="search-form" action="http://cherubs.medill.northwestern.edu/2015/" method="get"><input type="text" class="search" placeholder="Search" name="s" value="" class="placeholder"></form></li>';

    return $items . $search;
}
add_filter('wp_nav_menu_items','menu_search');

function get_profile_image_path() {
  return "http://cherubs.medill.northwestern.edu/2014/wp-content/uploads/sites/5/2014/07/";
}

?>