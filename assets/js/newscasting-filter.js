(function ($) {
  function dateString(a) {
    var year = a.getFullYear();
    var month = a.getMonth() + 1;
    var day = a.getDate();
    return (
      year +
      "-" +
      (month < 10 ? `0${month}` : month) +
      "-" +
      (day < 10 ? `0${day}` : day)
    );
  }
  var today = new Date();
  var nextWeek = new Date(today.getTime() + 7 * 24 * 60 * 60 * 1000);

  function name(a) {
    if ($(".show").length == 0) {
      name(a);
    } else {
      var data = [
        ["today", 1],
        ["this-week", 2],
        ["all", 3],
      ];
      data.forEach(([b, c]) => {
        $.post(
          ajax_posts.ajaxurl,
          {
            action: "fetch_newscasting_ajax",
            length: $(`.${b}.show`).length,
            type: b,
            pp: c,
            security: ajax_posts.security,
          },
          function (response) {
            $(`#${b}-slider-wrapper`).append(response);
            setTimeout(() => {
              for (let i = 0; i < $(`.${b}.show`).length; i++) {
                var item = $(`.sdg-calendar .calendar-item.show.${b}`).eq(i);
                //https://stackoverflow.com/questions/33023806/typeerror-1-attr-is-not-a-function/33023820
                if (b == "this-week" && item.hasClass("today")) {
                  $(`.${b}-${i}`).remove();
                } else if (
                  b == "all" &&
                  (item.hasClass("today") || item.hasClass("this-week"))
                ) {
                  $(`.${b}-${i}`).remove();
                } else {
                  item.clone().appendTo($(`.${b}-${i}`));
                }
              }
            }, 500);
          }
        );
      });
    }
  }
  
  $("#cookie-law-info-bar").ready(function () {
    $("#cookie-law-info-bar").hide();
  });

  $(document).ready(function () {
    $("body,html").scrollTop(0).css("overflow", "hidden");
    var items = $(".calendar-item");
    for (let i = 0; i < items.length; i++) {
      const item = items.eq(i);
      //https://stackoverflow.com/questions/33023806/typeerror-1-attr-is-not-a-function/33023820
      var dateTime = item.find(".agenda-date").attr("datetime");
      item.addClass("show");
      if (dateTime == dateString(today)) {
        // Today
        item.addClass("today");
      } else if (
        dateTime >= dateString(today) &&
        dateTime <= dateString(nextWeek)
      ) {
        // This Week
        item.addClass("this-week");
      } else {
        item.addClass("all");
      }
    }
    name("hello");
  });
})(jQuery);
