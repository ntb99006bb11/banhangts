<?php
/*
**==============================   
**Nest Ecommerce Search File
**==============================
*/
get_header(); ?>
<div id="primary" class="content-area blog_masonry col-lg-12"><!-- #primary -->
    <main id="main" class="site-main"><!-- #main -->
	 <div class="row loop-grid"><!---#row---->
		<?php if(have_posts()) : ?>
			<?php /* Start the Loop */ ?>
			<?php while( have_posts()) : the_post(); ?>
				<?php
				/**
				 * Run the loop for the search to output the results.
				 * ifyou want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part('template-parts/content', 'blog');
				?>
			<?php endwhile; ?>
			<?php do_action('nest_custom_pagination'); ?>
		<?php else : ?>
			<?php get_template_part('template-parts/content', 'none'); ?>
		<?php endif; ?>
		</div><!-- #row -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>