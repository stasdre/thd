/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */,
/* 6 */,
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(8);
__webpack_require__(9);
module.exports = __webpack_require__(10);


/***/ }),
/* 8 */
/***/ (function(module, exports) {

$(document).ready(function () {

    // custom select

    $('.select-custom').each(function () {
        var $this = $(this),
            numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function (e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function () {
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function (e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
        });

        $(document).click(function () {
            $styledSelect.removeClass('active');
            $list.hide();
        });
    });

    $(".reverse_plan").on('click', function () {
        $(this).parent().parent().parent().find("img").toggleClass('reverse-img');
    });
});

$('.mh-1').matchHeight({ property: 'min-height' });
$('[data-fancybox]').fancybox({
    youtube: {
        controls: 0,
        showinfo: 0
    }
});
$('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<i class='fa fa-chevron-left arrow-prev'></i>",
    nextArrow: "<i class='fa fa-chevron-right arrow-next'></i>",
    fade: false,
    asNavFor: '.slider-nav-thumbnails'
});
$('.slider-nav-thumbnails').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    centerMode: true,
    asNavFor: '.slider',
    arrows: false,
    dots: false,
    focusOnSelect: true
});

// Remove active class from all thumbnail slides
$('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

// Set active class to first thumbnail slides
$('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

// On before slide change match active thumbnail to current slide
$('.slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var mySlideNumber = nextSlide;
    $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
    $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
});

$("input[name=min]").attr("maxlength", "4");
$("input[name=max]").attr("maxlength", "4");

$('.beds-add , .garage-add ,.beds-add-mobile').click(function () {
    var $n = $(this).parent("div").find(".qty");
    $(this).parent("div").find(".fa-minus").css({ 'border': '1px solid black', 'color': 'black', 'opacity': 1 });
    var amount = Number($n.val());
    if (amount < 8) {
        $n.val(amount + 1);
    }
});
$('.beds-remove , .garage-remove , .beds-remove-mobile').click(function () {
    var $n = $(this).parent("div").find(".qty");
    var amount1 = Number($n.val());
    if (amount1 > 1) {
        $n.val(amount1 - 1);
    }
    if (amount1 == 2) {
        $(this).parent("div").find(".fa-minus").css({ 'border': '1px solid silver', 'color': 'grey', 'opacity': .6 });
    }
});
$('.baths-add , .baths-add-mobile').click(function () {
    var $n = $(this).parent("div").find(".qty");
    $(this).parent("div").find(".fa-minus").css({ 'border': '1px solid black', 'color': 'black', 'opacity': 1 });
    var amount = Number($n.val());
    if (amount < 6) {
        $n.val(amount + 0.5);
    }
});
$('.baths-remove ,  .baths-remove-mobile').click(function () {
    var $n = $(this).parent("div").find(".qty");
    var amount = Number($n.val());
    if (amount > 1) {
        $n.val(amount - 0.5);
    }
    if (amount < 2) {
        $(this).parent("div").find(".fa-minus").css({ 'border': '1px solid silver', 'color': 'grey', 'opacity': .6 });
    }
});
$('.stories_add , .stories-add-mobile').click(function () {
    var $n = $(this).parent("div").find(".qty");
    $(this).parent("div").find(".fa-minus").css({ 'border': '1px solid black', 'color': 'black', 'opacity': 1 });
    var amount = Number($n.val());
    if (amount < 2) {
        $n.val(amount + 0.5);
    } else if (amount >= 2 && amount < 3) {
        $n.val(amount + 1);
    }
});
$('.stories_reduce , .stories_reduce-mobile').click(function () {
    var $n = $(this).parent("div").find(".qty");
    var amount = Number($n.val());
    if (amount > 1 && amount < 3) {
        $n.val(amount - 0.5);
    } else if (amount == 3) {
        $n.val(amount - 1);
    }
    if (amount < 2) {
        $(this).parent("div").find(".fa-minus").css({ 'border': '1px solid silver', 'color': 'grey', 'opacity': .6 });
    }
});

$("#read_more").click(function () {
    $("#content-scroll").show();
    $("#read_more").css('visibility', 'hidden');
    $('#read_less').show();
});
$('#read_less').click(function () {
    $("#content-scroll").hide();
    $("#read_more").css('visibility', 'visible');
    $('#read_less').hide();
});

/***/ }),
/* 9 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 10 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);