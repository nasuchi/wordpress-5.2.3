<?php if ( has_nav_menu ( 'primary' ) ) : ?>
	<nav class="main-navigation" id="site-navigation">

		<?php
		if ( function_exists( 'wp_megamenu' ) ) {
		 	$wpmm_nav_location_settings = get_wpmm_option( 'primary' );
		 	if ( !empty( $wpmm_nav_location_settings['is_enabled'] ) ){
		 		wp_megamenu( array( 'theme_location' => 'primary' ) );
		 	} else {
		 		wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'menu_id'         => 'menu-primary-items',
						'menu_class'      => 'menu-primary-items menu',
						'container'       => false
					)
				);
			}
		} else {
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'menu_id'         => 'menu-primary-items',
					'menu_class'      => 'menu-primary-items menu',
					'container'       => false
				)
			);

		} ?>

		<?php if ( has_nav_menu ( 'mobile' ) ) : ?>
			<a href="#" class="menu-mobile"><i class="icon-menu"></i></a>
		<?php endif; ?>

		<div class="right-navigation">
			<?php if ( boosted_is_woocommerce_activated() ) boosted_wc_header_cart(); ?>
			<?php get_template_part( 'partials/menu/shop' ); ?>
			<?php get_template_part( 'partials/menu/search' ); ?>
		</div>

	</nav>
<?php endif; ?>
