		</div><!-- #content -->

		<footer id="colophon" class="site-footer">

			<?php do_action( 'boosted_footer' ); ?>
				<div class="copyrights">
					<div class="container">

					<?php
						$copyright = get_theme_mod( 'copyrights_enable', true );
						if ( $copyright ) {
							boosted_footer_text();
						}
					?>

					<?php if ( has_nav_menu ( 'footer' ) ) : ?>
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'footer',
								'menu_id'         => 'menu-footer-items',
								'menu_class'      => 'menu-footer-items',
								'container'       => false,
								'depth'           => 1
							)
						); ?>
					<?php endif; ?>

					</div><!-- .site-info -->
				</div>

		</footer><!-- #colophon -->

	</div><!-- .wide-container -->

</div><!-- #page -->

<div id="search-overlay" class="search-popup popup-content mfp-hide">
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="search-field field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'boosted' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'boosted' ) ?>" />
	</form>
</div>

<?php boosted_back_to_top(); ?>

<?php wp_footer(); ?>

</body>
</html>
