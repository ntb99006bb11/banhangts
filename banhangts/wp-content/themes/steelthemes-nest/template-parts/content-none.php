<?php
/*
** ============================== 
**   Nest Ecommerce  Content None
** ==============================
*/
?>
<section class="no-results not-found">
	<div class="header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'steelthemes-nest' ); ?></h1>
	</div><!-- .page-header -->
	<div class="content">
		<?php if(is_home() && current_user_can('publish_posts')) : ?>
			<p><?php echo esc_html__( 'Ready to publish your first post?', 'steelthemes-nest'); ?> <a href="<?php echo esc_url(admin_url( 'post-new.php' )); ?>"><?php echo esc_html__('Get started here','steelthemes-nest'); ?></a></p>
		<?php elseif(is_search()) : ?>
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'steelthemes-nest'); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'steelthemes-nest'); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->