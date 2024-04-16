<?php
/*
**==============================   
**Nest Ecommerce Blog
** ==============================
*/
add_action('nest_after_blogsetup_comments', 'nest_comments');
add_action('nest_after_blogsetup_blog_time', 'nest_blog_time');
add_action('nest_after_blogsetup_blog_category', 'nest_blog_category');
add_action('nest_after_blogsetup_share_options_v1', 'nest_share_options_v1');
add_action('nest_after_blogsetup_tags_and_share', 'nest_tags_and_share');
add_action('nest_after_blogsetup_comment_timing', 'nest_comment_timing');
/*
**=========================================
**Nest Ecommerce get-comments
**=========================================
*/
function nest_comments(){
?>
<small class="comments">
    <i class="fi-rs-comment-alt"></i>
    <?php echo comments_popup_link( 
        esc_html__( 'Post a Comment', 'steelthemes-nest' ), 
        esc_html__( '1 Comment', 'steelthemes-nest' ), 
        esc_html__( '% Comments', 'steelthemes-nest' ),
        esc_html__( 'Comments are Closed', 'steelthemes-nest' )
    ); 
?>
</small>
<?php   
}   
/*
**==============================   
** Nest Ecommerce nest_blog_time
**==============================
*/
function nest_blog_time(){
    $time_string = '<time class="date published updated" datetime="%1$s">%2$s</time>';
    if(get_the_time('U') !== get_the_modified_time('U')):
        $time_string = '<time class="date published" datetime="%1$s">%2$s</time>';
    endif;    
    $time_string = sprintf($time_string, esc_attr(get_the_date('c')) , esc_html(get_the_date(get_option('date_format'))));
    $posted_on = '<a href="' . esc_url(get_permalink()) . '" rel="bookmark"><i class="fi-rs-time-oclock"></i> ' . $time_string . '</a>';
    echo '' . $posted_on . '';
}   
/*
**===================================
**Nest Ecommerce nest_blog_category
**===================================
*/
function nest_blog_category(){
$categories = get_the_category();
    if(!empty($categories)) {
        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="entry-meta text-muted">' . esc_html( $categories[0]->name ) . '</a>';
    }
}   

/*
**==============================   
**Nest Ecommerce share
**==============================
*/
function nest_share_options_v1(){  ?>
<div class="social-icons single-share">
<ul class="text-grey-5 d-inline-block">
    <li>
        <strong class="mr-10"><?php echo esc_html__('Share This : ' , 'steelthemes-nest');?></strong>
    </li>
    <li class="social-mds">
        <button class="m_icon" data-toggle="tooltip" data-placement="right" title="facebook" data-sharer="facebook"
            data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>">
            <i class="fa fa-facebook"></i>
        </button>
    </li>
    <li class="social-mds">
        <button class="m_icon" data-toggle="tooltip" data-placement="right" title="twitter" data-sharer="twitter"
            data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>">
            <i class="fa fa-twitter"></i>
        </button>
    </li>
    <li class="social-mds">
        <button class="m_icon" data-toggle="tooltip" data-placement="right" title="whatsapp" data-sharer="whatsapp"
            data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>">
            <i class="fa fa-whatsapp"></i>
        </button>
    </li>
    <li class="social-mds">
        <button class="m_icon" data-toggle="tooltip" data-placement="right" title="telegram" data-sharer="telegram"
            data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-to="+44555-03564">
            <i class="fa fa-telegram"></i>
        </button>
    </li>
    <li class="social-mds">
        <button class="m_icon" data-toggle="tooltip" data-placement="right" title="skype" data-sharer="skype"
            data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>">
            <i class="fa fa-skype"></i>
        </button>
    </li>
</ul>
</div>
<?php
}       
/*
**==================================
**Nest Ecommerce get-tags-and-share
** =================================
*/
function nest_tags_and_share(){ 
$get_the_categorys = get_the_category();
$tag_outputs = get_the_tags();
global $nest_theme_mod;
if((!empty($nest_theme_mod['tag_disable']) == true) || (!empty($nest_theme_mod['category_enable']) == true)):  ?>
<div class="tags_and_cat<?php if((!empty($tags)) && (!empty($nest_theme_mod['tag_disable']) == true)):?> yes_tags<?php endif; ?> <?php  if(!empty($nest_theme_mod['category_enable']) == true):?>yes_share<?php endif; ?>">
  <div class="d-flex">
    <?php  if(!empty($nest_theme_mod['tag_disable']) == true): if(!empty($tag_outputs)): ?>
        <div class="tags_content  mt-40  left_one d-flex">
            <div class="title"><?php echo esc_html__('Tags' , 'steelthemes-nest'); ?></div>
            <?php foreach ($tag_outputs as $tag_output):?>
            <a class="hover-up btn btn-sm btn-rounded mr-10"
                href="<?php echo get_term_link($tag_output); ?>"><?php echo esc_html('#' , 'steelthemes-nest');?><?php echo esc_attr($tag_output->name); ?></a>
            <?php endforeach; ?>
        </div>
        <?php endif;  endif; ?>
        <?php   if(!empty($nest_theme_mod['category_enable']) == true): if(!empty($get_the_categorys)): ?>
        <div class="tags_content  mt-40  right_one d-flex">
            <div class="title"><?php echo esc_html__('Posted in' , 'steelthemes-nest'); ?></div>
            <?php foreach ($get_the_categorys as $get_the_category):?>
            <a class="hover-up btn btn-sm btn-rounded mr-10"
                href="<?php echo get_term_link($get_the_category); ?>"><?php echo esc_html('#' , 'steelthemes-nest');?><?php echo esc_attr($get_the_category->name); ?></a>
            <?php endforeach; ?>
        </div>
        <?php endif;  endif; ?>
    </div>      
</div>   
<?php endif; ?>
<?php 
}   
/*
**================================   
**Nest Ecommerce Comment Timing
**================================
*/
function nest_comment_timing() { 
    $comment_date = get_comment_time('U');
    $dayscommnet = round((date('U') - get_comment_time('U')) / (60*60*24));
    $deltacomment = time() - $comment_date;
    if($deltacomment < 60):
        echo esc_html__('Less than a minute ago' , 'steelthemes-nest');
    elseif($deltacomment > 60 && $deltacomment < 120):
        echo esc_html__('About a minute ago' , 'steelthemes-nest');
    elseif($deltacomment > 120 && $deltacomment < (60*60)):
        echo strval(round(($deltacomment/60),0)), ' minutes ago';
    elseif($deltacomment > (60*60) && $deltacomment < (120*60)):
        echo esc_html__('About an hour ago' , 'steelthemes-nest');
    elseif($deltacomment > (120*60) && $deltacomment < (24*60*60)):
        echo strval(round(($deltacomment/3600),0)), ' hours ago';
    else:
        echo  get_comment_date();
    endif;
}  