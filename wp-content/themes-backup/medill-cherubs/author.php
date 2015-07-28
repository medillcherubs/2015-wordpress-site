<?php get_header(); ?>

  <div class="twelve columns">

    <div class="clearfix">

        <div class="twelve columns">

          <div class="profile-header">

             <h1 class="profile_title h2">
                <!-- google+ rel=me function -->
                <?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
                $google_profile = get_the_author_meta( 'google_profile', $curauth->ID );
                if ( $google_profile ) {
                    echo '<a href="' . esc_url( $google_profile ) . '" rel="me">' . $curauth->display_name . '</a>'; ?></a>
                <?php } else { ?>
                <?php echo $curauth->display_name; ?>
                <?php } ?>

                <?php $slugname = preg_replace( '/\s+/', '', strtolower($curauth->display_name) ) ?>
    <?php $location = array() ?>
    <?php $city = get_the_author_meta( 'high_school_city', $curauth->ID ) ?>
    <?php $state = get_the_author_meta( 'high_school_state', $curauth->ID ) ?>
    <?php $country = get_the_author_meta( 'country', $curauth->ID ); ?>
    <?php array_push($location, $city) ?>
    <?php if ($state) {
      array_push($location, $state);
    } ?>
    <?php if ($country) {
      array_push($location, $country);
    } ?>

    <?php $location = join(", ", $location) ?>


                <span>
      <?php echo $location ?>
                  <span class="bullet">&#149;</span>
                  <!-- &middot; -->
      <?php $highschool = get_the_author_meta( "high_school_name", $curauth->ID ) ?>
                  <?php echo $highschool; ?>
                </span>

            </h1>

        </div>

      </div>

    </div>

    <div id="content" class="clearfix">

        <div class="six columns clearfix">
          <?php $photoslug = preg_replace('/\-/', '', $slugname) ?>
          <img class="profile-picture" src="http://cherubs.medill.northwestern.edu/2014/wp-content/uploads/sites/5/2014/07/<?php echo $photoslug; ?>.jpg" />

        </div>

        <div id="main" class="six columns clearfix" role="main">



            <?php $bio = get_the_author_meta( "bio", $curauth->ID ) ?>
            <?php $moment = get_the_author_meta( "cherub_memory", $curauth->ID ) ?>

            <div class="profile-section">
                <h3>Bio</h3>
                <p><?php echo $bio; ?></p>
            </div>

            <div class="profile-section">
                <h3>Favorite cherub moment</h3>
                <p><?php echo $moment; ?></p>
            </div>






              <?php if (have_posts()) : ?>
              <div class="profile-section">

              <h3>Stories by <?php echo get_the_author_meta("first_name") ?></h3>

              <ul>
              <?php while (have_posts()) : the_post(); ?>

                  <li class="archive-entry">
                      <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                  </li>

              <?php endwhile; ?>

              </ul>

              <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>

                  <?php page_navi(); // use the page navi function ?>

              <?php } else { // if it is disabled, display regular wp prev & next links ?>
                  <nav class="wp-prev-next">
                      <ul class="clearfix">
                          <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
                          <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
                      </ul>
                  </nav>
              <?php } ?>

            </div>


            <?php else : ?>


            <?php endif; ?>

        </div> <!-- end #main -->

        <div class="one columns"></div>

    </div> <!-- end #content -->

  </div>

<?php get_footer(); ?>