<?php
/*
**==============================   
**Nest Ecommerce Page File
**==============================
*/
get_header();
?>
	<div id="primary" class="content-area  <?php  nest_column_for_page(); ?>"><!-- #primary -->
		<main id="main" class="site-main"><!-- #main -->
			<div class="row"><!-- #row -->

			<?php while(have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content', 'page'); ?>
				<div class="col-lg-12 padding_zero">
				<?php
					// ifcomments are open or we have at least one comment, load up the comment template
					if(comments_open() || get_comments_number()) :
						comments_template();
					endif;
				?>
				</div>
			<?php endwhile; ?>
	
		</div><!-- #row -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>