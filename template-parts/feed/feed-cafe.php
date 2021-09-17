<?php
/**
 * Post feed template.
 *
 * @package Mm
 */

?>
<article <?php post_class( 'feed-post' ); ?> id="post-<?php the_ID(); ?>">
	<div class="post-wrapper">
		<div class="post-top">
			<?php mm_post_thumbnail( 'full' ); ?>
		</div>
		<div class="post-bottom">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-title-link">
				<?php the_title( '<h2 class="hentry">', '</h2>' ); ?>
			</a>

			<?php if ( has_excerpt() ) : ?>
				<div class="feed-excerpt"><?php echo wp_kses_post( wpautop( get_the_excerpt() ) ); ?></div>
			<?php endif; ?>

			<?php the_terms( get_the_ID(), 'recipes', '<div class="categories">', '', '</div>' ); ?>
		</div>
	</div>
</article>
