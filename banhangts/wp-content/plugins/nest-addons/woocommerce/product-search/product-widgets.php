<?php
/*------ajaxform widgets--------*/
 add_action('widgets_init', 'register_product_search_widget');
function register_product_search_widget(){
    register_widget( 'Nest_Addons_WP_Product_Search' );
}
class Nest_Addons_WP_Product_Search extends WP_Widget {
    	public function __construct() {
    		parent::__construct(
    			'product_search_widget',
    			esc_html__('Nest - Product ajax search', 'nest-addons'),
    			array( 'description' => esc_html__('Nest - Product ajax search', 'nest-addons'))
    		);
    	}

    	public function widget( $args, $instance) {

    		wp_enqueue_script('search-main');

    		extract($args);

    		$title = apply_filters( 'widget_title', $instance['title'] );

    		echo $before_widget;

    			if ( ! empty( $title ) ){echo $before_title . $title . $after_title;}

                ?>

    			<div class="product-search">
    				<form name="product-search" method="POST">
                        <?php $categories = get_product_categories_hierarchy(); ?>
                        <?php if ($categories): ?>
                            <select name="category" class="category">
                                <option class="default" value=""><?php echo esc_html__( 'Select a category', 'nest-addons' ); ?></option>
                                <?php list_taxonomy_hierarchy_no_instance( $categories); ?>
                            </select>
                        <?php endif ?>
                        <div class="search-wrapper">
                            <input type="search" name="search" class="search" placeholder="<?php echo esc_html__( 'Search for product...', 'nest-addons' ); ?>" value="">
							<svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" data-name="Layer 2"><path d="m16 2a1 1 0 0 0 -1 1v4a1 1 0 0 0 2 0v-4a1 1 0 0 0 -1-1z"></path><path d="m7.515 6.1a1 1 0 0 0 -1.415 1.415l2.828 2.828a1 1 0 0 0 1.414-1.414z"></path><path d="m8 16a1 1 0 0 0 -1-1h-4a1 1 0 0 0 0 2h4a1 1 0 0 0 1-1z"></path><path d="m8.929 21.657-2.829 2.828a1 1 0 1 0 1.415 1.415l2.828-2.828a1 1 0 0 0 -1.414-1.414z"></path><path d="m16 24a1 1 0 0 0 -1 1v4a1 1 0 0 0 2 0v-4a1 1 0 0 0 -1-1z"></path><path d="m23.071 21.657a1 1 0 0 0 -1.414 1.414l2.828 2.829a1 1 0 0 0 1.415-1.415z"></path><path d="m29 15h-4a1 1 0 0 0 0 2h4a1 1 0 0 0 0-2z"></path><path d="m22.364 10.636a1 1 0 0 0 .707-.293l2.829-2.828a1 1 0 1 0 -1.415-1.415l-2.828 2.829a1 1 0 0 0 .707 1.707z"></path></g></svg>
                        </div>
    	            </form>
                    <div class="searchresultsget"></div>
        		</div>

    		<?php echo $after_widget;
    	}

     	public function form( $instance ) {

     		$defaults = array(
     			'title' => esc_html__('Product search', 'nest-addons'),
     		);

     		$instance = wp_parse_args((array) $instance, $defaults);

    		?>

    		<div id="<?php echo esc_attr($this->get_field_id( 'widget_id' )); ?>">

    			<p>
    				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:', 'nest-addons' ); ?></label>
    				<input class="widefat <?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
    			</p>

    		</div>

    		<?php
    	}

    	public function update( $new_instance, $old_instance ) {
    		$instance = $old_instance;
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		return $instance;
    	}

    }