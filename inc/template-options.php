<?php
/**
 * Template options.
 *
 * @package mm
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

$prefix = 'mm';

CSF::createOptions(
	$prefix,
	array(
		'menu_title'          => esc_html__( 'Monkey Munchy', 'mm' ),
		'menu_slug'           => 'mm',
		'framework_title'     => esc_html__( 'Theme Options', 'mm' ),
		'admin_bar_menu_icon' => 'dashicons-admin-generic',
		'menu_icon'           => get_template_directory_uri() . '/assets/img/menu-icon.png',
		'footer_text'         => sprintf( /* translators: %s: Author Link */ wp_kses_post( __( 'by %s', 'mm' ) ), '<a href="https://mm.ch" target="_blank">mm</a>' ),
		'theme'               => 'light',
		'footer_credit'       => sprintf( /* translators: %s: Author Email */ wp_kses_post( __( 'E-mail us: %s', 'mm' ) ), '<a href="mailto:info@mm.ch">info@mm.ch</a>' ),
		'show_in_customizer'  => true,
		'menu_position'       => 2,
	)
);

CSF::createSection(
	$prefix,
	array(
		'title'  => esc_html__( 'Pages', 'mm' ),
		'icon'   => 'fas fa-cogs',
		'fields' => array(
			array(
				'id'    => 'page_clouds',
				'type'  => 'media',
				'title' => esc_html__( 'Page Header Clouds', 'mm' ),
			),
		),
	)
);

CSF::createSection(
	$prefix,
	array(
		'title'  => esc_html__( 'Footer', 'mm' ),
		'icon'   => 'fas fa-cogs',
		'fields' => array(
			array(
				'id'    => 'footer_bg',
				'type'  => 'media',
				'title' => esc_html__( 'Footer Background', 'mm' ),
			),
			array(
				'id'    => 'footer_clouds',
				'type'  => 'media',
				'title' => esc_html__( 'Footer Clouds', 'mm' ),
			),
			array(
				'id'    => 'footer_copyright',
				'type'  => 'wp_editor',
				'title' => esc_html__( 'Copyright Content', 'mm' ),
			),
		),
	)
);
