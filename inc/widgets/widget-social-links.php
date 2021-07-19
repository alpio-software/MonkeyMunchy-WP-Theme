<?php
/**
 * Social links.
 *
 * @package Mm
 */

CSF::createWidget(
	'mm_social_links',
	array(
		'title'       => esc_html__( '# Social Links', 'mm' ),
		'classname'   => 'mm-social-links',
		'description' => '',
		'fields'      => array(
			array(
				'id'    => 'title',
				'type'  => 'text',
				'title' => esc_html__( 'Title', 'mm' ),
			),
			array(
				'id'                     => 'links',
				'type'                   => 'group',
				'title'                  => esc_html__( 'Links', 'mm' ),
				'button_title'           => esc_html__( '+ Add Link', 'mm' ),
				'accordion_title_number' => true,
				'fields'                 => array(
					array(
						'id'    => 'url',
						'type'  => 'text',
						'title' => esc_html__( 'URL', 'mm' ),
					),
					array(
						'id'    => 'title',
						'type'  => 'text',
						'title' => esc_html__( 'Title', 'mm' ),
					),
					array(
						'id'    => 'new_tab',
						'type'  => 'switcher',
						'title' => esc_html__( 'Open in New Tab', 'mm' ),
					),
					array(
						'id'    => 'image',
						'type'  => 'media',
						'title' => esc_html__( 'Image', 'mm' ),
					),
					array(
						'id'    => 'text_color',
						'type'  => 'color',
						'title' => esc_html__( 'Text Color', 'mm' ),
					),
				),
			),
		),
	)
);

/**
 * Widget render function.
 *
 * @param array $args Default widget arguments.
 * @param array $instance Saved values.
 */
function mm_social_links( $args, $instance ) {
	echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput

	if ( ! empty( $instance['title'] ) ) {
		echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput
	}

	$links = $instance['links'];

	if ( ! empty( $links ) ) {
		?>
		<ul class="mm-social-links">
			<?php foreach ( $links as $social_link ) : ?>
				<li>
					<a
						href="<?php echo esc_url( $social_link['url'] ); ?>"
						<?php echo $social_link['new_tab'] ? esc_attr( ' target="_blank"' ) : null; ?>
						style="color: <?php echo sanitize_hex_color( $social_link['text_color'] ); ?>">
						<?php echo wp_get_attachment_image( $social_link['image']['id'], 'full' ); ?>
						<span><?php echo esc_html( $social_link['title'] ); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
	}
	echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput
}
