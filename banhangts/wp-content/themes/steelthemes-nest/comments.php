<?php
/*
**  ==============================   
**  Nest Ecommerce Comment File
**  ==============================
**  if the current post is protected by a password and
**  the visitor has not yet entered the password we will
**  return early without loading the comments.
*/
if(post_password_required()):
	return;
endif;
?>
 <div class="sec_comments comment-form" id="comment">
        <div class="container_no">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    
                <?php  $args = array(
                        'label_submit'          =>  esc_html__( 'Post  comment', 'steelthemes-nest' ),
                        'title_reply'           =>  esc_html__( 'Post a comment', 'steelthemes-nest' ),
                        'comment_notes_before'  =>  '<p class="title_para">'.esc_html__( 'Your email address will not be published.', 'steelthemes-nest' ).'</p>',
                        'comment_field'         =>  '<p class="comment-form-comment"><label for="comment">' . esc_html( 'Leave a Reply', 'steelthemes-nest' ) . '</label><textarea placeholder="' . esc_attr__( 'Write your comment here...', 'steelthemes-nest' ) . '" id="commenttextarea" name="comment"  rows="12" aria-required="true">' .'</textarea></p>'
                    );
                    comment_form( $args );
	            ?>
                <?php // You can start editing here -- including this comment! ?>
                        <?php if(have_comments()): ?>
                            <div class="comment_box comments-area">
                                <div class="title_commnt">
                                    <h3>
                                        <?php echo comments_popup_link( 
                                            esc_html__( '0 Comments', 'steelthemes-nest' ), 
                                            esc_html__( '1 Comment', 'steelthemes-nest' ), 
                                            esc_html__( '% Comments', 'steelthemes-nest' ),
                                            esc_html__( 'Comments are Closed', 'steelthemes-nest'),
                                        ); 
                                        ?>
                                    </h3>
                                </div>
                            <?php if(get_comment_pages_count() > 1 && get_option( 'page_comments' )) : // Are there comments to navigate through? ?>
                                <nav id="comment-nav-above" class="navigation  comment-navigation" role="navigation">
                                    <h2 class="screen-reader-text">
                                        <?php esc_html_e( 'Comment navigation', 'steelthemes-nest' ); ?>
                                    </h2>
                                <!-- .nav-links -->
                                    <div class="nav-links">
                                        <div class="nav-previous">
                                            <?php previous_comments_link( esc_html__( 'Older Comments', 'steelthemes-nest' ) ); ?>
                                        </div>
                                        <div class="nav-next">
                                            <?php next_comments_link( esc_html__( 'Newer Comments', 'steelthemes-nest' ) ); ?>
                                        </div>
                                    </div>
                                <!-- .nav-links -->
                            </nav>
                        <!-- #comment-nav-above -->
                        <?php endif; // Check for comment navigation. ?>
                            <div class="comment_inner body_commnt">
                                <ol class="comment-list">
                                <?php
                                    wp_list_comments(array(
				                        'style'       => 'ol',
				                        'short_ping'  => true,
				                        'avatar_size' => 65,
				                        'callback'    => 'nest_comment'
			                        ));
			                    ?>
                        </ol>
                        <!-- .comment-list -->
                    </div>
                    <?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                    <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                        <h2 class="screen-reader-text">
                            <?php esc_html_e( 'Comment navigation', 'steelthemes-nest' ); ?>
                        </h2>
                        <div class="nav-links">
                            <div class="nav-previous">
                                <?php previous_comments_link(esc_html__( 'Older Comments', 'steelthemes-nest')); ?>
                            </div>
                            <div class="nav-next">
                                <?php next_comments_link( esc_html__( 'Newer Comments', 'steelthemes-nest')); ?>
                            </div>
                        </div>
                        <!-- .nav-links -->
                    </nav>
                    <!-- #comment-nav-below -->
                    <?php endif; // Check for comment navigation. ?>
                <?php endif; // Check for have_comments(). ?>
                <?php    if(!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments' )): ?>
                    <p class="no-comments">
                        <?php esc_html_e( 'Comments are closed.', 'steelthemes-nest' ); ?>
                    </p>
                </div>
            <?php endif; ?>
            </div>
        </div>   
    </div>
</div>      