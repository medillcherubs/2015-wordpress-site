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

  <h1 class="profile_title h2">

    <?php echo $curauth->display_name; ?>

    <span>
      <?php echo get_the_author_meta( 'hometown', $curauth->ID ) ?>
      <span class="bullet">&#149;</span>
      <?php echo get_the_author_meta( "high_school_name", $curauth->ID ); ?>
    </span>

  </h1>

</div> <!-- profile header -->


<div id="content" class="clearfix">

  <div class="six columns clearfix">
    <img class="profile-picture" src="<?php echo get_profile_image_path() . $photoslug; ?>.jpg" />
  </div>

  <div id="main" class="six columns clearfix" role="main">

    <div class="profile-section">
      <h3>Bio</h3>
      <p><?php echo get_the_author_meta( "bio", $curauth->ID ); ?></p>
    </div>

    <div class="profile-section">
      <h3>Journalism highlight</h3>
      <p><?php echo get_the_author_meta( "journalism_highlight", $curauth->ID ); ?></p>
    </div>

    <div class="profile-section">
      <h3>Favorite cherub moment</h3>
      <p><?php echo get_the_author_meta( "favorite_cherub_moment", $curauth->ID ); ?></p>
    </div>

    <?php if (get_the_author_meta( "twitter", $curauth->ID )) : ?>
      <div class="profile-section">
        <h3>Twitter</h3>
        <p><?php echo get_the_author_meta( "twitter", $curauth->ID ); ?></p>
      </div>
    <?php endif; ?>

    <?php if (get_the_author_meta( "instagram", $curauth->ID )) : ?>
      <div class="profile-section">
        <h3>Instagram</h3>
        <p><?php echo get_the_author_meta( "instagram", $curauth->ID ); ?></p>
      </div>
    <?php endif; ?>

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

      </div>

    <?php endif; ?>

  </div> <!-- end #main -->

  <div class="one columns"></div>

</div> <!-- end #content -->

<?php get_footer(); ?>