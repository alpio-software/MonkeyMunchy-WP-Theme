<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Monkey_Munchy
 */

$clouds    = mm_opt( 'footer_clouds' );
$copyright = mm_opt( 'footer_copyright' );
?>

	<footer id="colophon" class="site-footer">
		<div class="footer-main">
			<?php if ( ! empty( $clouds ) ) : ?>
				<div class="static-clouds">
					<?php echo wp_get_attachment_image( $clouds['id'], 'full' ); ?>
				</div>
			<?php endif; ?>
			<div class="footer-bg"></div>
			<div class="container">
				<div class="footer-widgets">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if ( ! empty( $copyright ) ) : ?>
			<div class="copyright">
				<?php echo wp_kses_post( wpautop( $copyright ) ); ?>
			</div>
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<span class="menu-overlay"></span>
</body>
</html>
