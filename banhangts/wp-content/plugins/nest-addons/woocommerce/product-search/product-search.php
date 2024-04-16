<?php
 

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action('wp_enqueue_scripts', 'ecom_prosearch_style_scripts'  , 5);       
function ecom_prosearch_style_scripts( ){
    wp_enqueue_style('search-style', NEST_ADDONS_URL . 'woocommerce/product-search/css/style.css' , array() , '1.0', 'all'); 
    wp_enqueue_script('search-main', NEST_ADDONS_URL . 'woocommerce/product-search/js/main.js', array('jquery') , '1.0', true); 
    wp_localize_script(
        'search-main',
        'opt',
        array(
            'ajaxUrl'   => admin_url('admin-ajax.php'),
            'noResults' => esc_html__( 'No products found', 'nest-addons' ),
        )
    );  
}

 
/*  Get taxonomy hierarchy
/*-------------------*/

    function get_taxonomy_hierarchy( $taxonomy, $parent = 0, $exclude = 0) {
        $taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;
        $terms = get_terms( $taxonomy, array( 'parent' => $parent, 'hide_empty' => false, 'exclude' => $exclude) );

        $children = array();
        foreach ( $terms as $term ){
            $term->children = get_taxonomy_hierarchy( $taxonomy, $term->term_id, $exclude);
            $children[ $term->term_id ] = $term;
        }
        return $children;
    }

/*  List taxonomy hierarchy
/*-------------------*/

    function list_taxonomy_hierarchy_no_instance( $taxonomies) {
    ?>
        <?php foreach ( $taxonomies as $taxonomy ) { ?>
            <?php $children = $taxonomy->children; ?>
            <option value="<?php echo $taxonomy->term_id; ?>" data-value="<?php echo $taxonomy->slug; ?>"><?php echo $taxonomy->name; ?></option>
            <?php if (is_array($children) && !empty($children)): ?>
                <optgroup>
                    <?php list_taxonomy_hierarchy_no_instance($children); ?>
                </optgroup>
            <?php endif ?>
        <?php } ?>

    <?php
    }

/*  Product categories transient
/*-------------------*/

    function get_product_categories_hierarchy() {

        if ( false === ( $categories = get_transient( 'product-categories-hierarchy' ) ) ) {

            $categories = get_taxonomy_hierarchy( 'product_cat', 0, 0);

            // do not set an empty transient - should help catch private or empty accounts.
            if ( ! empty( $categories ) ) {
                $categories = base64_encode( serialize( $categories ) );
                set_transient( 'product-categories-hierarchy', $categories, apply_filters( 'null_categories_cache_time', 0 ) );
            }
        }

        if ( ! empty( $categories ) ) {

            return unserialize( base64_decode( $categories ) );

        } else {

            return new WP_Error( 'no_categories', esc_html__( 'No categories.', 'nest-addons' ) );

        }
    }

/*  Delete product categories transient
/*-------------------*/

    function edit_product_term($term_id, $tt_id, $taxonomy) {
        $term = get_term($term_id,$taxonomy);
        if (!is_wp_error($term) && is_object($term)) {
            $taxonomy = $term->taxonomy;
            if ($taxonomy == "product_cat") {
                delete_transient( 'product-categories-hierarchy' );
            }
        }
    }

    function delete_product_term($term_id, $tt_id, $taxonomy, $deleted_term) {
        if (!is_wp_error($deleted_term) && is_object($deleted_term)) {
            $taxonomy = $deleted_term->taxonomy;
            if ($taxonomy == "product_cat") {
                delete_transient( 'product-categories-hierarchy' );
            }
        }
    }
    add_action( 'create_term', 'edit_product_term', 99, 3 );
    add_action( 'edit_term', 'edit_product_term', 99, 3 );
    add_action( 'delete_term', 'delete_product_term', 99, 4 );

    add_action( 'save_post', 'save_post_action', 99, 3);
    function save_post_action( $post_id ){

        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if (!current_user_can( 'edit_page', $post_id ) ) return;

        $post_info = get_post($post_id);

        if (!is_wp_error($post_info) && is_object($post_info)) {
            $content   = $post_info->post_content;
            $post_type = $post_info->post_type;

            if ($post_type == "product"){
                delete_transient( 'ecom-product-categories' );
            }
        }

    }

/*  Search action
/*-------------------*/

function search_product() {
    global $wpdb, $woocommerce;
    if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        if (isset($_POST['category']) && !empty($_POST['category'])) {
            $category = $_POST['category'];
            $querystr = "SELECT DISTINCT * FROM $wpdb->posts AS p 
LEFT JOIN $wpdb->term_relationships AS r ON (p.ID = r.object_id) 
INNER JOIN $wpdb->term_taxonomy AS x ON (r.term_taxonomy_id = x.term_taxonomy_id) 
INNER JOIN $wpdb->terms AS t ON (r.term_taxonomy_id = t.term_id) 
WHERE p.post_type IN ('product') 
AND p.post_status = 'publish' 
AND x.taxonomy = 'product_cat' 
AND ( 
(x.term_id = {$category}) 
OR 
(x.parent = {$category}) 
) 
AND ( 
(p.ID IN (SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_sku' AND meta_value LIKE '%{$keyword}%')) 
OR 
(p.post_content LIKE '%{$keyword}%') 
OR 
(p.post_title LIKE '%{$keyword}%') 
) 
ORDER BY t.name ASC, p.post_date DESC;";
        } else {
            $querystr = "SELECT DISTINCT $wpdb->posts.* 
FROM $wpdb->posts, $wpdb->postmeta 
WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id 
AND ( 
($wpdb->postmeta.meta_key = '_sku' AND $wpdb->postmeta.meta_value LIKE '%{$keyword}%') 
OR 
($wpdb->posts.post_content LIKE '%{$keyword}%') 
OR 
($wpdb->posts.post_title LIKE '%{$keyword}%') 
) 
AND $wpdb->posts.post_status = 'publish' 
AND $wpdb->posts.post_type = 'product' 
ORDER BY $wpdb->posts.post_date DESC";
        }
        $query_results = $wpdb->get_results($querystr);
        if (!empty($query_results)) {
            $output = '';
            foreach ($query_results as $result) {
                $price      = get_post_meta($result->ID,'_regular_price');
                $price_sale = get_post_meta($result->ID,'_sale_price');
                $currency   = get_woocommerce_currency_symbol();
                $sku   = get_post_meta($result->ID,'_sku');
                $stock = get_post_meta($result->ID,'_stock_status');
                $categories = wp_get_post_terms($result->ID, 'product_cat');
                $output .= '<li>';
                    $output .= '<a href="'.get_post_permalink($result->ID).'">';
                        $output .= '<div class="product-image">';
                            $output .= '<img src="'.esc_url(get_the_post_thumbnail_url($result->ID,'thumbnail')).'">';
                        $output .= '</div>';
                        $output .= '<div class="product-data">';
                            $output .= '<h3>'.$result->post_title.'</h3>';
                            if (!empty($price)) {
                                $output .= '<div class="product-price">';
                                    $output .= '<span class="regular-price">'.$price[0].''.$currency.'</span>';
                                    if (!empty($price_sale)) {
                                        $output .= '<span class="sale-price">'.$price_sale[0].''.$currency.'</span>';
                                    }
                                  
                                $output .= '</div>';
                            }
                            if (!empty($categories)) {
                                $output .= '<div class="product-categories">';
                                    foreach ($categories as $category) {
                                        if ($category->parent) {
                                            $parent = get_term_by('id',$category->parent,'product_cat');
                                            $output .= '<span>'.$parent->name.'</span>';
                                        }
                                        $output .= '<span>'.$category->name.'</span>';
                                    }
                                $output .= '</div>';
                            }
                            if (!empty($sku)) {
                                $output .= '<div class="product-sku">'.esc_html__( 'SKU:', 'textdomain' ).' '.$sku[0].'</div>';
                            }
                            if (!empty($stock)) {
                                $output .= '<div class="product-stock">'.$stock[0].'</div>';
                            }
                        $output .= '</div>';
                        $output .= '</a>';
                $output .= '</li>';
            }
            if (!empty($output)) {
                echo $output;
            }
        }
    }
    die();
}
add_action( 'wp_ajax_search_product', 'search_product' );
add_action( 'wp_ajax_nopriv_search_product', 'search_product' );
    add_action( 'nest_get_prosearch_form', 'nest_prosearch_form' );
    function nest_prosearch_form() {
    ?>
    <div class="box-header-search">
        
        <form name="product-search" method="POST" class="form-search">
            <?php $categories = get_product_categories_hierarchy(); ?>
            <?php if ($categories): ?>
                <select name="category" class="category box-category">
                    <option class="default" value=""><?php echo esc_html__( 'All Category', 'nest-addons' ); ?></option>
                    <?php list_taxonomy_hierarchy_no_instance( $categories); ?>
                </select>
            <?php endif ?>
            <div class="search-wrapper box-keysearch">
                <input type="search" name="search" class="search" placeholder="<?php echo esc_html__( 'Search for product...', 'nest-addons' ); ?>" value="">
                <button data-shop="<?php echo esc_url(home_url()); ?>" type="submit" class="csearchbtn"><i class="icon-search"></i></button>
                <svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" data-name="Layer 2"><path d="m16 2a1 1 0 0 0 -1 1v4a1 1 0 0 0 2 0v-4a1 1 0 0 0 -1-1z"></path><path d="m7.515 6.1a1 1 0 0 0 -1.415 1.415l2.828 2.828a1 1 0 0 0 1.414-1.414z"></path><path d="m8 16a1 1 0 0 0 -1-1h-4a1 1 0 0 0 0 2h4a1 1 0 0 0 1-1z"></path><path d="m8.929 21.657-2.829 2.828a1 1 0 1 0 1.415 1.415l2.828-2.828a1 1 0 0 0 -1.414-1.414z"></path><path d="m16 24a1 1 0 0 0 -1 1v4a1 1 0 0 0 2 0v-4a1 1 0 0 0 -1-1z"></path><path d="m23.071 21.657a1 1 0 0 0 -1.414 1.414l2.828 2.829a1 1 0 0 0 1.415-1.415z"></path><path d="m29 15h-4a1 1 0 0 0 0 2h4a1 1 0 0 0 0-2z"></path><path d="m22.364 10.636a1 1 0 0 0 .707-.293l2.829-2.828a1 1 0 1 0 -1.415-1.415l-2.828 2.829a1 1 0 0 0 .707 1.707z"></path></g></svg>
            </div>
        </form>
        <div class="searchresultsget"></div>
    </div>
<?php
  }


?>
