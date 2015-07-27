<?php get_header(); ?>

<?php
  // get autho info from Wordpress
  if (get_query_var('author_name')) {
    $curauth = get_user_by('slug', get_query_var('author_name'));
  } else {
    $curauth = get_userdata(get_query_var('author'));
  }

  // photo slug
  $slugname = preg_replace( '/\s+/', '', strtolower($curauth->display_name) );
  $photoslug = preg_replace('/\-/', '', $slugname);
?>

<div class="profile-header">

  <h1 class="profile-title">

    <?php echo get_the_author_meta( 'Display_Name', $curauth->ID ); ?>

    <span class="profile-location">
      <?php echo get_the_author_meta( 'Hometown', $curauth->ID ) ?>
      <span class="profile-bullet">&#149;</span>
      <?php echo get_the_author_meta( "School", $curauth->ID ); ?>
    </span>

  </h1>

</div> <!-- profile header -->

<div>

  <div class="large-6 columns">
    <img class="profile-picture" src="<?php echo get_profile_image_path() . $photoslug; ?>.jpg" />
  </div>

  <div class="large-6 columns">

   <!--  <div class="profile-section">
      <h3 class="profile-section-title">Bio</h3>
      <p class="profile-section-body"><?//php echo get_the_author_meta( "bio", $curauth->ID ); ?></p>
    </div> -->

    <div class="profile-section">
      <h3 class="profile-section-title">Journalism highlight</h3>
      <p class="profile-section-body"><?php echo get_the_author_meta( "Journalism Highlights", $curauth->ID ); ?></p>
    </div>

    <div class="profile-section">
      <h3 class="profile-section-title">Favorite cherub moment</h3>
      <p class="profile-section-body"><?php echo get_the_author_meta( "Favorite Cherub Moment", $curauth->ID ); ?></p>
    </div>

    <?php if (get_the_author_meta( "twitter", $curauth->ID )) : ?>
      <?php $twitter = get_the_author_meta( "twitter", $curauth->ID ); ?>
      <div class="profile-section">
        <h3 class="profile-section-title">Twitter</h3>
        <p class="profile-section-body">
          <a href="https://www.twitter.com/<?php echo $twitter; ?>">
            <?php echo get_the_author_meta( "Twitter Handle", $curauth->ID ); ?>
          </a>
        </p>
      </div>
    <?php endif; ?>

    <?php if (get_the_author_meta( "instagram", $curauth->ID )) : ?>
      <?php $instagram = get_the_author_meta( "instagram", $curauth->ID ); ?>
      <div class="profile-section">
        <h3 class="profile-section-title">Instagram</h3>
        <p class="profile-section-body">
          <a href="https://www.instagram.com/<?php echo $instagram; ?>">
            <?php echo $instagram; ?>
          </a>
        </p>
      </div>
    <?php endif; ?>

    <?php if (have_posts()) : ?>

      <div class="profile-section">

        <h3 class="profile-section-title">Stories by <?php echo get_the_author_meta("first_name") ?></h3>

        <ul class="profile-links">
          <?php while (have_posts()) : the_post(); ?>
            <li class="archive-entry">
              <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
            </li>
          <?php endwhile; ?>
        </ul>

      </div>

    <?php endif; ?>

  </div> <!-- end author info -->

</div> <!-- end #content -->

<?php get_footer(); ?>