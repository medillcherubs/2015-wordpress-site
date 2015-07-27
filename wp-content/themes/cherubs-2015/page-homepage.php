<?php
/*
Template Name: Homepage
*/

// setup_site();

?>

<?php get_header(); ?>

  <article class="homepage-featured clearfix">

    <?php
      global $post;
      $tmp_post = $post;
      $args = array( 'numberposts' => 1, 'category_name' => "homepage-video", 'post_status' => 'any' );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ) :  setup_postdata($post);
    ?>

      <div class="homepage-video large-8 columns">
        <?php the_content(); ?>
      </div>
      <div class="homepage-text large-4 columns">
        <h2 class="homepage-title"><?php echo the_title(); ?></h2>
        <h3 class="homepage-description"><?php the_excerpt(); ?></h3>
        <?php wp_nav_menu( array( 'theme_location' => 'homepage-teaser' ) ); ?>
      </div>

    <?php endforeach; ?>

  </article>


      <?php $categories = get_homepage_teaser_categories(); ?>


      <?php foreach ($categories as $category_id) : ?>

        <?php $my_query = new WP_Query(array( 'posts_per_page' => 1,'category__and' => array($category_id, get_homepage_teaser_category_id()) ) );
          while ($my_query->have_posts()) : $my_query->the_post();
          $do_not_duplicate = $post->ID;?>

          <div class="large-3 columns">

            <h4 class="homepage-teaser-category"><a href="<?php echo get_category_link($category_id) ?>"><?php echo get_cat_name($category_id); ?></h4>

            <a href="<?php echo get_permalink(); ?>">
              <div class="homepage-teaser-image">
                <?php the_post_thumbnail( 'homepage-thumbnail', $attr ); ?>
              </div>

              <h4 class="homepage-teaser-headline"><?php the_title(); ?></h4>

              <div class="homepage-teaser-excerpt"><?php the_excerpt(); ?></div>
            </a>

          </div>

        <?php endwhile; ?>

      <?php endforeach; ?>


<?php get_footer(); ?>