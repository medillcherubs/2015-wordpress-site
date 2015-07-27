<?php
/*
Template Name: Category aka Section Front
*/
?>

<?php

$category_id = get_cat_id( single_cat_title("",false) );
$featured_id = get_section_featured_id();

$subcategories = get_section_categories();

$categories = $subcategories[$category_id];

?>

<?php get_header(); ?>


<?php $show_loop = false; ?>

<div id="content" class="clearfix category">

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

        <div class="large-12 columns primary">

      <?php foreach ($categories as $category_id) : ?>

        <div class="row category-section">
          <div class="columns large-8 large-offset-2">
            <h4><?php echo get_cat_name($category_id); ?></h4>
            <div class="block"></div>
        </div>

        <div class="category">
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
              $thumbnail = get_the_post_thumbnail(  $post->ID, "section-featured-thumbnail" );
              $found_featured = true;
            ?>
          <?php endwhile; ?>

              <!--
              <div class="image columns six">
                <?php if ($found_featured) : ?>
                  <a href="<?php echo $permalink; ?>"><?php echo $thumbnail; ?></a>
                <?php endif; ?>
              </div> -->


              <div class="categoryList columns large-8 large-offset-2">



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
                      <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'section-thumbnail' ); ?></a>
                    </div>

                    <?php $format = get_post_format( $post->ID ); ?>
                    <?php if (in_category(get_graphic_format_id())) $format = "graphic"; ?>

                    <?php if ($format) : ?>

                      <div class="icon icon-<?php echo $format; ?>">
                        <?php if ($format == "video") : ?>
                          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/glyphicons-181-facetime-video.png" alt="">
                        <?php elseif ($format == "gallery" || $format == "image") : ?>
                          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/glyphicons-12-camera.png" alt="">
                        <?php elseif ($format == "audio") : ?>
                          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/audio-icon.png" alt="">
                        <?php elseif ($format == "graphic") : ?>
                          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/glyphicons-42-charts.png" alt="">

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

  </div> <!-- end .row -->

</div> <!-- end #content -->

<?php get_footer(); ?>