<?php

// CONFIGURATION

// the four categories that appear on the homepage
global $cherubs_config;

$cherubs_config = array(
  "homepage_teaser_category_slugs" => array("academics", "campus", "city", "experiences"),
  "homepage_teaser_category_slug" => "homepage-section-teaser",
  "section_category_slugs" => array(
    "academics" => array("program-overview", "learning", "guest-speakers", "reporting-and-editing"),
    "campus" => array("residential-life", "exploring-campus"),
    "city" => array("living-in-evanston", "going-to-chicago"),
    "experiences" => array("journalism-reflections", "personal-insight")
  ),
  "section_featured_slug" => "featured-story"
);

// $homepage_teaser_category_slugs
// $homepage_teaser_category_slugs = array("academics", "campus", "city", "experiences");

// the category that makes posts appear in the homepage teaser slots
// $homepage_teaser_category_slug = array("homepage-section-teaser");

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

function full_width(){
	return in_category('full-width') == 1;
}

function menu_search($items, $args){
  $search = "";
  if ($args->menu_class === "top-menu") {
    $search = '<li class="menu-item search-input"><img id="search-img" src="http://cherubs.medill.northwestern.edu/wp-content/uploads/2014/07/magnifying_glass1.png"> <form class="search-form" action="http://cherubs.medill.northwestern.edu/2015/" method="get"><input type="text" class="search" placeholder="Search" name="s" value="" class="placeholder"></form></li>';
  }
  return $items . $search;
}

function results_threshold($NumResults){
	return $NumResults > 11;
}

function nav_params(){
	return array("next_label" => "Next →", "first_label" => "", "last_label" => "", "prev_label" => "← Previous");
}

add_filter('wp_nav_menu_items','menu_search', 10, 2);

function get_profile_image_path() {
  return "http://cherubs.medill.northwestern.edu/2014/wp-content/uploads/sites/5/2014/07/";
}

// main section categories, such as academics, etc.
function get_homepage_teaser_categories() {
  global $cherubs_config;
  $ids = [];
  foreach ($cherubs_config["homepage_teaser_category_slugs"] as $slug) {
    $category = get_category_by_slug($slug);
    array_push($ids, $category->term_id);
  }
  return $ids;
}

function get_homepage_teaser_category_id() {
  global $cherubs_config;
  $category = get_category_by_slug($cherubs_config["homepage_teaser_category_slug"]);
  return $category->term_id;
}

function get_section_categories() {
  global $cherubs_config;
  $section_category_ids = array();
  foreach ($cherubs_config["section_category_slugs"] as $slug => $subcategories) {
    $primary_category = get_category_by_slug($slug);
    $section_category_ids[$primary_category->term_id] = array();
    foreach($subcategories as $subcategory) {
      $category = get_category_by_slug($subcategory);
      array_push($section_category_ids[$primary_category->term_id], $category->term_id);
    }
  }
  return $section_category_ids;
}

function get_section_featured_id() {
  global $cherubs_config;
  $category = get_category_by_slug($cherubs_config["section_featured_slug"]);
  return $category->term_id;
}

function stories_by() {

  $last_names = get_the_coauthor_meta("last_name");
	$user_logins = get_the_coauthor_meta("user_login");
	$first_names = get_the_coauthor_meta("first_name");
	$ids = get_the_coauthor_meta("ID");

	$authors = array();

	foreach ($last_names as $key => $last) {
		$authors[] = (object) array(
			// "image" => "http://www.medillcherubs.org/2013/wp-content/themes/medill-cherubs/profile-images/$last" . str_replace(" ", "", $first_names[$key]) . ".png",
			"image" => 'http://cherubs.medill.northwestern.edu/2014/wp-content/uploads/sites/5/2014/07/annesnabes-150x150.jpg',
			"last_name" => $last_names[$key],
			"first_name" => $first_names[$key],
			"name" => $first_names[$key]." ".$last_names[$key],
      "login" => $user_logins[$key],
      "id" => $ids[$key]
		);
	}

	cherub_authors($authors);
}

function alsoby($type, $authors) {

  $data = array();
  foreach ($authors as $author) {
    $item = get_user_by('login', $author);
    $item->state = $item->juiz_state;
    $item->city = $item->juiz_city;
    $item->country = $item->juiz_country;
    $item->nickname = $item->display_name;
    $item->login = $author;
    $item->name = $item->display_name;
    $data[] = $item;
  }

  cherub_authors($data, $type);

}


function cherub_authors($authors, $type = "Story") {

  $html = "";


  $html .= "<h5 class='small-label stories-by'> $type by</h5>";

  $html .= "<ul class='article-authors clearfix'>";

    foreach ($authors as $author) :

  		$html .= "<li class='article-author clearfix'>";
  			$html .= "<div class='author-image-container'>";
  				$html .= "<!-- <img src='http://cherubs.medill.northwestern.edu/2014/wp-content/uploads/sites/5/2014/07/" . preg_replace('/[\s+\-]/', '', strtolower($author->login)) . "-150x150.jpg' class='author-image' /> -->";
  				$html .= "<img src='" . $author->image . "' class='author-image' />";
  			$html .= "</div>";
  			$html .= "<div class='author-info'>";
          $url = get_author_posts_url( $author->id );
  				$html .= "<div class='author-name'>";
            $html .= "<a href='$url'>" . $author->name . "</a>";
          $html .= "</div>";
  			$html .= "</div>";
  		$html .= "</li>";
  	endforeach;

  $html .= "</ul>";

  echo $html;


}

?>