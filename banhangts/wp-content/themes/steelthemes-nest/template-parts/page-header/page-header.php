<?php
/*
** ============================== 
**   Nest Ecommerce Default Page Header
** ==============================
*/

  add_action('nest_dafalut_page_header',  'nest_page_header');
  add_action('nest_custom_blog_category_for_pg',  'nest_blog_category_for_pg');
  function nest_blog_category_for_pg(){
    global $nest_theme_mod;
      ?>
      <?php $args = array(
          'style'              => 'list',
          'show_count'         => 0,
          'use_desc_for_title' => 1,
          'exclude'             => ''.esc_attr($nest_theme_mod['page_header_post_exclude']).'',
          'child_of'           => 0,
          'title_li'           => esc_html_e('' , 'steelthemes-nest'),
          'number'             => null,
          'echo'               => 1,
          'depth'              => 2,
          'taxonomy'           => 'category',
      ); ?>
      
        <ul class="blog-categories">   
            <?php wp_list_categories( $args ); ?>
        </ul>
    <?php
  }   

  function  nest_page_header() {  
    global $nest_theme_mod;
    if(!nest_has_page_header()){
      return '';
    }
    if(is_page_template( 'template-empty.php' ) || is_page_template('template-homepage.php') || is_404() ):
      return false;
    endif; 
    if(function_exists( 'dokan_is_store_page' )):
      if(dokan_is_store_page()):
        return false;
      endif; 
    endif; 

    $page_header_style =  '';
    if(!empty($nest_theme_mod['page_header_style'])):
    $page_header_style = $nest_theme_mod['page_header_style'];
    endif;
    if(get_post_meta(get_the_ID() , 'page_header_style_enable_disable', true)):
      $page_header_style = get_post_meta(get_the_ID() , 'custom_pageheader_style', true);
    endif; 
?>
<?php if($page_header_style == 'style_one'): ?>
    <section class="page_header_default pg_bg_cover">
    <?php nest_get_page_header_image(); ?>
        <div class="page_header_content">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="banner_title_inner">
                  <h1>
                    <?php the_archive_title(); ?>
                  </h1>
                </div>
              </div>
              <?php if(!empty($nest_theme_mod['breadcrumb_enable']) == true):  ?>
            <div class="col-lg-12 nest">
                <?php
                  if(!is_singular('product')){
                    do_action('nest_custom_breadcrumb');   
                  }else{
                    if(class_exists('woocommerce')):
                       woocommerce_breadcrumb();
                      endif;
                  } 
                ?>
            </div>
            <?php endif; ?>
          </div>
      </div>
      </div>
    </section>
<?php elseif($page_header_style == 'style_two'): ?>
   
  <div class="page-header style_two pg_bg_cover mt-30 mb-0">

    <div class="container">
        <div class="archive-header">
        <?php nest_get_page_header_image(); ?>
          <div class="d-flex align-items-center position-relative z_99">
              <div class="left_content">
                    <h1> 
                      <?php the_archive_title(); ?>
                    </h1> 
                    <?php if(!empty($nest_theme_mod['breadcrumb_enable']) == true):  ?>
                  
                      <?php do_action('nest_custom_breadcrumb'); ?>
               
                    <?php endif; ?>
                    </div>
                    <div class="right_content text-end d-none d-xl-block">
                        <div class="tags-list">
                         <?php do_action('nest_custom_blog_category_for_pg'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php elseif($page_header_style == 'style_three'): 
  if(!is_front_page() && !is_singular('product')){
  ?> 
  <div class="dokan_only_breadcrumb">
		<div class="auto-container">
			<?php  do_action('nest_custom_breadcrumb'); ?>
		</div>
	</div>
<?php }
elseif(is_singular('product')){
  ?>
  <div class="dokan_only_breadcrumb">
		<div class="auto-container">
 <?php  if(class_exists('woocommerce')): woocommerce_breadcrumb();endif; ?>
 </div>
	</div>
 <?php
} ?>
<?php else: ?>
  <section class="page_header_default pg_bg_cover">
    <?php nest_get_page_header_image(); ?>
        <div class="page_header_content">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="banner_title_inner">
                  <h1>
                    <?php if(empty($title_text)):
                      the_archive_title(); 
                    elseif(!empty($title_text)):
                      echo  do_shortcode(wp_kses($title_text , wp_kses_allowed_html('post'))); 
                    endif;?>
                  </h1>
                </div>
              </div>
            <div class="col-lg-12 nest">
            <?php
                  if(!is_singular('product')){
                    do_action('nest_custom_breadcrumb');   
                  }else{
                    if(class_exists('woocommerce')):
                       woocommerce_breadcrumb();
                      endif;
                  } 
                ?>
            </div>
          </div>
      </div>
      </div>
    </section>
<?php endif; ?>

 
<?php  }
