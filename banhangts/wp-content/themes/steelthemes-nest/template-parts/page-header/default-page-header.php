<?php
/*
** ============================== 
**   Nest Ecommerce Default Page Header
** ==============================
*/
add_action('nest_dafalut_page_header_before_core',  'nest_page_header_before');
function nest_page_header_before(){
?>
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
                <?php do_action('nest_custom_breadcrumb'); ?>
            </div>
          </div>
      </div>
      </div>
    </section>
<?php  }
