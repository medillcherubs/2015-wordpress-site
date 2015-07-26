<?php get_header(); ?>

	<div id="content" class="clearfix">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php $full_width_post = full_width(); ?>

		<div id="main" class="twelve columns clearfix <?php if ($full_width_post) { ?>full-width<?php } ?>" role="main">

			<?php $raw_content = trim(get_the_content()); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header>

					<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
					<h2 class="single-subtitle"><?php the_subtitle(); ?></h2>

				</header>

				<section class="post_content clearfix" itemprop="articleBody">

					<?php $content = apply_filters('the_content', $raw_content) ?>

					<div class="body clearfix">

						<?php if (!$full_width_post) { ?>
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
						<?php } ?>

						<div class="main-content">
							<?php echo $content; ?>
						</div>

						<?php if ($full_width_post) { ?>
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
						<?php } ?>

					</div>

				</section>

			</article>

		</div>

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