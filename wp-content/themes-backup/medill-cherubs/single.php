<?php get_header(); ?>

  <div id="content" class="clearfix">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php $bottom_byline = in_category(117); ?>
                <?php if (!$bottom_byline && get_post_format() == 'gallery') $bottom_byline = true; ?>
    <?php $full_width_post = in_category(79); ?>

    <?php if ($full_width_post) { ?>
      <div id="main" class="twelve columns clearfix" role="main">
    <?php } else { ?>
      <div id="main" class="eleven columns clearfix offset-by-one" role="main">
    <?php } ?>

      <?php

        $raw_content = trim(get_the_content());
        // if ($raw_content[0] == "[") echo "found shortcode";

        $pattern = get_shortcode_regex();

          if (   preg_match( '/^'. $pattern .'/s', $raw_content, $matches ) )
          {
            $shortcode = $matches[0];
              $attrs = shortcode_parse_atts($matches[3]);
              if ($attrs["size"] == "full" || $attrs["size"] == "wide") {
                $raw_content = preg_replace( '/^'. $pattern .'/s', "", $raw_content );
              }
              if ($attrs["size"] == "full") $full_media = do_shortcode($matches[0]);
              if ($attrs["size"] == "wide") $wide_media = do_shortcode($matches[0]);

          }

      ?>

      <?php if ($full_media) echo $full_media; ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">




        <header>



          <?php // if (!in_category(147) && !in_category(150) && !in_category(154)) the_post_thumbnail( 'wpbs-featured' ); ?>

          <?php // if (strpos(get_the_content(), "<img ") == -1) the_post_thumbnail( 'wpbs-featured' ); ?>

          <?php $categories = get_the_category(); ?>

          <!-- <?php echo $categories[0]->cat_ID; ?> -->

          <?php
            if ($categories[0]->cat_ID == 1) array_shift($categories);

          ?>


          <?php if ($categories[0]) : ?>
          <h5 class="small-label category-label"><a href="<?php echo get_category_link($categories[0]->cat_ID); ?>"><?php echo cherub_category($categories[0]->cat_ID); ?></a></h5>
                                        <?php endif; ?>

          <h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
          <h2 class="single-subtitle"><?php the_subtitle(); ?></h2>

          <?php ob_start(); ?>
            <div class="article-authors-box clearfix">
                                                    <?php stories_by(); ?>
            </div>
          <?php $authors_box = ob_get_clean(); ?>


        </header> <!-- end article header -->

        <section class="post_content clearfix" itemprop="articleBody">

          <?php echo $wide_media; ?>


          <?php $content = apply_filters('the_content', $raw_content) ?>

          <?php if (!$bottom_byline) : ?>

            <div class="article-authors-box clearfix">
              <?php stories_by(); ?>
              <?php
                $mediums = get_post_meta($post->ID, "alsoby");

                if ($mediums) {
                  foreach ($mediums as $medium) {

                    $pieces = split(":", $medium);
                    $authors = split(",", $pieces[1]);
                    alsoby($pieces[0], $authors);
                  }
                }
              ?>
            </div>

          <?php endif; ?>

          <?php echo $content; ?>



          <?php // the_content(); ?>
          <?php // $content = get_the_content(); ?>
          <?php // echo prefix_insert_after_paragraph($buffer, 1, do_shortcode($content)); ?>

          <?php if ($bottom_byline) : ?>
            <div class="full-width">
                <?php stories_by(); ?>
                <?php
                $mediums = get_post_meta($post->ID, "alsoby");

                if ($mediums) {
                  foreach ($mediums as $medium) {

                    $pieces = split(":", $medium);
                    $authors = split(",", $pieces[1]);
                    alsoby($pieces[0], $authors);
                  }
                }
              ?>
              </div>
          <?php endif; ?>

        </section> <!-- end article section -->

        <footer>

    <?php

      $related_stories = get_post_meta($post->ID, "related_stories");

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

    ?>

          <?php // the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ' ', '</p>'); ?>

        </footer> <!-- end article footer -->

      </article> <!-- end article -->

      </div> <!-- end #main -->

      <?php endwhile; ?>

      <?php else : ?>

      <div id="main" class="twelve columns clearfix" role="main">

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

      </div> <!-- end #main -->

    <?php endif; ?>

  </div> <!-- end #content -->

<?php get_footer(); ?>