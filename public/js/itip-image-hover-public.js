(function( $ ) {

	function itip_swiper_slider() {

		$('.astra-shop-thumbnail-wrap .woocommerce-LoopProduct-link:not(.swiper-added)').each(function (ind, el) {
			if ($(el).find('.cropper-additional-image').length === 0) return;


			$(el).find('.shop-prod-sale-thumbnail picture').length == 0 ?
				$(el).find('img').wrap('<div class="swiper-content"></div>') :
				$(el).find('picture').wrap('<div class="swiper-content"></div>');

			$(el).find('.swiper-content').wrap('<div class="swiper-slide"></div>')

			$(el).find('.swiper-slide').wrapAll('<div class="swiper"><div class="swiper-wrapper"></div></div>');

			$(el).find('.swiper-slide:nth-of-type(2)').addClass('swiper-slide-additional');

			$(el).find('.swiper-wrapper').after('<div class="swiper-pagination"></div>')

			$(this).addClass('swiper-added');
		});

		new Swiper('.astra-shop-thumbnail-wrap .swiper:not(.swiper-initialized)', {
			slidesPerView: 1,
			effect: 'fade',
			fadeEffect: {
				crossFade: true
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true
			},
			breakpoints: {
				// when window width is >= 545px
				545: {
					allowTouchMove: false,
					speed: 900,
					slidesPerView: 'auto',
					pagination: {
						el: '.swiper-pagination',
						clickable: true
					},
				}
			},
			on: {
				init: function (swiper) {
					console.log(swiper)
					$(swiper.el).find('.swiper-wrapper').mouseenter(function(){
						if ($(window).width() >= 545)
							swiper.slideTo( 1 )
					});

					$(swiper.el).find('.swiper-wrapper').mouseleave(function(){
						if ($(window).width() >= 545)
							swiper.slideTo( 0 )
					});
				}
			}
		});

	};

	$(document).ready(function() {
		itip_swiper_slider();

		document.addEventListener("astraInfinitePaginationLoaded", function(e) {
			itip_swiper_slider()
		});
	});

})( jQuery );
