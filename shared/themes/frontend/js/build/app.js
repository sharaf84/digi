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
		$(document).foundation({
			'magellan-expedition': {
				active_class: 'active',
				threshold: 20,
				destination_threshold: 20,
				throttle_delay: 50,
				fixed_top: 0,
				offset_by_height: true
			}
		});
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
		fade: {
			crossFade: true
		},
		spaceBetween: 0,
		hashnav: true,
		preloadImages: true,
		onSlideChangeStart: function( instance ) {
			var slides       = instance.slides;
			var productImage = $(slides[instance.activeIndex]).find('img').attr('src');
			$('header').attr('style', 'background: #fff;');
			$('header').attr('style', 'background: url(' + productImage + ') 0 0 no-repeat;background-size: cover;');
			$('.header-slider h2').removeClass('animated slideInLeft');
		},
		onSlideChangeEnd: function( instance ) {
			var slides       = instance.slides;
			var productImage = $(slides[instance.activeIndex]).find('img').attr('src');
			$('header').attr('style', 'background: #111;');
			$('header').attr('style', 'background: url(' + productImage + ') 0 0 no-repeat;background-size: cover;');
			$('.header-slider h2').addClass('animated slideInLeft');
		}
	});
};

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
	});
};

TSS.productFilters = function () {
	var $hiddenInput = $('#filterCharValue');
	$('body').off('click', '.alphabet-filter li a').on('click', '.alphabet-filter li a', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$('.alphabet-filter li').removeClass('current animated bounceIn');
		$(this).parent('li').addClass('current animated bounceIn');
		$hiddenInput.val(id);
	});
};

TSS.header = function () {

	var self        = this;
	var rowWidth    = $('.row').width();
	var totalGutter = window.innerWidth - rowWidth;

	//$('header:not(.single-header) .header-top-bar').attr({
		//'data-top-top': 'position:fixed;',
		//'data-anchor-target': '#checkpoint-a',
		//..'data-edge-strategy': 'set',
		//'data-0': 'top:0px;border-radius:8px;position:fixed;width: ' + (rowWidth/window.innerWidth)*100 + '%;left: ' + ((totalGutter/2/window.innerWidth)*100) + '%',
		//'data-100': 'width: 80%; left: 10%;border-radius:8px;top:-5px;',
		//'data-200': 'width: 90%; left: 5%;border-radius:4px;top:-10px;',
		//'data-end-end': 'width: 100%; left: 0%;border-radius:0px;top:-20px;',
	//});

	$('header .header-top-bar').attr({
		'data-anchor-target': '#checkpoint-a',
		'data-0': 'top:0px;border-radius:8px;position:fixed;width: ' + (rowWidth/window.innerWidth)*100 + '%;left: ' + ((totalGutter/2/window.innerWidth)*100) + '%',
		// 'data-top-top': 'position:fixed;',
		// 'data-edge-strategy': 'set',
		// 'data-100': 'width: 80%; left: 10%;border-radius:8px;',
		// 'data-200': 'width: 90%; left: 5%;border-radius:4px;',
		// 'data-300': 'width: 100%; left: 0%;border-radius:0px;',
	});

	$('.header-top-bar').css({
		width: rowWidth,
		left: ((totalGutter/2/window.innerWidth)*100) + '%'
	});

	self.s = skrollr.init();
};

TSS.customComponents = function () {
	// $('.select-component i').click(function () {
	// 	$(this).parent().find('select').click();
	// });
};

jQuery(document).ready(function( $ ) {

	TSS.header();
	TSS.onReady();
	TSS.homepageManager();
	TSS.productFilters();
	TSS.customComponents();


});
