<?php
/*
Template Name: Category aka Section Front
*/
?>

<?php $category_id = get_cat_id( single_cat_title("",false) ); ?>
<!-- category id : <?php echo $category_id . " " . single_cat_title("",false) ?>-->
  <?php
    // Show the correct categories


    /*
      10 Section Front Videos
      11 Section Front Featured Story
      4 Academics
  78 Guest Speakers
  91 Learning
  77 Program Overview
  92 Reporting & Editing
      5 Campus Life
  94 Exploring Campus
  93 Residential Life
      76 City Life
  96 Going to Chicago
  97 Living in Evanston
      6 Experiences
  98 Journalism Reflections
  99 Personal Insight
      36 Examples
*/

  $featured_id = 11;
  $lead_video_id = 10;

    switch($category_id) {
      // ACADEMICS
      case 4:
        $categories = array(77, 91, 78, 92);
        break;
      // CAMPUS LIFE
      case 5:
    $primary = 147;
        $categories = array(93, 94);
        break;
      // CITY LIFE
      case 76:
  $primary = 147;
        $categories = array(97, 96);
        break;
      // EXPERIENCES
      case 72:
    $primary = 147;
        $categories = array(98, 99);
        break;


    }
    // category__and
  ?>

<?php get_header(); ?>


<?php $show_loop = false; ?>

<div id="content" class="clearfix category">

<?php $my_query = new WP_Query(array( 'posts_per_page' => 1, 'category__and' => array($category_id, $lead_video_id) ) );
    while ($my_query->have_posts()) : $my_query->the_post();
    $do_not_duplicate = $post->ID;?>

    <div class="video-loop">
      <?php the_content(); ?>
    </div>

    <?php $show_loop = true; ?>
    <?php $media_caption = get_post_meta($post->ID, "media-caption", true); ?>

<?php endwhile; ?>


<div class="<?php if ($show_loop) echo "show-video-loop"; ?>">
  <div class="sectHeader">
    <h2><?php single_cat_title(); ?></h2>
    <h4><?php echo category_description( $category_id ); ?></h4>
    <?php if ($media_caption) : ?>
      <div class="media-caption"><?php echo $media_caption; ?></div>
  <?php endif; ?>
  </div>
</div>

  <?php $size = "large"; ?>

    <div class="row sectContent">

        <div class="twelve columns primary">

      <?php foreach ($categories as $category_id) : ?>

        <div class="row category-section">
          <div class="columns eight offset-by-two">
            <h4><?php echo get_cat_name($category_id); ?></h4>
            <div class="block"></div>
        </div>

        <div class="category row">
    <div class="leadImage">
            </div>

          <?php $found_featured = false; ?>

          <?php $my_query = new WP_Query(array( 'posts_per_page' => 1, 'category__and' => array($category_id, $featured_id) ) );
            while ($my_query->have_posts()) : $my_query->the_post();
            $do_not_duplicate = $post->ID;?>
            <?php
              $permalink = get_permalink();
              $title = get_the_title();
              $excerpt = get_the_excerpt();
              $thumbnail = get_the_post_thumbnail(  $post->ID, "section-featured" );
              $found_featured = true;
            ?>
          <?php endwhile; ?>

              <!--
              <div class="image columns six">
                <?php if ($found_featured) : ?>
                  <a href="<?php echo $permalink; ?>"><?php echo $thumbnail; ?></a>
                <?php endif; ?>
              </div> -->


              <div class="categoryList columns eight offset-by-two">



                <?php if ($found_featured) : ?>

                <div class="featured">

                    <!-- <div class="article-thumbnail"> -->
                      <a href="<?php echo $permalink; ?>"><?php echo $thumbnail; ?></a>
                    <!-- </div> -->



                    <h2><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h2>
                    <div class="sectCaption">
                      <p><?php echo $excerpt; ?></p>
                    </div> <!-- sectCaption -->

                </div>
                <?php endif; ?>

    <!-- $category_id <?php echo $category_id ?> -->
            <?php
              $my_query = new WP_Query(array( 'posts_per_page' => 99, 'cat' => $category_id ) );
              $show_posts = ($my_query->found_posts >= 1);
            ?>

            <?php if ($show_posts) : ?>
              <div class="additionalStories">
                <?php while ($my_query->have_posts()) : $my_query->the_post();  ?>
                  <?php if ($do_not_duplicate == $post->ID) continue; ?>
                  <div class="archive-story">

                    <div class="article-thumbnail">
                      <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'rectangle-thumbnail' ); ?></a>
                    </div>

                    <?php $format = get_post_format( $post->ID ); ?>
                    <?php if (in_category(164)) $format = "graphic"; ?>

                    <?php if ($format) : ?>

                      <div class="icon icon-<?php echo $format; ?>">
                        <?php if ($format == "video") : ?>
                          <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/glyphicons_180_facetime_video.png" alt="">
                        <?php elseif ($format == "gallery" || $format == "image") : ?>
                          <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/glyphicons_011_camera.png" alt="">
                        <?php elseif ($format == "audio") : ?>
                          <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/audio-icon.png" alt="">
                        <?php elseif ($format == "graphic") : ?>
                          <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/glyphicons_041_charts.png" alt="">

                        <?php endif; ?>
                      </div>

                    <?php endif; ?>

                    <?php the_title('<h3 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h3>'); ?>
                    <?php the_excerpt(); ?>
                  </div>
                <?php endwhile;  ?>
              </div>
            <?php endif; ?>

            </div> <!-- end categoryList -->
            <div class="columns one"></div>
          </div> <!-- end leadImage -->





        </div>

            <?php endforeach; ?>

        </div>

        <div class="four columns tertiary">

          <?php foreach ($tertiary as $tertiary_id) : ?>

              <h4><?php echo get_cat_name($tertiary_id); ?></h4>
        <?php $my_query = new WP_Query(array( 'posts_per_page' => 1, 'category__and' => array($tertiary_id, 150) ));
          while ($my_query->have_posts()) : $my_query->the_post();
          $do_not_duplicate = $post->ID;?>
          <div class="tertiaryImage">
            <div class="image">
              <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( $size, $attr ); ?></a>
            </div>
            <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if (get_the_excerpt()) : ?>
              <div class="sectCaption">
                <?php the_excerpt(); ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>

        <?php
          $my_query = new WP_Query(array( 'posts_per_page' => 99, 'cat' => $tertiary_id ));
          $show_posts = ($my_query->found_posts > 1);
        ?>
        <?php if ($show_posts) : ?>
          <h4 class="more-label">More</h4>
          <div class="archiveList">
            <?php while ($my_query->have_posts()) : $my_query->the_post();  ?>
              <?php if ($do_not_duplicate == $post->ID) continue; ?>
              <div class="archive-story">
                <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( $size, $attr ); ?></a>
                <?php the_title('<h3 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h3>'); ?>
              </div>
              <!-- <a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a> -->
            <?php endwhile;  ?>
          </div>
        <?php endif; ?>

            <?php endforeach; ?>

        </div>

  </div> <!-- end .row -->

</div> <!-- end #content -->

<?php get_footer(); ?>