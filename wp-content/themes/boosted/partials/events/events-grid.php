<article id="post-<?php the_ID(); ?>" <?php post_class( 'event-grid' ); ?>>

	<?php boosted_post_thumbnail( 'boosted-post-small' ); ?>

	<header class="event-header">

		<?php the_title( sprintf( '<h2 class="event-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="event-meta">
			<span class="event-date"><?php echo tribe_get_start_date(); ?></span>
			<span class="event-city"><?php echo tribe_get_city(); ?></span>
			<span class="event-venue"><?php echo tribe_get_venue() ?></span>
		</div>

	</header>

	<div class="event-summary">
		<?php the_excerpt(); ?>
	</div>

	<span class="event-link">
		<a href="<?php the_permalink(); ?>" class="button"><?php esc_html_e( 'View Event', 'boosted' ); ?></a>
	</span>

</article><!-- #post-## -->
