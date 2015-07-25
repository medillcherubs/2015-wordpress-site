<?php get_header(); ?>

	<div id="content" class="clearfix">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php $full_width_post = in_category(79); ?>

		<?php if ($full_width_post) { ?>
			<div id="main" class="twelve columns clearfix" role="main">
		<?php } else { ?>
			<div id="main" class="eleven columns clearfix offset-by-one" role="main">
		<?php } ?>

			<?php 

				$raw_content = trim(get_the_content()); 
				// if ($raw_content[0] == "[") echo "found shortcode";

				$pattern = get_shortcode_regex();

			    if (   preg_match( '/^'. $pattern .'/s', $raw_content, $matches ) )
			    {
			    	$shortcode = $matches[0];
			        $attrs = shortcode_parse_atts($matches[3]);
			        if ($attrs["size"] == "full" || $attrs["size"] == "wide") {
			        	$raw_content = preg_replace( '/^'. $pattern .'/s', "", $raw_content );
			        }
		        	if ($attrs["size"] == "full") $full_media = do_shortcode($matches[0]); 
		        	if ($attrs["size"] == "wide") $wide_media = do_shortcode($matches[0]); 
		        	
			    }

			?>

			<?php if ($full_media) echo $full_media; ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				
				<header>
									
					<?php $categories = get_the_category(); ?>
					
					<?php 
						if ($categories[0]->cat_ID == 1) array_shift($categories);

					?>


					<?php if ($categories[0]) : ?>
					<h5 class="small-label category-label"><a href="<?php echo get_category_link($categories[0]->cat_ID); ?>"><?php echo cherub_category($categories[0]->cat_ID); ?></a></h5>
                                        <?php endif; ?>

					<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
					<h2 class="single-subtitle"><?php the_subtitle(); ?></h2>


				</header> <!-- end article header -->
			
				<section class="post_content clearfix" itemprop="articleBody">

					<?php echo $wide_media; ?>
					
					<?php $content = apply_filters('the_content', $raw_content) ?>

					<div class="body clearfix">

						<div class="main-content">
							<?php echo $content; ?>
						</div>

						<div class="article-authors-box clearfix">
							<?php stories_by(); ?>
						</div>


					</div>


			
				</section> <!-- end article section -->
				
				<footer>
					
					<?php related_stories(get_post_meta($post->ID, "related_stories")); ?>
										
				</footer> <!-- end article footer -->
			
			</article> <!-- end article -->

			</div> <!-- end #main -->	
			
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