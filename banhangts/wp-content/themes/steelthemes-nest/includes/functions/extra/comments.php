<?php
/*
** ============================== 
**   Nest Ecommerce Layout
** ==============================
** Comment callback function
** @param object $comment
** @param array  $args
** @param int    $depth
*/
function nest_comment($comment, $args, $depth) {
    if('div' === $args['style']):
        $tag       = 'div';
        $add_below = 'comment';
    else:
        $tag       = 'li';
        $add_below = 'div-comment';
    endif;?>
<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
    id="comment-<?php comment_ID() ?>">
    <?php 
    if('div' != $args['style']): ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comments-outer comment-list  clearfix">
        <div class="single-comment justify-content-between d-flex mb-40 item_commnt one clearfix"><?php
    endif;?>
            <div class="user justify-content-between">
                <div class="thumb text-center">
                    <?php if($args['avatar_size'] != 0):
                         echo get_avatar( $comment, $args['avatar_size'] ); 
                    endif;?>
                </div>
                <div class="comment-text">
                    <div class="desc">
                        <ul class="mb-10">
                            <li class="d-inline-block">
                                <a href="#" class="font-heading text-brand"><?php comment_author(); ?></a>
                            </li>
                            <li class="d-inline-block">
                                <span class="font-xs text-muted"><?php nest_comment_timing();?> </span>
                            </li>
                        </ul>
                    </div>
                    <p class="content"><?php echo wp_kses_post(get_comment_text()); ?></p>
                    <div class="reply">
                    <?php   
                    comment_reply_link( array_merge($args, array(
                        'add_below' => $add_below, 
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth']
                        )
                    ));
                    ?>
                    <?php edit_comment_link(esc_html__( 'Edit', 'steelthemes-nest' ) ); ?>
                    </div>
                </div>
                <?php if('div' != $args['style']): ?>
            </div>
        </div>
    </div>
    <?php endif;
}
/*
** ===================================== 
**   Nest Ecommerce Custom Comment Form
** =====================================
*/
function nest_comment_form( $fields ) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields['url'] = '<p class="comment-form-url">    <label for="name">' . esc_html( 'Website Url', 'steelthemes-nest' ) . '</label>
    <input id="url" name="url" placeholder="' . esc_attr__( 'ex. www.example.com', 'steelthemes-nest' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
    '</p>';
    $fields['email'] = '<p class="comment-form-email">
    <label for="comment">' . esc_html( 'Email address', 'steelthemes-nest' ) . '</label>
	<input id="email" placeholder="' . esc_attr__( 'ex. john@mail.com', 'steelthemes-nest' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"' . $aria_req . ' />'  .'</p>';
    $fields['author'] = '<p class="comment-form-author">
    <label for="name">' . esc_html( 'Full Name', 'steelthemes-nest' ) . '</label>
    <input id="author" placeholder="' . esc_attr__( 'ex. John Doe', 'steelthemes-nest' ) . '" name="author" type="text" value="' .
    esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
    '</p>';                                               
    $fields['cookies'] = ' <p class="custom-control custom-checkbox">
    <input id="wp-comment-cookies-consent"  class="custom-control-input" name="wp-comment-cookies-consent" type="checkbox" value=""><label  class="custom-control-label pl-1 c-gray" for="wp-comment-cookies-consent">Save my name, and
    email in this browser for the next time I comment. '. '</label></p>';
	$fields['clear'] = '<div class="clearfix"></div>';
	return $fields;
}
add_filter('comment_form_default_fields','nest_comment_form');