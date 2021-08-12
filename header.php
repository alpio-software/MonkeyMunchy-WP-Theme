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

		<div class="header-search">
			<?php get_search_form(); ?>
		</div>

		<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
			<div class="header-menu-wrapper">
				<?php get_template_part( 'template-parts/elements/element', 'night-mode-switcher' ); ?>

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
				<button class="hamburger hamburger--squeeze" type="button" aria-label="<?php esc_attr_e( 'Open Menu', 'mm' ); ?>">
					<span class="hamburger-box"><span class="hamburger-inner"></span></span>
				</button>
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
				</nav>
			</div>
		<?php endif; ?>
	</header>
