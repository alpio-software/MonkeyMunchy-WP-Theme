<?php
/**
 * Elementor Town widget.
 *
 * @package Mm
 */

namespace Mm\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;

/**
 * Class Mm_Town_Widget
 *
 * @package Mm\Widgets
 */
class Mm_Town_Widget extends Widget_Base {
	/**
	 * Widget unique name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'mm-town-widget';
	}

	/**
	 * Widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Town', 'mm' );
	}

	/**
	 * Widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-image';
	}

	/**
	 * Widget category.
	 * Append widget to Mm category.
	 *
	 * @return string[]
	 */
	public function get_categories() {
		return array( 'mm' );
	}

	/**
	 * Widget controls.
	 */
	protected function _register_controls() { // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Town Fields', 'mm' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'anim',
			array(
				'label' => esc_html__( 'Animation JSON', 'mm' ),
				'type'  => 'file-select',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget result.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$anim     = $settings['anim'];

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			?>
			<style>
				.mm-town-preview {
					background-color: #f8f3ef;
					background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/img/town.svg' ); ?>);
					background-size: 150px;
					background-position: 25px center;
					background-repeat: no-repeat;
					padding: 60px 45px;
					color: #000;
					border-radius: 3px;
					position: relative;
					overflow: hidden;
					text-align: center;
					opacity: 0.5;
				}
			</style>
			<div class="mm-town-preview"></div>
			<?php
		} else {
			?>
			<div class="mm-town-wrapper">
				<div class="mm-town" data-json="<?php echo esc_url( $anim ); ?>"></div>
			</div>
			<?php
		}
	}
}
