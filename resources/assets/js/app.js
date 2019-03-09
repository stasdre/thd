$( document ).ready(function() {

    // custom select

    $('.select-custom').each(function(){
        var $this = $(this), numberOfOptions = $(this).children('option').length;

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

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
});

$('.mh-1').matchHeight({ property: 'min-height' });
$('[data-fancybox]').fancybox({
    youtube : {
        controls : 0,
        showinfo : 0
    }
});
$('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<i class='fa fa-chevron-left arrow-prev'></i>",
    nextArrow: "<i class='fa fa-chevron-right arrow-next'></i>",
    fade: false,
    asNavFor: '.slider-nav-thumbnails',
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

var incrementPlus;
var incrementMinus;

var buttonPlus  = $(".qty-plus");
var buttonMinus = $(".qty-minus");

var incrementPlus = buttonPlus.click(function() {
    var $n = $(this)
        .parent("div")
        .find(".qty");
    $n.val(Number($n.val())+1 );
});
var incrementMinus = buttonMinus.click(function() {
    var $n = $(this)
        .parent("div")
        .find(".qty");
    var amount = Number($n.val());
    if (amount > 0) {
        $n.val(amount-1);
    }
});
