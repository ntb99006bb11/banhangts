<?php
/*
**==============================   
**Nest Ecommerce Single File
**==============================
*/
get_header(); 
?>
<div id="primary" class="content-area <?php  nest_column_for_blog(); ?>">
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
		    <?php get_template_part( 'template-parts/content', 'single' ); ?>
		<?php endwhile; // end of the loop. ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>