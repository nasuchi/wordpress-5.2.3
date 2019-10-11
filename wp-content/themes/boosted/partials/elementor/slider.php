<article class="entry">

	<?php boosted_post_thumbnail( 'boosted-slider', true ); ?>

	<header class="entry-header">

		<?php
			$category = get_the_category( get_the_ID() );
			if ( $category ) :
		?>
			<span class="cat-links cat-bg">
				<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>"><?php echo esc_attr( $category[0]->name ); ?></a>
			</span>
		<?php endif; // End if categories ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta">
			<?php boosted_post_meta( false ); ?>
		</div>

	</header>

</article>
