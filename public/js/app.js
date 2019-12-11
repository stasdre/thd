!(function(e) {
  var i = {};
  function t(s) {
    if (i[s]) return i[s].exports;
    var a = (i[s] = { i: s, l: !1, exports: {} });
    return e[s].call(a.exports, a, a.exports, t), (a.l = !0), a.exports;
  }
  (t.m = e),
    (t.c = i),
    (t.d = function(e, i, s) {
      t.o(e, i) ||
        Object.defineProperty(e, i, {
          configurable: !1,
          enumerable: !0,
          get: s
        });
    }),
    (t.n = function(e) {
      var i =
        e && e.__esModule
          ? function() {
              return e.default;
            }
          : function() {
              return e;
            };
      return t.d(i, "a", i), i;
    }),
    (t.o = function(e, i) {
      return Object.prototype.hasOwnProperty.call(e, i);
    }),
    (t.p = ""),
    t((t.s = 21));
})({
  21: function(e, i, t) {
    t(22), t(23), (e.exports = t(24));
  },
  22: function(e, i) {
    $(document).ready(function() {
      $(".select-custom-jq").each(function() {
        var e = $(this),
          i = $(this).children("option").length;
        e.addClass("select-hidden"),
          e.wrap('<div class="select"></div>'),
          e.after('<div class="select-styled"></div>');
        var t = e.next("div.select-styled");
        t.text(
          e
            .children("option")
            .eq(0)
            .text()
        );
        for (
          var s = $("<ul />", { class: "select-options" }).insertAfter(t),
            a = 0;
          a < i;
          a++
        )
          $("<li />", {
            text: e
              .children("option")
              .eq(a)
              .text(),
            rel: e
              .children("option")
              .eq(a)
              .val()
          }).appendTo(s);
        var n = s.children("li");
        t.click(function(e) {
          e.stopPropagation(),
            $("div.select-styled.active")
              .not(this)
              .each(function() {
                $(this)
                  .removeClass("active")
                  .next("ul.select-options")
                  .hide();
              }),
            $(this)
              .toggleClass("active")
              .next("ul.select-options")
              .toggle();
        }),
          n.click(function(i) {
            i.stopPropagation(),
              t.text($(this).text()).removeClass("active"),
              e.val($(this).attr("rel")),
              s.hide();
          }),
          $(document).click(function() {
            t.removeClass("active"), s.hide();
          });
      }),
        $(".reverse_plan").on("click", function() {
          $(this)
            .parent()
            .parent()
            .parent()
            .find("img")
            .toggleClass("reverse-img");
        }),
        $("#read_more").click(function() {
          $("#content-scroll").show(),
            $("#read_more").css("visibility", "hidden"),
            $("#read_less").show();
        }),
        $("#read_less").click(function() {
          $("#content-scroll").hide(),
            $("#read_more").css("visibility", "visible"),
            $("#read_less").hide();
        }),
        $(".save_this_plan .fa-heart").click(function() {
          $(this).css("color", "red");
        }),
        $(".floor-plan-like-desktop .fa-heart").click(function() {
          $(this).css("color", "red");
        }),
        $(".floor-plan-like .fa-heart").click(function() {
          $(this).css("color", "red");
        });
      var e = "mouseup";
      /iPhone|iPad|iPod|Android/i.test(navigator.userAgent) && (e = "touchend"),
        $(document).delegate("body", e, function(e) {
          var i = $(".plan-dropdown-menu,.plan2-dropdown-menu");
          e.target.id == i.attr("id") || i.has(e.target).length || i.fadeOut();
        }),
        $(".style-desc-container__link").click(function(e) {
          e.preventDefault();
          var i = 0,
            t = $(this),
            s = t
              .parent()
              .parent()
              .parent()
              .find(".sidebar-box"),
            a = s.find(".sidebar-box__text");
          t.hasClass("shomn")
            ? (t.removeClass("shomn"),
              t.text("Read More"),
              s.animate({ height: "165px" }))
            : (t.text("Read Less"),
              (i += a.outerHeight()),
              s
                .css({ height: "165px", "max-height": 9999 })
                .animate({ height: i }),
              t.addClass("shomn"));
        });
    }),
      $(".mh-1").matchHeight({ property: "min-height" }),
      $("[data-fancybox]").fancybox({ youtube: { controls: 0, showinfo: 0 } }),
      $(".slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: !0,
        prevArrow: "<i class='fa fa-chevron-left arrow-prev'></i>",
        nextArrow: "<i class='fa fa-chevron-right arrow-next'></i>",
        fade: !1,
        asNavFor: ".slider-nav-thumbnails"
      }),
      $(".slider-nav-thumbnails").slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        centerMode: !0,
        asNavFor: ".slider",
        arrows: !1,
        dots: !1,
        focusOnSelect: !0
      }),
      $(".slider-nav-thumbnails .slick-slide").removeClass("slick-active"),
      $(".slider-nav-thumbnails .slick-slide")
        .eq(0)
        .addClass("slick-active"),
      $(".slider").on("beforeChange", function(e, i, t, s) {
        var a = s;
        $(".slider-nav-thumbnails .slick-slide").removeClass("slick-active"),
          $(".slider-nav-thumbnails .slick-slide")
            .eq(a)
            .addClass("slick-active");
      }),
      $("input[name=min]").attr("maxlength", "4"),
      $("input[name=max]").attr("maxlength", "4"),
      $(".beds-add , .garage-add ,.beds-add-mobile").click(function() {
        var e = $(this)
          .parent("div")
          .find(".qty");
        $(this)
          .parent("div")
          .find(".fa-minus")
          .css({ border: "1px solid black", color: "black", opacity: 1 });
        var i = Number(e.val());
        i < 8 && e.val(i + 1);
      }),
      $(".beds-remove , .garage-remove , .beds-remove-mobile").click(
        function() {
          var e = $(this)
              .parent("div")
              .find(".qty"),
            i = Number(e.val());
          i > 1 && e.val(i - 1),
            2 == i &&
              $(this)
                .parent("div")
                .find(".fa-minus")
                .css({
                  border: "1px solid silver",
                  color: "grey",
                  opacity: 0.6
                });
        }
      ),
      $(".baths-add , .baths-add-mobile").click(function() {
        var e = $(this)
          .parent("div")
          .find(".qty");
        $(this)
          .parent("div")
          .find(".fa-minus")
          .css({ border: "1px solid black", color: "black", opacity: 1 });
        var i = Number(e.val());
        i < 6 && e.val(i + 0.5);
      }),
      $(".baths-remove ,  .baths-remove-mobile").click(function() {
        var e = $(this)
            .parent("div")
            .find(".qty"),
          i = Number(e.val());
        i > 1 && e.val(i - 0.5),
          i < 2 &&
            $(this)
              .parent("div")
              .find(".fa-minus")
              .css({ border: "1px solid silver", color: "grey", opacity: 0.6 });
      }),
      $(".stories_add , .stories-add-mobile").click(function() {
        var e = $(this)
          .parent("div")
          .find(".qty");
        $(this)
          .parent("div")
          .find(".fa-minus")
          .css({ border: "1px solid black", color: "black", opacity: 1 });
        var i = Number(e.val());
        i < 2 ? e.val(i + 0.5) : i >= 2 && i < 3 && e.val(i + 1);
      }),
      $(".stories_reduce , .stories_reduce-mobile").click(function() {
        var e = $(this)
            .parent("div")
            .find(".qty"),
          i = Number(e.val());
        i > 1 && i < 3 ? e.val(i - 0.5) : 3 == i && e.val(i - 1),
          i < 2 &&
            $(this)
              .parent("div")
              .find(".fa-minus")
              .css({ border: "1px solid silver", color: "grey", opacity: 0.6 });
      }),
      $(".features ul li.listname").click(function() {
        $(this)
          .next("div")
          .slideToggle(1e3);
      });
  },
  23: function(e, i) {},
  24: function(e, i) {}
});
