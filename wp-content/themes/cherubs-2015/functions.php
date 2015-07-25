<?php

// ADD MENU SUPPORT
add_theme_support( 'menus' );
add_action('init', 'register_my_menus');
function register_my_menus(){
  register_nav_menus(
    array(
      'header-menu' => 'Header Menu',
      'footer-menu' => 'Footer Menu'
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

?>
