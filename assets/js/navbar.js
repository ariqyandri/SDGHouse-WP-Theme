(function ($) {
  $(document).ready(function () {
    if (window.scrollY >= navbarHeight) {
      navbar.addClass("scroll");
    }
  });

  // make menu
  var navbar = $(".navigation");
  var navbarHeight = document.querySelector(".navigation").offsetHeight;
  var btn = $("#toggle-lang");

  if ($(window).width() > 1200) {
  $(".parent").hover(
    function () {
      $(this)
        .find(".sub-menu")
        .fadeIn(200)
        .css({
          paddingLeft: $(this).offset().left,
          display: "flex",
        });
      navbar.addClass("scroll");
    },
    function () {
      $(".sub-menu").fadeOut(200);
    }
  );
  navbar.hover(
    function () {
      navbar.addClass("scroll");
    },
    function () {
      if (window.scrollY <= navbarHeight) {
        if ($(".lang-menu-container").is(":visible")) {
          return;
        } else {
          navbar.removeClass("scroll");
        }
      }
    }
  );
  }
  //
  function onScroll(e) {
    if (
      $(".navigation .sub-menu").is(":visible") ||
      window.scrollY >= navbarHeight
    ) {
      navbar.addClass("scroll");
    } else {
      navbar.removeClass("scroll");
    }
  }
  document.addEventListener("scroll", onScroll);

  var btn = $("#toggle-lang");

  btn.on("click", function (e) {
    $(".lang-menu-container").slideToggle().toggleClass("active");
    if (window.scrollY <= navbarHeight) {
      navbar.addClass("scroll");
    }
    e.stopPropagation();
  });

  $(document).on("click", function (e) {
    if (
      $(".lang-menu-container.active").length==1 &&
      ($(e.target).is(".lang-menu-container") === false ||
        $(e.target).is(".sub-menu") === false ||
        $(e.target).is(".navigation") === false)
    ) {
      if (window.scrollY <= navbarHeight) {
        navbar.removeClass("scroll");
      }
      $(".lang-menu-container").removeClass("active");
      $(".lang-menu-container").slideUp(200);
    }
  });

  $(function () {});
  // mobile menu trigger
  $(document).ready(function () {
    $(".btn-mobile").click(function () {
      $(this).toggleClass("active");
      $(this).toggleClass("not-active");
      $(".navigation").toggleClass("active");
      $("body").toggleClass("active");
      $(".mobile-navigation").toggleClass("active");
      if (window.scrollY <= navbarHeight) {
        navbar.toggleClass("scroll");
      }
    });
  });
})(jQuery);
