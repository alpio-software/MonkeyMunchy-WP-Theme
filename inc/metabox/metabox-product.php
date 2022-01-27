<?php
/**
 * Init metaboxes.
 *
 * @package Mm
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

$prefix = 'product_metabox';

CSF::createMetabox(
	$prefix,
	array(
		'title'     => esc_html__( 'MonkeyMunchy Options', 'mm' ),
		'post_type' => 'product',
		'context'   => 'side',
		'data_type' => 'unserialize',
	)
);

CSF::createSection(
	$prefix,
	array(
		'fields' => array(
			array(
				'id'    => 'remove-gallery',
				'type'  => 'switcher',
				'title' => esc_html__( 'Remove Gallery', 'mm' ),
			),
			array(
				'id'    => 'remove-tabs',
				'type'  => 'switcher',
				'title' => esc_html__( 'Remove Tabs', 'mm' ),
			),
			array(
				'id'    => 'remove-meta',
				'type'  => 'switcher',
				'title' => esc_html__( 'Remove Meta Fields', 'mm' ),
			),
			array(
				'id'    => 'remove-price',
				'type'  => 'switcher',
				'title' => esc_html__( 'Remove Price', 'mm' ),
			),
			array(
				'id'    => 'instant-buy',
				'type'  => 'switcher',
				'title' => esc_html__( 'Instant Buy Button', 'mm' ),
			),
		),
	)
);
