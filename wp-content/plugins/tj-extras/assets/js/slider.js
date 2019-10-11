( function ( $ ) {
	var postCarousel = function ( $scope, $ ) {

		$( '.post-slider' ).owlCarousel( {
			items: 1,
			loop: true,
			dots: false,
			autoplay: true,
			autoplaySpeed: 1000,
			autoplayHoverPause: true,
			nav: true,
			navText: [ "<i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>" ]
		} )

	};

	// Make sure we run this code under Elementor
	$( window ).on( 'elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/tj-extras-post-slider.default', postCarousel );
	} );
} )( jQuery );
