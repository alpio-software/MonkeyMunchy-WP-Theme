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
	protected function register_controls() { // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
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

		$this->add_control(
			'loop',
			array(
				'label'        => esc_html__( 'Animation Loop', 'mm' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'auto_play',
			array(
				'label'        => esc_html__( 'Auto Play', 'mm' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
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
					'size' => 1,
				),
			)
		);

		$this->add_control(
			'student_url',
			array(
				'label' => esc_html__( 'Student URL', 'mm' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'monkey_url',
			array(
				'label' => esc_html__( 'Monkey URL', 'mm' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'store_url',
			array(
				'label' => esc_html__( 'Store URL', 'mm' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'cafe_url',
			array(
				'label' => esc_html__( 'Cafe URL', 'mm' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget result.
	 */
	protected function render() {
		$settings  = $this->get_settings_for_display();
		$anim_args = array(
			'speed'      => $settings['speed']['size'],
			'animation'  => $settings['anim'],
			'loop'       => 'yes' === $settings['loop'],
			'autoPlay'   => 'yes' === $settings['auto_play'],
			'studentUrl' => $settings['student_url'],
			'monkeyUrl'  => $settings['monkey_url'],
			'storeUrl'   => $settings['store_url'],
			'cafeUrl'    => $settings['cafe_url'],
		);
		?>
		<div class="mm-town-wrapper">
			<?php mm_loader(); ?>
			<div class="mm-town" data-config=<?php echo wp_json_encode( $anim_args ); ?>></div>
		</div>
		<?php
	}
}
