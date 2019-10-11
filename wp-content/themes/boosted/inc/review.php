<?php
/**
 * Custom review
 */

/**
 * Display the review
 *
 * @since  1.0.0
 */
function boosted_review( $content ) {

	// Set up empty variable
	$review = '';

	// Get the metaboxes data
	$enable   = get_post_meta( get_the_ID(), 'tj_review_enable', true );
	$heading  = get_post_meta( get_the_ID(), 'tj_review_heading', true );
	$type     = get_post_meta( get_the_ID(), 'tj_review_type', true );
	$position = get_post_meta( get_the_ID(), 'tj_review_position', true );
	$feature  = get_post_meta( get_the_ID(), 'tj_review_feature', true );
	$desc     = get_post_meta( get_the_ID(), 'tj_review_description', true );
	$btntxt   = get_post_meta( get_the_ID(), 'tj_review_button_text', true );
	$btnurl   = get_post_meta( get_the_ID(), 'tj_review_button_url', true );

	// Display the review
	$review .= '<div class="review-wrapper ' . esc_attr( $type ) . '-type">';

		if ( $heading ) :
			$review .= '<h5 class="review-heading">' . esc_attr( $heading ) . '</h5>';
		endif;

		$review .= '<div class="review-area">';

			if ( $feature ) :
				$review .= '<ul class="review-features">';
					for ( $i = 0; $i < $feature; $i++ ) :

						$name    = get_post_meta( get_the_ID(), 'tj_review_feature_' . $i . '_name', true );
						$point   = get_post_meta( get_the_ID(), 'tj_review_feature_' . $i . '_point', true );
						$percent = get_post_meta( get_the_ID(), 'tj_review_feature_' . $i . '_percentage', true );
						$star    = get_post_meta( get_the_ID(), 'tj_review_feature_' . $i . '_star', true );

						// Score
						$score = '';
						$txt   = '';
						$bar   = '';

						if ( $type === 'point' ) {
							$score = number_format( (float)$point, 1 );
							$txt   = number_format( (float)$point, 1 );
							$bar   = number_format( (float)$point, 1 ) * 10;
						} elseif ( $type === 'percentage' ) {
							$score = intval( $percent );
							$txt   = intval( $percent ) . '%';
							$bar   = intval( $percent );
						} else {
							$score = number_format( (float)$star, 1 );
							$txt   = number_format( (float)$star, 1 );
							$bar   = number_format( (float)$star, 1 ) * 2 * 10;
						}

						$review .= '<li>';
							$review .= '<div class="review-txt">';
								$review .= '<span class="name">' . esc_html( $name ) . '</span>';
								$review .= '<span class="score">' . $txt . '</span>';
							$review .= '</div>';
							$review .= '<div class="review-bar">';
								$review .= '<div class="bar" style="width: ' . $bar . '%"></div>';
							$review .= '</div>';
						$review .= '</li>';
					endfor;
				$review .= '</ul>';
			endif;

			$review .= '<footer class="review-footer">';
				if ( $desc ) {
					$review .= '<div class="review-desc">';
						$review .= '<p>' . esc_html( $desc ) . '</p>';
						if ( $btnurl || $btntxt ) {
							$review .= '<a class="aff-btn button" href="' . esc_url( $btnurl ) . '">' . esc_html( $btntxt ) . '</a>';
						}
					$review .= '</div>';
				}

				// Average
				$avg = boosted_review_avg( array( 'type' => $type, 'count' => $feature ) );
				if ( $avg ) :
					$review .= '<div class="total-score">';
						$review .= '<span class="total">' . $avg . '</span>';
						$review .= '<span class="total-txt">' . esc_html__( 'Overall Score', 'boosted' ) . '</span>';
					$review .= '</div>';
				endif;

			$review .= '</footer>';

		$review .= '</div>';

	$review .= '</div>';

	// Display the review box
	if ( $enable && is_singular( 'post' ) ) {

		if ( $review ) {

			if ( $position === 'bottom' ) {
				$content = $content . $review;
			} elseif ( $position === 'top' ) {
				$content = $review . $content;
			} else {
				$content;
			}

		}

	}

	return $content;

}
add_filter( 'the_content', 'boosted_review', 20 );

/**
 * Count average value of review
 */
function boosted_review_avg( $args ) {

	// initial value
	$total = 0;
	$avg   = 0;
	$max   = 100;

	// set default max value, if type is set
	if ( isset( $args['type'] ) ) {
		switch ( $args['type'] ) {
			case 'point':
				$max = 10;
				break;

			case 'stars':
				$max = 5;
				break;

			case 'percentage':
			default:
				$max = 100;
				break;
		}
	}

	// prepare defaults
	$defaults = array(
		'type'        => 'point',
		'count'       => 0,
		'max'         => $max,
		'progressbar' => false
	);

	$args = wp_parse_args( $args, $defaults );
	extract( $args );

	// Total
	for ( $i = 0; $i < $count; $i++ ) :

		// get value by type
		$rate = get_post_meta( get_the_ID(), 'tj_review_feature_' . $i . '_' . $type, true );

		// Score
		$score = 0;
		if ( $type === 'percentage' ) {
			// for 'percentage'
			$score = intval( $rate );
		} else {
			// for 'point' and 'star'
			$score = (float)$rate;
		}

		$total += $score;
	endfor;

	// Average
	if ( $total ) :
		if ( $type === 'percentage' ) {
			// for 'percentage'
			$avg = $total / $count . '%';
		} else {
			// for 'point' and 'star'
			$avg = number_format( (float)($total / $count), 1 );
		}
	endif;

	// for progressbar
	if ( $progressbar ) {
		// set in percentage
		$avg = $avg / $max * 100;
	}

	return $avg;
}
