/**
 * TSS JS:
 * @author Islam Magdy (i.magdy.m@gmail.com)
 */

TSS = function() {
	var self = this;
	self.version = '1.0.0';
}

TSS.helpers = function() {
	var self = this;
	self.isHome = function() {
		return window.location.pathname === '/';
	}
};

Helpers = new TSS.helpers();

TSS.onReady = function() {
	var self = this;
	
	self.events = function() {
		$('#newsletter-form-js').on('valid.fndtn.abide', function( e ) {
			e.preventDefault();
			TSS.newsletter();
		});
	};
	
	self.initializeFoundation = function() {
		$(document).foundation();
	};
	
	self.initializeFoundation();
	self.events();
};

TSS.homepageManager = function() {
	var self = this;

	var footerSwiper = new Swiper('.footer-slider', {
		pagination: false,
		slidesPerView: 6,
		slidesPerColumn: 2,
		nextButton: 'footer .next-nav',
		prevButton: 'footer .prev-nav',
		spaceBetween: 0
	});
	var headerSwiper = new Swiper('.header-slider', {
		slidesPerView: 1,
		pagination: 'header .swiper-pagination',
		paginationClickable: true,
		effect: 'fade',
		spaceBetween: 0,
		hashnav: true,
		preloadImages: true,
		onSlideChangeStart: function( instance ) {
			var slides       = instance.slides;
			var productImage = $(slides[instance.activeIndex]).find('img').attr('src');
			$('header').attr('style', 'background: #111;');
			$('header').attr('style', 'background: url(' + productImage + ') 0 0 no-repeat;background-size: cover;');
		},
		onSlideChangeEnd: function( instance ) {
			var slides       = instance.slides;
			var productImage = $(slides[instance.activeIndex]).find('img').attr('src');
			$('header').attr('style', 'background: #111;');
			$('header').attr('style', 'background: url(' + productImage + ') 0 0 no-repeat;background-size: cover;');
		}
	});
}

/**
 * Footer Newsletter Form:
 */
TSS.newsletter = function() {
	var emailAddress = $('#newsletter-form-js input');
	$.ajax({
		url: $('#newsletter-form-js').attr('action'),
		data: {
			email: emailAddress.val()
		}
	}).done(function(res) {
		$('#newsletter-form-js input').val('');
		$('#newsletter-form-js input').attr('placeholder', 'Thank you!');
		setTimeout(function() {
			$('#newsletter-form-js input').attr('placeholder', 'Email address');
			$('#newsletter-form-js input').val(emailAddress.val());
		}, 1500);
	}).fail(function(err) {
		$('#newsletter-form-js input').val('');
		$('#newsletter-form-js input').attr('Sorry something went wrong, please try again');
		setTimeout(function() {
			$('#newsletter-form-js input').attr('placeholder', 'Email address');
			$('#newsletter-form-js input').val(emailAddress.val());
		}, 1500);
	})
}

jQuery(document).ready(function( $ ) {
	
	TSS.onReady();
	
	if( Helpers.isHome() ) {
		TSS.homepageManager();
	}
	
	
});