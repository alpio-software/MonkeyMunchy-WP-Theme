<?php
/**
 * Elementor Video Scrolling widget.
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
class Mm_Video_Scroll extends Widget_Base {
	/**
	 * Widget unique name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'mm-video-scroll-widget';
	}

	/**
	 * Widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Video Scroll', 'mm' );
	}

	/**
	 * Widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-video-playlist';
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

		$this->end_controls_section();
	}

	/**
	 * Render widget result.
	 */
	protected function render() {
		$settings   = $this->get_settings_for_display();
		$video_json = array(
			// Test Video: https://assets.codepen.io/39255/output_960.mp4 .
			array(
				'name'      => 'first-loop',
				'url'       => 'https://monkey.local/wp-content/uploads/2021/11/100-01_LOOP.mp4',
				'videoAtts' => array( 'autoplay', 'muted', 'loop', 'data-name="first-loop"' ),
			),
			array(
				'name'      => 'first-walk',
				'url'       => 'https://monkey.local/wp-content/uploads/2021/11/110-01_02_FORWARD.mp4',
				'videoAtts' => array( 'muted', 'data-name="first-walk"' ),
				'autoNext'  => true,
			),
			array(
				'name'      => 'second-loop',
				'url'       => 'https://monkey.local/wp-content/uploads/2021/11/120-02_LOOP.mp4',
				'videoAtts' => array( 'autoplay', 'muted', 'loop', 'data-name="second-loop"' ),
				'buttons'   => array(
					array(
						'text' => 'Go Market',
						'go'   => 2,
					),
					array(
						'text' => 'Keep Going',
						'go'   => 3,
					),
				),
			),
			array(
				'url'       => 'https://monkey.local/wp-content/uploads/2021/11/130-02_03_FORWARD.mp4',
				'videoAtts' => array( 'autoplay', 'muted' ),
				'autoNext'  => true,
			),
			array(
				'url'       => 'https://monkey.local/wp-content/uploads/2021/11/140-03_LOOP.mp4',
				'videoAtts' => array( 'autoplay', 'muted', 'loop' ),
				'buttons'   => array(
					array(
						'text' => 'Choose Way',
						'go'   => 5,
					),
				),
			),
			array(
				'url'       => 'https://monkey.local/wp-content/uploads/2021/11/150-03_04_FORWARD.mp4',
				'videoAtts' => array( 'autoplay', 'muted' ),
				'autoNext'  => true,
			),
			array(
				'url'       => 'https://monkey.local/wp-content/uploads/2021/11/200-06_LOOP.mp4',
				'videoAtts' => array( 'autoplay', 'muted', 'loop' ),
				'buttons'   => array(
					array(
						'text' => 'Choose Way',
						'go'   => 7,
					),
				),
			),
			array(
				'url'       => 'https://monkey.local/wp-content/uploads/2021/11/200-06_LOOP.mp4',
				'videoAtts' => array( 'autoplay', 'muted' ),
				'autoNext'  => true,
			),
		);
		?>
		<div class="video-scroll">
			<div class="video-scroll__wrapper" data-name="first-loop">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2021/11/100-01_LOOP.mp4"
					autoplay
					loop
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="first-walk">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2021/11/110-01_02_FORWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="second-loop">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2021/11/120-02_LOOP.mp4"
					autoplay
					loop
					muted
				></video>
				<button
					type="button"
					class="video-scroll__button"
					data-name="left"
				></button>
				<button
					type="button"
					class="video-scroll__button"
					data-name="right"
				></button>
			</div>
			<div class="video-scroll__wrapper" data-name="second-walk">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2021/11/130-02_03_FORWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="third-loop">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2021/11/140-03_LOOP.mp4"
					autoplay
					loop
					muted
				></video>
				<button
					type="button"
					class="video-scroll__button"
					data-name="left"
				></button>
				<button
					type="button"
					class="video-scroll__button"
					data-name="right"
				></button>
			</div>
			<div class="video-scroll__wrapper" data-name="turn-left">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2021/11/150-03_04_FORWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="left-first-loop">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2021/11/160-04_LOOP.mp4"
					autoplay
					loop
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="left-first-walk">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2021/11/170-04_05_FORWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="left-second-loop">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2021/11/180-05_LOOP.mp4"
					autoplay
					loop
					muted
				></video>
				<button
					type="button"
					class="video-scroll__button"
					data-name="left"
				></button>
				<button
					type="button"
					class="video-scroll__button"
					data-name="right"
				></button>
			</div>
			<div class="video-scroll__wrapper" data-name="left-second-walk">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/05_06_FORWARD_NEW.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="left-third-loop">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/06_LOOP_FRONT.mp4"
					autoplay
					loop
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="left-second-loop-return">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/LoopLeft_02.mp4"
					autoplay
					loop
					muted
				></video>
				<button
					type="button"
					class="video-scroll__button"
					data-name="left"
				></button>
				<button
					type="button"
					class="video-scroll__button"
					data-name="right"
				></button>
			</div>
			<div class="video-scroll__wrapper" data-name="left-second-walk-return">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2021/11/210-05_06_BACKWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="left-first-walk-return">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/04_05_BACKWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="left-first-loop-return">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/LoopLeft_01.mp4"
					autoplay
					loop
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="turn-left-return">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/216-03_04_BACKWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="third-loop-return">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/217-LoopFront_Start_03.mp4"
					autoplay
					loop
					muted
				></video>
				<button
					type="button"
					class="video-scroll__button"
					data-name="left"
				></button>
				<button
					type="button"
					class="video-scroll__button"
					data-name="right"
				></button>
			</div>
			<div class="video-scroll__wrapper" data-name="second-walk-return">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/218-02_03_BACKWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="second-loop-return">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/219-LoopFront_Start_02.mp4"
					autoplay
					loop
					muted
				></video>
				<button
					type="button"
					class="video-scroll__button"
					data-name="left"
				></button>
				<button
					type="button"
					class="video-scroll__button"
					data-name="right"
				></button>
			</div>
			<div class="video-scroll__wrapper" data-name="first-walk-return">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/220-01_02_BACKWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="first-loop-return">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/221-LoopFront_Start_01.mp4"
					autoplay
					loop
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="turn-right">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/306-03_07_FORWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="right-first-loop">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/307-07_LOOP.mp4"
					autoplay
					loop
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="right-first-walk">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/308-07_08_FORWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="right-second-loop">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/309-08_LOOP.mp4"
					autoplay
					loop
					muted
				></video>
				<button
					type="button"
					class="video-scroll__button"
					data-name="left"
				></button>
				<button
					type="button"
					class="video-scroll__button"
					data-name="right"
				></button>
			</div>
			<div class="video-scroll__wrapper" data-name="right-second-walk">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/310-08_09_FORWARD_NEW.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="right-third-loop">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/311-09_LOOP_FRONT.mp4"
					autoplay
					loop
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="right-second-walk-return">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/312-08_09_BACKWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="right-second-loop-return">
				<video
					class="video-scroll__video"
					src="https://monkey.local/wp-content/uploads/2022/01/313-LoopRight_02.mp4"
					autoplay
					loop
					muted
				></video>
				<button
					type="button"
					class="video-scroll__button"
					data-name="left"
				></button>
				<button
					type="button"
					class="video-scroll__button"
					data-name="right"
				></button>
			</div>
			<div class="video-scroll__wrapper" data-name="right-first-walk-return">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/314-07_08_BACKWARD.mp4"
					muted
				></video>
			</div>
			<div class="video-scroll__wrapper" data-name="turn-right-return">
				<video
					class="video-scroll__video video-scroll__video--scrub"
					src="https://monkey.local/wp-content/uploads/2022/01/316-03_07_BACKWARD.mp4"
					muted
				></video>
			</div>
		</div>
		<?php
	}
}
