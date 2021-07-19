<?php

/**
 * FileSelect control.
 *
 * A control for selecting any type of files.
 *
 * @since 1.0.0
 */
class FileSelect_Control extends \Elementor\Base_Data_Control {

	/**
	 * Get control type.
	 *
	 * Retrieve the control type, in this case `FILESELECT`.
	 *
	 * @return string Control type.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_type() {
		return 'file-select';
	}

	/**
	 * Enqueue control scripts and styles.
	 *
	 * Used to register and enqueue custom scripts and styles
	 * for this control.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_media();
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'fileselect-control', get_template_directory_uri() . '/assets/js/file-select.js', array( 'jquery' ), MM_VERSION, true );
	}

	/**
	 * Get default settings.
	 *
	 * @return array Control default settings.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function get_default_settings() {
		return array(
			'label_block' => true,
		);
	}

	/**
	 * Render control output in the editor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
		<div class="elementor-control-field">
			<label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title" style="display:block">
				{{{ data.label }}}
			</label>

			<# if ( !!data.controlValue ) { #>
				<input type="text" value="{{{ data.controlValue }}}" style="display:block; width:100%; margin-top:7px;">
			<# } #>

			<div class="elementor-control-input-wrapper" style="display:flex; margin-right:-10px; width:calc( 100% + 10px );">
				<div style="flex-grow:1;">
					<a
						href="#"
						class="tnc-select-file elementor-button elementor-button-success"
						style="padding:10px 15px; text-align:center; display:block; margin-right:10px;"
						id="select-file-<?php echo esc_attr( $control_uid ); ?>">
						<# if ( !data.controlValue ) { #>
						<?php esc_html_e( 'Select', 'mm' ); ?>
						<# } #>
						<# if ( !!data.controlValue ) { #>
						<?php esc_html_e( 'Edit', 'mm' ); ?>
						<# } #>
					</a>
				</div>

				<# if ( !!data.controlValue ) { #>
				<div style="flex-shrink:1;">
					<a
						href="{{{ data.controlValue }}}" target="_blank"
						class="tnc-view-file elementor-button elementor-button-warning"
						style="padding:10px 15px; text-align:center; margin-right:10px;"
						id="select-file-<?php echo esc_attr( $control_uid ); ?>-link"
						title="<?php esc_attr_e( 'View', 'mm' ); ?>">
						<i class="eicon-link" style="margin-right:0;"></i>
					</a>
					<a
						href="#"
						class="tnc-remove-file elementor-button elementor-button-danger"
						style="padding:10px 15px; text-align:center; margin-right:10px;"
						id="select-file-<?php echo esc_attr( $control_uid ); ?>-remove"
						title="<?php esc_attr_e( 'Remove', 'mm' ); ?>">
						<i class="eicon-trash" style="margin-right:0;"></i>
					</a>
				</div>
				<# } #>

				<input
					type="hidden"
					class="tnc-selected-fle-url"
					id="<?php echo esc_attr( $control_uid ); ?>"
					data-setting="{{ data.name }}"
					placeholder="{{ data.placeholder }}">
			</div>
		</div>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">
			{{{ data.description }}}
		</div>
		<# } #>
		<?php
	}
}

