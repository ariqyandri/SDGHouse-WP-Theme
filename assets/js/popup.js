(function ($) {
  $(".popup-button").click(function () {
    $(this).toggleClass("active");
    $(".popup-modal").toggleClass("active");
  });
  $(".modal-close").click(function () {
    $(".popup-modal").removeClass("active");
    $(".popup-button").removeClass("active");
  });
  $(".popup .toggle").click(function () {
    if ($(".popup.min")[0]) {
      $(".popup").removeClass("min");
      localStorage.setItem("popup", "");
    } else {
      $(".popup").addClass("min");
      localStorage.setItem("popup", "min");
    }
  });

  function getValue() {
    return localStorage.getItem("popup");
  }
  $(document).ready(function () {
    if (getValue() == "min") {
      $(".popup").addClass("min");
    }
    window.setTimeout(function () {
      if (window.localStorage) {
        // Get the expiration date of the previous popup.
        var nextPopup = localStorage.getItem("expire");
        var now = new Date();
        now = now.setHours(now.getHours());

        if (nextPopup > now) {
          return;
        }

        // Store the expiration date of the current popup in localStorage.
        var expires = new Date();
        expires = expires.setHours(expires.getHours() + 24);
        localStorage.setItem("expire", expires);
      }
      localStorage.setItem("popup", "");
    }, 2000);
  });
})(jQuery);
