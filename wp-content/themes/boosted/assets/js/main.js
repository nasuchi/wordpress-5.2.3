( function ( $ ) {

	/**
	 * Search pop up
	 */
	function searchPopup() {
		$( '.search-toggle' ).magnificPopup( {
			type: 'inline',
			mainClass: 'popup-fade',
			closeOnBgClick: false,
			closeBtnInside: false,
			callbacks: {
				open: function () {
					setTimeout( function () {
						$( '.search-popup input' ).focus();
					}, 1000 );
				}
			}
		} );
	}

	/**
	 * Back to top
	 */
	function backToTop() {
		if ( $( '.back-to-top' ).length ) {
			var scrollTrigger = 100,
				backToTop = function () {
					var scrollTop = $( window ).scrollTop();
					if ( scrollTop > scrollTrigger ) {
						$( '.back-to-top' ).addClass( 'show' );
					} else {
						$( '.back-to-top' ).removeClass( 'show' );
					}
				};

			backToTop();
			$( window ).on( 'scroll', function () {
				backToTop();
			} );

			$( '.back-to-top' ).on( 'click', function ( e ) {
				e.preventDefault();
				$( 'html, body' ).animate( {
					scrollTop: 0
				}, 700 );
			} );

		}
	}

	/**
	 * Mobile nav
	 */
	function mobileNav() {

		var $site = $( '.site' );

		$( '.menu-mobile' ).on( 'click', function ( e ) {
			e.preventDefault();

			if ( $site.hasClass( 'show-mobile-nav' ) ) {
				$site.removeClass( 'show-mobile-nav' );
			} else {
				$site.addClass( 'show-mobile-nav' );
			}
		} )

	}

	/**
	 * Page loader
	 */
	function loader() {
		setTimeout( function () {
			$( '.page-loading' ).fadeOut( 'fast', function () {} );
		}, 100 );
	}

	/**
	 * Coupon
	 */
	function coupon() {
		var clipboard = new ClipboardJS( '.coupon-code' );

		clipboard.on( 'success', function ( e ) {
			console.info( 'Action:', e.action );
			console.info( 'Text:', e.text );
			console.info( 'Trigger:', e.trigger );

			e.clearSelection();
		} );

		clipboard.on( 'error', function ( e ) {
			console.error( 'Action:', e.action );
			console.error( 'Trigger:', e.trigger );
		} );
	}

	// Document ready
	$( function () {
		searchPopup();
		backToTop();
		mobileNav();
		loader();
		coupon();
	} );

}( jQuery ) );
