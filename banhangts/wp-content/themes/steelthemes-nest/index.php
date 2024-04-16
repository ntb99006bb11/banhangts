<?php
/*
**============================== 
**   Nest Ecommerce Index File
**==============================
*/
get_header(); 
?>
<div id="primary" class="content-area  <?php  nest_column_for_blog(); ?>"><!---#primary---->
	<main id="main" class="site-main"><!---#main---->
	 <div class="row loop-grid"><!---#row---->
		<?php if( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					/* Include the Post-Format-specific template for the content.
					 * ifyou want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part('template-parts/content-blog');
				?>
			    <?php endwhile; ?>
		        <?php else : ?>
			        <?php get_template_part('template-parts/content', 'none'); ?>
		        <?php endif; ?>
		    </div>
		    <div class="row">
		        <div class="col-lg-12">
				<?php do_action('nest_custom_pagination'); ?>
		        </div>
	        </div><!---#row---->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>


