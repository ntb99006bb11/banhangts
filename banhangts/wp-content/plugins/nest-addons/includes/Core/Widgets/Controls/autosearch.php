<?php
/**
 * Elementor area control.
 *
 * A control for autocomplete field.
 *
 * @since 1.0.0
 */
use Elementor\Base_Data_Control;
class Nest_select2_get_auto_Control extends Base_Data_Control {
	public function get_type() {
		return 'Nest_select2_get_auto';
	}
	public function enqueue() {
		wp_register_script( 'nest-select2-control', NEST_ADDONS_URL . '/assets/js/plugins/searchcustom.js', array( 'jquery' ), '1.0.0', false );
		wp_enqueue_script( 'nest-select2-control' );
	}
	protected function get_default_settings() {
		return array(
			'label_block' => true,
			'options'     => array(),
			'multiple'    => false,						
			'post_type'   => false,
			'callback'    => '',
		);
	}
	public function content_template() {
		
		$control_uid = $this->get_control_uid();
		?>
		<div class="elementor-control-field">
			<# if ( data.label ) {#>
			<label for="<?php echo $control_uid; ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<# } #>
			<div class="elementor-control-input-wrapper">
				<# var multiple = ( data.multiple ) ? 'multiple' : ''; #>
				<select id="<?php echo $control_uid; ?>" class="elementor-select2" type="select2" {{ multiple }} data-setting="{{ data.name }}">
					<# _.each( data.options, function( option_title, option_value ) {
					var value = data.controlValue;
					if ( typeof value == 'string' ) {
					var selected = ( option_value === value ) ? 'selected' : '';
					} else if ( null !== value ) {
					var value = _.values( value );
					var selected = ( -1 !== value.indexOf( option_value ) ) ? 'selected' : '';
					}
					#>
					<option {{ selected }} value="{{ option_value }}">{{{ option_title }}}</option>
					<# } ); #>
				</select>
			</div>
		</div>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}
 
}
