<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Monkey_Munchy
 */

$clouds     = mm_opt( 'page_clouds' );
$page_width = get_post_meta( get_the_ID(), 'content-width', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="static-clouds">
			<?php echo wp_get_attachment_image( $clouds['id'], 'full' ); ?>
		</div>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if ( has_excerpt() ) : ?>
			<div class="entry-excerpt">
				<?php echo wpautop( get_the_excerpt() ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry-content entry-content-<?php echo esc_attr( $page_width ); ?>">
		<?php the_content(); ?>
	</div>
</article>
