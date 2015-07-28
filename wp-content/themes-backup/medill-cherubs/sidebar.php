<?php if (get_post_meta($post->ID, "hide_byline", true) !== "yes") : ?>

<div id="sidebar1" class="sidebar three columns" role="complementary">

  <div class="panel">

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

    <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

      <?php // dynamic_sidebar( 'sidebar1' ); ?>

    <?php else : ?>

      <!-- This content shows up if there are no widgets defined in the backend. -->


    <?php endif; ?>

    <?php if (!is_page()) : ?>

    <h5 class="text-label share-label"></h5>

    <div class="share-tools">
      <span class='st_facebook_hcount share-button' displayText='Facebook'></span>
      <span class='st_twitter_hcount share-button' displayText='Tweet'></span>
      <span class='st_email_hcount share-button' displayText='Email'></span>
    </div>

    <?php endif; ?>

  </div>

</div>

<?php endif; ?>