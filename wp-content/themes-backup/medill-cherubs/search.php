<?php get_header(); ?>

<!-- search.php -->
  <div class="twelve columns">

    <div id="content" class="clearfix">

        <div class="twelve columns">

          <h1 class=""><span>Results for</span> <strong>"<?php echo esc_attr(get_search_query()); ?>"</strong></h1>
        </div>

        <div id="main" class="eight columns clearfix" role="main">



            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class('clearfix search-result'); ?> role="article">

                <header>

                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                </header> <!-- end article header -->

                <section class="post_content">
                    <?php the_excerpt('<span class="read-more">Read more on "'.the_title('', '', false).'" &raquo;</span>'); ?>

                </section> <!-- end article section -->

                <footer>


                </footer> <!-- end article footer -->

            </div> <!-- end article -->

            <?php endwhile; ?>

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

            <?php else : ?>

            <!-- this area shows up if there are no results -->

            <article id="post-not-found">
                <header>
                    <h1>No Results Found</h1>
                </header>
                <section class="post_content">
                    <p>Sorry, but the requested resource was not found on this site.</p>
                </section>
                <footer>
                </footer>
            </article>

            <?php endif; ?>

        </div> <!-- end #main -->

        <div class="four columns"></div>

    </div> <!-- end #content -->

  </div>

<?php get_footer(); ?>