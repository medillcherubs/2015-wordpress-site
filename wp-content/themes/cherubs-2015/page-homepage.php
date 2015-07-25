<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

  <div id="content" class="homepage">

    <div id="main" class="twelve columns" role="main">

      <article class="homepage-featured">

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

        <div class="row">

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

        </div>


        <?php $post = $tmp_post; ?>


        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="row post_content">

          <div class="home-main eight columns">

            <?php the_content(); ?>

          </div>


        </section> <!-- end article header -->

        <footer>

          <p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>

        </footer> <!-- end article footer -->

      </article> <!-- end article -->


      <?php endwhile; ?>

      <?php endif; ?>

    </div> <!-- end #main -->

    <?php //get_sidebar(); // sidebar 1 ?>

  </div> <!-- end #content -->

<?php get_footer(); ?>