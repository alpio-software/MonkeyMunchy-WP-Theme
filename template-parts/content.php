<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Monkey_Munchy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="static-clouds">
			<?php
			$clouds = mm_opt( 'page_clouds' );
			echo wp_get_attachment_image( $clouds['id'], 'full' );
			?>
		</div>

		<div class="header-content">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			mm_breadcrumb();
			?>
		</div>
	</header>

	<div class="entry-content">
		<div class="entry-meta">
			<?php mm_posted_on(); ?>
		</div>

		<?php mm_post_thumbnail(); ?>

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mm' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
	</div>
</article>
