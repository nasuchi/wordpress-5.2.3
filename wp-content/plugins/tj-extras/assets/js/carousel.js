( function ( $ ) {
	var postCarousel = function ( $scope, $ ) {

		$( '.post-carousel' ).owlCarousel( {
			loop: true,
			margin: 30,
			autoplay: true,
			autoplaySpeed: 1000,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 4
				}
			}
		} )

	};

	// Make sure we run this code under Elementor
	$( window ).on( 'elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/tj-extras-post-carousel.default', postCarousel );
	} );
} )( jQuery );
