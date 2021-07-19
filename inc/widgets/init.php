<?php
/**
 * Init WordPress widgets.
 *
 * @package Mm
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mm_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Mobile Menu', 'mm' ),
			'id'            => 'mobile-menu',
			'description'   => esc_html__( 'Add widgets here.', 'mm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'mm' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'mm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'mm' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'mm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'mm' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'mm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'mm' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'mm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'mm_widgets_init' );

require get_template_directory() . '/inc/widgets/widget-social-links.php';
