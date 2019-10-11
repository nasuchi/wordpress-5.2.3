<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input class="search-field" type="search" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search for...', 'placeholder', 'boosted' ) ?>" autocomplete="off" value="<?php echo esc_attr( get_search_query() ); ?>" title="<?php echo esc_attr_x( 'Search for:', 'label', 'boosted' ) ?>">
	<button type="submit" id="search-submit"><?php esc_attr_e( 'Search', 'boosted' ) ?></button>
</form>
