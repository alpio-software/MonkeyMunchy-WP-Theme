<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Monkey_Munchy
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php if ( have_posts() ) : ?>
			<header class="entry-header page-header">
				<div class="static-clouds">
					<?php
					$clouds = mm_opt( 'page_clouds' );
					echo wp_get_attachment_image( $clouds['id'], 'full' );
					?>
				</div>

				<div class="header-content">
					<h1 class="entry-title page-title"><?php echo get_queried_object()->name; // phpcs:ignore WordPress.Security.EscapeOutput ?></h1>

					<?php mm_breadcrumb(); ?>

					<?php the_archive_description( '<div class="entry-excerpt">', '</div>' ); ?>
				</div>
			</header>

			<div class="archive-container">
				<div class="feed-posts">
					<div class="feed-post feed-sizer"></div>
					<div class="feed-post-gutter"></div>
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/feed/feed', get_post_type() );
					endwhile;
					?>
				</div>
				<div class="pagination">
					<?php
					echo paginate_links( // phpcs:ignore WordPress.Security.EscapeOutput
						array(
							'prev_text' => __( '&laquo;' ),
							'next_text' => __( '&raquo;' ),
						)
					);
					?>
				</div>
			</div>
			<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
	</main>
<?php
get_footer();
