<?php
/**
 * Init metaboxes.
 *
 * @package Mm
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

$prefix = 'page_metabox';

CSF::createMetabox(
	$prefix,
	array(
		'title'     => esc_html__( 'MonkeyMunchy Options', 'mm' ),
		'post_type' => 'page',
		'context'   => 'side',
		'data_type' => 'unserialize',
	)
);

CSF::createSection(
	$prefix,
	array(
		'fields' => array(
			array(
				'id'      => 'content-width',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Width', 'mm' ),
				'options' => array(
					'normal' => esc_html__( 'Normal', 'mm' ),
					'wide'   => esc_html__( 'Wide', 'mm' ),
				),
				'default' => 'normal',
			),
		),
	)
);
