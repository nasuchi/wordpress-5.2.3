<?php if ( has_nav_menu ( 'mobile' ) ) : ?>
	<nav class="mobile-navigation">
		<a href="#" class="menu-mobile"><i class="icon-cancel"></i> <?php esc_html_e( 'Close Menu', 'boosted' ); ?></a>

		<div class="icon-navigation">
			<?php if ( boosted_is_woocommerce_activated() ) boosted_wc_header_cart(); ?>
			<?php get_template_part( 'partials/menu/shop' ); ?>
			<?php get_template_part( 'partials/menu/search' ); ?>
		</div>

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'mobile',
				'menu_id'         => 'menu-mobile-items',
				'menu_class'      => 'menu-mobile-items',
				'container'       => false
			)
		); ?>
	</nav>
<?php endif; ?>
