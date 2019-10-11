<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-grid' ); ?>>

	<?php boosted_post_thumbnail( 'boosted-post-small' ); ?>

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

</article><!-- #post-## -->
