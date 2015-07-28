<?php
/*
Template Name: Homepage
*/
?>



<?php get_header(); ?>


      <!-- homepage -->


  <div id="content" class="homepage">

    <div id="main" class="twelve columns" role="main">

      <article role="article" class="full-page">

        <?php

        $orbit_slider = of_get_option('orbit_slider');
        if ($orbit_slider){

        ?>

        <header>

          <div id="featured">

            <?php
              global $post;
              $tmp_post = $post;
              $args = array( 'numberposts' => 1, 'category' => 3, 'post_status' => 'any' );
              $myposts = get_posts( $args );
              foreach( $myposts as $post ) :  setup_postdata($post);
                $post_thumbnail_id = get_post_thumbnail_id();
                $featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
            ?>
              <div class="home-visual eight columns">
                <?php echo do_shortcode(get_post_meta($post->ID, "the-visual", true)); ?>
              </div>
              <div class="home-text four columns">
                <h2><?php echo the_title(); ?></h2>
                <h3 class="featured-summary"><?php the_excerpt(); ?></h3>
                <?php wp_nav_menu( array( 'theme_location' => 'homepage-teaser' ) ); ?>
              </div>

            <?php endforeach; ?>

          </div>

        </header>

        <div class="row">

          <?php $categories = array(4,5,76, 72); ?>

          <?php foreach ($categories as $category_id) : ?>

            <?php $my_query = new WP_Query(array( 'posts_per_page' => 1,'category__and' => array($category_id, 9) ) );
              while ($my_query->have_posts()) : $my_query->the_post();
              $do_not_duplicate = $post->ID;?>

              <div class="three columns hp-tease">

                <h4 class="category-hp"><a href="<?php echo get_category_link($category_id) ?>"><?php echo get_cat_name($category_id); ?></h4>

                <a href="<?php echo get_permalink(); ?>">
                  <div class="tease-image">
                    <?php the_post_thumbnail( 'homepage-thumbnail', $attr ); ?>
                  </div>

                  <h4 class="tease-headline"><?php the_title(); ?></h4>

                  <!-- <div class="tease-authors">By <?php coauthors(); ?></div> -->

                  <div class="tease-text"><?php the_excerpt(); ?></div>
                </a>

              </div>

            <?php endwhile; ?>

          <?php endforeach; ?>





        </div>


        <?php $post = $tmp_post; ?>

        <script type="text/javascript">

        </script>

        <?php } ?>

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

      <?php else : ?>

      <article id="post-not-found">
          <header>
            <h1>Not Found</h1>
          </header>
          <section class="post_content">
            <p>Sorry, but the requested resource was not found on this site.</p>
          </section>
          <footer>
          </footer>
      </article>

      <?php endif; ?>

    </div> <!-- end #main -->

    <?php //get_sidebar(); // sidebar 1 ?>

  </div> <!-- end #content -->

<?php get_footer(); ?>