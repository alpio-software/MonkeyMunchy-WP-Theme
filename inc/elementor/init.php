<?php
/**
 * Init Elementor functions.
 *
 * @package Mm
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

require get_template_directory() . '/inc/elementor/class-mm-elementor-widget-loader.php';

use Elementor\Controls_Manager;

/**
 * Register MM Elementor widget category.
 *
 * @param array $elements_manager Current Elementor categories.
 */
function mm_add_elementor_widget_categories( $elements_manager ) {
	$categories = array();

	$categories['mm'] = array(
		'title' => esc_html__( 'MonkeyMunchy', 'mm' ),
		'icon'  => 'fa fa-plug',
	);

	$old_categories = $elements_manager->get_categories();
	$categories     = array_merge( $categories, $old_categories );

	$set_categories = function ( $categories ) {
		$this->categories = $categories;
	};

	$set_categories->call( $elements_manager, $categories );
}

add_action( 'elementor/elements/categories_registered', 'mm_add_elementor_widget_categories' );

/**
 * Add an option to fix Elementor gap alignment issue.
 *
 * @param object $element Current options object.
 */
function mm_add_section_full_width_control( $element ) {
	$element->start_controls_section(
		'mm_extra_layout',
		array(
			'label' => esc_html__( '[MonkeyMunchy] Options', 'mm' ),
			'tab'   => Controls_Manager::TAB_LAYOUT,
		)
	);

	$element->add_control(
		'mm_section_stretch',
		array(
			'label'        => esc_html__( 'Enable Gap Fix', 'mm' ),
			'description'  => esc_html__( 'Fix gap alignment issue.', 'mm' ),
			'type'         => Controls_Manager::SWITCHER,
			'return_value' => 'yes',
			'default'      => 'no',
			'render_type'  => 'template',
			'prefix_class' => 'mm-gap-fix-',
		)
	);

	$element->end_controls_section();

	$element->start_controls_section(
		'mm_extra_style',
		array(
			'label' => esc_html__( '[MonkeyMunchy] Options', 'mm' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);

	$element->add_control(
		'mm_section_shape_top',
		array(
			'label'        => esc_html__( 'Enable Section Top Shape', 'mm' ),
			'type'         => Controls_Manager::SWITCHER,
			'return_value' => 'yes',
			'default'      => 'no',
			'render_type'  => 'template',
			'prefix_class' => 'mm-top-shape-',
		)
	);

	$element->add_control(
		'mm_section_shape_bottom',
		array(
			'label'        => esc_html__( 'Enable Section Bottom Shape', 'mm' ),
			'type'         => Controls_Manager::SWITCHER,
			'return_value' => 'yes',
			'default'      => 'no',
			'render_type'  => 'template',
			'prefix_class' => 'mm-bottom-shape-',
		)
	);

	$element->end_controls_section();
}

add_action( 'elementor/element/section/section_layout/after_section_end', 'mm_add_section_full_width_control' );

/**
 * Add custom elementor controls.
 */
function mm_custom_elementor_controls() {
	require_once get_template_directory() . '/inc/elementor/custom-controls/file-select.php';
	\Elementor\Plugin::$instance->controls_manager->register_control( 'file-select', new \FileSelect_Control() );
}

add_action( 'elementor/controls/controls_registered', 'mm_custom_elementor_controls' );

/**
 * Add custom shapes to Elementor.
 *
 * @param array $shapes Default Elementor shapes.
 *
 * @return array
 */
function mm_add_custom_shapes( $shapes ) {
	$shapes['torn'] = array(
		'has_flip'    => true,
		'height_only' => true,
		'title'       => esc_html__( 'Torn', 'mm' ),
	);

	if ( is_front_page() ) {
		$shapes['torn']['path'] = get_template_directory() . '/assets/img/torn.svg';
	} else {
		$shapes['torn']['url'] = get_template_directory_uri() . '/assets/img/torn.svg';
	}

	return $shapes;
}

add_filter( 'elementor/shapes/additional_shapes', 'mm_add_custom_shapes' );
