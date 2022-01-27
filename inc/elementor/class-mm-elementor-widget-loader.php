<?php
/**
 * Init Elementor widgets.
 *
 * @package MM
 */

namespace Mm;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Mm_Elementor_Widget_Loader
 *
 * @package Mm
 */
class Mm_Elementor_Widget_Loader {

	private static $_instance = null; // phpcs:ignore

	/**
	 * Widgets instance func.
	 *
	 * @return Mm_Elementor_Widget_Loader|null
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Mm_Elementor_Widget_Loader constructor.
	 */
	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}

	/**
	 * Register widget files.
	 */
	private function include_widgets_files() {
		require_once get_template_directory() . '/inc/elementor/widgets/class-mm-clouds-widget.php';
		require_once get_template_directory() . '/inc/elementor/widgets/class-mm-monkey-box-widget.php';
		require_once get_template_directory() . '/inc/elementor/widgets/class-mm-social-widget.php';
		require_once get_template_directory() . '/inc/elementor/widgets/class-mm-town-widget.php';
		require_once get_template_directory() . '/inc/elementor/widgets/class-mm-video-scroll.php';
		require_once get_template_directory() . '/inc/elementor/widgets/class-mm-welcome-widget.php';
	}

	/**
	 * Register widgets.
	 */
	public function register_widgets() {
		$this->include_widgets_files();
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mm_Clouds_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mm_Monkey_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mm_Social() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mm_Town_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mm_Video_Scroll() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mm_Welcome_Widget() );
	}
}

Mm_Elementor_Widget_Loader::instance();
