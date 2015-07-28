<?php
/*
Template Name: Class of 2015
*/
?>

<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix full-page'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

    <header>
      <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
    </header> <!-- end article header -->

    <section class="post_content clearfix" itemprop="articleBody">
      <?php $blogusers = get_users( 'blog_id=1&orderby=lastname&role=cherub' ); // Array of WP_User objects. ?>

      <?php usort($blogusers, create_function('$a, $b', 'if ($a->last_name == $b->last_name) return strnatcasecmp($a->first_name, $b->first_name); else return strnatcasecmp($a->last_name, $b->last_name);')); ?>

      <?php foreach ( $blogusers as $user ) { ?>

        <?php if ($user->id > 0) : ?>
          <?php $url = get_author_posts_url(  $user->id ); ?>
          <div class="cherub-box">
            <a href="<?php echo $url; ?>">
              <div class="cherub-image-box">
                <img class="cherub-image" src="<?php echo get_profile_image_path() . str_replace(' ', '', str_replace('-', '', $user->user_login)); ?>-150x150.jpg">
              </div>
              <div class="cherub-name">
                <?php echo get_the_author_meta( 'Display_Name', $user->id ) ?>
              </div>
            </a>
          </div>
        <?php endif; ?>

      <?php } // end foreach ?>

    </section> <!-- end article section -->

  </article> <!-- end article -->

  <?php endwhile; ?>

  <?php endif; ?>

<?php get_footer(); ?>