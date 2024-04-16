<?php
/*
** ============================== 
**   Nest Ecommerce Single Page Content
** ==============================
*/
$extra_class = 'blog_single_details_outer   single-content';
$post_sub_title = get_post_meta(get_the_ID() , 'page_header_title', true);
$allowed_tags = wp_kses_allowed_html('post');
global $nest_theme_mod;
?>
<section id="post-<?php esc_attr(the_ID()); ?>" <?php esc_attr(post_class($extra_class)); ?>>
  <div class="single_content_upper">
    <?php if(!empty($post_sub_title)): ?>
    <h1 class="sub_title_meta"><?php echo wp_kses($post_sub_title , $allowed_tags); ?></h1>
    <?php endif; ?>
    <?php if(has_post_thumbnail()): ?>
    <div class="single-thumbnail">
      <?php the_post_thumbnail(array(770,400)); ?>
    </div>
    <?php endif;?>
    <div class="post_single_content">
      <?php the_content(); ?>
      <div class="clearfix"></div>
      <?php wp_link_pages(); ?>
    </div>
  </div>
  <div class="single_content_lower clearfix">
    <?php do_action('nest_after_blogsetup_tags_and_share'); ?>
    <?php if(!empty($nest_theme_mod['share_disable']) == true): ?>
    <div class="share_content right_one">
      <?php nest_share_options_v1(); ?>
    </div>
    <?php endif;?>
    <?php if(!empty($nest_theme_mod['next_prev_enable']) == true): do_action('nest_custom_pagination_width_img'); endif;?>
    <?php //nest_authour_details(); ?>
    <?php // If comments are open or we have at least one comment, load up the comment template
	    if(comments_open() || get_comments_number()):
		    comments_template();
	    endif;
	  ?>
  </div>
</section>