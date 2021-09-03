/*Charitify Theme Scripts */

(function ($) {
    "use strict";

    $(window).on("load", function () {
        $("body").addClass("loaded");
    });

    /*=========================================================================
    	Sticky Header
=========================================================================*/
    $(function () {
        var header = $("#header"),
            height = header.height(),
            yOffset = 0,
            triggerPoint = 100;
        $(".header-height").css("height", height + "px");
        $(window).on("scroll", function () {
            yOffset = $(window).scrollTop();

            if (yOffset >= triggerPoint) {
                header.removeClass("animated cssanimation fadeIn");
                header.addClass(
                    "navbar-fixed-top  cssanimation animated fadeInTop"
                );
            } else {
                header.removeClass(
                    "navbar-fixed-top cssanimation  animated fadeInTop"
                );
                header.addClass("animated cssanimation fadeIn");
            }
        });
    });

    /*=========================================================================
  Scroll To Top
=========================================================================*/
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 100) {
            $("#scroll-to-top").fadeIn();
        } else {
            $("#scroll-to-top").fadeOut();
        }
    });
})(jQuery);
