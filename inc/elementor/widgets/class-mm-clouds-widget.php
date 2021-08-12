<?php
/**
 * Elementor Clouds widget.
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
 * Class Mm_Clouds_Widget
 *
 * @package Mm\Widgets
 */
class Mm_Clouds_Widget extends Widget_Base {
	/**
	 * Widget unique name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'mm-clouds-widget';
	}

	/**
	 * Widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Clouds', 'mm' );
	}

	/**
	 * Widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-slides';
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
				'label' => esc_html__( 'Clouds Fields', 'mm' ),
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

		$this->add_control(
			'speed',
			array(
				'label'   => esc_html__( 'Speed', 'mm' ),
				'type'    => Controls_Manager::SLIDER,
				'range'   => array(
					'px' => array(
						'min'  => 0.1,
						'max'  => 1,
						'step' => 0.1,
					),
				),
				'default' => array(
					'unit' => 'px',
					'size' => 0.1,
				),
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
		?>
		<div class="mm-clouds" data-speed="<?php echo esc_attr( $settings['speed']['size'] ); ?>" data-json="<?php echo esc_url( $anim ); ?>"></div>
		<?php
	}
}
