(function ($) {
  $(document).ready(function () {
    $(`#application-forms .column`).hide();
  });

  function showForm(id, x) {
    var active = $("#application-forms .show");
    active.removeClass("show");
    x.addClass("show");
    $(`#application-forms .column`).slideUp(400);
    $(`#application-forms .${id}`).slideDown(400);
  }

  var btns = $("#application-forms .application_btn");

  btns.click(function () {
    var id = $(this).data("id");
    if ($(this).hasClass("show")) {
      $(this).removeClass("show");
      $(`#application-forms .${id}`).slideUp(400);
    } else {
      showForm(id, $(this));
    }
  });

  var popupBtns = $(".application-form-popup .btn-default");

  popupBtns.click(function () {
    var id = $(this).data("id"),
      filterButton = $(`#application-forms .row`).find(`[data-id='${id}']`);
    if (filterButton.hasClass("show")) {
      $("html, body").animate({
        scrollTop: $("#application-forms").offset().top,
      });
      return;
    } else {
      $("html, body").scrollTop($("#application-forms").offset().top);
      showForm(id, filterButton);
    }
  });

  var popupToggle = $(".application-form-popup .toggle");

  $(document).ready(function () {
    if (localStorage.getItem("application") == "show") {
      return;
    } else {
      $(".application-form-popup").css({
        height: `${$(".application-form-popup").outerHeight()}px`,
      });
      $(".application-form-popup .info").animate({
        width: "toggle",
      });
      $(".application-form-popup .toggle").toggleClass("show");
    }
  });

  popupToggle.click(function () {
    $(".application-form-popup").css({
      height: `${$(".application-form-popup").outerHeight()}px`,
    });
    $(".application-form-popup .info").animate({
      width: "toggle",
    });
    $(".application-form-popup .toggle").toggleClass("show");
    if (Number($(".application-form-popup .info").css("width")[0]) < 1) {
      localStorage.setItem("application", "show");
    } else {
      localStorage.setItem("application", "hide");
    }
  });
})(jQuery);
