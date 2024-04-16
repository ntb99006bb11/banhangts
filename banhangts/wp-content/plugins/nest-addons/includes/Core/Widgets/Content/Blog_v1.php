<?php

namespace  Nestaddons\Core\Widgets\Content;

if (!defined('ABSPATH')) {
    exit;
} // If this file is called directly, abort.

class Blog_v1 extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nest-blog-v1';
    }

    public function get_title()
    {
        return __('Blog Post  V1', 'nest-addons');
    }

    public function get_icon()
    {
        return 'icon-letter-n';
    }

    public function get_categories()
    {
        return ['102'];
    }

    protected function register_controls(){
 
        // style one start
        $this->start_controls_section('blog_settings',
        [ 
            'label' => __('Blog Content', 'nest-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );

        $this->add_control(
            'blog_type',
            [
                'label' => __('Select Carousel Or Grid', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'carousel'   => esc_html__( 'Carousel', 'nest-addons' ),
                    'grid'   => esc_html__( 'Grid', 'nest-addons' ), 
                ],
                'default' => 'grid',
            ]
        );

        $this->add_control(
            'blog_style',
            [
                'label' => __('Blog style', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__( 'Style One', 'nest-addons' ),
                    'style_two'   => esc_html__( 'Style Two', 'nest-addons' ),
                    'style_three'   => esc_html__( 'Style Three', 'nest-addons' ), 
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'carousel_items',
            [
            'label' => __('Carousel Items', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [

                '6' => __('6 Items', 'nest-addons'),
                '5' => __('5 Items', 'nest-addons'),
                '4' => __('4 Items', 'nest-addons'),
                '3' => __('3 Items', 'nest-addons'),
                '2' => __('2 Items', 'nest-addons'),
                '1' => __('1 Items', 'nest-addons'),
            ],
            'default' => '4' , 
            'condition' => [
                'blog_type' => 'carousel' , 
            ], 
            ]
        );
        
  
        $this->add_control(
            'blog_column',
            [
                'label' => __('Blog Column', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'col-xl-3 col-lg-4 col-md-6 col-sm-6'   => esc_html__( 'Four Column', 'nest-addons' ),
                    'col-xl-4 col-lg-4 col-md-6 col-sm-6'   => esc_html__( 'Three Column', 'nest-addons' ),
                    'col-xl-6 col-lg-6 col-md-6 col-sm-6'   => esc_html__( 'Two Column', 'nest-addons' ),
                    'col-xl-12'   => esc_html__( 'One Column', 'nest-addons' ),
                ],
                'default' => 'col-xl-3 col-lg-4 col-md-6 col-sm-6',
                'condition' => [
                    'blog_style' => ['style_one' , 'style_three']
                ], 
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label' => __('Blog Count', 'nest-addons'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
            ]
        );
        $this->add_control(
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'nest-addons' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
       
        $this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'nest-addons' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
                    ''  => esc_html__( 'Default', 'nest-addons' ),
					'date'       => esc_html__( 'Date', 'nest-addons' ),
					'title'      => esc_html__( 'Title', 'nest-addons' ),
					'menu_order' => esc_html__( 'Menu Order', 'nest-addons' ),
					'rand'       => esc_html__( 'Random', 'nest-addons' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'nest-addons' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
                    ''  => esc_html__( 'Default', 'nest-addons' ),
					'DESC' => esc_html__( 'DESC', 'nest-addons' ),
					'ASC'  => esc_html__( 'ASC', 'nest-addons' ),
				),
			]
        );
      
        $this->add_control(
            'query_category', 
			[
            'type' => \Elementor\Controls_Manager::SELECT,
			'label' => esc_html__('Category', 'nest-addons'),
			'options' => nest_get_blog_categories(),
			]
        );

        $this->add_control(
            'post_not_in',
            [
                'label'       => esc_html__( 'Post Not In', 'nest-addons' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( '' , 'nest-addons'),
            ]
        );
        
        $this->add_control(
            'pagination_enable',
           [
              'label' => __('Pagination Enable', 'nest-addons'),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => __('Yes', 'nest-addons'),
               'label_off' => __('No', 'nest-addons'),
               'return_value' => 'yes',
               'default' => 'yes',
           ]
        );
    
        $this->add_responsive_control(
            'pagination_alignment',
            [
                'label' => __('Pagination alignments', 'nest-addons'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                  'left' => [
                    'title' => __( 'Pagination Left', 'nest-addons' ),
                    'icon' => 'eicon-text-align-left',
                  ],
                  'center' => [
                    'title' => __( 'Pagination Center', 'nest-addons' ),
                    'icon' => 'eicon-text-align-center',
                  ],
                  'right' => [
                    'title' => __( 'Pagination Right', 'nest-addons' ),
                    'icon' => 'eicon-text-align-right',
                  ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                  '{{WRAPPER}} .pagination_blog ' => 'text-align: {{VALUE}}!important;',
                ],
                'condition' => [
                    'pagination_enable' => 'yes'
               ],
            ]
        );
     
    $this->end_controls_section();

    $this->start_controls_section('blog_css',
    [ 
        'label' => __('Blog Custom Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
    ]
    );

 
    $this->add_control(
        'title_color',
         [
            'label' => __('Title Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog_post  .post-title a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
   
    $this->add_control(
        'tag_color',
         [
            'label' => __('Tag Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog_post  .entry-meta.meta-1 .entry-meta  , {{WRAPPER}} .blog_post  .entry-content-2 h6 a ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
   
    $this->add_control(
        'date_and_comment_color',
         [
            'label' => __('Date / Comment Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog_post  .date.published , .blog_post .Comments , {{WRAPPER}} .blog_style_three .entry-meta div span i  ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );


    $this->add_control(
        'dot_color',
         [
            'label' => __('Dot Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} span.has-dot::before  ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );

     
    $this->add_control(
        'description_color',
         [
            'label' => __('Description Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog_post  .post-exerpt ' => 'color: {{VALUE}}!important;',
            ],
            'condition' => [
                'blog_style' => ['style_two' , 'style_three']
            ], 
         ]
    );


    $this->add_control(
        'button_text_color',
         [
            'label' => __('Button Text Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog_post  .entry-meta.meta-1 .text-brand.font-heading.font-weight-bold , {{WRAPPER}}  .blog_post .entry-meta.meta-2 .btn.btn-sm' => 'color: {{VALUE}}!important;',
            ],
            'condition' => [
                'blog_style' => ['style_two' , 'style_three']
            ], 
         ]
    );
   
    $this->add_control(
        'button__bg_color',
         [
            'label' => __('Button Background Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .blog_post .entry-meta.meta-2 .btn.btn-sm ' => 'background: {{VALUE}}!important;',
            ],
            'condition' => [
                'blog_style' => ['style_three']
            ], 
         ]
    );

    $this->add_control(
        'box_background',
         [
            'label' => __('Box Background Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .loop-grid.loop-list article ' => 'background: {{VALUE}}!important;',
            ],
            'condition' => [
                'blog_style' => ['style_two']
            ], 
         ]
    );
    $this->add_control(
        'box_border',
         [
            'label' => __('Box Border Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .loop-grid.loop-list article ' => 'border-color: {{VALUE}}!important;',
            ],
            'condition' => [
                'blog_style' => ['style_two']
            ], 
         ]
    );
   
    
 
    $this->end_controls_section();

              
    $this->start_controls_section('owl_nav_style',
    [ 
        'label' => __('Custom Css', 'nest-addons'),
        'tab' =>\Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
            'blog_type' => 'carousel' ,
        ], 
    ]
    );
 

    $this->add_control(
        'nav_style_options',
        [
        'label' => __('Nav Move Position', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'none_nav' => __( 'Select Nav Position', 'nest-addons' ),
            'position_one' => __( 'Position One', 'nest-addons' ),
            'position_two' => __( 'Position Two', 'nest-addons' ),
            'position_three' => __( 'Position Three', 'nest-addons' ),
            'position_four' => __( 'Position Four', 'nest-addons' ),
        ],
        'default' => 'position_one' ,
        ]
    );

     
    $this->add_control(
        'nav_move_count',
        [
            'label' => __('Nav Move Top', 'nest-addons'),
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'min'     => -100,
            'max'     => 1,
            'step'    => 1,
            'condition' => [
                'nav_style_options' => ['position_two' , 'position_three'],
            ],
            'selectors' => [
                '{{WRAPPER}}  .position_two .owl-carousel .owl-nav , {{WRAPPER}}  .position_two .owl-carousel .owl-nav ' => 'top: {{VALUE}}px!important;',
            ],
        ]
    );
   
 
 
    $this->add_responsive_control(
        'nav_display',
        [
        'label' => __('Naigation Enable / Disabel', 'nest-addons'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'true' => __( 'Block', 'nest-addons' ),
            'false' => __( 'none', 'nest-addons' ),
        ],
        'default' => 'true' , 
       
        ]
    );
    $this->add_control(
        'owl_nav_color',
         [
            'label' => __('Owl Nav Arrow Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-tabs_two  .owl-nav i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'owl_nav_bg_color',
         [
            'label' => __('Owl Nav Arrow Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-tabs_two .owl-carousel .owl-nav .owl-prev, .product-tabs_two .owl-carousel .owl-nav .owl-next ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );

    
    $this->add_control(
        'owl_nav_hover_color',
         [
            'label' => __('Owl Nav Hover Arrow Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-tabs_two  .owl-nav .owl-prev:hover i , {{WRAPPER}} .product-tabs_two  .owl-nav .owl-next:hover i ' => 'color: {{VALUE}}!important;',
            ],
         ]
    );
     
    $this->add_control(
        'owl_nav_hover_bg_color',
         [
            'label' => __('Owl Nav Hover Arrow Bg Color', 'nest-addons'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .product-tabs_two .owl-carousel .owl-nav .owl-prev:hover , {{WRAPPER}} .product-tabs_two .owl-carousel .owl-nav .owl-next:hover ' => 'background: {{VALUE}}!important;',
            ],
         ]
    );
 

    $this->end_controls_section();
 

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');

    ?>
    <?php if($settings['blog_type'] == 'grid'): ?>
     <section class="blog_post position-relative blog_<?php echo esc_attr($settings['blog_style']);?>">
        <div class="row loop-grid <?php if($settings['blog_style'] == 'style_two'): ?><?php echo esc_html('loop-list' , 'nest-addons'); ?><?php endif; ?>">
                <?php if(get_query_var('paged')){ 
                    $paged = get_query_var( 'paged' ); 
                    } elseif ( get_query_var( 'page' ) ) { 
                    $paged = get_query_var( 'page' ); 
                    } else { 
                    $paged = 1; 
                }
                  $post_not_in = '';
                  if(!empty($settings['post_not_in'])){
                      $post_not_in = explode(',', $settings['post_not_in']);
                  }
                  else{
                      $post_not_in = '0';
                  }
                  $query_args = array(
                        'post_type' => 'post',
                        'ignore_sticky_posts' => true,
                        'paged'             => $paged,
                        'posts_per_page' => $settings['post_count'],
                        'orderby'        => $settings['query_orderby'],
                        'order'          =>  $settings['query_order'],
                        'post__not_in'   => $post_not_in ,
                    );
                    if($settings['query_category'] ) $query_args['category_name'] = $settings['query_category'];
                     
                        $blog_query = new \WP_Query( $query_args );
                    ?>
                    <?php if($blog_query->have_posts()):
                            while($blog_query->have_posts()) : $blog_query->the_post();
                            global $post;
                            $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']);  
                            $mycontent = wp_trim_words(get_the_content(), $settings['text_limit']); 
                            $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
                            $post_video_link_get = '';
                            $post_video_link = get_post_meta(get_the_ID() , 'post_video_link', true);
                            if(!empty($post_video_link)):
                            $post_video_link_get = $post_video_link;
                            else:
                            $post_video_link_get = esc_html('https://youtu.be/FHXTWNpZxq4' , 'nest');
                            endif;
                    // while loop start ?>
                    <?php // blog style ?>
						<?php if($settings['blog_style'] == 'style_one'): ?>
                    <?php // blog style ?>    
                        <div class="<?php echo esc_attr($settings['blog_column']); ?>">
                            <article class="text-center hover-up mb-30 animated">
                                <?php if(has_post_thumbnail()): ?>
                                    <div class="post-thumb">
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <img class="border-radius-15" src="<?php echo esc_url($featured_img_url); ?>" alt="<?php the_title(); ?>" />
                                        </a>
                                        <?php if(get_post_meta(get_the_ID() , 'post_video_enable', true) == true): ?>
                                        <div class="entry-meta">
                                            <a href="<?php echo esc_url($post_video_link); ?>"  class="lightbox-image  entry-meta meta-2">
                                                <i class="fi-rs-play-alt"></i>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                    <div class="entry-content-2">
                                        <h6 class="mb-10 font-sm"><?php nest_blog_category(); ?></h6>
                                        <h4 class="post-title mb-15">
                                            <?php the_title('<a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
                                        </h4>
                                        <div class="entry-meta font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on mr-10"><?php nest_blog_time(); ?></span>
                                                <span class="hit-count has-dot mr-10"><?php  nest_comments(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <?php // blog style ?>              
                                <?php elseif($settings['blog_style'] == 'style_two'): ?>
                            <?php // blog style ?>
                            <div class="col-lg-12">
                                <article class="wow fadeIn animated hover-up mb-30 animated">
                                <?php if(has_post_thumbnail()): ?>
                                    <div class="post-thumb" style="background-image: url(<?php echo esc_url($featured_img_url); ?>)">
                                        <?php if(get_post_meta(get_the_ID() , 'post_video_enable', true) == true): ?>
                                        <div class="entry-meta">
                                            <a href="<?php echo esc_url($post_video_link); ?>"  class="lightbox-image  entry-meta meta-2">
                                                <i class="fi-rs-play-alt"></i>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="entry-content-2 pl-50">
                                        <h3 class="post-title mb-20">
                                        <?php the_title('<a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
                                        </h3>
                                        <?php if(!empty($myexcerpt)): ?>
                                            <p class="post-exerpt mb-40"><?php echo  esc_html($myexcerpt); ?></p>
                                        <?php elseif(!empty($mycontent)): ?>
                                            <p class="post-exerpt mb-40"><?php echo  esc_html($mycontent); ?></p>
                                        <?php endif; ?>
                                        
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                            <span class="post-on mr-10"><?php nest_blog_time(); ?></span>
                                            <span class="hit-count has-dot mr-10"><?php nest_blog_category(); ?></span>
                                            <span class="hit-count has-dot mr-10"><?php  nest_comments(); ?></span>
                                            </div>
                                            <a href="<?php echo esc_url(get_permalink()); ?>" class="text-brand font-heading font-weight-bold"><?php echo esc_html('Read more' , 'nest-addons'); ?> <i class="fi-rs-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <?php // blog style ?>              
                                <?php elseif($settings['blog_style'] == 'style_three'): ?>
                            <?php // blog style ?>      
                            <div class="<?php echo esc_attr($settings['blog_column']); ?>">
                                <article class="news_box  first-post mb-30 hover-up animated  <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>">
                                    <?php if(has_post_thumbnail()): ?>
                                        <div class="position-relative overflow-hidden">
                                            <?php if(get_post_meta(get_the_ID() , 'post_video_enable', true) == true): ?>
                                                <a href="<?php echo esc_url($post_video_link); ?>"  class="lightbox-image  top-left-icon">
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
                                <div class="mb-20 entry-meta meta-2">
                                    <div class="entry-meta meta-1 mb-30">
                                        <div class="font-sm">
                                            <span class="post-on mr-10"><?php nest_blog_time(); ?></span>
                                            <span class="hit-count has-dot mr-10"><?php  nest_comments(); ?></span>
                                            <span class="hit-count has-dot"><?php nest_blog_category(); ?></span>
                                        </div>
                                    </div>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-sm"><?php echo esc_html('Read More' , 'nest'); ?><i class="fi-rs-arrow-right ml-10"></i></a>
                                </div>
                                </div>
                            </article>
                            </div>  
                            <?php // blog style ?>              
                                <?php endif; ?>
                            <?php // blog style ?>                        
	
                    <?php endwhile; // while loop end ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; // Post Endif after loop end  ?>
        </div>
    <!--End tab-content-->
    <?php if($settings['pagination_enable'] == true):?>
            <div class="row">
        <div class="col-lg-12">
        <div class="pagination_blog">
           
        <?php
     $pagination = 999999999;
     echo paginate_links( array(
          'base' => str_replace( $pagination, '%#%', get_pagenum_link( $pagination ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, $paged ),
          'total' => $blog_query->max_num_pages,
          'prev_text' => '<i class="fi-rs-arrow-small-left"></i>',
          'next_text' => '<i class="fi-rs-arrow-small-right"></i>',
          'type'=>'list', 
          'add_args' => false
     ) );
?>          
            </div>
            </div>     
            </div> 
            <?php endif; ?>  
</section>

<?php elseif($settings['blog_type'] == 'carousel'): ?>
    <div class="blog_carousel position-relative <?php echo esc_attr($settings['nav_style_options']); ?>">
        <?php     $post_not_in = '';
                  if(!empty($settings['post_not_in'])){
                      $post_not_in = explode(',', $settings['post_not_in']);
                  }
                  else{
                      $post_not_in = '0';
                  }
                  $query_args = array(
                        'post_type' => 'post',
                        'ignore_sticky_posts' => true,
                        'order'=> 'DESc', 
                        'posts_per_page' => $settings['post_count'],
                        'orderby'        => $settings['query_orderby'],
                        'order'          =>  $settings['query_order'],
                        'post__not_in'   => $post_not_in ,
                    );
                    if($settings['query_category'] ) $query_args['category_name'] = $settings['query_category'];
                     
                        $blog_query = new \WP_Query( $query_args );
                    ?>
                     <div class="theme_carousel loop-grid owl-theme owl-carousel"
        data-options='{"loop": false, "margin": 20,  "autoheight":true, "lazyload":true, "nav": <?php echo esc_attr($settings['nav_display']); ?>, "dots": false, "autoplay": false, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }  , "550" :{ "items" : "1" } , "768" :{ "items" : "2" }  , "992":{ "items" : "3" }, "1200":{ "items" : "<?php echo esc_attr($settings['carousel_items']); ?>" }}}'>
    
                    <?php if($blog_query->have_posts()):
                            while($blog_query->have_posts()) : $blog_query->the_post();
                            global $post;
                            $myexcerpt = wp_trim_words(get_the_excerpt(), $settings['text_limit']);  
                            $mycontent = wp_trim_words(get_the_content(), $settings['text_limit']); 
                            $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
                            $post_video_link_get = '';
                            $post_video_link = get_post_meta(get_the_ID() , 'post_video_link', true);
                            if(!empty($post_video_link)):
                            $post_video_link_get = $post_video_link;
                            else:
                            $post_video_link_get = esc_html('https://youtu.be/FHXTWNpZxq4' , 'nest');
                            endif;
                    // while loop start ?>
                    <?php // blog style ?>
						<?php if($settings['blog_style'] == 'style_one'): ?>
                    <?php // blog style ?>    
                
                            <article class="text-center hover-up  animated">
                                <?php if(has_post_thumbnail()): ?>
                                    <div class="post-thumb">
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <img class="border-radius-15" src="<?php echo esc_url($featured_img_url); ?>" alt="<?php the_title(); ?>" />
                                        </a>
                                        <?php if(get_post_meta(get_the_ID() , 'post_video_enable', true) == true): ?>
                                        <div class="entry-meta">
                                            <a href="<?php echo esc_url($post_video_link); ?>"  class="lightbox-image  entry-meta meta-2">
                                                <i class="fi-rs-play-alt"></i>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                    <div class="entry-content-2">
                                        <h6 class="mb-10 font-sm"><?php nest_blog_category(); ?></h6>
                                        <h5 class="post-title mb-15">
                                            <?php the_title('<a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
                                        </h5>
                                        <div class="entry-meta font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on mr-10"><?php nest_blog_time(); ?></span>
                                                <span class="hit-count has-dot mr-10"><?php  nest_comments(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                    
                            <?php // blog style ?>              
                                <?php elseif($settings['blog_style'] == 'style_two'): ?>
                            <?php // blog style ?>
                       
                                <article class="wow fadeIn animated hover-up   animated">
                                <?php if(has_post_thumbnail()): ?>
                                    <div class="post-thumb" style="background-image: url(<?php echo esc_url($featured_img_url); ?>)">
                                        <?php if(get_post_meta(get_the_ID() , 'post_video_enable', true) == true): ?>
                                        <div class="entry-meta">
                                            <a href="<?php echo esc_url($post_video_link); ?>"  class="lightbox-image  entry-meta meta-2">
                                                <i class="fi-rs-play-alt"></i>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="entry-content-2 pl-50">
                                        <h5 class="post-title mb-20">
                                        <?php the_title('<a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
                                        </h5>
                                        <?php if(!empty($myexcerpt)): ?>
                                            <p class="post-exerpt mb-40"><?php echo  esc_html($myexcerpt); ?></p>
                                        <?php elseif(!empty($mycontent)): ?>
                                            <p class="post-exerpt mb-40"><?php echo  esc_html($mycontent); ?></p>
                                        <?php endif; ?>
                                        
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                            <span class="post-on mr-10"><?php nest_blog_time(); ?></span>
                                            <span class="hit-count has-dot mr-10"><?php nest_blog_category(); ?></span>
                                            <span class="hit-count has-dot mr-10"><?php  nest_comments(); ?></span>
                                            </div>
                                            <a href="<?php echo esc_url(get_permalink()); ?>" class="text-brand font-heading font-weight-bold"><?php echo esc_html('Read more' , 'nest-addons'); ?> <i class="fi-rs-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                                <?php // blog style ?>              
                                <?php elseif($settings['blog_style'] == 'style_three'): ?>
                            <?php // blog style ?>      
              
                                <article class="news_box  first-post   hover-up animated  <?php if(has_post_thumbnail()): ?>has_images<?php else: ?>no_images<?php endif; ?>" id="post-<?php esc_attr(the_ID()); ?>">
                                    <?php if(has_post_thumbnail()): ?>
                                        <div class="position-relative overflow-hidden">
                                            <?php if(get_post_meta(get_the_ID() , 'post_video_enable', true) == true): ?>
                                                <a href="<?php echo esc_url($post_video_link); ?>"  class="lightbox-image  top-left-icon">
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
                                <?php the_title( '<h5 class="post-title mb-20"><a href="' .  esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>' ); ?>
                                    <?php if(!empty($myexcerpt)):?>
                                        <p class="post-exerpt font-medium text-muted mb-30"><?php echo esc_html($myexcerpt); ?></p>
                                    <?php elseif(!empty($mycontent)): ?>
                                        <p class="post-exerpt font-medium text-muted mb-30"><?php  echo esc_html($mycontent); ?></p>
                                    <?php endif; ?>
                                <div class="mb-20 entry-meta meta-2">
                                    <div class="entry-meta meta-1 mb-30">
                                        <div class="font-sm">
                                            <span class="post-on mr-10"><?php nest_blog_time(); ?></span>
                                            <span class="hit-count has-dot mr-10"><?php  nest_comments(); ?></span>
                                            <span class="hit-count has-dot"><?php nest_blog_category(); ?></span>
                                        </div>
                                    </div>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-sm"><?php echo esc_html('Read More' , 'nest'); ?><i class="fi-rs-arrow-right ml-10"></i></a>
                                </div>
                                </div>
                            </article>
                       
                            <?php // blog style ?>              
                                <?php endif; ?>
                            <?php // blog style ?>                        
	
                    <?php endwhile; // while loop end ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; // Post Endif after loop end  ?>
        </div>
        </div>
    <?php endif; ?>  
      <?php
    }
}

         