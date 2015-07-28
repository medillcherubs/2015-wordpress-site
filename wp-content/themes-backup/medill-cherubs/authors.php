<?php
/*
Template Name: Authors
*/
?>

<?php get_header(); ?>

  <div id="content">

    <div id="main" class="twelve columns clearfix" role="main">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix full-page'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

        <header>

          <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

        </header> <!-- end article header -->

        <section class="post_content clearfix" itemprop="articleBody">
          <?php
          $blogusers = get_users( 'blog_id=1&orderby=lastname' );
          // Array of WP_User objects. ?>

          <?php
          usort($blogusers, create_function('$a, $b', 'if ($a->last_name == $b->last_name) return strnatcasecmp($a->first_name, $b->first_name); else return strnatcasecmp($a->last_name, $b->last_name);'));
          foreach ( $blogusers as $user ) { ?>
<?php if ($user->id > 6 && $user->id < 92 && !strpos($user->user_login, "kupetz") ) : ?>
<div class="cherub-box">
<?php $url = get_author_posts_url(  $user->id ); ?>
<a href="<?php echo $url; ?>">
<div class="cherub-image-box">
<img class="cherub-image" src="http://cherubs.medill.northwestern.edu/2014/wp-content/uploads/sites/5/2014/07/<?php echo str_replace(' ', '', str_replace('-', '', $user->user_login)); ?>-150x150.jpg">
</div>
<div class="cherub-name">
<?php echo $user->user_firstname . ' ' . $user->user_lastname; ?>
</div>
</a>
</div>
<?php endif; ?>

          <?php } ?>

        </section> <!-- end article section -->

        <footer>

          <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

        </footer> <!-- end article footer -->

      </article> <!-- end article -->

      <?php comments_template(); ?>

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

    <?php // get_sidebar(); // sidebar 1 ?>

  </div> <!-- end #content -->

<?php get_footer(); ?>