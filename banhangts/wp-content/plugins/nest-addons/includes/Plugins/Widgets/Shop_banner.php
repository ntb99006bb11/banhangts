<?php
/*
======================================
Shop_banner widgets
======================================
*/
 
 
class Shop_banner extends \WP_Widget{
    /**
     * Sets up a new About widget instance.
     *
     * @since 2.8.0
     */
public function __construct(){

        $widget_ops = array(
            'classname' => 'nest_widget_shop_entries',
            'description' => __('Product Banner' , 'nest-addons') ,
            'customize_selective_refresh' => true,
        );

        parent::__construct('nest-about-one', __('Nest - Product Banner ' , 'nest-addons') , $widget_ops);

        $this->alt_option_name = 'nest_widget_shop_entries';

    }

    /**
     * Outputs the content for the current nest Product Banner widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current nest Product Banner widget instance.
     */

public function widget($args, $instance)
{
	$allowed_tags = wp_kses_allowed_html('post');
    extract($args);
    echo wp_kses_post($before_widget); ?>
        <!--Footer Column-->
        <div class="banner-img widget_shop_banner">
            <?php if(!empty($instance['background'])): ?>
                <img src="<?php echo wp_kses_post($instance['background']); ?>" alt="<?php echo esc_attr($instance['subtitle']); ?>">
            <?php endif; ?>
            <div class="banner-text">
                <span><?php echo wp_kses($instance['subtitle'] , $allowed_tags); ?></span>
                <h4>
                    <?php echo wp_kses( $instance['title'] , $allowed_tags); ?>
                </h4>
            </div>
        </div>

<?php echo wp_kses_post($after_widget);
}
    /**
     * Handles updating the settings for the current nest Product Banner widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */

    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['subtitle'] = strip_tags($new_instance['subtitle']);

        $instance['title'] = $new_instance['title'];

        $instance['background'] = $new_instance['background'];

        return $instance;

    }

    /**
     * Outputs the settings form for the nest Product Banner widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */

    public function form($instance)
    {

        $subtitle = ($instance) ? esc_attr($instance['subtitle']) : '';
        $title = ($instance) ? esc_attr($instance['title']) : '';
        $background = ($instance) ? esc_attr($instance['background']) : '';

?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"><?php esc_html_e('Sub Title:', 'nest-addons'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"
        name="<?php echo esc_attr($this->get_field_name('subtitle')); ?>" type="text"
        value="<?php echo esc_attr($subtitle); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title :' , 'nest-addons'); ?></label>
    <textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>"><?php echo wp_kses_post($title); ?></textarea>
</p>
<p>
    <label
        for="<?php echo esc_attr($this->get_field_id('background')); ?>"><?php esc_html_e('Background Image Url:', 'nest-addons'); ?></label>
    <textarea class="widefat" rows="5" cols="20" id="<?php echo esc_attr($this->get_field_id('background')); ?>"
        name="<?php echo esc_attr($this->get_field_name('background')); ?>"><?php echo wp_kses_post($background); ?></textarea>
</p>

<?php

    }

}

add_action( 'widgets_init', function(){
	register_widget( 'Shop_banner' );
});