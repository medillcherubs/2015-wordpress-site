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

add_filter('wp_nav_menu_items','menu_search', 10, 2);

function get_profile_image_path() {
  return "http://cherubs.medill.northwestern.edu/2014/wp-content/uploads/sites/5/2014/07/";
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

?>

<?php function cherub_authors($authors, $type = "Story") { ?>

<?php if ($type == "Story") ?>

<h5 class="small-label stories-by"><?php echo $type; ?> by</h5>

	<ul class="article-authors clearfix">
	<?php foreach ($authors as $author) : ?>

		<li class="author clearfix">
			<div class="author-image-container">
				<!-- <img src="http://cherubs.medill.northwestern.edu/2014/wp-content/uploads/sites/5/2014/07/<?php //echo preg_replace('/[\s+\-]/', '', strtolower($author->login)); ?>-150x150.jpg" class="author-image" /> -->
				<img src="<?php echo $author->image ?>" class="author-image" />

			</div>
			<div class="author-info">
        <?php $url = get_author_posts_url( $author->id ); ?>
				<p class="author-name">
          <a href="<?php echo $url ?>"><?php echo $author->name; ?></a>
        </p>
			</div>
		</li>
	<?php endforeach; ?>
</ul>


<?php
}

?>