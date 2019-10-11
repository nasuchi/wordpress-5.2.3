<?php
// Wrapper classes
$classes = array( 'site-header' );

if ( function_exists( 'wp_megamenu' ) ) {
	$wpmm_nav_location_settings = get_wpmm_option( 'primary' );
	if ( !empty( $wpmm_nav_location_settings['is_enabled'] ) ){
		$classes[] = 'megamenu-active';
	}
}

$variation = get_theme_mod( 'header_variation', 'variation-one' );
$classes[] = $variation;

$classes = implode( ' ', $classes );
?>

<?php get_template_part( 'partials/header/top', 'bar' ); ?>

<header id="masthead" class="<?php echo esc_attr( $classes ); ?>">
	<div class="container">

		<?php get_template_part( 'partials/header/logo' ); ?>

		<?php get_template_part( 'partials/menu/main', 'menu' ); ?>

	</div><!-- .container -->
</header><!-- #masthead -->
