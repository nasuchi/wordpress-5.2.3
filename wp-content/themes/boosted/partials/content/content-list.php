<?php if ( has_post_format( 'image' ) ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
			<?php
				the_post_thumbnail( 'boosted-post-large', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
			?>
			<span class="post-thumbnail-overlay"></span>
		</a>

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<div class="entry-meta">
				<?php boosted_post_meta(); ?>
			</div>

		</header>

	</article><!-- #post-## -->
<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-list' ); ?>>

		<?php boosted_post_thumbnail( 'boosted-featured-two' ); ?>

		<div class="entry-wrapper">

			<header class="entry-header">

				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<div class="entry-meta">
					<?php boosted_post_meta(); ?>
				</div>

			</header>

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>

			<span class="more-link-wrapper">
				<a href="<?php the_permalink(); ?>" class="more-link"><?php esc_html_e( 'Continue Reading', 'boosted' ); ?></a>
			</span>

		</div>

	</article><!-- #post-## -->
<?php endif; ?>
