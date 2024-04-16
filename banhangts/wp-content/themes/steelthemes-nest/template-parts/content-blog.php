<?php
/*
**=======================================
** Nest Ecommerce Default Blog Content
**=======================================
*/
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
$myexcerpt = wp_trim_words(get_the_excerpt());  
$mycontent = wp_trim_words(get_the_content());  
$post_video_link_get = '';
$post_video_link = get_post_meta(get_the_ID() , 'post_video_link', true);
if(!empty($post_video_link)):
$post_video_link_get = $post_video_link;
else:
$post_video_link_get = esc_html('https://youtu.be/FHXTWNpZxq4' , 'steelthemes-nest');
endif;
?>
<div <?php post_class('col-xl-12'); ?>>
  <article
    class="news_box first-post default_blog_style mb-30 hover-up animated  <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>"
    id="post-<?php esc_attr(the_ID()); ?>">
    <?php if(has_post_thumbnail()): ?>
    <div class="position-relative overflow-hidden">
      <?php if(get_post_meta(get_the_ID() , 'post_video_enable', true) == true): ?>
      <a href="<?php echo esc_url($post_video_link); ?>" class="lightbox-image  top-left-icon">
        <i class="fi-rs-play-alt"></i>
      </a>
      <?php endif; ?>
      <div class="post-thumb border-radius-15">
        <a href="<?php echo esc_url(get_permalink()); ?>">
          <img class="border-radius-15" src="<?php echo esc_url($featured_img_url); ?>" alt="<?php the_title(); ?>" />
        </a>
      </div>
    </div>
    <?php endif; ?>
    <div class="entry-content">
      <?php the_title( '<h2 class="post-title mb-20"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
      <?php if(!empty($myexcerpt)):?>
      <p class="post-exerpt font-medium text-muted mb-30"><?php echo esc_html($myexcerpt); ?></p>
      <?php elseif(!empty($mycontent)): ?>
      <p class="post-exerpt font-medium text-muted mb-30"><?php  echo esc_html($mycontent); ?></p>
      <?php endif; ?>
      <div class="entry-meta meta-2 align-items-center">
        <div class="entry-meta meta-1">
          <div class="font-sm">
            <span class="post-on mr-10"><?php nest_blog_time(); ?></span>
            <span class="hit-count has-dot mr-10"><?php  nest_comments(); ?></span>
            <?php if(!empty(nest_blog_category())): ?> <span
              class="hit-count has-dot"><?php nest_blog_category(); ?></span> <?php endif; ?>
          </div>
        </div>
        <a href="<?php echo esc_url(get_permalink()); ?>"
          class="btn btn-sm"><?php echo esc_html__('Read More' , 'steelthemes-nest'); ?><i
            class="fi-rs-arrow-right ml-10"></i></a>
      </div>
      </div>
  </article>
</div>