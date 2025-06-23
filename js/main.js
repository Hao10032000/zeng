/**
 * headerFixed
 * preventDefault
 * switchMode
 * spliting
 * handleFooter
 * popupAuto
 * handleSidebar
 * goTop
 * hoverMenuOverlay
 * handleVideo
 * oneNavOnePage
 **/

(function ($) {
    ("use strict");

    /* headerFixed
  -------------------------------------------------------------------------*/
    const headerFixed = () => {
        const header = document.querySelector(".header-fixed");
        if (!header) return;

        let adminBarHeight = 0;
        let isFixed = false;
        const scrollThreshold = 350;

        const getAdminBarHeight = () => {
            const adminBar = document.getElementById("wpadminbar");
            return adminBar ? adminBar.offsetHeight : 0;
        };

        const updateHeaderOffset = () => {
            adminBarHeight = getAdminBarHeight();
            if (isFixed) {
                header.style.top = `${adminBarHeight}px`;
            } else {
                header.style.top = "";
            }
        };

        const handleScroll = () => {
            const shouldBeFixed = window.scrollY >= scrollThreshold;
            if (shouldBeFixed !== isFixed) {
                header.classList.toggle("is-fixed", shouldBeFixed);
                isFixed = shouldBeFixed;
            }
            updateHeaderOffset();
        };

        window.addEventListener("scroll", handleScroll, { passive: true });
        window.addEventListener("resize", updateHeaderOffset);

        updateHeaderOffset();
        handleScroll();
    };



    /* preventDefault
  -------------------------------------------------------------------------*/
    const preventDefault = () => {
        $(".link-no-action").on("click", function (e) {
            e.preventDefault();
        });
    };

    /* switchMode
  -------------------------------------------------------------------------*/
    const switchMode = () => {
        const $toggles = $(".toggle-switch-mode");
        const $body = $("body");
        const $logoHeader = $(".main-logo");
        const $logoMobile = $("#logo_header_mobile");
        const tflight = $logoHeader.data("light");
        const tfdark = $logoHeader.data("dark");

        if (!$toggles.length) return;

        const applyLogo = (isDark) => {
            const src = isDark ? tfdark : tflight;
            $logoHeader.attr("src", src);
            $logoMobile.attr("src", src);
        };

        const updateToggles = (isDark) => {
            $toggles.each(function () {
                $(this).toggleClass("active", isDark);
            });
        };

        const savedMode = localStorage.getItem("darkMode");
        const isDarkInitially = savedMode === "enabled";

        $body.toggleClass("dark-mode", isDarkInitially);
        updateToggles(isDarkInitially);
        applyLogo(isDarkInitially);

        $toggles.on("click", function () {
            const isDark = !$body.hasClass("dark-mode");

            $body.toggleClass("dark-mode", isDark);
            updateToggles(isDark);
            applyLogo(isDark);
            localStorage.setItem("darkMode", isDark ? "enabled" : "disabled");
        });
    };

    /* spliting
  -------------------------------------------------------------------------*/
    const spliting = () => {
        if ($(".splitting").length) {
            Splitting();
        }
    };

    /* footer accordion
  -------------------------------------------------------------------------*/
    var handleFooter = function () {
        var footerAccordion = function () {
            var args = { duration: 250 };
            $(".footer-heading-mobile").on("click", function () {
                $(this).parent(".footer-col-block").toggleClass("open");
                if (!$(this).parent(".footer-col-block").is(".open")) {
                    $(this).next().slideUp(args);
                } else {
                    $(this).next().slideDown(args);
                }
            });
        };
        function handleAccordion() {
            if (matchMedia("only screen and (max-width: 767px)").matches) {
                if (
                    !$(".footer-heading-mobile").data("accordion-initialized")
                ) {
                    footerAccordion();
                    $(".footer-heading-mobile").data(
                        "accordion-initialized",
                        true
                    );
                }
            } else {
                $(".footer-heading-mobile").off("click");
                $(".footer-heading-mobile")
                    .parent(".footer-col-block")
                    .removeClass("open");
                $(".footer-heading-mobile").next().removeAttr("style");
                $(".footer-heading-mobile").data(
                    "accordion-initialized",
                    false
                );
            }
        }
        handleAccordion();
        window.addEventListener("resize", function () {
            handleAccordion();
        });
    };

    /* popupAuto
  -------------------------------------------------------------------------------------*/

    const popupAuto = () => {
        if (!$(".auto-popup").length) return;

        const $popupContainer = $(".auto-popup");
        const $closeBtn = $(".close-btn");

        const cooldown = 60 * 60 * 1000;

        const lastClosed = localStorage.getItem("popupClosedAt");
        if (lastClosed && Date.now() - parseInt(lastClosed, 10) < cooldown) {
            return;
        }

        window.showPopupWithEffect = function (effect) {
            const eff = effect || $popupContainer.data("effect") || "right";
            $popupContainer
                .hide()
                .removeClass(
                    "effect-left effect-right effect-top effect-bottom"
                )
                .attr("data-effect", eff)
                .addClass("effect-" + eff)
                .fadeIn(0);
        };

        $closeBtn.on("click", function () {
            $popupContainer
                .fadeOut(0)
                .removeClass(
                    "effect-left effect-right effect-top effect-bottom"
                );

            localStorage.setItem("popupClosedAt", Date.now().toString());
        });

        const delay = parseInt($popupContainer.data("delay"), 10) || 0;
        setTimeout(() => showPopupWithEffect(), delay);
    };

    /* handleSidebar
  -------------------------------------------------------------------------------------*/
    const handleSidebar = () => {
        if (!$(".show-sidebar").length) return;
        $(".show-sidebar").on("click", () => {
            if ($(window).width() <= 991) {
                $(".left-bar, .overlay-blog").addClass("show");
                $("body").addClass("no-scroll");
            }
        });

        $(".close-filter, .overlay-blog").on("click", () => {
            $(".left-bar, .overlay-blog").removeClass("show");
            $("body").removeClass("no-scroll");
        });
    };

    const handleSidebar2 = () => {
        if (!$(".handle-sidebarblog").length) return;
        $(".sidebar-btn").on("click", () => {
            if ($(window).width() <= 1199) {
                $(".overlay-sidebar, .handle-sidebarblog").addClass("active-sidebar");
                $("body").addClass("no-scroll");
            }
        });

        $(".close-filter, .overlay-sidebar").on("click", () => {
            $(".handle-sidebarblog, .overlay-sidebar").removeClass("active-sidebar");
            $("body").removeClass("no-scroll");
        });
    };

    /* goTop
  -------------------------------------------------------------------------------------*/
    const goTop = () => {
        if ($("div").hasClass("progress-wrap")) {
            var progressPath = document.querySelector(".progress-wrap path");
            var pathLength = progressPath.getTotalLength();
            progressPath.style.transition =
                progressPath.style.WebkitTransition = "none";
            progressPath.style.strokeDasharray = pathLength + " " + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition =
                progressPath.style.WebkitTransition =
                    "stroke-dashoffset 10ms linear";
            var updateprogress = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength) / height;
                progressPath.style.strokeDashoffset = progress;
            };
            updateprogress();
            $(window).scroll(updateprogress);
            var offset = 200;
            var duration = 0;
            jQuery(window).on("scroll", function () {
                if (jQuery(this).scrollTop() > offset) {
                    jQuery(".progress-wrap").addClass("active-progress");
                } else {
                    jQuery(".progress-wrap").removeClass("active-progress");
                }
            });
            jQuery(".progress-wrap").on("click", function (event) {
                event.preventDefault();
                jQuery("html, body").animate({ scrollTop: 0 }, duration);
                return false;
            });
        }
    };

    /* hoverMenuOverlay
  -------------------------------------------------------------------------------------*/
    const hoverMenuOverlay = () => {
        if (!$(".main-menu").length) return;
        const MowBody = $("body");
        $(".desk-navigation .main-menu .has-child")
            .on("mouseenter", function () {
                MowBody.addClass("menu-overlay-enabled");
            })
            .on("mouseleave", function () {
                MowBody.removeClass("menu-overlay-enabled");
            });
    };

    /* handleVideo
  -------------------------------------------------------------------------------------*/
    const handleVideo = () => {
        if (!$(".tf-video").length) return;

        $(".video_btn_play").on("click", function () {
            const $btn = $(this);
            const $container = $btn.closest(".img-style");
            const $videoWrap = $container.find(".tf-video");
            const $videoPlayer = $videoWrap.find(".fn__video_youtube");
            const $img = $container.find("img");
            if (!$videoPlayer.hasClass("ytp-inited")) {
                $videoPlayer.addClass("ytp-inited");
                $videoPlayer.one("YTPReady", function () {
                    $videoPlayer.YTPPlay();
                });
                $videoPlayer.YTPlayer();
                $img.addClass("hide");
                $videoWrap.show();
                $btn.addClass("active");
            } else {
                if ($btn.hasClass("active")) {
                    $videoPlayer.YTPPause();
                    $btn.removeClass("active");
                    $videoWrap.hide();
                    $img.removeClass("hide");
                } else {
                    $videoPlayer.YTPPlay();
                    $img.addClass("hide");
                    $videoWrap.show();
                    $btn.addClass("active");
                }
            }
        });
    };

    /* oneNavOnePage
  -------------------------------------------------------------------------------------*/
    const oneNavOnePage = () => {
        if (!$(".section-onepage").length) return;
        const $navLinks = $(".nav_link");
        const $sections = $(".section");
        $navLinks.on("click", function (e) {
            e.preventDefault();
            const target = $(this).attr("href");
            $("html, body").animate({ scrollTop: $(target).offset().top }, 0);
            $(".left-bar, #overlay-blog").removeClass("show");
            $("body").removeClass("no-scroll");
        });
        const updateActiveMenu = () => {
            const scrollTop = $(window).scrollTop();
            let current = "";
            $sections.each(function () {
                const $section = $(this);
                const top = $section.offset().top - 200;
                const bottom = top + $section.outerHeight();
                if (scrollTop >= top && scrollTop < bottom)
                    current = $section.attr("id");
            });
            $navLinks
                .removeClass("active")
                .filter(`[href="#${current}"]`)
                .addClass("active");
        };
        $(window).on("scroll", updateActiveMenu);
        updateActiveMenu();
    };

    const MenuMobile = () => {
        $(document).ready(function($) {
          $('.inner-mobile-nav .main-menu .has-child > a').on('click', function(e) {
            e.preventDefault();
        
            var $clickedLi = $(this).parent();                
            var $submenu = $clickedLi.children('.sub-menu');  
        
            if ($clickedLi.hasClass('active')) {
      $clickedLi.removeClass('active');
      $submenu.stop(true, true).slideUp(300);
            } else {
      $clickedLi.siblings('.has-child').removeClass('active')
        .children('.sub-menu').stop(true, true).slideUp(300);

      $clickedLi.addClass('active');
      $submenu.stop(true, true).slideDown(300);
            }
          });
        });
    }

    if ($(".sw-layout").length > 0) {
    $(".sw-layout").each(function () {
    var tfSwCategories = $(this);
    var swiperContainer = tfSwCategories.find(".swiper");
    if (swiperContainer.length === 0 || swiperContainer[0].swiper) return;

    var getData = (key, fallback) => {
        let val = swiperContainer.data(key);
        if (val === "auto") return "auto";
        return val !== undefined ? parseInt(val) || fallback : fallback;
    };

    var preview = getData("preview", 1);
    var screenXl = getData("screen-xl", preview);
    var tablet = getData("tablet", 1);
    var mobile = getData("mobile", 1);
    var mobileSm = getData("mobile-sm", mobile);
    var spacing = getData("space", 0);
    var spacingMd = getData("space-md", spacing);
    var spacingLg = getData("space-lg", spacing);
    var spacingXl = getData("space-xl", spacingLg);
    var perGroup = getData("pagination", 1); // => nên đổi key thành `group`
    var perGroupMd = getData("pagination-md", perGroup);
    var perGroupLg = getData("pagination-lg", perGroupMd);
    var center = swiperContainer.data("slide-center")?.toString() === "true";
    var initSlide = parseInt(swiperContainer.data("init-slide")) || 0;
    var autoplay = swiperContainer.data("autoplay")?.toString() === "true";
    var paginationType = swiperContainer.data("pagination-type") || "bullets";
    var loop = swiperContainer.data("loop")?.toString() === "true";

    var nextBtn = tfSwCategories.find(".nav-next-layout")[0] || null;
    var prevBtn = tfSwCategories.find(".nav-prev-layout")[0] || null;
    var progressbar =
        tfSwCategories.find(".sw-pagination-layout")[0] ||
        tfSwCategories.find(".sw-progress-layout")[0] ||
        null;

    new Swiper(swiperContainer[0], {
        slidesPerView: mobile,
        spaceBetween: spacing,
        speed: 1000,
        centeredSlides: center,
        initialSlide: initSlide,
        loop: loop,
        autoplay: autoplay
            ? {
                  delay: 3000,
                  disableOnInteraction: false,
              }
            : false,
        observer: true,
        observeParents: true,
        pagination: progressbar
            ? {
                  el: progressbar,
                  clickable: true,
                  type: paginationType,
              }
            : false,
        navigation:
            nextBtn && prevBtn
                ? {
                      clickable: true,
                      nextEl: nextBtn,
                      prevEl: prevBtn,
                  }
                : false,
        breakpoints: {
            575: {
                slidesPerView: mobileSm,
                spaceBetween: spacing,
                slidesPerGroup: perGroup,
            },
            768: {
                slidesPerView: tablet,
                spaceBetween: spacingMd,
                slidesPerGroup: perGroupMd,
            },
            992: {
                slidesPerView: preview,
                spaceBetween: spacingLg,
                slidesPerGroup: perGroupLg,
            },
            1200: {
                slidesPerView: screenXl,
                spaceBetween: spacingXl,
                slidesPerGroup: perGroupLg,
            },
        },
    });
});

}


    // Dom Ready
    $(function () {
        headerFixed();
        MenuMobile();
        preventDefault();
        switchMode();
        spliting();
        handleFooter();
        popupAuto();
        handleSidebar();
        handleSidebar2();
        goTop();
        hoverMenuOverlay();
        handleVideo();
        oneNavOnePage();
    });
})(jQuery);
