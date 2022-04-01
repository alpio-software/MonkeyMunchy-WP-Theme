<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Monkey_Munchy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
		</div>

		<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
			<div class="header-menu-wrapper">
				<div class="desktop-menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'header-menu',
							'menu_id'        => 'header-menu',
						)
					);
					?>
				</div>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<?php
				dynamic_sidebar( 'mobile-menu' );

				wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'menu_id'        => 'header-menu',
					)
				);
				?>

				<div class="social-links">
					<?php
					$icons = array( 'opensea', 'discord', 'instagram', 'twitter', 'medium' );

					foreach ( $icons as $icon ) {
						$icon_url = mm_opt( $icon );
						ob_start();
						mm_icon( $icon );
						$icon_html = ob_get_clean();
						echo ! empty( $icon_url ) ? '<a href="' . esc_url( $icon_url ) . '" target="_blank" rel="noopener noferrer">' . $icon_html . '</a>' : '';
					}
					?>
				</div>
			</nav>
		<?php endif; ?>

		<div class="night-mode-wrapper">
			<div class="social-links">
				<?php
				$icons = array( 'opensea', 'discord', 'instagram', 'twitter', 'medium' );

				foreach ( $icons as $icon ) {
					$icon_url = mm_opt( $icon );
					ob_start();
					mm_icon( $icon );
					$icon_html = ob_get_clean();
					echo ! empty( $icon_url ) ? '<a href="' . esc_url( $icon_url ) . '" target="_blank" rel="noopener noferrer">' . $icon_html . '</a>' : '';
				}
				?>
			</div>
			<?php
			if ( is_front_page() ) {
				get_template_part( 'template-parts/elements/element', 'night-mode-switcher' );
			}
			?>
			<button class="hamburger hamburger--squeeze" type="button" aria-label="<?php esc_attr_e( 'Open Menu', 'mm' ); ?>">
				<span class="hamburger-box"><span class="hamburger-inner"></span></span>
			</button>
		</div>
	</header>
