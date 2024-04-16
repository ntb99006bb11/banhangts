<?php 
namespace Nestaddons\Core;
class Functions{
	  /**
      * Instantiate the object.
      *
      * @since 1.0.0
      *
      * @return void
      */
      public function __construct() {
		add_shortcode('nest-mega-menu', [$this, 'nest_render_megamenu']);
		add_shortcode('nest-header', [$this, 'nest_render_header']);
		add_shortcode('nest-sticky-header', [$this, 'nest_render_sticky_header']);
		add_shortcode('nest-footer', [$this, 'nest_render_footer']);
	}

/*
** ============================== 
**   nestheader
** ==============================
*/ 
	
public function nest_render_header($atts, $content = '') {
	$header_query_args = array(
		'post_type' => 'header',
		'p' => $atts['id'],
	);
	$header_post_query = new \WP_Query($header_query_args); ?>

	<?php if ($header_post_query->have_posts()) : ?>
		<?php wp_reset_query(); ?> <!-- reset the global $wp_query object -->
		<?php while ($header_post_query->have_posts()) : $header_post_query->the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<!-- end of the loop -->

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php esc_html__('Sorry, no posts matched your criteria.', 'nest-addons'); ?></p>
	<?php endif;
}

/*
** ============================== 
**   nestheader
** ==============================
*/ 
	
public function nest_render_sticky_header($atts, $content = '') {
	$sticky_query_args = array(
		'post_type' => 'sticky_header',
		'p' => $atts['id'],
	);
	$sticky_post_query = new \WP_Query($sticky_query_args); ?>

	<?php if ($sticky_post_query->have_posts()) : ?>
		<?php wp_reset_query(); ?> <!-- reset the global $wp_query object -->
		<?php while ($sticky_post_query->have_posts()) : $sticky_post_query->the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<!-- end of the loop -->

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php esc_html__('Sorry, no posts matched your criteria.', 'nest-addons'); ?></p>
	<?php endif;
}
/*
** ============================== 
**   nest megamenu
** ==============================
*/ 
	
public function nest_render_megamenu($atts, $content = '') {
	$query_args = array(
		'p' => $atts['id'],
		'post_type' => 'mega_menu',
	);
	$post_query = new \WP_Query($query_args); ?>

	<?php if ($post_query->have_posts()) : ?>
		<?php wp_reset_query(); ?> <!-- reset the global $wp_query object -->
		<?php while ($post_query->have_posts()) : $post_query->the_post(); ?>
		
			<?php the_content(); ?>
		<?php endwhile; ?>
		<!-- end of the loop -->

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php esc_html__('Sorry, no posts matched your criteria.', 'nest-addons'); ?></p>
	<?php endif;
}
/*
** ============================== 
**   nestfooter
** ==============================
*/ 
public function nest_render_footer($atts, $content = '') {
	$footer_query_args = array(
		'p' => $atts['id'],
		'post_type' => 'footer',
	);
	$footer_post_query = new \WP_Query($footer_query_args); ?>

	<?php if ($footer_post_query->have_posts()) : ?>
		<?php wp_reset_query(); ?> <!-- reset the global $wp_query object -->
		<!-- the loop -->
		<?php while ($footer_post_query->have_posts()) : $footer_post_query->the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<!-- end of the loop -->

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php esc_html__('Sorry, no posts matched your criteria.', 'nest-addons'); ?></p>
	<?php endif;
  }

    
}