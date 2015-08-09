/**
 * TSS JS:
 * @author Islam Magdy (i.magdy.m@gmail.com)
 */

TSS = function () {
    var self = this;
    self.version = '1.0.0';
};

TSS.helpers = function () {
    var self = this;
    self.isHome = function () {
        return window.location.pathname === '/';
    };

    self.isMobile = function () {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    };

    self.prepareProductBackgroundImage = function () {
        if ($('[data-product-main-image]').length !== 0) {
            var backgroundImage = $('[data-product-main-image]').data('productMainImage');
            var productCoverTpl = '\n\
				<div class="product-background-cover">\n\
					<img src="' + backgroundImage + '" alt="">\n\
				</div>\n\
			';
            $('body').prepend(productCoverTpl);
        }
    };
};

Helpers = new TSS.helpers();

TSS.homepageManager = function () {
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
        onSlideChangeStart: function (instance) {
            var slides = instance.slides;
            var productImage = $(slides[instance.activeIndex]).find('img').attr('src');
            $('header').attr('style', 'background: #fff;');
            $('header').attr('style', 'background: url(' + productImage + ') 0 0 no-repeat;background-size: cover;');
            $('.header-slider h2').removeClass('animated slideInLeft');
        },
        onSlideChangeEnd: function (instance) {
            var slides = instance.slides;
            var productImage = $(slides[instance.activeIndex]).find('img').attr('src');
            $('header').attr('style', 'background: #111;');
            $('header').attr('style', 'background: url(' + productImage + ') 0 0 no-repeat;background-size: cover;');
            $('.header-slider h2').addClass('animated slideInLeft');
        }
    });
};

TSS.newsletter = function () {
    var emailAddress = $('#newsletter-form-js input');
    $.ajax({
        url: $('#newsletter-form-js').attr('action'),
        data: {
            email: emailAddress.val()
        }
    }).done(function (res) {
        $('#newsletter-form-js input').val('');
        $('#newsletter-form-js input').attr('placeholder', 'Thank you!');
        setTimeout(function () {
            $('#newsletter-form-js input').attr('placeholder', 'Email address');
            $('#newsletter-form-js input').val(emailAddress.val());
        }, 1500);
    }).fail(function (err) {
        $('#newsletter-form-js input').val('');
        $('#newsletter-form-js input').attr('Sorry something went wrong, please try again');
        setTimeout(function () {
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

    var self = this;
    var rowWidth = 1000; //$('.row').width();
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
        'data-0': 'top:0px;border-radius:8px;position:fixed;width: ' + (rowWidth / window.innerWidth) * 100 + '%;left: ' + ((totalGutter / 2 / window.innerWidth) * 100) + '%',
        // 'data-top-top': 'position:fixed;',
        // 'data-edge-strategy': 'set',
        // 'data-100': 'width: 80%; left: 10%;border-radius:8px;',
        // 'data-200': 'width: 90%; left: 5%;border-radius:4px;',
        // 'data-300': 'width: 100%; left: 0%;border-radius:0px;',
    });

    $('.header-top-bar').css({
        width: Helpers.isMobile() ? window.innerWidth : 1000,
        left: Helpers.isMobile() ? 0 : ((totalGutter / 2 / window.innerWidth) * 100) + '%'
    });

    $('[data-drop-down]').mouseenter(function (e) {
        var id = $(this).data('dropDown');
        $('[data-drop-down]').removeClass('active');
        $(this).addClass('active');
        $('.drop-down').removeClass('active');
        $(id).addClass('active');
    });
    $('.drop-down').mouseleave(function (e) {
        $('[data-drop-down]').removeClass('active');
        $('.drop-down').removeClass('active');
    });
    $('#store-dropdown ul li a').mouseenter(function (e) {
        e.stopPropagation();
        $(this).click();
    }).click(function (e) {
         if(e.hasOwnProperty('originalEvent')) {
            var url = $(this).data('categoryUri');
            window.location.href = url;
        }
    });
    $('input[type="search"]').focus(function (e) {
        $(this).parents('form').find('i').css('opacity', '0.2');
    }).blur(function (e) {
        $(this).parents('form').find('i').css('opacity', '1');
    });
    if (!Helpers.isMobile()) {
        self.s = skrollr.init();
    }
	$('.open-login-js').click(function (e) {
        $('#mobile-login-form').removeClass('hide').show();
    });
	$('.open-signup-js').click(function (e) {
        $('#mobile-signup-form').removeClass('hide').show();
    });
};

TSS.dataRoutes = function () {
    $('[data-route]').click(function (e) {
        e.preventDefault();
        var url = $(this).data('route');
        window.location.href = url;
    });
};

TSS.formsManager = function () {

    var self = this;

    self.directSubmit = function (formId) {
        $(formId).submit();
    };

    self.ajaxSubmit = function (formId, htmlRewrite) {
        $.ajax({
            url: $(formId).attr('action'),
            method: 'POST'
        }).done(function (res) {
            var htmlString = $(res).find(htmlRewrite);
            $(htmlRewrite).html(htmlString);
            TSS.onReady();
        }).fail(function () {
            alert('Failed!');
        });
    };
};

TSS.contactUsPage = function () {

    if (typeof google !== 'undefined') {
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            var mapOptions = {
                zoom: 11,
                center: new google.maps.LatLng(30.065227, 31.216546),
                styles: [{"featureType": "all", "elementType": "labels.text.fill", "stylers": [{"color": "#ffffff"}]}, {"featureType": "all", "elementType": "labels.text.stroke", "stylers": [{"visibility": "off"}]}, {"featureType": "all", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#ED2024"}]}, {"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#ED2024"}, {"weight": 1.2}]}, {"featureType": "administrative.locality", "elementType": "geometry.fill", "stylers": [{"lightness": "-1"}]}, {"featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{"lightness": "0"}, {"saturation": "0"}]}, {"featureType": "administrative.neighborhood", "elementType": "labels.text.stroke", "stylers": [{"weight": "0.01"}]}, {"featureType": "administrative.land_parcel", "elementType": "labels.text.stroke", "stylers": [{"weight": "0.01"}]}, {"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#ED2024"}]}, {"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#99282f"}]}, {"featureType": "road", "elementType": "geometry.stroke", "stylers": [{"visibility": "off"}]}, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#99282f"}]}, {"featureType": "road.highway.controlled_access", "elementType": "geometry.stroke", "stylers": [{"color": "#99282f"}]}, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#99282f"}]}, {"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#99282f"}]}, {"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#99282f"}]}, {"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#090228"}]}]
            };

            var mapElement = document.getElementById('contact-us-map');
            var map = new google.maps.Map(mapElement, mapOptions);
            new google.maps.Marker({
                position: new google.maps.LatLng(30.065227, 31.216546),
                map: map,
                title: 'TSS Zamalek',
                icon: '/shared/themes/frontend/images/src/map-marker-black.png'
            });
        }
    }
};

TSS.shoppingCart = function () {
    var self = this;
    self.shoppingCartPage = $('.single-page.shopping-cart');

    if (self.shoppingCartPage.length !== 0) {
        $('input').number(true);

        self.updateCheckoutTotal = function (el) {
            var $productTotalPrice = $('[data-product]').find('[data-product-total]');
            var totalValue = 0;
            for (var i = 0; i < $productTotalPrice.length; i++) {
                totalValue += $($productTotalPrice[i]).data('productTotal');
            }
            var $checkoutTotal = $('[data-checkout-toal] span');
            $checkoutTotal.text($.number(totalValue) + ' LE');
        };
        self.updateProductRow = function (el) {
            var $row = $(el).parents('[data-product]');
            var quantity = parseInt($row.find('.cart-quantity').val());
            var productPrice = $row.find('[data-product-price]').data('productPrice');
            var $productTotalPrice = $row.find('[data-product-total]');
            $productTotalPrice.data('productTotal', quantity * productPrice);
            $productTotalPrice.text($.number(quantity * productPrice) + ' LE');
            self.updateCheckoutTotal(el);
        };

        $('body').off('click', '.increase-quantity').on('click', '.increase-quantity', function (e) {
            var $input = $(this).parent('.cart-quantity-cont').find('input');
            var currentVal = $input.val();
            $input.val(parseInt(currentVal) + 1);
            self.updateProductRow(this);
        });
        $('body').off('click', '.decrease-quantity').on('click', '.decrease-quantity', function (e) {
            var $input = $(this).parent('.cart-quantity-cont').find('input');
            var currentVal = $input.val();
            if (currentVal !== '1') {
                $input.val(parseInt(currentVal) - 1);
                self.updateProductRow(this);
            }
        });
        $('body').off('change, keyup', '.cart-quantity').on('change, keyup', '.cart-quantity', function (e) {
            self.updateProductRow(this);
        });
        $('body').off('click', '.remove-product').on('click', '.remove-product', function (e) {
            if ($('[data-product]').length !== 1) {
                $(this).parents('[data-product]').remove();
            } else {
                $('.checkout-form').remove();
                $('.shopping-cart-empty').removeClass('hide');
            }
            self.updateProductRow(this);
        });

    }

};

/**
 * Initialize Foundation
 * @modified by Ahmed Sharaf
 * in order to recall it at my dev.js after success ajax request.
 */
TSS.initializeFoundation = function () {
    $(document).foundation({
        'magellan-expedition': {
            active_class: 'active',
            threshold: 20,
            destination_threshold: 20,
            throttle_delay: 50,
            fixed_top: 0,
            offset_by_height: true
        },
        tooltip: {
            selector: '[data-tooltip]',
            additional_inheritable_classes: [],
            tooltip_class: '.tooltip',
            touch_close_text: 'tap to close',
            disable_for_touch: false,
            tip_template: function (selector, content) {
                return '<span data-selector="' + selector + '" class="' + Foundation.libs.tooltip.settings.tooltip_class.substring(1) + '">' + content + '<span class="nub"></span></span>';
            }
        },
        offcanvas: {
            open_method: 'move',
            close_on_click: true
        }
    });
};

TSS.onReady = function () {
    var self = this;

    self.events = function () {
        $('#newsletter-form-js').on('valid.fndtn.abide', function (e) {
            e.preventDefault();
            TSS.newsletter();
        });
        $(document).on('open.fndtn.offcanvas', '[data-offcanvas]', function() {
            $('html').css('overflow', 'hidden');
        });
        $(document).on('close.fndtn.offcanvas', '[data-offcanvas]', function() {
            $('html').css('overflow', 'auto');
        });
    };

    TSS.initializeFoundation();// Changed by Ahmed Sharaf instead of self.initializeFoundation();
    self.events();
    TSS.header();
    TSS.homepageManager();
    TSS.contactUsPage();
    TSS.productFilters();
    TSS.dataRoutes();
    TSS.Form = new TSS.formsManager();
    //TSS.shoppingCart();
    Helpers.prepareProductBackgroundImage();
};

jQuery(document).ready(function ($) {
    TSS.onReady();
});
