<?php
/*
** ============================== 
**   Nest Ecommerce Layout
** ==============================
*/
add_action('nest_custom_pagination',   'nest_numeric_posts_nav');
add_action('nest_custom_pagination_width_img',   'nest_no_image_nav_links' , 25 );
function nest_numeric_posts_nav() {
        if(is_singular()):
            return;
        endif;    
        global $wp_query;
        /** Stop execution ifthere's only 1 page */
        if($wp_query->max_num_pages <= 1 ):
            return;
        endif;    
        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
        $max   = intval( $wp_query->max_num_pages );
        /** Add current page to the array */
        if($paged >= 1):
            $links[] = $paged;
        endif;    
        /** Add the pages around the current page to the array */
        if($paged >= 3){
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }
        if(( $paged + 2) <= $max ) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }
        echo '<div class="pagination-area mt-20 mb-20"><nav aria-label="Page navigation example"><ul class="pagination justify-content-start">' . "\n";
        /** Previous Post Link */
        if( get_previous_posts_link()):
            printf( '<li class="prev_link page-item">%s</li>' . "\n", get_previous_posts_link('<div class="nav-previous page-link"><i class="fi-rs-arrow-small-left"></i></div>') );
        endif;
        /** Link to first page, plus ellipses ifnecessary */
        if(!in_array(1, $links)):
            $class = 1 == $paged ? ' active ' : '';
     
            printf( '<li class="%s page-item"><a href="%s" class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
     
            if(!in_array( 2, $links)):
                echo '<li class="page-item"><a class="page-link dot">…</a></li>';
            endif;
        endif;
        /** Link to current page, plus 2 pages in either direction ifnecessary */
        sort( $links );
        foreach ((array) $links as $link):
            $class = $paged == $link ? 'active ' : '';
            printf( '<li class="%spage-item"><a href="%s" class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
        endforeach;
        /** Link to last page, plus ellipses ifnecessary */
        if(!in_array($max, $links)):
            if(!in_array( $max - 1, $links))
            echo '<li class="page-item"><a class="page-link dot">…</a></li>' . "\n";
            $class = $paged == $max ? ' active ' : '';
            printf( '<li class="%s page-item"><a href="%s" class="page-link">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
        endif;
        /** Next Post Link */
        if (get_next_posts_link()):
            printf( '<li class="next_link page-item">%s</li>' . "\n", get_next_posts_link('<div class="nav-next page-link"><i class="fi-rs-arrow-small-right"></i></div>') );
            echo '</ul></nav>
            </div>' . "\n";
        endif;
    } 
     
function nest_no_image_nav_links() {
$previous = get_previous_post();
$next = get_next_post();
if(is_singular('post')): ?>
<div class="previouse_next_post entry-bottom">
    <?php if($prev_post = get_previous_post()): ?>
    <div class="prev_post  nav_post">
        <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="linked_prev_next">
            <?php if(!empty(get_the_post_thumbnail($prev_post->ID))): ?>
            <div class="image">
                <?php echo get_the_post_thumbnail( $prev_post->ID,  array(80,80));  ?>
            </div>
            <?php endif; ?>
            <div class="text">
                <p class="btn hover-up btn btn-sm btn-rounded">
                    <i class="fi-rs-arrow-left"></i> <?php esc_html_e('Previous Post', 'steelthemes-nest') ?>
                </p>
                <?php if(get_previous_post()): ?>
                <h2><?php echo get_the_title($previous) ?></h2>
                <?php endif; ?>
            </div>
        </a>
    </div>
    <?php endif;  ?>
    <?php if($next_post = get_next_post()): ?>
    <div class="next_post  nav_post">
        <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="linked_prev_next">

            <div class="text">
                <p class="btn hover-up btn btn-sm btn-rounded">
                    <?php esc_html_e('Next Post', 'steelthemes-nest') ?> <i class="fi-rs-arrow-right"></i>
                </p>
                <?php  if(get_next_post()): ?>
                <h2><?php echo get_the_title($next) ?></h2>
                <?php endif; ?>
            </div>
            <?php if(!empty(get_the_post_thumbnail($next_post->ID))): ?>
            <div class="image">
                <?php echo get_the_post_thumbnail( $next_post->ID,  array(80,80));  ?>
            </div>
            <?php endif; ?>
        </a>
    </div>

    <?php endif; ?>
</div>
<?php endif; 
    } 

 