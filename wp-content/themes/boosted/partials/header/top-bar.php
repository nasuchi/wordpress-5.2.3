<?php
	$topbar = get_theme_mod( 'top_bar_enable', true );
	if ( true == $topbar ) :
?>
	<div class="top-bar">
		<div class="container">

			<div class="top-bar-text">
				<?php $text = get_theme_mod( 'top_bar_text', esc_html__( 'Customize this text ...', 'boosted' ) ); ?>
				<span><?php echo wp_kses_post( $text ); ?></span>
			</div>

			<?php if ( has_nav_menu ( 'social' ) ) : ?>
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'social',
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
						'depth'           => 1,
						'menu_id'         => 'social-menu',
						'menu_class'      => 'social-menu'
					)
				); ?>
			<?php endif; ?>

		</div>
	</div>

<?php endif; ?>
